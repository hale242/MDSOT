<div class="modal fade" id="ModalOtherExpenses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ค่าใช้จ่ายอื่น ๆ</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button> -->
            </div>
            <form id="FormTimesheetContractDriverAddOn" class="needs-validation" novalidate>
                <input type="hidden" id="other_expenses_timesheet_contract_driver_id" name="timesheet_contract_driver_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-2 show-staff-expenses">

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_driver_add_on_status" name="timesheet_contract_driver_add_on_status" value="1" checked/>
                                        <label class="custom-control-label" for="add_timesheet_contract_driver_add_on_status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
