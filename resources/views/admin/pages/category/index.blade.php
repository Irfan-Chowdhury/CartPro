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
            @if (auth()->user()->can('category-store'))
                <button type="button" class="btn btn-info parent_load" name="create_record" id="create_record">
                    {{-- <i class="fa fa-plus"></i> {{trans('file.Add_Category')}} --}}
                    <i class="fa fa-plus"></i> @lang('file.Add_Category')
                </button>
            @endif
            @if (auth()->user()->can('category-action'))
                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_action">
                    <i class="fa fa-minus-circle"></i> @lang('file.Bulk_Action')
                </button>
            @endif
        </div>

        <div class="table-responsive">
            <table id="category_list-table" class="table ">
                <thead>
                    <tr>
                        <th class="not-exported"></th>
                        <th scope="col">{{__('file.Image')}}</th>
                        <th scope="col">{{__('Category Name')}}</th>
                        <th scope="col">@lang('Parent')</th>
                        <th scope="col">@lang('Status')</th>
                        <th scope="col">@lang('Action')</th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>

    @include('admin.pages.category.create')
    @include('admin.pages.category.edit_modal')
    @include('admin.includes.confirm_modal')


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
                    console.log(data);
                    $('#category_id').val(data.category.id);
                    $('#category_translation_id').val(data.categoryTranslation.id);
                    $('#category_name_edit').val(data.categoryTranslation.category_name);
                    $('#description_edit').val(data.category.description);
                    $('#cateogry_icon_edit').val(data.category.icon);
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


        //Bulk Action
    $("#bulk_action").on("click",function(){
        var idsArray = [];
        let table = $('#category_list-table').DataTable();
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
                    url: "{{route('admin.category.bulk_action')}}",
                    method: "GET",
                    data: {idsArray:idsArray,action_type:action_type},
                    success: function (data) {
                        if(data.success){
                            $('#bulkConfirmModal').modal('hide');
                            table.rows('.selected').deselect();
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
            $("#inactive").on("click",function(){
                action_type = "inactive";
                console.log(idsArray);
                $.ajax({
                    url: "{{route('admin.category.bulk_action')}}",
                    method: "GET",
                    data: {idsArray:idsArray,action_type:action_type},
                    success: function (data) {
                        if(data.success){
                            $('#bulkConfirmModal').modal('hide');
                            table.rows('.selected').deselect();
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
        }
    });


    </script>
@endsection
