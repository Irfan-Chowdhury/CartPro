<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageHandleTrait;
use SebastianBergmann\Environment\Console;

class RegisterController extends Controller
{
    use imageHandleTrait;

    public function customerRegister(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'username'   => 'required|string|unique:users',
            'email'      => 'required|string|email|unique:users',
            'phone'      => 'required',
            'password'   => 'required|string|confirmed',
            'password_confirmation' => 'required',
            // 'gender'  => 'required',
            'image'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        if($validator->fails())
        {
            if ($request->billing_create_account_check) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            session()->flash('error','');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [];
        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['username']   = $request->username;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;
        $data['user_type']  = 0;
        $image       = $request->file('image');
        if ($image) {
            $data['image'] = $this->imageStore($image, $directory='images/customers/', $type='customer');
        }
        $data['password']   = Hash::make($request->password);

        $user = User::create($data);

        $data['user_id'] = $user->id;
        Customer::create($data);


        session()->flash('warning_type','success');
        session()->flash('message','Registration Successfully Done !!!');
        return redirect()->back();
    }
}
