<div class="modal fade" id="ModalQuotationPreApproveFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="FormQuotationPreApproveFile" class="needs-validation" novalidate>
                    <input type="hidden" id="quotation_pre_approve_file_quotation_id" name="quotation_id">
                    <div class="card">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="add_quotation_pre_approve_file_title">Name</label>
                                        <input type="text" class="form-control" id="add_quotation_pre_approve_file_title" name="quotation_pre_approve_file_title" required>
                                    </div>
                                    <div class="col-md-6 mb-3 form-upload">
                                        <label for="add_quotation_pre_approve_file_file_name">File</label>
                                        <input type="file" class="form-control upload-file-pre-approve" id="add_quotation_pre_approve_file_file_name" name="quotation_pre_approve_file_file_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="add_quotation_pre_approve_file_details">Detail</label>
                                        <textarea cols="80" class="form-control" id="add_quotation_pre_approve_file_details" name="quotation_pre_approve_file_details" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-right">
                            <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            <button type="button" class="btn btn-danger btn-cancel-deriver-file">Cancel</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="form-group mt-12 row table-responsive">
                    <table id="tableQuotationPreApproveFile" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">File</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
