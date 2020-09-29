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
                                    <label class="control-label">Item code name</label>
                                    <input type="text" id="search_item_code_name" class="form-control search_table">
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
                    @if(App\Helper::CheckPermissionMenu('ItemCode' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableItemCode" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Item code name</th>
                                <th scope="col">Revenue status</th>
                                <th scope="col">Account code (revenue)</th>
                                <th scope="col">Pay status</th>
                                <th scope="col">Account code (pay)</th>
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
                                    <label for="item_code_name">Item code name</label>
                                    <input type="text" class="form-control" id="add_item_code_name" name="item_code_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="item_code_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_item_code_details" name="item_code_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Revenue status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input item_code_revenue_status" id="add_item_code_revenue_status" name="item_code_revenue_status" value="1">
                                        <label class="custom-control-label" for="add_item_code_revenue_status">Action</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Pay status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input item_code_pay_status" id="add_item_code_pay_status" name="item_code_pay_status" value="1">
                                        <label class="custom-control-label" for="add_item_code_pay_status">Action</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Account code</label>
                                    <select class="form-control custom-select select2 revenue_account_code_id" name="revenue_account_code_id" id="add_revenue_account_code_id" disabled>
                                        <option value="">----Selest----</option>
                                        @foreach($AccountCodes as $val)
                                        <option value="{{$val->account_code_id}}">{{$val->account_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Account code</label>
                                    <select class="form-control custom-select select2 pay_account_code_id" name="pay_account_code_id" id="add_pay_account_code_id" disabled>
                                        <option value="">----Selest----</option>
                                        @foreach($AccountCodes as $val)
                                        <option value="{{$val->account_code_id}}">{{$val->account_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_item_code_status" name="item_code_status" value="1">
                                        <label class="custom-control-label" for="add_item_code_status">Action</label>
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
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="item_code_name">Item code name</label>
                                    <input type="text" class="form-control" id="edit_item_code_name" name="item_code_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="item_code_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_item_code_details" name="item_code_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Revenue status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input item_code_revenue_status" id="edit_item_code_revenue_status" name="item_code_revenue_status" value="1">
                                        <label class="custom-control-label" for="edit_item_code_revenue_status">Action</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Pay status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input item_code_pay_status" id="edit_item_code_pay_status" name="item_code_pay_status" value="1">
                                        <label class="custom-control-label" for="edit_item_code_pay_status">Action</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Account code</label>
                                    <select class="form-control custom-select select2 revenue_account_code_id" name="revenue_account_code_id" id="edit_revenue_account_code_id" disabled>
                                        <option value="">----Selest----</option>
                                        @foreach($AccountCodes as $val)
                                        <option value="{{$val->account_code_id}}">{{$val->account_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Account code</label>
                                    <select class="form-control custom-select select2 pay_account_code_id" name="pay_account_code_id" id="edit_pay_account_code_id" disabled>
                                        <option value="">----Selest----</option>
                                        @foreach($AccountCodes as $val)
                                        <option value="{{$val->account_code_id}}">{{$val->account_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_item_code_status" name="item_code_status" value="1">
                                        <label class="custom-control-label" for="edit_item_code_status">Action</label>
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
                                        <label for="example-text-input" class="col-form-label">Item code name</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_item_code_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_item_code_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Revenue status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_item_code_revenue_status" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Account code (revenue)</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_revenue_account_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Pay status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_item_code_pay_status" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Account code (pay)</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_pay_account_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_item_code_status" class="col-form-label"></label>
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
    var tableItemCode = $('#tableItemCode').dataTable({
        "ajax": {
            "url": url_gb + "/admin/ItemCode/Lists",
            "type": "POST",
            "data": function(d) {
                d.item_code_name = $('#search_item_code_name').val();
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
                "sortable": false,
            },
            {
                "data": "item_code_name"
            },
            {
                "data": "item_code_revenue_status",
                "class": "text-center",
                "searchable": false
            },
            {
                "data": "revenue_account_code_name",
                "name": "account_code_revenue.account_code_name"
            },
            {
                "data": "item_code_pay_status",
                "class": "text-center",
                "searchable": false
            },
            {
                "data": "pay_account_code_name",
                "name": "account_code_revenue.account_code_name"
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
        tableItemCode.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_item_code_name').val('');
        tableItemCode.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#add_item_code_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/ItemCode/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $("#edit_item_code_name").val(data.item_code_name);
            $("#edit_item_code_details").val(data.item_code_details);
            $("#edit_revenue_account_code_id").val(data.revenue_account_code_id).change();
            $("#edit_pay_account_code_id").val(data.pay_account_code_id).change();
            if (data.item_code_revenue_status == 1) {
                $('#edit_item_code_revenue_status').prop('checked', true);
                $('#edit_revenue_account_code_id').prop('disabled', false);
            } else {
                $('#edit_item_code_revenue_status').prop('checked', false);
                $('#edit_revenue_account_code_id').prop('disabled', true);
            }
            if (data.item_code_pay_status == 1) {
                $('#edit_item_code_pay_status').prop('checked', true);
                $('#edit_pay_account_code_id').prop('disabled', false);
            } else {
                $('#edit_item_code_pay_status').prop('checked', false);
                $('#edit_pay_account_code_id').prop('disabled', true);
            }
            if (data.item_code_status == 1) {
                $('#edit_item_code_status').prop('checked', true);
            } else {
                $('#edit_item_code_status').prop('checked', false);
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
            url: url_gb + "/admin/ItemCode/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var revenue_account_code = data.account_code_revenue ? data.account_code_revenue.account_code_name : '';
            var pay_account_code = data.account_code_pay ? data.account_code_pay.account_code_name : '';
            var status = '';
            var pay_status = '';
            var revenue_status = '';
            if (data.item_code_revenue_status == 1) {
                revenue_status = "Active";
            } else {
                revenue_status = "No Active";
            }
            if (data.item_code_pay_status == 1) {
                pay_status = "Active";
            } else {
                pay_status = "No Active";
            }
            if (data.item_code_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $('#show_item_code_name').text(data.item_code_name);
            $('#show_item_code_details').text(data.item_code_details);
            $('#show_item_code_revenue_status').text(revenue_status);
            $('#show_revenue_account_code').text(revenue_account_code);
            $('#show_item_code_pay_status').text(pay_status);
            $('#show_pay_account_code').text(pay_account_code);
            $('#show_item_code_status').text(status);
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
            url: url_gb + "/admin/ItemCode/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableItemCode.api().ajax.reload();
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
            url: url_gb + "/admin/ItemCode",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableItemCode.api().ajax.reload();
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
            url: url_gb + "/admin/ItemCode/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableItemCode.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.item_code_revenue_status', function(data) {
        var ele = $(this);
        var revenue_status = ele.closest('.form-row').find('.item_code_revenue_status');
        if (revenue_status.is(':checked')) {
            ele.closest('.form-row').find('.revenue_account_code_id').prop('disabled', false);
        } else {
            ele.closest('.form-row').find('.revenue_account_code_id').prop('disabled', true);
            ele.closest('.form-row').find('.revenue_account_code_id').val('').change();
        }
    });
    $('body').on('change', '.item_code_pay_status', function(data) {
        var ele = $(this);
        var pay_status = ele.closest('.form-row').find('.item_code_pay_status');
        if (pay_status.is(':checked')) {
            ele.closest('.form-row').find('.pay_account_code_id').prop('disabled', false);
        } else {
            ele.closest('.form-row').find('.pay_account_code_id').prop('disabled', true);
            ele.closest('.form-row').find('.pay_account_code_id').val('').change();
        }
    });
</script>
@endsection