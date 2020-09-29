<script>
    $('body').on('click','.btn-other-expenses',function(data){
        var id = $(this).data('id');
        $('#other_price_structure_id').val(id);
        $('#ModalOtherExpenses').modal('show');
        OtherExpensesDatatable();
    });

    $('body').on('click','.btn-edit-other-expenses',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#other_expenses_has_staff_expenses_id').val(id);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/OtherExpenseHasStaffExpense/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          var expenses_price = data.other_expenses_has_staff_expenses_price ? data.other_expenses_has_staff_expenses_price : 0;
          var expenses_price_sale = data.other_expenses_has_staff_expenses_price_sale ? data.other_expenses_has_staff_expenses_price_sale : 0;
          var expenses_price_limit = data.other_expenses_has_staff_expenses_price_limit ? data.other_expenses_has_staff_expenses_price_limit : 0;
          $("#add_other_expenses_id").val(data.other_expenses_id).change();
          $("#add_other_expenses_has_staff_expenses_price_status").val(data.other_expenses_has_staff_expenses_price_status).change();
          $("#add_other_expenses_has_staff_expenses_price").val(addNumformat(expenses_price.toFixed(2)));
          $("#add_other_expenses_has_staff_expenses_price_sale").val(addNumformat(expenses_price_sale.toFixed(2)));
          $("#add_other_expenses_has_staff_expenses_price_limit").val(addNumformat(expenses_price_limit.toFixed(2)));
          $("#add_other_expenses_has_staff_expenses_comment").val(data.other_expenses_has_staff_expenses_comment);
          $("#add_other_expenses_has_staff_expenses_comment").val(data.other_expenses_has_staff_expenses_comment);
          if(data.other_expenses_has_staff_expenses_price_status == 3){
              $('#add_other_expenses_has_staff_expenses_price_limit').prop('readonly', false);
          }else{
              $('#add_other_expenses_has_staff_expenses_price_limit').prop('readonly', true);
          }
          if(data.other_expenses_has_staff_expenses_status == 1){
              $('#add_other_expenses_has_staff_expenses_status').prop('checked', true);
          }else{
              $('#add_other_expenses_has_staff_expenses_status').prop('checked', false);
          }
          $('#ModalOtherExpenses').modal('show');
        }).fail(function(res) {
          resetButton(btn);
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    var other_no = 0;
    function OtherExpensesDatatable(){
        var tableOtherExpenses = $('#tableOtherExpenses').dataTable({
            "ajax": {
                "url": url_gb+"/admin/OtherExpenseHasStaffExpense/Lists",
                "type":"POST", "data": function ( d ) {
                    d.price_structure_id = $('#other_price_structure_id').val();
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "other_expenses_name", "name":"other_expenses.other_expenses_name"},
                {"data" : "other_expenses_has_staff_expenses_price", "searchable": false, "sortable": false},
                // {"data" : "other_expenses_has_staff_expenses_price_sale", "searchable": false, "sortable": false},
                {"data" : "other_expenses_has_staff_expenses_price_limit", "searchable": false, "sortable": false},
                {"data" : "other_expenses_has_staff_expenses_price_status", "searchable": false, "sortable": false},
                {"data" : "other_expenses_has_staff_expenses_comment", "searchable": false, "sortable": false},
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
            tableOtherExpenses.api().ajax.reload();
        }else{
            other_no++;
        }
    }

    $('body').on('submit', '#FormOtherExpenses', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#other_expenses_has_staff_expenses_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: id ? "PUT" : "POST",
            url: id ? url_gb+"/admin/OtherExpenseHasStaffExpense/"+id : url_gb+"/admin/OtherExpenseHasStaffExpense",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#other_price_structure_id').val(res.price_structure_id);
                $('#add_other_expenses_id').val('').change();
                $('#add_other_expenses_has_staff_expenses_price_status').val('').change();
                OtherExpensesDatatable(0)
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-other-expenses',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/OtherExpenseHasStaffExpense/ChangeStatus/"+id,
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


    $('body').on('change', '#add_other_expenses_has_staff_expenses_price_status', function(){
        var status = $(this).val();
        if(status == 3){
            $('#add_other_expenses_has_staff_expenses_price_limit').prop('readonly', false);
        }else{
            $('#add_other_expenses_has_staff_expenses_price_limit').prop('readonly', true);
            $('#add_other_expenses_has_staff_expenses_price_limit').val('');
        }
    });

    $('body').on('click', '.btn-cancel-staff-cost', function(){
        $('#other_expenses_has_staff_expenses_id').val('');
        $('#other_expenses_has_staff_expenses_id').val('').change();
        $('#add_other_expenses_has_staff_expenses_price_status').val('').change();
        $('#add_other_expenses_has_staff_expenses_price').val('');
        $('#add_other_expenses_has_staff_expenses_price_sale').val('');
        $('#add_other_expenses_has_staff_expenses_price_limit').val('');
        $('#add_other_expenses_has_staff_expenses_comment').val('');
        $('#add_other_expenses_has_staff_expenses_status').prop('checked', true);
    });

</script>
