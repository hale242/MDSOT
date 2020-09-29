@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <button id="swapSearch" type="button" class="btn btn-outline-secondary m-t-10 mb-0 mr-1 float-right newdata showSerach showSearch" data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample">
                    <span class="ti-angle-down"></span>
                </button>
                <div class="collapse" id="collapseExample">
                    <form id="FormSearch">
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Run code</label>
                                    <input type="text" id="run_code_code_Search" name="run_code_code" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Type</label>
                                    <select class="form-control custom-select search_table_select select2" name="run_code_type" id="run_code_type_Search" data-placeholder="" tabindex="1">
                                        <option value="">----Select----</option>
                                        <option value="1">(1) แบบประเมินผลการสัมภาษณ์ (Interview Evaluation) F#6</option>
                                        <option value="2">(2) รายชื่อพนักงานขับรถเริ่มงานใหม่เข้าอบรม ประจำวัน F#7 (เอกสารอบรม) ประจำวัน</option>
                                        <option value="3">(3) ประวัติพนักงานขับรถยนต์ (Driver Profile) F#8</option>
                                        <option value="4">(4) แบบประเมินการขับรถของผู้สมัครพนักงานขับรถยนต์ F#3</option>
                                        <option value="5">(5) ใบลงเวลาทดแทน (Timesheet) F#4</option>
                                        <option value="6">(6) สัญญาจ้างบริการพนักงานขับรถยนต์ (ไทย - อังกฤษ) F#1</option>
                                        <option value="7">(7) แบบฟอร์ม Confirmation Letter (ไทย - อังกฤษ) F#2</option>
                                        <option value="8">(8) แบบฟอร์ม Quotation (ไทย - อังกฤษ) F#4</option>
                                        <option value="9">(9) แบบฟอร์มบริหารทรัพย์สิน F#5</option>
                                        <option value="10">(10) ชุดขอออกสัญญา F#6</option>
                                        <option value="11">(11) ตัวอย่าง Pre-Approve F#8</option>
                                        <option value="12">(12) ใบแจ้งบริการ F#11</option>
                                        <option value="13">(13) Letter Out F#12</option>
                                        <option value="14">(14) Invoice C#1 (Service)</option>
                                        <option value="15">(15) Invoice C#1 (Overtime+Other)</option>
                                        <option value="16">(16) Tax Invoice/Receipt C#2</option>
                                        <option value="17">(17) ใบวางบิล C#3</option>
                                        <option value="18">(18) ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) C#4 (Service)</option>
                                        <option value="19">(19) ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) C#4 (Overtime+Other)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Book</label>
                                    <input type="text" id="run_code_book_acc_Search" name="run_code_book_acc" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Account code</label>
                                    <input type="text" id="run_code_acc_code_Search" name="run_code_acc_code" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Ref type</label>
                                    <select class="form-control custom-select search_table_select select2" name="run_code_reftype" id="run_code_reftype_Search" data-placeholder="" tabindex="1">
                                        <option value="">----Select----</option>
                                        <option value="RI">ใบเสร็จรับเงินรับ (ซื้อมาขายไป)</option>
                                        <option value="RV">ใบเสร็จรับเงิน (งานบริการ) หรืออื่น ๆ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Pay type</label>
                                    <input type="text" id="run_code_paytype_Search" name="run_code_paytype" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="submit" id="btnFiterSubmitSearch" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                        <button type="button" id="btnFiterClear" class="btn btn-secondary btn-clear-search">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
                    @if(App\Helper::CheckPermissionMenu('RunCode' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">

                </div>
                <table id="tableRunCode" class="table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 90px;">Actions</th>
                            <th scope="col">No</th>
                            <th scope="col">Run code</th>
                            <th scope="col">Details</th>
                            <th scope="col">Type</th>
                            <th scope="col">Book</th>
                            <th scope="col">Account code</th>
                            <th scope="col">Ref type</th>
                            <th scope="col">Pay type</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection @section('modal')
<div class="modal fade" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormAdd">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_reftype">รูปแบบ</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1" id="add_edit_run_code_type_run1" name="run_code_type_run">
                                            <label class="custom-control-label" for="add_edit_run_code_type_run1">รายเดือน<br>ตัวอย่าง BKQT2006-xxxxx</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="2" id="add_edit_run_code_type_run2" name="run_code_type_run">
                                            <label class="custom-control-label" for="add_edit_run_code_type_run2">รายปี<br>ตัวอย่าง BKQT2020-xxxxx</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_code">Run code</label>
                                    <input type="text" class="form-control" id="add_run_code_code" name="run_code_code" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_run_code_details" name="run_code_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_type">Type</label>
                                    <select class="form-control custom-select select2" id="run_code_type" name="run_code_type">
                                        <option value="">----Select----</option>
                                        <option value="1">(1) แบบประเมินผลการสัมภาษณ์ (Interview Evaluation) F#6</option>
                                        <option value="2">(2) รายชื่อพนักงานขับรถเริ่มงานใหม่เข้าอบรม ประจำวัน F#7 (เอกสารอบรม) ประจำวัน</option>
                                        <option value="3">(3) ประวัติพนักงานขับรถยนต์ (Driver Profile) F#8</option>
                                        <option value="4">(4) แบบประเมินการขับรถของผู้สมัครพนักงานขับรถยนต์ F#3</option>
                                        <option value="5">(5) ใบลงเวลาทดแทน (Timesheet) F#4</option>
                                        <option value="6">(6) สัญญาจ้างบริการพนักงานขับรถยนต์ (ไทย - อังกฤษ) F#1</option>
                                        <option value="7">(7) แบบฟอร์ม Confirmation Letter (ไทย - อังกฤษ) F#2</option>
                                        <option value="8">(8) แบบฟอร์ม Quotation (ไทย - อังกฤษ) F#4</option>
                                        <option value="9">(9) แบบฟอร์มบริหารทรัพย์สิน F#5</option>
                                        <option value="10">(10) ชุดขอออกสัญญา F#6</option>
                                        <option value="11">(11) ตัวอย่าง Pre-Approve F#8</option>
                                        <option value="12">(12) ใบแจ้งบริการ F#11</option>
                                        <option value="13">(13) Letter Out F#12</option>
                                        <option value="14">(14) Invoice C#1 (Service)</option>
                                        <option value="15">(15) Invoice C#1 (Overtime+Other)</option>
                                        <option value="16">(16) Tax Invoice/Receipt C#2</option>
                                        <option value="17">(17) ใบวางบิล C#3</option>
                                        <option value="18">(18) ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) C#4 (Service)</option>
                                        <option value="19">(19) ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) C#4 (Overtime+Other)</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_book_acc">Book</label>
                                    <input type="text" class="form-control" id="run_code_book_acc" name="run_code_book_acc" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_acc_code">Account code</label>
                                    <input type="text" class="form-control" id="run_code_acc_code" name="run_code_acc_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_reftype">Ref type</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="RI" id="run_code_reftype1" name="run_code_reftype">
                                            <label class="custom-control-label" for="run_code_reftype1">ใบเสร็จรับเงินรับ (ซื้อมาขายไป)</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="RV" id="run_code_reftype2" name="run_code_reftype">
                                            <label class="custom-control-label" for="run_code_reftype2">ใบเสร็จรับเงิน (งานบริการ) หรืออื่น ๆ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_paytype">Pay type</label>
                                    <input type="text" class="form-control" id="run_code_paytype" name="run_code_paytype" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_run_code_status" name="run_code_status" value="1">
                                        <label class="custom-control-label" for="add_run_code_status">Action</label>
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

