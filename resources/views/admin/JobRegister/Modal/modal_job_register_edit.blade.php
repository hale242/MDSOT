<div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขใบสมัครงาน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-3 mb-3 form-upload">
                                    <label for="edit_driver_image">รูปภาพ</label>
                                    <input type="file" class="form-control upload-image" id="edit_driver_image" name="driver_image">
                                    <img class="preview-img" style="width:100px;">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_driver_id_card_no">เลขบัตรประชาชน</label>
                                    <input type="text" class="form-control" id="edit_driver_id_card_no" name="driver[driver_id_card_no]">
                                    <span id="edit_id_card_error" style="color: red; display: none;"></span>
                                    <span id="edit_id_card_success" style="color: #28a745; display: none;"></span>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_type_job_new_id">ประเภทแหล่งที่มา</label><br>
                                    <select class="form-control custom-select select2" id="edit_type_job_new_id" name="driver[type_job_new_id]" required>
                                        <option value="">เลือกประเภทแหล่งที่มา</option>
                                        @foreach($TypeJobNews as $val)
                                        <option value="{{$val->type_job_new_id}}">{{$val->type_job_new_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="gendedr">สูบบุหรี่หรือไม่</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="N" id="edit_driver_smoke_N" name="driver[driver_smoke]">
                                            <label class="custom-control-label" for="edit_driver_smoke_N">ไม่สูบ</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="Y" id="edit_driver_smoke_Y" name="driver[driver_smoke]">
                                            <label class="custom-control-label" for="edit_driver_smoke_Y">สูบ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="edit_recruitment_position_id">ตำแหน่งงาน</label><br>
                                    <select class="form-control custom-select select2" id="edit_recruitment_position_id" name="driver[recruitment_position_id]" required>
                                        <option value="">เลือกตำแหน่งงาน</option>
                                        @foreach($RecruitmentPositions as $val)
                                        <option value="{{$val->recruitment_position_id}}">{{$val->recruitment_position_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_driver_date_in_com">วันที่สมัครงาน</label>
                                    <input type="date" class="form-control" id="edit_driver_date_in_com" name="driver[driver_date_in_com]">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_gendedr">เพศ</label>
                                    <br>
                                    @foreach($Genders as $val)
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="{{$val->gender_id}}" id="edit_gender_{{$val->gender_id}}" name="driver[gender_id]">
                                            <label class="custom-control-label" for="edit_gender_{{$val->gender_id}}">{{$val->gender_name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_name_prefix_id">คำนำหน้าชื่อ</label><br>
                                    <select class="form-control custom-select select2" id="edit_name_prefix_id" name="driver[name_prefix_id]" required>
                                        <option value="">เลือกคำนำหน้าชื่อ</option>
                                        @foreach($NamePrefixs as $val)
                                        <option value="{{$val->name_prefix_id}}">{{$val->name_prefix_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_name_th">ชื่อ</label>
                                    <input type="text" class="form-control" id="edit_driver_name_th" name="driver[driver_name_th]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_name_en">Fristname</label>
                                    <input type="text" class="form-control" id="edit_driver_name_en" name="driver[driver_name_en]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_lastname_th">นามสกุล</label>
                                    <input type="text" class="form-control" id="edit_driver_lastname_th" name="driver[driver_lastname_th]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_lastname_en">Lastname</label>
                                    <input type="text" class="form-control" id="edit_driver_lastname_en" name="driver[driver_lastname_en]">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_driver_nickname">ชื่อเล่น</label>
                                    <input type="text" class="form-control" id="edit_driver_nickname" name="driver[driver_nickname]">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_driver_id_card_date_end">วันที่บัตรหมดอายุ</label>
                                    <input type="date" class="form-control" id="edit_driver_id_card_date_end" name="driver[driver_id_card_date_end]">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_driver_height">ส่วนสูง (cm.)</label>
                                    <input type="text" class="form-control" id="edit_driver_height" name="driver[driver_height]">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_driver_weight">น้ำหนัก (kg.)</label>
                                    <input type="text" class="form-control" id="edit_driver_weight" name="driver[driver_weight]">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_driver_date_of_birth">วันเกิด</label>
                                    <input type="date" class="form-control" id="edit_driver_date_of_birth" name="driver[driver_date_of_birth]">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="edit_driver_age">อายุ</label>
                                    <input type="number" class="form-control" id="edit_driver_age" name="driver[driver_age]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_nationality">สัญชาติ</label>
                                    <input type="text" class="form-control" id="edit_driver_nationality" name="driver[driver_nationality]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_religion">ศาสนา</label>
                                    <input type="text" class="form-control" id="edit_driver_religion" name="driver[driver_religion]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_place_of_birth">สถานที่เกิด</label>
                                    <input type="text" class="form-control" id="edit_driver_place_of_birth" name="driver[driver_place_of_birth]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_email">อีเมล</label>
                                    <input type="email" class="form-control" id="edit_driver_email" name="driver[driver_email]">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_phone">โทรศัพท์</label>
                                    <input type="text" class="form-control" id="edit_driver_phone" name="driver[driver_phone]">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_phone_2">โทรศัพท์ สำรอง</label>
                                    <input type="text" class="form-control" id="edit_driver_phone_2" name="driver[driver_phone_2]">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_mobile_phone">โทรศัพท์มือถือ</label>
                                    <input type="text" class="form-control" id="edit_driver_mobile_phone" name="driver[driver_mobile_phone]">
                                </div>
                            </div>

                            <hr class="mt-4 mb-4">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_address">ที่อยู่ปัจจุบัน</label>
                                    <textarea cols="80" class="form-control" id="edit_driver_address" name="driver[driver_address]" rows="5"></textarea><br>
                                    <label for="edit_driver_address_en">ที่อยู่ปัจจุบัน (ภาษาอังกฤษ)</label>
                                    <textarea cols="80" class="form-control" id="edit_driver_address_en" name="driver[driver_address_en]" rows="5"></textarea>
                                </div>
                                <div class="col-md-6 mb-3 address">
                                    <label for="edit_provinces_id">จังหวัด</label><br>
                                    <select class="form-control custom-select select-province select2" id="edit_provinces_id" name="driver[provinces_id]">
                                        <option value="">เลือกจังหวัด</option>
                                        @foreach($Provinces as $val)
                                        <option value="{{$val->provinces_id}}">{{$val->provinces_name}}</option>
                                        @endforeach
                                    </select>
                                    <br><br>
                                    <label for="edit_amphures_id">อำเภอ</label><br>
                                    <select class="form-control custom-select select-amphur select2" id="edit_amphures_id" name="driver[amphures_id]">
                                        <option value="">เลือกอำเภอ</option>
                                    </select>
                                    <br><br>
                                    <label for="edit_districts_id">ตำบล</label><br>
                                    <select class="form-control custom-select select-district select2" id="edit_districts_id" name="driver[districts_id]" required>
                                        <option value="">เลือกตำบล</option>
                                    </select>
                                    <br><br>
                                    <label for="edit_zipcodes_id">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control zipcode" id="edit_zipcodes_id">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_registered_address">ที่อยู่ตามทะเบียนบ้าน</label>
                                    <textarea cols="80" class="form-control" id="edit_driver_registered_address" name="driver[driver_registered_address]" rows="5"></textarea><br>
                                    <label for="edit_driver_registered_address_en">ที่อยู่ตามทะเบียน (ภาษาอังกฤษ)</label>
                                    <textarea cols="80" class="form-control" id="edit_driver_registered_address_en" name="driver[driver_registered_address_en]" rows="5"></textarea>
                                </div>
                                <div class="col-md-6 mb-3 address">
                                    <label for="edit_registered_provinces_id">จังหวัด</label>
                                    <select class="form-control custom-select select-province select2" id="edit_registered_provinces_id">
                                        <option value="">เลือกจังหวัด</option>
                                        @foreach($Provinces as $val)
                                        <option value="{{$val->provinces_id}}">{{$val->provinces_name}}</option>
                                        @endforeach
                                    </select>
                                    <br><br>
                                    <label for="edit_registered_amphures_id">อำเภอ</label><br>
                                    <select class="form-control custom-select select-amphur select2" id="edit_registered_amphures_id">
                                        <option value="">เลือกอำเภอ</option>
                                    </select>
                                    <br><br>
                                    <label for="edit_driver_registered_address_districts_id">ตำบล</label><br>
                                    <select class="form-control custom-select select-district select2" id="edit_driver_registered_address_districts_id" name="driver[driver_registered_address_districts_id]">
                                        <option value="">เลือกตำบล</option>
                                    </select>
                                    <br><br>
                                    <label for="edit_zipcodes_id">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control zipcode" id="edit_registered_zipcodes_id">
                                </div>
                            </div>

                            <hr class="mt-4 mb-4">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_status_family">สถานภาพครอบครัว</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_status_family_1" name="driver[driver_status_family]" value="1">
                                            <label class="custom-control-label" for="edit_driver_status_family_1">โสด</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_status_family_2" name="driver[driver_status_family]" value="2">
                                            <label class="custom-control-label" for="edit_driver_status_family_2">สมรสจดทะเบียน</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_status_family_3" name="driver[driver_status_family]" value="3">
                                            <label class="custom-control-label" for="edit_driver_status_family_3">สมรสไม่จดทะเบียน</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_status_family_4" name="driver[driver_status_family]" value="4">
                                            <label class="custom-control-label" for="edit_driver_status_family_4">หย่า</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_status_family_5" name="driver[driver_status_family]" value="5">
                                            <label class="custom-control-label" for="edit_driver_status_family_5">หม้าย</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_children">จำนวนบุตร</label>
                                    <input type="number" class="form-control" id="edit_driver_children" name="driver[driver_children]">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_spouse_name">ชื่อคู่สมรส</label>
                                    <input type="text" class="form-control" id="edit_driver_spouse_name" name="driver[driver_spouse_name]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_spouse_name_en">ชื่อคู่สมรส (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="edit_driver_spouse_name_en" name="driver[driver_spouse_name_en]">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_spouse_lastname">นามสกุลคู่สมรส</label>
                                    <input type="text" class="form-control" id="edit_driver_spouse_lastname" name="driver[driver_spouse_lastname]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_spouse_lastname_en">นามสกุลคู่สมรส (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="edit_driver_spouse_lastname_en" name="driver[driver_spouse_lastname_en]">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_spouse_phone">เบอร์โทรศัพท์คู่สมรส</label>
                                    <input type="text" class="form-control" id="edit_driver_spouse_phone" name="driver[driver_spouse_phone]">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_spouse_position">ตำแหน่งงานของคู่สมรส</label>
                                    <input type="text" class="form-control" id="edit_driver_spouse_position" name="driver[driver_spouse_position]">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_spouse_company">บริษัทที่ทำงานของคู่สมรส</label>
                                    <input type="text" class="form-control" id="edit_driver_spouse_company" name="driver[driver_spouse_company]">
                                </div>
                            </div>

                            <hr class="mt-4 mb-4">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="mt-3" for="edit_">
                                        <h3>ข้อมูลบิดา</h3>
                                    </label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_father_name">ชื่อบิดา</label>
                                    <input type="text" class="form-control" id="edit_driver_father_name" name="driver[driver_father_name]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_father_name_en">ชื่อบิดา (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="edit_driver_father_name_en" name="driver[driver_father_name_en]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_father_lastname">นามสกุลบิดา</label>
                                    <input type="text" class="form-control" id="edit_driver_father_lastname" name="driver[driver_father_lastname]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_father_lastname_en">นามสกุลบิดา (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="edit_driver_father_lastname_en" name="driver[driver_father_lastname_en]">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_father_age">อายุบิดา</label>
                                    <input type="number" class="form-control" id="edit_driver_father_age" name="driver[driver_father_age]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_">สถานะ</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_father_status_1" name="driver[driver_father_status]" value="1">
                                            <label class="custom-control-label" for="edit_driver_father_status_1">มีชีวิตอยู่</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_father_status_2" name="driver[driver_father_status]" value="2">
                                            <label class="custom-control-label" for="edit_driver_father_status_2">ถึงแก่กรรม</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_father_phone">เบอร์โทรศัพท์บิดา</label>
                                    <input type="text" class="form-control" id="edit_driver_father_phone" name="driver[driver_father_phone]">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_father_position">ตำแหน่งงานของบิดา</label>
                                    <input type="text" class="form-control" id="edit_driver_father_position" name="driver[driver_father_position]">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_father_company">บริษัทที่ทำงานของบิดา</label>
                                    <input type="text" class="form-control" id="edit_driver_father_company" name="driver[driver_father_company]">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="mt-3" for="edit_">
                                        <h3>ข้อมูลมารดา</h3>
                                    </label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_mother_name">ชื่อมารดา</label>
                                    <input type="text" class="form-control" id="edit_driver_mother_name" name="driver[driver_mother_name]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_mother_name_en">ชื่อมารดา (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="edit_driver_mother_name_en" name="driver[driver_mother_name_en]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_mother_lastname">นามสกุลมารดา</label>
                                    <input type="text" class="form-control" id="edit_driver_mother_lastname" name="driver[driver_mother_lastname]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_mother_lastname_en">นามสกุลมารดา (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="edit_driver_mother_lastname_en" name="driver[driver_mother_lastname_en]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_mother_age">อายุมารดา</label>
                                    <input type="number" class="form-control" id="edit_driver_mother_age" name="driver[driver_mother_age]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_">สถานะ</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_mother_status_1" name="driver[driver_mother_status]" value="1">
                                            <label class="custom-control-label" for="edit_driver_mother_status_1">มีชีวิตอยู่</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_mother_status_2" name="driver[driver_mother_status]" value="2">
                                            <label class="custom-control-label" for="edit_driver_mother_status_2">ถึงแก่กรรม</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_mother_phone">เบอร์โทรศัพท์มารดา</label>
                                    <input type="text" class="form-control" id="edit_driver_mother_phone" name="driver[driver_mother_phone]">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_mother_position">ตำแหน่งงานของมารดา</label>
                                    <input type="text" class="form-control" id="edit_driver_mother_position" name="driver[driver_mother_position]">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="edit_driver_mother_company">บริษัทที่ทำงานของมารดา</label>
                                    <input type="text" class="form-control" id="edit_driver_mother_company" name="driver[driver_mother_company]">
                                </div>
                            </div>
                            <hr>

                            <div class="form-row mt-5">
                                <div class="col-md-12 mb-3">
                                    <label for="edit_">
                                        <h3>ข้อมูลพี่น้อง</h3>
                                    </label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ลำดับ</th>
                                                <th scope="col">ชื่อ</th>
                                                <th scope="col">นามสกุล</th>
                                                <th scope="col">อายุ</th>
                                                <th scope="col">สถานะ</th>
                                                <th scope="col">อาชีพ</th>
                                                <th scope="col">บริษัท</th>
                                                <th scope="col">โทรศัพท์</th>
                                                <th scope="col">
                                                    <a class="btn btn-circle btn-success text-white" id="edit_plus_table_brethren" href="javascript:void(0)">
                                                        <i class="ti-plus"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="edit_table_brethren">

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="edit_">
                                        <h3>ประวัติการศึกษา</h3>
                                    </label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ระดับการศึกษา</th>
                                                <th scope="col">ตั้งแต่ (Fr)</th>
                                                <th scope="col">ถึง (To)</th>
                                                <th scope="col">ชื่อสถาบันการศึกษา</th>
                                                <th scope="col">วิชาเอก / วิชาโท</th>
                                                <th scope="col" width="150">เกรดเฉลี่ย</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    ประถมศึกษา
                                                    <input type="hidden" name="education_driver[0][education_driver_id]" id="education_driver_id_1">
                                                    <input type="hidden" name="education_driver[0][education_driver_status]" value="1">
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[0][education_driver_date_fr]" id="edit_education_driver_date_fr_1">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[0][education_driver_date_to]" id="edit_education_driver_date_to_1">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[0][education_driver_name_instirute]" id="edit_education_driver_name_instirute_1">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[0][education_driver_major]" id="edit_education_driver_major_1">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[0][education_driver_gpa]" id="edit_education_driver_gpa_1">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    มัธยมศึกษา
                                                    <input type="hidden" name="education_driver[1][education_driver_id]" id="education_driver_id_2">
                                                    <input type="hidden" name="education_driver[1][education_driver_status]" value="2">
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[1][education_driver_date_fr]" id="edit_education_driver_date_fr_2">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[1][education_driver_date_to]" id="edit_education_driver_date_to_2">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[1][education_driver_name_instirute]" id="edit_education_driver_name_instirute_2">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[1][education_driver_major]" id="edit_education_driver_major_2">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[1][education_driver_gpa]" id="edit_education_driver_gpa_2">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    อาชีวศึกษา
                                                    <input type="hidden" name="education_driver[2][education_driver_id]" id="education_driver_id_3">
                                                    <input type="hidden" name="education_driver[2][education_driver_status]" value="3">
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[2][education_driver_date_fr]" id="edit_education_driver_date_fr_3">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[2][education_driver_date_to]" id="edit_education_driver_date_to_3">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[2][education_driver_name_instirute]" id="edit_education_driver_name_instirute_3">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[2][education_driver_major]" id="edit_education_driver_major_3">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[2][education_driver_gpa]" id="edit_education_driver_gpa_3">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    ปริญญาตรี
                                                    <input type="hidden" name="education_driver[3][education_driver_id]" id="education_driver_id_4">
                                                    <input type="hidden" name="education_driver[3][education_driver_status]" value="4">
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[3][education_driver_date_fr]" id="edit_education_driver_date_fr_4">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[3][education_driver_date_to]" id="edit_education_driver_date_to_4">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[3][education_driver_name_instirute]" id="edit_education_driver_name_instirute_4">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[3][education_driver_major]" id="edit_education_driver_major_4">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[3][education_driver_gpa]" id="edit_education_driver_gpa_4">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    ปริญญาโท
                                                    <input type="hidden" name="education_driver[4][education_driver_id]" id="education_driver_id_5">
                                                    <input type="hidden" name="education_driver[4][education_driver_status]" value="5">
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[4][education_driver_date_fr]" id="edit_education_driver_date_fr_5">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[4][education_driver_date_to]" id="edit_education_driver_date_to_5">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[4][education_driver_name_instirute]" id="edit_education_driver_name_instirute_5">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[4][education_driver_major]" id="edit_education_driver_major_5">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[4][education_driver_gpa]" id="edit_education_driver_gpa_5">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    อื่นๆ
                                                    <input type="hidden" name="education_driver[5][education_driver_id]" id="education_driver_id_6">
                                                    <input type="hidden" name="education_driver[5][education_driver_status]" value="6">
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[5][education_driver_date_fr]" id="edit_education_driver_date_fr_6">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select select2" name="education_driver[5][education_driver_date_to]" id="edit_education_driver_date_to_6">
                                                        <option value="">เลือกปี</option>
                                                        @for($year=1970; $year<=3000; $year++) <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[5][education_driver_name_instirute]" id="edit_education_driver_name_instirute_6">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[5][education_driver_major]" id="edit_education_driver_major_6">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_driver[5][education_driver_gpa]" id="edit_education_driver_gpa_6">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="edit_">
                                        <h3>ประวัติการทำงาน</h3>
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <a class="btn btn-circle btn-success text-white" id="edit_plus_work_history" href="javascript:void(0)">
                                        <i class="ti-plus"></i>
                                    </a>
                                </div>
                                <div class="col-md-12">
                                    <div id="edit_work_history">

                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="edit_">
                                        <h3> ประวัติการฝึกอบรม </h3>
                                    </label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ปี</th>
                                                <th scope="col">หลักสูตร</th>
                                                <th scope="col">สถาบันฝึกอบรม</th>
                                                <th scope="col">ระยะเวลา</th>
                                                <th scope="col">
                                                    <a class="btn btn-circle btn-success text-white" id="edit_plus_training_record" href="javascript:void(0)">
                                                        <i class="ti-plus"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="edit_training_record">

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="edit_driver_language">
                                        <h3>ความสามารถทางภาษา</h3>
                                        <h5 class="text-danger">*กรุณาระบุความสามารถ ดีมาก, ดี, พอใช้</h5>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ภาษา</th>
                                                <th scope="col">การพูด</th>
                                                <th scope="col">การอ่าน</th>
                                                <th scope="col">การเขียน</th>
                                                <th scope="col">ผลทดสอบด้านภาษา (ถ้ามี)</th>
                                                <th scope="col">คะแนน</th>
                                                <th scope="col">
                                                    <a class="btn btn-circle btn-success text-white" id="edit_plus_driver_language" href="javascript:void(0)">
                                                        <i class="ti-plus"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="edit_driver_language">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="edit_driver_language">
                                        <h3>ข้อมูลอื่น ๆ</h3>
                                    </label>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_expected_salary">รายได้รวมที่ต้องการ</label>
                                    <input type="text" class="form-control price" id="edit_driver_expected_salary" name="driver[driver_expected_salary]" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_availlale_date">วันที่เริ่มงานได้</label>
                                    <input type="date" class="form-control" id="edit_driver_availlale_date" name="driver[driver_availlale_date]">
                                </div>
                            </div>

                            <hr class="mt-2 mb-4">

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="edit_driver_military_status">สถานภาพทางทหาร</label>
                                        <select class="form-control custom-select search_table_select select2" name="driver[driver_military_status]" id="edit_driver_military_status" data-placeholder="" tabindex="1">
                                            <option value="">เลือกสถานภาพทางทหาร</option>
                                            <option value="1">รอเกณฑ์ทหาร</option>
                                            <option value="2">ผ่านการเกณฑ์ทหารแล้ว</option>
                                            <option value="3">ได้รับการยกเว้นโดยการเรียน ร.ด.</option>
                                            <option value="4">ได้รับการยกเว้น</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="edit_driver_military_reason">เหตุผลที่ได้รับการยกเว้น</label>
                                    <input type="text" class="form-control" id="edit_driver_military_reason" name="driver[driver_military_reason]">
                                </div>
                            </div>

                            <hr class="mt-2 mb-4">
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="edit_radio">ท่านมียานพาหนะหรือไม่</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_vehicles_0" name="driver[driver_vehicles]" value="0">
                                            <label class="custom-control-label" for="edit_driver_vehicles_0">ไม่มี</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="edit_driver_vehicles_1" name="driver[driver_vehicles]" value="1">
                                            <label class="custom-control-label" for="edit_driver_vehicles_1">มี</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 mb-3">
                                    <label for="edit_driver_driver_license_no">กรณีมีใบขับขี่รถยนต์ใบขับขี่เลขที่</label>
                                    <input type="text" class="form-control" id="edit_driver_driver_license_no" name="driver[driver_driver_license_no]">
                                </div>

                                <div class="col-md-5 mb-4">
                                    <label for="edit_driver_driver_license_date">วันหมดอายุ</label>
                                    <input type="date" class="form-control" id="edit_driver_driver_license_date" name="driver[driver_driver_license_date]">
                                </div>
                            </div>

                            <hr class="mt-2 mb-4">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <table class="table">
                                        <tbody>
                                            @foreach($JobQuestions as $key=>$val)
                                            <input type="hidden" name="job_answer[{{$key}}][job_question_id]" value="{{$val->job_question_id}}">
                                            <input type="hidden" name="job_answer[{{$key}}][job_answer_id]" id="edit_job_answer_id_{{$val->job_question_id}}">
                                            <tr>
                                                <td>
                                                    <h3>{{$val->job_question_details_th}}</h3>
                                                    <h4>{{$val->job_question_details_en}}</h4>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="edit_job_answer_answer_1_{{$val->job_question_id}}" name="job_answer[{{$key}}][job_answer_answer]" value="1">
                                                        <label class="custom-control-label" for="edit_job_answer_answer_1_{{$val->job_question_id}}">เคย (Yes) ระบุ</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="edit_job_answer_answer_0_{{$val->job_question_id}}" name="job_answer[{{$key}}][job_answer_answer]" value="0">
                                                        <label class="custom-control-label" for="edit_job_answer_answer_0_{{$val->job_question_id}}">ไม่เคย (No) </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="job_answer[{{$key}}][job_answer_note]" id="edit_job_answer_note_{{$val->job_question_id}}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="edit_driver_language">
                                        <h3>กรุณาระบุบุคคลอ้างอิง 2 ท่านที่ไม่ใช่ญาติพี่น้องของท่านหรือไม่ใช่พนักงานในบริษัทนี้</h3>
                                    </label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ชื่อ</th>
                                                <th class="text-center">นามสกุล</th>
                                                <th class="text-center">ความสัมพันธ์ </th>
                                                <th class="text-center">บริษัท</th>
                                                <th class="text-center">อาชีพ</th>
                                                <th class="text-center">เบอร์โทรศัพท์</th>
                                                <th class="text-center">
                                                    <a class="btn btn-circle btn-success text-white" id="edit_plus_driver_reference" href="javascript:void(0)">
                                                        <i class="ti-plus"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="edit_driver_reference">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="edit_driver_language">
                                        <h3>กรุณาระบุบุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน (Person to be contacted in case of emergency)</h3>
                                    </label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ชื่อ</th>
                                                <th class="text-center">นามสกุล</th>
                                                <th class="text-center">ความสัมพันธ์</th>
                                                <th class="text-center">โทรศัพท์</th>
                                                <th class="text-center">ที่อยู่</th>
                                                <th class="text-center">
                                                    <a class="btn btn-circle btn-success text-white" id="edit_plus_driver_emergency_contacts" href="javascript:void(0)">
                                                        <i class="ti-plus"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="edit_driver_emergency_contacts">

                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label for="edit_driver_job_new">ท่านทราบข่าวการสมัครงานจาก</label>
                                    <input type="text" class="form-control" id="edit_driver_job_new" name="driver[driver_job_new]">
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>