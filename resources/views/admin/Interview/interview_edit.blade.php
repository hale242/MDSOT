@extends('layouts.layout')
@section('content')
    <div class="card" id="InterviewEdit">
        <div class="card-body wizard-content">
            <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
            <h6 class="card-subtitle"></h6>
            <form id="FormEdit" class="tab-wizard wizard-circle">
                <input type="hidden" id="interview_percen_pass" value="{{$InterviewPercenPass->interview_percen_pass_percen}}">
                <input type="hidden" id="step_no" value="1">
                <input type="hidden" id="form_input_step" name="step_no" value="1">
                <input type="hidden" id="edit_driver_interview_id" value="{{$DriverInterview->driver_interview_id}}">
                <input type="hidden" id="consider" name="consider">
                <input type="hidden" id="edit_run_code_id" name="run_code_id">
                <!-- Step 1 -->
                <h6>Personality</h6>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Evaluation Item</th>
                                            <th scope="col">Recurit MDS.</th>
                                            <th scope="col">Operation MDS.</th>
                                            <th scope="col">Sum</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">File</th>
                                        </tr>
                                    </thead>
                                    <tbody id="driver_personality_item">
                                        @php
                                            $sum_score_p = 0;
                                        @endphp
                                        @foreach($DriverPersonalities as $key_st1=>$val)
                                            @php
                                                $sum_score = 0;
                                                if($val->driver_personality_status_recrult == 1){
                                                    $sum_score_p += $val->driver_personality_max_point;
                                                    $sum_score += $val->driver_personality_max_point;
                                                }
                                                if($val->driver_personality_status_operation == 1){
                                                    $sum_score_p += $val->driver_personality_max_point;
                                                    $sum_score += $val->driver_personality_max_point;
                                                }
                                            @endphp
                                            <tr>
                                                <th scope="row">{{$key_st1+1}}</th>
                                                <td>
                                                    {{$val->driver_personality_name_th}}
                                                    <input type="hidden" name="driver_personality_test[{{$key_st1}}][driver_personality_id]" id="edit_driver_personality_id_{{$val->driver_personality_id}}" value="{{$val->driver_personality_id}}">
                                                    <input type="hidden" name="driver_personality_test[{{$key_st1}}][driver_personality_test_max]" id="edit_driver_personality_test_max_{{$val->driver_personality_id}}" value="{{$sum_score}}">
                                                </td>
                                                <td><input type="number" class="form-control recrult" name="driver_personality_test[{{$key_st1}}][driver_personality_test_point_recrult]" id="edit_driver_personality_test_point_recrult_{{$val->driver_personality_id}}" min="0" max="{{$val->driver_personality_max_point}}"  required {{$val->driver_personality_status_recrult == 0 ? 'readonly' : ''}}></td>
                                                <td><input type="number" class="form-control operation" name="driver_personality_test[{{$key_st1}}][driver_personality_test_point_operation]" id="edit_driver_personality_test_point_operation_{{$val->driver_personality_id}}" min="0" max="{{$val->driver_personality_max_point}}" required {{$val->driver_personality_status_operation == 0 ? 'readonly' : ''}}></td>
                                                <td><input type="number" class="form-control sum" name="driver_personality_test[{{$key_st1}}][driver_personality_test_sum]" id="edit_driver_personality_test_sum_{{$val->driver_personality_id}}" value="0" readonly/></td>
                                                <td><input type="text" class="form-control" name="driver_personality_test[{{$key_st1}}][driver_personality_test_comment]" id="edit_driver_personality_test_comment_{{$val->driver_personality_id}}"></td>
                                                <td>
                                                    <div class="custom-file form-upload">
                                                        <input type="file" class="custom-file-input personality-upload-file" name="driver_personality_test[{{$key_st1}}][driver_personality_test_file_name]" data-index="{{$key_st1}}" id="edit_driver_personality_test_file_name_{{$val->driver_personality_id}}" required />
                                                        <label class="custom-file-label" for="">Choose file</label>
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-download" style="display: none;">Download</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7">
                                                รวมคะแนน (เต็ม {{$sum_score_p}} คะแนน)
                                                @php
                                                    $passing_score = ($sum_score_p * $InterviewPercenPass->interview_percen_pass_percen) / 100;
                                                @endphp
                                                <span class="text-primary">ต้องผ่าน {{$InterviewPercenPass->interview_percen_pass_percen}}% หรือ {{$passing_score}} คะแนน</span> |
                                                <span class="text-danger text_sum_score">คะแนนที่ได้: 0</span>
                                                <input type="hidden" id="full_score_p" value="{{$sum_score_p}}">
                                                <input type="hidden" name="driver_personality_test[full_score]" value="{{$sum_score_p}}">
                                                <input type="hidden" class="input_sum_score" name="driver_personality_test[score]" value="0">
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Step 2 -->
                <h6>Test</h6>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Evaluation Item</th>
                                            <th scope="col">Recurit MDS.</th>
                                            <th scope="col">Operation MDS.</th>
                                            <th scope="col">Sum</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">File</th>
                                        </tr>
                                    </thead>
                                    <tbody id="driver_test_text_item">
                                        @php
                                            $sum_score_t = 0;
                                        @endphp
                                        @foreach($DriverTestTexts as $key_st2=>$val)
                                            @php
                                                $sum_score = 0;
                                                if($val->driver_test_text_status_recrult == 1){
                                                    $sum_score_t += $val->driver_test_text_max_point;
                                                    $sum_score += $val->driver_test_text_max_point;
                                                }
                                                if($val->driver_test_text_status_operation == 1){
                                                    $sum_score_t += $val->driver_test_text_max_point;
                                                    $sum_score += $val->driver_test_text_max_point;
                                                }
                                            @endphp
                                            <tr>
                                                <th scope="row">{{($key_st1+1) + ($key_st2+1)}}</th>
                                                <td>
                                                    {{$val->driver_test_text_name_th}}
                                                    <input type="hidden" name="driver_test_text[{{$key_st2}}][driver_test_text_id]" id="edit_driver_test_text_id_{{$val->driver_test_text_id}}" value="{{$val->driver_test_text_id}}">
                                                    <input type="hidden" name="driver_test_text[{{$key_st2}}][driver_test_text_test_max]" id="edit_driver_test_text_test_max_{{$val->driver_test_text_id}}" value="{{$sum_score}}">
                                                </td>
                                                <td><input type="number" class="form-control recrult" name="driver_test_text[{{$key_st2}}][driver_test_text_test_point_recrult]" id="edit_driver_test_text_test_point_recrult_{{$val->driver_test_text_id}}" min="0" max="{{$val->driver_test_text_max_point}}"  required {{$val->driver_test_text_status_recrult == 0 ? 'readonly' : ''}}></td>
                                                <td><input type="number" class="form-control operation" name="driver_test_text[{{$key_st2}}][driver_test_text_test_point_operation]" id="edit_driver_test_text_test_point_operation_{{$val->driver_test_text_id}}" min="0" max="{{$val->driver_test_text_max_point}}"  required {{$val->driver_test_text_status_operation == 0 ? 'readonly' : ''}}></td>
                                                <td><input type="number" class="form-control sum" name="driver_test_text[{{$key_st2}}][driver_test_text_test_sum]" id="edit_driver_test_text_test_sum_{{$val->driver_test_text_id}}" readonly></td>
                                                <td><input type="text" class="form-control" name="driver_test_text[{{$key_st2}}][driver_test_text_test_comment]" id="edit_driver_test_text_test_comment_{{$val->driver_test_text_id}}"></td>
                                                <td>
                                                    <div class="custom-file form-upload">
                                                        <input type="file" class="custom-file-input test-upload-file" data-index="{{$key_st2}}" name="driver_test_text[{{$key_st2}}][driver_test_text_test_file_name]" id="edit_driver_test_text_test_file_name_{{$val->driver_test_text_id}}" required />
                                                        <label class="custom-file-label" for="">Choose file</label>
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-download" style="display: none;">Download</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="7">
                                                รวมคะแนน (เต็ม {{$sum_score_t}})
                                                @php
                                                    $passing_score = ($sum_score_t * $InterviewPercenPass->interview_percen_pass_percen) / 100;
                                                @endphp
                                                <span class="text-primary">ต้องผ่าน {{$InterviewPercenPass->interview_percen_pass_percen}}% หรือ {{$passing_score}} คะแนน</span> |
                                                <span class="text-danger text_sum_score">คะแนนที่ได้: 0</span>
                                                <input type="hidden" id="full_score_t" value="{{$sum_score_t}}">
                                                <input type="hidden" name="driver_test_text[full_score]" value="{{$sum_score_t}}">
                                                <input type="hidden" class="input_sum_score" name="driver_test_text[score]" value="0">
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Step 3 -->
                <h6>Driver</h6>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Evaluation Item</th>
                                            <th scope="col">Recurit MDS.</th>
                                            <th scope="col">Operation MDS.</th>
                                            <th scope="col">Sum</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">File</th>
                                        </tr>
                                    </thead>
                                    <tbody id="driver_test_item">
                                        @php
                                            $sum_score_d = 0;
                                        @endphp
                                        @foreach($DriverTestDrivers as $key_st3=>$val)
                                            @php
                                                $sum_score = 0;
                                                if($val->driver_test_driver_status_recrult == 1){
                                                    $sum_score_d += $val->driver_test_driver_max_point;
                                                    $sum_score += $val->driver_test_driver_max_point;
                                                }
                                                if($val->driver_test_driver_status_operation == 1){
                                                    $sum_score_d += $val->driver_test_driver_max_point;
                                                    $sum_score += $val->driver_test_driver_max_point;
                                                }
                                            @endphp
                                            <tr>
                                                <th scope="row">{{($key_st1+1) + ($key_st2+1) + ($key_st3+1)}}</th>
                                                <td>
                                                    {{$val->driver_test_driver_name_th}}
                                                    <input type="hidden" name="driver_test_driver[{{$key_st3}}][driver_test_driver_id]" id="edit_driver_test_driver_id_{{$val->driver_test_driver_id}}" value="{{$val->driver_test_driver_id}}">
                                                    <input type="hidden" name="driver_test_driver[{{$key_st3}}][driver_test_driver_test_max]" id="edit_driver_test_driver_test_max_{{$val->driver_test_driver_id}}" value="{{$sum_score}}">
                                                </td>
                                                <td><input type="number" class="form-control recrult" name="driver_test_driver[{{$key_st3}}][driver_test_driver_test_point_recrult]" id="edit_driver_test_driver_test_point_recrult_{{$val->driver_test_driver_id}}" min="0" max="{{$val->driver_test_driver_max_point}}"  required {{$val->driver_test_driver_status_recrult == 0 ? 'readonly' : ''}}></td>
                                                <td><input type="number" class="form-control operation" name="driver_test_driver[{{$key_st3}}][driver_test_driver_test_point_operation]" id="edit_driver_test_driver_test_point_operation_{{$val->driver_test_driver_id}}" min="0" max="{{$val->driver_test_driver_max_point}}"  required {{$val->driver_test_driver_status_operation == 0 ? 'readonly' : ''}}></td>
                                                <td><input type="number" class="form-control sum" name="driver_test_driver[{{$key_st3}}][driver_test_driver_test_sum]" id="edit_driver_test_driver_test_sum_{{$val->driver_test_driver_id}}" readonly></td>
                                                <td><input type="text" class="form-control" name="driver_test_driver[{{$key_st3}}][driver_test_driver_test_comment]" id="edit_driver_test_driver_test_comment_{{$val->driver_test_driver_id}}" /></td>
                                                <td>
                                                    <div class="custom-file form-upload">
                                                        <input type="file" class="custom-file-input driver-upload-file" data-index="{{$key_st3}}" name="driver_test_driver[{{$key_st3}}][driver_test_driver_test_file_name]" id="edit_driver_test_driver_test_file_name_{{$val->driver_test_driver_id}}" required />
                                                        <label class="custom-file-label" for="">Choose file</label>
                                                    </div>
                                                    <button type="button" class="btn btn-success btn-download" style="display: none;">Download</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="7">
                                                รวมคะแนน (เต็ม {{$sum_score_d}})
                                                @php
                                                    $passing_score = ($sum_score_d * $InterviewPercenPass->interview_percen_pass_percen) / 100;
                                                @endphp
                                                <span class="text-primary">ต้องผ่าน {{$InterviewPercenPass->interview_percen_pass_percen}}% หรือ {{$passing_score}} คะแนน</span> |
                                                <span class="text-danger text_sum_score">คะแนนที่ได้: 0</span>
                                                <input type="hidden" id="full_score_d" value="{{$sum_score_d}}">
                                                <input type="hidden" name="driver_test_driver[full_score]" value="{{$sum_score_d}}">
                                                <input type="hidden" class="input_sum_score" name="driver_test_driver[score]" value="0">
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <div class="text-right">
                <button type="button" class="btn btn-secondary btn-send-back" data-id="{{$DriverInterview->driver_interview_id}}">Send back</button>
                <button type="button" class="btn btn-success btn-approve" data-id="{{$DriverInterview->driver_interview_id}}" disabled>Approve</button>
                <button type="button" class="btn btn-warning text-white btn-consider" data-id="{{$DriverInterview->driver_interview_id}}" disabled>Consider</button>
                <button type="button" class="btn btn-danger btn-fail" data-id="{{$DriverInterview->driver_interview_id}}">Fail</button>
            </div>
        </div>
    </div>

