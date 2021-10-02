<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function productAddToCart(Request $request)
    {
        // return $request->all();

        if ($request->ajax()) {

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
            $data['options']['color'] = '';
            $data['options']['size']  = '';
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
        $cart_content = Cart::content();
        $cart_total = Cart::total();
        return view('frontend.pages.cart_details',compact('cart_content','cart_total'));
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
            $cart_total = Cart::total();
            return response()->json(['type'=>'success','cart_subtotal'=>$cart_subtotal, 'cart_count'=>$cart_count, 'cart_total'=>$cart_total,'cart_subtotal'=>$cart_subtotal]);
        }
    }
}
