<script>
    $('body').on('click' , '.btn-send-pre-approve' , function (){
        var id = $(this).data('id');
        var detail_id = $(this).data('detail-id');
        var btn = $(this);
        swal({
            title: "Are you sure?",
            text:"You want send to Pre-approve?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/Quotation/SendPreApprove/"+id,
                    data: {
                        id : id,
                        quotation_pre_approve_details_id : detail_id,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        tableQuotation.api().ajax.reload();
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
