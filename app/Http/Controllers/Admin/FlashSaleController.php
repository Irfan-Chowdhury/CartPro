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
use Illuminate\Support\Facades\App;

class FlashSaleController extends Controller
{
    use ActiveInactiveTrait, SlugTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index()
    {
        if (auth()->user()->can('flash_sale-view'))
        {
            $local = Session::get('currentLocal');
            App::setLocale($local);

            $flashSales = FlashSale::with(['flashSaleTranslations'=> function ($query) use ($local){
                $query->where('local',$local)
                ->orWhere('local','en')
                ->orderBy('id','DESC');
            }])
            ->orderBy('is_active','DESC')
            ->orderBy('id','DESC')
            ->get();


            if (request()->ajax())
            {
                return datatables()->of($flashSales)
                ->setRowId(function ($row){
                    return $row->id;
                })
                ->addColumn('campaign_name', function ($row) use ($local)
                {
                    if ($row->flashSaleTranslations->count()>0){
                        foreach ($row->flashSaleTranslations as $key => $value){
                            if ($key<1){
                                if ($value->local==$local){
                                    return $value->campaign_name;
                                }elseif($value->local=='en'){
                                    return $value->campaign_name;
                                }
                            }
                        }
                    }else {
                        return "NULL";
                    }
                })
                ->addColumn('action', function ($row)
                {
                    $actionBtn = "";
                    if (auth()->user()->can('flash_sale-edit'))
                    {
                        $actionBtn .= '<a href="'.route('admin.flash_sale.edit', $row->id) .'" class="edit btn btn-info btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                        &nbsp; ';
                    }
                    if (auth()->user()->can('flash_sale-action'))
                    {
                        if ($row->is_active==1) {
                            $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                        }else {
                            $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            return view('admin.pages.flash_sale.index');
        }
        return abort('403', __('You are not authorized'));
    }


    public function create()
    {
        $local = Session::get('currentLocal');
        App::setLocale($local);

        $products = Product::with('productTranslation','productTranslationEnglish')
            ->where('is_active',1)
            ->get();

        return view('admin.pages.flash_sale.create',compact('products','local'));
    }


    public function store(Request $request)
    {
        if (auth()->user()->can('flash_sale-store'))
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

    }

    public function edit($id)
    {
        $local = Session::get('currentLocal');
        App::setLocale($local);

        $products = Product::with('productTranslation','productTranslationEnglish')
                    ->where('is_active',1)
                    ->get();

        $flashSale = FlashSale::with(['flashSaleProducts','flashSaleTranslations'=> function ($query) use ($local){
                $query->where('local',$local)
                    ->first();
            }])
            ->whereId($id)
            ->first();

        return view('admin.pages.flash_sale.edit',compact('products','local','flashSale'));
    }

    // public function update(Request $request)
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'product_id'=> 'required',
            'end_date'  => 'required',
            'price'     => 'required',
            'qty'       => 'required',
            // 'campaign_name' => 'required|unique:flash_sale_translations,campaign_name,'.$request->product_translation_id,
            'campaign_name' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $locale      = Session::get('currentLocal');

        if (auth()->user()->can('flash_sale-edit'))
        {
            $product_ids = $request->product_id; //Array Data
            $end_dates   = $request->end_date; //Array Data
            $prices      = $request->price; //Array Data
            $qtys        = $request->qty; //Array Data
            $count       = count($product_ids); // $product_id == $end_date == $price == $qty -  same amount of data

            // DB::beginTransaction();
            // try {
                $flashSale            = FlashSale::find($id);
                $flashSale->is_active = $request->is_active ?? 0;
                $flashSale->update();

                DB::table('flash_sale_translations')
                ->updateOrInsert(
                    [  'flash_sale_id' => $id, 'local' => $locale], //condition
                    [  'campaign_name' => $request->campaign_name] //Set Value
                );

                FlashSaleProduct::Where('flash_sale_id',$id)->whereNotIN('product_id',$product_ids)->delete();

                for ($i=0; $i <$count;  $i++) {
                    DB::table('flash_sale_products')
                    ->updateOrInsert(
                        [
                            'flash_sale_id' => $id,
                            'product_id'    => $product_ids[$i],
                        ],
                        [
                            'end_date'      => $end_dates[$i],
                            'price'         => $prices[$i],
                            'qty'           => $qtys[$i],
                        ]
                    );
                }
            // }
            // catch (Exception $e)
            // {
            //     DB::rollback();
            //     return response()->json(['error' => $e->getMessage()]);
            // }

            // return response()->json(['success' => __('Data Updated successfully.')]);
            session()->flash('type','success');
            session()->flash('message','Successfully Updated');
            return redirect()->back();
        }
    }

    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData(FlashSale::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData(FlashSale::find($request->id));
        }
    }

    public function bulkAction(Request $request)
    {
        if ($request->ajax()) {
            return $this->bulkActionData($request->action_type, FlashSale::whereIn('id',$request->idsArray));
        }

        // if ($request->ajax()) {
        //     if ($request->action_type==='active'){
        //         $data  = FlashSale::whereIn('id',$request->idsArray);
        //         $dataUpdate = $data->update(['is_active'=>1]);
        //         $dataId= $data->pluck('id');
        //         return response()->json(['success' => 'Data Active Successfully','dataId'=>$dataId]);
        //     }elseif($request->action_type==='inactive') {
        //         FlashSale::whereIn('id',$request->idsArray)->update(['is_active'=>0]);
        //         return response()->json(['success' => 'Data Inactive Successfully']);
        //     }
        // }
    }
}
