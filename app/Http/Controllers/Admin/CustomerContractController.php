<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use PDF;
use DateTime;
use Auth;
use App\Helper;
use App\MenuSystem;
use App\Company;
use App\CustomerContract;
use App\HeadDocuments;
use App\RunCode;
use App\HolidayCalendar;
use App\TimesheetContractOtTemp;
use App\TimesheetHolidayCalendar;
use App\TimesheetContractOt;
use App\BackOrderSpec;
use App\QuotationPriceList;
use App\DriverWorking;
use App\TimesheetHolidayCalendarDriver;
use App\TimesheetContractDriver;
use App\TimesheetContractDriverOt;
use App\QuotationPriceListOt;
use App\TimesheetContract;
use App\PriceStructureOT;
use App\Driver;

class CustomerContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'CustomerContract')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Companies'] = Company::where('company_status', 1)->get();
        $data['HeadDocuments'] = HeadDocuments::where('head_documents_status', 1)->get();
        $data['RunCodes'] = RunCode::where('run_code_status', 1)->where('run_code_type', 6)->get(); //(6) สัญญาจ้างบริการพนักงานขับรถยนต์ (ไทย - อังกฤษ) F#1
        if (Helper::CheckPermissionMenu('CustomerContract', '1')) {
            return view('admin.CustomerContract.customer_contract', $data);
        } else {
            return redirect('admin/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = CustomerContract::with('Company', 'Quotation')->find($id);
        $content->customer_contract_date_approve = $content->customer_contract_date_approve ? date('Y-m-d', strtotime($content->customer_contract_date_approve)) : '';
        $content->customer_contract_date_start = $content->customer_contract_date_start ? date('Y-m-d', strtotime($content->customer_contract_date_start)) : '';
        $content->customer_contract_date_end = $content->customer_contract_date_end ? date('Y-m-d', strtotime($content->customer_contract_date_end)) : '';
        $content->format_customer_contract_date_start = $content->customer_contract_date_start ? date('d/m/Y', strtotime($content->customer_contract_date_start)) : '';
        $content->format_customer_contract_date_end = $content->customer_contract_date_end ? date('d/m/Y', strtotime($content->customer_contract_date_end)) : '';
        $content->sum_unit = $content->Quotation && $content->Quotation->QuotationPriceListMain ? $content->Quotation->QuotationPriceListMain->sum('quotation_price_list_unit') : 0;
        $content->Company->company_bill_date = $content->Company && $content->Company->company_bill_date ? date('Y-m-d', strtotime($content->Company->company_bill_date)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get CustomerContract';
        $return['content'] = $content;
        return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input_all = $request->all();
        $run_code_id = $input_all['run_code_id'];
        unset($input_all['run_code_id']);
        $validator = Validator::make($request->all(), [
            'head_documents_id' => 'required',
            'customer_contract_date_start' => 'required',
            'customer_contract_date_end' => 'required',
            'customer_contract_month' => 'required',
            'customer_contract_time_start' => 'required',
            'customer_contract_time_end' => 'required',
            'customer_contract_price' => 'required',
            'customer_contract_customer_sign' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {

                $CustomerContract = CustomerContract::find($id);
                foreach ($input_all as $key => $val) {
                    $CustomerContract->{$key} = $val;
                }
                if ($CustomerContract->customer_contract_price) {
                    $CustomerContract->customer_contract_price = str_replace(',', '', $CustomerContract->customer_contract_price);
                }
                if ($run_code_id) {
                    $CustomerContract->customer_contract_full_code = Helper::RunDocNo($run_code_id, true);
                    $customer_contract_runcode = explode("-", $CustomerContract->customer_contract_full_code);
                    $CustomerContract->customer_contract_runcode = end($customer_contract_runcode);
                }
                if (!isset($input_all['customer_contract_day_mon'])) {
                    $CustomerContract->customer_contract_day_mon = 0;
                }
                if (!isset($input_all['customer_contract_day_tue'])) {
                    $CustomerContract->customer_contract_day_tue = 0;
                }
                if (!isset($input_all['customer_contract_day_wed'])) {
                    $CustomerContract->customer_contract_day_wed = 0;
                }
                if (!isset($input_all['customer_contract_day_thu'])) {
                    $CustomerContract->customer_contract_day_thu = 0;
                }
                if (!isset($input_all['customer_contract_day_fri'])) {
                    $CustomerContract->customer_contract_day_fri = 0;
                }
                if (!isset($input_all['customer_contract_day_sat'])) {
                    $CustomerContract->customer_contract_day_sat = 0;
                }
                if (!isset($input_all['customer_contract_day_sun'])) {
                    $CustomerContract->customer_contract_day_sun = 0;
                }
                $CustomerContract->customer_contract_status = 1;
                $CustomerContract->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['run_code_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Type is required";
            }
            if (isset($failedRules['head_documents_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณากรอก บริษัทที่รับจ้าง (ผู้รับจ้าง)";
            }
            if (isset($failedRules['customer_contract_date_start']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณากรอก วันที่เริ่มสัญญา";
            }
            if (isset($failedRules['customer_contract_date_end']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณากรอก วันสิ้นสุดสัญญา";
            }
            if (isset($failedRules['customer_contract_month']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณากรอก จำนวนเดือนตามสัญญา";
            }
            if (isset($failedRules['customer_contract_time_start']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณากรอก เวลาเริ่มทำงาน";
            }
            if (isset($failedRules['customer_contract_time_end']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณากรอก เวลาสิ้นสุดทำงาน";
            }
            if (isset($failedRules['customer_contract_price']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณากรอก อัตราค่าบริการ / เดือน";
            }
            if (isset($failedRules['customer_contract_customer_sign']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณากรอก ชื่อผู้ว่าจ้างเซ็นสัญญา";
            }
        }
        $return['title'] = 'Update';
        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lists(Request  $request)
    {
        $result = CustomerContract::select(
            'customer_contract.*',
            'quotation.quotation_full_code',
            'company.company_name_th',
            'customer.customer_name'
        )
            ->leftjoin('quotation', 'quotation.quotation_id', 'customer_contract.quotation_id')
            ->leftjoin('company', 'company.company_id', 'customer_contract.company_id')
            ->leftjoin('customer', 'customer.customer_id', 'quotation.customer_id')
            ->with('Quotation.QuotationPriceListMain', 'Quotation.BackOrderSpec', 'Quotation.BackOrderSpecDriver');
        $customer_contract_status = $request->input('customer_contract_status');
        $company_id = $request->input('company_id');
        $customer_contract_status = $request->input('customer_contract_status');
        $quotation_full_code = $request->input('quotation_full_code');
        $customer_contract_full_code = $request->input('customer_contract_full_code');
        $customer_contract_date_start = $request->input('customer_contract_date_start');
        $customer_contract_date_end = $request->input('customer_contract_date_end');
        if ($customer_contract_status || $customer_contract_status == '0') {
            $result->where('customer_contract.customer_contract_status', $customer_contract_status);
        } else {
            $result->where('customer_contract.customer_contract_status', 1);
        }
        if ($company_id) {
            $result->where('customer_contract.company_id', $company_id);
        }
        if ($quotation_full_code) {
            $result->where('quotation._full_code', 'like', '%' . $quotation_full_code . '%');
        }
        if ($customer_contract_full_code) {
            $result->where('customer_contract.customer_contract_full_code', 'like', '%' . $customer_contract_full_code . '%');
        }
        if ($customer_contract_date_start) {
            $result->whereBetween('customer_contract.customer_contract_date_start', [$customer_contract_date_start . ' 00:00:00', $customer_contract_date_start . ' 23:59:59']);
        }
        if ($customer_contract_date_end) {
            $result->whereBetween('customer_contract.customer_contract_date_end', [$customer_contract_date_end . ' 00:00:00', $customer_contract_date_end . ' 23:59:59']);
        }
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->customer_contract_id . '" data-id="' . $res->customer_contract_id . '">
                          <label class="custom-control-label" for="checkbox-item-' . $res->customer_contract_id . '"></label>
                      </div>';
                return $str;
            })
            ->addColumn('customer_contract_status', function ($res) use ($customer_contract_status) {
                return $res->customer_contract_status || $res->customer_contract_status == '0' ? $res->Status[$res->customer_contract_status] : '';
            })
            ->addColumn('sum_unit', function ($res) {
                return $res->Quotation && $res->Quotation->QuotationPriceListMain ? $res->Quotation->QuotationPriceListMain->sum('quotation_price_list_unit') : 0;
            })
            ->addColumn('total', function ($res) {
                return $res->Quotation ? number_format($res->Quotation->quotation_price, 2) : '0.00';
            })
            ->editColumn('customer_contract_date_start', function ($res) {
                return $res->customer_contract_date_start ? date('d/m/Y', strtotime($res->customer_contract_date_start)) : '';
            })
            ->addColumn('approve', function ($res) {
                $str = '';
                if ($res->customer_contract_make_timesheet_status == 1) {
                    $str = '<button type="button" class="btn btn-circle btn-warning text-white btn-send-approve" data-id="' . $res->customer_contract_id . '">
              <i class="fas fa-paper-plane"></i>
              </button>';
                }
                return $str;
            })
            ->addColumn('action', function ($res) use ($customer_contract_status) {
                $view = Helper::CheckPermissionMenu('CustomerContract', '1');
                $insert = Helper::CheckPermissionMenu('CustomerContract', '2');
                $update = Helper::CheckPermissionMenu('CustomerContract', '3');
                $delete = Helper::CheckPermissionMenu('CustomerContract', '4');
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view-contract" data-id="'.$res->customer_contract_id.'">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->customer_contract_id.'" data-company-id="'.$res->company_id.'">Edit contract</button>';
                // $btnCancel = '<button type="button" class="btn btn-danger btn-md btn-cancel" data-id="'.$res->customer_contract_id.'">Cancel</button>';
                // $btnWriteContract = '<button type="button" class="btn btn-success btn-md btn-edit" data-id="'.$res->customer_contract_id.'" data-company-id="'.$res->company_id.'">Write contract</button>';
                // $btnAttachContract = '<button type="button" class="btn btn-warning btn-md btn-attach-contract" data-id="'.$res->customer_contract_id.'">Attach contract</button>';
                // $btnViewDriver = '<button type="button" class="btn btn-info btn-md btn-view-driver" data-id="'.$res->quotation_id.'">View Driver</button>';
                // $btnPrintTH = '<a href="'.url('admin/CustomerContract/PrintContract/th/'.$res->customer_contract_id).'" target="_blank" class="btn btn-success btn-md" target="_blank">Print TH</a>';
                // $btnPrintTEN = '<a href="'.url('admin/CustomerContract/PrintContract/en/'.$res->customer_contract_id).'" target="_blank" class="btn btn-success btn-md" target="_blank">Print EN</a>';
                // $btnMakeTimesheet = '<button type="button" class="btn btn-primary btn-md btn-make-timesheet" data-id="'.$res->customer_contract_id.'">Make Timesheet</button>';
                // $btnOtSetting = '<a href="'.url('/admin/CustomerContract/OtSetting/'.$res->customer_contract_id).'" class="btn btn-info btn-md">OT Setting</a>';
                // $btnTimesheet = '<button type="button" class="btn btn-warning btn-md btn-timesheet" data-id="'.$res->customer_contract_id.'">Timesheet</button>';
                // $str = '';
                // if($customer_contract_status == '0'){
                //     $str.=' '.$btnWriteContract;
                // }else{
                //     if($view){
                //         $str.=' '.$btnView;
                //     }
                //     if($update){
                //         $str.=' '.$btnEdit;
                //     }
                //     $str.=' '.$btnAttachContract;
                //     $str.=' '.$btnViewDriver;
                //     $str.=' '.$btnPrintTH;
                //     $str.=' '.$btnPrintTEN;
                //     if($res->customer_contract_make_timesheet_status == 1){
                //         $str.=' '.$btnTimesheet;
                //         $str.=' '.$btnOtSetting;
                //     }else{
                //         if($res->Quotation && count($res->Quotation->BackOrderSpec) == count($res->Quotation->BackOrderSpecDriver)){
                //             $str.=' '.$btnMakeTimesheet;
                //         }
                //     }
                // }
                // $str.=' '.$btnCancel;

                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($customer_contract_status == '0') {
                    $str .= ' ' . '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-id="' . $res->customer_contract_id . '" data-company-id="' . $res->company_id . '">Write contract</a>';
                } else {
                    if ($view) {
                        $str .= '<a class="dropdown-item btn-view-contract" href="javascript:void(0)" data-id="' . $res->customer_contract_id . '">View</a>';
                    }
                    if ($update) {
                        $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-id="' . $res->customer_contract_id . '" data-company-id="' . $res->company_id . '">Edit contract</a>';
                    }
                    $str .= '<a class="dropdown-item btn-attach-contract" href="javascript:void(0)" data-id="' . $res->customer_contract_id . '">Attach contract</a>';
                    $str .= '<a class="dropdown-item btn-view-driver" href="javascript:void(0)" data-id="' . $res->quotation_id . '">View Driver</a>';
                    $str .= '<a class="dropdown-item" href="' . url('admin/CustomerContract/PrintContract/th/' . $res->customer_contract_id) . '" target="_blank" class="btn btn-success btn-md" target="_blank">Print TH</a>';
                    $str .= '<a class="dropdown-item" href="' . url('admin/CustomerContract/PrintContract/en/' . $res->customer_contract_id) . '" target="_blank" class="btn btn-success btn-md" target="_blank">Print EN</a>';
                    if ($res->customer_contract_make_timesheet_status == 1) {
                        $str .= ' ' . '<a class="dropdown-item btn-timesheet" href="javascript:void(0)" data-id="'.$res->customer_contract_id.'">Timesheet</a>';
                        $str .= ' ' . '<a class="dropdown-item" href="'.url('/admin/CustomerContract/OtSetting/'.$res->customer_contract_id).'" class="btn btn-info btn-md">OT Setting</a>';
                    } else {
                        if ($res->Quotation && count($res->Quotation->BackOrderSpec) == count($res->Quotation->BackOrderSpecDriver)) {
                            $str .= ' ' . '<a class="dropdown-item btn-make-timesheet" href="javascript:void(0)" data-id="'.$res->customer_contract_id.'">Make Timesheet</a>';
                        }
                    }
                    $str .= '</div>';
                    $str .= '</div>';
                }


                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'approve', 'action'])
            ->make(true);
    }

    public function Cancel(Request $request, $id = null)
    {
        $customer_contract_id = $id ? $id : $request->input('id');
        \DB::beginTransaction();
        try {
            if (is_array($customer_contract_id)) {
                CustomerContract::whereIn('customer_contract_id', $customer_contract_id)->update(['customer_contract_status' => 9, 'updated_at' => date('Y-m-d H:i:s')]); //ยกเลิกแบบกด check all
            } else {
                $CustomerContract = CustomerContract::find($id);
                $CustomerContract->customer_contract_comment_cancel = $request->input('customer_contract_comment_cancel');
                $CustomerContract->customer_contract_status = 9; //ยกเลิกแบบกดปุ่มยกเลิก
                $CustomerContract->save();
            }
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update Status';
        return $return;
    }

    public function SendApprove(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $CustomerContract = CustomerContract::find($id);
            $CustomerContract->customer_contract_status = 2;
            $CustomerContract->save();
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Approve';
        return $return;
    }

    public function MakeTimesheet(Request $request, $id)
    {
        $CustomerContract = CustomerContract::find($id);
        $admin = Auth::guard('admin')->user();
        $sum_quotation_price_list_unit = QuotationPriceList::where('quotation_id', $CustomerContract->quotation_id)->whereNull('main_quotation_price_list_id')->sum('quotation_price_list_unit'); //จำนวนคนในตำแหน่งงานที่ต้องการทั้งหมด
        $BackOrderSpecs = BackOrderSpec::where('quotation_id', $CustomerContract->quotation_id)->where('back_order_spec_status', 2)->with('BackOrderInterviewPass', 'QuotationPriceList.QuotationPriceListOt')->get(); //จำนวนคนที่ได้ในตำแหน่งงานทั้งหมด
        if (count($BackOrderSpecs) > 0 && count($BackOrderSpecs) == $sum_quotation_price_list_unit) {
            \DB::beginTransaction();
            try {
                // Holiday
                $HolidayCalendars = HolidayCalendar::whereBetween('holiday_calendar_date', [$CustomerContract->customer_contract_date_start, $CustomerContract->customer_contract_date_end])->get();
                foreach ($HolidayCalendars as $val) {
                    $TimesheetHolidayCalendar = new TimesheetHolidayCalendar;
                    $TimesheetHolidayCalendar->customer_contract_id = $id;
                    $TimesheetHolidayCalendar->holiday_type_id = $val->holiday_type_id;
                    $TimesheetHolidayCalendar->timesheet_holiday_calendar_year = $val->holiday_calendar_year;
                    $TimesheetHolidayCalendar->timesheet_holiday_calendar_date = $val->holiday_calendar_date;
                    $TimesheetHolidayCalendar->timesheet_holiday_calendar_name = $val->holiday_calendar_name;
                    $TimesheetHolidayCalendar->timesheet_holiday_calendar_details = $val->holiday_calendar_details;
                    $TimesheetHolidayCalendar->timesheet_holiday_calendar_status = $val->holiday_calendar_status;
                    $TimesheetHolidayCalendar->save();
                }

                // Timesheet
                $working_days = [];
                if ($CustomerContract->customer_contract_day_mon == 1) {
                    $working_days[] = 'Mon';
                }
                if ($CustomerContract->customer_contract_day_tue == 1) {
                    $working_days[] = 'Tue';
                }
                if ($CustomerContract->customer_contract_day_wed == 1) {
                    $working_days[] = 'Wed';
                }
                if ($CustomerContract->customer_contract_day_thu == 1) {
                    $working_days[] = 'Thu';
                }
                if ($CustomerContract->customer_contract_day_fri == 1) {
                    $working_days[] = 'Fri';
                }
                if ($CustomerContract->customer_contract_day_sat == 1) {
                    $working_days[] = 'Sat';
                }
                if ($CustomerContract->customer_contract_day_sun == 1) {
                    $working_days[] = 'San';
                }
                $customer_contract_date_start = $CustomerContract->customer_contract_date_start ? date('Y-m-d', strtotime($CustomerContract->customer_contract_date_start)) : '';
                $customer_contract_date_end = $CustomerContract->customer_contract_date_end ? date('Y-m-d', strtotime($CustomerContract->customer_contract_date_end)) : '';
                if ($customer_contract_date_end && $customer_contract_date_start) {
                    $date_start = new DateTime($customer_contract_date_start);
                    $date_end = new DateTime($customer_contract_date_end);
                    for ($date = $date_start; $date <= $date_end; $date->modify('+1 day')) {
                        $TimesheetContract = new TimesheetContract;
                        $TimesheetContract->customer_contract_id = $id;
                        $TimesheetContract->timesheet_contract_date = $date->format("Y-m-d");
                        $TimesheetContract->timesheet_contract_date_text = $date->format("D");
                        $TimesheetContract->timesheet_contract_def_time_start = $date->format("Y-m-d") . ' ' . date('H:i:s', strtotime($CustomerContract->customer_contract_time_start));
                        $TimesheetContract->timesheet_contract_def_time_end = $date->format("Y-m-d") . ' ' . date('H:i:s', strtotime($CustomerContract->customer_contract_time_end));
                        $TimesheetContract->timesheet_contract_status = in_array($date->format("D"), $working_days) ? 1 : 0;
                        $TimesheetContract->save();
                    }
                }

                // OT Structure
                $TimesheetContractOtTemps = TimesheetContractOtTemp::where('timesheet_contract_ot_temp_status', 1)->with('PriceStructureOT')->get();
                foreach ($TimesheetContractOtTemps as $val) {
                    $TimesheetContractOt = new TimesheetContractOt;
                    $TimesheetContractOt->customer_contract_id = $id;
                    $TimesheetContractOt->price_structure_ot_id = $val->price_structure_ot_id;
                    $TimesheetContractOt->timesheet_contract_ot_lv = $val->timesheet_contract_ot_temp_lv;
                    $TimesheetContractOt->timesheet_contract_ot_name = $val->timesheet_contract_ot_temp_name;
                    $TimesheetContractOt->timesheet_contract_ot_details = $val->timesheet_contract_ot_temp_details;
                    $TimesheetContractOt->timesheet_contract_ot_date_start = date('Y-m-d') . ' ' . date('H:i:s', strtotime($val->timesheet_contract_ot_temp_date_start));
                    $TimesheetContractOt->timesheet_contract_ot_date_end = date('Y-m-d') . ' ' . date('H:i:s', strtotime($val->timesheet_contract_ot_temp_date_end));
                    $TimesheetContractOt->timesheet_contract_ot_day_mon = $val->timesheet_contract_ot_temp_day_mon;
                    $TimesheetContractOt->timesheet_contract_ot_day_thu = $val->timesheet_contract_ot_temp_day_thu;
                    $TimesheetContractOt->timesheet_contract_ot_day_wed = $val->timesheet_contract_ot_temp_day_wed;
                    $TimesheetContractOt->timesheet_contract_ot_date_thu = $val->timesheet_contract_ot_temp_date_thu;
                    $TimesheetContractOt->timesheet_contract_ot_day_fri = $val->timesheet_contract_ot_temp_day_fri;
                    $TimesheetContractOt->timesheet_contract_ot_day_sat = $val->timesheet_contract_ot_temp_day_sat;
                    $TimesheetContractOt->timesheet_contract_ot_day_sun = $val->timesheet_contract_ot_temp_day_sun;
                    $TimesheetContractOt->timesheet_contract_ot_time_work = $val->timesheet_contract_ot_temp_time_work;
                    $TimesheetContractOt->timesheet_contract_ot_day_work = $val->timesheet_contract_ot_temp_day_work;
                    $TimesheetContractOt->timesheet_contract_ot_holiday_status = $val->timesheet_contract_ot_temp_holiday_status;
                    $TimesheetContractOt->timesheet_contract_ot_week_end = $val->timesheet_contract_ot_temp_week_end;
                    $TimesheetContractOt->timesheet_contract_ot_status = $val->timesheet_contract_ot_temp_status;
                    $TimesheetContractOt->save();
                }

                foreach ($BackOrderSpecs as $BackOrderSpec) {
                    $driver_id = $BackOrderSpec->BackOrderInterviewPass ? $BackOrderSpec->BackOrderInterviewPass->driver_id : '';
                    $back_order_interviwe_id = $BackOrderSpec->BackOrderInterviewPass ? $BackOrderSpec->BackOrderInterviewPass->back_order_interviwe_id : '';
                    if ($driver_id && $back_order_interviwe_id) {
                        $DriverWorking = DriverWorking::where('driver_id', $driver_id)->orderBy('driver_working_id', 'desc')->first();
                        $DriverWorkingNew = new DriverWorking;
                        $DriverWorkingNew->driver_id = $driver_id;
                        $DriverWorkingNew->customer_contract_id = $id;
                        $DriverWorkingNew->quotation_id = $BackOrderSpec->quotation_id;
                        $DriverWorkingNew->quotation_price_list_id = $BackOrderSpec->quotation_price_list_id;
                        $DriverWorkingNew->back_order_id = $BackOrderSpec->back_order_id;
                        $DriverWorkingNew->back_order_spec_id = $BackOrderSpec->back_order_spec_id;
                        $DriverWorkingNew->back_order_interviwe_id = $back_order_interviwe_id;
                        $DriverWorkingNew->admin_id = $admin->admin_id;
                        $DriverWorkingNew->driver_working_date_start = $CustomerContract->customer_contract_date_start;
                        $DriverWorkingNew->driver_working_date_end = $CustomerContract->customer_contract_date_end;
                        $DriverWorkingNew->new_company_id = $CustomerContract->company_id;
                        $DriverWorkingNew->driver_working_salary = $BackOrderSpec->QuotationPriceList ? $BackOrderSpec->QuotationPriceList->quotation_price_list_salary : '';
                        $DriverWorkingNew->driver_working_driver_status = 1; //พนักงานประจำ
                        $DriverWorkingNew->driver_working_status = 0; //ยังไม่เริ่มงาน
                        $DriverWorkingNew->driver_working_change_status = 3; // 3=In Contract
                        if ($DriverWorking) {
                            $DriverWorkingNew->ole_company_id = $DriverWorking->new_company_id;
                            $DriverWorkingNew->driver_working_ole_salary = $DriverWorking->driver_working_salary;
                        }
                        $DriverWorkingNew->save();
                        $Driver = Driver::find($driver_id);
                        $Driver->driver_status = 3; //พนักงานสัญญาจ้าง
                        $Driver->save();

                        foreach ($HolidayCalendars as $val) {
                            $TimesheetHolidayCalendarDriver = new TimesheetHolidayCalendarDriver;
                            $TimesheetHolidayCalendarDriver->customer_contract_id = $id;
                            $TimesheetHolidayCalendarDriver->driver_working_id = $DriverWorkingNew->driver_working_id;
                            $TimesheetHolidayCalendarDriver->holiday_type_id = $val->holiday_type_id;
                            $TimesheetHolidayCalendarDriver->timesheet_holiday_calendar_driver_year = $val->holiday_calendar_year;
                            $TimesheetHolidayCalendarDriver->timesheet_holiday_calendar_driver_date = $val->holiday_calendar_date;
                            $TimesheetHolidayCalendarDriver->timesheet_holiday_calendar_driver_name = $val->holiday_calendar_name;
                            $TimesheetHolidayCalendarDriver->timesheet_holiday_calendar_driver_details = $val->holiday_calendar_details;
                            $TimesheetHolidayCalendarDriver->timesheet_holiday_calendar_driver_status = $val->holiday_calendar_status;
                            $TimesheetHolidayCalendarDriver->save();
                        }

                        $TimesheetContracts = TimesheetContract::where('customer_contract_id', $id)->get();
                        foreach ($TimesheetContracts as $val) {
                            $TimesheetContractDriver = new TimesheetContractDriver;
                            $TimesheetContractDriver->customer_contract_id = $id;
                            $TimesheetContractDriver->timesheet_contract_id = $val->timesheet_contract_id;
                            $TimesheetContractDriver->driver_working_id = $DriverWorkingNew->driver_working_id;
                            $TimesheetContractDriver->driver_id = $driver_id;
                            $TimesheetContractDriver->quotation_price_list_id = $BackOrderSpec->quotation_price_list_id;
                            $TimesheetContractDriver->back_order_id = $BackOrderSpec->back_order_id;
                            $TimesheetContractDriver->back_order_spec_id = $BackOrderSpec->back_order_spec_id;
                            $TimesheetContractDriver->timesheet_contract_driver_date = $val->timesheet_contract_date;
                            $TimesheetContractDriver->timesheet_contract_driver_date_text = $val->timesheet_contract_date_text;
                            $TimesheetContractDriver->timesheet_contract_driver_def_time_start = $val->timesheet_contract_def_time_start;
                            $TimesheetContractDriver->timesheet_contract_driver_def_time_end = $val->timesheet_contract_def_time_end;
                            $TimesheetContractDriver->timesheet_contract_driver_taxi = $BackOrderSpec->QuotationPriceList ? $BackOrderSpec->QuotationPriceList->quotation_price_list_taxi_price_sale : '';
                            $TimesheetContractDriver->timesheet_contract_driver_overnight = $BackOrderSpec->QuotationPriceList ? $BackOrderSpec->QuotationPriceList->quotation_price_list_travel_sale : '';
                            $TimesheetContractDriver->timesheet_contract_driver_out_of_town = $BackOrderSpec->QuotationPriceList ? $BackOrderSpec->QuotationPriceList->quotation_price_list_accomadation_sale : '';
                            $TimesheetContractDriver->timesheet_contract_driver_status = $val->timesheet_contract_status;
                            $TimesheetContractDriver->save();
                        }

                        foreach ($TimesheetContractOtTemps as $val) {
                            $QuotationPriceListOt = QuotationPriceListOt::where('quotation_id', $CustomerContract->quotation_id)
                                ->where('price_structure_ot_id', $val->price_structure_ot_id)
                                ->where('quotation_price_list_id', $BackOrderSpec->quotation_price_list_id)
                                ->first();
                            $TimesheetContractDriverOt = new TimesheetContractDriverOt;
                            $TimesheetContractDriverOt->customer_contract_id = $id;
                            $TimesheetContractDriverOt->price_structure_ot_id = $val->price_structure_ot_id;
                            $TimesheetContractDriverOt->driver_working_id = $DriverWorkingNew->driver_working_id;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_lv = $val->timesheet_contract_ot_temp_lv;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_price = $QuotationPriceListOt ? $QuotationPriceListOt->quotation_price_list_ot_price : null;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_name = $val->timesheet_contract_ot_temp_name;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_details = $val->timesheet_contract_ot_temp_details;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_date_start = date('Y-m-d') . ' ' . date('H:i:s', strtotime($val->timesheet_contract_ot_temp_date_start));
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_date_end = date('Y-m-d') . ' ' . date('H:i:s', strtotime($val->timesheet_contract_ot_temp_date_end));
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_mon = $val->timesheet_contract_ot_temp_day_mon;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_thu = $val->timesheet_contract_ot_temp_day_thu;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_wed = $val->timesheet_contract_ot_temp_day_wed;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_date_thu = $val->timesheet_contract_ot_temp_date_thu;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_fri = $val->timesheet_contract_ot_temp_day_fri;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_sat = $val->timesheet_contract_ot_temp_day_sat;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_sun = $val->timesheet_contract_ot_temp_day_sun;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_time_work = $val->timesheet_contract_ot_temp_time_work;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_work = $val->timesheet_contract_ot_temp_day_work;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_holiday_status = $val->timesheet_contract_ot_temp_holiday_status;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_week_end = $val->timesheet_contract_ot_temp_week_end;
                            $TimesheetContractDriverOt->timesheet_contract_driver_ot_status = $val->timesheet_contract_ot_temp_status;
                            $TimesheetContractDriverOt->save();
                        }
                    }
                }
                CustomerContract::where('customer_contract_id', $id)->update(['customer_contract_make_timesheet_status' => 1, 'updated_at' => date('Y-m-d H:i:s')]);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Make Timesheet';
        return $return;
    }

    public function OtSetting($id)
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'CustomerContract')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Companies'] = Company::where('company_status', 1)->get();
        $data['HeadDocuments'] = HeadDocuments::where('head_documents_status', 1)->get();
        $data['RunCodes'] = RunCode::where('run_code_status', 1)->where('run_code_type', 6)->get(); //(6) สัญญาจ้างบริการพนักงานขับรถยนต์ (ไทย - อังกฤษ) F#1
        $data['CustomerContract'] = CustomerContract::find($id);
        $data['PriceStructureOT'] = PriceStructureOT::where('price_structure_ot_status', 1)->get();
        $TimesheetHolidayCalendars = TimesheetHolidayCalendar::whereNotNull('timesheet_holiday_calendar_date')->get();
        $holiday = [];
        foreach ($TimesheetHolidayCalendars as $key => $val) {
            $holiday[$key]['id'] = $val->timesheet_holiday_calendar_id;
            $holiday[$key]['title'] = $val->timesheet_holiday_calendar_name;
            $holiday[$key]['start'] = date("Y-m-d", strtotime($val->timesheet_holiday_calendar_date));
            $holiday[$key]['status'] = $val->timesheet_holiday_calendar_status;
        }
        $data['holiday_calendars'] = $holiday;
        $data['holiday_year'] = date('Y');
        $data['holiday_date'] = date('Y-m-d');
        $data['count_working'] = TimesheetContract::where('customer_contract_id', $id)->where('timesheet_contract_status', 1)->count();
        $data['count_workend'] = TimesheetContract::where('customer_contract_id', $id)->where('timesheet_contract_status', 0)->count();
        $data['count_annual_holiday'] = TimesheetHolidayCalendar::where('customer_contract_id', $id)->where('timesheet_holiday_calendar_status', 1)->count();
        if (Helper::CheckPermissionMenu('CustomerContract', '1')) {
            return view('admin.CustomerContract.ot_setting', $data);
        } else {
            return redirect('admin/');
        }
    }

    public function OtSettingDriver($id)
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'CustomerContract')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Companies'] = Company::where('company_status', 1)->get();
        $data['HeadDocuments'] = HeadDocuments::where('head_documents_status', 1)->get();
        $data['RunCodes'] = RunCode::where('run_code_status', 1)->where('run_code_type', 6)->get(); //(6) สัญญาจ้างบริการพนักงานขับรถยนต์ (ไทย - อังกฤษ) F#1
        $data['DriverWorking'] = DriverWorking::find($id);;
        $data['PriceStructureOT'] = PriceStructureOT::where('price_structure_ot_status', 1)->get();
        $TimesheetHolidayCalendarDrivers = TimesheetHolidayCalendarDriver::whereNotNull('timesheet_holiday_calendar_driver_date')->where('driver_working_id', $id)->get();
        $holiday = [];
        foreach ($TimesheetHolidayCalendarDrivers as $key => $val) {
            $holiday[$key]['id'] = $val->timesheet_holiday_calendar_driver_id;
            $holiday[$key]['title'] = $val->timesheet_holiday_calendar_driver_name;
            $holiday[$key]['start'] = date("Y-m-d", strtotime($val->timesheet_holiday_calendar_driver_date));
            $holiday[$key]['status'] = $val->timesheet_holiday_calendar_driver_status;
        }
        $data['holiday_calendars'] = $holiday;
        $data['holiday_year'] = date('Y');
        $data['holiday_date'] = date('Y-m-d');
        $data['count_working'] = TimesheetContractDriver::where('driver_working_id', $id)->where('timesheet_contract_driver_status', 1)->count();
        $data['count_workend'] = TimesheetContractDriver::where('driver_working_id', $id)->where('timesheet_contract_driver_status', 0)->count();
        $data['count_annual_holiday'] = TimesheetHolidayCalendarDriver::where('driver_working_id', $id)->where('timesheet_holiday_calendar_driver_status', 1)->count();
        if (Helper::CheckPermissionMenu('CustomerContract', '1')) {
            return view('admin.CustomerContract.ot_setting_driver', $data);
        } else {
            return redirect('admin/');
        }
    }

    public function PrintContract($type, $id)
    {
        $data['Driver'] = Driver::with([
            'Districts.Geography', 'Districts.Provinces', 'Districts.Amphures', 'Districts.Zipcode', 'NamePrefix', 'EducationDriver', 'EducationDriverLast', 'WorkHistory', 'TrainingRecord', 'JobAnswer.JobQuestion', 'RecruitmentPosition', 'DriverReference', 'DriverEmergencyContact', 'DriverLanguage.LanguageType'
        ])->find($id);

        if ($type == 'en') {
            $pdf = PDF::loadView('admin.CustomerContract.print_contract_en', $data);
            return $pdf->stream('print_contract_en.pdf');
        } else {
            $pdf = PDF::loadView('admin.CustomerContract.print_contract_th', $data);
            return $pdf->stream('print_contract_th.pdf');
        }
    }
}
