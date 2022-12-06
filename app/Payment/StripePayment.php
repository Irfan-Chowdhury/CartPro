<?php

namespace App\Payment;

use App\Contracts\Payble\PaybleContract;
use App\Traits\PaymentTrait;
use Exception;
use Stripe;

class StripePayment implements PaybleContract
{
    use PaymentTrait;

    // public function pay($request, $order_id)
    // {
    //     //logic here
    //     try {
    //         $this->stripe($request);
    //     } catch (Exception $e) {
    //         $this->undoDBTableData($order_id);
    //         return redirect()->back()->withErrors(['errors' => [$e->getMessage()]]);
    //     }
    //     $this->reduceProductQuantity($order_id);
    //     return $this->destroyOthers();
    // }

    // public function pay($request)
    // {
    //     //logic here
    //     try {
    //         $this->stripe($request);
    //     } catch (Exception $e) {
    //         $this->undoDBTableData($order_id);
    //         return redirect()->back()->withErrors(['errors' => [$e->getMessage()]]);
    //     }
    //     $this->reduceProductQuantity($order_id);
    //     return $this->destroyOthers();
    // }

    protected function stripe($request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (int)implode(explode(',',$request->totalAmount)),
                "currency" => env('STRIPE_CURRENCY'),
                "source" => $request->stripeToken,
                "description" => "Stripe Payment Successfull."
        ]);
    }
}

?>
