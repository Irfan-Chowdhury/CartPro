<?php
namespace App\Services;

use App\Contracts\Category\CategoryProductContract;
use App\Contracts\Product\ProductAttributeValueContract;
use App\Contracts\Product\ProductContract;
use App\Contracts\Product\ProductImageContract;
use App\Contracts\Product\ProductTagContract;
use App\Contracts\Product\ProductTranslationContract;
use App\Models\AttributeProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Traits\WordCheckTrait;
use App\Utilities\Message;
use Illuminate\Support\Facades\File;
use Str;
use Illuminate\Support\Facades\DB;
use Share;


class ProductService extends Message
{
    use WordCheckTrait;

    private $productContract;
    private $productTranslationContract;
    private $productImageContract;
    private $productAttributeValueContract;
    private $categoryProductContract;
    private $productTagContract;

    public function __construct(ProductContract $productContract,
                                ProductTranslationContract $productTranslationContract,
                                ProductAttributeValueContract $productAttributeValueContract,
                                ProductImageContract $productImageContract,
                                CategoryProductContract $categoryProductContract,
                                ProductTagContract $productTagContract){
        $this->productContract            = $productContract;
        $this->productTranslationContract = $productTranslationContract;
        $this->productImageContract       = $productImageContract;
        $this->productAttributeValueContract= $productAttributeValueContract;
        $this->categoryProductContract    = $categoryProductContract;
        $this->productTagContract         = $productTagContract;
    }

    public function getAllProducts(){
        if ($this->wordCheckInURL('products')) {
            return $this->productContract->getAll();
        }else{
            return $this->productContract->getAllActiveData();
        }

    }


    public function dataTable()
    {
        return datatables()->of($products)
        ->setRowId(function ($row){
            return $row->id;
        })
        ->addColumn('image', function ($row)
        {
            if (($row->baseImage==null) || ($row->baseImage->type!='base')) {
                $url = 'https://dummyimage.com/50x50/000/fff';
            }elseif ($row->baseImage->type=='base') {
                if (!File::exists(public_path($row->baseImage->image_small))) {
                    $url = 'https://dummyimage.com/50x50/000/fff';
                }else {
                    $url = url($row->baseImage->image_small);
                }
            }
            return '<img src="'. $url .'" height="50px" width="50px"/>';
        })
        ->addColumn('product_name', function ($row)
        {
            return Str::limit($row->product_name, 50, $end='...') ?? Str::limit($row->product_name, 50, $end='...');
        })
        ->addColumn('price', function ($row)
        {
            if ($row->special_price > 0) {
                if(env('CURRENCY_FORMAT')=='prefix'){
                    return  '<span>'.env('DEFAULT_CURRENCY_SYMBOL').number_format((float)$row->special_price, env('FORMAT_NUMBER'), '.', '').'</span></br><span class="text-danger"><del>'.env('DEFAULT_CURRENCY_SYMBOL').number_format((float)$row->price, env('FORMAT_NUMBER'), '.', '').'</del></span>';
                }else{
                    return  '<span>'.number_format((float)$row->special_price, env('FORMAT_NUMBER'), '.', '').env('DEFAULT_CURRENCY_SYMBOL').'</span></br><span class="text-danger"><del>'.number_format((float)$row->price, env('FORMAT_NUMBER'), '.', '').env('DEFAULT_CURRENCY_SYMBOL').'</del></span>';
                }
            }else {
                if(env('CURRENCY_FORMAT')=='prefix'){
                    return env('DEFAULT_CURRENCY_SYMBOL').number_format((float)$row->price, env('FORMAT_NUMBER'), '.', '');
                }else{
                    return number_format((float)$row->price, env('FORMAT_NUMBER'), '.', '').env('DEFAULT_CURRENCY_SYMBOL');
                }
            }
        })
        ->addColumn('action', function ($row)
        {
            $actionBtn = "";
            if (auth()->user()->can('product-edit'))
            {
                $actionBtn .= '<a href="'.route('admin.products.edit', $row->id) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                &nbsp; ';
            }
            if (auth()->user()->can('product-action'))
            {
                if ($row->is_active==1) {
                    $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-warning btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button> &nbsp';;
                }else {
                    $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>  &nbsp';
                }
            }
                // $actionBtn .= '<button type="button" onclick="return confirm(\'Are you sure to delete ?\')" title="Delete" class="delete btn btn-danger btn-sm ml-2" data-id="'.$row->id.'"><i class="dripicons-trash"></i></button>';
                $actionBtn .= '<button type="button" title="Delete" class="delete btn btn-danger btn-sm ml-2" data-id="'.$row->id.'"><i class="dripicons-trash"></i></button>';

            return $actionBtn;
        })
        ->rawColumns(['image','action','price'])
        ->make(true);
    }



    public function activeById($id){
        if (!auth()->user()->can('product-action')){
            return Message::getPermissionMessage();
        }
        $this->productContract->active($id);
        return Message::activeSuccessMessage();
    }


    public function inactiveById($id){
        if (!auth()->user()->can('product-action')){
            return Message::getPermissionMessage();
        }
        $this->productContract->inactive($id);
        return Message::inactiveSuccessMessage();
    }


