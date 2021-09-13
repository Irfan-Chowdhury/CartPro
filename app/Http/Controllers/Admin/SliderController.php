<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Slider;
use App\Models\SliderTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Str;
use App\Traits\SlugTrait;
use App\Traits\imageHandleTrait;
use Exception;
use App\Traits\ActiveInactiveTrait;

class SliderController extends Controller
{
    use SlugTrait,imageHandleTrait, ActiveInactiveTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index(Request $request)
    {
        $locale = Session::get('currentLocal');

        $sliders = Slider::with(['sliderTranslation'=> function ($query) use ($locale){
            $query->where('locale',$locale)
            ->orWhere('locale','en')
            ->orderBy('id','DESC');
        }])
        ->orderBy('is_active','DESC')
        ->orderBy('id','DESC')
        ->get();

        $categories = Category::with(['categoryTranslation'=> function ($query) use ($locale){
            $query->where('local',$locale)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        }])
        ->where('is_active',1)
        ->get();

        if ($request->ajax())
        {
            return DataTables::of($sliders)
            ->setRowId(function ($row)
            {
                return $row->id;
            })
            ->addColumn('slider_image', function ($row)
            {
                if ($row->slider_image==NULL) {
                    return '<img src="'.url("public/images/empty.jpg").'" alt="" height="50px" width="50px">';
                }else {
                    $url = url("public/".$row->slider_image);
                    return  '<img src="'. $url .'" height="50px" width="50px"/>';
                }
            })
            ->addColumn('slider_title', function ($row) use ($locale)
            {
                if ($row->sliderTranslation->isNotEmpty()){
                    foreach ($row->sliderTranslation as $key => $value){
                        if ($key<1){
                            if ($value->locale==$locale){
                                return $value->slider_title;
                            }elseif($value->locale=='en'){
                                return $value->slider_title;
                            }
                        }
                    }
                }
                else {
                    return "NULL";
                }
            })
            ->addColumn('slider_subtitle', function ($row) use ($locale)
            {
                if ($row->sliderTranslation->isNotEmpty()){
                    foreach ($row->sliderTranslation as $key => $value){
                        if ($key<1){
                            if ($value->locale==$locale){
                                return $value->slider_subtitle;
                            }elseif($value->locale=='en'){
                                return $value->slider_subtitle;
                            }
                        }
                    }
                }else {
                    return "NULL";
                }
            })
            ->addColumn('type', function ($row)
            {
                return ucfirst($row->type);
            })
            ->addColumn('action', function($row){
                $actionBtn    = '<a href="javascript:void(0)" name="edit" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></a>
                              &nbsp;' ;
                if ($row->is_active==1) {
                    $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="dripicons-thumbs-down"></i></button>';
                }else {
                    $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="dripicons-thumbs-up"></i></button>';
                }
                return $actionBtn;
            })
            ->rawColumns(['slider_image','action'])
            ->make(true);
        }

        return view('admin.pages.slider.index',compact('categories','sliders','locale'));
    }

    // public function dataFetchByType(Request $request)
    // {
    //     if ($request->type=='category') {
    //         $categories = Category::where('is_active',1)->select('id','category_name')->get();
    //         return view('admin.includes.dependancy.dependancy_category',compact('categories'));
    //     }
    //     elseif ($request->type=='page') {
    //         $pages = Page::where('status',1)->select('id','page_name')->get();
    //         return view('admin.includes.dependancy.dependancy_page',compact('pages'));
    //     }
    //     elseif ($request->type=='url') {
    //         return view('admin.includes.dependancy.dependancy_url');
    //     }
    // }


    public function store(Request $request)
    {
        $validator = Validator::make($request->only('slider_title','type','slider_image'),[
            'slider_title'  => 'required|unique:slider_translations,slider_title',
            'type'          => 'required',
            'slider_image'  => 'required|image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->ajax()) {

            $data = [];
            $data['slider_slug']    = $this->slug($request->slider_title);
            $data['type']           = $request->type;
            $data['category_id']    = $request->category_id;
            $data['url']            = $request->url;
            $data['target']         = $request->target;
            if ($request->slider_image) {
                $data['slider_image'] = $this->imageSliderStore($request->slider_image, $directory='images/sliders/');
            }
            $data['type']           = $request->type;
            $data['is_active']      = $request->is_active;

            $sliderTranslation = [];
            $sliderTranslation['locale']          = Session::get('currentLocal');
            $sliderTranslation['slider_title']    = htmlspecialchars($request->slider_title);
            $sliderTranslation['slider_subtitle'] = htmlspecialchars($request->slider_subtitle);


            DB::beginTransaction();
            try {
                $slider =  Slider::create($data);
                $sliderTranslation['slider_id']  = $slider->id;

                SliderTranslation::create($sliderTranslation);
                DB::commit();
            }
            catch (Exception $e)
            {
                DB::rollback();

                return response()->json(['error' => $e->getMessage()]);
            }

            return response()->json(['success' => '<p><b>Data Saved Successfully.</b></p>']);
        }
    }

    public function edit(Request $request)
    {
        $locale = Session::get('currentLocal');
        $slider = Slider::find($request->slider_id);
        $sliderTranslation = SliderTranslation::where('slider_id',$request->slider_id)->where('locale',$locale)->first();

        if (!isset($sliderTranslation)) {
            $sliderTranslation = SliderTranslation::where('slider_id',$request->slider_id)->where('locale','en')->first();
        }
        return response()->json(['slider' => $slider, 'sliderTranslation'=>$sliderTranslation]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->only('slider_title','type','slider_image'),[
            'slider_title'  => 'required',
            'type'          => 'required',
            'slider_image'  => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->ajax()) {

            $data = [];
            $data['slider_slug']    = $this->slug($request->slider_title);
            $data['type']           = $request->type;
            $data['category_id']    = $request->category_id;
            $data['url']            = $request->url;
            $data['target']         = $request->target;
            if ($request->slider_image) {
                $data['slider_image'] = $this->imageSliderStore($request->slider_image, $directory='images/sliders/');
            }
            $data['type']           = $request->type;
            $data['is_active']      = $request->is_active;

            $sliderTranslation = [];
            $sliderTranslation['locale']          = Session::get('currentLocal');
            $sliderTranslation['slider_title']    = htmlspecialchars($request->slider_title);
            $sliderTranslation['slider_subtitle'] = htmlspecialchars($request->slider_subtitle);

            DB::beginTransaction();
            try {
                $slider =  Slider::find($request->slider_id)->update($data);

                SliderTranslation::UpdateOrCreate(
                    [
                        'slider_id'=>$request->slider_id,
                        'locale' => Session::get('currentLocal')
                    ],
                    [
                        'slider_title'   => $request->slider_title,
                        'slider_subtitle'=> $request->slider_subtitle
                    ],
                );

                DB::commit();
            }
            catch (Exception $e)
            {
                DB::rollback();

                return response()->json(['error' => $e->getMessage()]);
            }

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

    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData(Slider::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData(Slider::find($request->id));
        }
    }

    public function bulkAction(Request $request)
    {
        if ($request->ajax()) {
            return $this->bulkActionData($request->action_type, Slider::whereIn('id',$request->idsArray));
        }
    }

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
