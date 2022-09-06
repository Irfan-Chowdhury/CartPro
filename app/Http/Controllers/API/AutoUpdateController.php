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

    // Client
    public function index(){
        return view('admin.pages.auto_update.index');
    }


    // Client
    public function autoUpload(Request $request)
    {
        $track_files_arr = json_decode(json_encode($request->data), FALSE);

        // $this->dataWriteInENVFile('VERSION',$track_files_arr->general->version);
        // Artisan::call('optimize:clear');
        // return response()->json('success');



        if ($track_files_arr) {
            try{
                // File transfer server to server
                foreach ($track_files_arr->files as $value) {
                    // $data[] = $value->file_name;
                    // File transfer server to server
                    $remote_file_url  = "http://peopleprohrm.com/auto_update_files/".$value->file_name;
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
                $this->dataWriteInENVFile('VERSION',$track_files_arr->general->version);
                // Artisan::call('migrate');
                Artisan::call('optimize:clear');
                return response()->json('success');
            }
            catch(Exception $e) {
                return response()->json(['error' => [$e->getMessage()]],404);
            }
        }
    }



    // Developer
    public function dataRead()
    {
        $data = [
            'general'=>
            [
                'product_mode'      => env('PRODUCT_MODE'),
                // 'version'           => env('VERSION'),
                'version'           => '1.0.6',
                'minimum_required_version'=> '1.0.5',
                'auto_update_enable'=> true,
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




}
