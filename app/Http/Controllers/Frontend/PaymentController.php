<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\FlashSaleProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\ENVFilePutContent;
use Stripe;

class PaymentController extends Controller
{
    use ENVFilePutContent;

    public function PaypalCreate(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $this->paypalClient->setApiCredentials(config('paypal'));
        $token = $this->paypalClient->getAccessToken();
        $this->paypalClient->setAccessToken($token);
        $order = $this->paypalClient->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                 [
                    "amount"=> [
                        "currency_code"=> "USD",
                        "value"=> 10
                    ],
                     'description' => 'test'
                ]
            ],
        ]);


        // $mergeData = array_merge($data,['status' => TransactionStatus::PENDING, 'vendor_order_id' => $order['id']]);
        // DB::beginTransaction();
        // Order::create($mergeData);
        // DB::commit();
        // return response()->json($order);
    }

    public function paymentProcees(Request $request)
    {
        // return $request->payment_type;
        if ($request->billing_create_account_check) {
            $validator = Validator::make($request->all(),[
                'billing_first_name' => 'required|string',
                'billing_last_name'  => 'required|string',
                'username'           => 'required|string|unique:users',
                'billing_phone'      => 'required',
                'password'           => 'required|string|confirmed',
                'password_confirmation' => 'required',
            ]);

            if($validator->fails()){
                session()->flash('error','Something Error');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data['first_name'] = $request->billing_first_name;
            $data['last_name']  = $request->billing_last_name;
            $data['username']   = $request->username;
            $data['email']      = $request->billing_email;
            $data['phone']      = $request->billing_phone;
            $data['user_type']  = 0;
            $data['password']   = Hash::make($request->password);

            $user = User::create($data);
            $data['user_id'] = $user->id;
            Customer::create($data);
        }

        $order_id = $this->orderStore($request);

        if ($request->payment_type=='sslcommerz'){
            $this->SSLCommerz($request, $order_id);
        }elseif ($request->payment_type=='paypal'){
            $this->reduceProductQuantity($order_id);
            return $this->destroyOthers();
        }elseif ($request->payment_type=='cash_on_delivery'){
            $this->reduceProductQuantity($order_id);
            return $this->destroyOthers();
        }elseif ($request->payment_type=='stripe'){
            $this->stripe($request);
            $this->reduceProductQuantity($order_id);
            return $this->destroyOthers();
        }
    }

    protected function destroyOthers(){
        Cart::destroy();
        $this->dataWriteInENVFile('USER_CHANGE_CURRENCY_SYMBOL',NULL);
        $this->dataWriteInENVFile('USER_CHANGE_CURRENCY_RATE',1.00);
        return redirect('payment_success');
    }


    protected function orderStore($request){
        $order = new Order();
        $order->user_id = Auth::user()->id ?? null;
        $order->billing_first_name = $request->billing_first_name;
        $order->billing_last_name = $request->billing_last_name;
        $order->billing_email = $request->billing_email;
        $order->billing_phone = $request->billing_phone;
        $order->billing_country = $request->billing_country;
        $order->billing_address_1 = $request->billing_address_1;
        $order->billing_address_2 = $request->billing_address_2;
        $order->billing_city = $request->billing_city;
        $order->billing_state = $request->billing_state;
        $order->billing_zip_code = $request->billing_zip_code;
        $order->shipping_method = $request->shipping_type;
        $order->shipping_cost = $request->shipping_cost;
        $order->payment_method = $request->payment_type;
        $order->total = implode(explode(',',$request->totalAmount));
        $order->currency_base_total = $order->total * env('USER_CHANGE_CURRENCY_RATE');
        $order->currency_symbol = (env('USER_CHANGE_CURRENCY_SYMBOL')!=NULL ? env('USER_CHANGE_CURRENCY_SYMBOL') : env('DEFAULT_CURRENCY_SYMBOL'));
        $order->order_status = 'pending';
        $order->payment_status = 'pending';
        $order->payment_id = uniqid();
        $order->date = date('Y-m-d');
        $order->tax_id = $request->tax_id!=NULL ? $request->tax_id : NULL;


        if ($request->coupon_code && $request->coupon_checked==1) {
            $coupon = Coupon::where('coupon_code',$request->coupon_code);
            if ($coupon->exists()) {
                $coupon = Coupon::where('coupon_code',$request->coupon_code)->first();
                $order->coupon_id = $coupon->id;
            }
        }

        $shipping = new Shipping();
        $shipping->shipping_first_name = $request->shipping_first_name;
        $shipping->shipping_last_name = $request->shipping_last_name;
        $shipping->shipping_email = $request->shipping_email;
        $shipping->shipping_phone = $request->shipping_phone;
        $shipping->shipping_country = $request->shipping_country;
        $shipping->shipping_address_1 = $request->shipping_address_1;
        $shipping->shipping_address_2 = $request->shipping_address_2;
        $shipping->shipping_city = $request->shipping_city;
        $shipping->shipping_state = $request->shipping_state;
        $shipping->shipping_zip_code = $request->shipping_zip_code;

        $order->save();
        if ($request->shipping_address_check==1) { //if selected shipping
            $shipping->order_id = $order->id;
            $shipping->save();
        }

        $content    = Cart::content();
        foreach ($content as $row)
        {
            $order_detail = new OrderDetail();
            $order_detail->order_id   = $order->id;
            $order_detail->product_id = $row->id;
            $order_detail->image      = $row->options->image;
            $order_detail->options    = $row->options;
            $order_detail->price      = $row->price;
            $order_detail->qty        = $row->qty;
            $order_detail->weight     = $row->weight;
            $order_detail->discount   = $request->coupon_value;
            $order_detail->tax        = $row->tax;
            $order_detail->subtotal   = $row->subtotal;
            $order_detail->save();
        }
        return $order->id;
    }

    protected function reduceProductQuantity($order_id){
        $order_details = OrderDetail::where('order_id',$order_id)->get();
        foreach ($order_details as $row) {

            if (FlashSaleProduct::where('product_id',$row->product_id)->exists()) {
                DB::table('flash_sale_products')
                ->where('product_id',$row->product_id)
                ->update(['qty' => DB::raw('qty -'.$row->qty)]);
            }else {
                DB::table('products')
                ->where('id',$row->product_id)
                ->where('manage_stock',1)
                ->update(['qty' => DB::raw('qty -'.$row->qty)]);
            }
        }


        Cart::destroy();
    }

    /*
    |------------------------------------------------------------
    |Stripe
    |------------------------------------------------------------
    */
    protected function stripe($request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (int)implode(explode(',',$request->totalAmount)),
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Stripe Payment Successfull."
        ]);
    }


    /*
    |------------------------------------------------------------
    |SSL Commerz Part
    |------------------------------------------------------------
    */
    protected function SSLCommerz($request, $order_id){
        $post_data = array();
        $post_data['total_amount'] = implode(explode(',',$request->totalAmount)); # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        // # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->billing_first_name.' '.$request->billing_last_name;
        $post_data['cus_email'] = $request->billing_email;
        $post_data['cus_add1'] = $request->billing_address_1;
        $post_data['cus_add2'] = $request->billing_address_2;
        $post_data['cus_city'] = $request->billing_city;
        $post_data['cus_state'] = $request->billing_state;
        $post_data['cus_postcode'] = $request->billing_zip_code;
        $post_data['cus_country'] = $request->billing_country;
        $post_data['cus_phone'] = $request->billing_phone;
        $post_data['cus_fax'] = "";

        // # SHIPMENT INFORMATION
        $post_data['ship_name'] = $request->shipping_first_name.' '.$request->shipping_last_name;
        $post_data['ship_add1'] = $request->shipping_address_1;
        $post_data['ship_add2'] = $request->shipping_address_2;
        $post_data['ship_city'] = $request->shipping_city;
        $post_data['ship_state'] = $request->shipping_state;
        $post_data['ship_postcode'] = $request->shipping_zip_code;
        $post_data['ship_phone'] = $request->shipping_phone;
        $post_data['ship_country'] = $request->shipping_country;

        $post_data['shipping_method'] = $request->shipping_type;
        $post_data['product_name'] = "Unknown";
        $post_data['product_category'] = "Unknown";
        $post_data['product_profile'] = "Unknown";

        // # OPTIONAL PARAMETERS
        $post_data['value_a'] = $order_id;
        $post_data['value_b'] = "";
        $post_data['value_c'] = "";
        $post_data['value_d'] = "";

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');
        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }


    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        $order = Order::find($request->input('value_a'));

        if ($order->payment_status == 'pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $order->payment_status = 'complete';
                // payment_status
                $order->update();

                $this->reduceProductQuantity($request->input('value_a'));

                return $this->destroyOthers();

            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $order->payment_status = 'failed';
                $order->update();
                echo "validation Fail";
            }
        } else if ($order->payment_status == 'processing' || $order->payment_status == 'complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }



}
