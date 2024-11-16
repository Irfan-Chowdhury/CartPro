<?php $__env->startPush('css'); ?>
<link rel="preload" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap-select.min.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="preload" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap-select.min.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'"></noscript>

<link rel="stylesheet" href="<?php echo e(asset('admin-lte')); ?>/dist/css/style.default.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('admin-content'); ?>
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo app('translator')->get('file.Category'); ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo app('translator')->get('file.Category'); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-store')): ?>
                                    <button type="button" class="btn btn-info parent_load" name="create_record" id="create_record">
                                        <i class="fa fa-plus"></i> <?php echo app('translator')->get('file.Add Category'); ?>
                                    </button>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-action')): ?>
                                    <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_action">
                                        <i class="fa fa-minus-circle"></i> <?php echo app('translator')->get('file.Bulk Action'); ?>
                                    </button>
                                <?php endif; ?>
                                    <table id="dataListTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="not-exported"></th>
                                                <th scope="col"><?php echo e(__('file.Image')); ?></th>
                                                <th scope="col"><?php echo e(__('file.Category Name')); ?></th>
                                                <th scope="col"><?php echo app('translator')->get('file.Parent'); ?></th>
                                                <th scope="col"><?php echo app('translator')->get('file.Status'); ?></th>
                                                <th scope="col"><?php echo app('translator')->get('file.Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            </div>


            <?php echo $__env->make('lte.admin.pages.category.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('lte.admin.pages.category.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('lte.admin.includes.confirm_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo e(asset('admin-lte')); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    


    <script type="text/javascript" src="<?php echo e(asset('vendor/bootstrap/js/bootstrap-select.min.js')); ?>"></script>


    <!-- Page specific script -->
<script>
        let indexURL = "<?php echo e(route('admin.category.datatable')); ?>";
        let storeURL = "<?php echo e(route('admin.category.store')); ?>";
        let editURL = "<?php echo e(route('admin.category.edit')); ?>";
        let updateURL = "<?php echo e(route('admin.category.update')); ?>";
        let activeURL = "<?php echo e(route('admin.category.active')); ?>";
        let inactiveURL = "<?php echo e(route('admin.category.inactive')); ?>";
        let deleteURL = "<?php echo e(route('admin.category.delete')); ?>";
        let bulkActionURL = "<?php echo e(route('admin.category.bulk_action')); ?>";

    $(function() {


        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#create_record').click(function() {
            $('#createModal').modal('show');
        });


        $(document).ready(function() {
            $("#dataListTable").DataTable({
                responsive: true,
                fixedHeader: {
                    header: true,
                    footer: true
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: indexURL,
                },
                columns: [
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        // render: function () {
                        //     return '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                        // }
                        render: function (data, type, row, meta) {
                            return '<input type="checkbox" class="row-checkbox" data-id="' + row.id + '">';
                        },
                    },
                    {
                        data: 'category_image',
                        name: 'category_image',
                    },
                    {
                        data: 'category_name',
                        name: 'category_name',
                    },
                    {
                        data: 'parent',
                        name: 'parent',

                    },
                    {
                        data: 'is_active',
                        name: 'is_active',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    }
                ],
                // columnDefs: [
                //     {
                //         targets: 0,
                //         orderable: false,
                //         checkboxes: {
                //             selectRow: true
                //         }
                //     }
                // ],
                // select: {
                //     style: 'multi', // Allows multiple row selection
                //     selector: 'td:first-child input[type="checkbox"]' // Use checkboxes for selection
                // },
                "paging": true,
                "responsive": true,
                "searching": true,
                "lengthChange": false,
                "autoWidth": true,
                "ordering": true,
                "info": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(document).on('click', '.edit', function () {
            var id = $(this).data("id");
            $('#alert_message').html('');
            $.ajax({
                url: editURL,
                type: "GET",
                data: {category_id:id},
                success: function (data) {
                    console.log(data);
                    $('#category_id').val(data.category.id);
                    $('#category_translation_id').val(data.category.category_translation_id);
                    $('#category_name_edit').val(data.category.category_name);
                    $('#cateogry_icon_edit').val(data.category.icon);
                    $('#parent_id_edit').selectpicker('val', data.category.parent_id);
                    if (data.category.top === 1) {
                        $('#top_edit').prop('checked', true);
                    } else {
                        $('#top_edit').prop('checked', false);
                    }
                    if (data.category.is_active === 1) {
                        $('#isActive_edit').prop('checked', true);
                    } else {
                        $('#isActive_edit').prop('checked', false);
                    }
                    $('#editModal').modal('show');
                }
            })
        });
    });

</script>


<script type="text/javascript" src="<?php echo e(asset('js/admin/common-js/store.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/admin/common-js/update.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/admin/common-js/active.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/admin/common-js/inactive.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/admin/common-js/delete.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/admin/common-js/bulk_action.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/admin/common-js/alertMessages.js')); ?>"></script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('lte.admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/lte/admin/pages/category/index.blade.php ENDPATH**/ ?>