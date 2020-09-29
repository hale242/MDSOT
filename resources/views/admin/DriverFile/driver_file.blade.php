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
                                    <select class="form-control select2" id="search_driver_id">
                                        <option value="">เลือกพนักงาน</option>
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
                                    <label class="control-label">Type of document</label>
                                    <select class="form-control select2" id="search_type_doc_driver_id">
                                        <option value="">เลือกประเภทเอกสาร</option>
                                        @foreach($TypeDocumentDrivers as $TypeDocumentDriver)
                                        <option value="{{ $TypeDocumentDriver->type_doc_driver_id }}">{{ $TypeDocumentDriver->type_doc_driver_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">เริ่มต้น (Date of document)</label>
                                    <input type="date" id="search_driver_file_date" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">สิ้นสุด (Date of document)</label>
                                    <input type="date" id="search_driver_file_end" class="form-control search_table">
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
                    @if(App\Helper::CheckPermissionMenu('DriverFile' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableDriverFile" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Type of documect</th>
                                <th scope="col">Driver</th>
                                <th scope="col">File</th>
                                <th scope="col">Date of document</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="DriverFile">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
            </div>
            <form id="FormAdd" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="col-md-12 mb-3">
                                <label for="add_driver_id">DriverFile</label>
                                <select class="form-control select2" id="add_driver_id" name="driver_id">
                                    <option value="">เลือกพนักงาน</option>
                                    @if($Drivers)
                                    @foreach($Drivers as $Driver)
                                    <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="add_type_doc_driver_id">Type of DriverFile</label>
                                <select class="form-control select2" id="add_type_doc_driver_id" name="type_doc_driver_id">
                                    <option value="">เลือกประเภทเอกสาร</option>
                                    @if($TypeDocumentDrivers)
                                    @foreach($TypeDocumentDrivers as $TypeDocumentDriver)
                                    <option value="{{ $TypeDocumentDriver->type_doc_driver_id }}">{{ $TypeDocumentDriver->type_doc_driver_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 mb-3 form-upload">
                                <label for="add_driver_file_part">Upload DriverFile</label>
                                <input type="file" class="form-control upload-driver-file" id="add_driver_file_name" name="driver_file_name" required>
                            </div>
                            <div class="col-md-12 mb-3 ">
                                <label for="add_driver_file_date">Date of DriverFile</label>
                                <input type="date" class="form-control" id="add_driver_file_date" name="driver_file_date" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="add_driver_file_details">comment</label>
                                <textarea cols="80" class="form-control" id="add_driver_file_details" name="driver_file_details" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="Check-Box">Status</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="add_driver_file_status" name="driver_file_status" value="1" checked>
                                    <label class="custom-control-label" for="add_driver_file_status">Action</label>
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
    <div class="modal-dialog modal-md" role="DriverFile">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_driver_file_id" name="driver_file_id">
                <!-- <input type="hidden" id="edit_driver_id" name="driver_id"> -->
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="col-md-12 mb-3">
                                <label for="edit_driver_id">DriverFile</label>
                                <select class="form-control select2" id="edit_driver_id" name="driver_id">
                                    <option value="">เลือกพนักงาน</option>
                                    @if($Drivers)
                                    @foreach($Drivers as $Driver)
                                    <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="edit_type_doc_driver_id">Type of DriverFile</label>
                                <select class="form-control select2" id="edit_type_doc_driver_id" name="type_doc_driver_id">
                                    <option value="">เลือกประเภทเอกสาร</option>
                                    @foreach($TypeDocumentDrivers as $TypeDocumentDriver)
                                    <option value="{{ $TypeDocumentDriver->type_doc_driver_id }}">{{ $TypeDocumentDriver->type_doc_driver_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3 form-upload">
                                <label for="edit_driver_file_part">Upload DriverFile</label>
                                <input type="file" class="form-control upload-driver-file" id="add_driver_file_name" name="driver_file_name">
                            </div>
                            <div class="col-md-12 mb-3 ">
                                <label for="edit_driver_file_date">Date of DriverFile</label>
                                <input type="date" class="form-control" id="edit_driver_file_date" name="driver_file_date" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="edit_driver_file_details">comment</label>
                                <textarea cols="80" class="form-control" id="edit_driver_file_details" name="driver_file_details" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="Check-Box">Status</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="edit_driver_file_status" name="driver_file_status" value="1">
                                    <label class="custom-control-label" for="edit_driver_file_status">Action</label>
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
    <div class="modal-dialog modal-md" role="DriverFile">
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
                                        <label for="example-text-input" class="col-form-label">Type of file</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_type_doc_driver_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">File</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_file_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Date of document</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_file_date" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_file_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_file_status" class="col-form-label"></label>
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
    var tableDriverFile = $('#tableDriverFile').dataTable({
        "ajax": {
            "url": url_gb + "/admin/DriverFile/Lists",
            "type": "POST",
            "data": function(d) {
                d.page = "{{isset($Page) ? $Page : ''}}";
                d.driver_id = $("#search_driver_id").val();
                d.driver_file_date = $("#search_driver_file_date").val();
                d.driver_file_end = $("#search_driver_file_end").val();
                d.type_doc_driver_id = $("#search_type_doc_driver_id").val();

            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {
                "data": "action2",
                "name": "action2",
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
                "data": "type_doc_driver_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "driver_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "driver_file_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "driver_file_date",
                "class": "text-center"
            },
            {
                "data": "driver_file_details",
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



    $('body').on('click', '.btn-search', function() {
        tableDriverFile.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_driver_id').val('').change();
        $('#search_type_doc_driver_id').val('').change();
        $('#search_driver_file_date').val('');
        $('#search_driver_file_end').val('');
        tableDriverFile.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_driver_file_id').val(id);

        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/DriverFile/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $('#edit_driver_id').val(data.driver_id).change();
            $('#edit_type_doc_driver_id').val(data.type_doc_driver_id).change();
            $('#edit_driver_file_name').val(data.driver_file_name);
            $('#edit_driver_file_details').val(data.driver_file_details);
            $('#edit_driver_file_date').val(data.format_driver_file_date);
            if (data.driver_file_status == 1) {
                $('#edit_driver_file_status').prop('checked', true);
            } else {
                $('#edit_driver_file_status').prop('checked', false);
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
            url: url_gb + "/admin/DriverFile/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if (data.driver_file_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $('#show_type_doc_driver_name').text(data.type_document_driver.type_doc_driver_name);
            $('#show_driver_file_name').text(data.driver_file_name);
            $('#show_driver_file_date').text(data.format_driver_file_date);
            $('#show_driver_file_details').text(data.driver_file_details);
            $('#show_driver_file_status').text(status);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_driver_file_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/DriverFile/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableDriverFile.api().ajax.reload();
                $('#ModalEdit').modal('hide');
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
            url: url_gb + "/admin/DriverFile",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                tableDriverFile.api().ajax.reload();
                $('#ModalAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
    $('body').on('change', '.upload-driver-file', function() {
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
            url: url_gb + '/admin/UploadFile/DriverFile',
            type: 'POST',
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(res) {
                ele.closest('.form-upload').find('.upload-driver-file').append('<input type="hidden" name="driver_file_part" value="' + res.path + '">');
                setTimeout(function() {

                }, 100);
            }
        });
    });
</script>
@endsection