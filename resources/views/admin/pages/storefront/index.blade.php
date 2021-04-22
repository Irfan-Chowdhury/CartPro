@extends('admin.main')
@section('admin_content')

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
                <a class="list-group-item list-group-item-action" id="logo-settings-logo" data-toggle="list" href="#logo" role="tab" aria-controls="profile">Logo</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Footer</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Newsletter</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Features</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Product Page</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Social Links</a>
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">

                    <!-- general -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-settings-general">
                        @include('admin.pages.storefront.general_setting.general')
                    </div>

                    <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-settings-logo">
                        <div class="card">
                            <div class="card-body">
                                <p>Cupidatat quis ad sint excepteur laborum in esse qui. Et excepteur consectetur ex nisi eu do cillum ad laborum. Mollit et eu officia dolore sunt Lorem culpa qui commodo velit ex amet id ex. Officia anim incididunt laboris deserunt anim aute dolor incididunt veniam aute dolore do exercitation. Dolor nisi culpa ex ad irure in elit eu dolore. Ad laboris ipsum reprehenderit irure non commodo enim culpa commodo veniam incididunt veniam ad.</p>
                            </div>
                        </div>
                    </div>

                    <!-- menus -->
                    <div class="tab-pane fade" id="menus" role="tabpanel" aria-labelledby="menus-settings-menus">
                        @include('admin.pages.storefront.general_setting.menu')
                    </div>

                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <div class="card">
                            <div class="card-body">
                                <p>Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod eu pariatur culpa mollit in irure.</p>
                            </div>
                        </div>
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
</script>


@endsection
