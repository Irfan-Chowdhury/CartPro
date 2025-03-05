<?php
    if (Session::has('currency_symbol')){
        $CHANGE_CURRENCY_SYMBOL = Session::get('currency_symbol');
    }else{
        $CHANGE_CURRENCY_SYMBOL = env('DEFAULT_CURRENCY_SYMBOL');
        Session::put('currency_symbol',$CHANGE_CURRENCY_SYMBOL);
    }
?>


<?php echo e($CHANGE_CURRENCY_SYMBOL); ?>

<?php /**PATH /var/www/html/cartpro/cartproshop_v2/resources/views/frontend/includes/SHOW_CURRENCY_SYMBOL.blade.php ENDPATH**/ ?>