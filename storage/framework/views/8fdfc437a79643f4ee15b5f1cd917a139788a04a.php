
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"><?php echo e(__('Add Role')); ?></h5> &nbsp;&nbsp;&nbsp;&nbsp; <span id="error_message"></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="submitForm" action="<?php echo e(route('admin.role.store')); ?>"  class="form-horizontal">
          <?php echo csrf_field(); ?>

            <div class="modal-body">

              <div class="form-group">
                <label><?php echo e(__('Role Name')); ?> &nbsp; <span class="text-bold text-danger">*</span></label>
                <input type="text" name="role_name" id="roleName" class="form-control" placeholder="Type Tag Name" >
                <small class="form-text text-muted"> <span id="errorMessge"></span></small>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="is_active" id="isActive" value="1" id="isActive">
                <label class="form-check-label" for="exampleCheck1"><?php echo e(__('Active')); ?></label>
              </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="action_button" id="submitButton" class="btn btn-primary">Submit</button>
            </div>

        </form>
      </div>
    </div>
  </div>
<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/role/create_modal.blade.php ENDPATH**/ ?>