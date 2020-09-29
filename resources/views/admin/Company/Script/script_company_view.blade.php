<script>
$('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
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
            var status = '';
            if (data.company_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }

            $('#show_company_code').text(data.company_code);
            $('#show_customer_type_id').text(data.customer_type_id);
            $('#show_company_name_th').text(data.company_name_th);
            $('#show_company_name_en').text(data.company_name_en);
            $('#show_company_details').text(data.company_details);
            $('#show_company_email').text(data.company_email);
            $('#show_company_tax_id').text(data.company_tax_id);
            $('#show_company_address').text((data.company_address_no_th ? data.company_address_no_th : '')+' '+(data.company_address_building_th ? data.company_address_building_th : '')+' '+(data.company_address_road_th ? data.company_address_road_th : '')+' '+(data.company_address_alley_th ? data.company_address_alley_th : ''));
            $('#show_company_tel').text(data.company_tel);
            $('#show_company_phone').text(data.company_phone);
            $('#show_company_fax').text(data.company_fax);
            $('#show_company_status').text(status);

            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>