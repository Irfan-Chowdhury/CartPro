@extends('frontend.layouts.master')
@section('extra_css')
<style type="text/css">

    body
    {
        background:#59b210;
    }

    .payment
	{
		border:1px solid #f2f2f2;
		height:280px;
        border-radius:20px;
        background:#fff;
	}
   .payment_header
   {
	   /*background:rgba(255,102,0,1);*/
	   background:#59b210;
	   padding:20px;
       border-radius:20px 20px 0px 0px;

   }

   .check
   {
	   margin:0px auto;
	   width:50px;
	   height:50px;
	   border-radius:100%;
	   background:#fff;
	   text-align:center;
   }

   .check i
   {
	   vertical-align:middle;
	   line-height:50px;
	   font-size:30px;
   }

    .content
    {
        text-align:center;
    }

    .content  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content a
    {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        /*background:rgba(255,102,0,1);*/
        background:#59b210;
        transition:all ease-in-out 0.3s;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }

</style

@section('frontend_content')

<section>
    <div class="container">
        <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <div class="payment">
                <div class="payment_header">
                    <div class="check"><i class="las la-check"></i></div>
                </div>
                <div class="content">
                    <h1>Payment Success !</h1>
                    <a href="{{route('cartpro.home')}}">Go to Home</a>
                </div>

            </div>
        </div>
        </div>
    </div>
</section>

@endsection
