<script>
    $('body').on('click','.btn-cloc-kin-clock-out',function(data){
        var customer_contract_id = $(this).data('id');
        var quotation_id = $(this).data('quotation-id');
        var sale_order_id = $(this).data('sale-order-id');
        var sale_order_list_id = $(this).data('sale-order-list-id');
        $('#clock_in_clock_out_quotation_id').val(quotation_id);
        $('#clock_in_clock_out_sale_order_id').val(sale_order_id);
        $('#clock_in_clock_out_sale_order_list_id').val(sale_order_list_id);
        $('#ModalClockInClockOut').modal('show');
        BackOrderSpecDtatatable();
    });

    var back_order_spec_no = 0;
    function BackOrderSpecDtatatable(){
        var tableBackOrderSpec = $('#tableBackOrderSpec').dataTable({
            "ajax": {
                "url": url_gb+"/admin/BackOrderSpec/Lists",
                "type":"POST", "data": function ( d ) {
                    d.quotation_id = $('#clock_in_clock_out_quotation_id').val();
                    d.sale_order_id = $('#clock_in_clock_out_sale_order_id').val();
                    d.sale_order_list_id = $('#clock_in_clock_out_sale_order_list_id').val();
                    d.page = 'clock_in_clock_out';
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "driver_working_name", "searchable": false, "sortable": false},
                {"data" : "price_structure_name", "name":"price_structure.price_structure_name"},
                {"data" : "price_structure_name", "name":"price_structure.price_structure_name"},
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
        if(back_order_spec_no > 0){
            tableBackOrderSpec.api().ajax.reload();
        }else{
            back_order_spec_no++;
        }
    }
</script>
