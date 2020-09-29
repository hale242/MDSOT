@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row col-md-4 mb-3">
                    <h3>Select year</h3>
                    <select class="select2 form-control custom-select" id="holiday_calendar_year">
                        <option>Select Year</option>
                        @for($year=1970; $year<=3000; $year++)
                            <option value="{{$year}}" {{$year == $holiday_year ? 'selected' : ''}}>{{$year}}</option>
                        @endfor
                    </select>
                </div><br>
                <div class="row">
                    <div id="calendar"></div>
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
                    @if(App\Helper::CheckPermissionMenu('HolidayType' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableHolidayCalendar" class="table" width="100%">
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
</div>
@endsection @section('modal')
@include('admin.HolidayCalendar.Modal.modal_holiday_calender_add')
@include('admin.HolidayCalendar.Modal.modal_holiday_calender_edit')
@include('admin.HolidayCalendar.Modal.modal_holiday_calender_view')
@endsection
@section('scripts')
<script>
    $( document ).ready(function() {
        SubmitForm();
    });

    var tableHolidayCalendar = $('#tableHolidayCalendar').dataTable({
        "ajax": {
            "url": url_gb+"/admin/HolidayCalendar/Lists",
            "type":"POST", "data": function ( d ) {
                d.year = $('#holiday_calendar_year').val();
                // etc
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            // {"data" : "checkbox" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "holiday_calendar_year" , "class":"text-center"},
            {"data" : "holiday_calendar_date" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "holiday_calendar_name", "searchable": false, "sortable": false,},
            {"data" : "holiday_calendar_details" ,"searchable": false, "sortable": false,},
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

    $('body').on('change','.change-status',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/HolidayCalendar/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableNamePrefix.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
@include('admin.HolidayCalendar.Script.script_calendar')
@include('admin.HolidayCalendar.Script.script_holiday_calendar_add')
@include('admin.HolidayCalendar.Script.script_holiday_calendar_edit')
@endsection
