{{-- ===This Ok=== --}}
<div class="modal fade" id="ViewScheduleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 table-responsive">
                    <table id="DataViewScheduleModal" class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" class="text-center">Code</th>
                                <th scope="col" class="text-left">Details</th>
                                <th scope="col" class="text-center">Unit price</th>
                                <th scope="col" class="text-center">Discount</th>
                                <th scope="col" class="text-center">Amount</th>
                                <th scope="col" class="text-center">Start Date</th>
                                <th scope="col" class="text-center">End Date</th>
                                <th scope="col" class="text-center">Bill status</th>
                                <th scope="col" class="text-center">status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ===This Ok=== --}}


<div class="modal fade" id="ViewInvoiceOrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Invoice order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 table-responsive">
                    <table id="DataViewInvoiceOrder" class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Invoice order code</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Date invoice</th>
                                <th scope="col">Term payment</th>
                                <th scope="col">Due date</th>
                                <th scope="col">Net total</th>
                                <th scope="col">Remark</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td> DNDC20020279 </td>
                                <td> MR.BUNJONG PINSIRI</td>
                                <td> 25/02/2563 </td>
                                <td> 30 Day </td>
                                <td> 31/03/2563 </td>
                                <td>15,515.00</td>
                                <td> DA-LT-201900082 </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios"
                                        data-on="On" data-off="Off">
                                    <button type="button" title="View invoice" class="btn btn-info btn-md"
                                        data-toggle="modal" data-target="#ViewInvoiceModal" data-product_id="0">
                                        Invoice
                                    </button>
                                    <button type="button" title="View Timesheet" class="btn btn-primary btn-md"
                                        data-toggle="modal" data-target="#ViewTimesheetModal" data-product_id="0">
                                        Timesheet
                                    </button>
                                    <button type="button" title="View invoice"
                                        class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                                        Cancel invoice
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td> DNDC20020280 </td>
                                <td> MR.BUNJONG PINSIRI</td>
                                <td> 25/02/2563 </td>
                                <td> 30 Day </td>
                                <td> 31/03/2563 </td>
                                <td>15,515.00</td>
                                <td> DA-LT-201900083 </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios"
                                        data-on="On" data-off="Off">
                                    <button type="button" title="View invoice" class="btn btn-info btn-md"
                                        data-toggle="modal" data-target="#ViewInvoiceModal" data-product_id="0">
                                        Invoice
                                    </button>
                                    <button type="button" title="View Timesheet" class="btn btn-primary btn-md"
                                        data-toggle="modal" data-target="#ViewTimesheetModal" data-product_id="0">
                                        Timesheet
                                    </button>
                                    <button type="button" title="Create new invoice" class="btn btn-success btn-md"
                                        data-toggle="modal" data-target="#CreateNewInvoiceModal" data-product_id="0">
                                        Create invoice
                                    </button>
                                </td>
                            </tr>
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ViewInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-right: 0px !important; padding-top: 15px;">
                        <img src="{{url('/assets/images/mdsot/logo MASTER-02.png')}}" width="100%" alt="Logo" /> </div>
                    <div class="col-md-8 mt-3 mb-2" style="padding-left: 0px !important;">
                        <font class="mt-5 head font-bold"> &nbsp;&nbsp;&nbsp;MASTER DRIVER & SERVICE (THAILAND) CO.,LTD.
                        </font> <br>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;2222/9 LADPRAO RD., PHLABPHA, WANGTHONGLANG, BANGKOK 10310 <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;TEL. 02-9318787 FAX. 02-9318686<br>
                        </font>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;TAX ID. 0000000000 &nbsp;&nbsp;&nbsp;&nbsp; BRANCH : HEAD OFFICE
                        </font>
                    </div>
                    <div class="col-md-2 mt-5 mb-2 text-center">
                        <h2 class="mt-3"> Invoice</h2> 1
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label> Customer Code : 0142 </label>
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
                                        <div class="col-md-2">Customer</div>
                                        <div class="col-md-10">
                                            <label> Intervision Co., Ltd. </label>
                                            <label> Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai,
                                                Ayutthaya 13210 </label>
                                            <label> Tel. 02-1234567
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                Fax. 02-3456789</label>
                                        </div>
                                        <div class="col-md-2"> Contact </div>
                                        <div class="col-md-10">
                                            <label> </label>
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
                                        <div class="col-md-5">Invoice No.</div>
                                        <div class="col-md-7">
                                            <p> DNDC20020279 </p>
                                        </div>
                                        <div class="col-md-5">Date Invoice</div>
                                        <div class="col-md-7">
                                            <p> 25/02/2563 </p>
                                        </div>
                                        <div class="col-md-5">Term of Payment</div>
                                        <div class="col-md-4">
                                            <p> 30 </p>
                                        </div>
                                        <div class="col-md-3">Day</div>
                                        <div class="col-md-5">Due Date</div>
                                        <div class="col-md-7">
                                            <p> 31/03/2563 </p>
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
                                <th class="in-table">No.</th>
                                <th class="in-table">Code</th>
                                <th class="in-table">Description</th>
                                <th class="in-table">Quantity</th>
                                <th class="in-table">Unit</th>
                                <th class="in-table">Discount</th>
                                <th class="in-table">Amount</th>
                            </tr>
                            <tr>
                                <td class="text-right"><small> 1 </small></td>
                                <td> <small> LTDC001-02 </small> </td>
                                <td> <small>SERVICE CHARGE FOR DRIVER COST (FEB) 2020 <br>MR.BUNJONG PINSIRI </small>
                                </td>
                                <td class="text-center"> <small>1 UNIT</small> </td>
                                <td class="text-right"> 14,500.00 </td>
                                <td class="text-right"> </td>
                                <td class="text-right"> 14,500.00 </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
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
                                <td> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
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
                                <td> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
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
                                <td> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
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
                                <td> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; <br> <br> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td colspan="4" rowspan="4">
                                    <p> <b> หมายเหตุ : </b> DA-LT-20190082</p>
                                    <br><br><br><br>
                                    Please Settle by cheque make "A/C Payee Only" <b>MASTER DRIVER 7 SERVICES (THAILAND)
                                        CO.,LTD.</b>
                                    <br>
                                    After your transfer,please advise to Collection Dept. at Tel : 065-525-5636 E-mail :
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="5e3d3132323b3d2a3731301e333f2d2a3b2c3a2c37283b2c703d31702a36">[email&#160;protected]</a>
                                </td>
                                <td colspan="2"> <b>Amount</b></td>
                                <td align="right"> 14,500.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Discount</b></td>
                                <td align="right">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Sub Total</b></td>
                                <td align="right">14,500.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Vat 7 %</b></td>
                                <td align="right">1,015.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">(FIFTEEN THOUSAND, FIVE HUNDRED AND FIFTEEN BATH
                                    ONLY)</td>
                                <td colspan="2"><b>Net Total</b></td>
                                <td align="right"><label>15,515‬.00</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <b>Condition :</b>
                    </div>
                </div>
                <br><br><br><br>
                <div class="row mb-3">
                    <div class="col-md-4" style="padding-right: 8px;">

                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row" style="height: 200px;">
                                        <div class="col-md-12 mt-2 text-center">
                                            <small> <b>Billing Receiver by</b> </small>
                                            <br><br><br><br><br>
                                            <p>...........................................................................................
                                            </p>
                                            <label>Date...............................................................</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4" style="padding-left: 7px; padding-right: 8px;">

                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row" style="height: 200px;">
                                        <div class="col-md-12 mt-2 text-center">
                                            <small> <b>Billing by</b> </small>
                                            <br><br><br><br><br>
                                            <p>...........................................................................................
                                            </p>
                                            <label>Date...............................................................</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4" style="padding-left: 7px;">

                        <table class="table-radius" border="1" width="100%" height="203">
                            <tr>
                                <td>
                                    <div class="col-md-12 mt-2 text-center">
                                        <small> <b>MASTER DRIVER 7 SERVICES (THAILAND) CO.,LTD.</b> </small>
                                        <br>
                                        <img src="{{url('/assets/images/mdsot/signature.jpg')}}" width="60%" alt="Logo" />
                                        <br>
                                        <label>Authorizer</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
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

