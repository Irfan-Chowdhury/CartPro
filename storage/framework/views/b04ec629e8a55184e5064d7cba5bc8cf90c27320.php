<?php $__env->startSection('title','Admin | Attribute Sets'); ?>
<?php $__env->startSection('admin_content'); ?>

<section>
    <div class="container-fluid mb-3">
        <h4 class="font-weight-bold mt-3"><?php echo app('translator')->get('file.Attribute Sets'); ?></h4>
        <div id="alert_message" role="alert"></div>
        <br>

        <?php if(auth()->user()->can('attribute_set-store')): ?>
            <button type="button" class="btn btn-info" name="formModal" data-toggle="modal" data-target="#formModal">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('file.Add Attribute Set'); ?>
            </button>
        <?php endif; ?>
        <?php if(auth()->user()->can('attribute_set-action')): ?>
            <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_action">
                <i class="fa fa-minus-circle"></i> <?php echo app('translator')->get('file.Bulk Action'); ?>
            </button>
        <?php endif; ?>
    </div>
    <div class="table-responsive">
    	<table id="dataListTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>
        		    <th scope="col"><?php echo e(trans('file.Attribute Set Name')); ?></th>
        		    <th scope="col"><?php echo e(trans('file.Status')); ?></th>
        		    <th scope="col"><?php echo e(trans('file.action')); ?></th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>

</section>

<?php echo $__env->make('admin.pages.attribute_set.create_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.pages.attribute_set.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.includes.confirm_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let table = $('#dataListTable').DataTable({
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
                        url: "<?php echo e(route('admin.attribute_set.datatable')); ?>",
                    },
                    columns: [
                        {
                            data: null,
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'attribute_set_name',
                            name: 'attribute_set_name',
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
            $("#submitButton").on("click",function(e){
                $('#submitButton').text('Saving ...');
            });

            $("#submitForm").on("submit",function(e){
                e.preventDefault();
                var attributeSetName = $("#attributeSetName").val();
                var isActive         = $("#isActive").val();
                $.ajax({
                    url: "<?php echo e(route('admin.attribute_set.store')); ?>",
                    method: "POST",
                    data: $('#submitForm').serialize(),
                    error: function(response){
                        console.log(response)
                        var dataKeys   = Object.keys(response.responseJSON.errors);
                        var dataValues = Object.values(response.responseJSON.errors);
                        let html = '<div class="alert alert-danger">';
                        for (let count = 0; count < dataValues.length; count++) {
                            html += '<p>' + dataValues[count] + '</p>';
                        }
                        html += '</div>';
                        $('#error_message').fadeIn("slow");
                        $('#error_message').html(html);
                        setTimeout(function() {
                            $('#error_message').fadeOut("slow");
                        }, 3000);
                        $('#submitButton').text('Save');
                    },
                    success: function (response) {
                        $('#dataListTable').DataTable().ajax.reload();
                        $('#submitForm')[0].reset();
                        $("#formModal").modal('hide');
                        $('#alert_message').fadeIn("slow");
                        if (response.demo) {
                            $('#alert_message').addClass('alert alert-danger').html(response.demo);
                        }else{
                            $('#alert_message').addClass('alert alert-success').html(response.success);
                        }
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                    }
                });
            });


            //---------- Show data by id-------------
            $(document).on('click', '.edit', function () {
                var rowId = $(this).data("id");
                $('#alert_message').html('');

                $.ajax({
                    url: "<?php echo e(route('admin.attribute_set.edit')); ?>",
                    type: "GET",
                    data: {attribute_set_id:rowId},
                    success: function (data) {
                        console.log(data);
                        $('#AttributeSetIdEdit').val(data.attributeSet.id);
                        $('#attributeSetNameEdit').val(data.attributeSetTranslation.attribute_set_name);
                        $('#attributeSetTranslationIdEdit').val(data.attributeSetTranslation.id);
                        if (data.attributeSet.is_active == 1) {
                                $('#isActiveEdit').prop('checked', true);
                        } else {
                            $('#isActiveEdit').prop('checked', false);
                        }
                        $('#editFormModal').modal('show');
                    }
                })
            });


            //---------- Update -------------

            $("#updateButton").on("click",function(e){
                $('#updateButton').text('Updating ...');
            });
            $("#updateForm").on("submit",function(e){
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('admin.attribute_set.update')); ?>",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    error: function(response){
                        console.log(response)
                        var dataKeys   = Object.keys(response.responseJSON.errors);
                        var dataValues = Object.values(response.responseJSON.errors);
                        let html = '<div class="alert alert-danger">';
                        for (let count = 0; count < dataValues.length; count++) {
                            html += '<p>' + dataValues[count] + '</p>';
                        }
                        html += '</div>';
                        $('#error_message_edit').fadeIn("slow");
                        $('#error_message_edit').html(html);
                        setTimeout(function() {
                            $('#error_message_edit').fadeOut("slow");
                        }, 3000);
                        $('#updateButton').text('Update');
                    },
                    success: function (data) {
                        console.log(data);
                        $('#dataListTable').DataTable().ajax.reload();
                        $('#updateForm')[0].reset();
                        $("#editFormModal").modal('hide');
                        $('#alert_message').fadeIn("slow");
                        if (data.demo) {
                            $('#alert_message').addClass('alert alert-danger').html(data.demo);
                        }else{
                            $('#alert_message').addClass('alert alert-success').html(data.success);
                        }
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                        $('#updateButton').text('Update');
                    }
                });
            });

            //---------- Active ------------
            <?php echo $__env->make('admin.includes.common_js.active_js',['route_name'=>'admin.attribute_set.active'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            //---------- Inactive ------------
            <?php echo $__env->make('admin.includes.common_js.inactive_js',['route_name'=>'admin.attribute_set.inactive'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            //---------- Delete ------------
            <?php echo $__env->make('admin.includes.common_js.delete_js',['route_name'=>'admin.attribute_set.destroy'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            //---------- Bulk Action ------------
            <?php echo $__env->make('admin.includes.common_js.bulk_action_js',['route_name_bulk_active_inactive'=>'admin.attribute_set.bulk_action'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/attribute_set/index.blade.php ENDPATH**/ ?>