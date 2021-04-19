@extends('admin.main')
@section('admin_content')
	<div class="container-fluid">
		<button class="btn btn-info parent_load" id="create_record" name="create_record"><i class="fa fa-plus"></i>{{__('Add Account')}}</button>
		<button class="btn btn-danger" id="bulk_delete" class="bulk_delete"><i class="fa fa-minus-circle"></i>{{__('Bulk Delete')}}</button>
	</div>
	<div>
		<table id="coupon_list_table" class="table">
			<thead>
				<tr>
				  <th class="not-exported"></th>    
			      <th scope="col">{{__('Coupon Name')}}</th>
			      <th scope="col">{{__('Coupon Code')}}</th>
			      {{-- <th scope="col">Discount Type</th> --}}
			      <th scope="col">{{__('Discount Amount')}}</th>
			      {{-- <th scope="col">Minimum Spend Limit</th> --}}
			      {{-- <th scope="col">Start Date</th>
			      <th scope="col">End Date</th> --}}
			      <th scope="col">{{__('Status')}}</th>
			      <th scope="col">{{trans('file.action')}}</th>
				</tr>
			</thead>
		</table>

	</div>
	    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal_title">{{__('Add Account')}}</h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    @csrf
                    <form method="post" id="sample_form" class="form-horizontal">
						
						<div class="row">
                            <div class="col-md-6 form-group">
                                <label>{{__('Coupon Name')}} *</label>
                                <input type="text" name="coupon_name" id="coupon_name" required class="form-control"
                                       placeholder="{{__('Coupon Name')}}">
                            </div>
                            {{-- <div class="col-md-6 form-group">
                                <label>{{__('Coupon Code')}} *</label>
                                <input type="text" name="coupon_code" id="coupon_code" required class="form-control"
                                       placeholder="{{__('Coupon Code')}}">
                            </div> --}}
                            <div class="col-md-6 form-group">
                            	<label>{{__('Discount Type')}}</label>
                            	<select class="form-control" required name="discount_type" id="discount_type">
                            		<option value="0">{{__('Fixed')}}</option>
                            		<option value="1">{{__('Percent')}}</option>
                            	</select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{__('Discount Amount')}} *</label>
                                <input type="text" name="discount_amount" id="discount_amount" required class="form-control"
                                       placeholder="{{__('Discount Amount')}}">
                            </div>
                            <div class="col-md-6 form-group">
                            	<label for="">{{__('Start Date')}}</label>
  								<input required class="form-control" type="date" id="start_date" name="start_date">
							</div>
							<div class="col-md-6 form-group">
                            	<label for="">{{__('End Date')}}</label>
  								<input required class="form-control" type="date" id="end_date" name="end_date">
							</div>
							<div class="col-md-6 form-group">
                            	<label for="">{{__('Minimum Spend Limit')}}</label>
  								<input required class="form-control" type="text" id="min_limit" name="min_limit" >
							</div>
                            <div class="col-md-6 form-group">
                                <label for="">{{__('Minimum Usage Limit')}}</label>
                                <input required class="form-control" type="text" id="usage_limit" name="usage_limit" >
                            </div>
                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="text" name="action" id="action"/>
                                    <input type="text" name="hidden_id" id="hidden_id"/>
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
                    <h2 class="modal_title">{{trans('file.Confirmation')}}</h2>
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
            let table_table = $('#coupon_list_table').DataTable({
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
                    url: "{{ route('admin.coupon') }}",
                },

                columns: [
                    {
                        data: null,
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'coupon_name',
                        name: 'coupon_name',
                    },
                    {
                        data: 'coupon_code',
                        name: 'coupon_code',
                        
                    },
                    {
                        data: 'discount_amount',
                        name: 'discount_amount',
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
                        'targets': [0, 5],
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
		$('.modal_title').text('{{__('Add Account')}}');
		$('#action_button').val('{{trans("file.Add")}}');
        $('#action').val('{{trans("file.Add")}}');
		$('#formModal').modal('show');
	});
    $('#sample_form').on('submit',function (event) {
        event.preventDefault();
        if ($('#action').val() === '{{trans("file.Add")}}') {
            $.ajax({
                url : "{{route('coupon.store')}}",
                datatype:'json',
                method:"post",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    let html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for(i=0;i<=data.errors.length;i++){
                            html += '<p>'+data.errors[i]+'</p>';
                        }
                        html+='</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">'+data.success+'</div>';
                        $('#sample_form').reset();
                        $('#coupon_list_table').Datatable().ajax.reload();
                    }
                    $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            });
        }
        if ($('#action').val() === '{{trans("file.Edit")}}') {
            $.ajax({
                    url: "{{route('coupon_list.update')}}",
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
                                $('#coupon_list_table').DataTable().ajax.reload();
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



            let target = "{{ route('admin.coupon') }}/" + id + '/edit';

            $.ajax({
                url: target,
                dataType: "json",
                success: function (html) {

                    $('#coupon_name').val(html.data.coupon_name);
                    // $('#coupon_code').val(html.data.parent);
                    $('#discount_amount').val(html.data.discount_amount);
                    $('#min_limit').val(html.data.min_limit);
                    $('#usage_limit').val(html.data.usage_limit);


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
            let table = $('#product_list_table').DataTable();
            id = table.rows({selected: true}).ids().toArray();
            
            if (id.length > 0) {
                if (confirm('{{__('Delete Selection',['key'=>__('Category Info')])}}')) {
                    $.ajax({
                        url: '{{url('/admin/coupoun/massdelete')}}',
                        method: 'POST',
                        data: {
                            CouponListIdArray: id
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
            $('#coupon_list_table').DataTable().ajax.reload();
        });

        $('#ok_button').click(function () {
            let target = "{{route('admin.coupon')}}/" + delete_id + '/delete';
            
            $.ajax({
                url: target,
                beforeSend: function () {
                    $('#ok_button').text('{{trans('file.Deleting...')}}');
                },
                success: function (data) {
                    let html = '';
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                    }
                    if (data.error) {
                        html = '<div class="alert alert-danger">' + data.error + '</div>';
                    }
                    setTimeout(function () {
                        $('#general_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        $('#confirmModal').modal('hide');
                        $('#coupon_list_table').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });
        $('#coupon_list_table').on('click','.status',function () {
            let id = $(this).attr('id');
            
            let status = $(this).attr('status');
            
            var target = "{{route('admin.coupon')}}/" + id +'/'+ status  ;

            $.ajax({

                 url:target,
                 dataType:"json",
                success:function(data) {
                    let html = '';
                    if (data.success) {
                        html = '<div class="alert alert-success">'+data.success + "</div>";
                        $('#coupon_list_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            })  
        });
</script>
@endsection
