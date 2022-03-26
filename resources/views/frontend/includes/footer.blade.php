@if ($setting_newslatter && $setting_newslatter->newsletter==1)
<div class="newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="d-flex align-items-center">
                    <div>
                        <i class="las la-paper-plane me-3"></i>
                    </div>
                    <div>
                        <h3 class="mb-0">@lang('file.Subscribe to our Newsletter')</h3>
                        <p>@lang('file.Subscribe and get notification about discounts')</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <form class="newsletter" id="newsLatterSubmitForm" action="{{route('cartpro.newslatter_store')}}" method="POST">
                    @csrf
                    <input type="email" placeholder="Enter your email" name="email" required>
                    <button type="submit" class="button style1 btn-search" type="submit">@lang('file.Subscribe')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<!--Scroll to top starts-->
<a href="#" id="scrolltotop"><i class="ti-arrow-up"></i></a>
<!--Scroll to top ends-->
<!-- Footer section Starts-->
<div class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-4">
                <div class="footer-logo">
                    <a href="#"><img class="lazy" data-src="{{$header_logo_path}}"></a>
                </div>
                <div class="footer-text">
                    <h5 class="text-grey mb-0">@lang('file.Got Question? Call us') :</h5>
                    <h4>{{$setting_store->store_phone ?? null}}</h4>
                </div>
                <div class="footer-text">
                    <h6 class="text-grey mb-0">@lang('file.Contact Info')</h6>
                    <p><span><i class="las la-envelope"></i> &nbsp; {{$setting_store->store_email ?? null}}</span></p>
                    <p><span><i class="las la-map-marker"></i> &nbsp; {{$storefront_address}}</span></p>
                </div>
                <ul class="footer-social mt-3 p-0">
                    @if ($storefront_facebook_link!=null)
                        <li><a href="{{$storefront_facebook_link}}"><i class="ti-facebook"></i></a></li>
                    @endif
                    @if ($storefront_twitter_link!=null)
                        <li><a href="{{$storefront_twitter_link}}"><i class="ti-twitter"></i></a></li>
                    @endif
                    @if ($storefront_instagram_link!=null)
                        <li><a href="{{$storefront_instagram_link}}"><i class="ti-instagram"></i></a></li>
                    @endif
                    @if ($storefront_youtube_link!=null)
                        <li><a href="{{$storefront_youtube_link}}"><i class="ti-youtube"></i></a></li>
                    @endif
                </ul>
            </div>
            <div class="col-lg-7 col-md-8">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3>{{$footer_menu_one_title}}</h3>
                            <div class="d-flex justify-content-between">
                                <ul class="footer-menu">
                                    @if ($footer_menu_one)
                                        @forelse($footer_menu_one->items as $value)
                                            @if ($value->locale==$locale)
                                                <li><a class="" href="">{{$value->label}}</a></li>
                                            @endif
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3>{{$footer_menu_title_two}}</h3>
                            <ul class="footer-menu">
                                @if ($footer_menu_two)
                                    @forelse($footer_menu_two->items as $value)
                                        <li><a class="" href="">{{$value->label}}</a></li>
                                    @empty
                                    @endforelse
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3>Company</h3>
                            <ul class="footer-menu">
                                <li><a href="{{route('cartpro.home')}}">@lang('file.Home')</a></li>
                                <li><a href="{{route('cartpro.brands')}}">@lang('file.Brands')</a></li>
                                <li><a href="{{route('cartpro.shop')}}">@lang('file.Shop')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-bottom">
            <div class="col-md-6">
                <p>{!! html_entity_decode($storefront_copyright_text) !!}</p>
            </div>
            <div class="col-md-6">
                <div class="footer-payment-options">
                    <img class="lazy" data-src="{{$payment_method_image}}" width="342px" height="30px">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer section Ends-->
<!-- Cookie consent Starts-->
{{-- <div class="alert alert-primary alert-dismissible fade show cookie-alert" role="alert">
<div class="d-flex justify-content-center align-items-center">
    <i class="las la-info-circle"></i> --}}
    @include('cookieConsent::index')
{{-- </div>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> --}}
<!-- Cookie consent Ends-->

@if (!Cookie::has('newslatter'))
    <div class="modal fade newsletter-modal" id="newsletter-modal" tabindex="-1" role="dialog" aria-labelledby="newsletter-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" style="background-image: url('{{asset('public/images/storefront/newsletter/newslatter.jpg')}}') ;background-size: cover;background-position: bottom;">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="las la-times"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="h2 semi-bold">@lang('file.Subscribe and get notification about discounts')</h3>
                            <p class="lead mb-5">Subscribe to our mailing list to receive updates on new arrivals, special offers and our promotions.</p>
                            <form class="newsletter" id="newsLatterSubmitFormPopUp" action="{{route('cartpro.newslatter_store')}}" method="POST">
                                @csrf
                                <input class="" type="email" placeholder="Enter your email" name="email" required>
                                <input type="hidden" name="disable_newslatter" value="0" id="disable_popup_newslatter">
                                <button type="submit" class="button style1 btn-search" type="submit">Subscribe</button> <br>
                            </form>

                            <div class="form-check">
                                <label class="form-check-label" for="disable-popup">
                                    Got it! Don't show this popup again.
                                </label>
                                <input class="form-check-input" id="newslatterPopup" type="checkbox" value="1" id="disable_popup">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!--Quick shop modal ends-->

@push('scripts')
    <script>
        (function ($) {
            $('#newslatterPopup').change(function() {
                if(this.checked) {
                    var newslatter = 'disable';
                }else{
                    var newslatter = 'enable';
                }
                $.get({
                    url: "{{route('cartpro.set_cookie')}}",
                    type: "GET",
                    data: {newslatter:newslatter},
                    success: function (data) {
                        console.log(data);
                        if (data=='disable') {
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
                                title: 'Newslatter Disabled Successfully'
                            })
                        }
                    }
                })
            });
        })(jQuery);
    </script>
@endpush
