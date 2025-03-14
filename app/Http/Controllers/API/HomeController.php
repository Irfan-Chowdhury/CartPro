<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SettingResource;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\FooterDescription;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Setting;
use App\Models\StorefrontImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = self::getSliders();

        $settings = self::getSettingData();

        $sliderBanners = $this->getSliderBanner($settings);

        $storefrontImages = self::getStorefrontImages();

        $homeFooterDescription = FooterDescription::where('locale','en')->select('is_active','description')->first();

        $orderDetailProducts = self::getOrderDetailsProduct();

        $changeCurrencyRate = Session::has('currency_rate') ? Session::get('currency_rate') : 1;

        $productDetailsTab = self::getProductTabsData($settings);

        $homeData = (object) [
            'sliders' => $sliders,
            'sliderBanners' => $sliderBanners,
            'storefrontImages'  => [
                'oneColumnBannerImage' => $storefrontImages['oneColumnBannerImage']
            ],
            'settings' => [
                'oneColumnBanner' => [
                    'oneColumnBannerEnabled'   => $settings->storefront_one_column_banner_enabled->plain_value,
                    'oneColumnBannerCallToActionURL'   => $settings->storefront_one_column_banner_call_to_action_url->plain_value,
                    'storefrontOneColumnBannerOpenInNewWindow'   => $settings->storefront_one_column_banner_open_in_new_window->plain_value
                ],
                'storefrontFeature' => [
                    'sectionStatus' => $settings->storefront_section_status->plain_value ?? null,
                    'features' => [
                        [
                            'icon' => $settings->storefront_feature_1_icon->plain_value ?? null,
                            'title' => $settings->storefront_feature_1_title->value ?? null,
                            'subtitle' => $settings->storefront_feature_1_subtitle->value ?? null,
                        ],
                        [
                            'icon' => $settings->storefront_feature_2_icon->plain_value ?? null,
                            'title' => $settings->storefront_feature_2_title->value ?? null,
                            'subtitle' => $settings->storefront_feature_2_subtitle->value ?? null,
                        ],
                        [
                            'icon' => $settings->storefront_feature_3_icon->plain_value ?? null,
                            'title' => $settings->storefront_feature_3_title->value ?? null,
                            'subtitle' => $settings->storefront_feature_3_subtitle->value ?? null,
                        ],
                        [
                            'icon' => $settings->storefront_feature_4_icon->plain_value ?? null,
                            'title' => $settings->storefront_feature_4_title->value ?? null,
                            'subtitle' => $settings->storefront_feature_4_subtitle->value ?? null,
                        ]
                    ]
                ]
            ],
            'homeFooterDescription' => $homeFooterDescription,
            'trendProducts' => $orderDetailProducts,
            'changeCurrencyRate' => $changeCurrencyRate,
            'productDetailsTab' => $productDetailsTab
        ];

        return new HomeResource($homeData);

    }

    private function getSliders()
    {
        return DB::table('sliders')
        ->select([
            'sliders.id',
            'sliders.slider_slug',
            'sliders.type',
            'sliders.category_id',
            'sliders.url',
            'sliders.slider_image',
            'sliders.slider_image_full_width',
            'sliders.slider_image_secondary',
            'sliders.target',
            'sliders.text_alignment',
            'sliders.text_color',
            'sliders.is_active',
            'slider_translations.slider_title',
            'slider_translations.slider_subtitle'
        ])
        ->join('slider_translations', 'slider_translations.slider_id', '=', 'sliders.id')
        ->where('slider_translations.locale', 'en')
        ->orderBy('sliders.is_active', 'DESC')
        ->orderBy('sliders.id', 'ASC')
        ->get();
    }

    protected function getSliderBanner($settings)
    {
        $slider_banners = [];

        for ($i=0; $i < 3; $i++) {
            $keyTitle = "storefront_slider_banner_" . ($i + 1) . "_title";
            $keyImage = "storefront_slider_banner_" . ($i + 1) . "_image";
            $keyActionUrl ='storefront_slider_banner_'.($i+1).'_call_to_action_url';
            $keyNewWindow ='storefront_slider_banner_'.($i+1).'_open_in_new_window';


            $slider_banners[$i]['title'] = $settings->$keyTitle->value ?? null;
            $slider_banners[$i]['image'] = $settings->$keyImage->storeFrontImage->image ?? null;
            $slider_banners[$i]['action_url'] = $settings->$keyActionUrl->plain_value ?? null;
            $slider_banners[$i]['new_window'] = $settings->$keyNewWindow->plain_value ?? null;
        }
        return $slider_banners;
    }

    private function getSettingData()
    {
        $settingsData = Setting::with(['translations','storeFrontImage'])
                        ->get()
                        ->keyBy('key');

        $settingArrray = SettingResource::collection($settingsData)->collection->keyBy('key')->toArray();
        $settings = json_decode(json_encode($settingArrray), FALSE);

        return $settings;
    }

    private function getStorefrontImages()
    {
        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');
        $oneColumnBannerImage = file_exists($storefrontImages['one_column_banner_image']->image) ? url($storefrontImages['one_column_banner_image']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';

        return [
            'oneColumnBannerImage' => $oneColumnBannerImage,
        ];
    }

    private function getOrderDetailsProduct()
    {
        $orderDetailProducts = OrderDetail::with([
            'product.translations',
            'orderProductTranslations',
            'baseImage',
            // 'additionalImage',
            // 'productAttributeValues.attributeTranslation',
            // 'productAttributeValues.attrValueTranslation'
        ])
        ->select('product_id')
        ->groupBy('product_id')
        ->selectRaw('SUM(qty) AS qty_of_sold')
        ->orderBy('qty_of_sold','DESC')
        ->skip(0)
        ->take(10)
        ->get()
        ->map(function($orderDetails){
            return [
                'productId' => $orderDetails->product_id,
                'name' => $orderDetails->product->translation->product_name,
                'slug' => $orderDetails->product->slug,
                'price' => $orderDetails->product->price,
                'isActive' => $orderDetails->product->is_active,
                'categoryId' => $orderDetails->product->categoryProduct[0]->category_id,
                'manageStock' => $orderDetails->product->manage_stock,
                'qty' => $orderDetails->product->qty,
                'inStock' => $orderDetails->product->in_stock,
                'newTo' => $orderDetails->product->new_to,
                'avgRating' => $orderDetails->product->avg_rating,
                'specialPrice' => $orderDetails->product->special_price,
                // 'mediumImage' => $orderDetails->baseImage->image_medium,
                'mediumImage' => file_exists(public_path($orderDetails->baseImage->image_medium)) ? asset($orderDetails->baseImage->image_medium) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
            ];
        });

        return json_decode(json_encode($orderDetailProducts), FALSE);

    }

    private function getProductTabsData($settings)
    {
        $productTabs = [];
        $categoryIds = [];

        for ($i=0; $i < 4; $i++) {
            $keyTitle = "storefront_product_tabs_1_section_tab_" . ($i + 1) . "_title";
            $keyProductType = "storefront_product_tabs_1_section_tab_" . ($i + 1) . "_product_type";
            $keyCategoryId = "storefront_product_tabs_1_section_tab_" . ($i + 1) . "_category_id";

            $productTabs[$i]['key'] = $keyTitle;
            $productTabs[$i]['title'] = $settings->$keyTitle->value ?? null;
            $productTabs[$i]['keyProductType'] = $settings->$keyProductType->plain_value ?? null;
            $productTabs[$i]['keyCategoryId'] = $settings->$keyCategoryId->plain_value ?? null;
            $categoryIds[] = $settings->$keyCategoryId->plain_value ?? null;
        }

        $categoryWithProducts = Category::with([
                                'translations',
                                'products.translations',
                                'products.baseImage',
                                'products.additionalImage'
                            ])
                            ->whereIn('id', $categoryIds)
                            ->get()
                            ->map(function($category){
                                return [
                                    'categoryId' => $category->id,
                                    'slug' => $category->slug,
                                    'isActive'  => $category->is_active,
                                    'categoryName' => $category->translation->category_name,
                                    'products' => $category->products->map(function($product){
                                        return [
                                            'productId' => $product->id,
                                            'name' => $product->translation->product_name,
                                            'slug' => $product->slug,
                                            'price' => $product->price,
                                            'manageStock' => $product->manage_stock,
                                            'qty' => $product->qty,
                                            'inStock' => $product->in_stock,
                                            'newTo' => $product->new_to,
                                            'avgRating' => $product->avg_rating,
                                            'specialPrice' => $product->special_price,
                                            'isActive' => $product->is_active,
                                            'image' => file_exists(public_path($product->baseImage->image)) ? asset($product->baseImage->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                                            'mediumImage' => file_exists(public_path($product->baseImage->image_medium)) ? asset($product->baseImage->image_medium) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                                        ];
                                    })
                                ];
                            });


        // $categoryWithProducts = json_decode(json_encode($categoryWithProducts), FALSE);


        foreach ($categoryWithProducts as $key => $category) {
            if($category['categoryId'] == $categoryIds[$key]) {
                $productTabs[$key]['categoryWithProducts'] = $category;
            }
        }

        return [
            'section_enabled' => $settings->storefront_product_tabs_1_section_enabled->plain_value,
            'productTabs' => $productTabs,
        ];
    }



}
