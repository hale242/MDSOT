<div class="modal fade" id="ModalAttachContract" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Attach a contract</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                        <form id="FormAttachContract" class="needs-validation" novalidate>
                            <input type="hidden" id="customer_contract_file_customer_contract_id" name="customer_contract_id">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_file_date_file_all">All documents date</label>
                                    <input type="date" class="form-control" id="add_customer_contract_file_date_file_all" name="customer_contract_file_date_file_all">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_status_contract">Type</label> <br />
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="add_customer_contract_file_type1" name="customer_contract_file_type" value="1" required/>
                                            <label class="custom-control-label" for="add_customer_contract_file_type1">สัญญาบริการ</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="add_customer_contract_file_type2" name="customer_contract_file_type" value="2" required/>
                                            <label class="custom-control-label" for="add_customer_contract_file_type2">สัญญาลูกค้า</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="add_customer_contract_file_type3" name="customer_contract_file_type" value="3" required/>
                                            <label class="custom-control-label" for="add_customer_contract_file_type3">สัญญาแนบท้าย</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="add_customer_contract_file_type4" name="customer_contract_file_type" value="4" required/>
                                            <label class="custom-control-label" for="add_customer_contract_file_type4">ต่ออายุสัญญา</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="customer_contract_file_details">Details</label>
                                    <textarea class="form-control" id="add_customer_contract_file_details" name="customer_contract_file_details" rows="2"></textarea>
                                </div>
                                <div class="col-md-6 mb-3 form-upload">
                                    <label for="">Upload file document</label>
                                    <input type="file" class="form-control upload-file-document" id="add_customer_contract_file_file_doc" name="customer_contract_file_file_doc" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_file_file_doc_date">file document date</label>
                                    <input type="date" class="form-control" id="add_customer_contract_file_file_doc_date" name="customer_contract_file_file_doc_date">
                                </div>
                                <div class="col-md-6 mb-3 form-upload">
                                    <label for="">Upload file pdf</label>
                                    <input type="file" class="form-control upload-file-pdf" id="add_customer_contract_file_file_pdf" name="customer_contract_file_file_pdf" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_file_file_pdf_date">file pdf date</label>
                                    <input type="date" class="form-control" id="add_customer_contract_file_file_pdf_date" name="customer_contract_file_file_pdf_date">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_file_date_contract_start">Contract start date</label>
                                    <input type="date" class="form-control" id="add_customer_contract_file_date_contract_start" name="customer_contract_file_date_contract_start">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_contract_file_date_contract_end">Contract end date</label>
                                    <input type="date" class="form-control" id="add_customer_contract_file_date_contract_end" name="customer_contract_file_date_contract_end">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="Check-Box">Status</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="add_customer_contract_file_status" name="customer_contract_file_status" value="1" checked />
                                                <label class="custom-control-label" for="customer_contract_file_status">Active</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
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
                                    <table id="tableCustomerContractFile" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">All documents date</th>
                                                <th scope="col">Details</th>
                                                <th scope="col">File document</th>
                                                <th scope="col">File document date</th>
                                                <th scope="col">File pdf</th>
                                                <th scope="col">File pdf date</th>
                                                <th scope="col">Contract start date</th>
                                                <th scope="col">Contract end date</th>
                                                <th scope="col" class="text-center">Action</th>
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
