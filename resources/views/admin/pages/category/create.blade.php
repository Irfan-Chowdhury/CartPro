    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{__('Add Category')}}</h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    {{-- <form method="post" id="sample_form" class="form-horizontal" action="{{route('category_list.store')}}" method="POST" enctype="multipart/form-data"> --}}
                    <form class="form-horizontal" action="{{route('category_list.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>{{__('Category Name')}} *</label>
                                <input type="text" name="category_name" id="category_name" required class="form-control"
                                       placeholder="{{__('Category Name')}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{__('Parent Category')}} </label>
                                <select class="form-control" name="parent_id">
                                    <option value="">Choose Category</option>
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
                                <label>{{__('Description')}} *</label>
                                <input type="text" name="description" id="description" required class="form-control"
                                       placeholder="{{__('Description Name')}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{__('Description position')}} *</label>
                                <select class="form-control" name="description_position" required="">
                                    <option value="1">{{__('Top')}}</option>
                                    <option value="0">{{__('Bottom')}}</option>
                                </select>
                            </div>

                              <div class="col-md-6 form-group">
                                <label for="exampleFormControlFile1">{{__('Insert Image')}}</label>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                              </div>

                              
                            <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input " value='1' name="featured">
                              <label class="form-check-label"  for="exampleCheck1">{{__('Featured')}}</label>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" id="default" value="1" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Active</label>
                                </div>
                            </div>
                            
                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action"/>
                                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                                    {{-- <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value={{trans('file.Add')}}> --}}
                                    <button type="submit" name="action_button" class="btn btn-warning">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>