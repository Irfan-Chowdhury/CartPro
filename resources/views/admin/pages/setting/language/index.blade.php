@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>

    @include('admin.includes.alert_message')

    <div class="container-fluid mb-3">

		<div class="d-flex">
			<div class="p-2">
				<h2 class="font-weight-bold mt-3">Language</h2>
				<div id="success_alert" role="alert"></div>
        		<br>
			</div>
			<div class="ml-auto p-2">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Language</li>
					</ol>
				</nav>
			</div>
		</div>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i>{{__('Add Language')}}</button>
        {{-- <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> {{__('Bulk delete')}}</button> --}}
    </div>
    <div class="table-responsive">
    	<table id="menu_table" class="table ">
    	    <thead>
        	   <tr>
        		    {{-- <th class="not-exported"></th>     --}}
        		    {{-- <th scope="col">{{trans('Serial')}}</th> --}}
        		    <th scope="col">{{__('Language Name')}}</th>
        		    <th scope="col">{{__('Local')}}</th>
        		    <th scope="col">{{__('Default')}}</th>
        		    <th scope="col">{{trans('file.action')}}</th>
        	   </tr>
    	  	</thead>
			<tbody>
				@foreach ($languages as $key=> $item)
					<tr>
						{{-- <td>{{ $key+1 }}</td> --}}
						<td>{{ $item->language_name }}</td>
						<td>{{ $item->local }}</td>
						<td>@if($item->local == Session::get('currentLocal')) <span class='p-2 badge badge-success'>Default</span> @else <span class='p-2 badge badge-dark'>None</span> @endif</td>
						<td>
							
							{{-- <a href="#" class="btn btn-info"><i class="fa fa-cog" aria-hidden="true"></i></a> --}}
							<a href="{{route('admin.setting.language.delete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><i class="dripicons-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>

    	</table>
    </div>
</section>

@include('admin.pages.setting.language.create')
{{-- @include('admin.pages.menu.confirmation-modal') --}}


@endsection
