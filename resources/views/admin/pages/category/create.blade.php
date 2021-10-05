   <!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add Category')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">

                <form method="post" id="submitForm" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{__('Category Name')}} *</label>
                            <input type="text" name="category_name" id="category_name" required class="form-control" placeholder="{{__('Category Name')}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>{{__('Description')}} *</label>
                            <input type="text" name="description" id="description" required class="form-control" placeholder="{{__('Description Name')}}">
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>{{__('Parent Category')}} </label>
                            <select class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}' name="parent_id">
                                @foreach($categories as $item)
                                    @if ($item->categoryTranslation->count()>0)
                                        @foreach ($item->categoryTranslation as $key => $value)
                                            @if ($key<1)
                                                @if ($value->local==$currentActiveLocal)
                                                    <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                                                @elseif($value->local=='en')
                                                    <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-6  mb-3">
                            <label>{{__('Position')}} *</label>
                            <select class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Position')}}' name="description_position" required>
                                <option value="1">{{__('Top')}}</option>
                                <option value="0">{{__('Bottom')}}</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mt-5">
                            <label for="exampleFormControlFile1">{{__('Insert Image')}}</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>

                        <div class="col-md-6 form-group mt-5">
                            <label for="">{{__('Icon')}}</label>
                            <input type="text" name="category_icon" id="cateogry_icon" class="form-control" placeholder="las la-table">
                        </div>

                        <div>
                            <div class="col-md-3 form-group">
                                    <div class="form-check mt-5">
                                        <input type="checkbox" class="form-check-input " value='1' name="featured">
                                        <label class="form-check-label"  for="exampleCheck1">{{__('Featured')}}</label>
                                    </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" id="default" value="1" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">{{__('Active')}}</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="action_button" id="submitButton" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
      </div>
    </div>
  </div>



