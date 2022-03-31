@extends('admin.main')

@section('title','Admin | Dashboard')

@section('admin_content')
<section>
    <div class="container-fluid"><h3>@lang('file.Welcome Admin') </h3></div>
</section>
<section class="pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon">
                            <i class="dripicons-graph-line" style="color:#733686;font-size:30px;margin-right:15px"></i>
                        </div>
                        <div>
                            <span class="mb-2">
                                @if(env('CURRENCY_FORMAT')=='suffix')
                                    {{ number_format($orders->where('order_status','completed')->sum('total'), 2)}} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                @else
                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format($orders->where('order_status','completed')->sum('total'), 2)}}
                                @endif
                            </span>
                            <h1 class="card-title" style="color: #733686">@lang('file.Total Sales')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon">
                            <i class="dripicons-shopping-bag" style="color:#ff8952;font-size:30px;margin-right:15px"></i>
                        </div>
                        <div>
                            <span class="mb-2">
                                @if($orders)
                                    {{$orders->where('order_status','pending')->count()}}
                                @else
                                    0
                                @endif
                            </span>
                            <h1 class="card-title" style="color: #ff8952">@lang('file.Total Pending Orders')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon">
                            <i class="dripicons-archive" style="color:#00c689;font-size:30px;margin-right:15px"></i>
                        </div>
                        <div>
                            <span class="mb-2">
                                {{count($products)}}
                            </span>
                            <h1 class="card-title" style="color: #00c689">@lang('file.Total Products')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon">
                            <i class="dripicons-user-group" style="color:#297ff9;font-size:30px;margin-right:15px"></i>
                        </div>
                        <div>
                            <span class="mb-2">
                                {{$total_customers}}
                            </span>
                            <h1 class="card-title" style="color: #297ff9">@lang('file.Total Register Customers')</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">@lang('file.Page View Statistics')</h1>
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    <h1 class="card-title"><i class="fa fa-shopping-cart"></i> @lang('file.Latest Orders')</h1>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">@lang('file.Order ID')</th>
                            <th scope="col">@lang('file.Customer')</th>
                            <th scope="col">@lang('file.Status')</th>
                            <th scope="col">@lang('file.Total')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders->where('order_status','pending') as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->billing_first_name.' '.$item->billing_last_name}}</td>
                                    <td>{{$item->order_status}}</td>
                                    <td>
                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                            {{ number_format($item->total,'2')}}  {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                        @else
                                            {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format($item->total,'2')}}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4><i>No order found</i></h4>
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>
    var url = "{{route('admin.dashboard.chart')}}";
    var Years = new Array();
    var Labels = new Array();
    var Prices = new Array();
    $(document).ready(function(){
        $.get(url, function(response){
            response.forEach(function(data){
                const date = new Date(data.date);  // 2009-11-10
                const month = date.toLocaleString('default', { month: 'long' });
                Years.push(month);
                Labels.push(data.pageTitle);
                Prices.push(data.pageViews);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels:Years,
                    datasets: [{
                        label: 'Page Views',
                        data: Prices,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    });
</script>

@endpush
