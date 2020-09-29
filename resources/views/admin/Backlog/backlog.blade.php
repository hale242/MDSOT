@extends('layouts.layout2')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Confirmation full code</label>
                            <input type="text" id="quotation_full_code" name="quotation_full_code" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Company</label>
                            <input type="text" id="company_id" name="company_id" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">No. of units</label>
                            <input type="number" id="back_order_unit" name="back_order_unit" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Name of salesperson</label>
                            <select class="form-control custom-select search_table_select" name="admin_id" id="admin_id" data-placeholder="" tabindex="1">
                                <option value="0">----Select-----</option>
                                <option value="">Apirat</option>
                                <option value="">Monkon</option>
                                <option value="">Pankaa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Province</label>
                            <select class="select2 form-control custom-select search_table_select" style="height: 36px;width: 100%;" name="province_name" id="search_province_name" data-placeholder="">
                                <option value="">----Select----</option>
                                <option value="">กรุงเทพฯ</option>
                                <option value="">นนทบุรี</option>
                                <option value="">ปทุมธานี</option>
                                <option value="">นครปฐม</option>
                                <option value="">สมุทรสาคร</option>
                                <option value="">สมุทรปราการ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Area / เขต / อำเภอ</label>
                            <select class="select2 form-control custom-select search_table_select" style="height: 36px;width: 100%;" name="sale_team_sub_name" id="search_sale_team_sub_name" data-placeholder="">
                                <option value="0">----Select----</option>
                                <option value="">ถนนเพชรเกษม / หนองแขม</option>
                                <option value="">ถนนทวีวัฒนา / หนองแขม</option>
                                <option value="">ถนนพุทธมณฑลสาย 3 / หนองแขม</option>
                                <option value="">ถนนกาญจนาภิเษก / บางกรวย</option>
                                <option value="">ถนนบางกรวย-ไทรน้อย / บางกรวย</option>
                                <option value="">ถนนนครอินทร์ / บางกรวย</option>
                                <option value="">ถนนเทพารักษ์ / บางพลี</option>
                                <option value="">ถนนกิ่งแก้ว / บางพลี</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Position of driver</label>
                            <select class="form-control custom-select search_table_select" name="admin_id" id="admin_id" data-placeholder="" tabindex="1">
                                <option value="0">----Select----</option>
                                <option value="1">พนักงานขับรถส่วนกลาง</option>
                                <option value="2">ผู้บริหารชาวไทย</option>
                                <option value="3">ผู้บริหารชาวต่างชาติ</option>
                                <option value="4">พนักงานขับรถทดแทน</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="ti-search"></i> Search</button>
                <button type="button" class="btn btn-secondary clear-search">Clear</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Backlog</h4>

                </div>
                <div class="table-responsive">
                    <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Confirmation full code</th>
                                <th scope="col">Company</th>
                                <th scope="col">Person</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">No. of units</th>
                                <th scope="col">Name of salesperson</th>
                                <th scope="col">Status Sale</th>
                                <th scope="col">Sale (Area)</th>
                                <th scope="col">Area</th>
                                <th scope="col">Qualification Requirement</th>
                                <th scope="col">Driver's Salary & Revenue Pack</th>
                                <th scope="col">Salesperson confirmed</th>
                                <th scope="col">Comment of salesperson</th>
                                <th scope="col">Operation Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>QT2020030013</td>
                                <td>SCG</td>
                                <td>1</td>
                                <td>คุณสรุชัย</td>
                                <td>3</td>
                                <td>Admin 3</td>
                                <td>รอเริ่มงาน</td>
                                <td>Apirat</td>
                                <td>ถนนเพชรเกษม / หนองแขม</td>
                                <td>พนักงานขับรถส่วนกลาง</td>
                                <td>14,700</td>
                                <td>08/02/2020</td>
                                <td>-</td>
                                <td>พิมพ์นภา</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-success label-rouded">Active</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewDetailModal" data-product_id="0">
                                        View
                                    </button>
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#FixSpecModal" data-product_id="0">
                                        Fix Spec
                                    </button>
                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#CancelModal" data-product_id="0">
                                        Cancel
                                    </button>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>QT2020030014</td>
                                <td>PTT</td>
                                <td>1</td>
                                <td>คุณอารีย์</td>
                                <td>5</td>
                                <td>Admin 1</td>
                                <td>รอนัดสัมภาษณ์</td>
                                <td>Monkon</td>
                                <td>ถนนทวีวัฒนา / หนองแขม</td>
                                <td>พนักงานขับรถส่วนกลาง</td>
                                <td>15,000</td>
                                <td>16/02/2020</td>
                                <td>-</td>
                                <td>สรวัฒน์</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-success label-rouded">Active</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewDetailModal" data-product_id="0">
                                        View
                                    </button>
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#FixSpecModal" data-product_id="0">
                                        Fix Spec
                                    </button>
                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#CancelModal" data-product_id="0">
                                        Cancel
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>QT2020030015</td>
                                <td>Impact</td>
                                <td>1</td>
                                <td>คุณนัยนา</td>
                                <td>4</td>
                                <td>Admin 2</td>
                                <td>รอสรรหา</td>
                                <td>Pankaa</td>
                                <td>ถนนกาญจนาภิเษก / บางกรวย</td>
                                <td>พนักงานขับรถส่วนกลาง</td>
                                <td>14,500</td>
                                <td>23/04/2020</td>
                                <td>-</td>
                                <td>สุกัญญา</td>
                                <td> <span class="badge badge-pill text-white font-medium badge-danger label-rouded">Disabled</span> </td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ViewDetailModal" data-product_id="0">
                                        View
                                    </button>
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#FixSpecModal" data-product_id="0">
                                        Fix Spec
                                    </button>
                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#CancelModal" data-product_id="0">
                                        Cancel
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="CancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cancel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for"">Comment</label>
                                    <textarea class="form-control" id="" name="" rows="4"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="FixSpecModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fix spec</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="quotation_full_code">Confirmation full code</label>
                                <input type="text" class="form-control" id="quotation_full_code" name="quotation_full_code" placeholder="" value="QT2020030013" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="back_order_unit">No. of units</label>
                                <input type="text" class="form-control" id="back_order_unit" name="back_order_unit" placeholder="" value="3" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Position driver</th>
                                        <th scope="col" class="text-center">Matching driver</th>
                                        <th scope="col" class="text-center">Driver wait for interview</th>
                                        <th scope="col" class="text-center">Interviewee not pass</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Driver</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> No. 1 </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#MatchingDriverModal" data-product_id="0">
                                                <b>4</b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#WaitIntervieModal" data-product_id="0">
                                                <b> 0 </b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#NotPassModal" data-product_id="0">
                                                <b> 2 </b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-pill text-white font-medium badge-warning label-rouded">กำลังหาคน</span>
                                        </td>
                                        <td></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ViewSpecModal" data-product_id="0">
                                                <i class="icon-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#EditSpecModal" data-product_id="0">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> No. 2 </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#MatchingDriverModal" data-product_id="0">
                                                <b>1</b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#WaitIntervieModal" data-product_id="0">
                                                <b> 1 </b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#NotPassModal" data-product_id="0">
                                                <b> 0 </b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-pill text-white font-medium badge-success label-rouded">กำลังสัมภาษณ์</span>
                                        </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ViewSpecModal" data-product_id="0">
                                                <i class="icon-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#EditSpecModal" data-product_id="0">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> No. 3 </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#MatchingDriverModal" data-product_id="0">
                                                <b>0</b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#WaitIntervieModal" data-product_id="0">
                                                <b> 0 </b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#NotPassModal" data-product_id="0">
                                                <b> 0 </b>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-pill text-white font-medium badge-info label-rouded">ได้คนแล้ว</span>
                                        </td>
                                        <td> <a href="javascript:void(0);" data-toggle="modal" data-target="#ViewDriverModal" data-product_id="0"><i class="icon-eye"></i> ศุภชัย ชูชื่น</a> </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ViewSpecModal" data-product_id="0">
                                                <i class="icon-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#EditSpecModal" data-product_id="0">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
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
<div class="modal fade" id="EditSpecModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit spec</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="gendedr">Gender</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1" id="gender1" name="gender">
                                            <label class="custom-control-label" for="gender1">ชาย</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="2" id="gender2" name="gender">
                                            <label class="custom-control-label" for="gender2">หญิง</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_language_name">Language ability</label>
                                    <select class="select2 form-control custom-select search_table_select" style="height: 36px;width: 100%;" name="driver_language_name" id="driver_language_name" multiple data-placeholder="" tabindex="1">
                                        <option value="0">----Select----</option>
                                        <option value="1">ภาษาไทย</option>
                                        <option value="2">English</option>
                                        <option value="3">Japanese</option>
                                        <option value="4">Korean</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="recruitment_position_id">Position</label>
                                        <select class="form-control custom-select search_table_select" name="recruitment_position_id" id="recruitment_position_id" data-placeholder="" tabindex="1">
                                            <option value="0">----Select----</option>
                                            <option value="1">พนักงานขับรถส่วนกลาง</option>
                                            <option value="2">ผู้บริหารชาวไทย</option>
                                            <option value="3">ผู้บริหารชาวต่างชาติ</option>
                                            <option value="4">พนักงานขับรถทดแทน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="recruitment_position_id">Experience</label>
                                        <select class="select2 form-control custom-select search_table_select" style="height: 36px;width: 100%;" multiple name="recruitment_position_id" id="recruitment_position_id" data-placeholder="" tabindex="1">
                                            <option value="0">----Select----</option>
                                            <option value="1">พนักงานขับรถส่วนกลาง</option>
                                            <option value="2">ผู้บริหารชาวไทย</option>
                                            <option value="3">ผู้บริหารชาวต่างชาติ</option>
                                            <option value="4">พนักงานขับรถทดแทน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="control-label">Area</label>
                                    <select class="select2 form-control custom-select search_table_select" multiple style="height: 36px;width: 100%;" name="sale_team_sub_name" id="sale_team_sub_name" data-placeholder="">
                                        <option value="">----Select----</option>
                                        <option value="">ถนนเพชรเกษม / หนองแขม</option>
                                        <option value="">ถนนทวีวัฒนา / หนองแขม</option>
                                        <option value="">ถนนพุทธมณฑลสาย 3 / หนองแขม</option>
                                        <option value="">ถนนกาญจนาภิเษก / บางกรวย</option>
                                        <option value="">ถนนบางกรวย-ไทรน้อย / บางกรวย</option>
                                        <option value="">ถนนนครอินทร์ / บางกรวย</option>
                                        <option value="">ถนนเทพารักษ์ / บางพลี</option>
                                        <option value="">ถนนกิ่งแก้ว / บางพลี</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_age_start">Start age</label>
                                    <input type="number" min="18" class="form-control" id="driver_age_start" name="driver_age_start" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="driver_age_end">End age</label>
                                    <input type="number" min="18" class="form-control" id="driver_age_end" name="driver_age_end" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
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
                                <div class="col-md-6 mb-3">
                                    <label for="districts_id">Status</label>
                                    <select class="form-control custom-select search_table_select" name="districts_id" id="districts_id" data-placeholder="">
                                        <option value="0">ปิดการใช้งาน</option>
                                        <option value="1" selected>เปิดการใช้งาน</option>
                                        <option value="2">ได้คนแล้ว</option>
                                        <option value="9">ยกเลิก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" class="form-control" id="back_order_spec_id" name="back_order_spec_id">
                        <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ViewSpecModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View spec</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Gender</td>
                                                <td> ชาย </td>
                                            </tr>
                                            <tr>
                                                <td>Language ability</td>
                                                <td> ภาษาไทย, English </td>
                                            </tr>
                                            <tr>
                                                <td>Position</td>
                                                <td> พนักงานขับรถส่วนกลาง </td>
                                            </tr>
                                            <tr>
                                                <td>Experience</td>
                                                <td> พนักงานขับรถส่วนกลาง, ผู้บริหารชาวต่างชาติ </td>
                                            </tr>
                                            <tr>
                                                <td>Area</td>
                                                <td>ถนนเพชรเกษม / หนองแขม, ถนนทวีวัฒนา / หนองแขม, ถนนกาญจนาภิเษก / บางกรวย</td>
                                            </tr>
                                            <tr>
                                                <td>Age</td>
                                                <td> 23 - 45</td>
                                            </tr>
                                            <tr>
                                                <td>Smoking</td>
                                                <td> No </td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td> เปิดการใช้งาน</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="NotPassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Interviewee not pass</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col" class="text-center">Driver</th>
                                                    <th scope="col" class="text-center">Telephone Number</th>
                                                    <th scope="col" class="text-center">Position</th>
                                                    <th scope="col" class="text-center">Gender</th>
                                                    <th scope="col" class="text-center">Age</th>
                                                    <th scope="col" class="text-center">Area</th>
                                                    <th scope="col" class="text-center">Language ability</th>
                                                    <th scope="col" class="text-center">Experience</th>
                                                    <th scope="col" class="text-center">Smoking</th>
                                                    <th scope="col" class="text-center">Match</th>
                                                    <th scope="col" class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> ดัสกร เปี่ยมสูงเนิน </td>
                                                    <td> 081-2345678 / 092-3456789 </td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย </td>
                                                    <td class="text-center"> 30 </td>
                                                    <td>ถนนเพชรเกษม / หนองแขม</td>
                                                    <td> ภาษาไทย, English </td>
                                                    <td>พนักงานขับรถส่วนกลาง, ผู้บริหารชาวต่างชาติ</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 60%; height:20px;" role="progressbar">60%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-md" title="Schedule an interview again" data-toggle="modal" data-target="#SchedInterviewModal" data-product_id="0">
                                                            <i class="far fa-clock"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 2 </td>
                                                    <td> ทวีศักดิ์ พูนสมบัติ </td>
                                                    <td> 081-2345678 / 092-3456789 </td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย </td>
                                                    <td class="text-center"> 24 </td>
                                                    <td>ถนนทวีวัฒนา / หนองแขม</td>
                                                    <td>ภาษาไทย</td>
                                                    <td>พนักงานขับรถส่วนกลาง</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 50%; height:20px;" role="progressbar">50%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-md" title="Schedule an interview again" data-toggle="modal" data-target="#SchedInterviewModal" data-product_id="0">
                                                            <i class="far fa-clock"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="WaitIntervieModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Driver wait for interview</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col" class="text-center">Driver</th>
                                                    <th scope="col" class="text-center">Telephone Number</th>
                                                    <th scope="col" class="text-center">Position</th>
                                                    <th scope="col" class="text-center">Gender</th>
                                                    <th scope="col" class="text-center">Age</th>
                                                    <th scope="col" class="text-center">Area</th>
                                                    <th scope="col" class="text-center">Language ability</th>
                                                    <th scope="col" class="text-center">Experience</th>
                                                    <th scope="col" class="text-center">Smoking</th>
                                                    <th scope="col" class="text-center">Match</th>
                                                    <th scope="col" class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> ภูวดล พัชรวิบูลย์ </td>
                                                    <td> 081-2345678 / 092-3456789 </td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย </td>
                                                    <td class="text-center"> 27 </td>
                                                    <td> ถนนกิ่งแก้ว / บางพล </td>
                                                    <td>ภาษาไทย, English</td>
                                                    <td>พนักงานขับรถส่วนกลาง, ผู้บริหารชาวต่างชาติ</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 100%; height:20px;" role="progressbar">100%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-success btn-md" title="Write interview results" data-toggle="modal" data-target="#InterviewResultsModal">
                                                            <i class="fas fa-bullhorn"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="InterviewResultsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Interview result</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Results</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1" id="back_order_interviwe_results1" name="back_order_interviwe_results">
                                            <label class="custom-control-label" for="back_order_interviwe_results1">Pass</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="99" id="back_order_interviwe_results2" name="back_order_interviwe_results">
                                            <label class="custom-control-label" for="back_order_interviwe_results2">Not passed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="back_order_interviwe_comment">Cause</label>
                                    <textarea class="form-control" id="back_order_interviwe_comment" name="back_order_interviwe_comment" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" class="form-control" id="back_order_spec_id" name="back_order_spec_id">
                        <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="MatchingDriverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Matching driver</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col" class="text-center">Driver</th>
                                                    <th scope="col" class="text-center">Telephone Number</th>
                                                    <th scope="col" class="text-center">Position</th>
                                                    <th scope="col" class="text-center">Gender</th>
                                                    <th scope="col" class="text-center">Age</th>
                                                    <th scope="col" class="text-center">Area</th>
                                                    <th scope="col" class="text-center">Language ability</th>
                                                    <th scope="col" class="text-center">Experience</th>
                                                    <th scope="col" class="text-center">Smoking</th>
                                                    <th scope="col" class="text-center">Match</th>
                                                    <th scope="col" class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> สมชาย มุ่งมั่น </td>
                                                    <td>081-2345678 / 092-3456789</td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย </td>
                                                    <td class="text-center"> 40 </td>
                                                    <td>ถนนบางกรวย-ไทรน้อย / บางกรวย </td>
                                                    <td>ภาษาไทย, English</td>
                                                    <td>พนักงานขับรถส่วนกลาง, ผู้บริหารชาวต่างชาต</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 100%; height:20px;" role="progressbar">100%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary btn-md" title="Schedule an interview" data-toggle="modal" data-target="#SchedInterviewModal" data-product_id="0">
                                                            <i class="far fa-clock"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 2 </td>
                                                    <td> อนุวัฒน์ จันทกาล </td>
                                                    <td>081-2345678 / 092-3456789</td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย</td>
                                                    <td class="text-center"> 35 </td>
                                                    <td> ถนนกาญจนาภิเษก / บางกรวย </td>
                                                    <td>ภาษาไทย, English</td>
                                                    <td>ผู้บริหารชาวต่างชาติ</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 75%; height:20px;" role="progressbar">75%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary btn-md" title="Schedule an interview" data-toggle="modal" data-target="#SchedInterviewModal" data-product_id="0">
                                                            <i class="far fa-clock"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 3 </td>
                                                    <td> ผดุง ด้วงคำ </td>
                                                    <td>081-2345678 / 092-3456789</td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย </td>
                                                    <td class="text-center"> 36 </td>
                                                    <td> ถนนเทพารักษ์ / บางพลี </td>
                                                    <td>ภาษาไทย</td>
                                                    <td>พนักงานขับรถส่วนกลาง</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 75%; height:20px;" role="progressbar">75%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary btn-md" title="Schedule an interview" data-toggle="modal" data-target="#SchedInterviewModal" data-product_id="0">
                                                            <i class="far fa-clock"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 4 </td>
                                                    <td> อัศนัย ภูมิวิศัย </td>
                                                    <td>081-2345678 / 092-3456789</td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย </td>
                                                    <td class="text-center"> 40 </td>
                                                    <td>ถนนพุทธมณฑลสาย 3 / หนองแขม </td>
                                                    <td>ภาษาไทย</td>
                                                    <td></td>
                                                    <td>Yes</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 50%; height:20px;" role="progressbar">50%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary btn-md" title="Schedule an interview" data-toggle="modal" data-target="#SchedInterviewModal" data-product_id="0">
                                                            <i class="far fa-clock"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ViewDriverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            สถานะ : รอนัดสัมภาษณ์, ไม่มาตามนัด/สละสิทธิ์, เริ่มงานใหม่ (ระบุวันที่)
                        </div>
                        <div class="col-md-6">
                            <div class="text-right mb-3">
                                ผลสัมภาษณ์ : <h6 class="badge badge-pill text-white font-medium badge-success label-rouded"> ผ่านสัมภาษณ์ </h6>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50%"> <label for="example-text-input" class="col-form-label">รูปภาพ</label> </td>
                                    <td>
                                        <img src="https://intervision.co/mock-up/assets/images/ExamplePicture.jpg" width='200' alt="Example Picture" />
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">รหัสพนักงาน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">รหัสพนักงาน</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ตำแหน่งงาน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">พนักงานขับรถส่วนกลาง</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันที่สมัคร</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">10/12/2562</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันที่เริ่มทำงาน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">01/01/2563</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">อายุการทำงาน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">0 ปี</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เพศ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ชาย</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">คำนำหน้าชื่อ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">นาย</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">สมชาย</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Name</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Somchai</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">นามสกุล</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">มั่งมั่น</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Surname</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Mungman</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อเล่น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">อ๊อด</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เลขบัตรประชาชน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">3-7642-00300-02-1</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันที่บัตรหมดอายุ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">11/12/2570</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ส่วนสูง</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">170</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">น้ำหนัก</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">72</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันเกิด</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">11/12/1976</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">อายุ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">43 ปี</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สัญชาติ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ไทย</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ศาสนา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">พุทธ</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สถานที่เกิด</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">กรุงเทพฯ</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">อีเมล</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7605191b151e171f291b4f4f36111b171f1a5815191b">[email&#160;protected]</a></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ที่อยู่ปัจจุบัน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">791 เบอร์รี่อพาร์ทเม้น 15/2 ซอยพระราม 9 แขวงบางกะปิ เขตห้วยขวาง กรุงเทพฯ</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ที่อยู่ปัจจุบัน (ภาษาอังกฤษ)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">791 Berry Apartments 15/2 Soi Rama 9, Bang Kapi Subdistrit, Huai Khwang Distrit, Bangkok</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ที่อยู่ตามทะเบียนบ้าน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">84 ซอยพระราม 9 แขวงบางกะปิ เขตห้วยขวาง กรุงเทพฯ</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ที่อยู่ตามทะเบียนบ้าน (ภาษาอังกฤษ)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">84 Soi Rama 9, Bang Kapi Subdistrit, Huai Khwang Distrit, Bangkok</label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ข้อมูลครอบครัว</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50%"> <label for="example-text-input" class="col-form-label">สถานภาพครอบครัว</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">สมรสไม่จดทะเบียน</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">จำนวนบุตร</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">2</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อคู่สมรส</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">นางสาว มาลัยพร</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อคู่สมรส (ภาษาอังกฤษ)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Miss Maalaiphon</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">นามสกุลคู่สมรส</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ศิริกุล</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">นามสกุลคู่สมรส (ภาษาอังกฤษ)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Sirikul</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ตำแหน่งงานของคู่สมรส</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">บัญชี</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">บริษัทที่ทำงานของคู่สมรส</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">บริษัท เสริมสงวนชัย จำกัด</label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ข้อมูลบิดา - มารดา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td align="center">ชื่อ <br> (ชื่อภาษาไทย) </td>
                                    <td align="center">นามสกุล <br> (นามสกุลภาษาไทย) </td>
                                    <td align="center">อายุ</td>
                                    <td align="center">สถานะ</td>
                                    <td align="center">อาชีพ</td>
                                    <td align="center">ตำแหน่งงาน</td>
                                    <td align="center">บริษัทที่ทำงาน</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">บิดา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">นาย สมหมาย</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> มุ่งมั่น </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 63 ปี </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> มีชีวิตอยู่ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ขายของชำ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">มารดา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> นางเอี่ยม </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> มุ่งมั่น </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 63 ปี </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> มีชีวิตอยู่ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ขายของชำ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ข้อมูลพี่น้อง</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>สถานะ</td>
                                    <td>อายุ</td>
                                    <td>อาชีพ</td>
                                    <td>บริษัท</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">1</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">อนุชิต</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">หอมชื่น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">น้อง</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Programmer</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Inter Vistion </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">2</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">มะลิ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">หอมชื่น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">น้อง</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">นักศึกษา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">-</label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ประวัติการศึกษา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg text-center">
                            <thead>
                                <tr>
                                    <td>ระดับการศึกษา</td>
                                    <td>ตั้งแต่ (From)</td>
                                    <td>ถึง (Since)</td>
                                    <td>ชื่อสถาบันการศึกษา</td>
                                    <td>วิชาเอก / วิชาโท</td>
                                    <td>เกรดเฉลี่ย</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ประถมศึกษา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2520 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2526 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> โรงเรียนนันทวันศึกษา </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 3.10 </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">มัธยมศึกษา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2526 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2529 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> โรงเรียนนันทวันศึกษา </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 3.26 </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">อาชีวศึกษา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2529 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2532 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> เทคโนโลยีรัตนพงษ์ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ช่างยนต์ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 3.00 </label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ประวัติการทำงาน</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>จำนวนปี</td>
                                    <td>ตั้งแต่</td>
                                    <td>ถึง</td>
                                    <td colspan="4">บริษัทปัจจุบัน</td>
                                    <td colspan="3">ตำแหน่ง</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">10</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">2536</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">2546</label> </td>
                                    <td colspan="4"> <label for="example-text-input" class="col-form-label"> </label> บริษัท เล่งหงยานยนต์ จำกัด </td>
                                    <td colspan="3"> <label for="example-text-input" class="col-form-label"> </label> ช่างซ่อมบำรุง </td>
                                </tr>
                                <tr>
                                    <td rowspan="2"> <label for="example-text-input" class="col-form-label">เงินเดือน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">เริ่มต้น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 6,000 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ค่าคอมมิชชั่น </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ค่าโทรศัพท์ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ค่าน้ำมัน </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> โบนัส </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> เบี้ยขยัน </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> อื่น ๆ </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สุดท้าย</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 12,000 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">หน้าที่และความรับผิดชอบโดยละเอียด</label> </td>
                                    <td colspan="8"> รับผิดชอบงานซ่อมรถยนต์ </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สาเหตุที่ออก</label> </td>
                                    <td colspan="8"> บริษัทปิดตัว </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อผู้บังคับบัญชา</label> </td>
                                    <td colspan="8"> นายหมง แซ่อึง </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>จำนวนปี</td>
                                    <td>ตั้งแต่</td>
                                    <td>ถึง</td>
                                    <td colspan="4">บริษัทปัจจุบัน</td>
                                    <td colspan="3">ตำแหน่ง</td>
                                </tr>
                            </thead>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">15</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">2547</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">2562</label> </td>
                                <td colspan="4"> <label for="example-text-input" class="col-form-label"> </label> บริษัท ชัยการช่าง จำกัด </td>
                                <td colspan="3"> <label for="example-text-input" class="col-form-label"> </label> หัวหน้าช่าง </td>
                            </tr>
                            <tr>
                                <td rowspan="2"> <label for="example-text-input" class="col-form-label">เงินเดือน</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">เริ่มต้น</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">10,000</label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> ค่าคอมมิชชั่น </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> ค่าโทรศัพท์ </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> ค่าน้ำมัน </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> โบนัส </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> เบี้ยขยัน </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> อื่น ๆ </label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">สุดท้าย</label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> 15,000 </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">หน้าที่และความรับผิดชอบโดยละเอียด</label> </td>
                                <td colspan="8"> ดูแลช่างซ่อมรถ และตรวจงานซ่อมรถ </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">สาเหตุที่ออก</label> </td>
                                <td colspan="8"> ไม่ก้าวหน้า </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">ชื่อผู้บังคับบัญชา</label> </td>
                                <td colspan="8"> นายชัย ขันติรัต </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ประวัติการฝึกอบรม</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ปี</td>
                                    <td>หลักสูตร</td>
                                    <td>สถาบันฝึกอบรม</td>
                                    <td>ระยะเวลา</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">2550</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> หลักสูตรการพ่นซ่อมสีรถยนต์ระบบโซลเว้นท์ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> สถาบันพัฒนาทรพยากรมนุษย์และองค์กร </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2 วัน </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">2560</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> พัฒนาพนักงานขับรถมืออาชีพ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> สถาบันพัฒนาทรพยากรมนุษย์และองค์กร </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 3 วัน </label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ความสามารถทางภาษา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ภาษา</td>
                                    <td>การพูด</td>
                                    <td>การอ่าน</td>
                                    <td>การเขียน</td>
                                    <td>ผลทดสอบด้านภาษา (ถ้ามี)</td>
                                    <td>คะแนน</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">English</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ดี</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ดี</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ดี</label> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Japanese</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ดี </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ดี </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ดี </label> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">ข้อมูลอื่น ๆ</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50%"> <label for="example-text-input" class="col-form-label">รายได้รวมที่ต้องการ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">15,000</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันที่เริ่มงานได้</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">01/01/2563</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สถานภาพทางทหาร</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ผ่านการเกณฑ์ทหารแล้ว</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เหตุผลที่ได้รับการยกเว้น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">-</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ยานพาหนะ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">มี</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เลขที่ใบขับขี่รถยนต์</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">49005678</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันหมดอายุ ใบขับขี่รถยนต์</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">01/01/2565</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เลขที่ใบขับขี่รถจักรยานยนต์</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">53001909</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันหมดอายุ ใบขับขี่รถจักรยานยนต์</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">01/01/2565</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ท่านเคยป่วยหนักในรอบปีที่ผ่านมาหรือไม่</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">No</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ท่านเคยถูกจับต้องคดีอาญาหรือไม่</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">No</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ท่านเคยถูกเลิกจ้างหรือไม่</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">No</label> </td>
                                </tr>
                                <tr>
                                    <td width="50%"> <label for="example-text-input" class="col-form-label">ตำแหน่งที่ท่านสมัครต้องมีบุคคลค้ำประกัน ท่ายสามารถหาบุคคลค้ำประกันได้หรือไม่</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Yes</label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">บุคคลอ้างอิง</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>ความสัมพันธ์</td>
                                    <td>บริษัท</td>
                                    <td>อาชีพ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td> นาย ชัย </td>
                                    <td> ขันติรัต </td>
                                    <td> เจ้านายเก่า </td>
                                    <td> บริษัท ชัยการช่าง จำกัด </td>
                                    <td> ธุรกิจส่วนตัว </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>ความสัมพันธ์</td>
                                    <td>ที่อยู่</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> นางสาว มาลัยพร </td>
                                    <td> ศิริกุล </td>
                                    <td> ภรรยา </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td> นายอนุชิต </td>
                                    <td> หอมชื่น </td>
                                    <td> น้องชาย </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2"></h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ทราบข่าวการสมัครงานจาก</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">เพื่อนแนะนำ</label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">เอกสารอื่น ๆ</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ประเภท</td>
                                    <td>File</td>
                                    <td>รายละเอียด</td>
                                    <td>วันที่</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> สำเนาบัตรประชาชน </td>
                                    <td> <a href="javascript:void(0)"> <i class="mdi mdi-download"></i> Download</a> </td>
                                    <td> </td>
                                    <td> 01/01/2563 </td>
                                </tr>
                                <tr>
                                    <td> สำเนาใบขับขี่รถยนต์ </td>
                                    <td> <a href="javascript:void(0)"> <i class="mdi mdi-download"></i> Download</a> </td>
                                    <td> </td>
                                    <td> 01/01/2563 </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">ประวัติอาชญากรรม</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>วันนัดตรวจ</td>
                                    <td>ผลตรวจ</td>
                                    <td>ประเภท</td>
                                    <td>File</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td>20/04/2563</td>
                                    <td> พบ </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">ผลตรวจสุขภาพ</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>สรุปผลการตรวจ</td>
                                    <td>ความเห็นแพทย์อาชีวเวชศาสตร์</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">ข้อมูลรับชุดฟอร์มเริ่มงานใหม่/ครบปี</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>วันที่รับ</td>
                                    <td>จำนวนที่รับ</td>
                                    <td>ราคา</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> 03/04/2563 </td>
                                    <td> 1 </td>
                                    <td> 500.00 </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">ยอดรวม</td>
                                    <td>500.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">การลาออก</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>ประเภทการลาออก</td>
                                    <td>เลขที่เอกสาร</td>
                                    <td>วันที่ทำงานวันสุดท้าย</td>
                                    <td>วันที่มีผลบังคับใช้</td>
                                    <td>เหตุผลการลาออก</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> ลาออกถูกต้อง </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td> 2 </td>
                                    <td> ลาออกไม่ถูกต้อง </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SchedInterviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Schedule an interview</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="driver_interview_criminal_date">Date</label>
                                    <input type="date" class="form-control" id="driver_interview_criminal_date" name="driver_interview_criminal_date" placeholder="" value="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_interview_criminal_date">Time</label>
                                    <input type="time" class="form-control" id="driver_interview_criminal_time" name="driver_interview_criminal_time" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="hidden" class="form-control" id="driver_id" name="driver_id">
                        <input type="hidden" class="form-control" id="driver_interview_id" name="driver_interview_id">
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ViewDetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
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
                                    <td>Confirmation full code </td>
                                    <td>QT2020030013 </td>
                                </tr>
                                <tr>
                                    <td>Person </td>
                                    <td>1 </td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Types of customer </th>
                                    <th>Company </th>
                                    <th>Customer name </th>
                                    <th>Location</th>
                                    <th width="30%">ผู้ติดต่อ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Existing</td>
                                    <td>SCG </td>
                                    <td>คุณยุรนันท์ </td>
                                    <td>ที่พักผู้บริหาร</td>
                                    <td>คุณสรุชัย <br> 092-345-6789 <br> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="186b6d6a797b707971472821587f75797174367b7775">[email&#160;protected]</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">No. of units</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">3</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Name of salesperson</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Admin 3</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Status sale</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">รอเริ่มงาน</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Sale (Area)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Apirat</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Area</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Area</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Qualification Requirement</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">พนักงานขับรถส่วนกลาง</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Driver's Salary Revenue Pack</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">14,700</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ประมาณการ OT พขร.ต่อเดือน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">5,000</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Services charges</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">18,000</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Salesperson confirmed</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">08/02/2020</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Comment of salesperson</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">-</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Operation name</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">พิมพ์นภา</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Delivery expected date</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Overdue (MM) (ระบุจำนวนเดือน ที่ยังสรรหา พขร.ไม่ได้)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">03</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Time length (DD) (ระบุจำนวนวัน ที่ยังสรรหา พขร.ไม่ได้)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">17</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Confirmation recruit date</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">07/03/2020</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Status Operation</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ศุภชัย ชูชื่น</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Status</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Acitive</label> </td>
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
@endsection