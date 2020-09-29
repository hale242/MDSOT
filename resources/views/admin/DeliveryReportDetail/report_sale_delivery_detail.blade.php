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
                        <h4 class="card-title">Delivery Report - Detail</h4>

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
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Sales</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Contract Number</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Q'ty</th>
                                    <th scope="col">SO</th>
                                    <th scope="col">Period</th>
                                    <th scope="col">Service Rate / Contract</th>
                                    <th scope="col">Total Service Rate</th>
                                    <th scope="col">Margin</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation25" required>
                                            <label class="custom-control-label" for="customControlValidation25"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">1</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td>Siam NPR Co.,Ltd.</td>
                                    <td>DA-LT-201900286</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120008</td>
                                    <td>12</td>
                                    <td>15,000</td>
                                    <td>15,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                            <label class="custom-control-label" for="customControlValidation2"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">2</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td>Siam NPR Co.,Ltd.</td>
                                    <td>DA-LT-201900286</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120008</td>
                                    <td>12</td>
                                    <td>15,000</td>
                                    <td>15,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                            <label class="custom-control-label" for="customControlValidation3"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">3</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td>Siam NPR Co.,Ltd.</td>
                                    <td>DA-LT-201900286</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120008</td>
                                    <td>12</td>
                                    <td>15,000</td>
                                    <td>15,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                            <label class="custom-control-label" for="customControlValidation4"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">4</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900280</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120010</td>
                                    <td>12</td>
                                    <td>20,000</td>
                                    <td>20,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                            <label class="custom-control-label" for="customControlValidation5"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">5</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900280</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120010</td>
                                    <td>12</td>
                                    <td>20,000</td>
                                    <td>20,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation6" required>
                                            <label class="custom-control-label" for="customControlValidation6"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">6</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900280</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120010</td>
                                    <td>12</td>
                                    <td>20,000</td>
                                    <td>20,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation7" required>
                                            <label class="custom-control-label" for="customControlValidation7"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">7</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900280</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120010</td>
                                    <td>12</td>
                                    <td>20,000</td>
                                    <td>20,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation8" required>
                                            <label class="custom-control-label" for="customControlValidation8"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">8</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900280</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120010</td>
                                    <td>12</td>
                                    <td>20,000</td>
                                    <td>20,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation9" required>
                                            <label class="custom-control-label" for="customControlValidation9"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">9</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900280</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120010</td>
                                    <td>12</td>
                                    <td>20,000</td>
                                    <td>20,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation10" required>
                                            <label class="custom-control-label" for="customControlValidation10"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">10</th>
                                    <td>01/01/2020</td>
                                    <td>31/01/2020</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900294</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120011</td>
                                    <td>12</td>
                                    <td>16,500</td>
                                    <td>16,500</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation11" required>
                                            <label class="custom-control-label" for="customControlValidation11"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">11</th>
                                    <td>03/01/2020</td>
                                    <td>02/01/2021</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900289</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120014</td>
                                    <td>12</td>
                                    <td>15,500</td>
                                    <td>15,500</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation12" required>
                                            <label class="custom-control-label" for="customControlValidation12"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">12</th>
                                    <td>04/01/2020</td>
                                    <td>03/01/2021</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900277</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120005</td>
                                    <td>12</td>
                                    <td>18,000</td>
                                    <td>18,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation13" required>
                                            <label class="custom-control-label" for="customControlValidation13"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">13</th>
                                    <td>04/01/2020</td>
                                    <td>03/01/2021</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900278</td>
                                    <td>Existing</td>
                                    <td>1</td>
                                    <td>19120006</td>
                                    <td>12</td>
                                    <td>18,000</td>
                                    <td>18,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation14" required>
                                            <label class="custom-control-label" for="customControlValidation14"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">14</th>
                                    <td>04/01/2020</td>
                                    <td>03/01/2021</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900279</td>
                                    <td>Existing</td>
                                    <td>1</td>
                                    <td>19120007</td>
                                    <td>12</td>
                                    <td>18,000</td>
                                    <td>18,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation15" required>
                                            <label class="custom-control-label" for="customControlValidation15"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">15</th>
                                    <td>07/01/2020</td>
                                    <td>06/01/2021</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900003</td>
                                    <td>Existing</td>
                                    <td>1</td>
                                    <td>19120007</td>
                                    <td>12</td>
                                    <td>18,000</td>
                                    <td>18,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation16" required>
                                            <label class="custom-control-label" for="customControlValidation16"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">16</th>
                                    <td>10/01/2020</td>
                                    <td>09/01/2021</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900007</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>19120010</td>
                                    <td>12</td>
                                    <td>18,000</td>
                                    <td>18,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation17" required>
                                            <label class="custom-control-label" for="customControlValidation17"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">17</th>
                                    <td>13/01/2020</td>
                                    <td>12/01/2021</td>
                                    <td>Pannaluk</td>
                                    <td></td>
                                    <td>DA-LT-201900085</td>
                                    <td>New</td>
                                    <td>1</td>
                                    <td>19120004</td>
                                    <td>12</td>
                                    <td>18,500</td>
                                    <td>18,500</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation19" required>
                                            <label class="custom-control-label" for="customControlValidation19"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">19</th>
                                    <td>06/01/2020</td>
                                    <td>05/01/2021</td>
                                    <td>Napathira</td>
                                    <td></td>
                                    <td>DA-LT-201900354</td>
                                    <td>Retention</td>
                                    <td>1</td>
                                    <td>20010001</td>
                                    <td>12</td>
                                    <td>16,500</td>
                                    <td>16,500</td>
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
</div>
@endsection