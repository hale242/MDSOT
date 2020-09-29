<script>
    $('body').on('click', '.btn-leave', function() {
        var id = $(this).data('id');
        var btn = $(this);
        $('#add_driver_leave_id').val(id);
        $("#ModalLeaveView").modal('show');
        DriverLeaveViewDatatable();

    });

    var driver_bank_account_no = 0;

    function DriverLeaveViewDatatable() {
        var tableDriverLeaveView = $('#tableDriverLeaveView').dataTable({
            "ajax": {
                "url": url_gb + "/admin/DriverLeave/Lists",
                "type":"POST", "data": function( d ) {
                    d.driver_id = $('#add_driver_leave_id').val()
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
                    "data": "leave_type_name",
                    "class": "text-center"
                },
                {
                    "data": "driver_leave_year",
                    "class": "text-center"
                },
                {
                    "data": "driver_leave_date_define",
                    "class": "text-center",
                },
                {
                    "data": "driver_leave_date_total",
                    "class": "text-center",
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
        if (driver_bank_account_no > 0) {
            tableDriverLeaveView.api().ajax.reload();
        }
        driver_bank_account_no++;
    }
   
</script>