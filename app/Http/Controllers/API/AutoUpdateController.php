<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class AutoUpdateController extends Controller
{
    public function dataRead()
    {
        $files = [
            'general'=>
            [
                'product_type'      => 'demo',
                'version'           => '1.0.05',
                'auto_update_enable'=> true,
            ],
            'files'=>
            [
                ['sl'=> 1, 'file_name'=>'irfan.zip'],
                // ['sl'=> 2, 'file_name'=>'test456.zip'],
            ]



            // ['sl'=> 3, 'file_name'=>'config.zip'],
            // ['sl'=> 4, 'file_name'=>'database.zip'],
            // ['sl'=> 5, 'file_name'=>'public.zip'],
            // ['sl'=> 6, 'file_name'=>'resources.zip'],
            // ['sl'=> 7, 'file_name'=>'routes.zip'],
            // ['sl'=> 8, 'file_name'=>'storage.zip'],
            // ['sl'=> 9, 'file_name'=>'tests.zip'],
            // ['sl'=> 10, 'file_name'=>'track.zip'],
            // ['sl'=> 11, 'file_name'=>'vendor.zip'],
            // ['sl'=> 12, 'file_name'=>'editorconfig.zip'],
            // ['sl'=> 13, 'file_name'=>'env_example.zip'],
            // ['sl'=> 14, 'file_name'=>'gitattributes.zip'],
            // ['sl'=> 15, 'file_name'=>'gitignore.zip'],
            // ['sl'=> 16, 'file_name'=>'htaccess.zip'],
            // ['sl'=> 17, 'file_name'=>'styleci_yml.zip'],
            // ['sl'=> 18, 'file_name'=>'artisan.zip'],
            // ['sl'=> 19, 'file_name'=>'composer_json.zip'],
            // ['sl'=> 20, 'file_name'=>'composer_lock.zip'],
            // ['sl'=> 21, 'file_name'=>'index_php.zip'],
            // ['sl'=> 22, 'file_name'=>'package_json.zip'],
            // ['sl'=> 23, 'file_name'=>'phpunit_xml.zip'],
            // ['sl'=> 24, 'file_name'=>'README_md.zip'],
            // ['sl'=> 25, 'file_name'=>'webpack_mix_js.zip'],
        ];

        // $data =  json_decode(json_encode($files), FALSE);
        // return $data;

        return response()->json($files,201);
    }


    public function autoUpload(Request $request)
    {
            $data = [];
            $track_files_arr = json_decode(json_encode($request->data), FALSE);

            if ($track_files_arr) {
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
                return response()->json('success');
            }

    }
}
