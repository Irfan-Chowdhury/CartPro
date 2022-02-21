<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Auth;
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

    public function index()
    {
        return view('admin.pages.home');
    }
    public function dashboard()
    {
        $orders = Order::get();
        $products = Product::where('is_active',1)->get();
        $customers = Customer::all();

        return view('admin.pages.home',compact('orders','products','customers'));
    }

    public function chart()
    {
        $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        return response()->json($result);
    }


    public function googleAnalytics()
    {
        $analytics = Analytics::fetchVisitorsAndPageViews(Period::days(1));
        dd($analytics);
    }

    public function logout()
    {
        Auth::logout();
            $message=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );

        Session::flush();

             return Redirect()->route('admin')->with($message);
    }

}
