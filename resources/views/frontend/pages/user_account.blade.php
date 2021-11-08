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
                <div class="col-md-3">
                    <div class="user-details">
                        <div class="user-img">
                            @if (Auth::user()->image)
                                <img src="{{asset('public/'.Auth::user()->image)}}" style="width:195px; height:190px" alt="...">
                            @else
                                <img src="{{asset('public/images/user_default_image.jpg')}}" style="width:195px; height:190px" alt="...">
                            @endif
                            
                            <h4 class="user-name mar-top-10">Hello! <span>{{Auth::user()->first_name}}</span></h4>
                        </div>
                        <ul class="user-info">
                            <li>Full Name: <span>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</span></li>
                            <li>User Name: <span>{{Auth::user()->username}}</span></li>
                            <li>Email: <span>{{Auth::user()->email}}</span></li>
                            <li>Phone: <span>{{Auth::user()->phone}}</span></li>
                            {{-- <li>Country: <span>USA</span></li> --}}
                            {{-- <li>Postcode: <span>10000</span></li> --}}
                        </ul>
                        {{-- <button class="button sm style1 mar-top-10" href="#"><i class="ti-pencil"></i> </button> --}}
                        <button class="button sm style1 mar-top-10" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="ti-pencil"></i> Edit Profile
                        </button>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('file.Edit Profile')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('user_profile_update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">{{__('file.First Name')}}:</label>
                                    <input type="text" name="first_name" value="{{Auth::user()->first_name}}" class="form-control @error('first_name') is-invalid @enderror" id="recipient-name">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">{{__('file.Last Name')}}:</label>
                                    <input type="text" name="last_name" value="{{Auth::user()->last_name}}" class="form-control @error('last_name') is-invalid @enderror" id="recipient-name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">{{__('file.Phone')}}:</label>
                                    <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control @error('phone') is-invalid @enderror" id="recipient-name">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">{{__('file.Image')}}:</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"  id="recipient-name">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">{{__('file.Password')}}:</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="recipient-name">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">{{__('file.Password Confirmation')}}:</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="recipient-name">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </form>
                        </div>

                    </div>
                    </div>
                </div>

                <div class="col-md-9 tabs style1">
                    <div class="row">
                        <div class="col-md-12 tabs style2">
                            <ul class="nav nav-tabs mar-top-30 product-details-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="all" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="branding" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#account_details" role="tab" aria-controls="graphic_design" aria-selected="false">Account Details </a>
                                </li>
                                <form action="{{route('user_logout')}}" method="post">
                                    @csrf
                                        <button data-toggle="tab" role="tab" aria-controls="graphic_design" aria-selected="false" type="submit">{{__('file.logout')}}</button>
                                </form>

                            </ul>
                        </div>

                        <div class="col-md-12 mar-top-30">
                            <div class="user-dashboard-tab__content tab-content">
                                <div class="tab-pane fade mar-top-30 show active" id="dashboard" role="tabpanel">
                                    <p>Hello <strong>{{Auth::user()->first_name}}</strong>,</p>
                                    <p>From your account dashboard you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details</a>.</p>
                                </div>

                                <div class="tab-pane fade mar-top-30" id="orders" role="tabpanel">
                                    <div class="container">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-content table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th class="plantmore-product-thumbnail">Images</th>
                                                                <th class="cart-product-name">Product</th>
                                                                <th class="plantmore-product-price">Unit Price</th>
                                                                <th class="plantmore-product-quantity">Quantity</th>
                                                                <th class="plantmore-product-subtotal">Total</th>
                                                                {{-- <th class="plantmore-product-remove">Remove</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orders as $item)
                                                                <tr>
                                                                    <td class="plantmore-product-thumbnail">
                                                                        {{-- <a href="#"><img src="images/cart/cart-3-90x90.jpg" alt="..."></a> --}}
                                                                        <a href="#"><img src="{{asset('public/'.$item->image)}}" style="width:90px;height:90px"></a>
                                                                    </td>
                                                                    <td class="plantmore-product-name"><a href="#">{{$item->product_name}}</a>
                                                                        {{-- <p>{{$item->options}}</p> --}}
                                                                    </td>
                                                                    <td class="plantmore-product-price">
                                                                        <span class="amount">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ $item->price }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ $item->price }}
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                    <td class="plantmore-product-quantity">
                                                                        <div class="input-qty">
                                                                            <input type="text" readonly class="input-number" value="{{ $item->qty }}">
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-subtotal">
                                                                        <span class="amount">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ $item->total }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ $item->total }}
                                                                            @endif
                                                                        </span></td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade mar-top-30" id="addresses" role="tabpanel">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <div class="row">
                                        <div class="col-md-6 mb-sm--20">
                                            <div class="text-block">
                                                <h4 class="mb--20">Billing address</h4>
                                                <ul class="user-info">
                                                    <li>Full Name: <span>Jhon Conor</span></li>
                                                    <li>Email: <span>jhonconor@email.com</span></li>
                                                    <li>Phone: <span>+000 0000 000</span></li>
                                                    <li>Country: <span>USA</span></li>
                                                    <li>Postcode: <span>10000</span></li>
                                                </ul>
                                                <a href="#">Edit your billing address</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade mar-top-30" id="account_details" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6 mar-bot-30">
                                            <div class="upload-img">
                                                <i class="ion-ios-photos"></i>
                                                <a href="#" class="d-block">Upload Image</a>
                                                <a href="#" class="d-block">Remove</a>
                                            </div>

                                        </div>

                                    </div>
                                    <form class="calculate-shipping mar-top-40 xs-pad">

                                        <div class="col-sm-12 no-pad">
                                            <input class="form-control" type="text" name="first-name" placeholder="First Name *">
                                        </div>
                                        <div class="col-sm-12 no-pad">
                                            <input class="form-control" type="text" name="last-name" placeholder="Last Name *">
                                        </div>
                                        <div class="col-12 no-pad">
                                            <input class="form-control" type="text" name="company-name" placeholder="email Address *">
                                        </div>


                                        <div class="col-12 no-pad">
                                            <p>This will be how your name will be displayed in the account section and in reviews</p>
                                            <input class="form-control mar-top-10" type="text" name="company-name" placeholder="Display Name">
                                        </div>


                                        <div class="col-sm-12 change-pwd mar-bot-30">
                                            <p>Change password</p>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="phone" placeholder="current password*">
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="phone" placeholder="new password*">
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="phone" placeholder="confirm password*">
                                            </div>

                                        </div>

                                        <a href="#" class="button style1">Save Changes</a>
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
