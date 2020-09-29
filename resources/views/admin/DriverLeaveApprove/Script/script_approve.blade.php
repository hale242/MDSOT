<script>
    $('body').on('click', '.btn-approve', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#driver_leave_approve_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/DriverLeaveApprove/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var driver_name = data.driver_name_th+' '+data.driver_lastname_th;
            $('#edit_driver_name').val(driver_name);
            $('#edit_driver_making_leave_start_date').val(data.driver_making_leave_start_date);
            $('#edit_driver_making_leave_end_date').val(data.driver_making_leave_end_date);
            $('#edit_driver_making_leave_type').val(data.driver_making_leave_type).change();
            $('#edit_driver_making_leave_count_date').val(data.driver_making_leave_count_date);
            $('#edit_driver_leave_approve_details').val(data.driver_leave_approve_details);
            $('#ModalApprove').modal('show');
        }).fail(function(res) {
            resetButton(btn);
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-sumbit-form', function(e) {
        var type = $(this).data('type');
        $('#approve_type').val(type);
    });

    $('body').on('submit', '#FormApprove', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#driver_leave_approve_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/DriverLeaveApprove/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableDriverLeaveApprove.api().ajax.reload();
                $('#ModalApprove').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
