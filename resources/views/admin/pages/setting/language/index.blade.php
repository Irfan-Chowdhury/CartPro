@extends('admin.main')
@section('title','Admin | Language')
@section('admin_content')

<section>
    <div class="container-fluid"><span id="general_result"></span></div>

    @include('admin.includes.alert_message')

    <div class="container-fluid mb-3">

		<div class="d-flex">
			<div class="p-2">
				<h2 class="font-weight-bold mt-3">@lang('file.Language')</h2>
				<div id="success_alert" role="alert"></div>
        		<br>
			</div>
			<div class="ml-auto p-2">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">@lang('file.Dashboard')</a></li>
						<li class="breadcrumb-item active" aria-current="page">@lang('file.Language')</li>
					</ol>
				</nav>
			</div>
		</div>

        @if (auth()->user()->can('locale-store'))
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalForm"><i class="fa fa-plus"></i>{{__('Add Language')}}</button>
        @endif
    </div>
    <div class="table-responsive">
    	<table id="menu_table" class="table ">
    	    <thead>
        	   <tr>

        		    <th scope="col">{{__('file.Language Name')}}</th>
        		    <th scope="col">{{__('file.Locale')}}</th>
        		    <th scope="col">{{__('file.Default')}}</th>
        		    <th  scope="col">{{trans('file.action')}}</th>
        	   </tr>
    	  	</thead>
			<tbody>
				@foreach ($languages as $key=> $item)
					<tr>
						<td>{{ $item->language_name }}</td>
						<td>{{ $item->local }}</td>
						<td>@if($item->local == Session::get('currentLocal')) <span class='p-2 badge badge-success'>Default</span> @else <span class='p-2 badge badge-dark'>None</span> @endif</td>
						<td>
                            <a href="{{route('admin.setting.language.delete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><i class="dripicons-trash" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-info"><i class="dripicons-pencil" aria-hidden="true" data-toggle="modal" data-target="#editModalForm-{{$item->local}}"></i></button>
                        </td>
					</tr>
				@endforeach
			</tbody>

    	</table>
    </div>
</section>

    @include('admin.pages.setting.language.create')
    @foreach ($languages as $key=> $item)
        @include('admin.pages.setting.language.edit')
    @endforeach
@endsection
