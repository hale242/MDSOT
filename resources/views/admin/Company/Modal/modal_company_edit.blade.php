<div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
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

                                <div class="col-md-6 mb-3">
                                    <label for="customer_id">Company Code</label>
                                    <input type="text" class="form-control" id="edit_company_code" name="company[company_code]" placeholder="" value="">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="company_branch_status">Head office</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_company_branch_status" name="company[company_branch_status]" value="Y">
                                        <label class="custom-control-label" for="edit_company_branch_status">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="company_branch">Name of company branch </label>
                                    <input type="text" class="form-control" id="edit_company_branch" name="company[company_branch]" value="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_details">Contact info Type</label>
                                    <select class="form-control custom-select select2" id="edit_customer_type_id" name="company[customer_type_id]">
                                        <option value="">เลือกประเภทของลูกค้า</option>
                                        @foreach($CustomerType as $val)
                                        <option value="{{ $val->customer_type_id }}">{{ $val->customer_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sale_team_sub_id">Area</label>
                                    <select class="form-control custom-select select2" id="edit_sale_team_sub_id" name="company[sale_team_sub_id]">
                                        <option value="">เลือกเขตพื้นที่</option>
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
                                    <input type="text" class="form-control" id="edit_company_name_th" name="company[company_name_th]" placeholder="" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_name_en">Company Name (English Name)</label>
                                    <input type="text" class="form-control" id="edit_company_name_en" name="company[company_name_en]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_shot_name_th">Shot name (TH)</label>
                                    <input type="text" class="form-control" id="edit_company_shot_name_th" name="company[company_shot_name_th]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_shot_name_en">Shot name (EN)</label>
                                    <input type="text" class="form-control" id="edit_company_shot_name_en" name="company[company_shot_name_en]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_company_details" name="company[company_details]" rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_email">E-mail</label>
                                    <input type="email" class="form-control" id="edit_company_email" name="company[company_email]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_phone">Phone</label>
                                    <input type="text" class="form-control" id="edit_company_phone" name="company[company_phone]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_tel">Tel</label>
                                    <input type="text" class="form-control" id="edit_company_tel" name="company[company_tel]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_tax_id">Tax ID</label>
                                    <input type="text" class="form-control" id="edit_company_tax_id" name="company[company_tax_id]" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_fax">Fax</label>
                                    <input type="text" class="form-control" id="edit_company_fax" name="company[company_fax]" placeholder="" value="">
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
                                    <div class="row address-edit">
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_no_th">House No.</label>
                                            <input type="text" class="form-control" id="edit_company_address_no_th" name="company[company_address_no_th]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_building_th">Building / Village</label>
                                            <input type="text" class="form-control" id="edit_company_address_building_th" name="company[company_address_building_th]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_road_th">Rd.</label>
                                            <input type="text" class="form-control" id="edit_company_address_road_th" name="company[company_address_road_th]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_alley_th">Lane</label>
                                            <input type="text" class="form-control" id="edit_company_address_alley_th" name="company[company_address_alley_th]" placeholder="" value="">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="provinces_id">Province</label>
                                            <select class="form-control custom-select select-province-edit select2" id="edit_provinces_id" name="">
                                                <option value="">เลือกจังหวัด</option>
                                                @foreach( $Provinces as $val)
                                                <option value="{{$val->provinces_id}}">{{$val->provinces_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amphures_id">District / Area</label>
                                            <select class="form-control custom-select select-amphur-edit select2" id="edit_amphur_id" name="">
                                                <option value="">เลือกอำเภอ</option>
                                            </select>
                                            <input type="hidden" id="amphures_selected" value="0">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="districts_id">Sub-district/ Sub-area</label>
                                            <select class="form-control custom-select select-district-edit select2" id="edit_districts_id" name="company[districts_id]">
                                                <option value="">เลือกตำบล</option>

                                            </select>
                                            <input type="hidden" id="districts_selected" value="0">
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
                                    <div class="row address-en-edit">
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_no_th">House No.</label>
                                            <input type="text" class="form-control" id="edit_company_address_no_en" name="company[company_address_no_en]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_building_en">Building / Village</label>
                                            <input type="text" class="form-control" id="edit_company_address_building_en" name="company[company_address_building_en]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_road_en">Rd.</label>
                                            <input type="text" class="form-control" id="edit_company_address_road_en" name="company[company_address_road_en]" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="company_address_alley_en">Lane</label>
                                            <input type="text" class="form-control" id="edit_company_address_alley_en" name="company[company_address_alley_en]" placeholder="" value="">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="provinces_id">Province</label>
                                            <select class="form-control custom-select select-province-en-edit select2" id="edit_provinces_en_id" name="">
                                                <option value="">เลือกจังหวัด</option>
                                                @foreach( $Provinces as $val)
                                                <option value="{{$val->provinces_id}}">{{$val->provinces_name_en}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amphures_id">District / Area</label>
                                            <select class="form-control custom-select select-amphur-en-edit select2" id="edit_amphur_en_id" name="">
                                                <option value="">เลือกอำเภอ</option>
                                            </select>
                                            <input type="hidden" id="amphures_en_selected" value="0">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="districts_id">Sub-district/ Sub-area</label>
                                            <select class="form-control custom-select select-district-en-edit select2" id="edit_districts_en_id" name="company[en_districts_id]">
                                                <option value="">เลือกตำบล</option>
                                            </select>
                                            <input type="hidden" id="districts_en_selected" value="0">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_website">Website</label>
                                    <input type="text" class="form-control" id="edit_company_website" name="company[company_website]" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_group_code">Group code</label>
                                    <input type="text" class="form-control" id="edit_company_group_code" name="company[company_group_code]" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_group_name">Group name</label>
                                    <input type="text" class="form-control" id="edit_company_group_name" name="company[company_group_name]" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company_buiss_type">Business type</label>
                                    <input type="text" class="form-control" id="edit_company_buiss_type" name="company[company_buiss_type]" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_company_black_list">Black List</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input " id="company_black_list_N" name="company[company_black_list]" value="N">
                                            <label class="custom-control-label" for="company_black_list_N">No</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input " id="company_black_list_Y" name="company[company_black_list]" value="Y">
                                            <label class="custom-control-label" for="company_black_list_Y">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div id="edit_OperationStatus" style="display:none">
                                        <label for="company_black_list_comment">Cause</label>
                                        <input type="text" class="form-control" id="edit_company_black_list_comment" name="company[company_black_list_comment]" placeholder="" value="">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <!-- <div class="col-md-6 mb-3">
                                    <label for="credit_term_amount">Credit Term</label>
                                    <input type="text" class="form-control" id="edit_credit_term_amount" name="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="credit_term_amount_price">Credit Term (Price)</label>
                                    <input type="text" class="form-control" id="edit_credit_term_amount_price" name="" value="">
                                </div> -->

                                <div class="col-md-6 mb-3">
                                    <label for="company_acc_hart">Account Code</label>
                                    <input type="text" class="form-control" id="edit_company_acc_hart" name="company[company_acc_hart]" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_acc_hart_name">Account name</label>
                                    <input type="text" class="form-control" id="edit_company_acc_hart_name" name="company[company_acc_hart_name]" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_bill_date">Bill date</label>
                                    <input type="date" class="form-control" id="edit_company_bill_date" name="company[company_bill_date]" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_pay_date">Date of payment</label>
                                    <input type="date" class="form-control" id="edit_company_pay_date" name="company[company_pay_date]" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_ot_date_start">Starting date</label>
                                    <input type="date" class="form-control" id="edit_company_ot_date_start" name="company[company_ot_date_start]" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_ot_date_end">End date</label>
                                    <input type="date" class="form-control" id="edit_company_ot_date_end" name="company[company_ot_date_end]" value="">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_company_status" name="company[company_status]" value="1">
                                        <label class="custom-control-label" for="edit_company_status">Action</label>
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