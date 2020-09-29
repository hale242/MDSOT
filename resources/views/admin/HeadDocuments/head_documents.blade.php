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
                                    <label class="control-label">Head office</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="head_documents_head_office_search" name="search_head_documents_head_office" value="" class="custom-control-input search_table_check">
                                        <label class="custom-control-label" for="head_documents_head_office_search">All</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="head_documents_head_office_search1" name="search_head_documents_head_office" value='1' class="custom-control-input search_table_check">
                                        <label class="custom-control-label" for="head_documents_head_office_search1">Head office</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="head_documents_head_office_search2" name="search_head_documents_head_office" value='0' class="custom-control-input search_table_check">
                                        <label class="custom-control-label" for="head_documents_head_office_search2">Branch</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="email" id="head_documents_email_search" name="head_documents_email" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tel.</label>
                                    <input type="text" id="head_documents_tel_search" name="head_documents_tel" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Fax</label>
                                    <input type="text" id="head_documents_fax_search" name="head_documents_fax" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tax ID</label>
                                    <input type="text" id="head_documents_tax_id_search" name="head_documents_tax_id" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Company code</label>
                                    <input type="text" id="head_documents_company_code_search" name="head_documents_company_code" class="form-control search_table" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="head_documents_status_search" name="head_documents_status_search" value="" class="custom-control-input search_table_check">
                                        <label class="custom-control-label" for="head_documents_status_search">All</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="head_documents_status_search1" name="head_documents_status_search" value="1" class="custom-control-input search_table_check">
                                        <label class="custom-control-label" for="head_documents_status_search1">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="head_documents_status_search2" name="head_documents_status_search" value="0" class="custom-control-input search_table_check">
                                        <label class="custom-control-label" for="head_documents_status_search2">Disabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
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
                    <h4 class="card-title">Head Documents</h4>
                    @if(App\Helper::CheckPermissionMenu('HeadDocuments' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">

                </div>
                <table id="tableHeadDocuments" class="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 90px;">Actions</th>
                            <th scope="col">No</th>
                            <th scope="col">Name th</th>
                            <th scope="col">Address th</th>
                            <th scope="col">Head office</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tel.</th>
                            <th scope="col">Fax</th>
                            <th scope="col">Tax ID</th>
                            <th scope="col">Company code</th>
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
            <form id="FormAdd">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_name_th">Name th</label>
                                    <textarea class="form-control" id="head_documents_name_th" name="head_documents_name_th" required rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_name_en">Name en</label>
                                    <textarea class="form-control" id="head_documents_name_en" name="head_documents_name_en" required rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Address th">Address th</label>
                                    <textarea class="form-control" id="head_documents_address_th" name="head_documents_address_th" required rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Address en">Address en</label>
                                    <textarea class="form-control" id="head_documents_address_en" name="head_documents_address_en" required rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_email">Email</label>
                                    <input type="email" class="form-control" id="head_documents_email" name="head_documents_email" placeholder="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_tel">Tel.</label>
                                    <input type="text" class="form-control" id="head_documents_tel" name="head_documents_tel" placeholder="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_fax">Fax</label>
                                    <input type="text" class="form-control" id="head_documents_fax" name="head_documents_fax" placeholder="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_tax_id">Tax ID</label>
                                    <input type="text" class="form-control" id="head_documents_tax_id" name="head_documents_tax_id" placeholder="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_company_code">Company code</label>
                                    <input type="text" class="form-control" id="head_documents_company_code" name="head_documents_company_code" placeholder="" required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="Check-Box">Head office</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="head_documents_head_office" name="head_documents_head_office" value="1">
                                        <label class="custom-control-label" for="head_documents_head_office">Yes</label>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="head_documents_status" name="head_documents_status" value="1">
                                        <label class="custom-control-label" for="head_documents_status">Active</label>
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
                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_name_th">Name th</label>
                                    <textarea class="form-control" id="edit_head_documents_name_th" name="head_documents_name_th" required rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_name_en">Name en</label>
                                    <textarea class="form-control" id="edit_head_documents_name_en" name="head_documents_name_en" rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Address th">Address th</label>
                                    <textarea class="form-control" id="edit_head_documents_address_th" name="head_documents_address_th" required rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Address en">Address en</label>
                                    <textarea class="form-control" id="edit_head_documents_address_en" name="head_documents_address_en" rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_email">Email</label>
                                    <input type="email" class="form-control" id="edit_head_documents_email" name="head_documents_email" placeholder="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_tel">Tel.</label>
                                    <input type="text" class="form-control" id="edit_head_documents_tel" name="head_documents_tel" placeholder="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_fax">Fax</label>
                                    <input type="text" class="form-control" id="edit_head_documents_fax" name="head_documents_fax" placeholder="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_tax_id">Tax ID</label>
                                    <input type="text" class="form-control" id="edit_head_documents_tax_id" name="head_documents_tax_id" placeholder="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_documents_company_code">Company code</label>
                                    <input type="text" class="form-control" id="edit_head_documents_company_code" name="head_documents_company_code" placeholder="" required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="Check-Box">Head office</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_head_documents_head_office" name="head_documents_head_office" value="1">
                                        <label class="custom-control-label" for="edit_head_documents_head_office">Yes</label>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_head_documents_status" name="head_documents_status" value="1">
                                        <label class="custom-control-label" for="edit_head_documents_status">Active</label>
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
                                    <td> <label for="example-text-input" class="col-form-label">Name th</label> </td>
                                    <td> <label id="show_head_documents_name_th" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Name en</label> </td>
                                    <td> <label id="show_head_documents_name_en" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Address th</label> </td>
                                    <td> <label id="show_head_documents_address_th" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Address en</label> </td>
                                    <td> <label id="show_head_documents_address_en" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Email</label> </td>
                                    <td> <label id="show_head_documents_email" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Tel.</label> </td>
                                    <td> <label id="show_head_documents_tel" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Fax</label> </td>
                                    <td> <label id="show_head_documents_fax" class="col-form-label">Fax</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Tax ID</label> </td>
                                    <td> <label id="show_head_documents_tax_id" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Company code</label> </td>
                                    <td> <label id="show_head_documents_company_code" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Head office</label> </td>
                                    <td> <label id='show_head_documents_head_office' class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Status</label> </td>
                                    <td> <label id="show_head_documents_status" for="example-text-input" class="col-form-label"></label> </td>
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
    var tableHeadDocuments = $('#tableHeadDocuments').dataTable({
        "ajax": {
            "url": url_gb + "/admin/HeadDocuments/Lists",
            "type": "POST",
            "data": function(d) {
                d.head_documents_head_office = $("input[name='search_head_documents_head_office']:checked").val()
                d.head_documents_email = $('#head_documents_email_search').val();
                d.head_documents_tel = $('#head_documents_tel_search').val();
                d.head_documents_fax = $('#head_documents_fax_search').val();
                d.head_documents_tax_id = $('#head_documents_tax_id_search').val();
                d.head_documents_company_code = $('#head_documents_company_code_search').val();
                d.head_documents_status = $("input[name='head_documents_status_search']:checked").val();
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
                "data": "head_documents_name_th",
                "class": "text-center"
            },
            {
                "data": "head_documents_address_th",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "head_documents_head_office",
                "class": "text-center"
            },
            {
                "data": "head_documents_email",
                "class": "text-center"
            },
            {
                "data": "head_documents_tel",
                "class": "text-center"
            },
            {
                "data": "head_documents_fax",
                "class": "text-center"
            },
            {
                "data": "head_documents_tax_id",
                "class": "text-center"
            },
            {
                "data": "head_documents_company_code",
                "class": "text-center"
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
        $('#head_documents_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/HeadDocuments/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;

            $('#edit_head_documents_name_th').val(data.head_documents_name_th);
            $('#edit_head_documents_name_en').val(data.head_documents_name_en);
            $('#edit_head_documents_address_th').val(data.head_documents_address_th);
            $('#edit_head_documents_address_en').val(data.head_documents_address_en);
            $('#edit_head_documents_email').val(data.head_documents_email);
            $('#edit_head_documents_tel').val(data.head_documents_tel);
            $('#edit_head_documents_fax').val(data.head_documents_fax);
            $('#edit_head_documents_tax_id').val(data.head_documents_tax_id);
            $('#edit_head_documents_company_code').val(data.head_documents_company_code);
            if (data.head_documents_head_office == 1) {
                $('#edit_head_documents_head_office').prop('checked', true);
            } else {
                $('#edit_head_documents_head_office').prop('checked', false);
            }
            if (data.head_documents_status == 1) {
                $('#edit_head_documents_status').prop('checked', true);
            } else {
                $('#edit_head_documents_status').prop('checked', false);
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
            url: url_gb + "/admin/HeadDocuments/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            if (data.head_documents_status == 1) {
                status = 'Active';
            } else {
                status = 'Not Active';
            }
            if (data.head_documents_head_office == 1) {
                head_office = 'Head office';
            } else {
                head_office = 'สาขอย่อย';
            }

            $('#show_head_documents_name_th').text(data.head_documents_name_th);
            $('#show_head_documents_name_en').text(data.head_documents_name_en);
            $('#show_head_documents_address_th').text(data.head_documents_address_th);
            $('#show_head_documents_address_en').text(data.head_documents_address_en);
            $('#show_head_documents_email').text(data.head_documents_email);
            $('#show_head_documents_tel').text(data.head_documents_tel);
            $('#show_head_documents_fax').text(data.head_documents_fax);
            $('#show_head_documents_tax_id').text(data.head_documents_tax_id);
            $('#show_head_documents_company_code').text(data.head_documents_company_code);
            $('#show_head_documents_head_office').text(head_office);
            $('#show_head_documents_status').text(status);
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
            url: url_gb + "/admin/HeadDocuments/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableHeadDocuments.api().ajax.reload();
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
            url: url_gb + "/admin/HeadDocuments",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableHeadDocuments.api().ajax.reload();
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
            url: url_gb + "/admin/HeadDocuments/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableHeadDocuments.api().ajax.reload();
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
        tableHeadDocuments.api().ajax.reload();
    });
    $('body').on('click', '.btn-clear-search', function(data) {
        $("input[name='search_head_documents_head_office']:checked").val('');
        $("head_documents_email_search").val('');
        $("head_documents_tel_search").val('');
        $("head_documents_fax_search").val('');
        $("head_documents_tax_id_search").val('');
        $("head_documents_company_code_search").val('');
        $("input[name='head_documents_status_search']:checked").val('');
        tableHeadDocuments.api().ajax.reload();
    });
</script>
@endsection