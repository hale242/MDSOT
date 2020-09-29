<script>
    $('body').on('click', '.btn-grouping-driver', function(data){
        var quotation_grouping_id = $(this).data('id');
        var quotation_id = $(this).data('quotation-id');
        $('#quotation_grouping_driver_quotation_grouping_id').val(quotation_grouping_id);
        $('#quotation_grouping_driver_quotation_id').val(quotation_id);
        $('#form_input_driver').html('');
        var btn = $(this);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/GetQuotationPriceListByGroupQuotation/"+quotation_id,
          data : {
              quotation_grouping_id:quotation_grouping_id
          }

        }).done(function(res) {
          resetButton(btn);
          var html = '';
          $.each(res, function(k,v){
              var checked ='';
              if(v.quotation_grouping_driver_status == 1){
                  checked = 'checked';
              }
              html += '<div class="col-md-6 mb-3">\
                          <div class="custom-control custom-checkbox">\
                              <input type="checkbox" class="custom-control-input" id="add_quotation_grouping_driver_price_structure_id'+k+'" name="quotation_grouping_driver['+k+'][price_structure_id]" value="'+v.price_structure_id+'" '+checked+'/>\
                              <label class="custom-control-label" for="add_quotation_grouping_driver_price_structure_id'+k+'">'+v.price_structure_name+'</label>\
                          </div>\
                      </div>\
                      <div class="col-md-2">\
                          <div class="form-group">\
                              <label class="control-label">Total</label>\
                              <input class="form-control" type="number" value="'+v.total+'" readonly/>\
                          </div>\
                      </div>\
                      <div class="col-md-2">\
                          <div class="form-group">\
                              <label class="control-label">Balance</label>\
                              <input class="form-control" type="number" value="'+v.balance+'" readonly/>\
                          </div>\
                      </div>\
                      <div class="col-md-2">\
                          <div class="form-group">\
                              <label class="control-label">Number of drivers</label>\
                              <input class="form-control" type="number" name="quotation_grouping_driver['+k+'][quotation_grouping_driver_num]" value="'+v.quotation_grouping_driver_num+'" max="'+v.balance+'"/>\
                          </div>\
                      </div>';
          });
          $('#form_input_driver').append(html);
          $('#ModalGroupingDriver').modal('show');
        }).fail(function(res) {
          resetButton(form.find('button[type=submit]'));
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormGroupingDriver', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#confirm_quotation_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/QuotationGrouping/QuotationGroupingDriverInsert",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#ModalGroupingDriver').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
