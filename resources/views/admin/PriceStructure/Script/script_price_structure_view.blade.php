<script>
    $('body').on('click','.btn-view',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#show_staff_cost_item').html('');
        $('#show_staff_cost_footer').html('');
        $('#show_other_expenses_item').html('');
        $('#show_other_expenses_footer').html('');
        $('#show_insurance_fee_item').html('');
        $('#show_insurance_fee_footer').html('');
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/PriceStructure/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var sale_price = data.price_structure_sale_price ? data.price_structure_sale_price : 0;
            var sum = data.price_structure_sum ? data.price_structure_sum : 0;
            var profit_price = data.price_structure_profit_price ? data.price_structure_profit_price : 0;
            var profit_percen = data.price_structure_profit_percen ? data.price_structure_profit_percen : 0;
            $('#show_price_structure_sale_price').text(addNumformat(sale_price.toFixed(2)));
            $('#show_price_structure_sum').text(addNumformat(sum.toFixed(2)));
            $('#show_price_structure_profit_price').text(addNumformat(profit_price.toFixed(2)));
            $('#show_price_structure_profit_percen').text(profit_percen+'%');

            // Staff cost
            var staff_cost_item = '';
            var staff_cost_footer = '';
            var sum_price = 0;
            var sum_price_sale = 0;
            var sum_price_limit = 0;
            $.each(data.price_structure_has_staff_expense, function(k,v){
                var staff_cost_name = v.staff_cost ? v.staff_cost.staff_expenses_name : '';
                var price = v.price_structure_has_staff_expenses_price ? v.price_structure_has_staff_expenses_price : 0;
                var price_sale = v.price_structure_has_staff_expenses_price_sale ? v.price_structure_has_staff_expenses_price_sale : 0;
                var price_limit = v.price_structure_has_staff_expenses_price_limit ? v.price_structure_has_staff_expenses_price_limit : 0;
                var comment = v.price_structure_has_staff_expenses_comment ? v.price_structure_has_staff_expenses_comment : '';
                var price_status = '';
                var status = '';
                if(v.price_structure_has_staff_expenses_price_status == 0){
                    price_status = 'แก้ไขไม่ได้';
                }else if(v.price_structure_has_staff_expenses_price_status == 1){
                    price_status = 'แก้ไขได้';
                }else if(v.price_structure_has_staff_expenses_price_status == 2){
                    price_status = 'แก้ไขได้แต่ต้องไม่ต่ำกว่าที่เป็นอยู่';
                }else if(v.price_structure_has_staff_expenses_price_status == 3){
                    price_status = 'แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนดs';
                }
                if(v.price_structure_has_staff_expenses_status == 1){
                    status = '<span class="badge badge-pill text-white font-medium badge-success label-rouded">Active</span>';
                }else{
                    status = '<span class="badge badge-pill text-white font-medium badge-danger label-rouded">No Active</span>';
                }
                staff_cost_item += '<tr>\
                                  <td scope="row">'+(k+1)+'</td>\
                                  <td>'+staff_cost_name+'</td>\
                                  <td align="right">'+addNumformat(price.toFixed(2))+'</td>\
                                  <td>'+price_status+'</td>\
                                  <td align="right">'+addNumformat(price_limit.toFixed(2))+'</td>\
                                  <td>'+comment+'</td>\
                                  <td align="center">'+status+'</td>\
                              </tr>';
                sum_price += price;
                sum_price_sale += price_sale;
                sum_price_limit += price_limit;
            });
            staff_cost_footer = '<tr>\
                                      <th colspan="2" class="text-right">รวม</th>\
                                      <th class="text-right">'+addNumformat(sum_price.toFixed(2))+'</th>\
                                      <th></th>\
                                      <th class="text-right">'+addNumformat(sum_price_limit.toFixed(2))+'</th>\
                                      <th colspan="2"></th>\
                                  </tr>';
            $('#show_staff_cost_item').append(staff_cost_item);
            $('#show_staff_cost_footer').append(staff_cost_footer);

            // Other expenses
            var other_expenses_item = '';
            var other_expenses_footer = '';
            var sum_price = 0;
            var sum_price_sale = 0;
            var sum_price_limit = 0;
            $.each(data.other_expense_has_staff_expense, function(k,v){
                var other_expenses_name = v.other_expenses ? v.other_expenses.other_expenses_name : '';
                var price = v.other_expenses_has_staff_expenses_price ? v.other_expenses_has_staff_expenses_price : 0;
                var price_sale = v.other_expenses_has_staff_expenses_price_sale ? v.other_expenses_has_staff_expenses_price_sale : 0;
                var price_limit = v.other_expenses_has_staff_expenses_price_limit ? v.other_expenses_has_staff_expenses_price_limit : 0;
                var comment = v.other_expenses_has_staff_expenses_comment ? v.other_expenses_has_staff_expenses_comment : '';
                var price_status = '';
                var status = '';
                if(v.other_expenses_has_staff_expenses_price_status == 0){
                    price_status = 'แก้ไขไม่ได้';
                }else if(v.other_expenses_has_staff_expenses_price_status == 1){
                    price_status = 'แก้ไขได้';
                }else if(v.other_expenses_has_staff_expenses_price_status == 2){
                    price_status = 'แก้ไขได้แต่ต้องไม่ต่ำกว่าที่เป็นอยู่';
                }else if(v.other_expenses_has_staff_expenses_price_status == 3){
                    price_status = 'แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนดs';
                }
                if(v.other_expenses_has_staff_expenses_status == 1){
                    status = '<span class="badge badge-pill text-white font-medium badge-success label-rouded">Active</span>';
                }else{
                    status = '<span class="badge badge-pill text-white font-medium badge-danger label-rouded">No Active</span>';
                }
                other_expenses_item += '<tr>\
                                  <td scope="row">'+(k+1)+'</td>\
                                  <td>'+other_expenses_name+'</td>\
                                  <td align="right">'+addNumformat(price.toFixed(2))+'</td>\
                                  <td>'+price_status+'</td>\
                                  <td align="right">'+addNumformat(price_limit.toFixed(2))+'</td>\
                                  <td>'+comment+'</td>\
                                  <td align="center">'+status+'</td>\
                              </tr>';
                sum_price += price;
                sum_price_sale += price_sale;
                sum_price_limit += price_limit;
            });
            other_expenses_footer = '<tr>\
                                      <th colspan="2" class="text-right">รวม</th>\
                                      <th class="text-right">'+addNumformat(sum_price.toFixed(2))+'</th>\
                                      <th></th>\
                                      <th class="text-right">'+addNumformat(sum_price_limit.toFixed(2))+'</th>\
                                      <th colspan="2"></th>\
                                  </tr>';
            $('#show_other_expenses_item').append(other_expenses_item);
            $('#show_other_expenses_footer').append(other_expenses_footer);

            // Insurance Fee
            var insurance_fee_item = '';
            var insurance_fee_footer = '';
            var sum_price = 0;
            var sum_price_limit = 0;
            $.each(data.insurance_fee_has_staff_expense, function(k,v){
                var insurance_fee_name = v.insurance_fee ? v.insurance_fee.insurance_fee_name : '';
                var price = v.insurance_fee_has_staff_expenses_price ? v.insurance_fee_has_staff_expenses_price : 0;
                var price_limit = v.insurance_fee_has_staff_expenses_price_limit ? v.insurance_fee_has_staff_expenses_price_limit : 0;
                var comment = v.insurance_fee_has_staff_expenses_comment ? v.insurance_fee_has_staff_expenses_comment : '';
                var price_status = '';
                var status = '';
                if(v.insurance_fee_has_staff_expenses_price_status == 0){
                    price_status = 'แก้ไขไม่ได้';
                }else if(v.insurance_fee_has_staff_expenses_price_status == 1){
                    price_status = 'แก้ไขได้';
                }else if(v.insurance_fee_has_staff_expenses_price_status == 2){
                    price_status = 'แก้ไขได้แต่ต้องไม่ต่ำกว่าที่เป็นอยู่';
                }else if(v.insurance_fee_has_staff_expenses_price_status == 3){
                    price_status = 'แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนดs';
                }
                if(v.insurance_fee_has_staff_expenses_status == 1){
                    status = '<span class="badge badge-pill text-white font-medium badge-success label-rouded">Active</span>';
                }else{
                    status = '<span class="badge badge-pill text-white font-medium badge-danger label-rouded">No Active</span>';
                }
                insurance_fee_item += '<tr>\
                                  <td scope="row">'+(k+1)+'</td>\
                                  <td>'+insurance_fee_name+'</td>\
                                  <td align="right">'+addNumformat(price.toFixed(2))+'</td>\
                                  <td>'+price_status+'</td>\
                                  <td align="right">'+addNumformat(price_limit.toFixed(2))+'</td>\
                                  <td>'+comment+'</td>\
                                  <td align="center">'+status+'</td>\
                              </tr>';
                sum_price += price;
                sum_price_limit += price_limit;
            });
            insurance_fee_footer = '<tr>\
                                      <th colspan="2" class="text-right">รวม</th>\
                                      <th class="text-right">'+addNumformat(sum_price.toFixed(2))+'</th>\
                                      <th></th>\
                                      <th class="text-right">'+addNumformat(sum_price_limit.toFixed(2))+'</th>\
                                      <th colspan="2"></th>\
                                  </tr>';
            $('#show_insurance_fee_item').append(insurance_fee_item);
            $('#show_insurance_fee_footer').append(insurance_fee_footer);

            // OT
            $('#show_price_structure_taxi_price').html('');
            $('#show_price_structure_travel').html('');
            $('#show_price_structure_accomadation').html('');
            for(i = 1; i <= 2; i++){
                $.each(res.PriceStructureOT, function(k,v){
                    var taxi_price = data.price_structure_taxi_price ? data.price_structure_taxi_price : 0;
                    var taxi_price_sale = data.price_structure_taxi_price_sale ? data.price_structure_taxi_price_sale : 0;
                    var travel = data.price_structure_travel ? data.price_structure_travel : 0;
                    var travel_sale = data.price_structure_travel_sale ? data.price_structure_travel_sale : 0;
                    var accomadation = data.price_structure_accomadation ? data.price_structure_accomadation : 0;
                    var accomadation_sale = data.price_structure_accomadation_sale ? data.price_structure_accomadation_sale : 0;
                    $('#show_ot_price_'+v.price_structure_ot_id+'_'+i).html('');
                    $('#show_price_structure_taxi_price_'+i).text(addNumformat(taxi_price.toFixed(2)));
                    $('#show_price_structure_travel_'+i).text(addNumformat(travel.toFixed(2)));
                    $('#show_price_structure_accomadation_'+i).text(addNumformat(accomadation.toFixed(2)));
                    $('#show_price_structure_taxi_price_sale_'+i).text(addNumformat(taxi_price_sale.toFixed(2)));
                    $('#show_price_structure_travel_sale_'+i).text(addNumformat(travel_sale.toFixed(2)));
                    $('#show_price_structure_accomadation_sale_'+i).text(addNumformat(accomadation_sale.toFixed(2)));
                });
                $.each(data.price_structure_ot_has_price_structure, function(k,v){
                    var price = v.price_structure_ot_has_price_structure_price ? v.price_structure_ot_has_price_structure_price : 0;
                    var price_sale = v.price_structure_ot_has_price_structure_price_sale ? v.price_structure_ot_has_price_structure_price_sale : 0;
                    $('#show_ot_price_'+v.price_structure_ot_id+'_'+i).text(addNumformat(price.toFixed(2)));
                    $('#show_ot_price_sale_'+v.price_structure_ot_id+'_'+i).text(addNumformat(price_sale.toFixed(2)));
                });
            }
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
