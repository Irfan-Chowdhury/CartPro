@extends('layouts.app')

@section('content')
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
    <!--My account Dashboard starts-->
    <section class="my-account-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-sidebar-menu">
                        @include('customer.customer-menu')
                    </div>
                </div>
                <div class="col-md-9 tabs style1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="user-dashboard-tab__content tab-content">
                                <div class="tab-pane fade show active" id="addresses" role="tabpanel">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <form class="calculate-shipping mar-top-40" action="{{ url('address/create') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-sm--20">
                                                <div class="text-block">
                                                    <h4 class="mb--20">Billing address</h4>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="name" placeholder="Name *" value="{{ $customer->name ?? auth()->user()->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="address" placeholder="Billing Address *" value="{{ $customer->address ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="city" placeholder="Billing City *" value="{{ $customer->city ?? 'Chittagong' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="postal_code" placeholder="Billing Postal Code *" value="{{ $customer->postal_code ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-sm--20">
                                                <div class="text-block">
                                                    <h4 class="mb--20">Shipping address</h4>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="ship_address" placeholder="Shipping Address *" value="{{ $customer->ship_address ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="ship_city" placeholder="Shipping City *" value="{{ $customer->ship_city ?? 'Chittagong' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="ship_postal_code" placeholder="Shipping Postal Code *" value="{{ $customer->ship_postal_code ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="button style1">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--My account Dashboard ends-->
    @if(session()->has('message'))
        <div class="alert alert-{{session('type')}} alert-dismissible text-center mar-bot-30"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session('message') }}</div> 
    @endif

@endsection

@section('script')

@endsection