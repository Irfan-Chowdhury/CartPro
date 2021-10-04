
<?php $__env->startSection('admin_content'); ?>

<style>
    .list-group-item {
    z-index: 2;
    color: black;
    background-color: #E9E9E9;
    border-color: #FFFFFF;
}
    .list-group-item.active {
    z-index: 2;
    color: black;
    background-color: #FFFFFF;
    border-color: #E9E9E9;
}
</style>


<section>
    <div class="container-fluid"><span id="general_result"></span></div>

    <?php echo $__env->make('admin.includes.alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mb-3">
        <h3 class="font-weight-bold mt-3">Edit Product</h3>
        <div id="success_alert" role="alert"></div>
    </div>

    <div class="container">
        <form action="<?php echo e(route('admin.products.update',$product->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="card">
                <div class="card-body">

                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="general-settings-general" data-toggle="list" href="#general" role="tab" aria-controls="home"><?php echo e(__('General')); ?></a>
                                    <a class="list-group-item list-group-item-action" id="product-price" data-toggle="list" href="#price" role="tab" aria-controls="settings"><?php echo e(__('Price')); ?></a>
                                    <a class="list-group-item list-group-item-action" id="product-inventory" data-toggle="list" href="#inventory" role="tab" aria-controls="inventory"><?php echo e(__('Inventory')); ?></a>
                                    
                                    <a class="list-group-item list-group-item-action" id="product-images" data-toggle="list" href="#images" role="tab" aria-controls="images"><?php echo e(__('Images')); ?></a>
                                    <a class="list-group-item list-group-item-action" id="product-seo" data-toggle="list" href="#seo" role="tab" aria-controls="seo"><?php echo e(__('SEO')); ?></a>
                                    <a class="list-group-item list-group-item-action" id="product-attribute" data-toggle="list" href="#attribute" role="tab" aria-controls="attribute"><?php echo e(__('Attributes')); ?></a>
                                    <a class="list-group-item list-group-item-action" id="" data-toggle="list" href="" role="tab" aria-controls="seo"><?php echo e(__('Options')); ?></a>
                                    <a class="list-group-item list-group-item-action" id="product-additional" data-toggle="list" href="#additional" role="tab" aria-controls="additional"><?php echo e(__('Additional')); ?></a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="nav-tabContent">

                                    <!-- General -->
                                    <div class="tab-pane fade show active" aria-labelledby="general-settings-general" id="general" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>General</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Product Name')); ?> <span class="text-danger">*</span></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="product_name" id="productName" class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputEmail3" value="<?php echo e($product->productTranslation->product_name ?? $product->productTranslationEnglish->product_name ?? null); ?>" placeholder="Type Product Name">
                                                                <input type="hidden" name="product_translation_id" class="form-control" id="inputEmail3" <?php if(isset($product->productTranslation->id)): ?> value="<?php echo e($product->productTranslation->id ?? $product->productTranslation->id); ?>" <?php endif; ?>>
                                                                <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Description')); ?> <span class="text-danger">*</span></b></label>
                                                            <div class="col-sm-8">
                                                                <textarea name="description" id="description" class="form-control text-editor">
                                                                    <?php echo e($product->productTranslation->description ?? $product->productTranslationEnglish->description ?? null); ?>

                                                                </textarea>
                                                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Brand</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="brand_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Brand')); ?>'>

                                                                    <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <option value="<?php echo e($item->id); ?>" <?php if(isset($product->brand_id)): ?> <?php if($item->id==$product->brand_id): ?> selected <?php endif; ?> <?php endif; ?> ><?php echo e($item->brandTranslation->brand_name ?? $item->brandTranslationEnglish->brand_name ?? null); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Categories</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="category_id[]" id="categoryId" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                                                
                                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($item->categoryTranslation->count()>0): ?>
                                                                            <?php $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($key<1): ?>
                                                                                    <?php if($value->local==$local): ?>
                                                                                        <option value="<?php echo e($item->id); ?>"
                                                                                            <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if($productCategory->id == $item->id): ?>
                                                                                                    selected
                                                                                                <?php endif; ?>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                                                            <?php echo e($value->category_name); ?>

                                                                                        </option>
                                                                                    <?php elseif($value->local=='en'): ?>
                                                                                        <option value="<?php echo e($item->id); ?>"
                                                                                            <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if($productCategory->id == $item->id): ?>
                                                                                                    selected
                                                                                                <?php endif; ?>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                                                            <?php echo e($value->category_name); ?>

                                                                                        </option>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                            <option value=""><?php echo e(__('NULL')); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Tax Class</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="tax_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                                                    <?php $__empty_1 = true; $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <option value="<?php echo e($tax->id); ?>" <?php if($tax->id == $product->tax_id): ?> selected <?php endif; ?>><?php echo e($tax->taxTranslation->tax_name ?? $tax->taxTranslationDefaultEnglish->tax_name ?? null); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Tags</b></label>
                                                            <div class="col-sm-8">
                                                                <select name="tag_id[]" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($item->tagTranslation->count()>0): ?>
                                                                            <?php $__currentLoopData = $item->tagTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($key<1): ?>
                                                                                    <?php if($value->local==$local): ?>
                                                                                        <option value="<?php echo e($item->id); ?>"
                                                                                            <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producttag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if($producttag->id == $item->id): ?>
                                                                                                    selected
                                                                                                <?php endif; ?>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                                                            <?php echo e($value->tag_name); ?>

                                                                                        </option>
                                                                                    <?php elseif($value->local=='en'): ?>
                                                                                        <option value="<?php echo e($item->id); ?>"
                                                                                            <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producttag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if($producttag->id == $item->id): ?>
                                                                                                    selected
                                                                                                <?php endif; ?>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                                                            <?php echo e($value->tag_name); ?>

                                                                                        </option>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                            <option value=""><?php echo e(__('NULL')); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group form-check">
                                                                    <input type="checkbox" class="form-check-input" name="is_active" <?php if($product->is_active==1): ?> checked <?php endif; ?> value="1" id="isActive">
                                                                    <span><?php echo e(__('Enable the product')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/ General -->

                                    <!-- Price -->
                                    <div class="tab-pane fade show" aria-labelledby="product-price" role="tabpanel" id="price">
                                        <div class="card">
                                            <h4 class="card-header"><b>Price</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Price')); ?> <span class="text-danger">*</span></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="price" id="price" class="form-control" id="inputEmail3" <?php if(env('FORMAT_NUMBER')): ?> value="<?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?>" <?php endif; ?>>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Special Price')); ?></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="special_price" id="specialPrice" class="form-control" id="inputEmail3" <?php if(env('FORMAT_NUMBER')): ?> value="<?php echo e(number_format((float)$product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>" <?php endif; ?> >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Special Price Type')); ?></b></label>
                                                            <div class="col-sm-8">
                                                                <select name="special_price_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Price Type')); ?>'>
                                                                    <option value="Fixed" <?php if($product->special_price_type=='Fixed'): ?> selected <?php endif; ?>><?php echo e(__('Fixed')); ?></option>
                                                                    <option value="Parcent" <?php if($product->special_price_type=='Parcent'): ?> selected <?php endif; ?>><?php echo e(__('Parcent')); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Special Price Start')); ?></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="special_price_start" value="<?php echo e($product->special_price_start); ?>" id="specialPriceStart" class="form-control datepicker">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Special Price End')); ?></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="special_price_end" value="<?php echo e($product->special_price_end); ?>" id="specialPriceEnd" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Price-->

                                    <!-- Inventory-->
                                    <div class="tab-pane fade show" aria-labelledby="product-inventory" id="inventory" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b><?php echo e(__('Inventory')); ?></b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('SKU')); ?> </b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="sku" id="sku" class="form-control <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputEmail3" value="<?php echo e($product->sku); ?>">
                                                                <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Inventroy Management')); ?></b></label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control selectpicker" name="manage_stock" id="manageStock" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Inventory')); ?>'>
                                                                    <option value="0" <?php if($product->manage_stock==0): ?> selected <?php endif; ?>><?php echo e(__("Don't Track Inventory")); ?></option>
                                                                    <option value="1" <?php if($product->manage_stock==1): ?> selected <?php endif; ?>><?php echo e(__('Track Inventory')); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row" id="quantityField">
                                                            <?php if($product->qty): ?>
                                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Quantity')); ?> &nbsp;<span class="text-danger">*</span> </b></label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" min="0" name="qty" id="qty" class="form-control" id="inputEmail3" value="<?php echo e($product->qty); ?>">
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Stock Availibility')); ?></b></label>
                                                            <div class="col-sm-8">
                                                                <select name="in_stock" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Stock')); ?>'>
                                                                    <option value="1" <?php if($product->in_stock==1): ?> selected <?php endif; ?>><?php echo e(__("In Stock")); ?></option>
                                                                    <option value="0" <?php if($product->in_stock==0): ?> selected <?php endif; ?>><?php echo e(__('Out Stock')); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Inventory-->

                                    <!--Variants-->
                                    
                                    <!--Variants-->

                                    <!-- Images -->
                                    <div class="tab-pane fade show" aria-labelledby="product-images" id="images" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b><?php echo e(__('Images')); ?></b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Basic Image')); ?> </b></label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="base_image" id="baseImage" class="form-control <?php $__errorArgs = ['base_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onchange="showImage(this,'item_photo')">
                                                                <?php if(($product->baseImage!==null) && ($product->baseImage->type=='base')): ?>
                                                                    <img id="item_photo" src="<?php echo e(asset('public/'.$product->baseImage->image)); ?>"  height="100px" width="100px">
                                                                <?php endif; ?>
                                                                <?php $__errorArgs = ['base_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Additional Images')); ?> </b></label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="additional_images[]" multiple id="multipleImages" class="form-control <?php $__errorArgs = ['additional_images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                                <?php if($product->additionalImage!==null): ?>
                                                                    <?php $__currentLoopData = $product->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <img src="<?php echo e(asset('public/'.$item->image)); ?>"  height="100px" width="100px">
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                                <?php $__errorArgs = ['additional_images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Images -->


                                    <!-- SEO -->
                                    <div class="tab-pane fade show" aria-labelledby="product-seo" id="seo" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b><?php echo e(__('SEO')); ?></b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Meta Title')); ?> </b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="meta_title" id="metaTitle" class="form-control" id="inputEmail3" placeholder="Type Meta Title" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Meta Description')); ?> </b></label>
                                                            <div class="col-sm-8">
                                                                <textarea name="meta_description" id="meta_description" class="form-control" rows="5"></textarea>
                                                                <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ SEO -->

                                    <!-- Attribute -->
                                    <div class="tab-pane fade show" aria-labelledby="product-attribute" id="attribute" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b>Attributes</b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="variants">
                                                    <div class="row">
                                                        <div class="col-5 form-group">
                                                            <label><?php echo e(__('Atrribute')); ?></label>
                                                            <select name="attribute_id[]" id="attributeId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Attribute')); ?>'>
                                                                <?php $__empty_1 = true; $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->attributeTranslation->attribute_name ?? $item->attributeTranslationEnglish->attribute_name ?? null); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-6 form-group">
                                                            <label><?php echo e(__("Values")); ?></label>
                                                            <select name="attribute_value_id[]" id="attributeValueId" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title="Select Value">

                                                            </select>
                                                        </div>

                                                        <div class="col-1">
                                                            <label>Delete</label><br>
                                                            <span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <span class="btn btn-link add-more" id="addMore"><i class="dripicons-plus"></i> Add New Attribute</span>
                                                <br><br>
                                                <div class="form-group row">
                                                    <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Attribute -->

                                    <!-- Additional -->
                                    <div class="tab-pane fade show" aria-labelledby="product-additional" id="additional" role="tabpanel">
                                        <div class="card">
                                            <h4 class="card-header"><b><?php echo e(__('Additional')); ?></b></h4>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Short Description')); ?> </b></label>
                                                            <div class="col-sm-8">
                                                                <textarea name="short_description" id="short_description" class="form-control" rows="5">
                                                                     <?php echo e($product->productTranslation->short_description ?? $product->productTranslationEnglish->short_description ?? null); ?>


                                                                </textarea>
                                                                <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Product New From')); ?></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="new_from" id="newFrom" value="<?php echo e(date('Y-m-d',strtotime($product->new_from))); ?>" class="form-control datepicker">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Product New To')); ?></b></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="new_to" id="newTo" value="<?php echo e(date('Y-m-d',strtotime($product->new_to))); ?>" class="form-control datepicker">
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Additional -->
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </form>
    </div>
