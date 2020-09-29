@extends('layouts.layout')
@section('content')

<div class="row">
    @php $admin = Auth::guard('admin')->user(); @endphp
    <input type="hidden" id="adminid" value="{{$admin->admin_id}}">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Sales</label>
                            <select class="form-control custom-select search_table_select select2" name="admin_id" id="admin_id" data-placeholder="" tabindex="1">
                                <option value="">---- Select ----</option>
                            @foreach ($AdminUsers as $item)
                                <option value="{{$item->admin_id}}">{{$item->first_name." ".$item->last_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Confirmation ID</label>
                            <input type="text" id="quotation_full_code" name="quotation_full_code" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Company</label>
                            <select class="form-control custom-select search_table_select select2" name="company_name_th" id="company_name_th" data-placeholder="" tabindex="1">
                                <option value="">---- Select ----</option>
                            @foreach ($Companies as $item)
                                <option value="{{$item->company_id}}">{{$item->company_name_th}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Contract Number</label>
                            <input type="number" id="customer_contract_full_code" name="customer_contract_full_code" class="form-control search_table" placeholder="">
                        </div>
                    </div> --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Date send approve </label>
                            <input type="date" id="quotation_pre_approve_date_send" name="quotation_pre_approve_date_send" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Date approve </label>
                            <input type="date" id="quotation_pre_approve_date_approve" name="quotation_pre_approve_date_approve" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                <button type="button" class="btn btn-secondary clear-search btn-clear-search">Clear</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Preapprove Management System</h4>
                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
                            <span class="badge badge-secondary"><i class="ti-check"></i></span> Check All
                        </a>
                        <a href="javascript:void(0)" class="approve-all pr-3">
                            <span class="badge badge-success"><i class="ti-check"></i></span> Approve
                        </a>
                        <a href="javascript:void(0)" class="reject-all pr-3">
                            <span class="badge badge-warning"><i class="ti-back-right"></i></span> Reject
                        </a>
                        <a href="javascript:void(0)" class="not-approve-all pr-3">
                            <span class="badge badge-danger"><i class="ti-close"></i></span> Not approve
                        </a>
                    </div>
                    <table id="tableQuotationPreApprove" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">No</th>
                                <th scope="col">Pre-Approve Number</th>
                                <th scope="col">Confirmation ID</th>
                                <th scope="col">Company</th>
                                <th scope="col">Type</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col" class="text-center">Date send approve</th>
                                <th scope="col">Sale</th>
                                <th scope="col" class="text-center">Line Approve</th>
                                <th scope="col">Actions</th>
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

@include('admin.PreApprove.Modal.modal_lineapprove') {{--ดำเนินการแล้ว--}}

<div class="modal fade" id="viewapproveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content viewapproveModal-content"></div>
    </div>
</div>

<div class="modal fade" id="ViewQuotationModal" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content viewquotationModal-content"></div>
    </div>
</div>


@include('admin.PreApprove.Modal.modal_confirmletter')
@include('admin.PreApprove.Modal.modal_approve_action')


<style>
    .preloader { width: 100%; height: 100%; top: 0; position: absolute; z-index: 99999; background: #fff; }
</style>

@endsection


@section('scripts')

<script>
    var tableQuotationPreApprove = $('#tableQuotationPreApprove').dataTable({
        "ajax": {
            "type":"POST",
            "data" : function(d){
                d.admin_id = $('#admin_id').val();
                d.quotation_full_code = $('#quotation_full_code').val();
                d.company_name_th = $('#company_name_th').val();
                d.quotation_pre_approve_date_send = $('#quotation_pre_approve_date_send').val();
                d.quotation_pre_approve_date_approve = $('#quotation_pre_approve_date_approve').val();
            },
            "url": url_gb + "/admin/PreApprove/Lists"
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": false,
        "columns": [
            {   "data" : "checkbox",
                "class":"text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "DT_RowIndex",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "quotation_full_code",
                "class": "text-left"
            },
            {
                "data": "quotation_full_code",
                "class": "text-left"
            },
            {
                "data": "company_name_th",
                "class": "text-left"
            },
            {
                "data": "quotation_run_code_details",
                "class": "text-left"
            },
            {
                "data": "quotation_title",
                "class": "text-left"
            },
            {
                "data": "quotation_price",
                "class": "text-left"
            },
            {
                "data": "quotation_pre_approve_date_send",
                "class": "text-center"
            },
            {
                "data": "sale",
                "class": "text-center"
            },
            {
                "data": "btnApproveLV",
                "class": "text-center"
            },
            {
                "data": "action",
                "name": "action",
                "searchable": false,
                "sortable": false,
                "class": "text-center"
            },
        ],
        "select": true,
        "dom": 'Bfrtip',
        "lengthMenu": [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "columnDefs": [{
            className: 'noVis',
            visible: false
        }],
        // "order": [[ 4, "asc" ]],
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
</script>

@include('admin.PreApprove.Script.script_lineapprove')
@include('admin.PreApprove.Script.script_pre_approve_action')

@endsection
