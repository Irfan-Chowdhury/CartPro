<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="icon" href="{{asset($favicon_logo_path)}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bug Fixed</title>
  </head>
  <body>

    <!-- Old Version -->
    <section id="noBug" class="d-none container mt-5 text-center">
        <div class="mt-3 mb-3" id="errorMessage"></div>
        <div class="card">
            <div class="card-body">
                <h4 class="text-center text-info">Your current version is <span>{{env('VERSION')}}</span></h4>
                <p>There is no bug</p>
            </div>
        </div>
    </section>


    <!-- For New Version -->
    <section id="bugSection" class="d-none container mt-5 text-center">
        <div class="mt-3 mb-3" id="errorMessage"></div>
        <div class="card">
            <div class="card-body">
                <h4 class="text-center text-success">Minor bugs found. Please update it</h4>
                <p>Before updating, we highly recomended you to keep a backup of your current script and database.</p>
            </div>
        </div>

        <div id="changeLog" class="d-none card mt-3">
            <div class="card-body">
                <h6 class="text-left p-4">New Change Log</h6>
                <ul class="list-group text-left" id="logUL">
                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3 mb-3">
            <div id="spinner" class="d-none spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <button id="update" type="button" class="mt-5 mb-5 btn btn-primary btn-lg">Update</button>
    </section>



    <!-- Optional JavaScript -->
    <script type="text/javascript" src="{{ asset('public/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>
        let clientCurrrentVersion = {!! json_encode(env("VERSION"))  !!};
        let clientCurrrentBugNo   = {!! json_encode(env("BUG_NO"))  !!};
    </script>
    <script type="text/javascript" src="{{asset('public/js/admin/bug_update/index.js')}}"></script>


    <script type="text/javascript">

    </script>
  </body>
</html>
