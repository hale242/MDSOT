<div class="modal fade" id="ModalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 table-responsive">
                    <div class="text-right">
                        <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-3 btn-contact-add">Add Contact</button>
                    </div>
                    <input type="hidden" id="contact_customer_id">
                    <table id="tableContact" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">No</th>
                                <th scope="col">Contact info title</th>
                                <th scope="col">Datail</th>
                                <th scope="col">Contact info name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Line</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ModalContactAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>

            <div class="card">
                <form id="FormContactAdd" class="needs-validation" novalidate>
                    <input type="hidden" name="customer_id" id="add_contact_customer_id">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_title">Contact info title</label>
                                    <input type="text" class="form-control" id="add_contact_info_title" name="contact_info_title" placeholder="" value="" required />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_details">Datail</label>
                                    <input type="text" class="form-control" id="add_contact_info_details" name="contact_info_details">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_customer_name">Contact info name</label>
                                    <input type="text" class="form-control" id="add_contact_info_customer_name" name="contact_info_customer_name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_phone">Phone</label>
                                    <input type="text" class="form-control" id="add_contact_info_phone" name="contact_info_phone">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_email">Email</label>
                                    <input type="email" class="form-control" id="add_contact_info_email" name="contact_info_email">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_line">Line</label>
                                    <input type="text" class="form-control" id="add_contact_info_line" name="contact_info_line">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_position">Position</label>
                                    <input type="text" class="form-control" id="add_contact_info_position" name="contact_info_position">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_department">Department</label>
                                    <input type="text" class="form-control" id="add_contact_info_department" name="contact_info_department">
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h4>Address</h4>
                                        </div>
                                    </div>
                                    <div class="row address">
                                        <div class="col-md-6 mb-2">
                                            <label for="add_contact_info_address_no">House No.</label>
                                            <input type="text" class="form-control" id="add_contact_info_address_no" name="contact_info_address_no">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="add_contact_info_address_building">Bldg / Village</label>
                                            <input type="text" class="form-control" id="add_contact_info_address_building" name="contact_info_address_building">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="add_contact_info_address_road">Rd.</label>
                                            <input type="text" class="form-control" id="add_contact_info_address_road" name="contact_info_address_road">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="add_contact_info_address_alley">Lane</label>
                                            <input type="text" class="form-control" id="add_contact_info_address_alley" name="contact_info_address_alley">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="provinces_id">Province</label>
                                            <select class="form-control custom-select select2 select-province" id="add_contact_info_provice_id">
                                                <option value="">Select Province</option>
                                                @foreach($Provinces as $val)
                                                    <option value="{{$val->provinces_id}}">{{$val->provinces_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amphures_id">District / Area</label>
                                            <select class="form-control custom-select select2 select-amphur">

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="districts_id">Sub-district / Sub-area</label>
                                            <select class="form-control custom-select select2 select-district">
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="districts_id">Zipcode</label>
                                            <input type="text" class="form-control zipcode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="add_contact_info_status">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_contact_info_status" name="contact_info_status" value="1" checked />
                                        <label class="custom-control-label" for="add_contact_info_status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
              </form>
            </div>
        </div>
    </div>
</div>
