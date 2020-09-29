<div class="modal fade" id="ModalStaffCost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Staff cost</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                        <form id="FormStaffCost" class="needs-validation" novalidate>
                            <input type="hidden" id="price_structure_has_staff_expenses_id">
                            <input type="hidden" id="staff_cost_price_structure_id" name="price_structure_id">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="add_staff_expenses_id">Staff cost</label>
                                    <select class="form-control select2" id="add_staff_expenses_id" name="staff_expenses_id" required>
                                        <option value="">---Select---</option>
                                        @foreach($StaffCosts as $val)
                                            <option value="{{$val->staff_expenses_id}}">{{$val->staff_expenses_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_has_staff_expenses_price_status">Price Status</label>
                                    <select class="form-control select2" id="add_price_structure_has_staff_expenses_price_status" name="price_structure_has_staff_expenses_price_status" required>
                                        <option value="">---Select---</option>
                                        <option value="0">แก้ไขไม่ได้</option>
                                        <option value="1">แก้ไขได้</option>
                                        <option value="2">แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่</option>
                                        <option value="3">แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="add_price_structure_has_staff_expenses_price">Price</label>
                                    <input type="text" class="form-control price" id="add_price_structure_has_staff_expenses_price" name="price_structure_has_staff_expenses_price" required />
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label for="add_price_structure_has_staff_expenses_price_sale">Price sale</label>
                                    <input type="text" class="form-control price" id="add_price_structure_has_staff_expenses_price_sale" name="price_structure_has_staff_expenses_price_sale" required />
                                </div> -->
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_has_staff_expenses_price_limit">Price limit</label>
                                    <input type="text" class="form-control price" id="add_price_structure_has_staff_expenses_price_limit" name="price_structure_has_staff_expenses_price_limit" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="add_price_structure_has_staff_expenses_comment">Comment</label>
                                    <textarea cols="80" class="form-control" id="add_price_structure_has_staff_expenses_comment" name="price_structure_has_staff_expenses_comment" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Expense type</label><br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="0" id="add_price_structure_has_staff_expenses_type_0" name="price_structure_has_staff_expenses_type">
                                            <label class="custom-control-label" for="add_price_structure_has_staff_expenses_type_0">รายวัน</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="0" id="add_price_structure_has_staff_expenses_type_1" name="price_structure_has_staff_expenses_type" checked>
                                            <label class="custom-control-label" for="add_price_structure_has_staff_expenses_type_1">รายเดือน</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Cost</label><br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="0" id="add_price_structure_has_staff_expenses_type_cost_0" name="price_structure_has_staff_expenses_type_cost" checked>
                                            <label class="custom-control-label" for="add_price_structure_has_staff_expenses_type_cost_0">เรียกเก็บลูกค้า</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1" id="add_price_structure_has_staff_expenses_type_cost_1" name="price_structure_has_staff_expenses_type_cost">
                                            <label class="custom-control-label" for="add_price_structure_has_staff_expenses_type_cost_1">ไม่เรียกเก็บลูกค้าเพราะรวมอยู่ในค่าบริการ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_price_structure_has_staff_expenses_status" name="price_structure_has_staff_expenses_status" value="1" checked />
                                        <label class="custom-control-label" for="add_price_structure_has_staff_expenses_status">Active</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 text-right">
                                    <label for="">&nbsp;</label> <br />
                                    <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                    <button type="button" class="btn btn-danger btn-cancel-staff-cost"> Cancel</button>
                                </div>
                            </div>
                            <hr />
                        </form>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="table-responsive">
                                    <table id="tableStaffCost" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Staff cost</th>
                                                <th scope="col">Price</th>
                                                <!-- <th scope="col">Price Sale</th> -->
                                                <th scope="col">Price limit</th>
                                                <th scope="col">Price Status</th>
                                                <th scope="col">Expense type</th>
                                                <th scope="col">Cost</th>
                                                <th scope="col">Comment</th>
                                                <th scope="col">Actions</th>
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
