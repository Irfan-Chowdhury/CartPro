<?php
 
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Coupon;
use App\Customer;
 
class CheckoutController extends Controller
{
	public function index(Request $request)
	{
		$cart = session()->has('cart') ? session()->get('cart') : [];
		$total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
		$subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

		if(auth()->user()) {
			$customer = Customer::where('user_id',auth()->user()->id)->first();

			return view('frontend.checkout', compact('cart', 'total_qty', 'subTotal', 'customer'));
		}
		
		return view('pages.checkout', compact('cart', 'total_qty', 'subTotal'));
	}

	public function applyCoupon(Request $request)
	{
		$code = $request->input('coupon_code');
		$coupons = Coupon::where('coupon_code', $code)->where('end_date', '>', date('Y-m-d'))->where('status', 1)->first();

		if($coupons) {
			return response()->json(['status' => 'success', 'coupon_id' => $coupons->id, 'coupon_type' => $coupons->discount_type, 'discount_amount' => $coupons->discount_amount, 'message'=>'Discount applied']);
		} else {
			return response()->json(['status' => 'error', 'message'=>'Discount applied']);
		}

	}
}