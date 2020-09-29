<script>
    $('body').on('click','.btn-view-contract',function(data){
        var id = $(this).data('id');
        var btn = $(this);
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
            var company_name_th = data.company ? data.company.company_name_th : '';
            var customer_contract_price = data.customer_contract_price ? data.customer_contract_price : 0;
            $('#show_customer_contract_full_code').text(data.customer_contract_full_code);
            $('#show_customer_contract_date_start').text(data.format_customer_contract_date_start);
            $('#show_company_name').text(company_name_th);
            $('#show_customer_contract_address').text(data.customer_contract_address);
            $('#show_sum_unit').text(data.sum_unit);
            $('#show_customer_contract_month').text(data.customer_contract_month+' วัน');
            $('.show_customer_contract_date_start').text(data.format_customer_contract_date_start);
            $('#show_customer_contract_date_end').text(data.format_customer_contract_date_end);
            $('#show_customer_contract_time_start').text(data.customer_contract_time_start+' น.');
            $('#show_customer_contract_time_end').text(data.customer_contract_time_end+' น.');
            $('#show_customer_contract_price').text(addNumformat(customer_contract_price));
            $('#show_customer_contract_price_text').text('( '+data.customer_contract_price_text+' )');
            $('#show_customer_contract_date_pay').text(data.customer_contract_date_pay);
            if(data.customer_contract_contractor_sign){
                $('#show_customer_contract_contractor_sign').text('( '+data.customer_contract_contractor_sign+' )');
            }
            if(data.customer_contract_contractor_witness_1){
                $('#show_customer_contract_contractor_witness_1').text('( '+data.customer_contract_contractor_witness_1+' )');
            }
            if(data.customer_contract_contractor_witness_2){
                $('#show_customer_contract_contractor_witness_2').text('( '+data.customer_contract_contractor_witness_2+' )');
            }
            if(data.customer_contract_customer_sign){
                $('#show_customer_contract_customer_sign').text('( '+data.customer_contract_customer_sign+' )');
            }
            if(data.customer_contract_customer_witness_1){
                $('#show_customer_contract_customer_witness_1').text('( '+data.customer_contract_customer_witness_1+' )');
            }
            if(data.customer_contract_customer_witness_2){
                $('#show_customer_contract_customer_witness_2').text('( '+data.customer_contract_customer_witness_2+' )');
            }
            $('#print_contract_th').prop("href", url_gb+"/admin/CustomerContract/PrintContract/th/"+data.customer_contract_id);
            $('#print_contract_en').prop("href", url_gb+"/admin/CustomerContract/PrintContract/en/"+data.customer_contract_id);
            $('#ModalViewContract').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
