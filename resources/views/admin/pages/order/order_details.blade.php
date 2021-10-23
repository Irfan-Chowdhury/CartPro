@extends('admin.main')
@section('admin_content')

<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">
        <h3 class="font-weight-bold mt-3">{{__('file.Show Order')}}</h3>
        <div id="success_alert" role="alert"></div>
        <br>
    </div>


    <div class="container">

        <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">

        <h4 class="ml-3">{{__('file.Order & Account Information')}}</h4>
        <hr>
        <div class="row ml-1">
            <div class="col-md-6">
                <h4>{{__('file.Order Information')}}</h4>
                <table>
                    <tr>
                        <th>{{__('file.Order Date')}}</th>
                        <td>{{date('d M, Y',strtotime($order->created_at))}}</td>
                    </tr>
                    <tr>
                        <th>{{__('file.Order Status')}}</th>
                        <td>
                            <select name="order_status">
                                <option value="canceled" @if($order->order_status=='canceled') selected @endif class="orderStatus">{{ucfirst('canceled')}}</option>
                                <option value="completed" @if($order->order_status=='completed') selected @endif class="orderStatus">{{ucfirst('completed')}}</option>
                                <option value="onhold" @if($order->order_status=='onhold') selected @endif class="orderStatus">{{ucfirst('onhold')}}</option>
                                <option value="pending" @if($order->order_status=='pending') selected @endif class="orderStatus">{{ucfirst('pending')}}</option>
                                <option value="pending_payment" @if($order->order_status=='pending_payment') selected @endif class="orderStatus">{{ucfirst('pending_payment')}}</option>
                                <option value="proccessing" @if($order->order_status=='proccessing') selected @endif class="orderStatus">{{ucfirst('proccessing')}}</option>
                                <option value="refunded" @if($order->order_status=='refunded') selected @endif class="orderStatus">{{ucfirst('refunded')}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>{{__('file.Shipping Method')}}</th>
                        <td>{{$order->shipping_method}}</td>
                    </tr>
                    <tr>
                        <th>{{__('file.Payment Method')}}</th>
                        <td>{{$order->payment_method}}</td>
                    </tr>
                    <tr>
                        <th>{{__('file.Currency')}} (pending)</th>
                        <td>{{__('file.INR')}}</td>
                    </tr>
                    <tr>
                        <th>{{__('file.Currency Rate')}} (pending)</th>
                        <td>454.2</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h4>{{__('file.Order Information')}}</h4>
                <table>
                    <tr>
                        <th>{{__('file.Customer Name')}}</th>
                        <td>{{$order->billing_first_name}}</td>
                    </tr>
                    <tr>
                        <th>{{__('file.Customer Email')}}</th>
                        <td>{{$order->billing_email}}</td>
                    </tr>
                    <tr>
                        <th>{{__('file.Customer Phone')}}</th>
                        <td>{{$order->billing_phone}}</td>
                    </tr>
                    <tr>
                        <th>{{__('file.Customer Group')}} (Pending)</th>
                        <td>Irfan</td>
                    </tr>
                </table>
            </div>
        </div>


        <br><br>
        <h4 class="ml-3">{{__('file.Address Information')}}</h4>
        <hr>
        <div class="row ml-1">
            <div class="col-md-6">
                <h4>{{__('file.Billing Address')}}</h4><br>
                <span>{{$order->billing_address_1 ?? null}}</span> <br>
                <span>{{$order->billing_city ?? null}}</span><br>
                <span>{{$order->billing_state ?? null}}</span><br>
                <span>{{$order->billing_zip_code ?? null}}</span><br>
                <span>{{$order->billing_country ?? null}}</span>
            </div>
            <div class="col-md-6">
                <h4>{{__('file.Shipping Address')}}</h4><br>
                <span>{{$order->shippingDetails->shipping_address_1 ?? null}}</span> <br>
                <span>{{$order->shippingDetails->shipping_city ?? null}}</span><br>
                <span>{{$order->shippingDetails->shipping_state ?? null}}</span><br>
                <span>{{$order->shippingDetails->shipping_zip_code ?? null}}</span><br>
                <span>{{$order->shippingDetails->shipping_country ?? null}}</span>
            </div>
        </div>


        <br><br>
        <h4 class="ml-3">{{__('file.Items Ordered')}}</h4>
        <hr>
        <div class="row ml-1">
            <div class="col-md-12">
                <table>
                    <tr>
                        <th>{{__('file.Product')}}</th>
                        <th>{{__('file.Unit Price')}}</th>
                        <th>{{__('file.Quantity')}}</th>
                        {{-- <th>{{__('file.Line Total')}}</th> --}}
                    </tr>

                    @forelse ($order->orderDetails as $item)
                        <tr>
                            <td>{{$item->product->productTranslation->product_name}}</td>
                            <td>{{$item->subtotal}}</td>
                            <td>{{$item->qty}}</td>
                        </tr>
                    @empty
                    @endforelse
                </table>
            </div>
        </div>
    </div>

    <div class="table-responsive">

    </div>
</section>

<script type="text/javascript">
    $('.orderStatus').on('click',function(){
        var order_status = $(this).val();
        var order_id = $('#order_id').val();

        $.ajax({
            url: "{{ route('admin.order.status') }}",
                type: "GET",
                data: {
                    order_id:order_id,
                    order_status:order_status,
                },
                success: function (data) {
                    console.log(data);
                    if (data.type=='success') {
                        location.reload(true);
                    }
                }
        });
        //
    });
</script>

@endsection
