@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3">Navigation Menu</h4>
        <div id="success_alert" role="alert"></div>
        <br>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i>{{__(' Add New Menu')}}</button>
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> {{__('Bulk delete')}}</button>
    </div>
    <div class="table-responsive">
    	<table id="navigation_table" class="table ">
    	    <thead>
        	   <tr>
                    <th class="not-exported"></th>    
                    {{-- <th scope="col">{{trans('ID')}}</th> --}}
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Type')}}</th>
                    <th scope="col">{{__('Parent')}}</th>
                    <th scope="col">{{__('Status')}}</th>
                    <th scope="col">{{trans('file.action')}}</th>
        	   </tr>
            </thead>

    	</table>
    </div>
</section>

@include('admin.pages.menu.navigation.create')
@include('admin.pages.menu.navigation.confirmation-modal')
@include('admin.pages.menu.navigation.delete-checkbox-confirm-modal')

<script type="text/javascript">

    $(document).ready(function () {
        let table = $('#navigation_table').DataTable({
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
                url: "{{ route('admin.menu.navigation') }}",
            },

            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false
                }, 
                {
                    data: 'navigation_name',
                    name: 'navigation_name',
                },                   
                {
                    data: 'type',
                    name: 'type',
                },                   
                {
                    data: 'parent',
                    name: 'parent',
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


    $('#type').change(function() {
        var type = $(this).val();
        if (type){
            $.get("{{route('admin.menu.navigation.data-fetch-by-type')}}",{type:type}, function (data) {
                console.log(data)
                $('#dependancyType').empty().html(data);
            });
        }else{
            // $('#designationId').empty().html('<option>--Select --</option>');
        }
    });


    //----------Insert Data----------------------
    $("#save-button").on("click",function(e){
        e.preventDefault();
        var navigation_name = $("#navigationName").val();

        $.ajax({
            url: "{{route('admin.menu.navigation.store')}}",
            type: "POST",
            data: $('#submitForm').serialize(),
            success: function(data){
                console.log(data);
                if (data.errors) {
                    $("#alertMessage").addClass('bg-danger text-center text-light p-1').html(data.errors) //Check in create modal
                }
                else if(data.success){
                    $("#createModalForm").modal('hide');
                    $('#navigation_table').DataTable().ajax.reload();
                    $('#submitForm')[0].reset();
                    //$('select').selectpicker('refresh');
                    $('#success_alert').fadeIn("slow"); //Check in top in this blade
                    $('#success_alert').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#success_alert').fadeOut("slow");
                    }, 3000);
                    // ("#alertMessage").removeClass('bg-danger text-center text-light p-1');
                }
            }
        });
    });


    //---------- Delete Data ----------
    $(document).on("click",".delete",function(e){

        $('#confirmDeleteModal').modal('show');
        var navigationId = $(this).data("id");
        var element = this;
        // console.log(goalTypeIdDelete);

        $("#deleteSubmit").on("click",function(e){
            $.ajax({
                url: "{{route('admin.menu.navigation.delete')}}",
                type: "GET",
                data: {navigation_id:navigationId},
                success: function(data){
                    console.log(data);
                    if(data.success)
                    {
                        $('#navigation_table').DataTable().ajax.reload();
                        $("#confirmDeleteModal").modal('hide');
                        $('#success_alert').fadeIn("slow"); //Check in top in this blade
                        $('#success_alert').addClass('alert alert-success').html(data.success);
                        setTimeout(function() {
                            $('#success_alert').fadeOut("slow");
                        }, 3000);
                    }                        
                }
            });

        });

    });

    // Multiple Data Delete using checkbox
    $("#bulk_delete").on("click",function(){
        var allCheckboxId = [];
        let table = $('#navigation_table').DataTable();
        allCheckboxId = table.rows({selected: true}).ids().toArray();
        console.log(allCheckboxId);

        if(allCheckboxId.length === 0){
            alert("Please Select at least one checkbox.");
        }
        else{
            $('#confirmDeleteCheckboxModal').modal('show');
            $("#deleteCheckboxSubmit").on("click",function(e){
                $.ajax({
                    url : "{{route('admin.menu.navigation.delete.checkbox')}}",
                    type : "GET",
                    data : {all_checkbox_id : allCheckboxId},
                    success : function(data){
                        console.log(data);
                        if(data.success)
                        {
                            $('#navigation_table').DataTable().ajax.reload();
                            $('#navigation_table').rows('.selected').deselect();
                            $("#confirmDeleteCheckboxModal").modal('hide');
                            $('#success_alert').fadeIn("slow"); //Check in top in this blade
                            $('#success_alert').addClass('alert alert-success').html(data.success);
                            setTimeout(function() {
                                $('#success_alert').fadeOut("slow");
                            }, 3000);
                        }
                    }
                });
            });
        }
    });



</script>
@endsection