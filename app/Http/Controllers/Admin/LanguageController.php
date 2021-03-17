<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $languages = Language::orderBy('language_name','ASC')->get();

        return view('admin.pages.setting.language.index',compact('languages'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('language_name','local'),[ 
            'language_name' => 'required',
            'local'         => 'required|unique:languages',
        ]);

        if ($validator->fails()){

            session()->flash('type','danger');
            session()->flash('message','Something wrong');
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $language = new Language();
        $language->language_name = htmlspecialchars($request->language_name);
        $language->local         = strtolower(htmlspecialchars(trim($request->local)));

        if (empty($request->default)) {
            $language->default   = 0;
        }
        else {

            Language::where('default', '=', 1)->update(['default' => 0]);

            $language->default       = $request->default;
        }
        
        $language->save();

        session()->flash('type','success');
        session()->flash('message','Successfully Saved');
        return redirect()->back();

        // return $languages[$request->language_id]['language_name'];
    }

    public function delete($id)
    {
        $language = Language::find($id);
        $language->delete();

        session()->flash('type','success');
        session()->flash('message','Successfully Deleted');
        return redirect()->back();
    }

    public function defaultChange($id)
    {
        $language = Language::find($id);
        $currentLocal = Session::put('currentLocal', $language->local);

        session()->flash('type','success');
        session()->flash('message','Language Changed Successfully');
        return redirect()->back();
    }
}

// public function store(Request $request)
    // {
    //     $validator = Validator::make($request->only('language_name','local'),[ 
    //         'language_name' => 'required',
    //         'local'         => 'required',
    //     ]);

    //     if ($validator->fails()){
    //         return response()->json(['errors' => "<b>Please fill the required Option</b>"]);
    //     }

    //     $languages = $this->language();

    //     $language = new Language();
    //     $language->language_name = $languages[$request->language_id]['language_name'];
    //     $language->local         = $languages[$request->language_id]['local'];

    //     if (empty($request->default)) {
    //         $language->default   = 0;
    //     }
    //     else {

    //         Language::where('default', '=', 1)->update(['default' => 0]);

    //         $language->default       = $request->default;
    //     }
        
    //     $language->save();

    //     session()->flash('type','success');
    //     session()->flash('message','Successfully Saved');
    //     return redirect()->back();

    //     // return $languages[$request->language_id]['language_name'];
    // }


    

    // protected function language()
    // {
    //     $languages = array(
    //         [], //0
    //         [   //1
    //             'language_name' => 'English',
    //             'local'         => 'en',
    //         ],
    //         [
    //             'language_name' => 'Bangla',
    //             'local'         => 'bn',
    //         ],
    //         [
    //             'language_name' => 'France',
    //             'local'         => 'fr',
    //         ],
    //         [
    //             'language_name' => 'Hindi',
    //             'local'         => 'hi',
    //         ],
    //     );

    //     return $languages;
    // }
