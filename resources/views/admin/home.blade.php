@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><h3>@lang('Welcome Admin') </h3></div>
</section>
	<section>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Total Sales</h1>
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
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Total Orders</h1>
                    <div class="d-flex">
                      <div class="p-2"><h2><i class="fa fa-cubes"></i></h2></div>
                      <div class="ml-auto p-2"><h2>{{count($orders)}}</h2></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Total Products</h1>
                    <div class="d-flex">
                      <div class="p-2"><h2><i class="fa fa-cubes"></i></h2></div>
                      <div class="ml-auto p-2"><h2>{{count($products)}}</h2></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Total Register Customers</h1>
                    <div class="d-flex">
                      <div class="p-2"><h2><i class="fa fa-users pull-left"></i></h2></div>
                      <div class="ml-auto p-2"><h2>{{count($customers)}}</h2></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title"><i class="fa fa-shopping-cart"></i> Latest Orders</h1>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $item)
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
    </section>
@endsection
