<?php $__env->startSection('admin_content'); ?>
<section>
    <div class="container-fluid"><span id="general_result"></span></div>

    <?php echo $__env->make('admin.includes.alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mb-3">

		<div class="d-flex">
			<div class="p-2">
				<h2 class="font-weight-bold mt-3">Language</h2>
				<div id="success_alert" role="alert"></div>
        		<br>
			</div>
			<div class="ml-auto p-2">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Language</li>
					</ol>
				</nav>
			</div>
		</div>

        <?php if(auth()->user()->can('locale-store')): ?>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i><?php echo e(__('Add Language')); ?></button>
        <?php endif; ?>
        
    </div>
    <div class="table-responsive">
    	<table id="menu_table" class="table ">
    	    <thead>
        	   <tr>
        		    
        		    
        		    <th scope="col"><?php echo e(__('Language Name')); ?></th>
        		    <th scope="col"><?php echo e(__('Local')); ?></th>
        		    <th scope="col"><?php echo e(__('Default')); ?></th>
        		    <th scope="col"><?php echo e(trans('file.action')); ?></th>
        	   </tr>
    	  	</thead>
			<tbody>
				<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						
						<td><?php echo e($item->language_name); ?></td>
						<td><?php echo e($item->local); ?></td>
						<td><?php if($item->local == Session::get('currentLocal')): ?> <span class='p-2 badge badge-success'>Default</span> <?php else: ?> <span class='p-2 badge badge-dark'>None</span> <?php endif; ?></td>
						<td>

							
							<a href="<?php echo e(route('admin.setting.language.delete',$item->id)); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><i class="dripicons-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>

    	</table>
    </div>
</section>

<?php echo $__env->make('admin.pages.setting.language.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/setting/language/index.blade.php ENDPATH**/ ?>