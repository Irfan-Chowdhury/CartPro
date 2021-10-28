
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"><?php echo e(__('file.Edit Review')); ?></h5> &nbsp;&nbsp;&nbsp;&nbsp; <span id="error_message_edit"></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="updateForm"  class="form-horizontal">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="review_id" id="reviewId">

            <div class="modal-body">

              <div class="form-group">
                <label class="text-bold"><?php echo e(__('file.Rating')); ?> &nbsp; <span class="text-danger">*</span></label>
                <select name="rating" id="rating" class="from-control selectpicker">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
              </div>

              <div class="form-group">
                <label for="inputEmail3"><b><?php echo e(__('file.Comment')); ?> <span class="text-danger">*</span></b></label>
                <textarea name="comment" id="comment" class="form-control text-editor"></textarea>
            </div>

            <br>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="status" id="status" value="approved">
                <label class="form-check-label text-bold" for="exampleCheck1"><?php echo e(__('file.Approved')); ?></label>
              </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="action_button" id="submitButton" class="btn btn-primary">Submit</button>
            </div>

        </form>
      </div>
    </div>
  </div>
<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/review/edit_modal.blade.php ENDPATH**/ ?>