<?php $__env->startSection('admin_content'); ?>
<section>
<?php
    // use Stichoza\GoogleTranslate\GoogleTranslate;
    // $local = Session::get('currentLocal');
    // $tr    = new GoogleTranslate($local);
?>

    <div class="container-fluid"><span id="success_alert"></span></div>
    <div class="container-fluid mb-3">

        
        <h4 class="font-weight-bold mt-3"><?php echo app('translator')->get('file.Brand'); ?></h4>
        <div id="success_alert" role="alert"></div>
        <br>

        <?php if(auth()->user()->can('brand-store')): ?>
            <button type="button" class="btn btn-info" name="create_record" id="create_record">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('file.Add Brand'); ?>
            </button>
        <?php endif; ?>
        <?php if(auth()->user()->can('brand-action')): ?>
            <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_action">
                <i class="fa fa-minus-circle"></i> <?php echo e(trans('file.Bulk_Action')); ?>

            </button>
        <?php endif; ?>

    </div>
    <div class="table-responsive">
    	<table id="brandListTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>
                    <th scope="col"><?php echo app('translator')->get('file.Logo'); ?></th>
        		    <th scope="col"><?php echo app('translator')->get('file.Brand Name'); ?></th>
        		    <th scope="col"><?php echo app('translator')->get('file.Status'); ?></th>
        		    <th scope="col"><?php echo app('translator')->get('file.Action'); ?></th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>

</section>

<?php echo $__env->make('admin.pages.brand.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.includes.confirm_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $('#brandListTable').DataTable({
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
                url: "<?php echo e(route('admin.brand')); ?>",
            },
            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'brand_logo',
                    name: 'brand_logo',
                },
                {
                    data: 'brand_name',
                    name: 'brand_name',
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
                    // 'targets': [0, 3],
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
    $("#submitForm").on("submit",function(e){
        // e.preventDefault();
        // var goalType = $("#brandListTable").val();

        $.ajax({
            url: "<?php echo e(route('admin.brand.store')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                // if (data.errors) {
                //     $("#goalType").addClass('is-invalid');
                //     $("#message").html(data.errors) //Check in create modal
                // }
                if(data.success){
                    $('#brandListTable').DataTable().ajax.reload();
                    $('#submitForm')[0].reset();
                    $("#formModal").modal('hide');
                    $('#success_alert').fadeIn("slow"); //Check in top in this blade
                    $('#success_alert').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#success_alert').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


	$('#create_record').click(function () {
		$('modal-title').text('<?php echo e(__('Add Account')); ?>');
		$('#action_button').val('<?php echo e(trans("file.Add")); ?>');
		$('#action').val('<?php echo e(trans("file.Add")); ?>');
		$('#formModal').modal('show');
	});

	// $('#brandListTable').on('click','.status',function () {
    //         let id = $(this).data('id');
    //         let status = $(this).data('status');

    //         var target = "<?php echo e(route('admin.brand')); ?>/" + id +'/'+ status  ;

    //         $.ajax({
    //             url:target,
    //             dataType:"json",
    //             success:function(data) {
    //                 let html = '';
    //                 if (data.success) {
    //                     html = '<div class="alert alert-success">'+data.success + "</div>";
    //                     $('#category_list-table').DataTable().ajax.reload();
    //                 }
    //                 $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
    //             }
    //         })
    //     });

	$('#sample_form').on('submit', function (event) {

            event.preventDefault();
            if ($('#action').val() === '<?php echo e(trans('file.Add')); ?>') {

                $.ajax({
                    url: "<?php echo e(route('admin.brand.store')); ?>",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        // let html = '';
                        // if (data.errors) {
                        //     html = '<div class="alert alert-danger">';
                        //     for (let count = 0; count < data.errors.length; count++) {
                        //         html += '<p>' + data.errors[count] + '</p>';
                        //     }
                        //     html += '</div>';
                        // }
                        // if (data.success) {
                        //     html = '<div class="alert alert-success">' + data.success + '</div>';
                        //     $('#sample_form')[0].reset();
                        //     $('#brandListTable').DataTable().ajax.reload();
                        // }
                        // $('#brandListTable').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                })
            }

            if ($('#action').val() === '<?php echo e(trans('file.Edit')); ?>') {


                $.ajax({
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        let html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (let count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            setTimeout(function () {
                                $('#formModal').modal('hide');
                                $('#brandListTable').DataTable().ajax.reload();
                                $('#sample_form')[0].reset();
                            }, 2000);

                        }
                        $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                });
            }
        });



    //---------- Active -------------
	$(document).on("click",".active",function(e){
		e.preventDefault();
		var id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "<?php echo e(route('admin.brand.active')); ?>",
			type: "GET",
			data: {id:id},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#brandListTable').DataTable().ajax.reload();
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
		var id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "<?php echo e(route('admin.brand.inactive')); ?>",
			type: "GET",
			data: {id:id},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#brandListTable').DataTable().ajax.reload();
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
        let table = $('#brandListTable').DataTable();
        idsArray = table.rows({selected: true}).ids().toArray();

        if(idsArray.length === 0){
            alert("Please Select at least one checkbox.");
        }else{
            $('#bulkConfirmModal').modal('show');
            let action_type;

            $("#active").on("click",function(){
                console.log(idsArray);
                action_type = "active";
                $.ajax({
                    url: "<?php echo e(route('admin.brand.bulk_action')); ?>",
                    method: "GET",
                    data: {idsArray:idsArray,action_type:action_type},
                    success: function (data) {
                        if(data.success){
                            $('#bulkConfirmModal').modal('hide');
                            table.rows('.selected').deselect();
                            $('#brandListTable').DataTable().ajax.reload();
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
                    url: "<?php echo e(route('admin.brand.bulk_action')); ?>",
                    method: "GET",
                    data: {idsArray:idsArray,action_type:action_type},
                    success: function (data) {
                        if(data.success){
                            $('#bulkConfirmModal').modal('hide');
                            table.rows('.selected').deselect();
                            $('#brandListTable').DataTable().ajax.reload();
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro_related\2_cartpro_lang\resources\views/admin/pages/brand/index.blade.php ENDPATH**/ ?>