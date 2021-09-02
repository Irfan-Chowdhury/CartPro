
<?php if(session()->has('message')): ?>  
    <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible fade show text-center" role="alert">
        <strong><?php echo e(session('message')); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cartpro_google_analytics\resources\views/admin/includes/alert_message.blade.php ENDPATH**/ ?>