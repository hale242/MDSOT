<script>
    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/DriverMakingLeave/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $("#edit_driver_id").val(data.driver_id).change();
            $("#edit_driver_leave_line_branch_id").val(data.driver_leave_line_branch_id).change();
            $("#edit_leave_type_id").val(data.leave_type_id).change();
            $("#edit_driver_making_leave_type").val(data.driver_making_leave_type).change();
            $("#edit_driver_making_leave_start_date").val(data.driver_making_leave_start_date);
            $("#edit_driver_making_leave_end_date").val(data.driver_making_leave_end_date);
            $("#edit_driver_making_leave_count_date").val(data.driver_making_leave_count_date);
            $("#edit_driver_making_leave_name").val(data.driver_making_leave_name);
            $("#edit_driver_making_leave_details").val(data.driver_making_leave_details);
            $('#ModalEdit').modal('show');
        }).fail(function(res) {
            resetButton(btn);
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/DriverMakingLeave/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableDriverMakingLeave.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
