<div class="modal fade" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormAdd" class="needs-validation" novalidate="">
                <div class="card">

                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="customer_id">Company Code</label>
                                    <input type="text" class="form-control" id="add_company_code" name="company[company_code]" placeholder="" value="" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="company_branch_status">Head office</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_company_branch_status" name="company[company_branch_status]" value="Y">
                                        <label class="custom-control-label" for="add_company_branch_status">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="company_branch">Name of company branch </label>
                                    <input type="text" class="form-control" id="add_company_branch" name="company[company_branch]" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_details">Contact info Type</label>
                                    <select class="form-control custom-select select2" id="add_customer_type_id" name="company[customer_type_id]" required>
                                        <option value="" required>เลือกประเภทของลูกค้า</option>
                                        @foreach($CustomerType as $val)
                                        <option value="{{ $val->customer_type_id }}">{{ $val->customer_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sale_team_sub_id">Area</label>
                                    <select class="form-control custom-select select2" id="add_sale_team_sub_id" name="company[sale_team_sub_id]" required>
                                        <option value="" required>เลือกเขตพื้นที่</option>
                                        @foreach($SaleArea as $val)
                                        <option value="{{ $val->sale_team_sub_id }}">{{ $val->sale_team_sub_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_name_th">Company Name (Thai Name)</label>
                                    <input type="text" class="form-control" id="add_company_name_th" name="company[company_name_th]" placeholder="" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_name_en">Company Name (English Name)</label>
                                    <input type="text" class="form-control" id="add_company_name_en" name="company[company_name_en]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_shot_name_th">Shot name (TH)</label>
                                    <input type="text" class="form-control" id="add_company_shot_name_th" name="company[company_shot_name_th]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_shot_name_en">Shot name (EN)</label>
                                    <input type="text" class="form-control" id="add_company_shot_name_en" name="company[company_shot_name_en]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_add_company_details" name="company[company_details]" rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_email">E-mail</label>
                                    <input type="email" class="form-control" id="add_company_email" name="company[company_email]" placeholder="" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_phone">Phone</label>
                                    <input type="text" class="form-control" id="add_company_phone" name="company[company_phone]" placeholder="" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_tel">Tel</label>
                                    <input type="text" class="form-control" id="add_company_tel" name="company[company_tel]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_tax_id">Tax ID</label>
                                    <input type="text" class="form-control" id="add_company_tax_id" name="company[company_tax_id]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_fax">Fax</label>
                                    <input type="text" class="form-control" id="add_company_fax" name="company[company_fax]" placeholder="" value="">
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h4>Address TH</h4>
                                        </div>
                                    </div>
                                    <div class="row address">
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_no_th">House No.</label>
                                            <input type="text" class="form-control" id="add_company_address_no_th" name="company[company_address_no_th]" placeholder="" value="" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_building_th">Building / Village</label>
                                            <input type="text" class="form-control" id="add_company_address_building_th" name="company[company_address_building_th]" placeholder="" value="" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_road_th">Rd.</label>
                                            <input type="text" class="form-control" id="add_company_address_road_th" name="company[company_address_road_th]" placeholder="" value="" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_alley_th">Lane</label>
                                            <input type="text" class="form-control" id="add_company_address_alley_th" name="company[company_address_alley_th]" placeholder="" value="" required>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="provinces_id">Province</label>
                                            <select class="form-control custom-select select-province select2" id="add_provinces_id" name="" required>
                                                <option value="" required>เลือกจังหวัด</option>
                                                @foreach( $Provinces as $val)
                                                <option value="{{$val->provinces_id}}">{{$val->provinces_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amphures_id">District / Area</label>
                                            <select class="form-control custom-select select-amphur select2" id="add_amphures_id" name="" required>
                                                <option value="" required>เลือกอำเภอ</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="districts_id">Sub-district/ Sub-area</label>
                                            <select class="form-control custom-select select-district select2" id="add_districts_id" name="company[districts_id]" required>
                                                <option value="" required>เลือกตำบล</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h4>Address EN</h4>
                                        </div>
                                    </div>
                                    <div class="row address_en">
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_no_th">House No.</label>
                                            <input type="text" class="form-control" id="add_company_address_no_en" name="company[company_address_no_en]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_building_en">Building / Village</label>
                                            <input type="text" class="form-control" id="add_company_address_building_en" name="company[company_address_building_en]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_road_en">Rd.</label>
                                            <input type="text" class="form-control" id="add_company_address_road_en" name="company[company_address_road_en]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_alley_en">Lane</label>
                                            <input type="text" class="form-control" id="add_company_address_alley_en" name="company[company_address_alley_en]" placeholder="" value="">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="provinces_id">Province</label>
                                            <select class="form-control custom-select select-en-province select2" id="add_en_provinces_id" name="">
                                                <option value="" required>เลือกจังหวัด</option>
                                                @foreach( $Provinces as $val)
                                                <option value="{{$val->provinces_id}}">{{$val->provinces_name_en}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amphures_id">District / Area</label>
                                            <select class="form-control custom-select select-en-amphur select2" id="add_en_amphures_id" name="">
                                                <option value="" required>เลือกอำเภอ</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="districts_id">Sub-district/ Sub-area</label>
                                            <select class="form-control custom-select select-en-districts select2" id="add_en_districts_id" name="company[en_districts_id]">
                                                <option value="" required>เลือกตำบล</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_website">Website</label>
                                    <input type="text" class="form-control" id="add_company_website" name="company[company_website]" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_group_code">Group code</label>
                                    <input type="text" class="form-control" id="add_company_group_code" name="company[company_group_code]" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_group_name">Group name</label>
                                    <input type="text" class="form-control" id="add_company_group_name" name="company[company_group_name]" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_buiss_type">Business type</label>
                                    <input type="text" class="form-control" id="add_company_buiss_type" name="company[company_buiss_type]" placeholder="" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_black_list">Black List</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="company_black_list1" name="company[company_black_list]" value="N" checked="">
                                            <label class="custom-control-label" for="company_black_list1">No</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="company_black_list2" name="company[company_black_list]" value="Y">
                                            <label class="custom-control-label" for="company_black_list2">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div id="OperationStatus" style="display:none">
                                        <label for="company_black_list_comment">Cause</label>
                                        <input type="text" class="form-control" id="add_company_black_list_comment" name="company[company_black_list_comment]" placeholder="" value="">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="credit_term_amount">Credit Term</label>
                                    <input type="number" class="form-control" id="add_credit_term_amount" name="credit_term[credit_term_amount]" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="credit_term_amount_price">Credit Term (Price)</label>
                                    <input type="text" class="form-control price" id="add_credit_term_amount_price" name="credit_term_amount[credit_term_amount_price]" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_acc_hart">Account Code</label>
                                    <input type="text" class="form-control" id="add_company_acc_hart" name="company[company_acc_hart]" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_acc_hart_name">Account name</label>
                                    <input type="text" class="form-control" id="add_company_acc_hart_name" name="company[company_acc_hart_name]" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_bill_date">Bill date</label>
                                    <input type="date" class="form-control" id="add_company_bill_date" name="company[company_bill_date]" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_pay_date">Date of payment</label>
                                    <input type="date" class="form-control" id="add_company_pay_date" name="company[company_pay_date]" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_ot_date_start">Starting date</label>
                                    <input type="date" class="form-control" id="add_company_ot_date_start" name="company[company_ot_date_start]" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_ot_date_end">End date</label>
                                    <input type="date" class="form-control" id="add_company_ot_date_end" name="company[company_ot_date_end]" value="" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_company_status" name="company[company_status]" value="1">
                                        <label class="custom-control-label" for="add_company_status">Action</label>
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