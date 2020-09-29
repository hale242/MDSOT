<script>
    $('body').on('click','.btn-interview-date',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#driver_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/JobRegister/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            if(data.driver_interview_date){
                $('#add_driver_interview_date').val(data.driver_interview_date);
                $('#add_driver_interview_date').prop('disabled', true);
                $('.btn-save-interview-date').prop('disabled', true);
            }else{
                $('#add_driver_interview_date').val('');
                $('#add_driver_interview_date').prop('disabled', false);
                $('.btn-save-interview-date').prop('disabled', false);
            }
            $('#ModalInterviewDate').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormInterviewDate', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#driver_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/JobRegister/SetInterviewDate/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableJobRegister.api().ajax.reload();
                $('#ModalInterviewDate').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
