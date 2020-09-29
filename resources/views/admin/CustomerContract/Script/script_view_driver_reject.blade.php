<script>
    $('body').on('click', '.btn-reject' , function (){
        var id = $(this).data('id');
        var btn = $(this);
        swal({
            title: "Are you sure?",
            text: "Do you want to reject?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/BackOrderSpec/BackOrderInterview/Reject/"+id,
                    data: {
                        id : id,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        BackOrderSpecDtatatable();
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
