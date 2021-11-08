<?php $__env->startSection('admin_content'); ?>
<section>

        <div class="container-fluid"><span id="general_result"></span></div>


        <div class="container-fluid">

            <?php if(auth()->user()->can('user-store')): ?>
                <button type="button" class="btn btn-info parent_load" name="create_record" id="create_record"><i class="fa fa-plus"></i> <?php echo e(__('Add User')); ?></button>
            <?php endif; ?>

            <?php if(auth()->user()->can('user-action')): ?>
                <button type="button" class="btn btn-danger" name="" id="bulk_action"><i class="fa fa-minus-circle"></i> <?php echo e(__('Bulk Action')); ?></button>
            <?php endif; ?>
        </div>

<div class="table-responsive">
  <table id="user_list_table" class="table ">
      <thead>
      <tr>
      <th class="not-exported"></th>
      <th scope="col"><?php echo e(__('Image')); ?></th>
      <th scope="col"><?php echo e(__('Full Name')); ?></th>
      <th scope="col"><?php echo e(__('Username')); ?></th>
      <th scope="col"><?php echo e(__('Role')); ?></th>
      <th scope="col"><?php echo e(__('Email')); ?></th>
      <th scope="col"><?php echo e(__('Status')); ?></th>
      <th scope="col"><?php echo e(trans('file.action')); ?></th>
    </tr>
  </thead>

