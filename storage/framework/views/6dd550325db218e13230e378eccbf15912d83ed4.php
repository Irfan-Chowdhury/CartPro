<div class="card">
    <h3 class="card-header"><b><?php echo e(__('Featured Categories')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="threeColumnFullWidthBannersSubmit">
                    <?php echo csrf_field(); ?>

                    <!-- DB_ROW_ID-69:  => setting[68] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" <?php if($setting[68]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_three_column_full_width_banners_enabled" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable featured categories section</label>
                            </div>
                        </div>
                    </div>


                    <!-- DB_ROW_ID-69:  => setting[68] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Title</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_three_column_full_width_banners_enabled" class="form-control" placeholder="Type Title">
                        </div>
                    </div>

                    <!-- DB_ROW_ID-69:  => setting[68] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Subtitle</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_three_column_full_width_banners_enabled" class="form-control" placeholder="Type Subtitle">
                        </div>
                    </div>
                    <br>

                
                    <!-- Category - 1 -->
                    <!-- DB_ROW_ID-71-73:  => setting[70-72] -->
                    <h4 class="mt-3 text-bold"><?php echo e(__('Category - 1')); ?></h4><br>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category</b></label>
                        <div class="col-sm-8">
                            <select name="category_id1" id="categoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->local==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php elseif($value->local=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Type</b></label>
                        <div class="col-sm-8">
                            <select name="type2" id="type1" class="form-control" data-live-search="true" data-live-search-style="begins">
                                <option value="">-- Select Type --</option>
                                <option value="<?php echo e(__('category_products')); ?>"><?php echo e(__('Category Products')); ?></option>
                                <option value="<?php echo e(__('custom_products')); ?>"><?php echo e(__('Custom Products')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="customProductField1"></div> 
                    
                    

                    <!-- Category - 2 -->
                    <!-- DB_ROW_ID-71-73:  => setting[70-72] -->
                    <h4 class="mt-3 text-bold"><?php echo e(__('Category - 2')); ?></h4><br>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category</b></label>
                        <div class="col-sm-8">
                            <select name="category_id2" id="categoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->local==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php elseif($value->local=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Type</b></label>
                        <div class="col-sm-8">
                            <select name="type2" id="type2" class="form-control" data-live-search="true" data-live-search-style="begins">
                                <option value="">-- Select Type --</option>
                                <option value="<?php echo e(__('category_products')); ?>"><?php echo e(__('Category Products')); ?></option>
                                <option value="<?php echo e(__('custom_products')); ?>"><?php echo e(__('Custom Products')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="customProductField2"></div>     
                    
                    
                    <!-- Category - 3 -->
                    <!-- DB_ROW_ID-71-73:  => setting[70-72] -->
                    <h4 class="mt-3 text-bold"><?php echo e(__('Category - 3')); ?></h4><br>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category</b></label>
                        <div class="col-sm-8">
                            <select name="category_id3" id="categoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->local==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php elseif($value->local=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Type</b></label>
                        <div class="col-sm-8">
                            <select name="type3" id="type3" class="form-control" data-live-search="true" data-live-search-style="begins">
                                <option value="">-- Select Type --</option>
                                <option value="<?php echo e(__('category_products')); ?>"><?php echo e(__('Category Products')); ?></option>
                                <option value="<?php echo e(__('custom_products')); ?>"><?php echo e(__('Custom Products')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="customProductField3"></div>


                    <!-- Category - 4 -->
                    <!-- DB_ROW_ID-71-73:  => setting[70-72] -->
                    <h4 class="mt-3 text-bold"><?php echo e(__('Category - 4')); ?></h4><br>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category</b></label>
                        <div class="col-sm-8">
                            <select name="category_id4" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->local==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php elseif($value->local=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Type</b></label>
                        <div class="col-sm-8">
                            <select name="type4" id="type4" class="form-control" data-live-search="true" data-live-search-style="begins">
                                <option value="">-- Select Type --</option>
                                <option value="<?php echo e(__('category_products')); ?>"><?php echo e(__('Category Products')); ?></option>
                                <option value="<?php echo e(__('custom_products')); ?>"><?php echo e(__('Custom Products')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="customProductField4"></div>


                    <!-- Category - 5 -->
                    <!-- DB_ROW_ID-71-73:  => setting[70-72] -->
                    <h4 class="mt-3 text-bold"><?php echo e(__('Category - 5')); ?></h4><br>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category</b></label>
                        <div class="col-sm-8">
                            <select name="category_id5" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->local==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php elseif($value->local=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Type</b></label>
                        <div class="col-sm-8">
                            <select name="type5" id="type5" class="form-control" data-live-search="true" data-live-search-style="begins">
                                <option value="">-- Select Type --</option>
                                <option value="<?php echo e(__('category_products')); ?>"><?php echo e(__('Category Products')); ?></option>
                                <option value="<?php echo e(__('custom_products')); ?>"><?php echo e(__('Custom Products')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="customProductField5"></div>



                    <div class="form-group row mt-5">
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

<script>
    $('#type1').change(function() {
        var type = $('#type1').val();
        if (type=='custom_products') {
            data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" min="0" name="product1" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#customProductField1').html(data)
        }else{
            $('#customProductField1').empty();
        }
    });

    $('#type2').change(function() {
        var type = $('#type2').val();
        if (type=='custom_products') {
            data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" min="0" name="product2" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#customProductField2').html(data)
        }else{
            $('#customProductField2').empty();
        }
    });

    $('#type3').change(function() {
        var type = $('#type3').val();
        if (type=='custom_products') {
            data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" min="0" name="product3" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#customProductField3').html(data)
        }else{
            $('#customProductField3').empty();
        }
    });

    $('#type4').change(function() {
        var type = $('#type4').val();
        if (type=='custom_products') {
            data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" min="0" name="product4" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#customProductField4').html(data)
        }else{
            $('#customProductField4').empty();
        }
    });

    $('#type5').change(function() {
        var type = $('#type5').val();
        if (type=='custom_products') {
            data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" min="0" name="product5" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#customProductField5').html(data)
        }else{
            $('#customProductField5').empty();
        }
    });
</script><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/storefront/home_page_section/featured_categories.blade.php ENDPATH**/ ?>