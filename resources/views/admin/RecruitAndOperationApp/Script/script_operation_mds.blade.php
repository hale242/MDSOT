<script>
    $('body').on('click', '.btn-operation-mds', function(){
        var id = $(this).data('id');
        var btn = $(this);
        $('#add_operation_driver_interview_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/Interview/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $("#add_driver_interview_operation_status_"+data.driver_interview_operation_status).prop('checked', true);
            $("#add_driver_interview_operation_other_ch_"+data.driver_interview_operation_other_ch).prop('checked', true);
            $("#add_driver_interview_operation_other_ch_"+data.driver_interview_operation_other_ch).change();
            $('#add_driver_interview_operation_comment').val(data.driver_interview_operation_comment);
            $('#add_driver_interview_operation_other').val(data.driver_interview_operation_other);
            $('#add_driver_interview_operation_date').val(data.driver_interview_operation_date);
            $('#ModalOperationMDS').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormOperationMDS', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#add_operation_driver_interview_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/RecruitAndOperationApp/SetInterviewMDS/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableInterview.api().ajax.reload();
                $("#ModalOperationMDS").modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', 'input[type=radio][name=driver_interview_operation_other_ch]', function(){
        if($("#add_driver_interview_operation_other_ch_4").is(":checked")){
            $('#add_driver_interview_operation_other').prop('readonly', false);
        }else{
            $('#add_driver_interview_operation_other').val('');
            $('#add_driver_interview_operation_other').prop('readonly', true);
        }
    });
</script>
