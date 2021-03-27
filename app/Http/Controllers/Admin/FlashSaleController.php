<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleProduct;
use App\Models\FlashSaleTranslations;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\ActiveInactiveTrait;
use App\Traits\SlugTrait;

class FlashSaleController extends Controller
{
    use ActiveInactiveTrait, SlugTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {   
        return view('admin.pages.flash_sale.index');
    }

    
    public function create()
    {
        $local = Session::get('currentLocal');

        $products = Product::with(['productTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->where('is_active',1)
            ->get();

        return view('admin.pages.flash_sale.create',compact('products','local'));
    }

    
    public function store(Request $request)
    { 
        if ($request->ajax()) {
            
            $validator = Validator::make($request->all(),[
                'product_id'=> 'required',
                'end_date'  => 'required',
                'price'     => 'required',
                'qty'       => 'required',
                'campaign_name' => 'required|unique:flash_sale_translations',
            ]);

            if ($validator->fails())
            {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            if ($validator->fails()){
                session()->flash('type','danger');
                session()->flash('message','Something Error. Please Try Again');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $local      = Session::get('currentLocal');

            $product_id = $request->product_id; //Array Data
            $end_date   = $request->end_date; //Array Data
            $price      = $request->price; //Array Data
            $qty        = $request->qty; //Array Data

            $count = count($product_id); // $product_id == $end_date == $price == $qty -  same amount of data

            if ($product_id && $end_date && $price && $qty) {

                DB::beginTransaction();
                try {
                    $flashSale            = new FlashSale();
                    $flashSale->slug      = $this->slug($request->campaign_name);
                    $flashSale->is_active = $request->is_active ?? 0;
                    $flashSale->save();

                    $flashSaleTranslation                = new FlashSaleTranslations();
                    $flashSaleTranslation->flash_sale_id = $flashSale->id;
                    $flashSaleTranslation->local         = $local;
                    $flashSaleTranslation->campaign_name = $request->campaign_name;
                    $flashSaleTranslation->save();

                    for ($i=0; $i <$count;  $i++) { 
                        $flashSaleProduct                = new FlashSaleProduct();
                        $flashSaleProduct->flash_sale_id = $flashSale->id;
                        $flashSaleProduct->product_id    = $product_id[$i];
                        $flashSaleProduct->end_date      = date("Y-m-d",strtotime($end_date[$i]));
                        $flashSaleProduct->price         = $price[$i];
                        $flashSaleProduct->qty           = $qty[$i];
                        $flashSaleProduct->save();
                    }
                    DB::commit();

                } catch (Exception $e)
                {
                    DB::rollback();

                    return response()->json(['error' => $e->getMessage()]);
                }
            }

            return response()->json(['success' => __('Data Saved successfully.')]);
        }
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
