<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <base href="https://intervision.co/mock-up/mdsot/" />
    <title>{{$MainMenus->menu_system_name}}</title>
    <link href='https://intervision.co/mock-up/assets/extra-libs/prism/prism.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css' rel='stylesheet' media='screen'>
    <link href="{{asset('dist/css/style.min.css')}}" rel='stylesheet' media='screen'>
    <!-- <link href='https://intervision.co/mock-up/dist/css/style.min.css' rel='stylesheet' media='screen'> -->
    <link href='https://intervision.co/mock-up/assets/libs/sweetalert2/dist/sweetalert2.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/select2/dist/css/select2.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/css/bootstrap2-toggle.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/jquery-steps/jquery.steps.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/jquery-steps/steps.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/libs/fullcalendar/dist/fullcalendar.min.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/extra-libs/calendar/calendar.css' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/dist/admin/bootstrap-select.min.css' rel='stylesheet' media='screen'>
    <link href='https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css' rel='stylesheet' media='screen'>
    <link href='https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js' rel='stylesheet' media='screen'>
    <link href='https://intervision.co/mock-up/assets/dist/admin/style_print.css' rel='stylesheet' media='print'>
    <script src='https://intervision.co/mock-up/assets/js/jquery-1.12.4.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/jquery/ui/jquery-ui.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/sweetalert.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/jquery/dist/jquery.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>

    <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style media="screen">
        .select2-container {
            width: 100% !important;
        }

        .modal {
            overflow: auto !important;
        }

        .navbar-collapse {
            background: #2f323e !important;
        }
    </style>
</head>

