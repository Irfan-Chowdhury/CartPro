<?php $__env->startSection('title','500 | Server Error'); ?>

<?php $__env->startSection('frontend_content'); ?>


<section class="error-section mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="error-icon">
                    <i class="ion-sad-outline"></i>
                </div>
            </div>
            <div class="col-md-8 offset-md-2  error-text text-center">
                <i class="las la-heart-broken" style="color:var(--theme-color);font-size: 90px;margin-bottom:30px"></i>
                <h2 class="h1"><?php echo app('translator')->get('file.Uh oh server just snapped!'); ?></h2>
                <p class="lead"><?php echo app('translator')->get('file.An error occured due to server not being to able to handle your request.'); ?></p>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/errors/500.blade.php ENDPATH**/ ?>