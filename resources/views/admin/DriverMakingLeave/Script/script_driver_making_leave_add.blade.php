<script>
    $('body').on('click', '.btn-add', function(data) {
        $('#add_name_prefix_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/DriverMakingLeave",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_driver_id').val('').change();
                $('#add_driver_leave_line_branch_id').val('').change();
                $('#add_leave_type_id').val('').change();
                $('#add_driver_making_leave_type').val('').change();
                tableDriverMakingLeave.api().ajax.reload();
                $('#ModalAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
