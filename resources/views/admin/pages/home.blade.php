@extends('admin.main')

@section('title','Admin | Dashboard')

@section('admin_content')
<section>
    <div class="container-fluid"><h3>@lang('file.Welcome Admin') </h3></div>
</section>
<section>
    <div class="container-fluid">
       <div class="row">
        <div class="col-sm-3">
            <div class="card">
            <div class="card-body">
                <h1 class="card-title">@lang('file.Total Sales')</h1>
                <div class="d-flex">
                <div class="p-2"><h2><i class="fa fa-money pull-left"></i></h2></div>
                <div class="ml-auto p-2">
                    <h2>
                        @if(env('CURRENCY_FORMAT')=='suffix')
                            {{ number_format($orders->where('order_status','completed')->sum('total'), 2)}} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                        @else
                            {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format($orders->where('order_status','completed')->sum('total'), 2)}}
                        @endif

                    </h2>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                <h1 class="card-title">@lang('file.Total Orders')</h1>
                <div class="d-flex">
                    <div class="p-2"><h2><i class="fa fa-cubes"></i></h2></div>
                    <div class="ml-auto p-2"><h2>{{count($orders)}}</h2></div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                <h1 class="card-title">@lang('file.Total Products')</h1>
                <div class="d-flex">
                    <div class="p-2"><h2><i class="fa fa-cubes"></i></h2></div>
                    <div class="ml-auto p-2"><h2>{{count($products)}}</h2></div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                <h1 class="card-title">@lang('file.Total Register Customers')</h1>
                <div class="d-flex">
                    <div class="p-2"><h2><i class="fa fa-users pull-left"></i></h2></div>
                    <div class="ml-auto p-2"><h2>{{count($customers)}}</h2></div>
                </div>
                </div>
            </div>
        </div>

        <div class="ml-2 col-sm-10">
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
