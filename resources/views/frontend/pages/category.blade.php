@extends('frontend.layouts.master')
@section('title','Category')

@section('frontend_content')

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
    @php
        $categories = \App\Models\Category::with(['catTranslation','parentCategory.catTranslation','categoryTranslationDefaultEnglish','child.catTranslation'])
                    ->where('is_active',1)
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','ASC')
                    ->get();
    @endphp

    <!-- Content Wrapper -->
    <section class="content-wrapper mt-0 mb-5">
        <div class="container">
                @forelse ($categories->where('parent_id',NULL) as $item)
                    <div class="row mt-5">
                        <h4><img src="{{asset('public/'.$item->image)}}" height="60px" width="80px"> &nbsp; {{$item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null }}</h4>
                        <hr>
                        <div class="row">
                            @forelse ($item->child as $value)
                                <div class="col-md-3">
                                    <p><b> {{$value->catTranslation->category_name }} </b></p>
                                    @forelse ($value->child as $data)
                                        &nbsp;&nbsp;&nbsp; ---- <span>{{$data->catTranslation->category_name }}</span> <br>
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
