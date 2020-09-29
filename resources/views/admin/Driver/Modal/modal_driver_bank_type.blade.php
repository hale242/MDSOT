<div class="modal fade" id="ModaBookBank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Book bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                      <form id="FormBookBank" class="needs-validation" novalidate>
                          <input type="hidden" id="add_driver_bank_id" name="driver_id">
                          <div class="form-row">
								<div class="col-md-6 mb-3">
									<label for="driver_bank_type_id">Bank</label>
									<select class="form-control custom-select select2" id="add_driver_bank_type_id" name="driver_bank_type_id">
                                        <option value="0">Select Bank Type</option>
                                        @foreach($BankTypes as $BankType)
                                        <option value="{{ $BankType->driver_bank_type_id }}">{{ $BankType->driver_bank_type_name }}</option>
                                        @endforeach
									</select>
								</div>

								<div class="col-md-6 mb-3">
									<label for="driver_bank_account_code">Account ID</label>
									<input type="text" class="form-control" id="add_driver_bank_account_code" name="driver_bank_account_code" required>
								</div>

								<div class="col-md-6 mb-3">
									<label for="driver_bank_account_name">Account name</label>
									<input type="text" class="form-control" id="add_driver_bank_account_name" name="driver_bank_account_name" required>
								</div>

								<div class="col-md-6 mb-3">
									<label for="driver_bank_account_branch">Branch name</label>
									<input type="text" class="form-control" id="add_driver_bank_account_branch" name="driver_bank_account_branch" required>
								</div>

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12">
													<label for="driver_bank_account_details">Details</label>
													<textarea class="form-control" id="add_driver_bank_account_details" name="driver_bank_account_details" rows="4"></textarea>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12 mb-3 form-upload-account-file">
													<label for="driver_bank_account_file_part">File</label>
													<input type="file" class="form-control upload-file-account-file" id="add_driver_bank_account_file_part" name="driver_bank_account_file_part" required>
												</div>

												<div class="col-md-6 mb-3">
													<label for="Check-Box">Status</label>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="add_driver_bank_account_status" name="driver_bank_account_status" checked value="1">
														<label class="custom-control-label" for="add_driver_bank_account_status">Active</label>
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
								</div>

							</div>
                        </form>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tableDriverBookBank" class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Bank</th>
                                                <th scope="col">Account ID</th>
                                                <th scope="col">Account Name</th>
                                                <th scope="col">Branch Name</th>
                                                <th scope="col">Detail</th>
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
