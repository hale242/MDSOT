<div class="modal fade" id="ModelContactInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Contact info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 table-responsive">
                    <!-- <div class="text-right">
                        <button type="button" class="btn btn-primary btn-rounded btn-add-contact-info" data-toggle="modal" data-id="">Add Contact info</button>
                    </div> -->
                    <input type="hidden" id="contact_info_company_id">
                    <table id="tableContactInfo" class="table" width="100%">
                        <thead>
                            <tr>
                            <tr>
                                <th scope="col">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Company</th>
                                <th scope="col">Contact info Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Line</th>
                                <th scope="col">Fax</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Address</th>
                                <th scope="col">Bill Status</th>
                                <th scope="col">Team</th>
                                <th scope="col">Sale</th>
                            </tr>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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

                    </div>
                    <input type="hidden" id="contact_customer_id">
                    <table id="tableContact" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Contact info title</th>
                                <th scope="col">Datail</th>
                                <th scope="col">Contact info name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Line</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalAddContactInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Contact info</h4>
            </div>
            <form id="FormAddContactInfo">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <input type="hidden" id="add_company_id" name="company_id">
                                <div class="col-md-12 mb-3">
                                    <label for="customer_id">Contact info</label>
                                    <select class="form-control custom-select select2 customer_id_select" id="add_customer_id" required>
                                        <option value="" required>เลือกผู้ติดต่อ</option>
                                        <!-- @foreach($ContactInfoes as $ContactInfo)
                                        <option value="{{ $ContactInfo->customer_id }}">{{ $ContactInfo->customer_name }}</option>
                                        @endforeach -->
                                    </select>
                                </div>
                                <input type="hidden" id="add_customer_districts_id" name="districts_id">
                                <input type="hidden" id="add_customer_code" name="customer_code">
                                <input type="hidden" id="add_customer_name" name="customer_name">
                                <input type="hidden" id="add_customer_phone" name="customer_phone">
                                <input type="hidden" id="add_customer_tel" name="customer_tel">
                                <input type="hidden" id="add_customer_line" name="customer_line">
                                <input type="hidden" id="add_customer_fax" name="customer_fax">
                                <input type="hidden" id="add_customer_email" name="customer_email">
                                <input type="hidden" id="add_customer_address" name="customer_address">
                                <input type="hidden" id="add_customer_address_no" name="customer_address_no">
                                <input type="hidden" id="add_customer_address_road" name="customer_address_road">
                                <input type="hidden" id="add_customer_address_alley" name="customer_address_alley">
                                <input type="hidden" id="add_customer_position" name="customer_position">
                                <input type="hidden" id="add_customer_department" name="customer_department">

                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_customer_status" name="customer_status" value="1" checked="">
                                        <label class="custom-control-label" for="customer_status">Active</label>
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
        </div>
    </div>
</div>