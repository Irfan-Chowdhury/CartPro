<?php $__env->startSection('title','Admin | Products'); ?>
<?php $__env->startSection('admin_content'); ?>


<section>
    <?php echo $__env->make('admin.includes.alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="container-fluid"><span id="general_result"></span></div>

    <div class="container-fluid mb-3">
        <h4 class="font-weight-bold mt-3"><?php echo app('translator')->get('file.Products'); ?></h4>
        <div id="alert_message" role="alert"></div>
        <br>

        <?php if(auth()->user()->can('product-store')): ?>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-info">
                <i class="fa fa-plus"></i> <?php echo e(__('file.Create Product')); ?>

            </a>
        <?php endif; ?>
        <?php if(auth()->user()->can('product-action')): ?>
            <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_action">
                <i class="fa fa-minus-circle"></i> <?php echo e(trans('file.Bulk Action')); ?>

            </button>
        <?php endif; ?>
    </div>

    <div class="table-responsive">
    	<table id="dataListTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>
        		    <th scope="col"><?php echo e(__('file.Thumbnail')); ?></th>
        		    <th scope="col"><?php echo e(__('file.Name')); ?></th>
        		    <th scope="col"><?php echo e(__('file.Price')); ?></th>
					<th scope="col"><?php echo e(trans('file.Status')); ?></th>
					<th scope="col"><?php echo e(trans('file.action')); ?></th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>
</section>

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
                            url: "<?php echo e(route('admin.products.dataTable')); ?>",
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
                                // 'targets': [0, 4],
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
            })(jQuery);

            let activeURL     = "<?php echo e(route('admin.products.active')); ?>";
            let inactiveURL   = "<?php echo e(route('admin.products.inactive')); ?>";
            let deleteURL     = "<?php echo e(route('admin.products.delete')); ?>";
            let bulkActionURL = "<?php echo e(route('admin.products.bulk_action')); ?>";
    </script>
            <!-- Common Action For All-->
            <?php echo $__env->make('admin.includes.common_action',['action'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/index.blade.php ENDPATH**/ ?>