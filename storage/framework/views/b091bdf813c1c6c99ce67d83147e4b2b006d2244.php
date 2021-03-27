<?php $__env->startSection('admin_content'); ?>
<section>
<?php
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $local = Session::get('currentLocal');
    $tr    = new GoogleTranslate($local);
?>

        <div class="container-fluid"><span id="success_alert"></span></div>


        <div class="container-fluid mb-3">

                <button type="button" class="btn btn-info parent_load" name="create_record" id="create_record"><i
                            class="fa fa-plus"></i> <?php echo e($tr->translate('Add Category')); ?></button>


                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i
                            class="fa fa-minus-circle"></i> <?php echo e($tr->translate('Bulk delete')); ?></button>

        </div>

        <div class="table-responsive">
            <table id="category_list-table" class="table ">
                <thead>
                    <tr>
                        <th class="not-exported"></th>
                        <th scope="col"><?php echo e($tr->translate('Category Name')); ?></th>
                        <th scope="col"><?php echo e($tr->translate('Parent')); ?></th>
                        <th scope="col"><?php echo e($tr->translate('Status')); ?></th>
                        <th scope="col"><?php echo e($tr->translate('Action')); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>


    

    <?php echo $__env->make('admin.pages.category.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">


        $(document).ready(function () {
            let table_table = $('#category_list-table').DataTable({
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
                    url: "<?php echo e(route('admin.category')); ?>",
                },

                columns: [
                    {
                        data: null,
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'category_name',
                        name: 'category_name',
                    },
                    {
                        data: 'parent',
                        name: 'parent',

                    },
                    // {
                    //     data: 'description',
                    //     name: 'description',
                    // },
                    // {
                    //     data: 'description_position',
                    //     name: 'description_position',
                    //     render:function (data) {
                    //       if (data==0) {
                    //         return "Top";
                    //       }else{
                    //         return "Bottom";
                    //       }
                    //     }
                    // },
                    // {
                    //     data: 'image',
                    //     name: 'image',
                    //     render:function (data) {
                    //      return "<img class='profile-photo md' src=<?php echo e(URL::to('/')); ?>/" + data + "/>";
                    //    }

                    // },
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
            new $.fn.dataTable.FixedHeader(table_table);
        });


        $('#create_record').click(function () {

            $('.modal-title').text('<?php echo e(__('Add Category')); ?>');
            // $('#action_button').val('<?php echo e(trans("file.Add")); ?>');
            // $('#action').val('<?php echo e(trans("file.Add")); ?>');
            $('#formModal').modal('show');
        });


        // $('#sample_form').on('submit',function () {
        // $.ajax({
        //     url:'<?php echo e(route('parent.load')); ?>',
        //     dataType:"json",
        //     success:function(data) {
        //         console.log(data);
        //         if (data.success) {
        //             // return data;
        //             $('.select_parent').html('');
        //             data.data.forEach(function(val){
        //                 console.log(val);
        //                 $('.select_parent').append('<a class="d-block" data-id="'+val.id+'">'+val.category_name+'</a>');
        //             });
        //             }
        //         }
        //     });
        // });

        // $('#category_list-table').on('click','.status',function () {
        //     let id = $(this).data('id');
        //     let status = $(this).data('status');

        //     var target = "<?php echo e(route('admin.category')); ?>/" + id +'/'+ status  ;

        //     $.ajax({
        //         url:target,
        //         dataType:"json",
        //         success:function(data) {
        //             let html = '';
        //             if (data.success) {
        //                 html = '<div class="alert alert-success">'+data.success + "</div>";
        //                 $('#category_list-table').DataTable().ajax.reload();
        //             }
        //             $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
        //         }
        //     })
        // });

        //----------Insert Data----------------------

        $('#submitForm').on('submit', function (e) {
            e.preventDefault();

                console.log('ok');

                $.ajax({
                    url: "<?php echo e(route('admin.category.store')); ?>",
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
                        if(data.success){
                            $('#category_list-table').DataTable().ajax.reload();
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


            // if ($('#action').val() === '<?php echo e(trans('file.Edit')); ?>') {
            //     $.ajax({
            //         url: "<?php echo e(route('category_list.update')); ?>",
            //         method: "POST",
            //         data: new FormData(this),
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         dataType: "json",
            //         success: function (data) {
            //             let html = '';
            //             if (data.errors) {
            //                 html = '<div class="alert alert-danger">';
            //                 for (let count = 0; count < data.errors.length; count++) {
            //                     html += '<p>' + data.errors[count] + '</p>';
            //                 }
            //                 html += '</div>';
            //             }
            //             if (data.success) {
            //                 html = '<div class="alert alert-success">' + data.success + '</div>';
            //                 setTimeout(function () {
            //                     $('#formModal').modal('hide');
            //                     $('#category_list-table').DataTable().ajax.reload();
            //                     $('#sample_form')[0].reset();
            //                 }, 2000);

            //             }
            //             $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
            //         }
            //     });
            // }



        $(document).on('click', '.edit', function () {

            let id = $(this).attr('id');
            $('#form_result').html('');



            let target = "<?php echo e(route('admin.category')); ?>/" + id + '/edit';

            $.ajax({
                url: target,
                dataType: "json",
                success: function (html) {

                    $('#category_name').val(html.data.category_name);
                    //$('#parent').val(html.data.parent);
                    $('#description').val(html.data.description);
                    //$('#description_position').val(html.data.bank_branch);



                    $('#hidden_id').val(html.data.id);

                    $('.modal-title').text('<?php echo e(trans('file.Edit')); ?>');
                    $('#action_button').val('<?php echo e(trans('file.Edit')); ?>');
                    $('#action').val('<?php echo e(trans('file.Edit')); ?>');
                    $('#formModal').modal('show');
                }
            })
        });


        let delete_id;

        $(document).on('click', '.delete', function () {
            delete_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('.modal-title').text('<?php echo e(__('DELETE Record')); ?>');
            $('#ok_button').text('<?php echo e(trans('file.OK')); ?>');

        });

        $(document).on('click', '.select_parent a', function () {
            var id = $(this).data('id');

            $('.parent_id').val(id);
        })


        $(document).on('click', '#bulk_delete', function () {

            let id = [];
            let table = $('#category_list-table').DataTable();
            id = table.rows({selected: true}).ids().toArray();

            if (id.length > 0) {
                if (confirm('<?php echo e(__('Delete Selection',['key'=>__('Category Info')])); ?>')) {
                    $.ajax({
                        url: '<?php echo e(url('/admin/category/massdelete')); ?>',
                        method: 'POST',
                        data: {
                            CategoryListIdArray: id
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
            $('#category_list-table').DataTable().ajax.reload();
        });

        $('#ok_button').click(function () {
            let target = "<?php echo e(route('admin.category')); ?>/" + delete_id + '/delete';
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
                        $('#category_list-table').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });


        //---------- Active -------------
	$(document).on("click",".active",function(e){
		e.preventDefault();
		var categoryId = $(this).data("id");
		console.log(categoryId);

		$.ajax({
			url: "<?php echo e(route('admin.category.active')); ?>",
			type: "GET",
			data: {id:categoryId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#category_list-table').DataTable().ajax.reload();
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
		var categoryId = $(this).data("id");
		console.log(categoryId);

		$.ajax({
			url: "<?php echo e(route('admin.category.inactive')); ?>",
			type: "GET",
			data: {id:categoryId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#category_list-table').DataTable().ajax.reload();
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



<tbody>
    


    


        


    

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/category/index.blade.php ENDPATH**/ ?>