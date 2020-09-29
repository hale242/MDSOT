<script>
    $( document ).ready(function() {
        Calculate();
    });

    $('body').on('change','#edit_quotation_vat',function(data){
        Calculate();
    });

    function Calculate(){
        var tr = $('#body_price_structure_item').find('tr');
        var sum_cost = 0;
        var sum_margin = 0;
        var total_margin = 0;
        var sum_total = 0;
        var vat_baht = 0;
        $.each(tr, function(k,v){
            var cost = 0;
            var margin = 0;
            if($(this).find('.price_structure_sum').val()){
                cost = deleteNumformat($(this).find('.price_structure_sum').val());
            }
            if($(this).find('.quotation_price_list_price').val()){
                margin = deleteNumformat($(this).find('.quotation_price_list_price').val());
            }
            sum_cost = sum_cost + parseFloat(cost);
            sum_margin = (sum_margin + parseFloat(margin));
            total_margin = sum_margin - sum_cost;
            sum_total = sum_margin;
        });
        if($('#edit_quotation_vat').is(":checked")){
            vat_baht = (total * 7) / 100;
        }
        sum_total = sum_total + vat_baht;
        $('#edit_quotation_cost').val(addNumformat(sum_cost.toFixed(2)));
        $('#edit_quotation_margin').val(addNumformat(total_margin.toFixed(2)));
        $('#edit_quotation_price').val(addNumformat(sum_total.toFixed(2)));
        $('#edit_quotation_vat_baht').val(vat_baht);
    }

    $('body').on('change', '.select_company_id', function(data) {
        var id = $(this).val();
        var ele = $(this).closest('.card-body');
        if(id){
            $.ajax({
              method: "GET",
              url: url_gb+"/admin/GetCustomerByCompany/"+id,
            }).done(function(res) {
              var html= '';
              $.each(res, function(k, v) {
                html += '<option value="'+v.customer_id+'">'+v.customer_name+'</option>';
              });
              ele.find('.select_customer_id').append(html);
            }).fail(function(res) {
              swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
            });
        }
    });
</script>
