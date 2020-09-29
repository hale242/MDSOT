<script>
    $('body').on('change', '#holiday_calendar_year', function(){
        SubmitForm();
        var year = $('#holiday_calendar_year').find('option:selected').val();
        window.location.href = url_gb+"/admin/HolidayCalendar?year="+year;
    });

    function SubmitForm(){
        var year = $('#holiday_calendar_year').find('option:selected').val();
        $.ajax({
          method: "POST",
          url: url_gb+"/admin/HolidayCalendar",
          data: {
              year: year
          }
        }).done(function(res) {
            localtion.reload();
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    }

    $('body').on('click', '.btn-add', function(){
        var year = $('#holiday_calendar_year').val();
        $('#input_holiday_calendar_year').val(year);
        $('#add_holiday_calendar_year').val(year).change();
        $('#ModalAdd').modal('show');
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        var year = $('#holiday_calendar_year').find('option:selected').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/HolidayCalendar",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
              $('#ModalAdd').modal('hide');
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
