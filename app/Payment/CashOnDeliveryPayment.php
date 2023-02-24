<?php

namespace App\Payment;

use App\Contracts\Payble\PaybleContract;
use App\Models\Order;
use App\Traits\MailTrait;
use App\Traits\PaymentTrait;
use App\Traits\TranslationTrait;

class CashOnDeliveryPayment implements PaybleContract
{
    use PaymentTrait;
    use MailTrait;
    use TranslationTrait;

    public function test(){
        // Test
        // Array
        $data = $this->sendMailWithOrderDetailsInvoice(1005);
        return  $data;
        return $this->translations($data['order_details'][0]['product']['product_translations']);

        // Object
        // $data = Order::with('orderDetails.product.productTranslations','shippingDetails')->where('reference_no',1005)->first();
        // return $this->translations($data->orderDetails[0]->product->productTranslations);


        // return $data['order_details'][0]['product']['product_translations'];

        // Test End
    }

    public function pay($request, $otherRequest)
    {
        // return $this->test();
        $order_id = $this->orderStore($request);
        $this->reduceProductQuantity($order_id);
        return redirect('payment_success');
    }

    public function cancel(){
        $this->orderCancel();
        return redirect(route('cartpro.home'));
    }
}

?>
