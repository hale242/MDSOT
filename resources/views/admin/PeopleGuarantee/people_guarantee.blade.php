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
                                    <select class="form-control custom-select select2" id="search_driver_id" name="driver_id">
                                        <option value="0">----Select----</option>
                                        @if($Drivers)
                                        @foreach($Drivers as $Driver)
                                        <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Guarantor name</label>
                                    <input type="text" id="search_people_guarantee_name" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Guarantor phone</label>
                                    <input type="text" id="search_people_guarantee_phone" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Guarantor E-mail</label>
                                    <input type="text" id="search_people_guarantee_email" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Relationship</label>
                                    <input type="text" id="search_people_guarantee_relationship" class="form-control search_table">
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
                    @if(App\Helper::CheckPermissionMenu('PeopleGuarantee' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tablePeopleGuarantee" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Guarantee name</th>
                                <th scope="col">Guarantor phone</th>
                                <th scope="col">Guarantor E-mail</th>
                                <th scope="col">Relationship</th>
                                <th scope="col">Details</th>
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
@include('admin.JobRegister.Modal.modal_people_guarantee_file')

<div class="modal fade" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
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
                                <div class="col-md-6 mb-3">
                                    <label for="driver_id">Driver</label>
                                    <select class="form-control custom-select select2" id="add_driver_id" name="driver_id">
                                        <option value="0">----Select----</option>
                                        @if($Drivers)
                                        @foreach($Drivers as $Driver)
                                        <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="people_guarantee_name">Guarantor name</label>
                                    <input type="text" class="form-control" id="add_people_guarantee_name" name="people_guarantee_name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="people_guarantee_phone">Guarantor phone</label>
                                    <input type="text" class="form-control" id="add_people_guarantee_phone" name="people_guarantee_phone" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="people_guarantee_email">Guarantor E-mail</label>
                                    <input type="text" class="form-control" id="add_people_guarantee_email" name="people_guarantee_email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="people_guarantee_relationship">Relationship</label>
                                    <input type="text" class="form-control" id="add_people_guarantee_relationship" name="people_guarantee_relationship" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="people_guarantee_details">Guarantor details</label>
                                    <textarea cols="80" class="form-control" id="add_people_guarantee_details" name="people_guarantee_details" rows="2" style="margin-top: 0px; margin-bottom: 0px; height: 188px;"></textarea>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_people_guarantee_status" name="people_guarantee_status" checked value="1">
                                        <label class="custom-control-label" for="people_guarantee_status">Active</label>
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
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="driver_id">Driver</label>
                                <select class="form-control custom-select select2" id="edit_driver_id" name="driver_id">
                                    <option value="0">----Select----</option>
                                    @if($Drivers)
                                    @foreach($Drivers as $Driver)
                                    <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="people_guarantee_name">Guarantor name</label>
                                <input type="text" class="form-control" id="edit_people_guarantee_name" name="people_guarantee_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="people_guarantee_phone">Guarantor phone</label>
                                <input type="text" class="form-control" id="edit_people_guarantee_phone" name="people_guarantee_phone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="people_guarantee_email">Guarantor E-mail</label>
                                <input type="text" class="form-control" id="edit_people_guarantee_email" name="people_guarantee_email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="people_guarantee_relationship">Relationship</label>
                                <input type="text" class="form-control" id="edit_people_guarantee_relationship" name="people_guarantee_relationship" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="people_guarantee_details">Guarantor details</label>
                                <textarea cols="80" class="form-control" id="edit_people_guarantee_details" name="people_guarantee_details" rows="2" style="margin-top: 0px; margin-bottom: 0px; height: 188px;"></textarea>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="Check-Box">Status</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="edit_people_guarantee_status" name="people_guarantee_status" checked value="1">
                                    <label class="custom-control-label" for="people_guarantee_status">Active</label>
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
                                    <td>
                                        <label for="example-text-input" class="col-form-label">Driver</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="example-text-input" class="col-form-label">Guarantor name</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_people_guarantee_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="example-text-input" class="col-form-label">Guarantor phone</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_people_guarantee_phone" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="example-text-input" class="col-form-label">Guarantor E-mail</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_people_guarantee_email" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="example-text-input" class="col-form-label">Relationship</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_people_guarantee_relationship" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_people_guarantee_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_people_guarantee_status" class="col-form-label"></label>
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
    var tablePeopleGuarantee = $('#tablePeopleGuarantee').dataTable({
        "ajax": {
            "url": url_gb + "/admin/PeopleGuarantee/Lists",
            "type": "POST",
            "data": function(d) {
                d.driver_id = $('#search_driver_id').val();
                d.people_guarantee_name = $('#search_people_guarantee_name').val();
                d.people_guarantee_phone = $('#search_people_guarantee_phone').val();
                d.people_guarantee_email = $('#search_people_guarantee_email').val();
                d.people_guarantee_relationship = $('#search_people_guarantee_relationship').val();
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
            },{
                "data": "DT_RowIndex",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "driver_name",
                "class": "text-center"
            },
            {
                "data": "people_guarantee_name",
                "class": "text-center"
            },
            {
                "data": "people_guarantee_phone",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "people_guarantee_email",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "people_guarantee_relationship",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "people_guarantee_details",
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
        tablePeopleGuarantee.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_driver_id').val('').change();
        $('#search_people_guarantee_name').val('');
        $('#search_people_guarantee_phone').val('');
        $('#search_people_guarantee_email').val('');
        $('#search_people_guarantee_relationship').val('');

        tablePeopleGuarantee.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#add_people_guarantee_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/PeopleGuarantee/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $('#edit_driver_id').val(data.driver_id).change();
            $('#edit_people_guarantee_name').val(data.people_guarantee_name);
            $('#edit_people_guarantee_phone').val(data.people_guarantee_phone);
            $('#edit_people_guarantee_email').val(data.people_guarantee_email);
            $('#edit_people_guarantee_relationship').val(data.people_guarantee_relationship);
            $('#edit_people_guarantee_details').val(data.people_guarantee_details);
            $('#edit_people_guarantee_status').val(status);
            $("#edit_people_guarantee_details").val(data.people_guarantee_details);
            if (data.people_guarantee_status == 1) {
                $('#edit_people_guarantee_status').prop('checked', true);
            } else {
                $('#edit_people_guarantee_status').prop('checked', false);
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
            url: url_gb + "/admin/PeopleGuarantee/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if (data.people_guarantee_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }

            $('#show_driver_name').text(data.driver_name_th + " " + data.driver_lastname_th);
            $('#show_people_guarantee_name').text(data.people_guarantee_name);
            $('#show_people_guarantee_phone').text(data.people_guarantee_phone);
            $('#show_people_guarantee_email').text(data.people_guarantee_email);
            $('#show_people_guarantee_relationship').text(data.people_guarantee_relationship);
            $('#show_people_guarantee_details').text(data.people_guarantee_details);
            $('#show_people_guarantee_status').text(status);
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
            url: url_gb + "/admin/PeopleGuarantee/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tablePeopleGuarantee.api().ajax.reload();
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
            url: url_gb + "/admin/PeopleGuarantee",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tablePeopleGuarantee.api().ajax.reload();
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
            url: url_gb + "/admin/PeopleGuarantee/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tablePeopleGuarantee.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
@include('admin.JobRegister.Script.script_people_guarantee_file')
@endsection