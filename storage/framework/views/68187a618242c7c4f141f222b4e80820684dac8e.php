<?php $__env->startSection('admin_content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('public/css/kendo.default.v2.min.css')); ?>" type="text/css">
<script type="text/javascript" src="<?php echo e(asset('public/js/kendo.all.min.js')); ?>"></script>


<section>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <span id="form_result_permission"></span>

                <h1 class="text-center mt-2"><?php echo e($role->name); ?></h1>
                <p><?php echo e(__('You can assign permission for this role')); ?></p>

                <div id="all_resources">
                    <div class="demo-section k-content">

                        <h4><?php echo e(__('Select modules')); ?></h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div id="treeview1"></div>
                            </div>
                            <div class="col-md-4">
                                <div  id="treeview2"></div>
                            </div>
                            <div class="col-md-4">
                                <div id="treeview3"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-5">
                    <div class="col-md-6 offset-md-3 mt-5">
                        <input id="role_id" type="hidden" name="role_id" value=<?php echo e($role->id); ?>>
                        <button class="btn btn-primary btn-block" id="set_permission_btn" type="submit" class="roles-btn btn-primary">
                            <?php echo e(__('Submit')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    (function($) {
        "use strict";

        var checkedNodes;


        $(document).ready(function () {

            $("ul#setting").siblings('a').attr('aria-expanded', 'true');
            $("ul#setting").addClass("show");
            $("ul#setting #role-menu").addClass("active");

            var target = '<?php echo e(route('permissionDetails',$role->id)); ?>';
            $.ajax({
                type: "GET",
                url: target,
                dataType: 'json',
                success: function (result) {
                    console.log(result);

                    $("#treeview1").empty();
                    $("#treeview1").kendoTreeView({
                        checkboxes: {
                            checkChildren: true
                        },
                        check: onCheck,
                        dataSource: [
                            {
                                id: 'product',
                                text: "<?php echo e(trans('Product')); ?>",
                                expanded: true,
                                checked: ($.inArray('product', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'category',
                                        text: '<?php echo e(__('Category')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('category', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'category-view',
                                                text: '<?php echo e(__('Category View')); ?>',
                                                checked: ($.inArray('category-view', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'category-store',
                                                text: '<?php echo e(__('Category Store')); ?>',
                                                checked: ($.inArray('category-store', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'category-edit',
                                                text: '<?php echo e(__('Category Edit')); ?>',
                                                checked: ($.inArray('category-edit', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'category-action',
                                                text: '<?php echo e(__('Category Action')); ?>',
                                                checked: ($.inArray('category-action', result) >= 0) ? true : false
                                            },
                                        ],
                                    },
                                    {
                                        id: 'brand',
                                        text: '<?php echo e(__('Brand')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('brand', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'brand-view',
                                                text: '<?php echo e(__('Brand View')); ?>',
                                                checked: ($.inArray('brand-view', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'brand-store',
                                                text: '<?php echo e(__('Brand Store')); ?>',
                                                checked: ($.inArray('brand-store', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'brand-edit',
                                                text: '<?php echo e(__('Brand Edit')); ?>',
                                                checked: ($.inArray('brand-edit', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'brand-action',
                                                text: '<?php echo e(__('Brand Action')); ?>',
                                                checked: ($.inArray('brand-action', result) >= 0) ? true : false
                                            },
                                        ],
                                    },
                                    {
                                        id: 'attribute_set',
                                        text: '<?php echo e(trans('Attribute Set')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('attribute_set', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'attribute_set-view',
                                                text: '<?php echo e(__('Attribute Set View')); ?>',
                                                checked: ($.inArray('attribute_set-view', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'attribute_set-store',
                                                text: '<?php echo e(__('Attribute Set Store')); ?>',
                                                checked: ($.inArray('attribute_set-store', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'attribute_set-edit',
                                                text: '<?php echo e(__('Attribute Set Edit')); ?>',
                                                checked: ($.inArray('attribute_set-edit', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'attribute_set-action',
                                                text: '<?php echo e(__('Attribute Set Action')); ?>',
                                                checked: ($.inArray('attribute_set-action', result) >= 0) ? true : false
                                            },
                                        ],
                                    },
                                    {
                                        id: 'attribute',
                                        text: '<?php echo e(trans('Attribute')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('attribute', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'attribute-view',
                                                text: '<?php echo e(__('Attribute View')); ?>',
                                                checked: ($.inArray('attribute-view', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'attribute-store',
                                                text: '<?php echo e(__('Attribute Store')); ?>',
                                                checked: ($.inArray('attribute-store', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'attribute-edit',
                                                text: '<?php echo e(__('Attribute Edit')); ?>',
                                                checked: ($.inArray('attribute-edit', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'attribute-action',
                                                text: '<?php echo e(__('Attribute Action')); ?>',
                                                checked: ($.inArray('attribute-action', result) >= 0) ? true : false
                                            },
                                        ],
                                    },
                                    {
                                        id: 'tag',
                                        text: '<?php echo e(trans('Tag')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('tag', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'tag-view',
                                                text: '<?php echo e(__('Tag View')); ?>',
                                                checked: ($.inArray('tag-view', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'tag-store',
                                                text: '<?php echo e(__('Tag Store')); ?>',
                                                checked: ($.inArray('tag-store', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'tag-edit',
                                                text: '<?php echo e(__('Tag Edit')); ?>',
                                                checked: ($.inArray('tag-edit', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'tag-action',
                                                text: '<?php echo e(__('Tag Action')); ?>',
                                                checked: ($.inArray('tag-action', result) >= 0) ? true : false
                                            },
                                        ],
                                    },
                                    {
                                        id: 'catalog',
                                        text: '<?php echo e(trans('Catalog')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('catalog', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'product-view',
                                                text: '<?php echo e(__('Product View')); ?>',
                                                checked: ($.inArray('product-view', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'product-store',
                                                text: '<?php echo e(__('Product Store')); ?>',
                                                checked: ($.inArray('product-store', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'product-edit',
                                                text: '<?php echo e(__('Product Edit')); ?>',
                                                checked: ($.inArray('product-edit', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'product-action',
                                                text: '<?php echo e(__('Product Action')); ?>',
                                                checked: ($.inArray('product-action', result) >= 0) ? true : false
                                            },
                                        ],
                                    },
                                ],
                            },
                        ]
                    });

                    $("#treeview2").empty();
                    $("#treeview2").kendoTreeView({
                        checkboxes: {
                            checkChildren: true
                        },
                        check: onCheck,
                        dataSource: [
                            {
                                id: 'flash_sale',
                                text: "<?php echo e(trans('Flash Sale')); ?>",
                                expanded: true,
                                checked: ($.inArray('flash_sale', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'flash_sale-view',
                                        text: '<?php echo e(__('Flash Sale View')); ?>',
                                        checked: ($.inArray('flash_sale-view', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'flash_sale-store',
                                        text: '<?php echo e(__('Flash Sale Store')); ?>',
                                        checked: ($.inArray('flash_sale-store', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'flash_sale-edit',
                                        text: '<?php echo e(__('Flash Sale Edit')); ?>',
                                        checked: ($.inArray('flash_sale-edit', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'flash_sale-action',
                                        text: '<?php echo e(__('Flash Sale Action')); ?>',
                                        checked: ($.inArray('flash_sale-action', result) >= 0) ? true : false
                                    },
                                ],
                            },
                            {
                                id: 'coupon',
                                text: "<?php echo e(trans('Coupon')); ?>",
                                expanded: true,
                                checked: ($.inArray('coupon', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'coupon-view',
                                        text: '<?php echo e(__('Coupon View')); ?>',
                                        checked: ($.inArray('coupon-view', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'coupon-store',
                                        text: '<?php echo e(__('Coupon Store')); ?>',
                                        checked: ($.inArray('coupon-store', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'coupon-edit',
                                        text: '<?php echo e(__('Coupon Edit')); ?>',
                                        checked: ($.inArray('coupon-edit', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'coupon-action',
                                        text: '<?php echo e(__('Coupon Action')); ?>',
                                        checked: ($.inArray('coupon-action', result) >= 0) ? true : false
                                    },
                                ],
                            },
                            {
                                id: 'page',
                                text: "<?php echo e(trans('Page')); ?>",
                                expanded: true,
                                checked: ($.inArray('page', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'page-view',
                                        text: '<?php echo e(__('Page View')); ?>',
                                        checked: ($.inArray('page-view', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'page-store',
                                        text: '<?php echo e(__('Page Store')); ?>',
                                        checked: ($.inArray('page-store', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'page-edit',
                                        text: '<?php echo e(__('Page Edit')); ?>',
                                        checked: ($.inArray('page-edit', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'page-action',
                                        text: '<?php echo e(__('Page Action')); ?>',
                                        checked: ($.inArray('page-action', result) >= 0) ? true : false
                                    },
                                ],
                            },
                            {
                                id: 'menu',
                                text: "<?php echo e(trans('Menu')); ?>",
                                expanded: true,
                                checked: ($.inArray('menu', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'menu-view',
                                        text: '<?php echo e(__('Menu View')); ?>',
                                        checked: ($.inArray('menu-view', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'menu-store',
                                        text: '<?php echo e(__('Menu Store')); ?>',
                                        checked: ($.inArray('menu-store', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'menu-edit',
                                        text: '<?php echo e(__('Menu Edit')); ?>',
                                        checked: ($.inArray('menu-edit', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'menu-action',
                                        text: '<?php echo e(__('Menu Action')); ?>',
                                        checked: ($.inArray('menu-action', result) >= 0) ? true : false
                                    },
                                ],
                            },
                            {
                                id: 'menu_item',
                                text: "<?php echo e(trans('Menu Item')); ?>",
                                expanded: true,
                                checked: ($.inArray('menu_item', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'menu_item-view',
                                        text: '<?php echo e(__('Menu Item View')); ?>',
                                        checked: ($.inArray('menu_item-view', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'menu_item-store',
                                        text: '<?php echo e(__('Menu Item Store')); ?>',
                                        checked: ($.inArray('menu_item-store', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'menu_item-edit',
                                        text: '<?php echo e(__('Menu Item Edit')); ?>',
                                        checked: ($.inArray('menu_item-edit', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'menu_item-action',
                                        text: '<?php echo e(__('Menu Item  Action')); ?>',
                                        checked: ($.inArray('menu_item-action', result) >= 0) ? true : false
                                    },
                                ],
                            },
                            {
                                id: 'users_and_roles',
                                text: "<?php echo e(trans('User And Role')); ?>",
                                expanded: true,
                                checked: ($.inArray('users_and_roles', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'user',
                                        text: '<?php echo e(__('User')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('user', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'user-view',
                                                text: '<?php echo e(__('User View')); ?>',
                                                checked: ($.inArray('user-view', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'user-store',
                                                text: '<?php echo e(__('User Store')); ?>',
                                                checked: ($.inArray('user-store', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'user-edit',
                                                text: '<?php echo e(__('User Edit')); ?>',
                                                checked: ($.inArray('user-edit', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'user-action',
                                                text: '<?php echo e(__('User  Action')); ?>',
                                                checked: ($.inArray('user-action', result) >= 0) ? true : false
                                            },
                                        ],
                                    },
                                    {
                                        id: 'role',
                                        text: '<?php echo e(__('Role')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('role', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'role-view',
                                                text: '<?php echo e(__('Role View')); ?>',
                                                checked: ($.inArray('role-view', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'role-store',
                                                text: '<?php echo e(__('Role Store')); ?>',
                                                checked: ($.inArray('role-store', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'role-edit',
                                                text: '<?php echo e(__('Role Edit')); ?>',
                                                checked: ($.inArray('role-edit', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'role-action',
                                                text: '<?php echo e(__('Role Action')); ?>',
                                                checked: ($.inArray('role-action', result) >= 0) ? true : false
                                            },
                                            {
                                                id: 'set_permission',
                                                text: '<?php echo e(__('Set Permission')); ?>',
                                                checked: ($.inArray('set_permission', result) >= 0) ? true : false
                                            },
                                        ],
                                    },
                                ],
                            },
                        ]
                    });

                    $("#treeview3").empty();
                    $("#treeview3").kendoTreeView({
                        checkboxes: {
                            checkChildren: true
                        },
                        check: onCheck,
                        dataSource: [
                            {
                                id: 'appearance',
                                text: "<?php echo e(trans('Appearance')); ?>",
                                expanded: true,
                                checked: ($.inArray('appearance', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'store_front',
                                        text: '<?php echo e(__('Store Front')); ?>',
                                        checked: ($.inArray('store_front', result) >= 0) ? true : false,
                                    },
                                ],
                            },
                            {
                                id: 'site-setting',
                                text: "<?php echo e(trans('Site Setting')); ?>",
                                expanded: true,
                                checked: ($.inArray('site-setting', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'setting',
                                        text: '<?php echo e(__('Setting')); ?>',
                                        checked: ($.inArray('setting', result) >= 0) ? true : false,
                                    },
                                    {
                                        id: 'locale',
                                        text: '<?php echo e(__('Locale')); ?>',
                                        expanded: true,
                                        checked: ($.inArray('locale', result) >= 0) ? true : false,
                                        items: [
                                            {
                                                id: 'locale-view',
                                                text: '<?php echo e(__('Locale View')); ?>',
                                                checked: ($.inArray('locale-view', result) >= 0) ? true : false,
                                            },
                                            {
                                                id: 'locale-store',
                                                text: '<?php echo e(__('Locale Store')); ?>',
                                                checked: ($.inArray('locale-store', result) >= 0) ? true : false,
                                            },
                                            {
                                                id: 'locale-edit',
                                                text: '<?php echo e(__('Locale Edit')); ?>',
                                                checked: ($.inArray('locale-edit', result) >= 0) ? true : false,
                                            },
                                            {
                                                id: 'locale-action',
                                                text: '<?php echo e(__('Locale Action')); ?>',
                                                checked: ($.inArray('locale-action', result) >= 0) ? true : false,
                                            },
                                        ]
                                    },
                                ],
                            },
                        ]
                    });

                    // function that gathers IDs of checked nodes
                    function checkedNodeIds(nodes, checkedNodes) {

                        for (var i = 0; i < nodes.length; i++) {
                            if (nodes[i].checked) {
                                getParentIds(nodes[i], checkedNodes);
                                checkedNodes.push(nodes[i].id);
                            }

                            if (nodes[i].hasChildren) {
                                checkedNodeIds(nodes[i].children.view(), checkedNodes);
                            }
                        }
                    }

                    function getParentIds(node, checkedNodes) {
                        if (node.parent() && node.parent().parent() && checkedNodes.indexOf(node.parent().parent().id) == -1) {
                            getParentIds(node.parent().parent(), checkedNodes);
                            checkedNodes.push(node.parent().parent().id);
                        }
                    }

                    // show checked node IDs on datasource change
                    function onCheck() {
                        checkedNodes = [];
                        var treeView1 = $('#treeview1').data("kendoTreeView"),
                            message;
                        var treeView2 = $('#treeview2').data("kendoTreeView"),
                            message;
                        var treeView3 = $('#treeview3').data("kendoTreeView"),
                            message;

                        //console.log(treeView.dataSource.view());
                        //console.log(checkedNodes);

                        checkedNodeIds(treeView1.dataSource.view(), checkedNodes);
                        checkedNodeIds(treeView2.dataSource.view(), checkedNodes);
                        checkedNodeIds(treeView3.dataSource.view(), checkedNodes);
                    }

                }
            });


            $('#set_permission_btn').on('click', function () {

                if (checkedNodes) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-T<?php echo e(trans('file.OK')); ?>EN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var target = '<?php echo e(route('set_permission')); ?>';

                    $.ajax({
                        type: 'POST',
                        url: target,
                        data: {
                            checkedId: checkedNodes,
                            roleId: "<?php echo e($role->id); ?>",
                        },
                        success: function (data) {
                            console.log(data);
                            var html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                            }
                            if (data.error) {
                                html = '<div class="alert alert-danger">' + data.error + '</div>';
                            }
                            $('#form_result_permission').html(html).slideDown(100).delay(3000).slideUp(100);
                        }
                    });
                } else {
                    alert('<?php echo e(__('Please select atleast one checkbox')); ?>');
                }


            });

        });
    })(jQuery);
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/role/permission.blade.php ENDPATH**/ ?>