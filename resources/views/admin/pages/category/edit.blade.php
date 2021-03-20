@extends('admin.main')
@section('admin_content')
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">   
    </div>

    <h1>Edit</h1>
    <br>
    
    <form method="post"  class="form-horizontal" action="{{route('admin.category.update',$category->id)}}" enctype="multipart/form-data">
        @csrf

            <input type="hidden" name="category_id" value="{{$category->id}}">
            <input type="hidden" name="local" value="{{$local}}">
            

            <div class="col-md-6 form-group">
                <label>{{__('Category Name')}}</label>
                <input type="text" name="category_name" id="category_name" required class="form-control" @if(isset($categoryTranslation->category_name)) value="{{$categoryTranslation->category_name}}" @else placeholder="Type Category Name" @endif>
            </div>
            <div class="col-md-4 form-group">
                <label><b>{{__('Status')}}</b></label>
                <div class="col-md-8 form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" @if($category->is_active==1) checked value="1" @else value="0"  @endif  id="defaultCheck1">
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

@endsection	