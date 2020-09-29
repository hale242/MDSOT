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
                                <label class="control-label">Contact info ID</label>
                                <input type="text" id="customer_code_search" name="customer_code" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Contact of name</label>
                                <input type="text" id="customer_name_search" name="customer_name" class="form-control search_table" placeholder="">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Phone</label>
                                <input type="text" id="customer_phone_search" name="customer_phone" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Tel</label>
                                <input type="text" id="customer_tel_search" name="customer_tel" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">E-mail</label>
                                <input type="email" id="customer_email_search" name="customer_email" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Bill Status</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customer_bill_status_search" name="customer_bill_status" class="custom-control-input search_table_check">
                                    <label class="custom-control-label" for="customer_bill_status_search">Bill Status</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sale_team_sub_id">Area</label>
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
                    @if(App\Helper::CheckPermissionMenu('ContactInfo' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableContactInfo" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Company</th>
                                <th scope="col">Contact info Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Line</th>
                                <th scope="col">Fax</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Address</th>
                                <th scope="col">Bill Status</th>
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
@endsection @section('modal')
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
                                    <label for="customer_code">Contact info ID</label>
                                    <input type="text" class="form-control" id="add_customer_code" name="customer_code" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_name">Contact info Name</label>
                                    <input type="text" class="form-control" id="add_customer_name" name="customer_name" placeholder="" value="" required="">
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
                                    <label for="customer_phone">Phone</label>
                                    <input type="text" class="form-control" id="add_customer_phone" name="customer_phone" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_tel">Tel</label>
                                    <input type="text" class="form-control" id="add_customer_tel" name="customer_tel" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_line">Line</label>
                                    <input type="text" class="form-control" id="add_customer_line" name="customer_line" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_fax">Fax</label>
                                    <input type="text" class="form-control" id="add_customer_fax" name="customer_fax" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_email">E-mail</label>
                                    <input type="email" class="form-control" id="add_customer_email" name="customer_email" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_position">Position</label>
                                    <input type="text" class="form-control" id="add_customer_position" name="customer_position" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_department">Department</label>
                                    <input type="text" class="form-control" id="add_customer_department" name="customer_department" placeholder="" value="">
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
                                            <label for="customer_address_no">House No.</label>
                                            <input type="text" class="form-control" id="add_customer_address_no" name="customer_address_no" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="customer_address_building">Bldg / Village</label>
                                            <input type="text" class="form-control" id="add_customer_address_building" name="customer_address_building" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="customer_address_road">Rd.</label>
                                            <input type="text" class="form-control" id="add_customer_address_road" name="customer_address_road" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="customer_address_alley">Lane</label>
                                            <input type="text" class="form-control" id="add_customer_address_alley" name="customer_address_alley" placeholder="" value="">
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
                                    <label for="radio">Billing Status</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customer_bill_status" name="">
                                        <label class="custom-control-label" for="customer_bill_status">Billing Status</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customer_status" name="customer_status" checked="" value="1">
                                        <label class="custom-control-label" for="customer_status">Active</label>
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
                                    <label for="customer_id">Contact info ID</label>
                                    <input type="text" class="form-control" id="edit_customer_code" name="customer_code" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_name">Contact info Name</label>
                                    <input type="text" class="form-control" id="edit_customer_name" name="customer_name" placeholder="" value="" required>
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
                                    <label for="customer_phone">Phone</label>
                                    <input type="text" class="form-control" id="edit_customer_phone" name="customer_phone" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_tel">Tel</label>
                                    <input type="text" class="form-control" id="edit_customer_tel" name="customer_tel" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_line">Line</label>
                                    <input type="text" class="form-control" id="edit_customer_line" name="customer_line" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_fax">Fax</label>
                                    <input type="text" class="form-control" id="edit_customer_fax" name="customer_fax" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_email">E-mail</label>
                                    <input type="email" class="form-control" id="edit_customer_email" name="customer_email" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_position">Position</label>
                                    <input type="text" class="form-control" id="edit_customer_position" name="customer_position" placeholder="" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="customer_department">Department</label>
                                    <input type="text" class="form-control" id="edit_customer_department" name="customer_department" placeholder="" value="">
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
                                            <label for="customer_address_no">House No.</label>
                                            <input type="text" class="form-control" id="edit_customer_address_no" name="customer_address_no" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="customer_address_building">Bldg / Village</label>
                                            <input type="text" class="form-control" id="edit_customer_address_building" name="customer_address_building" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="customer_address_road">Rd.</label>
                                            <input type="text" class="form-control" id="edit_customer_address_road" name="customer_address_road" placeholder="" value="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="customer_address_alley">Lane</label>
                                            <input type="text" class="form-control" id="edit_customer_address_alley" name="customer_address_alley" placeholder="" value="">
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
                                                <option value="">เลือกอำเภอ</option>

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
                                    <label for="radio">Billing Status</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="edit_customer_bill_status" name="">
                                        <label class="custom-control-label" for="edit_customer_bill_status">Billing Status</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_customer_status" name="customer_status" checked="" value="1">
                                        <label class="custom-control-label" for="edit_customer_status">Active</label>
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
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Company name</label> </td>
                                    <td> <label for="example-text-input" id="show_customer" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Contact info Name</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_name" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Phone</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_phone" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Tel</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_tel" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Line</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_line" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Fax</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_fax" class="col-form-label">-</label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">E-mail</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_email" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Position</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_position" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Department</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_department" class="col-form-label">-</label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Bill Status</label> </td>
                                    <td> <label for="example-text-input" id="" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Address</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_address" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td width="390"> <label for="example-text-input" class="col-form-label">Status</label> </td>
                                    <td> <label for="example-text-input" id="show_customer_status" class="col-form-label"></label> </td>
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
@include('admin.ContactInfo.Modal.modal_contact')
@include('admin.ContactInfo.Modal.modal_document_file')
@include('admin.Document.Modal.modal_document_file_add')
@endsection
@section('scripts')
<script>
    var tableContactInfo = $('#tableContactInfo').dataTable({
        "ajax": {
            "url": url_gb + "/admin/ContactInfo/Lists",
            "type": "POST",
            "data": function(d) {
                d.customer_code = $('#customer_code_search').val();
                d.sale_team_sub_id = $('#sale_team_sub_id_search').val();
                d.customer_name = $('#customer_name_search').val();
                d.customer_phone = $('#customer_phone_search').val();
                d.customer_tel = $('#customer_tel_search').val();
                d.customer_email = $('#customer_email_search').val();


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
            },            {
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
                "data": "customer_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "customer_phone",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "customer_tel",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "customer_line",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "customer_fax",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "customer_email",
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
                "data": "billing_status",
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
        $('#add_customer_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/ContactInfo/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var province_id = data.districts ? data.districts.provinces_id : '';
            var amphure_id = data.districts ? data.districts.amphures_id : '';
            $("#edit_customer_code").val(data.customer_code);
            $("#edit_customer_name").val(data.customer_name);
            $("#edit_company_id").val(data.company_id).change();
            $("#edit_customer_phone").val(data.customer_phone);
            $("#edit_customer_tel").val(data.customer_tel);
            $("#edit_customer_line").val(data.customer_line);
            $("#edit_customer_fax").val(data.customer_fax);
            $("#edit_customer_email").val(data.customer_email);
            $("#edit_customer_position").val(data.customer_position);
            $("#edit_customer_department").val(data.customer_department);
            $("#edit_customer_address_no").val(data.customer_address_no);
            $("#edit_customer_address_building").val(data.customer_address_building);
            $("#edit_customer_address_road").val(data.customer_address_road);
            $("#edit_customer_address_alley").val(data.customer_address_alley);
            $("#edit_provinces_id").val(province_id).change();
            $.each(res.amphures, function(k, v) {
                $('#edit_amphures_id').append('<option value="' + v.amphures_id + '">' + v.amphures_name + '</option>');
            });
            $('#edit_amphures_id').val(amphure_id).change();
            $.each(res.districts, function(k, v) {
                $('#edit_districts_id').append('<option value="' + v.districts_id + '">' + v.districts_name + '</option>');
            });
            $('#edit_districts_id').val(data.districts_id).change();


            if (data.customer_status == 1) {
                $('#edit_customer_status').prop('checked', true);
            } else {
                $('#edit_customer_status').prop('checked', false);
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
            url: url_gb + "/admin/ContactInfo/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if (data.customer_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            $.each(res.content.company, function(k, v) {
                $('#show_customer').text(v.company_name_th);
            });
            $('#show_customer_name').text(data.customer_name);
            $("#show_company_id").text(data.company_id).change();
            $("#show_customer_phone").text(data.customer_phone);
            $("#show_customer_tel").text(data.customer_tel);
            $("#show_customer_line").text(data.customer_line);
            $("#show_customer_fax").text(data.customer_fax);
            $("#show_customer_email").text(data.customer_email);
            $("#show_customer_position").text(data.customer_position);
            $("#show_customer_department").text(data.customer_department);
            $("#show_customer_address").text((data.customer_address_no ? data.customer_address_no : '') + ' ' + (data.customer_address_building ? data.customer_address_building : '') + ' ' + (data.customer_address_road ? data.customer_address_road : '') + ' ' + (data.customer_address_alley ? data.customer_address_alley : ''));
            $('#show_customer_status').text(status);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.change-status-contact-info', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/ContactInfo/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // ContactInfoDatatable();
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
            url: url_gb + "/admin/ContactInfo",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                ContactInfoDatatable();
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
            url: url_gb + "/admin/ContactInfo/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableContactInfo.api().ajax.reload();
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
        tableContactInfo.api().ajax.reload();
    })

    $('body').on('click', '.btn-clear-search', function(data) {
        $('#customer_code_search').val('');
        $('#sale_team_sub_id_search').val('').change();
        $('#customer_name_search').val('');
        $('#customer_phone_search').val('');
        $('#customer_tel_search').val('');
        $('#customer_email_search').val('');
        tableContactInfo.api().ajax.reload();
    });

    $('body').on('click', '.btn-file', function() {
        var id = $(this).data('id');
        var company_id = $(this).data('company-id');
        $('#customer_id').val(id);
        $('#company_id').val(company_id);
        $('#ModalFileDocument').modal('show');
        FileDocumentDatatable();
    });

    $('body').on('click', '.btn-add-file-document', function() {
        var customer_id = $('#customer_id').val();
        var company_id = $('#company_id').val();
        $('#add_file_company_id').val(company_id);
        $('#add_file_customer_id').val(customer_id);
        $('#ModalFileDocumentAdd').modal('show');
    });
</script>
@include('admin.Script.script_address')
@include('admin.ContactInfo.Script.script_contact')
@include('admin.Document.Script.script_document_file_add')
@endsection