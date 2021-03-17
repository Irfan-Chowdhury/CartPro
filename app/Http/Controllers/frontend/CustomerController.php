<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Customer;
use App\User;
use Auth;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.home');
    }

    public function orders()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $sales = Sale::select('id','reference_no','grand_total','sale_status','created_at')->where('customer_id',$customer->id)->orderBy('created_at','DESC')->get();
        return view('customer.orders', compact('customer', 'sales'));
    }

    public function wishlist()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        return view('customer.wishlist', compact('customer'));
    }

    public function address()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        return view('customer.addresses', compact('customer'));
    }

    public function addressUpdate(Request $request)
    {
        $data = [
            'name'              => trim(htmlspecialchars($request->input('name'))),
            'address'           => trim(htmlspecialchars($request->input('address'))),
            'city'              => trim(htmlspecialchars($request->input('city'))),
            'postal_code'       => trim(htmlspecialchars($request->input('postal_code'))),
            'ship_address'      => trim(htmlspecialchars($request->input('ship_address'))),
            'ship_city'         => trim(htmlspecialchars($request->input('ship_city'))),
            'ship_postal_code'  => trim(htmlspecialchars($request->input('ship_postal_code'))),
            'customer_group_id' => 1,
        ];

        $data['phone_number'] = auth()->user()->phone;

        $id = auth()->user()->id;

        $updateAddress = Customer::where('user_id', $id)->update($data);

        Session::flash('message', 'Address updated');
        Session::flash('type', 'success'); 

        return redirect()->back();

    }

    public function accountDetails()
    {
        $customer = Customer::select('id')->where('user_id', Auth::id())->first();
        return view('customer.account-details', compact('customer'));
    }    
}
