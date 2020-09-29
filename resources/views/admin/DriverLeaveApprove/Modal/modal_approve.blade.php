<div class="modal fade" id="ModalApprove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approve</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormApprove" class="needs-validation" novalidate>
                <input type="hidden" id="driver_leave_approve_id">
                <input type="hidden" id="approve_type" name="approve_type">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="driver_name">Driver</label>
                                    <input type="text" class="form-control" id="edit_driver_name" readonly />
                                </div>
                                <div class="col-md-12 mb-3">
                                   <label for="driver_making_leave_type">Type</label>
                                   <select class="form-control custom-select select2 making_leave_type" id="edit_driver_making_leave_type" name="driver_making_leave_type" required>
                                      <option value="">----Select----</option>
                                      <option value="1">ลาเต็มวัน</option>
                                      <option value="2">ลาครึ่งวันเช้า</option>
                                      <option value="3">ลาครึ่งวันบ่าย</option>
                                   </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                   <label for="driver_making_leave_start_date">Start leave date</label>
                                   <input type="date" class="form-control making_leave_start_date" id="edit_driver_making_leave_start_date" name="driver_making_leave_start_date" readonly required>
                                </div>
                                <div class="col-md-6 mb-3">
                                   <label for="driver_making_leave_end_date">End leave date</label>
                                   <input type="date" class="form-control making_leave_end_date" id="edit_driver_making_leave_end_date" name="driver_making_leave_end_date" readonly required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="driver_making_leave_count_date">Number of leave days</label>
                                    <input type="number" class="form-control making_leave_count_date" id="edit_driver_making_leave_count_date" name="driver_making_leave_count_date" readonly />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_making_leave_details">Remark</label>
                                    <textarea class="form-control" id="edit_driver_leave_approve_details" name="driver_leave_approve_details" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer text-center mr-0">
                        <button type="submit" class="btn btn-success btn-sumbit-form" data-type="A">Approve</button>
                        <button type="submit" class="btn btn-warning btn-sumbit-form" data-type="R">Reject</button>
                        <button type="submit" class="btn btn-danger btn-sumbit-form" data-type="F">Fail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
