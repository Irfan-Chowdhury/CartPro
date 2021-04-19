@extends('admin.main')
@section('admin_content')
<section>
@php
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $local = Session::get('currentLocal');
    $tr    = new GoogleTranslate($local);
@endphp

        <div class="container-fluid"><span id="alert_message"></span></div>

        <div class="container-fluid mb-3">
                <button type="button" class="btn btn-info parent_load" name="create_record" id="create_record">
                    <i class="fa fa-plus"></i> {{$tr->translate('Add Category')}}
                </button>
                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete">
                    <i class="fa fa-minus-circle"></i> {{$tr->translate('Bulk delete')}}
                </button>
        </div>

        <div class="table-responsive">
            <table id="category_list-table" class="table ">
                <thead>
                    <tr>
                        <th class="not-exported"></th>
                        <th scope="col">{{$tr->translate('Category Name')}}</th>
                        <th scope="col">{{$tr->translate('Parent')}}</th>
                        <th scope="col">{{$tr->translate('Status')}}</th>
                        <th scope="col">{{$tr->translate('Action')}}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>



    {{-- <div id="confirmModal" class="modal fade" role="dialog">
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
    </div> --}}

    @include('admin.pages.category.create')
    @include('admin.pages.category.edit_modal')

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
                    url: "{{ route('admin.category') }}",
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
                    //      return "<img class='profile-photo md' src={{ URL::to('/') }}/" + data + "/>";
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
            $('.modal-title').text('{{__('Add Category')}}');
            $('#formModal').modal('show');
        });

        //----------Insert Data----------------------

        $('#submitForm').on('submit', function (e) {
            e.preventDefault();

            console.log('ok');

            $.ajax({
                url: "{{route('admin.category.store')}}",
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
                        $('#alert_message').fadeIn("slow"); //Check in top in this blade
                        $('#alert_message').addClass('alert alert-success').html(data.success);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                    }
                }
            });
        });

        $(document).on('click', '.edit', function () {

            var id = $(this).data("id");
            $('#alert_message').html('');

            $.ajax({
                url: "{{ route('admin.category.edit') }}",
                type: "GET",
                data: {category_id:id},
                success: function (data) {
                    $('#category_id').val(data.category.id);
                    $('#category_translation_id').val(data.categoryTranslation.id);
                    $('#category_name_edit').val(data.categoryTranslation.category_name);
                    $('#description_edit').val(data.category.description);
                    $('#parent_id_edit').selectpicker('val', data.category.parent_id);
                    $('#description_position_edit').selectpicker('val', data.category.description_position);
                    if (data.category.featured === 1) {
                        $('#featured_edit').prop('checked', true);
                    } else {
                        $('#featured_edit').prop('checked', false);
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

        //----------Update Data----------------------

        $('#updateForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('admin.category.update')}}",
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
                        $('#error_message_edit').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                    else if(data.success){
                        $('#category_list-table').DataTable().ajax.reload();
                        $('#updateForm')[0].reset();
                        $("#editModal").modal('hide');
                        $('#alert_message').fadeIn("slow"); //Check in top in this blade
                        $('#alert_message').addClass('alert alert-success').html(data.success);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                    }
                }
            });
        });



        $(document).on('click', '#bulk_delete', function () {

            let id = [];
            let table = $('#category_list-table').DataTable();
            id = table.rows({selected: true}).ids().toArray();

            if (id.length > 0) {
                if (confirm('{{__('Delete Selection',['key'=>__('Category Info')])}}')) {
                    $.ajax({
                        url: '{{url('/admin/category/massdelete')}}',
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
            let target = "{{route('admin.category')}}/" + delete_id + '/delete';
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
			url: "{{route('admin.category.active')}}",
			type: "GET",
			data: {id:categoryId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#category_list-table').DataTable().ajax.reload();
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
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
			url: "{{route('admin.category.inactive')}}",
			type: "GET",
			data: {id:categoryId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#category_list-table').DataTable().ajax.reload();
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
			}
		});
	});


    </script>
@endsection



<tbody>
    {{-- @foreach ($categories as $item)
        <tr>
            @if ($item->categoryTranslation->count()>0)
                @foreach ($item->categoryTranslation as $key => $value)
                    @if ($key<1)
                        @if ($value->local==$local)
                            <td>{{$value->category_name}}</td>
                        @elseif($value->local=='en')
                            <td>{{$value->category_name}}</td>
                        @endif
                    @endif
                @endforeach
                <td>
                    @if($item->parentCategory==NULL)
                        NULL
                    @else
                        @php
                            $data = \App\CategoryTranslation::where('category_id',$item->parentCategory->id)->where('local',$local)->first();
                            if (empty($data)) {
                                $data = \App\CategoryTranslation::where('category_id',$item->parentCategory->id)->where('local','en')->first();
                            }
                        @endphp
                        {{$data->category_name}}
                    @endif
                </td>
                <td>@if($item->description_position==0) TOP @else BOTTOM @endif</td>
                <td><img class='profile-photo md' src="{{$item->image}}"/> </td>
                <td>{{$item->featured}}</td>
                <td>@if($item->is_active==1) <span class='p-2 badge badge-success'>Active</span> @else <span class='p-2 badge badge-dark'>Inactive</span> @endif</td>
                <td>
                    <a href="{{route('admin.category.edit',$item->id)}}" class="btn btn-info"><i class="dripicons-pencil"></i></a>
                    <a href="{{route('admin.category.delete',$item->id)}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger"><i class="dripicons-trash"></i></a>
                </td>
            @else
            <td>NULL</td>
            <td>NULL</td>
            <td>NULL</td>
            <td>NULL</td>
            <td>NULL</td>
            <td>NULL</td>
            <td>NULL</td>
        @endif
        </tr> --}}


    {{-- <td>@if($item->parentCategory==NULL) NULL @else {{$item->parentCategory->slug}} @endif</td> --}}


        {{-- <tr>
            @if ($item->brandTranslation->count()>0)
                @foreach ($item->brandTranslation as $key => $value)
                    @if ($key<1)
                        @if ($value->local==$local)
                            <td>{{$value->brand_name}}</td>
                        @elseif($value->local=='en')
                            <td>{{$value->brand_name}}</td>
                        @endif
                    @endif
                @endforeach
                <td>Logo</td>
                <td>@if($item->is_active==1) <span class='p-2 badge badge-success'>Active</span> @else <span class='p-2 badge badge-dark'>Inactive</span> @endif</td>
                <td>
                    <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info"><i class="dripicons-pencil"></i></a>
                    <a href="{{route('admin.brand.delete',$item->id)}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger"><i class="dripicons-trash"></i></a>
                </td>
            @else
                <td>NULL</td>
                <td>NULL</td>
                <td>NULL</td>
            @endif
        </tr> --}}


    {{-- @endforeach
</tbody> --}}
