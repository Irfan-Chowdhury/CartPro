

<!-- Modal -->
<div class="modal fade" id="editFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('file.Add Attribute Set')); ?></h5>&nbsp;&nbsp;&nbsp;&nbsp; <span id="error_message_edit"></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="updateForm"  class="form-horizontal">
          <?php echo csrf_field(); ?>

            <input type="hidden" name="attribute_set_id" id="AttributeSetIdEdit">
            <div class="modal-body">

              <div class="form-group">
                <label><?php echo e(__('file.Attribute Set Name')); ?></label>
                <input type="text" name="attribute_set_name" id="attributeSetNameEdit" required class="form-control" placeholder="Attribute Set Name">
                <small class="form-text text-muted"> <span id="errorMessge"></span></small>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="is_active" value="1" id="isActiveEdit">
                <label class="form-check-label" for="exampleCheck1"><?php echo e(__('file.Active')); ?></label>
              </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="action_button" id="submitButton" class="btn btn-primary"><?php echo app('translator')->get('file.Update'); ?></button>
            </div>

        </form>
      </div>
    </div>
  </div>
<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/attribute_set/edit_modal.blade.php ENDPATH**/ ?>