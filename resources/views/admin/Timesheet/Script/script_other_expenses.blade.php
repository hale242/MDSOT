<script>
    $('body').on('click','.btn-other-expenses',function(data){
        var id = $(this).data('id');
        var quotation_price_list_id = $(this).data('quotation-price-list-id');
        $('#other_expenses_timesheet_contract_driver_id').val(id);
        $('.show-staff-expenses').html('');
        var btn = $(this);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/Timesheet/GetStaffExpenseByQuotationPriceList/" + quotation_price_list_id,
            data: {
                quotation_price_list_id: quotation_price_list_id,
                timesheet_contract_driver_id: id,
            }
        }).done(function(res) {
            resetButton(btn);
            var html = '';
            $.each(res, function(k,v){
                var price = v.timesheet_contract_driver_add_on_price ? v.timesheet_contract_driver_add_on_price : 0;
                html += '<div class="row">\
                            <input type="hidden" class="form-control" name="expenses['+k+'][staff_expenses_id]" value="'+v.staff_expenses_id+'" required />\
                            <input type="hidden" class="form-control" name="expenses['+k+'][price_structure_has_staff_expenses_id]" value="'+v.price_structure_has_staff_expenses_id+'" required />\
                            <div class="col-md-3 mb-2">\
                                <label for="" class="mt-4">'+v.staff_expenses_name+'</label>\
                            </div>\
                            <div class="col-md-4 mb-2">\
                                <label for="">Unit</label>\
                                <input type="number" min="0" class="form-control staff_expenses_unit" name="expenses['+k+'][timesheet_contract_driver_add_on_unit]" data-id="'+v.price_structure_has_staff_expenses_id+'" value="'+v.timesheet_contract_driver_add_on_unit+'" onkeydown="return false"/>\
                                <input type="hidden" min="0" class="form-control staff_expenses_unit_old" value="'+v.timesheet_contract_driver_add_on_unit+'" />\
                            </div>\
                            <div class="col-md-4 mb-2">\
                                <label for="">Price</label>\
                                <input type="text" class="form-control text-right" name="expenses['+k+'][timesheet_contract_driver_add_on_price]" value="'+addNumformat(price.toFixed(2))+'" readonly />\
                            </div>\
                        </div>';
            });
            $('.show-staff-expenses').append(html);
            $('#ModalOtherExpenses').modal({backdrop: 'static', keyboard: true, show: true});
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormTimesheetContractDriverAddOn', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Timesheet/InsertTimesheetContractDriverAddOn",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                $('#ModalOtherExpenses').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
