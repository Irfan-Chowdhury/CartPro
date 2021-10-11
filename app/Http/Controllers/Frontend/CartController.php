<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\SettingFlatRate;
use App\Models\SettingFreeShipping;
use App\Models\SettingLocalPickup;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;

class CartController extends Controller
{
    public function productAddToCart(Request $request)
    {
        if ($request->ajax()) {
            // return Cart::content();
            $attribute_name_arr = $request->attribute_name;
            $value_ids = array();
            $value_ids = explode(",",$request->value_ids);

            // return $request->value_ids;


            $product = Product::with(['productTranslation','productTranslationEnglish','categories','productCategoryTranslation','tags','brand','brandTranslation','brandTranslationEnglish',
                        'baseImage'=> function ($query){
                            $query->where('type','base')
                                ->first();
                        },
                        'additionalImage'=> function ($query){
                            $query->where('type','additional')
                                ->get();
                        },
                        ])
                        ->find($request->product_id);

            $data = [];
            $data['id']     = $product->id;
            $data['name']   = $product->productTranslation->product_name ?? $product->productTranslationEnglish->product_name ?? null;
            $data['qty']    = $request->qty;

            if ($product->special_price!=NULL && $product->special_price>0 && $product->special_price<$product->price){
                $data['price']  = $product->special_price;
            }else {
                $data['price']  = $product->price;
            }
            $data['weight'] = 1;
            $data['options']['image'] = $product->baseImage->image;

            if (!empty($attribute_name_arr) && !empty($request->value_ids)) {
                foreach ($attribute_name_arr as $key => $value) {
                    $data['options'][$value]= $value_ids[$key];
                }
            }

            // $data['options']['color'] = '';
            // $data['options']['size']  = '';
            $data['options']['product_slug']  = $request->product_slug;
            $data['options']['category_id']  = $request->category_id;
            $data = Cart::add($data);

            $cart_count = Cart::count();
            $cart_total = Cart::total();
            $cart_content = Cart::content();


            return response()->json(['type'=>'success','cart_content'=>$cart_content, 'cart_count'=>$cart_count, 'cart_total'=>$cart_total]);
        }
    }

    public function cartViewDetails()
    {
        // return Cart::content();
        $setting_free_shipping = SettingFreeShipping::latest()->first();
        $setting_local_pickup = SettingLocalPickup::latest()->first();
        $setting_flat_rate = SettingFlatRate::latest()->first();


        $cart_content  = Cart::content();
        $cart_subtotal = Cart::subtotal();
        $cart_total    = Cart::total();
        return view('frontend.pages.cart_details',compact('cart_content','cart_subtotal','cart_total','setting_free_shipping','setting_local_pickup','setting_flat_rate'));
    }

    public function cartRomveById(Request $request)
    {
        if ($request->ajax()) {
            Cart::remove($request->rowId);
            $cart_content = Cart::content();
            $cart_count = Cart::count();
            $cart_total = Cart::total();
            return response()->json(['type'=>'success','cart_content'=>$cart_content, 'cart_count'=>$cart_count, 'cart_total'=>$cart_total]);
        }
    }

    public function cartQuantityChange(Request $request)
    {
        if ($request->ajax()) {
            Cart::update($request->rowId, ['qty'  => $request->qty]);
            $cart_subtotal = Cart::get($request->rowId)->subtotal;
            $cart_count = Cart::count();
            $subtotal = Cart::subtotal();
            $cart_total = Cart::total();

            $total = Cart::total();
            $total_amount = implode(explode(',',$total)) + $request->shipping_charge - $request->coupon_value;
            $cart_total = number_format($total_amount, 2); //convert 10000 to 10,000

            return response()->json(['type'=>'success','cart_subtotal'=>$cart_subtotal, 'cart_count'=>$cart_count, 'cart_total'=>$cart_total,'subtotal'=>$subtotal,'total'=>$total]);
        }
    }

    public function shippingCharge(Request $request)
    {
        if ($request->ajax()) {
            $total = Cart::total();
            $cart_total = implode(explode(',',$total)) + $request->cost - $request->coupon_value; //convert 10,000 to 10000
            $total_with_shipping = number_format($cart_total, 2); //convert 10000 to 10,000

            return response()->json(['type'=>'success','total_with_shipping'=>$total_with_shipping]);
        }
    }

    public function checkout(Request $request)
    {
        $cart_content = Cart::content();
        $cart_subtotal = Cart::subtotal();
        $total = Cart::total();

        $setting_free_shipping = SettingFreeShipping::latest()->first();
        $setting_local_pickup = SettingLocalPickup::latest()->first();
        $setting_flat_rate = SettingFlatRate::latest()->first();

        $shipping_charge = $request->shipping ?? 0;

        $total_with_shipping = implode(explode(',',$total)) + $shipping_charge;
        $cart_total = number_format($total_with_shipping, 2);

        return view('frontend.pages.checkout',compact('cart_content','cart_subtotal','cart_total','setting_free_shipping','setting_local_pickup','setting_flat_rate','shipping_charge'));
    }

    public function applyCoupon(Request $request)
    {
        if ($request->ajax()) {
            $coupon_value = Coupon::where('coupon_code',$request->coupon_code)->first()->value ?? 0;

            $cart_total = Cart::total();

            $total_with_charge_after_coupon = implode(explode(',',$cart_total)) + $request->shipping_charge - $coupon_value;
            $total_amount = number_format($total_with_charge_after_coupon, 2); //10000 to 10,000

            return response()->json(['type'=>'success','total_amount'=>$total_amount,'coupon_value'=>$coupon_value]);
        }
    }
}
