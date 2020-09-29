<script>
    $('body').on('keyup','.profit_percen',function(data){
        var num = $(this).val();
        if(num > 100){
            $(this).val(100);
        }
    });

    $('body').on('keyup','.price_structure_salary',function(data){
        var ele = $(this).closest('.form-body').find('.rate-ot-item > tr');
        var salary = 0;
        if($(this).val()){
            salary = parseFloat(deleteNumformat($(this).val()));
        }
        $.each(ele, function(k,v){
            var rate_ot = $(this).find('.structure_lv').val();
            if($(this).find('.structure_status').is(':checked') && $(this).find('.structure_status_ot').is(':checked')){
                var price = ((salary / 30) / 8) * rate_ot;
            }else{
                var price = 0;
            }
            $(this).find('.structure_price').val(addNumformat(price.toFixed(2)));
        })
    });

    $('body').on('keyup','.price_structure_sale_price',function(data){
        var ele = $(this).closest('.form-body').find('.rate-ot-item > tr');
        var sale_price = 0;
        if($(this).val()){
            sale_price = parseFloat(deleteNumformat($(this).val()));
        }
        $.each(ele, function(k,v){
            var rate_ot = $(this).find('.structure_lv').val();
            if($(this).find('.structure_status').is(':checked') && $(this).find('.structure_status_ot').is(':checked')){
                var price = ((sale_pricesalary / 30) / 8) * rate_ot;
            }else{
                var price = 0;
            }
            $(this).find('.structure_price_sale').val(addNumformat(sale_price.toFixed(2)));
        })
    });

    $('body').on('change','.structure_status_ot, .structure_status',function(){
        var ele = $(this);
        var salary = 0;
        var price = 0;
        var sale_price = 0;
        var rate_ot = ele.closest('tr').find('.structure_lv').val();
        if(ele.closest('.form-body').find('.price_structure_salary').val()){
          salary = parseFloat(deleteNumformat(ele.closest('.form-body').find('.price_structure_salary').val()));
        }
        if(ele.closest('.form-body').find('.price_structure_sale_price').val()){
          sale_price = parseFloat(deleteNumformat(ele.closest('.form-body').find('.price_structure_sale_price').val()));
        }
        if(ele.closest('tr').find('.structure_status_ot').is(':checked')){
            price = ((salary / 30) / 8) * rate_ot;
            sale_price = ((sale_price / 30) / 8) * rate_ot;
        }
        ele.closest('tr').find('.structure_price').val(addNumformat(price.toFixed(2)));
        ele.closest('tr').find('.structure_price_sale').val(addNumformat(sale_price.toFixed(2)));
    });
</script>
