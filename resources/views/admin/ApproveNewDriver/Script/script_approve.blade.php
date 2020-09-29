<script>
    $('body').on('click', '.btn-approve', function(){
        var id = $(this).data('id');
        var btn = $(this);
        $('#add_approve_driver_interview_id').val(id);
        $("#ModalApprove").modal('show');
    });

    $('body').on('submit', '#FormApprove', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#add_approve_driver_interview_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/ApproveNewDriver/SetComment/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableInterview.api().ajax.reload();
                $("#ModalApprove").modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click' , '.btn-approve-all' , function (){
        var driver_interview_id = [];
        $('.checkbox-table:checked').each(function() {
            driver_interview_id.push($(this).data('id'));
        });
        var btn = $(this);
        swal({
            title: "Approve",
            text: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/ApproveNewDriver/ChangeStatus",
                    data: {
                        id : driver_interview_id,
                        type : 'A',
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        tableInterview.api().ajax.reload();
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
