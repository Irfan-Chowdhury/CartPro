<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Category;
use App\Mail\ContactUs;
use App\MenuItem;
use App\Models\Slider;
use App\Page;
use App\StorefrontMenu;
use Mail;
use Auth;

class frontController extends Controller
{

     public function index()
    {
        // $storefront_menu = StorefrontMenu::with('menu')->first();

        // if (($storefront_menu->primary_menu_id !=NULL) && ($storefront_menu->menu->count()>0)) {
        //     return $storefront_menu->primary_menu_id;
        // }

        // $data = MenuItem::with('childs','page')
        //         ->where('menu_id',2)
        //         ->where('parent_id',NULL)
        //         ->where('is_active',1)
        //         ->get();
                 
        // return $data;

        $sliders = Slider::where('is_active',1)->get();

        $products = Product::where('is_active', 1)->take(10)->get();
        //return $products;
        return view('pages.index',compact('products','sliders'));
    }

    public function search($product)
    {
        $data = Product::select('sku', 'image', 'product_name', 'slug')->where('product_name', 'LIKE', '%'.$product.'%')->where('status', 1)->get();

        return response()->json($data);
    }
    
    public function searchProduct(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%'.$request->input('search').'%')->where('is_active', 1)->get();

        return view('pages.products-search', compact('products'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactMail(Request $request)
    {
        // $data = [
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('phone'),
        //     'message' => $request->input('message'),
        // ];
        
        $data = [
            'name' => 'name',
            'email' => 'email',
            'phone' => 'phone',
            'message' => 'message',
        ];

        //Mail::to('schowd@aitradingusa.com')->send(new ContactUs($data));
        Mail::to('hello@lion-coders.com')->send(new ContactUs($data));
    }

    public function faq()
    {
        return view('pages.faq');
    }
    
    public function tnc()
    {
        return view('pages.terms');
    }


    public function pageShowBySlug($slug)
    {   
        $page = Page::where('meta_title','=',$slug)->where('status',1)->first();

        return view('pages.page-show',compact('page'));
    }

}
