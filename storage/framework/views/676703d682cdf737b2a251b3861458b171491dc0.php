<?php if(($manage_stock==1 && $qty==0) || ($in_stock==0)): ?>
    <div class="product-promo-text style1 bg-danger">
        <span><?php echo app('translator')->get('file.Stock Out'); ?></span>
    </div>
<?php elseif($current_date <= $new_to): ?>
    <div class="product-promo-text style1">
        <span><?php echo app('translator')->get('file.New'); ?></span>
    </div>
<?php endif; ?>

<!-- product-promo-text -->

<!--/ product-promo-text -->
<?php /**PATH /var/www/html/cartpro/cartproshop_v2/resources/views/frontend/includes/product-promo-text.blade.php ENDPATH**/ ?>