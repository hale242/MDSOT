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
                                <label class="control-label" for="sale_team_main_id">Team</label>
                                <input type="text" id="sale_team_main_name_search" name="sale_team_main_id" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="manager_admin_id">Manager</label>
                                <!-- <input type="text" id="manager_name_search" name="manager_admin_id" class="form-control search_table" > -->
                                <select class="form-control custom-select select-team-add select2" id="manager_name_search">
                                    <option value="">Select Manager</option>
                                    @foreach($AdminUsers as $SaleUser)
                                    <option value="{{ $SaleUser->admin_id }}">{{ $SaleUser->first_name }} {{ $SaleUser->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sale_team_sub_name">Area</label>
                                <input type="text" id="sale_team_sub_name_search" name="sale_team_sub_name" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sale_admin_id">Sale</label>
                                <!-- <input type="text" id="sale_name_search" name="sale_admin_id" class="form-control search_table"> -->
                                <select class="form-control custom-select select-team-add select2" id="sale_name_search">
                                    <option value="">Select Sale</option>
                                    @foreach($AdminUsers as $SaleUser)
                                    <option value="{{ $SaleUser->admin_id }}">{{ $SaleUser->first_name }} {{ $SaleUser->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
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
                    @if(App\Helper::CheckPermissionMenu('SaleArea' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableSaleArea" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Team</th>
                                <th scope="col">Manager</th>
                                <th scope="col">Area</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
@include('admin.SaleArea.Modal.modal_sale_user')

<div class="modal fade" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormAdd">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body address">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="sale_team_main_id">Team</label>
                                    <select class="form-control custom-select select-team-add select2" id="add_sale_team_main_id" name="sale_team_main_id" required>
                                        <option value="">Select Team</option>
                                        @foreach($SaleManagers as $val)
                                        <option value="{{$val->sale_team_main_id}}">{{$val->sale_team_main_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="admin_name">Manager</label>
                                    <select class="form-control custom-select select_manager-add select2" multiple="" style="height: 36px;width: 100%;" id="add_manager_id" name="manager[]" placeholder="Select" required>
                                    </select>
                                    <input type="hidden" id="manager_selected" value="0">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sale_team_sub_name">Area</label>
                                    <input type="text" class="form-control" id="add_sale_team_sub_name" name="sale_team_sub_name" value="" required="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="admin_id">Sales</label>
                                        <select class="select2 form-control custom-select select2-hidden-accessible" multiple="" style="height: 36px;width: 100%;" id="admin_id" name="admin_id[]" laceholder="Select" required>
                                            @foreach($AdminUsers as $val)
                                            <option value="{{$val->admin_id}}">{{$val->first_name}} {{$val->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sale_team_sub_details">Details</label>
                                    <input type="text" class="form-control" id="add_sale_team_sub_details" name="sale_team_sub_details" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_sale_team_sub_status" name="sale_team_sub_status" value="1">
                                        <label class="custom-control-label" for="add_sale_team_sub_status">Active</label>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormEdit">
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body address">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="sale_team_main_id">Team</label>
                                    <select class="form-control custom-select select-team-edit select2" id="edit_sale_team_main_id" name="sale_team_main_id" required>
                                        <option value="">Select Team</option>
                                        @foreach($SaleManagers as $val)
                                        <option value="{{$val->sale_team_main_id}}">{{$val->sale_team_main_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="edit_admin_name">Manager</label>
                                    <select class="form-control custom-select select_manager-edit select2" multiple="" style="height: 36px;width: 100%;" id="edit_manager" name="manager[]" placeholder="Select" required>

                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sale_team_sub_name">Area</label>
                                    <input type="text" class="form-control" id="edit_sale_team_sub_name" name="sale_team_sub_name" value="" required="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="edit_sale_id">Sales</label>
                                        <select class="select2 form-control custom-select select2-hidden-accessible" multiple="" style="height: 36px;width: 100%;" id="edit_admin_sale" name="admin_id[]" placeholder="Select" required>
                                            @foreach($AdminUsers as $val)
                                            <option value="{{$val->admin_id}}">{{$val->first_name}} {{$val->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sale_team_sub_details">Details</label>
                                    <input type="text" class="form-control" id="edit_sale_team_sub_details" name="sale_team_sub_details" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_sale_team_sub_status" name="sale_team_sub_status" value='1'>
                                        <label class="custom-control-label" for="edit_sale_team_sub_status">Active</label>
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
                                        <label for="example-text-input" id="show_team" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Manager</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_manager" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Area</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_sub_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_sub_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Sale</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_sale_team_sub_status" class="col-form-label"></label>
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
<div class="modal fade show" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Sale user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormAddUser">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body address1">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="admin_id_A">Sales</label>
                                    <select class="form-control custom-select select_add_user select2" multiple="" style="height: 36px;width: 100%;" id="add_user_admin_id" name="admin_id[]" required="" data-select2-id="admin_id_A" tabindex="-1" aria-hidden="true">

                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="sale_team_sub_status" name="sale_team_sub_status" value="1">
                                        <label class="custom-control-label" for="sale_team_sub_status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <input type="hidden" id="add_user_sale_team_sub_id">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    var tableSaleArea = $('#tableSaleArea').dataTable({
        "ajax": {
            "url": url_gb + "/admin/SaleArea/Lists",
            "type": "POST",
            "data": function(d) {
                d.sale_team_main_name = $('#sale_team_main_name_search').val();
                d.sale_team_sub_name = $('#sale_team_sub_name_search').val();
                d.manager = $('#manager_name_search').val();
                d.sale = $('#sale_name_search').val();
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
                "data": "manager",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "sale_team_sub_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "sale_team_sub_details",
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
        $('#add_sale_team_sub_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/SaleArea/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var Sale_List = [];
            var Manager_List = [];
            $.each(data.sale_team_sub_has_admin_user, function(k, v) {
                if (v.sale_team_sub_has_admin_user_status == 1 || v.sale_team_sub_has_admin_user_status == 0) {
                    $.each(v.admin_user, function(key, val) {
                        Sale_List[k] = val.admin_id;
                    });
                }
                if (v.sale_team_sub_has_admin_user_status == 2) {
                    $.each(v.admin_user, function(key, val) {
                        Manager_List[k] = val.admin_id;
                    });
                }
            });
            $("#edit_sale_team_sub_name").val(data.sale_team_sub_name);
            $("#edit_sale_team_sub_details").val(data.sale_team_sub_details);
            $("#edit_sale_team_main_id").val(data.sale_team_main_id).change();
            $('#edit_sale').val(Sale_List);
            $('#manager_selected').val(Manager_List);

            if (data.sale_team_sub_status == 1) {
                $('#edit_sale_team_sub_status').prop('checked', true);
            } else {
                $('#edit_sale_team_sub_status').prop('checked', false);
            }
            // console.log(Manager_List);
            $('#edit_admin_sale').val(Sale_List);
            $('#edit_admin_sale').trigger('change');

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
            url: url_gb + "/admin/SaleArea/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';

            if (data.sale_team_sub_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }

            var team = '';
            var manager_list = [];
            var sale_list = [];
            $.each(data.sale_manager, function(k, v) {
                team = v.sale_team_main_name;
            });

            $.each(data.sale_team_sub_has_admin_user, function(k, v) {
                if (v.sale_team_sub_has_admin_user_status == 2) {
                    $.each(v.admin_user, function(key, val) {
                        var name = val.first_name + ' ' + val.last_name;
                        manager_list.push(name);
                    });
                }
            });
            $.each(data.sale_team_sub_has_admin_user, function(k, v) {
                if (v.sale_team_sub_has_admin_user_status == 1 || v.sale_team_sub_has_admin_user_status == 0) {
                    $.each(v.admin_user, function(key, val) {
                        var name = val.first_name + ' ' + val.last_name;
                        sale_list.push(name);
                    });
                }
            });

            $('#show_sale_team_sub_name').text(data.sale_team_sub_name);
            $('#show_sale_team_sub_details').text(data.sale_team_sub_details);
            $('#show_team').text(team);
            $('#show_manager').text(manager_list.toString());
            $('#show_sale').text(sale_list.toString());

            $('#show_sale_team_sub_status').text(status);
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
            url: url_gb + "/admin/SaleArea/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableSaleArea.api().ajax.reload();
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
            url: url_gb + "/admin/SaleArea",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableSaleArea.api().ajax.reload();
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
            url: url_gb + "/admin/SaleArea/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableSaleArea.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.select-team-add', function() {
        var ele = $(this).closest('.address');
        var id = $(this).val();
        ele.find('.select_manager-add').html('');

        if (id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/SaleArea/GetManager/" + id,
                dataType: 'json',
            }).done(function(res) {
                var html = '';
                $.each(res, function(k, v) {
                    $.each(v.admin_user, function(key, val) {
                        html += '<option value="' + val.admin_id + '">' + val.first_name + ' ' + val.last_name + '</option>';
                    });
                });
                ele.find('.select_manager-add').append(html);
                ele.find('.select_manager-add').select2('destroy').select2();

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('change', '.select-team-edit', function() {
        var ele = $(this).closest('.address');
        var id = $(this).val();
        ele.find('.select_manager-edit').html('');

        if (id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/SaleArea/GetManager/" + id,
                dataType: 'json',
            }).done(function(res) {
                var html = '';
                $.each(res, function(k, v) {
                    $.each(v.admin_user, function(key, val) {
                        html += '<option value="' + val.admin_id + '">' + val.first_name + ' ' + val.last_name + '</option>';
                        console.log(val.admin_id);
                    });
                });
                ele.find('.select_manager-edit').append(html);
                ele.find('.select_manager-edit').select2('destroy').select2();
                var manager_selected_array = [];

                manager_selected = $('#manager_selected').val();

                var manager_selected_array = manager_selected.split(',');

                $('#edit_manager').val(manager_selected_array);
                $('#edit_manager').trigger('change');
            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('click', '.btn-add_user', function() {
        var id = $(this).data('id');
        $('#add_user_sale_team_sub_id').val(id);
        $('#AddUserModal').modal('show');
        $('.select_add_user').html('');

        if (id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/SaleArea/GetAddUser/" + id,
                dataType: 'json',
            }).done(function(res) {
                var html = '';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.admin_id + '">' + v.first_name + ' ' + v.last_name + '</option>';
                });
                $('.select_add_user').append(html);
                $('.select_add_user').select2('destroy').select2();
            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('submit', '#FormAddUser', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#add_user_sale_team_sub_id').val();

        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "",
            url: url_gb + "/admin/SaleArea/AddUser/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableSaleArea.api().ajax.reload();
                $('#AddUserModal').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-search', function(data) {
        tableSaleArea.api().ajax.reload();
    });
    $('body').on('click', '.btn-clear-search', function(data) {
        $('#sale_team_main_name_search').val('');
        $('#sale_team_sub_name_search').val('');
        $('#manager_name_search').val('').change();;
        $('#sale_name_search').val('').change();
        tableSaleArea.api().ajax.reload();
    });
</script>
@include('admin.SaleArea.Script.script_sale_user')
@endsection