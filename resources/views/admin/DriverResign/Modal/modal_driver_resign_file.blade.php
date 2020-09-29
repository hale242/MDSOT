<div class="modal fade" id="ModalDriverResignFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">File Document</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="FormDriverResignFile" class="needs-validation" novalidate>
                    <input type="hidden" id="driver_resign_id" name="driver_resign_id">
                    <div class="card">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="add_driver_resign_file_name">Name</label>
                                        <input type="text" class="form-control" id="add_driver_resign_file_name" name="driver_resign_file_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3 form-upload">
                                        <label for="add_driver_resign_file_file_name">File</label>
                                        <input type="file" class="form-control upload-file" id="add_driver_resign_file_file_name" name="driver_resign_file_file_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="add_driver_resign_file_details">Details</label>
                                        <textarea cols="80" class="form-control" id="add_driver_resign_file_details" name="driver_resign_file_details" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Check-Box">Status</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="add_driver_resign_file_status" name="driver_resign_file_status" value="1" checked>
                                            <label class="custom-control-label" for="add_driver_resign_file_status">Active</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-right">
                            <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            <button type="button" class="btn btn-danger btn-cancel-file">Cancel</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="form-group mt-12 row table-responsive">
                    <table id="tableDriverResignFile" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">File</th>
                                <th scope="col">Details</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