@endsection @section('modal')
@include('admin.Interview.Modal.modal_send_back')
@include('admin.Interview.Modal.modal_approve')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
      	$(".tab-wizard").steps({
        		headerTag: "h6",
        		bodyTag: "section",
        		transitionEffect: "fade",
        		titleTemplate: '<span class="step">#index#</span> #title#',
        		labels: {
        			   finish: "Submit"
        		},
        		onFinished: function(event, currentIndex) {
        			   swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
        		}
      	});
        $("a[href*='#next']").addClass('btn-submit');
        $("a[href*='#finish']").remove();
    });

    $('body').on('change', '.recrult, .operation', function(){
        calculatePersonality();
        calculateTest();
        calculateDriver();
    });

    $('body').on('click', '#FormEdit-t-0', function(){
        $('#step_no').val(1);
        $('.btn-approve').prop('disabled', true);
        $('.btn-consider').prop('disabled', true);
    });

    $('body').on('click', '#FormEdit-t-1', function(){
        $('#step_no').val(2);
        $('.btn-approve').prop('disabled', true);
        var full_score = $('#full_score_t').val();
        var score = $('#driver_test_text_item').closest('table').find('.input_sum_score').val();
        if(parseFloat(score) < parseFloat(full_score)){
            $('.btn-consider').prop('disabled', false);
        }else{
            $('.btn-consider').prop('disabled', true);
        }
        calculateTest();
    });

    $('body').on('click', '#FormEdit-t-2', function(){
        $('#step_no').val(3);
        $('.btn-approve').prop('disabled', false);
        $('.btn-consider').prop('disabled', true);
    });

    $('body').on('change','.personality-upload-file',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
             url : url_gb+'/admin/UploadFile/Interview',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(res){
                 ele.closest('.form-upload').find('.personality-upload-file').append('<input type="hidden" name="driver_personality_test['+index+'][driver_personality_test_file_name]" value="'+res.path+'">');
                 setTimeout(function(){

                 },100);
             }
        });
    });

    $('body').on('change','.test-upload-file',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
             url : url_gb+'/admin/UploadFile/Interview',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(res){
                 ele.closest('.form-upload').find('.test-upload-file').append('<input type="hidden" name="driver_test_text['+index+'][driver_test_text_test_file_name]" value="'+res.path+'">');
                 setTimeout(function(){

                 },100);
             }
        });
    });

    $('body').on('change','.driver-upload-file',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
             url : url_gb+'/admin/UploadFile/Interview',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(res){
                 ele.closest('.form-upload').find('.driver-upload-file').append('<input type="hidden" name="driver_test_driver['+index+'][driver_test_driver_test_file_name]" value="'+res.path+'">');
                 setTimeout(function(){

                 },100);
             }
        });
    });
</script>
@include('admin.Interview.Script.script_calculate')
@include('admin.Interview.Script.script_send_back')
@include('admin.Interview.Script.script_fail')
@include('admin.Interview.Script.script_interview_edit')
@include('admin.Interview.Script.script_interview_submit')
@endsection
