<script>
    $('body').on('click','.btn-edit',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/HolidayCalendar/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          $("#edit_holiday_calendar_year").val(data.holiday_calendar_year).change();
          $("#edit_holiday_calendar_name").val(data.holiday_calendar_name);
          $("#edit_holiday_calendar_details").val(data.holiday_calendar_details);
          $("#edit_holiday_calendar_date").val(data.holiday_calendar_date);
          if(data.holiday_calendar_status == 1){
              $('#edit_holiday_calendar_status').prop('checked', true);
          }else{
              $('#edit_holiday_calendar_status').prop('checked', false);
          }
          $('#ModalEdit').modal('show');
        }).fail(function(res) {
          resetButton(form.find('button[type=submit]'));
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        var year = $('#holiday_calendar_year').find('option:selected').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb+"/admin/HolidayCalendar/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                $('#ModalEdit').modal('hide');
                swal({
                    title: res.title,
                    text: res.content,
                    icon: 'success'
                }).then(() => {
                    window.location = url_gb+'/admin/HolidayCalendar?year='+year;
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
