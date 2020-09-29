<div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <input type="hidden" id="customer_contract_company_id" name="company_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="customer_contract_type_lang">ภาษา</label> <br />
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="edit_customer_contract_type_lang1" name="customer_contract_type_lang" value="1">
                                        <label class="custom-control-label" for="edit_customer_contract_type_lang1">ภาษาไทย</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="edit_customer_contract_type_lang2" name="customer_contract_type_lang" value="2">
                                        <label class="custom-control-label" for="edit_customer_contract_type_lang2">English</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="radio">สถานะสัญญา</label>
                                    <select class="select2 form-control custom-select" id="edit_customer_contract_status" disabled>
                                        <option value="0">รอสร้างสัญญา</option>
                                        <option value="1">รอข้อมูลพนักงานประจำสัญญา/รอสัมภาษณ์พนักงาน</option>
                                        <option value="2">ส่งอนุมัติ/รออนุมัติ</option>
                                        <option value="3">อนุมัติรอเริ่มงาน</option>
                                        <option value="4">อนุมัติเริ่มงาน</option>
                                        <option value="5">ยกเลิก</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="customer_contract_date_approve">วันที่อนุมัติสัญญา</label>
                                    <input type="date" class="form-control" id="edit_customer_contract_date_approve" name="customer_contract_date_approve">
                                </div>
                                <div class="col-md-4 mb-3 customer_contract_full_code">
                                    <label for="customer_contract_full_code">เลขที่สัญญา</label>
                                    <input type="text" class="form-control" id="edit_customer_contract_full_code" readonly>
                                </div>
                                <div class="col-md-4 mb-3 run_code_id">
                                    <label for="run_code_id">Type</label>
                                    <select class="select2 form-control custom-select" id="edit_run_code_id" name="run_code_id">
                                        <option value="">----select----</option>
                                        @foreach($RunCodes as $val)
                                            <option value="{{$val->run_code_id}}">{{$val->run_code_code}} ({{$val->run_code_details}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_id">บริษัทที่รับจ้าง (ผู้รับจ้าง)</label>
                                    <select class="select2 form-control custom-select" id="edit_head_documents_id" name="head_documents_id" required>
                                        <option value="">----Selete----</option>
                                        @foreach($HeadDocuments as $val)
                                            <option value="{{$val->head_documents_id}}">{{$val->head_documents_name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_id">บริษัทที่ทำสัญญา (ผู้ว่าจ้าง)</label>
                                    <select class="select2 form-control custom-select" id="edit_company_id" disabled>
                                        <option value="">----select----</option>
                                        @foreach($Companies as $val)
                                            <option value="{{$val->company_id}}">{{$val->company_name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="customer_contract_address">ที่อยู่บริษัทที่ทำสัญญา</label>
                                    <textarea class="form-control" id="edit_customer_contract_address" name="customer_contract_address" rows="2"></textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="customer_contract_date_start">Bill date</label>
                                    <input type="date" class="form-control bill_date" id="edit_company_bill_date" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="customer_contract_date_start">วันที่เริ่มสัญญา</label>
                                    <input type="date" class="form-control start_date" id="edit_customer_contract_date_start" name="customer_contract_date_start" onchange="calculate_date(2,1)" required />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="customer_contract_date_end">วันสิ้นสุดสัญญา</label>
                                    <input type="date" class="form-control end_date" id="edit_customer_contract_date_end" name="customer_contract_date_end" onchange="calculate_date(2,3)" required />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="customer_contract_month">จำนวนเดือนตามสัญญา</label>
                                    <input type="number" class="form-control month_amount" id="edit_customer_contract_month" name="customer_contract_month" readonly />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="customer_contract_month">จำนวนวันตามสัญญา</label>
                                    <input type="number" class="form-control date_amount" onchange="calculate_date(2,2)" readonly />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="customer_contract_type_lang">วันทำงาน</label> <br />
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="edit_customer_contract_day_mon" name="customer_contract_day_mon" value="1" />
                                        <label class="custom-control-label" for="edit_customer_contract_day_mon">วันจันทร์</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="edit_customer_contract_day_tue" name="customer_contract_day_tue" value="1" />
                                        <label class="custom-control-label" for="edit_customer_contract_day_tue">วันอังคาร</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="edit_customer_contract_day_wed" name="customer_contract_day_wed" value="1" />
                                        <label class="custom-control-label" for="edit_customer_contract_day_wed">วันพุธ</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="edit_customer_contract_day_thu" name="customer_contract_day_thu" value="1" />
                                        <label class="custom-control-label" for="edit_customer_contract_day_thu">วันพฤหัส</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="edit_customer_contract_day_fri" name="customer_contract_day_fri" value="1" />
                                        <label class="custom-control-label" for="edit_customer_contract_day_fri">วันศุกร์</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="edit_customer_contract_day_sat" name="customer_contract_day_sat" value="1" />
                                        <label class="custom-control-label" for="edit_customer_contract_day_sat">วันเสาร์</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="edit_customer_contract_day_sun" name="customer_contract_day_sun" value="1" />
                                        <label class="custom-control-label" for="edit_customer_contract_day_sun">วันอาทิตย์</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_time_start">เวลาเริ่มทำงาน</label>
                                    <input type="time" class="form-control" id="edit_customer_contract_time_start" name="customer_contract_time_start" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_time_end">เวลาสิ้นสุดทำงาน</label>
                                    <input type="time" class="form-control" id="edit_customer_contract_time_end" name="customer_contract_time_end" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_price">อัตราค่าบริการ / เดือน</label>
                                    <input type="text" class="form-control price" id="edit_customer_contract_price" name="customer_contract_price" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_price_text">อัตราค่าบริการแบบตัวหนังสือ</label>
                                    <input type="text" class="form-control" id="edit_customer_contract_price_text" name="customer_contract_price_text">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_date_pay">กำหนดวันชำระเงิน ทุกวันที่...ของเดือน</label>
                                    <input type="number" min="0" class="form-control" id="edit_customer_contract_date_pay" name="customer_contract_date_pay">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="customer_contract_appendix_1">ภาคผนวกที่ 1</label>
                                    <textarea class="form-control" id="edit_customer_contract_appendix_1" name="customer_contract_appendix_1" rows="5" data-sample="1" data-sample-short></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="customer_contract_appendix_2">ภาคผนวกที่ 2</label>
                                    <textarea class="form-control" id="edit_customer_contract_appendix_2" name="customer_contract_appendix_2" rows="5" data-sample="1" data-sample-short></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="customer_contract_appendix_3">ภาคผนวกที่ 3</label>
                                    <textarea class="form-control" id="edit_customer_contract_appendix_3" name="customer_contract_appendix_3" rows="5" data-sample="1" data-sample-short></textarea>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="customer_contract_contractor_sign">ชื่อผู้รับจ้างเซ็นเอกสาร</label>
                                            <input type="text" class="form-control" id="edit_customer_contract_contractor_sign" name="customer_contract_contractor_sign">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="customer_contract_contractor_witness_1">ชื่อพยานผู้รับจ้างคนที่ 1</label>
                                            <input type="text" class="form-control" id="edit_customer_contract_contractor_witness_1" name="customer_contract_contractor_witness_1">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="customer_contract_contractor_witness_2">ชื่อพยานผู้รับจ้างคนที่ 2</label>
                                            <input type="text" class="form-control" id="edit_customer_contract_contractor_witness_2" name="customer_contract_contractor_witness_2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="customer_contract_customer_sign">ชื่อผู้ว่าจ้างเซ็นสัญญา</label>
                                            <input type="text" class="form-control" id="edit_customer_contract_customer_sign" name="customer_contract_customer_sign" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="customer_contract_customer_witness_2">ชื่อพยานผู้ว่าจ้างคนที่ 1</label>
                                            <input type="text" class="form-control" id="edit_customer_contract_customer_witness_1" name="customer_contract_customer_witness_1">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="customer_contract_customer_witness_3">ชื่อพยานผู้ว่าจ้างคนที่ 2</label>
                                            <input type="text" class="form-control" id="edit_customer_contract_customer_witness_2" name="customer_contract_customer_witness_2">
                                        </div>
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
