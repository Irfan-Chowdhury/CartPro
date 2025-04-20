                    <h4 class="mt-3 text-bold">{{ __('file.Tab - 1') }}</h4><br>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>@lang('file.Title')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_product_tabs_1_section_tab_1_title" class="form-control"
                                placeholder="@lang('file.Title')" value="{!! htmlspecialchars_decode($setting->storefront_product_tabs_1_section_tab_1_title->value) !!}">
                        </div>
                    </div>

                    <div class="form-group row d-none">
                        <label class="col-sm-4 col-form-label"><b>@lang('file.Type')</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_product_tabs_1_section_tab_1_product_type"
                                id="storefrontProductTabs_1_SectionTab_1_ProductType" class="form-control"
                                data-live-search="true" data-live-search-style="begins">
                                <option value="">@lang('file.-- Select Type --')</option>
                                <option value="{{ __('category_products') }}" selected>{{ __('Category Products') }}
                                </option>
                            </select>
                        </div>
                    </div>

                    @if ($setting->storefront_product_tabs_1_section_tab_1_product_type->plain_value == 'category_products')
                        <div class="form-group row" id="categoryFeild_1">
                            <label class="col-sm-4 col-form-label"><b>@lang('file.Category')</b></label>
                            <div class="col-sm-8">
                                <select name="storefront_product_tabs_1_section_tab_1_category_id"
                                    id="storefrontProductTabs_1_SectionTab_1_CategoryId"
                                    class="form-control selectpicker" data-live-search="true"
                                    data-live-search-style="begins" title='{{ __('Select Category') }}'>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $setting->storefront_product_tabs_1_section_tab_1_category_id->plain_value == $item->id ? 'selected="selected"' : '' }}>
                                            {{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @else
                        <div class="form-group row" id="categoryFeild_1">
                            <label class="col-sm-4 col-form-label"><b>@lang('file.Category')</b></label>
                            <div class="col-sm-8">
                                <select name="storefront_product_tabs_1_section_tab_1_category_id"
                                    id="storefrontProductTabs_1_SectionTab_1_CategoryId"
                                    class="form-control selectpicker" data-live-search="true"
                                    data-live-search-style="begins" title='{{ __('Select Category') }}'>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $setting->storefront_product_tabs_1_section_tab_1_category_id->plain_value == $item->id ? 'selected="selected"' : '' }}>
                                            {{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row" id="productTabsField1">
                        @if (
                            !isset($setting->storefront_product_tabs_1_section_tab_1_product_type->plain_value) &&
                                $setting->storefront_product_tabs_1_section_tab_1_product_type->plain_value == 'custom_products')
                            <label class="col-sm-4 col-form-label"><b> {{ __('file.Products') }}</b></label>
                            <div class="col-sm-8">
                                <input type="text" name="storefront_product_tabs_1_section_tab_1_products"
                                    value="{{ $setting->storefront_product_tabs_1_section_tab_1_products->plain_value }}"
                                    class="form-control">
                            </div>
                        @elseif(
                            !isset($setting->storefront_product_tabs_1_section_tab_1_product_type->plain_value) &&
                                ($setting->storefront_product_tabs_1_section_tab_1_product_type->plain_value == 'latest_products' ||
                                    $setting->storefront_product_tabs_1_section_tab_1_product_type->plain_value == 'recently_viewed_products'))
                            <label class="col-sm-4 col-form-label"><b> {{ __('file.Products Limit') }}</b></label>
                            <div class="col-sm-8">
                                <input type="text" name="storefront_product_tabs_1_section_tab_1_products_limit"
                                    value="{{ $setting->storefront_product_tabs_1_section_tab_1_products_limit->plain_value }}"
                                    class="form-control">
                            </div>
                        @endif
                    </div>
