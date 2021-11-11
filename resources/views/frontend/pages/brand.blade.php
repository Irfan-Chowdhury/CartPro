@extends('frontend.layouts.master')
@section('title','Brands')

@section('frontend_content')

    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li class="active">Brands</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->

    <!-- Content Wrapper -->

    <section class="content-wrapper mt-0 mb-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @forelse ($brands as $brand)
                    <div class="col">
                        <div class="card">
                            <a class="brand-wrapper" href="{{route('cartpro.brand.products',$brand->slug)}}">
                                <img src="{{asset('public/'.$brand->brand_logo)}}">
                            </a>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
