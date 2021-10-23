<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AttributeTranslation;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Stripe;
// use Session;

class OrderController extends Controller
{
    public function orderStore(Request $request)
    {
        $validator1 = Validator::make($request->all(),[
            'billing_first_name' => 'required|string',
            'billing_last_name'  => 'required|string',
            // 'billing_username'   => 'required|string',
            // 'billing_email'  => 'required|string|unique:users',
            'billing_phone'      => 'required',
        ]);

        if($validator1->fails()){
            return response()->json(['errors' => $validator1->errors()->all()]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id ?? null;
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
        $order->order_status = 'completed';
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

        $content    = Cart::content();

        foreach ($content as $row) // প্রত্যেকটা প্রোডাক্টের জন্য cart details "content" এর মধ্যে Array আকারে জমা হয় ।
        {
            $order_detail = new OrderDetail();
            $order_detail->order_id   = $order->id;
            $order_detail->product_id = $row->id;
            $order_detail->image      = $row->options->image;
            $order_detail->options    = $row->options;
            $order_detail->price      = $row->price;
            $order_detail->qty        = $row->qty;
            $order_detail->weight     = $row->weight;
            $order_detail->discount   = $request->coupon_value;
            $order_detail->tax        = $row->tax;
            $order_detail->subtotal   = $row->subtotal;
            $order_detail->save();
        }

        Cart::destroy();

        return response()->json(['success' => 'Payment Successfully']);
    }


    public function handlePost(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::user()->id ?? null;
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
        $order->shipping_method = 'Free';
        $order->shipping_cost = 10;
        $order->payment_method = 'Stripe';
        $order->total = implode(explode(',',$request->total));
        $order->order_status = 'completed';
        $order->payment_id = $request->stripeToken;
        // $order->currency = 'BD';
        // $order->currency_rate = 5;

        $shipping = new Shipping();
        $shipping->shipping_first_name = $request->shipping_first_name;
        $shipping->shipping_last_name = $request->shipping_last_name;
        $shipping->shipping_email = $request->shipping_email;
        $shipping->shipping_phone = $request->shipping_phone;
        $shipping->shipping_country = $request->shipping_country_stripe;
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

        $content    = Cart::content();
        foreach ($content as $row) // প্রত্যেকটা প্রোডাক্টের জন্য cart details "content" এর মধ্যে Array আকারে জমা হয় ।
        {
            $order_detail = new OrderDetail();
            $order_detail->order_id   = $order->id;
            $order_detail->product_id = $row->id;
            $order_detail->image      = $row->options->image;
            $order_detail->options    = $row->options;
            $order_detail->price      = $row->price;
            $order_detail->qty        = $row->qty;
            $order_detail->weight     = $row->weight;
            $order_detail->discount   = $request->coupon_value;
            $order_detail->tax        = $row->tax;
            $order_detail->subtotal   = $row->subtotal;
            $order_detail->save();
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (int)implode(explode(',',$request->total)),
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Making test payment."
        ]);

        Cart::destroy();

        // Session::flash('success', 'Payment has been successfully processed.');
        // return back();

        return response()->json(['success' => 'Payment Successfully']);

    }
}
