@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">   
    </div>

    <h1>Edit Attribute Set</h1>
    <br>
    
    <form method="post"  class="form-horizontal" action="{{route('admin.attribute_set.update',$attributeSet->id)}}">
        @csrf

            <input type="hidden" name="attribute_set_id" value="{{$attributeSet->id}}">       
            
            <div class="modal-body">

                <div class="form-group">
                    <label>{{__('Attribute Set Name')}}</label>
                    <input type="text" name="attribute_set_name" id="attributeSetName" required class="form-control" @if(isset($attributeSetTranslation->attribute_set_name)) value="{{$attributeSetTranslation->attribute_set_name}}" @else placeholder="Attribute Set Name" @endif>
                    <small class="form-text text-muted"> <span id="errorMessge"></span></small>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="is_active" value="1" @if($attributeSet->is_active==1) checked @endif id="isActive">
                    <label class="form-check-label" for="exampleCheck1">{{__('Active')}}</label>
                  </div>

                <div class="row p-2">
                    <button type="submit" name="action_button" id="submitButton" class="btn btn-primary">Update</button>
                </div>
            </div>
    </form>
  
</section>

@endsection	