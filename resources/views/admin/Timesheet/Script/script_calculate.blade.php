<script>
    $(document).ready(function(){
        calculateFooter();
        calculateSumOt();
    });

    $('body').on('change keyup', '.guarantee_ot_unit, .taxi_unit, .travel_allowance_unit, .accomadation_unit', function(){
        calculateFooter();
    });

    $('body').on('change', '.staff_expenses_unit', function(){
        var id = $(this).data('id');
        var num = $(this).val();
        var unit_old = $(this).closest('.row').find('.staff_expenses_unit_old').val();
        var total = 0;
        var price = $('#staff_expenses_price'+id).val();
        var unit = $('#staff_expenses_unit'+id).val();
        if(num > unit_old){
            if((num - parseInt(unit_old)) == 2){
                unit_old = parseInt(unit_old) + 1;
            }
            unit = parseInt(unit) + 1;
        }else{
            if(num > 0){
                unit = parseInt(unit) - 1;
                unit_old = parseInt(unit_old) - 1;
            }
        }
        total = parseInt(price) * unit;
        $('#staff_expenses_unit'+id).val(unit);
        $(this).closest('.row').find('.staff_expenses_unit_old').val(unit_old)
        $('#text_staff_expenses_unit'+id).text(addNumformat(unit));
        $('#staff_expenses_total'+id).val(addNumformat(total.toFixed(2)));
    });

    $('body').on('change', '.time_start, .time_end', function(){
        var ele = $(this);
        var time_start = ele.closest('tr').find('.time_start').val();
        var time_end = ele.closest('tr').find('.time_end').val();
        var date_text = ele.closest('tr').find('.date_text').val();
        var customer_contract_id = ele.closest('tr').find('.customer_contract_id').val();
        var driver_working_id = ele.closest('tr').find('.driver_working_id').val();
        var timesheet_contract_driver_id = ele.closest('tr').find('.timesheet_contract_driver_id').val();
        $('.before_ot'+timesheet_contract_driver_id).val('0.00');
        $('.after_ot'+timesheet_contract_driver_id).val('0.00');
        $('.total_ot'+timesheet_contract_driver_id).val('0.00');
        if(time_start && time_end && date_text && driver_working_id && customer_contract_id){
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/Timesheet/GetTimesheetContractDriverOt/"+customer_contract_id,
                data: {
                    driver_working_id : driver_working_id,
                    timesheet_contract_driver_id : timesheet_contract_driver_id,
                    time_start : time_start,
                    time_end : time_end,
                    date_text : date_text,
                }
            }).done(function(res) {
                if(res){
                    $.each(res, function(key,value){
                        $('#before_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val('0.00');
                        $('#after_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val('0.00');
                        $('#total_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val('0.00');
                        $.each(value.status, function(k_status,v_status){
                            var hour_b = 0;
                            var hour_a = 0;
                            $.each(v_status, function(k,v){
                                if(v.status == 'B'){
                                    hour_b = hour_b + parseFloat(v.hour);
                                }else if(v.status == 'A'){
                                    hour_a = hour_a + parseFloat(v.hour);
                                }
                            });
                            if(k_status == 'B'){
                                $('#before_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val(hour_b.toFixed(2));
                            }else if(k_status == 'A'){
                                $('#after_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val(hour_a.toFixed(2));
                            }
                        });

                        // total ot (before + after)
                        var before_ot = 0;
                        var after_ot = 0;
                        if($('#before_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val()){
                            before_ot = $('#before_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val();
                        }
                        if($('#after_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val()){
                            after_ot = $('#after_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val();
                        }
                        var total_ot = parseFloat(before_ot) + parseFloat(after_ot);
                        $('#total_ot'+value.price_structure_ot_id+'_'+value.timesheet_contract_driver_id).val(total_ot.toFixed(2));
                    });
                    setTimeout(function(){
                        calculateSumOt();
                        calculateFooter();
                    }, 1000);
                }else{
                    swal("โอ๊ะโอ! เกิดข้อผิดพลาด", "", 'error');
                }
            }).fail(function(res) {
                // swal("โอ๊ะโอ! เกิดข้อผิดพลาด", "", 'error');
            });
        }
    });

    function calculateSumOt(){
        $.each($('.price_structure_ot_id'), function(k,v){
            var sum_hour_ot = 0;
            var price_structure_ot_id = $(this).val();
            $.each($('.main_working_day'), function(k,v){
                var driver_working_id = $(this).data('driver-working-id');
                var sum_hour_ot_driver = 0;
                var sum_minute_ot_driver = 0;
                var sum_total_ot_driver = 0;
                var price_ot_driver = $('#price_ot_driver'+driver_working_id+'_'+price_structure_ot_id).val();
                $.each($('.sub_working_day'+driver_working_id), function(k,v){
                    var total_ot = 0;
                    if($(this).find('.total_ot'+price_structure_ot_id).val()){
                        var total_ot = $(this).find('.total_ot'+price_structure_ot_id).val();
                    }
                    sum_hour_ot_driver = sum_hour_ot_driver + parseFloat(total_ot);
                    sum_minute_ot_driver = (sum_hour_ot_driver * 60);
                    sum_price_ot_driver = (sum_hour_ot_driver * parseFloat(price_ot_driver));
                    $('#sum_hour_ot_driver'+driver_working_id+'_'+price_structure_ot_id).text(sum_hour_ot_driver.toFixed(2));
                    $('#sum_minute_ot_driver'+driver_working_id+'_'+price_structure_ot_id).text(sum_minute_ot_driver.toFixed(2));
                    $('#sum_price_ot_driver'+driver_working_id+'_'+price_structure_ot_id).val(sum_price_ot_driver.toFixed(2));
                });
                $.each($('.sum_price_ot_driver'+driver_working_id), function(k,v){
                    var price = 0;
                    if($(this).val()){
                        price = $(this).val();
                    }
                    sum_total_ot_driver = sum_total_ot_driver + parseFloat(price);
                });
                $('.sum_total_ot_driver'+driver_working_id).val(sum_total_ot_driver.toFixed(2));
                sum_hour_ot = sum_hour_ot + sum_hour_ot_driver;
            });
            $('#sum_hour_ot'+price_structure_ot_id).text(sum_hour_ot.toFixed(2));
        });
    }

    function calculateFooter(){
        $.each($('#list_working_days').find('.main_working_day'), function(k,v){
            var driver_working_id = $(this).data('driver-working-id');
            var taxi_price_sale = parseInt($('.taxi_price_sale'+driver_working_id).val());
            var travel_sale = parseInt($('.travel_sale'+driver_working_id).val());
            var accomadation_sale = parseInt($('.accomadation_sale'+driver_working_id).val());
            var guarantee_ot = parseInt($('.guarantee_ot'+driver_working_id).val());

            var sum_guarantee_ot_unit = 0;
            var sum_taxi_unit = 0;
            var sum_travel_allowance_unit = 0;
            var sum_accomadation_unit = 0;

            var sum_taxi_price = 0;
            var sum_travel_allowance_price = 0;
            var sum_accomadation_sale_price = 0;
            var sum_guarantee_ot_price = 0;

            var sum_total = 0;
            var sum_total_ot = 0;
            $.each($('#list_working_days').find('.sub_working_day'+driver_working_id), function(k_w,v_w){
                var taxi_unit = 0;
                var travel_allowance_unit = 0;
                var accomadation_unit = 0;
                var guarantee_ot_unit = 0;
                if($(this).find('.taxi_unit'+driver_working_id).val()){
                    var taxi_unit = $(this).find('.taxi_unit'+driver_working_id).val();
                }
                if($(this).find('.travel_allowance_unit'+driver_working_id).val()){
                    var travel_allowance_unit = $(this).find('.travel_allowance_unit'+driver_working_id).val();
                }
                if($(this).find('.accomadation_unit'+driver_working_id).val()){
                    var accomadation_unit = $(this).find('.accomadation_unit'+driver_working_id).val();
                }
                if($(this).find('.guarantee_ot_unit'+driver_working_id).val()){
                  var guarantee_ot_unit = $(this).find('.guarantee_ot_unit'+driver_working_id).val();
                }
                sum_taxi_unit = (parseInt(sum_taxi_unit) + parseInt(taxi_unit));
                sum_travel_allowance_unit = (parseInt(sum_travel_allowance_unit) + parseInt(travel_allowance_unit));
                sum_accomadation_unit = (parseInt(sum_accomadation_unit) + parseInt(accomadation_unit));
                sum_guarantee_ot_unit = (parseInt(sum_guarantee_ot_unit) + parseInt(guarantee_ot_unit));
            });

            // price/unit
            $('.text_taxi_price_sale'+driver_working_id).text(addNumformat(taxi_price_sale.toFixed(2)));
            $('.text_travel_sale'+driver_working_id).text(addNumformat(travel_sale.toFixed(2)));
            $('.text_accomadation_sale'+driver_working_id).text(addNumformat(accomadation_sale.toFixed(2)));
            $('.text_guarantee_ot'+driver_working_id).text(addNumformat(guarantee_ot.toFixed(2)));

            // unit
            $('.sum_taxi_unit'+driver_working_id).text(addNumformat(sum_taxi_unit));
            $('.sum_travel_allowance_unit'+driver_working_id).text(addNumformat(sum_travel_allowance_unit));
            $('.sum_accomadation_unit'+driver_working_id).text(addNumformat(sum_accomadation_unit));
            $('.sum_guarantee_ot_unit'+driver_working_id).text(addNumformat(sum_guarantee_ot_unit));

            // price * unit
            sum_taxi_price = (taxi_price_sale *  sum_taxi_unit);
            sum_travel_allowance_price = (travel_sale *  sum_travel_allowance_unit);
            sum_accomadation_sale_price = (accomadation_sale *  sum_accomadation_unit);
            sum_guarantee_ot_price = (guarantee_ot *  sum_guarantee_ot_unit);
            $('.sum_taxi_price'+driver_working_id).val(addNumformat(sum_taxi_price.toFixed(2)));
            $('.sum_travel_allowance_price'+driver_working_id).val(addNumformat(sum_travel_allowance_price.toFixed(2)));
            $('.sum_accomadation_sale_price'+driver_working_id).val(addNumformat(sum_accomadation_sale_price.toFixed(2)));
            $('.sum_guarantee_ot_price'+driver_working_id).val(addNumformat(sum_guarantee_ot_price.toFixed(2)));

            // sum price
            sum_total = sum_taxi_price + sum_travel_allowance_price + sum_accomadation_sale_price + sum_guarantee_ot_price;
            $('.sum_total'+driver_working_id).val(addNumformat(sum_total.toFixed(2)));

            var sum_net_total_driver = 0;
            $.each($('.sum_total_driver'+driver_working_id), function(k,v){
                var price = 0;
                if($(this).val()){
                    price = deleteNumformat($(this).val());
                }
                sum_net_total_driver = sum_net_total_driver + parseFloat(price);
            });
            $('#sum_net_total_driver'+driver_working_id).val(addNumformat(sum_net_total_driver.toFixed(2)));
        });
    }
</script>
