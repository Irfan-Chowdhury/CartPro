<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderTranslation;
use App\Services\CategoryService;
use App\Services\SliderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Traits\SlugTrait;
use App\Traits\imageHandleTrait;
use Exception;
use App\Traits\ActiveInactiveTrait;
use App\Traits\DeleteWithFileTrait;

class SliderController extends Controller
{
    use SlugTrait, imageHandleTrait, ActiveInactiveTrait, DeleteWithFileTrait;

    private $sliderService;
    private $categoryService;
    public function __construct(SliderService $sliderService, CategoryService $categoryService){
        $this->sliderService   = $sliderService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.pages.slider.index',compact('categories'));
    }

    public function dataTable(){
        return $this->sliderService->dataTable();
    }


    public function store(Request $request)
    {
        if ($request->ajax()) {
            if (env('USER_VERIFIED')!=1) {
                return response()->json(['errors' => ['Disabled for demo !']]);
            }

            $validator = Validator::make($request->only('slider_title','type','slider_image'),[
                'slider_title'  => 'required|unique:slider_translations,slider_title',
                'type'          => 'required',
                'slider_image'  => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,webp',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }
            elseif ($request->type=='category' && $request->category_id==NULL) {
                return response()->json(['errors' => 'Please select a category']);
            }
            elseif ($request->type=='url' && $request->url==NULL) {
                return response()->json(['errors' => 'Please fillup the url']);
            }

            $data = [];
            $data['slider_slug']    = $this->slug($request->slider_title);
            $data['type']           = $request->type;
            $data['category_id']    = $request->category_id;
            $data['url']            = $request->url;
            $data['target']         = $request->target;
            if ($request->slider_image) {
                $data['slider_image'] = $this->imageSliderStore($request->slider_image, $directory='images/sliders/',$width=775, $height=445); //half width
                $data['slider_image_full_width'] = $this->imageSliderStore($request->slider_image, $directory='images/sliders/full_width/',$width=1920, $height=650);
                $data['slider_image_secondary'] = $this->imageSliderStore($request->slider_image, $directory='images/sliders/secondary/',$width=100, $height=58);
            }
            $data['type']           = $request->type;
            $data['text_alignment'] = $request->text_alignment;
            $data['text_color']      = $request->text_color;
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
            catch (Exception $e){
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

        if($slider->slider_image!=NULL && (File::exists(public_path($slider->slider_image)))) {
            $slider_image = url("public/".$slider->slider_image);
        }else {
            $slider_image = 'https://dummyimage.com/100x100/000000/0f6954.png&text=Slider';
        }

        $sliderTranslation = SliderTranslation::where('slider_id',$request->slider_id)->where('locale',$locale)->first();

        if (!isset($sliderTranslation)) {
            $sliderTranslation = SliderTranslation::where('slider_id',$request->slider_id)->where('locale','en')->first();
        }
        return response()->json(['slider' => $slider, 'sliderTranslation'=>$sliderTranslation,'slider_image'=>$slider_image]);
    }


    public function update(Request $request)
    {
        if ($request->ajax()) {

            if (env('USER_VERIFIED')!=1) {
                return response()->json(['errors' => ['Disabled for demo !']]);
            }

            $validator = Validator::make($request->only('slider_title','type','slider_image'),[
                'slider_title'  => 'required|unique:slider_translations,slider_title,'.$request->slider_Translation_id,
                'type'          => 'required',
                'slider_image'  => 'image|max:10240|mimes:jpeg,png,jpg,gif,webp',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }
            elseif ($request->type=='category' && $request->category_id==NULL) {
                return response()->json(['errors' => 'Please select a category']);
            }
            elseif ($request->type=='url' && $request->url==NULL) {
                return response()->json(['errors' => 'Please fillup the url']);
            }

            $slider =  Slider::find($request->slider_id);

            $data = [];
            $data['slider_slug']    = $this->slug($request->slider_title);
            $data['type']           = $request->type;
            $data['category_id']    = $request->category_id;
            $data['url']            = $request->url;
            $data['target']         = $request->target;
            if ($request->slider_image) {
                $this->previousImageDelete($slider->slider_image); //half width
                $this->previousImageDelete($slider->slider_image_full_width);
                $this->previousImageDelete($slider->slider_image_secondary);
                $data['slider_image'] = $this->imageSliderStore($request->slider_image, $directory='images/sliders/',$width=775, $height=445); //half width
                $data['slider_image_full_width'] = $this->imageSliderStore($request->slider_image, $directory='images/sliders/full_width/',$width=1920, $height=650);
                $data['slider_image_secondary'] = $this->imageSliderStore($request->slider_image, $directory='images/sliders/secondary/',$width=100, $height=58);
            }
            $data['text_alignment']      = $request->text_alignment;
            $data['text_color']      = $request->text_color;
            $data['is_active']      = $request->is_active;

            $sliderTranslation = [];
            $sliderTranslation['locale']          = Session::get('currentLocal');
            $sliderTranslation['slider_title']    = htmlspecialchars($request->slider_title);
            $sliderTranslation['slider_subtitle'] = htmlspecialchars($request->slider_subtitle);

            DB::beginTransaction();
            try {
                $slider->update($data);

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

    public function active(Request $request){
        if ($request->ajax()){
            if (env('USER_VERIFIED')!=1) {
                return response()->json(['errors' => ['Disabled for demo !']]);
            }
            return $this->activeData(Slider::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            if (env('USER_VERIFIED')!=1) {
                return response()->json(['errors' => ['Disabled for demo !']]);
            }
            return $this->inactiveData(Slider::find($request->id));
        }
    }

    public function bulkAction(Request $request)
    {
        if ($request->ajax()) {
            if (env('USER_VERIFIED')!=1) {
                return response()->json(['errors' => ['Disabled for demo !']]);
            }
            return $this->bulkActionData($request->action_type, Slider::whereIn('id',$request->idsArray));
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            if (env('USER_VERIFIED')!=1) {
                return response()->json(['errors' => ['Disabled for demo !']]);
            }
            $slider = Slider::find($request->slider_id);
            $this->deleteWithImage($slider, $slider->slider_image); //half width
            $this->deleteWithImage($slider, $slider->slider_image_full_width);
            $this->deleteWithImage($slider, $slider->slider_image_secondary);

            return response()->json(['success' => '<p><b>Data Deleted Successfully.</b></p>']);
        }
    }
}
