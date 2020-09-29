<script>
    var passing_percen = $('#interview_percen_pass').val();
    // step 1
    function calculatePersonality(){
        var ele = $('#driver_personality_item');
        var sum_score = 0;
        var score = 0;
        var full_score = $('#full_score_p').val();
        $.each(ele.find('tr') , function(){
            var recrult = 0;
            var operation = 0;
            var max = 0;
            if($(this).find('.recrult').val()){
                recrult = parseFloat($(this).find('.recrult').val());
                max = parseFloat($(this).find('.recrult').attr('max'));
                if(recrult > max){
                    $(this).find('.recrult').val(max);
                    recrult = max;
                }
            }
            if($(this).find('.operation').val()){
                operation = parseFloat($(this).find('.operation').val());
                max = parseFloat($(this).find('.operation').attr('max'));
                if(operation > max){
                    $(this).find('.operation').val(max);
                    operation = max;
                }
            }
            var score = recrult+operation;
            $(this).find('.sum').val(score);
            sum_score += recrult+operation;
        });
        ele.closest('table').find('.input_sum_score').val(sum_score);
        ele.closest('table').find('.text_sum_score').html('คะแนนที่ได้: '+sum_score);
        var passing_score = (full_score * passing_percen) / 100;
        if(sum_score >= passing_score){
            ele.closest('table').find('.text_sum_score').removeClass('text-danger');
            ele.closest('table').find(".text_sum_score").addClass('text-success');
        }else{
            ele.closest('table').find(".text_sum_score").addClass('text-danger');
            ele.closest('table').find('.text_sum_score').removeClass('text-success');
        }
    }

    // step 2
    function calculateTest(){
        var ele = $('#driver_test_text_item');
        var sum_score = 0;
        var score = 0;
        var full_score = $('#full_score_t').val();
        $.each(ele.find('tr') , function(){
            var recrult = 0;
            var operation = 0;
            var max = 0;
            if($(this).find('.recrult').val()){
                recrult = parseFloat($(this).find('.recrult').val());
                max = parseFloat($(this).find('.recrult').attr('max'));
                if(recrult > max){
                    $(this).find('.recrult').val(max);
                    recrult = max;
                }
            }
            if($(this).find('.operation').val()){
                operation = parseFloat($(this).find('.operation').val());
                max = parseFloat($(this).find('.operation').attr('max'));
                if(operation > max){
                    $(this).find('.operation').val(max);
                    operation = max;
                }
            }
            var score = recrult+operation;
            $(this).find('.sum').val(score);
            sum_score += recrult+operation;
        });
        ele.closest('table').find('.input_sum_score').val(sum_score);
        ele.closest('table').find('.text_sum_score').html('คะแนนที่ได้: '+sum_score);
        var passing_score = (full_score * passing_percen) / 100;
        if(sum_score >= passing_score){
            ele.closest('table').find('.text_sum_score').removeClass('text-danger');
            ele.closest('table').find(".text_sum_score").addClass('text-success');
            $('.btn-consider').prop('disabled', true);
        }else{
            ele.closest('table').find(".text_sum_score").addClass('text-danger');
            ele.closest('table').find('.text_sum_score').removeClass('text-success');
            $('.btn-consider').prop('disabled', false);
        }
    }

    // step 3
    function calculateDriver(){
        var ele = $('#driver_test_item');
        var sum_score = 0;
        var score = 0;
        var full_score = $('#full_score_d').val();
        $.each(ele.find('tr') , function(){
            var recrult = 0;
            var operation = 0;
            var max = 0;
            if($(this).find('.recrult').val()){
                recrult = parseFloat($(this).find('.recrult').val());
                max = parseFloat($(this).find('.recrult').attr('max'));
                if(recrult > max){
                    $(this).find('.recrult').val(max);
                    recrult = max;
                }
            }
            if($(this).find('.operation').val()){
                operation = parseFloat($(this).find('.operation').val());
                max = parseFloat($(this).find('.operation').attr('max'));
                if(operation > max){
                    $(this).find('.operation').val(max);
                    operation = max;
                }
            }
            var score = recrult+operation;
            $(this).find('.sum').val(score);
            sum_score += recrult+operation;
        });
        ele.closest('table').find('.input_sum_score').val(sum_score);
        ele.closest('table').find('.text_sum_score').html('คะแนนที่ได้: '+sum_score);
        var passing_score = (full_score * passing_percen) / 100;
        if(sum_score >= passing_score){
            ele.closest('table').find('.text_sum_score').removeClass('text-danger');
            ele.closest('table').find(".text_sum_score").addClass('text-success');
        }else{
            ele.closest('table').find(".text_sum_score").addClass('text-danger');
            ele.closest('table').find('.text_sum_score').removeClass('text-success');
        }
    }
</script>
