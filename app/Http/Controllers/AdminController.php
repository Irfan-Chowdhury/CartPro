<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

//Google Analytics
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        App::setLocale(Session::get('currentLocal'));
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "string";
        return view('admin.home');
    }
    public function dashboard()
    {
        App::setLocale(Session::get('currentLocal'));

        return view('admin.home');
    }


    public function googleAnalytics()
    {
        $analytics = Analytics::fetchMostVisitedPages(Period::days(1));
        dd($analytics);
    }


    // public function ChangePassword()
    // {
    //     return view('admin.auth.passwordchange');
    // }

    // public function Update_pass(Request $request)
    // {
    //   $password=Auth::user()->password;
    //   $oldpass=$request->oldpass;
    //   $newpass=$request->password;
    //   $confirm=$request->password_confirmation;
    //   if (Hash::check($oldpass,$password)) {
    //        if ($newpass === $confirm) {
    //                   $user=Admin::find(Auth::id());
    //                   $user->password=Hash::make($request->password);
    //                   $user->save();
    //                   Auth::logout();
    //                   $notification=array(
    //                     'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
    //                     'alert-type'=>'success'
    //                      );
    //                    return Redirect()->route('admin.login')->with($notification);
    //              }else{
    //                  $notification=array(
    //                     'messege'=>'New password and Confirm Password not matched!',
    //                     'alert-type'=>'error'
    //                      );
    //                    return Redirect()->back()->with($notification);
    //              }
    //   }else{
    //     $notification=array(
    //             'messege'=>'Old Password not matched!',
    //             'alert-type'=>'error'
    //              );
    //            return Redirect()->back()->with($notification);
    //   }
    // }

    public function logout()
    {
        Auth::logout();
            $message=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('admin')->with($message);
    }

}
