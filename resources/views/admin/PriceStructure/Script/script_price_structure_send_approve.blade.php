<script>
    $('body').on('click' , '.btn-approve' , function (){
        var id = $(this).data('id');
        var btn = $(this);
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/PriceStructure/SendApprove/"+id,
                    data: {
                        id : id,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        tablePriceStructure.api().ajax.reload();
                    }else{
                        swal(res.title,res.content,'error');
                    }
                }).fail(function(res){
                  resetButton(btn);
                  swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            }
        });
    });
</script>
