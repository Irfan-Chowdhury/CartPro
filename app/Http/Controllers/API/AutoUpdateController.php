<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\ENVFilePutContent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use ZipArchive;

class AutoUpdateController extends Controller
{
    use ENVFilePutContent;

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
        $this->product_mode = env('PRODUCT_MODE');
        $this->demo_version = '1.0.5'; //env('VERSION');
        $this->demo_bug_no  = intval('1051'); //intval(env('BUG_NO'));
        $this->minimum_required_version = '1.0.4';

        // Set During New Release Announce
        $this->latest_version_upgrade_enable   = true;
        $this->latest_version_db_migrate_enable= false;
        $this->version_upgrade_base_url        = "http://peopleprohrm.com/auto_update_files/";

        // Set During Bug Update
        $this->bug_update_enable     = true;
        $this->bug_db_migrate_enable = false;
        $this->bug_update_base_url   = "http://peopleprohrm.com/auto_update_files/";
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
    public function autoUpload(Request $request)
    {
        return $this->actionTransfer($request,'version_upgrade');

        // if ($track_files_arr && $track_general_arr) {
        //     try{
        //         foreach ($track_files_arr->files as $value) {
        //             // $data[] = $value->file_name;
        //             // File transfer server to server
        //             $remote_file_url  = $this->version_upgrade_base_url.$value->file_name;
        //             $remote_file_name = pathinfo($remote_file_url)['basename'];
        //             $local_file = base_path('/'.$remote_file_name);
        //             $copy = copy($remote_file_url, $local_file);
        //             if ($copy) {
        //                 // ****** Unzip ********
        //                 $zip = new ZipArchive;
        //                 $file = base_path($remote_file_name);
        //                 $res = $zip->open($file);
        //                 if ($res === TRUE) {
        //                     $zip->extractTo(base_path('/'));
        //                     $zip->close();

        //                     // ****** Delete Zip File ******
        //                     File::delete($remote_file_name);
        //                 }
        //             }
        //         }
        //         $this->dataWriteInENVFile('VERSION',$track_general_arr->general->demo_version);
        //         if ($track_general_arr->general->latest_version_db_migrate_enable){
        //             Artisan::call('migrate');
        //         }
        //         Artisan::call('optimize:clear');
        //         return response()->json('success');
        //     }
        //     catch(Exception $e) {
        //         return response()->json(['error' => [$e->getMessage()]],404);
        //     }
        // }
    }

    protected function actionTransfer($request, $action_type)
    {

        $track_files_arr   = json_decode(json_encode($request->data), FALSE);
        $track_general_arr = json_decode(json_encode($request->general), FALSE);

        try{
            if ($track_files_arr && $track_general_arr) {
                foreach ($track_files_arr->files as $value) {
                    $remote_file_url  = $this->version_upgrade_base_url.$value->file_name;
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


    // Action apply on Client Server
    public function bugUpdate(Request $request)
    {
        return $this->actionTransfer($request,'bug_update');

        $track_files_arr   = json_decode(json_encode($request->data), FALSE);
        $track_general_arr = json_decode(json_encode($request->general), FALSE);
        // return response()->json($track_general_arr);


            try {
                if ($track_files_arr && $track_general_arr) {
                    foreach ($track_files_arr->files as $value) {
                        // $data[] = $value->file_name;
                        // File transfer server to server
                        $remote_file_url  = $this->bug_update_base_url.$value->file_name;
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
                    $this->dataWriteInENVFile('BUG_NO',$track_general_arr->general->demo_bug_no);
                    if ($track_general_arr->general->bug_db_migrate_enable){
                        Artisan::call('migrate');
                    }
                    Artisan::call('cache:clear');
                    return response()->json('success');
                }
            }
            catch (Exception $e) {
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
        $data = [
            'general'=>
            [
                'product_mode'            => $this->product_mode,
                'version'                 => $this->demo_version,
                'minimum_required_version'=> $this->minimum_required_version,
                'auto_upgrade_enable'     => true,
                'db_migrate'              => false,
            ],
            'files'=>
            [
                ['sl'=> 1, 'file_name'=>'irfan.zip'],
                // ['sl'=> 2, 'file_name'=>'test456.zip'],
            ],
            'log'=>
            [
                ['text'=>'Some Bug Fixed.'],
                ['text'=>'Auto upload fetaure updated.'],
            ]
        ];

        // $data =  json_decode(json_encode($data), FALSE);
        // return $data;
        return response()->json($data,201);
    }

    public function fetchDataForBugs()
     {
        $data = [
            'general'=>
            [
                'product_mode'            => $this->product_mode,
                'version'                 => $this->demo_version,
                'bug_no'                  => $this->demo_bug_no,
                'minimum_required_version'=> $this->minimum_required_version,
                'auto_bug_update_enable'  => true,
                'db_migrate'              => false,
            ],
            'files'=>
            [
                // ['sl'=> 1, 'file_name'=>'irfan.zip'],
                ['sl'=> 1, 'file_name'=>'editorconfig.zip'],
                ['sl'=> 2, 'file_name'=>'app.zip'],
                ['sl'=> 3, 'file_name'=>'artisan.zip'],
                ['sl'=> 4, 'file_name'=>'bootstrap.zip'],
                ['sl'=> 5, 'file_name'=>'composer.zip'],
                ['sl'=> 6, 'file_name'=>'config.zip'],
                ['sl'=> 7, 'file_name'=>'database.zip'],
                ['sl'=> 8, 'file_name'=>'install0.zip'],
                ['sl'=> 9, 'file_name'=>'resources.zip'],
                ['sl'=> 10, 'file_name'=>'routes.zip'],
                ['sl'=> 11, 'file_name'=>'storage.zip'],
                ['sl'=> 12, 'file_name'=>'tests.zip'],
                ['sl'=> 13, 'file_name'=>'irfan.zip'],
            ],
            'log'=>
            [
                ['text'=>'Some Bug Fixed.'],
                ['text'=>'Auto upload fetaure updated.'],
            ]
        ];
        return response()->json($data,201);
     }
}

