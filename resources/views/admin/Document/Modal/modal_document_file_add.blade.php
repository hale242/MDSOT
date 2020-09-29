<div class="modal fade" id="ModalFileDocumentAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormFileDocumentAdd" class="needs-validation" novalidate>
                @if(!isset($Page))
                <input type="hidden" id="add_file_company_id" name="company_id">
                @endif
                <input type="hidden" id="add_file_member_id" name="member_id">
                <input type="hidden" id="add_file_customer_id" name="customer_id">

                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                @if(isset($Page))
                                <div class="col-md-12 mb-3">
                                    <label for="type_doc_customer_name">Company</label>
                                    <select class="form-control select2 select_company_id" id="add_company_id" name="company_id">
                                        <option value="">เลือกบริษัท</option>
                                        @foreach($Companies as $Company)
                                        <option value="{{ $Company->company_id }}">{{ $Company->company_name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="col-md-12 mb-3">
                                    <label for="type_doc_customer_name">Type of document</label>
                                    <select class="form-control select2" id="add_type_doc_customer_name" name="type_doc_customer_id">
                                        <option value="">เลือกประเภทเอกสาร</option>
                                        @foreach($TypeDocument as $val)
                                        <option value="{{ $val->type_doc_customer_id }}">{{ $val->type_doc_customer_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3 form-upload" >
                                    <label for="document_customer_part">Upload document</label>
                                    <input type="file" class="form-control upload-document-file" id="add_document_customer_part" name="document_customer_part" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="document_customer_date">Date of document</label>
                                    <input type="date" class="form-control" id="add_document_customer_date" name="document_customer_date" placeholder="" value="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="document_customer_comment">comment</label>
                                    <textarea cols="80" class="form-control" id="add_document_customer_comment" name="document_customer_comment" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_document_customer_status" name="document_customer_status" value="1" checked>
                                        <label class="custom-control-label" for="add_document_customer_status">Action</label>
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