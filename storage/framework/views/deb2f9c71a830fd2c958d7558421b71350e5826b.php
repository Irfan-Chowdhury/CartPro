<?php
if (Session::has('currency_rate')){
    $CHANGE_CURRENCY_RATE = Session::get('currency_rate');
}else{
    $CHANGE_CURRENCY_RATE = 1;
    Session::put('currency_rate', $CHANGE_CURRENCY_RATE);
}

if (Session::has('currency_symbol')){
    $CHANGE_CURRENCY_SYMBOL = Session::get('currency_symbol');
}else{
    $CHANGE_CURRENCY_SYMBOL = env('DEFAULT_CURRENCY_SYMBOL');
    Session::put('currency_symbol',$CHANGE_CURRENCY_SYMBOL);
}
?>






<?php $__env->startSection('title','Shop'); ?>

<?php $__env->startSection('extra_css'); ?>
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php echo e(asset('public/frontend/css/jquery-ui-min.css')); ?>">
<noscript><link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php echo e(asset('public/frontend/css/jquery-ui-min.css')); ?>"></noscript>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('frontend_content'); ?>
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="<?php echo e(route('cartpro.home')); ?>"><?php echo app('translator')->get('file.Home'); ?></a></li>
                        <li class="active"><?php echo app('translator')->get('file.Shop'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->



        <!-- Shop Page Starts-->
        <div class="shop-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar_filters">

                            <div class="sidebar-widget sidebar-category-list">
                                <div class="sidebar-title">
                                    <h2 data-bs-toggle="collapse" href="#collapseCategory" aria-expanded="true"><b><?php echo app('translator')->get('file.Browse Categories'); ?></b></h2>
                                </div>
                                <div class="category-sub-menu style1 mar-top-15 collapse show" id="collapseCategory">
                                    <ul>
                                        <?php $__empty_1 = true; $__currentLoopData = $categories->where('parent_id',NULL); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li class="">
                                                <a href="<?php echo e(route('cartpro.category_wise_products',$category->slug)); ?>">
                                                    <?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?>

                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <p><?php echo app('translator')->get('file.No Products Found'); ?></p>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </div>

                            <form id="sidebarFilter">

                                <!-- Filter By Price -->
                                <div class="sidebar-widget filters">
                                    <div class="sidebar-title">
                                        <h2 data-bs-toggle="collapse" href="#collapsePrice" aria-expanded="true"><b><?php echo app('translator')->get('file.Filter By Price'); ?></b></h2>
                                    </div>
                                    <div class="filter-area collapse show" id="collapsePrice">
                                        <div id="slider-range" class="price-range mar-bot-20"></div>
                                        <div class="d-flex justify-content-center">
                                            <div><input type="text" id="amount" name="amount"></div>
                                            <div><input type="hidden" name="category_slug" value="<?php echo e($category->slug ?? null); ?>"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Filter By Attribute Value-->
                                <input type="hidden" name="attribute_value_ids" class="attribute_value_ids" id="value_ids">
                                <?php $__empty_1 = true; $__currentLoopData = $attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="sidebar-widget filters">
                                        <div class="sidebar-title">
											<?php if(isset($item->attributeTranslation->attribute_name)): ?>
												<h2 data-bs-toggle="collapse" href="#collapseSize" aria-expanded="true"><?php echo app('translator')->get('file.Filter By'); ?> <?php echo e($item->attributeTranslation->attribute_name); ?></h2>
											<?php endif; ?>
                                        </div>
                                        <div class="filter-area collapse show" id="collapseSize">
                                            <div class="size-checkbox">
                                                <ul class="filter-opt size pt-2">
													<?php if(isset($item->attributeTranslation->attributeValueTranslation)): ?>
														<?php $__empty_2 = true; $__currentLoopData = $item->attributeTranslation->attributeValueTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
															<li>
																<div class="custom-control custom-checkbox">
																<label for="size-s" class="custom-control-label attribute_value" data-attribute_name="<?php echo e($item->attributeTranslation->attribute_name); ?>" id="valueId_<?php echo e($value->attribute_value_id); ?>" data-value_id="<?php echo e($value->attribute_value_id); ?>" data-value_name="<?php echo e($value->value_name); ?>"><span class="size-block"><?php echo e($value->value_name); ?></span></label>
																</div>
															</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
														<?php endif; ?>
													<?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                                <div><button type="submit" class="mt-2 btn btn-success"><?php echo e(__('Filter')); ?></button></div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1 class="page-title h5 uppercase mb-0"></h1>
                            <span class="d-none d-md-block"><strong class="theme-color"><?php echo e(count($products)); ?></strong> <?php echo app('translator')->get('file.Products Found'); ?></span>
                        </div>

                        <div class="products-header">
                            <ul class="nav shop-item-filter-list">
                                <li class="d-none d-md-block"><a class="view-grid active"><i class="ti-view-grid"></i></a></li>
                                <li class="d-none d-md-block"><a class="view-list"><i class="ti-layout-list-thumb"></i></a></li>
                                <li class="d-md-block d-sm-block d-lg-none"><a class="filter-icon"><i class="las la-sliders-h"></i> <?php echo app('translator')->get('file.Filters'); ?></a></li>
                            </ul>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo app('translator')->get('file.Show'); ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item active limitShopProductShow" data-id="2" href="#" >2</a></li>
                                    <li><a class="dropdown-item limitShopProductShow" data-id="3" href="#">3</a></li>
                                    <li><a class="dropdown-item limitShopProductShow" data-id="4" href="#">4</a></li>
                                    <li><a class="dropdown-item limitShopProductShow" data-id="5" href="#">5</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo app('translator')->get('file.Sort by'); ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item sortBy" data-condition="latest"><?php echo e(__('file.Latest')); ?></a></li>
                                    <li><a class="dropdown-item sortBy" data-condition="low_to_high"><?php echo app('translator')->get('file.Price: Low to High'); ?></a></li>
                                    <li><a class="dropdown-item sortBy" data-condition="high_to_low"><?php echo app('translator')->get('file.Price: High to Low'); ?></a></li>
                                </ul>
                            </div>
                        </div>


                        <!--Shop product wrapper starts-->
                        <div class="shop-products-wrapper">
                            <div class="product-grid shopProductsField">
                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if(isset($category_ids[$item->id])): ?>
                                        <form class="addToCart">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($item->id); ?>">
                                            <input type="hidden" name="product_slug" value="<?php echo e($item->slug); ?>">
                                            <input type="hidden" name="category_id" value="<?php echo e($category_ids[$item->id]->category_id); ?>">
                                            <input type="hidden" name="qty" value="1">

                                            <div class="product-grid-item">
                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">

                                                        <?php if(isset($item->image_medium) && Illuminate\Support\Facades\File::exists(public_path($item->image_medium))): ?>
                                                            <a href="<?php echo e(url('product/'.$item->slug.'/'. $category_ids[$item->id]->category_id)); ?>"><img class="lazy" data-src="<?php echo e(asset('public/'.$item->image_medium)); ?>"></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(url('product/'.$item->slug.'/'. $category_ids[$item->id]->category_id)); ?>"><img src="https://dummyimage.com/221x221/e5e8ec/e5e8ec&text=CartPro"></a>
                                                        <?php endif; ?>

                                                        <!-- product-promo-text -->
                                                        <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->manage_stock, 'qty'=>$item->qty, 'in_stock'=>$item->in_stock, 'in_stock'=>$item->in_stock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->new_to], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <!--/ product-promo-text -->

                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#id_<?php echo e($item->id); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                            <a><span class="ti-heart <?php if(auth()->guard()->check()): ?> add_to_wishlist <?php else: ?> forbidden_wishlist <?php endif; ?>" class="ti-heart"  data-product_id="<?php echo e($item->id); ?>" data-product_slug="<?php echo e($item->slug); ?>" data-category_id="<?php echo e($category_ids[$item->id]->category_id); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>
                                                        </div>

                                                    </div>
                                                    <div class="product-details">
                                                            <a class="product-name" href="<?php echo e(url('product/'.$item->slug.'/'. $category_ids[$item->id]->category_id)); ?>">
                                                            <?php echo e($item->product_name); ?>

                                                        </a>
                                                        <div class="product-short-description">
                                                            <?php echo e($item->short_description ?? $item->short_description ?? null); ?>

                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            <?php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->avg_rating)){  ?>
                                                                                        <li><i class="las la-star"></i></li>
                                                                            <?php
                                                                                    }else { ?>
                                                                                        <li><i class="lar la-star"></i></li>
                                                                            <?php        }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <?php if($item->special_price>0 && $item->special_price>0 && $item->special_price < $item->price): ?>
                                                                        <span class="promo-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->special_price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                            <?php else: ?>
                                                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->special_price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                        <span class="old-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                            <?php else: ?>
                                                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php else: ?>
                                                                        <span class="price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                            <?php else: ?>
                                                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <?php if(($item->manage_stock==1 && $item->qty==0) || ($item->in_stock==0)): ?>
                                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                <?php else: ?>
                                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-options">
                                                        <div class="product-price mt-2">
                                                            <?php if($item->special_price>0 && $item->special_price>0 && $item->special_price < $item->price): ?>
                                                                <span class="promo-price">
                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                        <?php echo e(number_format((float)$item->special_price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    <?php else: ?>
                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->special_price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                                <span class="old-price">
                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                        <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    <?php else: ?>
                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                            <?php else: ?>
                                                                <span class="price">
                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                        <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    <?php else: ?>
                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php if(($item->manage_stock==1 && $item->qty==0) || ($item->in_stock==0)): ?>
                                                            <button class="button style1 sm d-block w-100 mt-3 mb-3" disabled title="<?php echo e(__('file.Out of Stock')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i><?php echo e(__('file.Add to cart')); ?></button>
                                                        <?php else: ?>
                                                            <button class="button style1 sm d-block w-100 mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('file.Add to cart')); ?>"><i class="las la-cart-plus"></i><?php echo e(__('file.Add to cart')); ?></button>
                                                        <?php endif; ?>
                                                        <a class="button style1 sm d-block align-items-center <?php if(auth()->guard()->check()): ?> add_to_wishlist <?php else: ?> forbidden_wishlist <?php endif; ?>" data-product_id="<?php echo e($item->id); ?>" data-product_slug="<?php echo e($item->slug); ?>" data-category_id="<?php echo e($category->id  ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('file.Add to wishlist')); ?>"><span class="ti-heart <?php if(auth()->guard()->check()): ?> add_to_wishlist <?php else: ?> forbidden_wishlist <?php endif; ?>"></span><?php echo e(__('file.Add to wishlist')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Shop Page Ends-->

        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if(isset($category_ids[$item->id])): ?>
                <?php echo $__env->make('frontend.includes.quickshop_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('public/frontend/js/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript">

        /*------------------------
             price range slider
        --------------------------*/
        let moneySymbol = "<?php echo ($CHANGE_CURRENCY_SYMBOL!=NULL ? $CHANGE_CURRENCY_SYMBOL : env('DEFAULT_CURRENCY_SYMBOL')) ?>";
        if ($('#slider-range').length) {
            $("#slider-range").slider({
                range: true,
                min: 0 * <?php echo e($CHANGE_CURRENCY_RATE); ?>,
                max: 10000 * <?php echo e($CHANGE_CURRENCY_RATE); ?>,
                values: [0 * <?php echo e($CHANGE_CURRENCY_RATE); ?>, 5000 * <?php echo e($CHANGE_CURRENCY_RATE); ?>],
                slide: function(event, ui) {
                    $("#amount").val(moneySymbol+' '+ + ui.values[0] + " - "+moneySymbol+' ' + ui.values[1]);
                }
            });
            $("#amount").val(moneySymbol+' '+ $("#slider-range").slider("values", 0) +
                " - "+moneySymbol+' '+ $("#slider-range").slider("values", 1));
        }

        $('#sidebarFilter').on('submit',function (e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('cartpro.shop_sidebar_filter')); ?>",
                data: form.serialize(),
                success: function(data){
                    console.log(data);
                    $('.shopProductsField').empty().html(data);
                }
            });
            console.log(form);
        });


        //Limit Product Show
        $(document).on('click','.limitShopProductShow',function(event) {
            event.preventDefault();
            var limit_data = $(this).data('id');
            $.ajax({
                url: "<?php echo e(route('cartpro.limit_shop_product_show')); ?>",
                type: "GET",
                data: {limit_data:limit_data},
                success: function (data) {
                    console.log(data);
                    $('.shopProductsField').empty().html(data);
                }
            })
        });

        $('.sortBy').on('click',function(e){
            e.preventDefault();
            var condition = $(this).data('condition');
            $.ajax({
                url: "<?php echo e(route('cartpro.shop_products_show_sortby')); ?>",
                type: "GET",
                data: {condition:condition},
                success: function (data) {
                    console.log(data);
                    $('.shopProductsField').empty();
                    $('.shopProductsField').html(data);
                }
            })
        });

        $(document).on('click','.forbidden_wishlist',function(event) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please Login First',
            });
        });

        // let attribute_values = [];
        // $('.attribute_value').on('click',function(e){
        //     $(this).addClass('text-primary');
        //     var selectedVal = $(this).data('attribute_value_id');
        //     attribute_values.push(selectedVal);
        //     $('#attribute_value_ids').val(attribute_values);
        // });


        $('.attribute_value_productTab1').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');
            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_shop').val(values);
        });

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/frontend/pages/shop_products.blade.php ENDPATH**/ ?>