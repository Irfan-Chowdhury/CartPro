@php


    $languages = Illuminate\Support\Facades\Cache::remember('languages', 300, function () {
        return App\Models\Language::orderBy('language_name','ASC')->get();
    });

    $currency_codes = App\Models\CurrencyRate::select('currency_code')->get();

    $storefront_images = Illuminate\Support\Facades\Cache::remember('storefront_images', 300, function () {
        return  App\Models\StorefrontImage::select('title','type','image')->get();
    });

    $empty_image = 'public/images/empty.jpg';
    $favicon_logo_path = $empty_image;
    $header_logo_path  = $empty_image;
    foreach ($storefront_images as $key => $item) {
        if ($item->title=='favicon_logo'){
            $favicon_logo_path = 'public'.$item->image;
        }
        elseif ($item->title=='header_logo') {
            $header_logo_path  = 'public'.$item->image;
        }
    }
    //Appereance-->Storefront --> Setting
    $settings = Illuminate\Support\Facades\Cache::remember('settings', 300, function () {
        return App\Models\Setting::with(['storeFrontImage','settingTranslation','settingTranslationDefaultEnglish'])->get();
    });

    $categories = Illuminate\Support\Facades\Cache::remember('categories', 300, function () {
        return App\Models\Category::with(['catTranslation','parentCategory','categoryTranslationDefaultEnglish','child'])
                    ->where('parent_id',NULL)
                    ->where('is_active',1)
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','DESC')
                    ->get();
    });

    $menus = Harimayco\Menu\Models\Menus::with('items')
                    ->where('is_active',1)
                    ->get();
    $menu = null;
    $footer_menu_one = null;
    $footer_menu_two = null;

    foreach ($settings as $key => $item) {
        if ($item->key=='storefront_primary_menu' && $item->plain_value!=NULL) {
            foreach ($menus as $key2 => $value) {
                if ($value->id==$item->plain_value) {
                    $menu = $menus[$key2];
                }
            }
            // $menu = Harimayco\Menu\Models\Menus::with('items')
            // ->where('is_active',1)
            // ->where('id',$item->plain_value)
            // ->first();
        }

        if ($item->key=='storefront_footer_menu_title_one' && $item->plain_value==NULL) {
            $footer_menu_one_title = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value ?? null;
        }
        if ($item->key=='storefront_footer_menu_one' && $item->plain_value!=NULL) {
            foreach ($menus as $key2 => $value) {
                if ($value->id==$item->plain_value) {
                    $footer_menu_one = $menus[$key2];
                }
            }
        }

        if ($item->key=='storefront_footer_menu_title_two' && $item->plain_value==NULL) {
            $footer_menu_title_two = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value  ?? null;
        }
        if ($item->key=='storefront_footer_menu_two' && $item->plain_value!=NULL) {
            foreach ($menus as $key2 => $value) {
                if ($value->id==$item->plain_value) {
                    $footer_menu_two = $menus[$key2];
                }
            }
        }

        if ($item->key=='storefront_address' && $item->plain_value==NULL) {
            $storefront_address = $item->settingTranslation->value ?? $item->settingTranslationDefaultEnglish->value  ?? null;
        }
    }
    $cart_count = \Gloudemans\Shoppingcart\Facades\Cart::count();
    $cart_subtotal = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
    $cart_total = \Gloudemans\Shoppingcart\Facades\Cart::total();
    $cart_contents = \Gloudemans\Shoppingcart\Facades\Cart::content();

    //Newslatter
    $setting_newslatter = App\Models\SettingNewsletter::first();

    //Setting Store
    $setting_store =  App\Models\SettingStore::first();
    $total_wishlist =  App\Models\Wishlist::count();

    if(!Session::get('currentLocal')){
        Session::put('currentLocal', 'en');
    }

