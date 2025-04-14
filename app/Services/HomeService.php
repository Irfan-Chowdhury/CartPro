<?php

namespace App\Services;

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
use Illuminate\Support\Facades\Cache;

class HomeService
{

    public function getHomeData()
    {
        $sliders = self::getSliders();

        $settings = self::getSettingData();

        $sliderBanners = $this->getSliderBanner($settings);

        $storefrontImages = self::getStorefrontImages();

        $threeColumnBanner = self::getThreeColumnBanner($settings);

        $twoColumnBanner = self::getTwoColumnBanner($settings);

        $oneColumnBanner = self::getOneColumnBanner($settings);

        $homeFooterDescription = FooterDescription::where('locale','en')->select('is_active','description')->first();

        $orderDetailProducts = self::getOrderDetailsProduct();

        $changeCurrencyRate = Session::has('currency_rate') ? Session::get('currency_rate') : 1;

        $productDetailsTab = self::getProductTabsData($settings);

        $arrayData = [
            'sliders' => $sliders,
            'sliderBanners' => $sliderBanners,
            'storefrontImages'  => [
                'oneColumnBannerImage' => $storefrontImages['oneColumnBannerImage']
            ],
            'categories' => self::getCategories(),
            'settings' => [
                'oneColumnBanner' => [
                    'oneColumnBannerEnabled'   => $settings->storefront_one_column_banner_enabled->plain_value,
                    'oneColumnBannerCallToActionURL'   => $settings->storefront_one_column_banner_call_to_action_url->plain_value,
                    'storefrontOneColumnBannerOpenInNewWindow'   => $settings->storefront_one_column_banner_open_in_new_window->plain_value
                ],
                'threeColumnBanner' => [ //web
                    'isThreeColumnBannerFullEnabled' => (boolean) $settings->storefront_three_column_full_width_banners_enabled->plain_value,
                    'banners' => $threeColumnBanner
                ],
                'twoColumnBanner' => [ //web
                    'isTwoColumnBannerFullEnabled' => (boolean) $settings->storefront_two_column_banner_enabled->plain_value,
                    'banners' => $twoColumnBanner
                ],
                'oneColumnBannerAgain' => $oneColumnBanner, //web
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
                ],
                'storeFrontSliderFormat' => $settings->store_front_slider_format->plain_value ?? 'full_width', //web
                'isTopCategorySectionEnabled' => (boolean) $settings->storefront_top_categories_section_enabled->plain_value, //web
            ],
            'homeFooterDescription' => $homeFooterDescription,
            'trendProducts' => $orderDetailProducts,
            'changeCurrencyRate' => $changeCurrencyRate,
            'productDetailsTab' => $productDetailsTab
        ];

