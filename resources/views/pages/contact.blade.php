@extends('layouts.app')

@section('title') Elevani Fashion @endsection

@section('description') Elevani Fashion @endsection

@section('content')
	<!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">Contact</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->
    <!--Section starts-->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="h5">Write To Us</h3>
                    <form id="contact-form" class="contact-form" method="post" action="{{url('/send-email')}}">
                        @csrf
                        <input type="text" name="name" placeholder="Your Name" class="form-control">
                        <input type="text" name="email" placeholder="Your Email" class="form-control">
                        <input type="text" name="phone" placeholder="Your Phone" class="form-control">
                        <textarea class="form-control" name="message" placeholder="message"></textarea>
                        <button class="button style1 mar-top-30" type="submit">Send</button>
                    </form>
                </div>
                <div class="col-md-4 offset-md-1">
                    <div class="contact-widget mar-bot-30">
                        <h3 class="h5">Get In Touch</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quae eum cupiditate et impedit in!</p>
                        <p>Praesent efficitur, odio at dictum fringilla, leo dolor ornare nulla, quis condimentum enim arcu id magna.</p>
                    </div>
                    <div class="contact-widget mar-bot-30">
                        <h3 class="h5">Our Address</h3>
                        <p><i class="ion-ios-location"></i> Oxford Street, Central London, EB36 B2</p>
                        <p><i class="ion-ios-telephone"></i> 1 800 322 577</p>
                        <p><i class="ion-ios-email"></i> enquiry@cartpro.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@section('script')
    <script type="text/javascript">
		"use strict";

		$('#contact-form').on('submit', function(e){
			e.preventDefault();
            var data = $(this).serialize();
			var route = "{{ url('/send-email') }}";
            $('#contact-form button').html('sending...');
			$.ajax({
		        url: route,
		        type:"POST",
		        data: data,
		        success:function(response){
			        console.log(response);
		            if(response) {
		            	$('.alert').addClass('alert-custom show');
			            $('.alert-custom .message').html('Thanks for your email. We shall get back to you shortly.');
			            $('#contact-form button').html('Send');
                        $('#contact-form').reset();
                        setTimeout(function() {
                            $('.alert').removeClass('show');
                        }, 4000);
		            }
		        },
		    });
		})
	</script>
@endsection