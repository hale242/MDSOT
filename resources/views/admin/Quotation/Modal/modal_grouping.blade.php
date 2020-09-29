<div class="modal fade" id="ModalGrouping" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Grouping</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="FormGrouping" class="needs-validation" novalidate>
                    <input type="hidden" id="quotation_grouping_quotation_id" name="quotation_id">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Group Name</label>
                                <input class="form-control" type="text" id="add_quotation_grouping_name" name="quotation_grouping_name" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="add_quotation_grouping_status" name="quotation_grouping_status" value="1" checked />
                                    <label class="custom-control-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr />
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mt-12 table-responsive">
                            <table id="tableQuotationGrouping" class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Group Name</th>
                                        <th scope="col">Actions</th>
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