    public function destroy($id){
        if (!auth()->user()->can('product-action')){
            return Message::getPermissionMessage();
        }
        $product = $this->productContract->getById($id);
        $product->categories()->detach();  // PIVOT
        $product->tags()->detach();  // PIVOT

        $this->productContract->destroy('id', $id);
        $this->productTranslationContract->destroy('product_id', $id);
        $this->productAttributeValueContract->destroy('product_id', $id);
        //Image
        $this->deleteImageFileByProductId($id);
        $this->productImageContract->destroy('product_id', $id);

        return Message::deleteSuccessMessage();
    }

    public function bulkActionByTypeAndIds($type, $ids){
        if (!auth()->user()->can('product-action')){
            return Message::getPermissionMessage();
        }
        if ($type=='delete') {
            $this->productTranslationContract->bulkAction($type, 'product_id', $ids);
            $this->categoryProductContract->bulkAction($type, 'product_id', $ids);
            $this->productTagContract->bulkAction($type, 'product_id', $ids);
            $this->productAttributeValueContract->bulkAction($type, 'product_id', $ids);
            // Image Section
            $products = $this->productContract->getAllProductsByIds($ids);
            foreach ($products as $item) {
                $this->deleteImageFileByProductId($item->id);
            }
            $this->productImageContract->bulkAction($type, 'product_id', $ids);
        }
        $this->productContract->bulkAction($type, 'id', $ids);

        if ($type=='delete') {
            return Message::deleteSuccessMessage();
        }else{
            return $type=='active' ? Message::activeSuccessMessage() : Message::inactiveSuccessMessage();
        }
    }

    protected function deleteImageFileByProductId($product_id){
        $productImage = $this->productImageContract->getAllImageByProductId($product_id);
        if ($productImage){
            foreach ($productImage as $value){
                if (File::exists(public_path().$value->image)){
                    File::delete(public_path().$value->image);
                    File::delete(public_path().$value->image_medium);
                    File::delete(public_path().$value->image_small);
                }
            }
        }
    }



    // For API Frontend

    public function getProductBySlug(string $slug)
    {
        $product = self::getProduct($slug);

        // DB::enableQueryLog();
        // $product = self::getProduct($slug);
        // dd(DB::getQueryLog());




        $reviews = self::getReviews($product->id);

        $socialShareLinks = (object) self::socialShareLinks();

        $categoryWiseProducts = self::getCategoryWiseProducts($product->categories->first()->id);


        return (object) [
            'productDetails' => (object) [
                'basic' => $product->makeHidden(['categories', 'brand','tags','baseImage','additionalImage','attributes']),
                'imageCollection' => (object) [
                    'baseImage' => $product->baseImage,
                    'additionalImage' => $product->additionalImage,
                ],
                'category' => $product->categories->first(),
                'brand' => $product->brand,
                'tags' => $product->tags->map(function($tag) {
                    return [
                        'id' => $tag->id,
                        'slug' => $tag->slug,
                        'name' => $tag->name,
                    ];
                }),
                'attributes' => $product->attributes
            ],
            'reviews' => $reviews,
            'socialShareLinks' => $socialShareLinks,
            'generalSettings' => (object) [
                'currencyFormat' => config('general-setting.currency_format'),
                'currencySymbol' => config('general-setting.currency_symbol'),
                'formatNumber' => config('general-setting.format_number'),
                'changeCurrencyRate' => config('general-setting.change_currency_rate'),
            ],
            'categoryWiseProducts' => $categoryWiseProducts,
        ];
    }



    // For API
    private function getProduct(string $slug)
    {
        return Product::with([
            'categories:id,slug,name',
            'brand:id,slug,name',
            'tags:id,slug,name',
            'baseImage'=> function ($query){
                $query->where('type','base')
                    ->first();
            },
            'additionalImage'=> function ($query){
                $query->where('type','additional')
                    ->get();
            },
            'attributes' => function ($q) {
                $q->select('id', 'name')
                  ->with(['attributeValues:id,attribute_id,name']);
            }
            ])
            ->where('slug',$slug)
            ->first();
    }

    private function getReviews(int $productId)
    {
        return DB::table('reviews')
            ->join('users', 'users.id', 'reviews.user_id')
            ->where('product_id', $productId)
            ->where('status', 'approved')
            ->whereNull('reviews.deleted_at')
            ->select(
                'users.id AS userId',
                DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS name"),
                'users.image',
                'reviews.comment',
                'reviews.rating',
                'reviews.status',
                'reviews.created_at'
            )
            ->get()
            ->map(function($item){
                $item->created_at = date('d M, Y', strtotime($item->created_at));
                return $item;
            });
    }


    private function socialShareLinks()
    {
        return  Share::page(url()->current(),
            'Social Share'
            )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit()
            ->getRawLinks();
    }

    private function getCategoryWiseProducts(int $categoryId)
    {
        $category = Category::with([
            'products.baseImage',
            'products.additionalImage'
        ])
        ->find($categoryId);

        $categoryWiseProducts =  (object) [
                'categoryId' => $category->id,
                'slug' => $category->slug,
                'isActive'  => $category->is_active,
                'categoryName' => $category->name,
                'products' => $category->products->map(function($product){
                    return (object) [
                        'productId' => $product->id,
                        'name' => $product->name,
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

        return $categoryWiseProducts;
    }
}
