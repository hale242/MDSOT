@extends('layouts.layout2')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Start date</label>
                            <input type="date" id="driver_date" name="date" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">End date</label>
                            <input type="date" id="driver_date" name="driver_date" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="search_driver_name_th">Thai name</label>
                        <input type="text" id="search_driver_name_th" name="driver_name_th" class="form-control search_table" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="search_driver_name_th">English name</label>
                        <input type="text" id="search_driver_name_th" name="driver_name_th" class="form-control search_table" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_driver_date_of_birth">Date of birth</label>
                            <input type="date" id="search_driver_date_of_birth" name="driver_date_of_birth" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="search_driver_age">Age</label>
                        <input type="number" id="search_driver_age" name="driver_age" class="form-control search_table" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="search_driver_mobile_phone">Phone No.</label>
                        <input type="number" id="search_driver_mobile_phone" name="driver_mobile_phone" class="form-control search_table" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="search_driver_id_card_no">ID Card</label>
                        <input type="number" id="search_driver_id_card_no" name="driver_id_card_no" class="form-control search_table" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="recruitment_position_id">Position of driver</label>
                        <select class="form-control custom-select" id="recruitment_position_id" name="recruitment_position_id">
                            <option value="0">----Select----</option>
                            <option value="">พนักงานขับรถส่วนกลาง</option>
                            <option value="">ผู้บริหารชาวไทย</option>
                            <option value="">ผู้บริหารชาวต่างชาติ</option>
                            <option value="">พนักงานขับรถทดแทน</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="ti-search"></i> Search</button>
                <button type="button" class="btn btn-secondary clear-search">Clear</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Driver leave report</h4>

                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                            <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Check All
                        </a>
                    </div>
                    <table class="table table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" rowspan="2"></th>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">ชื่อ-สกุล</th>
                                <th scope="col" rowspan="2">วันที่มีผลบังคับใช้</th>
                                <th scope="col" colspan="2">หน่วยงานเดิม</th>
                                <th scope="col" colspan="2">หน่วยงานใหม่</th>
                                <th scope="col" rowspan="2">สิทธิการลาหยุดงาน</th>
                                <th scope="col" rowspan="2">หมายเหตุ</th>
                            </tr>
                            <tr>
                                <td>บริษัท</td>
                                <td>เงินเดือน</td>
                                <td>บริษัท</td>
                                <td>เงินเดือน</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation25" required>
                                        <label class="custom-control-label" for="customControlValidation25"></label>
                                    </div>
                                </td>
                                <th scope="row">1</th>
                                <td>สมชาย มุ่งมั่น</td>
                                <td>02/01/2020</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง <br>
                                    <u>ลาป่วย</u> ไม่ได้รับค่าจ้าง
                                </td>
                                <td>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 02/01/2020 จนถึง วันที่ 05/02/2020) <br>
                                    <u>ลาป่วย</u> ไม่ได้รับค่าจ้าง (ตั้งแต่วันที่ 06/02/2020 จนถึง วันที่ 31/03/2020)
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2"></label>
                                    </div>
                                </td>
                                <th scope="row">2</th>
                                <td>อนุวัฒน์ จันทกาล</td>
                                <td>01/01/2020</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง <br>
                                    <u>ลาป่วย</u> ไม่ได้รับค่าจ้าง
                                </td>
                                <td>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 01/01/2020 จนถึง วันที่ 04/02/2020) <br>
                                    <u>ลาป่วย</u> ไม่ได้รับค่าจ้าง (ตั้งแต่วันที่ 05/02/2020 จนถึง วันที่ 31/03/2020)
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">3</th>
                                <td>ผดุง ด้วงคำ</td>
                                <td>10/01/2020</td>
                                <td>บจก.อาคเนย์แคปปิตอล</td>
                                <td>10,000.00</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง <br>
                                    <u>ลาป่วย</u> ไม่ได้รับค่าจ้าง <br>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง (เขียนใบลาออก)
                                </td>
                                <td>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 10/01/2020 จนถึง วันที่ 13/02/2020) <br>
                                    <u>ลาป่วย</u> ไม่ได้รับค่าจ้าง (ตั้งแต่วันที่ 14/02/2020 จนถึง วันที่ 29/02/2020) <br>
                                    <u>ชดเชย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 01/03/2020 จนถึง วันที่ 31/03/2020)
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                        <label class="custom-control-label" for="customControlValidation4"></label>
                                    </div>
                                </td>
                                <th scope="row">4</th>
                                <td>อัศนัย ภูมิวิศัย</td>
                                <td>19/02/2020</td>
                                <td>Princess Beauty and Spa</td>
                                <td>10,000.00</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง <br>
                                    <u>ลาป่วย</u> ไม่ได้รับค่าจ้าง
                                </td>
                                <td>
                                    <u>ลาป่วย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 19/02/2020 จนถึง วันที่ 26/03/2020) <br>
                                    <u>ลาป่วย</u> ไม่ได้รับค่าจ้าง (ตั้งแต่วันที่ 27/03/2020 จนถึง วันที่ 31/03/2020)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
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
<div class="modal fade" id="productviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 row">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection