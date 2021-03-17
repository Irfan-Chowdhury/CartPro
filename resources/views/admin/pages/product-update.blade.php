@extends('admin.main')
@section('admin_content')
    <style>
        .dz-preview .dz-image img{
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
    </style>
    <section>

        <div class="container-fluid"><span id="general_result"></span></div>

        <div class="container-fluid">
            <h3>Update Product</h3>
            <form action="{{ route('products.update') }}" method="post" id="product-form" class="form-horizontal row mt-3" enctype="multipart/form-data">
                @csrf

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>{{__('Product Name')}} *</label>
                                    <input type="text" name="product_name" id="product_name" required class="form-control" value="{{ $products->product_name }}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{__('Short Description')}}</label>
                                    <textarea name="short_description" id="description" class="form-control text-editor">{!! htmlspecialchars_decode($products->short_description) !!}</textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{__('Description')}}</label>
                                    <textarea name="description" id="description" class="form-control text-editor">{!! htmlspecialchars_decode($products->description) !!}</textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{__('Price')}} *</label>
                                    <input type="text" name="price" id="price" required class="form-control" value="{{ $products->price }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5>Images</h5> 
                            <hr>
                            <div class="dropzone" id="product_dropzone">                            
                                
                            </div>
                        </div>
                    </div>
                    @if($products->has_attribute == 0)
                    <div class="card">
                        <div class="card-body">
                            <h5>Inventory</h5><hr>
                            <div class="row"> 
                                                               
                                <div class="col-md-12 form-group">
                                    <label>{{__('Quantity')}} *</label>
                                    <input type="text" name="qty" id="product_amount"  required class="form-control" value="{{ $products->qty }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h5>Variants</h5><hr>
                            <div class="variants">
                                @foreach($attributes as $variant)
                                <div class="row">
                                    <div class="col-1">
                                        <label>{{__('Image')}}</label>
                                        <label class="variant-image"><i class="btn btn-primary dripicons-photo"></i></label>
                                    </div>
                                    <div class="col-2 form-group variant-size">
                                        <label>{{__('Size')}} *</label>
                                        <input type="text" name="variant_size[]" required class="form-control" value="{{$variant->size}}">
                                    </div>
                                
                                    <div class="col-2 form-group variant-color">
                                        <label>{{__('Color')}} *</label>
                                        <input type="text" name="variant_color[]"  required class="form-control" value="{{$variant->color}}">
                                    </div>

                                    <div class="col-2 form-group variant-sku">
                                        <label>{{__('SKU')}} *</label>
                                        <input type="text" name="variant_sku[]" required class="form-control" value="{{$variant->sku}}">
                                    </div>
                                
                                    <div class="col-2 form-group">
                                        <label>{{__('Quantity')}} *</label>
                                        <input type="text" name="variant_qty[]"  required class="form-control" value="{{$variant->qty}}">
                                    </div>

                                    <div class="col-2 form-group">
                                        <label>{{__('Price')}}</label>
                                        <input type="text" name="variant_price[]" required class="form-control" value="{{$variant->price}}">
                                    </div>

                                    <div class="col-1">
                                        <label>Delete</label><br>
                                        <span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <span class="btn btn-link add-more"><i class="dripicons-plus"></i> Add More</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5>SEO</h5><hr>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>{{__('Meta Title')}} * </label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ $products->meta_title }}" maxlength="70">
                                    <small>write below 70 characters</small>
                                </div>
                                                              
                                <div class="col-md-12 form-group">
                                    <label>{{__('Meta Description')}} *</label>
                                    <textarea name="meta_description" class="form-control">{{ $products->meta_description }}</textarea>
                                    <small>write below 320 characters</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <select class="form-control form-control" id="category_id" required name="category_id">
                                        <option>{{__('Categories')}}</option>
                                        @foreach($categories as $category)
                                            @if($products->category_id === $category->id)
                                            <option selected value="{{$category->id}}">{{$category->category_name}}</option>
                                            @else
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>                              
                                </div>
                                <div class="col-md-12 form-group">
                                    <select class="form-control form-control" id="brand_id"  name="brand_id">
                                        <option>{{__('Brands')}}</option>
                                        @foreach($brands as $brand)
                                            @if($products->brand_id === $brand->id)
                                            <option selected value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @else
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>                              
                                </div>
                                <div class="col-md-12 form-group">
                                    <select class="form-control form-control" id="collection_id"  name="collection_id[]" multiple="">
                                        <option>{{__('Collections')}}</option>
                                        @foreach($collections as $collection)
                                            @if($products->collection_id === $collection->id)
                                            <option selected value="{{$collection->id}}">{{$collection->name}}</option>
                                            @else
                                            <option value="{{$collection->id}}">{{$collection->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>                              
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{__('Tags')}} *</label>
                                    <input type="text" name="tags" id="tags" class="form-control"
                                           placeholder="{{__('Tags')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" align="center">
                        <input type="hidden" name="sku" value="{{$products->sku}}">
                        <input type="hidden" name="id" value="{{$products->id}}">
                        <button type="submit" class="btn btn-warning btn-block" id="submit-btn">{{ __('Save Product') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script type="text/javascript">
        $(document).on('click', '.add-more', function(){
            var rand = Math.floor(Math.random() * 90000) + 10000;
            $('.variants').append('<div class="row"><div class="col-1"><label>{{__('Image')}}</label><label class="variant-image"><i class="btn btn-primary dripicons-photo"></i></label></div><div class="col-2 form-group variant-size"><label>{{__('Size')}} *</label><input type="text" name="variant_size[]" required class="form-control" placeholder="{{__('XS, S, M ...')}}"></div><div class="col-2 form-group variant-color"><label>{{__('Color')}} *</label><input type="text" name="variant_color[]" id="product_amount"  required class="form-control" placeholder="{{__('Color')}}"></div><div class="col-2 form-group variant-sku"><label>{{__('SKU')}} *</label><input type="text" name="variant_sku[]" id="sku" required class="form-control" placeholder="{{__('SKU')}}"></div><div class="col-2 form-group variant-qty"><label>{{__('Quantity')}} *</label><input type="text" name="variant_qty[]" id="product_amount"  required class="form-control" placeholder="{{__('Quantity')}}"></div><div class="col-2 form-group variant-price"><label>{{__('Price')}}</label><input type="text" name="variant_price[]" id="price" required class="form-control" placeholder="{{__('Price')}}"></div><div class="col-1"><label>Delete</label><br><span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span></div></div>');
        })

        $(document).on('click', '.del-row', function(){
            $(this).parent().parent().html('');
        })

        $('select').selectpicker();

        tinymce.init({
            selector: '.text-editor',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            height: 200,

            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },

            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code wordcount'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat',
            branding: false
        });

        //dropzone portion
        Dropzone.autoDiscover = false;
        $(".dropzone").sortable({
            items:'.dz-preview',
            cursor: 'grab',
            opacity: 0.5,
            containment: '.dropzone',
            distance: 20,
            tolerance: 'pointer',
            stop: function () {
              var queue = myDropzone.getAcceptedFiles();
              newQueue = [];
              $('#product_dropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {           
                    var name = el.innerHTML;
                    queue.forEach(function(file) {
                        if (file.name === name) {
                            newQueue.push(file);
                        }
                    });
              });
              myDropzone.files = newQueue;
            }
        });

        myDropzone = new Dropzone('#product_dropzone', {
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFilesize: 12,
            paramName: 'file',
            clickable: true,
            method: 'POST',
            url: '{{route('products.update')}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            init: function () {
                var myDropzone = this;
                var sku = '{{$products->sku}}';
                $.ajax({
                    url: '{{ route("admin.product.images") }}',
                    type: 'post',
                    data: {url: window.location.href, sku: '{{$products->sku}}'},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        
                        $.each(response, function(key,value) {
                            var mockFile = { name: value.name, size: value.size };

                            myDropzone.emit("addedfile", mockFile);
                            myDropzone.emit("thumbnail", mockFile, "{{url('public/images/products')}}/"+sku+"/"+ value.name);
                            myDropzone.emit("complete", mockFile);

                            // myDropzone.options.addedfile.call(myDropzone, file);
                            // myDropzone.options.thumbnail.call(myDropzone, file, "https://localhost/elevani/public/images/products/"+ value.name);
                            // myDropzone.emit('complete', file);

                        });

                    }
                });

                $('#submit-btn').on("click", function (e) {
                    e.preventDefault();
                    if ( $("#product-form").valid()) {
                        tinyMCE.triggerSave();
                        if(myDropzone.getAcceptedFiles().length) {
                            myDropzone.processQueue();
                        }
                        else {
                            $.ajax({
                                type:'POST',
                                url:'{{route('products.update')}}',
                                data: $("#product-form").serialize(),
                                success:function(response){
                                    console.log(response);
                                    //location.href = '../product';
                                },
                                error:function(response) {
                                  if(response.responseJSON.errors.name) {
                                      $("#name-error").text(response.responseJSON.errors.name);
                                  }
                                  else if(response.responseJSON.errors.code) {
                                      $("#code-error").text(response.responseJSON.errors.code);
                                  }
                                },
                            });
                        }
                    }
                });

                this.on('sending', function (file, xhr, formData) {
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $("#product-form").serializeArray();
                    $.each(data, function (key, el) {
                        formData.append(el.name, el.value);
                    });
                });
            },
            error: function (file, response) {
                console.log(response);
                if(response.errors.name) {
                  $("#name-error").text(response.errors.name);
                  this.removeAllFiles(true);
                }
                else if(response.errors.code) {
                  $("#code-error").text(response.errors.code);
                  this.removeAllFiles(true);
                }
                else {
                  try {
                      var res = JSON.parse(response);
                      if (typeof res.message !== 'undefined' && !$modal.hasClass('in')) {
                          $("#success-icon").attr("class", "fas fa-thumbs-down");
                          $("#success-text").html(res.message);
                          $modal.modal("show");
                      } else {
                          if ($.type(response) === "string")
                              var message = response; //dropzone sends it's own error messages in string
                          else
                              var message = response.message;
                          file.previewElement.classList.add("dz-error");
                          _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                          _results = [];
                          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                              node = _ref[_i];
                              _results.push(node.textContent = message);
                          }
                          return _results;
                      }
                  } catch (error) {
                      console.log(error);
                  }
                }
            },
            successmultiple: function (file, response) {
                location.href = '../product';
                //console.log(file, response);
            },
            completemultiple: function (file, response) {
                console.log(file, response, "completemultiple");
            },
            reset: function () {
                console.log("resetFiles");
                this.removeAllFiles(true);
            }
        });     

        $(document).on('click', '.variant-image', function(){
            var product = '{{ base64_encode($products->product_name) }}';
            var product_id = '{{ $products->id }}';
            var sku = $(this).closest('div').siblings('.variant-sku').children('input').val();
            var size = $(this).closest('div').siblings('.variant-size').children('input').val();
            var color = $(this).closest('div').siblings('.variant-color').children('input').val();
            var price = $(this).closest('div').siblings('.variant-price').children('input').val();
            var qty = $(this).closest('div').siblings('.variant-qty').children('input').val();
            document.location.href = "{{url('admin/variant-images/')}}/"+product_id+'/'+sku+'/'+size+'/'+color+'/'+price+'/'+qty+'/'+product;
        })
    </script>
@endsection