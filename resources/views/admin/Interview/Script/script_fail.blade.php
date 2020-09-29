<script>
    $('body').on('click' , '.btn-fail' , function (){
        var id = $(this).data('id');
        var btn = $(this);
        var step_no = $('#step_no').val();
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
                    url: url_gb+"/admin/Interview/SetFail/"+id,
                    data: {
                        id : id,
                        step_no : step_no
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal({
                            title: res.title,
                            text: res.content,
                            icon: 'success'
                        }).then(() => {
                            window.location = url_gb+'/admin/Interview';
                        });
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
