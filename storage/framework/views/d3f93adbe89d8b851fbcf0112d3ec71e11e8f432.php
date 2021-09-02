<?php $__env->startSection('body'); ?>


    <form action="<?php echo e(route('languages.translations.index', ['language' => $language])); ?>" method="get">

        <div class="container-fluid mt-3 mb-3">
            <div class="d-flex">

                <div class="sm:hidden lg:flex items-center">
                    <a href="<?php echo e(route('languages.translations.create', $language)); ?>" class="btn btn-primary mr-1">
                        <?php echo e(__('translation::translation.add')); ?>

                    </a>
                </div>
                <div class="w-20">
                    <?php echo $__env->make('translation::forms.select', ['name' => 'language', 'items' => $languages, 'submit' => true, 'selected' => $language], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>


        <?php if(count($translations)): ?>
            <div class="table-responsive">
                <table id="language-table" class="table ">

                    <thead>
                    <tr>
                        <th class="w-1/5 uppercase font-thin"><?php echo e(__('translation::translation.key')); ?></th>

                        <th class="uppercase font-thin"><?php echo e(config('app.locale')); ?></th>
                        <th class="uppercase font-thin"><?php echo e($language); ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $translations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if(!is_array($value[config('app.locale')])): ?>
                                    <tr>
                                        <td><?php echo e($key); ?></td>
                                        <td><?php echo e($value[config('app.locale')]); ?></td>
                                        <td>
                                            <span class="edit_pencil"><i class="fa fa-pencil" aria-hidden="true"></i> </span><br>
                                            <textarea class="edit_textarea" cols="5" rows="5"><?php echo e($value[$language]); ?></textarea>
                                            <button class="test_2 hidden" type="button" data-key="<?php echo e($key); ?>" data-language="<?php echo e($language); ?>" data-group="<?php echo e($group); ?>" title="Update"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                            <span class="edit_ok hidden"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>
            </div>

        <?php endif; ?>

    </form>

    <script type="text/javascript">
        (function($) {
            "use strict";

            $(document).ready(function () {

                // $(".edit_ok").hide();

                console.log("ok-2");

                var dataSrc = [];

                var table = $('#language-table').DataTable({

                    "order": [],
                    'language': {
                        'lengthMenu': '_MENU_ <?php echo e(__("records per page")); ?>',
                        "info": '<?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)',
                        "search": '<?php echo e(trans("file.Search")); ?>',
                        'paginate': {
                            'previous': '<?php echo e(trans("file.Previous")); ?>',
                            'next': '<?php echo e(trans("file.Next")); ?>'
                        }
                    },

                    'select': {style: 'multi', selector: 'td:first-child'},
                    'lengthMenu': [[100, 200, 500,-1], [100, 200, 500,"All"]],
                });


                $(".edit_pencil").on('click',function(){
                    $(".edit_pencil").show(); //for all
                    $(".test_2").hide(); //for all
                    $(this).hide();
                    var data = $(this).siblings('textarea').val();
                    $(this).siblings('textarea').select().val(data + ' ');
                    $(this).siblings('.test_2').show();
                    console.log('fahim');
                });

                $(".edit_textarea").on('click',function(){
                    $(".edit_pencil").show(); //for all
                    $(".test_2").hide(); //for all
                    $(this).siblings('.edit_pencil').hide();
                    $(this).siblings('.test_2').show();
                });

                $(".test_2").on('click',function(){
                    var language = $(this).data('language');
                    var key   = $(this).data('key');
                    var group = $(this).data('group');
                    var value = $(this).siblings('textarea').val();

                    $(this).siblings('.edit_ok').show();

                    $.ajax({
                        url: "<?php echo e(route('languages.translations.update')); ?>",
                        type: "GET",
                        data: {
                            language:language,
                            key:key,
                            group:group,
                            value:value
                        },
                        success: function (data) {
                            $(".test_2").hide();
                            console.log(data);
                            setTimeout(function() {
                                $('.edit_ok').fadeOut("slow");
                            }, 3000);
                        }
                    });
                });

            });
    })(jQuery);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('translation::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\3_cartpro_menu\resources\views/vendor/translation/languages/translations/index.blade.php ENDPATH**/ ?>