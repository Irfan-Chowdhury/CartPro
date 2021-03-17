<?php
 
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\OrderedProducts;
use App\ProductAttribute;
 
class OrderController extends Controller
{
	public function create(Request $request)
    {

        $create_order = Order::create([
            'payment_id'           => $request->input('payment_id'),
            'user_id'              => $request->input('user_id'),
            'customer_id'          => $request->input('customer_id'),
            'name'                 => $request->input('cus_name'),
            'email'                => $request->input('cus_email'),
            'phone'                => $request->input('cus_phone'),
            'ship_address'         => $request->input('ship_address'),
            'ship_city'            => $request->input('ship_city'),
            'ship_state'           => $request->input('ship_state'),
            'ship_postal_code'     => $request->input('ship_postcode'),
            'item'                 => $request->input('item'),
            'total_qty'            => $request->input('total_qty'),
            'total_price'          => $request->input('grand_total'),
            'coupon_id'            => $request->input('coupon_id'),
            'coupon_discount'      => $request->input('coupon_discount'),
        ]);

        $cart = session()->has('cart') ? session()->get('cart') : [];
        foreach ($cart as $key => $product) {
            OrderedProducts::create([
                'order_id'         => $create_order->id,
                'sku'              => $product['sku'], 
                'name'             => $product['name'],
                'size'             => $product['size'],
                'color'            => $product['color'],
                'qty'              => $product['qty'],
                'unit_price'       => $product['unit_price'],
                'total_price'      => $product['total_price'],
            ]);

            $product_attribute = ProductAttribute::where('sku',$product['sku'])->first();

            $qty = ($product_attribute->qty - $product['qty']);

            $product_attribute->qty = $qty;
            
            $product_attribute->save();
        }

        // SEND EMAIL TO ADMIN


        // SEND EMAIL TO CUSTOMER


        session(['cart' => [], 'total_qty' => 0, 'subTotal' => 0]);
        return redirect()->route('paypal.success');

    }
}