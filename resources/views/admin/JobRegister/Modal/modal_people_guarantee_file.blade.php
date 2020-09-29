<div class="modal fade" id="ModalPeopleGuaranteeFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">People Guarantee file</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="FormPeopleGuaranteeFile" class="needs-validation" novalidate>
                    <input type="hidden" id="add_people_guarantee_id" name="people_guarantee_id">
                    <div class="card">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="driver_id">Driver</label>
                                        <input type="text" class="form-control" id="show_people_guarantee_file_driver_name"disabled />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="people_guarantee_name">Guarantee name</label>
                                        <input type="text" class="form-control" id="show_people_guarantee_name" disabled />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="add_type_doc_driver_id">Document type</label><br>
                                        <select class="form-control custom-select select2" name="type_doc_driver_id" required>
                                            <option value="">Select Document type</option>
                                            @foreach($TypeDocumentDrivers as $val)
                                                <option value="{{$val->type_doc_driver_id}}">{{$val->type_doc_driver_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3 form-upload">
                                        <label for="people_guarantee_file_part">Upload file</label>
                                        <input type="file" class="form-control upload-people-guarantee-file" id="add_people_guarantee_file_part" name="people_guarantee_file_name" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="people_guarantee_file_date">Date file</label>
                                        <input type="date" class="form-control" id="add_people_guarantee_file_date" name="people_guarantee_file_date" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="people_guarantee_file_details">File details</label>
                                        <textarea cols="80" class="form-control" id="add_people_guarantee_file_details" name="people_guarantee_file_details" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Check-Box">Status</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="add_people_guarantee_file_status" name="people_guarantee_file_status" value="1" checked />
                                            <label class="custom-control-label" for="add_people_guarantee_file_status">Active</label>
                                        </div>
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
                <hr>
                <div class="form-group mt-12 row table-responsive">
                    <table id="tablePeopleGuaranteeFile" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Guarantee name</th>
                                <th scope="col" class="text-center">Type Document</th>
                                <th scope="col" class="text-center">File</th>
                                <th scope="col" class="text-center">Date file</th>
                                <th scope="col" class="text-center">File details</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
