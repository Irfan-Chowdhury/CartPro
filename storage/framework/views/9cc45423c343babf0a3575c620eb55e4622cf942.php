<div class="card">
    <h3 class="card-header p-2"><b><?php echo e(__('Product Tabs Two')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="productTabsTwoSubmit">
                    <?php echo csrf_field(); ?>

                    <!-- DB_ROW_ID-103:  => setting[102] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" <?php if($setting[102]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_product_tabs_2_section_enabled" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable product tabs one section</label>
                            </div>
                        </div>
                    </div>

                    <!-- DB_ROW_ID-104:  => setting[103] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Title</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_product_tabs_2_section_title" placeholder="Type Title" class="form-control"
                            <?php $__empty_1 = true; $__currentLoopData = $setting[103]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->locale==$locale): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php elseif($item->locale=='en'): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?> >
                        </div>
                    </div>


                     <!-- Tab-1 -->
                     <?php echo $__env->make('admin.pages.storefront.home_page_section.product_tabs_two.tab1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <!-- Tab-2 -->
                    <?php echo $__env->make('admin.pages.storefront.home_page_section.product_tabs_two.tab2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <!-- Tab-3 -->
                    <?php echo $__env->make('admin.pages.storefront.home_page_section.product_tabs_two.tab3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <!-- Tab-3 -->
                    <?php echo $__env->make('admin.pages.storefront.home_page_section.product_tabs_two.tab4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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


    $(document).ready(function(){
        var tabs_two_check_type1 = <?php echo json_encode($setting[105]->plain_value, 15, 512) ?>; //tab1
        var tabs_two_check_type2 = <?php echo json_encode($setting[110]->plain_value, 15, 512) ?>; //tab2
        var tabs_two_check_type3 = <?php echo json_encode($setting[115]->plain_value, 15, 512) ?>; //tab3
        var tabs_two_check_type4 = <?php echo json_encode($setting[120]->plain_value, 15, 512) ?>; //tab4
        if (tabs_two_check_type1!='category_products') {
            $('#tabTwoCategoryFeild_1').hide();
        }
        if (tabs_two_check_type2!='category_products') {
            $('#tabTwoCategoryFeild_2').hide();
        }
        if (tabs_two_check_type3!='category_products') {
            $('#tabTwoCategoryFeild_3').hide();
        }
        if (tabs_two_check_type4!='category_products') {
            $('#tabTwoCategoryFeild_4').hide();
        }
    });

    //tab1
    $('#storefrontProductTabs_2_SectionTab_1_ProductType').change(function() {
        var storefrontProductTabs_2_SectionTab_1_ProductType = $('#storefrontProductTabs_2_SectionTab_1_ProductType').val();
        if (storefrontProductTabs_2_SectionTab_1_ProductType=='category_products') {
            $('#tabTwoProductTabsField_1').empty();
            $('#tabTwoCategoryFeild_1').show();
        }
        else if (storefrontProductTabs_2_SectionTab_1_ProductType=='custom_products') {
            $('#tabTwoCategoryFeild_1').hide();
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" name="storefront_product_tabs_2_section_tab_1_products" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#tabTwoProductTabsField_1').html(data);
        }
        else if (storefrontProductTabs_2_SectionTab_1_ProductType=='latest_products' || storefrontProductTabs_2_SectionTab_1_ProductType=='recently_viewed_products') {
            $('#tabTwoCategoryFeild_1').hide();
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products Limit')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="number" min="0" name="storefront_product_tabs_2_section_tab_1_products_limit" class="form-control" placeholder="Type Limit">';
            data += '</div>';
            $('#tabTwoProductTabsField_1').html(data);
        }
    });

    //tab2
    $('#storefrontProductTabs_2_SectionTab_2_ProductType').change(function() {
        var storefrontProductTabs_2_SectionTab_2_ProductType = $('#storefrontProductTabs_2_SectionTab_2_ProductType').val();
        if (storefrontProductTabs_2_SectionTab_2_ProductType=='category_products') {
            $('#tabTwoProductTabsField_2').empty();
            $('#tabTwoCategoryFeild_2').show();
        }
        else if (storefrontProductTabs_2_SectionTab_2_ProductType=='custom_products') {
            $('#tabTwoCategoryFeild_2').hide();
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" name="storefront_product_tabs_2_section_tab_2_products" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#tabTwoProductTabsField_2').html(data);
        }
        else if (storefrontProductTabs_2_SectionTab_2_ProductType=='latest_products' || storefrontProductTabs_2_SectionTab_2_ProductType=='recently_viewed_products') {
            $('#tabTwoCategoryFeild_2').hide();
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products Limit')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="number" min="0" name="storefront_product_tabs_2_section_tab_2_products_limit" class="form-control" placeholder="Type Limit">';
            data += '</div>';
            $('#tabTwoProductTabsField_2').html(data);
        }
    });

    //tab3
    $('#storefrontProductTabs_2_SectionTab_3_ProductType').change(function() {
        var storefrontProductTabs_2_SectionTab_3_ProductType = $('#storefrontProductTabs_2_SectionTab_3_ProductType').val();
        if (storefrontProductTabs_2_SectionTab_3_ProductType=='category_products') {
            $('#tabTwoProductTabsField_3').empty();
            $('#tabTwoCategoryFeild_3').show();
        }
        else if (storefrontProductTabs_2_SectionTab_3_ProductType=='custom_products') {
            $('#tabTwoCategoryFeild_3').hide();
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" name="storefront_product_tabs_2_section_tab_3_products" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#tabTwoProductTabsField_3').html(data);
        }
        else if (storefrontProductTabs_2_SectionTab_3_ProductType=='latest_products' || storefrontProductTabs_2_SectionTab_3_ProductType=='recently_viewed_products') {
            $('#tabTwoCategoryFeild_3').hide();
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products Limit')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="number" min="0" name="storefront_product_tabs_2_section_tab_3_products_limit" class="form-control" placeholder="Type Limit">';
            data += '</div>';
            $('#tabTwoProductTabsField_3').html(data);
        }
    });


    //tab4
    $('#storefrontProductTabs_2_SectionTab_4_ProductType').change(function() {
        var storefrontProductTabs_2_SectionTab_4_ProductType = $('#storefrontProductTabs_2_SectionTab_4_ProductType').val();
        if (storefrontProductTabs_2_SectionTab_4_ProductType=='category_products') {
            $('#tabTwoProductTabsField_4').empty();
            $('#tabTwoCategoryFeild_4').show();
        }
        else if (storefrontProductTabs_2_SectionTab_4_ProductType=='custom_products') {
            $('#tabTwoCategoryFeild_4').hide();
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="text" name="storefront_product_tabs_2_section_tab_4_products" class="form-control" placeholder="Type Product">';
            data += '</div>';
            $('#tabTwoProductTabsField_4').html(data);
        }
        else if (storefrontProductTabs_2_SectionTab_4_ProductType=='latest_products' || storefrontProductTabs_2_SectionTab_4_ProductType=='recently_viewed_products') {
            $('#tabTwoCategoryFeild_4').hide();
            data = '<label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products Limit')); ?></b></label>';
            data += '<div class="col-sm-8">';
            data += '<input type="number" min="0" name="storefront_product_tabs_2_section_tab_4_products_limit" class="form-control" placeholder="Type Limit">';
            data += '</div>';
            $('#tabTwoProductTabsField_4').html(data);
        }
    });
</script>




<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/storefront/home_page_section/product_tabs_two.blade.php ENDPATH**/ ?>