</section>

<script type="text/javascript">

        tinymce.init({
            selector: '.text-editor',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            height: 300,

            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },

            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code wordcount'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat',
            branding: false
        });

        $('#specialPriceStart').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#specialPriceEnd').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#newFrom').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#newTo').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });


        $('#manageStock').change(function() {
            var manageStock = $('#manageStock').val();
            if (manageStock==1) {
                data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Quantity')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
                data += '<div class="col-sm-8">';
                data += '<input type="number" min="0" name="qty" id="qty" class="form-control" id="inputEmail3" placeholder="Type Quantity">';
                data += '</div>';

                $('#quantityField').html(data)
            }else{
                $('#quantityField').empty();
            }

        });

        $(document).on('click', '#addMore2', function(){
            console.log('ok');
            var rand = Math.floor(Math.random() * 90000) + 10000;
            // $('.variants').append('<div class="row"><div class="col-2 form-group"><label><?php echo e(__('Size')); ?> *</label><input type="text" name="variant_size[]" required class="form-control" placeholder="<?php echo e(__('XS, S, M ...')); ?>"></div><div class="col-2 form-group"><label><?php echo e(__('Color')); ?> *</label><input type="text" name="variant_color[]" id="product_amount"  required class="form-control" placeholder="<?php echo e(__('Color')); ?>"></div><div class="col-2 form-group"><label><?php echo e(__('SKU')); ?> *</label><input type="text" name="variant_sku[]" id="sku" required class="form-control" placeholder="<?php echo e(__('SKU')); ?>"></div><div class="col-2 form-group"><label><?php echo e(__('Quantity')); ?> *</label><input type="text" name="variant_qty[]" id="product_amount"  required class="form-control" placeholder="<?php echo e(__('Quantity')); ?>"></div><div class="col-2 form-group"><label><?php echo e(__('Price')); ?></label><input type="text" name="variant_price[]" id="price" required class="form-control" placeholder="<?php echo e(__('Price')); ?>"></div><div class="col-2"><label>Delete</label><br><span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span></div></div></div>');
            $('.variants').append('<div class="row"><div class="col-2 form-group"><label><?php echo e(__('Size')); ?> *</label><input type="text" name="variant_size[]" required class="form-control" placeholder="<?php echo e(__('XS, S, M ...')); ?>"></div><div class="col-2"><label>Delete</label><br><span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span></div></div></div>');
        })

        $(document).on('click', '.del-row', function(){
            $(this).parent().parent().html('');
        })



        //--------test-------

        $(document).on('click', '#addMore', function(){

            html = '<div class="row">'+
                        '<div class="col-5 form-group">'+
                            '<label><?php echo e(__("Atrribute")); ?></label>'+
                            // '<select name="attribute_id[]" id="attributeId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Attribute')); ?>'>'+
                            '<select name="attribute_id[]" id="attributeId2" class="form-control">'+
                                '<option value="">Please Select Attribute</option>'+
                                    '<?php $__empty_1 = true; $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>'+
                                        '<option value="<?php echo e($item->id); ?>"><?php echo e($item->attributeTranslation->attribute_name ?? $item->attributeTranslationEnglish->attribute_name ?? null); ?></option>'+
                                    '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>'+
                                    '<?php endif; ?>'+
                            '</select>'+
                        '</div>'+

                        '<div class="col-6 form-group">'+
                            '<label><?php echo e(__("Values")); ?></label>'+
                            // '<select name="attribute_value_id[]" id="attributeValueId" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title="Select Value">'+
                            '<select name="attribute_value_id[]" id="attributeValueId2" class="form-control">'+
                            '</select>'+
                        '</div>'+

                        '<div class="col-1">'+
                            '<label>Delete</label><br>'+
                            '<span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>'+
                        '</div>'+
                '</div>';

            console.log(html);

            var rand = Math.floor(Math.random() * 90000) + 10000;
            $('.variants').append(html);

        })

        //---------/ test------

        $('#attributeId').change(function () {
            var attributeId = $('#attributeId').val();
            // console.log(attributeId);
            $.ajax({
                url: "<?php echo e(route('admin.attribute.get_attribute_values')); ?>",
                method: "GET",
                data: {attribute_id: attributeId},
                success: function (data) {
                    console.log(data);
                    $('select').selectpicker("destroy");
                    $('#attributeValueId').html(data);
                    // $('#attributeValueId2').html(data);
                    $('select').selectpicker();
                }
            });
        });

        $('#attributeId2').change(function () {
            console.log('ok');

            var attributeId = $('#attributeId2').val();
            // console.log(attributeId);
            $.ajax({
                url: "<?php echo e(route('admin.attribute.get_attribute_values')); ?>",
                method: "GET",
                data: {attribute_id: attributeId},
                success: function (data) {
                    console.log(data);
                    $('select').selectpicker("destroy");
                    $('#attributeValueId2').html(data);
                    $('select').selectpicker();
                }
            });
        });
        // $('#attributeValueId').change(function () {
        //     var attributeValueId = $('#attributeValueId').val();

        //     console.log(attributeValueId);
        // });

        //Image Show Before Upload Start
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                if (fileName){
                    $('#fileLabel').html(fileName);
                }
            });
        });

        //Image Show Before Upload End
        function showImage(data, imgId){
            if(data.files && data.files[0]){
                var obj = new FileReader();

                obj.onload = function(d){
                    var image = document.getElementById(imgId);
                    image.src = d.target.result;
                }
                obj.readAsDataURL(data.files[0]);
            }
        }


</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/product/edit.blade.php ENDPATH**/ ?>