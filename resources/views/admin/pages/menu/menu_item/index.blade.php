@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3">Items of {{$menu_name}}</h4>
        <div id="alert_message" role="alert"></div>
        <br>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i>{{__(' Add New Menu Item')}}</button>
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> {{ trans('file.Bulk_Action') }}</button>
    </div>
    <div class="table-responsive">
    	<table id="dataListTable" class="table ">
    	    <thead>
        	   <tr>
                    <th class="not-exported"></th>
                    <th scope="col">{{__('Item Name')}}</th>
                    {{-- <th scope="col">{{__('Type')}}</th>
                    <th scope="col">{{__('Parent')}}</th> --}}
                    <th scope="col">{{__('Status')}}</th>
                    <th scope="col">{{trans('file.action')}}</th>
        	   </tr>
            </thead>
    	</table>
    </div>
</section>

@include('admin.pages.menu.menu_item.create_modal')
@include('admin.pages.menu.menu_item.edit_modal')
{{-- @include('admin.pages.menu.menu_item.confirmation-modal')
@include('admin.pages.menu.menu_item.delete-checkbox-confirm-modal') --}}


<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$(document).ready(function () {
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
                url: "",
            },

            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'menu_item_name',
                    name: 'menu_item_name',
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
        new $.fn.dataTable.FixedHeader(table);
    });

    //----------Insert Data----------------------

    $('#submitForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('admin.menu.menu_item.store')}}",
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
                    $('#error_message').html(html);
                    setTimeout(function() {
                        $('#error_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#dataListTable').DataTable().ajax.reload();
                    $('#submitForm')[0].reset();
                    $("#createModal").modal('hide');
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //---------- Edit -------------
    $(document).on('click', '.edit', function () {
        var rowId = $(this).data("id");
        $('#success_alert').html('');

        $.ajax({
            url: "{{route('admin.menu.menu_item.edit')}}",
            type: "GET",
            data: {menu_item_id:rowId},
            success: function (data) {
                console.log(data.menu_item.id);
                $('#menu_item_id_edit').val(data.menu_item.id);
                $('#menu_item_translation_id_edit').val(data.menu_item_translation_id);
                $('#menu_item_name_edit').val(data.menu_item_name);
                $('#type_edit').selectpicker('val',data.menu_item.type);

                if (data.menu_item.type=='category') {
                    $('#url_edit').addClass('d-none');
                    $('#dependancyTypeForPageEdit').addClass('d-none');
                    $('#changeLabelTextByTypeEdit').text('Category');
                    $('#category_id_edit').selectpicker('val',data.menu_item.category_id);
                }
                else if(data.menu_item.type=='page'){
                    $('#dependancyTypeForCategoryEdit').addClass('d-none');
                    $('#url_edit').addClass('d-none');
                    $('#changeLabelTextByTypeEdit').text('Page');
                    $('#page_id_edit').selectpicker('val',data.menu_item.page_id);
                }
                else if(data.menu_item.type=='url'){
                    $('#dependancyTypeForCategoryEdit').addClass('d-none');
                    $('#dependancyTypeForPageEdit').addClass('d-none');
                    $('#changeLabelTextByTypeEdit').text('URL');
                    $('#url_edit').val(data.menu_item.url);
                }

                $('#icon_edit').val(data.menu_item.icon);
                if (data.menu_item.is_fluid == 1) {
                        $('#is_fluid_edit').prop('checked', true);
                } else {
                    $('#is_fluid_edit').prop('checked', false);
                }
                $('#target_edit').selectpicker('val',data.menu_item.target);
                $('#parent_id_edit').selectpicker('val',data.menu_item.parent_id);
                if (data.menu_item.is_active == 1) {
                        $('#is_active_edit').prop('checked', true);
                } else {
                    $('#is_active_edit').prop('checked', false);
                }
                $('#editModal').modal('show');
            }
        })
    });


    //----------Update Data----------------------

    $('#updateForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('admin.menu.menu_item.update')}}",
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
                    $('#error_message_edit').html(html);
                    setTimeout(function() {
                        $('#error_message_edit').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#dataListTable').DataTable().ajax.reload();
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
        var id = $(this).data("id");

        $.ajax({
            url: "{{route('admin.menu.menu_item.active')}}",
            type: "GET",
            data: {id:id},
            success: function(data){
                console.log(data);
                if(data.success){
                    $('#dataListTable').DataTable().ajax.reload();
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
        var id = $(this).data("id");

        $.ajax({
            url: "{{route('admin.menu.menu_item.inactive')}}",
            type: "GET",
            data: {id:id},
            success: function(data){
                console.log(data);
                if(data.success){
                    $('#dataListTable').DataTable().ajax.reload();
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });


    //Field Change for Type
    $('#type').change(function() {
        var type = $('#type').val();

        if (type=='category') {
            $('#changeLabelTextByType').text('Category');
        }
        else if (type=='page') {
            $('#changeLabelTextByType').text('Page');
        }else{
            $('#changeLabelTextByType').text('URL');
        }

        if (type){
            $.get("{{route('admin.menu.menu_item.data-fetch-by-type')}}",{type:type}, function (data) {
                console.log(data)
               $('#dependancyType').empty().html(data);
            });
        }
    });


    //Field Change for Type Edit
    $('#type_edit').change(function() {
        let type_edit = $('#type_edit').val();
        if (type_edit){
            $.get("{{route('admin.menu.menu_item.data-fetch-by-type')}}",{type:type_edit}, function (data) {
                if (type_edit=='category') {
                    $('#dependancyTypeForCategoryEdit').addClass('d-none');
                    $('#dependancyTypeForPageEdit').addClass('d-none');
                    $('#url_edit').addClass('d-none');

                    $('#changeLabelTextByTypeEdit').text('Category');
                    $('#dependancyTypeEdit').empty().html(data);
                }
                else if (type_edit=='page') {
                    $('#dependancyTypeForCategoryEdit').addClass('d-none');
                    $('#dependancyTypeForPageEdit').addClass('d-none');
                    $('#url_edit').addClass('d-none');

                    $('#changeLabelTextByTypeEdit').text('Page');
                    $('#dependancyTypeEdit').empty().html(data);
                }else{
                    $('#dependancyTypeForCategoryEdit').addClass('d-none');
                    $('#dependancyTypeForPageEdit').addClass('d-none');
                    $('#url_edit').addClass('d-none');

                    $('#changeLabelTextByTypeEdit').text('URL');
                    $('#dependancyTypeEdit').empty().html(data);
                }
            });
        }
    });


    //Action For Close Edit
    $(document).on('click', '#close_edit', function () {
        $('#dependancyTypeForCategoryEdit').removeClass('d-none');
        $('#dependancyTypeForPageEdit').removeClass('d-none');
        $('#url_edit').removeClass('d-none');
        $('#dependancyTypeEdit').empty();
        $('#dataListTable').DataTable().ajax.reload();
        $('#updateForm')[0].reset();
        $("#editModal").modal('hide');
    });

    // $('#submitForm').on('submit', function (e) {});

</script>

@endsection
