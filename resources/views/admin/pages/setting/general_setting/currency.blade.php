<div class="card">
    <h3 class="card-header p-3"><b>Currency</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="currencySubmit">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Supported Currencies <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <select name="supported_currencies[]" id="supportedCurrencies" class="form-control selectpicker" multiple="multiple" data-live-search="true" title='{{__('Select Currency')}}'>
                                @foreach ($currencies as $currency)
                                       <option value="{{$currency->currency_name}}"
                                            @empty(!$selected_currencies)
                                                @forelse ($selected_currencies as $value)
                                                    @if($currency->currency_name == $value)
                                                        selected
                                                    @endif
                                                @empty
                                                @endforelse
                                            @endempty> {{$currency->currency_name}}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>{{__('file.Default Currency Code')}}<span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <select name="default_currency_code" id="defaultCurrencyCode" class="form-control selectpicker" data-live-search="true" title='{{__('Select Currency')}}'>
                                @foreach ($currencies as $currency)
                                    <option value="{{$currency->currency_code}}" {{$currency->currency_code==$setting_currency->default_currency_code ? 'selected' : ''}}>{{$currency->currency_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Default Currency Symbol <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="default_currency" @isset($setting_currency->default_currency) value="{{$setting_currency->default_currency}}" @endisset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Currency Format <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="prefix" name="currency_format" {{$setting_currency->currency_format=="prefix" ? 'checked':''}}>
                                <label class="form-check-label">Prefix</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="suffix" name="currency_format" {{$setting_currency->currency_format=="suffix" ? 'checked':''}}>
                                <label class="form-check-label">Suffix</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Exchange Rate Service</b></label>
                        <div class="col-sm-8">
                            <select name="exchange_rate_service" id="exchangeRateService" class="form-control">
                                <option value="">Select Service</option>
                                <option value="fixer" {{$setting_currency->exchange_rate_service=="fixer" ? 'selected':''}}>Fixer</option>
                                <option value="forge" {{$setting_currency->exchange_rate_service=="forge" ? 'selected':''}}>Forge</option>
                                <option value="currency_data_feed" {{$setting_currency->exchange_rate_service=="currency_data_feed" ? 'selected':''}}>Currency Data Feed</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="exchangeRateServiceField">
                        @if (isset($setting_currency->fixer_access_key))
                            <label class="col-sm-4 col-form-label"><b>Fixer Access Key <span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="fixer_access_key" value="{{$setting_currency->fixer_access_key}}">
                            </div>
                        @elseif (isset($setting_currency->forge_api_key))
                            <label class="col-sm-4 col-form-label"><b>Forge API Key<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="forge_api_key" value="{{$setting_currency->forge_api_key}}">
                            </div>
                        @elseif (isset($setting_currency->currency_data_feed_key))
                            <label class="col-sm-4 col-form-label"><b>Currency Data Feed API Key<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="currency_data_feed_key" value="{{$setting_currency->currency_data_feed_key}}">
                            </div>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Auto Refresh</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="auto_refresh" {{$setting_currency->auto_refresh=="1" ? 'checked':''}} class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable auto-refreshing currency rates</label>
                            </div>
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



{{-- https://github.com/antonioribeiro/countries --}}
{{-- https://dev.to/kingsconsult/how-to-get-the-entire-country-list-in-laravel-8-downwards-ahb --}}
{{-- https://github.com/DougSisk/laravel-country-state --}}
