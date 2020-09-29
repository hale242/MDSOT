<script>
    $('body').on('click','.btn-view-driver',function(data){
        var id = $(this).data('id');
        $('#view_driver_quotation_id').val(id);
        $('#ModalViewDriver').modal('show');
        BackOrderSpecDtatatable();
    });

    var back_order_spec_no = 0;
    function BackOrderSpecDtatatable(){
        var tableBackOrderSpec = $('#tableBackOrderSpec').dataTable({
            "ajax": {
                "url": url_gb+"/admin/BackOrderSpec/Lists",
                "type":"POST", "data": function ( d ) {
                    d.quotation_id = $('#view_driver_quotation_id').val();
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "name"},
                {"data" : "price_structure_name", "name":"price_structure.price_structure_name"},
                {"data" : "gender_name", "class":"text-center", "sortable": false},
                {"data" : "age", "class":"text-center", "sortable": false},
                {"data" : "area","class":"text-center", "sortable": false},
                {"data" : "amphures_name", "class":"text-center", "sortable": false},
                {"data" : "provinces_name", "class":"text-center", "sortable": false},
                {"data" : "language_ability", "searchable": false, "sortable": false},
                {"data" : "experience", "searchable": false, "sortable": false},
                {"data" : "smoking", "searchable": false, "sortable": false},
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
