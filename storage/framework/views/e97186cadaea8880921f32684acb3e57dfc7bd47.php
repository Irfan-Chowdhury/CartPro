<?php
        $cart_count = Cart::count();
        $cart_subtotal = implode(explode(',',Cart::subtotal()));
        $cart_total = implode(explode(',',Cart::total()));
        $cart_contents = Cart::content();

        if (Auth::check()) {
            $total_wishlist = App\Models\Wishlist::where('user_id',Auth::user()->id)->count();
        }else {
            $total_wishlist = 0;
        }


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
?>





<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo $__env->yieldContent('meta_info'); ?>

    <!-- Document Title -->
    <?php if($setting_store): ?>
        <title><?php echo $__env->yieldContent('title',$setting_store->store_name); ?></title>
    <?php endif; ?>
    <!-- Links -->
    <link rel="icon" type="image/png" href="<?php echo e(asset($favicon_logo_path)); ?>"/>

    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- style CSS -->
    <link href="<?php echo e(asset('frontend/css/cartpro-style.css')); ?>" rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php echo e(asset('frontend/css/plugins.css')); ?>">
    <noscript><link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php echo e(asset('frontend/css/plugins.css')); ?>"></noscript>

    <!-- google fonts-->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap">
    <noscript><link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap"></noscript>

    <?php echo $__env->yieldContent('extra_css'); ?>

    <style>
        :root {--theme-color: <?php echo e($storefront_theme_color ?? "#0071df"); ?>;--navbg-color:<?php echo e($storefront_navbg_color ?? "#FFF"); ?>;--menu-text-color:<?php echo e($storefront_menu_text_color ?? "#59b210"); ?>;--menu-text-hover-color:<?php echo e($storefront_menu_text_hover_color ?? ""); ?>}
    </style>

    <?php if(!env('USER_VERIFIED')==1): ?>
        <style>
            #switcher {list-style: none;margin: 0;padding: 0;overflow: hidden;}#switcher li {float: left;width: 30px;height: 30px;margin: 0 15px 15px 0;border-radius: 3px;}#demo {border-right: 1px solid #d5d5d5;width: 250px;height: 100%;left: -250px;position: fixed;padding: 50px 30px;background-color: #fff;transition: all 0.3s;z-index: 999;}#demo.open {left: 0;}.demo-btn {background-color: #fff;border: 1px solid #d5d5d5;border-left: none;border-bottom-right-radius: 3px;border-top-right-radius: 3px;color: var(--theme-color);font-size: 30px;height: 40px;position: absolute;right: -40px;text-align: center;top: 45%;width: 40px;}
        </style>
    <?php endif; ?>

</head>

