<div class="card">
    <h3 class="card-header p-3"><b>Store</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="storeSubmit" method="POST" action="{{route('admin.setting.store.store_or_update')}}">

                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Store Name <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_name" @empty(!$setting_store) value="{{$setting_store->store_name}}" @endempty class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Store Tagline</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_tagline" @empty(!$setting_store) value="{{$setting_store->store_tagline}}" @endempty class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Email <span class="text-danger">*</span> </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_email" @empty(!$setting_store) value="{{$setting_store->store_email}}" @endempty class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Phone <span class="text-danger">*</span> </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_phone" @empty(!$setting_store) value="{{$setting_store->store_phone}}" @endempty class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Address 1 </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_address_1" @empty(!$setting_store) value="{{$setting_store->store_address_1}}" @endempty class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Address 2 </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_address_2" @empty(!$setting_store) value="{{$setting_store->store_address_2}}" @endempty class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store City</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_city" @empty(!$setting_store) value="{{$setting_store->store_city}}" @endempty class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Country</b></label>
                        <div class="col-sm-8">
                            <select name="store_country" class="form-control selectpicker" data-live-search="true" title='{{__('Select Conutry')}}'>
                                @foreach ($countries as $country)
                                    <option value="{{$country->country_name}}" @empty(!$setting_store)  {{($country->country_name == $setting_store->store_country) ? "selected" : ''}} @endempty>{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store State</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="" class="form-control">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Zip</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_zip" @empty(!$setting_store) value="{{$setting_store->store_zip}}" @endempty class="form-control">
                        </div>
                    </div>
                    <br>

                    <h3 class="text-bold">Privacy Settings</h3><br>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Hide Store Phone</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="hide_store_phone" @empty(!$setting_store) {{$setting_store->hide_store_phone =="1" ? "checked" : ''}} @endempty class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Hide store phone from the storefront</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Hide Store Email</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="hide_store_email" @empty(!$setting_store) {{$setting_store->hide_store_email =="1" ? "checked" : ''}} @endempty class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Hide store email from the storefront</label>
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
