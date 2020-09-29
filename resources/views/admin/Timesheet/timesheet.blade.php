@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_company_id">Customer Name</label>
                            <select class="form-control custom-select select2" id="search_company_id">
                                <option value="">Select</option>
                                @foreach($Companies as $val)
                                    <option value="{{$val->company_id}}">{{$val->company_name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_customer_contract_full_code">Contract full code</label>
                            <input type="text" class="form-control" id="search_customer_contract_full_code">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_quotation_full_code">Quotation full code</label>
                            <input type="text" class="form-control" id="search_quotation_full_code">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                <button type="button" class="btn btn-secondary clear-search btn-clear-search">Clear</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Replacement driver</h4>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tableReplacementDriver" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Contract full code</th>
                                    <th scope="col">Quotation full code</th>
                                    <th scope="col">Code (INV schedule No.)</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">งวดที่ / เดือน</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
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
@endsection @section('modal')
@include('admin.Timesheet.Modal.modal_clock_in_clock_out')
@endsection
@section('scripts')
<script>
    var tableReplacementDriver = $('#tableReplacementDriver').dataTable({
        "ajax": {
            "url": url_gb + "/admin/Timesheet/Lists",
            "type": "POST",
            "data": function(d) {
                d.company_id = $('#search_company_id').val();
                d.customer_contract_full_code = $('#search_customer_contract_full_code').val();
                d.quotation_full_code = $('#search_quotation_full_code').val();
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {"data": "DT_RowIndex", "class": "text-center", "searchable": false, "sortable": false},
            {"data": "customer_contract_full_code", "name":"customer_contract.customer_contract_full_code"},
            {"data": "quotation_full_code", "name":"quotation.quotation_full_code"},
            {"data": "sale_order_sale_order_code"},
            {"data": "company_name_th", "name":"company.company_name_th"},
            {"data": "sale_order_number", "searchable": false, "sortable": false},
            {"data": "sale_order_list_date_start", "class": "text-center", "searchable": false, "sortable": false},
            {"data": "sale_order_list_date_end", "class": "text-center", "searchable": false, "sortable": false},
            {"data": "action", "name": "action", "searchable": false, "sortable": false, "class": "text-center"},

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

    $('body').on('click', '.btn-search', function(data) {
        tableReplacementDriver.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function(data) {
        $('#search_company_id').val('').change();
        $('#search_customer_contract_full_code').val('');
        $('#search_quotation_full_code').val('');
        tableReplacementDriver.api().ajax.reload();
    });
</script>
@include('admin.Timesheet.Script.script_clock_in_clock_out')
@endsection
