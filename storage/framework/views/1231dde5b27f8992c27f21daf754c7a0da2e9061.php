<?php $__env->startSection('admin_content'); ?>
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

		<div class="d-flex">
			<div class="p-2">
				<h2 class="font-weight-bold mt-3"><?php echo e(trans('file.Menus')); ?></h2>
				<div id="alert_message" role="alert"></div>
        		<br>
			</div>
			<div class="ml-auto p-2">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><?php echo e(trans('file.Dashboard')); ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Menu')); ?></li>
					</ol>
				</nav>
			</div>
		</div>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i> <?php echo e(trans('file.Add_Menu')); ?></button>
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> <?php echo e(trans('file.Bulk_Action')); ?></button>
    </div>
    <div class="table-responsive">
    	<table id="data_table_list" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>
        		    <th scope="col"><?php echo e(__('Menu Name')); ?></th>
        		    <th scope="col"><?php echo e(__('Status')); ?></th>
        		    <th scope="col"><?php echo e(trans('file.action')); ?></th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>
</section>

<?php echo $__env->make('admin.pages.menu.create_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.pages.menu.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script type="text/javascript">

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
    });

	$(document).ready(function () {
        let table = $('#data_table_list').DataTable({
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
                url: "<?php echo e(route('admin.menu')); ?>",
            },

            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'menu_name',
                    name: 'menu_name',
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


	//----------Insert Data----------------------
    $("#save-button").on("click",function(e){
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.menu.store')); ?>",
            type: "POST",
            data: $('#submitForm').serialize(),
            success: function(data){
                console.log(data);
                if (data.errors) {
                    $("#alertMessage").addClass('bg-danger text-center text-light p-1').html(data.errors) //Check in create modal
                }
                else if(data.success){
                    $("#createModalForm").modal('hide');
                    $('#data_table_list').DataTable().ajax.reload();
                    $('#submitForm')[0].reset();
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                    // ("#alertMessage").removeClass('bg-danger text-center text-light p-1');
                }
            }
        });
    });

    //---------- Edit -------------
    $(document).on('click', '.edit', function () {
        var rowId = $(this).data("id");
        $('#success_alert').html('');

        $.ajax({
            url: "<?php echo e(route('admin.menu.edit')); ?>",
            type: "GET",
            data: {menu_id:rowId},
            success: function (data) {

                console.log(data)

                $('#menu_id').val(data.menu.id);
                $('#menu_translation_id').val(data.menuTranslation.id);

                if (data.menuTranslation.menu_name!=null) {
                    $('#menu_name_edit').val(data.menuTranslation.menu_name);
                }else{
                    $('#menu_name_edit').empty();
                }

                if (data.menu.is_active == 1) {
                        $('#is_active_edit').prop('checked', true);
                } else {
                    $('#is_active_edit').prop('checked', false);
                }
                $('#editModal').modal('show');
            }
        })
    });


    //---------- Update -------------
    $("#updateForm").on("submit",function(e){
        e.preventDefault();

        // console.log('ok');

        $.ajax({
            url: "<?php echo e(route('admin.menu.update')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#error_message_edit').html(html).slideDown(300).delay(5000).slideUp(300);
                }
                else if(data.success){
                    $('#data_table_list').DataTable().ajax.reload();
                    $('#updateForm')[0].reset();
                    $("#editModal").modal('hide');
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //---------- Active -------------
    $(document).on("click",".active",function(e){
        e.preventDefault();
        var id = $(this).data("id");

        $.ajax({
            url: "<?php echo e(route('admin.menu.active')); ?>",
            type: "GET",
            data: {id:id},
            success: function(data){
                console.log(data);
                if(data.success){
                    $('#data_table_list').DataTable().ajax.reload();
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //---------- Inactive -------------
    $(document).on("click",".inactive",function(e){
        e.preventDefault();
        var id = $(this).data("id");

        $.ajax({
            url: "<?php echo e(route('admin.menu.inactive')); ?>",
            type: "GET",
            data: {id:id},
            success: function(data){
                console.log(data);
                if(data.success){
                    $('#data_table_list').DataTable().ajax.reload();
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/menu/test.blade.php ENDPATH**/ ?>