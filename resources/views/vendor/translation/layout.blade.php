<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href=" " />
    <title>Admin | Translations</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">


    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('public/vendor/translation/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/awesome-bootstrap-checkbox.css') }}"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/bootstrap-datepicker.min.css') }}"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/bootstrap-select.min.css') }}"
          type="text/css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('public/vendor/font-awesome/css/font-awesome.min.css') }}"
          type="text/css">
    <!-- Dripicons icon font-->
    <link rel="stylesheet" href="{{ asset('public/vendor/dripicons/webfont.css') }}" type="text/css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ asset('public/css/grasp_mobile_progress_circle-1.0.0.min.css') }}" type="text/css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}" type="text/css">
    <!-- date range stylesheet-->
    <link rel="stylesheet" href="{{ asset('public/vendor/daterange/css/daterangepicker.min.css') }}"
          type="text/css">
    <!-- dropzone css -->
    <link rel="stylesheet" href="{{ asset('public/vendor/dropzone/dropzone.css') }}" type="text/css">
    <!-- table sorter stylesheet-->

    <script type="text/javascript" src="{{ asset('public/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/jquery/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/bootstrap/js/bootstrap-select.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/vendor/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/js/charts-custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/front.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/daterange/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/daterange/js/knockout-3.4.2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/daterange/js/daterangepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <!-- dropzone js -->
    <script type="text/javascript" src="{{ asset('public/vendor/dropzone/dropzone.js') }}"></script>
    <!-- table sorter js-->
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/buttons.print.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/dataTables.select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/sum().js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/dataTables.checkboxes.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/datatable.fixedheader.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/datatable.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/datatable/datatable.responsive.boostrap.min.js') }}"></script>

    <style>
        label {color: #000000;}
        svg {width:20px;}
        #side-main-menu {display:inherit}
        #side-main-menu li, .nav-menu li {padding-left:0;padding-right:0;}
        .menu-btn {display:block};
    </style>
  </head>

  <body onload="myFunction()">
    <div id="loader"></div>


        @include('admin.includes.header')

        @include('admin.includes.sidebar')


        <div class="page">
            <div id="app">
                @yield('body')
            </div>
        </div>

    <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <p>&copy;  | {{trans('file.Developed')}} {{trans('file.By')}} <a href="https://lion-coders.com" class="external">LionCoders</a></p>
            </div>
          </div>
        </div>
    </footer>


    <link rel="stylesheet" type="text/css"
          href="{{ asset('public/vendor/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('public/vendor/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('public/vendor/datatable/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('public/vendor/datatable/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('public/vendor/datatable/datatables.flexheader.boostrap.min.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('public/vendor/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('public/vendor/RangeSlider/ion.rangeSlider.min.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('public/vendor/datatable/datatable.responsive.boostrap.min.css') }}">

          <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('public/css/style.default.css') }}" id="theme-stylesheet"
          type="text/css">
          {{-- <link rel="stylesheet" href="{{ asset('public/vendor/translation/css/main.css') }}"> --}}

    <script src="{{ asset('public/vendor/translation/js/app.js') }}"></script>

    <script type="text/javascript">
      if ($(window).outerWidth() > 1199) {
          $('nav.side-navbar').removeClass('shrink');
      }
      function myFunction() {
          setTimeout(showPage, 150);
      }
      function showPage() {
        document.getElementById("loader").style.display = "none";
        // document.getElementById("content").style.display = "block";
      }

      $("div.alert").delay(3000).slideUp(750);

      $('.selectpicker').selectpicker({
          style: 'btn-link',
      });
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
});
    </script>
  </body>
</html>
