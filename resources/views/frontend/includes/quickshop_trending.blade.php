    <!-- Quick Shop Modal starts -->
    <div class="modal fade quickshop" id="quickshopTrend_{{$item->product->slug ?? null}}" tabindex="-1" role="dialog" aria-labelledby="quickshopTrend_{{$item->product->slug ?? null}}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="slider-wrapper">
                                <div class="slider-for-modal">
                                    @forelse ($item->product->additionalImage as $value)
                                        <div class="slider-for__item ex1">
                                            <img src="{{asset('public/'.$value->image)}}" alt="..." />
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                {{-- <div class="slider-nav-modal">
                                    @forelse ($item->product->additionalImage as $value)
                                        <div class="slider-nav__item">
                                            <img src="{{asset('public/'.$value->image)}}" alt="..." />
                                        </div>
                                    @empty
                                    @endforelse
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                <input type="hidden" name="category_id" value="{{$item->product->categoryProduct[0]->category_id}}">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="value_ids" class="value_ids_trending">

                                <div class="item-details">
                                    <a class="item-category" href="">{{$item->product->categoryProduct[0]->category->catTranslation->category_name ?? NULL}}</a>
                                    <h3 class="item-name">{{$item->product->productTranslation->product_name ?? null}}</h3>
                                    <div class="d-flex justify-content-between">
                                        {{-- <div class="item-brand">Brand: <a href="">{{$item->product->brand->brandTranslation->brand_name ?? $item->product->brand->brandTranslationDefaultEnglish->brand_name ?? null}}</a></div> --}}
                                        <div class="item-review">
                                            <ul class="p-0 m-0">
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                            <span>( 04 )</span>
                                        </div>
                                        <div class="item-sku">SKU: {{$item->product->sku ?? null}}</div>
                                    </div>
                                    <hr>
                                    @if ($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price)
                                        <div class="item-price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                            @else
                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                            <hr>
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                <small><del>{{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}} </del></small>
                                            @else
                                                <small><del>{{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} </del></small>
                                            @endif
                                        </div>
                                    @else
                                        <div class="item-price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                            @else
                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                        </div>
                                    @endif

                                    <div class="item-short-description">
                                        <p>{{$item->product->productTranslation->short_description ?? null}}.</p>
                                    </div>
                                    <hr>
                                    @php
                                        $attribute = [];
                                        foreach ($item->product->productAttributeValues as $value) {
                                            $attribute[$value->attribute_id]= $value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null;
                                        }
                                    @endphp

                                    @forelse ($attribute as $key => $value)
                                        <div class="item-variant">
                                            <span>{{$value}}:</span>
                                            <input type="hidden" name="attribute_name[]" class="attribute_name" value="{{$value}}">
                                            <ul class="product-variant size-opt p-0 mt-1">
                                                @forelse ($item->product->productAttributeValues as $value)
                                                    @if ($value->attribute_id == $key)
                                                        <li class="attribute_value_trending" data-attribute_name="{{$value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null }}" data-value_id="{{$value->attribute_value_id}}" data-value_name="{{$value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null }}"><span>{{$value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null }}</span></li>
                                                        <input type="hidden" name="value_id[]" value="{{$value->attribute_value_id}}">
                                                    @endif
                                                @empty
                                                @endforelse
                                            </ul>
                                        </div>
                                    @empty
                                    @endforelse


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
                                        <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>Add to cart</span></span></button>
                                        <a>
                                            <button class="button button-icon style4 sm add_to_wishlist" data-product_id="{{$item->product->id}}" data-product_slug="{{$item->product->slug}}" data-category_id="{{$item->product->categoryProduct[0]->category_id ?? null}}" data-qty="1"><span><i class="ti-heart"></i> <span>Add to wishlist</span></span></button>
                                        </a>
                                    </div>

                                    <hr>
                                    <div class="item-share mt-3"><span>Share</span>
                                        <ul class="footer-social d-inline pad-left-15">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                                            <li><a href="#"><i class="ti-pinterest"></i></a></li>
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