<div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormEdit">
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_reftype">รูปแบบ</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1" id="edit_run_code_type_run1" name="run_code_type_run">
                                            <label class="custom-control-label" for="edit_run_code_type_run1">รายเดือน<br>ตัวอย่าง BKQT2006-xxxxx</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="2" id="edit_run_code_type_run2" name="run_code_type_run">
                                            <label class="custom-control-label" for="edit_run_code_type_run2">รายปี<br>ตัวอย่าง BKQT2020-xxxxx</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_code">Run code</label>
                                    <input type="text" class="form-control" id="edit_run_code_code" name="run_code_code" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_run_code_details" name="run_code_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_type">Type</label>
                                    <select class="form-control custom-select select2" id="edit_run_code_type" name="run_code_type">
                                        <option value="">----Select----</option>
                                        <option value="1">(1) แบบประเมินผลการสัมภาษณ์ (Interview Evaluation) F#6</option>
                                        <option value="2">(2) รายชื่อพนักงานขับรถเริ่มงานใหม่เข้าอบรม ประจำวัน F#7 (เอกสารอบรม) ประจำวัน</option>
                                        <option value="3">(3) ประวัติพนักงานขับรถยนต์ (Driver Profile) F#8</option>
                                        <option value="4">(4) แบบประเมินการขับรถของผู้สมัครพนักงานขับรถยนต์ F#3</option>
                                        <option value="5">(5) ใบลงเวลาทดแทน (Timesheet) F#4</option>
                                        <option value="6">(6) สัญญาจ้างบริการพนักงานขับรถยนต์ (ไทย - อังกฤษ) F#1</option>
                                        <option value="7">(7) แบบฟอร์ม Confirmation Letter (ไทย - อังกฤษ) F#2</option>
                                        <option value="8">(8) แบบฟอร์ม Quotation (ไทย - อังกฤษ) F#4</option>
                                        <option value="9">(9) แบบฟอร์มบริหารทรัพย์สิน F#5</option>
                                        <option value="10">(10) ชุดขอออกสัญญา F#6</option>
                                        <option value="11">(11) ตัวอย่าง Pre-Approve F#8</option>
                                        <option value="12">(12) ใบแจ้งบริการ F#11</option>
                                        <option value="13">(13) Letter Out F#12</option>
                                        <option value="14">(14) Invoice C#1 (Service)</option>
                                        <option value="15">(15) Invoice C#1 (Overtime+Other)</option>
                                        <option value="16">(16) Tax Invoice/Receipt C#2</option>
                                        <option value="17">(17) ใบวางบิล C#3</option>
                                        <option value="18">(18) ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) C#4 (Service)</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_book_acc">Book</label>
                                    <input type="text" class="form-control" id="edit_run_code_book_acc" name="run_code_book_acc" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_acc_code">Account code</label>
                                    <input type="text" class="form-control" id="edit_run_code_acc_code" name="run_code_acc_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_reftype">Ref type</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="RI" id="edit_run_code_reftypeRI" name="run_code_reftype">
                                            <label class="custom-control-label" for="edit_run_code_reftypeRI">ใบเสร็จรับเงินรับ (ซื้อมาขายไป)</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="RV" id="edit_run_code_reftypeRV" name="run_code_reftype">
                                            <label class="custom-control-label" for="edit_run_code_reftypeRV">ใบเสร็จรับเงิน (งานบริการ) หรืออื่น ๆ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_paytype">Pay type</label>
                                    <input type="text" class="form-control" id="edit_run_code_paytype" name="run_code_paytype" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_run_code_status" name="run_code_status" value="1">
                                        <label class="custom-control-label" for="edit_run_code_status">Action</label>
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

