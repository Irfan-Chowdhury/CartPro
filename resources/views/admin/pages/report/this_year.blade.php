@extends('admin.main')
@section('admin_content')

<section>

    <div class="container-fluid mb-3">
        <h4 class="font-weight-bold mt-3">{{__('This Year')}} - {{date('Y')}}</h4>
        <br>
    </div>

    <div class="table-responsive">
    	<table id="datatable1" class="table ">
    	    <thead>
                <tr>
                    <th class="wd-15p text-center">Customer Name</th>
                    <th class="wd-15p text-center">Customer Email</th>
                    <th class="wd-15p text-center">Payment Type</th>
                    <th class="wd-15p text-center">Transection ID</th>
                    <th class="wd-15p text-center">Total Products</th>
                    <th class="wd-15p text-center">Amount</th>
                    <th class="wd-15p text-center">Date</th>
                    <th class="wd-20p text-center">Order Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $row)
                    <tr class="text-center">
                        @if ($row->billing_first_name==NULL && $row->billing_last_name==NULL)
                            <td>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</td>
                        @else
                            <td>{{ $row->billing_first_name.' '.$row->billing_last_name }}</td>
                        @endif

                        @if ($row->billing_first_name==NULL && $row->billing_last_name==NULL)
                            <td>{{ Auth::user()->email }}</td>
                        @else
                            <td>{{ $row->billing_email }}</td>
                        @endif

                        <td>{{ $row->payment_method }}</td>
                        <td>{{ $row->payment_id }}</td>
                        <td>{{ count($row->orderDetails) }}</td>
                        <td>{{env('DEFAULT_CURRENCY_SYMBOL')}} {{ $row->total }}</td>
                        <td>{{ date('Y-m-d',strtotime($row->created_at)) }}</td>
                        @if($row->order_status == 'completed')
                            <td class="badge badge-warning">{{ strtoupper($row->order_status) }}</td>
                        @elseif($row->order_status == 'pending')
                            <td class="badge badge-info">{{ strtoupper($row->order_status) }}</td>
                        @elseif($row->order_status == 'canceled')
                            <td class="badge badge-danger">{{ strtoupper($row->order_status) }}</span>
                        @endif
                    </tr>
                @endforeach
            </tbody>
    	</table>
    </div>
</section>

<script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>
@endsection

