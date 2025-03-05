

<!-- Footer Description -->
<?php if(Request::routeIs('cartpro.home')): ?>
    <?php if($footerDescription && $footerDescription->is_active==1): ?>
        <section class="mb-3">
            <div class="container">
                <?php echo htmlspecialchars_decode($footerDescription->description ?? null); ?>

            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

<?php if($settingNewslatter && $settingNewslatter->newsletter==1): ?>
<div class="newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="d-flex align-items-center">
                    <div>
                        <i class="las la-paper-plane me-3"></i>
                    </div>
                    <div>
                        <h3 class="mb-0"><?php echo app('translator')->get('file.Subscribe to our Newsletter'); ?></h3>
                        <p><?php echo app('translator')->get('file.Subscribe and get notification about discounts'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <form class="newsletter" id="newsLatterSubmitForm" action="<?php echo e(route('cartpro.newslatter_store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="email" placeholder="Enter your email" name="email" required>
                    <button type="submit" class="button style1 btn-search"><?php echo app('translator')->get('file.Subscribe'); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!--Scroll to top starts-->
<a href="#" id="scrolltotop"><i class="ti-arrow-up"></i></a>
<!--Scroll to top ends-->
<!-- Footer section Starts-->
<div class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="footer-logo">
                    <a href="#"><img class="lazy" data-src="<?php echo e($headerLogoPath); ?>"></a>
                </div>
                <div class="footer-text">
                    <h5 class="text-grey mb-0"><?php echo app('translator')->get('file.Got Question? Call us'); ?> :</h5>
                    <h4><?php echo e($settingStore->store_phone ?? null); ?></h4>
                </div>
                <div class="footer-text">
                    <h6 class="text-grey mb-0"><?php echo app('translator')->get('file.Contact Info'); ?></h6>
                    <p class="mb-1"><i class="las la-envelope"></i> &nbsp; <span><?php echo e($settingStore->store_email ?? null); ?></span></p>
                    <p class="mb-1"><i class="las la-map-marker"></i> &nbsp; <span><?php echo e($storefrontAddress); ?></span></p>
                </div>
                <ul class="footer-social mt-3 p-0">
                    <?php if($storefrontFacebookLink!=null): ?>
                        <li><a href="<?php echo e($storefrontFacebookLink); ?>"><i class="ti-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if($storefrontTwitterLink!=null): ?>
                        <li><a href="<?php echo e($storefrontTwitterLink); ?>"><i class="ti-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if($storefrontInstagramLink!=null): ?>
                        <li><a href="<?php echo e($storefrontInstagramLink); ?>"><i class="ti-instagram"></i></a></li>
                    <?php endif; ?>
                    <?php if($storefrontYoutubeLink!=null): ?>
                        <li><a href="<?php echo e($storefrontYoutubeLink); ?>"><i class="ti-youtube"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3><?php echo e($footerMenuOneTitle); ?></h3>
                            <div class="d-flex justify-content-between">
                                <ul class="footer-menu p-0">
                                    <?php if($footerMenuOne): ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $footerMenuOne->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($value->locale==$locale): ?>
                                            <li><a class="" href="<?php echo e($value->link); ?>"><?php echo html_entity_decode($value->label); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3><?php echo e($footerMenuTitleTwo); ?></h3>
                            <ul class="footer-menu p-0">
                                <?php if($footerMenuTwo): ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $footerMenuTwo->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->locale==$locale): ?>
                                        <li><a class="" href="<?php echo e($value->link); ?>"><?php echo html_entity_decode($value->label); ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3><?php echo e($footerMenuTitleThree); ?></h3>
                            <ul class="footer-menu p-0">
                                <?php if($footerMenuThree): ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $footerMenuThree->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->locale==$locale): ?>
                                        <li><a class="" href="<?php echo e($value->link); ?>"><?php echo html_entity_decode($value->label); ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer Tags -->
        <hr>
        <div class="mt-3 mb-3">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-tags"><a href="<?php echo e(route('tag_wise_products',$item->slug)); ?>"><?php echo e($item->tag_name); ?></a></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="row footer-bottom mt-0">
            <div class="col-md-6">
                <p><?php echo html_entity_decode($storefrontCopyrightText); ?></p>
            </div>
            <div class="col-md-6">
                <div class="footer-payment-options">
                    <img class="lazy" data-src="<?php echo e($paymentMethodImage); ?>" width="342px" height="30px">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer section Ends-->
<!-- Cookie consent Starts-->

    <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Cookie consent Ends-->

<?php if(!Cookie::has('newslatter') && env('NEWSLATTER_POPUP_ENABLED')): ?>
    <div class="modal fade newsletter-modal" id="newsletter-modal" tabindex="-1" role="dialog" aria-labelledby="newsletter-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" style="background-image: url('<?php echo e(asset('public/images/storefront/newsletter/newslatter.jpg')); ?>') ;background-size: cover;background-position: bottom;">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="las la-times"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="h2 semi-bold"><?php echo app('translator')->get('file.Subscribe and get notification about discounts'); ?></h3>
                            <p class="lead mb-5"><?php echo app('translator')->get('file.Subscribe to our mailing list to receive updates on new arrivals, special offers and our promotions.'); ?></p>
                            <form class="newsletter mb-3" id="newsLatterSubmitFormPopUp" action="<?php echo e(route('cartpro.newslatter_store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input class="" type="email" placeholder="Enter your email" name="email" required>
                                <input type="hidden" name="disable_newslatter" value="0" id="disable_popup_newslatter">
                                <button type="submit" class="button style1 btn-search" type="submit">Subscribe</button>
                            </form>

                            <div class="form-check custom-control custom-checkbox mt-1">
                                <input class="custom-control-input" id="newslatterPopup" type="checkbox" value="1">
                                <label class="custom-control-label" for="newslatterPopup">
                                    <?php echo app('translator')->get('file.Got it! Do not show this popup again.'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!--Quick shop modal ends-->

<?php $__env->startPush('scripts'); ?>
    <script>
        (function ($) {
            $('#newslatterPopup').change(function() {
                if(this.checked) {
                    var newslatter = 'disable';
                    setTimeout(function() {
                        $('#newsletter-modal,.modal-backdrop').removeClass('show');
                        $('#newsletter-modal,.modal-backdrop').css('display','none');
                        $('body').removeClass('modal-open');
                        $('body').css('overflow-y','scroll');
                    }, 700);
                }else{
                    var newslatter = 'enable';
                }
                $.get({
                    url: "<?php echo e(route('cartpro.set_cookie')); ?>",
                    type: "GET",
                    data: {newslatter:newslatter},
                    success: function (data) {
                        console.log(data);
                        if (data=='disable') {
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
                                title: 'Newsletter disabled successfully'
                            })
                        }
                    }
                })
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/cartpro/cartproshop_v2/resources/views/frontend/includes/footer.blade.php ENDPATH**/ ?>