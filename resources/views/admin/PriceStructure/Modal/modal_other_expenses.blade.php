<div class="modal fade" id="ModalOtherExpenses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Other expenses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                        <form id="FormOtherExpenses" class="needs-validation" novalidate>
                            <input type="hidden" id="other_expenses_has_staff_expenses_id">
                            <input type="hidden" id="other_price_structure_id" name="price_structure_id">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="add_other_staff_expenses_id">Other expenses</label>
                                    <select class="form-control select2" id="add_other_expenses_id" name="other_expenses_id" required>
                                        <option value="">----Select----</option>
                                        @foreach($OtherExpenses as $val)
                                            <option value="{{$val->other_expenses_id}}">{{$val->other_expenses_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="other_expenses_has_staff_expenses_price_status">Price Status</label>
                                    <select class="form-control select2" id="add_other_expenses_has_staff_expenses_price_status" name="other_expenses_has_staff_expenses_price_status" required>
                                        <option value="">----Select----</option>
                                        <option value="0">แก้ไขไม่ได้</option>
                                        <option value="1">แก้ไขได้</option>
                                        <option value="2">แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่</option>
                                        <option value="3">แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="add_other_expenses_has_staff_expenses_price">Price</label>
                                    <input type="text" class="form-control price" id="add_other_expenses_has_staff_expenses_price" name="other_expenses_has_staff_expenses_price" required />
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label for="add_other_expenses_has_staff_expenses_price_sale">Price sale</label>
                                    <input type="text" class="form-control price" id="add_other_expenses_has_staff_expenses_price_sale" name="other_expenses_has_staff_expenses_price_sale" required />
                                </div> -->
                                <div class="col-md-6 mb-3">
                                    <label for="other_expenses_has_staff_expenses_price_limit">Price limit</label>
                                    <input type="text" class="form-control price" id="add_other_expenses_has_staff_expenses_price_limit" name="other_expenses_has_staff_expenses_price_limit" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="add_other_expenses_has_staff_expenses_comment">Comment</label>
                                    <textarea cols="80" class="form-control" id="add_other_expenses_has_staff_expenses_comment" name="other_expenses_has_staff_expenses_comment" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_other_expenses_has_staff_expenses_status" name="other_expenses_has_staff_expenses_status" value="1" checked />
                                        <label class="custom-control-label" for="add_other_expenses_has_staff_expenses_status">Active</label>
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
                                    <table id="tableOtherExpenses" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Staff cost</th>
                                                <th scope="col">Price</th>
                                                <!-- <th scope="col">Price Sale</th> -->
                                                <th scope="col">Price limit</th>
                                                <th scope="col">Price Status</th>
                                                <th scope="col" class="text-center">Comment</th>
                                                <th scope="col" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
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
