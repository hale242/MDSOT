@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <button id="swapSearch" type="button" class="btn btn-outline-secondary m-t-10 mb-0 mr-1 float-right newdata showSerach showSearch" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                    <span class="ti-angle-down"></span>
                </button>
                <div class="collapse" id="collapseExample">
                <form id="FormSearch" class="needs-validation" novalidate>
                  <div class="row pt-3">
                      <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label" for="search_driver_name">Run number</label>
                              <input type="text" id="search_driver_interview_run_code" class="form-control search_table">
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
                              <label for="search_driver_status_job_app">สถานะสัมภาษณ์</label>
                              <select class="form-control custom-select select2" id="search_driver_status_job_app">
                                  <option value="">เลือกสถานะสัมภาษณ์</option>
                                  @foreach($StatusJobApps as $key=>$val)
                                      <option value="{{$key}}">{{$val}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label" for="search_driver_interview_date_start">เริ่มต้น (วันที่สัมภาษณ์)</label>
                              <input type="date" id="search_driver_interview_date_start" class="form-control search_table">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label" for="search_driver_interview_date_end">สิ้นสุด (วันที่สัมภาษณ์)</label>
                              <input type="date" id="search_driver_interview_date_end" name="driver_availlale_date" class="form-control search_table">
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
                </div>
                <div class="table-responsive">
                    <table id="tableInterview" class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center" style="width: 90px;">Actions</th>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Run number</th>
                                <th scope="col" class="text-center">ชื่อ - นามสกุล</th>
                                <th scope="col" class="text-center">Firstame - Lastname</th>
                                <th scope="col" class="text-center">เลขบัตรประชาชน</th>
                                <th scope="col" class="text-center">ตำแหน่งงาน</th>
                                <th scope="col" class="text-center">รายได้รวมที่ต้องการ</th>
                                <th scope="col" class="text-center">วันที่เริ่มงานได้</th>
                                <th scope="col" class="text-center">แขวง/ตำบล</th>
                                <th scope="col" class="text-center">เขต/อำเภอ</th>
                                <th scope="col" class="text-center">จังหวัด</th>
                                <th scope="col" class="text-center">อายุ</th>
                                <th scope="col" class="text-center">โทรศัพท์มือถือ</th>
                                <th scope="col" class="text-center">วันที่สัมภาษณ์</th>
                                <th scope="col" class="text-center">สถานะสัมภาษณ์</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
<div class="modal fade" id="ModalCriminalDate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Date of check criminal / health</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormCriminalDate" class="needs-validation" novalidate>
                <input type="hidden" id="driver_interview_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="add_driver_interview_criminal_date">Date</label>
                                    <input type="datetime-local" class="form-control" id="add_driver_interview_criminal_date" name="driver_interview_criminal_date" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-success btn-submit-criminal-date"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    var tableInterview = $('#tableInterview').dataTable({
        "ajax": {
            "url": url_gb+"/admin/Interview/Lists",
            "type":"POST", "data": function ( d ) {
              d.driver_interview_run_code = $('#search_driver_interview_run_code').val(),
              d.driver_name = $('#search_driver_name').val(),
              d.driver_lastname = $('#search_driver_lastname').val(),
              d.driver_id_card_no = $('#search_driver_id_card_no').val(),
              d.driver_age = $('#search_driver_age').val(),
              d.driver_status_job_app = $('#search_driver_status_job_app').val(),
              d.driver_interview_date_start = $('#search_driver_interview_date_start').val(),
              d.driver_interview_date_end = $('#search_driver_interview_date_end').val()
            }
        },
        "drawCallback": function( settings ) {
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
            {"data" : "driver_interview_run_code" , "name": "driver_interview.driver_interview_run_code"},
            {"data" : "name_th" , "name": "driver_name_th"},
            {"data" : "name_en" , "name": "driver_name_en"},
            {"data" : "driver_id_card_no"},
            {"data" : "recruitment_position_name" , "name":"recruitment_position.recruitment_position_name"},
            {"data" : "driver_expected_salary", "class":"text-right", "searchable": false, "sortable": false,},
            {"data" : "driver_availlale_date" , "class":"text-center" , "searchable": false},
            {"data" : "districts_name" , "name":"districts.districts_name"},
            {"data" : "amphures_name" , "name":"amphures.amphures_name"},
            {"data" : "provinces_name" , "name":"provinces.provinces_name"},
            {"data" : "driver_age"},
            {"data" : "driver_mobile_phone"},
            {"data" : "driver_interview_date" , "class":"text-center" , "searchable": false},
            {"data" : "status" , "class":"text-center" , "searchable": false, "sortable": false,},
            

        ],
        "select": true,
	      "dom": 'Bfrtip',
		     "lengthMenu": [
				       [10, 25, 50, -1],
               ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "columnDefs": [{
            className: 'noVis', visible: false
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

    $('body').on('click','.btn-search',function(data){
        tableInterview.api().ajax.reload();
    });

    $('body').on('click','.btn-clear-search',function(data){
        $('#search_driver_interview_run_code').val('');
        $('#search_driver_name').val('');
        $('#search_driver_lastname').val('');
        $('#search_driver_id_card_no').val('');
        $('#search_driver_age').val('').change();
        $('#search_driver_status_job_app').val('').change();
        $('#search_driver_interview_date_start').val('');
        $('#search_driver_interview_date_end').val('');
        tableInterview.api().ajax.reload();
    });

    $('body').on('click', '.btn-criminal-date', function(){
        var id = $(this).data('id');
        var btn = $(this);
        $('#driver_interview_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/Interview/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            if(data.driver_interview_criminal_date){
                $('#add_driver_interview_criminal_date').val(data.driver_interview_criminal_date);
                $('#add_driver_interview_criminal_date').prop('disabled', true);
                $('.btn-submit-criminal-date').prop('disabled', true);
            }else{
                $('#add_driver_interview_criminal_date').prop('disabled', false);
                $('.btn-submit-criminal-date').prop('disabled', false);
            }
            $('#ModalCriminalDate').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormCriminalDate', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#driver_interview_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/Interview/SetCriminalDate/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableInterview.api().ajax.reload();
                $('#ModalCriminalDate').modal('hide');
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
