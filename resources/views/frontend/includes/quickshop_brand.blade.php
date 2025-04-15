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
    <div class="modal fade quickshop" id="id_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$product->slug}}" aria-hidden="true">
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
                                    @foreach ($product->additionalImage as $value)
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
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="product_slug" value="{{$product->slug}}">
                                <input type="hidden" name="category_id" value="{{$product->category->id}}">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="value_ids" class="value_ids_brand">

                                <div class="item-details">
                                    <h3 class="item-name">{{$product->name}}</h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="item-brand">@lang('file.Brand'): <a href="">{{$brand->name}}</a></div>
                                        <div class="item-review">
                                            <ul class="p-0 m-0">
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
                                            <span>( {{round($product->avgRating)}} )</span>
                                        </div>
                                        @if ($product->sku)
                                            <div class="item-sku">@lang('file.SKU'): {{$product->sku ?? null}}</div>
                                        @endif
                                    </div>
                                    <hr>
                                    @if ($product->specialPrice!=NULL && $product->specialPrice>0 && $product->specialPrice<$product->price)
                                        <div class="item-price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$product->specialPrice, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                            @else
                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$product->specialPrice, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                            <hr>
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                <small class="old-price"><del>{{ number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}} </del></small>
                                            @else
                                                <small class="old-price"><del>{{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '') }} </del></small>
                                            @endif
                                        </div>
                                    @else
                                        <div class="item-price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                            @else
                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                        </div>
                                    @endif

                                    <div class="item-short-description">
                                        <p>{{$product->shortDescription}}</p>
                                    </div>
                                    <hr>
                                    @foreach ($product->attributes as $key => $attribute)
                                        <div class="item-variant">
                                            <span>{{$attribute->name}}:</span>
                                            <ul class="product-variant size-opt p-0 mt-1">
                                                @foreach ($attribute->values as $value)
                                                    <li class="attribute_value"
                                                        data-attribute_name="{{$value->name }}"
                                                        id="valueId_{{$value->id}}"
                                                        data-value_id="{{$value->id}}"
                                                        data-value_name="{{$value->name }}">
                                                        <span>{{$value->name}}</span>
                                                    </li>
                                                    <input type="hidden" name="value_id[]" value="{{$value->id}}">
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
                                        @if (($product->manageStock==1 && $product->qty==0) || ($product->inStock==0))
                                            <button class="button button-icon style1" data-bs-toggle="tooltip" data-bs-placement="top" title="Stock Out"><span><i class="las la-shopping-cart"></i> <span>Add to cart</span></span></button>
                                        @else
                                            <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>Add to cart</span></span></button>
                                        @endif
                                        <a><div class="button button-icon style4 sm  @auth add_to_wishlist @else forbidden_wishlist @endauth" data-product_id="{{$product->id}}" data-product_slug="{{$product->slug}}" data-category_id="{{$product->category->id}}" data-qty="1"><span><i class="ti-heart"></i> <span>@lang('file.Add to Wishlist')</span></span></div></a>
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
