@extends('layouts.layout')
@section('content')

{{-- Search form --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Quotation full code</label>
                            <input type="text" id="quotation_id" name="quotation_id" class="form-control search_table"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Contract full code</label>
                            <input type="text" id="customer_contract_id" name="customer_contract_id"
                                class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Company</label>
                            <input type="text" id="company_id" name="company_id" class="form-control search_table"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Contact info</label>
                            <input type="text" id="customer_id" name="customer_id" class="form-control search_table"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Invoice schedule No.</label>
                            <input type="text" id="sale_order_sale_order_code" name="sale_order_sale_order_code"
                                class="form-control search_table" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="ti-search"></i> Search</button>
                <button type="button" class="btn btn-secondary clear-search">Clear</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Invoice schedule</h4>
                </div>

                <div class="table-responsive">

                    <table id="SaleOrder" class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Quotation full code</th>
                                <th scope="col" class="text-center">Contract full code</th>
                                <th scope="col" class="text-center">Invoice schedule No.</th>
                                <th scope="col" class="text-center">Company</th>
                                <th scope="col" class="text-center">Customer Code</th>
                                <th scope="col" class="text-center">Contact info</th>
                                <th scope="col" class="text-center">Admin</th>
                                {{-- <th scope="col" class="text-center">เงื่อนไข OT</th> --}}
                                <th scope="col" class="text-center">Start Date</th>
                                <th scope="col" class="text-center">End Date</th>
                                <th scope="col" class="text-center">Bill status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>

                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

@include('admin.InvoiceSchedule.Modal.modal_content')

@endsection

@section('scripts')
<script>
    var SaleOrder = $('#SaleOrder').DataTable({
        ajax: {
        url: url_gb+"/admin/InvoiceSchedule/Lists",
        type:"POST"
        },
        drawCallback: function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        },
        retrieve: true,
        columns: [
            {data : "DT_RowIndex", class:"text-center", searchable: false, sortable: false},
            {data : "customer_contract_full_code", class:"text-center"},
            {data : "quotation_full_code"},
            {data : "sale_order_sale_order_code", class:"text-center"},
            {data : "company_name_th", class:"text-center"},
            {data : "company_code", class:"text-center"},
            {data : "customer_name", class:"text-center" },
            {data : "admin_name", class:"text-center"},
            // {data : "quotation_price_list_ot_status", class:"text-center"},
            {data : "customer_contract_date_start"},
            {data : "customer_contract_date_end"},
            {data : "status"},
            {data : "action"}
        ],
        select: true,
        dom: 'Bfrtip',
        lengthMenu: [
               [10, 25, 50, -1],
               ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        columnDefs: [{
            className: 'noVis', visible: false
        }],
        buttons: [
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


@include('admin.InvoiceSchedule.Script.script_invoice_schedual_action')
@endsection
