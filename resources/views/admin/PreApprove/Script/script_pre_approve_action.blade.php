<script>
    $(document).on('click','.btn-pre-approve', function(){
        var id = $(this).data('quotation_id');
        var lv = $(this).data('pre_approve_lv');
        $('#quotation_pre_approve_id').val(id);
        $('#quotation_pre_approve_lv').val(lv);
        $('#quotation_pre_approve_status').val(1);
        $('#quotation_pre_approve_comment').val('');
        $('.modal-title').text('Approve');
    });
    $(document).on('click','.btn-pre-reject', function(){
        var id = $(this).data('quotation_id');
        var lv = $(this).data('pre_approve_lv');
        $('#quotation_pre_approve_id').val(id);
        $('#quotation_pre_approve_lv').val(lv);
        $('#quotation_pre_approve_status').val(98);
        $('#quotation_pre_approve_comment').val('');
        $('.modal-title').text('Reject');
    });
    $(document).on('click','.btn-pre-notapprove', function(){
        var id = $(this).data('quotation_id');
        var lv = $(this).data('pre_approve_lv');
        $('#quotation_pre_approve_id').val(id);
        $('#quotation_pre_approve_lv').val(lv);
        $('#quotation_pre_approve_status').val(99);
        $('#quotation_pre_approve_comment').val('');
        $('.modal-title').text('Not Approve');
    });

    $('#submit_action').submit(function(e){
        event.preventDefault();
        var url = url_gb + '/admin/PreApprove/PreApproveAction';
        var frm = $(this).serialize();
        $.post(url,frm,function(data){
            if(data==1){
                $('#ActionModal').modal('hide');
                swal('Success','ดำเนินการเรียบร้อย','success');
                tableQuotationPreApprove.api().ajax.reload();
            }else{
                alert('Error !! เกิดข้อผิดพลาด ติดต่อผู้ดูแล');
            }
        });
    });

    $('.approve-all').click(function(){
        var size = $("input[name='preapprove']:checked").length;
        var url = url_gb + '/admin/PreApprove/PreApproveActionAll';
        if(size>0){
            var quotation_id = [];
            var quotation_lv = [];
            $.each($("input[name='preapprove']:checked"), function(){
                quotation_id.push($(this).data('quotation_id'));
                quotation_lv.push($(this).data('lv'));
            });
            $.post(url,{action:'1',lv:quotation_lv.join(","),qid:quotation_id.join(","),admin_id:$('#adminid').val()},function(data){
                swal('Approve Success','ดำเนินการ Approve เรียบร้อย','success');
                tableQuotationPreApprove.api().ajax.reload();
            });
        }else{
            swal("ไม่สามารถทำรายการได้", "กรุณาเลือกรายการอย่างน้อย 1 รายการ", 'error');
        }
    });

    $('.reject-all').click(function(){
        var size = $("input[name='preapprove']:checked").length;
        var url = url_gb + '/admin/PreApprove/PreApproveActionAll';
        if(size>0){
            var quotation_id = [];
            var quotation_lv = [];
            $.each($("input[name='preapprove']:checked"), function(){
                quotation_id.push($(this).data('quotation_id'));
                quotation_lv.push($(this).data('lv'));
            });
            $.post(url,{action:'98',lv:quotation_lv.join(","),qid:quotation_id.join(","),admin_id:$('#adminid').val()},function(data){
                swal('Reject Success','ดำเนินการ Reject เรียบร้อย','success');
                tableQuotationPreApprove.api().ajax.reload();
            });
        }else{
            swal("ไม่สามารถทำรายการได้", "กรุณาเลือกรายการอย่างน้อย 1 รายการ", 'error');
        }
    });

    $('.not-approve-all').click(function(){
        var size = $("input[name='preapprove']:checked").length;
        var url = url_gb + '/admin/PreApprove/PreApproveActionAll';
        if(size>0){
            var quotation_id = [];
            var quotation_lv = [];
            $.each($("input[name='preapprove']:checked"), function(){
                quotation_id.push($(this).data('quotation_id'));
                quotation_lv.push($(this).data('lv'));
            });
            $.post(url,{action:'99',lv:quotation_lv.join(","),qid:quotation_id.join(","),admin_id:$('#adminid').val()},function(data){
                swal('Not Approve Success','ดำเนินการ Not Approve เรียบร้อย','success');
                tableQuotationPreApprove.api().ajax.reload();
            });
        }else{
            swal("ไม่สามารถทำรายการได้", "กรุณาเลือกรายการอย่างน้อย 1 รายการ", 'error');
        }
    });

    $('.btn-search').click(function(){
        tableQuotationPreApprove.api().ajax.reload();
    });

    $('.btn-clear-search').click(function() {
        $('#admin_id').val('').change();
        $('#quotation_full_code').val('');
        $('#company_name_th').val('').change();
        $('#quotation_pre_approve_date_send').val('');
        $('#quotation_pre_approve_date_approve').val('');
        tableQuotationPreApprove.api().ajax.reload();
    });

    $(document).on('click','.btn-view-approve', function(){
        $('.preloader').show();
        var quotation_id = $(this).data('quotation_id');
        $.post(url_gb+'/admin/PreApprove/GetQuotation',{id:quotation_id, _token: $('meta[name="csrf-token"]').attr('content')}, function(data){
            $('.viewapproveModal-content').html(data);
            $('.preloader').fadeOut();
        });
    });

    $(document).on('click','.btn-view-quotation', function(){
        $('.preloader').show();
        var quotation_id = $(this).data('quotation_id');
        $.get(url_gb+'/admin/Quotation/PreApproveQuotationView/'+quotation_id, function(data){
            $('.viewquotationModal-content').html(data);
            $('.preloader').fadeOut();
        });
    });



</script>
