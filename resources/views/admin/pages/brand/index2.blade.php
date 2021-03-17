@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">
            
	    <button type="button" class="btn btn-info" name="create_record" id="create_record">
	    	<i class="fa fa-plus"></i> {{__('Add Brand')}}
        </button>
            
    
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete">
        	<i class="fa fa-minus-circle"></i> {{__('Bulk delete')}}
        </button>
            
    </div>
    <div class="table-responsive">
    	<table id="brand_list_table" class="table ">
    	    <thead>
        	   <tr>
        		    {{-- <th class="not-exported"></th>     --}}
        		    <th scope="col">{{trans('Brand Name')}}</th>
        		    <th scope="col">{{__('Logo')}}</th>
        		    <th scope="col">{{__('status')}}</th>
        		    <th scope="col">{{trans('file.action')}}</th>
        	   </tr>
    	  	</thead>
            <tbody>
                @foreach ($brands as $item)
                    <tr>
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
                            <td>NULL</td>
                        @endif
                    </tr>
                @endforeach

                {{-- @foreach ($data as $key => $item)
                    @if ($item==NULL)
                        <tr>
                            <td> {{'NULL'}}</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{$item->brand_name}}</td>
                            <td><img src="{{$item->brand->brand_logo}}"></td>
                            <td>@if($item->brand->is_active ==1) <span class='p-2 badge badge-success'>Active</span> @else <span class='p-2 badge badge-dark'>Inactive</span> @endif</td>
                        </tr>
                    @endif
                @endforeach --}}



                {{-- @foreach ($brands as $item)
                    <tr>
                        @if ($item->local == $language->local)
                            <td>{{$item->brand_name}}</td>
                            <td><img src="{{$item->brand->brand_logo}}"></td>
                            <td>@if($item->brand->is_active ==1) <span class='p-2 badge badge-success'>Active</span> @else <span class='p-2 badge badge-dark'>Deactive</span> @endif</td>
                        @elseif (($item->local != $language->local) && ($item->local=='en'))
                            <td>{{$item->brand_name}}</td>
                            <td><img src="{{$item->brand->brand_logo}}"></td>
                            <td>@if($item->brand->is_active ==1) <span class='p-2 badge badge-success'>Active</span> @else <span class='p-2 badge badge-dark'>Deactive</span> @endif</td>
                        @else 
                            <td>NUL</td>
                            <td>NULL</td>
                            <td>NULL</td>
                        @endif
                    </tr>
                @endforeach --}}
            </tbody>

    	</table>
    </div>

    {{-- <div id="confirmModal" class="modal fade" role="dialog">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h2 class="modal-title">{{trans('file.Confirmation')}}</h2>
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    			</div>
    			<div class="modal-body">
    				<h4 align="center" style="margin:0;">{{__('Are you sure you want to remove this data?')}}</h4>
    			</div>
    			<div class="modal-footer">
    				<button type="button" name="ok_button" id="ok_button" class="btn btn-danger">{{trans('file.OK')}}'</button>
    				<button type="button" class="close btn-default"
                                data-dismiss="modal">{{trans('file.Cancel')}}</button>
    			</div>
    		</div>
    	</div>
    </div> --}}
</section>

@include('admin.pages.brand.create')

