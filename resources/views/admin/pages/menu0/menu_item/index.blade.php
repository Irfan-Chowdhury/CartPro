@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3">Items of {{$menu->menu_name}}</h4>
        <div id="success_alert" role="alert"></div>
        <br>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i>{{__(' Add New Menu Item')}}</button>
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> {{__('Bulk delete')}}</button>
    </div>
    <div class="table-responsive">
    	<table id="menu_item_table" class="table ">
    	    <thead>
        	   <tr>
                    <th class="not-exported"></th>
                    {{-- <th scope="col">{{trans('ID')}}</th> --}}
                    <th scope="col">{{__('Item Name')}}</th>
                    <th scope="col">{{__('Type')}}</th>
                    <th scope="col">{{__('Parent')}}</th>
                    <th scope="col">{{__('Status')}}</th>
                    <th scope="col">{{trans('file.action')}}</th>
        	   </tr>
            </thead>
            <tbody>
                @foreach ($menu_items as $item)
                    <tr>
                        <td></td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->type }}</td>
                        <td> @if (isset($item->parentMenu->item_name)) {{$item->parentMenu->item_name}} @else NONE @endif </td>
                        <td> @if ($item->is_active==1) <span class='p-2 badge badge-success'>Active</span> @else <span class='p-2 badge badge-danger'>Deactive</span> @endif </td>
                        <td>
                            <a href="#" class="btn btn-info"><i class="dripicons-pencil"></i></a>
						    <a href="{{route('admin.menu.menu_item.delete',$item->id)}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger"><i class="dripicons-trash"></i></a></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    	</table>
    </div>
</section>

@include('admin.pages.menu.menu_item.create')
{{-- @include('admin.pages.menu.menu_item.confirmation-modal')
@include('admin.pages.menu.menu_item.delete-checkbox-confirm-modal') --}}


<script type="text/javascript">

    $('#type').change(function() {
        var type = $('#type').val();

        if (type){
            $.get("{{route('admin.menu.menu_item.data-fetch-by-type')}}",{type:type}, function (data) {
                console.log(data)
                $('#dependancyType').empty().html(data);
            });
        }else{
            // $('#designationId').empty().html('<option>--Select --</option>');
        }
    });

</script>

@endsection
