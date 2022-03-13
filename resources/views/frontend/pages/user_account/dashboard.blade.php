@extends('frontend.layouts.master')
@section('frontend_content')
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">My Account</h1>
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li class="active">My Account</li>
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

                <!-- Tab -->
                <div class="col-md-9 tabs style1">
                    <div class="row">
                        <div class="col-md-12 tabs style2">
                            <ul class="nav nav-tabs mar-top-30 product-details-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="all" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="branding" aria-selected="false">Orders</a> --}}
                                    <a class="nav-link" href="{{route('user.order.history')}}">Orders</a>
                                </li>
                                <li>
                                    <form action="{{route('user_logout')}}" method="post">
                                        @csrf
                                        <button class="btn btn-text nav-link" data-toggle="tab" role="tab" aria-controls="graphic_design" aria-selected="false" type="submit">{{__('file.logout')}}</button>
                                    </form>
                                </li>


                            </ul>
                        </div>

                        <div class="col-md-12 mar-top-30">
                            <div class="user-dashboard-tab__content tab-content">
                                <div class="tab-pane fade mt-3 show active" id="dashboard" role="tabpanel">
                                    <p>Hello <strong>{{Auth::user()->first_name}}</strong>,</p>
                                    <p>From your account dashboard you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--My account Dashboard ends-->
@endsection
