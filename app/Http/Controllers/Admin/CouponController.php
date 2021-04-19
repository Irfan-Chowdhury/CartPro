<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Coupon;
use App\Models\CouponTranslation;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ActiveInactiveTrait;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class CouponController extends Controller
{
    use ActiveInactiveTrait, SlugTrait;

    //public $locale = Session::get('currentLocal');

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $locale = Session::get('currentLocal');

        $coupons = Coupon::with(['couponTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale) //locale name correction
            ->orWhere('locale','en')
            ->orderBy('id','DESC');
        }])
        ->orderBy('is_active','DESC')
        ->orderBy('id','DESC')
        ->get();

        if (request()->ajax())
        {
            return datatables()->of($coupons)
            ->setRowId(function ($row){
                return $row->id;
            })
            ->addColumn('coupon_name', function ($row) use ($locale)
            {
                if ($row->couponTranslations->count()>0){
                    foreach ($row->couponTranslations as $key => $value){
                        if ($key<1){
                            if ($value->locale==$locale){
                                return $value->coupon_name;
                            }elseif($value->locale=='en'){
                                return $value->coupon_name;
                            }
                        }
                    }
                }else {
                    return "NULL";
                }
            })
            ->addColumn('discount', function ($row)
            {
                if ($row->discount_type=='fixed') {
                    return '$ '.$row->value; //Currency need to change later
                }else {
                    return $row->value.' %';
                }
            })
            ->addColumn('action', function ($row)
            {
                $actionBtn = "";
                $actionBtn .= '<a href="'.route('admin.coupon.edit', $row->id) .'" class="edit btn btn-info btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                            &nbsp; ';
                if ($row->is_active==1) {
                    $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                }else {
                    $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                }
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.pages.coupon.index');
    }

    public function create()
    {
        $locale = Session::get('currentLocal');

        $products = Product::with(['productTranslation'=> function ($query) use ($locale){
            $query->where('local',$locale)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();


        $categories = Category::with(['categoryTranslation'=> function ($query) use ($locale){
                $query->where('local',$locale)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();


        return view('admin.pages.coupon.create',compact('products','categories','locale'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('coupon_name','coupon_code','value','discount_type'),[
            'coupon_name' => 'required|unique:coupon_translations,coupon_name',
            'coupon_code' => 'required|unique:coupons,coupon_code',
            'value' => 'required',
            'discount_type' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $locale = Session::get('currentLocal');

        $coupon = new Coupon();
        $coupon->slug          = $this->slug($request->coupon_name);
        $coupon->coupon_code   = $request->coupon_code;
        $coupon->value         = $request->value;
        $coupon->discount_type = $request->discount_type;
        $coupon->free_shipping = $request->free_shipping ?? 0;
        $coupon->minimum_spend = $request->minimum_spend;
        $coupon->maximum_spend = $request->maximum_spend;
        $coupon->usage_limit_per_coupon = $request->usage_limit_per_coupon;
        $coupon->usage_limit_per_customer = $request->usage_limit_per_customer;
        $coupon->used          = $request->used ?? 0;
        $coupon->is_active     = $request->is_active ?? 0;
        $coupon->start_date    = date('Y-m-d',strtotime($request->start_date));
        $coupon->end_date      = date('Y-m-d',strtotime($request->end_date));

        $coupon_translation  = new CouponTranslation();
        $coupon_translation->locale      = $locale;
        $coupon_translation->coupon_name = $request->coupon_name;

        DB::beginTransaction();
        try {
            $coupon->save();

            $coupon_translation->coupon_id   = $coupon->id;
            $coupon_translation->save();

            //----------------- Coupon-Product --------------
            if (!empty($request->product_id)) {
                $productArrayIds = $request->product_id;
                $coupon->products()->sync($productArrayIds);
            }

            //----------------- Coupon-Category --------------
            if (!empty($request->category_id)) {
                $categoryArrayIds = $request->category_id;
                $coupon->categories()->sync($categoryArrayIds);
            }

            DB::commit();

        }
        catch (Exception $e)
        {
            DB::rollback();

            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success'=>'Data Saved Successfully']);
    }

    public function edit($id)
    {
        $locale = Session::get('currentLocal');

        $products = Product::with(['productTranslation'=> function ($query) use ($locale){
            $query->where('local',$locale)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        $categories = Category::with(['categoryTranslation'=> function ($query) use ($locale){
                $query->where('local',$locale)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        $coupon = Coupon::with(['couponTranslations'=> function ($query) use ($locale){
            $query->where('locale',$locale)
                    ->first();
            },
            'products','categories'])
        ->find($id);

        return view('admin.pages.coupon.edit',compact('products','categories','locale','coupon'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->only('coupon_name','coupon_code','value','discount_type'),[
            'coupon_name' => 'required|unique:coupon_translations,coupon_name,'.$request->coupon_translation_id,
            'coupon_code' => 'required|unique:coupons,coupon_code,'.$request->coupon_id,
            'value' => 'required',
            'discount_type' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $locale = Session::get('currentLocal');

        $coupon = Coupon::find($request->coupon_id);
        $coupon->coupon_code   = $request->coupon_code;
        $coupon->value         = $request->value;
        $coupon->discount_type = $request->discount_type;
        $coupon->free_shipping = $request->free_shipping ?? 0;
        $coupon->minimum_spend = $request->minimum_spend;
        $coupon->maximum_spend = $request->maximum_spend;
        $coupon->usage_limit_per_coupon = $request->usage_limit_per_coupon;
        $coupon->usage_limit_per_customer = $request->usage_limit_per_customer;
        $coupon->used          = $request->used ?? 0;
        $coupon->is_active     = $request->is_active ?? 0;
        $coupon->start_date    = date('Y-m-d',strtotime($request->start_date));
        $coupon->end_date      = date('Y-m-d',strtotime($request->end_date));


        DB::beginTransaction();
        try {
                $coupon->update();

                CouponTranslation::UpdateOrCreate(
                    [ 'coupon_id'   => $request->coupon_id,  'locale' => $locale ],
                    [ 'coupon_name' => $request->coupon_name ]);

                //----------------- Coupon-Product --------------
                if (!empty($request->product_id)) {
                    $productArrayIds = $request->product_id;
                    $coupon->products()->sync($productArrayIds);
                }

                //----------------- Coupon-Category --------------
                if (!empty($request->category_id)) {
                    $categoryArrayIds = $request->category_id;
                    $coupon->categories()->sync($categoryArrayIds);
                }

            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollback();

            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success'=>'Data Saved Successfully']);
    }


    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData(Coupon::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData(Coupon::find($request->id));
        }
    }
}





// $categories = Category::with(['categoryTranslation'=> function ($query) use ($locale){
//     $query->where('local',$locale)
//     ->orWhere('local','en');
//     // ->orderBy('id','DESC');
//     // ->orderBy('local');
// }])
// ->where('is_active',1)
// ->get();
// //return $categories;

// $category_translation  = CategoryTranslation::where('category_id',13);
//                         // ->where('local',$locale)->pluck('local');

// if ($category_translation->where('local',$locale)->pluck('local')) {
//     $locale = $category_translation->where('local',$locale)->pluck('local');
// }else{
//     $locale = $category_translation->where('local','en')->pluck('local');
// }
// return $locale;

// //Test
// foreach ($categories as $item) {
//     if ($item->categoryTranslation->isNotEmpty()) {
//         foreach ($item->categoryTranslation as $key => $value){
//             if ($key<1){
//                 if ($value->local==$locale){
//                     echo $value->category_name.'</br>';
//                 }elseif ($value->local=='en') {
//                     echo $value->category_name.'</br>';
//                 }
//             }
//         }
//     }
//     else{
//         echo 'NULL'.'</br>';
//     }
// }
// // foreach ($products as $item) {
// //     if ($item->productTranslation->isNotEmpty()) {
// //         foreach ($item->productTranslation as $key => $value){
// //             if ($key<1){
// //                 if ($value->local==$locale){
// //                     echo $value->product_name.'</br>';
// //                 }elseif ($value->local=='en') {
// //                     echo $value->product_name.'</br>';
// //                 }
// //             }
// //         }
// //     }
// //     else{
// //         echo 'NULL'.'</br>';
// //     }
// // }

// //Test



//Follow this
// foreach ($categories as $item) {
//     if ($item->categoryTranslation->isNotEmpty()) {
//         foreach ($item->categoryTranslation as $key => $value){

//             if ($value->local==$locale){
//                 echo $value->category_name.'</br>';
//                 break;
//             }
//             else{
//                 echo $value->category_name.'</br>';
//                 break;
//             }

//         }
//     }
// }
