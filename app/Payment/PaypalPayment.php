<?php

namespace App\Payment;

use App\Contracts\Payble\PaybleContract;
use App\Traits\PaymentTrait;

class PaypalPayment implements PaybleContract
{
    use PaymentTrait;

    public function pay($request, $order_id)
    {
        //logic here
        $this->reduceProductQuantity($order_id);
        $this->destroyOthers();
    }
}

?>