        return self::arrayToObject($arrayData);
    }

    public function getSliders()
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

    public function getSliderBanner($settings)
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

        return self::arrayToObject($slider_banners);
    }

    public function getThreeColumnBanner($settings)
    {
        $threeColumnBanner = [];

        for ($i=0; $i < 3; $i++) {
            $keyActionUrl ='storefront_slider_banner_'.($i+1).'_call_to_action_url';
            $keyNewWindow ='storefront_slider_banner_'.($i+1).'_open_in_new_window';
            $keyImage = "storefront_three_column_full_width_banners_image_" . ($i + 1) ;

            $threeColumnBanner[$i]['actionUrl'] = $settings->$keyActionUrl->plain_value ?? null;
            $threeColumnBanner[$i]['isNewWindow'] = (boolean) $settings->$keyNewWindow->plain_value;
            $threeColumnBanner[$i]['image'] = $settings->$keyImage->storeFrontImage->image ?? null;
        }

        return self::arrayToObject($threeColumnBanner);
    }
    public function getTwoColumnBanner($settings)
    {
        $twoColumnBanner = [];

        for ($i=0; $i < 2; $i++) {
            $keyActionUrl ='storefront_two_column_banners_'.($i+1).'_call_to_action_url';
            $keyNewWindow ='storefront_two_column_banners_'.($i+1).'_open_in_new_window';
            $keyImage = "storefront_two_column_banner_image_" . ($i + 1) ;

            $twoColumnBanner[$i]['actionUrl'] = $settings->$keyActionUrl->plain_value ?? null;
            $twoColumnBanner[$i]['isNewWindow'] = (boolean) $settings->$keyNewWindow->plain_value;
            $twoColumnBanner[$i]['image'] = $settings->$keyImage->storeFrontImage->image ?? null;
        }

        return self::arrayToObject($twoColumnBanner);
    }
    public function getOneColumnBanner($settings)
    {
        $keyActionUrl ='storefront_one_column_banner_call_to_action_url';
        $keyNewWindow ='storefront_one_column_banner_open_in_new_window';
        $keyImage = "storefront_one_column_banner_image" ;

        $oneColumnBanner = [
            'isOneColumnBannerEnabled' =>  (boolean) $settings->storefront_one_column_banner_enabled->plain_value,
            'actionUrl' => $settings->$keyActionUrl->plain_value ?? null,
            'isNewWindow' => (boolean) $settings->$keyNewWindow->plain_value,
            'image' => $settings->$keyImage->storeFrontImage->image ?? null,
        ];

        return self::arrayToObject($oneColumnBanner);
    }

    public function getSettingData()
    {
        return app('setting');
        // $settingsData = Setting::with(['translations','storeFrontImage'])
        //                 ->get()
        //                 ->keyBy('key');

        // $settingArrray = SettingResource::collection($settingsData)->collection->keyBy('key')->toArray();
        // $settings = json_decode(json_encode($settingArrray), FALSE);

        // return $settings;
    }


    public function getCategories()
    {
        return Category::with(['translations','parentCategory.translations'])
            ->orderBy('is_active','DESC')
            ->orderBy('id','ASC')
            ->where('top',1)
            ->get()
            ->map(function($category) {
                return (object) [
                    'id'=> $category->id,
                    'slug'=> $category->slug,
                    'image'=> $category->image,
                    'is_active'=> $category->is_active,
                    'name'=> $category->translation->category_name,
                    'parentName'=> $category->parentTranslation->category_name ?? 'NONE',
                ];
            });
    }

    public function getStorefrontImages()
    {
        $storefrontImages = StorefrontImage::select('title','type','image')->get()->keyBy('title');
        $oneColumnBannerImage = file_exists($storefrontImages['one_column_banner_image']->image) ? url($storefrontImages['one_column_banner_image']->image) :  'https://dummyimage.com/1170x60/12787d/ffffff&text=CartPro';

        return [
            'oneColumnBannerImage' => $oneColumnBannerImage,
        ];
    }

    public function getProductTabsData($settings)
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
                                'products.additionalImage',
                                'products.brand' => function ($q) {
                                    $q->select('id', 'slug', 'name');
                                },
                                'products.attributes' => function ($q) {
                                    $q->select('id', 'name')
                                      ->with(['attributeValues:id,attribute_id,name']);
                                }
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
                                            'shortDescription' => $product->translation->short_description,
                                            'slug' => $product->slug,
                                            'sku' => $product->sku,
                                            'price' => $product->price,
                                            'manageStock' => $product->manage_stock,
                                            'qty' => $product->qty,
                                            'inStock' => $product->in_stock,
                                            'newTo' => $product->new_to,
                                            'avgRating' => $product->avg_rating,
                                            'specialPrice' => $product->special_price,
                                            'isActive' => $product->is_active,
                                            'brand' => $product->brand,
                                            'image' => file_exists(public_path($product->baseImage->image)) ? asset($product->baseImage->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                                            'mediumImage' => file_exists(public_path($product->baseImage->image_medium)) ? asset($product->baseImage->image_medium) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                                            'additionalImage' => $product->additionalImage,
                                            'attributes' => $product->attributes->map(function($attribute) {
                                                return [
                                                    'attributeId' => $attribute->id,
                                                    'name' => $attribute->name,
                                                    'attributeValues' => $attribute->attributeValues->map(function($value) {
                                                        return [
                                                            'attributeValueId' => $value->id,
                                                            'name' => $value->name,
                                                        ];
                                                    }),
                                                ];
                                            })
                                        ];
                                    })
                                ];
                            });

        foreach ($categoryWithProducts as $key => $category) {
            if($category['categoryId'] == $categoryIds[$key]) {
                $productTabs[$key]['categoryWithProducts'] = $category;
            }
        }


        return self::arrayToObject( [
            'isSectionEnabled' => (boolean) $settings->storefront_product_tabs_1_section_enabled->plain_value,
            'productTabs' => $productTabs,
        ]);
    }


    public function getOrderDetailsProduct()
    {
        $orderDetailProducts = OrderDetail::with([
            'product.translations',
            'product.categories:id,slug,name',
            'baseImage',
            'additionalImage',
            'product.brand',
            'product.attributes' => function ($q) {
                $q->select('id', 'name')
                  ->with(['attributeValues:id,attribute_id,name']);
            }
        ])
        ->select('product_id', DB::raw('SUM(qty) as qty_of_sold'))
        ->groupBy('product_id')
        ->orderBy('qty_of_sold','DESC')
        ->skip(0)
        ->take(10)
        ->get()
        ->map(function($orderDetail){
            return [
                'category' => $orderDetail->product->categories->first(),
                'productId' => $orderDetail->product_id,
                'name' => $orderDetail->product->translation->product_name,
                'shortDescription' => $orderDetail->product->translation->short_description,
                'slug' => $orderDetail->product->slug,
                'sku' => $orderDetail->product->sku,
                'price' => $orderDetail->product->price,
                'manageStock' => $orderDetail->product->manage_stock,
                'qty' => $orderDetail->product->qty,
                'inStock' => $orderDetail->product->in_stock,
                'newTo' => $orderDetail->product->new_to,
                'avgRating' => $orderDetail->product->avg_rating,
                'specialPrice' => $orderDetail->product->special_price,
                'isActive' => $orderDetail->product->is_active,
                'brand' => optional($orderDetail->product->brand)->only(['id', 'slug', 'name']),
                'image' => file_exists(public_path($orderDetail->baseImage->image)) ? asset($orderDetail->baseImage->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                'mediumImage' => file_exists(public_path($orderDetail->baseImage->image_medium)) ? asset($orderDetail->baseImage->image_medium) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                'additionalImage' => $orderDetail->additionalImage->map(function($item) {
                    return [
                        'image' => $item->image,
                        'mediumImage' => $item->image_medium,
                        'smallImage' => $item->image_small,
                    ];
                }),
                'attributes' => $orderDetail->product->attributes->map(function($attribute) {
                    return [
                        'attributeId' => $attribute->id,
                        'name' => $attribute->name,
                        'attributeValues' => $attribute->attributeValues->map(function($value) {
                            return [
                                'attributeValueId' => $value->id,
                                'name' => $value->name,
                            ];
                        }),
                    ];
                })
            ];
        });

        return self::arrayToObject($orderDetailProducts);
    }


    public function arrayToObject($array)
    {
        return json_decode(json_encode($array), false);
    }

}

