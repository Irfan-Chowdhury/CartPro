<?php

namespace App\Payment;

use App\Contracts\Payble\PaybleContract;

class SSLCommerzPayment implements PaybleContract
{
    public function pay($request, $order_id)
    {
        //logic here
    }
}

?>
