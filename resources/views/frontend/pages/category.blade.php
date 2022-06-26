@extends('frontend.layouts.master')
@section('title','Category')

@section('frontend_content')

@inject('category', 'App\Http\Controllers\Frontend\CategoryProductController')

    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="home.html">@lang('file.Home')</a></li>
                        <li class="active">@lang('file.Category')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->

    <!-- Content Wrapper -->
    <section class="content-wrapper mt-0 mb-5">
        <div class="container">
                @forelse ($categories->where('parent_id',NULL) as $item)
                    <div class="row mt-5">
                        <h4><a href="{{route('cartpro.category_wise_products',$item->slug)}}"> <img src="{{asset('public/'.$item->image)}}" height="60px" width="80px"> &nbsp;{{$category->translations($item->categoryTranslation)->category_name}} </a></h4>
                    </h4>
                        <hr>
                        <div class="row">
                            @forelse ($item->child as $value)
                                <div class="col-md-3">
                                    <p><a href="{{route('cartpro.category_wise_products',$value->slug)}}"><b> {{$category->translations($value->categoryTranslation)->category_name}} </b></a></p>
                                    @forelse ($value->child as $data)
                                        &nbsp;&nbsp;&nbsp; ---- <a href="{{route('cartpro.category_wise_products',$data->slug)}}">{{$category->translations($data->categoryTranslation)->category_name}}</a> <br>
                                    @empty
                                    @endforelse
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
