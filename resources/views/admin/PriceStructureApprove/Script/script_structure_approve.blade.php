<script>
    $('body').on('click','.btn-structure-approve',function(data){
        var id = $(this).data('id');
        var type = $(this).data('type');
        var title = '';
        $('#price_structure_approve_id').val(id);
        $('#type_approve').val(type);
        if(type == 'A'){
            title = 'Approve comment';
        }else if(type == 'R'){
            title = 'Reject comment';
        }else if(type == 'N'){
            title = 'Not approve comment';
        }
        $('#title_comment').text(title);
        $('#ModalStructureApprove').modal('show');
    });

    $('body').on('submit', '#FormStructureApprove', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#price_structure_approve_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb+"/admin/PriceStructureApprove/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tablePriceStructureApprove.api().ajax.reload();
                $('#ModalStructureApprove').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click','.btn-structure-approve-all',function(data){
        var price_structure_approve_id = [];
        var type = $(this).data('type');
        var title = '';
        if(type == 'A'){
            title = "Do you want to approve?";
        }else if(type == 'R'){
            title = "Do you want to reject?";
        }else if(type == 'N'){
            title = "Do you want to not approve?";
        }
        $('.checkbox-table:checked').each(function() {
            price_structure_approve_id.push($(this).data('id'));
        });
        var btn = $(this);
        swal({
            title: "Are you sure?",
            text: title,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/PriceStructureApprove/ChangeApprove",
                    data: {
                        id : price_structure_approve_id,
                        type : type,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        tablePriceStructureApprove.api().ajax.reload();
                    }else{
                        swal(res.title,res.content,'error');
                    }
                }).fail(function(res){
                  resetButton(form.find('button[type=submit]'));
                  swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            }
        });
    });
</script>
