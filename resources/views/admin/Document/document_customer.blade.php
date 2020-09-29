@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <button id="swapSearch" type="button" class="btn btn-outline-secondary m-t-10 mb-0 mr-1 float-right newdata showSerach showSearch" data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample">
                    <span class="ti-angle-down"></span>
                </button>
                <div class="collapse" id="collapseExample">
                    <form id="FormSearch">
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Date of document</label>
                                    <input type="date" id="document_customer_date_search" name="document_customer_date" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Contact info Name</label>
                                    <select class="form-control custom-select select2" id="customer_id_search" name="customer_id" required>
                                        <option value="" required>เลือกผู้ติดต่อของบริษัท</option>
                                        @foreach($ContactInfoes as $ContactInfo)
                                        <option value="{{ $ContactInfo->customer_id }}">{{ $ContactInfo->customer_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Member</label>
                                    <select class="form-control custom-select select2" id="member_id_search" name="member_id" required>
                                        <option value="" required>เลือกชื่อเจ้านาย</option>
                                        @foreach($Members as $Member)
                                        <option value="{{ $Member->member_id }}">{{ $Member->member_name_th }}</option>
                                        @endforeach
                                    </select> </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Company</label>
                                    <select class="form-control custom-select select2" id="company_id_search" name="company_id" required>
                                        <option value="" required>เลือกบริษัท</option>
                                        @foreach($Companies as $Company)
                                        <option value="{{ $Company->company_id }}">{{ $Company->company_name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                        <button type="button" class="btn btn-secondary clear-search btn-clear-search">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
                    @if(App\Helper::CheckPermissionMenu('Document' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add-file-document">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableFileDocument" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Action</th>
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
@include('admin.Document.Modal.modal_document_file_add')
<div class="modal fade" id="ModalFileDocumentEdit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormFileDocumentEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            @if(isset($Page))
                            <div class="col-md-12 mb-3">
                                <label for="type_doc_customer_name">Company</label>
                                <select class="form-control select2" id="edit_company_id" name="company_id">
                                    <option value="">เลือกบริษัท</option>
                                    @foreach($Companies as $Company)
                                    <option value="{{ $Company->company_id }}">{{ $Company->company_name_th }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="col-md-12 mb-3">
                                <label for="type_doc_customer_name">Type of document</label>
                                <select class="form-control select2" id="edit_type_doc_customer_id" name="type_doc_customer_id">
                                    <option value="">เลือกประเภทเอกสาร</option>
                                    @foreach($TypeDocument as $val)
                                    <option value="{{ $val->type_doc_customer_id }}">{{ $val->type_doc_customer_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3 form-upload">
                                <label for="document_customer_name">Upload document</label>
                                <input type="file" class="form-control upload-document-file" id="edit_document_customer_part" name="document_customer_part" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="document_customer_date">Date of document</label>
                                <input type="date" class="form-control" id="edit_document_customer_date" name="document_customer_date">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="document_customer_comment">comment</label>
                                <textarea cols="80" class="form-control" id="edit_document_customer_comment" name="document_customer_comment" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="Check-Box">Status</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="edit_document_customer_status" name="document_customer_status" value="1">
                                    <label class="custom-control-label" for="edit_document_customer_status">Action</label>
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
<div class="modal fade" id="ModalFileDocumentView" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Contact info Name</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_document_contact_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Member</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_member" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Company</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_company" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_document_customer_status" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_document_customer_comment" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Date of document </label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_document_customer_date" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        FileDocumentDatatable();
    });

    $('body').on('click', '.btn-search', function() {
        FileDocumentDatatable();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#company_id_search').val('').change();
        $('#member_id_search').val('').change();
        $('#customer_id_search').val('').change();
        $('#document_customer_date_search').val('');
        FileDocumentDatatable();
    });

    $('body').on('click', '.btn-add-file-document', function(data) {
        $('#ModalFileDocumentAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/Document/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $('#edit_company_id').val(data.company_id).change();
            $('#edit_type_doc_customer_id').val(data.type_doc_customer_id).change();
            $('#edit_document_contact_name').val(data.customer_name);
            $('#edit_document_customer_comment').val(data.document_customer_comment);
            $('#edit_document_customer_date').val(data.format_document_customer_date);
            if (data.document_customer_status == 1) {
                $('#edit_document_customer_status').prop('checked', true);
            } else {
                $('#edit_document_customer_status').prop('checked', false);
            }
            $('#ModalFileDocumentEdit').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/Document/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if (data.document_customer_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $('#show_document_contact_name').text(data.customer_name);
            $('#show_member').text(data.member_name_th);
            $('#show_company').text(data.company_name_th);
            $('#show_document_customer_comment').text(data.document_customer_comment);
            $('#show_document_customer_date').text(data.format_document_customer_date);
            $('#show_document_customer_status').text(status);
            $('#ModalFileDocumentView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormFileDocumentEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/Document/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                FileDocumentDatatable();
                $('#ModalFileDocumentEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
@include('admin.Document.Script.script_document_file_add')
@endsection