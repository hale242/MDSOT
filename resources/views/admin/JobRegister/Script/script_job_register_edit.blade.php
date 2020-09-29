<script>
  $('body').on('click','.btn-edit',function(data){
      var id = $(this).data('id');
      var btn = $(this);
      $('#edit_id').val(id);
      $('#edit_table_brethren').html('');
      $('#edit_work_history').html('');
      $('#edit_training_record').html('');
      $('#edit_driver_language').html('');
      $('#edit_driver_emergency_contacts').html('');
      $('#edit_driver_reference').html('');
      loadingButton(btn);
      $.ajax({
          method: "GET",
          url: url_gb+"/admin/JobRegister/"+id,
          data: {
              id: id
          }
      }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          var province_id = data.districts ? data.districts.provinces_id : '';
          var amphure_id = data.districts ? data.districts.amphures_id : '';
          var zipcode = data.districts && data.districts.zipcode ? data.districts.zipcode.zipcodes_name : '';
          var registere_province_id = data.registered_districts ? data.registered_districts.provinces_id : '';
          var registere_amphure_id = data.registered_districts ? data.registered_districts.amphures_id : '';
          var registere_zipcode = data.registered_districts && data.registered_districts.zipcode ? data.registered_districts.zipcode.zipcodes_name : '';

          var brethren_item = '';
          var work_history_item = '';
          var training_record_item = '';
          var driver_language_item = '';
          var driver_emergency_contact_item = '';
          var driver_reference_item = '';
          $('#edit_driver_code').val(data.driver_code);
          $('#edit_type_job_new_id').val(data.type_job_new_id).change();
          $('#edit_recruitment_position_id').val(data.recruitment_position_id).change();
          $('#edit_driver_date_in_com').val(data.driver_date_in_com);
          $('#edit_gender_'+data.gender_id).prop('checked',true);
          $('#edit_driver_smoke_'+data.driver_smoke).prop('checked',true);
          $('#edit_name_prefix_id').val(data.name_prefix_id).change();
          $('#edit_driver_name_th').val(data.driver_name_th);
          $('#edit_driver_name_en').val(data.driver_name_en);
          $('#edit_driver_lastname_th').val(data.driver_lastname_th);
          $('#edit_driver_lastname_en').val(data.driver_lastname_en);
          $('#edit_driver_nickname').val(data.driver_nickname);
          $('#edit_driver_id_card_no').val(data.driver_id_card_no);
          $('#edit_driver_id_card_date_end').val(data.driver_id_card_date_end);
          $('#edit_driver_height').val(data.driver_height);
          $('#edit_driver_weight').val(data.driver_weight);
          $('#edit_driver_date_of_birth').val(data.driver_date_of_birth);
          $('#edit_driver_age').val(data.driver_age);
          $('#edit_driver_nationality').val(data.driver_nationality);
          $('#edit_driver_religion').val(data.driver_religion);
          $('#edit_driver_place_of_birth').val(data.driver_place_of_birth);
          $('#edit_driver_email').val(data.driver_email);
          $('#edit_driver_phone').val(data.driver_phone);
          $('#edit_driver_phone_2').val(data.driver_phone_2);
          $('#edit_driver_mobile_phone').val(data.driver_mobile_phone);
          $('#edit_driver_address').val(data.driver_address);
          $('#edit_driver_address_en').val(data.driver_address_en);
          $('#edit_provinces_id').val(province_id).select2('destroy').select2();
          $.each(res.amphures, function(k,v){
              $('#edit_amphures_id').append('<option value="'+v.amphures_id+'">' + v.amphures_name + '</option>');
          });
          $('#edit_amphures_id').val(amphure_id).select2('destroy').select2();
          $.each(res.districts, function(k,v){
              $('#edit_districts_id').append('<option value="'+v.districts_id+'">' + v.districts_name + '</option>');
          });
          $('#edit_districts_id').val(data.districts_id).select2('destroy').select2();
          $('#edit_zipcodes_id').val(zipcode);
          $('#edit_driver_registered_address').val(data.driver_registered_address);
          $('#edit_driver_registered_address_en').val(data.driver_registered_address_en);
          $('#edit_registered_provinces_id').val(registere_province_id).select2('destroy').select2();
          $.each(res.registere_amphures, function(k,v){
              $('#edit_registered_amphures_id').append('<option value="'+v.amphures_id+'">' + v.amphures_name + '</option>');
          });
          $('#edit_registered_amphures_id').val(registere_amphure_id).select2('destroy').select2();
          $.each(res.registere_districts, function(k,v){
              $('#edit_driver_registered_address_districts_id').append('<option value="'+v.districts_id+'">' + v.districts_name + '</option>');
          });
          $('#edit_driver_registered_address_districts_id').val(data.driver_registered_address_districts_id).select2('destroy').select2();
          $('#edit_registered_zipcodes_id').val(registere_zipcode);
          $('#edit_driver_status_family_'+data.driver_status_family).prop('checked',true);
          $('#edit_driver_children').val(data.driver_children);
          $('#edit_driver_spouse_name').val(data.driver_spouse_name);
          $('#edit_driver_spouse_name_en').val(data.driver_spouse_name_en);
          $('#edit_driver_spouse_lastname').val(data.driver_spouse_lastname);
          $('#edit_driver_spouse_lastname_en').val(data.driver_spouse_lastname_en);
          $('#edit_driver_spouse_phone').val(data.driver_spouse_phone);
          $('#edit_driver_spouse_position').val(data.driver_spouse_position);
          $('#edit_driver_spouse_company').val(data.driver_spouse_company);

          // ข้อมูลบิดา
          $('#edit_driver_father_name').val(data.driver_father_name);
          $('#edit_driver_father_name_en').val(data.driver_father_name_en);
          $('#edit_driver_father_lastname').val(data.driver_father_lastname);
          $('#edit_driver_father_lastname_en').val(data.driver_father_lastname_en);
          $('#edit_driver_father_age').val(data.driver_father_age);
          $('#edit_driver_father_status_'+data.driver_father_status).prop('checked',true);
          $('#edit_driver_father_phone').val(data.driver_father_phone);
          $('#edit_driver_father_position').val(data.driver_father_position);
          $('#edit_driver_father_company').val(data.driver_father_company);

          // ข้อมูลมารดา
          $('#edit_driver_mother_name').val(data.driver_mother_name);
          $('#edit_driver_mother_name_en').val(data.driver_mother_name_en);
          $('#edit_driver_mother_lastname').val(data.driver_mother_lastname);
          $('#edit_driver_mother_lastname_en').val(data.driver_mother_lastname_en);
          $('#edit_driver_mother_age').val(data.driver_mother_age);
          $('#edit_driver_mother_status_'+data.driver_mother_status).prop('checked',true);
          $('#edit_driver_mother_phone').val(data.driver_mother_phone);
          $('#edit_driver_mother_position').val(data.driver_mother_position);
          $('#edit_driver_mother_company').val(data.driver_mother_company);

          // ข้อมูลพี่น้อง
          if(data.brethren.length > 0){
              $.each(data.brethren, function(k,v){
                  brethren_item = '<tr id="edit_table_brethren_'+k+'"><input type="hidden" name="brethren['+k+'][brethren_id]" value="'+v.brethren_id+'">';
                  brethren_item += '		<td scope="row"><input type="number" class="form-control" id="edit_brethren_z_index'+k+'" name="brethren['+k+'][brethren_z_index]" value="'+v.brethren_z_index+'"></th>';
                  brethren_item += '		<td><input type="text" class="form-control" id="edit_brethren_name'+k+'" name="brethren['+k+'][brethren_name]" value="'+v.brethren_name+'"></td>';
                  brethren_item += '		<td><input type="text" class="form-control" id="edit_brethren_lastname'+k+'" name="brethren['+k+'][brethren_lastname]" value="'+v.brethren_lastname+'"></td>';
                  brethren_item += '		<td><input type="number" class="form-control" id="edit_brethren_age" name="brethren['+k+'][brethren_age]" value="'+v.brethren_age+'"></td>';
                  brethren_item += '		<td>';
                  brethren_item += '			<div class="custom-control custom-radio">';
                  brethren_item += '				<input type="radio" class="custom-control-input" id="edit_brethren_realtionship_1_'+k+'" name="brethren['+k+'][brethren_realtionship]" value="1">';
                  brethren_item += '				<label class="custom-control-label" for="edit_brethren_realtionship_1_'+k+'">พี่</label>';
                  brethren_item += '			</div>';
                  brethren_item += '			<div class="custom-control custom-radio">';
                  brethren_item += '				<input type="radio" class="custom-control-input" id="edit_brethren_realtionship_2_'+k+'" name="brethren['+k+'][brethren_realtionship]" value="2">';
                  brethren_item += '				<label class="custom-control-label" for="edit_brethren_realtionship_2_'+k+'">น้อง</label>';
                  brethren_item += '			</div>		';
                  brethren_item += '		</td>';
                  brethren_item += '		<td><input type="text" class="form-control" id="edit_brethre_position'+k+'" name="brethren['+k+'][brethren_position]" value="'+v.brethren_position+'"></td>';
                  brethren_item += '		<td><input type="text" class="form-control" id="edit_brethren_company'+k+'" name="brethren['+k+'][brethren_company]" value="'+v.brethren_company+'"></td>';
                  brethren_item += '		<td><input type="text" class="form-control" id="edit_brethren_tel'+k+'" name="brethren['+k+'][brethren_tel]" value="'+v.brethren_tel+'"></td>';
                  brethren_item += '		<td>';
                  brethren_item += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_brethren(\''+k+'\');" href="javascript:void(0)">';
                  brethren_item += '				<i class="mdi mdi-minus"></i>';
                  brethren_item += '			</a>';
                  brethren_item += '			</td>';
                  brethren_item += ' </tr>';
                  $('#edit_table_brethren').append(brethren_item);
                  $('#edit_brethren_realtionship_'+v.brethren_realtionship+'_'+k).prop('checked',true);
              });
          }else{
              brethren_item = '<tr><td colspan="8">ไม่พบข้อมูล</td></tr>';
              $('#edit_table_brethren').append(brethren_item);
          }

          // ประวัติการศึกษา
          $.each(data.education_driver, function(k,v){
              $('#education_driver_id_'+v.education_driver_status).val(v.education_driver_id);
              $('#edit_education_driver_date_fr_'+v.education_driver_status).val(v.education_driver_date_fr).change();
              $('#edit_education_driver_date_to_'+v.education_driver_status).val(v.education_driver_date_to).change();
              $('#edit_education_driver_name_instirute_'+v.education_driver_status).val(v.education_driver_name_instirute);
              $('#edit_education_driver_major_'+v.education_driver_status).val(v.education_driver_major);
              $('#edit_education_driver_gpa_'+v.education_driver_status).val(v.education_driver_gpa);
          });

          // ประวัติการทำงาน
          if(data.work_history.length > 0){
              $.each(data.work_history, function(k,v){
                  var year = '';
                  var select_start_years = '<option value="">เลือกปี</option>';
                  var select_end_years = '<option value="">เลือกปี</option>';
                  for(year=1970; year<=3000; year++){
                      var selected_start_year = (year == v.work_history_from) ? 'selected' : '';
                      var selected_end_year = (year == v.work_history_to) ? 'selected' : '';
                      select_start_years += "<option value='"+year+"' "+selected_start_year+">"+year+"</option>";
                      select_end_years += "<option value='"+year+"' "+selected_end_year+">"+year+"</option>";
                  }
                  work_history_item ='<div id="edit_work_history_'+k+'"><input type="hidden" name="work_history['+k+'][work_history_id]" value="'+v.work_history_id+'">';
                  work_history_item +='<div class="text-right"> ';
                  work_history_item += '<a class="btn btn-circle btn-danger text-white" onclick="delete_row_work_history(\''+k+'\');" href="javascript:void(0)">';
                  work_history_item += '										<i class="mdi mdi-minus"></i>';
                  work_history_item += '									</a>';
                  work_history_item +='</div> ';
                  work_history_item += '	<table class="table">';
                  work_history_item += '		<thead>';
                  work_history_item += '			<tr>';
                  work_history_item += '				<th scope="col">ตั้งแต่</th>';
                  work_history_item += '				<th scope="col">ถึง</th>';
                  work_history_item += '				<th scope="col" colspan="4">บริษัท</th>';
                  work_history_item += '				<th scope="col" colspan="4">ตำแหน่ง</th>';
                  work_history_item += '			</tr>';
                  work_history_item += '		</thead>';
                  work_history_item += '		<tbody>';
                  work_history_item += '			<tr>';
                  work_history_item += '			  <td>';
                  work_history_item += '		       <select class="form-control custom-select select2" name="work_history['+k+'][work_history_from]">';
                  work_history_item +=               select_start_years
                  work_history_item += '          </select>';
                  work_history_item += '			  </td>';
                  work_history_item += '			  <td>';
                  work_history_item += '		       <select class="form-control custom-select select2" name="work_history['+k+'][work_history_to]">';
                  work_history_item +=               select_end_years
                  work_history_item += '          </select>';
                  work_history_item += '			  </td>';
                  work_history_item += '				<td scope="col" colspan="4"><input type="text" class="form-control" name="work_history['+k+'][work_history_company]" value="'+v.work_history_company+'"></td>';
                  work_history_item += '				<td scope="col" colspan="4"><input type="text" class="form-control" name="work_history['+k+'][work_history_current_position]" value="'+v.work_history_current_position+'"></td>';
                  work_history_item += '			</tr>';
                  work_history_item += '			<tr>';
                  work_history_item += '				<td scope="col" rowspan="2">เงินเดือน</td>';
                  work_history_item += '				<td scope="col">เริ่มต้น</td>';
                  work_history_item += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+k+'][work_history_salary_start]" value="'+addNumformat(v.work_history_salary_start)+'"></td>';
                  work_history_item += '				<td scope="col">ค่าคอมมิชชั่น</td>';
                  work_history_item += '				<td scope="col">ค่าโทรศัพท์</td>';
                  work_history_item += '				<td scope="col">ค่าน้ำมัน</td>';
                  work_history_item += '				<td scope="col">โบนัส</td>';
                  work_history_item += '				<td scope="col">เบี้ยขยัน</td>';
                  work_history_item += '				<td scope="col">อื่นๆ</td>';
                  work_history_item += '			</tr>';
                  work_history_item += '			<tr>';
                  work_history_item += '				<td scope="col">สุดท้าย</td>';
                  work_history_item += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+k+'][work_history_salary_end]" value="'+addNumformat(v.work_history_salary_end)+'"></td>';
                  work_history_item += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+k+'][work_history_commission_start]" value="'+addNumformat(v.work_history_commission_start)+'"></td>';
                  work_history_item += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+k+'][work_history_mobile_start]" value="'+addNumformat(v.work_history_mobile_start)+'"></td>';
                  work_history_item += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+k+'][work_history_gasoline_start]" value="'+addNumformat(v.work_history_gasoline_start)+'"></td>';
                  work_history_item += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+k+'][work_history_bonus_start]" value="'+addNumformat(v.work_history_bonus_start)+'"></td>';
                  work_history_item += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+k+'][work_history_incentive_start]" value="'+addNumformat(v.work_history_incentive_start)+'"></td>';
                  work_history_item += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+k+'][work_history_other_start]" value="'+addNumformat(v.work_history_other_start)+'"></td>';
                  work_history_item += '			</tr>';
                  work_history_item += '			</tr>';
                  work_history_item += '				<td colspan="9">';
                  work_history_item += '					<label for="edit_work_history_details">หน้าที่และความรับผิดชอบโดยละเอียด</label>';
                  work_history_item += '					<textarea cols="80" class="form-control" name="work_history['+k+'][work_history_details]"  rows="10">'+v.work_history_details+'</textarea>';
                  work_history_item += '				</td>';
                  work_history_item += '			</tr>';
                  work_history_item += '			</tr>';
                  work_history_item += '				<td colspan="9">';
                  work_history_item += '					<label for="edit_work_history_reason_for_leaving">สาเหตุที่ออก</label>';
                  work_history_item += '					<textarea cols="80" class="form-control" name="work_history['+k+'][work_history_reason_for_leaving]"  rows="10">'+v.work_history_reason_for_leaving+'</textarea>';
                  work_history_item += '				</td>';
                  work_history_item += '			</tr>';
                  work_history_item += '			</tr>';
                  work_history_item += '				<td>ชื่อผู้บังคับบัญชา</td>';
                  work_history_item += '				<td colspan="3"><input type="text" class="form-control" name="work_history['+k+'][work_history_supervison_name]" value="'+v.work_history_supervison_name+'"></td>';
                  work_history_item += '				<td colspan="2">';
                  work_history_item += '					<div class="custom-control custom-radio">';
                  work_history_item += '						<input type="radio" class="custom-control-input" id="edit_work_history_supervison_status_1_'+k+'" name="work_history['+k+'][work_history_supervison_status]" value="1">';
                  work_history_item += '						<label class="custom-control-label" for="edit_work_history_supervison_status_1_'+k+'">ยินดีให้ติดต่อเพื่อสอบถามข้อมูลโทร</label>';
                  work_history_item += '					</div>';
                  work_history_item += '					<div class="custom-control custom-radio">';
                  work_history_item += '						<input type="radio" class="custom-control-input" id="edit_work_history_supervison_status_0_'+k+'" name="work_history['+k+'][work_history_supervison_status]" value="0">';
                  work_history_item += '						<label class="custom-control-label" for="edit_work_history_supervison_status_0_'+k+'">ไม่ยินดีให้ติดต่อ</label>';
                  work_history_item += '					</div>';
                  work_history_item += '				</td>';
                  work_history_item += '				<td colspan="3"><input type="text" class="form-control" name="work_history['+k+'][work_history_supervison_phone]" value="'+v.work_history_supervison_phone+'"></td>';
                  work_history_item += '			</tr>';
                  work_history_item += '			<tr>';
                  work_history_item += '			<td colspan="9">  </td>';
                  work_history_item += '			</tr>';
                  work_history_item += '		</tbody>';
                  work_history_item += '	</table>';
                  work_history_item += '	</div>';
                  $('#edit_work_history').append(work_history_item);
                  $('#edit_work_history_supervison_status_'+v.work_history_supervison_status+'_'+k).prop('checked',true);
              });
          }else{
              work_history_item = '<table><tr><td>ไม่พบข้อมูล</td></tr></table>';
              $('#edit_work_history').append(work_history_item);
          }


          // ประวัติการฝึกอบรม
          if(data.training_record.length > 0){
              $.each(data.training_record, function(k,v){
                  var year = '';
                  var select_years = '<option value="">เลือกปี</option>';
                  for(year=1970; year<=3000; year++){
                      var selected_year = (year == v.training_record_year) ? 'selected' : '';
                      select_years += "<option value='"+year+"' "+selected_year+">"+year+"</option>";
                  }
                  training_record_item += '	<tr id="edit_training_record_'+k+'"><input type="hidden" name="training_record['+k+'][training_record_id]" value="'+v.training_record_id+'">';
                  training_record_item += '		<td scope="col">';
                  training_record_item += '		   <select class="form-control custom-select select2" name="training_record['+k+'][training_record_year]">';
                  training_record_item +=           select_years
                  training_record_item += '      </select>';
                  training_record_item += '		</td>';
                  training_record_item += '		<td scope="col"><input type="text" class="form-control" name="training_record['+k+'][training_record_course]" value="'+v.training_record_course+'"></td>';
                  training_record_item += '		<td scope="col"><input type="text" class="form-control" name="training_record['+k+'][training_record_insitute]" value="'+v.training_record_insitute+'"></td>';
                  training_record_item += '		<td scope="col"><input type="text" class="form-control" name="training_record['+k+'][training_record_duration]" value="'+v.training_record_duration+'"></td>';
                  training_record_item += '		<td scope="col">';
                  training_record_item += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_training_record(\''+k+'\');" href="javascript:void(0)">';
                  training_record_item += '				<i class="mdi mdi-minus"></i>';
                  training_record_item += '			</a>';
                  training_record_item += '		</td>';
                  training_record_item += '	</tr>';
              });
          }else{
              training_record_item = '<tr><td colspan="5">ไม่พบข้อมูล</td></tr>';
          }
          $('#edit_training_record').append(training_record_item);

          // ความสามารถทางภาษา
          if(data.driver_language.length > 0){
              $.each(data.driver_language, function(k,v){
                  var select_languages = '<option value="">เลือกภาษา</option>';
                  @foreach($LanguageTypes as $val)
                      var selected_language_type = ({{$val->language_type_id}} == v.language_type_id) ? 'selected' : '';
                      select_languages += "<option value='{{$val->language_type_id}}' "+selected_language_type+">{{$val->language_type_name}}</option>";
                  @endforeach

                  driver_language_item = '<tr id="edit_driver_language_'+k+'"><input type="hidden" name="driver_language['+k+'][driver_language_id]" value="'+v.driver_language_id+'">';
                  driver_language_item += '	<td>';
                  driver_language_item += '	    <select class="form-control custom-select select2" name="driver_language['+k+'][language_type_id]">';
                  driver_language_item +=           select_languages;
                  driver_language_item += '		  </select>';
                  driver_language_item += '	</td>';
                  driver_language_item += '	<td>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_speaking_3_'+k+'" name="driver_language['+k+'][driver_language_speaking]" class="custom-control-input" value="3">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_speaking_3_'+k+'">ดีมาก</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_speaking_2_'+k+'" name="driver_language['+k+'][driver_language_speaking]" class="custom-control-input" value="2">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_speaking_2_'+k+'">ดี</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_speaking_1_'+k+'" name="driver_language['+k+'][driver_language_speaking]" class="custom-control-input" value="1">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_speaking_1_'+k+'">พอใช้</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += ' </td>';
                  driver_language_item += '	<td>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_reading_3_'+k+'" name="driver_language['+k+'][driver_language_reading]" class="custom-control-input" value="3">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_reading_3_'+k+'">ดีมาก</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_reading_2_'+k+'" name="driver_language['+k+'][driver_language_reading]" class="custom-control-input" value="2">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_reading_2_'+k+'">ดี</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_reading_1_'+k+'" name="driver_language['+k+'][driver_language_reading]" class="custom-control-input" value="1">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_reading_1_'+k+'">พอใช้</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += ' </td>';
                  driver_language_item += '	<td>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_writing_3_'+k+'" name="driver_language['+k+'][driver_language_writing]" class="custom-control-input" value="3">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_writing_3_'+k+'">ดีมาก</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_writing_2_'+k+'" name="driver_language['+k+'][driver_language_writing]" class="custom-control-input" value="2">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_writing_2_'+k+'">ดี</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += '	<div class="custom-control custom-radio">';
                  driver_language_item += '	    <input type="radio" id="edit_driver_language_writing_1_'+k+'" name="driver_language['+k+'][driver_language_writing]" class="custom-control-input" value="1">';
                  driver_language_item += '	    <label class="custom-control-label" for="edit_driver_language_writing_1_'+k+'">พอใช้</label>';
                  driver_language_item += '	</div>';
                  driver_language_item += ' </td>';
                  driver_language_item += '	<td><input type="text" class="form-control" name="driver_language['+k+'][driver_language_test_result]" value="'+v.driver_language_test_result+'"></td>';
                  driver_language_item += '	<td><input type="number" class="form-control" name="driver_language['+k+'][driver_language_score]" value="'+v.driver_language_score+'"></td>';
                  driver_language_item += '	<td>';
                  driver_language_item += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_language(\''+k+'\');" href="javascript:void(0)">';
                  driver_language_item += '				<i class="mdi mdi-minus"></i>';
                  driver_language_item += '			</a>';
                  driver_language_item += '	</td>';
                  driver_language_item += '</tr>';

                  $('#edit_driver_language').append(driver_language_item);
                  $('#edit_driver_language_speaking_'+v.driver_language_speaking+'_'+k).prop('checked',true);
                  $('#edit_driver_language_reading_'+v.driver_language_reading+'_'+k).prop('checked',true);
                  $('#edit_driver_language_writing_'+v.driver_language_writing+'_'+k).prop('checked',true);
              });
          }else{
              driver_language_item = '<tr><td colspan="7">ไม่พบข้อมูล</td></tr>';
              $('#edit_driver_language').append(driver_language_item);
          }

          // ข้อมูลอื่น ๆ
          $('#edit_driver_expected_salary').val(addNumformat(data.driver_expected_salary));
          $('#edit_driver_availlale_date').val(data.driver_availlale_date);
          $('#edit_driver_military_status').val(data.driver_military_status).change();
          $('#edit_driver_military_reason').val(data.driver_military_reason);
          $('#edit_driver_vehicles_'+data.driver_vehicles).prop('checked',true);
          $('#edit_driver_driver_license_no').val(data.driver_driver_license_no);
          $('#edit_driver_driver_license_date').val(data.driver_driver_license_date);
          if(data.job_answer.length > 0){
              $.each(data.job_answer, function(k,v){
                  $('#edit_job_answer_answer_'+v.job_answer_answer+'_'+v.job_question_id).prop('checked', true);
                  $('#edit_job_answer_note_'+v.job_question_id).val(v.job_answer_note);
                  $('#edit_job_answer_id_'+v.job_question_id).val(v.job_answer_id);
              });
          }

          // บุคคลอ้างอิง
          if(data.driver_reference.length > 0){
              $.each(data.driver_reference, function(k,v){
                  driver_reference_item += '<tr id="edit_driver_reference_'+k+'"><input type="hidden" name="driver_reference['+k+'][driver_reference_id]" value="'+v.driver_reference_id+'">';
                  driver_reference_item += '		<td><input type="text" class="form-control" name="driver_reference['+k+'][driver_reference_name]" value="'+v.driver_reference_name+'"></td>';
                  driver_reference_item += '		<td><input type="text" class="form-control" name="driver_reference['+k+'][driver_reference_lastname]" value="'+v.driver_reference_lastname+'"></td>';
                  driver_reference_item += '		<td><input type="text" class="form-control" name="driver_reference['+k+'][driver_reference_relationship]" value="'+v.driver_reference_relationship+'"></td>';
                  driver_reference_item += '		<td><input type="text" class="form-control" name="driver_reference['+k+'][driver_reference_company]" value="'+v.driver_reference_company+'"></td>';
                  driver_reference_item += '		<td><input type="text" class="form-control" name="driver_reference['+k+'][driver_reference_occupation]" value="'+v.driver_reference_occupation+'"></td>';
                  driver_reference_item += '		<td><input type="text" class="form-control" name="driver_reference['+k+'][driver_reference_mobile]" value="'+v.driver_reference_mobile+'"></td>';
                  driver_reference_item += '		<td>';
                  driver_reference_item += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_reference(\''+k+'\');" href="javascript:void(0)">';
                  driver_reference_item += '				<i class="mdi mdi-minus"></i>';
                  driver_reference_item += '			</a>';
                  driver_reference_item += '		</td>';
                  driver_reference_item += '	</tr>';
              });
          }else{
              driver_reference_item = '<tr><td colspan="7">ไม่พบข้อมูล</td></tr>';
          }
          $('#edit_driver_reference').append(driver_reference_item);

          // บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน
          if(data.driver_emergency_contact.length > 0){
              $.each(data.driver_emergency_contact, function(k,v){
                  driver_emergency_contact_item += '<tr id="edit_driver_emergency_contacts_'+k+'"><input type="hidden" name="driver_emergency_contacts['+k+'][driver_emergency_contacts_id]" value="'+v.driver_emergency_contacts_id+'">';
                  driver_emergency_contact_item += '	<td><input type="text" class="form-control" name="driver_emergency_contacts['+k+'][driver_emergency_contacts_name]" value="'+v.driver_emergency_contacts_name+'"></td>';
                  driver_emergency_contact_item += '	<td><input type="text" class="form-control" name="driver_emergency_contacts['+k+'][driver_emergency_contacts_lastname]" value="'+v.driver_emergency_contacts_lastname+'"></td>';
                  driver_emergency_contact_item += '	<td><input type="text" class="form-control" name="driver_emergency_contacts['+k+'][driver_emergency_contacts_relationship]" value="'+v.driver_emergency_contacts_relationship+'"></td>';
                  driver_emergency_contact_item += '	<td><input type="text" class="form-control" name="driver_emergency_contacts['+k+'][driver_emergency_contacts_phone]" value="'+v.driver_emergency_contacts_phone+'"></td>';
                  driver_emergency_contact_item += '	<td><textarea cols="" class="form-control" name="driver_emergency_contacts['+k+'][driver_emergency_contacts_address]" rows="1">'+v.driver_emergency_contacts_address+'</textarea></td>';
                  driver_emergency_contact_item += '		<td>';
                  driver_emergency_contact_item += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_emergency_contact(\''+k+'\');" href="javascript:void(0)">';
                  driver_emergency_contact_item += '				<i class="mdi mdi-minus"></i>';
                  driver_emergency_contact_item += '			</a>';
                  driver_emergency_contact_item += '		</td>';
                  driver_emergency_contact_item += '	</tr>';
              });
          }else{
              driver_emergency_contact_item = '<tr><td colspan="6">ไม่พบข้อมูล</td></tr>';
          }
          $('#edit_driver_emergency_contacts').append(driver_emergency_contact_item);
          $('#edit_driver_job_new').val(data.driver_job_new);
          if(data.driver_image){
              $('#edit_driver_image').closest('.form-body').find('.preview-img').attr('src', data.driver_image);
          }else{
              $('#edit_driver_image').closest('.form-body').find('.preview-img').attr('src', '');
          }

          $('#ModalEdit').modal('show');
          $('.select2').select2();
          FormInputEdit();
      }).fail(function(res) {
          resetButton(form.find('button[type=submit]'));
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
      });
  });

  function FormInputEdit() {
      var id_count = $('#edit_table_brethren').find('tr').length;
      var id_count_work = $('#edit_work_history').find('tr').length;
      var id_training = $('#edit_training_record').find('tr').length;
      var id_driver_language = $('#edit_driver_language').find('tr').length;
      var id_driver_reference = $('#edit_driver_reference').find('tr').length;
      var id_driver_emergency_contacts = $('#edit_driver_emergency_contacts').find('tr').length;
      $("#edit_productviewModal").on("show.bs.modal", function (event) {
          var button = $(event.relatedTarget);
          var recipient = button.data("product_id");
          var modal = $(this);
      })

      $("#edit_plus_driver_emergency_contacts").on("click", function (event) {
          text_table = '<tr id="edit_driver_emergency_contacts_'+id_driver_emergency_contacts+'">';
          text_table += '	<td><input type="text" class="form-control" name="driver_emergency_contacts['+id_driver_emergency_contacts+'][driver_emergency_contacts_name]" ></td>';
          text_table += '	<td><input type="text" class="form-control" name="driver_emergency_contacts['+id_driver_emergency_contacts+'][driver_emergency_contacts_lastname]" ></td>';
          text_table += '	<td><input type="text" class="form-control" name="driver_emergency_contacts['+id_driver_emergency_contacts+'][driver_emergency_contacts_relationship]" ></td>';
          text_table += '	<td><input type="text" class="form-control" name="driver_emergency_contacts['+id_driver_emergency_contacts+'][driver_emergency_contacts_phone]" ></td>';
          text_table += '	<td><textarea cols="" class="form-control" name="driver_emergency_contacts['+id_driver_emergency_contacts+'][driver_emergency_contacts_address]"  rows="1"></textarea></td>';
          text_table += '		<td>';
          text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_emergency_contact(\''+id_driver_emergency_contacts+'\');" href="javascript:void(0)">';
          text_table += '				<i class="mdi mdi-minus"></i>';
          text_table += '			</a>';
          text_table += '		</td>';
          text_table += '	</tr>';
          id_driver_emergency_contacts++;
          $("#edit_driver_emergency_contacts").append(text_table);
      });

      $("#edit_plus_driver_reference").on("click", function (event) {
          text_table = '<tr id="edit_driver_reference_'+id_driver_reference+'">';
          text_table += '		<td><input type="text" class="form-control" name="driver_reference['+id_driver_reference+'][driver_reference_name]" ></td>';
          text_table += '		<td><input type="text" class="form-control" name="driver_reference['+id_driver_reference+'][driver_reference_lastname]" ></td>';
          text_table += '		<td><input type="text" class="form-control" name="driver_reference['+id_driver_reference+'][driver_reference_relationship]" ></td>';
          text_table += '		<td><input type="text" class="form-control" name="driver_reference['+id_driver_reference+'][driver_reference_company]" ></td>';
          text_table += '		<td><input type="text" class="form-control" name="driver_reference['+id_driver_reference+'][driver_reference_occupation]" ></td>';
          text_table += '		<td><input type="text" class="form-control" name="driver_reference['+id_driver_reference+'][driver_reference_mobile]" ></td>';
          text_table += '		<td>';
          text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_reference(\''+id_driver_reference+'\');" href="javascript:void(0)">';
          text_table += '				<i class="mdi mdi-minus"></i>';
          text_table += '			</a>';
          text_table += '		</td>';
          text_table += '	</tr>';
          id_driver_reference++;
          $("#edit_driver_reference").append(text_table);
      });

      $("#edit_plus_work_history").on("click", function (event) {
          var year = '';
          var select_years = '<option value="">เลือกปี</option>';
          for(year=1970; year<=3000; year++){
              select_years += "<option value='"+year+"'>"+year+"</option>";
          }
          text_table ='<div id="work_history_'+id_count_work+'">';
          text_table +='<div class="text-right"> ';
          text_table += '<a class="btn btn-circle btn-danger text-white" onclick="delete_row_work_history(\''+id_count_work+'\');" href="javascript:void(0)">';
          text_table += '										<i class="mdi mdi-minus"></i>';
          text_table += '									</a>';
          text_table +='</div> ';
          text_table += '	<table class="table">';
          text_table += '		<thead>';
          text_table += '			<tr>';
          text_table += '				<th scope="col">ตั้งแต่</th>';
          text_table += '				<th scope="col">ถึง</th>';
          text_table += '				<th scope="col" colspan="4">บริษัท</th>';
          text_table += '				<th scope="col" colspan="4">ตำแหน่ง</th>';
          text_table += '			</tr>';
          text_table += '		</thead>';
          text_table += '		<tbody>';
          text_table += '			<tr>';
          text_table += '			  <td>';
          text_table += '		       <select class="form-control custom-select select2" name="work_history['+id_count_work+'][work_history_from]">';
          text_table +=               select_years
          text_table += '          </select>';
          text_table += '			  </td>';
          text_table += '			  <td>';
          text_table += '		       <select class="form-control custom-select select2" name="work_history['+id_count_work+'][work_history_to]">';
          text_table +=               select_years
          text_table += '          </select>';
          text_table += '			  </td>';
          text_table += '				<td scope="col" colspan="4"><input type="text" class="form-control" name="work_history['+id_count_work+'][work_history_company]" ></td>';
          text_table += '				<td scope="col" colspan="4"><input type="text" class="form-control" name="work_history['+id_count_work+'][work_history_current_position]" ></td>';
          text_table += '			</tr>';
          text_table += '			<tr>';
          text_table += '				<td scope="col" rowspan="2">เงินเดือน</td>';
          text_table += '				<td scope="col">เริ่มต้น</td>';
          text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+id_count_work+'][work_history_salary_start]" ></td>';
          text_table += '				<td scope="col">ค่าคอมมิชชั่น</td>';
          text_table += '				<td scope="col">ค่าโทรศัพท์</td>';
          text_table += '				<td scope="col">ค่าน้ำมัน</td>';
          text_table += '				<td scope="col">โบนัส</td>';
          text_table += '				<td scope="col">เบี้ยขยัน</td>';
          text_table += '				<td scope="col">อื่นๆ</td>';
          text_table += '			</tr>';
          text_table += '			<tr>';
          text_table += '				<td scope="col">สุดท้าย</td>';
          text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+id_count_work+'][work_history_salary_end]" ></td>';
          text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+id_count_work+'][work_history_commission_start]" ></td>';
          text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+id_count_work+'][work_history_mobile_start]" ></td>';
          text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+id_count_work+'][work_history_gasoline_start]" ></td>';
          text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+id_count_work+'][work_history_bonus_start]" ></td>';
          text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+id_count_work+'][work_history_incentive_start]" ></td>';
          text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history['+id_count_work+'][work_history_other_start]" ></td>';
          text_table += '			</tr>';
          text_table += '			</tr>';
          text_table += '				<td colspan="9">';
          text_table += '					<label for="edit_work_history_details">หน้าที่และความรับผิดชอบโดยละเอียด</label>';
          text_table += '					<textarea cols="80" class="form-control" name="work_history['+id_count_work+'][work_history_details]"  rows="10"></textarea>';
          text_table += '				</td>';
          text_table += '			</tr>';
          text_table += '			</tr>';
          text_table += '				<td colspan="9">';
          text_table += '					<label for="edit_work_history_reason_for_leaving">สาเหตุที่ออก</label>';
          text_table += '					<textarea cols="80" class="form-control" name="work_history['+id_count_work+'][work_history_reason_for_leaving]"  rows="10"></textarea>';
          text_table += '				</td>';
          text_table += '			</tr>';
          text_table += '			</tr>';
          text_table += '				<td>ชื่อผู้บังคับบัญชา</td>';
          text_table += '				<td colspan="3"><input type="text" class="form-control" name="work_history['+id_count_work+'][work_history_supervison_name]" ></td>';
          text_table += '				<td colspan="2">';
          text_table += '					<div class="custom-control custom-radio">';
          text_table += '						<input type="radio" class="custom-control-input" id="edit_work_history_supervison_status_1_'+id_count_work+'" name="work_history['+id_count_work+'][work_history_supervison_status]" value="1">';
          text_table += '						<label class="custom-control-label" for="edit_work_history_supervison_status_1_'+id_count_work+'">ยินดีให้ติดต่อเพื่อสอบถามข้อมูลโทร</label>';
          text_table += '					</div>';
          text_table += '					<div class="custom-control custom-radio">';
          text_table += '						<input type="radio" class="custom-control-input" id="edit_work_history_supervison_status_0_'+id_count_work+'" name="work_history['+id_count_work+'][work_history_supervison_status]" value="0">';
          text_table += '						<label class="custom-control-label" for="edit_work_history_supervison_status_0_'+id_count_work+'">ไม่ยินดีให้ติดต่อ</label>';
          text_table += '					</div>';
          text_table += '				</td>';
          text_table += '				<td colspan="3"><input type="text" class="form-control" name="work_history['+id_count_work+'][work_history_supervison_phone]" ></td>';
          text_table += '			</tr>';
          text_table += '			<tr>';
          text_table += '			<td colspan="9">  </td>';
          text_table += '			</tr>';
          text_table += '		</tbody>';
          text_table += '	</table>';
          text_table += '	</div>';
          id_count_work++;
          $("#edit_work_history").append(text_table);
          $('.select2').select2();
          $('.price').priceFormat({
              prefix: '',
              suffix: ''
          });
      });

      $("#edit_plus_table_brethren").on("click", function (event) {
          text_table = '<tr id="edit_table_brethren_'+id_count+'">';
          text_table += '		<td scope="row"><input type="number" class="form-control" id="edit_brethren_z_index'+id_count+'" name="brethren['+id_count+'][brethren_z_index]" ></th>';
          text_table += '		<td><input type="text" class="form-control" id="edit_brethren_name'+id_count+'" name="brethren['+id_count+'][brethren_name]" ></td>';
          text_table += '		<td><input type="text" class="form-control" id="edit_brethren_lastname'+id_count+'" name="brethren['+id_count+'][brethren_lastname]" ></td>';
          text_table += '		<td><input type="number" class="form-control" id="edit_brethren_age" name="brethren['+id_count+'][brethren_age]" ></td>';
          text_table += '		<td>';
          text_table += '			<div class="custom-control custom-radio">';
          text_table += '				<input type="radio" class="custom-control-input" id="edit_brethren_realtionship_1_'+id_count+'" name="brethren['+id_count+'][brethren_realtionship]" value="1">';
          text_table += '				<label class="custom-control-label" for="edit_brethren_realtionship_1_'+id_count+'">พี่</label>';
          text_table += '			</div>';
          text_table += '			<div class="custom-control custom-radio">';
          text_table += '				<input type="radio" class="custom-control-input" id="edit_brethren_realtionship_2_'+id_count+'" name="brethren['+id_count+'][brethren_realtionship]" value="2">';
          text_table += '				<label class="custom-control-label" for="edit_brethren_realtionship_2_'+id_count+'">น้อง</label>';
          text_table += '			</div>		';
          text_table += '		</td>';
          text_table += '		<td><input type="text" class="form-control" id="edit_brethre_position'+id_count+'" name="brethren['+id_count+'][brethren_position]" ></td>';
          text_table += '		<td><input type="text" class="form-control" id="edit_brethren_company'+id_count+'" name="brethren['+id_count+'][brethren_company]" ></td>';
          text_table += '		<td><input type="text" class="form-control" id="edit_brethren_tel'+id_count+'" name="brethren['+id_count+'][brethren_tel]" ></td>';
          text_table += '		<td>';
          text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_brethren(\''+id_count+'\');" href="javascript:void(0)">';
          text_table += '				<i class="mdi mdi-minus"></i>';
          text_table += '			</a>';
          text_table += '			</td>';
          text_table += ' </tr>';
          id_count++;
          $("#edit_table_brethren").append(text_table);
      });

      $("#edit_plus_training_record").on("click", function (event) {
          var year = '';
          var select_years = '<option value="">เลือกปี</option>';
          for(year=1970; year<=3000; year++){
              select_years += "<option value='"+year+"'>"+year+"</option>";
          }
          text_table = '	<tr id="edit_training_record_'+id_training+'">							';
          text_table += '		<td scope="col">';
          text_table += '		<select class="form-control custom-select select2" name="training_record['+id_training+'][training_record_year]">';
          text_table +=         select_years
          text_table += '   </select>';
          text_table += '		</td>';
          text_table += '		<td scope="col"><input type="text" class="form-control" name="training_record['+id_training+'][training_record_course]" ></td>';
          text_table += '		<td scope="col"><input type="text" class="form-control" name="training_record['+id_training+'][training_record_insitute]" ></td>';
          text_table += '		<td scope="col"><input type="text" class="form-control" name="training_record['+id_training+'][training_record_duration]" ></td>';
          text_table += '		<td scope="col">';
          text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_training_record(\''+id_training+'\');" href="javascript:void(0)">';
          text_table += '				<i class="mdi mdi-minus"></i>';
          text_table += '			</a>';
          text_table += '		</td>';
          text_table += '	</tr>';
          id_training++;
          $("#edit_training_record").append(text_table);
          $('.select2').select2();
      });

      $("#edit_plus_driver_language").on("click", function (event) {
          var languages = '<option value="">เลือกภาษา</option>';
          @foreach($LanguageTypes as $val)
              languages += "<option value='{{$val->language_type_id}}'>{{$val->language_type_name}}</option>";
          @endforeach
          text_table = '<tr id="edit_driver_language_'+id_driver_language+'">';
          text_table += '	<td>';
          text_table += '	    <select class="form-control custom-select select2" name="driver_language['+id_driver_language+'][language_type_id]">';
          text_table +=           languages;
          text_table += '		  </select>';
          text_table += '	</td>';
          text_table += '	<td>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_speaking_3_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_speaking]" class="custom-control-input" value="3">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_speaking_3_'+id_driver_language+'">ดีมาก</label>';
          text_table += '	</div>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_speaking_2_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_speaking]" class="custom-control-input" value="2">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_speaking_2_'+id_driver_language+'">ดี</label>';
          text_table += '	</div>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_speaking_1_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_speaking]" class="custom-control-input" value="1">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_speaking_1_'+id_driver_language+'">พอใช้</label>';
          text_table += '	</div>';
          text_table += ' </td>';
          text_table += '	<td>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_reading_3_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_reading]" class="custom-control-input" value="3">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_reading_3_'+id_driver_language+'">ดีมาก</label>';
          text_table += '	</div>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_reading_2_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_reading]" class="custom-control-input" value="2">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_reading_2_'+id_driver_language+'">ดี</label>';
          text_table += '	</div>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_reading_1_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_reading]" class="custom-control-input" value="1">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_reading_1_'+id_driver_language+'">พอใช้</label>';
          text_table += '	</div>';
          text_table += ' </td>';
          text_table += '	<td>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_writing_3_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_writing]" class="custom-control-input" value="3">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_writing_3_'+id_driver_language+'">ดีมาก</label>';
          text_table += '	</div>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_writing_2_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_writing]" class="custom-control-input" value="2">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_writing_2_'+id_driver_language+'">ดี</label>';
          text_table += '	</div>';
          text_table += '	<div class="custom-control custom-radio">';
          text_table += '	    <input type="radio" id="edit_driver_language_writing_1_'+id_driver_language+'" name="driver_language['+id_driver_language+'][driver_language_writing]" class="custom-control-input" value="1">';
          text_table += '	    <label class="custom-control-label" for="edit_driver_language_writing_1_'+id_driver_language+'">พอใช้</label>';
          text_table += '	</div>';
          text_table += ' </td>';
          text_table += '	<td><input type="text" class="form-control" name="driver_language['+id_driver_language+'][driver_language_test_result]"></td>';
          text_table += '	<td><input type="number" class="form-control" name="driver_language['+id_driver_language+'][driver_language_score]"></td>';
          text_table += '	<td>';
          text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_language(\''+id_driver_language+'\');" href="javascript:void(0)">';
          text_table += '				<i class="mdi mdi-minus"></i>';
          text_table += '			</a>';
          text_table += '	</td>';
          text_table += '</tr>';
          id_driver_language++;
          $("#edit_driver_language").append(text_table);
          $('.select2').select2();
      });

      function delete_row_brethren(id_count_table){
         $("#edit_table_brethren_"+id_count_table).remove();
      }

      function delete_row_emergency_contact(id_driver_emergency_contacts){
      	 $("#edit_driver_emergency_contacts_"+id_driver_emergency_contacts).remove();
      }

      function delete_row_reference(id_driver_reference){
         $("#edit_driver_reference_"+id_driver_reference).remove();
      }

      function delete_row_work_history(id_count_work){
      	 $("#edit_work_history_"+id_count_work).remove();
      }

      function delete_row_training_record(id_training){
      	 $("#edit_training_record_"+id_training).remove();
      }

      function delete_row_language(id_driver_language){
      	 $("#edit_driver_language_"+id_driver_language).remove();
      }

      function delete_row_file(id_type_doc_driver){
      	 $("#edit_type_doc_driver_"+id_type_doc_driver).remove();
      }
  }

      $('body').on('submit', '#FormEdit', function(e) {
          e.preventDefault();
          var form = $(this);
          var id = $('#edit_id').val();
          loadingButton(form.find('button[type=submit]'));
          $.ajax({
              method: "PUT",
              url: url_gb+"/admin/JobRegister/"+id,
              data: form.serialize()
          }).done(function(res) {
              resetButton(form.find('button[type=submit]'));
              if (res.status == 1) {
                  swal(res.title, res.content, 'success');
                  form[0].reset();
                  $('#ModalEdit').modal('hide');

                  tableJobRegister.api().ajax.reload();
                //   tableDriver.api().ajax.reload();

              } else {
                  swal(res.title, res.content, 'error');
              }
          }).fail(function(res) {
              resetButton(form.find('button[type=submit]'));
              swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
          });
      });
      $(document).ready(function() {
        $("input[id=edit_driver_id_card_no]").change(function() {
            chkDigitPid($(this).val(),'edit');
        });
    });
</script>
