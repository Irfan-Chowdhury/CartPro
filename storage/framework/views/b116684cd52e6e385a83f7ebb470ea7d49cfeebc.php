<?php $__env->startSection('title',$product->productTranslation->product_name); ?>
<?php $__env->startSection('frontend_content'); ?>

    <!--Product details section starts-->
    <section class="product-details-section">
        <div class="container">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="home.html">Shop</a></li>
                    <li><a href="home.html">Women</a></li>
                    <li class="active">White Striped top</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-6 mar-bot-30">
                    <div class="slider-wrapper">
                        <div class="slider-nav">
                             <?php if($product->baseImage): ?>
                                <div class="slider-nav__item">
                                    <img src="<?php echo e(asset('public/'.$product->baseImage->image)); ?>" alt="..." />
                                </div>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $product->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="slider-nav__item">
                                    <img src="<?php echo e(asset('public/'.$value->image)); ?>" alt="..." />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>

                        <div class="slider-for">
                            <?php if($product->baseImage): ?>
                                <div class="slider-for__item ex1">
                                    <img src="<?php echo e(asset('public/'.$product->baseImage->image)); ?>" alt="..." />
                                </div>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $product->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="slider-for__item ex1">
                                    <img src="<?php echo e(asset('public/'.$value->image)); ?>" alt="..." />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="mb-3" id="productAddToCartSingle" action="<?php echo e(route('product.add_to_cart')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        <input type="hidden" name="product_slug" value="<?php echo e($product->slug); ?>">
                        <input type="hidden" name="category_id" value="<?php echo e($category->id ?? null); ?>">
                        
                        <input type="hidden" name="value_ids" class="value_ids" id="value_ids">

                        <div class="item-details">
                            <a class="item-category" href="<?php echo e($category->slug); ?>"><?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></a>
                            <h3 class="item-name"><?php echo e($product->productTranslation->product_name ?? $product->productTranslationEnglish->product_name ?? NULL); ?></h3>
                            <div class="d-flex justify-content-between">
                                <div class="item-brand">Brand: <a href=""><?php echo e($product->brandTranslation->brand_name ?? $product->brandTranslationEnglish->brand_name ?? null); ?></a></div>
                                <div class="item-review">
                                    <ul class="p-0 m-0">
                                        <li><i class="ion-ios-star"></i></li>
                                        <li><i class="ion-ios-star"></i></li>
                                        <li><i class="ion-ios-star"></i></li>
                                        <li><i class="ion-ios-star"></i></li>
                                        <li><i class="ion-android-star-half"></i></li>
                                    </ul>
                                    <span>( 04 )</span>
                                </div>
                                <div class="item-sku">SKU: LC123456789</div>
                            </div>
                            <hr>
                            <?php if($product->special_price!=NULL && $product->special_price>0 && $product->special_price<$product->price): ?>
                                <div class="item-price">
                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                        <?php echo e(number_format((float)$product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                    <?php else: ?>
                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                    <?php endif; ?>
                                </div>
                                <div class="old-price">
                                    <del>
                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                            <?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                        <?php else: ?>
                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                        <?php endif; ?>
                                    </del>
                                </div>
                            <?php else: ?>
                                <div class="item-price">
                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                        <?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                    <?php else: ?>
                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <hr>
                            <div class="item-short-description">
                                <p><?php echo e(strip_tags($product->productTranslation->short_description ?? $product->productTranslationDefaultEnglish->short_description ?? NULL)); ?></p>
                            </div>
                            <hr>
                            <?php $__empty_1 = true; $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="item-variant">
                                    <span><?php echo e($item); ?>:</span>
                                    <input type="hidden" name="attribute_name[]" class="attribute_name" value="<?php echo e($item); ?>">
                                    <ul class="product-variant size-opt p-0 mt-1">
                                        <?php $__empty_2 = true; $__currentLoopData = $product->productAttributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <?php if($value->attribute_id == $key): ?>
                                                <li class="attribute_value" data-attribute_name="<?php echo e($value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null); ?>" data-value_id="<?php echo e($value->attribute_value_id); ?>" data-value_name="<?php echo e($value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null); ?>"><span><?php echo e($value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null); ?></span></li>
                                                <input type="hidden" name="value_id[]" value="<?php echo e($value->attribute_value_id); ?>">
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>

                            <div class="item-options">
                                    <div class="input-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus">
                                                <span class="ti-minus"></span>
                                            </button>
                                        </span>
                                        <input type="number" name="qty" class="input-number" value="<?php echo e($product_cart_qty ?? 1); ?>" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus">
                                                <span class="ti-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>Add to cart</span></span></button>
                                    <a>
                                        <button class="button button-icon style4 sm" id="addToWishList" data-product_id="<?php echo e($product->id); ?>" data-product_slug="<?php echo e($product->slug); ?>" data-category_id="<?php echo e($category->id ?? null); ?>" data-qty="1"><span><i class="ti-heart"></i> <span>Add to wishlist</span></span></button>
                                        
                                    </a>
                                    
                            </div>
                            <hr>
                            <div class="item-share mt-3"><span>Share</span>
                                <ul class="footer-social d-inline pad-left-15">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Product details section ends-->
    <!--content wrapper section starts-->
    <section class="content-wrapper-section no-pad-top no-pad-bot">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tabs style2">
                    <ul class="nav nav-tabs mar-top-30 product-details-tab" id="lionTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="branding-tab_one" data-bs-toggle="tab" href="#size" role="tab" aria-selected="false">Size Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="branding-tab_two" data-bs-toggle="tab" href="#shipping" role="tab" aria-selected="false">Shipping</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="graphic-design-tab" data-bs-toggle="tab" href="#comments" role="tab" aria-selected="false">Reviews <span class="text-grey"> (<?php echo e(count($reviews)); ?>)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content product-description" id="lionTabContent">
            <div class="container">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="desc-intro">
                        <?php echo $product->productTranslation->description ?? $product->productTranslationDefaultEnglish->description ?? null; ?>

                    </div>
                </div>
                <div class="tab-pane fade" id="size" role="tabpanel" aria-labelledby="graphic-design-tab">
                    <div class="table-content table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Size</th>
                                    <th class="cart-product-name">Bust</th>
                                    <th class="plantmore-product-price">Waist</th>
                                    <th class="plantmore-product-quantity">Hips</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="shipping" role="tabpanel">
                    <p class="mar-bot-30">*Estimated Shipping times throughout North America </p>
                    <div class="table-content table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Shipping Type</th>
                                    <th class="cart-product-name">Cost</th>
                                    <th class="plantmore-product-price">Estimated Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="mar-top-30">Exclude all mexico and International orders.Please see contact page for International policies.</p>
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="h5"> <?php echo e(count($reviews)); ?> reviews for White Striped top</h3>
                            <div class="item-reviews">

                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row mar-tb-30 mt-3">
                                        <div class="col-md-2">
                                            <div class="reviewer-img">
                                                <?php if($item->image==null): ?>
                                                    <img src="<?php echo e(asset('public/images/user_default_image.jpg')); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>">
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <ul class="product-rating">
                                                <?php
                                                    for ($i=1; $i <=5 ; $i++){
                                                        if ($i<=$item->rating){  ?>
                                                            <li><i class="ion-android-star"></i></li>
                                                <?php
                                                        }else { ?>
                                                            <li><i class="ion-android-star-outline"></i></li>
                                                <?php        }
                                                    }
                                                ?>
                                            </ul>
                                            <h5 class="reviewer-text"><?php echo e($item->first_name.' '.$item->last_name); ?>- <span> <?php echo e(date('d M, Y',strtotime($item->created_at))); ?></span></h5>
                                            <p><?php echo e($item->comment); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="comment-respond">
                                <h3 class="h5">Write your Review</h3>
                                <span>Your email address will not be published. Required fields are marked with *</span>

                                <form action="<?php echo e(route('review.store')); ?>" method="post" class="row contact-form mar-top-20">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <input type="hidden" name="rating" id="rating" value="0">

                                    <div class="col-sm-12">
                                        <label >Your Rating</label>
                                        <ul class="product-rating">
                                            <li><i class="ion-ios-star-outline" id="star_1"></i></li>
                                            <li><i class="ion-ios-star-outline" id="star_2"></i></li>
                                            <li><i class="ion-ios-star-outline" id="star_3"></i></li>
                                            <li><i class="ion-ios-star-outline" id="star_4"></i></li>
                                            <li><i class="ion-ios-star-outline" id="star_5"></i></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 text-area">
                                        <textarea id="comment" required <?php if(!$user_and_product_exists): ?> readonly <?php endif; ?> class="form-control" placeholder="Your Review....*" name="comment" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="author" required <?php if(!$user_and_product_exists): ?> readonly <?php endif; ?> class="form-control" placeholder="Name*" name="author" type="text" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="subject" required <?php if(!$user_and_product_exists): ?> readonly <?php endif; ?> class="form-control" placeholder="Email*" name="email" type="email" required>
                                    </div>

                                    <?php if(!$user_and_product_exists): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </symbol>
                                        </svg>
                                        <div class="m-3 alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <div>
                                                <?php echo e(__('file.Please login first and buy this product')); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-sm-12 mar-top-20 mt-3">
                                        <button class="button style1" <?php if(!$user_and_product_exists): ?> disabled title="Please login first" <?php endif; ?>  name="submit" type="submit" id="submit">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <!--content wrapper ends-->
    <!--Product area starts-->
    
    <!--product area ends-->

    <?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $('#addToWishList').on("click",function(e){
            var product_id = $(this).data('product_id');
            var category_id = $(this).data('category_id');
            var product_slug = $(this).data('product_slug');

            console.log(product_id);
            console.log(category_id);
            console.log(product_slug);
            $.ajax({
                url: "<?php echo e(route('wishlist.add')); ?>",
                type: "GET",
                data: {
                    product_id:product_id,
                    category_id:category_id,
                    product_slug:product_slug
                },
                success: function (data) {
                    if (data.type=='success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                        })
                    }
                    $('.wishlist_count').text(data.wishlist_count);
                }
            })
        });

        $('#star_1').on('click',function(){
            $('#star_1').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#rating').val(1);

            $('#star_2').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
            $('#star_3').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
            $('#star_4').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
            $('#star_5').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
        })
        $('#star_2').on('click',function(){
            $('#star_1').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_2').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#rating').val(2);
            $('#star_3').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
            $('#star_4').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
            $('#star_5').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
        })
        $('#star_3').on('click',function(){
            $('#star_1').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_2').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_3').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#rating').val(3);
            $('#star_4').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
            $('#star_5').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
        })
        $('#star_4').on('click',function(){
            $('#star_1').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_2').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_3').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_4').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#rating').val(4);
            $('#star_5').removeClass('ion-ios-star').addClass('ion-ios-star-outline');
        })
        $('#star_5').on('click',function(){
            $('#star_1').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_2').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_3').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_4').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#star_5').removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            $('#rating').val(5);
        })
    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/frontend/pages/product_details.blade.php ENDPATH**/ ?>