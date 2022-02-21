<!--Home Banner starts -->
<div class="banner-area v3">
    <div class="container">
        <div class="single-banner-item style2">
            <div class="row">
                @if ($store_front_slider_format == 'full_width')
                    <div class="col-md-12">
                        <div class="banner-slider">
                            <!-- Item -->
                            @foreach ($sliders as $item)
                                @if ($item->sliderTranslation->isNotEmpty())
                                    <div class="item">
                                        @if($item->slider_image!==null && Illuminate\Support\Facades\File::exists(public_path($item->slider_image)))
                                            <div class="img-fill" style="background-image: url({{url('public/'.$item->slider_image)}}); background-size: cover; background-position: center;"></div>
                                        @else
                                            <div class="img-fill" style="background-image: url('https://dummyimage.com/1269x300/12787d/ffffff&text=Slider'); background-size: cover; background-position: center;"></div>
                                        @endif
                                            <div class="@if($item->text_alignment=='right') info right @else info @endif" >
                                                <h3>{{$item->sliderTranslation[0]->slider_title}}</h3>
                                                <h5>{{$item->sliderTranslation[0]->slider_subtitle}}</h5>
                                                {{-- <a class="button style1 md" href="">Read More</a> --}}
                                            </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($slider_banners as $key => $item)
                                <div class="col-sm-4">
                                    @if($slider_banners[$key]['image']!==null && Illuminate\Support\Facades\File::exists(public_path($slider_banners[$key]['image'])))
                                        <a href="#"><div class="slider-banner" style="background-image:url({{asset('public/'.$slider_banners[$key]['image'])}});background-size:cover;background-position: center;"></a>
                                    @else
                                        <div class="slider-banner" style="background-image:url('https://dummyimage.com/75.1526x75.1526/12787d/ffffff&text=Slider-Banner');background-size:cover;background-position: center;"></div>
                                    @endif
                                        <div>
                                            <h4>{{$slider_banners[$key]['title']}}</h4>
                                        </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-8">
                        <div class="banner-slider">
                            <!-- Item -->
                            @foreach ($sliders as $item)
                                @if ($item->sliderTranslation->isNotEmpty())
                                    <div class="item">
                                        @if($item->slider_image!==null && Illuminate\Support\Facades\File::exists(public_path($item->slider_image)))
                                            <div class="img-fill" style="background-image: url({{url('public/'.$item->slider_image)}}); background-size: cover; background-position: center;"></div>
                                        @else
                                            <div class="img-fill" style="background-image: url('https://dummyimage.com/1269x300/12787d/ffffff&text=Slider'); background-size: cover; background-position: center;"></div>
                                        @endif
                                            <div class="@if($item->text_alignment=='right') info right @else info @endif" >
                                                <div>
                                                    <h3>{{$item->sliderTranslation[0]->slider_title}}</h3>
                                                    <h5>{{$item->sliderTranslation[0]->slider_subtitle}}</h5>
                                                    <a class="button style1 md" href="">Read More</a>
                                                </div>
                                            </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        @foreach ($slider_banners as $key => $item)
                            @if($slider_banners[$key]['image']!==null && Illuminate\Support\Facades\File::exists(public_path($slider_banners[$key]['image'])))
                                <div class="slider-banner" style="background-image:url({{asset('public/'.$slider_banners[$key]['image'])}});background-size:cover;background-position: center;">
                                    <div>
                                        <h4>{{$slider_banners[$key]['title']}}</h4>
                                    </div>
                                </div>
                            @else
                                <div class="slider-banner" style="background-image:url('https://dummyimage.com/75.1526x75.1526/12787d/ffffff&text=Slider-Banner');background-size:cover;background-position: center;">
                                    <div>
                                        <h4>{{$slider_banners[$key]['title']}}</h4>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
