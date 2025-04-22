@php
if (Session::has('currency_rate')){
    $CHANGE_CURRENCY_RATE = Session::get('currency_rate');
}else{
    $CHANGE_CURRENCY_RATE = 1;
    Session::put('currency_rate', $CHANGE_CURRENCY_RATE);
}

if (Session::has('currency_symbol')){
    $CHANGE_CURRENCY_SYMBOL = Session::get('currency_symbol');
}else{
    $CHANGE_CURRENCY_SYMBOL = env('DEFAULT_CURRENCY_SYMBOL');
    Session::put('currency_symbol',$CHANGE_CURRENCY_SYMBOL);
}
@endphp




@extends('frontend.layouts.master')

@section('title','Brand Wise Product')

@section('frontend_content')

    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="{{route('cartpro.home')}}">@lang('file.Home')</a></li>
                        <li class="active">@lang('file.Brand')</li>
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
                            <h1 class="page-title h5 uppercase mb-0">{{$brand->name}}</h1>
                            <span class="d-none d-md-block"><strong class="theme-color">{{count($brand->products)}}</strong> @lang('file.Products Found')</span>
                        </div>
                        <div class="row">
                            {{-- @forelse ($products as $item)
                                <!--Shop product wrapper starts-->
                                <div class="col shop-products-wrapper">
                                    <div class="product-grid">
                                        <div class="product-grid-item">

                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="product_slug" value="{{$product->slug}}">
                                                <input type="hidden" name="category_id" value="{{$category_ids[$product->id]->category_id}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        @if (isset($product->image_medium) && Illuminate\Support\Facades\File::exists(public_path($product->image_medium)))
                                                            <a href="{{url('product/'.$product->slug.'/'. $category_ids[$product->id]->category_id)}}"><img class="lazy" data-src="{{asset('public/'.$product->image_medium)}}"></a>
                                                        @else
                                                            <a href="{{url('product/'.$product->slug.'/'. $category_ids[$product->id]->category_id)}}"><img src="https://dummyimage.com/221x221/e5e8ec/e5e8ec&text=CartPro"></a>
                                                        @endif

                                                        <!-- product-promo-text -->
                                                        @include('frontend.includes.product-promo-text',['manage_stock'=>$product->manageStock, 'qty'=>$product->qty, 'in_stock'=>$product->inStock, 'in_stock'=>$product->inStock, 'current_date'=>date('Y-m-d') ,'new_to'=>$product->newTo])
                                                        <!--/ product-promo-text -->

                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#id_{{$product->id}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                            <a><span class="ti-heart @auth add_to_wishlist @else forbidden_wishlist @endauth" class="ti-heart"  data-product_id="{{$product->id}}" data-product_slug="{{$product->slug}}" data-category_id="{{$category_ids[$product->id]->category_id}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="{{url('product/'.$product->slug.'/'. $category_ids[$product->id]->category_id)}}">
                                                            {{$product->product_name}}
                                                        </a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            @php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($product->avg_rating)){  @endphp
                                                                                        <li><i class="las la-star"></i></li>
                                                                            @php
                                                                                    }else { @endphp
                                                                                        <li><i class="lar la-star"></i></li>
                                                                            @php        }
                                                                                }
                                                                            @endphp
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    @if ($product->specialPrice>0)
                                                                        <span class="promo-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                            @else
                                                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                        <span class="old-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                            @else
                                                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        <span class="price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                            @else
                                                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div>
                                                                @if (($product->manageStock==1 && $product->qty==0) || ($product->inStock==0))
                                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
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
                            @endforelse --}}

                            @forelse ($brand->products as $product)
                                <!--Shop product wrapper starts-->
                                <div class="col shop-products-wrapper">
                                    <div class="product-grid">
                                        <div class="product-grid-item">

                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="product_slug" value="{{$product->slug}}">
                                                <input type="hidden" name="category_id" value="{{$product->category->id}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">


                                                        <a href="{{url('product/'.$product->slug.'/'.$product->category->id)}}"><img class="lazy" data-src="{{$product->mediumImage}}"></a>


                                                        <!-- product-promo-text -->
                                                        @include('frontend.includes.product-promo-text',['manage_stock'=>$product->manageStock, 'qty'=>$product->qty, 'in_stock'=>$product->inStock, 'current_date'=>date('Y-m-d') ,'new_to'=>$product->newTo])
                                                        <!--/ product-promo-text -->

                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#id_{{$product->id}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                            <a><span class="ti-heart @auth add_to_wishlist @else forbidden_wishlist @endauth" class="ti-heart"  data-product_id="{{$product->id}}" data-product_slug="{{$product->slug}}" data-category_id="{{$product->category->id}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="{{url('product/'.$product->slug.'/'. $product->category->id)}}">
                                                            {{$product->name}}
                                                        </a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            @php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($product->avgRating)){  @endphp
                                                                                        <li><i class="las la-star"></i></li>
                                                                            @php
                                                                                    }else { @endphp
                                                                                        <li><i class="lar la-star"></i></li>
                                                                            @php        }
                                                                                }
                                                                            @endphp
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    @if ($product->specialPrice>0)
                                                                        <span class="promo-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                            @else
                                                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                        <span class="old-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                            @else
                                                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        <span class="price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                            @else
                                                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div>
                                                                @if (($product->manageStock==1 && $product->qty==0) || ($product->inStock==0))
                                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
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


        @forelse ($brand->products as $product)
            @include('frontend.includes.quickshop_brand')
        @empty
        @endforelse
@endsection


@push('scripts')
    <script type="text/javascript">


        $('.attribute_value_productTab1').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_brand').val(values);
        });
    </script>
@endpush
