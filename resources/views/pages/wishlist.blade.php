@extends('layouts.app')
@section('content')
<div class="cart_section">
<div class="container">
<div class="row">
	<div class="col-lg-12 ">
		<div class="cart_container">
			<div class="cart_title">{{__('Your Wishlist')}}</div>
			<div class="cart_items">
				<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">{{__('Username')}}</th>
				      <th scope="col">{{__('image')}}</th>
				      <th scope="col">{{__('prduct_name')}}</th>
				      <th scope="col">{{__('Action')}}</th>
				    </tr>
				  </thead>
				  <tbody>
			  	@foreach($product as $row)
				    <tr>
				      <td>{{$row->users->username}}</td>
				      <td><img src="{{URL::to($row->products->image)}}"></td>
				      <td>{{$row->products->product_name}}</td>
				      <td>
				      	<a class="btn btn-warning" href="">{{__('Add_to_Cart')}}</a>
				      	<a class="btn btn-danger" href="{{url('delete/wishlist/'.$row->id)}}">{{__('Delete')}}</a>
				      </td>
				    </tr>
			    @endforeach
				  </tbody>
				</table>
			</div>

		</div>
	</div>
</div>
</div>
</div>

@endsection