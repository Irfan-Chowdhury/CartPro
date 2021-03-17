@extends('layouts.app')
@section('content')
  <h2>{{__('Striped Rows')}}</h2>
  <p>{{__('The .table-striped class adds zebra-stripes to a table:')}}</p>            
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
    	</td>
        <td>{{$value['unit_price']}}</td>
        @php
        $sum = $sum + $value['total_price'];
        @endphp
        <td>{{$value['total_price']}}</td>
      </tr>
    @endforeach  
    </tbody>
    <div>
      @php
      $sum = $sum - $new_balance;
      @endphp
    </div>
  </table>
  	<div class="order_total">
	<div class="order_total_content text-md-right">
		<div class="order_total_title">{{__('Order Total:')}}</div>
		<div class="order_total_amount">{{__('Dollar :')}} {{$sum}}</div>
	</div>
	</div>
  
  <div class="col">
  	<div class="col-lg-5 " style=" padding: 20px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">{{__('Shipping Address')}}</div>

                        <form action="{{ route('payment.process') }}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('Full Name')}} </label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Full Name " name="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('Phone')}} </label>
                                <input type="text" class="form-control " name="phone"  aria-describedby="emailHelp" placeholder="Phone "  required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('Email')}} </label>
                                <input type="text" class="form-control " name="email"   aria-describedby="emailHelp" placeholder="Email " required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('Address')}}</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="address" name="address" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('City')}}</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="city" name="city" required="">
                            </div>
                            <div class="contact_form_title text-center">{{__('Payment By')}}</div>
                           <div class="form-group">
                                <ul class="logos_list " >
                                            <li><input type="radio" name="payment" value="stripe"> {{__('stripe')}}<img src="" style="width: 100px; height: 60px;"></li>
                                            <li><input type="radio" name="payment" value="paypal">{{__('paypal')}} <img src="" style="width: 100px;"></li>
                                             <li><input type="radio" name="payment" value="ideal">{{__('ideal')}} <img src="" style="width: 100px; height: 80px;"></li>
                                 </ul>
                            </div><br>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">{{__('Pay Now')}}</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
  </div>
@endsection
