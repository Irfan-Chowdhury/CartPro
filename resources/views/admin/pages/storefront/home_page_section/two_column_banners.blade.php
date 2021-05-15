<div class="card">
    <h3 class="card-header"><b>{{__('Two Column Banners')}}</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="twoColumnBannersSubmit">
                    @csrf

                    <!-- DB_ROW_ID-52:  => setting[51] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" @if($setting[51]->plain_value==1) checked @endif value="1" name="storefront_two_column_banner_enabled" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable two column banner section</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Banner - 1 -->
                    <!-- DB_ROW_ID-53-55:  => setting[52-54] -->
                    <h5 class="text-bold">{{__('Banner - 1')}}</h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            @forelse ($storefront_images as $key=> $item)
                                @if ($item->title=='two_column_banner_image_1')
                                    <img src="{{asset('public/'.$item->image)}}" id="storefrontTwoColumnBannerImage1" height="100px" width="100px">
                                    @break
                                @elseif ($key == ($total_storefront_images-1))
                                    <img src="{{asset('public/images/empty.jpg')}}" id="storefrontTwoColumnBannerImage1" height="100px" width="100px">
                                @endif
                            @empty
                                <img src="{{asset('public/images/empty.jpg')}}" id="storefrontTwoColumnBannerImage1" height="100px" width="100px">
                            @endforelse
                            <br><br>
                            <input type="file" name="storefront_two_column_banner_image_1" class="form-control" onchange="showImage(this,'storefrontTwoColumnBannerImage1')">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label"><b>{{__('Call to Action URL')}}</b></label>
                            <input type="text" name="storefront_two_column_banners_1_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="{{$setting[53]->plain_value}}">
                            <br><br>
                            <input type="checkbox" class="m-1" @if($setting[54]->plain_value==1) checked @endif value="1" name="storefront_two_column_banners_1_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b>{{__('Open in new window')}}</b></label>
                        </div>
                    </div>



                    <!-- Banner - 2 -->
                    <!-- DB_ROW_ID-56-58:  => setting[55-57] -->
                    <h5 class="mt-5 text-bold">{{__('Banner - 2')}}</h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            @forelse ($storefront_images as $key=> $item)
                                @if ($item->title=='two_column_banner_image_2')
                                    <img src="{{asset('public/'.$item->image)}}" id="storefrontTwoColumnBannerImage2" height="100px" width="100px">
                                    @break
                                @elseif ($key == ($total_storefront_images-1))
                                    <img src="{{asset('public/images/empty.jpg')}}" id="storefrontTwoColumnBannerImage2" height="100px" width="100px">
                                @endif
                            @empty
                                <img src="{{asset('public/images/empty.jpg')}}" id="storefrontTwoColumnBannerImage2" height="100px" width="100px">
                            @endforelse
                            <br><br>
                            <input type="file" name="storefront_two_column_banner_image_2" class="form-control" onchange="showImage(this,'storefrontTwoColumnBannerImage2')">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label"><b>{{__('Call to Action URL')}}</b></label>
                            <input type="text" name="storefront_two_column_banners_2_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="{{$setting[56]->plain_value}}">
                            <br><br>
                            <input type="checkbox" class="m-1" @if($setting[57]->plain_value==1) checked @endif value="1" name="storefront_two_column_banners_2_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b>{{__('Open in new window')}}</b></label>
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