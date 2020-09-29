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
                        <h4 class="card-title">รายงานภาษีขาย (รวมใบเพิ่มหนี้ลดหนี้)</h4>

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
                                    <th scope="col" rowspan="2"></th>
                                    <th scope="col" rowspan="2">No</th>
                                    <th scope="col" colspan="2">ใบกำกับภาษี</th>
                                    <th scope="col" rowspan="2">ชื่อผู้ซื้อสินค้า / ผู้รับบริการ</th>
                                    <th scope="col" rowspan="2">เลขประจำตัวผู้เสียภาษีของลูกค้า / ผู้รับบริการ</th>
                                    <th scope="col" rowspan="2">สำนักงานใหญ่</th>
                                    <th scope="col" rowspan="2">สถานประกอบการสาขาที่</th>
                                    <th scope="col" rowspan="2">มูลค่าสินค้าหรือบริการ</th>
                                    <th scope="col" rowspan="2">จำนวนเงินภาษีมูลค่าเพิ่ม</th>
                                    <th scope="col" rowspan="2">มูลค่าสินค้ารวมภาษีมูลค่าเพิ่ม</th>
                                    <th scope="col" rowspan="2"></th>
                                </tr>
                                <tr class="text-center">
                                    <th scope="col">วัน/เดือน/ปี</th>
                                    <th scope="col">เลขที่อ้างอิง</th>
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
                                    <td> 03/01/2563 </td>
                                    <td> RVTA20010001 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">41,100.00</td>
                                    <td class="text-right">2,877.00</td>
                                    <td class="text-right">43,977.00</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                            <label class="custom-control-label" for="customControlValidation2"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">2</th>
                                    <td> 06/01/2563 </td>
                                    <td> RVTA20010005 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">73,468.58</td>
                                    <td class="text-right">5,142.80</td>
                                    <td class="text-right">78,611.38</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                            <label class="custom-control-label" for="customControlValidation3"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">3</th>
                                    <td> 06/01/2563 </td>
                                    <td> RVTA20010006 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">29,216.74</td>
                                    <td class="text-right">2,045.17</td>
                                    <td class="text-right">31,261.91</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                            <label class="custom-control-label" for="customControlValidation4"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">4</th>
                                    <td> 15/01/2563 </td>
                                    <td> RVTA20010033 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td>00001</td>
                                    <td class="text-right">233,197.00</td>
                                    <td class="text-right">16,323.00</td>
                                    <td class="text-right">249,520.80</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                            <label class="custom-control-label" for="customControlValidation5"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">5</th>
                                    <td> 15/01/2563 </td>
                                    <td> RVTA20010035 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">41,386.28</td>
                                    <td class="text-right">2,897.04</td>
                                    <td class="text-right">44,283.32</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation6" required>
                                            <label class="custom-control-label" for="customControlValidation6"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">6</th>
                                    <td> 15/01/2563 </td>
                                    <td> RVTA20010036 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">24,701.36</td>
                                    <td class="text-right">1,729.10</td>
                                    <td class="text-right">26,430.46</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation7" required>
                                            <label class="custom-control-label" for="customControlValidation7"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">7</th>
                                    <td> 15/01/2563 </td>
                                    <td> RVTA20010037 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">117,619.69</td>
                                    <td class="text-right">8,233.39</td>
                                    <td class="text-right">125,853.08</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation8" required>
                                            <label class="custom-control-label" for="customControlValidation8"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">8</th>
                                    <td> 20/01/2563 </td>
                                    <td> RVTA20010051 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td>00002</td>
                                    <td class="text-right">200,411.60</td>
                                    <td class="text-right">14,028.81</td>
                                    <td class="text-right">214,440.41</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation9" required>
                                            <label class="custom-control-label" for="customControlValidation9"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">9</th>
                                    <td> 20/01/2563 </td>
                                    <td> RVTA20010052 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">75,660.17</td>
                                    <td class="text-right">5,296.21</td>
                                    <td class="text-right">80,956.38</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation10" required>
                                            <label class="custom-control-label" for="customControlValidation10"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">10</th>
                                    <td> 20/01/2563 </td>
                                    <td> RVTA20010057 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">36,035.00</td>
                                    <td class="text-right">2,522.45</td>
                                    <td class="text-right">38,557.45</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation11" required>
                                            <label class="custom-control-label" for="customControlValidation11"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">11</th>
                                    <td> 22/01/2563 </td>
                                    <td> RVTA20010046 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">2,069.83</td>
                                    <td class="text-right">144.89</td>
                                    <td class="text-right">22,14.72</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation12" required>
                                            <label class="custom-control-label" for="customControlValidation12"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">12</th>
                                    <td> 22/01/2563 </td>
                                    <td> RVTA20010055 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">48,326.51</td>
                                    <td class="text-right">3,382.86</td>
                                    <td class="text-right">51,709.37</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation13" required>
                                            <label class="custom-control-label" for="customControlValidation13"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">13</th>
                                    <td> 22/01/2563 </td>
                                    <td> RVTA20010058 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">20,539.15</td>
                                    <td class="text-right">1,437.74</td>
                                    <td class="text-right">21,976.89</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation14" required>
                                            <label class="custom-control-label" for="customControlValidation14"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">14</th>
                                    <td> 23/01/2563 </td>
                                    <td> RVTA20010056 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">21,944.41</td>
                                    <td class="text-right">1,536.11</td>
                                    <td class="text-right">23,480.52</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation15" required>
                                            <label class="custom-control-label" for="customControlValidation15"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">15</th>
                                    <td> 23/01/2563 </td>
                                    <td> RVTA20010059 </td>
                                    <td></td>
                                    <td></td>
                                    <td>00000</td>
                                    <td></td>
                                    <td class="text-right">35,669.73</td>
                                    <td class="text-right">2,4963.88</td>
                                    <td class="text-right">38,166.61</td>
                                    <td>RV</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation16" required>
                                            <label class="custom-control-label" for="customControlValidation16"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">16</th>
                                    <td>*** รวม ***</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">1,001,346.05</td>
                                    <td class="text-right">92,560.45</td>
                                    <td class="text-right">1,071,440.30</td>
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