<div class="modal fade" id="ViewTimesheetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form row">
                    <div class="col-md-6 mb-3">
                        <p>ตารางคำนวณค่าล่วงเวลา เรียกเก็บ "Thai Beyonz Co., Ltd."</p> <br>
                        <label>ทำงาน จันทร์, อังคาร, พุธ, พฤหัสบดี, ศุกร์ เวลาเริ่มงาน 08:00:00 เวลาเลิกงาน
                            17:00:00</label> <br>
                        <label>สัญญาเริ่ม 5 สิงหาคม 2019 สิ้นสุด 4 สิงหาคม 2020</label> <br>
                        <label>หมายเหตุ ต่างจังหวัด ยกเว้น : ระยอง ชลบุรี</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label> สัญญาเลขที่ LT-201900192 </label> <br>
                        <label> Contract No. DA-LT-201900157 </label> <br>
                        <label> ประจำเดือน <font size="4">งวดที่ 1 : สิงหาคม 2562 </font></label>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="text-right">
                            1/2
                            <br> <br> <br> <br> <br>
                            THB,Bath
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td scope="col" class="text-center" rowspan="2">#</td>
                                        <td scope="col" class="text-center" rowspan="2" width="10%">วันที่</td>
                                        <td scope="col" class="text-center" rowspan="2">วัน</td>
                                        <td scope="col" class="text-center" rowspan="2">เข้างาน</td>
                                        <td scope="col" class="text-center" rowspan="2">ออกงาน</td>
                                        <td scope="col" class="text-center" rowspan="2">OT1</td>
                                        <td scope="col" class="text-center" colspan="3">OT1.5</td>
                                        <td scope="col" class="text-center" colspan="3">OT3</td>
                                        <td scope="col" class="text-center" rowspan="2">พักเที่ยง</td>
                                        <td scope="col" class="text-center" rowspan="2">Taxi</td>
                                        <td scope="col" class="text-center" rowspan="2">ตจว.</td>
                                        <td scope="col" class="text-center" rowspan="2">ค้างคืน</td>
                                        <td scope="col" class="text-center" rowspan="2">OT หลังเที่ยงคืน</td>
                                        <td scope="col" class="text-center" rowspan="2" width="25%">Replace</td>
                                    </tr>
                                    <tr>
                                        <td scope="col" class="text-center">ก่อน</td>
                                        <td scope="col" class="text-center">หลัง</td>
                                        <td scope="col" class="text-center">รวม</td>
                                        <td scope="col" class="text-center">ก่อน</td>
                                        <td scope="col" class="text-center">หลัง</td>
                                        <td scope="col" class="text-center">รวม</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="18"> พนักงานขับรถ นาย สิทธิศักดิ์ รัตน์สว่างไพ รหัส 0000 </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>21-11-2019</td>
                                        <td> thu </td>
                                        <td> 08:00 </td>
                                        <td> 19:30 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> 2.30 </td>
                                        <td> 2.30 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <i class="fas fa-check-square fa-1x"></i>
                                        </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>22-11-2019</td>
                                        <td> Fri </td>
                                        <td> 08:00 </td>
                                        <td> 20:30 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> 3.30</td>
                                        <td> 3.30</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <i class="fas fa-check-square fa-1x"></i>
                                        </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>23-11-2019</td>
                                        <td> Sat </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>24-11-2019</td>
                                        <td> Sun </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>25-11-2019</td>
                                        <td> Mon </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td>26-11-2019</td>
                                        <td> Tue </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td>27-11-2019</td>
                                        <td> Wed </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td>28-11-2019</td>
                                        <td> Thu </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td>29-11-2019</td>
                                        <td> Fri </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <i class="fas fa-check-square fa-1x"></i>
                                        </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td>30-11-2019</td>
                                        <td> Sat </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">11</td>
                                        <td>01-12-2019</td>
                                        <td> Sun </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">12</td>
                                        <td>02-12-2019</td>
                                        <td> Mon </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <i class="fas fa-check-square fa-1x"></i>
                                        </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">13</td>
                                        <td>03-12-2019</td>
                                        <td> Tue </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <i class="fas fa-check-square fa-1x"></i>
                                        </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">14</td>
                                        <td>04-12-2019</td>
                                        <td> Wed </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <i class="fas fa-check-square fa-1x"></i>
                                        </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">15</td>
                                        <td>05-12-2019</td>
                                        <td> Thu </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">16</td>
                                        <td>06-12-2019</td>
                                        <td> Fri </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">17</td>
                                        <td>07-12-2019</td>
                                        <td> Sat </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">18</td>
                                        <td>08-12-2019</td>
                                        <td> Sun </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">19</td>
                                        <td>09-12-2019</td>
                                        <td> Mon </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">20</td>
                                        <td>10-12-2019</td>
                                        <td> Tue </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">21</td>
                                        <td>11-12-2019</td>
                                        <td> Wed </td>
                                        <td> 08:00 </td>
                                        <td> 19:30 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> 2.30 </td>
                                        <td> 2.30 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <i class="fas fa-check-square fa-1x"></i>
                                        </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">22</td>
                                        <td>12-12-2019</td>
                                        <td> Thu </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">23</td>
                                        <td>13-12-2019</td>
                                        <td> Fri </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">24</td>
                                        <td>14-12-2019</td>
                                        <td> Sat </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">25</td>
                                        <td>15-12-2019</td>
                                        <td> Sun </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">26</td>
                                        <td>16-12-2019</td>
                                        <td> Mon </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">27</td>
                                        <td>17-12-2019</td>
                                        <td> Tue </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> นพดล เพ็งสอน ทดแทน </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">28</td>
                                        <td>18-12-2019</td>
                                        <td> Wed </td>
                                        <td> 08:00 </td>
                                        <td> 20:20 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> 3.20 </td>
                                        <td> 3.20 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">29</td>
                                        <td>19-12-2019</td>
                                        <td> Thu </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <i class="fas fa-check-square fa-1x"></i>
                                        </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">30</td>
                                        <td>20-12-2019</td>
                                        <td> Fri </td>
                                        <td> 08:00 </td>
                                        <td> 17:00 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center"> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right"> OT1 </td>
                                        <td> 0.00 </td>
                                        <td colspan="2"> OT1.5 </td>
                                        <td> 11.50 </td>
                                        <td colspan="2"> OT3 </td>
                                        <td> 0.00 </td>
                                        <td colspan="6"> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form row">
                    <div class="col-md-6 mb-3">
                        <p>ตารางคำนวณค่าล่วงเวลา เรียกเก็บ "Thai Beyonz Co., Ltd."</p> <br>
                        <label>ทำงาน จันทร์, อังคาร, พุธ, พฤหัสบดี, ศุกร์ เวลาเริ่มงาน 08:00:00 เวลาเลิกงาน
                            17:00:00</label> <br>
                        <label>สัญญาเริ่ม 5 สิงหาคม 2019 สิ้นสุด 4 สิงหาคม 2020</label> <br>
                        <label>หมายเหตุ ต่างจังหวัด ยกเว้น : ระยอง ชลบุรี</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label> สัญญาเลขที่ LT-201900192 </label> <br>
                        <label> Contract No. DA-LT-201900157 </label> <br>
                        <label> ประจำเดือน <font size="4">งวดที่ 1 : สิงหาคม 2562 </font></label>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="text-right">
                            2/2
                        </div>
                    </div>
                </div>
                <div class="form row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Summary Overtime ตารางเก็บเงิน</p>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr height="30">
                                        <td width="100">OT1</td>
                                        <td width="100"> Hr : 0.00</td>
                                        <td width="100"> Hr @ 60.42</td>
                                        <td>= &nbsp;</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td></td>
                                        <td> Mi : 0</td>
                                        <td> Mi @ 1.007000</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr height="30">
                                        <td>OT1.5</td>
                                        <td> Hr : 11.50</td>
                                        <td> Hr @ 90.63</td>
                                        <td>= &nbsp;</td>
                                        <td>1,072.46</td>
                                    </tr>
                                    <tr height="30">
                                        <td></td>
                                        <td> Mi : 710</td>
                                        <td> Mi @ 1.51050</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr height="30">
                                        <td>OT3</td>
                                        <td> Hr : 0.00</td>
                                        <td> Hr @ 181.25</td>
                                        <td>= &nbsp;</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td></td>
                                        <td> Mi : 0</td>
                                        <td> Mi @ 3.02083</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr height="30">
                                        <td>รวมเป็นเงิน</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>1,072.46</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr height="30">
                                        <td width="150">สรุปยอดเก็บเงินลูกค้า</td>
                                        <td width="30"></td>
                                        <td>3,000.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ค้างคืน @ 600.00</td>
                                        <td>0</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ตจว. @ 250.00</td>
                                        <td>8</td>
                                        <td>2,000.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>Taxi @ 150.00</td>
                                        <td>0</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>รวมเป็นเงิน</td>
                                        <td></td>
                                        <td>5,000.00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <p>Summary Overtime ตารางเก็บเงิน : <b>สิทธิ์ศักดิ์ รัตน์สว่างไพ</b></p>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr height="30">
                                        <td width="100">OT1</td>
                                        <td width="100"> Hr : 0.00</td>
                                        <td width="100"> Hr @ 41.67</td>
                                        <td>= &nbsp;</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td></td>
                                        <td> Mi : 0</td>
                                        <td> Mi @ 0.69450</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr height="30">
                                        <td>OT1.5</td>
                                        <td> Hr : 11.50</td>
                                        <td> Hr @ 62.50</td>
                                        <td>= &nbsp;</td>
                                        <td>739.59</td>
                                    </tr>
                                    <tr height="30">
                                        <td></td>
                                        <td> Mi : 710</td>
                                        <td> Mi @ 1.04167</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr height="30">
                                        <td>OT3</td>
                                        <td> Hr : 0.00</td>
                                        <td> Hr @ 125.00</td>
                                        <td>= &nbsp;</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td></td>
                                        <td> Mi : 0</td>
                                        <td> Mi @ 2.08333</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr height="30">
                                        <td>รวมเป็นเงิน</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>739.59</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr height="30">
                                        <td colspan="2" width="250">สรุปยอดจ่ายเงิน : <b>สิทธิ์ศักดิ์ รัตน์สว่างไพ</b>
                                        </td>
                                        <td>3,000.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ค่าล่วงเวลา :</td>
                                        <td width="30"></td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ค้างคืน @ 500.00</td>
                                        <td width="30">0</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ตจว. @ 200.00</td>
                                        <td>8</td>
                                        <td>1,600.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>Taxi @ 100.00</td>
                                        <td>0</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>รวมเป็นเงิน</td>
                                        <td></td>
                                        <td>4,600.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>เงินเดือน</td>
                                        <td></td>
                                        <td>10,000.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>Garantee/Fixed OT</td>
                                        <td></td>
                                        <td>3,000.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>เบี้ยขยัน</td>
                                        <td></td>
                                        <td>500.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ไม่เกิดอุบัติเหตุ</td>
                                        <td></td>
                                        <td>500.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ค่าครองชีพ</td>
                                        <td></td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ค่าโทรศัพท์</td>
                                        <td></td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>โบนัส</td>
                                        <td></td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ค่าภาษา</td>
                                        <td></td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr height="30">
                                        <td>ค่ารักษาสี</td>
                                        <td></td>
                                        <td>0.00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form row">
                    <div class="col-md-12 text-center mt-3 mb-3">
                        <a href="timesheet_contract/print_timesheet" target="_blank"
                            class="btn btn-warning btn-md">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="CreateNewInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create new invoice</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-right: 0px !important; padding-top: 15px;">
                        <img src="{{url('/assets/images/mdsot/logo MASTER-02.png')}}" width="100%" alt="Logo" /> </div>
                    <div class="col-md-8 mt-3 mb-2" style="padding-left: 0px !important;">
                        <font class="mt-5 head font-bold"> &nbsp;&nbsp;&nbsp;MASTER DRIVER & SERVICE (THAILAND) CO.,LTD.
                        </font> <br>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;2222/9 LADPRAO RD., PHLABPHA, WANGTHONGLANG, BANGKOK 10310 <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;TEL. 02-9318787 FAX. 02-9318686<br>
                        </font>
                        <font>
                            &nbsp;&nbsp;&nbsp;&nbsp;TAX ID. 0000000000 &nbsp;&nbsp;&nbsp;&nbsp; BRANCH : HEAD OFFICE
                        </font>
                    </div>
                    <div class="col-md-2 mt-5 mb-2 text-center">
                        <h2 class="mt-3"> Invoice</h2> 1
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label> Customer Code : 0142 </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="card border" style="height: 220px;">
                            <div class="row p-3">
                                <div class="col-md-2"><label>Tax Id : </label></div>
                                <div class="col-md-5">0000000000</div>
                                <div class="col-md-5">Branch : Head Office</div>
                                <div class="col-md-2">Customer</div>
                                <div class="col-md-10">
                                    <label> Firstname Lastname </label>
                                    <label> Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya
                                        13210 </label>
                                    <label> Tel. 0000000000
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fax.
                                        0000000000</label>
                                </div>
                                <div class="col-md-2"> Contact </div>
                                <div class="col-md-10">
                                    <label> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card border" style="height: 220px;">
                            <div class="row pl-3 pt-3">
                                <div class="col-md-4">Invoice No.</div>
                                <div class="col-md-8">
                                    <p class="text-muted"> (Will show when click "Save") </p>
                                </div>
                            </div>
                            <div class="row pl-3">
                                <div class="col-md-4">Date Invoice</div>
                                <div class="col-md-6"> <input type="date" id="add_invoice_order_date_invoice"
                                        name="invoice_order_date_invoice" class="form-control search_table"
                                        placeholder=""> </div>
                            </div>
                            <div class="row pl-3 mt-3">
                                <div class="col-md-4">Term of Payment</div>
                                <div class="col-md-4"> <input type="number" class="form-control"
                                        id="add_invoice_order_term_payment" name="invoice_order_term_payment"
                                        placeholder="" value=""> </div>
                                <div class="col-md-4">Day</div>
                            </div>
                            <div class="row pl-3 mt-3">
                                <div class="col-md-4">Due Date</div>
                                <div class="col-md-6"> <input type="date" id="add_invoice_order_due_date"
                                        name="invoice_order_due_date" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <td width="7%">No.</td>
                                    <td>Code</td>
                                    <td>Description</td>
                                    <td>Quantity</td>
                                    <td>Unit</td>
                                    <td>Discount</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value="1"></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value="LTDC001-02"> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2"
                                            cols="80">SERVICE CHARGE FOR DRIVER COST (FEB) 2020 <br>MR.BUNJONG PINSIRI</textarea>
                                    </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value="1"> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value="14500.00"> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value="14500.00"> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="number" class="form-control" id="" name=""
                                            placeholder="" value=""></td>
                                    <td> <input type="text" class="form-control" id="add_invoice_order_list_code"
                                            name="invoice_order_list_code" placeholder="" value=""> </td>
                                    <td> <textarea class="form-control" id="add_invoice_order_list_details"
                                            name="invoice_order_list_details" rows="2" cols="80"></textarea> </td>
                                    <td class="text-center"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_quantity" name="invoice_order_list_quantity"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_discount" name="invoice_order_list_discount"
                                            placeholder="" value=""> </td>
                                    <td class="text-right"> <input type="number" class="form-control"
                                            id="add_invoice_order_list_amount" name="invoice_order_list_amount"
                                            placeholder="" value=""> </td>
                                </tr>
                                <tr>
                                    <td colspan="4" rowspan="4">
                                        <p> <b> หมายเหตุ : </b> DA-LT-20190082</p>
                                        <br><br><br><br><br><br><br>
                                        Please Settle by cheque make "A/C Payee Only" <b>MASTER DRIVER 7 SERVICES
                                            (THAILAND) CO.,LTD.</b>
                                    </td>
                                    <td colspan="2"> <b>Amount</b></td>
                                    <td align="right"> <label>14,500.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Discount</b></td>
                                    <td align="right"><label>0.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Sub Total</b></td>
                                    <td align="right"><label>14,500.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Vat 7 %</b></td>
                                    <td align="right"><label>1,015.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-center"><label>(FIFTEEN THOUSAND, FIVE HUNDRED AND
                                            FIFTEEN BATH ONLY)</label></td>
                                    <td colspan="2"><b>Net Total</b></td>
                                    <td align="right"><label>15,515‬.00</label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <b>Condition :</b>
                    </div>
                </div>
                <br><br><br><br>
                <div class="row">
                    <div class="col-md-4" style="padding-right: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <small> <b>Billing Receiver by</b> </small>
                                    <br><br><br><br><br>
                                    <p>...........................................................................................
                                    </p>
                                    <label>Date...............................................................</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-right: 5px; padding-left: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <small> <b>Billing by</b> </small>
                                    <br><br><br><br><br>
                                    <p>...........................................................................................
                                    </p>
                                    <label>Date...............................................................</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <small> <b>MASTER DRIVER 7 SERVICES (THAILAND) CO.,LTD.</b> </small>
                                    <br><br><br><br><br>
                                    <p>...........................................................................................
                                    </p>
                                    <label>Authorizer</label>
                                </div>
                            </div>
                        </div>
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

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="add_quotation_full_code">Quotation full code</label>
                                    <input type="text" class="form-control" id="add_quotation_full_code"
                                        name="quotation_full_code" value="QT2020030013" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="add_customer_contract_full_code">Contract full code</label>
                                    <input type="text" class="form-control" id="add_customer_contract_full_code"
                                        name="customer_contract_full_code" value="QT2020030013" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_name_en">Company</label>
                                    <input type="text" class="form-control" id="add_company_name_en"
                                        name="company_name_en" value="The Valspar (Thailand) Corporation Limited"
                                        readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="add_customer_name">Contact info</label>
                                    <input type="text" class="form-control" id="add_customer_name" name="customer_name"
                                        placeholder="" value="สกาวเดือน คำสุข" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_details">Ramark</label>
                                    <textarea cols="80" class="form-control" id="sale_order_details"
                                        name="sale_order_details" rows="10"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_term_payment">Term of payment</label>
                                    <input type="text" class="form-control" id="sale_order_term_payment"
                                        name="sale_order_term_payment" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_sale_order_code">Invoice schedule No.</label>
                                    <input type="text" class="form-control" id="sale_order_sale_order_code"
                                        name="sale_order_sale_order_code" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_amount">Total amount</label>
                                    <input type="number" class="form-control" id="sale_order_amount"
                                        name="sale_order_amount" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_discount">Total discount</label>
                                    <input type="number" class="form-control" id="sale_order_discount"
                                        name="sale_order_discount" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_sub_total">Sub total</label>
                                    <input type="number" class="form-control" id="sale_order_sub_total"
                                        name="sale_order_sub_total" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_vat">Vat</label>
                                    <input type="number" class="form-control" id="sale_order_vat" name="sale_order_vat"
                                        placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_net_total">Net total</label>
                                    <input type="number" class="form-control" id="sale_order_net_total"
                                        name="sale_order_net_total" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sale_order_date_invoice">Invoice issued on (date) of every month</label>
                                    <input type="number" class="form-control" id="sale_order_date_invoice"
                                        name="sale_order_date_invoice" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sale_order_status"
                                            name="sale_order_status">
                                        <label class="custom-control-label" for="sale_order_status">Active</label>
                                    </div>
                                </div>
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                            class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 mt-5 mb-2">
                        <font class="mt-5 font-bold head"> &nbsp;&nbsp;บริษัท มาสเตอร์ ไดรเวอร์ แอนด์ เซอร์วิสเซส
                            (ประเทศไทย) จำกัด</font>
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;2222/9 ถนนลาดพร้าว แขวงพลับพลา <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;เขตวังทองฟหลาง กรุงเทพฯ 10310 <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;โทร 02-9318787
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            โทรสาร 02-9318686
                        </label>
                    </div>
                    <div class="col-md-2 mt-5 mb-2 text-center">
                        <h1 class="mt-3 font-bold"> ต้นฉบับ</h1> <br> 1
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 mt-5">
                        <label> ทะเบียนนิติบุคคลเลขที่ 0105550078073 </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>รหัสลูกค้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0231</label>
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-3 mt-2">
                                    <label>ลูกค้า</label> <br> Customer
                                </div>
                                <div class="col-md-9 mt-2">
                                    <label class="font-bold"> Thai Logistics Service Co.,Ltd. </label>
                                </div>
                                <div class="col-md-3 mt-2"></div>
                                <div class="col-md-9">
                                    <address class="">
                                        3656/65 Green Tower Bidg., Room Number Unit L, 20th Floor,
                                        Rama 4 Road, Klongton, Klongtoey, Bangkok 10110
                                    </address>
                                </div>
                                <div class="col-md-3 mt-2"></div>
                                <div class="col-md-9">
                                    <label class="mt-4">โทร 02-367-3400
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โทรสาร
                                        02-367-3409</label>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label>ผู้ติดต่อ</label> <br> Contact
                                </div>
                                <div class="col-md-9 mt-2">
                                    <label Class="middle"> คุณสุรางคณา </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mt-3">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <font class="mt-5 font-bold head"> ใบสั่งขาย ( Sale Order) </font>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">เลขที่ใบสั่งขาย</label> <br> Sale Order No.
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> SODC17090002 </label>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">วันที่ออกใบสั่งขาย</label> <br> Date
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> 05/09/2560 </label>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">เงื่อนไขการชำระเงิน</label> <br> Term of Payment
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> 30 วัน </label>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">เลขที่สัญญา</label> <br> Contract No.
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> DA-LT-201700351 </label>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">ใบเสนอราคา</label> <br> Quatation No.
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> 17120014 </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <td width="3%" style="text-align: center; vertical-align: middle;">
                                        <label>ลำดับ</label> <br> <small>No.</small></td>
                                    <td width="11%" style="text-align: center; vertical-align: middle;">
                                        <label>รหัสสินค้า</label> <br> <small>Code</small></td>
                                    <td width="46%" style="text-align: center; vertical-align: middle;">
                                        <label>รายละเอียด</label> <br> <small>Description</small></td>
                                    <td width="10%" style="text-align: center; vertical-align: middle;">
                                        <label>จำนวน</label> <br> <small>Quantity</small></td>
                                    <td width="10%" style="text-align: center; vertical-align: middle;">
                                        <label>หน่วยละ</label> <br> <small>Unit</small></td>
                                    <td width="10%" style="text-align: center; vertical-align: middle;">
                                        <label>ส่วนลด</label> <br> <small>Discount</small> </td>
                                    <td width="10%" style="text-align: center; vertical-align: middle;">
                                        <label>จำนวน</label> <br> <small>Amount</small> </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><small> 1 </small></td>
                                    <td> <small> LTDC001-01 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (JAN) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 2 </small></td>
                                    <td> <small> LTDC001-02 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (FEB) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 3 </small></td>
                                    <td> <small> LTDC001-03 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (MAR) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 4 </small></td>
                                    <td> <small> LTDC001-04 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (APR) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 5 </small></td>
                                    <td> <small> LTDC001-05 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (MAY) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 6 </small></td>
                                    <td> <small> LTDC001-06 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (JUN) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 7 </small></td>
                                    <td> <small> LTDC001-07 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (JUL) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 8 </small></td>
                                    <td> <small> LTDC001-08 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (AUG) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 9 </small></td>
                                    <td> <small>LTDC001-09</small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (SEP) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 10 </small></td>
                                    <td> <small> LTDC001-10 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (OCT) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 11 </small></td>
                                    <td> <small> LTDC001-11 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (NOV) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 12 </small></td>
                                    <td> <small> LTDC001-12 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (DEC) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" rowspan="4">
                                        <p>หมายเหตุ</p>
                                        <p>Start Date 01/01/2018 - 31/12/2018 เริ่มตรงเดือน</p>
                                        <p>Driver Mr.Katavut Lapchai</p>
                                    </td>
                                    <td colspan="2"> <label> รวมราคา/Amount</label></td>
                                    <td align="right"> <label>222,000.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><label>ส่วนลด/Discount</label></td>
                                    <td align="right"><label>0.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><label>มูลค่า/Sub Total</label></td>
                                    <td align="right"><label>222,000.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><label>ภาษีมูลค่าเพิ่ม/Vat 7 %</label></td>
                                    <td align="right"><label>15,540.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><label>(สองแสนสามหมื่นเจ็ดพันห้าร้อยสี่สิบบาทถ้วน)</label></td>
                                    <td colspan="2"><label>ยอดเงินสุทธิ/Net Total</label></td>
                                    <td align="right"><label>237,540‬.00</label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงื่อนไข</label> <br>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีบันทึกแนบท้ายสัญญา
                            DA-LT-201700351 (1) ทำงานวันทร์-ศุกร์ 08.00 - 17.00 น.</label>
                    </div>
                </div>
                <br><br><br><br>
                <div class="row">
                    <div class="col-md-3" style="padding-right: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>ผู้จัดทำ</label>
                                </div>
                            </div>
                            <br><br><br><br>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>วันที่/Date______________</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-right: 5px; padding-left: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>ผู้ตรวจสอบ</label>
                                </div>
                            </div>
                            <br><br><br><br>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>วันที่/Date_______________</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-left: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>บริษัท มาสเตอร์ ไดรฟ์เวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด</label>
                                </div>
                            </div>
                            <br><br><br><br>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>ผู้มีอำนาจอนุมัติ/Authorizer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center mb-4">
                    <a href="sale_order/PrintSaleOrder" target="_blank" class="btn btn-info btn-md">
                        Print
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
