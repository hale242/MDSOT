<script>
    $(document).ready(function(){
        @foreach($DriverInterview->DriverPersonalityTest as $data)
            var personality_sum = "{{$data->driver_personality_test_sum}}";
            var file = "{{$data->driver_personality_test_file_name}}";
            $('#edit_driver_personality_id_'+"{{$data->driver_personality_id}}").val("{{$data->driver_personality_id}}");
            $('#edit_driver_personality_test_point_recrult_'+"{{$data->driver_personality_id}}").val("{{$data->driver_personality_test_point_recrult}}");
            $('#edit_driver_personality_test_point_operation_'+"{{$data->driver_personality_id}}").val("{{$data->driver_personality_test_point_operation}}");
            $('#edit_driver_personality_test_sum_'+"{{$data->driver_personality_id}}").val(personality_sum);
            $('#edit_driver_personality_test_comment_'+"{{$data->driver_personality_id}}").val("{{$data->driver_personality_test_comment}}");
            if(file){
                $('#edit_driver_personality_id_'+"{{$data->driver_personality_id}}").closest('tr').find('.btn-download').css('display', 'block');
                $('#edit_driver_personality_id_'+"{{$data->driver_personality_id}}").closest('tr').find('.btn-download').attr('data-href', "{{$data->driver_personality_test_file_part}}");
            }else{
                $('#edit_driver_personality_id_'+"{{$data->driver_personality_id}}").closest('tr').find('.btn-download').css('display', 'none');
            }
        @endforeach

        @foreach($DriverInterview->DriverTestTextTest as $data)
            var test_sum = "{{$data->driver_test_text_test_sum}}";
            var file = "{{$data->driver_test_text_test_file_name}}";
            $('#edit_driver_test_text_id_'+"{{$data->driver_test_text_id}}").val("{{$data->driver_test_text_id}}");
            $('#edit_driver_test_text_test_point_recrult_'+"{{$data->driver_test_text_id}}").val("{{$data->driver_test_text_test_point_recrult}}");
            $('#edit_driver_test_text_test_point_operation_'+"{{$data->driver_test_text_id}}").val("{{$data->driver_test_text_test_point_operation}}");
            $('#edit_driver_test_text_test_sum_'+"{{$data->driver_test_text_id}}").val(test_sum);
            $('#edit_driver_test_text_test_comment_'+"{{$data->driver_test_text_id}}").val("{{$data->driver_test_text_test_comment}}");
            if(file){
                $('#edit_driver_test_text_id_'+"{{$data->driver_test_text_id}}").closest('tr').find('.btn-download').css('display', 'block');
                $('#edit_driver_test_text_id_'+"{{$data->driver_test_text_id}}").closest('tr').find('.btn-download').attr('data-href', "{{$data->driver_test_text_test_file_part}}");
            }else{
                $('#edit_driver_test_text_id_'+"{{$data->driver_test_text_id}}").closest('tr').find('.btn-download').css('display', 'none');
            }
        @endforeach

        @foreach($DriverInterview->DriverTestDriverTest as $data)
            var driver_sum = "{{$data->driver_test_driver_test_sum}}";
            var file = "{{$data->driver_test_driver_test_file_name}}";
            $('#edit_driver_test_driver_id_'+"{{$data->driver_test_driver_id}}").val("{{$data->driver_test_driver_id}}");
            $('#edit_driver_test_driver_test_point_recrult_'+"{{$data->driver_test_driver_id}}").val("{{$data->driver_test_driver_test_point_recrult}}");
            $('#edit_driver_test_driver_test_point_operation_'+"{{$data->driver_test_driver_id}}").val("{{$data->driver_test_driver_test_point_operation}}");
            $('#edit_driver_test_driver_test_sum_'+"{{$data->driver_test_driver_id}}").val(driver_sum);
            $('#edit_driver_test_driver_test_comment_'+"{{$data->driver_test_driver_id}}").val("{{$data->driver_test_driver_test_comment}}");
            if(file){
                $('#edit_driver_test_driver_id_'+"{{$data->driver_test_driver_id}}").closest('tr').find('.btn-download').css('display', 'block');
                $('#edit_driver_test_driver_id_'+"{{$data->driver_test_driver_id}}").closest('tr').find('.btn-download').attr('data-href', "{{$data->driver_test_driver_test_file_part}}");
            }else{
                $('#edit_driver_test_driver_id_'+"{{$data->driver_test_driver_id}}").closest('tr').find('.btn-download').css('display', 'none');
            }
        @endforeach
        calculatePersonality();
        calculateTest();
        calculateDriver();
    });

    $('body').on('click', '.btn-download', function(){
        var href = $(this).data('href');
        if(href){
            window.open(url_gb+'/'+href);
        }
    });
</script>
