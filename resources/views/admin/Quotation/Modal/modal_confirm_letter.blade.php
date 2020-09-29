<div class="modal fade" id="ModalConfirmLetter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Letter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                        <form id="FormConfirmLetter" class="needs-validation" novalidate>
                            <input type="hidden" id="confirm_quotation_quotation_id" name="quotation_id">
                            <input type="hidden" id="confirm_quotation_id">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="confirm_quotation_address">Address of the client</label>
                                    <textarea class="form-control" id="add_confirm_quotation_address" name="confirm_quotation_address" rows="2"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirm_quotation_car">Car model of the client</label>
                                    <input type="text" class="form-control" id="add_confirm_quotation_car" name="confirm_quotation_car" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirm_quotation_nationality">Nationality of client</label>
                                    <input type="text" class="form-control" id="add_confirm_quotation_nationality" name="confirm_quotation_nationality" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirm_quotation_other">Other</label>
                                    <input type="text" class="form-control" id="add_confirm_quotation_other" name="confirm_quotation_other" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirm_quotation_date_sign">Document signing date</label>
                                    <input type="date" class="form-control" id="add_confirm_quotation_date_sign" name="confirm_quotation_date_sign" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirm_quotation_file">File name</label>
                                    <input type="text" class="form-control" id="add_confirm_quotation_file" name="confirm_quotation_file" />
                                </div>
                                <div class="col-md-6 mb-3 form-upload">
                                    <label for="confirm_quotation_file_part">Upload file</label>
                                    <input type="file" class="form-control upload-file-confirm-quotation" id="add_confirm_quotation_file_part" name="confirm_quotation_file_part" required />
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="Check-Box">Status</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="add_confirm_quotation_status" name="confirm_quotation_status" value="1" checked />
                                                <label class="custom-control-label" for="add_confirm_quotation_status">Active</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-right mt-3">
                                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                                <button type="button" class="btn btn-danger btn-clear-form-confirm-letter"> Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tableConfirmQuotation" class="table" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Address of the client</th>
                                                <th scope="col">Car model of the client</th>
                                                <th scope="col">Nationality of client</th>
                                                <th scope="col">Other</th>
                                                <th scope="col">Document signing date</th>
                                                <th scope="col">File name</th>
                                                <th scope="col">File</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
