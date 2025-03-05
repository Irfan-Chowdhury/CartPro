<!-- Same for all features -->
<?php if(isset($all) && $all): ?>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/submit_button_click.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/store.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/update_button_click.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/update.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/active.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/inactive.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/delete.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/bulk_action.js')); ?>"></script>
<?php endif; ?>



<!-- If Specific -->
<?php if(isset($store) && $store): ?>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/submit_button_click.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/store.js')); ?>"></script>
<?php endif; ?>


<?php if(isset($update) && $update): ?>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/update_button_click.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/update.js')); ?>"></script>
<?php endif; ?>

<?php if(isset($delete) && $delete): ?>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/delete.js')); ?>"></script>
<?php endif; ?>


<?php if(isset($action) && $action): ?>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/active.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/inactive.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/delete.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/includes/bulk_action.js')); ?>"></script>
<?php endif; ?>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/includes/common_action.blade.php ENDPATH**/ ?>