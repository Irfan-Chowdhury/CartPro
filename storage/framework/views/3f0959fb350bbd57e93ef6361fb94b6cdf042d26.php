<?php $__env->startSection('admin_content'); ?>


<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3"><?php echo e(__('Colors')); ?></h4>
        <div id="alertMessage" role="alert"></div>
        <br>

        <?php if(auth()->user()->can('tag-store')): ?>
            <button type="button" class="btn btn-info" name="createModal" data-toggle="modal" data-target="#createModal">
                <i class="fa fa-plus"></i> <?php echo e(__('Add Color')); ?>

            </button>
        <?php endif; ?>

        <?php if(auth()->user()->can('tag-action')): ?>
            
        <?php endif; ?>

    </div>
    <div class="table-responsive">
    	<table id="colorDataTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>
        		    <th scope="col"><?php echo e(trans('file.Color Name')); ?></th>
        		    <th scope="col"><?php echo e(trans('file.Color Code')); ?></th>
        		    <th scope="col"><?php echo e(trans('file.action')); ?></th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>
</section>


<?php echo $__env->make('admin.pages.color.create_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.pages.color.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script type="text/javascript">

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $('#colorDataTable').DataTable({
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
                url: "<?php echo e(route('admin.color.index')); ?>",
            },
            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'color_name',
                    name: 'color_name',
                },
                {
                    data: 'color_code',
                    name: 'color_code',
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
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.color.store')); ?>",
            method: "POST",
            data: $('#submitForm').serialize(),
            success: function (data) {
                console.log(data);
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#errorMessage').html(html).slideDown(300).delay(5000).slideUp(300);
                }
                else if(data.success){
                    $('#colorDataTable').DataTable().ajax.reload();
                    $('#submitForm')[0].reset();
                    $("#createModal").modal('hide');
                    $('#alertMessage').fadeIn("slow"); //Check in top in this blade
                    $('#alertMessage').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alertMessage').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //---------- Edit -------------
    $(document).on('click', '.edit', function () {
        var rowId = $(this).data("id");
        $('#alertMessage').html('');

        $.ajax({
            url: "<?php echo e(route('admin.color.edit')); ?>",
            type: "GET",
            data: {rowId:rowId},
            success: function (data) {
                $('#colorId').val(data.color.id);
                $('#colorNameEdit').val(data.color.color_name);
                $('#colorCodeEdit').val(data.color.color_code);
                $('#editFormModal').modal('show');
            }
        })
    });


    //---------- Update -------------
    $("#updateForm").on("submit",function(e){
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.color.update')); ?>",
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
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#errorMessageEdit').html(html).slideDown(300).delay(5000).slideUp(300);
                }
                else if(data.success){
                    $('#colorDataTable').DataTable().ajax.reload();
                    $('#updateForm')[0].reset();
                    $("#editFormModal").modal('hide');
                    $('#alertMessage').fadeIn("slow"); //Check in top in this blade
                    $('#alertMessage').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alertMessage').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


        //---------- Delete  -------------
    $(document).on('click', '.delete', function () {
        alert('Are you sure to delete ?');
        var rowId = $(this).data("id");

        $.ajax({
            url: "<?php echo e(route('admin.color.delete')); ?>",
            type: "GET",
            data: {rowId:rowId},
            success: function (data) {
                if(data.success){
                    $('#colorDataTable').DataTable().ajax.reload();
                    $('#alertMessage').fadeIn("slow"); //Check in top in this blade
                    $('#alertMessage').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alertMessage').fadeOut("slow");
                    }, 3000);
                }
            }
        })
    });

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
<script>
    $('.colorpicker').colorpicker();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/color/index.blade.php ENDPATH**/ ?>