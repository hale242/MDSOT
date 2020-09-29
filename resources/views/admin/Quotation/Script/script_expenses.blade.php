<script>

    var select_expenses = '<option value="">----Select----</option>';
    @foreach($Expenses as $key=>$Expense)
        select_expenses += "<option disabled>{{$Expense['name']}}</option>";
        @foreach($Expense['expense'] as $val)
            select_expenses += "<option value='{{$val['id']}}' data-name='{{$val['name']}}' data-type='{{$key}}'>&nbsp;&nbsp;&nbsp;{{$val['name']}}</option>";
        @endforeach
    @endforeach
    $('body').on('click','.btn-add-expenses-item',function(data){
        var id_price_structure_item = $(this).data('item');
        var main_quotation_price_list_id = $(this).closest('.modal').find('.main_quotation_price_list_id').val();
        var id_expenses_item = $(this).closest('table').find('#expenses_other_item'+id_price_structure_item).find('tr').length;
        text_table = '<tr>';
        text_table += '		<td width="20%">';
        text_table += ' 		<div class="custom-control custom-checkbox mb-3">';
        text_table += ' 			<input type="checkbox" class="custom-control-input quotation_price_list_main_item" id="quotation_price_list_main_item_'+main_quotation_price_list_id+'_'+id_expenses_item+'" name="expenses['+id_expenses_item+'][quotation_price_list_main_item]" value="1" data-item-expenses="'+id_expenses_item+'">';
        text_table += ' 			<label class="custom-control-label" for="quotation_price_list_main_item_'+main_quotation_price_list_id+'_'+id_expenses_item+'">Main Item</label>';
        text_table += ' 		</div>';
        text_table += '		</td>';
        text_table += '		<td width="40%">';
        text_table += '			<select class="form-control custom-select expenses-select2 select_expenses_other" name="expenses['+id_expenses_item+'][expenses_id]" data-item="'+id_price_structure_item+'" data-expenses-item="'+id_expenses_item+'" required>';
        text_table +=           select_expenses
        text_table += '			</select>';
        text_table += '		</td>';
        text_table += '		<td width="40%">';
        text_table += '			<input type="text" class="form-control text-right price expenses_other_price" name="expenses['+id_expenses_item+'][quotation_price_list_price]" value="0.00">';
        text_table += '			<input type="hidden" class="expenses_other_type" name="expenses['+id_expenses_item+'][type]">';
        text_table += '		</td>';
        text_table += '		<td>';
        text_table += '			<button type="button" class="btn btn-circle btn-danger text-white btn-delete-expenses-item" data-item="'+id_price_structure_item+'" data-item-expenses="'+id_expenses_item+'">';
        text_table += '				<i class="fas fa-trash-alt"></i>';
        text_table += '			</button>';
        text_table += '		</td>';
        text_table += '	</tr>';
        id_expenses_item++;
        $('#expenses_other_item'+id_price_structure_item).append(text_table);
        $('.expenses-select2').select2();
        $('.price').priceFormat({
            prefix: '',
            suffix: ''
        });
    });

    $('body').on('keyup','.expenses_price',function(data){
        var ele = $(this).closest('tr');
        var id_price_structure_item = $(this).closest('.modal').find('.id_price_structure_item').val();
        var min = parseFloat($(this).attr('min'));
        var price = deleteNumformat($(this).val());
        var tr = $(this).closest('tbody').find('tr');
        var type = $(this).data('type');
        var sum_price = 0;
        if(parseFloat(price) < min){
            $(this).css('border-color', 'red');
            ele.find('.min_expenses_price').text('min '+addNumformat(min.toFixed(2)));
            ele.find('.min_expenses_price').addClass('text-danger');
        }else{
            $(this).css('border-color', '');
            ele.find('.min_expenses_price').text('');
        }
        $.each(tr, function(k,v){
            var price = 0;
            if($(this).find('.expenses_price').val()){
                price = deleteNumformat($(this).find('.expenses_price').val());
            }
            sum_price = sum_price + parseFloat(price);
        });
        if(type == "S"){
            $('#sum_expenses_staff_cost'+id_price_structure_item).text(addNumformat(sum_price.toFixed(2)));
        }else if(type == 'O'){
            $('#sum_expenses_other_expenses'+id_price_structure_item).text(addNumformat(sum_price.toFixed(2)));
        }else if(type == 'I'){
            $('#sum_expenses_insurance_fee'+id_price_structure_item).text(addNumformat(sum_price.toFixed(2)));
        }
    });

    $('body').on('keyup','.expenses_other_price',function(data){
        var id_price_structure_item = $(this).closest('table').find('.btn-add-expenses-item').data('item');
        var tr = $('#expenses_other_item'+id_price_structure_item).find('tr');
        var sum = 0;
        $.each(tr, function(k,v){
            var price = 0;
            if($(this).find('.expenses_other_price').val()){
                var price = deleteNumformat($(this).find('.expenses_other_price').val());
            }
            sum = sum + parseFloat(price);
        });
        $('#sum_expenses_other'+id_price_structure_item).val(addNumformat(sum.toFixed(2)));

        var ele = $(this).closest('tr');
        var main_no = $(this).closest('table').find('.btn-add-expenses-item').data('no');
        var id_expenses_item = ele.find('.quotation_price_list_main_item').data('item-expenses');
        if(ele.find('.quotation_price_list_main_item').is(':checked')){
            var price = $(this).val();
            $('#expenses_item'+main_no+'_'+id_expenses_item).find('.expenses_item_price').text(price);
        }
    });

    $('body').on('change','.quotation_price_list_main_item',function(data){
        var ele = $(this).closest('tr');
        var id_price_structure_item =$(this).closest('table').find('.btn-add-expenses-item').data('item');
        var id_expenses_item = $(this).data('item-expenses');
        var main_no = $(this).closest('table').find('.btn-add-expenses-item').data('no');
        var expenses_other_id = ele.find('.select_expenses_other').val();
        var expenses_other_name = ele.find('.select_expenses_other option:selected').data('name');
        var expenses_other_price = ele.find('.expenses_other_price').val();
        if(expenses_other_id){
            if($(this).is(":checked")){
                var sub_no = $('#body_expenses_item').find('.expenses_item'+main_no).length;
                sub_no = (sub_no+1);
                var html = '<tr class="expenses_item'+main_no+'" id="expenses_item'+main_no+'_'+id_expenses_item+'">\
                                <td class="expenses_item_no">'+main_no+'.'+sub_no+'</td>\
                                <td class="expenses_item_name">'+expenses_other_name+'</td>\
                                <td class="expenses_item_price text-right">'+expenses_other_price+'</td>\
                            </tr>';
                $('#body_expenses_item').append(html);

            }else{
                $('#body_expenses_item').find('#expenses_item'+main_no+'_'+id_expenses_item).remove();
                $.each($('.expenses_item'+main_no), function(k,v){
                    $(this).find('.expenses_item_no').text(main_no+'.'+(k+1));
                });
            }
        }else{
            $(this).prop('checked', false);
            swal("Alert", "Expenses	is required.", 'error');
        }
    });

    $('body').on('click','.btn-delete-expenses-item',function(data){
        var id_price_structure_item = $(this).data('item');
        var id_expenses_item = $(this).data('item-expenses');
        var main_no =$(this).closest('table').find('.btn-add-expenses-item').data('no');
        $('#body_expenses_item').find('#expenses_item'+main_no+'_'+id_expenses_item).remove();
        $('#expenses_other_item'+id_price_structure_item).find('#expenses_item'+main_no+'_'+id_expenses_item).remove();
        $(this).closest('tr').remove();

        var tr = $('#expenses_other_item'+id_price_structure_item).find('tr');
        var sum = 0;
        $.each(tr, function(k,v){
            var price = 0;
            if($(this).find('.expenses_other_price').val()){
                var price = deleteNumformat($(this).find('.expenses_other_price').val());
            }
            sum = sum + parseFloat(price);
        });
        $('#sum_expenses_other'+id_price_structure_item).val(addNumformat(sum.toFixed(2)));

        $.each($('.expenses_item'+main_no), function(k,v){
            $(this).find('.expenses_item_no').text(main_no+'.'+(k+1));
        });
    });

    $('body').on('change','.select_expenses_other',function(data){
        var ele = $(this).closest('tr');
        var type = $(this).find('option:selected').data('type');
        ele.find('.expenses_other_type').val(type);

        var main_no = $(this).closest('table').find('.btn-add-expenses-item').data('no');
        var id_expenses_item = ele.find('.quotation_price_list_main_item').data('item-expenses');
        var ele = $(this).closest('tr');
        if(ele.find('.quotation_price_list_main_item').is(':checked')){
            var name = $(this).find('option:selected').text();
            $('#expenses_item'+main_no+'_'+id_expenses_item).find('.expenses_item_name').text(name);
        }
    });
</script>
