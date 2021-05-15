<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageTranslation;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SettingTranslation;
use App\Models\Slider;
use App\Models\StorefrontGeneral;
use App\Models\StorefrontImage;
use App\Models\StorefrontMenu;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageHandleTrait;

use function GuzzleHttp\json_decode;

class StoreFrontController extends Controller
{
    use imageHandleTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $locale = Session::get('currentLocal');
        $colors = $this->color();

        $setting = Setting::with(['settingTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale)
            ->orWhere('locale','en')
            ->orderBy('id','DESC');
        }])->get();

        // return $setting;

        $pages = Page::with(['pageTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale)
            ->orWhere('locale','en')
            ->orderBy('id','DESC');
        }])
        ->where('is_active',1)
        ->get();

        //change local
        $products = Product::with(['productTranslation'=> function ($query) use ($locale){
            $query->where('local',$locale)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        $menus = Menu::with(['menuTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale)
                ->orWhere('locale','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        $tags = Tag::with(['tagTranslation'=> function ($query) use ($locale){
            $query->where('local',$locale)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
        }])
        ->where('is_active',1)
        ->get();

        $storefront_images = StorefrontImage::select('title','type','image')->get();
        $total_storefront_images = count($storefront_images);


        $array_tags = Setting::where('key','storefront_footer_tag_id')->pluck('plain_value');
        if ($array_tags[0] == NULL) {
            $array_footer_tags = [];
        }else {
            $array_footer_tags = json_decode($array_tags[0]);
        }
        

        return view('admin.pages.storefront.index',compact('locale','colors','setting','pages','products','menus','storefront_images',
                        'tags','total_storefront_images','array_footer_tags'));
    }

    public function generalStore(Request $request)
    {
        $locale = Session::get('currentLocal');

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key === 'storefront_welcome_text' || $key === 'storefront_address') {
                    $setting = Setting::where('key',$key)->first();
                    SettingTranslation::UpdateOrCreate(
                        ['setting_id'=>$setting->id, 'locale' => $locale],
                        ['value' => $value]
                    );
                }
                else{
                    Setting::where('key',$key)->update(['plain_value'=>$value]);
                }
            }
            //return response()->json($data);

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function menuStore(Request $request)
    {
        $locale = Session::get('currentLocal');

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key === 'storefront_navbar_text' || $key ==='storefront_footer_menu_title_one' || $key ==='storefront_footer_menu_title_two') {
                    $setting = Setting::where('key',$key)->first();
                    SettingTranslation::UpdateOrCreate(
                        ['setting_id'=>$setting->id, 'locale' => $locale],
                        ['value' => $value]
                    );
                }
                else{
                    Setting::where('key',$key)->update(['plain_value'=>$value]);
                }
            }

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function socialLinkStore(Request $request)
    {
        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                Setting::where('key',$key)->update(['plain_value'=>$value]);
            }

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function featureStore(Request $request)
    {
        $locale = Session::get('currentLocal');

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if (
                    $key === 'storefront_feature_1_title' || $key ==='storefront_feature_1_subtitle' ||
                    $key === 'storefront_feature_2_title' || $key ==='storefront_feature_2_subtitle' ||
                    $key === 'storefront_feature_3_title' || $key ==='storefront_feature_3_subtitle' ||
                    $key === 'storefront_feature_4_title' || $key ==='storefront_feature_4_subtitle' ||
                    $key === 'storefront_feature_5_title' || $key ==='storefront_feature_5_subtitle'
                    ) {
                    $setting = Setting::where('key',$key)->first();
                    SettingTranslation::UpdateOrCreate(
                        ['setting_id'=>$setting->id, 'locale' => $locale],
                        ['value' => $value]
                    );
                }
                else if($key=='storefront_section_status'){
                    continue;
                }
                else{
                    Setting::where('key',$key)->update(['plain_value'=>$value]);
                }
            }

            if (!empty($request->storefront_section_status)) {
                Setting::where('key','storefront_section_status')->update(['plain_value'=>1]);
            }else {
                Setting::where('key','storefront_section_status')->update(['plain_value'=>0]);
            }
            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function logoStore(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'image_favicon_logo' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'image_header_logo'  => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'image_mail_logo'    => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $directory  ='/images/storefront/logo/';

        if ($request->title_favicon_logo=="favicon_logo" && (!empty($request->image_favicon_logo))) {
            StorefrontImage::updateOrCreate(
                    [ 'title' => $request->title_favicon_logo, 'type' => 'logo'],
                    [ 'image' => $this->imageStore($request->image_favicon_logo,$directory)]
                );
        }
        if ($request->title_header_logo=="header_logo" && (!empty($request->image_header_logo))) {
            StorefrontImage::updateOrCreate(
                    [ 'title' => $request->title_header_logo, 'type' => 'logo'],
                    [ 'image' => $this->imageStore($request->image_header_logo,$directory)]
                );
        }
        if ($request->title_mail_logo=="mail_logo" && (!empty($request->image_mail_logo))) {
            StorefrontImage::updateOrCreate(
                    [ 'title' => $request->title_mail_logo, 'type' => 'logo'],
                    [ 'image' => $this->imageStore($request->image_mail_logo,$directory)]
                );
        }
        return response()->json(['success' => __('Data Saved successfully.')]);


    }

    public function footerStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'storefront_payment_method_image' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $locale = Session::get('currentLocal');
        $directory  ='/images/storefront/payment_method/';

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key === 'storefront_copyright_text') {
                    $setting = Setting::where('key',$key)->first();
                    SettingTranslation::UpdateOrCreate(
                        ['setting_id'=>$setting->id, 'locale' => $locale],
                        ['value' => $value]
                    );
                }
                elseif ($key === 'storefront_payment_method_image') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'accepted_payment_method_image', 'type' => 'payment_method'],
                        [ 'image' => $this->imageStore($request->storefront_payment_method_image, $directory)]
                    );
                }
                else{
                    Setting::where('key',$key)->update(['plain_value'=>json_encode($value)]);
                }
            }

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function newletterStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'storefront_newsletter_image' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if (request()->ajax()) {
            $directory  ='/images/storefront/newsletter/';

            if ((!empty($request->storefront_newsletter_image))) {
                StorefrontImage::updateOrCreate(
                        [ 'title' => 'newsletter_background_image', 'type' => 'newletter'],
                        [ 'image' => $this->imageStore($request->storefront_newsletter_image, $directory)]
                    );
            }

            return response()->json(['success' => __('Data Saved successfully.')]);
        }
    }


    public function productPageStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'storefront_product_page_image' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $directory  ='/images/storefront/product_page/';

        if ($request->ajax()) {
            if ($request->storefront_product_page_image) {
                StorefrontImage::updateOrCreate(
                        [ 'title' => 'product_page_banner', 'type' => 'product_page'],
                        [ 'image' => $this->imageStore($request->storefront_product_page_image, $directory)]
                    );
            }

            if ($request->storefront_call_action_url) {
                Setting::where('key','storefront_open_new_window')->update(['plain_value'=>$request->storefront_call_action_url]);
            }

            if (!empty($request->storefront_open_new_window)) {
                Setting::where('key','storefront_open_new_window')->update(['plain_value'=>1]);
            }else {
                Setting::where('key','storefront_open_new_window')->update(['plain_value'=>0]);
            }

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function sliderBannersStore(Request $request)
    {
        //return response()->json([$request->all()]);

        $validator = Validator::make($request->all(),[
            'storefront_slider_banner_1_image' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'storefront_slider_banner_2_image' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $directory  ='/images/storefront/slider_banners/';

        if ($request->ajax()) {

            if (!empty($request->storefront_slider_banner_1_image)) {
                StorefrontImage::updateOrCreate(
                        [ 'title' => 'slider_banner_1', 'type' => 'slider_banner'],
                        [ 'image' => $this->imageStore($request->storefront_slider_banner_1_image, $directory)]
                    );
            }
            if (!empty($request->storefront_slider_banner_2_image)) {
                StorefrontImage::updateOrCreate(
                        [ 'title' => 'slider_banner_2', 'type' => 'slider_banner'],
                        [ 'image' => $this->imageStore($request->storefront_slider_banner_2_image, $directory)]
                    );
            }

            foreach ($request->all() as $key => $value) {
                if ($key=='storefront_slider_banner_1_image' || $key=='storefront_slider_banner_2_image' ) {
                    continue;
                }
                Setting::where('key', $key)->update(['plain_value' => $value]);
            }

            if (!$request->storefront_slider_banner_1_open_in_new_window) {
                Setting::where('key', 'storefront_slider_banner_1_open_in_new_window')->update(['plain_value' => 0]);
            }
            if ((!$request->storefront_slider_banner_2_open_in_new_window)) {
                Setting::where('key', 'storefront_slider_banner_2_open_in_new_window')->update(['plain_value' => 0]);
            }

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function oneColumnBannerStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'storefront_one_column_banner_image' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $directory  ='/images/storefront/one_column_banner/';

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key=='storefront_one_column_banner_image') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'one_column_banner_image', 'type' => 'one_column_banner'],
                        [ 'image' => $this->imageStore($request->storefront_one_column_banner_image, $directory)]
                    );
                }
                else {
                    Setting::where('key', $key)->update(['plain_value' => $value]);
                }

                if (!$request->storefront_one_column_banner_enabled) {
                    Setting::where('key','storefront_one_column_banner_enabled')->update(['plain_value' => 0]);
                }
                if (!$request->storefront_one_column_banner_open_in_new_window) {
                    Setting::where('key','storefront_one_column_banner_open_in_new_window')->update(['plain_value' => 0]);
                }
                
            }
            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function twoColumnBannersStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'storefront_two_column_banner_image_1' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'storefront_two_column_banner_image_2' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $directory  ='/images/storefront/two_column_banners/';

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key=='storefront_two_column_banner_image_1') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'two_column_banner_image_1', 'type' => 'two_column_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                elseif ($key=='storefront_two_column_banner_image_2') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'two_column_banner_image_2', 'type' => 'two_column_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                else {
                    Setting::where('key', $key)->update(['plain_value' => $value]);
                }                
            }
            
            if (!$request->storefront_two_column_banner_enabled) {
                Setting::where('key','storefront_two_column_banner_enabled')->update(['plain_value' => 0]);
            }
            if (!$request->storefront_two_column_banners_1_open_in_new_window) {
                Setting::where('key','storefront_two_column_banners_1_open_in_new_window')->update(['plain_value' => 0]);
            }
            if (!$request->storefront_two_column_banners_2_open_in_new_window) {
                Setting::where('key','storefront_two_column_banners_2_open_in_new_window')->update(['plain_value' => 0]);
            }

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function threeColumnBannersStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'storefront_three_column_banners_image_1' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'storefront_three_column_banners_image_2' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'storefront_three_column_banners_image_3' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $directory  ='/images/storefront/three_column_banners/';

        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key=='storefront_three_column_banners_image_1') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'three_column_banners_image_1', 'type' => 'three_column_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                elseif ($key=='storefront_three_column_banners_image_2') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'three_column_banners_image_2', 'type' => 'three_column_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                elseif ($key=='storefront_three_column_banners_image_3') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'three_column_banners_image_3', 'type' => 'three_column_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                else {
                    Setting::where('key', $key)->update(['plain_value' => $value]);
                }                
            }

            
            if (!$request->storefront_three_column_banners_enabled) {
                Setting::where('key','storefront_three_column_banners_enabled')->update(['plain_value' => 0]);
            }
            if (!$request->storefront_three_column_banners_1_open_in_new_window) {
                Setting::where('key','storefront_three_column_banners_1_open_in_new_window')->update(['plain_value' => 0]);
            }
            if (!$request->storefront_three_column_banners_2_open_in_new_window) {
                Setting::where('key','storefront_three_column_banners_2_open_in_new_window')->update(['plain_value' => 0]);
            }
            if (!$request->storefront_three_column_banners_3_open_in_new_window) {
                Setting::where('key','storefront_three_column_banners_3_open_in_new_window')->update(['plain_value' => 0]);
            }

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }

    public function threeColumnFllWidthBannersStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'storefront_three_column_full_width_banners_background_image' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'storefront_three_column_full_width_banners_image_1' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'storefront_three_column_full_width_banners_image_2' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
            'storefront_three_column_full_width_banners_image_3' => 'image|max:10240|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $directory  ='/images/storefront/three_column_full_width_banners/';


        if ($request->ajax()) {
            foreach ($request->all() as $key => $value) {
                if ($key=='storefront_three_column_full_width_banners_background_image') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'three_column_full_width_banners_background_image', 'type' => 'three_column_full_width_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                elseif ($key=='storefront_three_column_full_width_banners_image_1') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'three_column_full_width_banners_image_1', 'type' => 'three_column_full_width_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                elseif ($key=='storefront_three_column_full_width_banners_image_2') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'three_column_full_width_banners_image_2', 'type' => 'three_column_full_width_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                elseif ($key=='storefront_three_column_full_width_banners_image_3') {
                    StorefrontImage::updateOrCreate(
                        [ 'title' => 'three_column_full_width_banners_image_3', 'type' => 'three_column_full_width_banners'],
                        [ 'image' => $this->imageStore($value, $directory)]
                    );
                }
                else {
                    Setting::where('key', $key)->update(['plain_value' => $value]);
                }                
            }

            
            if (!$request->storefront_three_column_full_width_banners_enabled) {
                Setting::where('key','storefront_three_column_full_width_banners_enabled')->update(['plain_value' => 0]);
            }
            if (!$request->storefront_three_column_full_width_banners_1_open_in_new_window) {
                Setting::where('key','storefront_three_column_full_width_banners_1_open_in_new_window')->update(['plain_value' => 0]);
            }
            if (!$request->storefront_three_column_full_width_banners_2_open_in_new_window) {
                Setting::where('key','storefront_three_column_full_width_banners_2_open_in_new_window')->update(['plain_value' => 0]);
            }
            if (!$request->storefront_three_column_full_width_banners_3_open_in_new_window) {
                Setting::where('key','storefront_three_column_full_width_banners_3_open_in_new_window')->update(['plain_value' => 0]);
            }

            return response()->json(['success'=>'Data Saved Successfully']);
        }
    }



    protected function color()
    {
        $colors = array(
            [
                'color_name' => 'Blue'
            ],
            [
                'color_name' => 'Black'
            ],
            [
                'color_name' => 'Red'
            ],
            [
                'color_name' => 'Yellow'
            ],
            [
                'color_name' => 'Green'
            ],
            [
                'color_name' => 'Orange'
            ],
            [
                'color_name' => 'Pink'
            ],
        );

        return $colors;
    }
}

