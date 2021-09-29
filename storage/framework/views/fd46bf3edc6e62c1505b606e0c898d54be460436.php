<?php $__env->startSection('admin_content'); ?>

<style>
    #accordion .fa{
        margin-right: 0.5rem;
      	font-size: 24px;
      	font-weight: bold;
        position: relative;
    	top: 2px;
    }
    .card-header:first-child{
        padding:0px 0px 0px 10px
    }
</style>
<script>
    $(document).ready(function(){
        // Add down arrow icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-angle-down").removeClass("fa-angle-right");
        });

        // Toggle right and down arrow icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-angle-down").addClass("fa-angle-right");
        });
    });
</script>

<div class="container-fluid"><span id="alert_message"></span></div>
<div class="container-fluid mb-3">


    <div class="d-flex">
        <div class="p-2">
            <h2 class="font-weight-bold mt-3">Settings</h2>
        </div>
        <div class="ml-auto p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Site Setting</li>
                </ol>
            </nav>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-4">

        <div id="accordion">

            <!-- General Settings  -->
            <div class="card mb-0">
                <div class="card-header" id="generalSettings">
                    <div class="btn" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="text-bold"><i class="fa fa-angle-right"></i>General Settings</h5>
                    </div>
                </div>
                <div id="collapse1" class="collapse show" aria-labelledby="generalSettings" data-parent="#accordion">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="general-settings" data-toggle="list" href="#general" role="tab" aria-controls="home">General</a>
                            <a class="list-group-item list-group-item-action" id="maintenance-settings" data-toggle="list" href="#maintenance" role="tab" aria-controls="maintenance">Maintenance</a>
                            <a class="list-group-item list-group-item-action" id="store-settings" data-toggle="list" href="#store" role="tab" aria-controls="social">Store</a>
                            <a class="list-group-item list-group-item-action" id="currency-settings" data-toggle="list" href="#currency" role="tab" aria-controls="settings">Currency</a>
                            <a class="list-group-item list-group-item-action" id="sms-settings" data-toggle="list" href="#sms" role="tab" aria-controls="profile">SMS</a>
                            <a class="list-group-item list-group-item-action" id="mail-settings" data-toggle="list" href="#mail" role="tab" aria-controls="mail">Mail</a>
                            <a class="list-group-item list-group-item-action" id="newsletter-settings" data-toggle="list" href="#newsletter" role="tab" aria-controls="newsletter">Newsletter</a>
                            <a class="list-group-item list-group-item-action" id="custom_css_js-settings" data-toggle="list" href="#customCssJss" role="tab" aria-controls="customCssJss">Custom CSS / JSS</a>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Social Login  -->
             <div class="card mb-0">
                <div class="card-header" id="socialLogin">
                    <div class="btn" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="text-bold"><i class="fa fa-angle-right"></i>Social Logins</h5>
                    </div>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="socialLogin" data-parent="#accordion">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="facebook-social_login" data-toggle="list" href="#facebook" role="tab" aria-controls="facebook">Facebook</a>
                            <a class="list-group-item list-group-item-action" id="google-social_login" data-toggle="list" href="#google" role="tab" aria-controls="google">Google</a>
                        </div>
                    </div>
                </div>
             </div>
             <!-- Shipping Methods  -->
             <div class="card mb-0">
                <div class="card-header" id="shippingMethod">
                    <div class="btn" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="text-bold"><i class="fa fa-angle-right"></i>Shipping Methods</h5>
                    </div>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="shippingMethod" data-parent="#accordion">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="free_shipping-shipping_methods" data-toggle="list" href="#free_shipping" role="tab" aria-controls="free_shipping">Free Shipping</a>
                            <a class="list-group-item list-group-item-action" id="local_pickup-shipping_methods" data-toggle="list" href="#local_pickup" role="tab" aria-controls="local_pickup">Local Pickup</a>
                            <a class="list-group-item list-group-item-action" id="flat_rate-shipping_methods" data-toggle="list" href="#flat_rate" role="tab" aria-controls="flat_rate">Flat Rate</a>
                        </div>
                    </div>
                </div>
             </div>

             <!-- Payment Methods  -->
             <div class="card">
                <div class="card-header" id="paymentMethod">
                    <div class="btn" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapseFour">
                        <h5 class="text-bold"><i class="fa fa-angle-right"></i>Payment Methods</h5>
                    </div>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="paymentMethod" data-parent="#accordion">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="paypal-payment_methods" data-toggle="list" href="#paypal" role="tab" aria-controls="paypal">Paypal</a>
                        </div>
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="strip-payment_methods" data-toggle="list" href="#strip" role="tab" aria-controls="strip">Strip</a>
                        </div>
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="paytm-payment_methods" data-toggle="list" href="#paytm" role="tab" aria-controls="paytm">Paytm</a>
                        </div>
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="cash_on_delivery-payment_methods" data-toggle="list" href="#cash_on_delivery" role="tab" aria-controls="cash_on_delivery">Cash On Delivery</a>
                        </div>
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="bank_transfer-payment_methods" data-toggle="list" href="#bank_transfer" role="tab" aria-controls="bank_transfer">Bank Transfer</a>
                        </div>
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="check_money_order-payment_methods" data-toggle="list" href="#check_money_order" role="tab" aria-controls="check_money_order">Check Money / Order</a>
                        </div>
                    </div>
                </div>
             </div>
        </div>


            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">

                    <!----------------------------------- General Setting ------------------------------------------>

                    <!-- general -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-settings">
                        <?php echo $__env->make('admin.pages.setting.general_setting.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Maintenance -->
                    <div class="tab-pane fade" id="maintenance" role="tabpanel" aria-labelledby="maintenance-settings">
                        <?php echo $__env->make('admin.pages.setting.general_setting.maintenance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Maintenance -->
                    <div class="tab-pane fade" id="store" role="tabpanel" aria-labelledby="store-settings">
                        <?php echo $__env->make('admin.pages.setting.general_setting.store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Currency -->
                    <div class="tab-pane fade" id="currency" role="tabpanel" aria-labelledby="currency-settings">
                        <?php echo $__env->make('admin.pages.setting.general_setting.currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- SMS -->
                    <div class="tab-pane fade" id="sms" role="tabpanel" aria-labelledby="sms-settings">
                        <?php echo $__env->make('admin.pages.setting.general_setting.sms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Mail -->
                    <div class="tab-pane fade" id="mail" role="tabpanel" aria-labelledby="mail-settings">
                        <?php echo $__env->make('admin.pages.setting.general_setting.mail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Newsletter -->
                    <div class="tab-pane fade" id="newsletter" role="tabpanel" aria-labelledby="newsletter-settings">
                        <?php echo $__env->make('admin.pages.setting.general_setting.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Custom CSS/Js -->
                    <div class="tab-pane fade" id="customCssJss" role="tabpanel" aria-labelledby="custom_css_jss-settings">
                        <?php echo $__env->make('admin.pages.setting.general_setting.custom_css_jss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!----------------------------------- Social Login ------------------------------------------>

                    <!-- Facebook -->
                    <div class="tab-pane fade" id="facebook" role="tabpanel" aria-labelledby="facebook-social_login">
                        <?php echo $__env->make('admin.pages.setting.social_login.facebook', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Google -->
                    <div class="tab-pane fade" id="google" role="tabpanel" aria-labelledby="google-social_login">
                        <?php echo $__env->make('admin.pages.setting.social_login.google', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!----------------------------------- Shipping Methods ------------------------------------------>

                    <!-- Free Shipping -->
                    <div class="tab-pane fade" id="free_shipping" role="tabpanel" aria-labelledby="free_shipping-shipping_methods">
                        <?php echo $__env->make('admin.pages.setting.shipping_method.free_shipping', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Local Pickup -->
                    <div class="tab-pane fade" id="local_pickup" role="tabpanel" aria-labelledby="local_pickup-shipping_methods">
                        <?php echo $__env->make('admin.pages.setting.shipping_method.local_pickup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Flat Rate -->
                    <div class="tab-pane fade" id="flat_rate" role="tabpanel" aria-labelledby="flat_rate-shipping_methods">
                        <?php echo $__env->make('admin.pages.setting.shipping_method.flat_rate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!----------------------------------- Payment Methods ------------------------------------------>

                    <!-- Paypal  -->
                    <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-payment_methods">
                        <?php echo $__env->make('admin.pages.setting.payment_method.paypal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Strip  -->
                    <div class="tab-pane fade" id="strip" role="tabpanel" aria-labelledby="strip-payment_methods">
                        <?php echo $__env->make('admin.pages.setting.payment_method.strip', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Paytm  -->
                    <div class="tab-pane fade" id="paytm" role="tabpanel" aria-labelledby="paytm-payment_methods">
                        <?php echo $__env->make('admin.pages.setting.payment_method.paytm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Cash On Delivery  -->
                    <div class="tab-pane fade" id="cash_on_delivery" role="tabpanel" aria-labelledby="cash_on_delivery-payment_methods">
                        <?php echo $__env->make('admin.pages.setting.payment_method.cash_on_delivery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Bank Transfer  -->
                    <div class="tab-pane fade" id="bank_transfer" role="tabpanel" aria-labelledby="bank_transfer-payment_methods">
                        <?php echo $__env->make('admin.pages.setting.payment_method.bank_transfer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- Check / Money Order  -->
                    <div class="tab-pane fade" id="check_money_order" role="tabpanel" aria-labelledby="check_money_order-payment_methods">
                        <?php echo $__env->make('admin.pages.setting.payment_method.check_money_order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
              </div>
            </div>
          </div>
    </div>
</div>


<script type="text/javascript">
    //----------Insert Data----------------------

    //General
    $('#generalSubmit').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.setting.general.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                console.log(data);

                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }

                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Store
    $('#storeSubmit').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.setting.store.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';

                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }

                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Currency - exchange rate service
    $('#exchangeRateService').change(function() {
        var exchangeRateService = $('#exchangeRateService').val();

        if (exchangeRateService=="fixer") {
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Fixer Access Key')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" name="fixer_access_key" class="form-control">';
            data += '</div>';
            $('#exchangeRateServiceField').html(data);
        }
        else if (exchangeRateService=="forge") {
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Forge API Key')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" name="forge_api_key" class="form-control">';
            data += '</div>';
            $('#exchangeRateServiceField').html(data);
        }
        else if (exchangeRateService=="currency_data_feed") {
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Currency Data Feed API Key')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" name="currency_data_feed_key" class="form-control">';
            data += '</div>';
            $('#exchangeRateServiceField').html(data);
        }else{
            $('#exchangeRateServiceField').empty();
        }
    });


    //Currency Submit
    $('#currencySubmit').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.setting.currency.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {

                console.log(data);

                let html = '';

                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if (data.error_exchange_rate_service) {
                    html = '<div class="alert alert-danger">';
                    html += '<p>' + data.error_exchange_rate_service + '</p>';
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //SMS Service - Change SMS Service
    $('#smsService').change(function() {
        var smsService = $('#smsService').val();

        if (smsService=="vonage") {
            data1 = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('API Key')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
            data1 += '<div class="col-sm-8">';
            data1 += '<input type="text" name="api_key" class="form-control">';
            data1 += '</div>';
            $('#vonageApiKeyField').html(data1);


            data2 = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('API Secret')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
            data2 += '<div class="col-sm-8">';
            data2 += '<input type="text" name="api_secret" class="form-control">';
            data2 += '</div>';
            $('#vonageApiSecretField').html(data2);

            $('#twilioAccountSidField').empty();
            $('#twilioAuthTokenField').empty();
        }
        else if (smsService=="twilio") {
            data3 = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Account SID')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
            data3 += '<div class="col-sm-8">';
            data3 += '<input type="text" name="account_sid" class="form-control">';
            data3 += '</div>';
            $('#twilioAccountSidField').html(data3);


            data4 = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Auth Token')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
            data4 += '<div class="col-sm-8">';
            data4 += '<input type="text" name="auth_token" class="form-control">';
            data4 += '</div>';
            $('#twilioAuthTokenField').html(data4);

            $('#vonageApiKeyField').empty();
            $('#vonageApiSecretField').empty();
        }else{
            $('#vonageApiKeyField').empty();
            $('#vonageApiSecretField').empty();
            $('#twilioAccountSidField').empty();
            $('#twilioAuthTokenField').empty();
        }
    });

    //SMS Submit
    $('#smsSubmit').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.setting.sms.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';

                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if (data.error_sms_service) {
                    html = '<div class="alert alert-danger">';
                    html += '<p>' + data.error_sms_service + '</p>';
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //Mail Submit
    $('#mailSubmit').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.setting.mail.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //newletter Submit
    $('#newletterSubmit').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.setting.newsletter.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //custom css/js Submit
    $('#customCssJssSubmit').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.setting.custom_css_js.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Facebook
    $('#facebookSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.facebook.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';

                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Google
    $('#googleSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.google.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //free Shipping Submit
    $('#freeShippingSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.free_shipping.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //local pickup Submit
    $('#localPickupSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.local_pickup.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //Flat Rate
    $('#flatRateSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.flat_rate.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Paypal
    $('#paypalSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.paypal.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Strip
    $('#stripSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.strip.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Paytm
    $('#paytmSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.paytm.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //Cash On Delivery
    $('#cashOnDeliverySubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.cash_on_delivery.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Bank Transfer
    $('#bankTransferSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.bank_transfer.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Check Money / Order
    $('#checkMoneyOrderSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.setting.check_money_order.store_or_update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });






    //Image Show Before Upload End
    function showImage(data, logo){
        if(data.files && data.files[0]){
            var obj = new FileReader();

            obj.onload = function(d){
                var image = document.getElementById(logo);
                image.src = d.target.result;
            }
            obj.readAsDataURL(data.files[0]);
        }
    }

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/setting/index.blade.php ENDPATH**/ ?>