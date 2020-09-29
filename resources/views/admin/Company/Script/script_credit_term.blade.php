<script>
    $('body').on('click', '.btn-Credit', function(data) {
        var id = $(this).data('id');
        $('#credit_term_id').val(id);
        $('#btn-add_credit_term_id').data('id',id); //setter
        $('#ModalCreditTerm').modal('show');
        CreditTermDatatable();
    });

    var credit_no = 0;
    function CreditTermDatatable(){
        var tableCreditTerm = $('#tableCreditTerm').dataTable({
            "ajax": {
                "url": url_gb + "/admin/CreditTerm/Lists",
                "type":"POST", "data": function( d ) {
                    d.credit_term = $('#credit_term_id').val()
                }
            },
            "drawCallback": function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {
                    "data": "action",
                    "name": "action",
                    "searchable": false,
                    "sortable": false,
                    "class": "text-center"
                },
                {
                    "data": "DT_RowIndex",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "credit_term_amount",
                    "name": "credit_term_amount",
                    "class": "text-center"
                },
                {
                    "data": "credit_term_amount_price",
                    "name": "credit_term_amount_price",
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
        if(credit_no > 0){
            tableCreditTerm.api().ajax.reload();
        }
        credit_no++;
    }

    $('body').on('click', '.btn-addCredit', function(data) {
        var id = $(this).data('id');
        $('#add_credit_term_id').val(id);
        $('#credit_term_status').prop('checked', true);
        $('#ModalAddCredit').modal('show');
    });

    $('body').on('submit', '#FormCreditAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/CreditTerm",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                CreditTermDatatable();
                $('#ModalAddCredit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.change-credit-status', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/CreditTerm/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableCreditTerm.api().ajax.reload();
                CreditTermDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
