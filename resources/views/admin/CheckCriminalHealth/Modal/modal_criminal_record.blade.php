<div class="modal fade" id="ModalCriminalRecord" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Criminal Record</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="FormDriverCriminalRecord" class="needs-validation" novalidate>
                    <input type="hidden" name="driver_interview_id" id="add_cr_driver_interview_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="add_driver_criminal_record_name">Document name</label>
                                <input type="text" id="add_driver_criminal_record_name" name="driver_criminal_record_name" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="add_driver_criminal_record_details">Details</label>
                                <input type="text" id="add_driver_criminal_record_details" name="driver_criminal_record_details" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="add_driver_criminal_record_file">Upload</label>
                                <div class="custom-file form-upload">
                                    <input type="file" class="custom-file-input upload-criminal-record-file" id="add_driver_criminal_record_file" name="driver_criminal_record_file" required>
                                    <label class="custom-file-label" for="">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="add_driver_criminal_record_date_doc">Date</label>
                                <input type="date" id="add_driver_criminal_record_date_doc" name="driver_criminal_record_date_doc" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="add_driver_criminal_type_id">Type</label>
                                <select class="form-control custom-select select2" name="driver_criminal_type_id" id="add_driver_criminal_type_id" required>
                                    <option value="">Select Document type</option>
                                    @foreach($DriverCriminalTypes as $val)
                                        <option value="{{$val->driver_criminal_type_id}}">{{$val->driver_criminal_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Status</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="add_driver_criminal_record_status_1" name="driver_criminal_record_status" class="custom-control-input" value="1" checked>
                                        <label class="custom-control-label" for="add_driver_criminal_record_status_1">Pass</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="add_driver_criminal_record_status_0" name="driver_criminal_record_status" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="add_driver_criminal_record_status_0">Not pass</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="table-responsive">
                            <table id="tableDriverCriminalRecord" class="table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Document name</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">File</th>
                                        <th scope="col" class="text-center">Date Upload</th>
                                        <th scope="col" class="text-center">Status</th>
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
