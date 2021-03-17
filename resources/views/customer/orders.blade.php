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
                            <div class="cart-table table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Reference</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sales as $sale)
                                        <tr class="sale-{{$sale->id}}">
                                            <td>
                                                {{ date('d-m-Y', strtotime($sale->created_at)) }}
                                            </td>
                                            <td>
                                                {{ $sale->reference_no }}
                                            </td>
                                            <td>
                                                ৳ {{ $sale->grand_total }}
                                            </td>
                                            <td>
                                                @if($sale->sale_status == 1)
                                                Complete
                                                @elseif($sale->sale_status == 2)
                                                Pending
                                                @else
                                                On The Way
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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