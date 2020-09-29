<div class="modal fade show" id="ModalSaleTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" id="sale_team_id" name="team_id">

            <div class="modal-header">
                <h4 class="modal-title">Sale Team</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_Manager" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!-- <th>IP</th> -->
                                <th>Team</th>
                                <th>Manager</th>
                                <th>Area</th>
                                <th>Details</th>
                                <th>Sale</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Sale user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormAddUser">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body address1">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="admin_id_A">Sales</label>
                                    <select class="form-control custom-select select_add_user select2" multiple="" style="height: 36px;width: 100%;" id="add_user_admin_id" name="admin_id[]" required="" data-select2-id="admin_id_A" tabindex="-1" aria-hidden="true">

                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sale_team_sub_status" name="sale_team_sub_status" value="1">
                                        <label class="custom-control-label" for="sale_team_sub_status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <input type="hidden" id="add_user_sale_team_sub_id">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>