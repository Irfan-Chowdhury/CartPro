<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function todayReport()
    {
        // $today = date('d-m-y');
        // $today = Carbon::now();
        // dd($today);

    	// $reports = DB::table('orders')->join('order_details','order_details.order_id','orders.id')->whereDate('orders.created_at',Carbon::today())->get();

    	$reports = Order::with('orderDetails.product.productTranslation','shippingDetails')->whereDate('created_at',Carbon::today())->get();

        return view('admin.pages.report.today_report',compact('reports'));
    }

    public function thisWeekReport()
    {
        $reports = Order::with('orderDetails.product.productTranslation','shippingDetails')->whereMonth('created_at',Carbon::now()->month)->get();
        return view('admin.pages.report.this_month',compact('reports'));
    }


    public function thisYearReport()
    {
        $reports = Order::with('orderDetails.product.productTranslation','shippingDetails')->whereYear('created_at',Carbon::now()->year)->get();
        return view('admin.pages.report.this_year',compact('reports'));
    }

    public function filterReport(Request $request)
    {
        if ($request->start_date && $request->end_date) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            $reports = Order::with('orderDetails.product.productTranslation','shippingDetails')->whereBetween('date',[$start_date,$end_date])->get();
            return view('admin.pages.report.filter_report',compact('reports'));
        }else {
            return view('admin.pages.report.filter_report');
        }
    }

    public function reportCoupon(Request $request)
    {
        return view('admin.pages.report.index');
    }

    public function reportcustomerOrders(Request $request)
    {
        return view('admin.pages.report.customer_orders');
    }

    public function productStockReport(Request $request)
    {
        return view('admin.pages.report.product_stock_report');
    }

    public function productViewReport()
    {
        return view('admin.pages.report.product_view_report');
    }

    public function salesReportReport()
    {
        return view('admin.pages.report.sales_report');
    }

    public function searchReport()
    {
        return view('admin.pages.report.search_report');
    }

    public function shippingReport()
    {
        return view('admin.pages.report.shipping_report');
    }

    public function taxReport()
    {
        return view('admin.pages.report.tax_report');
    }

    public function productPurchaseReport()
    {
        return view('admin.reports.product_purchase_report');
    }






    public function reportsType($report_type, Request $request)
    {
        $report_type = 'coupon';

        return view('admin.pages.report.index',compact('report_type'));
    }
}
