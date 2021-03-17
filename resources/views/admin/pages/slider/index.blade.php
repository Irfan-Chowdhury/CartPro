@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3">Slider</h4>
        <div id="success_alert" role="alert"></div>
        <br>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i>{{__(' Add New Slide')}}</button>
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> {{__('Bulk delete')}}</button>
    </div>
    <div class="table-responsive">
    	<table id="slider_table" class="table">
    	    <thead>
        	   <tr>
                    <th class="not-exported"></th>    
                    <th scope="col">{{__('Image')}}</th>
                    <th scope="col">{{__('Title')}}</th>
                    <th scope="col">{{__('Subtitle')}}</th>
                    <th scope="col">{{__('Type')}}</th>
                    <th scope="col">{{__('Status')}}</th>
                    <th scope="col">{{trans('file.action')}}</th>
        	   </tr>
            </thead>
            {{-- <tbody>
                @foreach ($sliders as $item)
                    <tr>
                        <td><img src="{{asset('public'.$item->image)}}" style="width: 100px; width:100px"></td>
                        <td>{{$item->slider_title}}</td>
                        <td>{{$item->slider_subtitle}}</td>
                        <td>{{$item->type}}</td>
                        <td>@if($item->is_active ==s 1) <pan class='p-2 badge badge-success'>Active</span> @else <span class='p-2 badge badge-danger'>Deactive</span> @endif</td>
                        <td>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="{{route('admin.slider.delete',$item->id)}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}

    	</table>
    </div>
</section>

@include('admin.pages.slider.create')
@include('admin.pages.slider.edit')
@include('admin.pages.slider.confirmation-modal')


<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        let table = $('#slider_table').DataTable({
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
                url: "{{ route('admin.slider') }}",
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
                        return "<img style='width:80px; height:60px' src={{ URL::to('public') }}" + data + "/>";
                    }
                }, 
                {
                    data: 'slider_title',
                    name: 'slider_title',
                },                   
                {
                    data: 'slider_subtitle',
                    name: 'slider_subtitle',
                },                   
                {
                    data: 'type',
                    name: 'type',
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

    //Change Type
    $('#type').change(function() {
        var type = $(this).val();
        if (type){
            $.get("{{route('admin.slider.data-fetch-by-type')}}",{type:type}, function (data) {
                console.log(data)
                $('#dependancyType').empty().html(data);
            });
        }else{
            // $('#designationId').empty().html('<option>--Select --</option>');
        }
    });

    //----------Insert Data----------------------
    $("#submitForm").on("submit",function(e){
        e.preventDefault();
        var formData = new FormData(this); //For Image always use this method

        $.ajax({
            url: "{{route('admin.slider.store')}}",
            type: "POST",
            data: formData,
            contentType: false, //That means we send mulitpart/data
            processData: false, //deafult value is true- that means pass data as object/string. false is opposite.
            success: function(data){
                console.log(data);
                if (data.errors) {
                    $("#alertMessage").addClass('bg-danger text-center text-light p-1').html(data.errors) //Check in create modal
                }
                else if(data.success){
                    $("#createModalForm").modal('hide');
                    $('#slider_table').DataTable().ajax.reload();
                    $('#submitForm')[0].reset();
                    $('select').selectpicker('refresh');
                    $('#success_alert').fadeIn("slow"); //Check in top in this blade
                    $('#success_alert').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#success_alert').fadeOut("slow");
                    }, 3000);
                    ("#alertMessage").removeClass('bg-danger text-center text-light p-1');
                }
            }
        });
    });


    // --------------------- Edit ------------------
    $(document).on("click",".edit",function(e){
        e.preventDefault();
        // $('#EditformModal').modal('show');
        var sliderId = $(this).data("id");
        var element = this;
        console.log(sliderId)

        $.ajax({
            url: "{{route('admin.slider.edit')}}",
            type: "GET",
            data: {slider_id:sliderId},
            success: function(data){
                console.log(data)
                $('#sliderId').val(data.slider.id);
                $('#sliderTitleEdit').val(data.slider.slider_title);
                $('#sliderSubtitleEdit').val(data.slider.slider_subtitle);
                $('#typeEdit').selectpicker('val', data.slider.type);

                //Later
                if (data.slider.type=='category') {
                    $('#text').empty().append('Category');
                    //Working Later
                }
                else if (data.slider.type=='page') {
                    $('#text').empty().append('Page');
                    //Working Later
                }
                else if (data.slider.type=='url') {
                    $('#text').empty().append('URL');
                    //Working Later
                }
                //Later

                $('#targetEdit').selectpicker('val', data.slider.target);
                if (data.slider.is_active==1) {
                    $('#is_activeEdit').attr('checked', true)
                }
                
                // let all_employees = '';
                // $.each(data.employees, function (index, value) {
                //     all_employees += '<option value=' + value['id'] + '>' + value['first_name'] + value['last_name'] + '</option>';
                // });
                // $('#employeeIdEdit').empty().append(all_employees);
                // $('#employeeIdEdit').selectpicker('refresh');
                // $('#employeeIdEdit').selectpicker('val', data.appraisal.employee_id);
                // $('#employeeIdEdit').selectpicker('refresh');

                $('#EditformModal').modal('show');
            }
        });
    });

    //----------Insert Data----------------------
    $("#updatetForm").on("submit",function(e){
        e.preventDefault();
        var formData = new FormData(this); //For Image always use this method

        $.ajax({
            url: "{{route('admin.slider.update')}}",
            type: "POST",
            data: formData,
            contentType: false, //That means we send mulitpart/data
            processData: false, //deafult value is true- that means pass data as object/string. false is opposite.
            success: function(data){
                console.log(data);
                if (data.errors) {
                    $("#alertMessage").addClass('bg-danger text-center text-light p-1').html(data.errors) //Check in create modal
                }
                else if(data.success){
                    $("#EditformModal").modal('hide');
                    $('#slider_table').DataTable().ajax.reload();
                    $('#updatetForm')[0].reset();
                    $('select').selectpicker('refresh');
                    $('#success_alert').fadeIn("slow"); //Check in top in this blade
                    $('#success_alert').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#success_alert').fadeOut("slow");
                    }, 3000);
                    ("#alertMessageEdit").removeClass('bg-danger text-center text-light p-1');
                }
            }
        });
    });



    //---------- Delete Data ----------
    $(document).on("click",".delete",function(e){

        $('#confirmDeleteModal').modal('show');
        var sliderId = $(this).data("id");
        var element = this;
        // console.log(goalTypeIdDelete);

        $("#deleteSubmit").on("click",function(e){
            $.ajax({
                url: "{{route('admin.slider.delete')}}",
                type: "GET",
                data: {slider_id:sliderId},
                success: function(data){
                    console.log(data);
                    if(data.success)
                    {
                        $('#slider_table').DataTable().ajax.reload();
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

</script>
@endsection