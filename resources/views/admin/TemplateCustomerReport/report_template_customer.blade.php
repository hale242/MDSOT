@extends('layouts.layout2')
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Template customer Report</h4>

                    </div>
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                                <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                            </a>
                        </div>
                        <table class="table table-hover table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">No</th>
                                    <th scope="col">CODE</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">SNAME</th>
                                    <th scope="col">ADDR11</th>
                                    <th scope="col">ADDR21</th>
                                    <th scope="col">ADDR31</th>
                                    <th scope="col">NAME2</th>
                                    <th scope="col">SNAME2</th>
                                    <th scope="col">ADDR12</th>
                                    <th scope="col">ADDR22</th>
                                    <th scope="col">ADDR32</th>
                                    <th scope="col">ZIP</th>
                                    <th scope="col">TEL</th>
                                    <th scope="col">FAX</th>
                                    <th scope="col">FSTCONT</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">INACTIVE</th>
                                    <th scope="col">PERSONTY</th>
                                    <th scope="col">BILETEL</th>
                                    <th scope="col">MID</th>
                                    <th scope="col">TAXID</th>
                                    <th scope="col">QCACCHART</th>
                                    <th scope="col">QNACCHART</th>
                                    <th scope="col">CADDR11</th>
                                    <th scope="col">CADDR21</th>
                                    <th scope="col">CADDR31</th>
                                    <th scope="col">CADDR12</th>
                                    <th scope="col">CADDR22</th>
                                    <th scope="col">CADDR32</th>
                                    <th scope="col">CZIP</th>
                                    <th scope="col">CTTEL</th>
                                    <th scope="col">CTFAX</th>
                                    <th scope="col">REMLAYH</th>
                                    <th scope="col">REM</th>
                                    <th scope="col">REM2</th>
                                    <th scope="col">WEBSITE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">*QCCRGRP</th>
                                    <th scope="col">QNCRGRP</th>
                                    <th scope="col">BUSI</th>
                                    <th scope="col">*QCCRZONE</th>
                                    <th scope="col">qncrzone</th>
                                    <th scope="col">CREDLIM</th>
                                    <th scope="col">BLACK</th>
                                    <th scope="col">BLKLST</th>
                                    <th scope="col">CREDTERM</th>
                                    <th scope="col">PRICENO</th>
                                    <th scope="col">CONTACTN</th>
                                    <th scope="col">QCLAYMETHD</th>
                                    <th scope="col">QCCHQMETHD</th>
                                    <th scope="col">CREDTERM</th>
                                    <th scope="col">DISCSTR</th>
                                    <th scope="col">DISCPCN</th>
                                    <th scope="col">QCCURRENCY</th>
                                    <th scope="col">VATTYPE</th>
                                    <th scope="col">NREMARK1</th>
                                    <th scope="col">NREMARK2</th>
                                    <th scope="col">NREMARK3</th>
                                    <th scope="col">NREMARK4</th>
                                    <th scope="col">NREMARK5</th>
                                    <th scope="col">NREMARK6</th>
                                    <th scope="col">NREMARK7</th>
                                    <th scope="col">NREMARK8</th>
                                    <th scope="col">NREMARK9</th>
                                    <th scope="col">NREMARK10</th>
                                    <th scope="col">PRENAME</th>
                                    <th scope="col">PRENAME2</th>
                                    <th scope="col">NO</th>
                                    <th scope="col">FLOOR</th>
                                    <th scope="col">ROOMNO</th>
                                    <th scope="col">BUILDING</th>
                                    <th scope="col">MOO</th>
                                    <th scope="col">SOI</th>
                                    <th scope="col">ROAD</th>
                                    <th scope="col">TAMBON</th>
                                    <th scope="col">AMPHUR</th>
                                    <th scope="col">PROVINCE</th>
                                    <th scope="col">BranchNo</th>
                                    <th scope="col">BranchNM</th>
                                    <th scope="col">ISHEADBR</th>
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
                                    <td>C00805514</td>
                                    <td>Young kim</td>
                                    <td>Young kim</td>
                                    <td>XXXXXXXXXXXXXXx</td>
                                    <td>สุขุมวิท พระโขนง คลองเตย</td>
                                    <td>กรุงเทพมหานคร</td>
                                    <td>Young kim</td>
                                    <td>Young kim</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>10110</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Y</td>
                                    <td></td>
                                    <td>1 2345 67890 12 3</td>
                                    <td>1234567890123</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>01</td>
                                    <td>ลูกค้าทั่วไป</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>0</td>
                                    <td></td>
                                    <td></td>
                                    <td>0</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td>สำนักงานใหญ่</td>
                                    <td>Y</td>
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
</div>
@endsection