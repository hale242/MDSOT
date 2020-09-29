<div class="modal fade" id="ModalEditTimesheet" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Timesheet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormEditTimesheet" class="needs-validation" novalidate>
                <input type="hidden" id="edit_imesheet_contract_driver_id">
                <div class="card mb-0">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="timesheet_contract_driver_date">Date</label>
                                    <input type="date" class="form-control" id="edit_timesheet_contract_driver_date" readonly />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label> <br />
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="edit_timesheet_contract_driver_status_1" name="timesheet_contract_driver_status" value="1" required />
                                        <label class="custom-control-label" for="edit_timesheet_contract_driver_status_1">Working day</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="edit_timesheet_contract_driver_status_0" name="timesheet_contract_driver_status" value="0" required />
                                        <label class="custom-control-label" for="edit_timesheet_contract_driver_status_0">A day off</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="timesheet_contract_driver_def_time_start">Start work</label>
                                    <input type="datetime-local" class="form-control" id="edit_timesheet_contract_driver_def_time_start" name="timesheet_contract_driver_def_time_start" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="timesheet_contract_driver_def_time_end">Get off work</label>
                                    <input type="datetime-local" class="form-control" id="edit_timesheet_contract_driver_def_time_end" name="timesheet_contract_driver_def_time_end" required />
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
