<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageHandleTrait;
use App\Traits\ENVFilePutContent;

class UserAccountController extends Controller
{
    use imageHandleTrait, ENVFilePutContent;

    public function userAccount()
    {
        $locale = Session::get('currentLocal');

        $orders = DB::table('orders')
            ->join('order_details','order_details.order_id','orders.id')
            ->join('products','products.id','order_details.product_id')
            ->join('product_translations',function ($join) use($locale) {
                $join->on('product_translations.product_id', '=', 'products.id')
                ->where('product_translations.local', '=', $locale);
            })
            ->where('user_id',Auth::user()->id)
            ->select('orders.total','product_translations.product_name','order_details.image','order_details.price','order_details.qty','order_details.options')
            ->get();

        return view('frontend.pages.user_account',compact('orders'));
    }


    public function userLogout()
    {
        Auth::logout();
        Session::flush();
        $this->dataWriteInENVFile('USER_CHANGE_CURRENCY_SYMBOL',NULL);
        $this->dataWriteInENVFile('USER_CHANGE_CURRENCY_RATE',1.00);
        return redirect('/login');
    }


    public function userProfileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'nullable|required|string',
            'last_name'  => 'nullable|required|string',
            'phone'      => 'nullable|required',
            'password'   => 'confirmed',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
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
        if ($request->password) {
            $data['password']   = Hash::make($request->password);
        }
        User::whereId(Auth::user()->id)->update($data);
        Customer::where('user_id',Auth::user()->id)->update($data);

        session()->flash('alert_message','Profile Updated Successfully');
        session()->flash('alert_type','success');
        return redirect()->back();

    }
}