<body>
    <?php if(!env('USER_VERIFIED')==1): ?>
    <div id="demo">
        <h6>Theme Colors</h6>
        <ul id="switcher" class="p-0">
            <li class="color-change-theme" data-color="#0071df" style="background-color:#0071df"></li>
            <li class="color-change-theme" data-color="#f51e46" style="background-color:#f51e46"></li>
            <li class="color-change-theme" data-color="#fa9928" style="background-color:#fa9928"></li>
            <li class="color-change-theme" data-color="#fd6602" style="background-color:#fd6602"></li>
            <li class="color-change-theme" data-color="#59b210" style="background-color:#59b210"></li>
            <li class="color-change-theme" data-color="#ff749f" style="background-color:#ff749f"></li>
            <li class="color-change-theme" data-color="#f8008c" style="background-color:#f8008c"></li>
            <li class="color-change-theme" data-color="#6453f7" style="background-color:#6453f7"></li>
        </ul>
        <h6>Nav Background Color</h6>
        <ul id="switcher" class="p-0">
            <li class="color-change-navbg" data-color="#0071df" style="background-color:#0071df"></li>
            <li class="color-change-navbg" data-color="#f51e46" style="background-color:#f51e46"></li>
            <li class="color-change-navbg" data-color="#fa9928" style="background-color:#fa9928"></li>
            <li class="color-change-navbg" data-color="#fd6602" style="background-color:#fd6602"></li>
            <li class="color-change-navbg" data-color="#59b210" style="background-color:#59b210"></li>
            <li class="color-change-navbg" data-color="#ff749f" style="background-color:#ff749f"></li>
            <li class="color-change-navbg" data-color="#f8008c" style="background-color:#f8008c"></li>
            <li class="color-change-navbg" data-color="#6453f7" style="background-color:#6453f7"></li>
            <li class="color-change-navbg" data-color="#FFF" style="background-color:#FFF;border:1px solid #666"></li>
        </ul>
        <h6>Nav Text Color</h6>
        <ul id="switcher" class="p-0">
            <li class="color-change-navtext" data-color="#FFF" data-hover-color="#e5e8ec" style="background-color:#FFF;border:1px solid #666"></li>
            <li class="color-change-navtext" data-color="#021523" data-hover-color="#666" style="background-color:#021523"></li>
        </ul>
        <div class="demo-btn"><i class="las la-cog"></i></div>
    </div>
    <?php endif; ?>

    <!--Header-->
    <?php echo $__env->make('frontend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="center loader"></div>

    <?php echo $__env->yieldContent('frontend_content'); ?>

    <div class="shop__filters">
    </div>

    <!--Footer-->
    <?php echo $__env->make('frontend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!--Plugin js -->
    <script src="<?php echo e(asset('frontend/js/plugin.js')); ?>"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>

    <!-- Sweetalert2 -->
    <script src="<?php echo e(asset('frontend/js/sweetalert2@11.js')); ?>"></script>

    <!-- Main js -->
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>

    <script src="<?php echo e(asset('js/share.js')); ?>"></script>

    <?php if(!env('USER_VERIFIED')==1): ?>
    <script>
        (function ($) {
            "use strict";
            $('.demo-btn').on('click', function(){
                $('#demo').toggleClass('open');

                $('.color-change-theme').click(function() {
                    var color = $(this).data('color');
                    $('#color-input').val(color);
                    $('body').css('--theme-color', color);
                });

                $('.color-change-navbg').click(function() {
                    var color = $(this).data('color');
                    $('#color-input').val(color);
                    $('body').css('--navbg-color', color);
                });

                $('.color-change-navtext').click(function() {
                    var color = $(this).data('color');
                    var hover = $(this).data('hover-color');
                    $('#color-input').val(color);
                    $('body').css('--menu-text-color', color);
                    $('body').css('--menu-text-hover-color', hover);
                });
            });

        })(jQuery);
    </script>
    <?php endif; ?>

    <script>
        (function ($) {
            "use strict";

            $('#bannerSlideUp').on('click', function(){
                $('#top_banner').slideUp();
            })

            $(document).ready(function() {
                $('#newsletter-modal').modal('toggle');
                <?php if(session()->has('type')): ?>
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
                <?php endif; ?>

                let amountConvertToCurrency = parseFloat($('.cart_total').text()) * <?php echo e($CHANGE_CURRENCY_RATE); ?>

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
                    url: "<?php echo e(route('product.add_to_cart')); ?>",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data.type=='success') {
                            let amountConvertToCurrency = parseFloat(data.cart_total) * <?php echo e($CHANGE_CURRENCY_RATE); ?>;
                            let moneySymbol = "<?php echo ($CHANGE_CURRENCY_SYMBOL!=NULL ? $CHANGE_CURRENCY_SYMBOL : env('DEFAULT_CURRENCY_SYMBOL')) ?>";

                            $('.cart_count').text(data.cart_count);
                            $('.cart_total').text(amountConvertToCurrency.toFixed(2));
                            $('.total_price').text(amountConvertToCurrency.toFixed(2));

                            var html = '';
                            var cart_content = data.cart_content;
                            $.each( cart_content, function( key, value ) {
                                let singleProductCurrency = parseFloat(value.price) * <?php echo e($CHANGE_CURRENCY_RATE); ?>;
                                // For Attribute
                                if (value.options.attributes) {
                                    var data = value.options.attributes;
                                    var attributes = [];
                                    for (var i = 0; i < data.name.length; i++) {
                                        attributes.push({
                                            name: data.name[i],
                                            value: data.value[i]
                                        });
                                    }
                                }
                                var image = "<?php echo e(url('/')); ?>/"+'public'+value.options.image;
                                html += '<div id="'+value.rowId+'" class="shp__single__product"><div class="shp__pro__thumb"><a href="#">'+
                                            '<img src="'+image+'">'+
                                            '</a></div><div class="shp__pro__details"><h2>'+
                                            '<a href="#">'+value.name+'</a></h2>';
                                // For Attribute
                                if (value.options.attributes) {
                                    for (var i = 0; i < attributes.length; i++) {
                                    var attribute = attributes[i];
                                        html += "<div class='row'><span>" + attribute.name + " :" + attribute.value + "</span></div>";
                                    }
                                }
                                html += '<span>'+value.qty+'</span> x <span class="shp__price">'+ moneySymbol +' '+singleProductCurrency.toFixed(2)+'</span>'+
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
                    url: "<?php echo e(route('cart.remove')); ?>",
                    type: "GET",
                    data: {rowId:rowId},
                    success: function (data) {
                        if (data.type=='success') {
                            $('#'+rowId).remove();
                            $('.cart_count').text(data.cart_count);
                            $('.cart_total').text(data.cart_total);
                            $('.total_price').text(data.cart_total);
                        }
                    }
                })
            });

            //Search field
            $('#search_field').hide();

            $(document).ready(function(){
                $('#searchText').keyup(function(){
                    var txt = $(this).val();
                    if (txt!='') {
                        $('#search_field').show();
                        $('#result').html('<li>loading...</li>');
                        $.ajax({
                            url: "<?php echo e(route('cartpro.data_ajax_search')); ?>",
                            type: "GET",
                            data: {search_txt:txt},
                            success: function (data) {
                                $('#search_field').show();
                                $('#result').empty().html(data);
                            }
                        })
                    }
                    else if(txt.length === 0 ) {
                        $('#search_field').hide();
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
                    url: "<?php echo e(route('cartpro.newslatter_store')); ?>",
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
                    url: "<?php echo e(route('cartpro.newslatter_store')); ?>",
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


            // ---------- Attribute ----------
            let values         = [];
            let valueNames     = [];
            let attributeNames = [];
            $('.attribute_value').on("click",function(e){
                e.preventDefault();

                let selectedVal = $(this).data('value_id');
                let selectedName = $(this).data('value_name');
                let selectedAttributeName = $(this).data('attribute_name');

                //If want to deselect which is selected previously
                if ($(this).hasClass('select')) {
                    $(this).removeClass('text-primary');
                    $(this).removeClass('select').addClass('deselect');
                    for( var i = 0; i < values.length; i++){
                        if (values[i] === selectedVal) {
                            values.splice(i, 1);
                        }
                    }
                    for( var i = 0; i < valueNames.length; i++){
                        if (valueNames[i] === selectedName) {
                            valueNames.splice(i, 1);
                        }
                    }
                    for( var i = 0; i < attributeNames.length; i++){
                        if (attributeNames[i] === selectedAttributeName) {
                            attributeNames.splice(i, 1);
                        }
                    }
                    //If want to select new
                } else {
                    // First check is this Attribute Name exists or not in Array of attributeNames,
                    if(attributeNames.indexOf(selectedAttributeName) !== -1){ // if yes then
                        let index = attributeNames.indexOf(selectedAttributeName); //pick the attribute index number,
                        let valueId = values[index]; // pick the valueId from the values[index number],
                        // console.log('Exists | Exists - '+index + ' | ValueId: '+values[index]);
                        values.splice(index, 1);
                        valueNames.splice(index, 1);
                        attributeNames.splice(index, 1);
                        $('#valueId_'+valueId).removeClass('select').removeClass('text-primary');
                    }
                    $(this).removeClass('deselect').addClass('select');
                    $(this).addClass('text-primary');
                    values.push(selectedVal);
                    valueNames.push(selectedName);
                    attributeNames.push(selectedAttributeName);
                }
                $('#value_ids').val(values);
                $('#value_names').val(valueNames);
                $('#attribute_names').val(attributeNames);
            });
            // ---------- Attribute ----------

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
                    url: "<?php echo e(route('wishlist.add')); ?>",
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

            $(window).on('load',function(){

                $('.lazy').Lazy();
            });

        })(jQuery);
    </script>
    <script>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>

<?php /**PATH /var/www/html/cartproshop/resources/views/frontend/layouts/master.blade.php ENDPATH**/ ?>