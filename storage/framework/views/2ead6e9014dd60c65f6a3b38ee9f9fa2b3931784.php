<?php $__env->startSection('admin_content'); ?>
    <?php echo Menu::render($menuId); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo Menu::scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cartpro\resources\views/admin/pages/menu/menu_item/index.blade.php ENDPATH**/ ?>