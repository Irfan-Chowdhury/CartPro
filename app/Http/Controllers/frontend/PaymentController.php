<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Shipping;
class PaymentController extends Controller
{
    public function paypalSuccess()
    {
        return view('pages.payment.paypal');
    }
    
    public function payment(Request $request)
    {
          $cart=session()->get('cart');
          $new_balance = session()->get('new_balance');  
    	  $data=array();
    	  $data['name']=htmlspecialchars($request->name);
    	  $data['email']=htmlspecialchars($request->email);
    	  $data['phone']=htmlspecialchars($request->phone);
    	  $data['address']=htmlspecialchars($request->address);
    	  $data['city']=htmlspecialchars($request->city);
    	  $data['payment']=$request->payment;

    	  if ($request->payment == 'stripe') {
          // $cart=session()->get('cart');
          // $new_balance = session()->get('new_balance');  
          // $data=array();
          // $data['name']=$request->name;
          // $data['email']=$request->email;
          // $data['phone']=$request->phone;
          // $data['address']=$request->address;
          // $data['city']=$request->city;
          // $data['payment']=$request->payment;

    	  	return view('pages.payment.stripe',compact('data','cart','new_balance'));
    	 
    	  }elseif($request->payment == 'paypal'){

            return view('pages.payment.paypal',compact('data','cart','new_balance'));
    	  }elseif($request->payment == 'ideal'){
            return 'ideal';
    	  }else{
    	  	echo"handcash";
    	  }

    }



    public function STripeCharge(Request $request)
    {

	   $total=$request->subtotal;
    
        \Stripe\Stripe::setApiKey('sk_test_51Hp6jpFw96ArDCjl17ps6zDWIGyWPqGDCYGCWHa3APlII0amnz8aQq8dUPq1fQjgJNLjLhO5WtsOEXx0sjErvuFF0034g1M4TI');
		$token = $_POST['stripeToken'];
		$charge = \Stripe\Charge::create([
		    'amount' => $total*100,
		    'currency' => 'usd',
		    'description' => 'grocery shop',
		    'source' => $token,
		    'metadata' => ['order_id' => uniqid()],
		]);
        $data  = array();
        $data['user_id'] = Auth::id();
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['blnc_transaction'] = $charge->balance_transaction;
        $data['strip_orderid'] = $charge->metadata->order_id;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['subtotal'] = $request->subtotal;
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);
        //add Shipping information
        $shipping  = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->name;
        $shipping['ship_email'] = $request->email;   
        $shipping['ship_phone'] = $request->phone;
        $shipping['ship_address'] = $request->address;
        $shipping['ship_city'] = $request->city;
        DB::table('shipping')->insert($shipping);
        
        $cart=session()->get('cart');
        $details  = array();
        foreach ($cart as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row['id'];
            $details['product_name'] = $row['name'];
            $details['quantity'] = $row['qty'];
            $details['single_price'] = $row['unit_price'];
            $details['total_price'] = $row['qty'] * $row['unit_price'];
            DB::table('order_details')->insert($details);
        }
        session()->flush('cart');
        return redirect()->to('/')->with('success','order done');
            
    }
}
