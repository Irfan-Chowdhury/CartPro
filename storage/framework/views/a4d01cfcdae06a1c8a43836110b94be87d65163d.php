<?php $__env->startSection('admin_content'); ?>
<section>

    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3"><?php echo e($tr->translate('Attributes')); ?></h4>
        <div id="success_alert" role="alert"></div>
        <br>

	    <a href="<?php echo e(route('admin.attribute.create')); ?>" class="btn btn-info">
	    	<i class="fa fa-plus"></i> <?php echo e($tr->translate('Create Attribute')); ?>

        </a>

        
    </div>
    <div class="table-responsive">
    	<table id="AtttributeTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>
        		    <th scope="col"><?php echo e($tr->translate('Name')); ?></th>
        		    <th scope="col"><?php echo e($tr->translate('Attribute Set')); ?></th>
        		     <th scope="col"><?php echo e($tr->translate('Filterable')); ?></th>
        		    <th scope="col"><?php echo e($tr->translate('Status')); ?></th>
        		   <th scope="col"><?php echo e($tr->translate('Action')); ?></th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>
</section>

<script type="text/javascript">
	$(document).ready(function () {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		let table = $('#AtttributeTable').DataTable({
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
				url: "<?php echo e(route('admin.attribute.index')); ?>",
			},
			columns: [
				{
					data: null,
					orderable: false,
					searchable: false
				},
				{
					data: 'attribute_name',
					name: 'attribute_name',
				},
				{
					data: 'attribute_set_name',
					name: 'attribute_set_name',
				},
				{
					data: 'is_filterable',
					name: 'is_filterable',
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
		var attributeId = $(this).data("id");
		var element = this;
		console.log(attributeId);

		$.ajax({
			url: "<?php echo e(route('admin.attribute.active')); ?>",
			type: "GET",
			data: {id:attributeId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#AtttributeTable').DataTable().ajax.reload();
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
		var attributeId = $(this).data("id");
		var element = this;
		console.log(attributeId);

		$.ajax({
			url: "<?php echo e(route('admin.attribute.inactive')); ?>",
			type: "GET",
			data: {id:attributeId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#AtttributeTable').DataTable().ajax.reload();
                    $('#success_alert').fadeIn("slow"); //Check in top in this blade
                    $('#success_alert').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#success_alert').fadeOut("slow");
                    }, 3000);
                }
			}
		});
	});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/attribute/index.blade.php ENDPATH**/ ?>