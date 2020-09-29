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
                            <label class="control-label">Credit note full code</label>
                            <input type="text" id="search_credit_note_code" name="credit_note_code" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input type="date" id="search_credit_note_date_invoice" name="credit_note_date_invoice" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Due date</label>
                            <input type="date" id="search_credit_note_due_date" name="credit_note_due_date" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Term of Payment</label>
                            <input type="number" id="search_credit_note_term_payment" name="credit_note_term_payment" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Net total</label>
                            <input type="number" id="search_credit_note_net_total" name="credit_note_net_total" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control" id="search_credit_note_status" name="credit_note_status">
                                <option value="2">-----Select-----</option>
                                <option value="0">รอยืนยันการออก credit note</option>
                                <option value="1">ออก credit note</option>
                                <option value="99">ยกเลิก credit note</option>
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
                    <h4 class="card-title">Credit note</h4>
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata" data-toggle="modal" data-target="#CreateCRNoteModal" data-product_id="0">Add New</button>
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
                                <th scope="col">Credit note full code</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Date</th>
                                <th scope="col">Due date</th>
                                <th scope="col">Term of Payment</th>
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
                                <td>CNSN20020029</td>
                                <td>MR.BUNJONG PINSIRI</td>
                                <td>25/02/2563</td>
                                <td>Due date</td>
                                <td>Term of Payment</td>
                                <td>Net total</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-secondary label-rouded">รอยืนยันการออก credit note</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">

                                    <button type="button" title="View invoice" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewCRNoteModal" data-product_id="0">
                                        View
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-info btn-md">
                                        Print
                                    </a>
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
                                <td>CNSN20020030</td>
                                <td>MR.BUNJONG PINSIRI</td>
                                <td>26/02/2563</td>
                                <td>Due date</td>
                                <td>Term of Payment</td>
                                <td>Net total</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-success label-rouded">ออก credit note</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">

                                    <button type="button" title="View invoice" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewCRNoteModal" data-product_id="0">
                                        View
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-info btn-md">
                                        Print
                                    </a>
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
                                <td>CNSN20020031</td>
                                <td>MR.BUNJONG PINSIRI</td>
                                <td>27/02/2563</td>
                                <td>Due date</td>
                                <td>Term of Payment</td>
                                <td>Net total</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-danger label-rouded">ยกเลิก credit note</span></td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">

                                    <button type="button" title="View invoice" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewCRNoteModal" data-product_id="0">
                                        View
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-info btn-md">
                                        Print
                                    </a>
                                    <button type="button" title="View invoice" class="btn btn-success btn-md" data-toggle="modal" data-target="#CreateCRNoteModal" data-product_id="0">
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
<div class="modal fade" id="ViewCRNoteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View credit note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-right: 0px !important; padding-top: 15px;"> <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" width="100%" alt="Logo" /> </div>
                    <div class="col-md-7 mt-3 mb-2" style="padding-left: 0px !important;">
                        <font class="mt-5 head"> &nbsp;&nbsp;&nbsp;บริษัท มาสเตอร์ ไดรฟ์เวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด</font> <br>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;2222/9 ถนนลาดพร้าว แขวงพลับพลา <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;เขตวังทองหลาง กรุงเทพฯ 10310 <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;TEL. 02-9318787 FAX. 02-9318686 <br>
                        </font>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;เลขประจำตัวผู้เสียภาษี : 0000000000 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; สาขา : สำนักงานใหญ่
                        </font>
                    </div>
                    <div class="col-md-3 mt-5 mb-2 text-center">
                        <h3 class="mt-3"> ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) <br> CREDIT NOTE</h3>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-9">
                        <div class="bottom-p">
                            <table>
                                <tr>
                                    <td> <b> รหัสลูกค้า : </b><br> <small>Customer Code</small> </td>
                                    <td style="padding-left: 25px;"> <b>0142</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12" style="padding-right: 0px;">
                            <table class="table-radius" border="1" width="100%">
                                <tr>
                                    <td class="in-table">เลขที่ <br> <small>No.</small> </td>
                                    <td class="in-table">CNSN20020029</td>
                                </tr>
                                <tr>
                                    <td class="in-table">วันที่ <br> <small>Date</small> </td>
                                    <td class="in-table">25/02/2563</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td class="in-table" style="width: 750px;">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            เลขประจำตัวผู้เสียภาษี : 0000000000
                                        </div>
                                        <div class="col-md-6">
                                            สาขา : Head Office
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div style="width:100px; padding-left: 15px;">
                                            <b>ชื่อลูกค้า</b> <br>
                                            <small>Customer</small>
                                        </div>
                                        <div>
                                            Intervision Co., Ltd.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div style="width:100px; padding-left: 15px;">
                                            <b>ที่อยู่</b> <br>
                                            <small>Address</small>
                                        </div>
                                        <div style="width:500px;">
                                            Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya 13210
                                        </div>
                                    </div>
                                </td>
                                <td class="in-table">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            อ้างอิงถึงใบแจ้งหนี้ <br>
                                            <small>Ref : Invoice No.</small>
                                        </div>
                                        <div class="col-md-6">
                                            <b> DNDC200200280 </b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            อ้างอิงถึงวันที่ใบแจ้งหนี้ <br>
                                            <small>Ref : Date Imvoice</small>
                                        </div>
                                        <div class="col-md-6">
                                            25/02/2563
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
                                <td class="in-table" style="width: 150px;"> <b>รหัสสินค้า</b> <br> <small>Product code</small> </td>
                                <td class="in-table" style="width: 600px;"> <b>รายการ</b> <br> <small>Discription</small> </td>
                                <td class="in-table" style="width: 100px;"> <b>จำนวน</b> <br> <small>Quantity</small> </td>
                                <td class="in-table" style="width: 129px;"> <b>หน่วยละ</b> <br> <small>Unit Price</small> </td>
                                <td class="in-table"> <b>จำนวนเงิน</b> <br> <small>Amount</small> </td>
                            </tr>
                        </table>
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td class="in-table" style="width: 150px;"> LTDC001-02 </td>
                                <td class="in-table" style="width: 600px;"> SERVICE CHARGE FOR DRIVER COST (FEB) 2020 <br> MR.BANDIT NAUNPRAKHON </td>
                                <td class="in-table text-right" style="width: 100px;"> 1.00 </td>
                                <td class="in-table text-right"> 500.00</td>
                                <td class="in-table text-right"> 500.00</td>
                            </tr>
                            <tr>
                                <td class="in-table"> &nbsp; </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td class="in-table"> &nbsp; </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td class="in-table"> &nbsp; </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td class="in-table"> &nbsp; </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td class="in-table"> &nbsp; </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td class="in-table"> &nbsp; </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td class="in-table"> &nbsp; </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                                <td class="in-table"> </td>
                            </tr>
                            <tr>
                                <td class="in-table">
                                    เหตุผลในการลดหนี้
                                </td>
                                <td class="in-table">
                                    : เนื่องจากไม่มีพนักงานไปปฏิบัติงานในวันที่ 10 ก.พ. 2563 จำนวน 1 วัน
                                </td>
                                <td class="in-table">
                                </td>
                                <td class="in-table">
                                </td>
                                <td class="in-table">
                                </td>
                            </tr>
                        </table>
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td class="in-table" style="width: 850px; position: " colspan="3" rowspan="4">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            มูลค่าตามใบแจ้งหนี้เดิม
                                        </div>
                                        <div class="col-md-5 text-right">
                                            14,500.00
                                        </div>
                                        <div class="col-md-3"> </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            มูลค่าที่ถูกต้อง
                                        </div>
                                        <div class="col-md-5 text-right">
                                            14,000.00
                                        </div>
                                    </div>
                                    <div class="col-md-3"> </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            ผลต่าง
                                        </div>
                                        <div class="col-md-5 text-right">
                                            500.00
                                        </div>
                                        <div class="col-md-3"> </div>
                                    </div>
                                </td>
                                <td class="in-table" style="width: 129px;">รวม <br> <small>Sub total</small> </td>
                                <td class="in-table text-right" style="width: 129px;">500.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table" style="width: 129px;">ส่วนลด <br> <small>Discount</small></td>
                                <td class="in-table text-right" style="width: 129px;">0.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table" style="width: 129px;">คงเหลือ <br> <small>Total</small></td>
                                <td class="in-table text-right" style="width: 129px;">500.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table" style="width: 129px;">ภาษีมูลค่าเพิ่ม <br> <small>Vat 7 %</small></td>
                                <td class="in-table text-right" style="width: 129px;">35.00 </td>
                            </tr>
                            <tr>
                                <td class="in-table" style="width: 850px;" colspan="3"> <b>(ห้าร้อยสามสิบบาทถ้วน)</b> </td>
                                <td class="in-table" style="width: 129px;"> ยอดสุทธิ <br> <small>Net amount</small></td>
                                <td class="in-table text-right" style="width: 129px;"> 535.00 </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <br><br><br><br><br><br><br>
                        ______________________________<br>
                        ผู้จัดทำ
                    </div>
                    <div class="col-md-6 text-center">
                        <br>
                        บริษัท มาสเตอร์ไดรฟ์เวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด <br>
                        <img src="https://intervision.co/mock-up/assets/images/mdsot/signature.jpg" width="30%" alt="Logo" />
                        <br>
                        ผู้มีอำนาจอนุมัติ
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
<div class="modal fade" id="CreateCRNoteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create credit note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-right: 0px !important; padding-top: 15px;"> <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" width="100%" alt="Logo" /> </div>
                    <div class="col-md-7 mt-3 mb-2" style="padding-left: 0px !important;">
                        <font class="mt-5 head"> &nbsp;&nbsp;&nbsp;บริษัท มาสเตอร์ ไดรฟ์เวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด</font> <br>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;2222/9 ถนนลาดพร้าว แขวงพลับพลา <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;เขตวังทองหลาง กรุงเทพฯ 10310 <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;TEL. 02-9318787 FAX. 02-9318686 <br>
                        </font>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;เลขประจำตัวผู้เสียภาษี : 0000000000 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; สาขา : สำนักงานใหญ่
                        </font>
                    </div>
                    <div class="col-md-3 mt-5 mb-2 text-center">
                        <h3 class="mt-3"> ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) <br> CREDIT NOTE</h3>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-8">
                        <div class="bottom-p">
                            <table>
                                <tr>
                                    <td> <b> รหัสลูกค้า : </b><br> <small>Customer Code</small> </td>
                                    <td style="padding-left: 25px;"> <b>0142</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12" style="padding-right: 0px;">
                            <table class="table-radius" border="1" width="100%">
                                <tr>
                                    <td class="in-table" style="width: 70px;">เลขที่ <br> <small>No.</small> </td>
                                    <td class="in-table">
                                        <input type="text" class="form-control" id="add_credit_note_code" name="credit_note_code" placeholder="" value="Will show when click 'Save'" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="in-table">วันที่ <br> <small>Date</small> </td>
                                    <td class="in-table" style="width: 100px;">
                                        <input type="date" id="add_credit_note_date_invoice" name="credit_note_date_invoice" class="form-control search_table" placeholder="">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td class="in-table" style="width: 750px;">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            เลขประจำตัวผู้เสียภาษี : 0123456789
                                        </div>
                                        <div class="col-md-6">
                                            สาขา : Head Office
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div style="width:100px; padding-left: 15px;">
                                            <b>ชื่อลูกค้า</b> <br>
                                            <small>Customer</small>
                                        </div>
                                        <div>
                                            Intervision Co., Ltd.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div style="width:100px; padding-left: 15px;">
                                            <b>ที่อยู่</b> <br>
                                            <small>Address</small>
                                        </div>
                                        <div style="width:500px;">
                                            Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya 13210
                                        </div>
                                    </div>
                                </td>
                                <td class="in-table">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            อ้างอิงถึงใบแจ้งหนี้ <br>
                                            <small>Ref : Invoice No.</small>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control custom-select search_table_select" name="add_invoice_order_code" id="invoice_order_code" data-placeholder="" tabindex="1">
                                                <option value="0">----Select----</option>
                                                <option value="">DNDC20020279</option>
                                                <option value="">DNDC20020280</option>
                                                <option value="">DNDC20020281</option>
                                                <option value="">DNDC20020282</option>
                                                <option value="">DNDC20020283</option>
                                                <option value="">DNDC20020284</option>
                                                <option value="">DNDC20020285</option>
                                                <option value="">DNDC20020286</option>
                                                <option value="">DNDC20020287</option>
                                                <option value="">DNDC20020288</option>
                                                <option value="">DNDC20020289</option>
                                                <option value="">DNDC20020290</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            อ้างอิงถึงวันที่ใบแจ้งหนี้ <br>
                                            <small>Ref : Date Imvoice</small>
                                        </div>
                                        <div class="col-md-6">
                                            25/02/2563
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
                                <td class="in-table" style="width: 150px;"> <b>รหัสสินค้า</b> <br> <small>Product code</small> </td>
                                <td class="in-table" style="width: 600px;"> <b>รายการ</b> <br> <small>Discription</small> </td>
                                <td class="in-table" style="width: 100px;"> <b>จำนวน</b> <br> <small>Quantity</small> </td>
                                <td class="in-table" style="width: 129px;"> <b>หน่วยละ</b> <br> <small>Unit Price</small> </td>
                                <td class="in-table"> <b>จำนวนเงิน</b> <br> <small>Amount</small> </td>
                            </tr>
                        </table>
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td class="in-table" style="width: 150px;">
                                    <input type="text" class="form-control" id="add_credit_note_list_code" name="credit_note_list_code" placeholder="" value="LTDC001-02">
                                </td>
                                <td class="in-table" style="width: 600px;">
                                    <textarea class="form-control" id="add_credit_note_list_details" name="credit_note_list_details" rows="2" cols="80">SERVICE CHARGE FOR DRIVER COST (FEB) 2020 <br>MR.BUNJONG PINSIRI</textarea>
                                </td>
                                <td class="in-table" style="width: 100px;">
                                    <input type="number" class="form-control" id="add_credit_note_list_quantity" name="credit_note_list_quantity" placeholder="" value="1">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_unit_price" name="credit_note_list_unit_price" placeholder="" value="500.00">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_amount" name="credit_note_list_amount" placeholder="" value="500.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_credit_note_list_code" name="credit_note_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_credit_note_list_details" name="credit_note_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_quantity" name="credit_note_list_quantity" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_unit_price" name="credit_note_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_amount" name="credit_note_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_credit_note_list_code" name="credit_note_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_credit_note_list_details" name="credit_note_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_quantity" name="credit_note_list_quantity" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_unit_price" name="credit_note_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_amount" name="credit_note_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_credit_note_list_code" name="credit_note_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_credit_note_list_details" name="credit_note_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_quantity" name="credit_note_list_quantity" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_unit_price" name="credit_note_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_amount" name="credit_note_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_credit_note_list_code" name="credit_note_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_credit_note_list_details" name="credit_note_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_quantity" name="credit_note_list_quantity" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_unit_price" name="credit_note_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_amount" name="credit_note_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_credit_note_list_code" name="credit_note_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_credit_note_list_details" name="credit_note_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_quantity" name="credit_note_list_quantity" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_unit_price" name="credit_note_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="number" class="form-control" id="add_credit_note_list_amount" name="credit_note_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                        </table>
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td class="in-table" style="width: 850px; position: " colspan="3" rowspan="4">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            มูลค่าตามใบแจ้งหนี้เดิม
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <input type="number" class="form-control" id="add_credit_note_count_invoice" name="credit_note_count_invoice" placeholder="" value="14500.00" readonly>
                                        </div>
                                        <div class="col-md-3"> </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            มูลค่าที่ถูกต้อง
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <input type="number" class="form-control" id="add_credit_note_pricr_true" name="credit_note_pricr_true" placeholder="" value="14000.00" readonly>
                                        </div>
                                        <div class="col-md-3"> </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            ผลต่าง
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <input type="number" class="form-control" id="add_credit_note_difference" name="credit_note_difference" placeholder="" value="500.00" readonly>
                                        </div>
                                        <div class="col-md-3"> </div>
                                    </div>
                                </td>
                                <td class="in-table" style="width: 129px;">รวม <br> <small>Sub total</small> </td>
                                <td class="in-table text-right" style="width: 129px;">
                                    <input type="number" class="form-control" id="add_credit_note_amount" name="credit_note_amount" placeholder="" value="500.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table" style="width: 129px;">ส่วนลด <br> <small>Discount</small></td>
                                <td class="in-table text-right" style="width: 129px;">
                                    <input type="number" class="form-control" id="add_credit_note_discount" name="credit_note_discount" placeholder="" value="0.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table" style="width: 129px;">คงเหลือ <br> <small>Total</small></td>
                                <td class="in-table text-right" style="width: 129px;">
                                    <input type="number" class="form-control" id="add_credit_note_subtotal" name="credit_note_subtotal" placeholder="" value="500.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table" style="width: 129px;">ภาษีมูลค่าเพิ่ม <br> <small>Vat 7 %</small></td>
                                <td class="in-table text-right" style="width: 129px;">
                                    <input type="number" class="form-control" id="add_credit_note_vat" name="credit_note_vat" placeholder="" value="35.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="in-table" style="width: 850px;" colspan="3"> <b>(ห้าร้อยสามสิบบาทถ้วน)</b> </td>
                                <td class="in-table" style="width: 129px;"> ยอดสุทธิ <br> <small>Net amount</small></td>
                                <td class="in-table text-right" style="width: 129px;">
                                    <input type="number" class="form-control" id="add_credit_note_net_total" name="credit_note_net_total" placeholder="" value="535.00" readonly>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <br><br><br><br><br><br><br>
                        ______________________________<br>
                        ผู้จัดทำ
                    </div>
                    <div class="col-md-6 text-center">
                        <br>
                        บริษัท มาสเตอร์ไดรฟ์เวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด <br>
                        <img src="https://intervision.co/mock-up/assets/images/mdsot/signature.jpg" width="30%" alt="Logo" />
                        <br>
                        ผู้มีอำนาจอนุมัติ
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center mb-4">
                    <a href="javascript:void(0);" class="btn btn-success btn-md">
                        Save
                    </a>
                </div>
            </div>
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
                    <label for="example-text-input" class="col-md-2 col-form-label">No.</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">No.</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Date</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Date</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Due date</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Due date</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Term of Payment</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Term of Payment</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Amount</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Amount</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Discount</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Discount</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Sub total</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Sub total</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Vat</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Vat</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Net total</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Net total</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">มูลค่าตามใบแจ้งหนี้เดิม</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">มูลค่าตามใบแจ้งหนี้เดิม</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">มูลค่าที่ถูกต้อง</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">มูลค่าที่ถูกต้อง</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">ผลต่าง</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">ผลต่าง</label>
                    </div>
                    <label for="example-text-input" class="col-md-2 col-form-label">Status</label>
                    <div class="col-md-4">
                        <label for="example-text-input" class="col-form-label">Status</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection