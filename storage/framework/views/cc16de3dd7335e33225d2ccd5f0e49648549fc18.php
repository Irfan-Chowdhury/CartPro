<?php $__env->startSection('title','Admin | Products'); ?>

<?php $__env->startSection('admin_content'); ?>

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

    <?php echo $__env->make('admin.includes.alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mb-3">
        <h3 class="font-weight-bold mt-3"><a class="btn btn-sm btn-default mr-1" href="<?php echo e(route('admin.products.index')); ?>"><i class="dripicons-arrow-thin-left"></i></a> <?php echo app('translator')->get('file.Edit Product'); ?></h3>
        <div id="success_alert" role="alert"></div>
    </div>

    <div class="container-fluid">
        <form action="<?php echo e(route('admin.products.update',$product->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col-8">
                    <!-- General -->
                        <?php echo $__env->make('admin.pages.product.includes.edit.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--/ General -->
                </div>
                <div class="col-4">
                    <!-- sidebar -->
                        <?php echo $__env->make('admin.pages.product.includes.edit.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--/ sidebar -->
                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <!-- Images -->
                        <?php echo $__env->make('admin.pages.product.includes.edit.image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- Images -->

                    <!-- Price -->
                        <?php echo $__env->make('admin.pages.product.includes.edit.price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--/ Price-->

                    <!-- Inventory-->
                        <?php echo $__env->make('admin.pages.product.includes.edit.inventory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--/ Inventory-->

                    <!-- Attribute -->
                        <?php echo $__env->make('admin.pages.product.includes.edit.attribute', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--/ Attribute -->

                    <!-- Additional -->
                        <?php echo $__env->make('admin.pages.product.includes.edit.additional', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--/ Additional -->

                    <!-- SEO -->
                        <?php echo $__env->make('admin.pages.product.includes.edit.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--/ SEO -->

                    <!-- Weight -->
                    <?php echo $__env->make('admin.pages.product.includes.edit.weight', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--/ Weight -->
                </div>
            </div>

        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
                        'advlist autolink lists link image charmap anchor textcolor',
                        'searchreplace',
                        'insertdatetime media table paste wordcount'
                    ],
                    menubar: '',
                    toolbar: 'insertfile | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media | forecolor backcolor | table | removeformat',
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
                    if (manageStock==1) {
                        var data = '<label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('Quantity')); ?> &nbsp;<span class="text-danger">*</span> </b></label>';
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
                    var html;
                    html = ' <div class="row">'+
                                '<div class="col-5 form-group">'+
                                    '<label><?php echo e(__("Atrribute")); ?></label>'+
                                    '<select name="attribute_id[]" class="form-control attributeId">'+
                                        '<option value="">Please Select Attribute</option>'+
                                            '<?php $__empty_1 = true; $__currentLoopData = $attributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>'+
                                                '<option value="" disabled class="text-bold"><?php echo e($item->attributeSetTranslation->attribute_set_name ?? $item->attributeSetTranslationEnglish->attribute_set_name ?? null); ?></option>'+
                                                '<?php $__empty_2 = true; $__currentLoopData = $item->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>'+
                                                    '<option value="<?php echo e($attribute->id); ?>">&nbsp;&nbsp;&nbsp;<?php echo e($attribute->attributeTranslation->attribute_name ?? $attribute->attributeTranslationEnglish->attribute_name ?? null); ?></option>'+
                                                '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>'+
                                                '<?php endif; ?>'+
                                            '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>'+
                                            '<?php endif; ?>'+
                                    '</select>'+
                                '</div>'+

                                '<div class="col-6 form-group">'+
                                    '<label><?php echo e(__("Values")); ?></label>'+
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
                    $.ajax({
                        url: "<?php echo e(route('admin.attribute.get_attribute_values')); ?>",
                        method: "GET",
                        data: {attribute_id: attributeId},
                        success: function (data) {
                            console.log(data);
                            $('select').selectpicker("destroy");
                            $('#attributeValueId').html(data);
                            // $('#attributeValueId2').html(data);
                            $('select').selectpicker();
                        }
                    });
                });

                $(document).on('change','.attributeId',function() {
                    var attributeId = $(this).val();
                    var random_number = Math.floor(Math.random() * 90000) + 10000;

                    $('.attributeValueId').addClass('attributeValueId_'+random_number).removeClass('attributeValueId');
                    $.ajax({
                        url: "<?php echo e(route('admin.attribute.get_attribute_values')); ?>",
                        method: "GET",
                        data: {attribute_id: attributeId},
                        success: function (data) {
                            //console.log(data);
                            $('select').selectpicker("destroy");
                            // $('#attributeValueId').html(data);
                            $('.attributeValueId_'+random_number).attr("multiple","multiple");
                            $('.attributeValueId_'+random_number).html(data);
                            $('select').selectpicker();
                        }
                    });
                });

                //Image Show Before Upload Start
                $(document).ready(function(){
                    $('input[type="file"]').change(function(e){
                        var fileName = e.target.files[0].name;
                        if (fileName){
                            $('#fileLabel').html(fileName);
                        }
                    });
                });
            })(jQuery);

            //Image Show Before Upload End
            function showImage(data, imgId){
                if(data.files && data.files[0]){
                    var obj = new FileReader();
                    obj.onload = function(d){
                        var image = document.getElementById(imgId);
                        image.src = d.target.result;
                    }
                    obj.readAsDataURL(data.files[0]);
                }
            }
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/edit.blade.php ENDPATH**/ ?>