<script>
    $('body').on('click', '.btn-line-approve', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#item-line-apprive').html('');
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/DriverMakingLeave/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            var data = res.content;
            resetButton(btn);
            var html = '';
            $.each(data.driver_leave_approve, function(k,v){
                var color = 'gray';
                if(v.driver_leave_approve_status == 0){
                    status = 'รอส่งอนุมัติ';
                }else if(v.driver_leave_approve_status == 1){
                    status = 'รออนุมัติ';
                }else if(v.driver_leave_approve_status == 2){
                    color = 'success';
                    status = 'อนุมัติ';
                }else if(v.driver_leave_approve_status == 3){
                    status = 'ส่งกลับแก้ไข';
                }else if(v.driver_leave_approve_status == 8){
                    status = 'ยกเลิกการลา';
                }else if(v.driver_leave_approve_status == 9){
                    status = 'ไม่อนุมัติ';
                }
                var admin_name = v.admin_user ? v.admin_user.first_name+' '+v.admin_user.last_name : '-';
                var date_sent_approve = v.driver_leave_approve_date_sent_approve ? v.driver_leave_approve_date_sent_approve : '-';
                var date_approve = (v.updated_at && v.driver_leave_approve_status == 2) ? v.updated_at : '-';
                html += '<li class="timeline-inverted timeline-item">\
                            <div class="timeline-badge '+color+'"><span class="font-18 font-weight-bold">'+(k+1)+'</span></div>\
                            <div class="timeline-panel">\
                                <div class="timeline-heading">\
                                    <h4 class="timeline-title">Level '+v.driver_leave_approve_lv+'</h4>\
                                </div>\
                                <div class="timeline-body">\
                                    Who can approve : '+admin_name+'<br>\
                                    Time sent for approval : '+date_sent_approve+'<br />\
                                    Approval time : '+date_approve+'<br />\
                                    Status : '+status+'\
                                </div>\
                            </div>\
                        </li>';
            });
            $('#item-line-apprive').append(html);
            $('#ModalLineApprove').modal('show');
        }).fail(function(res) {
            resetButton(btn);
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
