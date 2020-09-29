<div class="modal fade" id="ModelMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 table-responsive">
                    <div class="text-right">
                    </div>
                    <input type="hidden" id="member_company_id">
                    <table id="tableMember" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Company</th>
                                <th scope="col">Member Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Tax ID</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalMemberFileDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Document Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 table-responsive">
                    <div class="text-right">
                        <button type="button" class="btn btn-primary btn-rounded btn-add-file-document-member" data-toggle="modal" data-id="" data-company-id="">Add File</button>
                    </div>
                    <input type="hidden" id="member_document_company_id">
                    <input type="hidden" id="member_document_member_id">
                    <table id="tableMemberFileDocument" class="table" width="100%">
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