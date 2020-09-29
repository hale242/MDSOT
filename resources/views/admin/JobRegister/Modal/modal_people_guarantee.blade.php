<div class="modal fade" id="ModalPeopleGuarantee" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">People Guarantee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="FormPeopleGuarantee" class="needs-validation" novalidate>
                    <input type="hidden" id="people_guarantee_driver_id" name="driver_id">
                    <div class="card">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="driver_name">Driver</label>
                                        <input type="text" class="form-control" id="show_driver_name" placeholder="" value="สมชาย มุ่งมั่น" disabled />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="people_guarantee_name">Guarantee name</label>
                                        <input type="text" class="form-control" id="people_guarantee_name" name="people_guarantee_name" placeholder="" value="" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="people_guarantee_phone">Guarantee phone</label>
                                        <input type="text" class="form-control" id="people_guarantee_phone" name="people_guarantee_phone" placeholder="" value="" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="people_guarantee_email">Guarantee E-mail</label>
                                        <input type="email" class="form-control" id="people_guarantee_email" name="people_guarantee_email" placeholder="" value="" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="people_guarantee_relationship">Relationship</label>
                                        <input type="text" class="form-control" id="people_guarantee_relationship" name="people_guarantee_relationship" placeholder="" value="" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="people_guarantee_details">Guarantee details</label>
                                        <textarea cols="80" class="form-control" id="people_guarantee_details" name="people_guarantee_details" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Check-Box">Status</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="add_people_guarantee_status" name="people_guarantee_status" value="1" checked />
                                            <label class="custom-control-label" for="people_guarantee_status">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 text-right">
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="form-group mt-12 row table-responsive">
                    <table id="tablePeopleGuarantee" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Guarantee name</th>
                                <th scope="col" class="text-center">Guarantee phone</th>
                                <th scope="col" class="text-center">Guarantee E-mail</th>
                                <th scope="col" class="text-center">Relationship</th>
                                <th scope="col" class="text-center">Guarantee details</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
