
<!-- Modal -->
<div class="modal fade" id="EditFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"><?php echo e(__('Edit Tag')); ?></h5> &nbsp;&nbsp;&nbsp;&nbsp; <span id="error_message_edit"></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="updateForm"  class="form-horizontal">
          <?php echo csrf_field(); ?>
            <input type="hidden" name="tag_id" id="tagIdEdit">

            <div class="modal-body">

              <div class="form-group">
                <label><?php echo e(__('Tag Name')); ?> &nbsp; <span class="text-bold text-danger">*</span></label>
                <input type="text" name="tag_name" id="tagNameEdit"  class="form-control" placeholder="Type Tag Name">
                <small class="form-text text-muted"> <span id="errorMessge"></span></small>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="is_active" id="isActiveEdit" value="1" id="isActive">
                <label class="form-check-label" for="exampleCheck1"><?php echo e(__('Active')); ?></label>
              </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="action_button" id="submitButton" class="btn btn-primary">Update</button>
            </div>

        </form>
      </div>
    </div>
  </div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/tag/edit_form_modal.blade.php ENDPATH**/ ?>