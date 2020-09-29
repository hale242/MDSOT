<div class="modal fade" id="ActionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" id="submit_action" name="submit_action" class="needs-validation" novalidate method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    @php $admin = Auth::guard('admin')->user(); @endphp
                                    <input type="hidden" name="admin_id" id="admin_id" value="{{$admin->admin_id}}">
                                    <input type="hidden" name="quotation_pre_approve_status" id="quotation_pre_approve_status">
                                    <input type="hidden" name="quotation_pre_approve_id" id="quotation_pre_approve_id">
                                    <input type="hidden" name="quotation_pre_approve_lv" id="quotation_pre_approve_lv">
                                    <label class="control-label" for="quotation_pre_approve_comment">Comment</label>
                                    <textarea rows="3" id="quotation_pre_approve_comment" name="quotation_pre_approve_comment" class="form-control" required></textarea>
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
