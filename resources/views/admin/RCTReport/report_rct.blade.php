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
                    <h4 class="card-title">RCT report</h4>

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
                                <th scope="col" rowspan="2">CODE</th>
                                <th scope="col" rowspan="2">เลขที่เอกสาร</th>
                                <th scope="col" rowspan="2">ชื่อ-สกุล</th>
                                <th scope="col" rowspan="2">วันที่มีผลบังคับใช้</th>
                                <th scope="col" colspan="2">หน่วยงานเดิม</th>
                                <th scope="col" colspan="2">หน่วยงานใหม่</th>
                                <th scope="col" rowspan="2">ทดแทน (ชื่อ-สกุล)</th>
                                <th scope="col" rowspan="2">ค่าเบี้ยขยัน</th>
                                <th scope="col" rowspan="2">ไม่เกิดอุบัติเหตุ</th>
                                <th scope="col" rowspan="2">ค่าตำแหน่ง</th>
                                <th scope="col" rowspan="2">ค่าครองชีพ</th>
                                <th scope="col" rowspan="2">ค่าภาษา</th>
                                <th scope="col" rowspan="2">ค่าโทรศัพท์</th>
                                <th scope="col" rowspan="2">ค่า OT การันตี</th>
                                <th scope="col" rowspan="2">หมายเหตุ</th>
                                <th scope="col" rowspan="2"></th>
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
                                <td>MDSSP20-060</td>
                                <td>T202002035</td>
                                <td>สมชาย มุ่งมั่น</td>
                                <td>20/02/2020</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>บจก.อาคเนย์แคปปิตอล</td>
                                <td>10,000.00</td>
                                <td>นายชรินทร์ อินพัน</td>
                                <td>500.00</td>
                                <td>500.00</td>
                                <td>-</td>
                                <td>500.00</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td></td>
                                <td>31/03/2020</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2"></label>
                                    </div>
                                </td>
                                <th scope="row">2</th>
                                <td>BBL-110</td>
                                <td>T202002036</td>
                                <td>อนุวัฒน์ จันทกาล</td>
                                <td>20/02/2020</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>Finnomena Mutual Fund Brokerage Securities</td>
                                <td>10,000.00</td>
                                <td>สัญญาใหม่</td>
                                <td>500.00</td>
                                <td>500.00</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td></td>
                                <td>25/02/2020</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">3</th>
                                <td>MDSSP20-069</td>
                                <td>T202002038</td>
                                <td>ผดุง ด้วงคำ</td>
                                <td>24/02/2020</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>Tokyo Zairyo (Thailand)</td>
                                <td>10,000.00</td>
                                <td></td>
                                <td>500.00</td>
                                <td>500.00</td>
                                <td>-</td>
                                <td>-</td>
                                <td>1,000.00</td>
                                <td>-</td>
                                <td>-</td>
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
                                <td>MDSSP829</td>
                                <td>T202002040</td>
                                <td>อัศนัย ภูมิวิศัย</td>
                                <td>24/02/2020</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td>10,000.00</td>
                                <td>Saab Asia Pacific</td>
                                <td>10,000.00</td>
                                <td></td>
                                <td>500.00</td>
                                <td>500.00</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
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
                                <td>MDSSP20-076</td>
                                <td>T202002039</td>
                                <td>ทวีศักดิ์ พูนสมบัติ</td>
                                <td>24/02/2020</td>
                                <td>ทดแทนระยอง</td>
                                <td>10,000.00</td>
                                <td>Thai Beyondz</td>
                                <td>10,000.00</td>
                                <td></td>
                                <td>500.00</td>
                                <td>500.00</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
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