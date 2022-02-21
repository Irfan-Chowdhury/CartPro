<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Traits\imageHandleTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use imageHandleTrait;

    public function index()
    {
        $user = User::find(auth()->user()->id);

        // return $user->image;

        return view('admin.pages.profile',compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user_id =  auth()->user()->id;

            // $validator = Validator::make($request->all(),[
            //     'first_name' => 'required|string',
            //     'last_name'  => 'required|string',
            //     'username'   => 'required|string',
            //     'email'      => 'required|string',
            //     'phone'      => 'required',
            //     'image'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            // ]);
            // if ($validator->fails()){
            //     session()->flash('alert_type','danger');
            //     session()->flash('alert_message','Something Error !!!');
            //     return redirect()->back()->withErrors($validator)->withInput();
            // }


        $user = User::find($user_id);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->username  = $request->username;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $image       = $request->file('image');
        if ($image) {
            if ($user->image) {
                $this->previousImageDelete($user->image);
            }
            $user->image = $this->imageStore($image, $directory='images/admin/', $type='admin');
        }
        $user->password   = Hash::make($request->password);
        $user->update();

        session()->flash('alert_type','success');
        session()->flash('alert_message','Successfully Updated');

        return redirect()->back();
    }
}
