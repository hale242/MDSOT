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
                                    <label class="control-label" for="sale_team_main_id">Team</label>
                                    <input type="text" id="sale_team_main_name_search" name="sale_team_main_name" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="admin_id">Manager</label>
                                    <input type="text" id="manager_search" name="admin_id" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="admin_id">Sale</label>
                                    <input type="text" id="sale_search" name="admin_id" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                        <button type="button" class="btn btn-secondary btn-clear-search">Clear</button>
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
                    @if(App\Helper::CheckPermissionMenu('SaleManager' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableSaleManager" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Team</th>
                                <th scope="col">Details</th>
                                <th scope="col">Account code</th>
                                <th scope="col">Book bank code</th>
                                <th scope="col">Branch code</th>
                                <th scope="col">Manager</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
@include('admin.SaleManager.Modal.modal_sale_team')
@include('admin.SaleManager.Modal.modal_sale_user')

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
                                    <label for="sale_team_main_name">Team</label>
                                    <input type="text" class="form-control" id="add_sale_team_main_name" name="sale_team_main_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_main_details">Details</label>
                                    <input type="text" class="form-control" id="add_sale_team_main_details" name="sale_team_main_details" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_main_acc_code">Account code</label>
                                    <input type="text" class="form-control" id="add_sale_team_main_acc_code" name="sale_team_main_acc_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_main_book_code">Book bank code</label>
                                    <input type="text" class="form-control" id="add_sale_team_main_book_code" name="sale_team_main_book_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_main_branch_code">Branch code</label>
                                    <input type="text" class="form-control" id="add_sale_team_main_branch_code" name="sale_team_main_branch_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="admin_id">Manager</label>
                                        <select class="select2 form-control custom-select select2-hidden-accessible" multiple="" style="height: 36px;width: 100%;" id="admin_id" name="admin_id[]" required="" placeholder="Select" data-select2-id="admin_name" tabindex="-1" aria-hidden="true">
                                            @foreach($AdminUsers as $val)
                                            <option value="{{$val->admin_id}}">{{$val->first_name}} {{$val->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_sale_team_main_status" name="sale_team_main_status" value="1">
                                        <label class="custom-control-label" for="add_sale_team_main_status">Action</label>
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
                                    <label for="sale_team_main_name">Team</label>
                                    <input type="text" class="form-control" id="edit_sale_team_main_name" name="sale_team_main_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_main_details">Details</label>
                                    <input type="text" class="form-control" id="edit_sale_team_main_details" name="sale_team_main_details" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_main_acc_code">Account code</label>
                                    <input type="text" class="form-control" id="edit_sale_team_main_acc_code" name="sale_team_main_acc_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_main_book_code">Account book</label>
                                    <input type="text" class="form-control" id="edit_sale_team_main_book_code" name="sale_team_main_book_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_main_branch_code">Branch code</label>
                                    <input type="text" class="form-control" id="edit_sale_team_main_branch_code" name="sale_team_main_branch_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="admin_name">Manager</label>
                                    <select class="select2 form-control custom-select" multiple="multiple" style="height: 36px;width: 100%;" id="edit_admin_id" name="admin_id[]" placeholder="Select" required>
                                        @foreach($AdminUsers as $val)
                                        <option value="{{$val->admin_id}}">{{$val->first_name}} {{$val->last_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_sale_team_main_status" name="sale_team_main_status" value="1">
                                        <label class="custom-control-label" for="edit_sale_team_main_status">Action</label>
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
                                        <label for="example-text-input" class="col-form-label">Team</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_main_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_main_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Account code</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_main_acc_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Account book</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_main_book_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Branch code</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_main_branch_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Manager</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_manager_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_main_status" class="col-form-label"></label>
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
    var tableSaleManager = $('#tableSaleManager').dataTable({
        "ajax": {
            "url": url_gb + "/admin/SaleManager/Lists",
            "type": "POST",
            "data": function(d) {
                d.sale_team_main_name = $('#sale_team_main_name_search').val()
                d.manager_name = $('#manager_search').val()
                d.sale_name = $('#sale_search').val()
                // d.custom = $('#myInput').val();
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
                "data": "sale_team_main_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "sale_team_main_details",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "sale_team_main_acc_code",
                "class": "text-center"
            },
            {
                "data": "sale_team_main_book_code",
                "class": "text-center"
            },
            {
                "data": "sale_team_main_branch_code",
                "class": "text-center"
            },
            {
                "data": "manager",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
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
        $('#add_sale_team_main_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/SaleManager/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;

            // console.log(data);
            var SelectAllAdmin = new Array();
            $("#edit_sale_team_main_name").val(data.sale_team_main_name);
            $("#edit_sale_team_main_details").val(data.sale_team_main_details);
            $("#edit_sale_team_main_acc_code").val(data.sale_team_main_acc_code);
            $("#edit_sale_team_main_book_code").val(data.sale_team_main_book_code);
            $("#edit_sale_team_main_branch_code").val(data.sale_team_main_branch_code);
            if (data.sale_team_main_status == 1) {
                $('#edit_sale_team_main_status').prop('checked', true);
            } else {
                $('#edit_sale_team_main_status').prop('checked', false);
            }
            $.each(data.sale_team_sub_has_admin_user, function(k, v) {
                if (v.sale_team_sub_has_admin_user_status == 2 && v.sale_team_sub_id == null) {
                    SelectAllAdmin[k] = v.admin_id;
                }
            });
            $('#edit_admin_id').val(SelectAllAdmin);
            $('#edit_admin_id').trigger('change');

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
            url: url_gb + "/admin/SaleManager/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            var sale_name = [];
            $.each(data.sale_team_sub_has_admin_user, function(k, v) {
                if (v.sale_team_sub_has_admin_user_status == 2 && v.sale_team_sub_id == null) {
                    $.each(v.admin_user, function(key, val) {
                        var name = val.first_name + ' ' + val.last_name;
                        sale_name.push(name);
                    });
                }
            });
            if (data.sale_team_main_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $('#show_sale_team_main_name').text(data.sale_team_main_name);
            $('#show_sale_team_main_details').text(data.sale_team_main_details);
            $('#show_sale_team_main_acc_code').text(data.sale_team_main_acc_code);
            $('#show_sale_team_main_book_code').text(data.sale_team_main_book_code);
            $("#show_sale_team_main_branch_code").text(data.sale_team_main_branch_code);
            $('#show_sale_manager_name').html(sale_name.toString());
            $('#show_sale_team_main_status').text(status);
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
            url: url_gb + "/admin/SaleManager/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableSaleManager.api().ajax.reload();
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
            url: url_gb + "/admin/SaleManager",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableSaleManager.api().ajax.reload();
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
            url: url_gb + "/admin/SaleManager/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableSaleManager.api().ajax.reload();
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
        tableSaleManager.api().ajax.reload();
    });
    $('body').on('click', '.btn-clear-search', function(data) {
        $('#sale_team_main_name_search').val('');
        $('#manager_search').val('');
        $('#sale_search').val('');
        tableSaleManager.api().ajax.reload();
    });
</script>
@include('admin.SaleManager.Script.script_sale_team')
@include('admin.SaleManager.Script.script_sale_user')
@endsection