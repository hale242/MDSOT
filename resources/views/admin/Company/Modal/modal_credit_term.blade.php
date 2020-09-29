<div class="modal fade" id="ModalCreditTerm" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" id="credit_term_id" name="company_id">

            <div class="modal-header">
                <h4 class="modal-title">Credit Term</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="text-right">
                    <button type="button" id='btn-add_credit_term_id' class="btn btn-primary btn-rounded m-t-10 mb-3 btn-addCredit" data-id="" data-toggle="modal" data-target="#viewModalAddCredit">Add Credit</button>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table id="tableCreditTerm" style="width:100%" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">No</th>
                                    <th scope="col">Credit Amount</th>
                                    <th scope="col">Credit Price</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalAddCredit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add File</h4>
            </div>
            <form id="FormCreditAdd" class="needs-validation" novalidate="">
                <div class="card">

                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="credit_term_amount">Credit Term</label>
                                    <input type="number" class="form-control" id="add_credit_term_amount" name="credit_term" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="credit_term_amount_price">Credit Term (Price)</label>
                                    <input type="text" class="form-control price" id="add_credit_term_amount_price" name="credit_term_amount" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="credit_term_status" name="credit_term_status" value="1">
                                        <label class="custom-control-label" for="credit_term_status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <input type="hidden" id="add_credit_term_id" name="company_id">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>