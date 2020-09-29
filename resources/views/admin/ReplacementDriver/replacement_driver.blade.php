@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_driver_code">Driver ID</label>
                            <input type="text" id="search_driver_code" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_driver_id">Driver name</label>
                            <select class="form-control custom-select select2" id="search_driver_id">
                                <option value="">Select</option>
                                @foreach($Drivers as $val)
                                    <option value="{{$val->driver_id}}">{{$val->driver_name_th.' '.$val->driver_lastname_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_driver_id_card_no">ID card number</label>
                            <input type="text" id="search_driver_id_card_no" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_driver_age">Age range</label>
                            <select class="form-control custom-select select2" id="search_driver_age" name="driver_age">
                                <option value="">เลือกช่วงอายุ</option>
                                <option value="20-29">20 - 29</option>
                                <option value="30-39">30 - 39</option>
                                <option value="40-49">40 - 49</option>
                                <option value="50-59">50 - 59</option>
                                <option value="60-69">60 - 69</option>
                                <option value="70-79">70 - 79</option>
                                <option value="80-89">80 - 89</option>
                                <option value="90-99">90 - 99</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Start work date</label>
                            <input type="date" id="search_driver_working_date_start" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">To date</label>
                            <input type="date" id="search_driver_working_date_end" class="form-control">
                        </div>
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

<div class="row">
    <div class="col-md-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Replacement driver</h4>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tableReplacementDriver" class="table">
                            <thead>
                                <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Contract No. </th>
                                  <th scope="col">Customer </th>
                                  <th scope="col">Code</th>
                                  <th scope="col">พขร. เดิม</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Age</th>
                                  <th scope="col">ID card number</th>
                                  <th scope="col">ตำแหน่งงาน</th>
                                  <th scope="col">วันที่ลา </th>
                                  <th scope="col">ถึงวันที่ </th>
                                  <th scope="col">จำนวนวัน </th>
                                  <th scope="col">Code</th>
                                  <th scope="col">พขร. ทดแทน</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Age</th>
                                  <th scope="col">ID card number</th>
                                  <th scope="col">ตำแหน่งงาน</th>
                                  <th scope="col">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @section('modal')
@include('admin.JobRegister.Modal.modal_job_register_edit')
@include('admin.JobRegister.Modal.modal_job_register_view')
@include('admin.Driver.Modal.modal_driver_bank_type')
@include('admin.Driver.Modal.modal_driver_leave_view_date')
@include('admin.Driver.Modal.modal_pickup_equipment')
@include('admin.SignContract.Modal.modal_attach_contract')
@include('admin.JobRegister.Modal.modal_file_document')
@include('admin.JobRegister.Modal.modal_people_guarantee')
@include('admin.JobRegister.Modal.modal_people_guarantee_file')
@endsection
@section('scripts')
<script>
    var tableReplacementDriver = $('#tableReplacementDriver').dataTable({
        "ajax": {
            "url": url_gb + "/admin/ReplacementDriver/Lists",
            "type": "POST",
            "data": function(d) {
                d.driver_code = $('#search_driver_code').val();
                d.driver_id = $('#search_driver_id').val();
                d.driver_id_card_no = $('#search_driver_id_card_no').val();
                d.driver_age = $('#search_driver_age').val();
                d.driver_working_date_start = $('#search_driver_working_date_start').val();
                d.driver_working_date_end = $('#search_driver_working_date_end').val();
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {"data": "DT_RowIndex", "class": "text-center", "searchable": false, "sortable": false},
            {"data": "customer_contract_full_code", "name": "customer_contract.customer_contract_full_code"},
            {"data": "company_name_th", "name": "company.company_name_th"},
            {"data": "driver_code_ole", "name":"driver_ole.driver_code"},
            {"data": "driver_name_th_ole", "name":"driver_ole.driver_name_th"},
            {"data": "driver_name_en_ole", "name":"driver_ole.driver_name_en"},
            {"data": "driver_age_ole", "name":"driver_ole.driver_age"},
            {"data": "driver_id_card_no_ole", "name":"driver_ole.driver_id_card_no"},
            {"data": "recruitment_position_name_ole", "name":"recruitment_position_ole.recruitment_position_name"},
            {"data": "driver_working_date_start", "class": "text-center", "searchable": false, "sortable": false},
            {"data": "driver_working_date_end", "class": "text-center", "searchable": false, "sortable": false},
            {"data": "count_date","class": "text-center", "searchable": false, "sortable": false},
            {"data": "driver_code_new", "name":"driver_new.driver_code"},
            {"data": "driver_name_th_new", "name":"driver_new.driver_name_th"},
            {"data": "driver_name_en_new", "name":"driver_new.driver_name_en"},
            {"data": "driver_age_new", "name":"driver_new.driver_age"},
            {"data": "driver_id_card_no_new", "name":"driver_new.driver_id_card_no"},
            {"data": "recruitment_position_name_new", "name":"recruitment_position_new.recruitment_position_name"},
            {"data": "action", "name": "action", "searchable": false, "sortable": false, "class": "text-center"},

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

    $('body').on('click', '.btn-search', function(data) {
        tableReplacementDriver.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function(data) {
        $('#search_driver_code').val('');
        $('#search_driver_id').val('').change();
        $('#search_driver_id_card_no').val('');
        $('#search_driver_age').val('').change();
        $('#search_driver_working_date_start').val('');
        $('#search_driver_working_date_end').val('');
        tableReplacementDriver.api().ajax.reload();
    });
</script>
@include('admin.JobRegister.Script.script_job_register_edit')
@include('admin.JobRegister.Script.script_job_register_view')
@include('admin.Driver.Script.script_driver_bank_type')
@include('admin.Driver.Script.script_driver_leave_view_date')
@include('admin.Driver.Script.script_pickup_equipment')
@include('admin.SignContract.Script.script_attach_contract')
@include('admin.JobRegister.Script.script_file_document')
@include('admin.JobRegister.Script.script_people_guarantee')
@include('admin.JobRegister.Script.script_people_guarantee_file')
@endsection
