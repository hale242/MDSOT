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
                                <select class="form-control custom-select select-team select2" id="sale_team_main_name_search">
                                    <option value="">Select Team</option>
                                    @if($SaleManagers)
                                    @foreach($SaleManagers as $val)
                                    <option value="{{$val->sale_team_main_id}}">{{$val->sale_team_main_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="manager_admin_id">Manager</label>
                                <!-- <input type="text" id="manager_name_search" name="manager_admin_id" class="form-control search_table" > -->
                                <select class="form-control custom-select select-team-add select2" id="manager_name_search">
                                    <option value="">Select Manager</option>
                                    @if($AdminUsers)
                                    @foreach($AdminUsers as $SaleUser)
                                    <option value="{{ $SaleUser->admin_id }}">{{ $SaleUser->first_name }} {{ $SaleUser->last_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sale_team_sub_name">Area</label>
                                <!-- <input type="text" id="sale_team_sub_name_search" name="sale_team_sub_name" class="form-control search_table"> -->
                                <select class="form-control custom-select select-team-add select2" id="sale_team_sub_name_search">
                                    <option value="">Select Area</option>
                                    @if($SaleAreas)
                                    @foreach($SaleAreas as $SaleArea)
                                    <option value="{{$SaleArea->sale_team_sub_id}}">{{$SaleArea->sale_team_sub_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sale_admin_id">Sale</label>
                                <!-- <input type="text" id="sale_name_search" name="sale_admin_id" class="form-control search_table"> -->
                                <select class="form-control custom-select select-team-add select2" id="sale_name_search">
                                    <option value="">Select Sale</option>
                                    @if($AdminUsers)
                                    @foreach($AdminUsers as $SaleUser)
                                    <option value="{{ $SaleUser->admin_id }}">{{ $SaleUser->first_name }} {{ $SaleUser->last_name }}</option>
                                    @endforeach
                                    @endif
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
                    @if(App\Helper::CheckPermissionMenu('SaleUser' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableSaleUser" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Sale Code</th>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Gender</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Date on</th>
                                <th scope="col">Last Login</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
@include('admin.SaleUser.Modal.modal_sale_team_edit')
@include('admin.SaleUser.Modal.modal_sale_user')

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
                                    <label for="sale_team_main_id">Team</label>
                                    <select class="form-control custom-select select-team select2" id="sale_team_main_id" name="sale_team_main_id" required="">
                                        <option value="">----Select----</option>
                                        @if($SaleManagers)
                                        @foreach($SaleManagers as $val)
                                        <option value="{{$val->sale_team_main_id}}">{{$val->sale_team_main_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sale_team_sub_name">Area</label>
                                    <select class="form-control custom-select select-area select2" id="sale_team_sub_id" name="sale_team_sub_id" required="">
                                        <option value="">----Select----</option>

                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="admin_id">Sales</label>
                                    <select class="form-control custom-select select-user select2" multiple="" style="height: 36px;width: 100%;" id="admin_sale" name="admin_id[]" required="" data-select2-id="admin_id" tabindex="-1" aria-hidden="true">
                                        <!-- @foreach($AdminUsers as $val)
                                        <option value="{{$val->admin_id}}">{{$val->first_name}} {{$val->last_name}}</option>
                                        @endforeach -->

                                    </select>
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

@endsection
@section('scripts')
<script>
    var tableSaleUser = $('#tableSaleUser').dataTable({
        "ajax": {
            "url": url_gb + "/admin/SaleUser/Lists",
            "type": "POST",
            "data": function(d) {
                d.team = $('#sale_team_main_name_search').val();
                d.area = $('#sale_team_sub_name_search').val();
                d.manager = $('#manager_name_search').val();
                d.sale = $('#sale_name_search').val();
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
                "data": "admin_user_code_sale",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "username",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "admin_name",
                "name": 'first_name',
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "last_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "gender_name",
                "name": "gender.gender_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "email",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "date_on",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "last_login",
                "class": "text-center",
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

    $('body').on('click', '.btn-add', function(data) {
        $('#add_name_prefix_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('change', '.change-status', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/SaleUser/ChangeStatusAllSale/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableSaleUser.api().ajax.reload();
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
            url: url_gb + "/admin/SaleUser",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableSaleUser.api().ajax.reload();
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
            url: url_gb + "/admin/SaleUser/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableSaleUser.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.select-team', function() {
        // var ele = $(this).closest('.select');
        var id = $(this).val();
        $('.select-area').html('');

        if (id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/SaleUser/GetArea/" + id,
                dataType: 'json',
            }).done(function(res) {
                var html = '';
                html += '<option value="">---select---</option>';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.sale_team_sub_id + '">' + v.sale_team_sub_name + '</option>';
                })
                $('.select-area').append(html);
                $('.select-area').select2('destroy').select2();

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });
    $('body').on('change', '.select-area', function() {
        // var ele = $(this).closest('.select');
        var id = $(this).val();
        $('.select-user').html('');

        if (id) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/SaleUser/GetUserNotSale/" + id,
                dataType: 'json',
            }).done(function(res) {
                var html = '';
                $.each(res, function(k, v) {
                    html += '<option value="' + v.admin_id + '">' + v.first_name + ' ' + v.last_name + '</option>';
                })
                $('.select-user').append(html);
                $('.select-user').select2('destroy').select2();

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });

    $('body').on('click', '.btn-search', function(data) {
        tableSaleUser.api().ajax.reload();
    });
    $('body').on('click', '.btn-clear-search', function(data) {
        $('#sale_team_main_name_search').val('');
        $('#sale_team_sub_name_search').val('');
        $('#manager_name_search').val('').change();;
        $('#sale_name_search').val('').change();
        tableSaleUser.api().ajax.reload();
    });
</script>
@include('admin.SaleUser.Script.script_sale_team_edit')
@include('admin.SaleUser.Script.script_sale_user')
@endsection