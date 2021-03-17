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
            <h3>Update Variant Images</h3>
            <form action="{{ route('admin.variant.images') }}" method="post" id="product-form" class="form-horizontal row mt-3" enctype="multipart/form-data">
                @csrf

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>{{__('Product Name')}} *</label>
                                    <input type="text" name="product_name" id="product_name" required class="form-control" value="{{base64_decode($product)}}">
                                </div>
                                <div class="col-2 form-group">
                                    <label>{{__('Size')}} *</label>
                                    <input type="text" name="size" required class="form-control" value="{{$size}}">
                                </div>
                            
                                <div class="col-2 form-group">
                                    <label>{{__('Color')}} *</label>
                                    <input type="text" name="color"  required class="form-control" value="{{$color}}">
                                </div>
                                <div class="col-2 form-group">
                                    <label>{{__('SKU')}} *</label>
                                    <input type="text" name="sku" required class="form-control" value="{{$sku}}">
                                </div>
                                <div class="col-2 form-group variant-qty">
                                    <label>{{__('Quantity')}} *</label>
                                    <input type="text" name="qty"  required class="form-control" value="{{$qty}}">
                                </div>
                                <div class="col-2 form-group variant-price">
                                    <label>{{__('Price')}}</label>
                                    <input type="text" name="price" required class="form-control" value="{{$price}}">
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
                            <br><br>
                            <input type="hidden" name="product_id" value="{{$id}}">
                            <button type="submit" class="btn btn-warning btn-block" id="submit-btn">{{ __('Save Product') }}</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>

    <script type="text/javascript">

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
            maxFilesize: 50,
            paramName: 'file',
            clickable: true,
            method: 'POST',
            url: '{{route('admin.variant.images')}}',
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
                var sku = '{{$sku}}';
                $.ajax({
                    url: '{{ route("admin.product.images") }}',
                    type: 'post',
                    data: {url: window.location.href, sku: '{{$sku}}'},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        
                        $.each(response, function(key,value) {
                            var mockFile = { name: value.name, size: value.size };

                            myDropzone.emit("addedfile", mockFile);
                            myDropzone.emit("thumbnail", mockFile, "https://localhost/elevani/public/images/products/"+sku+"/"+ value.name);
                            myDropzone.emit("complete", mockFile);

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
                                        url:'{{route('admin.variant.images')}}',
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

    </script>
@endsection