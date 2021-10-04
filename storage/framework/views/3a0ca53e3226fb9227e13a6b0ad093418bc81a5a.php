<?php $__env->startSection('admin_content'); ?>


<section>
    <div class="container-fluid"><span id="general_result"></span></div>

    <div class="container-fluid mb-3">
        <h4 class="font-weight-bold mt-3">Products</h4>
        <div id="success_alert" role="alert"></div>
        <br>

        <?php if(auth()->user()->can('product-store')): ?>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-info">
                <i class="fa fa-plus"></i> <?php echo e(__('Create Product')); ?>

            </a>
        <?php endif; ?>
        <?php if(auth()->user()->can('product-action')): ?>
            <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_action">
                <i class="fa fa-minus-circle"></i> <?php echo e(trans('file.Bulk Action')); ?>

            </button>
        <?php endif; ?>
    </div>

    <div class="table-responsive">
    	<table id="productTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>
        		    <th scope="col"><?php echo e(__('Thumbnail')); ?></th>
        		    <th scope="col"><?php echo e(__('Name')); ?></th>
        		    <th scope="col"><?php echo e(__('Price')); ?></th>
					<th scope="col"><?php echo e(trans('file.Status')); ?></th>
					<th scope="col"><?php echo e(trans('file.action')); ?></th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>
</section>

<?php echo $__env->make('admin.includes.confirm_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
	$(document).ready(function () {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		let table = $('#productTable').DataTable({
			initComplete: function () {
				this.api().columns([1]).every(function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.appendTo($(column.footer()).empty())
						.on('change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function (d, j) {
						select.append('<option value="' + d + '">' + d + '</option>');
						$('select').selectpicker('refresh');
					});
				});
			},
			responsive: true,
			fixedHeader: {
				header: true,
				footer: true
			},
			processing: true,
			serverSide: true,
			ajax: {
				url: "<?php echo e(route('admin.products.index')); ?>",
			},
			columns: [
				{
					data: null,
					orderable: false,
					searchable: false
				},
				{
					data: 'image',
					name: 'image',
				},
				{
					data: 'product_name',
					name: 'product_name',
				},
				{
					data: 'price',
					name: 'price',
				},

				{
					data: 'is_active',
					name: 'is_active',
					render:function (data) {
						if (data == 1) {
							return "<span class='p-2 badge badge-success'>Active</span>";
						}else{
							return "<span class='p-2 badge badge-danger'>Inactive</span>";
						}
					}
				},
				{
					data: 'action',
					name: 'action',
					orderable: false,
				}
			],

			"order": [],
			'language': {
				'lengthMenu': '_MENU_ <?php echo e(__("records per page")); ?>',
				"info": '<?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)',
				"search": '<?php echo e(trans("file.Search")); ?>',
				'paginate': {
					'previous': '<?php echo e(trans("file.Previous")); ?>',
					'next': '<?php echo e(trans("file.Next")); ?>'
				}
			},
			'columnDefs': [
				{
					"orderable": false,
					//'targets': [0, 3],
					'targets': [0],
				},
				{
					'render': function (data, type, row, meta) {
						if (type === 'display') {
							data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
						}

						return data;
					},
					'checkboxes': {
						'selectRow': true,
						'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
					},
					'targets': [0]
				}
			],
			'select': {style: 'multi', selector: 'td:first-child'},
			'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
			dom: '<"row"lfB>rtip',
			buttons: [
				{
					extend: 'pdf',
					text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
					exportOptions: {
						columns: ':visible:Not(.not-exported)',
						rows: ':visible'
					},
				},
				{
					extend: 'csv',
					text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
					exportOptions: {
						columns: ':visible:Not(.not-exported)',
						rows: ':visible'
					},
				},
				{
					extend: 'print',
					text: '<i title="print" class="fa fa-print"></i>',
					exportOptions: {
						columns: ':visible:Not(.not-exported)',
						rows: ':visible'
					},
				},
				{
					extend: 'colvis',
					text: '<i title="column visibility" class="fa fa-eye"></i>',
					columns: ':gt(0)'
				},
			],
		});
		new $.fn.dataTable.FixedHeader(table);
	});


	//---------- Active -------------
	$(document).on("click",".active",function(e){
		e.preventDefault();
		var productId = $(this).data("id");
		console.log(productId);

		$.ajax({
			url: "<?php echo e(route('admin.products.active')); ?>",
			type: "GET",
			data: {id:productId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#productTable').DataTable().ajax.reload();
                    $('#success_alert').fadeIn("slow"); //Check in top in this blade
                    $('#success_alert').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#success_alert').fadeOut("slow");
                    }, 3000);
                }
			}
		});
	});

	//---------- Inactive -------------
	$(document).on("click",".inactive",function(e){
		e.preventDefault();
		var productId = $(this).data("id");
		console.log(productId);

		$.ajax({
			url: "<?php echo e(route('admin.products.inactive')); ?>",
			type: "GET",
			data: {id:productId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#productTable').DataTable().ajax.reload();
                    $('#success_alert').fadeIn("slow"); //Check in top in this blade
                    $('#success_alert').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#success_alert').fadeOut("slow");
                    }, 3000);
                }
			}
		});
	});

    //Bulk Action
    $("#bulk_action").on("click",function(){
        var idsArray = [];
        let table = $('#productTable').DataTable();
        idsArray = table.rows({selected: true}).ids().toArray();

        if(idsArray.length === 0){
            alert("Please Select at least one checkbox.");
        }else{
            $('#bulkConfirmModal').modal('show');
            let action_type;

            $("#active").on("click",function(){
                action_type = "active";
                $.ajax({
                    url: "<?php echo e(route('admin.products.bulk_action')); ?>",
                    method: "GET",
                    data: {idsArray:idsArray,action_type:action_type},
                    success: function (data) {
                        console.log(idsArray);
                        if(data.success){
                            $('#bulkConfirmModal').modal('hide');
                            table.rows('.selected').deselect();
                            $('#productTable').DataTable().ajax.reload();
                            $('#success_alert').fadeIn("slow"); //Check in top in this blade
                            $('#success_alert').addClass('alert alert-success').html(data.success);
                            setTimeout(function() {
                                $('#success_alert').fadeOut("slow");
                            }, 3000);
                        }
                    }
                });
            });
            $("#inactive").on("click",function(){
                action_type = "inactive";
                console.log(idsArray);

                $.ajax({
                    url: "<?php echo e(route('admin.products.bulk_action')); ?>",
                    method: "GET",
                    data: {idsArray:idsArray,action_type:action_type},
                    success: function (data) {
                        if(data.success){
                            $('#bulkConfirmModal').modal('hide');
                            table.rows('.selected').deselect();
                            $('#productTable').DataTable().ajax.reload();
                            $('#success_alert').fadeIn("slow"); //Check in top in this blade
                            $('#success_alert').addClass('alert alert-success').html(data.success);
                            setTimeout(function() {
                                $('#success_alert').fadeOut("slow");
                            }, 3000);
                        }
                    }
                });
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/product/index.blade.php ENDPATH**/ ?>