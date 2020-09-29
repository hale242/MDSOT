<script>
    $(document).on('click','.LineApprove', function(){
        $('.preloaderx').show();
        var quotation_id = $(this).data('quotation_id');
        var pre_approve_id = $(this).data('pre_approve_id');
        $.get(url_gb+'/admin/PreApprove/LineApprove',{id:quotation_id}, function(data){
            $('.timeline').html('');
            $.each(data, function(index, value){
                var html;
                var comment;
                if(value.quotation_pre_approve_status==1){
                    if(value.quotation_pre_approve_comment==null){ comment = ''; }else{ comment = value.quotation_pre_approve_comment; }
                    html =  '<li class="timeline-inverted timeline-item">'+
                                '<div class="timeline-badge success"><span class="font-18 font-weight-bold">'+ value.quotation_pre_approvec_lv +'</span></div>'+
                                    '<div class="timeline-panel">'+
                                        '<div class="timeline-heading">'+
                                            '<h4 class="timeline-title">'+ value.admin_user.position.position_name +'</h4>'+
                                            '<h5>Level ' + value.quotation_pre_approvec_lv + '</h5>'+
                                        '</div>'+
                                        '<div class="timeline-body">'+
                                            'Who can approve : '+ value.admin_user.first_name + ' ' + value.admin_user.last_name +' <br>'+
                                            'Time sent for approval : ' + value.quotation_pre_approve_date_send + '<br>'+
                                            'Approval time : '+ value.quotation_pre_approve_date_approve + //'<br>'+
                                            // 'Comment : '+ comment +
                                        '</div>'+
                                '</div>'+
                            '</li>';
                    $('.timeline').append(html);
                }else if(value.quotation_pre_approve_status==98){
                    if(value.quotation_pre_approve_comment==null){ comment = ''; }else{ comment = value.quotation_pre_approve_comment; }
                    html =  '<li class="timeline-inverted timeline-item mb-5 pb-5">'+
                                '<div class="timeline-badge gray"><span class="font-18 font-weight-bold">'+value.quotation_pre_approvec_lv+'</span></div>'+
                                '<div class="timeline-panel"><div class="timeline-heading">'+
                                    '<h4 class="timeline-title text-warning"><b>Reject...</b></h4>'+
                                    '<h5>Comment : '+ comment + '</h5>' +
                                '</div></div>'+
                            '</li>';
                    $('.timeline').append(html);
                }else{
                    html =  '<li class="timeline-inverted timeline-item mb-5 pb-5">'+
                                '<div class="timeline-badge gray"><span class="font-18 font-weight-bold">'+value.quotation_pre_approvec_lv+'</span></div>';
                    if(value.quotation_pre_approvec_lv==1){
                        html += '<div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">Wait for approve...</h4></div></div>';
                    }
                    html += '</li>';
                    $('.timeline').append(html);
                }
            });
            html = '<li class="timeline-inverted timeline-item mb-5 pb-5">'+
                        '<div class="timeline-badge info"><span class="font-12 font-weight-bold">Finish</span></div>'+
                    '</li>';
            $('.timeline').append(html);
            $('.preloaderx').fadeOut();
        });
    });
</script>
