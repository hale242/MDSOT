<div class="modal fade" id="ModalNotPassed" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Not Passed</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormNotPassed" class="needs-validation" novalidate>
                <input type="hidden" id="add_not_driver_interview_id">
                <input type="hidden" name="type" value="N">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Comment</label>
                                    <textarea class="form-control" id="add_not_driver_interview_comment" name="driver_interview_comment" rows="3" required></textarea>
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
