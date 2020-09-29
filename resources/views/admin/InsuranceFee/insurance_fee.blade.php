@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
                    @if(App\Helper::CheckPermissionMenu('InsuranceFee' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableInsuranceFee" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Item code</th>
                                <th scope="col">Cost name</th>
                                <th scope="col">Account code</th>
                                <th scope="col">Account book</th>
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
                                    <label for="add_item_code_id">Item code</label>
                                    <select class="form-control custom-select select2" name="item_code_id" id="add_item_code_id" required>
                                        <option value="">----Selest----</option>
                                        @foreach($ItemCodes as $val)
                                          <option value="{{$val->item_code_id}}">{{$val->item_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insurance_fee_name">Cost name</label>
                                    <input type="text" class="form-control" id="add_insurance_fee_name" name="insurance_fee_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insurance_fee_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_insurance_fee_details" name="insurance_fee_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insurance_fee_account_code">Account code</label>
                                    <input type="text" class="form-control" id="insurance_fee_account_code" name="insurance_fee_account_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insurance_fee_account_book">Account book</label>
                                    <input type="text" class="form-control" id="insurance_fee_account_book" name="insurance_fee_account_book" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_insurance_fee_status" name="insurance_fee_status" value="1">
                                        <label class="custom-control-label" for="add_insurance_fee_status">Action</label>
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
                                    <label for="edit_item_code_id">Item code</label>
                                    <select class="form-control custom-select select2" name="item_code_id" id="edit_item_code_id" required>
                                        <option value="">----Selest----</option>
                                        @foreach($ItemCodes as $val)
                                          <option value="{{$val->item_code_id}}">{{$val->item_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insurance_fee_name">Cost name</label>
                                    <input type="text" class="form-control" id="edit_insurance_fee_name" name="insurance_fee_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insurance_fee_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_insurance_fee_details" name="insurance_fee_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insurance_fee_account_code">Account code</label>
                                    <input type="text" class="form-control" id="edit_insurance_fee_account_code" name="insurance_fee_account_code" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insurance_fee_account_book">Account book</label>
                                    <input type="text" class="form-control" id="edit_insurance_fee_account_book" name="insurance_fee_account_book" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_insurance_fee_status" name="insurance_fee_status" value="1">
                                        <label class="custom-control-label" for="edit_insurance_fee_status">Action</label>
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
                                        <label for="example-text-input" class="col-form-label">Item code</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_item_code_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Cost name</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_insurance_fee_name" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_insurance_fee_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Account code</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_insurance_fee_account_code" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Account book</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_insurance_fee_account_book" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_insurance_fee_status" class="col-form-label"></label>
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
    var tableInsuranceFee = $('#tableInsuranceFee').dataTable({
        "ajax": {
            "url": url_gb + "/admin/InsuranceFee/Lists",
            "type":"POST", "data": function( d ) {
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
                "data" : "action" ,
                "name" : "action",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "item_code_name", "name":"item_code.item_code_name"},
            {"data" : "insurance_fee_name"},
            {"data" : "insurance_fee_account_code"},
            {"data" : "insurance_fee_account_book"},

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
        $('#add_insurance_fee_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/InsuranceFee/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $("#edit_item_code_id").val(data.item_code_id).change();
            $("#edit_insurance_fee_name").val(data.insurance_fee_name);
            $("#edit_insurance_fee_details").val(data.insurance_fee_details);
            $("#edit_insurance_fee_account_code").val(data.insurance_fee_account_code);
            $("#edit_insurance_fee_account_book").val(data.insurance_fee_account_book);
            if (data.insurance_fee_status == 1) {
                $('#edit_insurance_fee_status').prop('checked', true);
            } else {
                $('#edit_insurance_fee_status').prop('checked', false);
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
            url: url_gb + "/admin/InsuranceFee/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var item_code_name = data.item_code ? data.item_code.item_code_name : '';
            var status = '';
            if (data.insurance_fee_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $('#show_item_code_name').text(item_code_name);
            $('#show_insurance_fee_name').text(data.insurance_fee_name);
            $('#show_insurance_fee_details').text(data.insurance_fee_details);
            $('#show_insurance_fee_account_code').text(data.insurance_fee_account_code);
            $('#show_insurance_fee_account_book').text(data.insurance_fee_account_book);
            $('#show_insurance_fee_status').text(status);
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
            url: url_gb + "/admin/InsuranceFee/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableInsuranceFee.api().ajax.reload();
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
            url: url_gb + "/admin/InsuranceFee",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_item_code_id').val('').change();
                tableInsuranceFee.api().ajax.reload();
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
            url: url_gb + "/admin/InsuranceFee/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableInsuranceFee.api().ajax.reload();
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
@endsection
