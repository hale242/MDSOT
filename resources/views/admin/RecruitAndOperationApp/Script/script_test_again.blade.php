<script>
    $('body').on('click', '.btn-test-again', function(){
        var id = $(this).data('id');
        var btn = $(this);
        $('#add_test_driver_interview_id').val(id);
        $("#ModalTestAgain").modal('show');
    });

    $('body').on('submit', '#FormTestAgain', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#add_test_driver_interview_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/RecruitAndOperationApp/SetComment/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableInterview.api().ajax.reload();
                $("#ModalTestAgain").modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
