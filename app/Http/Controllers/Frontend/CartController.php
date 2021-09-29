<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function productAddToCart(Request $request)
    {
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

        // return Cart::content();

        session()->flash('type','success');
        return redirect()->back();
    }

    public function cartViewDetails()
    {
        $cart_content = Cart::content();
        $cart_total = Cart::total();

        return view('frontend.pages.cart_details',compact('cart_content','cart_total'));
    }
}
