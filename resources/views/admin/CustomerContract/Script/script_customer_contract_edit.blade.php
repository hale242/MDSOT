<script>
    $('body').on('click','.btn-edit',function(data){
        var id = $(this).data('id');
        var company_id = $(this).data('company-id');
        var btn = $(this);
        $('#edit_id').val(id);
        $('#edit_company_id').val(company_id).change();
        $('#customer_contract_company_id').val(company_id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/CustomerContract/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var company_bill_date = data.company ? data.company.company_bill_date : '';
            $('#edit_customer_contract_type_lang'+data.customer_contract_type_lang).prop('checked', true);
            $('#edit_customer_contract_status').val(data.customer_contract_status).change();
            $('#edit_customer_contract_date_approve').val(data.customer_contract_date_approve);
            if(data.customer_contract_status == 0){
                $('.customer_contract_full_code').addClass('hidden');
                $('.run_code_id').removeClass('hidden');
            }else{
                $('.customer_contract_full_code').removeClass('hidden');
                $('.run_code_id').addClass('hidden');
            }
            $('#edit_customer_contract_full_code').val(data.customer_contract_full_code);
            $('#edit_head_documents_id').val(data.head_documents_id).change();
            $('#edit_customer_contract_address').val(data.customer_contract_address);
            $('#edit_customer_contract_date_start').val(data.customer_contract_date_start);
            $('#edit_customer_contract_date_end').val(data.customer_contract_date_end);
            $('#edit_customer_contract_month').val(data.customer_contract_month);
            if(data.customer_contract_day_mon == 1){
                $('#edit_customer_contract_day_mon').prop('checked', true);
            }else{
                $('#edit_customer_contract_day_mon').prop('checked', false);
            }
            if(data.customer_contract_day_tue == 1){
                $('#edit_customer_contract_day_tue').prop('checked', true);
            }else{
                $('#edit_customer_contract_day_tue').prop('checked', false);
            }
            if(data.customer_contract_day_wed == 1){
                $('#edit_customer_contract_day_wed').prop('checked', true);
            }else{
                $('#edit_customer_contract_day_wed').prop('checked', false);
            }
            if(data.customer_contract_day_thu == 1){
                $('#edit_customer_contract_day_thu').prop('checked', true);
            }else{
                $('#edit_customer_contract_day_thu').prop('checked', false);
            }
            if(data.customer_contract_day_fri == 1){
                $('#edit_customer_contract_day_fri').prop('checked', true);
            }else{
                $('#edit_customer_contract_day_fri').prop('checked', false);
            }
            if(data.customer_contract_day_sat == 1){
                $('#edit_customer_contract_day_sat').prop('checked', true);
            }else{
                $('#edit_customer_contract_day_sat').prop('checked', false);
            }
            if(data.customer_contract_day_sun == 1){
                $('#edit_customer_contract_day_sun').prop('checked', true);
            }else{
                $('#edit_customer_contract_day_sun').prop('checked', false);
            }
            $('#edit_customer_contract_time_start').val(data.customer_contract_time_start);
            $('#edit_customer_contract_time_end').val(data.customer_contract_time_end);
            $('#edit_customer_contract_price').val(data.customer_contract_price);
            $('#edit_customer_contract_price_text').val(data.customer_contract_price_text);
            $('#edit_customer_contract_date_pay').val(data.customer_contract_date_pay);
            $('#edit_customer_contract_appendix_1').val(data.customer_contract_appendix_1);
            $('#edit_customer_contract_appendix_2').val(data.customer_contract_appendix_2);
            $('#edit_customer_contract_appendix_3').val(data.customer_contract_appendix_3);
            $('#edit_customer_contract_contractor_sign').val(data.customer_contract_contractor_sign);
            $('#edit_customer_contract_contractor_witness_1').val(data.customer_contract_contractor_witness_1);
            $('#edit_customer_contract_contractor_witness_2').val(data.customer_contract_contractor_witness_2);
            $('#edit_customer_contract_customer_sign').val(data.customer_contract_customer_sign);
            $('#edit_customer_contract_customer_witness_1').val(data.customer_contract_customer_witness_1);
            $('#edit_customer_contract_customer_witness_2').val(data.customer_contract_customer_witness_2);
            $('#edit_company_bill_date').val(company_bill_date);
            calculate_date(2,3);
            $('#ModalEdit').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/CustomerContract/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableCustomerWaitingContract.api().ajax.reload();
                tableCustomerContract.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    function calculate_date(action , changed){
        var ele = (action === 1) ? $('#ModalAdd') : $('#ModalEdit');
        var start_date = new Date(ele.find('.start_date').val());
        var end_date = new Date(ele.find('.end_date').val());
        var bill_date = new Date(ele.find('.bill_date').val());
        var date_amount = ele.find('.date_amount').val();
        ele.find('.date_amount').val('');
        if(start_date != ''){
            if(changed == 1){ // start date change
                ele.find('.end_date').val(formatDate(start_date.addDays(parseInt(date_amount))));
            }else if(changed == 2 && date_amount != ''){ // date amount change
                ele.find('.end_date').val(formatDate(start_date.addDays(parseInt(date_amount))));
            }else if(changed == 3 && end_date != '' && end_date >= start_date){ // end date change
                var diffTime = Math.abs(end_date-start_date);
                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                ele.find('.date_amount').val(diffDays);

                //  count month
                var monthsOfYear = [];
                for (var m = start_date; m <= end_date; m.setMonth(m.getMonth() + 1)) {
                    var mouths = formatDate(m);
                    mouths = mouths.split('-');
                    monthsOfYear.push(mouths);
                }
                var month_amount = 0;
                bill_date = formatDate(bill_date);
                bill_date = bill_date.split('-');
                start_date = formatDate(start_date);
                start_date = start_date.split('-');
                end_date = formatDate(end_date);
                end_date = end_date.split('-');
                var count = monthsOfYear.length;
                $.each(monthsOfYear, function(k,v){
                    if(k == 0){
                        if(start_date[2] < bill_date[2]){
                            month_amount = month_amount+1;
                        }
                    }else{
                        month_amount = month_amount+1;
                    }
                    if(k == (count-1) && end_date[2] >= bill_date[2]){
                        month_amount = month_amount+1;
                    }
                });
                ele.find('.month_amount').val(month_amount);
            }
        }
    }

    Date.prototype.addDays = function(days) { // add days function
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }

    function formatDate(date) { // change format date to y-m-d function
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }
</script>
