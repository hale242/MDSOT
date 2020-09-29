<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
use App\Helper;
use App\MenuSystem;
use App\DriverWorking;
use App\Driver;
use App\CustomerContract;
use App\Company;
use App\TimesheetContractDriver;

class DriverWorkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','DriverWorking')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Companies'] = Company::where('company_status', 1)->get();
        $data['Drivers'] = Driver::get();
        $data['CustomerContracts'] = CustomerContract::where('customer_contract_status', 4)->where('customer_contract_date_end', '>=', date('Y-m-d').' 23:59:59')->get();
        if(Helper::CheckPermissionMenu('DriverWorking' , '1')){
            return view('admin.DriverWorking.driver_working', $data);
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
        $input_all = $request->all();
        $standby = $input_all['standby'];
        $substitute = $input_all['substitute'];
        $in_contract = $input_all['in_contract'];
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required',
            'driver_working_change_status' => 'required'
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                $Driver = Driver::find($input_all['driver_id']);
                if($input_all['driver_working_change_status'] == 1){
                    $Driver->driver_status = 1; //standby
                    $DriverWorkingOle = DriverWorking::where('driver_id', $Driver->driver_id)->orderBy('driver_working_id', 'desc')->first();
                    if($DriverWorkingOle){
                        $DriverWorking = new DriverWorking;
                        $DriverWorking->driver_id = $Driver->driver_id;
                        $DriverWorking->ole_driver_id = $DriverWorkingOle->driver_id;
                        $DriverWorking->customer_contract_id = $DriverWorkingOle->customer_contract_id;
                        $DriverWorking->ole_customer_contract_id = $DriverWorkingOle->customer_contract_id;
                        $DriverWorking->quotation_id = $DriverWorkingOle->quotation_id;
                        $DriverWorking->quotation_price_list_id = $DriverWorkingOle->quotation_price_list_id;
                        $DriverWorking->back_order_id = $DriverWorkingOle->back_order_id;
                        $DriverWorking->back_order_spec_id = $DriverWorkingOle->back_order_spec_id;
                        $DriverWorking->back_order_interviwe_id = $DriverWorkingOle->back_order_interviwe_id;
                        $DriverWorking->admin_id = $admin->admin_id;
                        $DriverWorking->driver_working_date_start = $standby['driver_working_date_start'];
                        $DriverWorking->driver_working_date_end = $DriverWorkingOle->driver_working_date_end;
                        $DriverWorking->driver_working_date_start_ole = $DriverWorkingOle->driver_working_date_start;
                        $DriverWorking->driver_working_date_end_ole = $DriverWorkingOle->driver_working_date_end;
                        $DriverWorking->ole_company_id = $DriverWorkingOle->new_company_id;
                        $DriverWorking->driver_working_ole_salary = $DriverWorkingOle->driver_working_salary;
                        $DriverWorking->new_company_id = $DriverWorkingOle->new_company_id;
                        $DriverWorking->driver_working_salary = $DriverWorkingOle->driver_working_salary;
                        $DriverWorking->driver_working_change_status = $input_all['driver_working_change_status'];
                        $DriverWorking->driver_working_status = 1; // 1=เริ่มงาน
                        $DriverWorking->save();

                        $DriverWorkingOle->driver_working_status = 3; // 3=เสร็จงาน
                        $DriverWorkingOle->save();
                        $BackOrderInterview = BackOrderInterview::find($DriverWorkingOle->back_order_interviwe_id);
                        $BackOrderInterview->back_order_interviwe_results = 0;
                        $BackOrderInterview->save();
                    }
                }elseif($input_all['driver_working_change_status'] == 2){
                    $Driver->driver_status = 2; //ทดแทน
                    $DriverWorkingOle = DriverWorking::find($substitute['driver_working_id']);
                    if($DriverWorkingOle){
                        $DriverWorking = new DriverWorking;
                        $DriverWorking->driver_id = $Driver->driver_id;
                        $DriverWorking->ole_driver_id = $DriverWorkingOle->driver_id;
                        $DriverWorking->customer_contract_id = $substitute['customer_contract_id'];
                        $DriverWorking->ole_customer_contract_id = $DriverWorkingOle->customer_contract_id;
                        $DriverWorking->quotation_id = $DriverWorkingOle->quotation_id;
                        $DriverWorking->quotation_price_list_id = $DriverWorkingOle->quotation_price_list_id;
                        $DriverWorking->back_order_id = $DriverWorkingOle->back_order_id;
                        $DriverWorking->back_order_spec_id = $DriverWorkingOle->back_order_spec_id;
                        $DriverWorking->back_order_interviwe_id = $DriverWorkingOle->back_order_interviwe_id;
                        $DriverWorking->admin_id = $admin->admin_id;
                        $DriverWorking->driver_working_date_start = $substitute['driver_working_date_start'];
                        $DriverWorking->driver_working_date_end = $substitute['driver_working_date_end'];
                        $DriverWorking->driver_working_date_start_ole = $DriverWorkingOle->driver_working_date_start;
                        $DriverWorking->driver_working_date_end_ole = $DriverWorkingOle->driver_working_date_end;
                        $DriverWorking->ole_company_id = $DriverWorkingOle->new_company_id;
                        $DriverWorking->driver_working_ole_salary = $DriverWorkingOle->driver_working_salary;
                        $DriverWorking->new_company_id = $DriverWorkingOle->new_company_id;
                        $DriverWorking->driver_working_salary = $DriverWorkingOle->driver_working_salary;
                        $DriverWorking->driver_working_change_status = $input_all['driver_working_change_status'];
                        $DriverWorking->driver_working_comment = $substitute['driver_working_comment'];
                        $DriverWorking->driver_working_status = 1; // 1=เริ่มงาน
                        $DriverWorking->save();
                    }
                }elseif($input_all['driver_working_change_status'] == 3){
                    $Driver->driver_status = 3; //พนักงานสัญญาจ้าง
                    $DriverWorkingOle = DriverWorking::find($in_contract['driver_working_id']);
                    if($DriverWorkingOle){
                        $DriverWorking1 = new DriverWorking;
                        $DriverWorking1->driver_id = $Driver->driver_id;
                        $DriverWorking1->ole_driver_id = $DriverWorkingOle->driver_id;
                        $DriverWorking1->customer_contract_id = $in_contract['customer_contract_id'];
                        $DriverWorking1->ole_customer_contract_id = $DriverWorkingOle->customer_contract_id;
                        $DriverWorking1->quotation_id = $DriverWorkingOle->quotation_id;
                        $DriverWorking1->quotation_price_list_id = $DriverWorkingOle->quotation_price_list_id;
                        $DriverWorking1->back_order_id = $DriverWorkingOle->back_order_id;
                        $DriverWorking1->back_order_spec_id = $DriverWorkingOle->back_order_spec_id;
                        $DriverWorking1->back_order_interviwe_id = $DriverWorkingOle->back_order_interviwe_id;
                        $DriverWorking1->admin_id = $admin->admin_id;
                        $DriverWorking1->driver_working_date_start = $in_contract['driver_working_date_start'];
                        $DriverWorking1->driver_working_date_end = $DriverWorkingOle->driver_working_date_end;
                        $DriverWorking1->driver_working_date_start_ole = $DriverWorkingOle->driver_working_date_start;
                        $DriverWorking1->driver_working_date_end_ole = $DriverWorkingOle->driver_working_date_end;
                        $DriverWorking1->ole_company_id = $DriverWorkingOle->new_company_id;
                        $DriverWorking1->driver_working_ole_salary = $DriverWorkingOle->driver_working_salary;
                        $DriverWorking1->new_company_id = $DriverWorkingOle->new_company_id;
                        $DriverWorking1->driver_working_salary = $DriverWorkingOle->driver_working_salary;
                        $DriverWorking1->driver_working_change_status = $input_all['driver_working_change_status'];
                        $DriverWorking1->driver_working_status = 1; // 1=เริ่มงาน
                        $DriverWorking1->save();

                        $DriverWorking2 = new DriverWorking;
                        $DriverWorking2->driver_id = $DriverWorkingOle->driver_id;
                        $DriverWorking2->ole_driver_id = $DriverWorkingOle->ole_driver_id;
                        $DriverWorking2->ole_customer_contract_id = $DriverWorkingOle->ole_customer_contract_id;
                        $DriverWorking2->quotation_id = $DriverWorkingOle->quotation_id;
                        $DriverWorking2->quotation_price_list_id = $DriverWorkingOle->quotation_price_list_id;
                        $DriverWorking2->back_order_id = $DriverWorkingOle->back_order_id;
                        $DriverWorking2->back_order_spec_id = $DriverWorkingOle->back_order_spec_id;
                        $DriverWorking2->back_order_interviwe_id = $DriverWorkingOle->back_order_interviwe_id;
                        $DriverWorking2->admin_id = $DriverWorkingOle->admin_id;
                        $DriverWorking2->driver_working_date_start = $DriverWorkingOle->driver_working_date_start;
                        $DriverWorking2->driver_working_date_end = $DriverWorkingOle->driver_working_date_end;
                        $DriverWorking2->driver_working_date_start_ole = $DriverWorkingOle->driver_working_date_start;
                        $DriverWorking2->driver_working_date_end_ole = $DriverWorkingOle->driver_working_date_end;
                        $DriverWorking2->ole_company_id = $DriverWorkingOle->new_company_id;
                        $DriverWorking2->driver_working_ole_salary = $DriverWorkingOle->driver_working_salary;
                        $DriverWorking2->new_company_id = $DriverWorkingOle->new_company_id;
                        $DriverWorking2->driver_working_salary = $DriverWorkingOle->driver_working_salary;
                        $DriverWorking2->driver_working_change_status = $DriverWorkingOle->driver_working_change_status;
                        $DriverWorking2->driver_working_status = 1; // 1=เริ่มงาน
                        $DriverWorking2->save();

                        $DriverWorkingOle->driver_working_status = 3; // 3=เสร็จงาน
                        $DriverWorkingOle->save();

                        $TimesheetContractDriver = TimesheetContractDriver::where('customer_contract_id', $in_contract['customer_contract_id'])
                        ->where('timesheet_contract_driver_date', '>=', $in_contract['driver_working_date_start'].' 00:00:00')
                        ->where('driver_working_id', $in_contract['driver_working_id'])
                        ->update([
                            'driver_id' => $Driver->driver_id,
                            'driver_working_id' => $DriverWorking1->driver_working_id,
                            'created_at' => date('Y-m-d H:i:s')
                        ]);
                    }
                }
                $Driver->save();
                \DB::commit();
                $return['status'] = 1;
                $return['title'] = 'Insert';
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['title'] = 'Insert';
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['driver_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Driver is required";
            }
            if (isset($failedRules['driver_working_change_status']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Status is required";
            }
        }
        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = DriverWorking::with(
          'Driver',
          'DriverOle',
          'CompanyNew',
          'CompanyOle',
          'CustomerContractNew',
          'CustomerContractOle',
          'QuotationPriceList.QuotationPriceListStaffExpense.StaffCost'
          )->find($id);
        $content->format_driver_working_date_start = $content->driver_working_date_start ? date('d/m/Y', strtotime($content->driver_working_date_start)) : '';
        $content->format_created_at = $content->created_at ? date('d/m/Y', strtotime($content->created_at)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get DriverWorking';
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
      $result = DriverWorking::select(
          'driver_working.*'
          ,'driver.driver_name_th'
          ,'driver.driver_lastname_th'
          ,'company_new.company_name_th as company_name_th_new'
          ,'company_ole.company_name_th as company_name_th_ole'
          ,'customer_contract_new.customer_contract_full_code as customer_contract_full_code_new'
          ,'customer_contract_ole.customer_contract_full_code as customer_contract_full_code_ole'
      )
      ->leftjoin('driver', 'driver.driver_id', 'driver_working.driver_id')
      ->leftjoin('company as company_new', 'company_new.company_id', 'driver_working.new_company_id')
      ->leftjoin('company as company_ole', 'company_ole.company_id', 'driver_working.ole_company_id')
      ->leftjoin('customer_contract as customer_contract_new', 'customer_contract_new.customer_contract_id', 'driver_working.customer_contract_id')
      ->leftjoin('customer_contract as customer_contract_ole', 'customer_contract_ole.customer_contract_id', 'driver_working.ole_customer_contract_id');
      $page = $request->input('page');
      $ole_company_id = $request->input('ole_company_id');
      $new_company_id = $request->input('new_company_id');
      $ole_driver_id = $request->input('ole_driver_id');
      $driver_id = $request->input('driver_id');
      $driver_working_salary_start = $request->input('driver_working_salary_start') ? str_replace(',', '', $request->input('driver_working_salary_start')) : '';
      $driver_working_salary_end = $request->input('driver_working_salary_end') ? str_replace(',', '', $request->input('driver_working_salary_end')) : '';
      if($ole_company_id){
          $result->where('ole_company_id', $ole_company_id);
      }
      if($new_company_id){
          $result->where('new_company_id', $new_company_id);
      }
      if($ole_driver_id){
          $result->where('ole_driver_id', $ole_driver_id);
      }
      if($driver_id){
          $result->where('driver_id', $driver_id);
      }
      if($driver_working_salary_start && $driver_working_salary_end){
          $result->whereBetween('driver_working_salary', [$driver_working_salary_start, $driver_working_salary_end]);
      }elseif($driver_working_salary_start && !$driver_working_salary_end){
          $result->where('driver_working_salary', '>=', $driver_working_salary_start);
      }elseif(!$driver_working_salary_start && $driver_working_salary_end){
          $result->where('driver_working_salary', '<=', $driver_working_salary_end);
      }

      return Datatables::of($result)
        ->addColumn('driver_name' , function($res){
            return $res->driver_name_th.' '.$res->driver_lastname_th;
        })
        ->editColumn('driver_working_salary' , function($res){
            return $res->driver_working_salary ? number_format($res->driver_working_salary, 2) : '';
        })
        ->editColumn('driver_working_ole_salary' , function($res){
            return $res->driver_working_ole_salary ? number_format($res->driver_working_ole_salary, 2) : '';
        })
        ->addColumn('date_ole' , function($res) use($page){
            return $res->ole_driver_id && $res->driver_working_date_start ? date('d/m/Y', strtotime($res->driver_working_date_start)) : '';
        })
        ->addColumn('date_new' , function($res) use($page){
            return $res->created_at ? date('d/m/Y', strtotime($res->created_at)) : '';
        })
        ->addColumn('driver_working_change_status' , function($res){
            return $res->driver_working_change_status ? $res->Status[$res->driver_working_change_status] : '';
        })
        ->addColumn('action' , function($res) use($page){
            $view = Helper::CheckPermissionMenu('DriverWorking' , '1');
            $insert = Helper::CheckPermissionMenu('DriverWorking' , '2');
            $update = Helper::CheckPermissionMenu('DriverWorking' , '3');
            $delete = Helper::CheckPermissionMenu('DriverWorking' , '4');
            $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_working_id.'">View</button>';
            $btnTimesheet = '<a href="'.url('admin/CustomerContract/OtSettingDriver/'.$res->driver_working_id).'" target="_blank" class="btn btn-warning btn-md"><i class="far fa-calendar-alt"></i>';
            $str = '';
            if($page == 'contract'){
                $str.= $btnTimesheet;
            }else{
                if($view){
                    $str.= $btnView;
                }
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }

    public function GetDriverWorkingByCustomerContract($id)
    {
        $result = DriverWorking::where('customer_contract_id', $id)
        ->where('driver_working_status', 1)
        ->where('driver_working_change_status', 3)
        ->with('Driver')
        ->get();
        return $result;
    }

    public function GetDriverWorkingByStatus($status)
    {
        if($status == 1){
            $DriverWorking = DriverWorking::with('Driver')->whereIn('driver_working_change_status', [2])->where('driver_working_status', 1)->get();
            $result = [];
            foreach($DriverWorking as $key=>$val){
                $result[$key]['driver_id'] = $val->driver_id;
                $result[$key]['driver_name_th'] = $val->Driver ? $val->Driver->driver_name_th : '';
                $result[$key]['driver_lastname_th'] = $val->Driver ? $val->Driver->driver_lastname_th : '';
            }
        }else{
            $result = Driver::where('driver_status' , 1)->get();
        }
        return $result;
    }
}