<body class="">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Timesheet_contract_ot</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0 bg-white">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Timesheet_contract_ot</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
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
                                <div class="material-card card">
                                    <div class="card" style="margin-bottom: 0px;">
                                        <div class="card-body">
                                            <h4 class="card-title">Shift</h4>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="holiday_type_date">Date from</label>
                                                    <input type="date" class="form-control" id="holiday_type_date" name="holiday_type_date" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="holiday_type_date">To</label>
                                                    <input type="date" class="form-control" id="holiday_type_date" name="holiday_type_date" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="Check-Box">Working day</label> <br>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_mon" name="timesheet_contract_ot_day_mon" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_mon">Mon</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_thu" name="timesheet_contract_ot_day_thu" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_thu">Tue</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_wed" name="timesheet_contract_ot_day_wed" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_wed">Wed</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_date_thu" name="timesheet_contract_ot_date_thu" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_date_thu">Thu</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_fri" name="timesheet_contract_ot_day_fri" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_fri">Fri</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_sat" name="timesheet_contract_ot_day_sat" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_sat">Sat</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_sun" name="timesheet_contract_ot_day_sun" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_sun">Sun</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="timesheet_contract_ot_date_start">Start time shift</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_ot_date_start" name="timesheet_contract_ot_date_start" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="timesheet_contract_ot_date_end">End time shift</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_ot_date_end" name="timesheet_contract_ot_date_end" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-2 mb-3 mt-3 text-right">
                                                    <p></p>
                                                    <button type="button" class="btn btn-warning btn-sm" title="Get original time in contract">
                                                        <i class="fas fa-history"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-danger btn-md confirm-delete" data-product_id="1">
                                                        Reset
                                                    </button>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <button type="button" class="btn btn-success btn-md">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card bg-success">
                                    <div class="card-body text-white">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <span class="display-3"><i class="ti-calendar"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <h6>Working days all year</h6>
                                                <h1>243</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card border-top border-danger">
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <span class="text-danger display-4"><i class="icon-cup"></i></span>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h6 class="text-danger">Weekend</h6>
                                                        <h1 class="text-danger">103</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card border-top border-danger">
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <span class="text-danger display-4"><i class="icon-plane"></i></span>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h6 class="text-danger">Annual holiday</h6>
                                                        <h1 class="text-danger">20</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="material-card card">
                            <div class="card" style="margin-bottom: 0px;">
                                <div class="card-body">
                                    <h4 class="card-title">OT Structure</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="price_structure_ot_id">OT Type</label>
                                                        <select class="form-control custom-select search_table_select" name="price_structure_ot_id" id="price_structure_ot_id" data-placeholder="" tabindex="1">
                                                            <option value="0">Select</option>
                                                            <option value="">OT 1</option>
                                                            <option value="">OT 1.5</option>
                                                            <option value="">OT 2</option>
                                                            <option value="">OT 3</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="Check-Box">Date of OT</label> <br>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_mon1" name="timesheet_contract_ot_day_mon" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_mon1">Mon</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_thu1" name="timesheet_contract_ot_day_thu" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_thu1">Tue</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_wed1" name="timesheet_contract_ot_day_wed" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_wed1">Wed</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_date_thu1" name="timesheet_contract_ot_date_thu" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_date_thu1">Thu</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_fri1" name="timesheet_contract_ot_day_fri" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_fri1">Fri</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_sat1" name="timesheet_contract_ot_day_sat" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_sat1">Sat</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_sun1" name="timesheet_contract_ot_day_sun" value="1" required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_sun1">Sun</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_ot_date_start">Start time OT</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_ot_date_start" name="timesheet_contract_ot_date_start" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_ot_date_end">End time OT</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_ot_date_end" name="timesheet_contract_ot_date_end" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_ot_details">Details</label>
                                                    <textarea class="form-control" id="timesheet_contract_ot_details" name="timesheet_contract_ot_details" rows="2"></textarea>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="timesheet_contract_ot_status">Status</label> <br>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_status" name="timesheet_contract_ot_status" value="1" checked required>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_status">Active</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-3 mb-3 text-right">
                                                    <button type="button" class="btn btn-success btn-md">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
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
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td> OT 1 </td>

                                                            <td></td>
                                                            <td class="text-center">03:00</td>
                                                            <td class="text-center">07:00</td>
                                                            <td> Mon - Fri </td>
                                                            <td class="text-center"><input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td> OT 1 </td>

                                                            <td></td>
                                                            <td class="text-center">18:00</td>
                                                            <td class="text-center">23:59</td>
                                                            <td> Mon - Fri </td>
                                                            <td class="text-center"><input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td> OT 1.5 </td>

                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-center"><input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="material-card card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Holiday</h4>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
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
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2020</td>
                                                <td>01/01/2020</td>
                                                <td>วันขึ้นปีใหม่</td>
                                                <td>-</td>
                                                <td>
                                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#HolidayModal" data-product_id="0">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>2020</td>
                                                <td>01/01/2020</td>
                                                <td>วันขึ้นปีใหม่</td>
                                                <td>-</td>
                                                <td>
                                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#HolidayModal" data-product_id="0">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>2020</td>
                                                <td>01/01/2020</td>
                                                <td>วันขึ้นปีใหม่</td>
                                                <td>-</td>
                                                <td>
                                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#HolidayModal" data-product_id="0">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="material-card card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Timesheet</h4>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Working day</th>
                                                <th scope="col">Time shift</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>01/04/2563 - 15/04/2563</td>
                                                <td>Mon - Fri</td>
                                                <td>08:30 - 17:30</td>
                                                <td>
                                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#EditShiftModal" data-product_id="0">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>16/04/2563 - 30/04/2563</td>
                                                <td>Mon - Fri</td>
                                                <td>08:00 - 17:00</td>
                                                <td>
                                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#EditShiftModal" data-product_id="0">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="HolidayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Holiday</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
                            </div>
                            <form action="#" class="needs-validation" novalidate>
                                <div class="card">
                                    <div class="form-body">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="holiday_calendar_year">Year</label>
                                                    <select class="form-control custom-select" id="holiday_calendar_year" name="holiday_calendar_year" required>
                                                        <option value="0">----Select----</option>
                                                        <option value="0">2018</option>
                                                        <option value="1">2019</option>
                                                        <option value="2">2020</option>
                                                        <option value="3">2021</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="holiday_calendar_date">วันหยุด</label>
                                                    <input type="date" id="holiday_calendar_date" name="holiday_calendar_date" class="form-control search_table" placeholder="">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="holiday_calendar_name">ชื่อวันหยุด</label>
                                                    <input type="text" class="form-control" id="holiday_calendar_name" name="holiday_calendar_name" placeholder="" value="">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="holiday_calendar_details">Details</label>
                                                    <textarea class="form-control" id="holiday_calendar_details" name="holiday_calendar_details" rows="4"></textarea>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="holiday_calendar_status">Status</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="holiday_calendar_status" name="holiday_calendar_status" checked>
                                                        <label class="custom-control-label" for="holiday_calendar_status">Active</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="hidden" class="form-control" id="timesheet_contract_id" name="timesheet_contract_id">
                                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="EditShiftModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit shift</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
                            </div>
                            <form action="#" class="needs-validation" novalidate>
                                <div class="card">
                                    <div class="form-body">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="holiday_type_date">Date from</label>
                                                    <input type="date" class="form-control" id="holiday_type_date" name="holiday_type_date" placeholder="" value="2019-04-01" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="holiday_type_date">To</label>
                                                    <input type="date" class="form-control" id="holiday_type_date" name="holiday_type_date" placeholder="" value="2019-04-15" required>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="Check-Box">Working day</label> <br>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_mon" name="timesheet_contract_ot_day_mon" value="1" checked>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_mon">Mon</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_thu" name="timesheet_contract_ot_day_thu" value="1" checked>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_thu">Tue</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_wed" name="timesheet_contract_ot_day_wed" value="1" checked>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_wed">Wed</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_date_thu" name="timesheet_contract_ot_date_thu" value="1" checked>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_date_thu">Thu</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_fri" name="timesheet_contract_ot_day_fri" value="1" checked>
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_fri">Fri</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_sat" name="timesheet_contract_ot_day_sat" value="1">
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_sat">Sat</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="timesheet_contract_ot_day_sun" name="timesheet_contract_ot_day_sun" value="1">
                                                        <label class="custom-control-label" for="timesheet_contract_ot_day_sun">Sun</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="timesheet_contract_ot_date_start">Start time shift</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_ot_date_start" name="timesheet_contract_ot_date_start" placeholder="" value="08:00:00" required>
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="timesheet_contract_ot_date_end">End time shift</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_ot_date_end" name="timesheet_contract_ot_date_end" placeholder="" value="17:30:00" required>
                                                </div>
                                                <div class="col-md-2 mb-3 mt-3 text-right">
                                                    <p></p>
                                                    <button type="button" class="btn btn-warning btn-sm" title="Get original time in contract">
                                                        <i class="fas fa-history"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="hidden" class="form-control" id="timesheet_contract_id" name="timesheet_contract_id">
                                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
                            </div>
                            <form action="#" class="needs-validation" novalidate>
                                <div class="card">
                                    <div class="form-body">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="driver_id">Driver</label>
                                                    <select class="form-control custom-select" id="driver_id" name="driver_id">
                                                        <option value="0">----Select----</option>
                                                        <option value="">สมชาย มุ่งมั่น</option>
                                                        <option value="">อนุวัฒน์ จันทกาล</option>
                                                        <option value="">ผดุง ด้วงคำ</option>
                                                        <option value="">อัศนัย ภูมิวิศัย</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_date">วันที่ทำงาน</label>
                                                    <input type="date" class="form-control" id="timesheet_contract_date" name="timesheet_contract_date" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_time_start">เวลาเข้างานจริง (เข้างานจริง 08:30)</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_time_start" name="timesheet_contract_time_start" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_time_end">เวลาเลิกงานจริง (เลิกงานจริง 17:30)</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_time_end" name="timesheet_contract_time_end" placeholder="" value="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_midnight_ot">เวลาเลิกงานหลังเที่ยงคืน</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_midnight_ot" name="timesheet_contract_midnight_ot" placeholder="" value="">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_time_lunch">เวลาเริ่มพักเที่ยง และนับไปอีก 1 ชั่วโมง</label>
                                                    <input type="time" class="form-control" id="timesheet_contract_time_lunch" name="timesheet_contract_time_lunch" placeholder="" value="">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_taxi">ค่าแท็กซี่</label>
                                                    <input type="number" class="form-control" id="timesheet_contract_taxi" name="timesheet_contract_taxi" placeholder="" value="">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_overnight">ค่าค้างคืน</label>
                                                    <input type="number" class="form-control" id="timesheet_contract_overnight" name="timesheet_contract_overnight" placeholder="" value="">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="timesheet_contract_out_of_town">ค่าออกต่างจังหวัด</label>
                                                            <input type="number" class="form-control" id="timesheet_contract_out_of_town" name="timesheet_contract_out_of_town" placeholder="" value="">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="Check-Box">Status</label> <br>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" id="timesheet_contract_status1" name="timesheet_contract_status" value="1" checked required>
                                                                <label class="custom-control-label" for="timesheet_contract_status1">Working day</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" id="timesheet_contract_status2" name="timesheet_contract_status" value="0" required>
                                                                <label class="custom-control-label" for="timesheet_contract_status2">A day off</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="timesheet_contract_details">Details</label>
                                                    <textarea class="form-control" id="timesheet_contract_details" name="timesheet_contract_details" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="hidden" class="form-control" id="timesheet_contract_id" name="timesheet_contract_id">
                                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="productviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
                    <div class="modal-dialog modal-md" role="document">
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
                                                    <td> <label for="example-text-input" class="col-form-label">วันที่ทำงาน</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">วันที่ทำงาน</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">วัน</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">วัน</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเข้างานปกติ</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเข้างานปกติ</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเลิกงานปกติ</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเลิกงานปกติ</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเข้างานจริง</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเข้างานจริง</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเลิกงานจริง</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเลิกงานจริง</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาที่ให้นับ OT ได้หลังจากเลิกงานปกติ</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาที่ให้นับ OT ได้หลังจากเลิกงานปกติ</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาที่เริ่ม OT</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาที่เริ่ม OT</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาที่เลิกงาน OT</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาที่เลิกงาน OT</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเลิกงานหลังเที่ยงคืน</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเลิกงานหลังเที่ยงคืน</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเริ่มพักเที่ยง และนับไปอีก 1 ชั่วโมง</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">เวลาเริ่มพักเที่ยง และนับไปอีก 1 ชั่วโมง</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">ค่าแท็กซี่</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">ค่าแท็กซี่</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">ค่าค้างคืน</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">ค่าค้างคืน</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">ค่าออกต่างจังหวัด</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">ค่าออกต่างจังหวัด</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">Details</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">Details</label> </td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="example-text-input" class="col-form-label">Status</label> </td>
                                                    <td> <label for="example-text-input" class="col-form-label">Status</label> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                <script type="992eb2f1a97c6eabb1e991a4-text/javascript">
                    $(document).ready(function() {

                        $("#productviewModal").on("show.bs.modal", function(event) {
                            var button = $(event.relatedTarget);
                            var recipient = button.data("product_id");
                            var modal = $(this);

                        })

                        $(".confirm-delete").on("click touch", function(event) {
                            var modal = $(this);
                            var product_id = modal.data("product_id");
                            Swal.fire({
                                title: "Are you sure? ID: " + product_id,
                                text: "You want to reset OT Period according contract!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes, reset now!"
                            }).then((result) => {
                                if (result.value) {
                                    Swal.fire(
                                        "Success!",
                                        "OT Period has been reset.",
                                        "success"
                                    )
                                }
                            })
                        });

                        ! function($) {
                            "use strict";

                            var CalendarApp = function() {
                                this.$body = $("body")
                                this.$calendar = $('#calendar'),
                                    this.$event = ('#calendar-events div.calendar-events'),
                                    this.$categoryForm = $('#add-new-event form'),
                                    this.$extEvents = $('#calendar-events'),
                                    this.$modal = $('#my-event'),
                                    this.$saveCategoryBtn = $('.save-category'),
                                    this.$calendarObj = null
                            };

                            CalendarApp.prototype.enableDrag = function() {
                                //init events
                                $(this.$event).each(function() {
                                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                                    // it doesn't need to have a start or end
                                    var eventObject = {
                                        title: $.trim($(this).text()) // use the element's text as the event title
                                    };
                                    // store the Event Object in the DOM element so we can get to it later
                                    $(this).data('eventObject', eventObject);
                                    // make the event draggable using jQuery UI
                                    $(this).draggable({
                                        zIndex: 999,
                                        revert: true, // will cause the event to go back to its
                                        revertDuration: 0 //  original position after the drag
                                    });
                                });
                            }
                            /* Initializing */
                            CalendarApp.prototype.init = function() {
                                    this.enableDrag();
                                    /*  Initialize the calendar  */
                                    var date = new Date();
                                    var d = date.getDate();
                                    var m = date.getMonth();
                                    var y = date.getFullYear();
                                    var form = '';
                                    var today = new Date($.now());
                                    var defaultEvents = [{

                                            title: 'วันหยุด : .......',
                                            start: today,
                                            end: today,
                                            className: 'bg-danger',
                                            uid: "119"
                                        },
                                        {
                                            title: 'วันหยุด : .......',
                                            start: new Date($.now() + 868000000),
                                            className: 'bg-danger',
                                            uid: "147"

                                        }
                                    ];


                                    var $this = this;
                                    $this.$calendarObj = $this.$calendar.fullCalendar({
                                        slotDuration: '00:15:00',
                                        /* If we want to split day time each 15minutes */
                                        minTime: '08:00:00',
                                        maxTime: '19:00:00',
                                        defaultView: 'month',
                                        handleWindowResize: true,


                                        header: {
                                            left: 'prev,next today',
                                            center: 'title',
                                            // right: 'month,agendaWeek,agendaDay'
                                            // right: 'month'
                                        },
                                        events: defaultEvents,
                                        // editable: true,
                                        // droppable: true, // this allows things to be dropped onto the calendar !!!
                                        // eventLimit: true, // allow "more" link when too many events
                                        // selectable: true,
                                        // drop: function(date) { $this.onDrop($(this), date); },
                                        // select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
                                        // eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

                                        eventClick: function(calEvent, jsEvent, view) {
                                            console.log(calEvent.uid); //ID ปฎิทินนัดหมาย ให้เอาไปหารายละเอียดแล้วแทนที่ modal ก่อนจะแสดง modal
                                            var text = '';

                                            text += '<div class="form-group mt-12 row">';
                                            text += '	<div class="col-md-12 mb-3">';
                                            text += '		<label for="topic_id">Topic</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="admin_id">ผู้รับผิดชอบ</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="group_admin_id">ผู้ร่วมนัด</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="calendar_location">Location</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="Check-Box">Status</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="calendar_date_start">Date Start</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="calendar_date_end">Date End</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="calendar_title">Title</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="project_id">Project</label>';
                                            text += '		<input type="text" class="form-control" placeholder="" value=""  readonly>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="calendar_details">Details</label>';
                                            text += '		<textarea cols="80" class="form-control" rows="10" readonly></textarea>';
                                            text += '	</div>';
                                            text += '	<div class="col-md-6 mb-3">';
                                            text += '		<label for="calendar_contact">Contact</label>';
                                            text += '		<textarea cols="80" class="form-control" rows="10" readonly></textarea>';
                                            text += '	</div>';
                                            text += '</div>';

                                            $('#modal_calendar').html(text);

                                            $('#viewModal').modal('show');
                                        }
                                    });
                                },
                                //init CalendarApp

                                $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

                        }(window.jQuery),

                        //initializing CalendarApp

                        function($) {
                            "use strict";
                            $.CalendarApp.init()
                        }(window.jQuery);
                    });
                </script>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Ample admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>
    <script type="992eb2f1a97c6eabb1e991a4-text/javascript">
        $(document).ready(function() {
            $('.table-autosort').DataTable({

                "pageLength": 10,
                "scrollX": true,
                "dom": 'Bfrtip',
                "columnDefs": [{
                    // targets: 1,
                    className: 'noVis',
                    visible: false
                }],
                "buttons": [
                    'colvis',
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        },
                        // messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                        // messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        // messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
                    },
                    // $.extend(true, {}, buttonCommon, {
                    // extend: "print",
                    // exportOptions: {
                    // columns: ':visible'
                    // },
                    // messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
                    // }),	
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        },
                        // messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
                    },

                ],
            });
        });

        var buttonCommon = {
            exportOptions: {
                format: {
                    body: function(data, column, row, node) {
                        if (column == 6) {
                            // return $(data).find("option:selected").text()
                            return data
                        } else return data
                    }
                }
            }
        };
        // $(document).ready(function() {
        // $('#example').DataTable( {
        // dom: 'Bfrtip',
        // buttons: [
        // 'copy', $.extend(true, {}, buttonCommon, {
        // extend: "csv"
        // }), $.extend(true, {}, buttonCommon, {
        // extend: "excel"
        // }), $.extend(true, {}, buttonCommon, {
        // extend: "pdf"
        // })
        // ]
        // } );
        // } );
    </script>
    <script src='https://intervision.co/mock-up/assets/libs/popper.js/dist/umd/popper.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/bootstrap/dist/js/bootstrap.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/app.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/app.init.minimal.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/app-style-switcher.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/sparkline/sparkline.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/waves.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/sidebarmenu.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/custom.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/prism/prism.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/pages/datatable/datatable-basic.init.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/sweetalert2/dist/sweetalert2.all.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/sweetalert2/sweet-alert.init.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/select2/dist/js/select2.full.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/select2/dist/js/select2.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/pages/forms/select2/select2.init.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/ckeditor/ckeditor.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/ckeditor/samples/js/sample.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/bootstrap2-toggle.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/pages/datatable/datatable-advanced.init.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/jqbootstrapvalidation/validation.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/all_foot.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/bootstrap-select.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/dataTables.buttons.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/buttons.flash.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/jszip.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/pdfmake.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/vfs_fonts.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/buttons.html5.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/buttons.print.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/js/buttons.colVis.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/dist/js/custom.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/jquery-steps/build/jquery.steps.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/jquery-validation/dist/jquery.validate.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/moment/min/moment.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src='https://intervision.co/mock-up/assets/libs/fullcalendar/dist/fullcalendar.min.js' type="992eb2f1a97c6eabb1e991a4-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="992eb2f1a97c6eabb1e991a4-|49" defer=""></script>
</body>

</html>