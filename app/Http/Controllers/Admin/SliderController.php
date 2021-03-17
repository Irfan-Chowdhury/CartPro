<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Str;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        // $data = DB::table('sliders')
        //     ->leftJoin('categories','categories.id','sliders.category_id')
        //     ->leftJoin('pages','pages.id','sliders.page_id')
        //     // ->select('')
        //     // ->first();
        //     ->get();
        // return $data;
        

        $categories = Category::where('is_active',1)->select('id','category_name')->get();
        $sliders    = Slider::all();

        if ($request->ajax())
        {
            return DataTables::of($sliders)
            ->setRowId(function ($row)
            {
                return $row->id;
            })
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" name="edit" data-id="'.$row->id.'" class="edit btn btn-success btn-sm"><i class="dripicons-pencil"></i></a> 
                            &nbsp;
                            <a href="javascript:void(0)" name="delete" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.pages.slider.index',compact('categories','sliders'));
    }

    public function dataFetchByType(Request $request)
    {
        if ($request->type=='category') {
            $categories = Category::where('is_active',1)->select('id','category_name')->get();
            return view('admin.includes.dependancy.dependancy_category',compact('categories'));
        }
        elseif ($request->type=='page') {
            $pages = Page::where('status',1)->select('id','page_name')->get();
            return view('admin.includes.dependancy.dependancy_page',compact('pages'));
        }
        elseif ($request->type=='url') {
            return view('admin.includes.dependancy.dependancy_url');
        }
    }

    
    public function store(Request $request)
    {

        if ($request->ajax()) 
        {
            $validator = Validator::make($request->only('slider_title','slider_subtitle','type','image'),[ 
                'slider_title'    => 'required',
                'slider_subtitle' => 'required',
                'type'            => 'required',
                'image'           => 'required|image|max:10240|mimes:jpeg,png,jpg,gif',
            ]);
    
            if ($validator->fails()){
                return response()->json(['errors' => "<b>Please fill the required Option</b>"]);
            }
    
            if ($request->image){
                $file       = $request->file('image');
                $directory  ='/images/sliders/';
                $imageName  = time().'.'.$file->getClientOriginalExtension();
                $imageUrl   = $directory.$imageName;
                $upload_path= public_path().$imageUrl;
                Image::make($file)->resize(1900,633)->save($upload_path);
                // $image = '/public'.$imageUrl;
            }
    
            $slider = new Slider();
            $slider->slider_title    = htmlspecialchars($request->slider_title);
            $slider->slider_subtitle = htmlspecialchars($request->slider_subtitle);
            $slider->slider_slug     = Str::slug($request->slider_title);
            $slider->type            = $request->type;
            $slider->category_id     = $request->category_id;
            $slider->page_id         = $request->page_id;
            $slider->url             = $request->url;
            $slider->image           = $imageUrl;
            $slider->target          = $request->target;
            $slider->is_active       = $request->is_active;
            $slider->save();
    
            return response()->json(['success' => '<p><b>Data Saved Successfully.</b></p>']);
        }
    }

    public function edit(Request $request)
    {
        $slider = Slider::find($request->slider_id);

        // $slider = DB::table('sliders')
        //     ->leftJoin('categories','categories.id','sliders.category_id')
        //     ->leftJoin('pages','pages.id','sliders.page_id')
        //     ->select('sliders.slider_title','sliders.slider_subtitle','sliders.type','sliders.category_id')
        //     ->where('sliders.id','=',$request->slider_id)
        //     ->first();
        $page = Page::find($slider->page_id);

        return response()->json(['slider' => $slider, 'page' => $page ]);
    }

    
    public function update(Request $request)
    {
        if ($request->ajax()) 
        {
            $slider = Slider::find($request->slider_id);

            if ($request->image){
                if (File::exists(public_path().$slider->image)) {  
                    File::delete(public_path().$slider->image);
                }

                $file       = $request->file('image');
                $directory  ='/images/sliders/';
                $imageName  = time().'.'.$file->getClientOriginalExtension();
                $imageUrl   = $directory.$imageName;
                $upload_path= public_path().$imageUrl;
                Image::make($file)->resize(1900,633)->save($upload_path);
                
                $slider->image           = $imageUrl;
            }
            
            $slider->slider_title    = $request->slider_title;
            $slider->slider_subtitle = $request->slider_subtitle;
            $slider->slider_slug     = Str::slug($request->slider_title);
            $slider->type            = $request->type;
            $slider->category_id     = $request->category_id;
            $slider->page_id         = $request->page_id;
            $slider->url             = $request->url;
            $slider->target          = $request->target;
            $slider->is_active       = $request->is_active;
            $slider->update();
        
            return response()->json(['success' => '<p><b>Data Updated Successfully.</b></p>']);
        }
        
    }

    
    // public function delete($id)
    // {
    //     $slider = Slider::find($id);

    //     if (File::exists(public_path().$slider->image)) //delete previous image from storage
    //     {  
    //         File::delete(public_path().$slider->image);
    //         $slider->delete();

    //         return redirect()->back();
    //     }
    //     else{
    //         return "Problem";
    //     }
    // }

    public function delete(Request $request)
    {
        $slider = Slider::find($request->slider_id);

        if (File::exists(public_path().$slider->image)) //delete previous image from storage
        {  
            File::delete(public_path().$slider->image);
            $slider->delete();

            return response()->json(['success' => '<p><b>Data Deleted Successfully.</b></p>']);
        }
    }
}
