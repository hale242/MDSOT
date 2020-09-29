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
                                <label class="control-label">Member Name</label>
                                <input type="text" id="member_name_th_search" name="member_name_th" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Phone</label>
                                <input type="text" id="member_phone_search" name="member_phone" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">E-mail</label>
                                <input type="email" id="member_email_search" name="member_email" class="form-control search_table">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sale_team_sub_id_search">Area</label>
                                <select class="form-control custom-select select2" id="sale_team_sub_id_search" name="sale_team_sub_id" required>
                                    <option value="" required>เลือกเขตพื้นที่</option>
                                    @foreach($SaleArea as $val)
                                    <option value="{{ $val->sale_team_sub_id }}">{{ $val->sale_team_sub_name }}</option>
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
                    @if(App\Helper::CheckPermissionMenu('Member' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableMember" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Company</th>
                                <th scope="col">Member Name</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Details</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Tax ID</th>
                                <th scope="col">Address</th>
                                <th scope="col">Team</th>
                                <th scope="col">Sale</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                    <label for="member_name_th">Member Name</label>
                                    <input type="text" class="form-control" id="add_member_name_th" name="member_name_th" placeholder="" value="" required="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_id">Company</label>
                                    <select class="form-control custom-select select2" id="add_company_id" name="company_id" required>
                                        <option value="0">----Select----</option>
                                        @foreach( $Company as $val)
                                        <option value="{{ $val->company_id }}">{{ $val->company_name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_email">E-mail</label>
                                    <input type="email" class="form-control" id="add_member_email" name="member_email" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_phone">Phone</label>
                                    <input type="text" class="form-control" id="add_member_phone" name="member_phone" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_tax_id">Tax ID</label>
                                    <input type="text" class="form-control" id="add_member_tax_id" name="member_tax_id" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_details">Details</label>
                                    <input type="text" class="form-control" id="add_member_details" name="member_details" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_position">Position</label>
                                    <input type="text" class="form-control" id="add_member_position" name="member_position" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_department">Department</label>
                                    <input type="text" class="form-control" id="add_member_department" name="member_department" placeholder="" value="">
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h4>Address</h4>
                                        </div>
                                    </div>
                                    <div class="row address">
                                        <div class="col-md-6 mb-2">
                                            <label for="member_address_no">House No.</label>
                                            <input type="text" class="form-control" id="add_member_address_no" name="member_address_no" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="member_address_building">Bldg / Village</label>
                                            <input type="text" class="form-control" id="add_member_address_building" name="member_address_building" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="member_address_road">Rd.</label>
                                            <input type="text" class="form-control" id="add_member_address_road" name="member_address_road" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="member_address_alley">Lane</label>
                                            <input type="text" class="form-control" id="add_member_address_alley" name="member_address_alley" placeholder="" value="">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="provinces_id">Province</label>
                                            <select class="form-control custom-select select-province select2" id="add_provinces_id" name="" required>
                                                <option value="" required>เลือกจังหวัด</option>
                                                @foreach( $Provinces as $val)
                                                <option value="{{$val->provinces_id}}">{{$val->provinces_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amphures_id">District / Area</label>
                                            <select class="form-control custom-select select-amphur select2" id="add_amphures_id" name="" required>
                                                <option value="" required>เลือกอำเภอ</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="districts_id">Sub-district/ Sub-area</label>
                                            <select class="form-control custom-select select-district select2" id="add_districts_id" name="districts_id" required>
                                                <option value="" required>เลือกตำบล</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="member_status" name="member_status" checked="" value="1">
                                        <label class="custom-control-label" for="member_status">Active</label>
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
                                    <label for="member_name_th">Member Name</label>
                                    <input type="text" class="form-control" id="edit_member_name_th" name="member_name_th" placeholder="" value="" required="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="company_id">Company</label>
                                    <select class="form-control custom-select select2" id="edit_company_id" name="company_id" required>
                                        <option value="0">----Select----</option>
                                        @foreach( $Company as $val)
                                        <option value="{{ $val->company_id }}">{{ $val->company_name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_email">E-mail</label>
                                    <input type="email" class="form-control" id="edit_member_email" name="member_email" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_phone">Phone</label>
                                    <input type="text" class="form-control" id="edit_member_phone" name="member_phone" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_tax_id">Tax ID</label>
                                    <input type="text" class="form-control" id="edit_member_tax_id" name="member_tax_id" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_details">Details</label>
                                    <input type="text" class="form-control" id="edit_member_details" name="member_details" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_position">Position</label>
                                    <input type="text" class="form-control" id="edit_member_position" name="member_position" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="member_department">Department</label>
                                    <input type="text" class="form-control" id="edit_member_department" name="member_department" placeholder="" value="">
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h4>Address</h4>
                                        </div>
                                    </div>
                                    <div class="row editress">
                                        <div class="col-md-6 mb-2">
                                            <label for="member_editress_no">House No.</label>
                                            <input type="text" class="form-control" id="edit_member_address_no" name="member_address_no" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="member_editress_building">Bldg / Village</label>
                                            <input type="text" class="form-control" id="edit_member_address_building" name="member_address_building" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="member_editress_road">Rd.</label>
                                            <input type="text" class="form-control" id="edit_member_address_road" name="member_address_road" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="member_editress_alley">Lane</label>
                                            <input type="text" class="form-control" id="edit_member_address_alley" name="member_address_alley" placeholder="" value="">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="provinces_id">Province</label>
                                            <select class="form-control custom-select select-province select2" id="edit_provinces_id" name="" required>
                                                <option value="" required>เลือกจังหวัด</option>
                                                @foreach( $Provinces as $val)
                                                <option value="{{$val->provinces_id}}">{{$val->provinces_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="amphures_id">District / Area</label>
                                            <select class="form-control custom-select select-amphur select2" id="edit_amphures_id" name="" required>
                                                <option value="" required>เลือกอำเภอ</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="districts_id">Sub-district/ Sub-area</label>
                                            <select class="form-control custom-select select-district select2" id="edit_districts_id" name="districts_id" required>
                                                <option value="" required>เลือกตำบล</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_member_status" name="member_status" checked="" value="1">
                                        <label class="custom-control-label" for="edit_member_status">Active</label>
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
<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview" aria-modal="true">
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
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Member Name</label> </td>
                                    <td> <label for="example-text-input" id="show_member_name_th" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Details</label> </td>
                                    <td> <label for="example-text-input" id="show_member_details" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Driver</label> </td>
                                    <td> <label for="example-text-input" id="show_driver" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Company</label> </td>
                                    <td> <label for="example-text-input" id="show_member" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">E-mail</label> </td>
                                    <td> <label for="example-text-input" id="show_member_email" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Position</label> </td>
                                    <td> <label for="example-text-input" id="show_member_position" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Department</label> </td>
                                    <td> <label for="example-text-input" id="show_member_department" class="col-form-label">-</label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Phone</label> </td>
                                    <td> <label for="example-text-input" id="show_member_phone" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Tax Id</label> </td>
                                    <td> <label for="example-text-input" id="show_member_tax_id" class="col-form-label">-</label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Address</label> </td>
                                    <td> <label for="example-text-input" id="show_member_address" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Status</label> </td>
                                    <td> <label for="example-text-input" id="show_member_status" class="col-form-label"></label> </td>
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

@section('modal')
@include('admin.Member.Modal.modal_document_file')
@include('admin.Document.Modal.modal_document_file_add')
@endsection

@section('scripts')
<script>
    var tableMember = $('#tableMember').dataTable({
        "ajax": {
            "url": url_gb + "/admin/Member/Lists",
            "type": "POST",
            "data": function(d) {
                d.member_name_th = $('#member_name_th_search').val();
                d.member_phone = $('#member_phone_search').val();
                d.member_email = $('#member_email_search').val();
                d.sale_team_sub_id = $('#sale_team_sub_id_search').val();
                // etc
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status-member").bootstrapToggle();
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
                "data": "company_name_th",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "member_name_th",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "driver",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "member_details",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "member_email",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "member_phone",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "member_tax_id",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "address",
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
                "data": "sale_team_sub_name",
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
        $('#add_member_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/Member/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var province_id = data.districts ? data.districts.provinces_id : '';
            var amphure_id = data.districts ? data.districts.amphures_id : '';

            $("#edit_member_id").val(data.member_id);
            $("#edit_member_name_th").val(data.member_name_th);
            $("#edit_company_id").val(data.company_id).change();
            $("#edit_member_phone").val(data.member_phone);
            $("#edit_member_details").val(data.member_details);
            $("#edit_member_tax_id").val(data.member_tax_id);
            $("#edit_member_fax").val(data.member_fax);
            $("#edit_member_email").val(data.member_email);
            $("#edit_member_position").val(data.member_position);
            $("#edit_member_department").val(data.member_department);
            $("#edit_member_address_no").val(data.member_address_no);
            $("#edit_member_address_building").val(data.member_address_building);
            $("#edit_member_address_road").val(data.member_address_road);
            $("#edit_member_address_alley").val(data.member_address_alley);
            $("#edit_provinces_id").val(province_id).change();
            $.each(res.amphures, function(k, v) {
                $('#edit_amphures_id').append('<option value="' + v.amphures_id + '">' + v.amphures_name + '</option>');
            });
            $('#edit_amphures_id').val(amphure_id).change();
            $.each(res.districts, function(k, v) {
                $('#edit_districts_id').append('<option value="' + v.districts_id + '">' + v.districts_name + '</option>');
            });
            $('#edit_districts_id').val(data.districts_id).change();


            if (data.member_status == 1) {
                $('#edit_member_status').prop('checked', true);
            } else {
                $('#edit_member_status').prop('checked', false);
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
            url: url_gb + "/admin/Member/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if (data.member_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $.each(res.content.company, function(k, v) {
                $('#show_member').text(v.company_name_th);
            });
            $('#show_member_name_th').text(data.member_name_th);
            $("#show_company_id").text(data.company_id).change();
            $("#show_member_phone").text(data.member_phone);
            $("#show_member_tel").text(data.member_tel);
            $("#show_member_details").text(data.member_details);
            $("#show_member_tax_id").text(data.member_tax_id);
            $("#show_member_email").text(data.member_email);
            $("#show_member_position").text(data.member_position);
            $("#show_member_department").text(data.member_department);
            $("#show_member_address").text((data.member_address_no ? data.member_address_no : '') + ' ' + (data.member_address_building ? data.member_address_building : '') + ' ' + (data.member_address_road ? data.member_address_road : '') + ' ' + (data.member_address_alley ? data.member_address_alley : ''));
            $('#show_member_status').text(status);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.change-status-member', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Member/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // MemberDatatable();
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
            url: url_gb + "/admin/Member",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableMember.api().ajax.reload();
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
            url: url_gb + "/admin/Member/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#ModalEdit').modal('hide');
                tableMember.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-search', function(data) {
        tableMember.api().ajax.reload();
    })

    $('body').on('click', '.btn-clear-search', function(data) {
        $('#sale_team_sub_id_search').val('').change();
        $('#member_name_th_search').val('');
        $('#member_phone_search').val('');
        $('#member_email_search').val('');
        tableMember.api().ajax.reload();
    });

    $('body').on('click', '.btn-file-member', function() {
        var id = $(this).data('id');
        var company_id = $(this).data('company-id');
        $('#member_id').val(id);
        $('#company_id').val(company_id);
        $('#ModalFileDocument').modal('show');
        FileDocumentDatatable();
    });

    $('body').on('click', '.btn-add-file-document', function() {
        var member_id = $('#member_id').val();
        var company_id = $('#company_id').val();
        $('#add_file_company_id').val(company_id);
        $('#add_file_member_id').val(member_id);
        $('#ModalFileDocumentAdd').modal('show');
    });
</script>
@include('admin.Document.Script.script_document_file_add')
@include('admin.Script.script_address')
@endsection