<div class="card">
    <h4 class="card-header"><b>General</b></h4>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="generalSubmit" action="{{route('admin.storefront.general.store')}}" method="POST">

                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Welcome Text')</b></label>
                        <div class="col-sm-8">
                            <!-- setting[0] => DB_ROW_ID-1: storefront_welcome_text -->
                            <input type="text" name="storefront_welcome_text" id="storefront_welcome_text" class="form-control" id="inputEmail3" placeholder="Type Text"
                            @forelse ($setting[0]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
                        </div>
                    </div>

                    <!-- setting[1] => DB_ROW_ID-2: storefront_theme_color -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Theme Color')</b></label>
                        <div class="col-sm-2">
                            <input type="color" name="storefront_theme_color" class="form-control" value="{{$setting[1]->plain_value != NULL ? $setting[1]->plain_value : '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Slider Format')</b> <span class="text-danger"></span></label>
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="radio" name="store_front_slider_format" @if($setting[148]->plain_value=='full_width') checked @endif id="slider_format" value="full_width">
                            <label class="form-check-label">{{__('file.Full Width')}}</label>
                        </div>
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="radio" name="store_front_slider_format" @if($setting[148]->plain_value=='half_width') checked @endif id="slider_format" value="half_width">
                            <label class="form-check-label">{{__('file.Half Width')}}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Terms & Condition')</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_terms_and_condition_page" id="storefront_terms_and_condition_page" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Terms & Condition')}}'>
                                <option value="{{NULL}}">NONE</option>
                                @foreach ($pages as $item)
                                    @forelse ($item->pageTranslations as $key => $value)
                                        @if ($value->locale==$locale)
                                            <option value="{{$item->id}}" {{ $item->id == $setting[4]->plain_value ? 'selected="selected"' : '' }}>{{$value->page_name}}</option> @break
                                        @elseif($value->locale=='en')
                                            <option value="{{$item->id}}" {{ $item->id == $setting[4]->plain_value ? 'selected="selected"' : '' }}>{{$value->page_name}}</option> @break
                                        @endif
                                    @empty
                                    @endforelse
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- setting[5] => DB_ROW_ID-6: storefront_privacy_policy_page -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Privacy Policy Page')</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_privacy_policy_page" id="storefront_privacy_policy_page" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Footer Menu')}}'>
                                <option value="{{NULL}}">NONE</option>
                                @foreach ($pages as $item)
                                    @forelse ($item->pageTranslations as $key => $value)
                                        @if ($value->locale==$locale)
                                            <option value="{{$item->id}}" {{ $item->id == $setting[5]->plain_value ? 'selected="selected"' : '' }}>{{$value->page_name}}</option> @break
                                        @elseif($value->locale=='en')
                                            <option value="{{$item->id}}" {{ $item->id == $setting[5]->plain_value ? 'selected="selected"' : '' }}>{{$value->page_name}}</option> @break
                                        @endif
                                    @empty
                                    @endforelse
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- setting[6] => DB_ROW_ID-7: storefront_address -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Address')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_address" id="storefront_address" class="form-control" placeholder="Type Address"
                            @forelse ($setting[6]->settingTranslations as $key => $item)
                                @if ($item->locale==$locale)
                                    value="{{$item->value}}" @break
                                @elseif($item->locale=='en')
                                    value="{{$item->value}}" @break
                                @endif
                            @empty
                            @endforelse >
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
