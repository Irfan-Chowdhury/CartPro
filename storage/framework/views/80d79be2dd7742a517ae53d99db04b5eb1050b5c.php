<?php $__env->startSection('frontend_content'); ?>
    <!--FAQ Section starts-->
    <section class="faq-section">
        <div class="container">
            <div class="col-12">
            </div>
            <div class="row">
                <?php if($page->pageTranslation): ?>
                    <?php echo $page->pageTranslation->body; ?>

                <?php else: ?>
                    
                <?php endif; ?>


            </div>
        </div>
    </section>
    <!--FAQ Section ends-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/frontend/pages/page.blade.php ENDPATH**/ ?>