@extends('admin.main')
@section('title','Admin | Products')

@section('admin_content')

<style>
    .list-group-item {
        z-index: 2;
        color: black;
        background-color: #E9E9E9;
        border-color: #FFFFFF;
    }
</style>

<section>
    <div class="container-fluid"><span id="general_result"></span></div>

    @include('admin.includes.alert_message')

    <!-- Error Message -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" >
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Error Message -->

    <div class="container-fluid mb-3">
        <h3 class="font-weight-bold mt-3"><a class="btn btn-sm btn-default mr-1" href="{{route('admin.products.index')}}"><i class="dripicons-arrow-thin-left"></i></a> @lang('file.Create Product')</h3>
        <div id="success_alert" role="alert"></div>
    </div>

    <div class="container-fluid">
        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-8">
                    <!-- General -->
                        @include('admin.pages.product.includes.create.general')
                    <!--/ General -->
                    
                    <!-- Images -->
                        @include('admin.pages.product.includes.create.image')
                    <!-- Images -->
                    
                    <!-- Price -->
                        @include('admin.pages.product.includes.create.price')
                    <!--/ Price-->
                    
                    <!-- Inventory-->
                        @include('admin.pages.product.includes.create.inventory')
                    <!--/ Inventory-->

                    <!-- Attribute -->
                        @include('admin.pages.product.includes.create.attribute')
                    <!--/ Attribute -->
                    
                    <!-- Additional -->
                        @include('admin.pages.product.includes.create.additional')
                    <!--/ Additional -->
                    
                    <!-- SEO -->
                        @include('admin.pages.product.includes.create.seo')
                    <!--/ SEO -->
                </div>
                <div class="col-4">
                    <!-- sidebar -->
                        @include('admin.pages.product.includes.create.sidebar')
                    <!--/ sidebar -->
                </div>
            </div>

        </form>
    </div>
</section>

@endsection

@push('scripts')
    <script type="text/javascript">
        (function ($) {
            "use strict";

                tinymce.init({
                    selector: '.text-editor',
                    setup: function (editor) {
                        editor.on('change', function () {
                            editor.save();
                        });
                    },
                    height: 300,

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

                $('#specialPriceStart').datepicker({
                    uiLibrary: 'bootstrap4'
                });

                $('#specialPriceEnd').datepicker({
                    uiLibrary: 'bootstrap4'
                });

                $('#newFrom').datepicker({
                    uiLibrary: 'bootstrap4'
                });

                $('#newTo').datepicker({
                    uiLibrary: 'bootstrap4'
                });

                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });


                $('#manageStock').change(function() {
                    var manageStock = $('#manageStock').val();
                    var data = '';
                    if (manageStock==1) {
                        data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> {{__('Quantity')}} &nbsp;<span class="text-danger">*</span> </b></label>';
                        data += '<div class="col-sm-8">';
                        data += '<input type="number" min="0" name="qty" id="qty" class="form-control" id="inputEmail3" placeholder="Type Quantity">';
                        data += '</div>';

                        $('#quantityField').html(data)
                    }else{
                        $('#quantityField').empty();
                    }

                });


                $(document).on('click', '.del-row', function(){
                    $(this).parent().parent().html('');
                })

                $(document).on('click', '#addMore', function(){
                    var html = '';
                    html = ' <div class="row">'+
                                '<div class="col-5 form-group">'+
                                    '<label>{{__("Atrribute")}}</label>'+
                                    '<select name="attribute_id[]" class="form-control attributeId">'+
                                        '<option value="">Please Select Attribute</option>'+
                                            '@forelse ($attributeSets as $item)'+
                                                '<option value="" disabled class="text-bold">{{$item->attributeSetTranslation->attribute_set_name ?? $item->attributeSetTranslationEnglish->attribute_set_name ?? null}}</option>'+
                                                '@forelse ($item->attributes as $attribute)'+
                                                    '<option value="{{$attribute->id}}">&nbsp;&nbsp;&nbsp;{{$attribute->attributeTranslation->attribute_name ?? $attribute->attributeTranslationEnglish->attribute_name ?? null}}</option>'+
                                                '@empty'+
                                                '@endforelse'+
                                            '@empty'+
                                            '@endforelse'+
                                    '</select>'+
                                '</div>'+

                                '<div class="col-6 form-group">'+
                                    '<label>{{__("Values")}}</label>'+
                                    '<select name="attribute_value_id[]" id="attributeValueId"  class="form-control attributeValueId">'+
                                    '</select>'+
                                '</div>'+



                                '<div class="col-1">'+
                                    '<label>Delete</label><br>'+
                                    '<span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>'+
                                '</div>'+
                        '</div>';


                    var rand = Math.floor(Math.random() * 90000) + 10000;
                    $('.variants').append(html);

                })


                $('#attributeId').change(function () {
                    var attributeId = $('#attributeId').val();
                    console.log('ok');
                    $.ajax({
                        url: "{{route('admin.attribute.get_attribute_values')}}",
                        method: "GET",
                        data: {attribute_id: attributeId},
                        success: function (data) {
                            $('select').selectpicker("destroy");
                            $('#attributeValueId').html(data);
                            $('select').selectpicker();
                        }
                    });
                });

                $(document).on('change','.attributeId',function() {
                    var attributeId = $(this).val();
                    var random_number = Math.floor(Math.random() * 90000) + 10000;

                    $('.attributeValueId').addClass('attributeValueId_'+random_number).removeClass('attributeValueId');
                    $.ajax({
                        url: "{{route('admin.attribute.get_attribute_values')}}",
                        method: "GET",
                        data: {attribute_id: attributeId},
                        success: function (data) {
                            $('select').selectpicker("destroy");
                            $('.attributeValueId_'+random_number).html(data);
                            $('select').selectpicker();
                        }
                    });
                });



        })(jQuery);
    </script>
@endpush

