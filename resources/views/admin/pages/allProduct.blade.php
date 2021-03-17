@extends('admin.main')
@section('admin_content')
    <section>

        <div class="container-fluid"><span id="general_result"></span></div>


        <div class="container-fluid mb-3">
            
                <a href="{{ route('admin.product.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> {{__('Add Product')}}</a>
            
            
                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i
                            class="fa fa-minus-circle"></i> {{__('Bulk delete')}}</button>
            
        </div>

        <div class="table-responsive">
            <table id="product_list_table" class="table ">
                <thead>
                    <tr>
                        <th class="not-exported"></th>    
                        <th scope="col">{{__('Image')}}</th>
                        <th scope="col">{{__('Product Name')}}</th>
                        <th scope="col">{{__('Category Name')}}</th>
                        <th scope="col">{{__('Brand Name')}}</th>

                        <th scope="col">{{__('Quantity')}}</th>
                        <th scope="col">{{__('Tags')}}</th>
                        <th scope="col">{{__('Price')}}</th>
                        <th scope="col">{{__('Status')}}</th>
                        <th scope="col">{{trans('file.action')}}</th>
                    </tr>
                </thead>

            </table>
        </div>
    </section>

    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">{{trans('file.Confirmation')}}</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">{{__('want to remove?')}}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">{{trans('file.OK')}}'
                    </button>
                    <button type="button" class="close btn-default"
                            data-dismiss="modal">{{trans('file.Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">


        $(document).ready(function () {

            let table_table = $('#product_list_table').DataTable({
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
                    url: "{{ route('admin.product') }}",
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
                        render:function (data) {
                         return "<img class='profile-photo md' src={{ url('/public/images/products/') }}/" +data + "/>";
                    }            
                    },

                    {
                        data: 'product_name',
                        name: 'product_name',
                    },
                    {
                        data: 'category_id',
                        name: 'category_id',
                    },
                    {
                        data: 'brand_id',
                        name: 'brand_id',
                    },
                    
                    {
                        data: 'qty',
                        name: 'qty',
                    },
                    {
                        data: 'tags',
                        name: 'tags',

                    },
                    {
                        data: 'price',
                        name: 'price',
                        render: function (data) {
                            if ('{{config('variable.currency_format') ==='suffix'}}') {
                                return data + ' {{config('variable.currency')}}';
                            } else {
                                return '{{config('variable.currency')}} ' + data;

                            }
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render:function (data) {
                          if (data == 1) {
                          return "<span class='badge badge-success'>Active</span>";
                        }else{
                          return "<span class='badge badge-danger'>Inactive</span>";
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
                    'lengthMenu': '_MENU_ {{__("records per page")}}',
                    "info": '{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)',
                    "search": '{{trans("file.Search")}}',
                    'paginate': {
                        'previous': '{{trans("file.Previous")}}',
                        'next': '{{trans("file.Next")}}'
                    }
                },
                'columnDefs': [
                    {
                        "orderable": false,
                        'targets': [0, 9],
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


        // $('#create_record').click(function () {

        //     $('.modal-title').text('{{__('Add Account')}}');
        //     $('#action_button').val('{{trans("file.Add")}}');
        //     $('#action').val('{{trans("file.Add")}}');
        //     $('#formModal').modal('show');
        // });


        $('#product_list_table').on('click','.status',function () {
            let id = $(this).attr('id');
            
            let status = $(this).attr('status');
        
            var target = "{{route('admin.product')}}/" + id +'/'+ status  ;

            $.ajax({
                 url:target,
                 dataType:"json",
                success:function(data) {
                    let html = '';
                    if (data.success) {
                        html = '<div class="alert alert-success">'+data.success + "</div>";
                        $('#product_list_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            })  
        });


        $('#sample_form').on('submit', function (event) {
            event.preventDefault();
            if ($('#action').val() === '{{trans('file.Add')}}') {


                $.ajax({
                    url: "{{route('products.store')}}",
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
                            $('#product_list_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                })
            }

            // if ($('#action').val() === '{{trans('file.Edit')}}') {


            //     $.ajax({
            //         url: "{{route('products.update')}}",
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
            //                     $('#product_list_table').DataTable().ajax.reload();
            //                     $('#sample_form')[0].reset();
            //                 }, 2000);

            //             }
            //             $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
            //         }
            //     });
            // }
        });


        // $(document).on('click', '.edit', function () {

        //     let id = $(this).attr('id');

        //     $('#form_result').html('');



        //     let target = "{{ route('admin.product') }}/" + id + '/edit';

        //     $.ajax({
        //          url: target,
        //          dataType: "json",
        //          success: function (html) {

        //              $('#product_name').val(html.data.product_name);
        //              //$('#brand_name').val(html.data.brand_name);
        //              //$('#category_name').val(html.data.category_name);
        //              $('#description').val(html.data.description);
        //              $('#tags').val(html.data.tags);
        //              $('#price').val(html.data.price);    


        //              $('#hidden_id').val(html.data.id);

        //              $('.modal-title').text('{{trans('file.Edit')}}');
        //              $('#action_button').val('{{trans('file.Edit')}}');
        //              $('#action').val('{{trans('file.Edit')}}');
        //              $('#formModal').modal('show');
        //          }
        //      })
        // });


        let delete_id;

        $(document).on('click', '.delete', function () {
            delete_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('.modal-title').text('{{__('DELETE Record')}}');
            $('#ok_button').text('{{trans('file.OK')}}');

        });


        $(document).on('click', '#bulk_delete', function () {

            let id = [];
            let table = $('#product_list_table').DataTable();
            id = table.rows({selected: true}).ids().toArray();
            
            if (id.length > 0) {
                if (confirm('{{__('Delete Selection',['key'=>__('Category Info')])}}')) {
                    $.ajax({
                        url: '{{url('/admin/product/massdelete')}}',
                        method: 'POST',
                        data: {
                            ProductListIdArray: id
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
            $('#product_list_table').DataTable().ajax.reload();
        });

        $('#ok_button').click(function () {
            let target = "{{route('admin.product')}}/" + delete_id + '/delete';
            $.ajax({
                url: target,
                beforeSend: function () {
                    $('#ok_button').text('{{trans('file.Deleting...')}}');
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
                        $('#product_list_table').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });


    </script>
@endsection