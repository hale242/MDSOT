<script>
    $('body').on('click','.btn-cancel',function(data){
        var id = $(this).data('id');
        $('#cancel_customer_contract_id').val(id);
        $('#ModalCancel').modal('show');
    });

    $('body').on('submit', '#FormCancel', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#cancel_customer_contract_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/CustomerContract/Cancel/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableCustomerWaitingContract.api().ajax.reload();
                $('#ModalCancel').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click' , '.btn-cancel-all' , function (){
        var customer_contract_id = [];
        $('.checkbox-table:checked').each(function() {
            customer_contract_id.push($(this).data('id'));
        });
        var btn = $(this);
        swal({
            title: "Are you sure?",
            text: "Do you want to cancel?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/CustomerContract/Cancel",
                    data: {
                        id : customer_contract_id,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        tableCustomerContract.api().ajax.reload();
                    }else{
                        swal(res.title,res.content,'error');
                    }
                }).fail(function(res){
                  resetButton(form.find('button[type=submit]'));
                  swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            }
        });
    });
</script>
