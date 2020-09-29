<script>
    $('body').on('click', '.btn-equipment', function() {
        var id = $(this).data('id');
        var btn = $(this);
        $('#add_driver_equipment_id').val(id);
        $("#ModalEquipment").modal('show');
        EquipmentDatatable();
    });

    var pickup_equipment_no = 0;

    function EquipmentDatatable() {
        var tableEquipment = $('#tableEquipment').dataTable({
            "ajax": {
                "url": url_gb + "/admin/Equipment/Lists",
                "type":"POST", "data": function( d ) {
                    d.driver_id = $('#add_driver_equipment_id').val()
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
                    "sortable": false
                },
                {
                    "data": "working_equipment_name"
                },
                {
                    "data": "pickup_equipment_site"
                },
                {
                    "data": "pickup_equipment_count"
                },
                {
                    "data": "date"
                },
                {
                    "data": "pickup_equipment_comment"
                },
                {
                    "data": "action",

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
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                var SumAount = api
                    .column(3)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(0).footer()).html();
                $(api.column(1).footer()).html();
                $(api.column(2).footer()).html('Total');
                $(api.column(3).footer()).html(SumAount);

            },
            processing: true,
            serverSide: true,
        });
        if (pickup_equipment_no > 0) {
            tableEquipment.api().ajax.reload();
        }
        pickup_equipment_no++;

       
     
    }
    $('body').on('submit', '#FormEquipment', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Equipment",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                EquipmentDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.change-status-pickup-quipment', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Equipment/ChangeStatus/" + id,
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