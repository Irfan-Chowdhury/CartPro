<?php $__env->startSection('title','404 | Page Not Found'); ?>

<?php $__env->startSection('frontend_content'); ?>


<section class="error-section mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="error-icon">
                    <i class="ion-sad-outline"></i>
                </div>
            </div>
            <div class="col-md-6 offset-md-3  error-text text-center">
                <i class="las la-binoculars"style="color:var(--theme-color);font-size: 90px;margin-bottom:30px"></i>
                <h2 class="h1"><?php echo app('translator')->get('file.Oh snap! We are lost...'); ?></h2>
                <p class="lead"><?php echo app('translator')->get('file.It seems we can not find what you are looking for. Perhaps searching can help or go back to'); ?>
                <br><br>
                <a class="button style1" href="<?php echo e(route('cartpro.home')); ?>"><?php echo app('translator')->get('file.Home'); ?></a> </p>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cartpro/cartproshop_v2/resources/views/errors/404.blade.php ENDPATH**/ ?>