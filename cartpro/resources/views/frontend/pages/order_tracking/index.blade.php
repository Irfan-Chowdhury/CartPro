@extends('frontend.layouts.master')
@section('title','Order Tracking')

@section('frontend_content')
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="{{route('cartpro.home')}}">@lang('file.Home')</a></li>
                        <li class="active">@lang('file.Order Tracking')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->

    <!--Order tracking section starts-->
    <section class="order-track-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>@lang('file.Order Tracking')</h3>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="order-track-text text-center">
                        <p>@lang("file.To track your order please enter your order ID in the box below and press the 'Track' button. This was given to you on your receipt and in the confirmation email you should have received")</p>
                    </div>
                    <div class="order-tracking-form">

                        <form class="row calculate-shipping mar-top-40" action="{{route('cartpro.order_tracking_find')}}" method="post">
                            @csrf

                            <div class="col-sm-12">
                                <label class="text-black text-left">@lang('file.Order ID') <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="order_id" placeholder="Found in your order confirmation email">
                            </div>
                            <div class="col-sm-12 mt-3">
                                <label class="text-black text-left">@lang('file.Email') <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="email" placeholder="email you used during checkout">
                            </div>
                            <div class="col-sm-12 mt-3">
                                <button type="submit" class="button style1">@lang('file.Track')</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Order tracking section ends-->

@endsection
