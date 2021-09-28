<div class="card">
    <h3 class="card-header p-2"><b>{{__('Top Brands')}}</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="topBrandsSubmit">
                    @csrf

                    <!-- DB_ROW_ID-80:  => setting[79] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" @if($setting[79]->plain_value==1) checked @endif value="1" name="storefront_top_brands_section_enabled" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck1">Enable brands section</label>
                            </div>
                        </div>
                    </div>


                    <!-- Top Brands -->
                    <!-- DB_ROW_ID-81:  => setting[80] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>{{__('Top Brands')}}</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_top_brands[]" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='{{__('Select Tag')}}'>
                               @forelse ($brands as $item)
                                    <option value="{{$item->id}}"
                                        @foreach($array_brands as $key2 => $value)
                                        @if($array_brands[$key2] == $item->id)
                                                selected
                                            @endif
                                        @endforeach > {{$item->brandTranslation->brand_name ?? $item->brandTranslationEnglish->brand_name ?? null}}
                                    </option>
                               @empty
                               @endforelse

                                {{-- @foreach ($brands as $item)
                                    @forelse ($item->brandTranslation as $key => $value)
                                        @if ($value->local==$locale)
                                                <option value="{{$item->id}}"
                                                    @foreach($array_brands as $key2 => $brand)
                                                         @if($array_brands[$key2] == $item->id)
                                                            selected
                                                        @endif
                                                    @endforeach>
                                                    {{$value->brand_name}}
                                                </option>
                                                @break
                                        @elseif($value->locale=='en')
                                            <option value="{{$item->id}}"
                                                @foreach($array_brands as $key2 => $brand)
                                                    @if($array_brands[$key2] == $item->id)
                                                        selected
                                                    @endif
                                                @endforeach>
                                                {{$value->brand_name}}
                                            </option>
                                            @break
                                        @endif
                                    @empty
                                    @endforelse
                                @endforeach --}}
                            </select>
                        </div>
                    </div>



                    <div class="form-group row mt-5">
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

<script>

</script>
