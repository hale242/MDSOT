<script>
    $('body').on('click', '.btn-send-back', function(){
        var id = $(this).data('id');
        var btn = $(this);
        $('#driver_interview_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/Interview/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            if(data.driver_interview_date_waiting){
                $('#add_driver_interview_date_waiting').val(data.driver_interview_date_waiting);
                $('#add_driver_interview_date_waiting').prop('disabled', false);
            }else{
                $('#add_driver_interview_date_waiting').prop('disabled', false);
            }
            $('#ModalSendback').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormSetSendBack', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#driver_interview_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/Interview/SetSendBack/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if(res.status==1){
                $('#ModalSendback').modal('hide');
                swal({
                    title: res.title,
                    text: res.content,
                    icon: "success",
                }).then(() => {
                    window.location = url_gb+'/admin/Interview';
                });
            }else{
                swal(res.title,res.content,'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
