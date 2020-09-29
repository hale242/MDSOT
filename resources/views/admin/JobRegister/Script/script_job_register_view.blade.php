<script>
    $('body').on('click','.btn-view',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#show_brethren_item').html('');
        $('#show_training_record_item').html('');
        $('#show_driver_language_item').html('');
        $('#show_job_answer_item').html('');
        $('#show_driver_reference_item').html('');
        $('#show_driver_emergency_contact_item').html('');
        $('#show_driver_file_item').html('');
        $('#show_work_history').html('');
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/JobRegister/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var brethren_item = '';
            var training_record_item = '';
            var driver_language_item = '';
            var job_answer_item = '';
            var driver_reference_item = '';
            var driver_emergency_contact_item = '';
            var driver_file_item = '';
            var work_history_item = '';
            var data = res.content;
            var recruitment_position_name = data.recruitment_position ? data.recruitment_position.recruitment_position_name : '';
            var gender_name = data.gender ? data.gender.gender_name : '';
            var name_prefix_name = data.name_prefix ? data.name_prefix.name_prefix_name : '';
            if(data.driver_image){
                $('.form-show-image').find('.show-driver-image').attr('src', data.driver_image);
            }else{
                $('.form-show-image').find('.show-driver-image').attr('src', '');
            }
            $('#show_interview_status_name').html(data.interview_status);
            $('#show_status_job_app_name').html(data.driver_status_job_app_name);
            $('#show_driver_code').html(data.driver_code);
            $('#show_recruitment_position_name').html(recruitment_position_name);
            $('#show_driver_date_in_com').html(data.format_driver_date_in_com);
            $('#show_driver_interview_date').html(data.format_driver_interview_date);
            $('#show_gender_name').html(gender_name);
            $('#show_name_prefix_name').html(name_prefix_name);
            $('#show_driver_name_en').html(data.driver_name_en);
            $('#show_driver_name_th').html(data.driver_name_th);
            $('#show_driver_lastname_th').html(data.driver_lastname_th);
            $('#show_driver_lastname_en').html(data.driver_lastname_en);
            $('#show_driver_nickname').html(data.driver_nickname);
            $('#show_driver_id_card_no').html(data.driver_id_card_no);
            $('#show_driver_id_card_date_end').html(data.format_driver_id_card_date_end);
            $('#show_driver_height').html(data.driver_height);
            $('#show_driver_weight').html(data.driver_weight);
            $('#show_driver_date_of_birth').html(data.format_driver_date_of_birth);
            $('#show_driver_age').html(data.driver_age);
            $('#show_driver_nationality').html(data.driver_nationality);
            $('#show_driver_religion').html(data.driver_religion);
            $('#show_driver_place_of_birth').html(data.driver_place_of_birth);
            $('#show_driver_email').html(data.driver_email);
            $('#show_driver_phone').html(data.driver_phone);
            $('#show_driver_phone_2').html(data.driver_phone_2);
            $('#show_driver_mobile_phone').html(data.driver_mobile_phone);
            $('#show_driver_address').html(data.driver_address+' ,'+data.districts.districts_name+', '+data.districts.amphures.amphures_name+', '+data.districts.provinces.provinces_name+', '+data.districts.zipcode.zipcodes_name);
            $('#show_driver_address_en').html(data.driver_address_en+' ,'+data.districts.districts_name_en+', '+data.districts.amphures.amphures_name_en+', '+data.districts.provinces.provinces_name_en+', '+data.districts.zipcode.zipcodes_name);
            $('#show_driver_registered_address').html(data.driver_registered_address+' ,'+data.registered_districts.districts_name+', '+data.registered_districts.amphures.amphures_name+', '+data.registered_districts.provinces.provinces_name+', '+data.registered_districts.zipcode.zipcodes_name);
            $('#show_driver_registered_address_en').html(data.driver_registered_address_en+' ,'+data.registered_districts.districts_name_en+', '+data.registered_districts.amphures.amphures_name_en+', '+data.registered_districts.provinces.provinces_name_en+', '+data.registered_districts.zipcode.zipcodes_name);

            // ข้อมูลครอบครัว
            $('#show_driver_status_family').html(data.driver_status_family_name);
            $('#show_driver_children').html(data.driver_children);
            $('#show_driver_spouse_name').html(data.driver_spouse_name);
            $('#show_driver_spouse_name_en').html(data.driver_spouse_name_en);
            $('#show_driver_spouse_lastname').html(data.driver_spouse_lastname);
            $('#show_driver_spouse_lastname_en').html(data.driver_spouse_lastname_en);
            $('#show_driver_spouse_phone').html(data.driver_spouse_phone);
            $('#show_driver_spouse_position').html(data.driver_spouse_position);
            $('#show_driver_spouse_company').html(data.driver_spouse_company);

            // ข้อมูลบิดา - มารดา
            var father_name_th = data.driver_father_name ? data.driver_father_name : '';
            var father_name_en = data.driver_father_name_en ? data.driver_father_name_en : '';
            var father_lastname_th = data.driver_father_lastname ? data.driver_father_lastname : '';
            var father_lastname_en = data.driver_father_lastname_en ? data.driver_father_lastname_en : '';
            var mother_name_th = data.driver_mother_name ? data.driver_mother_name : '';
            var mother_name_en = data.driver_mother_name_en ? data.driver_mother_name_en : '';
            var mother_lastname_th = data.driver_mother_lastname ? data.driver_mother_lastname : '';
            var mother_lastname_en = data.driver_mother_lastname_en ? data.driver_mother_lastname_en : '';
            $('#show_driver_father_name').html(father_name_th+'<br>'+father_name_en);
            $('#show_driver_father_lastname').html(father_lastname_th+'<br>'+father_lastname_en);
            $('#show_driver_father_age').html(data.driver_father_age);
            $('#show_driver_father_status').html(data.driver_father_status_name);
            $('#show_driver_father_phone').html(data.driver_father_phone);
            $('#show_driver_father_position').html(data.driver_father_position);
            $('#show_driver_father_company').html(data.driver_father_company);
            $('#show_driver_mother_name').html(mother_name_th+'<br>'+mother_name_en);
            $('#show_driver_mother_lastname').html(mother_lastname_th+'<br>'+mother_lastname_en);
            $('#show_driver_mother_age').html(data.driver_mother_age);
            $('#show_driver_mother_status').html(data.driver_mother_status_name);
            $('#show_driver_mother_phone').html(data.driver_mother_phone);
            $('#show_driver_mother_position').html(data.driver_mother_position);
            $('#show_driver_mother_company').html(data.driver_mother_company);
            $('#show_driver_job_new').html(data.driver_job_new);

            // ข้อมูลพี่น้อง
            if(data.brethren.length > 0){
                $.each(data.brethren, function(k,v){
                    var realtionship = ['', 'พี่', 'น้อง'];
                    brethren_item += '<tr>\
                        <td><label for="example-text-input" class="col-form-label">'+v.brethren_z_index+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.brethren_name+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.brethren_lastname+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+realtionship[v.brethren_realtionship]+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.brethren_age+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.brethren_position+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.brethren_company+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.brethren_tel+'</label></td>\
                    </tr>';
                });
            }else{
                brethren_item = '<tr><td colspan="8">ไม่พบข้อมูล</td></tr>';
            }
            $('#show_brethren_item').append(brethren_item);

            // ประวัติการศึกษา
            $.each(data.education_driver, function(k,v){
                $('#show_education_driver_date_fr_'+v.education_driver_status).html(v.education_driver_date_fr);
                $('#show_education_driver_date_to_'+v.education_driver_status).html(v.education_driver_date_to);
                $('#show_education_driver_name_instirute_'+v.education_driver_status).html(v.education_driver_name_instirute);
                $('#show_education_driver_major_'+v.education_driver_status).html(v.education_driver_major);
                $('#show_education_driver_gpa_'+v.education_driver_status).html(v.education_driver_gpa);
            });

            // ประวัติการทำงาน
            if(data.work_history.length > 0){
                $.each(data.work_history, function(k,v){
                    var supervison_status = ['ไม่ยินดีให้ติดต่อ', 'ยินดีให้ติดต่อเพื่อสอบถามข้อมูลโทร'];
                    var year = (v.work_history_to - v.work_history_from);
                    work_history_item += '<table class="table table-bordered table-responsive-lg">\
                        <thead>\
                            <tr>\
                                <td>จำนวนปี</td>\
                                <td>ตั้งแต่</td>\
                                <td>ถึง</td>\
                                <td colspan="4">บริษัท</td>\
                                <td colspan="3">ตำแหน่ง</td>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td><label for="example-text-input" class="col-form-label">'+year+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+v.work_history_from+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+v.work_history_to+'</label></td>\
                                <td colspan="4"><label for="example-text-input" class="col-form-label">'+v.work_history_company+'</label></td>\
                                <td colspan="3"><label for="example-text-input" class="col-form-label">'+v.work_history_current_position+'</label></td>\
                            </tr>\
                            <tr>\
                                <td><label for="example-text-input" class="col-form-label">เงินเดือน</label></td>\
                                <td><label for="example-text-input" class="col-form-label">เริ่มต้น</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+addNumformat(v.work_history_salary_start)+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label"> ค่าคอมมิชชั่น </label></td>\
                                <td><label for="example-text-input" class="col-form-label"> ค่าโทรศัพท์ </label></td>\
                                <td><label for="example-text-input" class="col-form-label"> ค่าน้ำมัน </label></td>\
                                <td><label for="example-text-input" class="col-form-label"> โบนัส </label></td>\
                                <td><label for="example-text-input" class="col-form-label"> เบี้ยขยัน </label></td>\
                                <td><label for="example-text-input" class="col-form-label"> อื่น ๆ </label></td>\
                            </tr>\
                            <tr>\
                                <td></td>\
                                <td><label for="example-text-input" class="col-form-label">สุดท้าย</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+addNumformat(v.work_history_salary_end)+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+addNumformat(v.work_history_commission_start)+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+addNumformat(v.work_history_mobile_start)+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+addNumformat(v.work_history_gasoline_start)+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+addNumformat(v.work_history_bonus_start)+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+addNumformat(v.work_history_incentive_start)+'</label></td>\
                                <td><label for="example-text-input" class="col-form-label">'+addNumformat(v.work_history_other_start)+'</label></td>\
                            </tr>\
                            <tr>\
                                <td><label for="example-text-input" class="col-form-label">หน้าที่และความรับผิดชอบโดยละเอียด</label></td>\
                                <td colspan="8">'+v.work_history_details+'</td>\
                            </tr>\
                            <tr>\
                                <td><label for="example-text-input" class="col-form-label">สาเหตุที่ออก</label></td>\
                                <td colspan="8">'+v.work_history_reason_for_leaving+'</td>\
                            </tr>\
                            <tr>\
                                <td><label for="example-text-input" class="col-form-label">ชื่อผู้บังคับบัญชา</label></td>\
                                <td colspan="8">'+v.work_history_supervison_name+'</td>\
                            </tr>\
                            <tr>\
                                <td><label for="example-text-input" class="col-form-label"></label>ติดต่อ</td>\
                                <td colspan="8">'+supervison_status[v.work_history_supervison_status]+'</td>\
                            </tr>\
                            <tr>\
                                <td><label for="example-text-input" class="col-form-label">เบอร์โทรศัพท์</label></td>\
                                <td colspan="8">'+v.work_history_supervison_phone+'</td>\
                            </tr>\
                        </tbody>\
                    </table>';
                });
            }else{
                work_history_item = '<table><tr><td>ไม่พบข้อมูล</td></tr></table>';
            }
            $('#show_work_history').append(work_history_item);

            // ประวัติการฝึกอบรม
            if(data.training_record.length > 0){
                $.each(data.training_record, function(k,v){
                    training_record_item += '<tr>\
                        <td><label for="example-text-input" class="col-form-label">'+v.training_record_year+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.training_record_course+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.training_record_insitute+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+v.training_record_duration+'</label></td>\
                    </tr>';
                });
            }else{
                training_record_item = '<tr><td colspan="4">ไม่พบข้อมูล</td></tr>';
            }
            $('#show_training_record_item').append(training_record_item);

            // ความสามารถทางภาษา
            if(data.driver_language.length > 0){
                $.each(data.driver_language, function(k,v){
                    var language = v.language_type ? v.language_type.language_type_name : '';
                    var speaking = ['', 'พอใช้', 'ดี', 'ดีมาก'];
                    driver_language_item += '<tr>\
                        <td><label for="example-text-input" class="col-form-label">'+language+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+speaking[v.driver_language_speaking]+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+speaking[v.driver_language_reading]+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+speaking[v.driver_language_writing]+'</label></td>\
                        <td>'+v.driver_language_test_result+'</td>\
                        <td>'+v.driver_language_score+'</td>\
                    </tr>';
                });
            }else{
                driver_language_item = '<tr><td colspan="6">ไม่พบข้อมูล</td></tr>';
            }
            $('#show_driver_language_item').append(driver_language_item);

            // ข้อมูลอื่น ๆ
            $('#show_driver_expected_salary').html(addNumformat(data.driver_expected_salary));
            $('#show_driver_availlale_date').html(data.format_driver_availlale_date);
            $('#show_driver_military_status').html(data.driver_military_status_name);
            $('#show_driver_military_reason').html(data.driver_military_reason);
            $('#show_driver_vehicles').html(data.driver_vehicles_name);
            $('#show_driver_driver_license_no').html(data.driver_driver_license_no);
            $('#show_driver_driver_license_date').html(data.format_driver_driver_license_date);
            if(data.job_answer.length > 0){
                $.each(data.job_answer, function(k,v){
                    var question = v.job_question ? v.job_question.job_question_details_th : '';
                    var answer = ['ไม่เคย', 'เคย'];
                    job_answer_item += '<tr>\
                        <td><label for="example-text-input" class="col-form-label">'+question+'</label></td>\
                        <td><label for="example-text-input" class="col-form-label">'+answer[v.job_answer_answer]+'</label></td>\
                    </tr>';
                });
            }
            $('#show_job_answer_item').append(job_answer_item);

            // บุคคลอ้างอิง
            if(data.driver_reference.length > 0){
                $.each(data.driver_reference, function(k,v){
                    driver_reference_item += '<tr>\
                        <td>'+(k+1)+'</td>\
                        <td>'+v.driver_reference_name+'</td>\
                        <td>'+v.driver_reference_lastname+'</td>\
                        <td>'+v.driver_reference_relationship+'</td>\
                        <td>'+v.driver_reference_company+'</td>\
                        <td>'+v.driver_reference_occupation+'</td>\
                        <td>'+v.driver_reference_mobile+'</td>\
                    </tr>';
                });
            }else{
                driver_reference_item = '<tr><td colspan="6">ไม่พบข้อมูล</td></tr>';
            }
            $('#show_driver_reference_item').append(driver_reference_item);

            // บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน
            if(data.driver_emergency_contact.length > 0){
                $.each(data.driver_emergency_contact, function(k,v){
                    driver_emergency_contact_item += '<tr>\
                        <td>'+v.driver_emergency_contacts_name+'</td>\
                        <td>'+v.driver_emergency_contacts_lastname+'</td>\
                        <td>'+v.driver_emergency_contacts_relationship+'</td>\
                        <td>'+v.driver_emergency_contacts_phone+'</td>\
                        <td>'+v.driver_emergency_contacts_address+'</td>\
                    </tr>';
                });
            }else{
                driver_emergency_contact_item = '<tr><td colspan="5">ไม่พบข้อมูล</td></tr>';
            }
            $('#show_driver_emergency_contact_item').append(driver_emergency_contact_item);

            // เอกสารอื่น ๆ
            if(data.driver_file.length > 0){
                $.each(data.driver_file, function(k,v){
                    var type = v.type_document_driver ? v.type_document_driver.type_doc_driver_name : '';
                    var detail = v.driver_file_details ? v.driver_file_details : '';
                    var date = v.driver_file_date ? v.driver_file_date : '';
                    var download = v.driver_file_part ? '<a href="'+url_gb+'/'+v.driver_file_part+'" download> <i class="mdi mdi-download"></i> Download</a>' : '';
                    driver_file_item += '<tr>\
                        <td>'+type+'</td>\
                        <td>'+download+'</td>\
                        <td>'+detail+'</td>\
                        <td>'+date+'</td>\
                    </tr>';
                });
            }else{
                driver_file_item = '<tr><td colspan="4">ไม่พบข้อมูล</td></tr>';
            }
            $('#show_driver_file_item').append(driver_file_item);
            $('#ModalView').modal('show');

            // ประวัติอาชญากรรม
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
