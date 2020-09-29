<script>

    $(document).on('click','.btnApprove', function(){
        var btn = $(this);
        loadingButton(btn);
        $('.ApproveModalShow').html(loadingani);

        var customer_contract_id = $(this).data('customer_contract_id');
        $.get(url_gb+'/admin/ApproveDriverRelease/'+customer_contract_id, function(data){
            $('.ApproveModalShow').html(data);
            resetButton(btn);
        })
    });


</script>
