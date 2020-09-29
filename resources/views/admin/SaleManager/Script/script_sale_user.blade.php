<script>
    $('body').on('click', '.btn-sale-user-action', function(data) {
        var id = $(this).data('id');
        $('#add_team_id').val(id);
        $('#ModalSaleUser').modal('show');
        SaleUserDatatable();
        // Table_SaleUser.api().ajax.reload();
    });

    var sale_user_no = 0;

    function SaleUserDatatable() {
        var Table_SaleUser = $('#Table_SaleUser').dataTable({
            "ajax": {
                "url": url_gb + "/admin/SaleUserLists/Lists",
                "type":"POST", "data": function( d ) {
                    d.team_id = $('#add_team_id').val()
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
                    "data": "sale",
                    "name": "sale",
                },
                {
                    "data": "first_name",
                    "name": "first_name",
                },
                {
                    "data": "last_name",
                    "name": "last_name",
                },
                {
                    "data": "gender_name",
                    "name": "gender_name",
                },
                {
                    "data": "email",
                    "name": "email",
                },
                {
                    "data": "action",
                    "name": "action",
                    "searchable": false,
                    "sortable": false,
                    "class": "text-center"
                }

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
        if (sale_user_no > 0) {
            Table_SaleUser.api().ajax.reload();
        }
        sale_user_no++;
    }

    $('body').on('change', '.change-sale-status', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/SaleManager/ChangeStatusSale/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableSaleManager.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>