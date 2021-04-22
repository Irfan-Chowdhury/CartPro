<div class="card">
    <h4 class="card-header"><b>General</b></h4>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="generalSubmit" action="{{route('admin.storefront.general.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Welcome Text</b></label>
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
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Theme Color</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_theme_color" id="storefront_theme_color" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Color')}}'>
                                @foreach ($colors as $key => $item)
                                    <option value="{{$colors[$key]['color_name']}}" {{ $colors[$key]['color_name'] == $setting[1]->plain_value ? 'selected="selected"' : '' }}>{{$colors[$key]['color_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- setting[2] => DB_ROW_ID-3: storefront_mail_theme_color -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Mail Theme Color</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_mail_theme_color" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Color')}}'>
                                @foreach ($colors as $key => $item)
                                    <option value="{{$colors[$key]['color_name']}}" {{ $colors[$key]['color_name'] == $setting[2]->plain_value ? 'selected="selected"' : '' }}>{{$colors[$key]['color_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Slider</b> <span class="text-danger"><i>(Incomplete)</i></span></label>
                        <div class="col-sm-8">
                            <select name="slider_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Slider')}}'>
                                {{-- @foreach ($slider as $item)
                                    <option value="{{$item->id}}" {{ $item->id == $general_slider->slider_id ? 'selected="selected"' : '' }}>{{$item->slider_title}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>

                    <!-- setting[4] => DB_ROW_ID-5: storefront_terms_and_condition_page -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Terms & Condition</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_terms_and_condition_page" id="storefront_terms_and_condition_page" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Terms & Condition')}}'>
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
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Privacy Policy Page</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_privacy_policy_page" id="storefront_privacy_policy_page" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Footer Menu')}}'>
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
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Address</b></label>
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
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
</div>
