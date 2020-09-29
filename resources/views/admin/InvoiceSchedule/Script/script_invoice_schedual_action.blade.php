<script>
    $(function(){
        $(document).on('click', '.ViewSchedule', function(){
            var quotation_id = $(this).data('quotation_id');
            var DataViewScheduleModal = $('#DataViewScheduleModal').DataTable({
                ajax: {
                url: url_gb+"/admin/InvoiceSchedule/SaleorderLists",
                type:"POST", "data": function ( d ) {
                    d.quotation_id = quotation_id;
                }
                },
                drawCallback: function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                },
                retrieve: true,
                columns: [
                    {data : "DT_RowIndex", class:"text-center", searchable: false, sortable: false},
                    {data : "sale_order_list_code", class:"text-center"},
                    {data : "sale_order_list_details"},
                    {data : "sale_order_amount", class:"text-center"},
                    {data : "sale_order_discount", class:"text-center"},
                    {data : "sale_order_sub_total", class:"text-center"},
                    {data : "sale_order_date_start", class:"text-center"},
                    {data : "sale_order_date_end", class:"text-center"},
                    {data : "bill_status", class:"text-center"},
                    {data : "status", class:"text-center"},
                    {data : "action", class:"text-center"}
                ],
                select: true,
                // dom: 'Bfrtip',
                lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                columnDefs: [{
                className: 'noVis', visible: false
                }],
                processing: false,
                serverSide: false,
            });
        });

        // Update Bill Status all.
        $(document).on('change', '.SliBtnCreateInvoiceAll', function(){
            var slival = $(this).val();
            var sale_order_id = $(this).data('sale_order_id');
            $.post(url_gb+'/admin/InvoiceSchedule/Updatebillall', {id:sale_order_id, val:slival}, function(data){
                // console.log(data);
                if(data){
                    swal("Transaction Success", 'ปรับปรุงรายการเรี่ยบร้อยแล้ว', 'success');
                }
            });
        });

        // Update Bill Status / pcs.
        $(document).on('change', '.SliBtnCreateInvoice', function(){
            var slival = $(this).val();
            var sale_order_id = $(this).data('sale_order_id');
            $.post(url_gb+'/admin/InvoiceSchedule/Updatebill', {id:sale_order_id, val:slival}, function(data){
                // console.log(data);
                if(data){
                    swal("Transaction Success", 'ปรับปรุงรายการเรี่ยบร้อยแล้ว', 'success');
                }
            });
        });

        $(document).on('click', '.ViewInvoiceOrder', function(){
            var sale_order_id = $(this).data('sale_order_id');
            // alert(sale_order_id);
            var DataViewInvoiceOrder = $('#DataViewInvoiceOrder').DataTable({
                retrieve: true,
                processing: false,
                serverSide: false,
            });
        });
    });
</script>
