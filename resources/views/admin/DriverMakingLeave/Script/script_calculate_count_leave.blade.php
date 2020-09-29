<script>
    $('body').on('change', '.making_leave_type, .making_leave_start_date, .making_leave_end_date', function(){
        var ele = $(this);
        calculate_count_leave(ele);
    });

    function calculate_count_leave(ele){
        var leave_type = ele.closest('.form-row').find('.making_leave_type').val();
        var date_start = ele.closest('.form-row').find('.making_leave_start_date').val();
        var count = 0;

        if(leave_type){
            ele.closest('.form-row').find('.making_leave_start_date').prop('readonly', false);
            if(leave_type == 1){
                ele.closest('.form-row').find('.making_leave_end_date').prop('readonly', false);
            }else{
                if(date_start){
                    ele.closest('.form-row').find('.making_leave_end_date').val('');
                }
                ele.closest('.form-row').find('.making_leave_end_date').val(date_start);
                ele.closest('.form-row').find('.making_leave_end_date').prop('readonly', true);
            }
            var date_end = ele.closest('.form-row').find('.making_leave_end_date').val();
            if(leave_type && date_start && date_end){
                date_start = new Date(date_start);
                date_end = new Date(date_end);
                count = Math.round((date_end- date_start)/(1000*60*60*24)) +1;
            }
            if(count >= 0){
                if(leave_type == 1){
                    ele.closest('.form-row').find('.making_leave_count_date').val(count);
                }else{
                    if(count > 0){
                        ele.closest('.form-row').find('.making_leave_count_date').val(0.5);
                    }
                }
            }else{
                swal("Alert", "รูปแบบการเลือกวันที่ไม่ถูกต้อง", 'error');
                ele.closest('.form-row').find('.making_leave_end_date').val(date_start);
            }
        }else{
            ele.closest('.form-row').find('.making_leave_start_date').prop('readonly', true);
            ele.closest('.form-row').find('.making_leave_end_date').prop('readonly', true);
            ele.closest('.form-row').find('.making_leave_start_date').val('');
            ele.closest('.form-row').find('.making_leave_end_date').val('');
            ele.closest('.form-row').find('.making_leave_count_date').val('');
        }
    }
</script>
