@extends('layouts.app')

@section('title') Elevani Fashion @endsection

@section('description') Elevani Fashion @endsection

@section('content')
	<!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    {{-- <h1 class="page-title">{{$page->page_name}}</h1> --}}
                    <h1 class="page-title">About Us</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        {{-- <li class="active">{{$page->page_name}}</li> --}}
                        <li class="active">About Us</li>
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
                        {{-- <p>{{$page->description}}</p> --}}
                        <p>Description</p>
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