<div class="modal fade" id="ModalAddHoliday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Holiday</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <form id="FormAddHoliday" class="needs-validation" novalidate>
                  <input type="hidden" name="customer_contract_id" value="{{$DriverWorking->customer_contract_id}}">
                    <input type="hidden" name="driver_working_id" value="{{$DriverWorking->driver_working_id}}">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="timesheet_holiday_calendar_driver_year">Year</label>
                                    <select class="form-control custom-select select2" id="add_timesheet_holiday_calendar_driver_year" name="timesheet_holiday_calendar_driver_year" required>
                                        <option value="">----Select----</option>
                                        @for($year=1970; $year<=3000; $year++)
                                            <option value="{{$year}}" {{$year == date('Y') ? 'selected' : ''}}>{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="timesheet_holiday_calendar_driver_date">วันหยุด</label>
                                    <input type="date" id="add_timesheet_holiday_calendar_driver_date" name="timesheet_holiday_calendar_driver_date" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="timesheet_holiday_calendar_driver_name">ชื่อวันหยุด</label>
                                    <input type="text" class="form-control" id="add_timesheet_holiday_calendar_driver_name" name="timesheet_holiday_calendar_driver_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="timesheet_holiday_calendar_driver_details">Details</label>
                                    <textarea class="form-control" id="add_timesheet_holiday_calendar_driver_details" name="timesheet_holiday_calendar_driver_details" rows="4"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="holiday_calendar_status">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_timesheet_holiday_calendar_driver_status" name="timesheet_holiday_calendar_driver_status" value="1" checked />
                                        <label class="custom-control-label" for="add_timesheet_holiday_calendar_driver_status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEditHoliday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Holiday</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormEditHoliday" class="needs-validation" novalidate>
                <input type="hidden" id="edit_timesheet_holiday_calendar_driver_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="timesheet_holiday_calendar_driver_year">Year</label>
                                    <select class="form-control custom-select select2" id="edit_timesheet_holiday_calendar_driver_year" name="timesheet_holiday_calendar_driver_year" required>
                                        <option value="">----Select----</option>
                                        @for($year=1970; $year<=3000; $year++)
                                            <option value="{{$year}}" {{$year == date('Y') ? 'selected' : ''}}>{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="timesheet_holiday_calendar_driver_date">วันหยุด</label>
                                    <input type="date" id="edit_timesheet_holiday_calendar_driver_date" name="timesheet_holiday_calendar_driver_date" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="timesheet_holiday_calendar_driver_name">ชื่อวันหยุด</label>
                                    <input type="text" class="form-control" id="edit_timesheet_holiday_calendar_driver_name" name="timesheet_holiday_calendar_driver_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="timesheet_holiday_calendar_driver_details">Details</label>
                                    <textarea class="form-control" id="edit_timesheet_holiday_calendar_driver_details" name="timesheet_holiday_calendar_driver_details" rows="4"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="holiday_calendar_status">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_timesheet_holiday_calendar_driver_status" name="timesheet_holiday_calendar_driver_status" value="1" checked />
                                        <label class="custom-control-label" for="edit_timesheet_holiday_calendar_driver_status">Active</label>
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

<div class="modal fade" id="ModalViewHoliday" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Year</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_timesheet_holiday_calendar_driver_year"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">วันหยุด</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_timesheet_holiday_calendar_driver_date"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">ชื่อวันหยุด</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_timesheet_holiday_calendar_driver_name"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Details</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_timesheet_holiday_calendar_driver_details"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Status</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_timesheet_holiday_calendar_driver_status"></label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
