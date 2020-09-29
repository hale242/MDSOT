<script>
    $('body').on('click', '.btn-contact-info', function(){
        var id = $(this).data('id');
        $('#contact_info_company_id').val(id);
        $('.btn-add-contact-info').data('id',id);
        $('#ModelContactInfo').modal('show');
        ContactInfoDatatable();
    });

    var contact_info_no = 0;
    function ContactInfoDatatable(){
        var tableContactInfo = $('#tableContactInfo').dataTable({
            "ajax": {
                "url": url_gb + "/admin/ContactInfo/Lists",
                "type":"POST", "data": function( d ) {
                    d.company_id = $('#contact_info_company_id').val();
                    d.page = 'C';
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
                    "data": "company_name_th",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "customer_name",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "customer_phone",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "customer_tel",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "customer_line",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "customer_fax",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "customer_email",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "address",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "billing_status",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "sale_team_main_name",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "sale_team_sub_name",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
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
        if(contact_info_no > 0){
            tableContactInfo.api().ajax.reload();
        }
        contact_info_no ++;
    }

    $('body').on('click', '.btn-add-contact-info', function(){
        var id = $(this).data('id');
        $('#add_company_id').val(id);
        $('#ModalAddContactInfo').modal('show');
        $('.customer_id_select').html('');

        if (id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/ContactInfo/GetContactInfo/" + id,
                dataType: 'json',
            }).done(function(res) {
                var html = '<option value="">เลือกผู้ติดต่อ</option>';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.customer_id + '">' + v.customer_name + '</option>';
                });
                $('.customer_id_select').append(html);
                $('.customer_id_select').select2('destroy').select2();
            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('change', '.customer_id_select', function() {
        var id = $(this).select2('val');
        if (id) {
            $.ajax({
                method: "Get",
                url: url_gb + "/admin/ContactInfo/" + id,
                dataType: 'json',
            }).done(function(res) {
                var data = res.content;

                $('#add_customer_districts_id').val(data.districts_id);
                $('#add_customer_code').val(data.customer_code);
                $('#add_customer_name').val(data.customer_name);
                $('#add_customer_phone').val(data.customer_phone);
                $('#add_customer_tel').val(data.customer_tel);
                $('#add_customer_line').val(data.customer_line);
                $('#add_customer_fax').val(data.customer_fax);
                $('#add_customer_email').val(data.customer_email);
                $('#add_customer_address').val(data.customer_address);
                $('#add_customer_address_no').val(data.customer_address_no);
                $('#add_customer_address_road').val(data.customer_address_road);
                $('#add_customer_address_alley').val(data.customer_address_alley);
                $('#add_customer_position').val(data.customer_position);
                $('#add_customer_department').val(data.customer_department);

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('submit', '#FormAddContactInfo', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/ContactInfo",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                ContactInfoDatatable();
                $('#ModalAddContactInfo').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.change-status-contact-info', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/ContactInfo/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // ContactInfoDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
