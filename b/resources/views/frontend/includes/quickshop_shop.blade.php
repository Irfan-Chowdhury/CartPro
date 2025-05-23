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


    <!-- Quick Shop Modal starts -->
    <div class="modal fade quickshop" id="id_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$item->slug}}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="las la-times"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="slider-wrapper">
                                <div class="slider-for-modal">
                                    @foreach ($item->additionalImage as $value)
                                            <div class="slider-for__item ex1">
                                                <img src="{{$value->image}}" alt="..." />
                                            </div>
                                    @endforeach
                                </div>
                                <div class="slider-nav-modal">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                <input type="hidden" name="product_slug" value="{{$item->slug}}">
                                <input type="hidden" name="category_id" value="{{$item->categoryId}}">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="value_ids" class="value_ids_shop">

                                <div class="item-details">
                                    <h3 class="item-name">{{$item->name}}</h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="item-brand">@lang('file.Brand'): <a href="">{{$item->brandName}}</a></div>
                                        <div class="item-review">
                                            <ul class="p-0 m-0">
                                                @php
                                                    for ($i=1; $i <=5 ; $i++){
                                                        if ($i<= round($item->avgRating)){  @endphp
                                                            <li><i class="las la-star"></i></li>
                                                @php
                                                        }else { @endphp
                                                            <li><i class="lar la-star"></i></li>
                                                @php        }
                                                    }
                                                @endphp
                                            </ul>
                                            <span>( {{round($item->avgRating)}} )</span>
                                        </div>
                                        @if ($item->sku)
                                            <div class="item-sku">@lang('file.SKU'): {{$item->sku ?? null}}</div>
                                        @endif
                                    </div>
                                    <hr>
                                    @if ($item->specialPrice!=NULL && $item->specialPrice>0 && $item->specialPrice<$item->price)
                                        <div class="item-price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$item->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                            @else
                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                            <hr>
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                <small class="old-price"><del>{{ number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL') </del></small>
                                            @else
                                                <small class="old-price"><del>@include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} </del></small>
                                            @endif
                                        </div>
                                    @else
                                        <div class="item-price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                            @else
                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                        </div>
                                    @endif

                                    <div class="item-short-description">
                                        <p>{{$item->shortDescription}}</p>
                                    </div>
                                    <hr>
                                    @php
                                        $attributes = $item->attributes;
                                    @endphp
                                    @foreach ($attributes as $key => $attribute)
                                        <div class="item-variant">
                                            <span>{{$attribute->name}}:</span>
                                            <ul class="product-variant size-opt p-0 mt-1">
                                                @foreach ($attribute->attributeValues as $value)
                                                    <li class="attribute_value"
                                                        data-attribute_name="{{$value->name }}"
                                                        id="valueId_{{$value->attributeValueId}}"
                                                        data-value_id="{{$value->attributeValueId}}"
                                                        data-value_name="{{$value->name }}">
                                                        <span>{{$value->name}}</span>
                                                    </li>
                                                    <input type="hidden" name="value_id[]" value="{{$value->attributeValueId}}">
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach


                                    <div class="item-options">
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
                                        @if (($item->manageStock==1 && $item->qty==0) || ($item->inStock==0))
                                            <button class="button button-icon style1" disabled title="Out of stock" data-bs-toggle="tooltip" data-bs-placement="top"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to Cart')</span></span></button>
                                        @else
                                            <button class="button button-icon style1" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to Cart')</span></span></button>
                                        @endif
                                        <div class="button button-icon style4 sm @auth add_to_wishlist @else forbidden_wishlist @endauth" data-product_id="{{$item->id}}" data-product_slug="{{$item->slug}}" data-category_id="{{$item->categoryId}}" data-qty="1"><span><i class="ti-heart"></i> <span>@lang('file.Add to Wishlist')</span></span></div>
                                    </div>

                                    <hr>
                                    <div class="item-share mt-3" id="social-links"><span>@lang('file.Share')</span>
                                        <ul class="footer-social d-inline pad-left-15">
                                            <li><a href="{{$socialShareLinks->facebook}}"><i class="ti-facebook"></i></a></li>
                                            <li><a href="{{$socialShareLinks->twitter}}"><i class="ti-twitter"></i></a></li>
                                            <li><a href="{{$socialShareLinks->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                            <li><a href="{{$socialShareLinks->reddit}}"><i class="ti-reddit"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Quick shop modal ends-->
