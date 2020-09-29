@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <button id="swapSearch" type="button" class="btn btn-outline-secondary m-t-10 mb-0 mr-1 float-right newdata showSerach showSearch" data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample">
                    <span class="ti-angle-down"></span>
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Company Code</label>
                                <input type="text" id="company_code_search" name="company_id" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Name of contact</label>
                                <input type="text" id="customer_name_search" name="customer_name" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Company Name (Thai Name)</label>
                                <input type="text" id="company_name_th_search" name="company_name_th" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Company Name (English Name)</label>
                                <input type="text" id="company_name_en_search" name="company_name_en" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="sale_team_main_id">Team</label>
                            <input type="text" id="sale_team_main_id_search" name="sale_team_main_id" class="form-control search_table" placeholder="">
                        </div>
                    </div> -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sale_team_sub_id">Area</label>
                                <select class="form-control custom-select select2" id="sale_team_sub_id_search" name="sale_team_sub_id" required>
                                    <option value="" required>เลือกเขตพื้นที่</option>
                                    @foreach($SaleArea as $val)
                                    <option value="{{ $val->sale_team_sub_id }}">{{ $val->sale_team_sub_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                        <button type="button" class="btn btn-secondary btn-clear-search">Clear</button>
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
                    <h4 class="card-title">Company</h4>
                    @if(App\Helper::CheckPermissionMenu('Company' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableCompany" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Action</th>
                                <th scope="col">No</th>
                                <th scope="col">Company Code</th>
                                <th scope="col">Contact info Name</th>
                                <th scope="col">Company Name (Thai Name)</th>
                                <th scope="col">Company Name (English Name)</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Tax ID</th>
                                <th scope="col">Address</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Team</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
@include('admin.Company.Modal.modal_company_add')
@include('admin.Company.Modal.modal_company_view')
@include('admin.Company.Modal.modal_company_edit')
@include('admin.Company.Modal.modal_credit_term')
@include('admin.Company.Modal.modal_contact_info')
@include('admin.Company.Modal.modal_document_file')
@include('admin.Company.Modal.modal_member')
@include('admin.Document.Modal.modal_document_file_add')
@endsection
@section('scripts')
<script>
    var tableCompany = $('#tableCompany').dataTable({
        "ajax": {
            "url": url_gb + "/admin/Company/Lists",
            "type": "POST",
            "data": function(d) {
                d.customer_name = $('#customer_name_search').val();
                d.sale_team_sub_id = $('#sale_team_sub_id_search').val();
                d.company_code = $('#company_code_search').val();
                d.company_name_th = $('#company_name_th_search').val();
                d.company_name_en = $('#company_name_en_search').val();
                // etc
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {
                "data": "action",
                "name": "action",
                "searchable": false,
                "sortable": false,
                "class": "text-center"
            },
            {
                "data": "DT_RowIndex",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "company_code",
                "class": "text-center"
            },
            {
                "data": "contact_info",
                "class": "text-center"
            },
            {
                "data": "company_name_th",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "company_name_en",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "company_email",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "company_tax_id",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "address",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "company_tel",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "company_phone",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "sale_team_main_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },

        ],
        // "select": true,
        "dom": 'Bfrtip',
        "lengthMenu": [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "columnDefs": [{
            className: 'noVis',
            visible: false
        }],
        "buttons": [
            'pageLength',
            'colvis',
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        processing: true,
        serverSide: true,

    });
    $('body').on('click', '.btn-search', function(data) {
        tableCompany.api().ajax.reload();
    })
    $('body').on('click', '.btn-clear-search', function(data) {
        $('#customer_name_search').val('').change();
        $('#sale_team_sub_id_search').val('').change();
        $('#company_code_search').val('');
        $('#company_name_th_search').val('');
        $('#company_name_en_search').val('');
        tableCompany.api().ajax.reload();
    });

    $('body').on('click', '.btn-file', function() {
        var company_id = $(this).data('id');
        $('#company_id').val(company_id);
        $('#ModalFileDocument').modal('show');
        FileDocumentDatatable();
    });

    $('body').on('click', '.btn-add-file-document', function() {
        var company_id = $('#company_id').val();
        $('#add_file_company_id').val(company_id);
        $('#ModalFileDocumentAdd').modal('show');
    });
</script>
@include('admin.Company.Script.script_company_add')
@include('admin.Company.Script.script_company_view')
@include('admin.Company.Script.script_company_edit')
@include('admin.Company.Script.script_credit_term')
@include('admin.Company.Script.script_contact_info')
@include('admin.Company.Script.script_member')
@include('admin.ContactInfo.Script.script_contact')
@include('admin.Document.Script.script_document_file_add')
@endsection