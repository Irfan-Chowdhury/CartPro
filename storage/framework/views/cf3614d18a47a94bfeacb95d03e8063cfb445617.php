<!--Edit Modal -->
<div class="modal fade" id="EditformModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel"><b>Edit Tax</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="alertMessageEdit" role="alert"></div>

        <div class="modal-body">
            <form method="POST" id="updateForm" action="<?php echo e(route('admin.tax.update')); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="tax_id" id="tax_id">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Tax Class &nbsp;<span class="text-danger">*</span></b></label>
                            <input type="text" class="col-md-8 form-control" name="tax_class" id="tax_class" placeholder="Type tax class">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Based On &nbsp;<span class="text-danger">*</span></b></label>
                            <select name="based_on" id="based_on" class="col-md-8 form-control selectpicker">
                                <option value=""><?php echo e(__('-- Select Type --')); ?></option>
                                <option value="shipping_address">Shipping Address</option>
                                <option value="billing_address">Billing Address</option>
                                <option value="store_address">Store address</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Tax Name &nbsp;<span class="text-danger">*</span></b></label>
                            <input type="text" class="col-md-8 form-control" name="tax_name" id="tax_name" placeholder="Type tax name">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Country &nbsp;<span class="text-danger">*</span></b></label>
                            <select name="country" id="country" class="col-md-8 form-control selectpicker" data-live-search="true" title='<?php echo e(__('Select Conutry')); ?>'>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country_name); ?>"><?php echo e($country->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>State</b></label>
                            <input type="text" class="col-md-8 form-control" name="state" id="state" placeholder="Type state">
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>City</b></label>
                            <input type="text" class="col-md-8 form-control" name="city" id="city" placeholder="Type city">
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Zip</b></label>
                            <input type="text" class="col-md-8 form-control" name="zip" id="zip" placeholder="Type Zip">
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Rate</b></label>
                            <input type="text" class="col-md-8 form-control" name="rate" id="rate" placeholder="Type rate">
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

                <div class="row mb-5">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <div id="alertMessageBox">
                            <div id="alertMessage" class="text-light"></div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary" id="save-button">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </form>
        </div>
      </div>
    </div>
  </div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/tax/edit_modal.blade.php ENDPATH**/ ?>