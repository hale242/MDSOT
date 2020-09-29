<script>
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
                // tableCompany.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/Company/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;

            var provinces_id = data.districts ? data.districts.provinces_id : '';
            var amphures_id = data.districts ? data.districts.amphures_id : '';

            var en_provinces_id = data.districts__en ? data.districts__en.provinces_id : '';
            var en_amphures_id = data.districts__en ? data.districts__en.amphures_id : '';


            $("#edit_company_code").val(data.company_code);
            $("#edit_company_branch").val(data.company_branch);
            if (data.company_branch_status == 'Y') {
                $('#edit_company_branch_status').prop('checked', true);
            } else {
                $('#edit_company_branch_status').prop('checked', false);
            }
            $("#edit_customer_type_id").val(data.customer_type_id).change();
            $("#edit_sale_team_sub_id").val(data.sale_team_sub_id).change();
            $("#edit_company_name_th").val(data.company_name_th);
            $("#edit_company_name_en").val(data.company_name_en);
            $("#edit_company_shot_name_th").val(data.company_shot_name_th);
            $("#edit_company_shot_name_en").val(data.company_shot_name_en);
            $("#edit_company_details").val(data.company_details);
            $("#edit_company_email").val(data.company_email);
            $("#edit_company_fax").val(data.company_fax);
            $("#edit_company_phone").val(data.company_phone);
            $("#edit_company_tel").val(data.company_tel);
            $("#edit_company_tax_id").val(data.company_tax_id);
            $("#edit_company_address_no_th").val(data.company_address_no_th);
            $("#edit_company_address_building_th").val(data.company_address_building_th);
            $("#edit_company_address_road_th").val(data.company_address_road_th);
            $("#edit_company_address_alley_th").val(data.company_address_alley_th);
            $('#edit_provinces_id').val(provinces_id).change();
            $('#amphures_selected').val(amphures_id);
            $('#districts_selected').val(data.districts_id);
            $('#edit_provinces_en_id').val(en_provinces_id).change();
            $('#amphures_en_selected').val(en_amphures_id);
            $('#districts_en_selected').val(data.en_districts_id);
            $("#edit_company_address_no_en").val(data.company_address_no_en);
            $("#edit_company_address_building_en").val(data.company_address_building_en);
            $("#edit_company_address_road_en").val(data.company_address_road_en);
            $("#edit_company_address_alley_en").val(data.company_address_alley_en);
            $("#edit_company_website").val(data.company_website);
            $("#edit_company_group_code").val(data.company_group_code);
            $("#edit_company_group_name").val(data.company_group_name);
            $('#company_black_list_' + data.company_black_list).prop('checked', true);
            if (data.company_black_list == 'Y') {
                $('#edit_OperationStatus').show();
            }
            $("#edit_company_black_list_comment").val(data.company_black_list_comment);
            $("#edit_company_buiss_type").val(data.company_buiss_type);
            $("#edit_company_acc_hart").val(data.company_acc_hart);
            $("#edit_company_acc_hart_name").val(data.company_acc_hart_name);
            $("#edit_company_bill_date").val(data.company_bill_date);
            $("#edit_company_pay_date").val(data.company_pay_date);
            $("#edit_company_ot_date_start").val(data.company_ot_date_start);
            $("#edit_company_ot_date_end").val(data.company_ot_date_end);

            if (data.company_status == 1) {
                $('#edit_company_status').prop('checked', true);
            } else {
                $('#edit_company_status').prop('checked', false);
            }
            $('#ModalEdit').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.select-province-edit', function() {
        var ele = $(this).closest('.address-edit');
        var province_id = $(this).val();
        ele.find('.select-amphur-edit').html('');
        ele.find('.select-district-edit').html('');

        if (province_id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/GetAmphurByProvince/" + province_id,
                dataType: 'json',
            }).done(function(res) {
                var html = '<option value="">เลือกอำเภอ</option>';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.amphures_id + '">' + v.amphures_name + '</option>';
                });
                ele.find('.select-amphur-edit').append(html);
                ele.find('.select-amphur-edit').select2('destroy').select2();
                var amphures_selected = $('#amphures_selected').val();
                if (amphures_selected > 0) {
                    $('#edit_amphur_id').val(amphures_selected).change();
                }

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('change', '.select-amphur-edit', function() {
        var ele = $(this).closest('.address-edit');
        var province_id = $(this).val();
        ele.find('.select-district-edit').html('');

        if (province_id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/GetDistrictByAmphur/" + province_id,
                dataType: 'json',
            }).done(function(res) {
                var html = '<option value="">เลือกตำบล</option>';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.districts_id + '">' + v.districts_name + '</option>';
                });
                ele.find('.select-district-edit').append(html);
                ele.find('.select-district-edit').select2('destroy').select2();
                var districts_selected = $('#districts_selected').val();
                if (districts_selected > 0) {
                    $('#edit_districts_id').val(districts_selected).change();
                }

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('change', '.select-province-en-edit', function() {
        var ele = $(this).closest('.address-en-edit');
        var province_id = $(this).val();
        ele.find('.select-amphur-en-edit').html('');
        ele.find('.select-district-en-edit').html('');

        if (province_id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/GetAmphurByProvince/" + province_id,
                dataType: 'json',
            }).done(function(res) {
                var html = '<option value="">เลือกอำเภอ</option>';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.amphures_id + '">' + v.amphures_name_en + '</option>';
                });
                ele.find('.select-amphur-en-edit').append(html);
                ele.find('.select-amphur-en-edit').select2('destroy').select2();
                var amphures_en_selected = $('#amphures_en_selected').val();
                if (amphures_en_selected > 0) {
                    $('#edit_amphur_en_id').val(amphures_en_selected).change();
                }
            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('change', '.select-amphur-en-edit', function() {
        var ele = $(this).closest('.address-en-edit');
        var province_id = $(this).val();
        ele.find('.select-district-en-edit').html('');

        if (province_id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/GetDistrictByAmphur/" + province_id,
                dataType: 'json',
            }).done(function(res) {
                var html = '<option value="">เลือกตำบล</option>';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.districts_id + '">' + v.districts_name_en + '</option>';
                });
                ele.find('.select-district-en-edit').append(html);
                ele.find('.select-district-en-edit').select2('destroy').select2();
                var districts_en_selected = $('#districts_en_selected').val();
                if (districts_en_selected > 0) {
                    $('#edit_districts_en_id').val(districts_en_selected).change();
                }
            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/Company/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableCompany.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>