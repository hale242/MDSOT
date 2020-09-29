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
                          <input type="hidden" id="add_driver_id" name="driver_id">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="driver_status_contract">Contract name</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1" id="add_driver_contract_file_type_1" name="driver_contract_file_type">
                                            <label class="custom-control-label" for="add_driver_contract_file_type_1">พนักงานประจำ</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="2" id="add_driver_contract_file_type_2" name="driver_contract_file_type">
                                            <label class="custom-control-label" for="add_driver_contract_file_type_2">พนักงานสัญญาจ้างรายปี</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="3" id="add_driver_contract_file_type_3" name="driver_contract_file_type">
                                            <label class="custom-control-label" for="add_driver_contract_file_type_3">พนักงานสัญญาจ้างรายวัน</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="add_driver_contract_salary">Salary</label>
                                    <input type="text" class="form-control price" id="add_driver_contract_salary" name="driver_salary" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_bank_account_details">Details</label>
                                    <textarea class="form-control" id="add_driver_contract_file_details" name="driver_contract_file_details" rows="2"></textarea>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label for="">File name</label>
                                    <input type="text" class="form-control" id="add_driver_contract_file_filename" name="driver_contract_file_filename">
                                </div> -->
                                <div class="col-md-6 mb-3 form-upload">
                                    <label for="">Upload file</label>
                                    <input type="file" class="form-control upload-file" id="add_driver_contract_file_filename" name="driver_contract_file_filename" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_contract_file_filedate">Contract date</label>
                                    <input type="date" class="form-control" id="add_driver_contract_file_filedate" name="driver_contract_file_filedate">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_contract_file_date_end">Contract end date</label>
                                    <input type="date" class="form-control" id="add_driver_contract_file_date_end" name="driver_contract_file_date_end">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_driver_contract_file_status" name="driver_contract_file_status" value="1" checked>
                                        <label class="custom-control-label" for="add_driver_contract_file_status">Active</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tableDriverContractFile" class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Contract name</th>
                                                <th scope="col">Details</th>
                                                <th scope="col">File</th>
                                                <th scope="col">Salary</th>
                                                <th scope="col">Contract date</th>
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
