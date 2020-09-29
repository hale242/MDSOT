@extends('layouts.layout2')
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Template payment Report</h4>

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
                                    <th scope="col">ERRMSG</th>
                                    <th scope="col">QCCORP</th>
                                    <th scope="col">QCBRANCH</th>
                                    <th scope="col">REFTYPE</th>
                                    <th scope="col">REFBOOK</th>
                                    <th scope="col">REFCODE</th>
                                    <th scope="col">PAYTYPE</th>
                                    <th scope="col">CODE</th>
                                    <th scope="col">DUEDATE</th>
                                    <th scope="col">PAYRECV</th>
                                    <th scope="col">*QCBANK</th>
                                    <th scope="col">BBRANCH</th>
                                    <th scope="col">*BANKACCT</th>
                                    <th scope="col">AMT</th>
                                    <th scope="col">PAYAMT</th>
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
                                    <td>0018</td>
                                    <td>00000</td>
                                    <td>RI</td>
                                    <td>0002</td>
                                    <td>RI181001900</td>
                                    <td>CHI</td>
                                    <td>RC181001288</td>
                                    <td>21/10/2018</td>
                                    <td>คุณอนุช xx</td>
                                    <td>UOB</td>
                                    <td></td>
                                    <td></td>
                                    <td>3810</td>
                                    <td>3810</td>
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
                                    <td>0018</td>
                                    <td>00000</td>
                                    <td>RI</td>
                                    <td>0002</td>
                                    <td>RI181001900</td>
                                    <td>CHI</td>
                                    <td>RC181001288</td>
                                    <td>21/10/2018</td>
                                    <td>คุณอนุช xx</td>
                                    <td>UOB</td>
                                    <td></td>
                                    <td></td>
                                    <td>3810</td>
                                    <td>3810</td>
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