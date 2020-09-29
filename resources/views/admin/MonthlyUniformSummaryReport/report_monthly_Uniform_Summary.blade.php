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
                            <label class="control-label">Date</label>
                            <input type="date" id="" name="" class="form-control search_table" placeholder="">
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
                    <h4 class="card-title">Monthly Uniform Summary Report</h4>

                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                            <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                        </a>
                    </div>
                    <table class="table table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" rowspan="2"></th>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">วัน/เดือน/ปี</th>
                                <th scope="col" colspan="2">ยอดยกมา</th>
                                <th scope="col" colspan="2">รายรับ</th>
                                <th scope="col" colspan="2">รายจ่าย</th>
                                <th scope="col" colspan="2">คงเหลือ</th>
                            </tr>
                            <tr>
                                <td>จำนวนตัว</td>
                                <td>จำนวนเงิน</td>
                                <td>จำนวนตัว</td>
                                <td>จำนวนเงิน</td>
                                <td>จำนวนตัว</td>
                                <td>จำนวนเงิน</td>
                                <td>จำนวนตัว</td>
                                <td>จำนวนเงิน</td>
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
                                <th scope="row" class="text-center">1</th>
                                <td class="text-center">02/03/2563</td>
                                <td class="text-right">262</td>
                                <td class="text-right">73,360</td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">15</td>
                                <td class="text-right">4,200</td>
                                <td class="text-right">247</td>
                                <td class="text-right">69,160</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">2</th>
                                <td class="text-center">03/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">3</td>
                                <td class="text-right">840</td>
                                <td class="text-right">244</td>
                                <td class="text-right">68,320</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">3</th>
                                <td class="text-center">04/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">3</td>
                                <td class="text-right">840</td>
                                <td class="text-right">241</td>
                                <td class="text-right">67,480</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                        <label class="custom-control-label" for="customControlValidation4"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">4</th>
                                <td class="text-center">09/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">12</td>
                                <td class="text-right">3,360</td>
                                <td class="text-right">229</td>
                                <td class="text-right">64,120</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                        <label class="custom-control-label" for="customControlValidation5"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">5</th>
                                <td class="text-center">11/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">3</td>
                                <td class="text-right">840</td>
                                <td class="text-right">226</td>
                                <td class="text-right">63,280</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation6" required>
                                        <label class="custom-control-label" for="customControlValidation6"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">6</th>
                                <td class="text-center">13/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">3</td>
                                <td class="text-right">840</td>
                                <td class="text-right">223</td>
                                <td class="text-right">62,440</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation7" required>
                                        <label class="custom-control-label" for="customControlValidation7"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">7</th>
                                <td class="text-center">17/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">3</td>
                                <td class="text-right">840</td>
                                <td class="text-right">220</td>
                                <td class="text-right">61,600</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation8" required>
                                        <label class="custom-control-label" for="customControlValidation8"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">8</th>
                                <td class="text-center">20/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">12</td>
                                <td class="text-right">3,360</td>
                                <td class="text-right">208</td>
                                <td class="text-right">58,240</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation9" required>
                                        <label class="custom-control-label" for="customControlValidation9"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">9</th>
                                <td class="text-center">23/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">6</td>
                                <td class="text-right">1,680</td>
                                <td class="text-right">202</td>
                                <td class="text-right">56,560</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation10" required>
                                        <label class="custom-control-label" for="customControlValidation10"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">10</th>
                                <td class="text-center">24/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">9</td>
                                <td class="text-right">2,520</td>
                                <td class="text-right">193</td>
                                <td class="text-right">54,040</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation11" required>
                                        <label class="custom-control-label" for="customControlValidation11"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">11</th>
                                <td class="text-center">25/03/2563</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td class="text-right">-</td>
                                <td class="text-right">12</td>
                                <td class="text-right">3,360</td>
                                <td class="text-right">181</td>
                                <td class="text-right">50,680</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td scope="row"></td>
                                <th scope="row"></th>
                                <td class="text-center font-bold">รวม</td>
                                <td class="text-right font-bold">262</td>
                                <td class="text-right font-bold">73,360</td>
                                <td class="text-right font-bold">-</td>
                                <td class="text-right font-bold">-</td>
                                <td class="text-right font-bold">81</td>
                                <td class="text-right font-bold">22,680</td>
                                <td class="text-right font-bold">181</td>
                                <td class="text-right font-bold">50,680</td>
                            </tr>
                            <tr>
                                <td scope="row"></td>
                                <th scope="row"></th>
                                <td class="text-center font-bold">หมายเหตุ</td>
                                <td class="text-right font-bold">เสื้อ 280 บาท/ตัว</td>
                                <td class="text-right font-bold"></td>
                                <td class="text-right font-bold"></td>
                                <td class="text-right font-bold"></td>
                                <td class="text-right font-bold"></td>
                                <td class="text-right font-bold"></td>
                                <td class="text-right font-bold"></td>
                                <td class="text-right font-bold"></td>
                            </tr>
                        </tfoot>
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