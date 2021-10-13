<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderStore(Request $request)
    {

        $order = new Order();
        $order->user_id = 21;
        $order->billing_first_name = $request->billing_first_name;
        $order->billing_last_name = $request->billing_last_name;
        $order->billing_email = $request->billing_email;
        $order->billing_phone = $request->billing_phone;
        $order->billing_country = $request->billing_country;
        $order->billing_address_1 = $request->billing_address_1;
        $order->billing_address_2 = $request->billing_address_2;
        $order->billing_city = $request->billing_city;
        $order->billing_state = $request->billing_state;
        $order->billing_zip_code = $request->billing_zip_code;
        $order->shipping_method = 'Paypal';
        $order->shipping_cost = 10;
        $order->payment_method = $request->payment_method;
        $order->total = $request->total;
        $order->payment_id = $request->payment_id;
        // $order->currency = 'BD';
        // $order->currency_rate = 5;

        $shipping = new Shipping();
        $shipping->shipping_first_name = $request->shipping_first_name;
        $shipping->shipping_last_name = $request->shipping_last_name;
        $shipping->shipping_email = $request->shipping_email;
        $shipping->shipping_phone = $request->shipping_phone;
        $shipping->shipping_country = $request->shipping_country;
        $shipping->shipping_address_1 = $request->shipping_address_1;
        $shipping->shipping_address_2 = $request->shipping_address_2;
        $shipping->shipping_city = $request->shipping_city;
        $shipping->shipping_state = $request->shipping_state;
        $shipping->shipping_zip_code = $request->shipping_zip_code;

        $order->save();
        if ($request->shipping_address_check==1) { //if selected shipping
            $shipping->order_id = $order->id;
            $shipping->save();
        }

        return response()->json($request->shipping_address.' - Payment Success');

    }
}
