@extends('layouts.layout')
@section('content')
<div class="col-12">
    <div class="material-card card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Approve driver ralease</h4>
            </div>
            <div class="table-responsive">
                <table id="ApproveDriverReleaseTable" class="table w-100">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Contract full code</th>
                            <th scope="col">Quotation full code</th>
                            <th scope="col">Quotation create date</th>
                            <th scope="col">Confirm letter date</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Company</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@include('admin.ApproveDriverRelease.Modal.modal_content')
@include('admin.ApproveContract.Modal.modal_view_driver')

@endsection

@section('scripts')
<script>
    var ApproveDriverReleaseTable = $('#ApproveDriverReleaseTable').dataTable({
        "ajax": {
            "url": url_gb+"/admin/ApproveDriverRelease/Lists",
            "type":"POST", "data": function ( d ) { }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        },
        "retrieve": true,
        "columns": [
            {"data" : "DT_RowIndex", "class":"text-center", "searchable": false, "sortable": false},
            {"data" : "customer_contract_full_code", "class":"text-center"},
            {"data" : "quotation_full_code"},
            {"data" : "quotation_date_doc", "class":"text-center"},
            {"data" : "quotation_due_date", "class":"text-center"},
            {"data" : "customer_contract_date_start", "class":"text-center"},
            {"data" : "customer_contract_date_end", "class":"text-center" },
            {"data" : "quotation_price"},
            {"data" : "quotation_unit"},
            {"data" : "company_name_th"},
            {"data" : "customer_contract_status"},
            {"data" : "action", "name":"action"}
        ],
        "select": true,
        "dom": 'Bfrtip',
         "lengthMenu": [
               [10, 25, 50, -1],
               ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "columnDefs": [{
            className: 'noVis', visible: false
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
</script>
@include('admin.ApproveDriverRelease.Script.script_approvedriverrelease_action')
@include('admin.ApproveContract.Script.script_view_driver')
@endsection
