<script>
    $('body').on('click', '.btn-view', function(data){
        var id = $(this).data('id');
        var quotation_id = $(this).data('quotation-id');
        $('#show_quantity_item').html('');
        // $('#quotation_id').val(quotation_id);
        // $('#quotation_pre_approve_details_id').val(id);
        if(id){
            var btn = $(this);
            loadingButton(btn);
            $.ajax({
              method: "GET",
              url: url_gb + "/admin/Quotation/" + id,
              data: {
                id: id
              }
            }).done(function(res) {
              resetButton(btn);
              var data = res.content;
              var quantity_item = '';
              $('#show_customer_name').text(data.quotation.customer.customer_name);
              $('#show_quotation_date_doc').text(data.quotation.quotation_date_doc);
              $('#show_quotation_full_code').text(data.quotation.quotation_full_code);
              $('#show_company_th').text(data.quotation.company.company_name_th);
              $('#show_addr_customer').text(data.quotation.customer.districts.districts_name);
              $('#show_email_customer').text(data.quotation.customer.customer_email);
              $('#show_phone_customer').text(data.quotation.customer.customer_phone);
              $('#show_quotation_title').text(data.quotation.quotation_title);
              $('#show_quotation_condition').html(data.quotation.quotation_condition);
              if(data.quotation.quotation_price_list_main.length > 0){
                $.each(data.quotation.quotation_price_list_main, function(k,v){
                    // var realtionship = ['', 'พี่', 'น้อง'];
                    quantity_item += '<tr>\
                        <td><label for="example-text-input" class="col-form-label">'+v.quotation_price_list_unit+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.quotation_price_list_price+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label"></label></td>\
                        <td><label for="example-text-input" class="col-form-label"></label></td>\
                        <td><label for="example-text-input" class="col-form-label"></label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.quotation_price_list_price+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.quotation_price_list_travel+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.quotation_price_list_accomadation+'</label></td>\
                    </tr>';
                });
            }else{
                quantity_item = '<tr><td colspan="9">ไม่พบข้อมูล</td></tr>';
            }
            $('#show_quantity_item').append(quantity_item);

            }).fail(function(res) {
              resetButton(form.find('button[type=submit]'));
              swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
            });
        }
        $('#ModalQuotationPreApproveView').modal('show');
    });
</script>