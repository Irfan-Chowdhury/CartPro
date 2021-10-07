<div class="product-grid">
    @forelse ($category->categoryProduct as $item)
        <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{$item->product_id}}">
            <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
            <input type="hidden" name="category_id" value="{{$category->id ?? null}}">
            <input type="hidden" name="qty" value="1">

            <div class="product-grid-item">
                <div class="single-product-wrapper">
                    <div class="single-product-item">
                        @if ($item->productBaseImage!=NULL)
                            <img src="{{asset('public/'.$item->productBaseImage->image)}}" alt="...">
                        @else
                            <img src="#" alt="...">
                        @endif
                        <div class="product-promo-text style1">
                            <span>Sold</span>
                        </div>
                        <div class="product-overlay">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                            </a>
                            <a href="wishlist.html">
                                <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                            </a>
                            <a href="compare.html">
                                <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                            </a>
                        </div>
                    </div>
                    <div class="product-details">
                        <a class="product-category" href="#">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>
                        <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $category->id)}}">
                            {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null}}
                        </a>
                        <div class="product-short-description">
                            {!!$item->productTranslation->description ?? $item->productTranslationDefaultEnglish->description ?? null !!}
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="rating-summary">
                                    <div class="rating-result" title="60%">
                                        <ul class="product-rating">
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-price">
                                    @if ($item->product->special_price>0)
                                        <span class="promo-price">$ {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                        <span class="old-price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                    @else
                                        <span class="price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="product-options">
                        <div class="product-price mt-2">
                            @if ($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price)
                                <span class="promo-price">
                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                        {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                    @else
                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                    @endif
                                </span>
                                <span class="old-price">
                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                        {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                    @else
                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                    @endif
                                </span>
                            @else
                                <span class="price">
                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                        {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                    @else
                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                    @endif
                                </span>
                            @endif
                        </div>
                            <button class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i>{{__('Add to cart')}}</button>

                        <div class="d-flex justify-content-between">
                            <a href="wishlist.html">
                                <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span> Wishlist
                            </a>
                            <a href="compare.html">
                                <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                Comapre
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @empty
    @endforelse
</div>