</table>
</div>
</section>

    <?php echo $__env->make('admin.pages.user.form_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.includes.confirm_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">

        $(document).ready(function () {
            let table = $('#user_list_table').DataTable({
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
                    url: "<?php echo e(route('admin.user')); ?>",
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
                        data: 'full_name',
                        name: 'full_name',
                    },
                    {
                        data: 'username',
                        name: 'username',
                    },
                    {
                        data: 'roleName',
                        name: 'roleName',
                    },
                    {
                        data: 'email',
                        name: 'email',
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
                    // {
                    //     data: 'created_at',
                    //     name: 'created_at',
                    // },
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


        $('#create_record').click(function () {

            $('.modal-title').text('<?php echo e(__('Add Account')); ?>');
            $('#action_button').val('<?php echo e(trans("file.Add")); ?>');
            $('#action').val('<?php echo e(trans("file.Add")); ?>');
            $('#formModal').modal('show');
        });


    //     $('.parent_load').click(function () {
    //     $.ajax({
    //         url:'<?php echo e(route('parent.load')); ?>',
    //         dataType:"json",
    //         success:function(data) {
    //             if (data.success) {
    //                 data.data.forEach(function(val){
    //                     $('#parent').html('<option value="'+val.id+'">'+val.category_name+'</option>');
    //                 });
    //             }
    //         }
    //     });
    // });


        // $('#user_list_table').on('click','.status',function () {
        //     let id = $(this).data('id');
        //     let status = $(this).data('status');

        //     var target = "<?php echo e(route('admin.user')); ?>/" + id +'/'+ status  ;

        //     $.ajax({
        //         url:target,
        //         dataType:"json",
        //         success:function(data) {
        //             let html = '';
        //             if (data.success) {
        //                 html = '<div class="alert alert-success">'+data.success + "</div>";
        //                 $('#user_list_table').DataTable().ajax.reload();
        //             }
        //             $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
        //         }
        //     })
        // });


        $('#sample_form').on('submit', function (event) {
            event.preventDefault();
            if ($('#action').val() === '<?php echo e(trans('file.Add')); ?>') {

                $.ajax({
                    url: "<?php echo e(route('user.store')); ?>",
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
                            $('#sample_form')[0].reset();
                            $('#user_list_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                })
            }


            if ($('#action').val() === '<?php echo e(trans('file.Edit')); ?>') {


                $.ajax({
                    url: "<?php echo e(route('user_list.update')); ?>",
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
                            for (let count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            setTimeout(function () {
                                $('#formModal').modal('hide');
                                $('#user_list_table').DataTable().ajax.reload();
                                $('#sample_form')[0].reset();
                            }, 2000);

                        }
                        $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                });
            }
        });


        $(document).on('click', '.edit', function () {

            let id = $(this).attr('id');
            $('#form_result').html('');
            $("#phone").prop("readonly", true);


            let target = "<?php echo e(route('admin.user')); ?>/" + id + '/edit';

            $.ajax({
                url: target,
                dataType: "json",
                success: function (html) {

                    $('#username').val(html.data.username);
                    $('#first_name').val(html.data.first_name);
                    $('#last_name').val(html.data.last_name);
                    $('#phone').val(html.data.phone);
                    $('#email').val(html.data.email);
                    $('#role').selectpicker('val',html.data.role);
                    if (html.data.is_active == 1) {
                        $('#isActive').prop('checked', true);
                    } else {
                        $('#isActive').prop('checked', false);
                    }
                    $('#hidden_id').val(html.data.id);
                    $('.modal-title').text('<?php echo e(trans('file.Edit')); ?>');
                    $('#action_button').val('<?php echo e(trans('file.Edit')); ?>');
                    $('#action').val('<?php echo e(trans('file.Edit')); ?>');
                    $('#formModal').modal('show');
                }
            })
        });


    //---------- Active -------------
    $(document).on("click",".active",function(e){
        e.preventDefault();
        var id = $(this).data("id");

        $.ajax({
            url: "<?php echo e(route('admin.user.active')); ?>",
            type: "GET",
            data: {id:id},
            success: function(data){
                console.log(data);
                if(data.success){
                    $('#user_list_table').DataTable().ajax.reload();
                    $('#form_result').fadeIn("slow"); //Check in top in this blade
                    $('#form_result').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#form_result').fadeOut("slow");
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
            url: "<?php echo e(route('admin.user.inactive')); ?>",
            type: "GET",
            data: {id:id},
            success: function(data){
                console.log(data);
                if(data.success){
                    $('#user_list_table').DataTable().ajax.reload();
                    $('#form_result').fadeIn("slow"); //Check in top in this blade
                    $('#form_result').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#form_result').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //Bulk Action
    $("#bulk_action").on("click",function(){
        var idsArray = [];
        let table = $('#user_list_table').DataTable();
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
                    url: "<?php echo e(route('admin.user.bulk_action')); ?>",
                    method: "GET",
                    data: {idsArray:idsArray,action_type:action_type},
                    success: function (data) {
                        if(data.success){
                            $('#bulkConfirmModal').modal('hide');
                            table.rows('.selected').deselect();
                            $('#user_list_table').DataTable().ajax.reload();
                            $('#form_result').fadeIn("slow"); //Check in top in this blade
                            $('#form_result').addClass('alert alert-success').html(data.success);
                            setTimeout(function() {
                                $('#form_result').fadeOut("slow");
                            }, 3000);
                        }
                    }
                });
            });
            $("#inactive").on("click",function(){
                action_type = "inactive";
                console.log(idsArray);
                $.ajax({
                    url: "<?php echo e(route('admin.slider.bulk_action')); ?>",
                    method: "GET",
                    data: {idsArray:idsArray,action_type:action_type},
                    success: function (data) {
                        if(data.success){
                            $('#bulkConfirmModal').modal('hide');
                            table.rows('.selected').deselect();
                            $('#user_list_table').DataTable().ajax.reload();
                            $('#form_result').fadeIn("slow"); //Check in top in this blade
                            $('#form_result').addClass('alert alert-success').html(data.success);
                            setTimeout(function() {
                                $('#form_result').fadeOut("slow");
                            }, 3000);
                        }
                    }
                });
            });
        }
    });


        let delete_id;

        $(document).on('click', '.delete', function () {
            delete_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('.modal-title').text('<?php echo e(__('DELETE Record')); ?>');
            $('#ok_button').text('<?php echo e(trans('file.OK')); ?>');

        });


        $(document).on('click', '#bulk_delete', function () {

            let id = [];
            let table = $('#user_list_table').DataTable();
            id = table.rows({selected: true}).ids().toArray();

            if (id.length > 0) {
                if (confirm('<?php echo e(__('Delete Selection',['key'=>__('Category Info')])); ?>')) {
                    $.ajax({
                        url: '<?php echo e(url('/admin/user/massdelete')); ?>',
                        method: 'POST',
                        data: {
                            PageListIdArray: id
                        },
                        success: function (data) {
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                            }
                            if (data.error) {
                                html = '<div class="alert alert-danger">' + data.error + '</div>';
                            }
                            table.ajax.reload();
                            table.rows('.selected').deselect();
                            if (data.errors) {
                                html = '<div class="alert alert-danger">' + data.error + '</div>';
                            }
                            $('#general_result').html(html).slideDown(300).delay(5000).slideUp(300);

                        }

                    });
                }
            } else {

            }
        });


        $('.close').click(function () {
            $('#sample_form')[0].reset();
            $('#user_list_table').DataTable().ajax.reload();
        });

        $('#ok_button').click(function () {
            let target = "<?php echo e(route('admin.user')); ?>/" + delete_id + '/delete';
            $.ajax({
                url: target,
                beforeSend: function () {
                    $('#ok_button').text('<?php echo e(trans('file.Deleting...')); ?>');
                },
                success: function (data) {
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                    }
                    if (data.error) {
                        html = '<div class="alert alert-danger">' + data.error + '</div>';
                    }
                    setTimeout(function () {
                        $('#general_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        $('#confirmModal').modal('hide');
                        $('#user_list_table').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/user/index.blade.php ENDPATH**/ ?>