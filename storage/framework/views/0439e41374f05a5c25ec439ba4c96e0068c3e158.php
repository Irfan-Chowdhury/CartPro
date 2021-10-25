<!--Create Modal -->
<div class="modal fade" id="createModalForm" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel"><b>Add New Menu</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="submitForm" action="<?php echo e(route('admin.menu.store')); ?>">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Menu Name &nbsp;<span class="text-danger">*</span></b></label>
                            <input type="text" class="col-md-8 form-control" name="menu_name" id="menu_name" placeholder="Type Menu Name">
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Status</b></label>
                            <div class="col-md-8 form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Enable the slide</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>

                <button type="submit" id="save-button" class="btn btn-primary">Save</button>
            </form>
        </div>
        

      </div>
    </div>
  </div>
<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/menu/create_modal.blade.php ENDPATH**/ ?>