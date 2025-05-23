<div class="card">
    <h4 class="card-header"><b>@lang('file.Social Links')</b></h4>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="socialLinkSubmit">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Facebook')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_facebook_link" id="storefront_facebook_link" class="form-control" id="inputEmail3" placeholder="Type Facebook Link"
                            value="{{$setting->storefront_facebook_link->plain_value}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Twitter')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_twitter_link" id="storefront_twitter_link" class="form-control" id="inputEmail3" placeholder="Type Twitter Link"
                            value="{{$setting->storefront_twitter_link->plain_value}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Instagram')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_instagram_link" id="storefront_instagram_link" class="form-control" id="inputEmail3" placeholder="Type Instagram Link"
                            value="{{$setting->storefront_instagram_link->plain_value}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>@lang('file.Youtube')</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_youtube_link" id="storefront_youtube_link" class="form-control" id="inputEmail3" placeholder="Type Youtube Link"
                            value="{{$setting->storefront_youtube_link->plain_value}}">
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
