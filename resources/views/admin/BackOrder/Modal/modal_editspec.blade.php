@php
    // GF::print_r($content);
    $gender = explode(',',$content->gender_id);
    $recruitment = explode(',',$content->recruitment_position_id);
    $langload = explode(',',$content->driver_language_name);
    $age_start = $content->driver_age_start;
    $age_end = $content->driver_age_end;
    $workhistory = explode(',',$content->work_history_current_position);
    $provinceload = explode(',',$content->province);
    $amphurload = explode(',',$content->amphur);
    $districtsload = explode(',',$content->districts);
    $family = explode(',',$content->driver_status_family);
    $smoke = $content->driver_smoke;
    $status = $content->back_order_spec_status;
    // GF::print_r($provinceload);
@endphp
<div class="modal-header">
    <h4 class="modal-title">Edit spec</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
</div>
<form {{--action="{{url('/admin/BackOrderSpec')}}"--}} id="formfilter" class="needs-validation" novalidate method="POST">
    @csrf
    <div class="card">
        <div class="form-body">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="gendedr">Gender</label> <br>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input gender" value="1" id="gender1" name="gender_id[]" <?php if(in_array(1,$gender)){ echo 'checked'; } ?> >
                                <label class="custom-control-label pointer" for="gender1">ชาย</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input gender" value="2" id="gender2" name="gender_id[]" <?php if(in_array(2,$gender)){ echo 'checked'; } ?> >
                                <label class="custom-control-label pointer" for="gender2">หญิง</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="driver_language_name">Language ability</label>
                        @php
                            $language = App\LanguageType::orderBy('language_type_details')->get();
                        @endphp
                        <select class="select2 form-control custom-select search_table_select" style="height: 36px;width: 100%;" name="driver_language_name[]" id="driver_language_name" multiple placeholder="Language ability select" tabindex="1">
                            @foreach ($language as $lng)
                                <option value="{{$lng->language_type_id}}" <?php if(in_array($lng->language_type_id, $langload)){ echo 'selected'; } ?> >{{$lng->language_type_details}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="recruitment_position">Position</label>
                            @php
                                $position = App\RecruitmentPosition::get();
                            @endphp
                            <select class="select2 form-control custom-select search_table_select" name="recruitment_position_id[]" id="recruitment_position" multiple data-placeholder="" tabindex="1">
                                    <option value="">เลือกตำแหน่ง</option>
                                @foreach ($position as $position)
                                    <option value="{{$position->recruitment_position_id}}" <?php if(in_array($position->recruitment_position_id, $recruitment)){ echo 'selected'; } ?> >{{$position['recruitment_position_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            @php
                                $work_history = DB::table('work_history')->select('work_history_current_position')->distinct('work_history_current_position')->orderBy('work_history_current_position')->get();
                                // GF::print_r($work_history[0]->work_history_current_position);
                            @endphp
                            <select class="select2 form-control custom-select search_table_select" style="height: 36px;width: 100%;" multiple name="work_history_current_position[]" id="work_history_current_position" data-placeholder="" tabindex="1">
                                <option value="">เลือกประสบการณ์</option>
                                @for($wh=0;$wh<count($work_history);$wh++)
                                    <option value="{{$work_history[$wh]->work_history_current_position}}" <?php if(in_array($work_history[$wh]->work_history_current_position, $workhistory)){ echo 'selected'; } ?> >{{$work_history[$wh]->work_history_current_position}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>


                    <div class="col-md-4 mb-3">
                        <label class="control-label">จังหวัด</label>
                        @php
                            $province = App\Provinces::get();
                        @endphp
                        <select class="select2 form-control custom-select search_table_select select2-hidden-accessible" multiple="" style="height: 36px;width: 100%;" name="province[]" id="provinceselect" data-placeholder="" data-select2-id="province" tabindex="-1" aria-hidden="true">
                            @foreach ($province as $province)
                                <option value="{{$province['provinces_id']}}" <?php if(in_array($province['provinces_id'],$provinceload)){ echo 'selected'; } ?>>{{$province['provinces_name']}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-4 mb-3">
                        <label class="control-label">เขต/อำเภอ</label>
                        <select class="select2 form-control custom-select search_table_select" multiple style="height: 36px;width: 100%;" name="amphur[]" id="amphurselect" data-placeholder=""></select>
                    </div>


                    <div class="col-md-4 mb-3">
                        <label class="control-label">Area</label>
                        <select class="select2 form-control custom-select search_table_select" multiple style="height: 36px;width: 100%;" name="distric[]" id="districselect" data-placeholder=""></select>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="driver_age_start">Start age</label>
                        <input type="number" min="18" class="form-control" id="driver_age_start" name="driver_age_start" placeholder="" value="{{$age_start}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="driver_age_end">End age</label>
                        <input type="number" min="18" class="form-control" id="driver_age_end" name="driver_age_end" placeholder="" value="{{$age_end}}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="driver_status_family">สถานภาพครอบครัว</label>
                        <select name="driver_status_family[]" id="driver_status_family" class="select2 form-control custom-select search_table_select" multiple>
                            <option value="1" <?php if(in_array(1, $family)){ echo 'selected'; } ?>>โสด</option>
                            <option value="2" <?php if(in_array(2, $family)){ echo 'selected'; } ?>>สมรสจดทะเบียน</option>
                            <option value="3" <?php if(in_array(3, $family)){ echo 'selected'; } ?>>สมรสไม่จดทะเบียน</option>
                            <option value="4" <?php if(in_array(4, $family)){ echo 'selected'; } ?>>หย่า</option>
                            <option value="5" <?php if(in_array(5, $family)){ echo 'selected'; } ?>>หม้าย</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="smoking">Smoking</label> <br>
                        <div class="form-check form-check-inline mr-2">
                            <div class="custom-control custom-radio pt-2">
                                <input type="radio" class="custom-control-input" value="Y" id="smoking1" name="driver_smoke" <?php if($smoke=='Y'){ echo 'checked'; } ?>>
                                <label class="custom-control-label pointer" for="smoking1">Yes</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline mr-2">
                            <div class="custom-control custom-radio pt-2">
                                <input type="radio" class="custom-control-input" value="N" id="smoking2" name="driver_smoke" <?php if($smoke=='N'){ echo 'checked'; } ?>>
                                <label class="custom-control-label pointer" for="smoking2">No</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio pt-2">
                                <input type="radio" class="custom-control-input" value="" id="smoking3" name="driver_smoke" <?php if($smoke==''){ echo 'checked'; } ?>>
                                <label class="custom-control-label pointer" for="smoking3">Not specified</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="hidden" name="back_order_spec_id" id="back_order_spec_id" value="{{$content->back_order_spec_id}}">
            <input type="hidden" name="back_order_id" id="back_order_id_3" value="{{$content->back_order_id}}">
        </div>
    </div>
</form>

<script>
    $('.select2').select2({
        placeholder: " Choose an option"
    });

    $(document).ready(function(){

        // Select
        var province=[];
        var amphur=[];

        // Load Data
        var pvl = '<?php echo $content->province; ?>';
        var amp = '<?php echo $content->amphur; ?>';
        var dit = '<?php echo $content->districts; ?>';
        var provinceload = pvl.split(',');
        var amphurload = amp.split(',');
        var districtsload = dit.split(',');


        if(provinceload!=''){
            province = provinceload;
            $.post(url_gb+'/admin/BackOrderSpec/Getamphur',{id:provinceload, _token: $('meta[name="csrf-token"]').attr('content')},function(data){
                $('#amphurselect').html('');
                $.each(data, function(index, item){
                    var sel = '';
                    if(amphurload.indexOf(item.amphures_id.toString())!='-1'){ sel = 'selected'; }else{ sel = '';}
                    $('#amphurselect').append('<option value="'+item.amphures_id+'" '+ sel +'>'+item.amphures_name+'</option>');
                });
            });
        }

        if(amphurload!=''){
            amphur = amphurload;
            $.post(url_gb+'/admin/BackOrderSpec/Getdistrict',{id:amphurload, _token: $('meta[name="csrf-token"]').attr('content')},function(data){
                $('#districselect').html('');
                $.each(data, function(index, item){
                    var sel = '';
                    if(districtsload.indexOf(item.districts_id.toString())!='-1'){ sel = 'selected'; }else{ sel = '';}
                    $('#districselect').append('<option value="'+item.districts_id+'" '+ sel +'>'+item.districts_name+'</option>');
                });
            });
        }


        // Province
        $('#provinceselect').on('select2:select', function (e) {
            province.push(e.params.data.id);
            // console.log("xx = "+province);
            $.post(url_gb+'/admin/BackOrderSpec/Getamphur',{id:province, _token: $('meta[name="csrf-token"]').attr('content')},function(data){
                $('#amphurselect').html('');
                $.each(data, function(index, item){
                    $('#amphurselect').append('<option value="'+item.amphures_id+'">'+item.amphures_name+'</option>');
                });
            });
        });

        $('#provinceselect').on('select2:unselect', function (e) {
            province = jQuery.grep(province, function(value) {
                return value != e.params.data.id;
            });

            // console.log(province);
            if(province!=''){
                $.post(url_gb+'/admin/BackOrderSpec/Getamphur',{id:province, _token: $('meta[name="csrf-token"]').attr('content')},function(data){
                    $('#amphurselect').html('');
                    $.each(data, function(index, item){
                        $('#amphurselect').append('<option value="'+item.amphures_id+'">'+item.amphures_name+'</option>');
                    });
                });
            }else{
                $('#amphurselect').html('');
            }
        });


        // Amphur
        $('#amphurselect').on('select2:select', function (e) {
            amphur.push(e.params.data.id);
            // console.log(amphur);
            $.post(url_gb+'/admin/BackOrderSpec/Getdistrict',{id:amphur, _token: $('meta[name="csrf-token"]').attr('content')},function(data){
                $('#districselect').html('');
                $.each(data, function(index, item){
                    $('#districselect').append('<option value="'+item.districts_id+'">'+item.districts_name+'</option>');
                });
            });
        });

        $('#amphurselect').on('select2:unselect', function (e) {
            amphur = jQuery.grep(amphur, function(value) {
                return value != e.params.data.id;
            });
            if(amphur!=''){
                $.post(url_gb+'/admin/BackOrderSpec/Getdistrict',{id:amphur, _token: $('meta[name="csrf-token"]').attr('content')},function(data){
                    $('#districselect').html('');
                    $.each(data, function(index, item){
                        $('#districselect').append('<option value="'+item.districts_id+'">'+item.districts_name+'</option>');
                    });
                });
            }else{
                $('#districselect').html('');
            }
        });


        $('#formfilter').submit(function(event){
            event.preventDefault();

            $('.FixSpecModalShow').html(loadingani);

            var output = jQuery.map($(':checkbox[name=gender_id\\[\\]]:checked'), function (n, i) {
                return n.value;
            }).join(',');

            var back_order_spec_id = $('#back_order_spec_id').val();
            var back_order_id = $('#back_order_id_3').val();
            var gender = output;
            var driver_language_name = $('#driver_language_name').val();
            var recruitment_position = $('#recruitment_position').val();
            var work_history_current_position = $('#work_history_current_position').val();
            var province = $('#provinceselect').val();
            var amphur = $('#amphurselect').val();
            var district = $('#districtselect').val();
            var driver_age_start = $('#driver_age_start').val();
            var driver_age_end = $('#driver_age_end').val();
            var driver_status_family = $('#driver_status_family').val();
            var smoke = $("input[name='driver_smoke']:checked").val();

            $.post(url_gb+'/admin/BackOrderSpec',{gender_id:gender, driver_language_name:driver_language_name, recruitment_position:recruitment_position, work_history_current_position:work_history_current_position, province:province, amphur:amphur, district:district, driver_age_start:driver_age_start, driver_age_end:driver_age_end, driver_status_family:driver_status_family, smoke:smoke, back_order_spec_id:back_order_spec_id, back_order_id:back_order_id},function(data){
                swal('Add Schedule an interview Success','ดำเนินการนัดวันสัมภาษณ์ เรียบร้อย','success');

                $('#EditSpecModal').modal('hide');

                $.get(url_gb+'/admin/BackOrder/'+back_order_id, function(data){
                    $('.FixSpecModalShow').html(data);
                });

            });
        });

    });




</script>
