@extends('admin.main')
@section('admin_content')

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

        <div id="accordion">

            <!-- General Settings  -->
            <div class="card mb-0">
                <div class="card-header" id="generalSettings">
                    <div class="btn" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="text-bold"><i class="fa fa-angle-right"></i> General Setting</h5>
                    </div>
                </div>
                <div id="collapse1" class="collapse show" aria-labelledby="generalSettings" data-parent="#accordion">
                    <div class="card-body">
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
                </div>
            </div>

             <!-- Home Page Sections  -->
             <div class="card">
                <div class="card-header" id="homePageSections">
                    <div class="btn" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="text-bold"><i class="fa fa-angle-right"></i> Home Page Sections</h5>
                    </div>
                </div>

                <div id="collapse2" class="collapse" aria-labelledby="homePageSections" data-parent="#accordion">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="general-settings-general" data-toggle="list" href="#general" role="tab" aria-controls="home">Slider Banners</a>
                            <a class="list-group-item list-group-item-action" id="menus-settings-menus" data-toggle="list" href="#menus" role="tab" aria-controls="messages">Three Column Full Width Banners</a>
                            <a class="list-group-item list-group-item-action" id="social-settings-social" data-toggle="list" href="#social_settings" role="tab" aria-controls="social">Featured Categories</a>
                            <a class="list-group-item list-group-item-action" id="feature-settings-feature" data-toggle="list" href="#feature" role="tab" aria-controls="settings">Product Tabs One</a>
                            <a class="list-group-item list-group-item-action" id="logo-settings-logo" data-toggle="list" href="#logo" role="tab" aria-controls="profile">Top Brands</a>
                            <a class="list-group-item list-group-item-action" id="footer-settings-footer" data-toggle="list" href="#footer" role="tab" aria-controls="footer">Flash Sale and Verticle Products</a>
                            <a class="list-group-item list-group-item-action" id="newsletter-settings-newsletter" data-toggle="list" href="#newsletter" role="tab" aria-controls="newsletter">Two Column Banners</a>
                            <a class="list-group-item list-group-item-action" id="product_page-settings-product_page" data-toggle="list" href="#product_page" role="tab" aria-controls="settings">Product Grid</a>
                            <a class="list-group-item list-group-item-action" id="product_page-settings-product_page" data-toggle="list" href="#product_page" role="tab" aria-controls="settings">Three Column Banners</a>
                            <a class="list-group-item list-group-item-action" id="product_page-settings-product_page" data-toggle="list" href="#product_page" role="tab" aria-controls="settings">Product Tabs Two</a>
                            <a class="list-group-item list-group-item-action" id="product_page-settings-product_page" data-toggle="list" href="#product_page" role="tab" aria-controls="settings">One Column Banners</a>
                        </div>
                    </div>
                </div>

             </div>
        </div>


            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">

                    <!-- general -->
                    <!-- setting[0-12] => DB_ROW_ID-[1-13]: -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-settings-general">
                        @include('admin.pages.storefront.general_setting.general')
                    </div>


                    <!-- menus -->
                    <!-- setting[7-13] => DB_ROW_ID-[8-14]: -->
                    <div class="tab-pane fade" id="menus" role="tabpanel" aria-labelledby="menus-settings-menus">
                        @include('admin.pages.storefront.general_setting.menu')
                    </div>


                    <!-- Social Link -->
                    <!-- setting[14-17] => DB_ROW_ID-[15-18]: -->
                    <div class="tab-pane fade" aria-labelledby="social-settings-social" id="social_settings" role="tabpanel">
                        @include('admin.pages.storefront.general_setting.social')
                    </div>


                    <!-- Feature -->
                    <!-- setting[18-33] => DB_ROW_ID-[19-34]: -->
                    <div class="tab-pane fade" aria-labelledby="feature-settings-feature" id="feature" role="tabpanel">
                        @include('admin.pages.storefront.general_setting.feature')
                    </div>


                    <!-- Logo -->
                    <!-- DB_ROW_ID-[35-] => setting[34-] -->
                    <div class="tab-pane fade" aria-labelledby="logo-settings-logo" id="logo" role="tabpanel">
                        @include('admin.pages.storefront.general_setting.logo')
                    </div>


                    <!-- Footer -->
                    <!-- DB_ROW_ID-[35-37] => setting[34-36] -->
                    <div class="tab-pane fade" aria-labelledby="footer-settings-footer" id="footer" >
                        @include('admin.pages.storefront.general_setting.footer')
                    </div>


                    <!-- Newslater -->
                    <!-- DB_ROW_ID-[38] => setting[37] -->
                    <div class="tab-pane fade" aria-labelledby="newsletter-settings-newsletter" id="newsletter" >
                        @include('admin.pages.storefront.general_setting.newsletter')
                    </div>


                    <!-- Product Page -->
                    <!-- DB_ROW_ID-[39-41] => setting[38-40] -->
                    <div class="tab-pane fade" aria-labelledby="product_page-settings-product_page" id="product_page" >
                        @include('admin.pages.storefront.general_setting.product_page')
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
            url: "{{route('admin.storefront.general.store')}}",
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
            url: "{{route('admin.storefront.menu.store')}}",
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
            url: "{{route('admin.storefront.social_link.store')}}",
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
            url: "{{route('admin.storefront.feature.store')}}",
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
            url: "{{route('admin.storefront.logo.store')}}",
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

    //Footer
    $('#footerSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('admin.storefront.footer.store')}}",
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


    //Newsletter
    $('#newsletterSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('admin.storefront.newletter.store')}}",
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


    //Product Page
    $('#productPageSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('admin.storefront.product_page.store')}}",
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


@endsection
