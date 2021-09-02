<div class="card">
    <h3 class="card-header p-3"><b>Newsletter</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="newletterSubmit">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Newsletter</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="newsletter" class="form-check-input" @isset($setting_newsletter->newsletter) {{$setting_newsletter->newsletter=="1" ? 'checked':''}} @endisset>
                                <label class="p-0 form-check-label" for="exampleCheck1">Allow customers to subscribe to your newsletter</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mailchimp API Key</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="mailchimp_api_key" class="form-control" @isset($setting_newsletter->mailchimp_api_key) value="{{$setting_newsletter->mailchimp_api_key}}" @endisset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mailchimp List ID</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="mailchimp_list_id" class="form-control" @isset($setting_newsletter->mailchimp_list_id) value="{{$setting_newsletter->mailchimp_list_id}}" @endisset>
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
