<script>
    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);

        $('#admin_id').val(id);
        $('#ModalSaleAndTeamEdit').modal('show');
        SaleTeamEditDatatable();
        // Table_SaleTeamEdit.api().ajax.reload();
    });

    var sale_user_team_edit_no = 0;

    function SaleTeamEditDatatable() {
        var Table_SaleTeamEdit = $('#Table_SaleTeamEdit').dataTable({
            "ajax": {
                "url": url_gb + "/admin/UserSaleTeam/Lists",
                "type":"POST", "data": function( d ) {
                    d.admin_id = $('#admin_id').val();
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
                {
                    "data": "action",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
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
        if (sale_user_team_edit_no > 0) {
            Table_SaleTeamEdit.api().ajax.reload();
        }
        sale_user_team_edit_no++;
    }
</script>
