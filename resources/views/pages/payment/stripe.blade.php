@extends('layouts.app')
@section('content')
<style type="text/css">
	/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
@php  
	$setting=DB::table('settings')->first();
	$charge=$setting->shipping_charge;
   
@endphp
	<h2>{{__('Striped Rows')}}</h2>
  <p>{{__('The .table-striped class adds zebra-stripes to a table:')}}</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>{{__('image')}}</th>
        <th>{{__('productname')}}</th>
        <th>{{__('Qunatity')}}</th>
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
		<div class="order_total_title">{{__('Order Total:')}}Dollar {{$sum}}</div>
		<div class="order_total_title">{{__('shipping')}}:Dollar{{$charge}}</div>
		<div class="order_total_title">{{__('vat')}}:0</div>
		<div class="order_total_title">{{__('subtotal')}}:{{$sum + $charge}}</div>
	</div>
	</div>
<div class="contact_form_container">
	<div> 
		<h4>Paynow</h4>
		<form action="{{route('stripe.charge')}}" method="post" id="payment-form">
			@csrf
		  <div class="form-row">
		    <label for="card-element">
		      {{__('Credit or debit card')}}
		    </label>
		    <div id="card-element">
		      <!-- A Stripe Element will be inserted here. -->
		    </div>

		    <!-- Used to display form errors. -->
		    <div id="card-errors" role="alert"></div>
		  </div>
		  {{--extra data--}}
      <input type="hidden" name="total" value="{{$sum}}">
		  <input type="hidden" name="shipping" value="{{$charge}}">
		  <input type="hidden" name="vat" value="0">
		  <input type="hidden" name="subtotal" value="{{$sum+$charge}}">
      {{--shipping details pass--}}
      <input type="hidden" name="name" value="{{$data['name']}}">
      <input type="hidden" name="email" value="{{$data['email']}}">
      <input type="hidden" name="phone" value="{{$data['phone']}}">
      <input type="hidden" name="address" value="{{$data['address']}}">
      <input type="hidden" name="city" value="{{$data['city']}}">

		  <button class="btn btn-info">{{__('Pay Now')}}</button>
		</form>

	</div>
<script type="text/javascript">
	// Create a Stripe client.
var stripe = Stripe('pk_test_51Hp6jpFw96ArDCjlETLIfrqPwnl2jaeBbBzRRiAqhSJrtZ4DlHwDxb4IvAkTveoZhTXf9a12oIuD7fiXCKvboTp9000yFLwOHA');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection
