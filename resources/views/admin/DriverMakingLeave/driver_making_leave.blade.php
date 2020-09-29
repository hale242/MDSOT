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
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Driver</label>
                                <select class="form-control custom-select  select2" id="search_driver_id">
                                    <option value="">----Select----</option>
                                    @foreach($Drivers as $Driver)
                                    <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Leave type</label>
                                <select class="form-control custom-select  select2" id="search_leave_type_id">
                                    <option value="">----Select----</option>
                                    @foreach($LeaveTypes as $LeaveType)
                                    <option value="{{ $LeaveType->leave_type_id }}">{{ $LeaveType->leave_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Branch name</label>
                                <select class="form-control custom-select  select2" id="search_driver_leave_line_branch_id">
                                    <option value="">----Select----</option>
                                    @foreach($DriverLeaveLineBranchs as $val)
                                    <option value="{{ $val->driver_leave_line_branch_id }}">{{ $val->driver_leave_line_branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Leave name</label>
                                <input type="text" id="search_driver_making_leave_name" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Start leave date</label>
                                <input type="date" id="search_driver_making_leave_start_date" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">End leave date</label>
                                <input type="date" id="search_driver_making_leave_end_date" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Number of leave days</label>
                                <input type="number" id="search_driver_making_leave_count_date" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Days of leave approval</label>
                                <input type="date" id="search_driver_making_leave_date_approve" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Type</label>
                                <select class="form-control custom-select  select2" id="search_driver_making_leave_type">
                                    <option value="">----Select----</option>
                                    <option value="1">ลาเต็มวัน</option>
                                    <option value="2">ลาครึ่งวันเช้า</option>
                                    <option value="3">ลาครึ่งวันบ่าย</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control custom-select  select2" id="search_driver_making_leave_status">
                                    <option value="">----Select----</option>
                                    <option value="0">รออนุมัติ</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ส่งกลับแก้ไข</option>
                                    <option value="8">ยกเลิกการลา</option>
                                    <option value="9">ไม่อนุมัติ</option>
                                </select>
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
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
                    @if(App\Helper::CheckPermissionMenu('DriverMakingLeave' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableDriverMakingLeave" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Driver Lastname</th>
                                <th scope="col">Leave type</th>
                                <th scope="col">Type</th>
                                <th scope="col">Branch name</th>
                                <th scope="col">Leave name</th>
                                <th scope="col">Start leave date</th>
                                <th scope="col">End leave date</th>
                                <th scope="col">Number of leave days</th>
                                <th scope="col">Days of leave approval</th>
                                <th scope="col">Status</th>
                                <th scope="col">Line approve</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
@include('admin.DriverMakingLeave.Modal.modal_driver_making_leave_add')
@include('admin.DriverMakingLeave.Modal.modal_driver_making_leave_edit')
@include('admin.DriverMakingLeave.Modal.modal_driver_making_leave_view')
@include('admin.DriverMakingLeave.Modal.modal_line_approve')
@endsection
@section('scripts')
<script>
    var tableDriverMakingLeave = $('#tableDriverMakingLeave').dataTable({
        "ajax": {
            "url": url_gb + "/admin/DriverMakingLeave/Lists",
            "type": "POST",
            "data": function(d) {
                d.driver_id = $('#search_driver_id').val();
                d.leave_type_id = $('#search_leave_type_id').val();
                d.driver_leave_line_branch_id = $('#search_driver_leave_line_branch_id').val();
                d.driver_making_leave_name = $('#search_driver_making_leave_name').val();
                d.driver_making_leave_start_date = $('#search_driver_making_leave_start_date').val();
                d.driver_making_leave_end_date = $('#search_driver_making_leave_end_date').val();
                d.driver_making_leave_count_date = $('#search_driver_making_leave_count_date').val();
                d.driver_making_leave_date_approve = $('#search_driver_making_leave_date_approve').val();
                d.driver_making_leave_type = $('#search_driver_making_leave_type').val();
                d.driver_making_leave_status = $('#search_driver_making_leave_status').val();
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
                "sortable": false
            },
            {
                "data": "driver_name",
                "name": "driver.driver_name_th"
            },
            {
                "data": "driver_lastname_th",
                "name": "driver.driver_lastname_th",
                "visible": false
            },
            {
                "data": "leave_type_name",
                "name": "leave_type.leave_type_name"
            },
            {
                "data": "type_name",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "driver_leave_line_branch_name",
                "name": "driver_leave_line_branch.driver_leave_line_branch_name"
            },
            {
                "data": "driver_making_leave_name"
            },
            {
                "data": "driver_making_leave_start_date",
                "class": "text-center",
                "searchable": false
            },
            {
                "data": "driver_making_leave_end_date",
                "class": "text-center",
                "searchable": false
            },
            {
                "data": "driver_making_leave_count_date",
                "class": "text-center"
            },
            {
                "data": "driver_making_leave_date_approve",
                "class": "text-center",
                "searchable": false
            },
            {
                "data": "status_name",
                "class": "text-center",
                "searchable": false
            },
            {
                "data": "line_approve",
                "name": "line_approve",
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
        tableDriverMakingLeave.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_driver_id').val('').change();
        $('#search_leave_type_id').val('').change();
        $('#search_driver_leave_line_branch_id').val('').change();
        $('#search_driver_making_leave_name').val('');
        $('#search_driver_making_leave_start_date').val('');
        $('#search_driver_making_leave_end_date').val('');
        $('#search_driver_making_leave_count_date').val('');
        $('#search_driver_making_leave_date_approve').val('');
        $('#search_driver_making_leave_type').val('').change();
        $('#search_driver_making_leave_status').val('').change();
        tableDriverMakingLeave.api().ajax.reload();
    });
</script>
@include('admin.DriverMakingLeave.Script.script_calculate_count_leave')
@include('admin.DriverMakingLeave.Script.script_driver_making_leave_add')
@include('admin.DriverMakingLeave.Script.script_driver_making_leave_edit')
@include('admin.DriverMakingLeave.Script.script_driver_making_leave_view')
@include('admin.DriverMakingLeave.Script.script_line_approve')
@endsection