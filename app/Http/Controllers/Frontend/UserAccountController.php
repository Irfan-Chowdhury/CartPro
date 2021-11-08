<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageHandleTrait;

class UserAccountController extends Controller
{
    use imageHandleTrait;

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
        Session::flush();
        
        return redirect('/login');
    }


    public function userProfileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'phone'      => 'required',
            'password'   => 'confirmed',
            'image'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        if ($validator->fails()) {
            session()->flash('alert_message','Something Wrong, please try again');
            session()->flash('alert_type','danger');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [];
        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['phone']      = $request->phone;
        $image       = $request->file('image');
        if ($image) {
            $data['image'] = $this->imageStore($image, $directory='images/customers/', $type='customer');
        }
        $data['password']   = Hash::make($request->password);
        User::whereId(Auth::user()->id)->update($data);


        session()->flash('alert_message','Profile Updated Successfully');
        session()->flash('alert_type','success');
        return redirect()->back();

    }
}
