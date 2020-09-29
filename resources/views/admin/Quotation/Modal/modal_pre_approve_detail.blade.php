<div class="modal fade" id="ModalQuotationPreApproveDeatil" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormQuotationPreApproveDetail" class="needs-validation" novalidate>
                <input type="hidden" id="quotation_pre_approve_details_id">
                <input type="hidden" id="quotation_pre_approve_details_quotation_id" name="quotation_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_name">Name</label>
                                    <input type="text" class="form-control" id="add_quotation_pre_approve_details_name" name="quotation_pre_approve_details_name"required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_quotation_pre_approve_details_details" name="quotation_pre_approve_details_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_pre_approve_code">Approve code</label>
                                    <input type="text" class="form-control" id="add_quotation_pre_approve_details_pre_approve_code" name="quotation_pre_approve_details_pre_approve_code" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_contract_code">Contract code</label>
                                    <input type="text" class="form-control" id="add_quotation_pre_approve_details_contract_code" name="quotation_pre_approve_details_contract_code" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_date_send">Send date</label>
                                    <input type="date" class="form-control" id="add_quotation_pre_approve_details_date_send" name="quotation_pre_approve_details_date_send">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_payment_date">Payment date</label>
                                    <input type="date" class="form-control" id="add_quotation_pre_approve_details_payment_date" name="quotation_pre_approve_details_payment_date">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_invoice_date">Invoice date</label>
                                    <input type="date" class="form-control" id="add_quotation_pre_approve_details_invoice_date" name="quotation_pre_approve_details_invoice_date">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_credit">Credit count</label>
                                    <input type="date" class="form-control" id="add_quotation_pre_approve_details_credit" name="quotation_pre_approve_details_credit">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_remark">Remark</label>
                                    <textarea cols="80" class="form-control" id="add_quotation_pre_approve_details_remark" name="quotation_pre_approve_details_remark" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_pre_approve_details_comment">Comment</label>
                                    <textarea cols="80" class="form-control" id="add_quotation_pre_approve_details_comment" name="quotation_pre_approve_details_comment" rows="3"></textarea>
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
