<div class="modal fade" id="ModalFileDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" id="customer_id">
            <input type="hidden" id="company_id">
            <div class="modal-header">
                <h4 class="modal-title">Document Contact info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="text-right">
                    <button type="button" id='btn-add_company_id' class="btn btn-primary btn-rounded m-t-10 mb-3 btn-add-file-document">Add File</button>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table id="tableFileDocument" style="width:100%" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Actions</th>
                                    <th scope="col">No</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Contact info Name</th>
                                    <th scope="col">Member</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Type of document</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Date of document</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>