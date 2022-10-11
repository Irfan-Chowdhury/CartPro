(function ($) {
    "use strict";

    $(document).ready(function () {
        let table = $('#dataListTable').DataTable({
            initComplete: function () {
                this.api().columns([1]).every(function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                        $('select').selectpicker('refresh');
                    });
                });
            },
            responsive: true,
            fixedHeader: {
                header: true,
                footer: true
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: dataTableURL,
            },

            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'tax_name',
                    name: 'tax_name',
                },
                {
                    data: 'country',
                    name: 'country',
                },
                {
                    data: 'is_active',
                    name: 'is_active',
                        render:function (data) {
                            if (data == '1') {
                            return "<span class='p-2 badge badge-success'>Active</span>";
                        }else{
                            return "<span class='p-2 badge badge-danger'>Inactive</span>";
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                }
            ],


            "order": [],
            'language': {
                'lengthMenu': `_MENU_ ${recordPerPage}`,
                "info": `${showing} _START_ - _END_ (_TOTAL_)`,
                "search": search,
                'paginate': {
                    'previous': previous,
                    'next': next
                }
            },
            'columnDefs': [
                {
                    "orderable": false,
                    'targets': [0],
                },
                {
                    'render': function (data, type, row, meta) {
                        if (type === 'display') {
                            data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                        }

                        return data;
                    },
                    'checkboxes': {
                        'selectRow': true,
                        'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                    },
                    'targets': [0]
                }
            ],


            'select': {style: 'multi', selector: 'td:first-child'},
            'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom: '<"row"lfB>rtip',
            buttons: [
                {
                    extend: 'pdf',
                    text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
                    exportOptions: {
                        columns: ':visible:Not(.not-exported)',
                        rows: ':visible'
                    },
                },
                {
                    extend: 'csv',
                    text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
                    exportOptions: {
                        columns: ':visible:Not(.not-exported)',
                        rows: ':visible'
                    },
                },
                {
                    extend: 'print',
                    text: '<i title="print" class="fa fa-print"></i>',
                    exportOptions: {
                        columns: ':visible:Not(.not-exported)',
                        rows: ':visible'
                    },
                },
                {
                    extend: 'colvis',
                    text: '<i title="column visibility" class="fa fa-eye"></i>',
                    columns: ':gt(0)'
                },
            ],
        });
        new $.fn.dataTable.FixedHeader(table);
    });

    // ------------ Edit ------------------
    $(document).on("click",".edit",function(e){
        e.preventDefault();
        var taxId = $(this).data("id");
        $.ajax({
            url: editURL,
            type: "GET",
            data: {tax_id:taxId},
            success: function(data){
                console.log(data);
                $('#tax_id').val(data.tax.id);
                $('#taxTranslationId').val(data.taxTranslation.id);
                $('#tax_class').val(data.taxTranslation.tax_class);
                $('#based_on').selectpicker('val',data.tax.based_on);
                $('#tax_name').val(data.taxTranslation.tax_name);
                $('#country').selectpicker('val',data.tax.country);
                $('#state').val(data.taxTranslation.state);
                $('#city').val(data.taxTranslation.city);
                $('#zip').val(data.tax.zip);
                $('#rate').val(data.tax.rate);
                if (data.tax.is_active==1) {
                    $('#is_active').attr('checked', true)
                }else{
                    $('#is_active').attr('checked', false)
                }
                $('#editFormModal').modal('show');
            }
        });
    });

})(jQuery);
