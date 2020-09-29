<script>
    $('body').on('click','.btn-add-holiday',function(data){
        $('#ModalAddHoliday').modal('show');
    });

    $('body').on('click','.btn-edit-holiday',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_timesheet_holiday_calendar_id').val(id);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/TimesheetHolidayCalendar/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          $("#edit_timesheet_holiday_calendar_year").val(data.timesheet_holiday_calendar_year);
          $("#edit_timesheet_holiday_calendar_date").val(data.timesheet_holiday_calendar_date);
          $("#edit_timesheet_holiday_calendar_name").val(data.timesheet_holiday_calendar_name);
          $("#edit_timesheet_holiday_calendar_details").val(data.timesheet_holiday_calendar_details);
          if(data.timesheet_holiday_calendar_status == 1){
              $('#edit_timesheet_holiday_calendar_status').prop('checked', true);
          }else{
              $('#edit_timesheet_holiday_calendar_status').prop('checked', false);
          }
          $('#ModalEditHoliday').modal('show');
        }).fail(function(res) {
          resetButton(form.find('button[type=submit]'));
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormAddHoliday', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/TimesheetHolidayCalendar",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                $('#ModalAddHoliday').modal('hide');
                swal({
                    title: res.title,
                    text: res.content,
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEditHoliday', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_timesheet_holiday_calendar_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/TimesheetHolidayCalendar/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                $('#ModalEditHoliday').modal('hide');
                swal({
                    title: res.title,
                    text: res.content,
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
