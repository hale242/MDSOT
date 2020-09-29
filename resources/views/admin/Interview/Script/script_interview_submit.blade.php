<script>
    $('body').on('click', '.btn-submit', function(){
        var step_no = $('#step_no').val();
        var form_input_step = $('#form_input_step').val();
        if(step_no == 2){
            $('#form_input_step').val(1); //step 1
        }else if(step_no == 3){
            $('#form_input_step').val(2); //step 2
        }
        $('#consider').val(false);
        $('form#FormEdit').submit();
    });

    $('body').on('click', '.btn-approve', function(){
        $('#form_input_step').val(3); //step 3
        $('#consider').val(false);
        $('#ModalApprove').modal('show');
    });

    $('body').on('click', '.btn-submit-stap3', function(){
        var run_code_id = $('#add_run_code_id').val();
        if(run_code_id){
            $('#edit_run_code_id').val(run_code_id);
            $('form#FormEdit').submit();
        }else{
            swal("Alert", "Run code is required", 'warning');
        }
    });

    $('body').on('click', '.btn-consider', function(){
        $('#form_input_step').val(2); //step 2
        $('#consider').val(true);
        $('form#FormEdit').submit();
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_driver_interview_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb+"/admin/Interview/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            var personalities =  res.DriverInterview ? res.DriverInterview.driver_personality_test : '';
            var tests =  res.DriverInterview ? res.DriverInterview.driver_test_text_test : '';
            var drivers =  res.DriverInterview ? res.DriverInterview.driver_test_driver_test : '';
            if (res.status == 1) {
                if(res.step_no == 3){
                    $('#ModalApprove').modal('hide');
                    swal({
                        title: res.title,
                        text: res.content,
                        icon: 'success'
                    }).then(() => {
                        window.location = url_gb+'/admin/Interview';
                    });
                }else{
                    // swal(res.title, res.content, 'success');
                }
                $.each(personalities, function(k,v){
                    var personality_sum = v.driver_personality_test_sum;
                    var file = v.driver_personality_test_file_name;
                    $('#edit_driver_personality_id_'+v.driver_personality_id).val(v.driver_personality_id);
                    $('#edit_driver_personality_test_point_recrult_'+v.driver_personality_id).val(v.driver_personality_test_point_recrult);
                    $('#edit_driver_personality_test_point_operation_'+v.driver_personality_id).val(v.driver_personality_test_point_operation);
                    $('#edit_driver_personality_test_sum_'+v.driver_personality_id).val(personality_sum);
                    $('#edit_driver_personality_test_comment_'+v.driver_personality_id).val(v.driver_personality_test_comment);
                    if(file){
                        $('#edit_driver_personality_id_'+v.driver_personality_id).closest('tr').find('.btn-download').css('display', 'block');
                        $('#edit_driver_personality_id_'+v.driver_personality_id).closest('tr').find('.btn-download').attr('data-href', v.driver_personality_test_file_part);
                    }else{
                        $('#edit_driver_personality_id_'+v.driver_personality_id).closest('tr').find('.btn-download').css('display', 'none');
                    }
                });

                $.each(tests, function(k,v){
                    var test_sum = v.driver_test_text_test_sum;
                    var file = v.driver_test_text_test_file_name;
                    $('#edit_driver_test_text_id_'+v.driver_test_text_id).val(v.driver_test_text_id);
                    $('#edit_driver_test_text_test_point_recrult_'+v.driver_test_text_id).val(v.driver_test_text_test_point_recrult);
                    $('#edit_driver_test_text_test_point_operation_'+v.driver_test_text_id).val(v.driver_test_text_test_point_operation);
                    $('#edit_driver_test_text_test_sum_'+v.driver_test_text_id).val(test_sum);
                    $('#edit_driver_test_text_test_comment_'+v.driver_test_text_id).val(v.driver_test_text_test_comment);
                    if(file){
                        $('#edit_driver_test_text_id_'+v.driver_test_text_id).closest('tr').find('.btn-download').css('display', 'block');
                        $('#edit_driver_test_text_id_'+v.driver_test_text_id).closest('tr').find('.btn-download').attr('data-href', v.driver_test_text_test_file_part);
                    }else{
                        $('#edit_driver_test_text_id_'+v.driver_test_text_id).closest('tr').find('.btn-download').css('display', 'none');
                    }
                });

                $.each(drivers, function(k,v){
                    var driver_sum = v.driver_test_driver_test_sum;
                    var file = v.driver_test_driver_test_file_name;
                    $('#edit_driver_test_driver_id_'+v.driver_test_driver_id).val(v.driver_test_driver_id);
                    $('#edit_driver_test_driver_test_point_recrult_'+v.driver_test_driver_test_id).val(v.driver_test_driver_test_point_recrult);
                    $('#edit_driver_test_driver_test_point_operation_'+v.driver_test_driver_test_id).val(v.driver_test_driver_test_point_operation);
                    $('#edit_driver_test_driver_test_sum_'+v.driver_test_driver_test_id).val(driver_sum);
                    $('#edit_driver_test_driver_test_comment_'+v.driver_test_driver_test_id).val(v.driver_test_driver_test_comment);
                    if(file){
                        $('#edit_driver_test_driver_id_'+v.driver_test_driver_id).closest('tr').find('.btn-download').css('display', 'block');
                        $('#edit_driver_test_driver_id_'+v.driver_test_driver_id).closest('tr').find('.btn-download').attr('data-href', v.driver_test_driver_test_file_part);
                    }else{
                        $('#edit_driver_test_driver_id_'+v.driver_test_driver_id).closest('tr').find('.btn-download').css('display', 'none');
                    }
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
