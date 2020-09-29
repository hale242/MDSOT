<script>
    $('body').on('click', '.btn-book-bank', function() {
        var id = $(this).data('id');
        var btn = $(this);
        $('#add_driver_bank_id').val(id);
        $("#ModaBookBank").modal('show');
        DriverBookBankDatatable();
    });

    var driver_bank_account_no = 0;

    function DriverBookBankDatatable() {
        var tableDriverBookBank = $('#tableDriverBookBank').dataTable({
            "ajax": {
                "url": url_gb + "/admin/BookBank/Lists",
                "type":"POST", "data": function( d ) {
                    d.driver_id = $('#add_driver_bank_id').val()
                }
            },
            "drawCallback": function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [{
                    "data": "DT_RowIndex",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "driver_bank_type_name"
                },
                {
                    "data": "driver_bank_account_code"
                },
                {
                    "data": "driver_bank_account_name"
                },
                {
                    "data": "driver_bank_account_branch"
                },
                {
                    "data": "driver_bank_account_details"
                },
                {
                    "data": "file",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "action",
                    "name": "action",
                    "searchable": false,
                    "sortable": false,
                    "class": "text-center"
                },

            ],
            "select": true,
            "dom": 'Bfrtip',
            "lengthMenu": [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "columnDefs": [{
                className: 'noVis',
                visible: false
            }],
            "buttons": [
                'pageLength',
                'colvis',
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            processing: true,
            serverSide: true,
        });
        if (driver_bank_account_no > 0) {
            tableDriverBookBank.api().ajax.reload();
        }
        driver_bank_account_no++;
    }
    $('body').on('submit', '#FormBookBank', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/BookBank",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                DriverBookBankDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
    $('body').on('change', '.upload-file-account-file', function() {
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
            url: url_gb + '/admin/UploadFile/BookBankFile',
            type: 'POST',
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(res) {
                ele.closest('.form-upload-account-file').find('.upload-file-account-file').append('<input type="hidden" name="driver_bank_account_file_part" value="' + res.path + '">');
                setTimeout(function() {

                }, 100);
            }
        });
    });

    $('body').on('change', '.change-status-account-file', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/BookBank/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableLeaveType.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>