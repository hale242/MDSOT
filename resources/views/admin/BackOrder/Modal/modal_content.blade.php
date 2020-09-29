<div class="modal fade" id="CancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cancel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for"">Comment</label>
                                    <textarea class="form-control" id="" name="" rows="4"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="SchedInterviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1052;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Schedule an interview</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="formSched" {{--action="{{url('/admin/BackOrder/BackOrderInterview/Create')}}"--}} class="needs-validation" method="POST" validate>
                @csrf
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="driver_interview_criminal_date">Date</label>
                                    <input type="date" class="form-control" id="driver_interview_criminal_date" name="driver_interview_criminal_date" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_interview_criminal_date">Time</label>
                                    <input type="time" class="form-control" id="driver_interview_criminal_time" name="driver_interview_criminal_time" placeholder="" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" class="form-control" id="driver_id" name="driver_id">
                        <input type="hidden" class="form-control" id="driver_interview_id" name="driver_interview_id">
                        <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
                        <input type="hidden" class="form-control" id="order_spec_id" name="order_spec_id">
                        <input type="hidden" class="form-control" id="company_id_data" name="company_id">

                        <input type="hidden" class="form-control" id="gender_id" name="gender_id">
                        <input type="hidden" class="form-control" id="language" name="language">
                        <input type="hidden" class="form-control" id="position" name="position">
                        <input type="hidden" class="form-control" id="age_start" name="age_start">
                        <input type="hidden" class="form-control" id="age_end" name="age_end">
                        <input type="hidden" class="form-control" id="smoke" name="smoke">
                        <input type="hidden" class="form-control" id="history" name="history">
                        <input type="hidden" class="form-control" id="province" name="province">
                        <input type="hidden" class="form-control" id="amphur" name="amphur">
                        <input type="hidden" class="form-control" id="district" name="district">
                        <input type="hidden" class="form-control" id="status_family" name="status_family">
                        <input type="hidden" class="form-control" id="updateinter" name="updateinter">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="InterviewResultsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1052;">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Interview result</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <form id="formInterview" {{--action="{{url('/admin/BackOrder/BackOrderInterview/Update')}}"--}} method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Results</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1" id="back_order_interviwe_results1" name="back_order_interviwe_results">
                                            <label class="custom-control-label" for="back_order_interviwe_results1">Pass</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="99" id="back_order_interviwe_results2" name="back_order_interviwe_results">
                                            <label class="custom-control-label" for="back_order_interviwe_results2">Not passed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="back_order_interviwe_comment">Cause</label>
                                    <textarea class="form-control" id="back_order_interviwe_comment" name="back_order_interviwe_comment" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" class="form-control" id="back_order_interviwe_id" name="back_order_interviwe_id">
                        <input type="hidden" class="form-control" id="back_order_id_2" name="back_order_id">
                        <input type="hidden" class="form-control" id="order_spec_id_2" name="order_spec_id">


                        <input type="hidden" class="form-control" id="gender_id_2" name="gender_id">
                        <input type="hidden" class="form-control" id="language_2" name="language">
                        <input type="hidden" class="form-control" id="position_2" name="position">
                        <input type="hidden" class="form-control" id="age_start_2" name="age_start">
                        <input type="hidden" class="form-control" id="age_end_2" name="age_end">
                        <input type="hidden" class="form-control" id="smoke_2" name="smoke">
                        <input type="hidden" class="form-control" id="history_2" name="history">
                        <input type="hidden" class="form-control" id="province_2" name="province">
                        <input type="hidden" class="form-control" id="amphur_2" name="amphur">
                        <input type="hidden" class="form-control" id="district_2" name="district">
                        <input type="hidden" class="form-control" id="status_family_2" name="status_family">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ViewDetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview" style="z-index: 1051;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Confirmation code </td>
                                    <td>QT2020030013 </td>
                                </tr>
                                <tr>
                                    <td>Person </td>
                                    <td><label for="example-text-input" class="col-form-label">1</label></td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Types of customer </th>
                                    <th>Company </th>
                                    <th>Customer name </th>
                                    <th>Location</th>
                                    <th width="30%">ผู้ติดต่อ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label" id="show_customer_type_id"></label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_company_name_th"></label> </td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_customer_name"></label> </td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_locate">ที่พักผู้บริหาร</label> </td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_contact"></label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Units</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_back_order_unit"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Sales</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_sale"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Status sale</label>
                                    </td>
                                    <td> <label for="example-text-input" class="col-form-label">รอเริ่มงาน</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Sale (Area)</label>
                                    </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_sale_area"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Area</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_area"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Qualification
                                            Requirement</label> </td>
                                    <td> <label for="example-text-input"
                                            class="col-form-label" id="show_quotation_price_list_name"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Driver's Salary &
                                            Revenue Pack</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_quotation_price_list_salary"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">OT Estimates</label>
                                    </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_quotation_price_list_guarantee_ot_price"></label> </td>
                                </tr>
                                <!-- <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ประมาณการ OT
                                            พขร.ต่อเดือน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">5,000</label> </td>
                                </tr> -->
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Services charges</label>
                                    </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_quotation_price_list_service_charge_price_percent"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Sales confirmed</label>
                                    </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_sale_confirmed">08/02/2020</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Sales Comment</label>
                                    </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_sales_comment"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">OPT</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Delivery expected date</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_back_order_end_date"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Overdue (MM)
                                            (ระบุจำนวนเดือน ที่ยังสรรหา พขร.ไม่ได้)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_Count_MM"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Time length (DD)
                                            (ระบุจำนวนวัน ที่ยังสรรหา พขร.ไม่ได้)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_Count_DD"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Confirmation recruit
                                            date</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_confirmation_recruit"></label> </td>
                                </tr>
                                <!-- <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Status Operation</label>
                                    </td>
                                    <td> <label for="example-text-input" class="col-form-label">ศุภชัย ชูชื่น</label>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Status</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label" id="show_back_order_status"></label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="ModalViewDriverProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview" style="z-index: 1052;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row" align="center">
                        <div class="table-responsive" style="width:100%;">
                            <table class="table-no-border" border="0" style="width:100%;">
                                <tbody>
                                    <tr class="form-show-image">
                                        <td width="230" align="center" colspan="2">
                                            <img src="{{asset('uploads/images/logo.png')}}" height="80" alt="Logo">
                                        </td>
                                        <td rowspan="2" align="right" width="100">
                                            <img class="show-driver-image" width="150" height="180"  alt="Logo">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <h3> <b> ประวัติพนักงานขับรถยนต์ / Driver Profile </b> </h3>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" align="center">
                        <table class="table-no-border">

                            <tbody>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">ชื่อ-สกุล / Name - Surname</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_full_name"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">วันเดือนปีเกิด / Date of birth</label> </td>
                                    <td width="10">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_date_of_birth"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">อายุ / Age</label> </td>
                                    <td width="10">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_age"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">ที่อยู่ / Address</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_address_th"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> </td>
                                    <td width="1"></td>
                                    <th colspan="2" id="show_driver_address_en"></th>
                                </tr>
                                @if(App\Helper::CheckOparetion())
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">เบอร์โทรศัพท์ / Phone No.</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_mobile_phone"></label> </th>
                                </tr>
                                @endif
                                <!-- <tr style="color:red;">
                                        <td width="230"> <label for="example-text-input" class="col-form-label"></label> </td>
                                        <td width="1"></td>
                                        <td colspan="2"> <label for="example-text-input" class="col-form-label">Comment : ฝ่ายขายเรียกดูจะไม่โชว์เบอร์ /// แต่ถ้าเป็น OPT เรียกดู ให้โชว์ตามตัวอย่างได้เลย</label> </td>
                                    </tr> -->
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">เลขที่บัตรประชาชน / ID Card</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_id_card_no"></label> </th>
                                </tr>
                                <tr valign="top">
                                    <td width="230"> <label for="example-text-input" class="col-form-label">การศึกษา / Education</label> </td>

                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_education_driver"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">ชื่อ-สกุล บิดา / Father name</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_father_name"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">ชื่อ-สกุล มารดา / Mother name</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_mother_name"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">สถานภาพ / Marital status</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_status_family_name"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">คู่สมรส ชื่อ-สกุล / Spouse name</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_status_spouse_name"></label> </th>
                                </tr>
                                <tr>
                                    <td width="230"> <label for="example-text-input" class="col-form-label">จำนวนบุตร / No. of your children</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id="show_driver_children"></label> </th>
                                </tr>
                                <tr valign="top">
                                    <td width="230"> <label for="example-text-input" class="col-form-label">ประสบการณ์เดิม / Last Experience</label> </td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id='show_work_history'></label> </th>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ตำแหน่ง / Position</label> </td>
                                    <td width="1">:</td>
                                    <th colspan="2"> <label for="example-text-input" class="col-form-label" id='show_recruitment_position'></label> </th>
                                </tr>
                                <!-- <tr>
                                        <td> <label for="example-text-input" class="col-form-label">ทักษะด้านภาษา / Language Skills</label> </td>
                                        <td width="1">:</td>
                                        <th colspan="2"> <label for="example-text-input" class="col-form-label"> พอใช้ (Fair)</label> </th>
                                    </tr> -->
                            </tbody>
                        </table>
                        <div class="col-md-12 p-0">
                            <div class=" text-center">
                                <a id="print_contract" target="_blank" type="button" class="btn btn-warning btn-md" data-product_id="1">
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
