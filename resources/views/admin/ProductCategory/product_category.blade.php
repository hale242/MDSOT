@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
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
                                    <option value="">----Select----</option>
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
                        <div class="col-md-3">
                            <label for="gendedr">Gender</label> <br>
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="1" id="search_gender1" name='search_gender_id'>
                                    <label class="custom-control-label" for="search_gender1">ชาย</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="2" id="search_gender2" name='search_gender_id'>
                                    <label class="custom-control-label" for="search_gender2">หญิง</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="driver_language_name">Language ability</label>
                                <select class="form-control custom-select select2" id="search_driver_language">
                                    <option value="">----Select----</option>
                                    @if($LanguageTypes)
                                    @foreach($LanguageTypes as $LanguageType)
                                    <option value="{{ $LanguageType->language_type_id }}">{{ $LanguageType->language_type_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="recruitment_position_id">Position</label>
                                <select class="form-control custom-select select2" id="search_recruitment_position_id">
                                    <option value="">----Select----</option>
                                    @if($RecruitmentPositions)
                                    @foreach($RecruitmentPositions as $RecruitmentPosition)
                                    <option value="{{ $RecruitmentPosition->recruitment_position_id }}">{{ $RecruitmentPosition->recruitment_position_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Area</label>
                                <select class="form-control custom-select select2" id="search_sale_team_sub_name">
                                    <option value="">----Select----</option>
                                    <option value="1">ถนนเพชรเกษม / หนองแขม</option>
                                    <option value="2">ถนนทวีวัฒนา / หนองแขม</option>
                                    <option value="3">ถนนพุทธมณฑลสาย 3 / หนองแขม</option>
                                    <option value="4">ถนนกาญจนาภิเษก / บางกรวย</option>
                                    <option value="5">ถนนบางกรวย-ไทรน้อย / บางกรวย</option>
                                    <option value="6">ถนนนครอินทร์ / บางกรวย</option>
                                    <option value="7">ถนนเทพารักษ์ / บางพลี</option>
                                    <option value="8">ถนนกิ่งแก้ว / บางพลี</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="smoking">Smoking</label> <br>
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="1" id="smoking1" name="smoking">
                                    <label class="custom-control-label" for="smoking1">Yes</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="2" id="smoking2" name="smoking">
                                    <label class="custom-control-label" for="smoking2">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                <button type="button" class="btn btn-secondary clear-search btn-clear-search-driver">Clear</button>
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
                                <th scope="col">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">รหัสพนักงาน</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">Name</th>
                                <th scope="col">เลขบัตรประชาชน</th>
                                <th scope="col">ตำแหน่งงาน</th>
                                <th scope="col">วันที่เริ่มงานได้</th>
                                <th scope="col">แขวง/ตำบล</th>
                                <th scope="col">เขต/อำเภอ</th>
                                <th scope="col">จังหวัด</th>
                                <th scope="col">อายุ</th>
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
@include('admin.JobRegister.Modal.modal_job_register_view')
@endsection

@section('scripts')
<script>
    var tableJobRegister = $('#tableJobRegister').dataTable({
        "ajax": {
            "url": url_gb + "/admin/Driver/Lists",
            "type":"POST", "data": function( d ) {
                d.page_product_category = "{{isset($PageProductCategory) ? $PageProductCategory : ''}}";
                d.driver_id = $('#search_driver_id').val();
                d.driver_name = $('#search_driver_name').val();
                d.driver_lastname = $('#search_driver_lastname').val();
                d.driver_id_card_no = $('#search_driver_id_card_no').val();
                d.driver_age = $('#search_driver_age').val();
                d.driver_availlale_date = $('#search_driver_availlale_date').val();
                d.driver_availlale_end = $('#search_driver_availlale_end').val();
                d.driver_status = $('#search_driver_status').val();
                d.recruitment_position_id = $("#search_recruitment_position_id").val();
                d.driver_language = $("#search_driver_language").val();
                d.gender_id = $("input[name='search_gender_id']:checked").val();
                // etc
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            // {"data" : "checkbox" , "class":"text-center" , "searchable": false, "sortable": false,},
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
                "data": "status",
                "class": "text-center"
            }
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
        $('#search_recruitment_position_id').val('').change();
        
        $("input[name='search_gender_id']:checked").prop('checked', false);
        $('#search_driver_language').val('').change();

        tableJobRegister.api().ajax.reload();
    });
</script>
@include('admin.JobRegister.Script.script_job_register_view')
@endsection