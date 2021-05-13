<div class="card">
    <h3 class="card-header"><b>{{__('Footer')}}</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="footerSubmit" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Footer Tag -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('Footer Tags')}}</b></label>
                        {{-- <input type="hidden"> --}}
                        <div class="col-sm-8">
                            <div class="form-check">
                                <select name="storefront_footer_tag_id[]" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='{{__('Select Tag')}}'>
                                    @foreach ($tags as $item)
                                        @forelse ($item->tagTranslation as $key => $value)
                                            @if ($value->local==$locale)
                                                    <option value="{{$item->id}}" 
                                                        @foreach($array_footer_tags as $key2 => $footerTag)
                                                            @if($array_footer_tags[$key2] == $item->id) 
                                                                selected 
                                                            @endif
                                                        @endforeach>
                                                        {{$value->tag_name}}
                                                    </option> 
                                                    @break
                                            @elseif($value->locale=='en')
                                                <option value="{{$item->id}}" 
                                                    @foreach($array_footer_tags as $key2 => $footerTag)
                                                        @if($array_footer_tags[$key2] == $item->id) 
                                                            selected 
                                                        @endif
                                                    @endforeach>
                                                    {{$value->tag_name}}
                                                </option> 
                                                @break
                                            @endif
                                        @empty
                                        @endforelse
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>


                    <!-- Footer Copyright Text -->
                    <!-- DB_ROW_ID-36:  => setting[35] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('Footer Copyright Text')}}</b></label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input type="text" name="storefront_copyright_text" placeholder="Type Copyright Text" class="form-control" 
                                @forelse ($setting[35]->settingTranslations as $key => $item)
                                    @if ($item->locale==$locale)
                                        value="{{$item->value}}" @break
                                    @elseif($item->locale=='en')
                                        value="{{$item->value}}" @break
                                    @endif
                                @empty
                                @endforelse >
                            </div>
                        </div>
                    </div>
                    <br>



                    <!-- Accepted Payment Methods Image -->
                    <h4 class="text-bold">{{__('Accepted Payment Methods Image')}}</h4><br>
                    @forelse ($storefront_images as $key=> $item)
                        @if ($item->title=='accepted_payment_method_image')
                            <img src="{{asset('public/'.$item->image)}}" id="paymentMethodImage" height="100px" width="100px">
                            @break
                        @elseif ($key == ($total_storefront_images-1))
                            <img src="{{asset('public/images/empty.jpg')}}" id="paymentMethodImage" height="100px" width="100px">
                        @endif
                    @empty
                        <img src="{{asset('public/images/empty.jpg')}}" id="paymentMethodImage" height="100px" width="100px">
                    @endforelse
                    <br><br>
                    <input type="file"   name="storefront_payment_method_image" class="form-control" onchange="showImage(this,'paymentMethodImage')">
                    <br><br>


                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
</div>
