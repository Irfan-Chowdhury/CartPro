@extends('frontend.layouts.master')
@section('title','All Categories')

@section('frontend_content')

{{-- @inject('category', 'App\Http\Controllers\Frontend\CategoryProductController') --}}

    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="home.html">@lang('file.Home')</a></li>
                        <li class="active">@lang('file.All Category')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->

    <!-- Content Wrapper -->
    <section class="content-wrapper mt-0 mb-5">
        <div class="container">
            @forelse ($categories as $category)
                <div class="row mt-5">
                    <h4><a href="{{route('cartpro.category_wise_products',$category->slug)}}"> <img src="{{$category->image}}" height="60px" width="80px"> &nbsp;{{$category->categoryName}} ({{$category->totalProducts}}) </a></h4>
                    <hr>
                    <div class="row">
                        @forelse ($category->childs as $value)
                            <div class="col-md-2 mt-3">
                                <p><a href="{{route('cartpro.category_wise_products',$value->slug)}}"><b> {{$value->childCategoryName}} ({{$value->totalProducts}})</b></a></p>
                                {{-- @foreach ($value->childs as $data)
                                    &nbsp;&nbsp;&nbsp; ---- <a href="{{route('cartpro.category_wise_products',$data->slug)}}">{{$data->childCategoryName}} ({{$data->totalProducts}}) </a> <br>
                                @foreach --}}
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>
@endsection
