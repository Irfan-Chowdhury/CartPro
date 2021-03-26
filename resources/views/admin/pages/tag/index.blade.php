@extends('admin.main')
@section('admin_content')


<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3">{{__('Tags')}}</h4>
        <div id="success_alert" role="alert"></div>
        <br>
            
	    <button type="button" class="btn btn-info" name="formModal" data-toggle="modal" data-target="#formModal">
	    	<i class="fa fa-plus"></i> {{__('Add Tag')}}
        </button>
            
        {{-- <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete">
        	<i class="fa fa-minus-circle"></i> {{__('Bulk delete')}}
        </button> --}}
            
    </div>
    <div class="table-responsive">
    	<table id="dataTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>    
        		    <th scope="col">{{trans('Tag Name')}}</th>
        		    <th scope="col">{{trans('file.Status')}}</th>
        		    <th scope="col">{{trans('file.action')}}</th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>
</section>


@include('admin.pages.tag.form_modal')
@include('admin.pages.tag.edit_form_modal')


<script type="text/javascript">

    $(document).ready(function () {
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        let table = $('#dataTable').DataTable({
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
                url: "{{ route('admin.tag.index') }}",
            },
            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'tag_name',
                    name: 'tag_name',
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
                    // 'targets': [0, 3],
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

    // $('#formModal').on('click', function () {
    //     $('#modalTitle').text('{{__('Add Tag')}}');
    //     $('#submitButton').text('{{__('Save')}}');
    //     // $('#tagName').empty().val('');
    //     $('#formModal').modal('show');
    // });

    //----------Insert Data----------------------
    $("#submitForm").on("submit",function(e){
        e.preventDefault();
        var tagName  = $("#tagName").val();
        var isActive = $("#isActive").val();
		// console.log(tagName);
        
        $.ajax({
            url: "{{route('admin.tag.store')}}",
            method: "POST",
            data: $('#submitForm').serialize(),
            success: function (data) {
                console.log(data);
                let html = '';

                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#error_message').html(html).slideDown(300).delay(5000).slideUp(300);
                }
                else if(data.success){
                    $('#dataTable').DataTable().ajax.reload();
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


    //---------- Edit -------------
    $(document).on('click', '.edit', function () {
        var rowId = $(this).data("id");
        $('#success_alert').html('');
        // console.log(rowId);

        $.ajax({
            url: "{{route('admin.tag.edit')}}",
            type: "GET",
            data: {tag_id:rowId},
            success: function (data) {
                console.log(data.tag_name);
                $('#tagIdEdit').val(data.tag.id);
                $('#tagNameEdit').val(data.tag_name);
                if (data.tag.is_active == 1) {
                        $('#isActiveEdit').prop('checked', true);
                } else {
                    $('#isActiveEdit').prop('checked', false);
                }
                $('#EditFormModal').modal('show');
            }
        })
        //$('#titleModalLabel').empty();
    });


    //---------- Update -------------
    $("#updateForm").on("submit",function(e){
        e.preventDefault();
              
        $.ajax({
            url: "{{route('admin.tag.update')}}",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {

                console.log(data);
                // let html = '';

                if (data.error) {
                    html = '<div class="alert alert-danger">' + data.error + '</div>';
                    $('#error_message_edit').html(html).slideDown(300).delay(5000).slideUp(300);
                }
                else if(data.success){
                    $('#dataTable').DataTable().ajax.reload();
                    $('#updateForm')[0].reset();
                    $("#EditFormModal").modal('hide');
                    $('#success_alert').fadeIn("slow"); //Check in top in this blade
                    $('#success_alert').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#success_alert').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });



    //---------- Active -------------
	$(document).on("click",".active",function(e){
		e.preventDefault();
		var rowId = $(this).data("id");
		var element = this;
		console.log(rowId);

		$.ajax({
			url: "{{route('admin.tag.active')}}",
			type: "GET",
			data: {id:rowId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#dataTable').DataTable().ajax.reload();
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
		var rowId = $(this).data("id");
		var element = this;
		console.log(rowId);

		$.ajax({
			url: "{{route('admin.tag.inactive')}}",
			type: "GET",
			data: {id:rowId},
			success: function(data){
				console.log(data);
				if(data.success){
                    $('#dataTable').DataTable().ajax.reload();
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







@endsection