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
                    <h4 class="card-title">Monthly withdrawal uniform report</h4>

                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                            <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                        </a>
                    </div>
                    <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">No</th>
                                <th scope="col">เลขที่เอกสาร</th>
                                <th scope="col">ชื่อ-สกุล</th>
                                <th scope="col">วันที่เริ่มงาน</th>
                                <th scope="col">วันที่เบิก</th>
                                <th scope="col">S</th>
                                <th scope="col">M</th>
                                <th scope="col">L</th>
                                <th scope="col">XL</th>
                                <th scope="col">2XL</th>
                                <th scope="col">3XL</th>
                                <th scope="col">4XL</th>
                                <th scope="col">5XL</th>
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
                                <td>P202002001</td>
                                <td>สมชาย มุ่งมั่น</td>
                                <td>23/02/2019</td>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>3</td>
                                <td></td>
                                <td></td>
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
                                <td>P202002002</td>
                                <td>อนุวัฒน์ จันทกาล</td>
                                <td>02/03/2020</td>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>3</td>
                                <td></td>
                                <td></td>
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
                                <td>P202002003</td>
                                <td>ผดุง ด้วงคำ</td>
                                <td>02/02/2020</td>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>3</td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                                <td>P202002004</td>
                                <td>ผดุง ด้วงคำ</td>
                                <td>02/02/2020</td>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>3</td>
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
                                <td>P202002005</td>
                                <td>ผดุง ด้วงคำ</td>
                                <td>28/02/2020</td>
                                <td>03/03/2020</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>3</td>
                                <td></td>
                                <td></td>
                                <td></td>
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