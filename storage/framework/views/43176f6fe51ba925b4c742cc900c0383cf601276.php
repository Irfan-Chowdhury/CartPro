

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('file.Add Attribute Set')); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="submitForm"  class="form-horizontal">
          <?php echo csrf_field(); ?>

            <div class="modal-body">

              <div class="form-group">
                <label><?php echo e(__('file.Attribute Set Name')); ?></label>
                <input type="text" name="attribute_set_name" id="attributeSetName" required class="form-control" placeholder="Attribute Set Name">
                <small class="form-text text-muted"> <span id="errorMessge"></span></small>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="is_active" value="1" id="isActive">
                <label class="form-check-label" for="exampleCheck1"><?php echo e(__('file.Active')); ?></label>
              </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="action_button" id="submitButton" class="btn btn-primary"><?php echo app('translator')->get('file.Submit'); ?></button>
            </div>

        </form>
      </div>
    </div>
  </div>
<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/attribute_set/create_modal.blade.php ENDPATH**/ ?>