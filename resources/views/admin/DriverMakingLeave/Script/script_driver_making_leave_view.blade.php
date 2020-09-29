<script>
    $('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
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
            var driver_name = data.driver ? data.driver.driver_name_th+' '+data.driver.driver_lastname_th : '';
            var branch_name = data.driver_leave_line_branch ? data.driver_leave_line_branch.driver_leave_line_branch_name : '';
            var leave_type_name = data.leave_type ? data.leave_type.leave_type_name : '';

            $('#show_driver_name').text(driver_name);
            $('#show_driver_leave_line_branch_name').text(branch_name);
            $('#show_leave_type_name').text(leave_type_name);
            $('#show_driver_making_leave_type').text(data.driver_making_leave_type_name);
            $('#show_driver_making_leave_start_date').text(data.format_driver_making_leave_start_date);
            $('#show_driver_making_leave_end_date').text(data.format_driver_making_leave_end_date);
            $('#show_driver_making_leave_count_date').text(data.driver_making_leave_count_date);
            $('#show_driver_making_leave_name').text(data.driver_making_leave_name);
            $('#show_driver_making_leave_details').text(data.driver_making_leave_details);
            $('#driver_making_leave_date_approve').text(data.format_making_leave_date_approve);
            $('#show_driver_making_leave_status').text(data.driver_making_leave_status_name);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(btn);
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
