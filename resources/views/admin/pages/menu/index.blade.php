@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>

    @include('admin.includes.alert_message')

    <div class="container-fluid mb-3">

		<div class="d-flex">
			<div class="p-2">
				<h2 class="font-weight-bold mt-3">Menus</h2>
				<div id="success_alert" role="alert"></div>
        		<br>
			</div>
			<div class="ml-auto p-2">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Menu</li>
					</ol>
				</nav>
			</div>
		</div>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i>{{__('Add New Menu')}}</button>
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> {{__('Bulk delete')}}</button>
    </div>
    <div class="table-responsive">
    	<table id="menu_table" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>    
        		    {{-- <th scope="col">{{trans('Serial')}}</th> --}}
        		    <th scope="col">{{__('Name')}}</th>
        		    <th scope="col">{{__('Status')}}</th>
        		    <th scope="col">{{trans('file.action')}}</th>
        		    {{-- <th scope="col">Menu Item</th> --}}
        	   </tr>
    	  	</thead>
			{{-- <tbody>
				@foreach ($menus as $key=> $item)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $item->menu_name }}</td>
						<td>@if($item->is_active ==1) <span class='p-2 badge badge-success'>Active</span> @else <span class='p-2 badge badge-danger'>Deactive</span> @endif</td>
						<td>
							
							<a href="{{route('admin.menu.menu_item',$item->id)}}" class="btn btn-info"><i class="fa fa-cog" aria-hidden="true"></i></a>
							<a href="{{route('admin.menu.delete',$item->id)}}" class="btn btn-danger"><i class="dripicons-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody> --}}

    	</table>
    </div>
</section>

@include('admin.pages.menu.create')
@include('admin.pages.menu.confirmation-modal')


<script type="text/javascript">

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
    });

	$(document).ready(function () {
        let table = $('#menu_table').DataTable({
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
                url: "{{ route('admin.menu') }}",
            },

            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false
                }, 
                {
                    data: 'menu_name',
                    name: 'menu_name',
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
    $("#save-button").on("click",function(e){
        e.preventDefault();

        $.ajax({
            url: "{{route('admin.menu.store')}}",
            type: "POST",
            data: $('#submitForm').serialize(),
            success: function(data){
                console.log(data);
                if (data.errors) {
                    $("#alertMessage").addClass('bg-danger text-center text-light p-1').html(data.errors) //Check in create modal
                }
                else if(data.success){
                    $("#createModalForm").modal('hide');
                    $('#menu_table').DataTable().ajax.reload();
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

	
</script>

@endsection


{{-- <form action="{{route('admin.menu.menu_item.index',$item->id)}}" method="get"> --}}
{{-- <form action="{{route('admin.menu.menu_item.index')}}" method="get">
	<button type="submit" class="btn btn-info"><i class="fa fa-cog" aria-hidden="true"></i></button>
</form> --}}

{{-- //---------- Delete Data ----------
    // $(document).on("click",".delete",function(e){

	// 	$('#confirmDeleteModal').modal('show');
	// 	var menuId = $(this).data("id");

	// 	console.log(menuId);

	// 	$("#deleteSubmit").on("click",function(e){
	// 		$.ajax({
	// 			url: "{{route('admin.menu.delete')}}",
	// 			type: "GET",
	// 			data: {menu_Id:menuId},
	// 			success: function(data){
	// 				console.log(data);
	// 				if(data.success)
	// 				{
	// 					$('#menu_table').DataTable().ajax.reload();
	// 					$("#confirmDeleteModal").modal('hide');
	// 					$('#success_alert').fadeIn("slow"); //Check in top in this blade
	// 					$('#success_alert').addClass('alert alert-success').html(data.success);
	// 					setTimeout(function() {
	// 						$('#success_alert').fadeOut("slow");
	// 					}, 3000);
	// 				}                        
	// 			}
	// 		});

	// 	});

	// }); --}}