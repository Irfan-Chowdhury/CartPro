<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
                return $row->billing_first_name.' '.$row->billing_last_name;
            })
            ->addColumn('customer_email', function ($row)
            {
                return $row->billing_email;
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

    public function orderDetails($id)
    {
        $order = Order::with('orderDetails.product.productTranslation','shippingDetails')->find($id);

        // return $order;
        return view('admin.pages.order.order_details',compact('order'));
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
