<?php $__env->startSection('admin_content'); ?>

<div class="container-fluid"><span id="alert_message"></span></div>
<div class="container-fluid mb-3">

    <div class="d-flex">
        <div class="p-2">
            <h2 class="font-weight-bold mt-3">Storefront</h2>
        </div>
        <div class="ml-auto p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Storefront</li>
                </ol>
            </nav>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="general-settings-general" data-toggle="list" href="#general" role="tab" aria-controls="home">General</a>
                <a class="list-group-item list-group-item-action" id="menus-settings-menus" data-toggle="list" href="#menus" role="tab" aria-controls="messages">Menus</a>
                <a class="list-group-item list-group-item-action" id="logo-settings-logo" data-toggle="list" href="#logo" role="tab" aria-controls="profile">Logo</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Footer</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Newsletter</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Features</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Product Page</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Social Links</a>
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-settings-general">
                        <div class="card">
                            <h4 class="card-header"><b>General</b></h4>
                            <hr>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <form id="generalSubmit">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Welcome Text</b></label>
                                                <div class="col-sm-8">
                                                    <!-- setting[0] => DB_ROW_ID-1: storefront_welcome_text -->
                                                    <input type="text" name="storefront_welcome_text" id="storefront_welcome_text" class="form-control" id="inputEmail3" placeholder="Type Text"
                                                    <?php $__empty_1 = true; $__currentLoopData = $setting[0]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if($item->locale==$locale): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php elseif($item->locale=='en'): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?> >
                                                </div>
                                            </div>

                                            <!-- setting[1] => DB_ROW_ID-2: storefront_theme_color -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Theme Color</b></label>
                                                <div class="col-sm-8">
                                                    <select name="storefront_theme_color" id="storefront_theme_color" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Color')); ?>'>
                                                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($colors[$key]['color_name']); ?>" <?php echo e($colors[$key]['color_name'] == $setting[1]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($colors[$key]['color_name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- setting[2] => DB_ROW_ID-3: storefront_mail_theme_color -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Mail Theme Color</b></label>
                                                <div class="col-sm-8">
                                                    <select name="storefront_mail_theme_color" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Color')); ?>'>
                                                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($colors[$key]['color_name']); ?>" <?php echo e($colors[$key]['color_name'] == $setting[2]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($colors[$key]['color_name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Slider</b> <span class="text-danger"><i>(Incomplete)</i></span></label>
                                                <div class="col-sm-8">
                                                    <select name="slider_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Slider')); ?>'>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- setting[4] => DB_ROW_ID-5: storefront_terms_and_condition_page -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Terms & Condition</b></label>
                                                <div class="col-sm-8">
                                                    <select name="storefront_terms_and_condition_page" id="storefront_terms_and_condition_page" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Terms & Condition')); ?>'>
                                                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__empty_1 = true; $__currentLoopData = $item->pageTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <?php if($value->locale==$locale): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[4]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->page_name); ?></option> <?php break; ?>
                                                                <?php elseif($value->locale=='en'): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[4]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->page_name); ?></option> <?php break; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- setting[5] => DB_ROW_ID-6: storefront_privacy_policy_page -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Privacy Policy Page</b></label>
                                                <div class="col-sm-8">
                                                    <select name="storefront_privacy_policy_page" id="storefront_privacy_policy_page" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Footer Menu')); ?>'>
                                                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__empty_1 = true; $__currentLoopData = $item->pageTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <?php if($value->locale==$locale): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[5]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->page_name); ?></option> <?php break; ?>
                                                                <?php elseif($value->locale=='en'): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[5]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->page_name); ?></option> <?php break; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- setting[6] => DB_ROW_ID-7: storefront_address -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Address</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="storefront_address" id="storefront_address" class="form-control" placeholder="Type Address"
                                                    <?php $__empty_1 = true; $__currentLoopData = $setting[6]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if($item->locale==$locale): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php elseif($item->locale=='en'): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?> >
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
                    </div>

                    <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-settings-logo">
                        <div class="card">
                            <div class="card-body">
                                <p>Cupidatat quis ad sint excepteur laborum in esse qui. Et excepteur consectetur ex nisi eu do cillum ad laborum. Mollit et eu officia dolore sunt Lorem culpa qui commodo velit ex amet id ex. Officia anim incididunt laboris deserunt anim aute dolor incididunt veniam aute dolore do exercitation. Dolor nisi culpa ex ad irure in elit eu dolore. Ad laboris ipsum reprehenderit irure non commodo enim culpa commodo veniam incididunt veniam ad.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="menus" role="tabpanel" aria-labelledby="menus-settings-menus">
                        <div class="card">
                            <h4 class="card-header"><b>Menus</b></h4>
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="<?php echo e(route('admin.storefront.menu.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Navbar Text</b></label>
                                                <div class="col-sm-8">
                                                    
                                                    <input type="text" name="navbar_text" id="navbarText" class="form-control" id="inputEmail3"  placeholder="Type Text" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Primary Menu</b></label>
                                                <div class="col-sm-8">
                                                    <select name="primary_menu_id" id="primaryMenuId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Primary Menu')); ?>'>
                                                        <option value="">Select Primary Menu</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category Menu</b></label>
                                                <div class="col-sm-8">
                                                    <select name="category_menu_id" id="categoryMenuId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category Menu')); ?>'>
                                                        <option value="">Select Category Menu</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Title One</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="footer_menu_title_one" id="footerMenuTitleOne"  placeholder="Type Footer Menu Title">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu One</b></label>
                                                <div class="col-sm-8">
                                                    <select name="footer_menu_one_id" id="footerMenuOneId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Footer Menu')); ?>'>
                                                        <option value="">Select Footer Menu</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Title Two</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="footer_menu_title_two" id="footerMenuTitleTwo" class="form-control"  placeholder="Type Footer Menu Title">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Two</b></label>
                                                <div class="col-sm-8">
                                                    <select name="footer_menu_two_id" id="footerMenuTwoId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Footer Menu')); ?>'>
                                                        <option value="">Select Footer Menu</option>
                                                        
                                                    </select>
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
                                    <div class="col-md-4"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <div class="card">
                            <div class="card-body">
                                <p>Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod eu pariatur culpa mollit in irure.</p>
                            </div>
                        </div>
                    </div>

              </div>
            </div>
          </div>
    </div>
</div>


<script type="text/javascript">
    //----------Insert Data----------------------

    $('#generalSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.storefront.general.store')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#error_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/storefront/index.blade.php ENDPATH**/ ?>