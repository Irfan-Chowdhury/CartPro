
<?php $__env->startSection('admin_content'); ?>

<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3">Flash Sale</h4>
        <div id="success_alert" role="alert"></div>
        <br>
            
	    <a href="<?php echo e(route('admin.flash_sale.create')); ?>" class="btn btn-info">
	    	<i class="fa fa-plus"></i> <?php echo e(__('Create Flash Sale')); ?>

        </a>
            
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete">
        	<i class="fa fa-minus-circle"></i> <?php echo e(__('Bulk Action')); ?>

        </button>
            
    </div>
    <div class="table-responsive">
    	<table id="AtttributeSetTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>    
        		    <th scope="col"><?php echo e(trans('Campaign Name')); ?></th>
        		    <th scope="col"><?php echo e(trans('Status')); ?></th>
        		    <th scope="col"><?php echo e(trans('Action')); ?></th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>

</section>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/flash_sale/index.blade.php ENDPATH**/ ?>