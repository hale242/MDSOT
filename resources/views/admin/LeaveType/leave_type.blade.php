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
                                    <label class="control-label">Type name</label>
                                    <input type="text" id="leave_type_name_search" name="head_documents_tax_id" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Number of leave</label>
                                    <input type="text" id="leave_type_date_define_search" name="head_documents_company_code" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Deduct wage?</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="head_documents_status_search_1" name="leave_type_deduct_status_search" value="1" class="custom-control-input search_table_check">
                                        <label class="custom-control-label" for="head_documents_status_search_1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="head_documents_status_search_0" name="leave_type_deduct_status_search" value="0" class="custom-control-input search_table_check">
                                        <label class="custom-control-label" for="head_documents_status_search_0">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
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
                    @if(App\Helper::CheckPermissionMenu('LeaveType' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">

                </div>
                <table id="tableLeaveType" class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 90px;">No</th>
                            <th scope="col">Type name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Number of leave</th>
                            <th scope="col">Deduct wage</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection @section('modal')
<div class="modal fade" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormAdd">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_name">Type name</label>
                                    <input type="text" class="form-control" id="add_leave_type_name" name="leave_type_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_leave_type_details" name="leave_type_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_date_define">Number of leave</label>
                                    <input type="number" class="form-control" id="add_leave_type_date_define" name="leave_type_date_define">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_working_time">ระยะเวลาทำงานที่จะได้วันหยุดพิเศษ (เก็บเป็นจำนวนเดือน)</label>
                                    <input type="number" class="form-control" id="add_leave_type_working_time" name="leave_type_working_time" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_date_define_per_working">วันหยุดพิเศษ</label>
                                    <input type="number" class="form-control" id="add_leave_type_date_define_per_working" name="leave_type_date_define_per_working" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="radio">Deduct wage?</label> <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="add_leave_type_deduct_status_0" name="leave_type_deduct_status" value="0" required="">
                                        <label class="custom-control-label" for="add_leave_type_deduct_status_0">No</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="add_leave_type_deduct_status_1" name="leave_type_deduct_status" value="1" required="">
                                        <label class="custom-control-label" for="add_leave_type_deduct_status_1">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_leave_type_status" name="leave_type_status" value="1">
                                        <label class="custom-control-label" for="add_leave_type_status">Action</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormEdit">
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_name">Type name</label>
                                    <input type="text" class="form-control" id="edit_leave_type_name" name="leave_type_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_leave_type_details" name="leave_type_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_date_define">Number of leave</label>
                                    <input type="number" class="form-control" id="edit_leave_type_date_define" name="leave_type_date_define" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_working_time">ระยะเวลาทำงานที่จะได้วันหยุดพิเศษ (เก็บเป็นจำนวนเดือน)</label>
                                    <input type="number" class="form-control" id="edit_leave_type_working_time" name="leave_type_working_time" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="leave_type_date_define_per_working">วันหยุดพิเศษ</label>
                                    <input type="number" class="form-control" id="edit_leave_type_date_define_per_working" name="leave_type_date_define_per_working" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="radio">Deduct wage?</label> <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="edit_leave_type_deduct_status_0" name="leave_type_deduct_status" value="0" required="">
                                        <label class="custom-control-label" for="edit_leave_type_deduct_status_0">No</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="edit_leave_type_deduct_status_1" name="leave_type_deduct_status" value="1" required="">
                                        <label class="custom-control-label" for="edit_leave_type_deduct_status_1">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_leave_type_status" name="leave_type_status" value="1">
                                        <label class="custom-control-label" for="edit_leave_type_status">Action</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Type name</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_leave_type_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_leave_type_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Number of leave</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_leave_type_date_define" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">ระยะเวลาทำงานที่จะได้วันหยุดพิเศษ (เก็บเป็นจำนวนเดือน)</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_leave_type_working_time" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">วันหยุดพิเศษ</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_leave_type_date_define_per_working" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Deduct wage?</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_leave_type_deduct_status" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_leave_type_status" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var tableLeaveType = $('#tableLeaveType').dataTable({
        "ajax": {
            "url": url_gb + "/admin/LeaveType/Lists",
            "type": "POST",
            "data": function(d) {
                d.leave_type_name = $('#leave_type_name_search').val();
                d.leave_type_date_define = $('#leave_type_date_define_search').val();
                d.leave_type_deduct_status = $("input[name='leave_type_deduct_status_search']:checked").val()
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
                "data": "leave_type_name",
                "class": "text-center"
            },
            {
                "data": "leave_type_details",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "leave_type_date_define",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "leave_type_deduct_status",
                "class": "text-center",
                "searchable": false,
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

    $('body').on('click', '.btn-add', function(data) {
        $('#add_leave_type_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/LeaveType/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $('#edit_leave_type_name').val(data.leave_type_name);
            $('#edit_leave_type_details').val(data.leave_type_details);
            $('#edit_leave_type_date_define').val(data.leave_type_date_define);
            $('#edit_leave_type_working_time').val(data.leave_type_working_time);
            $('#edit_leave_type_date_define_per_working').val(data.leave_type_date_define_per_working);
            $('#edit_leave_type_deduct_status_' + data.leave_type_deduct_status).prop('checked', true);
            if (data.leave_type_status == 1) {
                $('#edit_leave_type_status').prop('checked', true);
            } else {
                $('#edit_leave_type_status').prop('checked', false);
            }
            $('#ModalEdit').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/LeaveType/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if (data.leave_type_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            if (data.leave_type_deduct_status == 0) {
                leave_type = "No";
            }
            if (data.leave_type_deduct_status == 1) {
                leave_type = "Yes";
            }

            $('#show_leave_type_name').text(data.leave_type_name);
            $('#show_leave_type_details').text(data.leave_type_details);
            $('#show_leave_type_date_define').text(data.leave_type_date_define);
            $('#show_leave_type_working_time').text(data.leave_type_working_time);
            $('#show_leave_type_date_define_per_working').text(data.leave_type_date_define_per_working);
            $('#show_leave_type_deduct_status').text(leave_type);
            $('#show_leave_type_status').text(status);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.change-status', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/LeaveType/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableLeaveType.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/LeaveType",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableLeaveType.api().ajax.reload();
                $('#ModalAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/LeaveType/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableLeaveType.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
    $('body').on('click', '.btn-search', function(data) {
        tableLeaveType.api().ajax.reload();
    });


    $('body').on('click', '.btn-clear-search', function(data) {
        $("leave_type_name_search").val('');
        $("leave_type_date_define_search").val('');
        $("input[name='leave_type_deduct_status_search']:checked").val('');
        tableLeaveType.api().ajax.reload();
    });
</script>
@endsection