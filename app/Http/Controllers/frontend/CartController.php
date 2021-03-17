<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductAttribute;
 
class CartController extends Controller
{
	public function index(Request $request)
	{
		$cart = session()->has('cart') ? session()->get('cart') : [];
		$total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
		$subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

        $subTotal = number_format($subTotal,2);

		if ($request->ajax()) {
            return response()->json(['cart'=>$cart, 'total_qty'=>$total_qty, 'subTotal'=>$subTotal]);  
        }
		
		return view('pages.cart', compact('cart', 'total_qty', 'subTotal'));
	}

    public function addToCart(Request $request)
    {
    	$sku = $request->input('sku');
        $size = $request->input('size');
        $color = $request->input('color');
    	if($request->input('qty'))
    		$qty = $request->input('qty');
    	else
    		$qty = 1;

    	$product = ProductAttribute::with('product')->where('sku',$sku)->first();

        if($product->image == Null){
            $parent = Product::select('sku','image')->where('id',$product->product_id)->first();
            $product->image = $parent->image;
            $parent_sku = $parent->sku;
        } else {
            $parent_sku = '';
        }


    	$cart = session()->has('cart') ? session()->get('cart') : [];
    	$total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
		$subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

    	if(array_key_exists($sku, $cart)) {
    		$cart[$sku]['qty'] += $qty;
    		$cart[$sku]['total_price'] += $qty * $cart[$sku]['unit_price'];
    	}
    	else {
    		$cart[$sku] = [
                'parent_sku' => $parent_sku,
                'sku' => $product->sku,
    			'image' => $product->image,
    			'name' => $product->product->product_name,
                'size' => $size,
                'color' => $color,
    			'qty' => $qty,
    			'unit_price' => $product->price,
    			'total_price' => $qty * $product->price,
    		];
    	}
    	$total_qty += $qty;
    	$subTotal += $qty * $cart[$sku]['unit_price'];

        $subTotal = number_format($subTotal,2);

    	session(['cart' => $cart, 'total_qty' => $total_qty, 'subTotal' => $subTotal]);

    	return response()->json(['total_qty' => $total_qty, 'subTotal' => $subTotal, 'success'=>'Product added to cart']);
    }

    public function updateCart(Request $request)
    {
    	$sku = $request->input('sku');
    	$product_qty = $request->input('product_qty');
    	$cart = session()->has('cart') ? session()->get('cart') : [];
    	$total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
		$subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

		$old_qty = $cart[$sku]['qty'];
		$old_price = $cart[$sku]['total_price'];

		$cart[$sku]['qty'] = $product_qty;
		$cart[$sku]['total_price'] = $product_qty * $cart[$sku]['unit_price'];

		$total_qty = $total_qty + $product_qty - $old_qty;
		$subTotal = $subTotal + $cart[$sku]['total_price'] - $old_price;

        $subTotal = number_format($subTotal,2);

		session(['cart' => $cart, 'total_qty' => $total_qty, 'subTotal' => $subTotal]);
    	
    	return response()->json(['total_qty' => $total_qty, 'subTotal' => $subTotal, 'success'=>'Product added to cart']);
    }

    public function removeFromCart(Request $request)
    {
        //$request->session()->flush();

    	$sku = $request->input('sku');
    	$cart = session()->get('cart');
    	$total_qty = session()->get('total_qty');
    	$subTotal = session()->get('subTotal');
    	//removing element from cart
    	$total_qty = $total_qty - $cart[$sku]['qty'];
    	$subTotal = $subTotal - $cart[$sku]['total_price'];
    	unset($cart[$sku]);
    	session(['cart' => $cart, 'total_qty' => $total_qty, 'subTotal' => $subTotal]);

        $subTotal = number_format($subTotal,2);

    	return response()->json(['deleted_item' => $sku, 'total_qty' => $total_qty, 'subTotal' => $subTotal, 'success'=>'Product successfully removed from cart']);

    }
}