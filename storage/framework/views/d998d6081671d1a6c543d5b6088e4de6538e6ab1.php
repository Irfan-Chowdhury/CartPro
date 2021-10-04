<h4 class="mt-3 text-bold"><?php echo e(__('Tab - 1')); ?></h4><br>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Title</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_product_tabs_1_section_tab_1_title" class="form-control" placeholder="Type Title"
                            <?php $__empty_1 = true; $__currentLoopData = $setting[82]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                        <label class="col-sm-4 col-form-label"><b>Type</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_product_tabs_1_section_tab_1_product_type" id="storefrontProductTabs_1_SectionTab_1_ProductType" class="form-control" data-live-search="true" data-live-search-style="begins">
                                <option value="">-- Select Type --</option>
                                <option value="<?php echo e(__('category_products')); ?>" <?php echo e($setting[83]->plain_value == 'category_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Category Products')); ?></option>
                                <option value="<?php echo e(__('custom_products')); ?>" <?php echo e($setting[83]->plain_value == 'custom_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Custom Products')); ?></option>
                                <option value="<?php echo e(__('latest_products')); ?>" <?php echo e($setting[83]->plain_value == 'latest_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Latest Products')); ?></option>
                                <option value="<?php echo e(__('recently_viewed_products')); ?>" <?php echo e($setting[83]->plain_value == 'recently_viewed_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Recently Viewed Products')); ?></option>
                            </select>
                        </div>
                    </div>
                    <?php if((!empty($setting[83]->plain_value)) && ($setting[83]->plain_value == 'category_products')): ?>
                        <div class="form-group row" id="categoryFeild_1">
                            <label class="col-sm-4 col-form-label"><b>Category</b></label>
                            <div class="col-sm-8">
                                <select name="storefront_product_tabs_1_section_tab_1_category_id" id="storefrontProductTabs_1_SectionTab_1_CategoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($value->local==$locale): ?>
                                                <option value="<?php echo e($item->id); ?>" <?php echo e($setting[84]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($value->category_name); ?></option>
                                            <?php elseif($value->local=='en'): ?>
                                                <option value="<?php echo e($item->id); ?>" <?php echo e($setting[84]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($value->category_name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value=""><?php echo e(__('NULL')); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="form-group row" id="categoryFeild_1">
                            <label class="col-sm-4 col-form-label"><b>Category</b></label>
                            <div class="col-sm-8">
                                <select name="storefront_product_tabs_1_section_tab_1_category_id" id="storefrontProductTabs_1_SectionTab_1_CategoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($value->local==$locale): ?>
                                                <option value="<?php echo e($item->id); ?>" <?php echo e($setting[84]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($value->category_name); ?></option>
                                            <?php elseif($value->local=='en'): ?>
                                                <option value="<?php echo e($item->id); ?>" <?php echo e($setting[84]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($value->category_name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value=""><?php echo e(__('NULL')); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group row" id="productTabsField1">
                        <?php if((!empty($setting[83]->plain_value)) && ($setting[83]->plain_value == 'custom_products')): ?>
                            <label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="storefront_product_tabs_1_section_tab_1_products" value="<?php echo e($setting[85]->plain_value); ?>" class="form-control">
                            </div>
                        <?php elseif((!empty($setting[83]->plain_value)) && (($setting[83]->plain_value == 'latest_products') || ($setting[83]->plain_value == 'recently_viewed_products'))): ?>
                            <label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products Limit')); ?></b></label>
                            <div class="col-sm-8">
                                <input type="text" name="storefront_product_tabs_1_section_tab_1_products_limit" value="<?php echo e($setting[86]->plain_value); ?>" class="form-control">
                            </div>
                        <?php endif; ?>
                    </div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/storefront/home_page_section/product_tabs_one/tab1.blade.php ENDPATH**/ ?>