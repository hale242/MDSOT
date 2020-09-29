@extends('layouts.layout')
@section('content')
<input type="hidden" id="edit_id" value="{{$CustomerContract->customer_contract_id}}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div id="calendar"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                        <div class="card bg-success">
                            <div class="card-body text-white">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <span class="display-4"><i class="ti-calendar"></i></span>
                                    </div>
                                    <div class="ml-auto">
                                        <h6>Working days all year</h6>
                                        <h1 id="count_working">{{number_format($count_working)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-top border-danger">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <span class="text-danger display-4"><i class="icon-cup"></i></span>
                                    </div>
                                    <div class="ml-auto">
                                        <h6 class="text-danger">Weekend</h6>
                                        <h1 class="text-danger" id="count_workend">{{number_format($count_workend)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-top border-danger">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <span class="text-danger display-4"><i class="icon-plane"></i></span>
                                    </div>
                                    <div class="ml-auto">
                                        <h6 class="text-danger">Annual holiday</h6>
                                        <h1 class="text-danger" id="count_annual_holiday">{{number_format($count_annual_holiday)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="material-card card">
                    <div class="card" style="margin-bottom: 0px;">
                        <div class="card-body">
                            <h4 class="card-title">Shift</h4>
                            <form id="FormShift">
                                <input type="hidden" id="shift_type" name="type" value="S">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="timesheet_contract_date">Date from</label>
                                        <input type="date" class="form-control" id="shift_timesheet_contract_date_start" name="timesheet_contract_date_start">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="holiday_type_date">To</label>
                                        <input type="date" class="form-control" id="shift_timesheet_contract_date_end" name="timesheet_contract_date_end">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="Check-Box">Working day</label> <br />
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="shift_timesheet_contract_day_mon" name="timesheet_contract_day[]" value="Mon" />
                                            <label class="custom-control-label" for="shift_timesheet_contract_day_mon">Mon</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="shift_timesheet_contract_day_thu" name="timesheet_contract_day[]" value="Tue" />
                                            <label class="custom-control-label" for="shift_timesheet_contract_day_thu">Tue</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="shift_timesheet_contract_day_wed" name="timesheet_contract_day[]" value="Wed" />
                                            <label class="custom-control-label" for="shift_timesheet_contract_day_wed">Wed</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="shift_timesheet_contract_date_thu" name="timesheet_contract_date[]" value="Thu" />
                                            <label class="custom-control-label" for="shift_timesheet_contract_date_thu">Thu</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="shift_timesheet_contract_day_fri" name="timesheet_contract_day[]" value="Fri" />
                                            <label class="custom-control-label" for="shift_timesheet_contract_day_fri">Fri</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="shift_timesheet_contract_day_sat" name="timesheet_contract_day[]" value="Sat" />
                                            <label class="custom-control-label" for="shift_timesheet_contract_day_sat">Sat</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="shift_timesheet_contract_day_sun" name="timesheet_contract_day[]" value="Sun" />
                                            <label class="custom-control-label" for="shift_timesheet_contract_day_sun">Sun</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="timesheet_contract_ot_date_start">Start time shift</label>
                                        <input type="time" class="form-control" id="shift_timesheet_contract_def_time_start" name="timesheet_contract_def_time_start" required>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="timesheet_contract_ot_date_end">End time shift</label>
                                        <input type="time" class="form-control" id="shift_timesheet_contract_def_time_end" name="timesheet_contract_def_time_end" required>
                                    </div>
                                    <div class="col-md-2 mb-3 mt-3 text-right">
                                        <p></p>
                                        <button type="button" class="btn btn-warning btn-sm btn-reset-shift" title="Get original time in contract">
                                            <i class="fas fa-history"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="reset" class="btn btn-danger btn-md">Reset</button>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-success btn-md">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="material-card card">
                    <div class="card" style="margin-bottom: 0px;">
                        <form id="FormTaxiPriceSetting" class="needs-validation" novalidate>
                            <input type="hidden" name="customer_contract_id" value="{{$CustomerContract->customer_contract_id}}">
                            <div class="card-body pb-3">
                                <h4 class="card-title">Taxi price setting</h4>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="timesheet_contract_taxi_morning_start">Start time shift</label>
                                        <input type="time" class="form-control" id="add_timesheet_contract_taxi_morning_start" name="timesheet_contract_taxi_morning_start" required />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="timesheet_contract_taxi_morning_end">To</label>
                                        <input type="time" class="form-control" id="add_timesheet_contract_taxi_morning_end" name="timesheet_contract_taxi_morning_end" required />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="timesheet_contract_taxi_evening_start">End time shift</label>
                                        <input type="time" class="form-control" id="add_timesheet_contract_taxi_evening_start" name="timesheet_contract_taxi_evening_start" required />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="timesheet_contract_taxi_evening_end">To</label>
                                        <input type="time" class="form-control" id="add_timesheet_contract_taxi_evening_end" name="timesheet_contract_taxi_evening_end" required />
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-success btn-md">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Start OT Structure -->
    <div class="col-6">
        <div class="material-card card">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body">
                    <h4 class="card-title">OT Structure</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <form id="FormAddTimesheetContractOt" class="needs-validation" novalidate>
                                <input type="hidden" name="customer_contract_id" value="{{$CustomerContract->customer_contract_id}}">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="price_structure_ot_id">OT Type</label>
                                            <select class="select2 form-control custom-select" name="price_structure_ot_id" id="add_price_structure_ot_id" required>
                                                <option value="">----Select----</option>
                                                @foreach($PriceStructureOT as $val)
                                                    <option value="{{$val->price_structure_ot_id}}">{{$val->price_structure_ot_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="Check-Box">Date of OT</label> <br />
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_ot_day_mon" name="timesheet_contract_ot_day_mon" value="1">
                                            <label class="custom-control-label" for="add_timesheet_contract_ot_day_mon">Mon</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_ot_day_thu" name="timesheet_contract_ot_day_thu" value="1">
                                            <label class="custom-control-label" for="add_timesheet_contract_ot_day_thu">Tue</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_ot_day_wed" name="timesheet_contract_ot_day_wed" value="1">
                                            <label class="custom-control-label" for="add_timesheet_contract_ot_day_wed">Wed</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_ot_date_thu" name="timesheet_contract_ot_date_thu" value="1">
                                            <label class="custom-control-label" for="add_timesheet_contract_ot_date_thu">Thu</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_ot_day_fri" name="timesheet_contract_ot_day_fri" value="1">
                                            <label class="custom-control-label" for="add_timesheet_contract_ot_day_fri">Fri</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_ot_day_sat" name="timesheet_contract_ot_day_sat" value="1">
                                            <label class="custom-control-label" for="add_timesheet_contract_ot_day_sat">Sat</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_ot_day_sun" name="timesheet_contract_ot_day_sun" value="1">
                                            <label class="custom-control-label" for="add_timesheet_contract_ot_day_sun">Sun</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="timesheet_contract_ot_date_start">Start time OT</label>
                                        <input type="time" class="form-control" id="add_timesheet_contract_ot_date_start" name="timesheet_contract_ot_date_start" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="timesheet_contract_ot_date_end">End time OT</label>
                                        <input type="time" class="form-control" id="add_timesheet_contract_ot_date_end" name="timesheet_contract_ot_date_end" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="timesheet_contract_ot_details">Details</label>
                                        <textarea class="form-control" id="add_timesheet_contract_ot_details" name="timesheet_contract_ot_details" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="timesheet_contract_ot_status">Status</label> <br />
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="add_timesheet_contract_ot_status" name="timesheet_contract_ot_status" value="1" checked />
                                            <label class="custom-control-label" for="add_timesheet_contract_ot_status">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-3 mb-3 text-right">
                                        <button type="submit" class="btn btn-success btn-md">Save</button>
                                    </div>
                                </div>
                          </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tableTimesheetContractOt" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col" class="text-center">OT Type</th>
                                            <th scope="col" class="text-center">Details</th>
                                            <th scope="col" class="text-center">Start time OT</th>
                                            <th scope="col" class="text-center">End time OT</th>
                                            <th scope="col" class="text-center">Date of OT</th>
                                            <th scope="col" class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End OT Structure -->
</div>
<div class="row">
    <!-- Start Holiday -->
    <div class="col-6">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Holiday</h4>
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right btn-add-holiday">Add New</button>
                </div>
                <div class="table-responsive">
                    <table id="tableTimesheetHolidayCalendar" class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Year</th>
                                <th scope="col">วันหยุด</th>
                                <th scope="col">ชื่อวันหยุด</th>
                                <th scope="col">Details</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Holiday -->

    <!-- Start Timesheet -->
    <div class="col-6">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Timesheet</h4>
                </div>
                <div class="table-responsive">
                    <table id="tableTimesheetContract" class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Day</th>
                                <th scope="col">Start work</th>
                                <th scope="col">Get off work</th>
                                <th scope="col">Start time shift</th>
                                <th scope="col">End time shift</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Timesheet -->
</div>
@endsection
@section('modal')
@include('admin.CustomerContract.Modal.OtSetting.modal_holiday')
@include('admin.CustomerContract.Modal.OtSetting.modal_timesheet_edit')
@endsection
@section('scripts')
<script>
    var tableTimesheetContractOt = $('#tableTimesheetContractOt').dataTable({
        "ajax": {
            "url": url_gb+"/admin/TimesheetContractOt/Lists",
            "type":"POST", "data": function ( d ) {
                d.customer_contract_id = $('#edit_id').val();
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "timesheet_contract_ot_name"},
            {"data" : "timesheet_contract_ot_details"},
            {"data" : "timesheet_contract_ot_date_start", "searchable": false},
            {"data" : "timesheet_contract_ot_date_end", "searchable": false},
            {"data" : "days", "searchable": false, "sortable": false,},
            {
                "data" : "action" ,
                "name" : "action",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },

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

    var tableTimesheetContract = $('#tableTimesheetContract').dataTable({
        "ajax": {
            "url": url_gb+"/admin/TimesheetContract/Lists",
            "type":"POST", "data": function ( d ) {
                d.customer_contract_id = $('#edit_id').val();
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "timesheet_contract_date", "class":"text-center" , "searchable": false},
            {"data" : "timesheet_contract_date_text", "class":"text-center"},
            {"data" : "timesheet_contract_def_time_start", "searchable": false},
            {"data" : "timesheet_contract_def_time_end", "searchable": false},
            {"data" : "timesheet_contract_taxi_start", "searchable": false},
            {"data" : "timesheet_contract_taxi_end", "searchable": false},
            {
                "data" : "action" ,
                "name" : "action",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },

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

    var tableTimesheetHolidayCalendar = $('#tableTimesheetHolidayCalendar').dataTable({
        "ajax": {
            "url": url_gb+"/admin/TimesheetHolidayCalendar/Lists",
            "type":"POST", "data": function ( d ) {
                d.customer_contract_id = $('#edit_id').val();
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "timesheet_holiday_calendar_year", "class":"text-center"},
            {"data" : "timesheet_holiday_calendar_date", "class":"text-center", "searchable": false,},
            {"data" : "timesheet_holiday_calendar_name"},
            {"data" : "timesheet_holiday_calendar_details"},
            {
                "data" : "action" ,
                "name" : "action",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },

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

    $('body').on('change','.change-status-holiday',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/TimesheetHolidayCalendar/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                $('#count_annual_holiday').text(res.count_annual_holiday);
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-ot-structure',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/TimesheetContractOt/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {

            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-timesheet',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/TimesheetContract/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                $('#count_working').text(res.count_working);
                $('#count_workend').text(res.count_workend);
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormAddTimesheetContractOt', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/TimesheetContractOt",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_timesheet_contract_ot_temp_id').val('').change();
                tableTimesheetContractOt.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormShift', function(e) {
        e.preventDefault();
        var form = $(this);
        var customer_contract_id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/TimesheetContract/UpdateShift/"+customer_contract_id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#shift_type').val('S');
                tableTimesheetContract.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-reset-shift', function(){
        swal({
            title: "Are you sure?",
            text: "You want to reset OT Period according contract!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                $('#shift_type').val('R');
                $('#FormShift').submit();
            }
        });
    });
</script>
@include('admin.CustomerContract.Script.OtSetting.script_calendar')
@include('admin.CustomerContract.Script.OtSetting.script_holiday')
@include('admin.CustomerContract.Script.OtSetting.script_timesheet_edit')
@endsection
