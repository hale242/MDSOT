<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\CustomerContract;
use App\Driver;
use App\Company;
use App\BackOrderSpec;
use App\SaleOrder;
use App\SaleOrderList;
use App\DriverWorking;
use App\TimesheetContractDriver;
use App\QuotationPriceList;
use App\TimesheetContractDriverAddOn;
use App\TimesheetContractDriverOt;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Timesheet')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Drivers'] = Driver::get();
        $data['Companies'] = Company::where('company_status', 1)->get();
        if(Helper::CheckPermissionMenu('Timesheet' , '1')){
            return view('admin.Timesheet.timesheet', $data);
        }else{
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
        //
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
        //
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
            'customer_contract.*'
            ,'quotation.quotation_full_code'
            ,'company.company_name_th'
      )
      ->leftjoin('quotation', 'quotation.quotation_id', 'customer_contract.quotation_id')
      ->leftjoin('company', 'company.company_id', 'customer_contract.company_id')
      ->where('customer_contract.customer_contract_status', 4)
      ->with('Quotation.QuotationPriceListMain', 'SaleOrder.SaleOrderListFirst');
      $company_id = $request->input('company_id');
      $customer_contract_full_code = $request->input('customer_contract_full_code');
      $quotation_full_code = $request->input('quotation_full_code');
      if($company_id){
          $result->where('customer_contract.company_id', $company_id);
      }
      if($customer_contract_full_code){
          $result->where('customer_contract.customer_contract_full_code', 'like', '%'.$customer_contract_full_code.'%');
      }
      if($quotation_full_code){
          $result->where('quotation.quotation_full_code', 'like', '%'.$quotation_full_code.'%');
      }
      return Datatables::of($result)
        ->addColumn('sale_order_number' , function($res){
            $num = $res->SaleOrder ? $res->SaleOrder->sale_order_number : '';
            $date = $res->SaleOrder && $res->SaleOrder->sale_order_month ? date('m-Y', strtotime($res->SaleOrder->sale_order_month)) : '';
            return $num.' / '.$date;
        })
        ->addColumn('sale_order_list_date_start' , function($res){
            return $res->SaleOrder && $res->SaleOrder->SaleOrderListFirst && $res->SaleOrder->SaleOrderListFirst->sale_order_list_date_start ? date('d/m/Y', strtotime($res->SaleOrder->SaleOrderListFirst->sale_order_list_date_start)) : '';
        })
        ->addColumn('sale_order_list_date_end' , function($res){
            return $res->SaleOrder && $res->SaleOrder->SaleOrderListFirst && $res->SaleOrder->SaleOrderListFirst->sale_order_list_date_end ? date('d/m/Y', strtotime($res->SaleOrder->SaleOrderListFirst->sale_order_list_date_end)) : '';
        })
        ->addColumn('sale_order_sale_order_code' , function($res){
            return $res->SaleOrder ? $res->SaleOrder->sale_order_sale_order_code : '';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('CustomerContract' , '1');
            $insert = Helper::CheckPermissionMenu('CustomerContract' , '2');
            $update = Helper::CheckPermissionMenu('CustomerContract' , '3');
            $delete = Helper::CheckPermissionMenu('CustomerContract' , '4');
            $sale_order_id = '';
            $sale_order_list_id = '';
            $sale_order_id = $res->SaleOrder ? $res->SaleOrder->sale_order_id : '';
            $sale_order_list_id = $res->SaleOrder && $res->SaleOrder->SaleOrderListFirst ? $res->SaleOrder->SaleOrderListFirst->sale_order_list_id : '';
            $btnClockInClockOut = '<button type="button" class="btn btn-info btn-md btn-cloc-kin-clock-out" data-id="'.$res->customer_contract_id.'" data-quotation-id="'.$res->quotation_id.'" data-sale-order-id="'.$sale_order_id.'" data-sale-order-list-id="'.$sale_order_list_id.'"> Clock in / Clock out </button>';
            $str = '';
            if($sale_order_id && $sale_order_list_id){
                $str.=' '.$btnClockInClockOut;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }

    public function TimeToWork(Request $request)
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Timesheet')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $sale_order_id = $request->input('sale_order_id');
        $sale_order_list_id = $request->input('sale_order_list_id');
        $back_order_spec_id = $request->input('back_order_spec_id');
        $SaleOrderList = SaleOrderList::find($sale_order_list_id);
        $SaleOrder = SaleOrder::with('CustomerContract', 'Company', 'Quotation')->find($sale_order_id);

        $driver_working = [];
        $BackOrderSpec = BackOrderSpec::with('DriverWorkingAll.QuotationPriceList.PriceStructure', 'DriverWorkingAll.QuotationPriceList.QuotationPriceListOt.PriceStructureOT', 'DriverWorkingAll.Driver', 'DriverWorkingAll.QuotationPriceList.QuotationPriceListStaffExpense.StaffCost', 'DriverWorking.DriverOle')->find($back_order_spec_id);
        foreach($BackOrderSpec->DriverWorkingAll as $key_main=>$val){
            if(count($val->TimesheetContractDriver) > 0){
                $data['QuotationPriceListOt'] = $val->QuotationPriceList && $val->QuotationPriceList->QuotationPriceListOt ? $val->QuotationPriceList->QuotationPriceListOt : '';
                $data['QuotationPriceListStaffExpense'] = $val->QuotationPriceList && $val->QuotationPriceList->QuotationPriceListStaffExpense ? $val->QuotationPriceList->QuotationPriceListStaffExpense : '';
                $date_start = $SaleOrderList->sale_order_list_date_start ? date('Y-m-d', strtotime($SaleOrderList->sale_order_list_date_start)) : '';
                $date_end = $SaleOrderList->sale_order_list_date_end ? date('Y-m-d', strtotime($SaleOrderList->sale_order_list_date_end)) : '';
                $driver_working[$key_main]['quotation_price_list_id'] = $val->quotation_price_list_id;
                $driver_working[$key_main]['quotation_price_list_taxi_price_sale'] = $val->QuotationPriceList ? $val->QuotationPriceList->quotation_price_list_taxi_price_sale : 0;
                $driver_working[$key_main]['quotation_price_list_travel_sale'] = $val->QuotationPriceList ? $val->QuotationPriceList->quotation_price_list_travel_sale : 0;
                $driver_working[$key_main]['quotation_price_list_accomadation_sale'] = $val->QuotationPriceList ? $val->QuotationPriceList->quotation_price_list_accomadation_sale : 0;
                $driver_working[$key_main]['quotation_price_list_guarantee_ot_price'] = $val->QuotationPriceList ? $val->QuotationPriceList->quotation_price_list_guarantee_ot_price : 0;
                $driver_working[$key_main]['quotation_price_list_salary'] = $val->QuotationPriceList ? $val->QuotationPriceList->quotation_price_list_salary : 0;
                $driver_working[$key_main]['customer_contract_id'] = $val->customer_contract_id;
                $driver_working[$key_main]['driver_working_id'] = $val->driver_working_id;
                $driver_working[$key_main]['price_structure_name'] = $val->QuotationPriceList && $val->QuotationPriceList->PriceStructure ? $val->QuotationPriceList->PriceStructure->price_structure_name : '';
                $driver_working[$key_main]['driver_name'] = $val->Driver ? $val->Driver->driver_name_th.' '.$val->Driver->driver_lastname_th : '';
                $driver_working[$key_main]['driver_code'] = $val->Driver ? $val->Driver->driver_code : '';

                $TimesheetContractDriver = TimesheetContractDriver::where('driver_working_id', $val->driver_working_id)->where('customer_contract_id', $val->customer_contract_id)->whereBetween('timesheet_contract_driver_date', [$date_start.' 00:00:00', $date_end.' 23:59:59'])->get();
                foreach($TimesheetContractDriver as $key=>$timesheet){
                    $time_start = $timesheet->timesheet_contract_driver_def_time_start ? date('H:i:s', strtotime($timesheet->timesheet_contract_driver_def_time_start)) : '';
                    $time_end = $timesheet->timesheet_contract_driver_def_time_end ? date('H:i:s', strtotime($timesheet->timesheet_contract_driver_def_time_end)) : '';
                    $date_text = $timesheet->timesheet_contract_driver_date_text;
                    $driver_working[$key_main]['timesheet'][$key]['timesheet_contract_driver_id'] = $timesheet->timesheet_contract_driver_id;
                    $driver_working[$key_main]['timesheet'][$key]['timesheet_contract_driver_date'] = $timesheet->timesheet_contract_driver_date ? date('d/m/Y', strtotime($timesheet->timesheet_contract_driver_date)) : '';
                    $driver_working[$key_main]['timesheet'][$key]['timesheet_contract_driver_def_date_start'] = $timesheet->timesheet_contract_driver_def_time_start ? date('Y-m-d', strtotime($timesheet->timesheet_contract_driver_def_time_start)) : '';
                    $driver_working[$key_main]['timesheet'][$key]['timesheet_contract_driver_def_date_end'] = $timesheet->timesheet_contract_driver_def_time_end ? date('Y-m-d', strtotime($timesheet->timesheet_contract_driver_def_time_end)) : '';
                    $driver_working[$key_main]['timesheet'][$key]['timesheet_contract_driver_def_time_start'] = $time_start;
                    $driver_working[$key_main]['timesheet'][$key]['timesheet_contract_driver_def_time_end'] = $time_end;
                    $driver_working[$key_main]['timesheet'][$key]['timesheet_contract_driver_date_text'] = $date_text;
                    $driver_working[$key_main]['timesheet'][$key]['timesheet_contract_driver_status'] = $timesheet->timesheet_contract_driver_status;
                    foreach($data['QuotationPriceListOt'] as $ot){
                        if($time_start && $time_end && $date_text){
                            $driver_working[$key_main]['timesheet'][$key]['ot'][$ot->price_structure_ot_id]['price_structure_ot_id'] = $ot->price_structure_ot_id;
                            $driver_working[$key_main]['timesheet'][$key]['ot'][$ot->price_structure_ot_id]['price_structure_ot_name'] = $ot->PriceStructureOT ? $ot->PriceStructureOT->price_structure_ot_name : '';
                            $driver_working[$key_main]['timesheet'][$key]['ot'][$ot->price_structure_ot_id]['hour'] = $this->CalculateOTHour($val->customer_contract_id, $val->driver_working_id, $timesheet->timesheet_contract_driver_id, $time_start, $time_end, $date_text);
                        }
                    }
                    $date_working = $timesheet->timesheet_contract_driver_date ? date('Y-m-d', strtotime($timesheet->timesheet_contract_driver_date)) : '';
                    $Substitute = DriverWorking::where('back_order_spec_id', $back_order_spec_id)
                      ->where('driver_working_change_status', 2)
                      ->orderBy('driver_working_id', 'desc')
                      ->with('Driver')
                      ->where('driver_working_date_start', '<=', $date_working)
                      ->where('driver_working_date_end', '>=', $date_working)
                      ->first();
                    if($Substitute){
                        $driver_working[$key_main]['timesheet'][$key]['substitute'] = $Substitute->Driver ? $Substitute->Driver->driver_name_th.' '.$Substitute->Driver->driver_lastname_th : '';
                    }
                }
            }
        }
        $data['SaleOrderList'] = $SaleOrderList;
        $data['SaleOrder'] = $SaleOrder;
        $data['DriverWorkings'] = $driver_working;
        if(Helper::CheckPermissionMenu('Timesheet' , '1')){
            return view('admin.Timesheet.timesheet_time_to_work', $data);
        }else{
            return redirect('admin/');
        }
    }

    public function GetStaffExpenseByQuotationPriceList(Request $request, $quotation_price_list_id)
    {
        $timesheet_contract_driver_id = $request->input('timesheet_contract_driver_id');
        $TimesheetContractDriverAddOn = TimesheetContractDriverAddOn::with('StaffCost')->where('timesheet_contract_driver_id', $timesheet_contract_driver_id)->get();
        if(count($TimesheetContractDriverAddOn) > 0){
            foreach($TimesheetContractDriverAddOn as $key=>$val){
                $data[$key]['type'] = 'update';
                $data[$key]['staff_expenses_id'] = $val->staff_expenses_id;
                $data[$key]['price_structure_has_staff_expenses_id'] = $val->price_structure_has_staff_expenses_id;
                $data[$key]['staff_expenses_name'] = $val->StaffCost ? $val->StaffCost->staff_expenses_name : '';
                $data[$key]['timesheet_contract_driver_add_on_unit'] = $val->timesheet_contract_driver_add_on_unit;
                $data[$key]['timesheet_contract_driver_add_on_price'] = $val->timesheet_contract_driver_add_on_price;
            }
        }else{
            $QuotationPriceLists = QuotationPriceList::with('StaffCost')->where('main_quotation_price_list_id', $quotation_price_list_id)->whereNotNull('price_structure_has_staff_expenses_id')->get();
            foreach($QuotationPriceLists as $key=>$val){
                $data[$key]['type'] = 'insert';
                $data[$key]['staff_expenses_id'] = $val->staff_expenses_id;
                $data[$key]['price_structure_has_staff_expenses_id'] = $val->price_structure_has_staff_expenses_id;
                $data[$key]['staff_expenses_name'] = $val->StaffCost ? $val->StaffCost->staff_expenses_name : '';
                $data[$key]['timesheet_contract_driver_add_on_unit'] = 0;
                $data[$key]['timesheet_contract_driver_add_on_price'] = $val->quotation_price_list_price;
            }
        }
        return $data;
    }

    public function InsertTimesheetContractDriverAddOn(Request $request)
    {
        $input_all = $request->all();
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if(isset($input_all['expenses'])){
                    foreach($input_all['expenses'] as $expense){
                        $TimesheetContractDriverAddOn = TimesheetContractDriverAddOn::where('timesheet_contract_driver_id', $input_all['timesheet_contract_driver_id'])->where('staff_expenses_id', $expense['staff_expenses_id'])->first();
                        if(!$TimesheetContractDriverAddOn){
                            $TimesheetContractDriverAddOn = new TimesheetContractDriverAddOn;
                        }
                        $TimesheetContractDriverAddOn->timesheet_contract_driver_id = $input_all['timesheet_contract_driver_id'];
                        $TimesheetContractDriverAddOn->staff_expenses_id = $expense['staff_expenses_id'];
                        $TimesheetContractDriverAddOn->price_structure_has_staff_expenses_id = $expense['price_structure_has_staff_expenses_id'];
                        $TimesheetContractDriverAddOn->timesheet_contract_driver_add_on_price = str_replace(',', '', $expense['timesheet_contract_driver_add_on_price']);
                        $TimesheetContractDriverAddOn->timesheet_contract_driver_add_on_price_pay = str_replace(',', '', $expense['timesheet_contract_driver_add_on_price']);
                        $TimesheetContractDriverAddOn->timesheet_contract_driver_add_on_unit = $expense['timesheet_contract_driver_add_on_unit'];
                        $TimesheetContractDriverAddOn->timesheet_contract_driver_add_on_status = isset($input_all['timesheet_contract_driver_add_on_status']) ? 1 : 0;
                        $TimesheetContractDriverAddOn->save();
                    }
                }
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Insert';
        return $return;
    }

    public function GetTimesheetContractDriverOt(Request $request, $customer_contract_id)
    {
        $driver_working_id = $request->input('driver_working_id');
        $timesheet_contract_driver_id = $request->input('timesheet_contract_driver_id');
        $time_start = $request->input('time_start') ? date('H:i', strtotime($request->input('time_start'))) : '';
        $time_end = $request->input('time_end') ? date('H:i', strtotime($request->input('time_end'))) : '';
        $date_text = $request->input('date_text');
        if($time_start && $time_end && $date_text){
            return $this->CalculateOTHour($customer_contract_id, $driver_working_id, $timesheet_contract_driver_id, $time_start, $time_end, $date_text);
        }
        return false;
    }

    function CalculateOTHour($customer_contract_id, $driver_working_id, $timesheet_contract_driver_id, $time_start, $time_end, $date_text)
    {
        $CustomerContract = CustomerContract::find($customer_contract_id);
        $data = [];
        $no = 0;
        for($i=0; $i<1; $i){
            $no++;
            $result = TimesheetContractDriverOt::where('customer_contract_id', $customer_contract_id)
            ->where('driver_working_id', $driver_working_id);
            if($date_text == 'Mon'){
                $result->where('timesheet_contract_driver_ot_day_mon', 1);
            }elseif($date_text == 'Tue'){
                $result->where('timesheet_contract_driver_ot_day_thu', 1);
            }elseif($date_text == 'Wed'){
                $result->where('timesheet_contract_driver_ot_day_wed', 1);
            }elseif($date_text == 'Thu'){
                $result->where('timesheet_contract_driver_ot_date_thu', 1);
            }elseif($date_text == 'Fri'){
                $result->where('timesheet_contract_driver_ot_day_fri', 1);
            }elseif($date_text == 'Sat'){
                $result->where('timesheet_contract_driver_ot_day_sat', 1);
            }elseif($date_text == 'Sun'){
                $result->where('timesheet_contract_driver_ot_day_sun', 1);
            }
            if($no > 1){
                $result->whereTime('timesheet_contract_driver_ot_date_start', '=', $time_start.':00');
            }else{
                $result->whereTime('timesheet_contract_driver_ot_date_start', '<=', $time_start.':00');
            }
            $ot = $result->orderBy('timesheet_contract_driver_ot_date_start', 'desc')->first();
            if($time_end > $time_start){
                if($ot){
                    $ot_time_start = $ot->timesheet_contract_driver_ot_date_start ? date('H:i', strtotime($ot->timesheet_contract_driver_ot_date_start)) : '';
                    $ot_time_end = $ot->timesheet_contract_driver_ot_date_end ? date('H:i', strtotime($ot->timesheet_contract_driver_ot_date_end)) : '';
                    if($time_end <= $ot_time_end){
                        if($time_end > $ot_time_start){
                            if($no > 1){
                                $str_time_start = strtotime($ot_time_start);
                                $hour_time_start = $ot_time_start;
                            }else{
                                $str_time_start = strtotime($time_start);
                                $hour_time_start = $time_start;
                            }
                            $str_time_end = strtotime($time_end);
                            $hour_time_end = $time_end;
                            if($hour_time_start >= $CustomerContract->customer_contract_time_end){
                                $status = 'A'; //after
                            }else{
                                $status = 'B'; //before
                            }
                            $hour = gmdate('G.i', $str_time_end - $str_time_start);
                            if($hour > 0){
                                $data[$ot->price_structure_ot_id]['price_structure_ot_id'] = $ot->price_structure_ot_id;
                                $data[$ot->price_structure_ot_id]['timesheet_contract_driver_id'] = $timesheet_contract_driver_id;
                                $data[$ot->price_structure_ot_id]['ot'] = $ot->timesheet_contract_driver_ot_name;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['status'] = $status;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['hour'] = $hour;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['time_start'] = $hour_time_start;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['time_end'] = $hour_time_end;
                            }
                        }
                        $i = 1;
                    }else{
                        if($ot_time_end >= $time_start){
                            if($no > 1){
                                $str_time_start = strtotime($ot_time_start);
                                $hour_time_start = $ot_time_start;
                            }else{
                                $str_time_start = strtotime($time_start);
                                $hour_time_start = $time_start;
                            }
                            $str_time_end = strtotime($ot_time_end);
                            $hour_time_end = $ot_time_end;
                            if($hour_time_start >= $CustomerContract->customer_contract_time_end){
                                $status = 'A'; //after
                            }else{
                                $status = 'B'; //before
                            }
                            $hour = gmdate('G.i', $str_time_end - $str_time_start);
                            if($hour > 0){
                                $data[$ot->price_structure_ot_id]['price_structure_ot_id'] = $ot->price_structure_ot_id;
                                $data[$ot->price_structure_ot_id]['timesheet_contract_driver_id'] = $timesheet_contract_driver_id;
                                $data[$ot->price_structure_ot_id]['ot'] = $ot->timesheet_contract_driver_ot_name;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['status'] = $status;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['hour'] = $hour;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['time_start'] = $hour_time_start;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['time_end'] = $hour_time_end;
                            }
                            $result = TimesheetContractDriverOt::where('customer_contract_id', $customer_contract_id)
                            ->where('driver_working_id', $driver_working_id);
                            if($date_text == 'Mon'){
                                $result->where('timesheet_contract_driver_ot_day_mon', 1);
                            }elseif($date_text == 'Tue'){
                                $result->where('timesheet_contract_driver_ot_day_thu', 1);
                            }elseif($date_text == 'Wed'){
                                $result->where('timesheet_contract_driver_ot_day_wed', 1);
                            }elseif($date_text == 'Thu'){
                                $result->where('timesheet_contract_driver_ot_date_thu', 1);
                            }elseif($date_text == 'Fri'){
                                $result->where('timesheet_contract_driver_ot_day_fri', 1);
                            }elseif($date_text == 'Sat'){
                                $result->where('timesheet_contract_driver_ot_day_sat', 1);
                            }elseif($date_text == 'Sun'){
                                $result->where('timesheet_contract_driver_ot_day_sun', 1);
                            }
                            $result->whereTime('timesheet_contract_driver_ot_date_start', '>', $ot_time_end.':00');
                            if($no > 1){
                                $ot = $result->orderBy('timesheet_contract_driver_ot_date_start', 'desc')->first();
                            }else{
                                $ot = $result->orderBy('timesheet_contract_driver_ot_date_start', 'asc')->first();
                            }
                            if($ot){
                                $ot_time_start = $ot->timesheet_contract_driver_ot_date_start ? date('H:i', strtotime($ot->timesheet_contract_driver_ot_date_start)) : '';
                                if($time_end > $ot_time_start){
                                    $time_start = $ot_time_start;
                                }else{
                                    $i = 1;
                                }
                            }else{
                                $i = 1;
                            }
                        }else{
                            $i = 1;
                        }
                    }
                }else{
                    $result = TimesheetContractDriverOt::where('customer_contract_id', $customer_contract_id)
                    ->where('driver_working_id', $driver_working_id);
                    if($date_text == 'Mon'){
                        $result->where('timesheet_contract_driver_ot_day_mon', 1);
                    }elseif($date_text == 'Tue'){
                        $result->where('timesheet_contract_driver_ot_day_thu', 1);
                    }elseif($date_text == 'Wed'){
                        $result->where('timesheet_contract_driver_ot_day_wed', 1);
                    }elseif($date_text == 'Thu'){
                        $result->where('timesheet_contract_driver_ot_date_thu', 1);
                    }elseif($date_text == 'Fri'){
                        $result->where('timesheet_contract_driver_ot_day_fri', 1);
                    }elseif($date_text == 'Sat'){
                        $result->where('timesheet_contract_driver_ot_day_sat', 1);
                    }elseif($date_text == 'Sun'){
                        $result->where('timesheet_contract_driver_ot_day_sun', 1);
                    }
                    $result->whereTime('timesheet_contract_driver_ot_date_start', '>', $time_start.':00');
                    $ot = $result->orderBy('timesheet_contract_driver_ot_date_start', 'asc')->first();
                    if($ot){
                        $ot_time_start = $ot->timesheet_contract_driver_ot_date_start ? date('H:i', strtotime($ot->timesheet_contract_driver_ot_date_start)) : '';
                        $ot_time_end = $ot->timesheet_contract_driver_ot_date_end ? date('H:i', strtotime($ot->timesheet_contract_driver_ot_date_end)) : '';
                        if($time_end <= $ot_time_end){
                            if($time_end > $ot_time_start){
                                $str_time_start = strtotime($ot_time_start);
                                $hour_time_start = $ot_time_start;
                                $str_time_end = strtotime($time_end);
                                $hour_time_end = $time_end;
                                if($hour_time_start >= $CustomerContract->customer_contract_time_end){
                                    $status = 'A'; //after
                                }else{
                                    $status = 'B'; //before
                                }
                                $hour = gmdate('G.i', $str_time_end - $str_time_start);
                                if($hour > 0){
                                    $data[$ot->price_structure_ot_id]['price_structure_ot_id'] = $ot->price_structure_ot_id;
                                    $data[$ot->price_structure_ot_id]['timesheet_contract_driver_id'] = $timesheet_contract_driver_id;
                                    $data[$ot->price_structure_ot_id]['ot'] = $ot->timesheet_contract_driver_ot_name;
                                    $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['status'] = $status;
                                    $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['hour'] = $hour;
                                    $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['time_start'] = $hour_time_start;
                                    $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['time_end'] = $hour_time_end;
                                }
                            }
                            $i = 1;
                        }else{
                            if($no > 1){
                                $str_time_start = strtotime($time_start);
                                $hour_time_start = $time_start;
                            }else{
                                $str_time_start = strtotime($ot_time_start);
                                $hour_time_start = $ot_time_start;
                            }
                            $str_time_end = strtotime($ot_time_end);
                            $hour_time_end = $ot_time_end;
                            if($hour_time_start >= $CustomerContract->customer_contract_time_end){
                                $status = 'A'; //after
                            }else{
                                $status = 'B'; //before
                            }
                            $hour = gmdate('G.i', $str_time_end - $str_time_start);
                            if($hour > 0){
                                $data[$ot->price_structure_ot_id]['price_structure_ot_id'] = $ot->price_structure_ot_id;
                                $data[$ot->price_structure_ot_id]['timesheet_contract_driver_id'] = $timesheet_contract_driver_id;
                                $data[$ot->price_structure_ot_id]['ot'] = $ot->timesheet_contract_driver_ot_name;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['status'] = $status;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['hour'] = $hour;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['time_start'] = $hour_time_start;
                                $data[$ot->price_structure_ot_id]['status'][$status][$ot->timesheet_contract_driver_ot_id]['time_end'] = $hour_time_end;
                            }
                            $result = TimesheetContractDriverOt::where('customer_contract_id', $customer_contract_id)
                            ->where('driver_working_id', $driver_working_id);
                            if($date_text == 'Mon'){
                                $result->where('timesheet_contract_driver_ot_day_mon', 1);
                            }elseif($date_text == 'Tue'){
                                $result->where('timesheet_contract_driver_ot_day_thu', 1);
                            }elseif($date_text == 'Wed'){
                                $result->where('timesheet_contract_driver_ot_day_wed', 1);
                            }elseif($date_text == 'Thu'){
                                $result->where('timesheet_contract_driver_ot_date_thu', 1);
                            }elseif($date_text == 'Fri'){
                                $result->where('timesheet_contract_driver_ot_day_fri', 1);
                            }elseif($date_text == 'Sat'){
                                $result->where('timesheet_contract_driver_ot_day_sat', 1);
                            }elseif($date_text == 'Sun'){
                                $result->where('timesheet_contract_driver_ot_day_sun', 1);
                            }
                            $result->whereTime('timesheet_contract_driver_ot_date_start', '>', $ot_time_end.':00');
                            if($no > 1){
                                $ot = $result->orderBy('timesheet_contract_driver_ot_date_start', 'desc')->first();
                            }else{
                                $ot = $result->orderBy('timesheet_contract_driver_ot_date_start', 'asc')->first();
                            }
                            if($ot){
                                $ot_time_start = $ot->timesheet_contract_driver_ot_date_start ? date('H:i', strtotime($ot->timesheet_contract_driver_ot_date_start)) : '';
                                if($time_end > $ot_time_start){
                                    $time_start = $ot_time_start;
                                }else{
                                    $i = 1;
                                }
                            }else{
                                $i = 1;
                            }
                        }
                    }else{
                        $i = 1;
                    }
                }
            }else{
                $i = 1;
            }
        }
        return $data;
    }

}
