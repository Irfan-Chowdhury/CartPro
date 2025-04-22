<?php
namespace App\Services;

use App\Contracts\FlashSale\FlashSaleContract;
use App\Contracts\FlashSale\FlashSaleProductContract;
use App\Contracts\FlashSale\FlashSaleTranslationContract;
use App\Models\Category;
use App\Models\FlashSale;
use App\Traits\ArrayToObjectConvertionTrait;
use App\Utilities\Message;

class FlashSaleService extends Message
{
    use ArrayToObjectConvertionTrait;

    private $flashSaleContract, $flashSaleTranslationContract, $flashSaleProductContract;
    public function __construct(FlashSaleContract $flashSaleContract, FlashSaleTranslationContract $flashSaleTranslationContract, FlashSaleProductContract $flashSaleProductContract){
        $this->flashSaleContract = $flashSaleContract;
        $this->flashSaleTranslationContract = $flashSaleTranslationContract;
        $this->flashSaleProductContract = $flashSaleProductContract;
    }

    public function activeById($id){
        if (!auth()->user()->can('flash_sale-action')){
            return Message::getPermissionMessage();
        }
        $this->flashSaleContract->active($id);
        return Message::activeSuccessMessage();
    }

    public function inactiveById($id){
        if (!auth()->user()->can('flash_sale-action')){
            return Message::getPermissionMessage();
        }
        $this->flashSaleContract->inactive($id);
        return Message::inactiveSuccessMessage();
    }

    public function destroy($id)
    {
        if (!auth()->user()->can('flash_sale-action')){
            return Message::getPermissionMessage();
        }
        $this->flashSaleContract->destroy($id);
        $this->flashSaleTranslationContract->destroy($id);
        $this->flashSaleProductContract->destroy($id);
        return Message::deleteSuccessMessage();
    }

    public function bulkActionByTypeAndIds($type, $ids)
    {
        if (!auth()->user()->can('flash_sale-action')){
            return Message::getPermissionMessage();
        }
        if ($type=='delete') {
            $this->flashSaleContract->bulkAction($type, $ids);
            $this->flashSaleTranslationContract->bulkAction($type, $ids);
            $this->flashSaleProductContract->bulkAction($type, $ids);
            return Message::deleteSuccessMessage();
        }else{
            $this->flashSaleContract->bulkAction($type, $ids);
            return $type=='active' ? Message::activeSuccessMessage() : Message::inactiveSuccessMessage();
        }
    }

    public function getFlashSales()
    {
        $query = FlashSale::with('translations')
        ->where('is_active',1)
        ->get()
        ->map(function($flashSale){
            return [
                'id' => $flashSale->id,
                'slug' => $flashSale->slug,
                'is_active' => $flashSale->is_active,
                'campaign_name' => $flashSale->translation->campaign_name ?? null,
            ];
        });

        return $this->arrayToObject($query);
    }

    public function getFlashSaleById(int $id)
    {
        $now = now();
        $flashSale = FlashSale::with(['translations' => function($query): void {
                        $query->select('id','flash_sale_id','local','campaign_name');
                    }
                    ,'flashSaleProducts' => function($query) use ($now) {
                        $query->select('flash_sale_id','product_id','price','qty','end_date')
                                ->where('end_date', '>=', $now)
                                ->where('qty', '>', 0)
                                ->with(['product' => function($query) {
                                    $query->with([
                                        'categories:id,slug,name',
                                        'brand:id,slug,name',
                                        'tags:id,slug,name',
                                        'baseImage',
                                        'additionalImage'=> function ($query){
                                            $query->where('type','additional')
                                                ->get();
                                        },
                                        'attributes' => function ($q) {
                                            $q->select('id', 'name')
                                            ->with(['attributeValues:id,attribute_id,name']);
                                        }
                                    ]);
                                }]);
                    }])
                    ->where('is_active',1)
                    ->where('id',$id)
                    ->first();

        $result = (object) [
            'id'=> $flashSale->id,
            'slug'=> $flashSale->slug,
            'name'=> $flashSale->translation->campaign_name,
            'products' => $flashSale->flashSaleProducts->map(function($item) {
                return (object) [
                    'id'=> $item->product->id,
                    'slug'=> $item->product->slug,
                    'name'=> $item->product->name,
                    'shortDescription' => $item->product->short_description,
                    'end_date'=> $item->end_date,
                    'sku' => $item->product->sku,
                    'price' => $item->product->price, //price
                    'specialPrice' =>  $item->price,
                    // 'qty' => $item->product->qty,
                    'qty' => $item->qty, //qty
                    'manageStock' => $item->product->manage_stock,
                    'inStock' => $item->product->in_stock,
                    'newTo' => $item->product->new_to,
                    'avgRating' => $item->product->avg_rating,
                    'isActive' => $item->product->is_active,
                    'image' => isset($item->product->baseImage->image) && file_exists(public_path($item->product->baseImage->image)) ? asset($item->product->baseImage->image) :  'https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=Best-Deals',
                    'mediumImage' => isset($item->product->baseImage->image_medium) && file_exists(public_path($item->product->baseImage->image_medium)) ? asset($item->product->baseImage->image_medium) : 'https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=Best-Deals',
                    'additionalImage' => $item->product->additionalImage->map(function($imageItem) {
                        return [
                            'image' => isset($imageItem->image) && file_exists(public_path($imageItem->image)) ? asset($imageItem->image) : 'https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=Best-Deals',
                            'mediumImage' => isset($imageItem->image_medium) && file_exists(public_path($imageItem->image_medium)) ? asset($imageItem->image_medium) : 'https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=Best-Deals',
                            'smallImage' => isset($imageItem->image_small) && file_exists(public_path($imageItem->image_small)) ? asset($imageItem->image_small) : 'https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=Best-Deals',
                        ];
                    }),
                    'attributes' => $item->product->attributes->map(function($attribute) {
                        return (object) [
                            'id' => $attribute->id,
                            'name' => $attribute->name,
                            'values' => $attribute->attributeValues->map(function($value) {
                                return (object) [
                                    'id' => $value->id,
                                    'name' => $value->name,
                                ];
                            }),
                        ];
                    }),
                    'category' => $item->product->categories->first() ? (object) [
                        'id' => $item->product->categories->first()->id,
                        'slug' => $item->product->categories->first()->slug,
                        'name' => $item->product->categories->first()->name,
                    ] : null,
                ];
            }),
        ];

        return $this->arrayToObject($result);
    }


