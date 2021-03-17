@extends('layouts.app')
@section('title') Elevani Fashion @endsection

@section('description') Elevani Fashion @endsection
@section('content')
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">{{$collection->name}}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">{{$collection->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->
	<!--Product area starts-->
    <section class="">
        <div class="container">
            <div class="row">
            	@if(count($products) < 1)
            	<div class="col-12">
            		<h4>Sorry no products found for this collection</h4>
            	</div>
            	@endif
                @foreach($products as $product)
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style2">
                        <div class="single-product-item">
                            @php
                                $product_image = explode(',',$product->image);
                                $product_image = $product_image[0];
                            @endphp
                            @if($product_image)
                            <img src="{{ asset('public/images/products') }}/{{$product->sku}}/medium/{{$product_image}}" alt="{{ $product->product_name }}">
                            @else
                            <img src="{{ asset('public/images/products') }}/elevani.jpg" alt="{{ $product->product_name }}">
                            @endif
                            <div class="product-overlay">
                                <a class="view-details" data-id="{{ $product->id }}" data-name="{{ $product->product_name }}" data-price="{{ $product->price }}" data-promotion-price="{{ $product->old_price }}" data-details="{{ $product->short_description }}" data-qty="{{ $product->qty }}" data-image="{{ $product->image }}" data-toggle="modal" data-target="#detailsModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="{{url('/products/')}}/{{$product->slug}}/{{$product->sku}}" class="button style1 sm">View Details</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="{{url('/products/')}}/{{$product->slug}}/{{$product->sku}}">
                                    {{ $product->product_name }}
                                </a>
                                <!-- <div class="rating-summary">
                                    <div class="rating-result" title="60%">
                                        <ul class="product-rating">
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="product-price">
                                    <span class="price">$ {{ $product->price }}</span>
                                    @if($product->old_price)
                                    <span class="old-price">$ {{ $product->old_price }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--product area ends-->	
@endsection
