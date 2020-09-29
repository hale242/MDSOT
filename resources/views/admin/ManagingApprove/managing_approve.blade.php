@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <button id="swapSearch" type="button" class="btn btn-outline-secondary m-t-10 mb-0 mr-1 float-right newdata showSerach showSearch" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                    <span class="ti-angle-down"></span>
                </button>
                <div class="collapse" id="collapseExample">
                    <form id="FormSearch">
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Admin</label>
                                    <select class="form-control custom-select search_table_select select2" id="search_admin_id" data-placeholder="Select Position">
                                        <option value="">Select Admin</option>
                                        @foreach($AdminUsers as $val)
                                        <option value="{{$val->admin_id}}">{{$val->first_name.' '.$val->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Level</label>
                                    <input type="number" id="search_interview_managing_approve_lv" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Next level approval day</label>
                                    <input type="number" id="search_interview_managing_approve_date_next" class="form-control search_table">
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
                    @if(App\Helper::CheckPermissionMenu('ManagingApprove' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableManagingApprove" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Level</th>
                                <th scope="col">Next level approval day</th>
                                <th scope="col">Comment</th>
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
            <form id="FormAdd" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="add_admin_id">Admin</label>
                                    <select class="form-control custom-select search_table_select select2" name="admin_id" id="add_admin_id" data-placeholder="Select Position">
                                        <option value="">Select Admin</option>
                                        @foreach($AdminUsers as $val)
                                        <option value="{{$val->admin_id}}">{{$val->first_name.' '.$val->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="add_interview_managing_approve_lv">Level</label>
                                    <input type="number" class="form-control" id="add_interview_managing_approve_lv" name="interview_managing_approve_lv">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="add_interview_managing_approve_date_next">Next level approval day</label>
                                    <input type="number" class="form-control" id="add_interview_managing_approve_date_next" name="interview_managing_approve_date_next">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="add_interview_managing_approve_comment">Comment</label>
                                    <textarea cols="80" class="form-control" id="add_interview_managing_approve_comment" name="interview_managing_approve_comment" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_interview_managing_approve_status" name="interview_managing_approve_status" value="1" checked>
                                        <label class="custom-control-label" for="add_interview_managing_approve_status">Action</label>
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
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="add_admin_id">Admin</label>
                                    <select class="form-control custom-select search_table_select select2" name="admin_id" id="edit_admin_id" data-placeholder="Select Position">
                                        <option value="">Select Admin</option>
                                        @foreach($AdminUsers as $val)
                                        <option value="{{$val->admin_id}}">{{$val->first_name.' '.$val->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_interview_managing_approve_lv">Level</label>
                                    <input type="number" class="form-control" id="edit_interview_managing_approve_lv" name="interview_managing_approve_lv">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_interview_managing_approve_date_next">Next level approval day</label>
                                    <input type="number" class="form-control" id="edit_interview_managing_approve_date_next" name="interview_managing_approve_date_next">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_interview_managing_approve_comment">Comment</label>
                                    <textarea cols="80" class="form-control" id="edit_interview_managing_approve_comment" name="interview_managing_approve_comment" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_interview_managing_approve_status" name="interview_managing_approve_status" value="1" checked>
                                        <label class="custom-control-label" for="add_interview_managing_approve_status">Action</label>
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
                                        <label for="example-text-input" class="col-form-label">Admin</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_admin_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Level</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_interview_managing_approve_lv" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Next level approval day</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_interview_managing_approve_date_next" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Comment</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_interview_managing_approve_comment" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_interview_managing_approve_status" class="col-form-label"></label>
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
    var tableManagingApprove = $('#tableManagingApprove').dataTable({
        "ajax": {
            "url": url_gb + "/admin/ManagingApprove/Lists",
            "type": "POST",
            "data": function(d) {
                d.admin_id = $('#search_admin_id').val();
                d.interview_managing_approve_lv = $('#search_interview_managing_approve_lv').val();
                d.interview_managing_approve_date_next = $('#search_interview_managing_approve_date_next').val();
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
            },            {
                "data": "DT_RowIndex",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "admin_name",
                "name": "admin_user.first_name"
            },
            {
                "data": "interview_managing_approve_lv",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "interview_managing_approve_date_next",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "interview_managing_approve_comment",
                "searchable": false,
                "sortable": false,
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
        tableManagingApprove.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/ManagingApprove/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $("#edit_admin_id").val(data.admin_id).change();
            $("#edit_interview_managing_approve_lv").val(data.interview_managing_approve_lv);
            $("#edit_interview_managing_approve_date_next").val(data.interview_managing_approve_date_next);
            $("#edit_interview_managing_approve_comment").val(data.interview_managing_approve_comment);
            if (data.interview_managing_approve_status == 1) {
                $('#edit_interview_managing_approve_status').prop('checked', true);
            } else {
                $('#edit_interview_managing_approve_status').prop('checked', false);
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
            url: url_gb + "/admin/ManagingApprove/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var admin_name = data.admin_user ? data.admin_user.first_name + ' ' + data.admin_user.last_name : '';
            var status = '';
            if (data.interview_managing_approve_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $('#show_admin_name').text(admin_name);
            $('#show_interview_managing_approve_lv').text(data.interview_managing_approve_lv);
            $('#show_interview_managing_approve_date_next').text(data.interview_managing_approve_date_next);
            $('#show_interview_managing_approve_comment').text(data.interview_managing_approve_comment);
            $('#show_interview_managing_approve_status').text(status);
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
            url: url_gb + "/admin/ManagingApprove/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableManagingApprove.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/ManagingApprove",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableManagingApprove.api().ajax.reload();
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
            url: url_gb + "/admin/ManagingApprove/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableManagingApprove.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_admin_id').val('').change();
        $('#search_interview_managing_approve_lv').val('');
        $('#search_interview_managing_approve_date_next').val('');
        tableManagingApprove.api().ajax.reload();
    });
</script>
@endsection