<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function create(Request $request)
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
        $mergeData = array_merge($data,['status' => TransactionStatus::PENDING, 'vendor_order_id' => $order['id']]);
        DB::beginTransaction();
        Order::create($mergeData);
        DB::commit();
        return response()->json($order);


        // return redirect($order['links'][1]['href'])->send();
        // echo('Create working');
    }
}
