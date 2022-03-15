<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\UserShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();

        $userShippingAddress = UserShippingAddress::where('user_id',Auth::user()->id)->get();

        return view('frontend.pages.user_account.shipping_address.index',compact('countries','userShippingAddress'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('country'),[
            'country' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->has('is_default')) {
            UserShippingAddress::where('user_id',Auth::user()->id)->update(['is_default'=>0]);
        }

        $userShippingAddress            = new UserShippingAddress;
        $userShippingAddress->user_id   = Auth::user()->id;
        $userShippingAddress->country   = $request->country;
        $userShippingAddress->address_1 = $request->address_1;
        $userShippingAddress->address_2 = $request->address_2;
        $userShippingAddress->city      = $request->city;
        $userShippingAddress->state     = $request->state;
        $userShippingAddress->zip_code  = $request->zip_code;
        $userShippingAddress->is_default= $request->has('is_default');
        $userShippingAddress->save();

        session()->flash('success_message','Data Added Successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('is_default')) {
            UserShippingAddress::where('user_id',Auth::user()->id)->update(['is_default'=>0]);
        }

        $userShippingAddress            = UserShippingAddress::find($id);
        $userShippingAddress->user_id   = Auth::user()->id;
        $userShippingAddress->country   = $request->country;
        $userShippingAddress->address_1 = $request->address_1;
        $userShippingAddress->address_2 = $request->address_2;
        $userShippingAddress->city      = $request->city;
        $userShippingAddress->state     = $request->state;
        $userShippingAddress->zip_code  = $request->zip_code;
        $userShippingAddress->is_default= $request->has('is_default');
        $userShippingAddress->update();

        session()->flash('success_message','Data Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserShippingAddress::find($id)->delete();

        session()->flash('success_message','Data Deleted Successfully');
        return redirect()->back();
    }
}
