<?php $__env->startSection('admin_content'); ?>

<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">
        <h3 class="font-weight-bold mt-3"><?php echo e(__('file.Show Order')); ?></h3>
        <div id="success_alert" role="alert"></div>
        <br>
    </div>


    <div class="container">

        <input type="hidden" name="order_id" id="order_id" value="<?php echo e($order->id); ?>">

        <h4 class="ml-3"><?php echo e(__('file.Order & Account Information')); ?></h4>
        <hr>
        <div class="row ml-1">
            <div class="col-md-6">
                <h4><?php echo e(__('file.Order Information')); ?></h4>
                <table>
                    <tr>
                        <th><?php echo e(__('file.Order Date')); ?></th>
                        <td><?php echo e(date('d M, Y',strtotime($order->created_at))); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('file.Order Status')); ?></th>
                        <td>
                            <select name="order_status">
                                <option value="canceled" <?php if($order->order_status=='canceled'): ?> selected <?php endif; ?> class="orderStatus"><?php echo e(ucfirst('canceled')); ?></option>
                                <option value="completed" <?php if($order->order_status=='completed'): ?> selected <?php endif; ?> class="orderStatus"><?php echo e(ucfirst('completed')); ?></option>
                                <option value="onhold" <?php if($order->order_status=='onhold'): ?> selected <?php endif; ?> class="orderStatus"><?php echo e(ucfirst('onhold')); ?></option>
                                <option value="pending" <?php if($order->order_status=='pending'): ?> selected <?php endif; ?> class="orderStatus"><?php echo e(ucfirst('pending')); ?></option>
                                <option value="pending_payment" <?php if($order->order_status=='pending_payment'): ?> selected <?php endif; ?> class="orderStatus"><?php echo e(ucfirst('pending_payment')); ?></option>
                                <option value="proccessing" <?php if($order->order_status=='proccessing'): ?> selected <?php endif; ?> class="orderStatus"><?php echo e(ucfirst('proccessing')); ?></option>
                                <option value="refunded" <?php if($order->order_status=='refunded'): ?> selected <?php endif; ?> class="orderStatus"><?php echo e(ucfirst('refunded')); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('file.Shipping Method')); ?></th>
                        <td><?php echo e($order->shipping_method); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('file.Payment Method')); ?></th>
                        <td><?php echo e($order->payment_method); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('file.Currency')); ?> (pending)</th>
                        <td><?php echo e(__('file.INR')); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('file.Currency Rate')); ?> (pending)</th>
                        <td>454.2</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h4><?php echo e(__('file.Order Information')); ?></h4>
                <table>
                    <tr>
                        <th><?php echo e(__('file.Customer Name')); ?></th>
                        <td><?php echo e($order->billing_first_name); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('file.Customer Email')); ?></th>
                        <td><?php echo e($order->billing_email); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('file.Customer Phone')); ?></th>
                        <td><?php echo e($order->billing_phone); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('file.Customer Group')); ?> (Pending)</th>
                        <td>Irfan</td>
                    </tr>
                </table>
            </div>
        </div>


        <br><br>
        <h4 class="ml-3"><?php echo e(__('file.Address Information')); ?></h4>
        <hr>
        <div class="row ml-1">
            <div class="col-md-6">
                <h4><?php echo e(__('file.Billing Address')); ?></h4><br>
                <span><?php echo e($order->billing_address_1 ?? null); ?></span> <br>
                <span><?php echo e($order->billing_city ?? null); ?></span><br>
                <span><?php echo e($order->billing_state ?? null); ?></span><br>
                <span><?php echo e($order->billing_zip_code ?? null); ?></span><br>
                <span><?php echo e($order->billing_country ?? null); ?></span>
            </div>
            <div class="col-md-6">
                <h4><?php echo e(__('file.Shipping Address')); ?></h4><br>
                <span><?php echo e($order->shippingDetails->shipping_address_1 ?? null); ?></span> <br>
                <span><?php echo e($order->shippingDetails->shipping_city ?? null); ?></span><br>
                <span><?php echo e($order->shippingDetails->shipping_state ?? null); ?></span><br>
                <span><?php echo e($order->shippingDetails->shipping_zip_code ?? null); ?></span><br>
                <span><?php echo e($order->shippingDetails->shipping_country ?? null); ?></span>
            </div>
        </div>


        <br><br>
        <h4 class="ml-3"><?php echo e(__('file.Items Ordered')); ?></h4>
        <hr>
        <div class="row ml-1">
            <div class="col-md-12">
                <table>
                    <tr>
                        <th><?php echo e(__('file.Product')); ?></th>
                        <th><?php echo e(__('file.Unit Price')); ?></th>
                        <th><?php echo e(__('file.Quantity')); ?></th>
                        
                    </tr>

                    <?php $__empty_1 = true; $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->product->productTranslation->product_name); ?></td>
                            <td><?php echo e($item->subtotal); ?></td>
                            <td><?php echo e($item->qty); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

    <div class="table-responsive">

    </div>
</section>

<script type="text/javascript">
    $('.orderStatus').on('click',function(){
        var order_status = $(this).val();
        var order_id = $('#order_id').val();

        $.ajax({
            url: "<?php echo e(route('admin.order.status')); ?>",
                type: "GET",
                data: {
                    order_id:order_id,
                    order_status:order_status,
                },
                success: function (data) {
                    console.log(data);
                    // if (data.type=='success') {
                    //     location.reload(true);
                    // }
                }
        });
        //
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/order/order_details.blade.php ENDPATH**/ ?>