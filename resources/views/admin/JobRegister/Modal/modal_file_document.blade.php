<div class="modal fade" id="ModalFileDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">File Document</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="FormDriverFile" class="needs-validation" novalidate>
                    <input type="hidden" id="driver_file_id">
                    <input type="hidden" id="add_driver_file_driver_id" name="driver_id">
                    <div class="card">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="add_type_doc_driver_id">Document type</label><br>
                                        <select class="form-control custom-select select2" name="type_doc_driver_id" id="add_type_doc_driver_id" required>
                                            <option value="">Select Document type</option>
                                            @foreach($TypeDocumentDrivers as $val)
                                                <option value="{{$val->type_doc_driver_id}}">{{$val->type_doc_driver_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="add_driver_file_date">Date Document</label>
                                        <input type="date" class="form-control" id="add_driver_file_date" name="driver_file_date">
                                    </div>
                                    <div class="col-md-6 mb-3 form-upload">
                                        <label for="add_driver_file_name">File</label>
                                        <input type="file" class="form-control upload-driver-file" id="add_driver_file_name" name="driver_file_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Check-Box">Status</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="add_driver_file_status" name="driver_file_status" value="1" checked>
                                            <label class="custom-control-label" for="add_driver_file_status">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="add_driver_file_details">Comment</label>
                                        <textarea cols="80" class="form-control" id="add_driver_file_details" name="driver_file_details" rows="5"></textarea>
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
                    <table id="tableDriverFile" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">File Type</th>
                                <th scope="col">File</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Date Document</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
