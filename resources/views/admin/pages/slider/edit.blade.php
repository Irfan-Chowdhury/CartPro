<!--Create Modal -->
<div class="modal fade" id="EditformModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel"><b>Edit Slider</b></h5>
          <button type="button" class="close" id="closeEdit" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="alertMessageEdit" role="alert"></div>

        <div class="modal-body">
            <form method="POST" id="updatetForm" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="slider_id" id="sliderId">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Title &nbsp;<span class="text-danger">*</span></b></label>
                            <input type="text" class="col-md-8 form-control" name="slider_title" id="sliderTitleEdit" placeholder="Type Title">
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Subtitle</b></label>
                            <input type="text" class="col-md-8 form-control" name="slider_subtitle" id="sliderSubtitleEdit" placeholder="Type Subtitle">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Type &nbsp;<span class="text-danger">*</span></b></label>
                            <select name="type" id="typeEdit" class="col-md-8 form-control selectpicker" data-live-search="true" data-live-search-style="begins">
                                <option value="category">Category</option>
                                <option value="url">URL</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b><span id="changeLabelTextByTypeEdit">{{__('Category')}}</span> &nbsp;<span class="text-danger">*</span> </b></label>
                            <!--Category-->
                            <div id="dependancyTypeForCategoryEdit" class="col-md-8">
                                <select name="category_id" id="category_id_edit" class="form-control col-md-12 selectpicker" title='{{__('-- Select Category --')}}' >
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
                            <!--URL-->
                            <input type="text" name="url" id="url_edit" class="col-md-8 form-control">

                            <!--For Change Field-->
                            <div id="dependancyTypeEdit" class="col-md-8"></div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label"><b>Image &nbsp;<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <img id="item_image" height="100px" width="100px">
                                {{-- <img id="item_image" src='{{asset("public/images/sliders/DX0dermiGd.png")}}'  height="100px" width="100px"> --}}
                                <input type="file" name="slider_image" id="slider_image" class="form-control" onchange="showImage(this,'item_image')">
                                {{-- @if(($product->baseImage!==null) && ($product->baseImage->type=='base'))
                                    <img id="item_photo" src="{{asset('public/'.$product->baseImage->image)}}"  height="100px" width="100px">
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Target</b></label>
                            <select name="target" id="targetEdit" class="col-md-8 form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='{{__('Select Target')}}'>
                                <option value="same_tab">Same Tab</option>
                                <option value="new_tab">New Tab</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label"><b>Status</b></label>
                            <div class="col-md-8 form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="isActiveEdit" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Enable the slide</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <div class="row mb-5">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <div id="alertMessageBox">
                    <div id="alertMessageEdit" class="text-light"></div>
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

  <script>
      //Change Type
    $('#typeEdit').change(function() {
        var type = $(this).val();
        if (type){
            $.get("{{route('admin.slider.data-fetch-by-type')}}",{type:type}, function (data) {
                console.log(data)
                $('#dependancyTypeEdit').empty().html(data);
            });
        }else{
            // $('#designationId').empty().html('<option>--Select --</option>');
        }
    });
  </script>
