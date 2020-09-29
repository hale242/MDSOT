@extends('layouts.layout2')
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Search</h4>
                    <div class="row pt-3">
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
                        <h4 class="card-title">Quotation Report</h4>

                    </div>
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                                <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                            </a>
                        </div>
                        <table class="table table-hover table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col"></th>
                                    <th scope="col">No.</th>
                                    <th scope="col">Customer Type</th>
                                    <th scope="col">Team</th>
                                    <th scope="col">Sale Create</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Quotation No.</th>
                                    <th scope="col">Pre-Approve No.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Period</th>
                                    <th scope="col">Retail Price</th>
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
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Napathira Watcharachaowakul</td>
                                    <td>Thai Kokoku Rubber Co.,Ltd.</td>
                                    <td>QT2020030013</td>
                                    <td></td>
                                    <td>06/04/2020</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>14,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                            <label class="custom-control-label" for="customControlValidation2"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">2</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Napathira Watcharachaowakul</td>
                                    <td>Thai Kokoku Rubber Co.,Ltd.</td>
                                    <td>QT2020030014</td>
                                    <td></td>
                                    <td>14/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>14,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                            <label class="custom-control-label" for="customControlValidation3"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">3</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Napathira Watcharachaowakul</td>
                                    <td>Thai Kokoku Rubber Co.,Ltd.</td>
                                    <td>QT2020030015</td>
                                    <td></td>
                                    <td>03/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>16,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                            <label class="custom-control-label" for="customControlValidation4"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">4</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Napathira Watcharachaowakul</td>
                                    <td>Thai Kokoku Rubber Co.,Ltd.</td>
                                    <td>QT2020030016</td>
                                    <td></td>
                                    <td>15/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>14,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                            <label class="custom-control-label" for="customControlValidation5"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">5</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>Tyson Poultry (Thailand) Limited</td>
                                    <td>QT2020030017</td>
                                    <td></td>
                                    <td>23/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>14,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation6" required>
                                            <label class="custom-control-label" for="customControlValidation6"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">6</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>Tyson Poultry (Thailand) Limited</td>
                                    <td>QT2020030018</td>
                                    <td></td>
                                    <td>27/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>16,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation7" required>
                                            <label class="custom-control-label" for="customControlValidation7"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">7</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>Tyson Poultry (Thailand) Limited</td>
                                    <td>QT2020030019</td>
                                    <td></td>
                                    <td>27/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>16,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation8" required>
                                            <label class="custom-control-label" for="customControlValidation8"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">8</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>Tyson Poultry (Thailand) Limited</td>
                                    <td>QT2020030020</td>
                                    <td></td>
                                    <td>09/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>15,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation9" required>
                                            <label class="custom-control-label" for="customControlValidation9"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">9</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>Tyson Poultry (Thailand) Limited</td>
                                    <td>QT2020030021</td>
                                    <td></td>
                                    <td>29/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>14,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation10" required>
                                            <label class="custom-control-label" for="customControlValidation10"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">10</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>Tyson Poultry (Thailand) Limited</td>
                                    <td>QT2020030022</td>
                                    <td></td>
                                    <td>14/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>14,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation11" required>
                                            <label class="custom-control-label" for="customControlValidation11"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">11</th>
                                    <td>Contract End</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>Tyson Poultry (Thailand) Limited</td>
                                    <td>QT2020030023</td>
                                    <td></td>
                                    <td>27/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>15,500.00</td>
                                </tr>
                                <tr class="font-bold">
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation12" required>
                                            <label class="custom-control-label" for="customControlValidation12"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">12</th>
                                    <td></td>
                                    <td>Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>10</td>
                                    <td></td>
                                    <td>151,000.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation13" required>
                                            <label class="custom-control-label" for="customControlValidation13"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">13</th>
                                    <td>Existing</td>
                                    <td>MDS BKK</td>
                                    <td>Napathira Watcharachaowakul</td>
                                    <td>สำนักงานส่งเสริมเศรษฐกิจสร้างสรรค์ (องค์การมหาชน)</td>
                                    <td>QT2020030030</td>
                                    <td></td>
                                    <td>24/04/2020</td>
                                    <td>1</td>
                                    <td>5</td>
                                    <td>16,000.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation14" required>
                                            <label class="custom-control-label" for="customControlValidation14"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">14</th>
                                    <td>Existing</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>สำนักงานส่งเสริมเศรษฐกิจสร้างสรรค์ (องค์การมหาชน)</td>
                                    <td>QT2020030031</td>
                                    <td></td>
                                    <td>30/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>15,500.00</td>
                                </tr>
                                <tr class="font-bold">
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation15" required>
                                            <label class="custom-control-label" for="customControlValidation15"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">15</th>
                                    <td></td>
                                    <td>Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>2</td>
                                    <td></td>
                                    <td>31,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation16" required>
                                            <label class="custom-control-label" for="customControlValidation16"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">16</th>
                                    <td>New</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>URC (Thailand) Co.,Ltd</td>
                                    <td>QT2020030032</td>
                                    <td></td>
                                    <td>10/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>14,500.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation17" required>
                                            <label class="custom-control-label" for="customControlValidation17"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">17</th>
                                    <td>New</td>
                                    <td>MDS BKK</td>
                                    <td>Pannaluk Arunkasamesuk</td>
                                    <td>URC (Thailand) Co.,Ltd</td>
                                    <td>QT2020030033</td>
                                    <td></td>
                                    <td>10/04/2020</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>15,500.00</td>
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