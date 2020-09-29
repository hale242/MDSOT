@extends('layouts.layout2')
@section('content')
<div class="page-content container-fluid">
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
                        <h4 class="card-title">Staffing report</h4>

                    </div>
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                                <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Check All
                            </a>
                        </div>
                        <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">No</th>
                                    <th scope="col">รหัสพนักงาน</th>
                                    <th scope="col">ชื่อ-สกุล</th>
                                    <th scope="col">เริ่มงาน</th>
                                    <th scope="col">ประจำหน่วยงาน</th>
                                    <th scope="col">เงินเดือน</th>
                                    <th scope="col">ค่าเบี้ยขยัน</th>
                                    <th scope="col">ค่าไม่เกิดอุบัติเหตุ</th>
                                    <th scope="col">ค่าครองชีพ</th>
                                    <th scope="col">ค่าตำแหน่ง</th>
                                    <th scope="col">ค่าอื่น ๆ</th>
                                    <th scope="col">หมายเหตุ</th>
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
                                    <td></td>
                                    <td>สมชาย มุ่งมั่น</td>
                                    <td>21/02/2020</td>
                                    <td>ทดแทนลาดพร้าว</td>
                                    <td>10,000.00</td>
                                    <td>500.00</td>
                                    <td>500.00</td>
                                    <td>1,000.00</td>
                                    <td>1,000.00</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                            <label class="custom-control-label" for="customControlValidation2"></label>
                                        </div>
                                    </td>
                                    <th scope="row">2</th>
                                    <td></td>
                                    <td>อนุวัฒน์ จันทกาล</td>
                                    <td>01/02/2020</td>
                                    <td>ทดแทนระยอง</td>
                                    <td>10,000.00</td>
                                    <td>500.00</td>
                                    <td>500.00</td>
                                    <td>1,000.00</td>
                                    <td>-</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                            <label class="custom-control-label" for="customControlValidation3"></label>
                                        </div>
                                    </td>
                                    <th scope="row">3</th>
                                    <td></td>
                                    <td>ผดุง ด้วงคำ</td>
                                    <td>21/02/2020</td>
                                    <td>ทดแทนลาดพร้าว</td>
                                    <td>10,000.00</td>
                                    <td>500.00</td>
                                    <td>500.00</td>
                                    <td>1,000.00</td>
                                    <td>1,000.00</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                            <label class="custom-control-label" for="customControlValidation4"></label>
                                        </div>
                                    </td>
                                    <th scope="row">4</th>
                                    <td></td>
                                    <td>อัศนัย ภูมิวิศัย</td>
                                    <td>01/02/2020</td>
                                    <td>ทดแทนระยอง</td>
                                    <td>10,000.00</td>
                                    <td>500.00</td>
                                    <td>500.00</td>
                                    <td>1,000.00</td>
                                    <td>-</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                            <label class="custom-control-label" for="customControlValidation5"></label>
                                        </div>
                                    </td>
                                    <th scope="row">5</th>
                                    <td></td>
                                    <td>ทวีศักดิ์ พูนสมบัติ</td>
                                    <td>21/02/2020</td>
                                    <td>ทดแทนลาดพร้าว</td>
                                    <td>10,000.00</td>
                                    <td>500.00</td>
                                    <td>500.00</td>
                                    <td>1,000.00</td>
                                    <td>1,000.00</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection