<script>
    $('body').on('click', '.btn-detail', function(data){
        var id = $(this).data('id');
        var quotation_id = $(this).data('quotation-id');
        $('#quotation_pre_approve_details_quotation_id').val(quotation_id);
        $('#quotation_pre_approve_details_id').val(id);
        if(id){
            var btn = $(this);
            loadingButton(btn);
            $.ajax({
              method: "GET",
              url: url_gb + "/admin/QuotationPreApproveDetails/" + id,
              data: {
                id: id
              }
            }).done(function(res) {
              resetButton(btn);
              var data = res.content;
              $('#add_quotation_pre_approve_details_name').val(data.quotation_pre_approve_details_name);
              $('#add_quotation_pre_approve_details_details').val(data.quotation_pre_approve_details_details);
              $('#add_quotation_pre_approve_details_pre_approve_code').val(data.quotation_pre_approve_details_pre_approve_code);
              $('#add_quotation_pre_approve_details_contract_code').val(data.quotation_pre_approve_details_contract_code);
              $('#add_quotation_pre_approve_details_date_send').val(data.quotation_pre_approve_details_date_send);
              $('#add_quotation_pre_approve_details_payment_date').val(data.quotation_pre_approve_details_payment_date);
              $('#add_quotation_pre_approve_details_invoice_date').val(data.quotation_pre_approve_details_invoice_date);
              $('#add_quotation_pre_approve_details_credit').val(data.quotation_pre_approve_details_credit);
              $('#add_quotation_pre_approve_details_remark').val(data.quotation_pre_approve_details_remark);
              $('#add_quotation_pre_approve_details_comment').html(data.quotation_pre_approve_details_comment);
            }).fail(function(res) {
              resetButton(form.find('button[type=submit]'));
              swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
            });
        }
        $('#ModalQuotationPreApproveDeatil').modal('show');
    });

    $('body').on('submit', '#FormQuotationPreApproveDetail', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#quotation_pre_approve_details_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: id ? "PUT" : "POST",
            url: id ? url_gb + "/admin/QuotationPreApproveDetails/"+id : url_gb + "/admin/QuotationPreApproveDetails",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#ModalQuotationPreApproveDeatil').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });


</script>
