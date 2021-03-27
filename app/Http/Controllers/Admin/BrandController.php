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

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $language = Language::where('default',1)->first();
        $local = $language->local;

        $brands = Brand::with(['brandTranslation'=> function ($query) use ($local){
						$query->where('local',$local)
                        ->orWhere('local','en')
                        ->orderBy('id','DESC'); 
					}])->get();

        //return $brands;
        // return view('admin.pages.brand.index',compact('brands','local'));

       if (request()->ajax())
        {
            return datatables()->of($brands)
                ->setRowId(function ($row){
                    return $row->id;
                })
                ->addColumn('brand_name', function ($row) use ($local)
                {   
                    if ($row->brandTranslation->count()>0){
                        foreach ($row->brandTranslation as $key => $value){
                            if ($key<1){
                                if ($value->local==$local){
                                    return $value->brand_name;
                                }elseif($value->local=='en'){
                                    return $value->brand_name;
                                }
                            }
                        }
                    }else {
                        return "NULL";
                    }
                })
                ->addColumn('brand_logo', function ($row)
                {
                    if ($row->brand_logo) {
                        $url = url($row->brand_logo);
                        return '<img src="'. $url .'"  style="height:50px;width:50px"/>'; 
                    }else { 
                        return "None";
                    }
                })
                ->addColumn('action', function ($row)
                {
                    // if ($row->brandTranslation->count()>0){
                    //     $actionBtn = '<a href="'.route('brand.edit', $row->id) .'" class="edit btn btn-success btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                    //             &nbsp;
                    //             <a href="'.route('admin.brand.delete', $row->id).'" class="delete_test btn btn-danger btn-sm"><i class="dripicons-trash"></i></a>';
                    //     return $actionBtn;
                    // }else {
                    //     return "NULL";
                    // }
                    $actionBtn = '<a href="'.route('brand.edit', $row->id) .'" class="edit btn btn-success btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                                &nbsp;
                                <a href="'.route('admin.brand.delete', $row->id).'" class="delete_test btn btn-danger btn-sm"><i class="dripicons-trash"></i></a>';
                    return $actionBtn;
                    
                })
                ->rawColumns(['brand_logo','action'])
                ->make(true);
        }
        return view('admin.pages.brand.index',compact('brands','local'));
    }

    public function make_slug($string) {
        if (Session::get('currentLocal')=='en') {
            $string = strtolower($string);
        }
        return preg_replace('/\s+/u', '-', trim($string));
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

        
        $brand = new Brand;
        // $brand->slug = Str::slug($request->brand_name, '-');
        $brand->slug = $this->make_slug($request->brand_name);
        
        //return response()->json($brand);
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $brand->brand_logo = $image_url;
        }
        if (empty($request->is_active)) {
            $brand->is_active = 0;
        }else {
            $brand->is_active = 1;
        }
        $brand->save();

        $language = Language::where('default',1)->first();
        $brandTranslation             = new BrandTranslation();
        $brandTranslation->brand_id   = $brand->id;
        $brandTranslation->local      = $language->local;
        $brandTranslation->brand_name = $request->brand_name;
        $brandTranslation->save();


        // return redirect()->back();
        // return response()->json("OK");
        return response()->json(['success' => "Successfully Done"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::where('id',$id)->first();
        return Response()->json($brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandEdit($id)
    {
        $language = Language::where('default',1)->first();
        $brand = Brand::find($id);
        $brandTranslation = BrandTranslation::where('brand_id',$id)->where('local',$language->local)->first();

        // if (!isset($brandTranslation)) {
        //     $brandTranslation = NULL;
        // }

        //return $brandTranslation->brand_id;

        return view('admin.pages.brand.edit',compact('brand','brandTranslation','language'));



        if (request()->ajax())
        {
            $data = Brand::findOrFail($id);

            return response()->json(['data' => $data]);
        }
         // $brand = Brand::where('id',$id)->first();
         // return view('admin.editBrand',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandUpdate(Request $request, $id)
    {
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


        // $id = $request->hidden_id;
        // $data = [];
        // $data['brand_name'] = htmlspecialchars($request->brand_name);
        // // $image = $request->file('image');
        // // if ($image) {
        // //     $image_name = Str::random(8);
        // //     $ext = strtolower($image->getClientOriginalExtension());
        // //     $image_full_name = $image_name.'.'.$ext;
        // //     $upload_path = 'public/images/';
        // //     $image_url = $upload_path.$image_full_name;
        // //     $success = $image->move($upload_path,$image_full_name);
        // //     $data['brand_logo'] = $image_url;
        // // }
        // $data['status'] = 1;
        // Brand::whereId($id)->update($data);
        // return response()->json(['success'=>'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

       Brand::whereId($id)->delete();
       return redirect()->back();

       return response()->json(['success' => __('Data is successfully deleted')]);

    }
    public function status($id,$status)
    {
        Brand::where('id',$id)->update(['status'=>$status]);
        return response()->json(['success' => _('updates')]);
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
