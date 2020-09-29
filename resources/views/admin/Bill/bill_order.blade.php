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
<label class="control-label">Bill full code</label>
<input type="text" id="search_bill_order_code" name="bill_order_code" class="form-control search_table" placeholder="">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label class="control-label">Date</label>
<input type="date" id="search_bill_order_date_invoice" name="bill_order_date_invoice" class="form-control search_table" placeholder="">
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
<label class="control-label">Status</label>
<select class="form-control" id="search_bill_order_status" name="bill_order_status">
<option value="2">-----Select-----</option>
<option value="0">รอยืนยันการออกใบวางบิล</option>
<option value="1">ออก ใบวางบิล</option>
<option value="99">ยกเลิก ใบวางบิลนี้ออก ใบวางบิลใหม่</option>
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
<h4 class="card-title">Bill</h4>
<button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata" data-toggle="modal" data-target="#CreateBillModal" data-product_id="0">Add New</button>
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
<th scope="col">Bill full code</th>
<th scope="col">Driver</th>
<th scope="col">Date</th>
<th scope="col">Due date</th>
<th scope="col">Remark</th>
<th scope="col">Amount</th>
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
<td>BN200200140</td>
<td>MR.BUNJONG PINSIRI</td>
<td>25/02/2563</td>
<td>31/03/2563</td>
<td> </td>
<td> 56,971.13</td>
<td> <span class="badge badge-pill text-white font-medium badge-secondary label-rouded">รอยืนยันการออกใบวางบิล</span> </td>
<td>
<input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
<button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewBillModal" data-product_id="0">
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
<td>BN200200141</td>
<td>MR.BUNJONG PINSIRI</td>
<td>25/02/2563</td>
<td>31/03/2563</td>
<td> </td>
<td> 56,971.13 </td>
<td> <span class="badge badge-pill text-white font-medium badge-success label-rouded">ออกใบวางบิล</span> </td>
<td>
<input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
<button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewBillModal" data-product_id="0">
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
<td>BN200200142</td>
<td>MR.BUNJONG PINSIRI</td>
<td>25/02/2563</td>
<td>31/03/2563</td>
<td> </td>
<td> 56,971.13 </td>
<td> <span class="badge badge-pill text-white font-medium badge-danger label-rouded">ยกเลิก ใบวางบิลนี้ออก ใบวางบิลใหม่</span></td>
<td>
<input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
<button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewBillModal" data-product_id="0">
View
</button>
<a href="javascript:void(0);" class="btn btn-info btn-md"> Print </a>
<button type="button" title="View invoice" class="btn btn-success btn-md" data-toggle="modal" data-target="#CreateBillModal" data-product_id="0">
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
<div class="modal fade" id="ViewBillModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">View Bill</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
</div>
<div class="col-12">
<div class="row mb-2">
<div class="col-md-9">
<div class="row">
<div class="col-md-4" style="padding-right: 0px !important; padding-top: 15px;"> <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" width="100%" alt="Logo" /> </div>
</div>
<div class="col-md-12 px-0">
<label class="mt-3 head font-bold">MASTER DRIVER & SERVICE (THAILAND) CO.,LTD. </label> <br>
<label>
2222/9 LADPRAO RD., PHLABPHA, WANGTHONGLANG, BANGKOK 10310
</label> <br>
<label>
TEL. 02-9318787 FAX. 02-9318686
</label> <br>
<label class="mb-0">
TAX ID : 0000000000 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BRANCH : HEAD OFFICE
</label>
</div>
</div>
<div class="col-md-3">
<div class="row">
<div class="col-md-12 mt-5">
<table class="table-radius" border="1" style="float: right;">
<tr class="text-center">
<td class="in-table"> <h3 class="mb-0 px-4 font-bold"> ใบวางบิล <br> BILL</h3> </td>
</tr>
</table>
</div>
<div class="col-md-12 mt-2 bottom-p">
<small>Customer Code : </small> <b>&nbsp;&nbsp; 0142 </b>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 mb-1">
<table class="table-radius" border="1" width="100%">
<tr>
<td class="in-table" style="width: 750px;">
<div class="row">
<div class="col-md-9">
<div class="row mb-3">
<div style="width:100px; padding-left: 15px;">
<b>ชื่อลูกค้า :</b> <br>
<small>Customer</small>
</div>
<div>
Intervision Co., Ltd.
</div>
</div>
<div class="row mb-3">
<div style="width:100px; padding-left: 15px;">
<b>ที่อยู่ :</b> <br>
<small>Address</small>
</div>
<div style="width:500px;">
Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya 13210
</div>
</div>
<div class="row mb-2">
<div class="col-md-6">
<div class="row">
<div style="width:100px; padding-left: 15px;">
<b>โทรศัพท์ :</b> <br>
<small>Tel.</small>
</div>
<div>
02-1234567
</div>
</div>
</div>
<div class="col-md-6">
<div class="row">
<div style="width:100px; padding-left: 15px;">
<b>โทรสาร :</b> <br>
<small>Fax.</small>
</div>
<div>
02-3456789
</div>
</div>
</div>
</div>
<div class="row mb-3">
<div class="col-md-6">
<div class="row">
<div style="width:100px; padding-left: 15px;">
TAX ID. <br>
</div>
<div>
1234567890
</div>
</div>
</div>
<div class="col-md-6">
<div class="row">
<div style="width:100px; padding-left: 15px;">
BRANCH : <br>
</div>
<div>
Head Office
</div>
</div>
</div>
</div>
<div class="row">
<div style="width:100px; padding-left: 15px;">
<b>หมายเหตุ :</b>
</div>
<div style="width: 500px;">
</div>
</div>
</div>
<div class="col-md-3">
<div class="row mb-3">
<div class="col-md-3">
<b> เลขที่ : </b><br>
<small>No.</small>
</div>
<div class="col-md-9">
BN200200140
</div>
</div>
<div class="row">
<div class="col-md-3">
<b> วันที่ :</b><br>
<small>Date.</small>
</div>
<div class="col-md-9">
25/02/2563
</div>
</div>
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
<td class="in-table" style="width: 200px;"> <b>ใบแจ้งหนี้เลขที่</b> <br> <small>Invoice no.</small> </td>
<td class="in-table" style="width: 150px;"> <b>ลงวันที่</b> <br> <small>Date</small> </td>
<td class="in-table" style="width: 200px;"> <b>วันครบกำหนดชำระ </b> <br> <small>Due Date</small> </td>
<td class="in-table" style="width: 200px;"> <b>จำนวนเงินคงค้าง</b> <br> <small>Debt Amount</small> </td>
<td class="in-table" style="width: 200px;"> <b>ยอดที่ต้องชำระ</b> <br> <small>Pay Amount</small> </td>
</tr>
</table>
<table class="table-radius" border="1" width="100%">
<tr>
<td class="in-table" style="width: 200px;"> DNDC20020279 </td>
<td class="in-table text-center" style="width: 150px;">25/02/2563 </td>
<td class="in-table text-center" style="width: 200px;"> 31/02/2563 </td>
<td class="in-table text-right" style="width: 200px;"> 15,515.00</td>
<td class="in-table text-right" style="width: 200px;"> 15,515.00</td>
</tr>
<tr>
<td class="in-table"> DNDC20020280 </td>
<td class="in-table text-center"> 25/02/2563</td>
<td class="in-table text-center"> 31/02/2563 </td>
<td class="in-table text-right"> 15,515.00 </td>
<td class="in-table text-right"> 15,515.00 </td>
</tr>
<tr>
<td class="in-table"> DNOT20020259 </td>
<td class="in-table text-center"> 25/02/2563</td>
<td class="in-table text-center"> 31/02/2563 </td>
<td class="in-table text-right"> 17,277.64 </td>
<td class="in-table text-right"> 17,277.64 </td>
</tr>
<tr>
<td class="in-table"> DNOT20020260 </td>
<td class="in-table text-center"> 25/02/2563</td>
<td class="in-table text-center"> 31/02/2563 </td>
<td class="in-table text-right"> 9,398.49 </td>
<td class="in-table text-right"> 9,398.49 </td>
</tr>
<tr>
<td class="in-table"> CNSN2002029 </td>
<td class="in-table text-center"> 25/02/2563</td>
<td class="in-table text-center"> 31/02/2563 </td>
<td class="in-table text-right"> -535.00 </td>
<td class="in-table text-right"> -535.00</td>
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
<td class="in-table font-bold" colspan="4"> (ห้าหมื่นเจ็ดพันหนึ่งร้อยเจ็ดสิบเอ็ดบาทสิบสามสตางค์) </td>
<td class="in-table text-right font-bold"> 57,171.13 </td>
</tr>
</table>
</div>
<div class="col-md-12">
<table class="table-radius" border="1" width="100%">
<tr>
<td class="in-table" width="33%">
<div class="row mb-3">
<div class="col-md-4">
<b>แผนกการเงิน :</b> <br>
<small>Finance Dept.</small>
</div>
<div class="col-md-8">
&nbsp;
</div>
</div>
<div class="row mb-3">
<div class="col-md-12">
<b>ผู้วางบิล </b>..........................................................................
<br>
<small>Recieved Bill</small>
</div>
</div>
<div class="row">
<div class="col-md-12 text-right">
______ /______ /______
</div>
</div>
</td>
<td class="in-table" width="33%">
<div class="row mb-3">
<div class="col-md-4">
<b>ลูกค้า :</b> <br>
<small>Customer</small>
</div>
<div class="col-md-8">
&nbsp;
</div>
</div>
<div class="row mb-3">
<div class="col-md-12">
<b>ผู้วางบิล </b>..........................................................................
<br>
<small>Recieved Bill</small>
</div>
</div>
<div class="row">
<div class="col-md-12 text-right">
______ /______ /______
</div>
</div>
</td>
<td class="in-table text-center" width="33%">
<div class="row mb-3">
<div class="col-md-12">
<b>วันนัดชำระเงิน</b> <br> <small>Receive Date</small>
</div>
</div>
<div class="row">
<div class="col-md-12" style="position: absolute; left: 370px; bottom: 10px;">
______ /______ /______
</div>
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
<div class="modal fade" id="CreateBillModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Create New Bill</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
</div>
<div class="col-12">
<div class="row mb-2">
<div class="col-md-9">
<div class="row">
<div class="col-md-4" style="padding-right: 0px !important; padding-top: 15px;"> <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" width="100%" alt="Logo" /> </div>
</div>
<div class="col-md-12 px-0">
<label class="mt-3 head font-bold">MASTER DRIVER & SERVICE (THAILAND) CO.,LTD. </label> <br>
<label>
2222/9 LADPRAO RD., PHLABPHA, WANGTHONGLANG, BANGKOK 10310
</label> <br>
<label>
TEL. 02-9318787 FAX. 02-9318686
</label> <br>
<label class="mb-0">
TAX ID : 0000000000 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BRANCH : HEAD OFFICE
</label>
</div>
</div>
<div class="col-md-3">
<div class="row">
<div class="col-md-12 mt-5">
<table class="table-radius" border="1" style="float: right;">
<tr class="text-center">
<td class="in-table"> <h3 class="mb-0 px-4 font-bold"> ใบวางบิล <br> BILL</h3> </td>
</tr>
</table>
</div>
 <div class="col-md-12 mt-2 bottom-p">