    public function getVerticalProducts($settings)
    {
        $categoryIds = [];
        $verticalCategoryProducts = [];

        for ($i=0; $i < 3; $i++) {
            $keyCategoryId = "storefront_vertical_product_" . ($i + 1) . "_category_id";
            $categoryIds[] = $settings->$keyCategoryId->plain_value ?? null;
        }

        $query = Category::with([
                                'translations',
                                'products' => function ($q) {
                                    $q->where('is_active',1)
                                        // ->take(3)
                                        ->with([
                                            'translations',
                                            'categories:id,slug,name',
                                            'brand:id,slug,name',
                                            'tags:id,slug,name',
                                            'baseImage',
                                            'additionalImage'=> function ($query){
                                                $query->where('type','additional')
                                                    ->get();
                                            },
                                            'attributes' => function ($q) {
                                                $q->select('id', 'name')
                                                ->with(['attributeValues:id,attribute_id,name']);
                                            }
                                        ]);
                                }
                            ])
                            ->whereIn('id', $categoryIds)
                            ->where('is_active',1)
                            ->get()
                            ->values() // reindex the collection
                            ->map(function($category, $index) use ($settings) {
                                    $keyTitle = 'storefront_vertical_product_' . ($index + 1) . '_title';
                                    $verticalProductTitle = $settings->$keyTitle->value ?? null;

                                    return (object) [
                                        'id' => $category->id,
                                        'slug' => $category->slug,
                                        'isActive'  => $category->is_active,
                                        'name' => $category->translation->category_name,
                                        'verticalProductTitle' => $verticalProductTitle,
                                        // 'products' => $category->products->map(function($product){
                                        'products' => $category->products->take(3)->map(function($product){
                                            return (object) [
                                                'id' => $product->id,
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
                                                'image' => isset($product->baseImage->image) && file_exists(public_path($product->baseImage->image)) ? asset($product->baseImage->image) :  'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                                                'mediumImage' => isset($product->baseImage->image_medium) && file_exists(public_path($product->baseImage->image_medium)) ? asset($product->baseImage->image_medium) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                                                'smallImage' => isset($product->baseImage->image_small) && file_exists(public_path($product->baseImage->image_small)) ? asset($product->baseImage->image_small) : 'https://dummyimage.com/180x40/12787d/ffffff&text=CartPro',
                                                'additionalImage' => $product->additionalImage->map(function($imageItem) {
                                                    return (object) [
                                                        'image' => isset($imageItem->image) && file_exists(public_path($imageItem->image)) ? asset($imageItem->image) : 'https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro',
                                                        'mediumImage' => isset($imageItem->image_medium) && file_exists(public_path($imageItem->image_medium)) ? asset($imageItem->image_medium) : 'https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro',
                                                        'smallImage' => isset($imageItem->image_small) && file_exists(public_path($imageItem->image_small)) ? asset($imageItem->image_small) : 'https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro',
                                                    ];
                                                }),
                                                'attributes' => $product->attributes->map(function($attribute) {
                                                    return (object) [
                                                        'id' => $attribute->id,
                                                        'name' => $attribute->name,
                                                        'values' => $attribute->attributeValues->map(function($value) {
                                                            return (object) [
                                                                'id' => $value->id,
                                                                'name' => $value->name,
                                                            ];
                                                        }),
                                                    ];
                                                })
                                            ];
                                        })
                                    ];
                                });


        $categoryWithProducts = $this->arrayToObject($query);


        foreach ($categoryWithProducts as $key => $category) {
            $verticalCategoryProducts[] = $category;
        }

        return $verticalCategoryProducts;



        // foreach ($categoryWithProducts as $key => $category) {
        //     $verticalCategoryProducts[] = $category;
        //     $verticalCategoryProducts[]["vertical_$key"] = $key;
        // }


        // return self::arrayToObject( [
        //     'isSectionEnabled' => (boolean) $settings->storefront_product_tabs_1_section_enabled->plain_value,
        //     'productTabs' => $productTabs,
        // ]);
    }
}