@endphp

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="image/png" href="{{asset('public/frontend/images/favicon.png')}}" />
    <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="{{asset('public/frontend/css/plugins.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="{{asset('public/frontend/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- style CSS -->
    <link href="{{asset('public/frontend/css/cartPro-style.css')}}" rel="stylesheet" />
    <!-- <link href="css/bootstrap-rtl.min.css" rel="stylesheet"> -->
    <link href="{{asset('public/frontend/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/payment-fonts.css')}}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta_info')

    <!-- Document Title -->
    {{-- <title>CartPro - ecommerce HTML Template</title> --}}
    <title>@yield('title','CartPro')</title>

    @yield('extra_css')

    <style>
        /* .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-right: 16px solid green;
            border-bottom: 16px solid red;
            border-left: 16px solid pink;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        } */
        :root {
            --theme-color: {{$storefront_theme_color ?? "#0071df"}};
        }
    </style>
</head>

{{-- style="--theme-color: {{$storefront_theme_color}}" --}}

<body>
    <div id="demo">
        <h6>Colorways</h6>
        <ul id="switcher">
            <li class="color-change" data-color="#0071df" style="background-color:#0071df"></li>
            <li class="color-change" data-color="#f51e46" style="background-color:#f51e46"></li>
            <li class="color-change" data-color="#fa9928" style="background-color:#fa9928"></li>
            <li class="color-change" data-color="#fd6602" style="background-color:#fd6602"></li>
            <li class="color-change" data-color="#59b210" style="background-color:#59b210"></li>
            <li class="color-change" data-color="#ff749f" style="background-color:#ff749f"></li>
            <li class="color-change" data-color="#f8008c" style="background-color:#f8008c"></li>
            <li class="color-change" data-color="#6453f7" style="background-color:#6453f7"></li>
        </ul>
        <h6>Custom color</h6>
        <input type="text" id="color-input" class="form-control" value="#0071df">
        <div class="demo-btn"><i class="las la-cog"></i></div>
    </div>


    <!--Header-->
    @include('frontend.includes.header')

    <div class="center loader"></div>

    @yield('frontend_content')


    <!--Footer-->
    @include('frontend.includes.footer')

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "CUSTOMER FACEBOOK PAGE ID GOES HERE");
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v11.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    {{-- Sweetalert2 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="{{asset('public/frontend/js/sweetalert2@11.js')}}"></script>


    <!-- FACEBOOK CHAT PLUGIN ENDS -->

    <!--Plugin js -->
    <script src="{{asset('public/frontend/js/plugin.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap-select.min.js')}}"></script>
    <!-- Main js -->
    <script src="{{asset('public/frontend/js/main.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // $('#newsletter-modal').modal('toggle');
            @if(session()->has('type'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Successfully added on your cart'
                })
            @endif
        });

        //Category-Wise-Product
        $('.view-list').on('click', function(){
            $(this).addClass('active');
            $('.product-grid').addClass('list-view');
            $('.view-grid').removeClass('active');
        });

        $('.view-grid').on('click', function(){
            $(this).addClass('active');
            $('.product-grid').removeClass('list-view');
            $('.view-list').removeClass('active');
        });
    </script>

    <script src="{{asset('public/frontend/js/bootstrap-colorpicker.js')}}"></script>


    <script>


        let values = [];

        $('.demo-btn').on('click', function(){
            $('#demo').toggleClass('open');
        });
        $(function () {
            $('#color-input').colorpicker({
            });
        });


        $(".addToCart").on("submit",function(e){
            e.preventDefault();

            $.ajax({
                url: "{{route('product.add_to_cart')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data.type=='success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: 'Successfully added on your cart'
                        })

                        $('.cart_count').text(data.cart_count);
                        $('.cart_total').text(data.cart_total);
                        $('.total_price').text(data.cart_total);

                        var html = '';
                        var cart_content = data.cart_content;
                        $.each( cart_content, function( key, value ) {
                            var image = 'public/'+value.options.image;
                            html += '<div id="'+value.rowId+'" class="shp__single__product"><div class="shp__pro__thumb"><a href="#">'+
                                    '<img src="'+image+'">'+
                                    '</a></div><div class="shp__pro__details"><h2>'+
                                    '<a href="#">'+value.name+'</a></h2>'+
                                    '<span>'+value.qty+'</span> x <span class="shp__price"> $'+value.price+'</span>'+
                                    '</div><div class="remove__btn"><a href="#" class="remove_cart" data-id="'+value.rowId+'" title="Remove this item"><i class="ion-ios-close-empty"></i></a></div></div>';
                        });
                        $('.cart_list').html(html);

                        if (data.wishlist_id>0) {
                            $('#wishlist_'+data.wishlist_id).remove();
                        }
                        // $('.cart_list').html(JSON.parse(html));
                    }
                }
            });
        });

        $("#productAddToCartSingle").on("submit",function(e){
            e.preventDefault();
            console.log(values);
            $.ajax({
                url: "{{route('product.add_to_cart')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    if (data.type=='success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: 'Successfully added on your cart'
                        })

                        $('.cart_count').text(data.cart_count);
                        $('.cart_total').text(data.cart_total);
                        $('.total_price').text(data.cart_total);

                        var html = '';
                        var cart_content = data.cart_content;
                        $.each( cart_content, function( key, value ) {
                            var image = 'public/'+value.options.image;
                            html += '<div id="'+value.rowId+'" class="shp__single__product"><div class="shp__pro__thumb"><a href="#">'+
                                    '<img src="'+image+'">'+
                                    '</a></div><div class="shp__pro__details"><h2>'+
                                    '<a href="#">'+value.name+'</a></h2>'+
                                    '<span>'+value.qty+'</span> x <span class="shp__price"> $'+value.price+'</span>'+
                                    '</div><div class="remove__btn"><a href="#" class="remove_cart" data-id="'+value.rowId+'" title="Remove this item"><i class="ion-ios-close-empty"></i></a></div></div>';
                        });
                        $('.cart_list').html(html);
                    }
                }
            });
        });

        $(document).on('click','.remove_cart',function(event) {
            event.preventDefault();
            var rowId = $(this).data('id');
            // var removeCartItemId = $(this).parent().parent().attr('id');

            $.ajax({
                url: "{{ route('cart.remove') }}",
                type: "GET",
                data: {rowId:rowId},
                success: function (data) {
                    if (data.type=='success') {
                        // $('#'+removeCartItemId).remove();
                        $('#'+rowId).remove();
                        $('.cart_count').text(data.cart_count);
                        $('.cart_total').text(data.cart_total);
                        $('.total_price').text(data.cart_total);
                    }
                }
            })
        });

        $(document).on('click','.remove_cart_from_details',function(event) {
            event.preventDefault();
            var rowId = $(this).data('id');
            var removeCartItemFromDetails = $(this).closest('tr');
            $.ajax({
                url: "{{ route('cart.remove') }}",
                type: "GET",
                data: {rowId:rowId},
                success: function (data) {
                    if (data.type=='success') {
                        removeCartItemFromDetails.remove();
                        $('.cart_count').text(data.cart_count);
                        $('.cart_total').text(data.cart_total);
                        $('.total_price').text(data.cart_total);

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
                            title: 'Successfully deleted from cart'
                        })
                    }
                }
            })
        });

        $('.quantity_change_submit').on("click",function(e){
            e.preventDefault();
            var rowId = $(this).data('id');
            var input_number = $('.'+rowId).val();
            var shipping_charge =$('.shippingCharge:checked').val();
            if (!shipping_charge) {
                shipping_charge = 0;
            }
            var coupon_value = $('#coupon_value').val();
            if (!coupon_value) {
                coupon_value = 0;
            }
            console.log(coupon_value);
            $.ajax({
                url: "{{ route('cart.quantity_change') }}",
                type: "GET",
                data: {rowId:rowId,qty:input_number,shipping_charge:shipping_charge,coupon_value:coupon_value},
                success: function (data) {
                    if (data.type=='success') {
                        $('.cart_count').text(data.cart_count);
                        $('.cartSubtotal').text(data.subtotal);
                        $('.cart_total').text(data.cart_total);
                        $('.total_price').text(data.total);
                        $('.subtotal_'+rowId).text(data.cart_subtotal);
                    }
                }
            })
        });

        $('#search_field').hide();

        $(document).ready(function(){
            $('#searchText').keyup(function(){
                var txt = $(this).val();
                if (txt!='') {
                    $.ajax({
                        url: "{{ route('cartpro.data_ajax_search') }}",
                        type: "GET",
                        data: {search_txt:txt},
                        success: function (data) {
                            $('#search_field').show();
                            $('#result').html(data);
                        }
                    })
                }
                else{
                    $('#search_field').hide();
                    $('#result').empty();
                }

            })
        });

        $("#newsLatterSubmitForm").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                url: "{{route('cartpro.newslatter_store')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    if (data.type=='error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                    else if (data.type=='success') {
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

                        $('#newsLatterSubmitForm')[0].reset();
                    }
                }
            });
        });

        $(document).on('click','.limitCategoryProductShow',function(event) {
            event.preventDefault();
            var limit_data = $(this).data('id');
            var category_slug = $('#categorySlug').val();
            $.ajax({
                url: "{{ route('cartpro.limit_category_product_show') }}",
                type: "GET",
                data: {limit_data:limit_data, category_slug:category_slug},
                success: function (data) {
                    console.log(data);
                    $('.categoryWiseProductField').html(data);
                }
            })
        });

        $('.attribute_value').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            // var attribute_name = $(this).data('attribute_name');
            // attribute_name_arr.push(attribute_name);
            // var unique_attribute_name = attribute_name_arr.filter(function(itm, i, attribute_name_arr) {
            //     return i == attribute_name_arr.indexOf(itm);
            // });
            // $.each(unique_attribute_name, function( key, value ) {
            //     if (value == attribute_name) {
            //         $(this).addClass('selected');
            //     }
            // });

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('#value_ids').val(values);

        });

        $('#stripeContent').hide();

    </script>

    {{-- @if (\Route::current()->getName() == 'cart.view_details')
        <script type="text/javascript">
            // $(document).ready(function() {
            $("#deleteCart").click(function(){
            // $("#deleteCart").on("click",function(e){
                console.log('ok');
                // var data = $("#deleteCart").val();
                // console.log(data);
            });
        </script>
    @endif --}}
    @stack('scripts')
</body>

</html>

