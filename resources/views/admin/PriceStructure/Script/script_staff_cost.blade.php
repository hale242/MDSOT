<script>
    $('body').on('click','.btn-staff-cost',function(data){
        var id = $(this).data('id');
        $('#staff_cost_price_structure_id').val(id);
        $('#ModalStaffCost').modal('show');
        StaffCostDatatable();
    });

    $('body').on('click','.btn-edit-staff-cost',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#price_structure_has_staff_expenses_id').val(id);
        $('input[type=radio]').prop('checked', false);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/PriceStructureHasStaffExpense/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          var expenses_price = data.price_structure_has_staff_expenses_price ? data.price_structure_has_staff_expenses_price : 0;
          var expenses_price_sale = data.price_structure_has_staff_expenses_price_sale ? data.price_structure_has_staff_expenses_price_sale : 0;
          var expenses_price_limit = data.price_structure_has_staff_expenses_price_limit ? data.price_structure_has_staff_expenses_price_limit : 0;
          $("#add_staff_expenses_id").val(data.staff_expenses_id).change();
          $("#add_price_structure_has_staff_expenses_price_status").val(data.price_structure_has_staff_expenses_price_status).change();
          $("#add_price_structure_has_staff_expenses_price").val(addNumformat(expenses_price.toFixed(2)));
          $("#add_price_structure_has_staff_expenses_price_sale").val(addNumformat(expenses_price_sale.toFixed(2)));
          $("#add_price_structure_has_staff_expenses_price_limit").val(addNumformat(expenses_price_limit.toFixed(2)));
          $("#add_price_structure_has_staff_expenses_comment").val(data.price_structure_has_staff_expenses_comment);
          $("#add_price_structure_has_staff_expenses_comment").val(data.price_structure_has_staff_expenses_comment);
          $('#add_price_structure_has_staff_expenses_type_'+data.price_structure_has_staff_expenses_type).prop('checked', true);
          $('#add_price_structure_has_staff_expenses_type_cost_'+data.price_structure_has_staff_expenses_type_cost).prop('checked', true);
          if(data.price_structure_has_staff_expenses_price_status == 3){
              $('#add_price_structure_has_staff_expenses_price_limit').prop('readonly', false);
          }else{
              $('#add_price_structure_has_staff_expenses_price_limit').prop('readonly', true);
          }
          if(data.price_structure_has_staff_expenses_status == 1){
              $('#add_price_structure_has_staff_expenses_status').prop('checked', true);
          }else{
              $('#add_price_structure_has_staff_expenses_status').prop('checked', false);
          }
          $('#ModalStaffCost').modal('show');
        }).fail(function(res) {
          resetButton(btn);
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    var staff_cost_no = 0;
    function StaffCostDatatable(){
        var tableStaffCost = $('#tableStaffCost').dataTable({
            "ajax": {
                "url": url_gb+"/admin/PriceStructureHasStaffExpense/Lists",
                "type":"POST", "data": function ( d ) {
                    d.price_structure_id = $('#staff_cost_price_structure_id').val();
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "staff_expenses_name", "name":"staff_expenses.staff_expenses_name"},
                {"data" : "price_structure_has_staff_expenses_price", "searchable": false, "sortable": false},
                // {"data" : "price_structure_has_staff_expenses_price_sale", "searchable": false, "sortable": false},
                {"data" : "price_structure_has_staff_expenses_price_limit", "searchable": false, "sortable": false},
                {"data" : "price_structure_has_staff_expenses_price_status", "searchable": false, "sortable": false},
                {"data" : "price_structure_has_staff_expenses_type", "searchable": false, "sortable": false},
                {"data" : "price_structure_has_staff_expenses_type_cost", "searchable": false, "sortable": false},
                {"data" : "price_structure_has_staff_expenses_comment", "searchable": false, "sortable": false},
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
        if(staff_cost_no > 0){
            tableStaffCost.api().ajax.reload();
        }else{
            staff_cost_no++;
        }
    }

    $('body').on('submit', '#FormStaffCost', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#price_structure_has_staff_expenses_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: id ? "PUT" : "POST",
            url: id ? url_gb+"/admin/PriceStructureHasStaffExpense/"+id : url_gb+"/admin/PriceStructureHasStaffExpense",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#staff_cost_price_structure_id').val(res.price_structure_id);
                $('#add_staff_expenses_id').val('').change();
                $('#add_price_structure_has_staff_expenses_price_status').val('').change();
                StaffCostDatatable(0)
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-staff-cost',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/PriceStructureHasStaffExpense/ChangeStatus/"+id,
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


    $('body').on('change', '#add_price_structure_has_staff_expenses_price_status', function(){
        var status = $(this).val();
        if(status == 3){
            $('#add_price_structure_has_staff_expenses_price_limit').prop('readonly', false);
        }else{
            $('#add_price_structure_has_staff_expenses_price_limit').prop('readonly', true);
            $('#add_price_structure_has_staff_expenses_price_limit').val('');
        }
    });

    $('body').on('click', '.btn-cancel-staff-cost', function(){
        $('#price_structure_has_staff_expenses_id').val('');
        $('#add_staff_expenses_id').val('').change();
        $('#add_price_structure_has_staff_expenses_price_status').val('').change();
        $('#add_price_structure_has_staff_expenses_price').val('');
        $('#add_price_structure_has_staff_expenses_price_sale').val('');
        $('#add_price_structure_has_staff_expenses_price_limit').val('');
        $('#add_price_structure_has_staff_expenses_comment').val('');
        $('#add_price_structure_has_staff_expenses_status').prop('checked', true);
    });

</script>
