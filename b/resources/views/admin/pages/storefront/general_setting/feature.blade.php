<div class="card">
    <h3 class="card-header"><b>{{__('file.Features')}}</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="featureSubmit">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Section Status')</b></label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input type="checkbox" @if($setting->storefront_section_status->plain_value==1) checked @endif value="1" name="storefront_section_status" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck1">@lang('file.Enable features section')</label>
                              </div>
                        </div>
                    </div>
                    <br>

                    <!-- Feature-1 -->

                    <h5 class="text-bold">@lang('file.Feature 1')</h5><br>
                    <!-- DB_ROW_ID-20:  => setting[19] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Title')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_1_title"  class="form-control" id="inputEmail3" placeholder="@lang('file.Title')" value="{{$setting->storefront_feature_1_title->value}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Subtitle')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_1_subtitle" class="form-control" id="inputEmail3" placeholder="@lang('file.Subtitle')" value="{{$setting->storefront_feature_1_subtitle->value}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Icon')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_1_icon" class="form-control" id="inputEmail3" placeholder="@lang('file.Icon')"
                            value="{{$setting->storefront_feature_1_icon->plain_value}}">
                        </div>
                    </div>


                    <!-- Feature-2 -->
                    <h5 class="text-bold">@lang('file.Feature 2')</h5><br>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Title')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_2_title"  class="form-control" id="inputEmail3" placeholder="@lang('file.Title')"
                            value="{{$setting->storefront_feature_2_title->value}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Subtitle')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_2_subtitle" class="form-control" id="inputEmail3" placeholder="@lang('file.Subtitle')"
                            value="{{$setting->storefront_feature_2_subtitle->value}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Icon')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_2_icon" class="form-control" id="inputEmail3" placeholder="@lang('file.Icon')"
                            value="{{$setting->storefront_feature_2_icon->plain_value}}">
                        </div>
                    </div>



                    <!-- Feature-3 -->

                    <h5 class="text-bold">@lang('file.Feature 3')</h5><br>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Title')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_3_title"  class="form-control" id="inputEmail3" placeholder="@lang('file.Title')"
                            value="{{$setting->storefront_feature_3_title->value}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Subtitle')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_3_subtitle" class="form-control" id="inputEmail3" placeholder="@lang('file.Subtitle')"
                            value="{{$setting->storefront_feature_3_subtitle->value}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Icon')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_3_icon" class="form-control" id="inputEmail3" placeholder="@lang('file.Icon')"
                            value="{{$setting->storefront_feature_3_icon->plain_value}}">
                        </div>
                    </div>


                    <!-- Feature-4 -->
                    <h5 class="text-bold">@lang('file.Feature 4')</h5><br>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Title')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_4_title"  class="form-control" id="inputEmail3" placeholder="@lang('file.Title')"
                            value="{{$setting->storefront_feature_4_title->value}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Subtitle')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_4_subtitle" class="form-control" id="inputEmail3" placeholder="@lang('file.Subtitle')"
                              value="{{$setting->storefront_feature_4_subtitle->value}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Icon')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_feature_4_icon" class="form-control" id="inputEmail3" placeholder="@lang('file.Icon')"
                            value="{{$setting->storefront_feature_4_icon->plain_value}}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary save">@lang('file.Save')</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
</div>
