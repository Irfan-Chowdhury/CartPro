@extends('frontend.layouts.master')
@section('frontend_content')
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">Order History</h1>
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li class="active">Order History</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->

    @include('frontend.includes.alert_message')

    <!--My account Dashboard starts-->
    <section class="my-account-section">
        <div class="container">
            <div class="row">

                 <!-- Profile Common -->
                 @include('frontend.pages.user_account.profile_common')



                <div class="col-md-9 tabs style1">
                    <div class="row">

                        @foreach ($orders as $item)
                            <div class="card mb-5">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>@lang('file.Order ID') : {{$item->id}} </strong>
                                            <span class="d-block">{{date('d M, Y',strtotime($item->date))}}</span>
                                        </div>
                                        <div>

                                            @if($item->order_status == 'completed')
                                                <span class="badge rounded-pill bg-success">Complete</span>
                                            @elseif($item->order_status == 'pending')
                                                <span class="badge rounded-pill bg-primary">Pending</span>
                                            @elseif($item->order_status == 'canceled')
                                                <span class="badge rounded-pill bg-danger">Canceled</span>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>
                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                    {{ number_format((float)$item->total  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                @else
                                                    @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->total * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                @endif
                                            </h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-sm btn-success" href="{{route('user.order.history.details',$item->id)}}"><i class="ti-eye"></i></a> &nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--My account Dashboard ends-->
@endsection
