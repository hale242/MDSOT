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
                            <label class="control-label">Invoice full code</label>
                            <input type="text" id="search_invoice_order_code" name="invoice_order_code" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Driver</label>
                            <input type="text" id="search_driver_name_en" name="driver_name_en" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input type="date" id="search_invoice_order_date_invoice" name="invoice_order_date_invoice" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Term payment</label>
                            <input type="text" id="search_invoice_order_term_payment" name="invoice_order_term_payment" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Due date</label>
                            <input type="date" id="search_invoice_order_due_date" name="invoice_order_due_date" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control" id="search_invoice_order_status" name="invoice_order_status">
                                <option value="99">-----Select-----</option>
                                <option value="0">รอยืนยันการออก Invoice</option>
                                <option value="1">ออก Invoice</option>
                                <option value="2">ออก Invoice แบบ Auto</option>
                                <option value="3">ยกเลิก Invoice นี้ออก Invoice ใหม่</option>
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
                    <h4 class="card-title">Invoice</h4>
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata" data-toggle="modal" data-target="#CreateNewInvoiceModal" data-product_id="0">Add New</button>
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
                                <th scope="col">Contract full code</th>
                                <th scope="col">Invoice full code</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Date</th>
                                <th scope="col">Term payment</th>
                                <th scope="col">Due date</th>
                                <th scope="col">Net total</th>
                                <th scope="col">Remark</th>
                                <th scope="col">status</th>
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
                                <td> DA-LT-202000352 </td>
                                <td> DNDC20020279 </td>
                                <td> MR.BUNJONG PINSIRI</td>
                                <td> 25/02/2563 </td>
                                <td> 30 Day </td>
                                <td> 31/03/2563 </td>
                                <td> 15,515.00 </td>
                                <td> DA-LT-201900082 </td>
                                <td> <span class="badge badge-pill text-white font-medium badge-secondary label-rouded">รอยืนยันการออก Invoice</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewInvoiceModal" data-product_id="0">
                                        View
                                    </button>

                                    <a href="javascript:void(0);" class="btn btn-info btn-md">
                                        Print
                                    </a>
                                    <button type="button" title="View Timesheet" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ViewTimesheetModal" data-product_id="0">
                                        Timesheet
                                    </button>
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
                                <td> DA-LT-202000370 </td>
                                <td> DNDC20020279 </td>
                                <td> MR.BUNJONG PINSIRI</td>
                                <td> 25/02/2563 </td>
                                <td> 30 Day </td>
                                <td> 31/03/2563 </td>
                                <td> 15,515.00 </td>
                                <td> DA-LT-201900082 </td>
                                <td> <span class="badge badge-pill text-white font-medium badge-success label-rouded">ออก Invoice</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewInvoiceModal" data-product_id="0">
                                        View
                                    </button>

                                    <a href="javascript:void(0);" class="btn btn-info btn-md">
                                        Print
                                    </a>
                                    <button type="button" title="View Timesheet" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ViewTimesheetModal" data-product_id="0">
                                        Timesheet
                                    </button>
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
                                <td> DA-LT-202000391 </td>
                                <td> DNDC20020279 </td>
                                <td> MR.BUNJONG PINSIRI</td>
                                <td> 25/02/2563 </td>
                                <td> 30 Day </td>
                                <td> 31/03/2563 </td>
                                <td> 15,515.00 </td>
                                <td> DA-LT-201900082 </td>
                                <td> <span class="badge badge-pill text-white font-medium badge-info label-rouded">ออก Invoice แบบ Auto</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewInvoiceModal" data-product_id="0">
                                        View
                                    </button>

                                    <a href="javascript:void(0);" class="btn btn-info btn-md">
                                        Print
                                    </a>
                                    <button type="button" title="View Timesheet" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ViewTimesheetModal" data-product_id="0">
                                        Timesheet
                                    </button>
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
                                <th scope="row">4</th>
                                <td> DA-LT-202000392 </td>
                                <td> DNDC20020279 </td>
                                <td> MR.BUNJONG PINSIRI</td>
                                <td> 25/02/2563 </td>
                                <td> 30 Day </td>
                                <td> 31/03/2563 </td>
                                <td> 15,515.00 </td>
                                <td> DA-LT-201900082 </td>
                                <td> <span class="badge badge-pill text-white font-medium badge-danger label-rouded">ยกเลิก Invoice นี้ออก Invoice ใหม่</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewInvoiceModal" data-product_id="0">
                                        View
                                    </button>
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#productModal" data-product_id="0">
                                        Edit
                                    </button>
                                    <button type="button" title="View Timesheet" class="btn btn-primary btn-md" data-toggle="modal" data-target="#ViewTimesheetModal" data-product_id="0">
                                        Timesheet
                                    </button>
                                    <button type="button" title="View invoice" class="btn btn-success btn-md" data-toggle="modal" data-target="#CreateNewInvoiceModal" data-product_id="0">
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
<div class="modal fade" id="ViewTimesheetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form row">
                    <div class="col-md-6 mb-3">
                        <p>ตารางคำนวณค่าล่วงเวลา เรียกเก็บ "Thai Beyonz Co., Ltd."</p> <br>
                        <label>ทำงาน จันทร์, อังคาร, พุธ, พฤหัสบดี, ศุกร์ เวลาเริ่มงาน 08:00:00 เวลาเลิกงาน 17:00:00</label> <br>
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
                        <label>ทำงาน จันทร์, อังคาร, พุธ, พฤหัสบดี, ศุกร์ เวลาเริ่มงาน 08:00:00 เวลาเลิกงาน 17:00:00</label> <br>
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
                                        <td colspan="2" width="250">สรุปยอดจ่ายเงิน : <b>สิทธิ์ศักดิ์ รัตน์สว่างไพ</b></td>
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
                        <a href="timesheet_contract/print_timesheet" target="_blank" class="btn btn-warning btn-md">Print</a>
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
                <h4 class="modal-title">Create new Invoice</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-right: 0px !important; padding-top: 15px;"> <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" width="100%" alt="Logo" /> </div>
                    <div class="col-md-8 mt-3 mb-2" style="padding-left: 0px !important;">
                        <font class="mt-5 head font-bold"> &nbsp;&nbsp;&nbsp;MASTER DRIVER & SERVICE (THAILAND) CO.,LTD.</font> <br>
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
                <div class="row mb-3">
                    <div class="col-md-9">
                        <div class="bottom-p">
                            <label> Customer Code : 0142 </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Please select Contract No.</label>
                        <select class="form-control" name="">
                            <option value="">----Select----</option>
                            <option value="">DA-LT-202000352</option>
                            <option value="">DA-LT-202000370</option>
                            <option value="">DA-LT-202000391</option>
                            <option value="">DA-LT-202000392</option>
                            <option value="">DA-LT-202000393</option>
                            <option value="">DA-LT-202000394</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-7" style="padding-right: 8px;">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row p-3" style="height: 200px;">
                                        <div class="col-md-2"><label>Tax Id : </label></div>
                                        <div class="col-md-5">1234567890</div>
                                        <div class="col-md-5">Branch : Head Office</div>
                                        <div class="col-md-2">Customer</div>
                                        <div class="col-md-10">
                                            <label> intervision Co., Ltd. </label> <br>
                                            <label for="">Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya 13210</label>
                                            <label> Tel. 02-1234567 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fax. 02-3456789</label>
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
                    <div class="col-md-5" style="padding-left: 7px;">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row p-3" style="height: 200px;">
                                        <div class="col-md-5">Invoice No.</div>
                                        <div class="col-md-7"> <input type="text" class="form-control" id="add_invoice_order_code" name="invoice_order_code" placeholder="" value="Will show when click 'Save'" readonly> </div>
                                        <div class="col-md-5">Date Invoice</div>
                                        <div class="col-md-7"> <input type="date" id="add_invoice_order_date_invoice" name="invoice_order_date_invoice" class="form-control search_table" placeholder=""> </div>
                                        <div class="col-md-5">Term of Payment</div>
                                        <div class="col-md-4"> <input type="number" class="form-control" id="add_invoice_order_term_payment" name="invoice_order_term_payment" placeholder="" value="Will show when click 'Save'"> </div>
                                        <div class="col-md-3">Day</div>
                                        <div class="col-md-5">Due Date</div>
                                        <div class="col-md-7"> <input type="date" id="add_invoice_order_due_date" name="invoice_order_due_date" class="form-control search_table" placeholder=""> </div>
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
                                <th class="in-table" width="7%">No.</th>
                                <th class="in-table">Code</th>
                                <th class="in-table">Description</th>
                                <th class="in-table">Quantity</th>
                                <th class="in-table">Unit</th>
                                <th class="in-table">Discount</th>
                                <th class="in-table">Amount</th>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="" name="" placeholder="" value="1">
                                </td>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_invoice_order_list_code" name="invoice_order_list_code" placeholder="" value="LTDC001-02">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_invoice_order_list_details" name="invoice_order_list_details" rows="2" cols="80">SERVICE CHARGE FOR DRIVER COST (FEB) 2020 <br>MR.BUNJONG PINSIRI</textarea>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control" id="add_invoice_order_list_quantity" name="invoice_order_list_quantity" placeholder="" value="1">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price" placeholder="" value="14500.00">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_discount" name="invoice_order_list_discount" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_amount" name="invoice_order_list_amount" placeholder="" value="14500.00">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="" name="" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_invoice_order_list_code" name="invoice_order_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_invoice_order_list_details" name="invoice_order_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control" id="add_invoice_order_list_quantity" name="invoice_order_list_quantity" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_discount" name="invoice_order_list_discount" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_amount" name="invoice_order_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="" name="" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_invoice_order_list_code" name="invoice_order_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_invoice_order_list_details" name="invoice_order_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control" id="add_invoice_order_list_quantity" name="invoice_order_list_quantity" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_discount" name="invoice_order_list_discount" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_amount" name="invoice_order_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="" name="" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_invoice_order_list_code" name="invoice_order_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_invoice_order_list_details" name="invoice_order_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control" id="add_invoice_order_list_quantity" name="invoice_order_list_quantity" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_discount" name="invoice_order_list_discount" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_amount" name="invoice_order_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="" name="" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_invoice_order_list_code" name="invoice_order_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_invoice_order_list_details" name="invoice_order_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control" id="add_invoice_order_list_quantity" name="invoice_order_list_quantity" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_discount" name="invoice_order_list_discount" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_amount" name="invoice_order_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="" name="" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_invoice_order_list_code" name="invoice_order_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_invoice_order_list_details" name="invoice_order_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control" id="add_invoice_order_list_quantity" name="invoice_order_list_quantity" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_discount" name="invoice_order_list_discount" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_amount" name="invoice_order_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="" name="" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_invoice_order_list_code" name="invoice_order_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_invoice_order_list_details" name="invoice_order_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control" id="add_invoice_order_list_quantity" name="invoice_order_list_quantity" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_discount" name="invoice_order_list_discount" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_amount" name="invoice_order_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="" name="" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <input type="text" class="form-control" id="add_invoice_order_list_code" name="invoice_order_list_code" placeholder="" value="">
                                </td>
                                <td class="in-table">
                                    <textarea class="form-control" id="add_invoice_order_list_details" name="invoice_order_list_details" rows="2" cols="80"></textarea>
                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control" id="add_invoice_order_list_quantity" name="invoice_order_list_quantity" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_unit_price" name="invoice_order_list_unit_price" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_discount" name="invoice_order_list_discount" placeholder="" value="">
                                </td>
                                <td class="text-right">
                                    <input type="number" class="form-control" id="add_invoice_order_list_amount" name="invoice_order_list_amount" placeholder="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" rowspan="4">
                                    <div class="col-md-12">
                                        <p class="mt-2"> <b> Remark : </b></p>
                                        <textarea class="form-control" id="add_invoice_order_remark" name="invoice_order_remark" rows="4" cols="80"></textarea>
                                        <p class="mt-2"> Please Settle by cheque make "A/C Payee Only" <b>MASTER DRIVER 7 SERVICES (THAILAND) CO.,LTD.</b></p>
                                        <p> After your transfer,please advise to Collection Dept. at Tel : 065-525-5636 E-mail : <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d6b5b9babab3b5a2bfb9b896bbb7a5a2b3a4b2a4bfa0b3a4f8b5b9f8a2be">[email&#160;protected]</a></p>
                                    </div>
                                </td>
                                <td colspan="2"> <b>Amount</b></td>
                                <td align="right">
                                    <input type="number" class="form-control" id="add_invoice_order_amount" name="invoice_order_amount" placeholder="" value="14500.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Discount</b></td>
                                <td align="right">
                                    <input type="number" class="form-control" id="add_invoice_order_discount" name="invoice_order_discount" placeholder="" value="0.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Sub Total</b></td>
                                <td align="right">
                                    <input type="number" class="form-control" id="add_invoice_order_subtotal" name="invoice_order_subtotal" placeholder="" value="14500.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Vat 7 %</b></td>
                                <td align="right">
                                    <input type="number" class="form-control" id="add_invoice_order_vat" name="invoice_order_vat" placeholder="" value="1015.00" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">(FIFTEEN THOUSAND, FIVE HUNDRED AND FIFTEEN BATH ONLY)</td>
                                <td colspan="2"><b>Net Total</b></td>
                                <td align="right">
                                    <input type="number" class="form-control" id="add_invoice_order_net_total" name="invoice_order_net_total" placeholder="" value="15515.00" readonly>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <b>Condition :</b>
                        <textarea class="form-control" id="add_invoice_order_condition" name="invoice_order_condition" rows="4" cols="80"></textarea>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-md-4" style="padding-right: 8px;">
                        <table class="table-radius" border="1" width="100%">
                            <tr>
                                <td>
                                    <div class="row" style="height: 200px;">
                                        <div class="col-md-12 mt-2 text-center">
                                            <small> <b>Billing Receiver by</b> </small>
                                            <br><br><br><br><br>
                                            <p>...........................................................................................</p>
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
                                            <p>...........................................................................................</p>
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
                                        <img src="https://intervision.co/mock-up/assets/images/mdsot/signature.jpg" width="60%" alt="Logo" />
                                        <br>
                                        <label>Authorizer</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center mt-5 mb-4">
                    <a href="javascript:void(0);" class="btn btn-success btn-md">
                        Save
                    </a>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2" style="padding-right: 0px !important; padding-top: 15px;"> <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" width="100%" alt="Logo" /> </div>
                    <div class="col-md-8 mt-3 mb-2" style="padding-left: 0px !important;">
                        <font class="mt-5 head font-bold"> &nbsp;&nbsp;&nbsp;MASTER DRIVER & SERVICE (THAILAND) CO.,LTD.</font> <br>
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
                                            <label> Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya 13210 </label>
                                            <label> Tel. 02-1234567 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fax. 02-3456789</label>
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
                                <td> <small>SERVICE CHARGE FOR DRIVER COST (FEB) 2020 <br>MR.BUNJONG PINSIRI </small> </td>
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
                                    <p> <b> Remark : </b> DA-LT-20190082</p>
                                    <br><br><br><br>
                                    Please Settle by cheque make "A/C Payee Only" <b>MASTER DRIVER 7 SERVICES (THAILAND) CO.,LTD.</b>
                                    <br>
                                    After your transfer,please advise to Collection Dept. at Tel : 065-525-5636 E-mail : <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfdcd0d3d3dadccbd6d0d1ffd2decccbdacddbcdd6c9dacd91dcd091cbd7">[email&#160;protected]</a>
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
                                <td colspan="4" class="text-center">(FIFTEEN THOUSAND, FIVE HUNDRED AND FIFTEEN BATH ONLY)</td>
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
                                            <p>...........................................................................................</p>
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
                                            <p>...........................................................................................</p>
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
                                        <img src="https://intervision.co/mock-up/assets/images/mdsot/signature.jpg" width="60%" alt="Logo" />
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
@endsection