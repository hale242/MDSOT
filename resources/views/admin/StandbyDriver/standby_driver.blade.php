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
                                    <label class="control-label">รหัสพนักงาน</label>
                                    <input type="text" id="search_driver_id" class="form-control search_table number-only">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_driver_name">ชื่อ</label>
                                    <input type="text" id="search_driver_name" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_driver_lastname">นามสกุล</label>
                                    <input type="text" id="search_driver_lastname" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="driver_id_card_no">เลขบัตรประชาชน</label>
                                    <input type="text" id="search_driver_id_card_no" class="form-control search_table number-only">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_driver_age">ช่วงอายุ</label>
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
                                    <label for="driver_status">Driver status</label>
                                    <select class="form-control custom-select select2" id="search_driver_status" class="form-control search_table">
                                        <option value="">Select</option>
                                        <option value="1">Standby</option>
                                        <option value="2">Replace</option>
                                        <option value="3">Contract</option>
                                        <option value="99">Dismissal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">เริ่มต้น (วันที่เริ่มงาน)</label>
                                    <input type="date" id="search_driver_availlale_date" class="form-control search_table">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">สิ้นสุด (วันที่เริ่มงาน)</label>
                                    <input type="date" id="search_driver_availlale_end" class="form-control search_table">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                        <button type="button" class="btn btn-secondary clear-search btn-clear-search-driver">Clear</button>
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
                    @if(App\Helper::CheckPermissionMenu('Driver' , '2'))
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableJobRegister" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">รหัสพนักงาน</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">Name</th>
                                <th scope="col">เลขบัตรประชาชน</th>
                                <th scope="col">ตำแหน่งงาน</th>
                                <th scope="col">รายได้รวมที่ต้องการ</th>
                                <th scope="col">วันที่เริ่มงานได้</th>
                                <th scope="col">แขวง/ตำบล</th>
                                <th scope="col">เขต/อำเภอ</th>
                                <th scope="col">จังหวัด</th>
                                <th scope="col">อายุ</th>
                                <th scope="col">โทรศัพท์มือถือ</th>
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
    var tableJobRegister = $('#tableJobRegister').dataTable({
        "ajax": {
            "url": url_gb + "/admin/Driver/Lists",
            "type": "POST",
            "data": function(d) {
                d.driver_id = $('#search_driver_id').val(),
                    d.driver_name = $('#search_driver_name').val(),
                    d.driver_lastname = $('#search_driver_lastname').val(),
                    d.driver_id_card_no = $('#search_driver_id_card_no').val()
                d.driver_age = $('#search_driver_age').val()
                d.driver_availlale_date = $('#search_driver_availlale_date').val()
                d.driver_availlale_end = $('#search_driver_availlale_end').val()
                d.driver_status = $('#search_driver_status').val()
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
                "data": "driver_code",
                "class": "text-center"
            },
            {
                "data": "name_th",
                "class": "text-center"
            },
            {
                "data": "name_en",
                "class": "text-center"
            },
            {
                "data": "driver_id_card_no",
                "class": "text-center"
            },
            {
                "data": "recruitment_position_name",
                "class": "text-center"
            },
            {
                "data": "driver_expected_salary",
                "class": "text-center"
            },
            {
                "data": "driver_availlale_date",
                "class": "text-center"
            },
            {
                "data": "provinces_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "amphures_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "districts_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "driver_age",
                "class": "text-center"
            },
            {
                "data": "driver_phone",
                "class": "text-center",
                "searchable": false,
                "sortable": false
            },
            {
                "data": "status",
                "class": "text-center"
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
        tableJobRegister.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search-driver', function() {
        $('#search_driver_id').val('');
        $('#search_driver_name').val('');
        $('#search_driver_lastname').val('');
        $('#search_driver_id_card_no').val('');
        $('#search_driver_age').val('').change();
        $('#search_driver_availlale_date').val('');
        $('#search_driver_availlale_end').val('');
        $('#search_driver_status').val('').change();
        tableJobRegister.api().ajax.reload();
    });

    $('body').on('change', '.change-status-driver', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Driver/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableDriver.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
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