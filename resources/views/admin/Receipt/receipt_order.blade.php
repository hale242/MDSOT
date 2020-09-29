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
                            <label class="control-label">Receipt full code</label>
                            <input type="text" id="add_receipt_order_code" name="receipt_order_code" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input type="date" id="add_receipt_order_date_invoice" name="receipt_order_date_invoice" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Net total</label>
                            <input type="number" id="add_receipt_order_net_total" name="receipt_order_net_total" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control custom-select search_table_select" name="receipt_order_status" id="add_receipt_order_status" data-placeholder="" tabindex="1">
                                <option value="2">----Select----</option>
                                <option value="0">รอยืนยันการออกใบเสร็จรับเงิน</option>
                                <option value="1">ออก ใบเสร็จรับเงิน</option>
                                <option value="99">ยกเลิก ใบเสร็จรับเงินนี้ออก ใบเสร็จรับเงินใหม่</option>
                            </select>
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
                    <h4 class="card-title">Receipt</h4>
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata" data-toggle="modal" data-target="#CreateReceiptModal" data-product_id="0">Add New</button>
                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
                            <span class="badge badge-secondary mr-2"><i class="ti-check"></i></span> Check All
                        </a>
                        <a href="javascript:void(0)" class="pr-3">
                            <span class="badge badge-danger"><i class="ti-na"></i></span> Cancel
                        </a>
                    </div>
                    <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">No</th>
                                <th scope="col">Receipt full code</th>
                                <th scope="col">Date</th>
                                <th scope="col">Net total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
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
                                <td>Receipt full code</td>
                                <td>Date</td>
                                <td>Net total</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-secondary label-rouded">รอยืนยันการออกใบเสร็จรับเงิน</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewReceiptModal" data-product_id="0">
                                        View
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-info btn-md"> Print </a>
                                    <button type="button" title="View invoice" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                                        Cancel
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2"></label>
                                    </div>
                                </td>
                                <th scope="row">2</th>
                                <td>Receipt full code</td>
                                <td>Date</td>
                                <td>Net total</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-success label-rouded">ออกใบเสร็จรับเงิน</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewReceiptModal" data-product_id="0">
                                        View
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-info btn-md"> Print </a>
                                    <button type="button" title="View invoice" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                                        Cancel
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">3</th>
                                <td>Receipt full code</td>
                                <td>Date</td>
                                <td>Net total</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-danger label-rouded">ยกเลิก ใบเสร็จรับเงินนี้ออก ใบเสร็จรับเงินใหม่</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewReceiptModal" data-product_id="0">
                                        View
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-info btn-md"> Print </a>
                                    <button type="button" title="View invoice" class="btn btn-success btn-md" data-toggle="modal" data-target="#CreateReceiptModal" data-product_id="0">
                                        Refer
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="CreateReceiptModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Receipt</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-right: 0px !important; padding-top: 15px;"> <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" width="100%" alt="Logo" /> </div>
                    <div class="col-md-7 mt-3 mb-2" style="padding-left: 0px !important;">
                        <font class="mt-5 head font-bold"> &nbsp;&nbsp;&nbsp;MASTER DRIVER & SERVICE (THAILAND) CO.,LTD.</font> <br>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;2222/9 LADPRAO RD., PHLABPHA, WANGTHONGLANG, BANGKOK 10310 <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;TEL. 02-9318787 FAX. 02-9318686<br>
                        </font>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;TAX ID. 0000000000 &nbsp;&nbsp;&nbsp;&nbsp; BRANCH : HEAD OFFICE
                        </font>
                    </div>
                    <div class="col-md-3 mt-5 mb-2 text-center">
                        <h2 class="mt-3"> Tax Invoice / Receipt</h2> 1 : 1
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="">Please select Customer</label>
                        <select class="form-control" id="add_company_name_en" name="company_name_en">
                            <option value="">-----Select------</option>
                            <option value="">Daikin Co., Ltd.</option>
                            <option value="">Majorgroup Co., Ltd.</option>
                            <option value="">Good inter group Co., Ltd.</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-8" style="padding-right: 8px;">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row p-3" style="height: 200px;">
                                        <div class="col-md-2"><label>Tax Id : </label></div>
                                        <div class="col-md-5"> 1234567890 </div>
                                        <div class="col-md-5">Branch : Head Office</div>
                                        <div class="col-md-2">Name :</div>
                                        <div class="col-md-10">
                                            <label> Intervision Co., Ltd. </label>

                                        </div>
                                        <div class="col-md-2"> Address :</div>
                                        <div class="col-md-10">
                                            <label> Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya 13210 </label>
                                        </div>
                                        <div class="col-md-2"> Tel : </div>
                                        <div class="col-md-10">
                                            <label> 02-1234567 </label>
                                        </div>
                                        <div class="col-md-2"> Fax : </div>
                                        <div class="col-md-10">
                                            <label> 02-3456789 </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4" style="padding-left: 7px;">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row p-3" style="height: 200px;">
                                        <div class="col-md-4">Tax Invoice No.</div>
                                        <div class="col-md-8">
                                            <input type="text" id="add_receipt_order_code" name="receipt_order_code" class="form-control search_table" placeholder="" value="Will show when click 'Save'" readonly>
                                        </div>
                                        <div class="col-md-4">Date</div>
                                        <div class="col-md-8">
                                            <input type="date" id="add_receipt_order_date_invoice" name="receipt_order_date_invoice" class="form-control search_table" placeholder="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table-radius" border="1" width="100%">
                            <tr class="text-center">
                                <th class="in-table" width="3%">
                                    Item
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="item0" name="item" checked>
                                        <label class="custom-control-label ml-2" for="item0"></label>
                                    </div>
                                </th>
                                <th class="in-table">Invoice</th>
                                <th class="in-table" width="13%">Date</th>
                                <th class="in-table" width="13%">Due Date</th>
                                <th class="in-table" width="16%">Debit Amount</th>
                                <th class="in-table" width="16%">Pay Amount</th>
                            </tr>
                            <tr>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="item1" name="item" checked>
                                        <label class="custom-control-label ml-2" for="item1"></label>
                                    </div>
                                </td>
                                <td class="in-table">BN200200138</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status1" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status1">DNDC20020157</label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status2" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status2">DNDC20020158 </label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status3" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status3">DNDC20020159 </label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status4" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status4">DNDC20020160</label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status5" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status5">DNDC20020148</label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 2,124.23 </td>
                                <td class="in-table text-right"> 2,124.23 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status6" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status6">DNDC20020149 </label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 19,753.87 </td>
                                <td class="in-table text-right"> 19,753.87 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="item2" name="item" checked>
                                        <label class="custom-control-label ml-2" for="item2"></label>
                                    </div>
                                </td>
                                <td class="in-table">BN200200139</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status7" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status7">DNDC20020150</label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 34,877.43 </td>
                                <td class="in-table text-right"> 34,877.43 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status8" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status8">DNDC20020151</label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 17,647.96 </td>
                                <td class="in-table text-right"> 17,647.96 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> </td>
                                <td class="in-table text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receipt_order_list_status9" name="receipt_order_list_status" checked>
                                        <label class="custom-control-label ml-2" for="receipt_order_list_status9">DNDC20020152</label>
                                    </div>
                                </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 16,839.13 </td>
                                <td class="in-table text-right"> 16,839.13 </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td class="in-table" colspan="4" rowspan="2">
                                    <label for=""> <b> Remark : </b></label>
                                    <textarea class="form-control" id="add_receipt_order_remark" name="receipt_order_remark" rows="2" cols="80"></textarea>
                                </td>
                                <td class="in-table"> <b>Sub Total</b></td>
                                <td class="in-table" align="right">

                                    143,273.47
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table"><b>Vat</b> 7% </td>
                                <td class="in-table" align="right">

                                    10,029.15
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">( ONE HUNDRED FIFTY-THREE THOUSAND, THREE HUNDRED TWO BATH AND SIXTY-TWO SATANG )</td>
                                <td class="in-table"><b>Net Total</b></td>
                                <td class="in-table" align="right">

                                    153,302.62
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Please Settle by cheque make "A/C Payee Only" <b>MASTER DRIVER & SERVICES (THAILAND) CO.,LTD.</b></label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="add_receipt_order_cash_type" name="receipt_order_cash_type">
                                    <label class="custom-control-label ml-2" for="add_receipt_order_cash_type">Cash</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="number" id="add_receipt_order_cash_price" name="receipt_order_cash_price" class="form-control" placeholder="" width="50">
                            </div>
                            <div class="col-md-2">
                                Bath
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="add_receipt_order_cheque_type" name="receipt_order_cheque_type" checked>
                                    <label class="custom-control-label ml-2" for="add_receipt_order_cheque_type">Cheque</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="number" id="add_receipt_order_cheque_price" name="receipt_order_cheque_price" class="form-control" placeholder="" value="149004.41">
                            </div>
                            <div class="col-md-2">
                                Bath
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bank
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="add_receipt_order_cheque_bank" name="receipt_order_cheque_bank" class="form-control" placeholder="" value="ไทยพาณิชย์">
                            </div>
                            <div class="col-md-2">
                                Branch
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="add_receipt_order_cheque_branch" name="receipt_order_cheque_branch" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cheque No.
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="add_receipt_order_cheque_number" name="receipt_order_cheque_number" class="form-control" placeholder="" value="0124962">
                            </div>
                            <div class="col-md-2">
                                Date
                            </div>
                            <div class="col-md-4">
                                <input type="date" id="add_receipt_order_cheque_date" name="receipt_order_cheque_date" class="form-control" placeholder="" value="2020-02-27">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="add_receipt_order_transfer_type" name="receipt_order_transfer_type">
                                    <label class="custom-control-label ml-2" for="add_receipt_order_transfer_type">Transfer</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="number" id="add_receipt_order_transfer_price" name="receipt_order_transfer_price" class="form-control" placeholder="" width="50">
                            </div>
                            <div class="col-md-2">
                                Bath
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bank
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="add_receipt_order_transfer_bank" name="receipt_order_transfer_bank" class="form-control" placeholder="" width="50">
                            </div>
                            <div class="col-md-2">
                                Account No.
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="add_receipt_order_transfer_bank_number" name="receipt_order_transfer_bank_number" class="form-control" placeholder="" width="50">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="add_receipt_order_withholding_tax_type" name="receipt_order_withholding_tax_type" checked>
                                    <label class="custom-control-label ml-2" for="add_receipt_order_withholding_tax_type">Whithholding Tax</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="" name="" class="form-control" placeholder="" value="3">
                            </div>
                            <div class="col-md-2">
                                %
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="add_receipt_order_withholding_tax_price" name="receipt_order_withholding_tax_price" class="form-control" placeholder="" value="4298.21">
                            </div>
                            <div class="col-md-1">
                                Bath
                            </div>
                        </div>
                        <p>This receipt will be officially approved with the signature of the payment collector and the Authorize and when the company receipt payment as the amount stated.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-radius" border="1" width="100%">
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12 mt-2 text-center">
                                                    <small> <b>MASTER DRIVER & SERVICES (THAILAND) CO.,LTD.</b> </small>
                                                    <br><br><br><br>
                                                    <p class="mb-0">............................................................................</p>
                                                    <label>Authorizer</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <table class="table-radius mt-2" border="1" width="100%">
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12 mt-2 text-center">
                                                    <br><br><br>
                                                    <p class="mb-0">...........................................................................</p>
                                                    <label>Collected by</label> <br>
                                                    <label>Date...............................................................</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12 text-right mt-3">
                                <h4 class="font-bold">Original - Customer</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="text-center mb-4">
                    <a href="javascript:void(0);" class="btn btn-success btn-md">
                        Save
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ViewReceiptModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-right: 0px !important; padding-top: 15px;"> <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" width="100%" alt="Logo" /> </div>
                    <div class="col-md-7 mt-3 mb-2" style="padding-left: 0px !important;">
                        <font class="mt-5 head font-bold"> &nbsp;&nbsp;&nbsp;MASTER DRIVER & SERVICE (THAILAND) CO.,LTD.</font> <br>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;2222/9 LADPRAO RD., PHLABPHA, WANGTHONGLANG, BANGKOK 10310 <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;TEL. 02-9318787 FAX. 02-9318686<br>
                        </font>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;TAX ID. 0000000000 &nbsp;&nbsp;&nbsp;&nbsp; BRANCH : HEAD OFFICE
                        </font>
                    </div>
                    <div class="col-md-3 mt-5 mb-2 text-center">
                        <h2 class="mt-3"> Tax Invoice / Receipt</h2> 1 : 1
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label> Customer Code : 1016 </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-8" style="padding-right: 8px;">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row p-3" style="height: 200px;">
                                        <div class="col-md-2"><label>Tax Id : </label></div>
                                        <div class="col-md-5">1234567890</div>
                                        <div class="col-md-5">Branch : Head Office</div>
                                        <div class="col-md-2">Name :</div>
                                        <div class="col-md-10">
                                            <label> Intervision Co., Ltd. </label>

                                        </div>
                                        <div class="col-md-2"> Address :</div>
                                        <div class="col-md-10">
                                            <label> Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya 13210 </label>
                                        </div>
                                        <div class="col-md-2"> Tel : </div>
                                        <div class="col-md-10">
                                            <label> 02-1234567 </label>
                                        </div>
                                        <div class="col-md-2"> Fax : </div>
                                        <div class="col-md-10">
                                            <label> 02-3456789 </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4" style="padding-left: 7px;">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row p-3" style="height: 200px;">
                                        <div class="col-md-5">Tax Invoice No.</div>
                                        <div class="col-md-7">
                                            <p> RVTA20020096 </p>
                                        </div>
                                        <div class="col-md-5">Date</div>
                                        <div class="col-md-7">
                                            <p> 25/02/2563 </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table-radius" border="1" width="100%">
                            <tr class="text-center">
                                <th class="in-table" width="3%">Item</th>
                                <th class="in-table">Invoice</th>
                                <th class="in-table" width="13%">Date</th>
                                <th class="in-table" width="13%">Due Date</th>
                                <th class="in-table" width="16%">Debit Amount</th>
                                <th class="in-table" width="16%">Pay Amount</th>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 1 </td>
                                <td class="in-table text-center"> DNDC20020157 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 2 </td>
                                <td class="in-table text-center"> DNDC20020158 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 3 </td>
                                <td class="in-table text-center"> DNDC20020159 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 4 </td>
                                <td class="in-table text-center"> DNDC20020160 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                                <td class="in-table text-right"> 15,515.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 5 </td>
                                <td class="in-table text-center"> DNDC20020148 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 2,124.23 </td>
                                <td class="in-table text-right"> 2,124.23 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 6 </td>
                                <td class="in-table text-center"> DNDC20020149 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 19,753.87 </td>
                                <td class="in-table text-right"> 19,753.87 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 7 </td>
                                <td class="in-table text-center"> DNDC20020150 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 34,877.43 </td>
                                <td class="in-table text-right"> 34,877.43 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 8 </td>
                                <td class="in-table text-center"> DNDC20020151 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 17,647.96 </td>
                                <td class="in-table text-right"> 17,647.96 </td>
                            </tr>
                            <tr>
                                <td class="in-table text-center"> 9 </td>
                                <td class="in-table text-center"> DNDC20020152 </td>
                                <td class="in-table text-center"> 06/02/2563 </td>
                                <td class="in-table text-center"> 07/03/2563 </td>
                                <td class="in-table text-right"> 16,839.13 </td>
                                <td class="in-table text-right"> 16,839.13 </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td colspan="4" rowspan="2">
                                </td>
                                <td class="in-table"> <b>Sub Total</b></td>
                                <td class="in-table" align="right"> 143,273.47.00</td>
                            </tr>
                            <tr>
                                <td class="in-table"><b>Vat</b> 7% </td>
                                <td class="in-table" align="right">10,029.15</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">(ONE HUNDRED FIFTY-THREE THOUSAND, THREE HUNDRED TWO BATH AND SIXTY-TWO SATANG)</td>
                                <td class="in-table"><b>Net Total</b></td>
                                <td class="in-table" align="right"><label>153,302.62</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-8">
                        <label for="">Please Settle by cheque make "A/C Payee Only" <b>MASTER DRIVER & SERVICES (THAILAND) CO.,LTD.</b></label>
                        <table>
                            <tr>
                                <td> <i class="ti-layout-width-full fa-2x"></i></td>
                                <td class="in-table">Cash</td>
                                <td class="in-table"> </td>
                                <td class="in-table">Bath</td>
                            </tr>
                            <tr>
                                <td> <i class="ti-layout-placeholder fa-2x"></i></td>
                                <td class="in-table">Cheque</td>
                                <td class="in-table">149,004.41</td>
                                <td class="in-table">Bath</td>
                            </tr>
                            <tr>
                                <td class="in-table"> </td>
                                <td class="in-table">Bank</td>
                                <td class="in-table"> ไทยพาณิชย์ </td>
                                <td class="in-table">Branch</td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td class="in-table"> </td>
                                <td class="in-table">Cheque No.</td>
                                <td class="in-table"> 0124962 </td>
                                <td class="in-table">Date</td>
                                <td class="in-table"> 27/02/2563 </td>
                            </tr>
                            <tr>
                                <td> <i class="ti-layout-width-full fa-2x"></i></td>
                                <td class="in-table">Transfer</td>
                                <td class="in-table"> </td>
                                <td class="in-table">Bath</td>
                            </tr>
                            <tr>
                                <td class="in-table"> </td>
                                <td class="in-table">Bank</td>
                                <td class="in-table"> </td>
                                <td class="in-table">Account No.</td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td> <i class="ti-layout-placeholder fa-2x"></i></td>
                                <td class="in-table">Whithholding Tax</td>
                                <td class="in-table"> 4298.21 </td>
                                <td class="in-table">Bath</td>
                            </tr>
                        </table>
                        <p>This receipt will be officially approved with the signature of the payment collector and the Authorize and when the company receipt payment as the amount stated.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-radius" border="1" width="100%">
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12 mt-2 text-center">
                                                    <small> <b>MASTER DRIVER & SERVICES (THAILAND) CO.,LTD.</b> </small>
                                                    <br><br><br><br>
                                                    <p class="mb-0">............................................................................</p>
                                                    <label>Authorizer</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <table class="table-radius mt-2" border="1" width="100%">
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12 mt-2 text-center">
                                                    <br><br><br>
                                                    <p class="mb-0">...........................................................................</p>
                                                    <label>Collected by</label> <br>
                                                    <label>Date...............................................................</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12 text-right mt-3">
                                <h4 class="font-bold">Original - Customer</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="text-center mb-4">
                    <a href="javascript:void(0);" class="btn btn-info btn-md">
                        Print
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection