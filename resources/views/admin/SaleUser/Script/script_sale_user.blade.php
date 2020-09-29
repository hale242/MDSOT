<script>
    $('body').on('click', '.btn-team-area', function(data) {
        var id = $(this).data('id');
        var btn = $(this);

        $('#admin_id').val(id);
        $('#ModalSaleAndTeam').modal('show');

        SaleTeamDatatable();
        // Table_SaleTeam.api().ajax.reload();
    });

    var sale_user_team_no = 0;

    function SaleTeamDatatable() {
        var Table_SaleTeam = $('#Table_SaleTeam').dataTable({
            "ajax": {
                "url": url_gb + "/admin/UserSaleTeam/Lists",
                "type":"POST", "data": function( d ) {
                    d.admin_id = $('#admin_id').val()
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
                },
                {
                    "data": "team",
                    "class": "text-center"
                },
                {
                    "data": "manager",
                    "class": "text-center"
                },
                {
                    "data": "area",
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
        if (sale_user_team_no > 0) {
            Table_SaleTeam.api().ajax.reload();
        }
        sale_user_team_no++;
    }
    $('body').on('change', '.change-status-sale', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/SaleUser/ChangeStatusSale/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableSaleUser.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>