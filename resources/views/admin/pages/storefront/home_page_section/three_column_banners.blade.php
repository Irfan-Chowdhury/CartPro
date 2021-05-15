<div class="card">
    <h3 class="card-header"><b>{{__('Three Column Banners')}}</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="threeColumnBannersSubmit">
                    @csrf

                    <!-- DB_ROW_ID-59:  => setting[58] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" @if($setting[58]->plain_value==1) checked @endif value="1" name="storefront_three_column_banners_enabled" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable three column banners section</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Banners - 1 -->
                    <!-- DB_ROW_ID-60-62:  => setting[59-61] -->
                    <h5 class="text-bold">{{__('Banners - 1')}}</h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            @forelse ($storefront_images as $key=> $item)
                                @if ($item->title=='three_column_banners_image_1')
                                    <img src="{{asset('public/'.$item->image)}}" id="storefrontThreeColumnBannersImage1" height="100px" width="100px">
                                    @break
                                @elseif ($key == ($total_storefront_images-1))
                                    <img src="{{asset('public/images/empty.jpg')}}" id="storefrontThreeColumnBannersImage1" height="100px" width="100px">
                                @endif
                            @empty
                                <img src="{{asset('public/images/empty.jpg')}}" id="storefrontThreeColumnBannersImage1" height="100px" width="100px">
                            @endforelse
                            <br><br>
                            <input type="file" name="storefront_three_column_banners_image_1" class="form-control" onchange="showImage(this,'storefrontThreeColumnBannersImage1')">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label"><b>{{__('Call to Action URL')}}</b></label>
                            <input type="text" name="storefront_three_column_banners_1_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="{{$setting[60]->plain_value}}">
                            <br><br>
                            <input type="checkbox" class="m-1" @if($setting[61]->plain_value==1) checked @endif value="1" name="storefront_three_column_banners_1_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b>{{__('Open in new window')}}</b></label>
                        </div>
                    </div>



                    <!-- Banners - 2 -->
                    <!-- DB_ROW_ID-63-65:  => setting[62-64] -->
                    <h5 class="mt-5 text-bold">{{__('Banners - 2')}}</h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            @forelse ($storefront_images as $key=> $item)
                                @if ($item->title=='three_column_banners_image_2')
                                    <img src="{{asset('public/'.$item->image)}}" id="storefrontThreeColumnBannersImage2" height="100px" width="100px">
                                    @break
                                @elseif ($key == ($total_storefront_images-1))
                                    <img src="{{asset('public/images/empty.jpg')}}" id="storefrontThreeColumnBannersImage2" height="100px" width="100px">
                                @endif
                            @empty
                                <img src="{{asset('public/images/empty.jpg')}}" id="storefrontThreeColumnBannersImage2" height="100px" width="100px">
                            @endforelse
                            <br><br>
                            <input type="file" name="storefront_three_column_banners_image_2" class="form-control" onchange="showImage(this,'storefrontThreeColumnBannersImage2')">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label"><b>{{__('Call to Action URL')}}</b></label>
                            <input type="text" name="storefront_three_column_banners_2_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="{{$setting[63]->plain_value}}">
                            <br><br>
                            <input type="checkbox" class="m-1" @if($setting[64]->plain_value==1) checked @endif value="1" name="storefront_three_column_banners_2_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b>{{__('Open in new window')}}</b></label>
                        </div>
                    </div>



                    <!-- Banners - 3 -->
                    <!-- DB_ROW_ID-66-68:  => setting[65-67] -->
                    <h5 class="mt-5 text-bold">{{__('Banners - 3')}}</h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            @forelse ($storefront_images as $key=> $item)
                                @if ($item->title=='three_column_banners_image_3')
                                    <img src="{{asset('public/'.$item->image)}}" id="storefrontThreeColumnBannersImage3" height="100px" width="100px">
                                    @break
                                @elseif ($key == ($total_storefront_images-1))
                                    <img src="{{asset('public/images/empty.jpg')}}" id="storefrontThreeColumnBannersImage3" height="100px" width="100px">
                                @endif
                            @empty
                                <img src="{{asset('public/images/empty.jpg')}}" id="storefrontThreeColumnBannersImage3" height="100px" width="100px">
                            @endforelse
                            <br><br>
                            <input type="file" name="storefront_three_column_banners_image_3" class="form-control" onchange="showImage(this,'storefrontThreeColumnBannersImage3')">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label"><b>{{__('Call to Action URL')}}</b></label>
                            <input type="text" name="storefront_three_column_banners_3_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="{{$setting[66]->plain_value}}">
                            <br><br>
                            <input type="checkbox" class="m-1" @if($setting[67]->plain_value==1) checked @endif value="1" name="storefront_three_column_banners_3_open_in_new_window">
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