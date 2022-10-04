<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\ENVFilePutContent;
use App\Traits\JSONFileTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use ZipArchive;

class AutoUpdateController extends Controller
{
    use ENVFilePutContent, JSONFileTrait;

    private $product_mode;
    private $demo_version;
    private $demo_bug_no;
    private $minimum_required_version;
    private $latest_version_upgrade_enable;
    private $latest_version_db_migrate_enable;
    private $bug_update_enable;
    private $bug_db_migrate_enable;
    private $version_upgrade_base_url;
    private $bug_update_base_url;

    public function __construct()
    {
        $general = $this->readJSONData('track/general.json');
        $control = $this->readJSONData('track/control.json');

        $this->product_mode = env('PRODUCT_MODE');
        $this->demo_version = env('VERSION');
        $this->demo_bug_no  = intval(env('BUG_NO'));
        $this->minimum_required_version = $general->minimum_required_version;

        // Set During New Release Announce
        $this->latest_version_upgrade_enable   = $control->version_upgrade->latest_version_upgrade_enable;
        $this->latest_version_db_migrate_enable= $control->version_upgrade->latest_version_db_migrate_enable;
        $this->version_upgrade_base_url        = $control->version_upgrade->version_upgrade_base_url; // Fixed | Connect with server
        // $this->version_upgrade_base_url        = 'https://cartproshop.com/version_upgrade_files/'; // Fixed | Connect with server

        // Set During Bug Update
        $this->bug_update_enable     = $control->bug_update->bug_update_enable;
        $this->bug_db_migrate_enable = $control->bug_update->bug_db_migrate_enable;
        $this->bug_update_base_url   = $control->bug_update->bug_update_base_url;  // Fixed | Connect with server
        // $this->bug_update_base_url   = 'https://cartproshop.com/bug_update_files/';  // Fixed | Connect with server
    }

    // Client
    public function index(){
        return view('admin.pages.version_upgrade.index');
    }
    // Client
    public function bugUpdatePage(){
        return view('admin.pages.bug_update.index');
    }


    // Action on Client Server
    public function versionUpgrade(Request $request){
        return $this->actionTransfer($request,'version_upgrade');
    }


    // Action apply on Client Server
    public function bugUpdate(Request $request){
        return $this->actionTransfer($request,'bug_update');
    }

    protected function actionTransfer($request, $action_type)
    {
        $track_files_arr   = json_decode(json_encode($request->data), FALSE);
        $track_general_arr = json_decode(json_encode($request->general), FALSE);

        if($action_type =='version_upgrade'){
            $base_url = $this->version_upgrade_base_url;
        }else if($action_type == 'bug_update') {
            $base_url = $this->bug_update_base_url;
        }

        // Chack all Before Execute
        if ($track_files_arr && $track_general_arr) {
            foreach ($track_files_arr->files as $value) {
                $remote_file_url  = $base_url.$value->file_name;
                $array = @get_headers($remote_file_url);
                $string = $array[0];
                if(!strpos($string, "200")) {
                    return response()->json(['error' => ['Something problem. Please contact with support team.']],404);
                }
            }
        }


        // Start Execute
        try{
            if ($track_files_arr && $track_general_arr) {
                foreach ($track_files_arr->files as $value) {
                    $remote_file_url  = $base_url.$value->file_name;
                    $remote_file_name = pathinfo($remote_file_url)['basename'];
                    $local_file = base_path('/'.$remote_file_name);
                    $copy = copy($remote_file_url, $local_file);
                    if ($copy) {
                        // ****** Unzip ********
                        $zip = new ZipArchive;
                        $file = base_path($remote_file_name);
                        $res = $zip->open($file);
                        if ($res === TRUE) {
                            $zip->extractTo(base_path('/'));
                            $zip->close();

                            // ****** Delete Zip File ******
                            File::delete($remote_file_name);
                        }
                    }
                }

                if($action_type =='version_upgrade'){
                    $this->dataWriteInENVFile('VERSION',$track_general_arr->general->demo_version);
                }else if($action_type == 'bug_update') {
                    $this->dataWriteInENVFile('BUG_NO',$track_general_arr->general->demo_bug_no);
                }

                if (($action_type =='version_upgrade' && $track_general_arr->general->latest_version_db_migrate_enable==true) || ($action_type == 'bug_update' && $track_general_arr->general->bug_db_migrate_enable==true) ){
                    Artisan::call('migrate');
                }
                Artisan::call('optimize:clear');
                return response()->json('success');
            }
        }
        catch(Exception $e) {
            return response()->json(['error' => [$e->getMessage()]],404);
        }
    }


    /*************************************************
    *
    *   Developer Controll API || Demo
    *
    **************************************************/


    public function fetchDataGeneral()
    {
        $data = [
            'general'=>
            [
                'product_mode'              => $this->product_mode,
                'demo_version'              => $this->demo_version,
                'minimum_required_version'  => $this->minimum_required_version,
                'demo_bug_no'               => $this->demo_bug_no,
                'latest_version_upgrade_enable'=> $this->latest_version_upgrade_enable,
                'latest_version_db_migrate_enable' => $this->latest_version_db_migrate_enable,
                'bug_update_enable'         => $this->bug_update_enable,
                'bug_db_migrate_enable'     => $this->bug_db_migrate_enable,
            ],
        ];
        return response()->json($data,201);
    }

    public function fetchDataForAutoUpgrade()
    {
        $path = base_path('track/fetch-data-upgrade.json');
        $data = null;
        if (File::exists($path)) {
            $json_file = File::get($path);
            $data = json_decode($json_file);
        }
        return response()->json($data,201);
    }

    public function fetchDataForBugs()
    {

        $path = base_path('track/fetch-data-bug.json');
        $data = null;
        if (File::exists($path)) {
            $json_file = File::get($path);
            $data = json_decode($json_file);
        }
        return response()->json($data,201);
    }
}

