@extends('admin.main')
@section('admin_content')
<section>

        <div class="container-fluid"><span id="general_result"></span></div>


        <div class="container-fluid">
            
                <button type="button" class="btn btn-info parent_load" name="create_record" id="create_record"><i
                            class="fa fa-plus"></i> {{__('Add Account')}}</button>
            
            
                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i
                            class="fa fa-minus-circle"></i> {{__('Bulk delete')}}</button>
            
        </div>

<div class="table-responsive">
  <table id="page_list_table" class="table ">
      <thead>
      <tr>
      <th class="not-exported"></th>    
      <th scope="col">{{trans('page_name')}}</th>
      <th scope="col">{{__('status')}}</th>
      <th scope="col">{{trans('file.action')}}</th>
    </tr>
  </thead>

</table>
</div>
</section>

    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{__('Add Account')}}</h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal">

                        @csrf
                        <div class="row">


                            <div class="col-md-6 form-group">
                                <label>{{__('Page Name')}} *</label>
                                <input type="text" name="page_name" id="page_name" required class="form-control"
                                       placeholder="{{__('Page Name')}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{__('Description')}} *</label>
                                <textarea name="description" id="description" required class="form-control"></textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{__('URL')}} *</label>
                                <input type="text" name="url" id="url" required class="form-control"
                                       placeholder="{{__('URL')}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{__('Meta_Title')}} *</label>
                                <input type="text" name="meta_title" id="meta_title" required class="form-control"
                                       placeholder="{{__('Meta Title')}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{__('Meta_description')}} *</label>
                                <input type="text" name="meta_description" id="meta_description" required class="form-control"
                                       placeholder="{{__('Meta Description')}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{__('Og_Title')}} *</label>
                                <input type="text" name="og_title" id="og_title" required class="form-control"
                                       placeholder="{{__('Og Title')}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleFormControlFile1">{{__('Og Image')}}</label>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{__('Og_description')}} *</label>
                                <input type="text" name="og_description" id="og_description" required class="form-control"
                                       placeholder="{{__('Og Description')}}">
                            </div>
                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action"/>
                                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                                           value={{trans('file.Add')}}>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
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
            let table_table = $('#page_list_table').DataTable({
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
                    url: "{{ route('admin.page') }}",
                },

                columns: [
                    {
                        data: null,
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'page_name',
                        name: 'page_name',
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
                        'targets': [0, 3],
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

            $('.modal-title').text('{{__('Add Account')}}');
            $('#action_button').val('{{trans("file.Add")}}');
            $('#action').val('{{trans("file.Add")}}');
            $('#formModal').modal('show');
        });


    //     $('.parent_load').click(function () {
    //     $.ajax({
    //         url:'{{route('parent.load')}}',
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
    

        $('#page_list_table').on('click','.status',function () {
            let id = $(this).data('id');
            let status = $(this).data('status');
            
            var target = "{{route('admin.page')}}/" + id +'/'+ status  ;

            $.ajax({
                url:target,
                dataType:"json",
                success:function(data) {
                    let html = '';
                    if (data.success) {
                        html = '<div class="alert alert-success">'+data.success + "</div>";
                        $('#page_list_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            })  
        });


        $('#sample_form').on('submit', function (event) {
            event.preventDefault();
            if ($('#action').val() === '{{trans('file.Add')}}') {


                $.ajax({
                    url: "{{route('pages.store')}}",
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
                            $('#page_list_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                })
            }


            if ($('#action').val() === '{{trans('file.Edit')}}') {


                $.ajax({
                    url: "{{route('page_list.update')}}",
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
                                $('#page_list_table').DataTable().ajax.reload();
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



            let target = "{{ route('admin.page') }}/" + id + '/edit';

            $.ajax({
                url: target,
                dataType: "json",
                success: function (html) {

                    $('#page_name').val(html.data.page_name);
                    //$('#parent').val(html.data.parent);
                    $('#description').val(html.data.description);
                    $('#url').val(html.data.URL);
                    $('#meta_title').val(html.data.meta_title);
                    $('#meta_description').val(html.data.meta_description);
                    $('#og_title').val(html.data.og_title);
                    $('#og_description').val(html.data.og_description);
                    //$('#description_position').val(html.data.bank_branch);
                    


                    $('#hidden_id').val(html.data.id);

                    $('.modal-title').text('{{trans('file.Edit')}}');
                    $('#action_button').val('{{trans('file.Edit')}}');
                    $('#action').val('{{trans('file.Edit')}}');
                    $('#formModal').modal('show');
                }
            })
        });


        let delete_id;

        $(document).on('click', '.delete', function () {
            delete_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('.modal-title').text('{{__('DELETE Record')}}');
            $('#ok_button').text('{{trans('file.OK')}}');

        });


        $(document).on('click', '#bulk_delete', function () {

            let id = [];
            let table = $('#page_list_table').DataTable();
            id = table.rows({selected: true}).ids().toArray();
            
            if (id.length > 0) {
                if (confirm('{{__('Delete Selection',['key'=>__('Category Info')])}}')) {
                    $.ajax({
                        url: '{{url('/admin/page/massdelete')}}',
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
            $('#page_list_table').DataTable().ajax.reload();
        });

        $('#ok_button').click(function () {
            let target = "{{route('admin.page')}}/" + delete_id + '/delete';
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
                        $('#page_list_table').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });


    </script>
@endsection