<label for="">Please select Customer</label>
<select class="form-control" id="add_company_name_en" name="company_name_en">
<option value="">-----Select------</option>
<option value="">Daikin Co., Ltd.</option>
<option value="">Majorgroup Co., Ltd.</option>
<option value="">Good inter group Co., Ltd.</option>
</select>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 mb-1">
<table class="table-radius" border="1" width="100%">
<tr>
<td class="in-table" style="width: 750px;">
<div class="row">
<div class="col-md-8">
<div class="row mb-3">
<div style="width:100px; padding-left: 15px;">
<b>ชื่อลูกค้า :</b> <br>
<small>Customer</small>
</div>
<div>
Intervision Co., Ltd.
</div>
</div>
<div class="row mb-3">
<div style="width:100px; padding-left: 15px;">
<b>ที่อยู่ :</b> <br>
<small>Address</small>
</div>
<div style="width:500px;">
Rojana Industrial Park, 41 Moo 5, Tumbol U-Thai, Amphur U-Thai, Ayutthaya 13210
</div>
</div>
<div class="row mb-2">
<div class="col-md-6">
<div class="row">
<div style="width:100px; padding-left: 15px;">
<b>โทรศัพท์ :</b> <br>
<small>Tel.</small>
</div>
<div>
02-1234567
</div>
</div>
</div>
<div class="col-md-6">
<div class="row">
<div style="width:100px; padding-left: 15px;">
<b>โทรสาร :</b> <br>
<small>Fax.</small>
</div>
<div>
02-3456789
</div>
</div>
</div>
</div>
<div class="row mb-3">
<div class="col-md-6">
<div class="row">
<div style="width:100px; padding-left: 15px;">
TAX ID. <br>
</div>
<div>
1234567890
</div>
</div>
</div>
<div class="col-md-6">
<div class="row">
<div style="width:100px; padding-left: 15px;">
BRANCH : <br>
</div>
<div>
Head Office
</div>
</div>
</div>
</div>
<div class="row">
<div style="width:100px; padding-left: 15px;">
<b>หมายเหตุ :</b>
</div>
<div style="width: 500px;">
<textarea class="form-control" id="bill_order_remark" name="bill_order_remark" rows="2" cols="80"></textarea>
</div>
</div>
</div>
<div class="col-md-4">
<div class="row mb-3">
<div class="col-md-3">
<b> เลขที่ : </b><br>
<small>No.</small>
</div>
<div class="col-md-9">
<input type="text" class="form-control" id="add_bill_order_code" name="bill_order_code" placeholder="" value="Will show when click 'Save'" readonly>
</div>
</div>
<div class="row">
<div class="col-md-3">
<b> วันที่ :</b><br>
<small>Date.</small>
</div>
<div class="col-md-9">
<input type="date" id="add_bill_order_date_invoice" name="bill_order_date_invoice" class="form-control search_table" placeholder="">
</div>
</div>
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
<td class="in-table" style="width: 52px;">
<b>#</b>
</td>
<td class="in-table" style="width: 200px;"> <b>ใบแจ้งหนี้เลขที่</b> <br> <small>Invoice no.</small> </td>
<td class="in-table" style="width: 150px;"> <b>ลงวันที่</b> <br> <small>Date</small> </td>
<td class="in-table" style="width: 200px;"> <b>วันครบกำหนดชำระ </b> <br> <small>Due Date</small> </td>
<td class="in-table" style="width: 200px;"> <b>จำนวนเงินคงค้าง</b> <br> <small>Debt Amount</small> </td>
<td class="in-table" style="width: 200px;"> <b>ยอดที่ต้องชำระ</b> <br> <small>Pay Amount</small> </td>
</tr>
</table>
<table class="table-radius" border="1" width="100%">
<tr>
<td class="text-center" style="width: 52px;">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="bill_order_list_status1" name="bill_order_list_status" checked>
<label class="custom-control-label ml-2" for="bill_order_list_status1"></label>
</div>
</td>
<td class="in-table" style="width: 200px;">DNDC20020279</td>
<td class="in-table text-center" style="width: 150px;">25/02/2563 </td>
<td class="in-table text-center" style="width: 200px;"> 31/02/2563 </td>
<td class="in-table text-right" style="width: 200px;"> 15,515.00</td>
<td class="in-table text-right" style="width: 200px;"> 15,515.00</td>
</tr>
<tr>
<td class="text-center">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="bill_order_list_status2" name="bill_order_list_status" checked>
<label class="custom-control-label ml-2" for="bill_order_list_status2"></label>
</div>
</td>
<td class="in-table">DNDC20020280</td>
<td class="in-table text-center"> 25/02/2563</td>
<td class="in-table text-center"> 31/02/2563 </td>
<td class="in-table text-right"> 15,515.00 </td>
<td class="in-table text-right"> 15,515.00 </td>
</tr>
<tr>
<td class="text-center">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="bill_order_list_status3" name="bill_order_list_status" checked>
<label class="custom-control-label ml-2" for="bill_order_list_status3"></label>
</div>
</td>
<td class="in-table">DNOT20020259</td>
<td class="in-table text-center"> 25/02/2563</td>
<td class="in-table text-center"> 31/02/2563 </td>
<td class="in-table text-right"> 17,277.64 </td>
<td class="in-table text-right"> 17,277.64 </td>
</tr>
<tr>
<td class="text-center">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="bill_order_list_status4" name="bill_order_list_status" checked>
<label class="custom-control-label ml-2" for="bill_order_list_status4"></label>
</div>
</td>
<td class="in-table">DNOT20020260</td>
<td class="in-table text-center"> 25/02/2563</td>
<td class="in-table text-center"> 31/02/2563 </td>
<td class="in-table text-right"> 9,398.49 </td>
<td class="in-table text-right"> 9,398.49 </td>
</tr>
<tr>
<td class="text-center">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="bill_order_list_status5" name="bill_order_list_status" checked>
<label class="custom-control-label ml-2" for="bill_order_list_status5"></label>
</div>
</td>
<td class="in-table">CNSN2002029</td>
<td class="in-table text-center"> 25/02/2563</td>
<td class="in-table text-center"> 31/02/2563 </td>
<td class="in-table text-right"> -535.00 </td>
<td class="in-table text-right"> -535.00</td>
</tr>
<tr>
<td class="text-center">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="bill_order_list_status6" name="bill_order_list_status" checked>
<label class="custom-control-label ml-2" for="bill_order_list_status6"></label>
</div>
</td>
<td class="in-table">CNSN2002030</td>
<td class="in-table text-center"> 25/02/2563 </td>
<td class="in-table text-center"> 31/02/2563</td>
<td class="in-table text-right"> -200.00</td>
<td class="in-table text-right"> -200.00</td>
</tr>
<tr>
<td></td>
<td class="in-table"> &nbsp; </td>
<td class="in-table"> </td>
<td class="in-table"> </td>
<td class="in-table"> </td>
<td class="in-table"> </td>
</tr>
<tr>
<td></td>
<td class="in-table"> &nbsp; </td>
<td class="in-table"> </td>
<td class="in-table"> </td>
<td class="in-table"> </td>
<td class="in-table"> </td>
</tr>
<tr>
<td class="in-table font-bold" colspan="5"> (ห้าหมื่นเจ็ดพันหนึ่งร้อยเจ็ดสิบเอ็ดบาทสิบสามสตางค์) </td>
<td class="in-table text-right font-bold"> 56,971.13 </td>
</tr>
</table>
</div>
<div class="col-md-12">
<table class="table-radius" border="1" width="100%">
<tr>
<td class="in-table" width="33%">
<div class="row mb-3">
<div class="col-md-4">
<b>แผนกการเงิน :</b> <br>
<small>Finance Dept.</small>
</div>
<div class="col-md-8">
&nbsp;
</div>
</div>
<div class="row mb-3">
<div class="col-md-12">
<b>ผู้วางบิล </b>..........................................................................
<br>
<small>Recieved Bill</small>
</div>
</div>
<div class="row">
<div class="col-md-12 text-right">
______ /______ /______
</div>
</div>
</td>
<td class="in-table" width="33%">
<div class="row mb-3">
<div class="col-md-4">
<b>ลูกค้า :</b> <br>
<small>Customer</small>
</div>
<div class="col-md-8">
&nbsp;
</div>
</div>
<div class="row mb-3">
<div class="col-md-12">
<b>ผู้วางบิล </b>..........................................................................
<br>
<small>Recieved Bill</small>
</div>
</div>
<div class="row">
<div class="col-md-12 text-right">
______ /______ /______
</div>
</div>
</td>
<td class="in-table text-center" width="33%">
<div class="row mb-3">
<div class="col-md-12">
<b>วันนัดชำระเงิน</b> <br> <small>Receive Date</small>
</div>
</div>
<div class="row">
<div class="col-md-12" style="position: absolute; left: 370px; bottom: 10px;">
______ /______ /______
</div>
</div>
</td>
</tr>
</table>
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
@endsection