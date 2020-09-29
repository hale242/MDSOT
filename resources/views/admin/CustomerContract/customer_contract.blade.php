@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">บริษัท</label>
                            <select class="select2 form-control custom-select" id="search_company_id">
                                <option value="">----select----</option>
                                @foreach($Companies as $val)
                                    <option value="{{$val->company_id}}">{{$val->company_name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">สถานะสัญญา</label>
                            <select class="select2 form-control custom-select" id="search_customer_contract_status">
                                <option value="">----Selete----</option>
                                <option value="0">รอสร้างสัญญา</option>
                                <option value="1">รอข้อมูลพนักงานประจำสัญญา/รอสัมภาษณ์พนักงาน</option>
                                <option value="2">ส่งอนุมัติ/รออนุมัติ</option>
                                <option value="3">อนุมัติรอเริ่มงาน</option>
                                <option value="4">อนุมัติเริ่มงาน</option>
                                <option value="5">ยกเลิก</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Pre-Approve No.</label>
                            <input type="text" class="form-control" id="search_quotation_full_code">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Contract No.</label>
                            <input type="text" class="form-control" id="search_customer_contract_full_code">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">วันที่เริ่มสัญญา</label>
                            <input type="date" class="form-control" id="search_customer_contract_date_start">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">วันสิ้นสุดสัญญา</label>
                            <input type="date" class="form-control" id="search_customer_contract_date_end">
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
    <div class="col-6">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Waiting for contract</h4>
                    <div class="table-responsive">
                        <table id="tableCustomerWaitingContract" class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Pre-Approve No.</th>
                                    <th scope="col" class="text-center">Company</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                        </table>
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
                    <h4 class="card-title">Customer contract</h4>
                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall pr-3" data-checked="no">
                            <span class="badge badge-secondary"><i class="ti-check"></i></span> Check All
                        </a>
                        <a href="javascript:void(0)" class="pr-3 btn-cancel-all">
                            <span class="badge badge-danger"><i class="ti-na"></i></span> Cancel
                        </a>
                    </div>
                    <table id="tableCustomerContract" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col"></th>
                                <th scope="col">No</th>
                                <th scope="col">Contract No.</th>
                                <th scope="col">Pre-Approve No.</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Price</th>
                                <th scope="row">Pre approve</th>
                                <th scope="col">Status</th>
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
@include('admin.CustomerContract.Modal.modal_cancel')
@include('admin.CustomerContract.Modal.modal_customer_contract_edit')
@include('admin.CustomerContract.Modal.modal_customer_contract_view')
@include('admin.CustomerContract.Modal.modal_attach_contract')
@include('admin.CustomerContract.Modal.modal_view_driver')
@include('admin.CustomerContract.Modal.modal_timesheet')
@include('admin.CustomerContract.Modal.modal_view_driver_porfile')
@endsection
@section('scripts')
<script>
    var tableCustomerWaitingContract = $('#tableCustomerWaitingContract').dataTable({
        "ajax": {
            "url": url_gb+"/admin/CustomerContract/Lists",
            "type":"POST", "data": function ( d ) {
                d.customer_contract_status = 0;
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        },
        "retrieve": true,
        "columns": [
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
            {"data" : "quotation_full_code", "name":"quotation.quotation_full_code"},
            {"data" : "company_name_th", "name":"company.company_name_th"},
            {
                "data" : "action" ,
                "name" : "action",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },

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

    var tableCustomerContract = $('#tableCustomerContract').dataTable({
        "ajax": {
            "url": url_gb+"/admin/CustomerContract/Lists",
            "type":"POST", "data": function ( d ) {
                d.company_id = $('#search_company_id').val();
                d.customer_contract_status = $('#search_customer_contract_status').val();
                d.quotation_full_code = $('#search_quotation_full_code').val();
                d.customer_contract_full_code = $('#search_customer_contract_full_code').val();
                d.customer_contract_date_start = $('#search_customer_contract_date_start').val();
                d.customer_contract_date_end = $('#search_customer_contract_date_end').val();
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        },
        "retrieve": true,
        "columns": [
            {
                "data" : "action" ,
                "name" : "action",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
            {"data" : "checkbox" , "class":"text-center" , "searchable": false, "sortable": false},
            {"data" : "customer_contract_full_code"},
            {"data" : "quotation_full_code", "name":"quotation.quotation_full_code"},
            {"data" : "customer_contract_date_start", "class":"text-center", "sortable": false},
            {"data" : "customer_name", "name":"customer.customer_name"},
            {"data" : "sum_unit", "class":"text-center", "searchable": false},
            {"data" : "total", "class":"text-center", "searchable": false},
            {"data" : "approve", "class":"text-center" , "searchable": false, "sortable": false},
            {"data" : "customer_contract_status", "class":"text-center" , "searchable": false, "sortable": false}
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

    $('body').on('click', '.btn-search', function(data) {
        tableCustomerContract.api().ajax.reload();
    })

    $('body').on('click', '.btn-clear-search', function(data) {
        $('#search_company_id').val('').change();
        $('#search_customer_contract_status').val('').change();
        $('#search_quotation_full_code').val('');
        $('#search_customer_contract_full_code').val('');
        $('#search_customer_contract_date_start').val('');
        $('#search_customer_contract_date_end').val('');
        tableCustomerContract.api().ajax.reload();
    });
</script>
@include('admin.CustomerContract.Script.script_cancel')
@include('admin.CustomerContract.Script.script_customer_contract_edit')
@include('admin.CustomerContract.Script.script_customer_contract_view')
@include('admin.CustomerContract.Script.script_attach_contract')
@include('admin.CustomerContract.Script.script_view_driver')
@include('admin.CustomerContract.Script.script_view_driver_reject')
@include('admin.CustomerContract.Script.script_make_timesheet')
@include('admin.CustomerContract.Script.script_timesheet')
@include('admin.CustomerContract.Script.script_send_approve')
@include('admin.CustomerContract.Script.script_view_driver_porfile')
@endsection
