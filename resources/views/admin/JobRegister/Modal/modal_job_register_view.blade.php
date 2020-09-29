<div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ใบสมัครงาน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            สถานะ : <span id="show_interview_status_name"></span>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right mb-3">
                                ผลสัมภาษณ์ :
                                <h6 class="badge badge-pill text-white font-medium badge-success label-rouded" id="show_status_job_app_name"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr class="form-show-image">
                                    <td><label for="example-text-input" class="col-form-label">รูปภาพ</label></td>
                                    <td>
                                        <img class="show-driver-image" style="width: 30%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">รหัสพนักงาน</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_code"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ตำแหน่งงาน</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_recruitment_position_name"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">วันที่สมัคร</label></td>
                                    <td><label for="example-text-input" class="col-form-label"id="show_driver_date_in_com"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">วันที่เริ่มทำงาน</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_interview_date"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">อายุการทำงาน</label></td>
                                    <td><label for="example-text-input" class="col-form-label">อายุการทำงาน</label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">เพศ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_gender_name"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">คำนำหน้าชื่อ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_name_prefix_name"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ชื่อ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_name_th"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Name</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_name_en"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">นามสกุล</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_lastname_th"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Lastname</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_lastname_en"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ชื่อเล่น</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_nickname"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">เลขบัตรประชาชน</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_id_card_no"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">วันที่บัตรหมดอายุ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_id_card_date_end"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ส่วนสูง</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_height"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">น้ำหนัก</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_weight"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">วันเกิด</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_date_of_birth"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">อายุ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_age"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">สัญชาติ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_nationality"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ศาสนา</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_religion"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">สถานที่เกิด</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_place_of_birth"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">อีเมล</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_email"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">โทรศัพท์</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_phone"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">โทรศัพท์ สำรอง</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_phone_2"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">โทรศัพท์มือถือ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_mobile_phone"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ที่อยู่ปัจจุบัน</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_address"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ที่อยู่ปัจจุบัน (ภาษาอังกฤษ)</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_address_en"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ที่อยู่ตามทะเบียนบ้าน</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_registered_address"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ที่อยู่ตามทะเบียนบ้าน (ภาษาอังกฤษ)</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_registered_address_en"></label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title mt-2">ข้อมูลครอบครัว</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">สถานภาพครอบครัว</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_status_family"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">จำนวนบุตร</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_children"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ชื่อคู่สมรส</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_spouse_name"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ชื่อคู่สมรส (ภาษาอังกฤษ)</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_spouse_name_en"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">นามสกุลคู่สมรส</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_spouse_lastname"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">นามสกุลคู่สมรส (ภาษาอังกฤษ)</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_spouse_lastname_en"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">เบอร์โทรศัพท์คู่สมรส</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_spouse_phone"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ตำแหน่งงานของคู่สมรส</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_spouse_position"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">บริษัทที่ทำงานของคู่สมรส</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_spouse_company"></label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title mt-2">ข้อมูลบิดา - มารดา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td align="center">
                                        ชื่อ <br />
                                        (ชื่อภาษาไทย)
                                    </td>
                                    <td align="center">
                                        นามสกุล <br />
                                        (นามสกุลภาษาไทย)
                                    </td>
                                    <td align="center">อายุ</td>
                                    <td align="center">สถานะ</td>
                                    <td align="center">เบอร์โทรศัพท์</td>
                                    <td align="center">ตำแหน่งงาน</td>
                                    <td align="center">บริษัทที่ทำงาน</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">บิดา</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_father_name"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_father_lastname"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_father_age"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_father_status"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_father_phone"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_father_position"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_father_company"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">มารดา</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_mother_name"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_mother_lastname"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_mother_age"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_mother_status"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_mother_phone"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_mother_position"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_mother_company"></label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title mt-2">ข้อมูลพี่น้อง</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>สถานะ</td>
                                    <td>อายุ</td>
                                    <td>อาชีพ</td>
                                    <td>บริษัท</td>
                                    <td>โทรศัพท์</td>
                                </tr>
                            </thead>
                            <tbody id="show_brethren_item">

                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title mt-2">ประวัติการศึกษา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ระดับการศึกษา</td>
                                    <td>ตั้งแต่ (From)</td>
                                    <td>ถึง (Since)</td>
                                    <td>ชื่อสถาบันการศึกษา</td>
                                    <td>วิชาเอก / วิชาโท</td>
                                    <td>เกรดเฉลี่ย</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ประถมศึกษา</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_fr_1"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_to_1"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_name_instirute_1"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_major_1"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_gpa_1"> </label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">มัธยมศึกษา</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_fr_2"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_to_2"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_name_instirute_2"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_major_2"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_gpa_2"> </label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">อาชีวศึกษา</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_fr_3"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_to_3"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_name_instirute_3"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_major_3"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_gpa_3"> </label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ปริญญาตรี</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_fr_4"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_to_4"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_name_instirute_4"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_major_4"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_gpa_4"> </label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ปริญญาโท</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_fr_5"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_to_5"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_name_instirute_5"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_major_5"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_gpa_5"> </label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">อื่น ๆ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_fr_6"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_date_to_6"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_name_instirute_6"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_major_6"> </label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_education_driver_gpa_6"> </label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title mt-2">ประวัติการทำงาน</h3>
                    <div class="table-responsive" id="show_work_history">

                    </div>

                    <h3 class="box-title mt-2">ประวัติการฝึกอบรม</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ปี</td>
                                    <td>หลักสูตร</td>
                                    <td>สถาบันฝึกอบรม</td>
                                    <td>ระยะเวลา</td>
                                </tr>
                            </thead>
                            <tbody id="show_training_record_item">

                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title mt-2">ความสามารถทางภาษา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ภาษา</td>
                                    <td>การพูด</td>
                                    <td>การอ่าน</td>
                                    <td>การเขียน</td>
                                    <td>ผลทดสอบด้านภาษา (ถ้ามี)</td>
                                    <td>คะแนน</td>
                                </tr>
                            </thead>
                            <tbody id="show_driver_language_item">

                            </tbody>
                        </table>
                    </div>

                    <hr />
                    <h3 class="box-title mt-5">ข้อมูลอื่น ๆ</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">รายได้รวมที่ต้องการ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_expected_salary"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">วันที่เริ่มงานได้</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_availlale_date"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">สถานภาพทางทหาร</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_military_status"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">เหตุผลที่ได้รับการยกเว้น</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_military_reason"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ยานพาหนะ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_vehicles"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">เลขที่ใบขับขี่</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_driver_license_no"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">วันหมดอายุ</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_driver_license_date"></label></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <tbody id="show_job_answer_item">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <h3 class="box-title mt-2">บุคคลอ้างอิง</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>ความสัมพันธ์</td>
                                    <td>บริษัท</td>
                                    <td>อาชีพ</td>
                                    <td>โทรศัพท์</td>
                                </tr>
                            </thead>
                            <tbody id="show_driver_reference_item">

                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title mt-2">บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>ความสัมพันธ์</td>
                                    <td>โทรศัพท์</td>
                                    <td>ที่อยู่</td>
                                </tr>
                            </thead>
                            <tbody id="show_driver_emergency_contact_item">

                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title mt-2"></h3>
                    <!-- <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ทราบข่าวการสมัครงานจาก</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_job_new"></label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->

                    <h3 class="box-title mt-2">เอกสารอื่น ๆ</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ประเภท</td>
                                    <td>File</td>
                                    <td>รายละเอียด</td>
                                    <td>วันที่</td>
                                </tr>
                            </thead>
                            <tbody id="show_driver_file_item">

                            </tbody>
                        </table>
                    </div>

                    <hr />
                    <h3 class="box-title mt-5">ประวัติอาชญากรรม</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>วันนัดตรวจ</td>
                                    <td>ผลตรวจ</td>
                                    <td>ประเภท</td>
                                    <td>File</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5">ไม่พบข้อมูล</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr />
                    <h3 class="box-title mt-5">ผลตรวจสุขภาพ</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>สรุปผลการตรวจ</td>
                                    <td>ความเห็นแพทย์อาชีวเวชศาสตร์</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">ไม่พบข้อมูล</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr />
                    <h3 class="box-title mt-5">ข้อมูลรับชุดฟอร์มเริ่มงานใหม่/ครบปี</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>วันที่รับ</td>
                                    <td>จำนวนที่รับ</td>
                                    <td>ราคา</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4">ไม่พบข้อมูล</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">ยอดรวม</td>
                                    <td>0.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <hr />
                    <h3 class="box-title mt-5">การลาออก</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>ประเภทการลาออก</td>
                                    <td>เลขที่เอกสาร</td>
                                    <td>วันที่ทำงานวันสุดท้าย</td>
                                    <td>วันที่มีผลบังคับใช้</td>
                                    <td>เหตุผลการลาออก</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6">ไม่พบข้อมูล</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
