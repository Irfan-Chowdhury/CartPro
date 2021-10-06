    <!-- Quick Shop Modal starts -->
    <div class="modal fade quickshop" id="{{$item->product->slug ?? null}}" tabindex="-1" role="dialog" aria-labelledby="{{$item->product->slug ?? null}}" aria-hidden="true">
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
                                    @forelse ($item->additionalImage as $value)
                                        <div class="slider-for__item ex1">
                                            <img src="{{asset('public/'.$value->image)}}" alt="..." />
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="slider-nav-modal">
                                    {{-- <div class="slider-nav__item">
                                        <img src="{{asset('public/frontend/images/products/apple-watch.png')}}" alt="..." />
                                    </div>
                                    <div class="slider-nav__item">
                                        <img src="{{asset('public/frontend/images/products/apple-watch-2.jpg')}}" alt="..." />
                                    </div>
                                    <div class="slider-nav__item">
                                        <img src="{{asset('public/frontend/images/products/apple-watch-3.jpg')}}" alt="..." />
                                    </div>
                                    <div class="slider-nav__item">
                                        <img src="{{asset('public/frontend/images/products/apple-watch-4.jpg')}}" alt="..." />
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item-details">
                                <a class="item-category" href="">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null}}</a>
                                <h3 class="item-name">{{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null}}</h3>
                                <div class="d-flex justify-content-between">
                                    <div class="item-brand">Brand: <a href="">{{$item->product->brand->brandTranslation->brand_name ?? $item->product->brand->brandTranslationDefaultEnglish->brand_name ?? null}}</a></div>
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
                                @if ($item->product->special_price>0)
                                    <div class="item-price">$ {{$item->product->special_price ?? null}}</div>
                                    <hr>
                                    <div class="item-price"><del>$ {{$item->product->price ?? null}}</del></div>
                                    <hr>
                                @else
                                    <div class="item-price">$ {{$item->product->price ?? null}}</div>
                                    <hr>
                                @endif

                                <div class="item-short-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc condimentum eros idoni rutrum fermentum. Proin nec felis dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                                </div>
                                <hr>
                                <div class="item-variant">
                                    <span>Color:</span> <span class="semi-bold">Green</span>
                                    <ul class="product-variant mt-1">
                                        <li class="bg-green selected"></li>
                                        <li class="bg-antique"></li>
                                        <li class="bg-amber"></li>
                                    </ul>
                                </div>
                                <div class="item-variant">
                                    <span>Size:</span> <span class="semi-bold">M</span>
                                    <ul class="product-variant size-opt p-0 mt-1">
                                        <li><span>S</span></li>
                                        <li class="selected"><span>M</span></li>
                                        <li><span>L</span></li>
                                        <li><span>XL</span></li>
                                    </ul>
                                </div>
                                <div class="item-options">
                                    <form class="mb-3">
                                        <div class="input-qty">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-left-minus">
                                                    <span class="ti-minus"></span>
                                                </button>
                                            </span>
                                            <input type="number" class="input-number" value="1" min="1">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus">
                                                    <span class="ti-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                        <button class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>Add to cart</span></span></button>
                                    </form>
                                    <button class="button button-icon style4 sm"><span><i class="ti-heart"></i> <span>Add to wishlist</span></span></button>
                                    <button class="button button-icon style4 sm"><span><i class="ti-control-shuffle"></i> <span>Add to compare</span></span></button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Quick shop modal ends-->
