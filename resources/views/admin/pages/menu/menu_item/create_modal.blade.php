<!--Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel"><b>Add New Menu Item</b></h5> &nbsp;&nbsp;&nbsp;&nbsp; <span id="error_message"></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="submitForm" action="{{route('admin.menu.menu_item.store')}}">
                @csrf
                <input type="hidden" name="menu_id" id="menu_id" value="{{$menuId}}">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Name &nbsp;<span class="text-danger">*</span></b></label>
                            <input type="text" class="col-md-8 form-control" name="menu_item_name" id="menu_item_name" placeholder="Type Name">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Type &nbsp;<span class="text-danger">*</span></b></label>
                            <select name="type" id="type" class="col-md-8 form-control selectpicker">
                                <option value="">{{__('-- Select Type --')}}</option>
                                <option value="category">Category</option>
                                <option value="page">Page</option>
                                <option value="url">URL</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b><span id="changeLabelTextByType">{{__('Category')}}</span> &nbsp;<span class="text-danger">*</span> </b></label>
                            <div id="dependancyType" class="col-md-8">
                                <select name="category_id" id="category_id" class="form-control col-md-12 selectpicker" title='{{__('-- Select Category --')}}'>
                                    @foreach ($categories as $item)
                                        @forelse ($item->categoryTranslation as $key => $value)
                                            @if ($value->local==$locale)
                                                <option value="{{$item->id}}">{{$value->category_name}}</option> @break
                                            @elseif($value->local=='en')
                                                <option value="{{$item->id}}">{{$value->category_name}}</option> @break
                                            @endif
                                        @empty
                                            <option value="">{{__('NULL')}}</option>
                                        @endforelse
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Icon</b></label>
                            <input type="text" class="col-md-8 form-control" name="icon" id="icon" placeholder="Type Name">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Fluid Menu</b></label>
                            <div class="col-md-8 form-check">
                                <input class="form-check-input" type="checkbox" name="is_fluid" id="is_fluid" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">This is a full width menu</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Target</b></label>
                            <select name="target" id="target" class="col-md-8 form-control selectpicker" title='{{__('Select Target')}}'>
                                <option value="same_tab">Same Tab</option>
                                <option value="new_tab">New Tab</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Parent</b></label>
                            <select name="parent_id" id="parent_id" class="col-md-8 form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Parent')}}'>
                                <option value="">{{__('-- Select Parent --')}}</option>
                                @foreach ($menu_items as $item)
                                    @forelse ($item->menuItemTranslations as $key => $value)
                                        @if ($value->locale==$locale)
                                            <option value="{{$item->id}}">{{$value->menu_item_name}}</option> @break
                                        @elseif($value->locale=='en')
                                            <option value="{{$item->id}}">{{$value->menu_item_name}}</option> @break
                                        @endif
                                    @empty
                                        <option value="">{{__('NULL')}}</option>
                                    @endforelse
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Status</b></label>
                            <div class="col-md-8 form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Enable the menu item</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" name="action_button" id="submitButton" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
