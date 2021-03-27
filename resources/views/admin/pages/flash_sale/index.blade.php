@extends('admin.main')
@section('admin_content')

<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">

        <h4 class="font-weight-bold mt-3">Flash Sale</h4>
        <div id="success_alert" role="alert"></div>
        <br>
            
	    <a href="{{route('admin.flash_sale.create')}}" class="btn btn-info">
	    	<i class="fa fa-plus"></i> {{__('Create Flash Sale')}}
        </a>
            
        <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete">
        	<i class="fa fa-minus-circle"></i> {{__('Bulk Action')}}
        </button>
            
    </div>
    <div class="table-responsive">
    	<table id="AtttributeSetTable" class="table ">
    	    <thead>
        	   <tr>
        		    <th class="not-exported"></th>    
        		    <th scope="col">{{trans('Campaign Name')}}</th>
        		    <th scope="col">{{trans('Status')}}</th>
        		    <th scope="col">{{trans('Action')}}</th>
        	   </tr>
    	  	</thead>
    	</table>
    </div>

</section>

@endsection 