<?php

namespace App\Services;


use App\Payment\CashOnDeliveryPayment;
use App\Payment\PaypalPayment;
use App\Payment\StripePayment;
use App\Traits\ENVFilePutContent;
use App\Traits\MailTrait;


class PaymentService
{
    use ENVFilePutContent, MailTrait;

    public function initialize($payment_type)
    {
        switch ($payment_type) {
            case 'cash_on_delivery':
                return new CashOnDeliveryPayment();
            case 'paypal':
                return new PaypalPayment();
            case 'stripe':
                return new StripePayment();
            default:
                # code...
                break;
        }
    }
}
?>
