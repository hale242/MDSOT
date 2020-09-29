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
                    <h4 class="card-title">Resignation report</h4>

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
                                <th scope="col">เลขที่เอกสาร</th>
                                <th scope="col">ชื่อ-สกุล</th>
                                <th scope="col">เริ่มงาน</th>
                                <th scope="col">ปี</th>
                                <th scope="col">เดือน</th>
                                <th scope="col">วันที่สุดท้ายที่ทำงาน</th>
                                <th scope="col">วันที่การลาออกมีผลบังคับใช้</th>
                                <th scope="col">หมายเหตุ</th>
                                <th scope="col">เขตจังหวัด</th>
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
                                <td>R202002008</td>
                                <td>สมชาย มุ่งมั่น</td>
                                <td>03/01/2020</td>
                                <td>0</td>
                                <td>3</td>
                                <td>10/02/2020</td>
                                <td>11/02/2020</td>
                                <td>กลับต่างจังหวัด</td>
                                <td>ระยอง</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2"></label>
                                    </div>
                                </td>
                                <th scope="row">2</th>
                                <td>R202002004</td>
                                <td>อนุวัฒน์ จันทกาล</td>
                                <td>04/05/2020</td>
                                <td>0</td>
                                <td>11</td>
                                <td>22/02/2019</td>
                                <td>23/02/2020</td>
                                <td>ทำธุระกิจส่วนตัว</td>
                                <td>กรุงเทพ</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">3</th>
                                <td>R202002008</td>
                                <td>ผดุง ด้วงคำ</td>
                                <td>03/04/2020</td>
                                <td>1</td>
                                <td>0</td>
                                <td>25/02/2019</td>
                                <td>02/02/2020</td>
                                <td>ได้งานใหม่</td>
                                <td>กรุงเทพ</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">4</th>
                                <td>R202002008</td>
                                <td>อัศนัย ภูมิวิศัย</td>
                                <td>07/12/2018</td>
                                <td>1</td>
                                <td>3</td>
                                <td>25/02/2020</td>
                                <td>05/03/2020</td>
                                <td>เชิญออก</td>
                                <td>กรุงเทพ</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">5</th>
                                <td>R202002008</td>
                                <td>ทวีศักดิ์ พูนสมบัติ</td>
                                <td>26/02/2020</td>
                                <td>0</td>
                                <td>1</td>
                                <td>26/02/2020</td>
                                <td>05/03/2020</td>
                                <td>เชิญออก</td>
                                <td>กรุงเทพ</td>
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