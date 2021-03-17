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
                                <div class="tab-pane fade show active" id="account_details" role="tabpanel">
                                    <form class="calculate-shipping mar-top-40" action="" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" placeholder="Name *" value="{{ $customer->name ?? auth()->user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="email" placeholder="email Address" value="{{ $customer->email ?? auth()->user()->email }}">
                                        </div>
                                        <div class="col-sm-12 change-pwd mar-bot-30">
                                            <p>Change password</p>
                                            <div class="form-group">
                                                <input type="password" name="password" id="user_password" tabindex="2" class="form-control" placeholder="Password *" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password *" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="button style1">Save Changes</button>

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
@endsection

@section('script')

@endsection