<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo app('translator')->get('file.Add Brand'); ?></h5>
                <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                
                <form method="post" id="submitForm" class="form-horizontal" action="<?php echo e(route('admin.brand.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="text-bold"><?php echo app('translator')->get('file.Brand Name'); ?></label>
                            <input type="text" name="brand_name" id="brand_name" required class="form-control" placeholder="<?php echo e(__('Brand Name')); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="text-bold"><?php echo app('translator')->get('file.Brand Logo'); ?></label>
                            <input type="file" class="form-control-file" id="brand_logo" name="brand_logo">
                          </div>
                        <div class="col-md-4 form-group">
                            <label><b><?php echo app('translator')->get('Status'); ?></b></label>
                            <div class="col-md-8 form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="isActive" id="default" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Active</label>
                            </div>
                        </div>
                          <div class="col form-group" align="center">
                            <input type="hidden" name="action" id="action"/>
                            <input type="hidden" name="hidden_id" id="hidden_id"/>
                            
                            <input type="submit" name="action_button" id="submitButton" class="btn btn-warning" value=<?php echo e(trans('file.Add')); ?>>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/brand/create.blade.php ENDPATH**/ ?>