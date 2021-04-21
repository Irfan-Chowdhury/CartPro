<?php $__env->startSection('admin_content'); ?>
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3">Items of <?php echo e($menu->menu_name); ?></h4>
        <div id="success_alert" role="alert"></div>
        <br>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i><?php echo e(__(' Add New Menu Item')); ?></button>
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> <?php echo e(__('Bulk delete')); ?></button>
    </div>
    <div class="table-responsive">
    	<table id="menu_item_table" class="table ">
    	    <thead>
        	   <tr>
                    <th class="not-exported"></th>
                    
                    <th scope="col"><?php echo e(__('Item Name')); ?></th>
                    <th scope="col"><?php echo e(__('Type')); ?></th>
                    <th scope="col"><?php echo e(__('Parent')); ?></th>
                    <th scope="col"><?php echo e(__('Status')); ?></th>
                    <th scope="col"><?php echo e(trans('file.action')); ?></th>
        	   </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td><?php echo e($item->item_name); ?></td>
                        <td><?php echo e($item->type); ?></td>
                        <td> <?php if(isset($item->parentMenu->item_name)): ?> <?php echo e($item->parentMenu->item_name); ?> <?php else: ?> NONE <?php endif; ?> </td>
                        <td> <?php if($item->is_active==1): ?> <span class='p-2 badge badge-success'>Active</span> <?php else: ?> <span class='p-2 badge badge-danger'>Deactive</span> <?php endif; ?> </td>
                        <td>
                            <a href="#" class="btn btn-info"><i class="dripicons-pencil"></i></a>
						    <a href="<?php echo e(route('admin.menu.menu_item.delete',$item->id)); ?>" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger"><i class="dripicons-trash"></i></a></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
    	</table>
    </div>
</section>

<?php echo $__env->make('admin.pages.menu.menu_item.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<script type="text/javascript">

    $('#type').change(function() {
        var type = $('#type').val();

        if (type){
            $.get("<?php echo e(route('admin.menu.menu_item.data-fetch-by-type')); ?>",{type:type}, function (data) {
                console.log(data)
                $('#dependancyType').empty().html(data);
            });
        }else{
            // $('#designationId').empty().html('<option>--Select --</option>');
        }
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/menu/menu_item/index.blade.php ENDPATH**/ ?>