<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{
    public function userAccount()
    {
        // $orders = Order::with('orderDetails.productTranslation','orderDetails.baseImage')->where('user_id',26)->get();

        $locale = Session::get('currentLocal');

        $orders = DB::table('orders')
            ->join('order_details','order_details.order_id','orders.id')
            ->join('products','products.id','order_details.product_id')
            ->join('product_translations',function ($join) use($locale) {
                $join->on('product_translations.product_id', '=', 'products.id')
                ->where('product_translations.local', '=', $locale);
            })
            // ->where('user_id',26)
            ->where('user_id',Auth::user()->id)
            ->select('orders.total','product_translations.product_name','order_details.image','order_details.price','order_details.qty','order_details.options')
            ->get();

        // return $orders;

        // $data = [];
        // foreach ($orders as $key => $value) {
        //     $data[$key]= $value->options;
        // }
        // $string = serialize($data[0]);
        // $newvar = unserialize($string);
        // $test = explode(",",$data[0]);
        // return $test[3];


        return view('frontend.pages.user_account',compact('orders'));
    }


    public function userLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
