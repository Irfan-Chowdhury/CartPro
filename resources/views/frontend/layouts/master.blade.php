@php
        $cart_count = Cart::count();
        $cart_subtotal = implode(explode(',',Cart::subtotal()));
        $cart_total = implode(explode(',',Cart::total()));
        $cart_contents = Cart::content();

        if (Auth::check()) {
            $total_wishlist = App\Models\Wishlist::where('user_id',Auth::user()->id)->count();
        }else {
            $total_wishlist = 0;
        }

        

        // if (Illuminate\Support\Facades\Auth::check()) {
        //     $total_wishlist = App\Models\Wishlist::where('user_id',Auth::user()->id)->count();
        // }else {
        //     $total_wishlist = 0;
        // }
@endphp


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="image/png" href="{{asset($favicon_logo_path)}}"/>

    <!-- Bootstrap CSS -->
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- style CSS -->
    <link href="{{asset('public/frontend/css/cartpro-style.css')}}" rel="stylesheet"/>

    <!-- Plugins CSS -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{asset('public/frontend/css/plugins.css')}}">
    <noscript><link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{asset('public/frontend/css/plugins.css')}}"></noscript>

    <!-- google fonts-->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap">
    <noscript><link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap"></noscript>

    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <noscript><link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"></noscript>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZZBZQHXN8Q"></script>

    @yield('meta_info')

    <!-- Document Title -->
    @if ($setting_store)
        <title>@yield('title',$setting_store->store_name)</title>
    @endif

    @yield('extra_css')

    <link href="{{asset('public/frontend/css/bootstrap-colorpicker.css')}}" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{asset('public/frontend/css/bootstrap-colorpicker.css')}}" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"></noscript>

    <style>
        :root {
            --theme-color: {{$storefront_theme_color ?? "#0071df"}};
            /* --theme-color: #80ff00; */
        }
    </style>
    <style>
        #switcher {list-style: none;margin: 0;padding: 0;overflow: hidden;}#switcher li {float: left;width: 30px;height: 30px;margin: 0 15px 15px 0;border-radius: 3px;}#demo {border-right: 1px solid #d5d5d5;width: 250px;height: 100%;left: -250px;position: fixed;padding: 50px 30px;background-color: #fff;transition: all 0.3s;z-index: 999;}#demo.open {left: 0;}.demo-btn {background-color: #fff;border: 1px solid #d5d5d5;border-left: none;border-bottom-right-radius: 3px;border-top-right-radius: 3px;color: var(--theme-color);font-size: 30px;height: 40px;position: absolute;right: -40px;text-align: center;top: 40%;width: 40px;}
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZZBZQHXN8Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-ZZBZQHXN8Q');
    </script>
