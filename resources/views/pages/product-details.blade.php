@extends('layouts.app')

@section('title') @if(empty($product->meta_title)){{ $product->product_name }}@endif {{$product->meta_title }} @endsection

@section('description')  {{$product->meta_description }} @endsection

@section('content')
	<!--Product details section starts-->
    <section class="product-details-section">
        <div class="container">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="">Collections</a></li>
                    <li><a href="{{url('/')}}/collections/{{$product->categories->slug}}">{{$product->categories->category_name}}</a></li>
                    <li class="active">{{$product->product_name}}</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6 mar-bot-30">
                    <div class="slider-wrapper">
                        <div class="slider-nav">
                            @php
                                $images = explode(',',$product->image);
                            @endphp
                            @foreach($images as $img)
                            @php
                                $img = str_replace($product->sku.'/','',$img);
                            @endphp
                            <div class="slider-nav__item">
                                <img src="{{asset('/public/images/products')}}/{{$product->sku}}/small/{{$img}}" alt="..." />
                            </div>
                            @endforeach
                        </div>
                        <div class="slider-for">
                            @php
                                $images = explode(',',$product->image);
                            @endphp
                            @foreach($images as $img)
                            @php
                                $img = str_replace($product->sku.'/','',$img);
                            @endphp
                            <div class="slider-for__item ex1">
                                <img src="{{asset('/public/images/products')}}/{{$product->sku}}/xl/{{$img}}" alt="..." />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span>{{ $product->sku }}</span>
                    <h3 class="item-name">{{ $product->product_name }}</h3>
                    <!-- <div class="item-review">
                        <ul>
                            <li><i class="ion-ios-star"></i></li>
                            <li><i class="ion-ios-star"></i></li>
                            <li><i class="ion-ios-star"></i></li>
                            <li><i class="ion-ios-star"></i></li>
                            <li><i class="ion-android-star-half"></i></li>
                        </ul>
                        <span>04 Review(s)</span>
                    </div> -->
                    <div class="item-price">
                    	$ {{$product->price}}

	                    @if($product->old_price) 
	                    <span class="old-price">$ {{$product->old_price ?? ''}}</span>
	                    @endif
	                </div>
                    <div class="item-stock">
                    	@if($product->qty > 0)
                    	<span class="stock-status">In Stock</span> <span class="stock-qty">({{$product->qty}})</span>
                    	@else
                    	<span class="no-stock-status">Not In Stock</span>
                    	@endif
                    </div>
                    @if($product->qty > 0)
                    <div class="item-variant">
                        <span>Color : </span> <span class="main-color-name"></span>
                        <ul class="product-color mt-2">
                    	@php
                    		$colors = $attributes->unique('color');
                    	@endphp
                    	@foreach($colors as $key=>$color)
                    		@php
                        		$sizes = $attributes->where('color',$color->color)->where('product_id',$product->id)->pluck('size');
                        		$sku = $attributes->where('color',$color->color)->where('product_id',$product->id)->pluck('sku');
                        	@endphp

                            @if($color->image)
                                @php
                                $img = $color->image;
                                $image = explode(',', $img);
                                @endphp
                            @else
                                @php
                                $img = $product->image;
                                $image = explode(',', $img);
                                @endphp
                            @endif
                            <span class="color-name">@if($key == 0){{$color->color}}@endif</span>
                                
                    	    <li @if($key == 0)class="selected"@endif data-size="{{ $sizes }}" data-sku="{{ $sku }}" data-color="{{$color->color}}" data-image={{$img}}>
                                <span>
                                    @if($color->image)
                                    <img src="{{ asset('/public/images/products/')}}/{{ $sku[0] }}/small/{{ $image[0] }}">
                                    @else
                                    <img src="{{ asset('/public/images/products/')}}/{{ $product->sku }}/small/{{ $image[0] }}">
                                    @endif
                                </span>
                            </li>
                            
                        @endforeach
                        </ul>
                    </div>
                    <div class="item-variant">
                        <span>Size : </span>
                        <ul class="d-inline size-opt">
                        	@php
                        		$sizes = $attributes->unique('size');
                        	@endphp
                        	@foreach($sizes as $size)
                            	<li data-size="{{ $size->size }}" data-sku="{{ $size->sku }}"><span>{{ $size->size }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="item-options">
                        <form id="add_to_cart_{{ $product->id }}" class="mar-bot-20 d-inline">
                        	<input type="hidden" name="sku" value="" id="sku">
                        	<input type="hidden" name="color" value="" id="color">
                        	<input type="hidden" name="size" value="" id="size">
                            <div class="input-qty">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus">
                                        <span class="ti-minus"></span>
                                    </button>
                                </span>
                                <input type="number" name="qty" class="input-number" value="1" min="1">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus">
                                        <span class="ti-plus"></span>
                                    </button>
                                </span>
                            </div>
                            <button data-id="{{ $product->id }}" class="button style1 mar-tb-0 add-to-cart"><i class="ti-shopping-cart"></i> Add to cart</button>
                        </form>
                        <!-- <a class="btn btn-link btn-sm"><i class="ti-heart"></i> Add to wishlist</a>  -->
                        <!-- <a class="btn btn-link btn-sm"><i class="ti-control-shuffle"></i> Add to compare</a> -->
                    </div>
                    @endif
                    <div class="item-share  mar-top-30"><span>Share</span>
                        <ul class="footer-social d-inline pad-left-15">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <li><a href="#"><i class="ti-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <div class="item-short-description">
                        <p>{!! htmlspecialchars_decode($product->short_description) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product details section ends-->
    <!--content wrapper section starts-->
    <section class="content-wrapper-section no-pad-top no-pad-bot">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tabs style2">
                    <ul class="nav nav-tabs mar-top-30 product-details-tab" id="lionTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="branding-tab_one" data-toggle="tab" href="#size" role="tab" aria-selected="false">Size Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="branding-tab_two" data-toggle="tab" href="#shipping" role="tab" aria-selected="false">Shipping</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="graphic-design-tab" data-toggle="tab" href="#comments" role="tab" aria-selected="false">Reviews <span class="text-grey"> (3)</span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content product-description" id="lionTabContent">
            <div class="container">               
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="desc-intro">
                        {!! htmlspecialchars_decode($product->description) !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="size" role="tabpanel" aria-labelledby="graphic-design-tab">
                    <div class="table-content table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Size</th>
                                    <th class="cart-product-name">Bust</th>
                                    <th class="plantmore-product-price">Waist</th>
                                    <th class="plantmore-product-quantity">Hips</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="shipping" role="tabpanel">
                    <p class="mar-bot-30">*Estimated Shipping times throughout North America </p>
                    <div class="table-content table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Shipping Type</th>
                                    <th class="cart-product-name">Cost</th>
                                    <th class="plantmore-product-price">Estimated Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="mar-top-30">Exclude all mexico and International orders.Please see contact page for International policies.</p>
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="h5">3 reviews for White Striped top</h3>
                            <div class="item-reviews">
                                <div class="row mar-tb-30">
                                    <div class="col-md-2">
                                        <div class="reviewer-img">
                                            <img src="images/clients/client_1.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="product-rating">
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                        </ul>
                                        <h5 class="reviewer-text">Jhon Conor- <span> Dec 25th,2018</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae ipsum perspiciatis, impedit laboriosam commodi in excepturi porro aut tempore facilis.</p>
                                    </div>
                                </div>
                                <div class="row mar-tb-30">
                                    <div class="col-md-2">
                                        <div class="reviewer-img">
                                            <img src="images/clients/client_2.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="product-rating">
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                        </ul>
                                        <h5 class="reviewer-text">Jhon Conor- <span> Dec 25th,2018</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae ipsum perspiciatis, impedit laboriosam commodi in excepturi porro aut tempore facilis.</p>
                                    </div>
                                </div>
                                <div class="row mar-tb-30">
                                    <div class="col-md-2">
                                        <div class="reviewer-img">
                                            <img src="images/clients/client_3.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="product-rating">
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                        </ul>
                                        <h5 class="reviewer-text">Jhon Conor- <span> Dec 25th,2018</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae ipsum perspiciatis, impedit laboriosam commodi in excepturi porro aut tempore facilis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="comment-respond">
                                <h3 class="h5">Write your Review</h3>
                                <span>Your email address will not be published. Required fields are marked with *</span>
                                
                                <form action="#" method="post" class="row contact-form mar-top-20">
                                    <div class="col-sm-12">
                                        <label >Your Rating</label>
                                        <ul class="product-rating">
                                            <li><i class="ion-ios-star-outline"></i></li>
                                            <li><i class="ion-ios-star-outline"></i></li>
                                            <li><i class="ion-ios-star-outline"></i></li>
                                            <li><i class="ion-ios-star-outline"></i></li>
                                            <li><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 text-area">
                                        <textarea id="comment" class="form-control" placeholder="Your Review....*" name="comment" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="author" class="form-control" placeholder="Name*" name="author" type="text" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="subject" class="form-control" placeholder="Email*" name="email" type="email" required>
                                    </div>

                                    <div class="col-sm-12 mar-top-20">
                                        <button class="button style1" name="submit" type="submit" id="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <div class="container text-center mar-top-20 mar-bot-50">
        <!-- <div class="item-categories"><span>Categories:</span> <a href="#">Men</a>, <a href="#">Jacket</a> ,<a href="#">Leather</a></div> -->
        <div class="item-tags"><span>Tags:</span> {{$product->tags}}</div>
    </div>
    <!--content wrapper ends-->
	
@endsection
@section('script')
	<script type="text/javascript">
		"use strict";

        var init_color = $('.color-name').html();

        $('#color').val(init_color);

		$(document).on('click','.product-color li', function(){
            $('.product-color li').removeClass('selected');
            $(this).addClass('selected');
			var size = $(this).data('size');
			var sku = $(this).data('sku');
            var image = $(this).data('img');
			$('#color').val($(this).data('color'));
            $('.color-name').html($(this).data('color'));
            $('.main-color-name').html($(this).data('color'));
			$('.size-opt').html('');
			var text = "";
			var i;
			for (i = 0; i < size.length; i++) {
				text += '<li data-size="'+size[i]+'" data-sku="'+sku[i]+'"><span>' + size[i] + '</span></li>';

			} 
			$('.size-opt').html(text);

            alert(image);

            var slider_nav = '<div class="slider-nav">';
            var x;
            for (x = 0; x < image.length; x++) {
                slider_nav += '<div class="slider-nav__item"><img src="{{asset('/public/images/products')}}/'+sku[0]+'/small/'+image[x]+'" alt="..." /></div>';

            } 
            slider_nav = '</div>';

            $('.slider-wrapper').html(slider_nav);

		})

		$(document).on('click','.size-opt li', function(){
            $('.size-opt li').removeClass('selected');
            $(this).addClass('selected');
			if($('#color').val().length == 0) {
				$('.alert').addClass('alert-custom show');
                $('.alert-custom .message').html('please choose a color first');
			} else {
				$('#size').val($(this).data('size'));
				$('#sku').val($(this).data('sku'));
			}	
		})

		$(document).on('click', '.add-to-cart', function(e){
			e.preventDefault();
            var id = $(this).data('id');
            var parent = '#add_to_cart_'+id;

            var sku = $(parent+" input[name=sku]").val();
			var qty = $(parent+" input[name=qty]").val();
			var size = $(parent+" input[name=size]").val();
			var color = $(parent+" input[name=color]").val();

			var route = "{{ route('addToCart') }}";

			$.ajax({
		        url: route,
		        type:"POST",
		        data:{
					sku: sku,
					qty: qty,
					size: size,
					color: color,
		        },
		        success:function(response){
			        console.log(response);
		            if(response) {
		            	$('.alert').addClass('alert-custom show');
			            $('.alert-custom .message').html(response.success);
			            $('.cart__menu .cart_qty').html(response.total_qty);
			            $('.cart__menu .total').html('$ '+response.subTotal);

                        setTimeout(function() {
                            $('.alert').removeClass('show');
                        }, 4000);
		            }
		        },
		    });
		})
	</script>
@endsection