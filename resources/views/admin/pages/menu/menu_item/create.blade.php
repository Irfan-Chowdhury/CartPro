<!--Create Modal -->
<div class="modal fade" id="createModalForm" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel"><b>Add New Menu Item</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="submitForm" action="{{route('admin.menu.menu_item.store')}}">
                @csrf
                <input type="hidden" name="menu_id" id="menuId" value="{{$menu->id}}">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Name &nbsp;<span class="text-danger">*</span></b></label>
                            <input type="text" class="col-md-8 form-control" name="item_name" id="itemName" placeholder="Type Name">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Type &nbsp;<span class="text-danger">*</span></b></label>
                            <select name="type" id="type" class="col-md-8 form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Type')}}'>
                                <option value="category">Category</option>
                                <option value="page">Page</option>
                                <option value="url">URL</option>
                            </select>
                        </div>

                        <div class="form-group row" id="dependancyType">
                            <label class="col-md-4 col-form-label"><b>Category &nbsp;<span class="text-danger">*</span> </b></label>
                            <select name="category_id" id="categoryId" class="col-md-8 form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Category')}}'>
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Icon</b></label>
                            <input type="text" class="col-md-8 form-control" name="icon" id="icon" placeholder="Type Name">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Fluid Menu</b></label>
                            <div class="col-md-8 form-check">
                                <input class="form-check-input" type="checkbox" name="fluid_menu" id="fluidMenu" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">This is a full width menu</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Target</b></label>
                            <select name="target" id="target" class="col-md-8 form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Target')}}'>
                                <option value="same_tab">Same Tab</option>
                                <option value="new_tab">New Tab</option>
                            </select>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Parent</b></label>
                            <select name="parent_id" id="parentId" class="col-md-8 form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Parent')}}'>
                                <option value="">--Select Parent--</option>
                                @foreach ($menu_items as $item)
                                    <option value="{{$item->id}}">{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Status</b></label>
                            <div class="col-md-8 form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Enable the menu item</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        <div class="row mb-5">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <div id="alertMessageBox">
                    <div id="alertMessage" class="text-light"></div>
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                {{-- <button type="button" class="btn btn-primary" id="save-button">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>    --}}
            </div>
        </div>

      </div>
    </div>
  </div>