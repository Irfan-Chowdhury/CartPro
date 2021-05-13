<?php $__env->startSection('admin_content'); ?>

<div class="container-fluid"><span id="alert_message"></span></div>
<div class="container-fluid mb-3">

    <div class="d-flex">
        <div class="p-2">
            <h2 class="font-weight-bold mt-3">Storefront</h2>
        </div>
        <div class="ml-auto p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Storefront</li>
                </ol>
            </nav>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="general-settings-general" data-toggle="list" href="#general" role="tab" aria-controls="home">General</a>
                <a class="list-group-item list-group-item-action" id="menus-settings-menus" data-toggle="list" href="#menus" role="tab" aria-controls="messages">Menus</a>
                <a class="list-group-item list-group-item-action" id="social-settings-social" data-toggle="list" href="#social_settings" role="tab" aria-controls="social">Social Links</a>
                <a class="list-group-item list-group-item-action" id="feature-settings-feature" data-toggle="list" href="#feature" role="tab" aria-controls="settings">Features</a>
                <a class="list-group-item list-group-item-action" id="logo-settings-logo" data-toggle="list" href="#logo" role="tab" aria-controls="profile">Logo</a>
                <a class="list-group-item list-group-item-action" id="footer-settings-footer" data-toggle="list" href="#footer" role="tab" aria-controls="footer">Footer</a>
                <a class="list-group-item list-group-item-action" id="newsletter-settings-newsletter" data-toggle="list" href="#newsletter" role="tab" aria-controls="newsletter">Newsletter</a>
                <a class="list-group-item list-group-item-action" id="product_page-settings-product_page" data-toggle="list" href="#product_page" role="tab" aria-controls="settings">Product Page</a>
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">

                    <!-- general -->
                    <!-- setting[0-12] => DB_ROW_ID-[1-13]: -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-settings-general">
                        <?php echo $__env->make('admin.pages.storefront.general_setting.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <!-- menus -->
                    <!-- setting[7-13] => DB_ROW_ID-[8-14]: -->
                    <div class="tab-pane fade" id="menus" role="tabpanel" aria-labelledby="menus-settings-menus">
                        <?php echo $__env->make('admin.pages.storefront.general_setting.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <!-- Social Link -->
                    <!-- setting[14-17] => DB_ROW_ID-[15-18]: -->
                    <div class="tab-pane fade" aria-labelledby="social-settings-social" id="social_settings" role="tabpanel">
                        <?php echo $__env->make('admin.pages.storefront.general_setting.social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <!-- Feature -->
                    <!-- setting[18-33] => DB_ROW_ID-[19-34]: -->
                    <div class="tab-pane fade" aria-labelledby="feature-settings-feature" id="feature" role="tabpanel">
                        <?php echo $__env->make('admin.pages.storefront.general_setting.feature', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <!-- Logo -->
                    <!-- DB_ROW_ID-[35-] => setting[34-] -->
                    <div class="tab-pane fade" aria-labelledby="logo-settings-logo" id="logo" role="tabpanel">
                        <?php echo $__env->make('admin.pages.storefront.general_setting.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <!-- Footer -->
                    <div class="tab-pane fade" aria-labelledby="footer-settings-footer" id="footer" >
                        <?php echo $__env->make('admin.pages.storefront.general_setting.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <!-- Newslater -->
                    <div class="tab-pane fade" aria-labelledby="newsletter-settings-newsletter" id="newsletter" >
                        <?php echo $__env->make('admin.pages.storefront.general_setting.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <!-- Product Page -->
                    <div class="tab-pane fade" aria-labelledby="product_page-settings-product_page" id="product_page" >
                        <?php echo $__env->make('admin.pages.storefront.general_setting.product_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            url: "<?php echo e(route('admin.storefront.general.store')); ?>",
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
                    $('#error_message').html(html);
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

    //Menus
    $('#menuSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.storefront.menu.store')); ?>",
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
                    $('#error_message').html(html);
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

    //Social Links
    $('#socialLinkSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.storefront.social_link.store')); ?>",
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
                    $('#error_message').html(html);
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

    //Features
    $('#featureSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.storefront.feature.store')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
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


    //Logo
    $('#logoSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.storefront.logo.store')); ?>",
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
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                else if(data.success){
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                }
                $('#alert_message').fadeIn("slow"); //Check in top in this blade
                $('#alert_message').html(html);
                setTimeout(function() {
                    $('#alert_message').fadeOut("slow");
                }, 3000);
            }
        });
    });

    //Image Show Before Upload Start
    // $(document).ready(function(){
    //     $('input[type="file"]').change(function(e){
    //         var fileName = e.target.files[0].name;
    //         if (fileName){
    //             $('#fileLabel').html(fileName);
    //         }
    //     });
    // });

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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Running_File\cartpro\resources\views/admin/pages/storefront/index.blade.php ENDPATH**/ ?>