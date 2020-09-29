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
                                    <label class="control-label">Driver</label>
                                    <select class="form-control custom-select select2" id="search_driver_id">
                                        <option value="">----Select----</option>
                                        @foreach($Drivers as $Driver)
                                        <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Bank</label>
                                    <select class="form-control custom-select select2" id="search_driver_bank_type_id">
                                        <option value="">----Select----</option>
                                        @foreach($BankTypes as $BankType)
                                        <option value="{{ $BankType->driver_bank_type_id }}">{{ $BankType->driver_bank_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Account ID</label>
                                    <input type="text" class="form-control" id="search_driver_bank_account_code">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Account name</label>
                                    <input type="text" class="form-control" id="search_driver_bank_account_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Branch name</label>
                                    <input type="text" class="form-control" id="search_driver_bank_account_branch">

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
                    @if(App\Helper::CheckPermissionMenu('BookBank' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableBookBank" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Bank</th>
                                <th scope="col">Account ID</th>
                                <th scope="col">Account name</th>
                                <th scope="col">Branch name</th>
                                <th scope="col">Details</th>
                                <th scope="col">File</th>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormBookBank" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="driver_id">Driver</label>
                                    <select class="form-control custom-select select2" id="add_driver_id" name="driver_id">
                                        <option value="0">----Select----</option>
                                        @foreach($Drivers as $Driver)
                                        <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_bank_type_id">Bank</label>
                                    <select class="form-control custom-select select2" id="add_driver_bank_type_id" name="driver_bank_type_id">
                                        <option value="0">----Select----</option>
                                        @foreach($BankTypes as $BankType)
                                        <option value="{{ $BankType->driver_bank_type_id }}">{{ $BankType->driver_bank_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_bank_account_code">Account ID</label>
                                    <input type="text" class="form-control" id="add_driver_bank_account_code" name="driver_bank_account_code" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_bank_account_name">Account name</label>
                                    <input type="text" class="form-control" id="add_driver_bank_account_name" name="driver_bank_account_name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_bank_account_branch">Branch name</label>
                                    <input type="text" class="form-control" id="add_driver_bank_account_branch" name="driver_bank_account_branch" required>
                                </div>
                                <div class="col-md-6 mb-3 form-upload-account-file">
                                    <label for="driver_bank_account_file_part">File</label>
                                    <input type="file" class="form-control upload-file-account-file" id="add_driver_bank_account_file_part" name="driver_bank_account_file_part">
                                </div>
                                <div class="col-md-9 mb-3">
                                    <label for="driver_bank_account_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_driver_bank_account_details" name="driver_bank_account_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_driver_bank_account_status" name="driver_bank_account_status" checked value="1">
                                        <label class="custom-control-label" for="driver_bank_account_status">Active</label>
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
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="driver_id">Driver</label>
                                    <select class="form-control custom-select select2" id="edit_driver_id" name="driver_id">
                                        <option value="0">----Select----</option>
                                        @foreach($Drivers as $Driver)
                                        <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_bank_type_id">Bank</label>
                                    <select class="form-control custom-select select2" id="edit_driver_bank_type_id" name="driver_bank_type_id">
                                        <option value="0">----Select----</option>
                                        @foreach($BankTypes as $BankType)
                                        <option value="{{ $BankType->driver_bank_type_id }}">{{ $BankType->driver_bank_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_bank_account_code"> Account ID</label>
                                    <input type="number" class="form-control" id="edit_driver_bank_account_code" name="driver_bank_account_code" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_bank_account_name">Account name</label>
                                    <input type="text" class="form-control" id="edit_driver_bank_account_name" name="driver_bank_account_name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_bank_account_branch">Branch name</label>
                                    <input type="text" class="form-control" id="edit_driver_bank_account_branch" name="driver_bank_account_branch" required>
                                </div>
                                <div class="col-md-6 mb-3 form-upload-account-file">
                                    <label for="driver_bank_account_file_part">File</label>
                                    <input type="file" class="form-control upload-file-account-file" id="add_driver_bank_account_file_part" name="driver_bank_account_file_part">
                                </div>
                                <div class="col-md-9 mb-3">
                                    <label for="driver_bank_account_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_driver_bank_account_details" name="driver_bank_account_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_driver_bank_account_status" name="driver_bank_account_status" checked value="1">
                                        <label class="custom-control-label" for="driver_bank_account_status">Active</label>
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
    <div class="modal-dialog modal-lg" role="document">
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
                                    <td width="390">
                                        <label for="example-text-input" class="col-form-label">Driver</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="390">
                                        <label for="example-text-input" class="col-form-label">Bank</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_bank_type" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="390">
                                        <label for="example-text-input" class="col-form-label">Account ID</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_bank_account_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="390">
                                        <label for="example-text-input" class="col-form-label">Account name</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_bank_account_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="390">
                                        <label for="example-text-input" class="col-form-label">Branch name</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_bank_account_branch" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="390">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_bank_account_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="390">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_bank_account_status" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="390">
                                        <label for="example-text-input" class="col-form-label">File book bank</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_bank_account_file_name" class="col-form-label"></label>
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
    var tableBookBank = $('#tableBookBank').dataTable({
        "ajax": {
            "url": url_gb + "/admin/BookBank/Lists",
            "type": "POST",
            "data": function(d) {
                d.page = "{{isset($Page) ? $Page : ''}}";
                d.driver_id = $('#search_driver_id').val();
                d.driver_bank_type_id = $('#search_driver_bank_type_id').val();
                d.driver_bank_account_code = $('#search_driver_bank_account_code').val();
                d.driver_bank_account_name = $('#search_driver_bank_account_name').val();
                d.driver_bank_account_branch = $('#search_driver_bank_account_branch').val();
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
                "class": "text-center"
            },
            {
                "data": "driver_bank_type_name",
                "class": "text-center"
            },
            {
                "data": "driver_bank_account_code",
                "class": "text-center"
            },
            {
                "data": "driver_bank_account_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "driver_bank_account_branch",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "driver_bank_account_details",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "file",
                "class": "text-center",
                "searchable": false,
                "sortable": false
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
        tableBookBank.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_driver_id').val('').change();
        $('#search_driver_bank_type_id').val('').change();
        $('#search_driver_bank_account_code').val('');
        $('#search_driver_bank_account_name').val('');
        $('#search_driver_bank_account_branch').val('');
        tableBookBank.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#add_driver_bank_account_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/BookBank/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $("#edit_driver_id").val(data.driver_id).change();
            $("#edit_driver_bank_type_id").val(data.driver_bank_type_id).change();
            $("#edit_driver_bank_account_code").val(data.driver_bank_account_code);
            $("#edit_driver_bank_account_name").val(data.driver_bank_account_name);
            $("#edit_driver_bank_account_branch").val(data.driver_bank_account_branch);
            $("#edit_driver_bank_account_details").val(data.driver_bank_account_details);
            if (data.driver_bank_account_status == 1) {
                $('#edit_driver_bank_account_status').prop('checked', true);
            } else {
                $('#edit_driver_bank_account_status').prop('checked', false);
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
        $('#show_driver_bank_account_file_name').empty()
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/BookBank/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if (data.driver_bank_account_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $('#show_driver_name').text(data.driver.driver_name_th + ' ' + data.driver.driver_lastname_th);
            $('#show_bank_type').text(data.driver_bank_type_name);
            $('#show_driver_bank_account_code').text(data.driver_bank_account_code);
            $('#show_driver_bank_account_name').text(data.driver_bank_account_name);
            $('#show_driver_bank_account_branch').text(data.driver_bank_account_branch);
            $('#show_driver_bank_account_details').text(data.driver_bank_account_details);
            $('#show_driver_bank_account_file_name').append('<a href="' + data.driver_bank_account_file_part + '" target="_blank">' + data.driver_bank_account_file_name + '</a>');
            $('#show_driver_bank_account_status').text(status);
            $('#ModalView').modal('show');
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
            url: url_gb + "/admin/BookBank/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableBookBank.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormBookBank', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/BookBank",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                tableBookBank.api().ajax.reload();
                $('#ModalAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
    $('body').on('change', '.upload-file-account-file', function() {
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
            url: url_gb + '/admin/UploadFile/BookBankFile',
            type: 'POST',
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(res) {
                ele.closest('.form-upload-account-file').find('.upload-file-account-file').append('<input type="hidden" name="driver_bank_account_file_part" value="' + res.path + '">');
                setTimeout(function() {

                }, 100);
            }
        });
    });

    $('body').on('change', '.change-status-account-file', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/BookBank/ChangeStatus/" + id,
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
</script>
@endsection