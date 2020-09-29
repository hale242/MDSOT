@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Confirm contract</h4>
                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
                            <span class="badge badge-secondary"><i class="ti-check"></i></span> Check All
                        </a>
                        <a href="javascript:void(0)" class="pr-3">
                            <span class="badge badge-success"><i class="ti-check"></i></span> Confirm
                        </a>
                        <a href="javascript:void(0)" class="pr-3">
                            <span class="badge badge-warning"><i class="ti-back-right"></i></span> Reject
                        </a>
                    </div>
                    <table id="ApproveContractTable" class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">No</th>
                                <th scope="col">Contract full code</th>
                                <th scope="col">Quotation full code</th>
                                <th scope="col">Quotation create date</th>
                                <th scope="col">Confirm letter date</th>
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

@include('admin.ApproveContract.Modal.modal_content')
@include('admin.ApproveContract.Modal.modal_view_driver')


@endsection

@section('scripts')
<script>

    var ApproveContractTable = $('#ApproveContractTable').dataTable({
        "ajax": {
            "url": url_gb+"/admin/ApproveContract/Lists",
            "type":"POST", "data": function ( d ) {
                d.company_id = $('#search_company_id').val();
                d.customer_id = $('#search_customer_id').val();
                d.admin_id = $('#search_admin_id').val();
                d.quotation_full_code = $('#search_quotation_full_code').val();
                d.quotation_title = $('#search_quotation_title').val();
                d.quotation_status = $('#search_quotation_status').val();
                d.quotation_date_doc = $('#search_quotation_date_doc').val();
                d.quotation_due_date = $('#search_quotation_due_date').val();
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        },
        "retrieve": true,
        "columns": [
            {   "data" : "checkbox",
                "class":"text-center",
                "searchable": false,
                "sortable": false
            },
            {"data" : "DT_RowIndex", "class":"text-center", "searchable": false, "sortable": false},
            {"data" : "customer_contract_full_code", "class":"text-center"},
            {"data" : "quotation_full_code"},
            {"data" : "quotation_date_doc", "class":"text-center", "searchable": false},
            {"data" : "quotation_due_date", "class":"text-center", "searchable": false},
            {"data" : "quotation_price", "class":"text-right", "searchable": false},
            {"data" : "quotation_unit", "class":"text-center" },
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
@include('admin.ApproveContract.Script.script_approvecontract_action')
@include('admin.ApproveContract.Script.script_view_driver')

@endsection
