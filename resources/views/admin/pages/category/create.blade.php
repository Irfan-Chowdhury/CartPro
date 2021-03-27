   <!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$tr->translate('Add Category')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <form method="post" id="submitForm" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{$tr->translate('Category Name')}} *</label>
                            <input type="text" name="category_name" id="category_name" required class="form-control" placeholder="{{$tr->translate('Category Name')}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>{{$tr->translate('Description')}} *</label>
                            <input type="text" name="description" id="description" required class="form-control" placeholder="{{$tr->translate('Description Name')}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>{{$tr->translate('Parent Category')}} </label>
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


                        <div class="col-md-6 form-group mb-3">
                            <label>{{$tr->translate('Position')}} *</label>
                            <select class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Position')}}' name="description_position" required="">
                                <option value="1">{{$tr->translate('Top')}}</option>
                                <option value="0">{{$tr->translate('Bottom')}}</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mt-5">
                            <label for="exampleFormControlFile1">{{$tr->translate('Insert Image')}}</label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>


                        <div class="col-md-6">
                                <div class="form-check mt-5">
                                    <input type="checkbox" class="form-check-input " value='1' name="featured">
                                    <label class="form-check-label"  for="exampleCheck1">{{$tr->translate('Featured')}}</label>
                                </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="isActive" id="default" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">{{$tr->translate('Active')}}</label>
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

















{{--
   <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{$tr->translate('Add Category')}}</h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    <form class="form-horizontal" action="{{route('category_list.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>{{$tr->translate('Category Name')}} *</label>
                                <input type="text" name="category_name" id="category_name" required class="form-control"
                                       placeholder="{{$tr->translate('Category Name')}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{$tr->translate('Parent Category')}} </label>
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

                            <div class="col-md-6 form-group">
                                <label>{{$tr->translate('Description')}} *</label>
                                <input type="text" name="description" id="description" required class="form-control" placeholder="{{$tr->translate('Description Name')}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{$tr->translate('Position')}} *</label>
                                <select class=" selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Position')}}' name="description_position" required="">
                                    <option value="1">{{$tr->translate('Top')}}</option>
                                    <option value="0">{{$tr->translate('Bottom')}}</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Stock Availibility')}}</b></label>
                                <div class="col-sm-8">
                                    <select name="in_stock" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Stock')}}'>
                                        <option value="1">{{__("In Stock")}}</option>
                                        <option value="0">{{__('Out Stock')}}</option>
                                    </select>
                                </div>
                            </div>

                              <div class="col-md-6 form-group">
                                <label for="exampleFormControlFile1">{{$tr->translate('Insert Image')}}</label>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                              </div>


                            <div class="col-md-6 form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input " value='1' name="featured">
                                    <label class="form-check-label"  for="exampleCheck1">{{$tr->translate('Featured')}}</label>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" id="default" value="1" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">{{$tr->translate('Active')}}</label>
                                </div>
                            </div>

                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action"/>
                                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                                    <button type="submit" name="action_button" class="btn btn-warning">{{$tr->translate('Submit')}}</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div> --}}
