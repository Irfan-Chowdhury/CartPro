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
                <div class="col-md-3">
                    <div class="user-details">
                        <div class="user-img">
                            @if (Auth::user()->image)
                                <img src="{{asset('public/'.Auth::user()->image)}}" style="width:195px; height:190px" alt="...">
                            @else
                                <img src="{{asset('public/images/user_default_image.jpg')}}" style="width:195px; height:190px" alt="...">
                            @endif

                            <h4 class="user-name mt-3">Hello! <span>{{Auth::user()->username}}</span></h4>
                        </div>
                        <ul class="user-info">
                            @if (Auth::user()->first_name && Auth::user()->last_name)
                                <li>Full Name: <span>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</span></li>
                            @endif
                            <li>User Name: <span>{{Auth::user()->username}}</span></li>
                            <li>Email: <span>{{Auth::user()->email}}</span></li>
                            @if (Auth::user()->phone)
                                <li>Phone: <span>{{Auth::user()->phone}}</span></li>
                            @endif
                            {{-- <li>Country: <span>USA</span></li> --}}
                            {{-- <li>Postcode: <span>10000</span></li> --}}
                        </ul>
                        <button class="button sm d-block w-100 style1 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="ti-pencil"></i> Edit Profile
                        </button>
                    </div>
                </div>


                <!-- Edit Modal -->
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
