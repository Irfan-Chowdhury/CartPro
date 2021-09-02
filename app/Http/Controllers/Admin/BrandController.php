<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\BrandTranslation;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Str;
use Illuminate\Support\Facades\Validator;
use App\Traits\ActiveInactiveTrait;
use App\Traits\SlugTrait;
use App\Traits\imageHandleTrait;
use Illuminate\Support\Facades\App;

class BrandController extends Controller
{
    use ActiveInactiveTrait, SlugTrait, imageHandleTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    public function index()
    {
        if (auth()->user()->can('brand-view'))
        {
            App::setLocale(Session::get('currentLocal'));


            $local = Session::get('currentLocal');

            $brands = Brand::with(['brandTranslation'=> function ($query) use ($local){
                            $query->where('local',$local)
                            ->orWhere('local','en')
                            ->orderBy('id','DESC');
                        }])
                        ->orderBy('is_active','DESC')
                        ->orderBy('id','DESC')
                        ->get();

            if (request()->ajax())
            {
                return datatables()->of($brands)
                    ->setRowId(function ($row){
                        return $row->id;
                    })
                    ->addColumn('brand_logo', function ($row)
                    {
                        if ($row->brand_logo==null) {
                            return '<img src="'.url("public/images/empty.jpg").'" alt="" height="50px" width="50px">';
                        }
                        elseif ($row->brand_logo!=null) {
                            $url = url("public/".$row->brand_logo);
                            return  '<img src="'. $url .'" height="50px" width="50px"/>';
                        }
                    })
                    ->addColumn('brand_name', function ($row) use ($local)
                    {
                        if ($row->brandTranslation->count()>0){
                            foreach ($row->brandTranslation as $key => $value){
                                if ($key<1){
                                    if ($value->local==$local){
                                        return $value->brand_name;
                                    }
                                    elseif($value->local=='en'){
                                        return $value->brand_name;
                                    }
                                }
                            }
                        }else {
                            return "NULL";
                        }
                    })
                    ->addColumn('action', function ($row)
                    {
                        $actionBtn = "";
                        if (auth()->user()->can('brand-edit')){
                            $actionBtn .= '<a href="'.route('admin.brand.edit', $row->id) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                            &nbsp; ';
                        }
                        if (auth()->user()->can('brand-action')){
                            if ($row->is_active==1) {
                                $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                            }else {
                                $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                            }
                        }
                        return $actionBtn;
                    })
                    ->rawColumns(['brand_logo','action'])
                    ->make(true);
            }
            return view('admin.pages.brand.index',compact('brands','local'));
        }
        return abort('403', __('You are not authorized'));

    }

    public function store(Request $request)
    {
        // return response()->json($request->all());

        // $validator = Validator::make($request->only('brand_name'),[
        //     'brand_name' => 'required',
        // ]);
        // if ($validator->fails()){
        //     return response()->json(['errors' => $validator]);
        // }

        if (auth()->user()->can('brand-store'))
        {
            $brand       = new Brand;
            $brand->slug = $this->slug($request->brand_name);
            $image       = $request->file('brand_logo');
            if ($image) {
                $brand->brand_logo = $this->imageStore($image, $directory='images/brands/');
            }
            if (empty($request->is_active)) {
                $brand->is_active = 0;
            }else {
                $brand->is_active = 1;
            }
            $brand->save();

            $local                        = Session::get('currentLocal');
            $brandTranslation             = new BrandTranslation();
            $brandTranslation->brand_id   = $brand->id;
            $brandTranslation->local      = $local;
            $brandTranslation->brand_name = $request->brand_name;
            $brandTranslation->save();

            // return response()->json(['success' => "Successfully Done"]);
            return redirect()->back();
        }
    }

    public function brandEdit($id)
    {
        $local    = Session::get('currentLocal');
        $brand    = Brand::find($id);
        $brandTranslation = BrandTranslation::where('brand_id',$id)->where('local',$local)->first();

        return view('admin.pages.brand.edit',compact('brand','brandTranslation','local'));
    }

    public function brandUpdate(Request $request, $id)
    {
        if (auth()->user()->can('brand-edit'))
        {
            $brand   = Brand::find($id);
            if (empty($request->is_active)) {
                $brand->is_active = 0;
            }else {
                $brand->is_active = 1;
            }
            $brand_logo   = $request->file('brand_logo');
            if ($brand_logo) {
                $this->previousImageDelete($brand->brand_logo); //previous image will be deleted
                $brand->brand_logo = $this->imageStore($brand_logo, $directory='images/brands/');
            }
            $brand->update();

            DB::table('brand_translations')
            ->updateOrInsert(
                [
                    'brand_id' => $request->brand_id,
                    'local'    => $request->local,
                ], //condition
                [
                    'brand_name' => $request->brand_name,
                ]
            );

            session()->flash('type','success');
            session()->flash('message','Successfully Saved');
            return redirect()->back();
        }

    }

    public function delete($id)
    {
       Brand::whereId($id)->delete();
       return redirect()->back();
       return response()->json(['success' => __('Data is successfully deleted')]);
    }

    /*
    |--------------------------------------------------------------------------
    | Active-Inactive-Bulk
    |--------------------------------------------------------------------------
    |
    |
    */

    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData(Brand::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData(Brand::find($request->id));
        }
    }

    public function bulkAction(Request $request)
    {
        if ($request->ajax()) {
            return $this->bulkActionData($request->action_type, Brand::whereIn('id',$request->idsArray));
        }
    }
}



//Testing bellow

// $data = [];

// $language = Language::where('default',1)->first();

// $brands = Brand::all();

// foreach ($brands as $key => $value) {

//     $brandTranslationDefault = BrandTranslation::with('brand')
//             //->select('brand_id','brand_name','local','brand:brand_logo')
//             ->Where('brand_id',$value->id)
//             ->Where('local','=',$language->local)
//             ->first();

//     $brandTranslationEnglish = BrandTranslation::with('brand')
//             ->Where('brand_id',$value->id)
//             ->Where('local','=','en')
//             ->first();

//     if ($brandTranslationDefault) {
//         $data[$key] = $brandTranslationDefault;
//     }elseif ($brandTranslationEnglish) {
//         $data[$key] = $brandTranslationEnglish;
//     }else {
//         $data[$key]=NULL;
//     }
// }
// return $data;
