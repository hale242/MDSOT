<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormAdd" class="needs-validation" novalidate>
                <input type="hidden" name="holiday_calendar_year" id="input_holiday_calendar_year">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="holiday_calendar_year">Year</label>
                                    <select class="select2 form-control custom-select" id="add_holiday_calendar_year" disabled>
                                        <option>Select Year</option>
                                        @for($year=1970; $year<=3000; $year++)
                                            <option value="{{$year}}" {{$year == date('Y') ? 'selected' : ''}}>{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="holiday_calendar_date">วันหยุด</label>
                                    <input type="date" id="add_holiday_calendar_date" name="holiday_calendar_date" class="form-control search_table" placeholder="" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="holiday_calendar_name">ชื่อวันหยุด</label>
                                    <input type="text" class="form-control" id="add_holiday_calendar_name" name="holiday_calendar_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="holiday_calendar_details">Details</label>
                                    <textarea class="form-control" id="add_holiday_calendar_details" name="holiday_calendar_details" rows="4"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="holiday_calendar_status">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_holiday_calendar_status" name="holiday_calendar_status" value="1" checked />
                                        <label class="custom-control-label" for="add_holiday_calendar_status">Active</label>
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
