<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurrencyRate;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id','DESC')->get();

        if (request()->ajax())
        {
            return datatables()->of($orders)
            ->setRowId(function ($row){
                return $row->id;
            })
            ->addColumn('customer_name', function ($row)
            {
                if ($row->billing_first_name==NULL && $row->billing_last_name==NULL) {
                    return Auth::user()->first_name.' '.Auth::user()->last_name;
                }else {
                    return $row->billing_first_name.' '.$row->billing_last_name;
                }
            })
            ->addColumn('customer_email', function ($row)
            {
                if ($row->billing_first_name==NULL && $row->billing_last_name==NULL) {
                    return Auth::user()->email;
                }else {
                    return $row->billing_email;
                }

            })
            ->addColumn('order_status', function ($row)
            {
                return ucfirst($row->order_status);
            })
            ->addColumn('created_at', function ($row)
            {
                return date('Y-m-d',strtotime($row->created_at));
            })
            ->addColumn('action', function ($row)
            {
                $actionBtn = "";

                $actionBtn .= '<a href="'.route('admin.order.details', $row->id).'" class="view btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                    &nbsp;';

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.pages.order.index');
    }

    public function transactionIndex()
    {
        $orders = Order::orderBy('id','DESC')->where('order_status','completed')->get();

        if (request()->ajax())
        {
            return datatables()->of($orders)
            ->setRowId(function ($row){
                return $row->id;
            })
            ->addColumn('order_status', function ($row)
            {
                return ucfirst($row->order_status);
            })
            ->addColumn('created_at', function ($row)
            {
                return date('Y-m-d',strtotime($row->created_at));
            })
            ->addColumn('action', function ($row)
            {
                $actionBtn = "";

                $actionBtn .= '<a href="'.route('admin.order.details', $row->id).'" class="view btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                    &nbsp;';

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.pages.order.transaction');
    }

    public function orderDetails($id)
    {
        $order = Order::with('orderDetails.product.productTranslation','shippingDetails')->find($id);

        $currency_rate = 0.00;
        $default_currency_code = env('DEFAULT_CURRENCY_CODE');
        if ($default_currency_code) {
            $currency_rate = CurrencyRate::where('currency_code',$default_currency_code)->first()->currency_rate;
        }
        return view('admin.pages.order.order_details',compact('order','currency_rate'));
    }

    public function orderStatus(Request $request)
    {
        Order::where('id',$request->order_id)->update(['order_status'=>$request->order_status]);

        if ($request->order_status=='completed') {
            $order_details = OrderDetail::where('order_id',$request->order_id)->get();

            foreach ($order_details as $row) {
                DB::table('products')
                    ->where('id',$row->product_id)
                    ->update(['qty' => DB::raw('qty -'.$row->qty)]);
            }
        }

        return response()->json(['type'=>'success']);
    }
}
