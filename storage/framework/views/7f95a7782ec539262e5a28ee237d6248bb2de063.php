<div class="card">
    <h4 class="card-header"><b><?php echo e(__('Social Links')); ?></b></h4>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="socialLinkSubmit">
                    <?php echo csrf_field(); ?>

                    <!-- setting[14] => DB_ROW_ID-15: storefront_facebook_link -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Facebook</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_facebook_link" id="storefront_facebook_link" class="form-control" id="inputEmail3" placeholder="Type Facebook Link"
                            value="<?php echo e($setting[14]->plain_value); ?>">
                        </div>
                    </div>

                    <!-- setting[15] => DB_ROW_ID-16: storefront_twitter_link -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Twitter</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_twitter_link" id="storefront_twitter_link" class="form-control" id="inputEmail3" placeholder="Type Twitter Link"
                            value="<?php echo e($setting[15]->plain_value); ?>">
                        </div>
                    </div>

                    <!-- setting[16] => DB_ROW_ID-17: storefront_instagram_link -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Instagram</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_instagram_link" id="storefront_instagram_link" class="form-control" id="inputEmail3" placeholder="Type Instagram Link"
                            value="<?php echo e($setting[16]->plain_value); ?>">
                        </div>
                    </div>

                    <!-- setting[17] => DB_ROW_ID-18: storefront_youtube_link -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Youtube</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_youtube_link" id="storefront_youtube_link" class="form-control" id="inputEmail3" placeholder="Type Youtube Link"
                            value="<?php echo e($setting[17]->plain_value); ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/storefront/general_setting/social.blade.php ENDPATH**/ ?>