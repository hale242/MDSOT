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
                                    <label class="control-label">Item code</label>
                                    <select class="form-control custom-select select2" id="search_item_code_id">
                                        <option value="">----Selest----</option>
                                        @foreach($ItemCodes as $val)
                                        <option value="{{$val->item_code_id}}">{{$val->item_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Price structure name</label>
                                    <input type="text" id="search_price_structure_name" class="form-control">
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
                    @if(App\Helper::CheckPermissionMenu('PriceStructure' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tablePriceStructure" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Item code</th>
                                <th scope="col">Price structure name</th>
                                <th scope="col">Sale price</th>
                                <th scope="col">Margin (Baht)</th>
                                <th scope="col">Margin (Percen)</th>
                                <th scope="col">Date start</th>
                                <th scope="col">Applicant</th>
                                <th scope="col">Price structure status</th>
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
                                    <label for="add_item_code_id">Item code</label>
                                    <select class="form-control custom-select select2" name="item_code_id" id="add_item_code_id" required>
                                        <option value="">----Selest----</option>
                                        @foreach($ItemCodes as $val)
                                        <option value="{{$val->item_code_id}}">{{$val->item_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_name">Price structure name</label>
                                    <input type="text" class="form-control" id="add_price_structure_name" name="price_structure_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="price_structure_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_price_structure_details" name="price_structure_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="add_price_structure_salary">Salary driver</label>
                                    <input type="text" class="form-control price price_structure_salary" id="add_price_structure_salary" name="price_structure_salary" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_sum">Sale Price</label>
                                    <input type="text" class="form-control price price_structure_sale_price" id="add_price_structure_sale_price" name="price_structure_sale_price" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_sum">Cost Price</label>
                                    <input type="text" class="form-control price" id="add_price_structure_sum" name="price_structure_sum" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_profit_price">Margin (Baht)</label>
                                    <input type="text" class="form-control price" id="add_price_structure_profit_price" name="price_structure_profit_price" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_profit_percen">Margin (Percen) </label>
                                    <input type="number" class="form-control profit_percen" id="add_price_structure_profit_percen" name="price_structure_profit_percen" min="1" max="100" readonly>
                                </div>
                                <div class="col-md-6 mb-3"></div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_taxi_price">Taxi price (Driver)</label>
                                    <input type="text" class="form-control price" id="add_price_structure_taxi_price" name="price_structure_taxi_price" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_taxi_price_sale">Taxi price (Customer)</label>
                                    <input type="text" class="form-control price" id="add_price_structure_taxi_price_sale" name="price_structure_taxi_price_sale" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_travel">Travel allowances (Driver)</label>
                                    <input type="text" class="form-control price" id="add_price_structure_travel" name="price_structure_travel" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_travel_sale">Travel allowances (Customer)</label>
                                    <input type="text" class="form-control price" id="add_price_structure_travel_sale" name="price_structure_travel_sale" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_accomadation">Allowances provincial (Driver)</label>
                                    <input type="text" class="form-control price" id="add_price_structure_accomadation" name="price_structure_accomadation" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_accomadation_sale">Allowances provincial (Customer)</label>
                                    <input type="text" class="form-control price" id="add_price_structure_accomadation_sale" name="price_structure_accomadation_sale" required>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td scope="col" align="center">OT</td>
                                                <td scope="col" align="center">Use this OT</td>
                                                <!-- <td scope="col" align="center">Calculated from base salary</td> -->
                                                <td scope="col" align="center">Driver</td>
                                                <td scope="col" align="center">Customer</td>
                                            </tr>
                                        </thead>
                                        <tbody class="rate-ot-item">
                                            @foreach($PriceStructureOT as $key=>$val)
                                            <tr>
                                                <input type="hidden" name="price_structure_has[{{$key}}][price_structure_ot_id]" value="{{$val->price_structure_ot_id}}">
                                                <input type="hidden" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_name]" value="{{$val->price_structure_ot_name}}">
                                                <input type="hidden" class="structure_lv" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_lv]" value="{{$val->price_structure_ot_lv}}">
                                                <td>{{$val->price_structure_ot_name}}</td>
                                                <td align="center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input structure_status_ot" id="add_status_{{$val->price_structure_ot_id}}" name="price_structure_has[{{$key}}][status]" value="1">
                                                        <label class="custom-control-label" for="add_status_{{$val->price_structure_ot_id}}">Yes</label>
                                                    </div>
                                                </td>
                                                <!-- <td align="center">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input structure_status_ot" id="add_price_structure_ot_has_price_structure_status_ot_{{$val->price_structure_ot_id}}" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_status_ot]" value="1">
                                                            <label class="custom-control-label" for="add_price_structure_ot_has_price_structure_status_ot_{{$val->price_structure_ot_id}}">Yes</label>
                                                        </div>
                                                    </td> -->
                                                <td>
                                                    <input type="text" class="form-control price structure_price" id="add_price_structure_ot_has_price_structure_price_{{$val->price_structure_ot_id}}" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_price]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control price structure_price_sale" id="add_price_structure_ot_has_price_structure_price_sale_{{$val->price_structure_ot_id}}" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_price_sale]">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_date_start">Date start</label>
                                    <input type="date" class="form-control" id="add_price_structure_date_start" name="price_structure_date_start" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="price_structure_approve_comment">Comment</label>
                                    <textarea cols="80" class="form-control" id="add_price_structure_approve_comment" name="price_structure_approve_comment" rows="3"></textarea>
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

<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="add_item_code_id">Item code</label>
                                    <select class="form-control custom-select select2" name="item_code_id" id="edit_item_code_id" required>
                                        <option value="">----Selest----</option>
                                        @foreach($ItemCodes as $val)
                                        <option value="{{$val->item_code_id}}">{{$val->item_code_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_name">Price structure name</label>
                                    <input type="text" class="form-control" id="edit_price_structure_name" name="price_structure_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="price_structure_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_price_structure_details" name="price_structure_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_salary">Salary driver</label>
                                    <input type="text" class="form-control price price_structure_salary" id="edit_price_structure_salary" name="price_structure_salary" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_sum">Sale Price</label>
                                    <input type="text" class="form-control price price_structure_sale_price" id="edit_price_structure_sale_price" name="price_structure_sale_price" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_sum">Cost Price</label>
                                    <input type="text" class="form-control price" id="edit_price_structure_sum" name="price_structure_sum" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_profit_price">Margin (Baht)</label>
                                    <input type="text" class="form-control price" id="edit_price_structure_profit_price" name="price_structure_profit_price" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_profit_percen">Margin (Percen) </label>
                                    <input type="number" class="form-control profit_percen" id="edit_price_structure_profit_percen" name="price_structure_profit_percen" min="1" max="100" readonly>
                                </div>
                                <div class="col-md-6 mb-3"></div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_taxi_price">Taxi price (Driver)</label>
                                    <input type="text" class="form-control price" id="edit_price_structure_taxi_price" name="price_structure_taxi_price" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_taxi_price_sale">Taxi price (Customer)</label>
                                    <input type="text" class="form-control price" id="edit_price_structure_taxi_price_sale" name="price_structure_taxi_price_sale" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_travel">Travel allowances (Driver)</label>
                                    <input type="text" class="form-control price" id="edit_price_structure_travel" name="price_structure_travel" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_travel_sale">Travel allowances (Customer)</label>
                                    <input type="text" class="form-control price" id="edit_price_structure_travel_sale" name="price_structure_travel_sale" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_accomadation">Allowances provincial (Driver)</label>
                                    <input type="text" class="form-control price" id="edit_price_structure_accomadation" name="price_structure_accomadation" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_accomadation_sale">Allowances provincial (Customer)</label>
                                    <input type="text" class="form-control price" id="edit_price_structure_accomadation_sale" name="price_structure_accomadation_sale" required>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td scope="col" align="center">OT</td>
                                                <td scope="col" align="center">Use this OT</td>
                                                <!-- <td scope="col" align="center">Calculated from base salary</td> -->
                                                <td scope="col" align="center">Driver</td>
                                                <td scope="col" align="center">Customer</td>
                                            </tr>
                                        </thead>
                                        <tbody class="rate-ot-item">
                                            @foreach($PriceStructureOT as $key=>$val)
                                            <tr>
                                                <input type="hidden" name="price_structure_has[{{$key}}][price_structure_ot_id]" value="{{$val->price_structure_ot_id}}">
                                                <input type="hidden" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_name]" value="{{$val->price_structure_ot_name}}">
                                                <input type="hidden" class="structure_lv" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_lv]" value="{{$val->price_structure_ot_lv}}">
                                                <td>{{$val->price_structure_ot_name}}</td>
                                                <td align="center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input structure_status_ot" id="edit_status_{{$val->price_structure_ot_id}}" name="price_structure_has[{{$key}}][status]" value="1">
                                                        <label class="custom-control-label" for="edit_status_{{$val->price_structure_ot_id}}">Yes</label>
                                                    </div>
                                                </td>
                                                <!-- <td align="center">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="edit_price_structure_ot_has_price_structure_status_ot_{{$val->price_structure_ot_id}}" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_status_ot]" value="1">
                                                            <label class="custom-control-label" for="edit_price_structure_ot_has_price_structure_status_ot_{{$val->price_structure_ot_id}}">Yes</label>
                                                        </div>
                                                    </td> -->
                                                <td>
                                                    <input type="text" class="form-control price structure_price" id="edit_price_structure_ot_has_price_structure_price_{{$val->price_structure_ot_id}}" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_price]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control price structure_price_sale" id="edit_price_structure_ot_has_price_structure_price_sale_{{$val->price_structure_ot_id}}" name="price_structure_has[{{$key}}][price_structure_ot_has_price_structure_price_sale]">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="price_structure_date_start">Date start</label>
                                    <input type="date" class="form-control" id="edit_price_structure_date_start" name="price_structure_date_start" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="price_structure_approve_comment">Comment</label>
                                    <textarea cols="80" class="form-control" id="edit_price_structure_approve_comment" name="price_structure_approve_comment" rows="3"></textarea>
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
@include('admin.PriceStructure.Modal.modal_price_structure_view')
@include('admin.PriceStructure.Modal.modal_staff_cost')
@include('admin.PriceStructure.Modal.modal_other_expenses')
@include('admin.PriceStructure.Modal.modal_insurance_fee')
@include('admin.PriceStructure.Modal.modal_line_approve')
@endsection
@section('scripts')
<script>
    var tablePriceStructure = $('#tablePriceStructure').dataTable({
        "ajax": {
            "url": url_gb + "/admin/PriceStructure/Lists",
            "type": "POST",
            "data": function(d) {
                d.item_code_id = $('#search_item_code_id').val();
                d.price_structure_name = $('#search_price_structure_name').val();
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
                "data": "item_code_name",
                "name": "item_code.item_code_name"
            },
            {
                "data": "price_structure_name"
            },
            {
                "data": "price_structure_sale_price",
                "searchable": false
            },
            {
                "data": "price_structure_profit_price",
                "searchable": false
            },
            {
                "data": "price_structure_profit_percen"
            },
            {
                "data": "price_structure_date_start",
                "class": "text-center",
                "sortable": false
            },
            {
                "data": "admin_name_approve",
                "name": "admin_approve.first_name"
            },
            {
                "data": "price_structure_approve_status",
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
        tablePriceStructure.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_item_code_id').val('').change();
        $('#search_price_structure_name').val('');
        tablePriceStructure.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/PriceStructure/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var salary = data.price_structure_salary ? data.price_structure_salary : 0;
            var sale_price = data.price_structure_sale_price ? data.price_structure_sale_price : 0;
            var sum = data.price_structure_sum ? data.price_structure_sum : 0;
            var profit_price = data.price_structure_profit_price ? data.price_structure_profit_price : 0;
            var taxi_price = data.price_structure_taxi_price ? data.price_structure_taxi_price : 0;
            var taxi_price_sale = data.price_structure_taxi_price_sale ? data.price_structure_taxi_price_sale : 0;
            var travel = data.price_structure_travel ? data.price_structure_travel : 0;
            var travel_sale = data.price_structure_travel_sale ? data.price_structure_travel_sale : 0;
            var accomadation = data.price_structure_accomadation ? data.price_structure_accomadation : 0;
            var accomadation_sale = data.price_structure_accomadation_sale ? data.price_structure_accomadation_sale : 0;
            $("#edit_item_code_id").val(data.item_code_id).change();
            $("#edit_price_structure_name").val(data.price_structure_name);
            $("#edit_price_structure_details").val(data.price_structure_details);
            $("#edit_price_structure_salary").val(addNumformat(salary.toFixed(2)));
            $("#edit_price_structure_sale_price").val(addNumformat(sale_price.toFixed(2)));
            $("#edit_price_structure_sum").val(addNumformat(sum.toFixed(2)));
            $("#edit_price_structure_profit_price").val(addNumformat(profit_price.toFixed(2)));
            $("#edit_price_structure_profit_percen").val(data.price_structure_profit_percen);
            $("#edit_price_structure_taxi_price").val(addNumformat(taxi_price.toFixed(2)));
            $("#edit_price_structure_taxi_price_sale").val(addNumformat(taxi_price_sale.toFixed(2)));
            $("#edit_price_structure_travel").val(addNumformat(travel.toFixed(2)));
            $("#edit_price_structure_travel_sale").val(addNumformat(travel_sale.toFixed(2)));
            $("#edit_price_structure_accomadation").val(addNumformat(accomadation.toFixed(2)));
            $("#edit_price_structure_accomadation_sale").val(addNumformat(accomadation_sale.toFixed(2)));
            $("#edit_price_structure_date_start").val(data.price_structure_date_start);
            $("#edit_price_structure_approve_comment").val(data.price_structure_approve_comment);
            $.each(data.price_structure_ot_has_price_structure, function(k, v) {
                var price = v.price_structure_ot_has_price_structure_price ? v.price_structure_ot_has_price_structure_price : 0;
                var price_sale = v.price_structure_ot_has_price_structure_price_sale ? v.price_structure_ot_has_price_structure_price_sale : 0;
                $('#edit_status_' + v.price_structure_ot_id).prop('checked', true);
                if (v.price_structure_ot_has_price_structure_status_ot == 1) {
                    $('#edit_price_structure_ot_has_price_structure_status_ot_' + v.price_structure_ot_id).prop('checked', true);
                }
                $('#edit_price_structure_ot_has_price_structure_price_' + v.price_structure_ot_id).val(addNumformat(price.toFixed(2)));
                $('#edit_price_structure_ot_has_price_structure_price_sale_' + v.price_structure_ot_id).val(addNumformat(price_sale.toFixed(2)));
            });
            $('#ModalEdit').modal('show');
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
            url: url_gb + "/admin/PriceStructure",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_item_code_id').val('').change();
                tablePriceStructure.api().ajax.reload();
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
            url: url_gb + "/admin/PriceStructure/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tablePriceStructure.api().ajax.reload();
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
@include('admin.PriceStructure.Script.script_price_structure_view')
@include('admin.PriceStructure.Script.script_calculator_ot')
@include('admin.PriceStructure.Script.script_staff_cost')
@include('admin.PriceStructure.Script.script_other_expenses')
@include('admin.PriceStructure.Script.script_insurance_fee')
@include('admin.PriceStructure.Script.script_price_structure_send_approve')
@include('admin.PriceStructure.Script.script_line_approve')
@endsection