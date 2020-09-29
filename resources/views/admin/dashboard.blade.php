@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2>{{ $Number_Drivers }}</h2>
                        <h6 class="text-info">All Drivers</h6>
                    </div>
                    <div class="ml-auto text-right">
                        <a class="text-white" href="{{url('admin/Driver')}}" target="_blank">
                            <span class="text-info display-7"><i class="ti-arrow-right"></i></span>
                            <h6 class="text-info">See more</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2>{{ $Number_Drivers_Standbys }}</h2>
                        <h6 class="text-info">Standby Drivers</h6>
                    </div>
                    <div class="ml-auto text-right">
                        <a class="text-white" href="{{url('admin/StandbyDriver')}}" target="_blank">
                            <span class="text-info display-7"><i class="ti-arrow-right"></i></span>
                            <h6 class="text-info">See more</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2>{{ $Number_DriverWorking }}</h2>
                        <h6 class="text-info">Replacement Drivers</h6>
                    </div>
                    <div class="ml-auto text-right">
                        <a class="text-white" href="{{url('admin/ReplacementDriver')}}" target="_blank">
                            <span class="text-info display-7"><i class="ti-arrow-right"></i></span>
                            <h6 class="text-info">See more</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2>{{ $Number_ContactInfo }}</h2>
                        <h6 class="text-info">Contract of Drivers</h6>
                    </div>
                    <div class="ml-auto text-right">
                        <a class="text-white" href="{{url('admin/ContactInfo')}}" target="_blank">
                            <span class="text-info display-7"><i class="ti-arrow-right"></i></span>
                            <h6 class="text-info">See more</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2>{{ $Number_Driver_job1 }}</h2>
                        <h6 class="text-info">พนักงานขับรถส่วนกลาง</h6>
                    </div>
                    <div class="ml-auto text-right">
                        <a class="text-white" href="{{url('admin/DriverInContract')}}" target="_blank">
                            <span class="text-info display-7"><i class="ti-arrow-right"></i></span>
                            <h6 class="text-info">See more</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2>{{ $Number_Driver_job2 }}</h2>
                        <h6 class="text-info">พนักงานขับรถผู้บริหารชาวไทย</h6>
                    </div>
                    <div class="ml-auto text-right">
                        <a class="text-white" href="{{url('admin/ContactInfo')}}" target="_blank">
                            <span class="text-info display-7"><i class="ti-arrow-right"></i></span>
                            <h6 class="text-info">See more</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2>{{ $Number_Driver_job3 }}</h2>
                        <h6 class="text-info">พนักงานขับรถผู้บริหารชาวต่างชาติ</h6>
                    </div>
                    <div class="ml-auto text-right">
                        <a class="text-white" href="{{url('admin/ContactInfo')}}" target="_blank">
                            <span class="text-info display-7"><i class="ti-arrow-right"></i></span>
                            <h6 class="text-info">See more</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2>{{ $Number_Drivers_Replacements }}</h2>
                        <h6 class="text-info">พนักงานขับรถทดแทน</h6>
                    </div>
                    <div class="ml-auto text-right">
                        <a class="text-white" href="{{url('admin/ChangeStatusDriver')}}" target="_blank">
                            <span class="text-info display-7"><i class="ti-arrow-right"></i></span>
                            <h6 class="text-info">See more</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card bg-inverse">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Recruit and operation approved</h3>
                        <a class="text-white" href="{{url('admin/RecruitAndOperationApp')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>{{ $Number_RecruitAndOperationApp }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-primary">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Approve new driver</h3>
                        <a class="text-white" href="{{url('admin/ApproveNewDriver')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>{{ $Number_ApproveNewDriver }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Preapprove Management System</h3>
                        <a class="text-white" href="{{url('admin/PreApprove')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>*</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-success">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Approve contract</h3>
                        <a class="text-white" href="{{url('admin/ApproveContract')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>*</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-warning">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Approve driver ralease</h3>
                        <a class="text-white" href="{{url('admin/ApproveDriverRelease')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>*</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-danger">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Price structure approve</h3>
                        <a class="text-white" href="{{url('admin/PriceStructureApprove')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>{{ $Number_PriceStructureApproves }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-inverse">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Driver leave approve</h3>
                        <a class="text-white" href="{{url('admin/DriverLeaveApprove')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>{{ $Number_DriverLeaveApproves }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-primary">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Quotation</h3>
                        <a class="text-white" href="{{url('admin/PreApprove')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>*</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Confirm Letter</h3>
                        <a class="text-white" href="{{url('admin/PreApprove')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>*</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-success">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Customer contract</h3>
                        <a class="text-white" href="{{url('admin/CustomerContract')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>{{ $Number_CustomerContract }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-warning">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>พนักงานรอเรียกสัมภาษณ์งาน</h3>
                        <a class="text-white" href="{{url('admin/JobRegister')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>{{ $Number_Driver_Wait_Interviews }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-danger">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>พนักงานกำลังสัมภาษณ์งาน</h3>
                        <a class="text-white" href="{{url('admin/Interview')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>{{ $Number_DriverInterviews }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body bg-warning">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Recruitment Position</h3>
                        <a class="text-white" href="{{url('admin/JobRegister')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
            <div class="p-3">
                <div class="table-responsive">
                    <table class="table text-muted mb-0 no-wrap recent-table font-light">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="border-0">ตำแหน่ง</th>
                                <th class="border-0">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($RecruitmentPositions as $val)
                            <tr>
                                <td>{{$val->recruitment_position_name}}</td>
                                <td>{{count($val->Driver)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="bg-inverse p-4 text-white">
                        <div>
                            <h3>Customer</h3>
                            <a class="text-white" href="{{url('admin/Company')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3 class="font-medium">456</h3>
                                <h5 class="text-inverse mb-0">On Process</h5>
                            </div>
                            <div class="ml-auto text-right">
                                <h3 class="font-medium">1,456</h3>
                                <h5 class="text-inverse mb-0">All</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="bg-primary p-4 text-white">
                        <div>
                            <h3>Time sheet</h3>
                            <a class="text-white" href="{{url('admin/Timesheet')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3 class="font-medium">6</h3>
                                <h5 class="text-primary mb-0">To do today</h5>
                            </div>
                            <div class="ml-auto text-right">
                                <h3 class="font-medium">5</h3>
                                <h5 class="text-primary mb-0">Not finished</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Equipment / Monthly</h3>
                        <a class="text-white" href="{{url('admin/Equipment')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <h1>{{ $Number_Equipments }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body bg-success">
                <div class="d-flex no-block align-items-center text-white">
                    <div>
                        <h3>Holidays</h3>
                        <a class="text-white" href="{{url('admin/HolidayCalendar')}}" target="_blank">See more <i class="ti-arrow-right"></i> </a>
                    </div>
                    <div class="ml-auto">
                        <select class="form-control select_mouth">
                            @foreach($Months as $key=>$val)
                            <option value="{{date('Y')}}-{{$key}}" {{date('n') == $key ? 'selected' : ''}}>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="p-3">
                <div class="table-responsive">
                    <table class="table text-muted mb-0 no-wrap recent-table font-light">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="border-0">Name</th>
                                <th class="border-0">Date</th>
                            </tr>
                        </thead>
                        <tbody id="HolidayTable">
                            @foreach($HolidayCalendars as $Holiday)
                            <tr>
                                <td>{{ $Holiday->holiday_calendar_name }}</td>
                                <td>{{ $Holiday->holiday_calendar_date ? date("d/m/Y", strtotime($Holiday->holiday_calendar_date)) : '' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-6 col-sm-12">
        @include('admin.Dashboard.Table.tableRecruitAndOperationApp')
        @include('admin.Dashboard.Table.tableApproveNewDriver')
        @include('admin.Dashboard.Table.tablePreApprove')
        @include('admin.Dashboard.Table.tableApproveContract')
        @include('admin.Dashboard.Table.tableApproveDriverRelease')
        @include('admin.Dashboard.Table.tablePriceStructureApprove')
        @include('admin.Dashboard.Table.tableDriverLeaveApprove')
        @include('admin.Dashboard.Table.tableInterview')
        @include('admin.Dashboard.Table.tableTimesheet')
        @include('admin.Dashboard.Table.tableEquipment')
    </div>
</div>
@endsection
@section('modal')
@endsection
@section('scripts')
<script>
    $('body').on('change', '.select_mouth', function() {
        var mouth = $(this).val();
        if (mouth) {
            $.ajax({
                method: "GET",
                url: url_gb + "/admin/GetHoliday/" + mouth,
                dataType: 'json',
            }).done(function(res) {
                $('#HolidayTable').empty();
                var html = '';
                if (res.length != 0) {
                    $.each(res, function(k, v) {
                        date = new Date(v.holiday_calendar_date);
                        html += '<tr><td>' + v.holiday_calendar_name + '</td><td>' + (date.getDay() < 10 ? ('0' + date.getDay()) : date.getDay()) + '/' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' + date.getFullYear() + '</td><tr>';
                    })
                } else {
                    html += '<tr><td colspan="2">none.</td></tr>';
                }
                $('#HolidayTable').append(html);

            }).fail(function() {
                swal("system.system_alert", "system.system_error", "error");
            });
        }
    });
</script>
@include('admin.Dashboard.Script.script_tableRecruitAndOperationApp')
@include('admin.Dashboard.Script.script_tableApproveNewDriver')
@include('admin.Dashboard.Script.script_PriceStructureApprove')
@include('admin.Dashboard.Script.script_DriverLeaveApprove')
@include('admin.Dashboard.Script.script_Interview')
@include('admin.Dashboard.Script.script_tableEquipment')
@endsection