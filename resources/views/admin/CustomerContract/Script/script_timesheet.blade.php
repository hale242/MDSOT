<script>
    $('body').on('click','.btn-timesheet',function(data){
        var id = $(this).data('id');
        $('#imesheet_customer_contract_id').val(id);
        $('#ModalTimesheet').modal('show');
        DriverWorkingDtatatable();
    });

    var driver_working_no = 0;
    function DriverWorkingDtatatable(){
        var tableDriverWorking = $('#tableDriverWorking').dataTable({
            "ajax": {
                "url": url_gb+"/admin/DriverWorking/Lists",
                "type":"POST", "data": function ( d ) {
                    d.customer_contract_id = $('#imesheet_customer_contract_id').val();
                    d.page = 'contract'
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "driver_name", "name":"driver.driver_name_th"},
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
        if(driver_working_no > 0){
            tableDriverWorking.api().ajax.reload();
        }else{
            driver_working_no++;
        }
    }
</script>
