<?php $__env->startSection('admin_content'); ?>
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">
    </div>

    <h1><?php echo app('translator')->get('file.Edit Attribute Set'); ?></h1>
    <br>

    <form method="post"  class="form-horizontal" action="<?php echo e(route('admin.attribute_set.update',$attributeSet->id)); ?>">
        <?php echo csrf_field(); ?>

            <input type="hidden" name="attribute_set_id" value="<?php echo e($attributeSet->id); ?>">

            <div class="modal-body">

                <div class="form-group">
                    <label><?php echo e(__('file.Attribute Set Name')); ?></label>
                    <input type="text" name="attribute_set_name" id="attributeSetName" required class="form-control" <?php if(isset($attributeSetTranslation->attribute_set_name)): ?> value="<?php echo e($attributeSetTranslation->attribute_set_name); ?>" <?php else: ?> placeholder="Attribute Set Name" <?php endif; ?>>
                    <small class="form-text text-muted"> <span id="errorMessge"></span></small>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="is_active" value="1" <?php if($attributeSet->is_active==1): ?> checked <?php endif; ?> id="isActive">
                    <label class="form-check-label" for="exampleCheck1"><?php echo e(__('file.Active')); ?></label>
                  </div>

                <div class="row p-2">
                    <button type="submit" name="action_button" id="submitButton" class="btn btn-primary"><?php echo app('translator')->get('file.Update'); ?></button>
                </div>
            </div>
    </form>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/attribute_set/edit.blade.php ENDPATH**/ ?>