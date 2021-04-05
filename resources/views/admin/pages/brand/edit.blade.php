@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">
    </div>
    <h1>Edit</h1>
    <br>

    <form method="post"  class="form-horizontal" action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data">
        @csrf

            <input type="hidden" name="brand_id" value="{{$brand->id}}">
            <input type="hidden" name="local" value="{{$local}}">


            <div class="col-md-6 form-group">
                <label>{{__('Brand Name')}}</label>
                <input type="text" name="brand_name" id="brand_name" required class="form-control" @if(isset($brandTranslation->brand_name)) value="{{$brandTranslation->brand_name}}" @else value="" @endif>
            </div>

            <div class="mt-3 col-md-6 form-group">
                @if($brand->brand_logo!==null)
                    <img id="item_photo" src="{{asset('public/'.$brand->brand_logo)}}"  height="100px" width="100px">
                @else
                    <img id="item_photo" src="{{asset('public/images/empty.jpg')}}"  height="100px" width="100px">
                @endif
                <input type="file" name="brand_logo" id="brandLogo" class="mt-3 form-control" onchange="showImage(this,'item_photo')">
            </div>

            <div class="col-md-4 form-group">
                <label><b>{{__('Status')}}</b></label>
                <div class="col-md-8 form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" @if($brand->is_active==1) checked value="1" @endif  id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">Active</label>
                </div>
            </div>

            <div class="col form-group" align="center">
                <input type="hidden" name="action" id="action"/>
                <input type="hidden" name="hidden_id" id="hidden_id"/>
                <button type="submit" class="btn btn-success">Update</button>
                {{-- <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value={{trans('file.Add')}}> --}}
            </div>
    </form>

</section>

<script type="text/javascript">
    function showImage(data, imgId){
        if(data.files && data.files[0]){
            var obj = new FileReader();

            obj.onload = function(d){
                var image = document.getElementById(imgId);
                image.src = d.target.result;
            }
            obj.readAsDataURL(data.files[0]);
        }
    }
    //Image Show Before Upload End
</script>

@endsection
