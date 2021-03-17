@extends('layouts.app')
@section('content')
	
  <h2>{{__('Striped Rows')}}</h2>
  <p>{{__('The .table-striped class adds zebra-stripes to a table')}}:</p> 
  @if(!empty($cart))           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>{{__('image')}}</th>
        <th>{{__('productname')}}</th>
        <th>
        	{{__('Qunatity')}}	
        </th>
        <th>{{__('Unit price')}}</th>
        <th>{{__('Total price')}}</th>
        <th>{{__('Action')}}</th>
      </tr>
    </thead>
    <tbody>
	@php
	$sum = 0;
	@endphp
    @foreach($cart as $value)
      <tr>
        <td><img src="{{URL::to($value['image'])}}"></td>
        <td>{{$value['name']}}</td>
        <td>
        {{$value['qty']}}
        <form method="post" action="{{ route('update.cartitem')}}">
				@csrf
      <input type="hidden" name="cartid" value="{{$value['id']}}">  	
			<input type="number" name="qty" value="" style="width: 60px; height: 30px;">
			<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></button>
		</form>
    	</td>
        <td>{{$value['unit_price']}}</td>
        @php
        $sum = $sum + $value['total_price'];
        @endphp
        <td>{{$value['total_price']}}</td>
        <td><a href="{{url('remove/cart/'.$value['id'])}}" class="btn btn alert">x</a></td>
      </tr>
    @endforeach  
    </tbody>
  </table>
  	<div class="order_total">
	<div class="order_total_content text-md-right">
		<div class="order_total_title">{{__('Order Total')}}:</div>
		<div class="order_total_amount">{{__('Dollar')}} : {{Session::get('subTotal')}}</div>
	</div>
	</div>
  <div>
    <button type="button" class="button cart_button_clear">{{__('All Cancel')}}</button>
    <a href="{{ route('user.checkout') }}" class="button cart_button_checkout">{{__('Checkout')}}</a>
  </div>
  @else
  <h1>{{__('You have no Items into Cart')}}</h1>
  @endif
@endsection