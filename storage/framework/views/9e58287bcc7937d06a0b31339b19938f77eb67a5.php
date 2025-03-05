<div id="bulkConfirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"><?php echo e(trans('file.Confirmation')); ?></h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-footer">
                <button type="button" id="active" class="btn btn-success text-center"><?php echo app('translator')->get('file.Active'); ?></button>
                <button type="button" id="inactive" class="btn btn-warning text-center"><?php echo app('translator')->get('file.Inactive'); ?></button>
                <button type="button" id="bulkDelete" class="btn btn-danger text-center"><?php echo app('translator')->get('file.Delete'); ?></button>
            </div>
        </div>
    </div>
  </div>
<?php /**PATH /var/www/html/cartpro/cartproshop_v2/resources/views/lte/admin/includes/confirm_modal.blade.php ENDPATH**/ ?>