<script>
    $('body').on('click','.btn-edit-timesheet',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_imesheet_contract_id').val(id);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/TimesheetContractDriver/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          $("#edit_timesheet_contract_driver_date").val(data.timesheet_contract_driver_date);
          $("#edit_timesheet_contract_driver_def_time_start").val(data.timesheet_contract_driver_def_time_start);
          $("#edit_timesheet_contract_driver_def_time_end").val(data.timesheet_contract_driver_def_time_end);
          $('#edit_timesheet_contract_driver_status_'+data.timesheet_contract_driver_status).prop('checked', true);
          $('#ModalEditTimesheet').modal('show');
        }).fail(function(res) {
          resetButton(form.find('button[type=submit]'));
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEditTimesheet', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_imesheet_contract_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/TimesheetContractDriver/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableTimesheetContractDriver.api().ajax.reload();
                $('#ModalEditTimesheet').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormTaxiPriceSetting', function(e) {
        e.preventDefault();
        var form = $(this);
        var customer_contract_id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/TimesheetContractDriver/UpdateTaxiPriceSetting/"+customer_contract_id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableTimesheetContractDriver.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
