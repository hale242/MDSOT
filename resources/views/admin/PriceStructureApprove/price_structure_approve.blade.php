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
                                    <label class="control-label">Item code</label>
                                    <select class="form-control custom-select select2" id="search_item_code_id">
                                        <option value="">----Selest----</option>
                                        @foreach($ItemCodes as $val)
                                        <option value="{{$val->item_code_id}}">{{$val->item_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Price structure name</label>
                                    <input type="text" id="search_price_structure_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Date send start</label>
                                    <input type="date" id="search_price_structure_approve_date_send_start" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Date send end</label>
                                    <input type="date" id="search_price_structure_approve_date_send_end" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Approve level</label>
                                    <input type="number" id="search_price_structure_approve_lv" class="form-control">
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
                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
                            <span class="badge badge-secondary"><i class="ti-check"></i></span> Check All
                        </a>
                        <a href="javascript:void(0)" class="pr-3 btn-structure-approve-all" data-type="A">
                            <span class="badge badge-success"><i class="ti-check"></i></span> Approve
                        </a>
                        <a href="javascript:void(0)" class="pr-3 btn-structure-approve-all" data-type="R">
                            <span class="badge badge-warning"><i class="ti-back-right"></i></span> Reject
                        </a>
                        <a href="javascript:void(0)" class="pr-3 btn-structure-approve-all" data-type="N">
                            <span class="badge badge-danger"><i class="ti-close"></i></span> Not approve
                        </a>
                    </div>
                    <table id="tablePriceStructureApprove" class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Item code</th>
                                <th scope="col">Price structure name</th>
                                <th scope="col">Sale price</th>
                                <th scope="col">Profit (Baht)</th>
                                <th scope="col">Profit (Percen)</th>
                                <th scope="col">Date start</th>
                                <th scope="col">Date send</th>
                                <th scope="col">Level</th>
                                <th scope="col">Price structure status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
@include('admin.PriceStructure.Modal.modal_price_structure_view')
@include('admin.PriceStructure.Modal.modal_line_approve')
@include('admin.PriceStructureApprove.Modal.modal_structure_approve')
@endsection
@section('scripts')
<script>
    var tablePriceStructureApprove = $('#tablePriceStructureApprove').dataTable({
        "ajax": {
            "url": url_gb + "/admin/PriceStructureApprove/Lists",
            "type": "POST",
            "data": function(d) {
                d.item_code_id = $('#search_item_code_id').val();
                d.price_structure_name = $('#search_price_structure_name').val();
                d.price_structure_approve_lv = $('#search_price_structure_approve_lv').val();
                d.price_structure_approve_date_send_start = $('#search_price_structure_approve_date_send_start').val();
                d.price_structure_approve_date_send_end = $('#search_price_structure_approve_date_send_end').val();
                // etc
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [{
                "data": "checkbox",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
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
                "sortable": false
            },
            {
                "data": "item_code_name",
                "name": "item_code.item_code_name"
            },
            {
                "data": "price_structure_name"
            },
            {
                "data": "price_structure_sale_price",
                "searchable": false
            },
            {
                "data": "price_structure_profit_price",
                "searchable": false
            },
            {
                "data": "price_structure_profit_percen"
            },
            {
                "data": "price_structure_date_start",
                "class": "text-center",
                "sortable": false
            },
            {
                "data": "price_structure_approve_date_send",
                "class": "text-center",
                "sortable": false
            },
            {
                "data": "price_structure_approve_lv",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "price_structure_approve_status",
                "class": "text-center",
                "searchable": false,
                "sortable": false
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

    $('body').on('click', '.btn-search', function() {
        tablePriceStructureApprove.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_item_code_id').val('').change();
        $('#search_price_structure_name').val('');
        $('#search_price_structure_approve_lv').val('');
        $('#search_price_structure_approve_date_send_start').val('');
        $('#search_price_structure_approve_date_send_end').val('');
        tablePriceStructureApprove.api().ajax.reload();
    });
</script>
@include('admin.PriceStructureApprove.Script.script_structure_approve')
@include('admin.PriceStructure.Script.script_price_structure_view')
@include('admin.PriceStructure.Script.script_line_approve')
@endsection