<script type="text/javascript">
	//  $(document).ready(function () {
    //         let table_table = $('#brand_list_table').DataTable({
    //             initComplete: function () {
    //                 this.api().columns([1]).every(function () {
    //                     var column = this;
    //                     var select = $('<select><option value=""></option></select>')
    //                         .appendTo($(column.footer()).empty())
    //                         .on('change', function () {
    //                             var val = $.fn.dataTable.util.escapeRegex(
    //                                 $(this).val()
    //                             );

    //                             column
    //                                 .search(val ? '^' + val + '$' : '', true, false)
    //                                 .draw();
    //                         });

    //                     column.data().unique().sort().each(function (d, j) {
    //                         select.append('<option value="' + d + '">' + d + '</option>');
    //                         $('select').selectpicker('refresh');
    //                     });
    //                 });
    //             },
    //             responsive: true,
    //             fixedHeader: {
    //                 header: true,
    //                 footer: true
    //             },
    //             processing: true,
    //             serverSide: true,
    //             ajax: {
    //                 url: "{{ route('admin.brand') }}",
    //             },

    //             columns: [
    //                 {
    //                     data: null,
    //                     orderable: false,
    //                     searchable: false
    //                 },
    //                 {
    //                     data: 'brand_name',
    //                     name: 'brand_name',
    //                 },
    //                 {
    //                     data: 'brand_logo',
    //                     name: 'brand_logo',
    //                     render:function (data) {
    //                      return "<img class='profile-photo md' src={{ URL::to('/') }}/" + data + "/>";
    //                    }
            
    //                 },
    //                 {
    //                     data: 'is_active',
    //                     name: 'is_active',
    //                     render:function (data) {
    //                         if (data == 1) {
    //                             return "<span class='badge badge-success'>Active</span>";
    //                         }else{
    //                             return "<span class='badge badge-danger'>Inactive</span>";
    //                         }
    //                     }   
    //                 },
    //                 // {
    //                 //     data: 'action',
    //                 //     name: 'action',
    //                 //     orderable: false,
    //                 // }
    //             ],


    //             "order": [],
    //             'language': {
    //                 'lengthMenu': '_MENU_ {{__("records per page")}}',
    //                 "info": '{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)',
    //                 "search": '{{trans("file.Search")}}',
    //                 'paginate': {
    //                     'previous': '{{trans("file.Previous")}}',
    //                     'next': '{{trans("file.Next")}}'
    //                 }
    //             },
    //             'columnDefs': [
    //                 {
    //                     "orderable": false,
    //                     'targets': [0, 3],
    //                 },
    //                 {
    //                     'render': function (data, type, row, meta) {
    //                         if (type === 'display') {
    //                             data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
    //                         }

    //                         return data;
    //                     },
    //                     'checkboxes': {
    //                         'selectRow': true,
    //                         'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
    //                     },
    //                     'targets': [0]
    //                 }
    //             ],


    //             'select': {style: 'multi', selector: 'td:first-child'},
    //             'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
    //             dom: '<"row"lfB>rtip',
    //             buttons: [
    //                 {
    //                     extend: 'pdf',
    //                     text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
    //                     exportOptions: {
    //                         columns: ':visible:Not(.not-exported)',
    //                         rows: ':visible'
    //                     },
    //                 },
    //                 {
    //                     extend: 'csv',
    //                     text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
    //                     exportOptions: {
    //                         columns: ':visible:Not(.not-exported)',
    //                         rows: ':visible'
    //                     },
    //                 },
    //                 {
    //                     extend: 'print',
    //                     text: '<i title="print" class="fa fa-print"></i>',
    //                     exportOptions: {
    //                         columns: ':visible:Not(.not-exported)',
    //                         rows: ':visible'
    //                     },
    //                 },
    //                 {
    //                     extend: 'colvis',
    //                     text: '<i title="column visibility" class="fa fa-eye"></i>',
    //                     columns: ':gt(0)'
    //                 },
    //             ],
    //         });
    //         new $.fn.dataTable.FixedHeader(table_table);
    //     });


	$('#create_record').click(function () {
		$('modal-title').text('{{__('Add Account')}}');
		$('#action_button').val('{{trans("file.Add")}}');
		$('#action').val('{{trans("file.Add")}}');
		$('#formModal').modal('show');
	});

	$('#brand_list_table').on('click','.status',function () {
            let id = $(this).data('id');
            let status = $(this).data('status');
            
            var target = "{{route('admin.brand')}}/" + id +'/'+ status  ;

            $.ajax({
                url:target,
                dataType:"json",
                success:function(data) {
                    let html = '';
                    if (data.success) {
                        html = '<div class="alert alert-success">'+data.success + "</div>";
                        $('#category_list-table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            })  
        });

	$('#sample_form').on('submit', function (event) {
			
            event.preventDefault();
            if ($('#action').val() === '{{trans('file.Add')}}') {


                $.ajax({
                    url: "{{route('admin.brand.store')}}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        // let html = '';
                        // if (data.errors) {
                        //     html = '<div class="alert alert-danger">';
                        //     for (let count = 0; count < data.errors.length; count++) {
                        //         html += '<p>' + data.errors[count] + '</p>';
                        //     }
                        //     html += '</div>';
                        // }
                        // if (data.success) {
                        //     html = '<div class="alert alert-success">' + data.success + '</div>';
                        //     $('#sample_form')[0].reset();
                        //     $('#brand_list_table').DataTable().ajax.reload();
                        // }
                        // $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                })
            }

            if ($('#action').val() === '{{trans('file.Edit')}}') {


                $.ajax({
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
                                $('#brand_list_table').DataTable().ajax.reload();
                                $('#sample_form')[0].reset();
                            }, 2000);

                        }
                        $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                });
            }
        });

        // $(document).on('click', '.edit', function () {

        //     let id = $(this).attr('id');
        //     $('#form_result').html('');



        //     // let target = "{{ route('admin.brand') }}/" + id + '/edit';

        //     $.ajax({
        //         url: target,
        //         dataType: "json",
        //         success: function (html) {

        //             $('#brand_name').val(html.data.brand_name);
        //             //$('#parent').val(html.data.parent);
        //             // $('#description').val(html.data.description);
        //             //$('#description_position').val(html.data.bank_branch);
                    


        //             $('#hidden_id').val(html.data.id);

        //             $('.modal-title').text('{{trans('file.Edit')}}');
        //             $('#action_button').val('{{trans('file.Edit')}}');
        //             $('#action').val('{{trans('file.Edit')}}');
        //             $('#formModal').modal('show');
        //         }
        //     })
        // });

        let delete_id;
        $(document).on('click','.delete',function(){
        	delete_id = $(this).attr('id');
        	$('#confirmModal').modal('show');
            $('.modal-title').text('{{__('DELETE Record')}}');
            $('#ok_button').text('{{trans('file.OK')}}');
        });
        
        $('#ok_button').on('click',function(){

        	// let target = "{{route('admin.brand')}}/"+ delete_id + "/delete";
        	$.ajax({
        		url:target,
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
                        $('#brand_list_table').DataTable().ajax.reload();
                    }, 2000);
                }
        	})
        });
        $(document).on('click','.status',function(){
        	let id = $(this).data('id');
        	let status = $(this).data('status');
        	let target = "{{route('admin.brand')}}/"+id+'/'+status;
        	$.ajax({
        		url:target,
        		dataType:'json',
        		success:function(data) {
        			if (data.success) {
        				let html='';
        				html = '<div>'+data.success+'</div>';
        				$('#brand_list_table').DataTable().ajax.reload();
        			}
        			
        		}
        	});
        	
        });	
</script>
@endsection	