<script>
       $('body').on('click', '.btn-add', function(data) {
        $('#add_company_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('change', 'input[type=radio][name="company[company_black_list]"]', function(data) {
        if ($("#company_black_list1").is(":checked")) {
            $('#OperationStatus').hide();
        }
        if ($("#company_black_list2").is(":checked")) {
            $('#OperationStatus').show();
        }
        if ($("#company_black_list_N").is(":checked")) {
            $('#edit_OperationStatus').hide();
        }
        if ($("#company_black_list_Y").is(":checked")) {
            $('#edit_OperationStatus').show();
        }
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Company",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableCompany.api().ajax.reload();
                $('#ModalAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.select-province', function() {
        var ele = $(this).closest('.address');
        var province_id = $(this).val();
        ele.find('.select-amphur').html('');
        ele.find('.select-district').html('');

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
                ele.find('.select-amphur').append(html);
                ele.find('.select-amphur').select2('destroy').select2();

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('change', '.select-amphur', function() {
        var ele = $(this).closest('.address');
        var province_id = $(this).val();
        ele.find('.select-district').html('');

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
                ele.find('.select-district').append(html);
                ele.find('.select-district').select2('destroy').select2();

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('change', '.select-en-province', function() {
        var ele = $(this).closest('.address_en');
        var province_id = $(this).val();
        ele.find('.select-en-amphur').html('');
        ele.find('.select-en-district').html('');

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
                ele.find('.select-en-amphur').append(html);
                ele.find('.select-en-amphur').select2('destroy').select2();

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('change', '.select-en-amphur', function() {
        var ele = $(this).closest('.address_en');
        var province_id = $(this).val();
        ele.find('.select-en-districts').html('');

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
                ele.find('.select-en-districts').append(html);
                ele.find('.select-en-districts').select2('destroy').select2();

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });
</script>