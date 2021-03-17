<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Coupon;
use Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function InsertCart(Request $request)
    {
        $id = $request->product_id;

        if($request->input('quantity')){
            $qty = $request->input('quantity');
        } else {
            $qty = 1;
        }

        $product = Product::select('image', 'product_name', 'price')->find($id);
        $cart = session()->has('cart') ? session()->get('cart') : [];
        $sum = 0;
        $total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
        $subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

        if(array_key_exists($id, $cart)) {
            $cart[$id]['qty'] += $qty;
            $cart[$id]['total_price'] += $qty * $cart[$id]['unit_price'];
        }
        else {
            $cart[$id] = [
                'id' => $id,
                'image' => $product->image,
                'name' => $product->product_name,
                'qty' => $qty,
                'unit_price' => $product->price,
                'total_price' => $qty * $product->price,
                // 'sum'=> $sum + 
            ];
        }

        $total_qty += $qty;
        $subTotal += $qty * $cart[$id]['unit_price'];
        session(['cart' => $cart, 'total_qty' => $total_qty,'subTotal'=>$subTotal]);
        //return $subTotal;
        //return session()->get('cart');
        return redirect()->back()->with('message', 'Product successfully added to cart');
        
       
    }
    
    public function showCart(Request $request)
    {
       
      $cart = session()->get('cart');
      $subTotal = session()->get('subTotal');
      return view('pages.allCart',compact('cart'));
       
    }
    public function viewproduct($id)
    {
        $product = Product::where('id',$id)->with('categories')->first();
        return response()->json(['product'=>$product]);
    }
    // public function removeCart($rowId,Request $request)
    // {
    //     $cart = session()->get('cart');
    //     session()->forget('cart.'.$rowId);
    //     session()->save();
    //     return redirect()->back();
    // }
    public function removeCart(Request $request,$rowId)
    {
      $id = $rowId; 
      $cart = session()->get('cart');
      $total_qty = session()->get('total_qty');
      $subTotal = session()->get('subTotal');
      $total_qty -= $cart[$id]['qty'];
      $subTotal -= $cart[$id]['total_price'];
      unset($cart[$id]);
     
      session(['cart' => $cart, 'total_qty' => $total_qty, 'subTotal' => $subTotal]);
      return redirect()->back()->with('success', 'Product successfully removed from cart');
    }
     public function UpdateCart(Request $request)
    {
      $id = $request->cartid;
      $product_qty = $request->input('qty');
      $cart = session()->get('cart');
      $old_qty = session()->get('total_qty');
      $old_subtotal = session()->get('subTotal');

      $total_qty = ($old_qty - $cart[$id]['qty']) + $product_qty;

      $subTotal = ($old_subtotal - $cart[$id]['total_price']) + ($product_qty * $cart[$id]['unit_price']);

      $cart[$id]['qty'] = $product_qty; 
      $cart[$id]['total_price'] = $product_qty * $cart[$id]['unit_price'];


      session(['cart' => $cart, 'total_qty' => $total_qty, 'subTotal' => $subTotal]);
      return redirect()->back()->with('success', 'Cart updated successfully');
    }

    public function PymentPage()
    {
      $cart=session()->get('cart');
      $new_balance = session()->get('new_balance');
      return view('pages.payment',compact('cart','new_balance'));
    }
}
