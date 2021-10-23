<?php
//   $favicon_logo_path = 'public/images/empty.jpg';
//   foreach ($storefront_images as $key => $item) {
//       if ($item->title=='favicon_logo'){
//           $favicon_logo_path = 'public'.$item->image;
//       }
//   }
    Illuminate\Support\Facades\App::setLocale(Session::get('currentLocal'));

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>CartPro Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="UTF-8">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/bootstrap/css/bootstrap.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/bootstrap/css/awesome-bootstrap-checkbox.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/bootstrap/css/bootstrap-datepicker.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/bootstrap/css/bootstrap-select.min.css')); ?>" type="text/css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/font-awesome/css/font-awesome.min.css')); ?>" type="text/css">
    <!-- Dripicons icon font-->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/dripicons/webfont.css')); ?>" type="text/css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/grasp_mobile_progress_circle-1.0.0.min.css')); ?>" type="text/css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')); ?>" type="text/css">
    <!-- date range stylesheet-->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/daterange/css/daterangepicker.min.css')); ?>" type="text/css">
    <!-- dropzone css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/dropzone/dropzone.css')); ?>" type="text/css">
    <!-- table sorter stylesheet-->

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/vendor/datatable/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/vendor/datatable/buttons.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/vendor/datatable/select.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/vendor/datatable/dataTables.checkboxes.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/vendor/datatable/datatables.flexheader.boostrap.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/vendor/select2/dist/css/select2.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/vendor/RangeSlider/ion.rangeSlider.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/vendor/datatable/datatable.responsive.boostrap.min.css')); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/style.default.css')); ?>" id="theme-stylesheet" type="text/css">



    <script type="text/javascript" src="<?php echo e(asset('public/vendor/jquery/jquery-3.5.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/jquery/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/jquery/bootstrap-datepicker.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('public/vendor/popper.js/umd/popper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/bootstrap/js/bootstrap-select.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('public/js/grasp_mobile_progress_circle-1.0.0.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('public/vendor/chart.js/Chart.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/jquery-validation/jquery.validate.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/js/charts-custom.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/js/front.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/daterange/js/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/daterange/js/knockout-3.4.2.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/daterange/js/daterangepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>

    <!-- dropzone js -->
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/dropzone/dropzone.js')); ?>"></script>
    <!-- table sorter js-->
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/pdfmake.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/dataTables.bootstrap4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/dataTables.buttons.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/buttons.bootstrap4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/buttons.colVis.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/buttons.html5.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/buttons.print.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/dataTables.select.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/sum().js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/dataTables.checkboxes.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/datatable.fixedheader.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/datatable.responsive.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/select2/dist/js/select2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/datatable/datatable.responsive.boostrap.min.js')); ?>"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZZBZQHXN8Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-ZZBZQHXN8Q');
    </script>

    <style>
        label{
                color: #000000;
        }
    </style>
  </head>

  <body onload="myFunction()">
    <div id="loader"></div>


        


        <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


      <div style="" id="content" class="animate-bottom">
        <div class="page">
        
        
        <?php echo $__env->yieldContent('admin_content'); ?>
      </div>
    </div>
    <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <p>&copy;  | <?php echo e(trans('file.Developed')); ?> <?php echo e(trans('file.By')); ?> <a href="https://lion-coders.com" class="external">LionCoders</a></p>
            </div>
          </div>
        </div>
    </footer>


    <?php echo $__env->yieldContent('scripts'); ?>


    <script type="text/javascript">
        if ($(window).outerWidth() > 1199) {
            $('nav.side-navbar').removeClass('shrink');
        }
        function myFunction() {
            setTimeout(showPage, 150);
        }
        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("content").style.display = "block";
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

    <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>
</html>
<?php /**PATH D:\laragon\www\cartpro\resources\views/admin/main.blade.php ENDPATH**/ ?>