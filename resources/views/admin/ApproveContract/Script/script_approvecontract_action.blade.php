<script>

    $(document).on('click','.btnApprove', function(){
        var customer_contract_id = $(this).data('customer_contract_id');
        $('#customer_contract_id_approve').val(customer_contract_id);
    });

    $(document).on('click','.btnReject', function(){
        var customer_contract_id = $(this).data('customer_contract_id');
        $('#customer_contract_id_cancel').val(customer_contract_id);
    });

    $('#frmApprove').submit(function(event){
        event.preventDefault();
        var param = $('#frmApprove').serializeArray();
        $.post(url_gb+'/admin/ApproveContract',{param},function(data){
            swal('Approve Success','ดำเนินการ Approve เรียบร้อย','success');
            $('#ApproveModal').modal('hide')
            ApproveContractTable.api().ajax.reload();
        });
    });

    $('#frmReject').submit(function(event){
        event.preventDefault();
        var param = $('#frmReject').serializeArray();
        $.post(url_gb+'/admin/ApproveContract',{param},function(data){
            swal('Reject Success','ดำเนินการ Reject เรียบร้อย','success');
            $('#CancelModal').modal('hide')
            ApproveContractTable.api().ajax.reload();
        });
    });

    $(document).on('click','.btnViewContract', function(){
        var customer_contract_id = $(this).data('customer_contract_id');
        $.get(url_gb+'/admin/ApproveContract/'+customer_contract_id,function(data){
            $('.productviewModalShow').html(data);
        });
    });




</script>
