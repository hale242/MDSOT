<script>
    $('body').on('click' , '.btn-approve-all' , function (){
        var driver_interview_id = [];
        $('.checkbox-table:checked').each(function() {
            driver_interview_id.push($(this).data('id'));
        });
        var btn = $(this);
        swal({
            title: "Are you sure?",
            text: "Do you want to approve a criminal / health examination?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/CheckCriminalHealth/ChangeApprove",
                    data: {
                        id : driver_interview_id,
                        approve : true,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        tableInterview.api().ajax.reload();
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

    $('body').on('click' , '.btn-approve' , function (){
        var id = $(this).data('id');
        var btn = $(this);
        swal({
            title: "Are you sure?",
            text: "Do you want to approve a criminal / health examination?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/CheckCriminalHealth/ChangeApprove",
                    data: {
                        id : id,
                        approve : true,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        tableInterview.api().ajax.reload();
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

    $('body').on('click' , '.btn-not-approve-all' , function (){
        var driver_interview_id = [];
        $('.checkbox-table:checked').each(function() {
            driver_interview_id.push($(this).data('id'));
        });
        var btn = $(this);
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/CheckCriminalHealth/ChangeApprove",
                    data: {
                        id : driver_interview_id,
                        approve : false,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        tableInterview.api().ajax.reload();
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


    $('body').on('click' , '.btn-not-approve' , function (){
        var id = $(this).data('id');
        var btn = $(this);
          swal({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          }).then((isConfirm) => {
            if (isConfirm) {
                loadingButton(btn);
                $.ajax({
                    method: "POST",
                    url: url_gb+"/admin/CheckCriminalHealth/ChangeApprove",
                    data: {
                        id : id,
                        approve : false,
                    }
                }).done(function(res){
                    resetButton(btn);
                    if(res.status==1){
                        swal(res.title,res.content,'success');
                        tableInterview.api().ajax.reload();
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
