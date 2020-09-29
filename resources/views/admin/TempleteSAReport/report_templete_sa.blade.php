@extends('layouts.layout2')
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Templete SA Report</h4>

                    </div>
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                                <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                            </a>
                        </div>
                        <table class="table table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">~ERRMSG</th>
                                    <th scope="col">REFTYPE</th>
                                    <th scope="col">*QCCORP</th>
                                    <th scope="col">*QCBRANCH</th>
                                    <th scope="col">*QCSECT</th>
                                    <th scope="col">*QCJOB</th>
                                    <th scope="col">STAT</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">/RECEDATE</th>
                                    <th scope="col">DUEDATE</th>
                                    <th scope="col">*QCBOOK</th>
                                    <th scope="col">CODE</th>
                                    <th scope="col">REFNO</th>
                                    <th scope="col">/DISCAMT1</th>
                                    <th scope="col">/HDISCSTR</th>
                                    <th scope="col">AMT</th>
                                    <th scope="col">VATISOUT</th>
                                    <th scope="col">VATTYPE</th>
                                    <th scope="col">VATAMT</th>
                                    <th scope="col">*QCCOOR</th>
                                    <th scope="col">QCEMPL</th>
                                    <th scope="col">CREDTERM</th>
                                    <th scope="col">HASRET</th>
                                    <th scope="col">DETAIL</th>
                                    <th scope="col">*QCPROD</th>
                                    <th scope="col">*QCWHOUSE</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">DISCSTR</th>
                                    <th scope="col">*QCUM</th>
                                    <th scope="col">UMQTY</th>
                                    <th scope="col">/REMARKH1</th>
                                    <th scope="col">/REMARKH2</th>
                                    <th scope="col">/REMARKH3</th>
                                    <th scope="col">/REMARKH4</th>
                                    <th scope="col">/REMARKH5</th>
                                    <th scope="col">/REMARKH6</th>
                                    <th scope="col">/REMARKH7</th>
                                    <th scope="col">/REMARKH8</th>
                                    <th scope="col">/REMARKH9</th>
                                    <th scope="col">/REMARKH10</th>
                                    <th scope="col">/REMARKI1</th>
                                    <th scope="col">/REMARKI2</th>
                                    <th scope="col">/REMARKI3</th>
                                    <th scope="col">/REMARKI4</th>
                                    <th scope="col">/REMARKI5</th>
                                    <th scope="col">/REMARKI6</th>
                                    <th scope="col">/REMARKI7</th>
                                    <th scope="col">/REMARKI8</th>
                                    <th scope="col">/REMARKI9</th>
                                    <th scope="col">/REMARKI10</th>
                                    <th scope="col">STOCKUPD</th>
                                    <th scope="col">REFTYPINV</th>
                                    <th scope="col">REFBOOK</th>
                                    <th scope="col">REFINV</th>
                                    <th scope="col">qccurrency</th>
                                    <th scope="col">xrate</th>
                                    <th scope="col">discamtk</th>
                                    <th scope="col">amtke</th>
                                    <th scope="col">vatamtke</th>
                                    <th scope="col">lot</th>
                                    <th scope="col">priceke</th>
                                    <th scope="col">**discamtik</th>
                                </tr>
                                <tr>
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
                                    <td>SA</td>
                                    <td>0022</td>
                                    <td>00000</td>
                                    <td>00000</td>
                                    <td>-</td>
                                    <td></td>
                                    <td>21/06/2020</td>
                                    <td>21/06/2020</td>
                                    <td>21/06/2020</td>
                                    <td>0001</td>
                                    <td></td>
                                    <td>CN00618060003</td>
                                    <td></td>
                                    <td></td>
                                    <td>4337.93</td>
                                    <td>N</td>
                                    <td>6</td>
                                    <td>303.65</td>
                                    <td>M00002</td>
                                    <td></td>
                                    <td>15.00</td>
                                    <td>Y</td>
                                    <td>มิลเลนเนียม ออโต้กรุ๊ป จำกัด</td>
                                    <td>CR002</td>
                                    <td>0001</td>
                                    <td>1.00</td>
                                    <td>699.00</td>
                                    <td></td>
                                    <td>ITEM</td>
                                    <td>1.00</td>
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
                                    <td>N</td>
                                    <td></td>
                                    <td>-</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>111111</td>
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
                                    <td>SN</td>
                                    <td>0011</td>
                                    <td>0022</td>
                                    <td>00000</td>
                                    <td>-</td>
                                    <td></td>
                                    <td>21/06/2020</td>
                                    <td>21/06/2020</td>
                                    <td>21/06/2020</td>
                                    <td>0001</td>
                                    <td></td>
                                    <td>CN00618060003</td>
                                    <td></td>
                                    <td></td>
                                    <td>4337.93</td>
                                    <td>N</td>
                                    <td>6</td>
                                    <td>303.65</td>
                                    <td>M00002</td>
                                    <td></td>
                                    <td>15.00</td>
                                    <td>Y</td>
                                    <td>มิลเลนเนียม ออโต้กรุ๊ป จำกัด</td>
                                    <td>CR002</td>
                                    <td>0001</td>
                                    <td>1.00</td>
                                    <td>699.00</td>
                                    <td></td>
                                    <td>ITEM</td>
                                    <td>1.00</td>
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
                                    <td>N</td>
                                    <td></td>
                                    <td>-</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1111</td>
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