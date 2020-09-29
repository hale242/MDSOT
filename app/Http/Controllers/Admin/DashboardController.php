<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\MenuSystem;
use App\Provinces;
use App\Amphures;
use App\Districts;
use App\Zipcode;
use App\Driver;
use App\PriceStructureApprove;
use App\PriceStructure;
use App\PickupEquipment;
use App\WorkingEquipment;
use App\DriverInterview;
use App\DriverLeaveApprove;
use App\DriverMakingLeave;
use App\LeaveType;
use App\DriverLeaveLineBranch;
use App\CustomerContract;
use App\Company;
use App\HolidayCalendar;
use App\ContactInfo;
use App\QuotationPriceList;
use App\QuotationGroupingDriver;
use App\DriverWorking;
use App\RecruitmentPosition;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Dashboard')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();

        $data['Number_Drivers'] = Driver::whereIn('driver_status', ['1', '2', '3', '99'])->count();
        $data['Number_Drivers_Standbys'] = Driver::where('driver_status', 1)->count();
        $data['Number_Drivers_Replacements'] = Driver::where('driver_status', 2)->count();

        $data['Number_DriverWorking'] = DriverWorking::leftjoin('driver as driver_new', 'driver_new.driver_id', 'driver_working.driver_id')->where('driver_new.driver_status', 2)->count();
        $data['Number_ContactInfo'] = ContactInfo::where('customer_status', 1)->count();
        $data['Number_Driver_job1'] = Driver::where('recruitment_position_id', 1)->count();
        $data['Number_Driver_job2'] = Driver::where('recruitment_position_id', 2)->count();
        $data['Number_Driver_job3'] = Driver::where('recruitment_position_id', 3)->count();

        $data['Number_RecruitAndOperationApp'] = Driver::leftjoin('driver_interview', 'driver_interview.driver_id', 'driver.driver_id')
            ->where('driver.driver_status_job_app', 4) //4 = ผ่านการทดสอบขับรถ
            ->where('driver_interview.driver_interview_criminal_status', 1)
            ->where(function ($q) {
                $q->whereNull('driver.driver_status');
                $q->orWhere('driver.driver_status', 0);
            })
            ->where(function ($q) {
                $q->where(function ($sq) {
                    $sq->where(function ($query) {
                        $query->whereNull('driver_interview.driver_interview_recrult_status');
                        $query->whereNull('driver_interview.driver_interview_operation_status');
                    });
                    $sq->orWhere(function ($query) {
                        $query->where('driver_interview.driver_interview_recrult_status', 0);
                        $query->where('driver_interview.driver_interview_operation_status', 0);
                    });
                });
                $q->orWhere(function ($sq) {
                    $sq->where('driver_interview.driver_interview_recrult_status', 1);
                    $sq->whereNull('driver_interview.driver_interview_operation_status');
                });
                $q->orWhere(function ($sq) {
                    $sq->where('driver_interview.driver_interview_operation_status', 1);
                    $sq->whereNull('driver_interview.driver_interview_recrult_status');
                });
                $q->orWhere(function ($sq) {
                    $sq->where('driver_interview.driver_interview_recrult_status', 1);
                    $sq->where('driver_interview.driver_interview_operation_status', 0);
                });
                $q->orWhere(function ($sq) {
                    $sq->where('driver_interview.driver_interview_operation_status', 1);
                    $sq->where('driver_interview.driver_interview_recrult_status', 0);
                });
            })
            ->count();
        $data['Number_ApproveNewDriver'] = Driver::leftjoin('driver_interview', 'driver_interview.driver_id', 'driver.driver_id')
            ->where('driver.driver_status_job_app', 4) //4 = ผ่านการทดสอบขับรถ
            ->whereNull('driver.driver_status')
            ->where('driver_interview.driver_interview_recrult_status', 1)
            ->where('driver_interview.driver_interview_operation_status', 1)
            ->count();
        $data['Number_DriverLeaveApproves'] = DriverLeaveApprove::where('driver_leave_approve_status', 1)->count();
        $data['Number_PriceStructureApproves'] = PriceStructureApprove::where('price_structure_approve_status', 1)->count();
        $data['Number_Equipments'] = PickupEquipment::where('pickup_equipment_status', 1)->count();
        $data['Number_Driver_Wait_Interviews'] = Driver::where('driver_status_job_app', 0)->count();
        $data['Number_DriverInterviews'] = DriverInterview::where('driver_interview_status', 1)->count();

        $data['Number_CustomerContract'] = CustomerContract::where('customer_contract_status', 1)->count();

        $data['RecruitmentPositions'] = RecruitmentPosition::with('Driver')->get();

        $admin = Auth::guard('admin')->user();

        $data['Table_ApproveNewDriver'] = Driver::select(
            'driver.driver_id'
            ,'driver.driver_name_th'
            ,'driver.driver_name_en'
            ,'driver.driver_lastname_th'
            ,'driver.driver_lastname_en'
            ,'driver.driver_id_card_no'
            ,'driver.driver_age'
            ,'driver.driver_status_job_app'
            ,'driver.driver_interview_date'
            ,'driver.driver_availlale_date'
            ,'recruitment_position.recruitment_position_name'
            ,'districts.districts_name'
            ,'amphures.amphures_name'
            ,'provinces.provinces_name'
            ,'driver_interview.driver_interview_id'
            ,'driver_interview.driver_interview_criminal_date'
            ,'driver_interview.driver_interview_recrult_status'
        )
        ->leftjoin('driver_interview', 'driver_interview.driver_id', 'driver.driver_id')
        ->leftjoin('recruitment_position', 'recruitment_position.recruitment_position_id', 'driver.recruitment_position_id')
        ->leftjoin('districts', 'districts.districts_id', 'driver.districts_id')
        ->leftjoin('amphures', 'amphures.amphures_id', 'districts.amphures_id')
        ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')
        ->where('driver.driver_status_job_app', 4) //4 = ผ่านการทดสอบขับรถ
        ->whereNull('driver.driver_status')
        ->where('driver_interview.driver_interview_recrult_status', 1)
        ->where('driver_interview.driver_interview_operation_status', 1)
        ->with('DriverInterview.DriverCriminalRecordPass')
        ->limit(5)
        ->get();

        $data['Table_RecruitAndOperationApp'] = Driver::select(
            'driver.driver_id'
            ,'driver.driver_name_th'
            ,'driver.driver_name_en'
            ,'driver.driver_lastname_th'
            ,'driver.driver_lastname_en'
            ,'driver.driver_id_card_no'
            ,'driver.driver_age'
            ,'driver.driver_status_job_app'
            ,'driver.driver_interview_date'
            ,'driver.driver_availlale_date'
            ,'recruitment_position.recruitment_position_name'
            ,'districts.districts_name'
            ,'amphures.amphures_name'
            ,'provinces.provinces_name'
            ,'driver_interview.driver_interview_id'
            ,'driver_interview.driver_interview_criminal_date'
            ,'driver_interview.driver_interview_recrult_status'
        )
        ->leftjoin('driver_interview', 'driver_interview.driver_id', 'driver.driver_id')
        ->leftjoin('recruitment_position', 'recruitment_position.recruitment_position_id', 'driver.recruitment_position_id')
        ->leftjoin('districts', 'districts.districts_id', 'driver.districts_id')
        ->leftjoin('amphures', 'amphures.amphures_id', 'districts.amphures_id')
        ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')
        ->where('driver.driver_status_job_app', 4) //4 = ผ่านการทดสอบขับรถ
        ->where('driver_interview.driver_interview_criminal_status', 1)
        ->where(function($q){
            $q->whereNull('driver.driver_status');
            $q->orWhere('driver.driver_status', 0);
        })
        ->where(function($q){
            $q->where(function($sq){
                $sq->where(function($query){
                  $query->whereNull('driver_interview.driver_interview_recrult_status');
                  $query->whereNull('driver_interview.driver_interview_operation_status');
                });
                $sq->orWhere(function($query){
                  $query->where('driver_interview.driver_interview_recrult_status', 0);
                  $query->where('driver_interview.driver_interview_operation_status', 0);
                });
            });
            $q->orWhere(function($sq){
                $sq->where('driver_interview.driver_interview_recrult_status', 1);
                $sq->whereNull('driver_interview.driver_interview_operation_status');
            });
            $q->orWhere(function($sq){
                $sq->where('driver_interview.driver_interview_operation_status', 1);
                $sq->whereNull('driver_interview.driver_interview_recrult_status');
            });
            $q->orWhere(function($sq){
                $sq->where('driver_interview.driver_interview_recrult_status', 1);
                $sq->where('driver_interview.driver_interview_operation_status', 0);
            });
            $q->orWhere(function($sq){
                $sq->where('driver_interview.driver_interview_operation_status', 1);
                $sq->where('driver_interview.driver_interview_recrult_status', 0);
            });
        })
        ->with('DriverInterview.DriverCriminalRecordPass')
        ->limit(5)
        ->get();

        $data['Table_PriceStructureApproves'] = PriceStructureApprove::select(
            'price_structure_approve.*',
            'price_structure.item_code_id',
            'price_structure.price_structure_name',
            'price_structure.price_structure_profit_percen',
            'price_structure.price_structure_sale_price',
            'price_structure.price_structure_profit_price',
            'price_structure.price_structure_date_start',
            'item_code.item_code_name',
            'admin_applicant.first_name as admin_applicant_firstname',
            'admin_applicant.last_name as admin_applicant_lastname',
            'admin_approve.first_name as admin_approve_firstname',
            'admin_approve.last_name as admin_approve_lastname'
        )
            ->leftjoin('price_structure', 'price_structure.price_structure_id', 'price_structure_approve.price_structure_id')
            ->leftjoin('item_code', 'item_code.item_code_id', 'price_structure.item_code_id')
            ->leftjoin('admin_user as admin_applicant', 'admin_applicant.admin_id', 'price_structure.admin_id')
            ->leftjoin('admin_user as admin_approve', 'admin_approve.admin_id', 'price_structure.price_structure_approve_admin_id')
            ->leftjoin('price_structure_line_approve', 'price_structure_line_approve.price_structure_line_approve_lv', 'price_structure_approve.price_structure_approve_lv')
            ->with('PriceStructure')
            ->where('price_structure_approve.price_structure_approve_status', 1)
            ->where('price_structure_line_approve.position_id', $admin->position_id)
            ->limit(5)
            ->get();
        $data['Table_DriverLeaveApprove'] = DriverLeaveApprove::select(
            'driver_leave_approve.*',
            'driver_making_leave.driver_id',
            'driver_making_leave.leave_type_id',
            'driver_making_leave.driver_leave_line_branch_id',
            'driver_making_leave.driver_making_leave_name',
            'driver_making_leave.driver_making_leave_start_date',
            'driver_making_leave.driver_making_leave_end_date',
            'driver_making_leave.driver_making_leave_count_date',
            'driver_making_leave.driver_making_leave_date_approve',
            'driver_making_leave.driver_making_leave_type',
            'driver_making_leave.driver_making_leave_status',
            'driver.driver_name_th',
            'driver.driver_lastname_th',
            'leave_type.leave_type_name',
            'driver_leave_line_branch.driver_leave_line_branch_name'
        )
            ->leftjoin('driver_making_leave', 'driver_making_leave.driver_making_leave_id', 'driver_leave_approve.driver_making_leave_id')
            ->leftjoin('driver', 'driver.driver_id', 'driver_making_leave.driver_id')
            ->leftjoin('leave_type', 'leave_type.leave_type_id', 'driver_making_leave.leave_type_id')
            ->leftjoin('driver_leave_line_branch', 'driver_leave_line_branch.driver_leave_line_branch_id', 'driver_making_leave.driver_leave_line_branch_id')
            ->leftjoin('driver_leave_line_approve', function ($join) {
                $join->on('driver_leave_line_approve.driver_leave_line_approve_lv', '=', 'driver_leave_approve.driver_leave_approve_lv');
                $join->on('driver_leave_line_approve.driver_leave_line_branch_id', 'driver_leave_approve.driver_leave_line_branch_id');
            })
            ->where('position_id', $admin->position_id)
            ->where('driver_leave_approve.driver_leave_approve_status', 1)
            ->limit(5)
            ->get();

        $data['Table_Interview'] = Driver::select(
            'driver.driver_id',
            'driver.driver_name_th',
            'driver.driver_name_en',
            'driver.driver_lastname_th',
            'driver.driver_lastname_en',
            'driver.driver_id_card_no',
            'driver.driver_age',
            'driver.driver_status_job_app',
            'driver.driver_interview_date',
            'driver.driver_availlale_date',
            'driver.driver_mobile_phone',
            'recruitment_position.recruitment_position_name',
            'districts.districts_name',
            'amphures.amphures_name',
            'provinces.provinces_name',
            'driver_interview.driver_interview_id',
            'driver_interview.driver_interview_run_code'
        )
            ->leftjoin('driver_interview', 'driver_interview.driver_id', 'driver.driver_id')
            ->leftjoin('recruitment_position', 'recruitment_position.recruitment_position_id', 'driver.recruitment_position_id')
            ->leftjoin('districts', 'districts.districts_id', 'driver.districts_id')
            ->leftjoin('amphures', 'amphures.amphures_id', 'districts.amphures_id')
            ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')
            ->whereNotNull('driver.driver_interview_date')
            ->whereNotIn('driver.driver_status_job_app', [4, 5])
            ->where(function ($q) {
                $q->whereNotIn('driver_interview.driver_interview_personality_results', [9]);
                $q->orWhereNotIn('driver_interview.driver_interview_test_results', [9]);
                $q->orWhereNotIn('driver_interview.driver_interview_driver_results', [9]);
            })
            ->limit(5)
            ->get();

        $data['Table_Timesheet'] = CustomerContract::select(
            'customer_contract.*',
            'quotation.quotation_full_code',
            'company.company_name_th'
        )
            ->leftjoin('quotation', 'quotation.quotation_id', 'customer_contract.quotation_id')
            ->leftjoin('company', 'company.company_id', 'customer_contract.company_id')
            ->where('customer_contract.customer_contract_status', 4)
            ->with('Quotation.QuotationPriceListMain', 'SaleOrder')
            ->limit(5)
            ->get();

        $data['Table_PickupEquipment'] = PickupEquipment::select(
            'pickup_equipment.pickup_equipment_id',
            'pickup_equipment.driver_id',
            'pickup_equipment.pickup_equipment_count',
            'pickup_equipment.pickup_equipment_date_approve',
            'pickup_equipment.pickup_equipment_comment',
            'pickup_equipment.pickup_equipment_status',
            'pickup_equipment.pickup_equipment_site',
            'pickup_equipment.created_at',
            'working_equipment.working_equipment_name',
            'admin_user.first_name',
            'admin_user.last_name'
        )
            ->leftjoin('working_equipment', 'working_equipment.working_equipment_id', 'pickup_equipment.working_equipment_id')
            ->leftjoin('admin_user', 'admin_user.admin_id', 'pickup_equipment.admin_id')
            ->with('Driver')
            ->limit(5)
            ->get();

        $data['HolidayCalendars'] = HolidayCalendar::whereNotNull('holiday_calendar_date')->where('holiday_calendar_date', 'like', '%' . '-' . date('m') . '-' . '%')->get();
        $data['Months'] = [
            "01" => 'January',
            "02" => 'February',
            "03" => 'March',
            "04" => 'April',
            "05" => 'May',
            "06" => 'June',
            "07" => 'July',
            "08" => 'August',
            "09" => 'September',
            "10" => 'October',
            "11" => 'November',
            "12" => 'December',
        ];
        return view('admin.dashboard', $data);
    }

    public function GetProvinceByGeography($geo_id)
    {
        $result = Provinces::where('geo_id', $geo_id)->where('provinces_status', 1)->get();
        return $result;
    }

    public function GetAmphurByProvince($provinces_id)
    {
        $result = Amphures::where('provinces_id', $provinces_id)->where('amphures_status', 1)->get();
        return $result;
    }

    public function GetDistrictByAmphur($amphur_id)
    {
        $result = Districts::where('amphures_id', $amphur_id)->where('districts_status', 1)->get();
        return $result;
    }

    public function GetZipcodeByDistrict($districts_code)
    {
        $result = Zipcode::where('districts_code', $districts_code)->first();
        return $result;
    }

    public function GetHoliday($mouth)
    {
        $result = HolidayCalendar::whereNotNull('holiday_calendar_date')->where('holiday_calendar_date', 'like', '%' . $mouth . '-' . '%')->get();
        // $result['format_holiday_calendar_date'] = $result->holiday_calendar_date ? date("Y-m-d", strtotime($result->holiday_calendar_date)) : '';
        return $result;
    }

    public function GetCustomerByCompany($company_id)
    {
        $result = ContactInfo::where('company_id', $company_id)->get();
        return $result;
    }

    public function GetQuotationPriceListByGroupQuotation(Request $request, $quotation_id)
    {
        $quotation_grouping_id = $request->input('quotation_grouping_id');
        $QuotationPriceLists = QuotationPriceList::select(
            'price_structure_id',
            'quotation_id',
            DB::raw('SUM(quotation_price_list_unit) AS sum_unit')
        )
            ->where('quotation_id', $quotation_id)
            ->whereNull('main_quotation_price_list_id')
            ->groupBy('price_structure_id', 'quotation_id')
            ->with('PriceStructure')
            ->get();

        $result = [];
        foreach ($QuotationPriceLists as $key => $val) {
            $sum = QuotationGroupingDriver::where([
                'quotation_id' => $val->quotation_id,
                'price_structure_id' => $val->price_structure_id
            ])->sum('quotation_grouping_driver_num');

            $QuotationGroupingDriver = QuotationGroupingDriver::where([
                'quotation_id' => $val->quotation_id,
                'price_structure_id' => $val->price_structure_id,
                'quotation_grouping_id' => $quotation_grouping_id
            ])->first();

            $result[$key]['price_structure_id'] = $val->price_structure_id;
            $result[$key]['price_structure_name'] = $val->PriceStructure ? $val->PriceStructure->price_structure_name : '';
            $result[$key]['total'] = $sum;
            $result[$key]['balance'] = ($val->sum_unit - $sum);
            $result[$key]['quotation_grouping_driver_status'] = $QuotationGroupingDriver ? 1 : 0;
            $result[$key]['quotation_grouping_driver_num'] = $QuotationGroupingDriver ? $QuotationGroupingDriver->quotation_grouping_driver_num : 0;
        }
        return $result;
    }
}
