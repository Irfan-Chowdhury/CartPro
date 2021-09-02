<div class="card">
    <h3 class="card-header"><b>{{__('Features')}}</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="featureSubmit">
                    @csrf

                    <!-- DB_ROW_ID-19:  => setting[18] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input type="checkbox" @if($setting[18]->plain_value==1) checked @endif value="1" name="storefront_section_status" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck1">Enable features section</label>
                              </div>
                        </div>
                    </div>
                    <br>

                    <!-- Feature-1 -->

                    <h5 class="text-bold">Feature 1</h5><br>
                    <!-- DB_ROW_ID-20:  => setting[19] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Title</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_1_title"  class="form-control" id="inputEmail3" placeholder="Type Title"
                            @forelse ($setting[19]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-21:  => setting[20] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Subtitle</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_1_subtitle" class="form-control" id="inputEmail3" placeholder="Type Subtitle"
                            @forelse ($setting[20]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-22:  => setting[21] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Icon</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_1_icon" class="form-control" id="inputEmail3" placeholder="Type Icon"
                            value="{{$setting[21]->plain_value}}">
                        </div>
                    </div>


                    <!-- Feature-2 -->
                    <h5 class="text-bold">Feature 2</h5><br>
                    <!-- DB_ROW_ID-23:  => setting[22] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Title</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_2_title"  class="form-control" id="inputEmail3" placeholder="Type Title"
                            @forelse ($setting[22]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-24:  => setting[23] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Subtitle</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_2_subtitle" class="form-control" id="inputEmail3" placeholder="Type Subtitle"
                            @forelse ($setting[23]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-25:  => setting[24] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Icon</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_2_icon" class="form-control" id="inputEmail3" placeholder="Type Icon"
                            value="{{$setting[24]->plain_value}}">
                        </div>
                    </div>



                    <!-- Feature-3 -->

                    <h5 class="text-bold">Feature 3</h5><br>
                    <!-- DB_ROW_ID-26:  => setting[25] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Title</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_3_title"  class="form-control" id="inputEmail3" placeholder="Type Title"
                            @forelse ($setting[25]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-27:  => setting[26] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Subtitle</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_3_subtitle" class="form-control" id="inputEmail3" placeholder="Type Subtitle"
                            @forelse ($setting[26]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-28:  => setting[27] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Icon</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_3_icon" class="form-control" id="inputEmail3" placeholder="Type Icon"
                            value="{{$setting[27]->plain_value}}">
                        </div>
                    </div>



                    <!-- Feature-4 -->

                    <h5 class="text-bold">Feature 4</h5><br>
                    <!-- DB_ROW_ID-29:  => setting[28] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Title</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_4_title"  class="form-control" id="inputEmail3" placeholder="Type Title"
                            @forelse ($setting[28]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-30:  => setting[29] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Subtitle</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_4_subtitle" class="form-control" id="inputEmail3" placeholder="Type Subtitle"
                            @forelse ($setting[29]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-31:  => setting[30] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Icon</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_4_icon" class="form-control" id="inputEmail3" placeholder="Type Icon"
                            value="{{$setting[30]->plain_value}}">
                        </div>
                    </div>



                    <!-- Feature-5 -->

                    <h5 class="text-bold">Feature 5</h5><br>
                    <!-- DB_ROW_ID-32:  => setting[31] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Title</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_5_title"  class="form-control" id="inputEmail3" placeholder="Type Title"
                            @forelse ($setting[31]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-33:  => setting[32] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Subtitle</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_5_subtitle" class="form-control" id="inputEmail3" placeholder="Type Subtitle"
                            @forelse ($setting[32]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>
                    <!-- DB_ROW_ID-34:  => setting[33] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Icon</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_5_icon" class="form-control" id="inputEmail3" placeholder="Type Icon"
                            value="{{$setting[33]->plain_value}}">
                        </div>
                    </div>







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