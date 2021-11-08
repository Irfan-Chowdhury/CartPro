<div class="card">
    <h3 class="card-header"><b>{{__('Logo')}}</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="logoSubmit" action="{{route('admin.storefront.logo.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Favicon Logo -->
                    <h5 class="text-bold">{{__('Favicon')}}</h5><br>
                    @forelse ($storefront_images as $key => $item)
                        @if ($item->title=='favicon_logo')
                            <img src="{{asset('public/'.$item->image)}}" id="fevicon" height="100px" width="100px">
                            @break
                        @elseif ($key == ($total_storefront_images-1))
                            <img src="{{asset('public/images/empty.jpg')}}" id="fevicon" height="100px" width="100px">
                        @endif
                    @empty
                        <img src="{{asset('public/images/empty.jpg')}}" id="fevicon" height="100px" width="100px">
                    @endforelse
                    <br><br>
                    <input type="file"   name="image_favicon_logo" id="faviconLogo" class="form-control" onchange="showImage(this,'fevicon')">
                    <input type="hidden" name="title_favicon_logo" value="favicon_logo">
                    <br><br>



                    <!-- Header Logo -->
                    <h5 class="text-bold">{{__('Header Logo')}}</h5><br>
                    @forelse ($storefront_images as $key=> $item)
                        @if ($item->title=='header_logo')
                            <img src="{{asset('public/'.$item->image)}}" id="header_logo" height="50px" width="100px">
                            @break
                        @elseif ($key == ($total_storefront_images-1))
                            <img src="{{asset('public/images/empty.jpg')}}" id="header_logo" height="50px" width="100px">
                        @endif
                    @empty
                        <img src="{{asset('public/images/empty.jpg')}}" id="header_logo" height="50px" width="100px">
                    @endforelse
                    <br><br>
                    <input type="file"   name="image_header_logo" id="headerLogo" class="form-control" onchange="showImage(this,'header_logo')">
                    <input type="hidden" name="title_header_logo" value="header_logo">
                    <br><br>


                    <!-- Mail Logo -->
                    <h5 class="text-bold">{{__('Mail Logo')}}</h5><br>
                    @forelse ($storefront_images as $key=> $item)
                        @if ($item->title=='mail_logo')
                            <img src="{{asset('public/'.$item->image)}}" id="mail_logo" height="100px" width="100px">
                            @break
                        @elseif ($key == ($total_storefront_images-1))
                            <img src="{{asset('public/images/empty.jpg')}}" id="mail_logo" height="100px" width="100px">
                        @endif
                    @empty
                        <img src="{{asset('public/images/empty.jpg')}}" id="mail_logo" height="100px" width="100px">
                    @endforelse
                    <br><br>
                    <input type="file"   name="image_mail_logo" id="mail_logo" class="form-control" onchange="showImage(this,'mail_logo')">
                    <input type="hidden" name="title_mail_logo" value="mail_logo">
                    <br><br>



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
