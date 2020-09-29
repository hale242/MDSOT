@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Company</label>
                            <select class="form-control custom-select select2 select_company_id" id="search_company_id">
                                <option value="">----Select----</option>
                                @foreach($Companies as $val)
                                    <option value="{{$val->company_id}}">{{$val->company_name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Contact info</label>
                            <select class="form-control custom-select select2 select_customer_id" id="search_customer_id">
                                <option value="">----Select----</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Sales</label>
                            <select class="form-control custom-select select2" id="search_admin_id">
                                <option value="">----Select----</option>
                                @foreach($AdminUsers as $val)
                                    <option value="{{$val->admin_id}}">{{$val->first_name.' '.$val->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Quotation full code</label>
                            <input type="text" id="search_quotation_full_code" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input type="text" id="search_quotation_title" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control custom-select select2" id="search_quotation_status">
                                <option value="">----Select----</option>
                                @foreach($Status as $key=>$val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Creation date</label>
                            <input type="date" id="search_quotation_date_doc" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Due date</label>
                            <input type="date" id="search_quotation_due_date" class="form-control">
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
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Quotation</h4>
                    <a href="{{url('admin/Quotation/create')}}" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right">Add New</a>
                    <div class="table-responsive">
                        <table id="tableQuotation" class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 90px;">Actions</th>
                                    <th scope="row">No.</th>
                                    <th scope="row">Quotation full code</th>
                                    <th scope="row">Company</th>
                                    <th scope="row">Contact info</th>
                                    <th scope="row">Line Approve</th>
                                    <th scope="row">Title</th>
                                    <th scope="row">Price</th>
                                    <th scope="row">Creation date</th>
                                    <th scope="row">Due date</th>
                                    <th scope="row">Sales</th>
                                    <th scope="row">Pre approve</th>
                                    <th scope="row">Status</th>
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
@include('admin.Quotation.Modal.modal_pre_approve_view')
@include('admin.Quotation.Modal.modal_pre_approve_detail')
@include('admin.Quotation.Modal.modal_pre_approve_file')
@include('admin.Quotation.Modal.modal_confirm_letter')
@include('admin.PreApprove.Modal.modal_lineapprove')
@include('admin.Quotation.Modal.modal_grouping')
@include('admin.Quotation.Modal.modal_grouping_driver')
@endsection
@section('scripts')
<script>
    var tableQuotation = $('#tableQuotation').dataTable({
        "ajax": {
            "url": url_gb+"/admin/Quotation/Lists",
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
            $(".change-status-select2").select2();
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
            {"data" : "quotation_full_code"},
            {"data" : "company_name_th", "name":"company.company_name_th"},
            {"data" : "customer_name", "name":"customer.customer_name"},
            {"data" : "line_approve", "class":"text-center" , "searchable": false, "sortable": false},
            {"data" : "quotation_title"},
            {"data" : "quotation_price", "class":"text-right" , "searchable": false},
            {"data" : "quotation_date_doc", "class":"text-center" , "searchable": false},
            {"data" : "quotation_due_date", "class":"text-center" , "searchable": false},
            {"data" : "admin_name", "name":"admin_user.first_name"},
            {"data" : "pre_approve", "class":"text-center" , "searchable": false, "sortable": false},
            {"data" : "quotation_status", "class":"text-center" , "searchable": false, "sortable": false},
            
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
        tableQuotation.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function(data) {
        $('#search_company_id').val('').change();
        $('#search_customer_id').val('').change();
        $('#search_admin_id').val('').change();
        $('#search_quotation_full_code').val('');
        $('#search_quotation_title').val('');
        $('#search_quotation_status').val('');
        $('#search_quotation_date_doc').val('');
        $('#search_quotation_due_date').val('');
        tableQuotation.api().ajax.reload();
    });

    $('body').on('change','.change-quotation-status',function(data){
        var id = $(this).data('id');
        var status = $(this).val();
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/Quotation/ChangeStatus/"+id,
            data: {
                id: id,
                status: status,
            }
        }).done(function(res) {
            if (res.status == 1) {

            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $(document).ready(function(){
      	$(".tab-wizard").steps({
        		headerTag: "h6",
        		bodyTag: "section",
        		transitionEffect: "fade",
        		titleTemplate: '<span class="step">#index#</span> #title#',
        		labels: {
        			   finish: "Submit"
        		},
        		onFinished: function(event, currentIndex) {
        			   swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
        		}
      	});
        $("a[href*='#finish']").remove();
    });
</script>
@include('admin.Quotation.Script.script_calculate')
@include('admin.Quotation.Script.script_pre_approve_view')
@include('admin.Quotation.Script.script_pre_approve_detail')
@include('admin.Quotation.Script.script_pre_approve_file')
@include('admin.Quotation.Script.script_confirm_letter')
@include('admin.Quotation.Script.script_send_pre_approve')
@include('admin.PreApprove.Script.script_lineapprove')
@include('admin.Quotation.Script.script_grouping')
@include('admin.Quotation.Script.script_grouping_driver')
@endsection
