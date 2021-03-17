@extends('layouts.app')

@section('title') Elevani Fashion @endsection

@section('description') Elevani Fashion @endsection

@section('content')
	<!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">About</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->
    <!--Section starts-->
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text mar-bot-30">
                        <span>About Elevani</span>
                        <h2>Elevani is your first choice for Men's clothing...</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur quasi natus quia facilis corporis quibusdam ut non laudantium recusandae fugiat rerum ab aliquid accusamus cumque quae, illum id voluptatem ducimus.</p>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@section('script')

@endsection