<div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Code Run Type</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_type_run" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Run code</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Type</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_type" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Book</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_book_acc" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Account code</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_acc_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Ref type</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_reftype" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Pay typ</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_paytype" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_run_code_status" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var tableRunCode = $('#tableRunCode').dataTable({
        "ajax": {
            "url": url_gb + "/admin/RunCode/Lists",
            "type": "POST",
            "data": function(d) {
                d.run_code_code = $('#run_code_code_Search').val();
                d.run_code_type = $('#run_code_type_Search').val();
                d.run_code_book_acc = $('#run_code_book_acc_Search').val();
                d.run_code_acc_code = $('#run_code_acc_code_Search').val();
                d.run_code_reftype = $('#run_code_reftype_Search').val();
                d.run_code_paytype = $('#run_code_paytype_Search').val();
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [{
                "data": "action",
                "name": "action",
                "searchable": false,
                "sortable": false,
                "class": "text-center"
            },
            {
                "data": "DT_RowIndex",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "run_code_code",
                "class": "text-center"
            },
            {
                "data": "run_code_details",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "run_code_type",
                "class": "text-center"
            },
            {
                "data": "run_code_book_acc",
                "class": "text-center"
            },
            {
                "data": "run_code_acc_code",
                "class": "text-center"
            },
            {
                "data": "run_code_reftype",
                "class": "text-center"
            },
            {
                "data": "run_code_paytype",
                "class": "text-center"
            },


        ],
        // "select": true,
        "dom": 'Bfrtip',
        "lengthMenu": [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "columnDefs": [{
            className: 'noVis',
            visible: false
        }],
        "buttons": [
            'pageLength',
            'colvis',
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        processing: true,
        serverSide: true,

    });

    $('body').on('click', '.btn-add', function(data) {
        $('#add_run_code_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/RunCode/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var reftype = res.content.run_code_reftype;
            var type_run = res.content.run_code_type_run;


            $('#edit_run_code_type_run' + type_run).prop('checked', true);
            // $("input[type=radio][name=run_code_type_run]").prop("disabled", true);
            $('#edit_run_code_type_run1').prop("disabled", true);
            $('#edit_run_code_type_run2').prop("disabled", true);

            $("#edit_run_code_code").val(data.run_code_code);
            $("#edit_run_code_details").val(data.run_code_details);
            $("#edit_run_code_type").val(data.run_code_type).change();
            $("#edit_run_code_type").prop("disabled", true);
            $('#edit_run_code_book_acc').val(data.run_code_book_acc);
            $('#edit_run_code_acc_code').val(data.run_code_acc_code);
            $('#edit_run_code_reftype' + reftype).prop('checked', true);
            $('#edit_run_code_paytype').val(data.run_code_paytype);
            if (data.run_code_status == 1) {
                $('#edit_run_code_status').prop('checked', true);
            } else {
                $('#edit_run_code_status').prop('checked', false);
            }
            $('#ModalEdit').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/RunCode/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            var type_run = '';
            // console.log(data);
            if (data.run_code_type == '1') {
                code_type = 'แบบประเมินผลการสัมภาษณ์ (Interview Evaluation) F#6';
            } else if (data.run_code_type == '2') {
                code_type = 'รายชื่อพนักงานขับรถเริ่มงานใหม่เข้าอบรม ประจำวัน F#7 (เอกสารอบรม) ประจำวัน';
            } else if (data.run_code_type == '3') {
                code_type = 'ประวัติพนักงานขับรถยนต์ (Driver Profile) F#8';
            } else if (data.run_code_type == '4') {
                code_type = 'แบบประเมินการขับรถของผู้สมัครพนักงานขับรถยนต์ F#3';
            } else if (data.run_code_type == '5') {
                code_type = 'ใบลงเวลาทดแทน (Timesheet) F#4';
            } else if (data.run_code_type == '6') {
                code_type = 'สัญญาจ้างบริการพนักงานขับรถยนต์ (ไทย - อังกฤษ) F#1';
            } else if (data.run_code_type == '7') {
                code_type = 'แบบฟอร์ม Confirmation Letter (ไทย - อังกฤษ) F#2';
            } else if (data.run_code_type == '8') {
                code_type = 'แบบฟอร์ม Quotation (ไทย - อังกฤษ) F#4';
            } else if (data.run_code_type == '9') {
                code_type = 'แบบฟอร์มบริหารทรัพย์สิน F#5';
            } else if (data.run_code_type == '10') {
                code_type = 'ชุดขอออกสัญญา F#6';
            } else if (data.run_code_type == '11') {
                code_type = 'ตัวอย่าง Pre-Approve F#8';
            } else if (data.run_code_type == '12') {
                code_type = 'ใบแจ้งบริการ F#11';
            } else if (data.run_code_type == '13') {
                code_type = 'Letter Out F#12';
            } else if (data.run_code_type == '14') {
                code_type = 'Invoice C#1 (Service)';
            } else if (data.run_code_type == '15') {
                code_type = 'Invoice C#1 (Overtime+Other)';
            } else if (data.run_code_type == '16') {
                code_type = 'Tax Invoice/Receipt C#2';
            } else if (data.run_code_type == '17') {
                code_type = 'ใบวางบิล C#3';
            } else if (data.run_code_type == '18') {
                code_type = 'ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) C#4 (Service)';
            }
            if (data.run_code_reftype == 'RI') {
                code_reftype = 'ใบเสร็จรับเงินรับ(ซื้อมาขายไป)'
            }
            if (data.run_code_reftype == 'RV') {
                code_reftype = 'ใบเสร็จรับเงิน(งานบริการ) หรืออื่นๆ'
            }
            if (data.run_code_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            if (data.run_code_type_run == 1) {
                type_run = "รายเดือน";
            } else {
                type_run = "รายปี";
            }
            $('#show_run_code_type_run').text(type_run);
            $('#show_run_code_code').text(data.run_code_code);
            $('#show_run_code_details').text(data.run_code_details);
            $('#show_run_code_type').text(code_type);
            $('#show_run_code_book_acc').text(data.run_code_book_acc);
            $('#show_run_code_acc_code').text(data.run_code_acc_code);
            $('#show_run_code_reftype').text(code_reftype);
            $('#show_run_code_paytype').text(data.run_code_paytype);
            $('#show_run_code_status').text(status);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.change-status', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/RunCode/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableRunCode.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/RunCode",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableRunCode.api().ajax.reload();
                $('#ModalAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/RunCode/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableRunCode.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
    $('body').on('click', '.btn-search', function(data) {
        tableRunCode.api().ajax.reload();
    });
    $('body').on('click', '.btn-clear-search', function(data) {
        $('#run_code_code_Search').val('');
        $('#run_code_type_Search').val('').change();
        $('#run_code_book_acc_Search').val('');
        $('#run_code_acc_code_Search').val('');
        $('#run_code_reftype_Search').val('').change();;
        $('#run_code_paytype_Search').val('');
        tableRunCode.api().ajax.reload();
    });
</script>
@endsection
