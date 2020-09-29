<script>
    $('body').on('click','.btn-insurance-fee',function(data){
        var id = $(this).data('id');
        $('#insurance_fee_price_structure_id').val(id);
        $('#ModalInsuranceFee').modal('show');
        InsuranceFeeDatatable();
    });

    $('body').on('change', '.expenses_salary_type', function(){
        var type = $(this).val();
        $('#add_insurance_fee_has_staff_expenses_price').prop('readonly', true);
        $('#add_insurance_fee_has_staff_expenses_price').val('');
        $('#add_insurance_fee_has_staff_expenses_percent').prop('readonly', true);
        $('#add_insurance_fee_has_staff_expenses_percent').val('');
        $('#add_insurance_fee_has_staff_expenses_salary_max').prop('readonly', true);
        $('#add_insurance_fee_has_staff_expenses_salary_max').val('');
        $('#add_insurance_fee_has_staff_expenses_salary_min').prop('readonly', true);
        $('#add_insurance_fee_has_staff_expenses_salary_min').val('');
        $('#add_insurance_fee_has_staff_expenses_salary_df').prop('readonly', true);
        $('#add_insurance_fee_has_staff_expenses_salary_df').val('');
        if(type == 0){
            $('#add_insurance_fee_has_staff_expenses_price').prop('readonly', false);
        }else if(type == 1 || type == 5 || type == 6){
            $('#add_insurance_fee_has_staff_expenses_percent').prop('readonly', false);
        }else if(type == 2){
            $('#add_insurance_fee_has_staff_expenses_percent').prop('readonly', false);
            $('#add_insurance_fee_has_staff_expenses_salary_max').prop('readonly', false);
        }else if(type == 3){
            $('#add_insurance_fee_has_staff_expenses_percent').prop('readonly', false);
            $('#add_insurance_fee_has_staff_expenses_salary_min').prop('readonly', false);
        }else if(type == 4){
            $('#add_insurance_fee_has_staff_expenses_percent').prop('readonly', false);
            $('#add_insurance_fee_has_staff_expenses_salary_df').prop('readonly', false);
        }
    });

    $('body').on('click','.btn-edit-insurance-fee',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#insurance_fee_has_staff_expenses_id').val(id);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/InsuranceFeeHasStaffExpense/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          var expenses_price = data.insurance_fee_has_staff_expenses_price ? data.insurance_fee_has_staff_expenses_price : 0;
          var expenses_price_sale = data.insurance_fee_has_staff_expenses_price_sale ? data.insurance_fee_has_staff_expenses_price_sale : 0;
          var expenses_price_limit = data.insurance_fee_has_staff_expenses_price_limit ? data.insurance_fee_has_staff_expenses_price_limit : 0;
          var expenses_percent = data.insurance_fee_has_staff_expenses_percent ? data.insurance_fee_has_staff_expenses_percent : 0;
          var expenses_salary_max = data.insurance_fee_has_staff_expenses_salary_max ? data.insurance_fee_has_staff_expenses_salary_max : 0;
          var expenses_salary_min = data.insurance_fee_has_staff_expenses_salary_min ? data.insurance_fee_has_staff_expenses_salary_min : 0;
          var expenses_salary_df = data.insurance_fee_has_staff_expenses_salary_df ? data.insurance_fee_has_staff_expenses_salary_df : 0;
          $("#add_insurance_fee_id").val(data.insurance_fee_id).change();
          $("#add_insurance_fee_has_staff_expenses_price_status").val(data.insurance_fee_has_staff_expenses_price_status).change();
          $("#add_insurance_fee_has_staff_expenses_salary_type").val(data.insurance_fee_has_staff_expenses_salary_type).change();
          $("#add_insurance_fee_has_staff_expenses_price").val(addNumformat(expenses_price.toFixed(2)));
          $("#add_insurance_fee_has_staff_expenses_price_sale").val(addNumformat(expenses_price_sale.toFixed(2)));
          $("#add_insurance_fee_has_staff_expenses_price_limit").val(addNumformat(expenses_price_limit.toFixed(2)));
          $("#add_insurance_fee_has_staff_expenses_percent").val(expenses_percent);
          $("#add_insurance_fee_has_staff_expenses_salary_max").val(addNumformat(expenses_salary_max.toFixed(2)));
          $("#add_insurance_fee_has_staff_expenses_salary_min").val(addNumformat(expenses_salary_min.toFixed(2)));
          $("#add_insurance_fee_has_staff_expenses_salary_df").val(addNumformat(expenses_salary_df.toFixed(2)));
          $("#add_insurance_fee_has_staff_expenses_comment").val(data.insurance_fee_has_staff_expenses_comment);
          $("#add_insurance_fee_has_staff_expenses_calculate_cost_status_"+data.insurance_fee_has_staff_expenses_calculate_cost_status).prop('checked', true);
          if(data.insurance_fee_has_staff_expenses_price_status == 3){
              $('#add_insurance_fee_has_staff_expenses_price_limit').prop('readonly', false);
          }else{
              $('#add_insurance_fee_has_staff_expenses_price_limit').prop('readonly', true);
          }
          if(data.insurance_fee_has_staff_expenses_status == 1){
              $('#add_insurance_fee_has_staff_expenses_status').prop('checked', true);
          }else{
              $('#add_insurance_fee_has_staff_expenses_status').prop('checked', false);
          }
          $('#ModalInsuranceFee').modal('show');
        }).fail(function(res) {
          resetButton(btn);
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    var other_no = 0;
    function InsuranceFeeDatatable(){
        var tableInsuranceFee = $('#tableInsuranceFee').dataTable({
            "ajax": {
                "url": url_gb+"/admin/InsuranceFeeHasStaffExpense/Lists",
                "type":"POST", "data": function ( d ) {
                    d.price_structure_id = $('#insurance_fee_price_structure_id').val();
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "insurance_fee_name", "name":"insurance_fee.insurance_fee_name"},
                {"data" : "insurance_fee_has_staff_expenses_price", "searchable": false, "sortable": false},
                {"data" : "insurance_fee_has_staff_expenses_price_status", "searchable": false, "sortable": false},
                {"data" : "insurance_fee_has_staff_expenses_price_limit", "searchable": false, "sortable": false},
                {"data" : "insurance_fee_has_staff_expenses_percent", "searchable": false, "sortable": false},
                {"data" : "insurance_fee_has_staff_expenses_salary_max", "searchable": false, "sortable": false},
                {"data" : "insurance_fee_has_staff_expenses_salary_min", "searchable": false, "sortable": false},
                {"data" : "insurance_fee_has_staff_expenses_salary_df", "searchable": false, "sortable": false},
                {"data" : "insurance_fee_has_staff_expenses_comment", "searchable": false, "sortable": false},
                {"data" : "insurance_fee_has_staff_expenses_calculate_cost_status", "searchable": false, "sortable": false},
                {
                    "data" : "action" ,
                    "name" : "action",
                    "searchable": false,
                    "sortable": false,
                    "class" : "text-center"
                },

            ],
            "select": true,
            "dom": 'Bfrtip',
             "lengthMenu": [
                   [10, 25, 50, -1],
                   ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "columnDefs": [{
                className: 'noVis', visible: false
            }],
            "buttons": [
                  'pageLength',
                  'colvis',
                  {
                      extend: 'copy',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  {
                      extend: 'csv',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  {
                      extend: 'excel',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  {
                      extend: 'print',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  {
                      extend: 'pdf',
                      exportOptions: {
                          columns: ':visible'
                      }
                  }
            ],
            processing: true,
            serverSide: true,
        });
        if(other_no > 0){
            tableInsuranceFee.api().ajax.reload();
        }else{
            other_no++;
        }
    }

    $('body').on('submit', '#FormInsuranceFee', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#insurance_fee_has_staff_expenses_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: id ? "PUT" : "POST",
            url: id ? url_gb+"/admin/InsuranceFeeHasStaffExpense/"+id : url_gb+"/admin/InsuranceFeeHasStaffExpense",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#insurance_fee_price_structure_id').val(res.price_structure_id);
                $('#add_insurance_fee_id').val('').change();
                $('#add_insurance_fee_has_staff_expenses_price_status').val('').change();
                $('#add_insurance_fee_has_staff_expenses_price_limit').val('').change();
                $('#add_insurance_fee_has_staff_expenses_salary_type').val('').change();
                InsuranceFeeDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-insurance-fee',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/InsuranceFeeHasStaffExpense/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {

            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '#add_insurance_fee_has_staff_expenses_price_status', function(){
        var status = $(this).val();
        if(status == 3){
            $('#add_insurance_fee_has_staff_expenses_price_limit').prop('readonly', false);
        }else{
            $('#add_insurance_fee_has_staff_expenses_price_limit').prop('readonly', true);
            $('#add_insurance_fee_has_staff_expenses_price_limit').val('');
        }
    });

    // $('body').on('click', '.btn-cancel-staff-cost', function(){
    //     $('#insurance_fee_has_staff_expenses_id').val('');
    //     $('#insurance_fee_has_staff_expenses_id').val('').change();
    //     $('#add_insurance_fee_has_staff_expenses_price_status').val('').change();
    //     $('#add_insurance_fee_has_staff_expenses_price').val('');
    //     $('#add_insurance_fee_has_staff_expenses_price_sale').val('');
    //     $('#add_insurance_fee_has_staff_expenses_price_limit').val('');
    //     $('#add_insurance_fee_has_staff_expenses_comment').val('');
    //     $('#add_insurance_fee_has_staff_expenses_status').prop('checked', true);
    // });

</script>
