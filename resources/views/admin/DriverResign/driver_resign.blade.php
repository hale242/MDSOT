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
                                <select class="form-control custom-select select2" id="search_driver_id">
                                    <option value="">----Select----</option>
                                    @foreach($Drivers as $val)
                                    <option value="{{$val->driver_id}}">{{$val->driver_name_th.' '.$val->driver_lastname_th}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Resign type</label>
                                <select class="form-control custom-select select2" id="search_resign_type_id">
                                    <option value="">----Select----</option>
                                    @foreach($ResignTypes as $val)
                                    <option value="{{$val->resign_type_id}}">{{$val->resign_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Document code</label>
                                <input type="number" id="search_driver_resign_doc_code" name="driver_resign_doc_code" class="form-control search_table" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Starting date</label>
                                <input type="date" id="search_driver_resign_date_start" name="driver_resign_date_start" class="form-control search_table" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">End date</label>
                                <input type="date" id="search_driver_resign_date_last" name="driver_resign_date_last" class="form-control search_table" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Date of resigning</label>
                                <input type="date" id="search_driver_resign_date_resign" name="driver_resign_date_resign" class="form-control search_table" placeholder="" />
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
                    @if(App\Helper::CheckPermissionMenu('DriverResign' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableDriverResign" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Driver Code</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Resign type</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Document code</th>
                                <th scope="col">Starting date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Date of resigning</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormAdd" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="driver_id">Driver</label>
                                    <select class="form-control custom-select select2" id="add_driver_id" name="driver_id" required>
                                        <option value="">----Select----</option>
                                        @foreach($Drivers as $val)
                                        <option value="{{$val->driver_id}}">{{$val->driver_name_th.' '.$val->driver_lastname_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="resign_type_id">Resign type</label>
                                    <select class="form-control custom-select select2" id="add_resign_type_id" name="resign_type_id" required>
                                        <option value="">----Select----</option>
                                        @foreach($ResignTypes as $val)
                                        <option value="{{$val->resign_type_id}}">{{$val->resign_type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_resign_doc_code">Document code</label>
                                    <input type="text" class="form-control" id="add_driver_resign_doc_code" name="driver_resign_doc_code" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_resign_date_resign">Date of resigning</label>
                                    <input type="date" class="form-control" id="add_driver_resign_date_resign" name="driver_resign_date_resign" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_resign_date_start">Starting date</label>
                                    <input type="date" class="form-control" id="add_driver_resign_date_start" name="driver_resign_date_start" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_resign_date_last">End date</label>
                                    <input type="date" class="form-control" id="add_driver_resign_date_last" name="driver_resign_date_last" required />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_resign_details">Details</label>
                                    <textarea class="form-control" id="add_driver_resign_details" name="driver_resign_details" rows="3"></textarea>
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

<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Driver Code</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_code"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Driver</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_name"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Resign type</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_resign_type_name"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Details</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_resign_details"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Document code</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_resign_doc_code"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Starting date</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_resign_date_resign"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">End date</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_resign_date_start"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Date of resigning</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_resign_date_last"></label></td>
                                </tr>
                                <tr>
                                    <td><label for="example-text-input" class="col-form-label">Status</label></td>
                                    <td><label for="example-text-input" class="col-form-label" id="show_driver_resign_status"></label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.DriverResign.Modal.modal_driver_resign_file')
@endsection
@section('scripts')
<script>
    var tableDriverResign = $('#tableDriverResign').dataTable({
        "ajax": {
            "url": url_gb + "/admin/DriverResign/Lists",
            "type": "POST",
            "data": function(d) {
                d.driver_id = $("#search_driver_id").val();
                d.resign_type_id = $("#search_resign_type_id").val();
                d.driver_resign_doc_code = $("#search_driver_resign_doc_code").val();
                d.driver_resign_date_start = $("#search_driver_resign_date_start").val();
                d.driver_resign_date_last = $("#search_driver_resign_date_last").val();
                d.driver_resign_date_resign = $("#search_driver_resign_date_resign").val();
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
                "sortable": false
            },
            {
                "data": "driver_code",
                "name": "driver.driver_code"
            },
            {
                "data": "driver_name",
                "name": "driver.driver_name_th"
            },
            {
                "data": "resign_type_name",
                "name": 'resign_type.resign_type_name'
            },
            {
                "data": "admin_name",
                "name": 'admin_user.first_name'
            },
            {
                "data": "driver_resign_doc_code"
            },
            {
                "data": "driver_resign_date_start",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "driver_resign_date_last",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "driver_resign_date_resign",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "status",
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
        tableDriverResign.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_driver_id').val('').change();
        $('#search_resign_type_id').val('').change();
        $('#search_driver_resign_doc_code').val('');
        $('#search_driver_resign_date_start').val('');
        $('#search_driver_resign_date_last').val('');
        $('#search_driver_resign_date_resign').val('');
        tableDriverResign.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/DriverResign/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var driver_name = data.driver ? data.driver.driver_name_th + ' ' + data.driver.driver_lastname_th : '';
            var driver_code = data.driver ? data.driver.driver_code : '';
            var resign_type_name = data.resign_type ? data.resign_type.resign_type_name : '';
            var status = '';
            if (data.driver_resign_status == 0) {
                status = 'รออนุมัติลาออก';
            } else if (data.driver_resign_status == 1) {
                status = 'อนุมัติลาออก/ไล่ออก';
            } else if (data.driver_resign_status == 2) {
                status = 'ไม่อนุมัติลาออก/ไล่ออก';
            } else if (data.driver_resign_status == 9) {
                status = 'ยกเลิกการลาออก/ไล่ออก';
            }
            $('#show_driver_code').text(driver_code);
            $('#show_driver_name').text(driver_name);
            $('#show_resign_type_name').text(resign_type_name);
            $('#show_driver_resign_details').text(data.driver_resign_details);
            $('#show_driver_resign_doc_code').text(data.driver_resign_doc_code);
            $('#show_driver_resign_date_resign').text(data.format_driver_resign_date_resign);
            $('#show_driver_resign_date_start').text(data.format_driver_resign_date_start);
            $('#show_driver_resign_date_last').text(data.format_driver_resign_date_last);
            $('#show_driver_resign_status').text(status);

            $('#ModalView').modal('show');
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
            url: url_gb + "/admin/DriverResign",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                tableDriverResign.api().ajax.reload();
                $('#ModalAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
@include('admin.DriverResign.Script.script_driver_resign_file')
@endsection