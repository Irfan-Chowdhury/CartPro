<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" as="style" onload="this.onload=null;this.rel='stylesheet'"></noscript>

    <link rel="preload" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="preload" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'"></noscript>

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.default.css')); ?>" id="theme-stylesheet"
          type="text/css">
    <!-- Custom stylesheet - for your changes-->
    <!-- Favicon-->
    <link rel="icon" href="<?php echo e(asset($favicon_logo_path)); ?>" />
</head>
<body>
<div class="page login-page">
    <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
            <div class="form-inner">
                <div class="logo"><span><?php echo e($setting_store->store_name ?? NULL); ?></span></div>

                <?php echo $__env->make('admin.includes.alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <form method="POST" action="<?php echo e(route('admin.login')); ?>" id="login-form">
                    <?php echo csrf_field(); ?>

                    <div class="form-group-material">
                        <input id="username" type="text" class="input-material <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="username" value="<?php echo e(old('username')); ?>" required autofocus>
                        <label for="username" class="label-material"><?php echo e(__('Username')); ?></label>

                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group-material">
                        <input id="password" type="password"
                               class="input-material <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required
                               autocomplete="current-password">
                        <label for="password" class="label-material"><?php echo e(__('Password')); ?></label>

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <br>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary btn-block">
                            <?php echo e(__('Login')); ?>

                        </button>
                    </div>
                </form>

                <?php if(env('PRODUCT_MODE') !==null && (env('PRODUCT_MODE')=='DEMO' || env('PRODUCT_MODE')=='DEVELOPER')): ?>
                    <!-- This three buttons for demo only-->
                    <button type="submit" class="btn btn-success btn-sm default admin-btn" id="admin-btn"><?php echo app('translator')->get('file.LogIn as Admin'); ?></button>
                <?php endif; ?>
                <br><br>
            </div>
            <div class="copyrights text-center">
                <p><?php echo e(__('Developed by')); ?> <a href="" class="external"><?php echo app('translator')->get('file.LionCoders'); ?></a></p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo e(asset('vendor/jquery/jquery-3.5.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>


<script type="text/javascript">

    (function($) {

        "use strict";

        $('.admin-btn').on('click', function () {
            $("input[name='username']").focus().val('admin');
            $("input[name='password']").focus().val('admin');
        });

        $('.customer-btn').on('click', function () {
            $("input[name='username']").focus().val('customer');
            $("input[name='password']").focus().val('customer');
        });
        // ------------------------------------------------------- //
        // Material Inputs
        // ------------------------------------------------------ //

        let materialInputs = $('input.input-material');

        // activate labels for prefilled values
        materialInputs.filter(function () {
            return $(this).val() !== "";
        }).siblings('.label-material').addClass('active');

        // move label on focus
        materialInputs.on('focus', function () {
            $(this).siblings('.label-material').addClass('active');
        });

        // remove/keep label on blur
        materialInputs.on('blur', function () {
            $(this).siblings('.label-material').removeClass('active');

            if ($(this).val() !== '') {
                $(this).siblings('.label-material').addClass('active');
            } else {
                $(this).siblings('.label-material').removeClass('active');
            }
        });
    })(jQuery);
</script>

</body>
</html>

<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>