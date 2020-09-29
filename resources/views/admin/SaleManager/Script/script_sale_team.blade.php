<script>
    $('body').on('click', '.btn-sale-team', function(data) {
        var id = $(this).data('id');
        $('#sale_team_id').val(id);
        $('#ModalSaleTeam').modal('show');

        ManagerDatatable();
        // Table_Manager.api().ajax.reload();
    });

    var manager_no = 0;

    function ManagerDatatable() {
        var Table_Manager = $('#Table_Manager').dataTable({
            "ajax": {
                "url": url_gb + "/admin/ManagerLists/Lists",
                "type":"POST", "data": function( d ) {
                    d.team_id = $('#sale_team_id').val()
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
                    "data": "sale_team_main_name",
                    "name": "sale_team_main_name",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "manager",
                    "name": "manager",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "area",
                    "name": "area",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "sale_team_main_details",
                    "name": "sale_team_main_details",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "sale",
                    "name": "sale",
                    "searchable": false,
                    "sortable": false,
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
        if (manager_no > 0) {
            Table_Manager.api().ajax.reload();
        }
        manager_no++;
    }

    $('body').on('click', '.btn-sale-add-action', function(data) {
        var id = $(this).data('id');
        $('#add_user_sale_team_sub_id').val(id);
        $('#AddUserModal').modal('show');
        $('.select_add_user').html('');

        if (id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/SaleArea/GetAddUser/" + id,
                dataType: 'json',
            }).done(function(res) {
                var html = '';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.admin_id + '">' + v.first_name + ' ' + v.last_name + '</option>';
                });
                $('.select_add_user').append(html);
                $('.select_add_user').select2('destroy').select2();
            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('submit', '#FormAddUser', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#add_user_sale_team_sub_id').val();

        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "",
            url: url_gb + "/admin/SaleArea/AddUser/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal(res.title, res.content, 'success');
            form[0].reset();
            $('#AddUserModal').modal('hide');
            Table_SaleUser.api().ajax.reload();

        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.change-area-status', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/SaleManager/ChangeStatusArea/" + id,
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