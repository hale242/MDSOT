<div class="modal fade" id="ModalInterviewDate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Interview date</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormInterviewDate" class="needs-validation" novalidate>
                <input type="hidden" id="driver_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="driver_interview_date">Run code</label>
                                    <select class="form-control custom-select select2" name="run_code_id" id="add_run_code_id" required>
                                        <option value="">----Select----</option>
                                        @foreach($RunCodes as $val)
                                            <option value="{{$val->run_code_id}}">{{$val->run_code_code}} ({{$val->run_code_type_run == 1 ? 'รายเดือน' : 'รายปี'}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_interview_date">Interview date</label>
                                    <input type="date" class="form-control" id="add_driver_interview_date" name="driver_interview_date" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-success btn-save-interview-date"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