</head>

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
        @if (env('USER_VERIFIED')==1)
            <div class="demo-btn"><i class="las la-cog"></i></div>
        @endif
    </div>


    <!--Header-->

    @include('frontend.includes.header')

    <div class="center loader"></div>

    @yield('frontend_content')


    <!--Footer-->
    @include('frontend.includes.footer')

    <!--Plugin js -->
    <script src="{{asset('public/frontend/js/plugin.js')}}"></script>

    <!-- Sweetalert2 -->
    <script src="{{asset('public/frontend/js/sweetalert2@11.js')}}"></script>

    <!-- Main js -->
    <script src="{{asset('public/frontend/js/main.js')}}"></script>

    <!--Colorpicker js -->
    <script src="{{asset('public/frontend/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('public/js/share.js')}}"></script>

    <script>
        (function ($) {
            "use strict";
            $('.demo-btn').on('click', function(){
                $('#demo').toggleClass('open');

                $('.color-change').click(function() {

                    var color = $(this).data('color');
                    $('#color-input').val(color);
                    $('body').css('--theme-color', color);

                });

                $('#color-input').on('change',function() {

                    var color = $(this).val();
                    $('body').css('--theme-color', color);

                });

            });


            $('#color-input').colorpicker({

            });
        })(jQuery);
    </script>

    <script>
        (function ($) {
            "use strict";

            $(document).ready(function() {
                $('#newsletter-modal').modal('toggle');
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

                let amountConvertToCurrency = parseFloat($('.cart_total').text()) * {{$CHANGE_CURRENCY_RATE}}
                $('.cart_total').text(amountConvertToCurrency.toFixed(2));
                $('.total_price').text(amountConvertToCurrency.toFixed(2));
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

            let values = [];

            // $(".addToCart").on("submit",function(e){
            $(document).on('submit','.addToCart',function(e) {
                e.preventDefault();
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
                    title: 'Successfully added on your cart'
                })
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
                            let amountConvertToCurrency = parseFloat(data.cart_total) * {{$CHANGE_CURRENCY_RATE}};
                            let moneySymbol = "<?php echo ($CHANGE_CURRENCY_SYMBOL!=NULL ? $CHANGE_CURRENCY_SYMBOL : env('DEFAULT_CURRENCY_SYMBOL')) ?>";

                            $('.cart_count').text(data.cart_count);
                            $('.cart_total').text(amountConvertToCurrency.toFixed(2));
                            $('.total_price').text(amountConvertToCurrency.toFixed(2));

                            var html = '';
                            var cart_content = data.cart_content;
                            $.each( cart_content, function( key, value ) {
                                let singleProductCurrency = parseFloat(value.price) * {{$CHANGE_CURRENCY_RATE}};

                                var image = 'public/'+value.options.image;
                                html += '<div id="'+value.rowId+'" class="shp__single__product"><div class="shp__pro__thumb"><a href="#">'+
                                        '<img src="'+image+'">'+
                                        '</a></div><div class="shp__pro__details"><h2>'+
                                        '<a href="#">'+value.name+'</a></h2>'+
                                        '<span>'+value.qty+'</span> x <span class="shp__price">'+ moneySymbol +' '+singleProductCurrency.toFixed(2)+'</span>'+
                                        '</div><div class="remove__btn"><a href="#" class="remove_cart" data-id="'+value.rowId+'" title="Remove this item"><i class="las la-times"></i></a></div></div>';
                            });
                            $('.cart_list').html(html);

                            if (data.wishlist_id>0) {
                                $('#wishlist_'+data.wishlist_id).remove();
                            }
                        }
                        else if(data.type=='quantity_limit'){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Available product is : '+data.product_quantity
                            });
                        }
                    }
                });
            });

            $('.forbidden_wishlist').on("click",function(e){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Login First',
                });
            });


            $(document).on('click','.remove_cart',function(event) {
                event.preventDefault();
                var rowId = $(this).data('id');
                $.ajax({
                    url: "{{ route('cart.remove') }}",
                    type: "GET",
                    data: {rowId:rowId},
                    success: function (data) {
                        if (data.type=='success') {
                            let amountConvertToCurrency = parseFloat(data.cart_total) * {{$CHANGE_CURRENCY_RATE}};
                            $('#'+rowId).remove();
                            $('.'+rowId).remove();
                            $('.cart_count').text(data.cart_count);
                            $('.cart_total').text(amountConvertToCurrency.toFixed(2));
                            $('.total_price').text(amountConvertToCurrency.toFixed(2));
                        }
                    }
                })
            });

            // $('.quantity_change_submit').on("click",function(e){
            //     e.preventDefault();
            //     var rowId = $(this).data('id');
            //     var input_number = $('.'+rowId).val();
            //     var shipping_charge =$('.shippingCharge:checked').val();
            //     if (!shipping_charge) {
            //         shipping_charge = 0;
            //     }
            //     var coupon_value = $('#coupon_value').val();
            //     if (!coupon_value) {
            //         coupon_value = 0;
            //     }
            //     console.log(coupon_value);
            //     $.ajax({
            //         url: "{{ route('cart.quantity_change') }}",
            //         type: "GET",
            //         data: {rowId:rowId,qty:input_number,shipping_charge:shipping_charge,coupon_value:coupon_value},
            //         success: function (data) {
            //             if (data.type=='success') {
            //                 $('.cart_count').text(data.cart_count);
            //                 $('.cartSubtotal').text(data.subtotal);
            //                 $('.cart_total').text(data.cart_total);
            //                 $('.total_price').text(data.total);
            //                 $('.subtotal_'+rowId).text(data.cart_subtotal);
            //             }
            //         }
            //     })
            // });

            //Search field
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
                                $('#result').empty().html(data);
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

            $("#newsLatterSubmitFormPopUp").on("submit",function(e){
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

                            $('#newsLatterSubmitFormPopUp')[0].reset();
                            $('#newsletter-modal').modal('hide');
                        }
                    }
                });
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

            $('#disable_popup').on("click",function (e) {
                var disable_popup =  $('#disable_popup').val();
                if (disable_popup==1) {
                    $('#disable_popup_newslatter').val(1);
                }else{
                    $('#disable_popup_newslatter').val(0);
                }
            });

            $(document).on('click','.add_to_wishlist',function(e) {
                e.preventDefault();
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
                        console.log(data);
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
                            });
                        }else if(data.type=='not_authorized'){
                            Swal.fire({
                                icon: 'error',
                                title: data.message,
                            });
                        }
                        $('.wishlist_count').text(data.wishlist_count);
                    }
                })
            });

            $('#stripeContent').hide();
        })(jQuery);
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

