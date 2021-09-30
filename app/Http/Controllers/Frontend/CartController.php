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
            // $data['options']['image'] = 'public'.$product->baseImage->image;
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
        // session()->flash('type','success');
        // return redirect()->back();
    }

    public function cartViewDetails()
    {
        $cart_content = Cart::content();
        // $cart_content = Cart::destroy();
        // return $cart_content;


        $cart_total = Cart::total();
        return view('frontend.pages.cart_details',compact('cart_content','cart_total'));
    }

    public function cartDestroy(Request $request)
    {
        if ($request->ajax()) {
            Cart::remove($request->rowId);
            // $cart_content = Cart::content();

            // $data = [];
            // foreach ($cart_content as $key => $value) {
            //     $data = '<tr>
            //         <td class="cart-product">
            //             <div class="item-details">
            //                 <a class="deleteCart" data-id="'.$value->rowId.'"><i class="ti-close"></i></a>
            //                 <img src="{{asset($image)}}" alt="...">
            //                 <div class="">
            //                     <a href="Test">
            //                         <h3 class="h6">Irfan</h3>
            //                     </a>
            //                     <div class="input-qty">
            //                         <span class="input-group-btn">
            //                             <button type="button" class="quantity-left-minus">
            //                                 <span class="ti-minus"></span>
            //                             </button>
            //                         </span>
            //                         <input type="text" class="input-number" value="3">
            //                         <span class="input-group-btn">
            //                             <button type="button" class="quantity-right-plus">
            //                                 <span class="ti-plus"></span>
            //                             </button>
            //                         </span>
            //                     </div>
            //                     X
            //                     <span class="amount">
            //                         $ 120
            //                     </span>
            //                 </div>
            //             </div>
            //             <div class="cart-amount-mobile">Total:
            //                 <span class="amount">
            //                     $90.00
            //                 </span>
            //             </div>
            //         </td>
            //         <td class="cart-product-subtotal">
            //             <span class="amount">
            //             $ 120
            //             </span>
            //         </td>
            //     </tr>';
            // }
            // $image= 'public/frontend/images/products/apple-watch.png';

            // return view('frontend.pages.test',compact('cart_content'));

            return response()->json('success');
        }



    }
}
