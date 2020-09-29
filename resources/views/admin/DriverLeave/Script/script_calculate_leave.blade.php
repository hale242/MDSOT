<script>
    $('body').on('change', '.days-year, .days-left', function(){
        var ele = $(this);
        var max = ele.closest('.form-row').find('.days-year').val();
        ele.closest('.form-row').find('.days-left').prop('max', max);
    });
    
    $('body').on('change', '.select-leave-type', function(){
        var ele = $(this);
        if(ele.val()){
            ele.closest('.form-row').find('.select-driver').val('').change();
            ele.closest('.form-row').find('.days-year').val('');
            ele.closest('.form-row').find('.days-left').val('');
            ele.closest('.form-row').find('.days-left').removeAttr('max');
            ele.closest('.form-row').find('.select-driver').prop('disabled', false);
        }else{
            ele.closest('.form-row').find('.select-driver').val('').change();
            ele.closest('.form-row').find('.select-driver').prop('disabled', true);
        }
    });

    $('body').on('change', '.select-driver', function(){
        var ele = $(this);
        var leave_type_id = ele.closest('.form-row').find('.select-leave-type').val();
        var driver_id = ele.val();
        if(leave_type_id && driver_id){
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/DriverLeave/GetNumberLeave/"+driver_id,
                data: {
                    leave_type_id:leave_type_id,
                    driver_id:driver_id
                }
            }).done(function(res) {
                ele.closest('.form-row').find('.days-year').val(res);
                ele.closest('.form-row').find('.days-left').val(res);
                ele.closest('.form-row').find('.days-left').prop('max', res);
            }).fail(function(res) {
                swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
            });
        }
    });
</script>
