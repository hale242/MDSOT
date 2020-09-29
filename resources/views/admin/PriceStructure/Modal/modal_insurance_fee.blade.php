<div class="modal fade" id="ModalInsuranceFee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Insurance Fee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                        <form id="FormInsuranceFee" class="needs-validation" novalidate>
                            <input type="hidden" id="insurance_fee_price_structure_id" name="price_structure_id">
                            <input type="hidden" id="insurance_fee_has_staff_expenses_id">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="add_insurance_fee_id">Insurance Fee</label>
                                    <select class="form-control select2" id="add_insurance_fee_id" name="insurance_fee_id" required>
                                        <option value="">---Select---</option>
                                        @foreach($InsuranceFee as $val)
                                            <option value="{{$val->insurance_fee_id}}">{{$val->insurance_fee_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insurance_fee_has_staff_expenses_price_status">Price Status</label>
                                    <select class="form-control select2" id="add_insurance_fee_has_staff_expenses_price_status" name="insurance_fee_has_staff_expenses_price_status" required>
                                        <option value="">---Select---</option>
                                        <option value="0">แก้ไขไม่ได้</option>
                                        <option value="1">แก้ไขได้</option>
                                        <option value="2">แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่</option>
                                        <option value="3">แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="add_insurance_fee_has_staff_expenses_price_limit">Price limit</label>
                                    <input type="text" class="form-control price" id="add_insurance_fee_has_staff_expenses_price_limit" name="insurance_fee_has_staff_expenses_price_limit" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="add_insurance_fee_has_staff_expenses_salary_type"> Calculate Type</label>
                                    <select class="form-control select2 expenses_salary_type" id="add_insurance_fee_has_staff_expenses_salary_type" name="insurance_fee_has_staff_expenses_salary_type" required>
                                        @foreach($types as $key=>$val)
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insurance_fee_has_staff_expenses_price">Price</label>
                                    <input type="text" class="form-control price" id="add_insurance_fee_has_staff_expenses_price" name="insurance_fee_has_staff_expenses_price">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insurance_fee_has_staff_expenses_percent">Percent</label>
                                    <input type="number" class="form-control profit_percen" id="add_insurance_fee_has_staff_expenses_percent" name="insurance_fee_has_staff_expenses_percent" max="100" min="0" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insurance_fee_has_staff_expenses_salary_max">Maximum salary</label>
                                    <input type="text" class="form-control price" id="add_insurance_fee_has_staff_expenses_salary_max" name="insurance_fee_has_staff_expenses_salary_max" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insurance_fee_has_staff_expenses_salary_min">Minimum salary</label>
                                    <input type="text" class="form-control price" id="add_insurance_fee_has_staff_expenses_salary_min" name="insurance_fee_has_staff_expenses_salary_min" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insurance_fee_has_staff_expenses_salary_df">Salary specified</label>
                                    <input type="text" class="form-control price" id="add_insurance_fee_has_staff_expenses_salary_df" name="insurance_fee_has_staff_expenses_salary_df" readonly>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="insurance_fee_has_staff_expenses_comment">Comment</label>
                                    <textarea cols="80" class="form-control" id="add_insurance_fee_has_staff_expenses_comment" name="insurance_fee_has_staff_expenses_comment" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="insurance_fee_has_staff_expenses_calculate_cost_status">Cost Status</label>
                                            <br />
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0" id="add_insurance_fee_has_staff_expenses_calculate_cost_status_0" name="insurance_fee_has_staff_expenses_calculate_cost_status" required>
                                                    <label class="custom-control-label" for="add_insurance_fee_has_staff_expenses_calculate_cost_status_0">ไม่รวมต้นทุน</label>
                                                </div>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1" id="add_insurance_fee_has_staff_expenses_calculate_cost_status_1" name="insurance_fee_has_staff_expenses_calculate_cost_status" required>
                                                    <label class="custom-control-label" for="add_insurance_fee_has_staff_expenses_calculate_cost_status_1">นำไปคิดรวมต้นทุน</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="insurance_fee_has_staff_expenses_status">Status</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="add_insurance_fee_has_staff_expenses_status" name="insurance_fee_has_staff_expenses_status" value="1" checked>
                                                <label class="custom-control-label" for="add_insurance_fee_has_staff_expenses_status">Active</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <label for="">&nbsp;</label> <br />
                                            <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                            <button type="button" class="btn btn-danger btn-cancel-insurance-fee"> Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="table-responsive">
                                    <table class="table" id="tableInsuranceFee">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Insurance Fee</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Price Status</th>
                                                <th scope="col">Price limit</th>
                                                <th scope="col">Percent</th>
                                                <th scope="col">Maximum salary</th>
                                                <th scope="col">Minimum salary</th>
                                                <th scope="col">Salary specified</th>
                                                <th scope="col">Comment</th>
                                                <th scope="col">Cost Status</th>
                                                <th scope="col" class="text-center">Actions</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
