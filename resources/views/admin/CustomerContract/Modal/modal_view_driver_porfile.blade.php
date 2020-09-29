<div class="modal fade" id="ModalViewDriverProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" id="view_driver_id">
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
                                            <img class="show-driver-image" width="150" alt="Logo">
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