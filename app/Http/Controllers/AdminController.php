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
    public function index()
    {
        return view('admin.pages.home');
    }
    public function dashboard()
    {
        //******* Temporaray For Language Input */
        // $lang_en = $this->readFileEnglish();
        // $lang_other = $this->readFileothers('bn');
        // $this->writeFile($lang_en, $lang_other);
        // return 'ok';
        // sort($lang_en);
        // foreach ($lang_en as $key => $val) {
        //     echo $val."</br>";
        // }
        //******* Temporaray End*/
        App::setLocale(Session::get('currentLocal'));
        $orders = Order::get();
        $products = Product::where('is_active',1)->get();
        $customers = Customer::all();

        return view('admin.pages.home',compact('orders','products','customers'));
    }

    protected function readFileEnglish(){
        $lang_en = [];
        $myfile = fopen("temporary/lang_en.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $stringRemoveCotation = fgets($myfile);
            $stringRemoveNewLine = str_replace("\n", '', $stringRemoveCotation);
            $lang_en[] = str_replace("'", '', $stringRemoveNewLine);
        }
        return $lang_en;
    }

    protected function readFileothers($locale){
        $lang_other = [];
        $myfile = fopen('temporary/lang_'.$locale.'.txt', 'r') or die("Unable to open file!");
        while(!feof($myfile)) {
            $stringRemoveCotation = fgets($myfile);
            $stringRemoveNewLine = str_replace("\n", '', $stringRemoveCotation);
            $lang_other[] = str_replace("'", '', $stringRemoveNewLine);
        }
        return $lang_other;
    }

    protected function writeFile($lang_en, $lang_other){
        $myfile_read = fopen("temporary/output_lang.txt", "w") or die("Unable to open file!");
        foreach ($lang_other as $key => $value) {
            if ($value==null){
                break;
            }else {
                $text = "'$lang_en[$key]'". '=>' ."'$value',\n";
                fwrite($myfile_read, $text);
            }
        }
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
