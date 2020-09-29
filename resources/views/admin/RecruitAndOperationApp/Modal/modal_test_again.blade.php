<div class="modal fade" id="ModalTestAgain" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Test Again</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormTestAgain" class="needs-validation" novalidate>
                <input type="hidden" id="add_test_driver_interview_id">
                <input type="hidden" name="type" value="T">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Interview date again</label>
                                    <input type="date" class="form-control" id="add_driver_interview_date_waiting" name="driver_interview_date_waiting" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Comment</label>
                                    <textarea class="form-control" id="add_test_driver_interview_comment" name="driver_interview_comment" rows="3" required></textarea>
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
