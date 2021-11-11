@extends('frontend.layouts.master')
@section('frontend_content')

    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="{{route('cartpro.home')}}">Home</a></li>
                        <li class="active">Brand</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->

        <!-- Shop Page Starts-->
        <div class="shop-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1 class="page-title h5 uppercase mb-0">{{$brand->brand_name}}</h1>
                            <span class="d-none d-md-block"><strong class="theme-color">{{count($products)}}</strong> products found</span>
                        </div>
                        <div class="row">
                            @forelse ($products as $item)

                                <!--Shop product wrapper starts-->
                                <div class="col shop-products-wrapper">
                                    <div class="product-grid">
                                        <div class="product-grid-item">

                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                                <input type="hidden" name="product_slug" value="{{$item->slug}}">
                                                <input type="hidden" name="category_id" value="{{$category_ids[$item->id]->category_id}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        @if (isset($item->image))
                                                            <img src="{{asset('public/'.$item->image)}}" alt="...">
                                                        @else
                                                            <img src="{{asset('public/images/empty.jpg')}}">
                                                        @endif

                                                        @if (($item->qty==0) || ($item->in_stock==0))
                                                            <div class="product-promo-text style1">
                                                                <span>Stock Out</span>
                                                            </div>
                                                        @endif

                                                        @auth

                                                        @endauth

                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->slug}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                            <a><span class="ti-heart @auth add_to_wishlist @else forbidden_wishlist @endauth" class="ti-heart"  data-product_id="{{$item->id}}" data-product_slug="{{$item->slug}}" data-category_id="{{$category_ids[$item->id]->category_id}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="{{url('product/'.$item->slug.'/'. $category_ids[$item->id]->category_id)}}">
                                                            {{$item->product_name}}
                                                        </a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            @php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->avg_rating)){  @endphp
                                                                                        <li><i class="ion-android-star"></i></li>
                                                                            @php
                                                                                    }else { @endphp
                                                                                        <li><i class="ion-android-star-outline"></i></li>
                                                                            @php        }
                                                                                }
                                                                            @endphp
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    @if ($item->special_price>0)
                                                                        <span class="promo-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                        <span class="old-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        <span class="price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div>
                                                                @if (($item->qty==0) || ($item->in_stock==0))
                                                                    <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @else
                                                                        <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>





                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Page Ends-->


        @forelse ($products as $item)
            @include('frontend.includes.quickshop_brand')
        @empty
        @endforelse
@endsection


@push('scripts')
    <script type="text/javascript">


        $('.add_to_wishlist').on("click",function(e){
            var product_id = $(this).data('product_id');
            var category_id = $(this).data('category_id');
            var product_slug = $(this).data('product_slug');

            $.ajax({
                url: "{{ route('wishlist.add') }}",
                type: "GET",
                data: {
                    product_id:product_id,
                    category_id:category_id,
                    product_slug:product_slug
                },
                success: function (data) {
                    if (data.type=='success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                        })
                    }
                    $('.wishlist_count').text(data.wishlist_count);
                }
            })
        });

        $('.forbidden_wishlist').on("click",function(e){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please Login First',
            });
        });

        //for Product_Tab_1
        $('.attribute_value_productTab1').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_brand').val(values);
        });
    </script>
@endpush
