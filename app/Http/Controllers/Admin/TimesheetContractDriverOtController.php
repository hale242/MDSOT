<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\TimesheetContractDriverOt;
use App\PriceStructureOT;

class TimesheetContractDriverOtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

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
        $validator = Validator::make($request->all(), [
            'price_structure_ot_id' => 'required',
            'timesheet_contract_driver_ot_date_start' => 'required',
            'timesheet_contract_driver_ot_date_end' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PriceStructureOT = PriceStructureOT::find($input_all['price_structure_ot_id']);
                $TimesheetContractDriverOt = new TimesheetContractDriverOt;
                foreach($input_all as $key=>$val){
                    $TimesheetContractDriverOt->{$key} = $val;
                }
                if(!isset($input_all['timesheet_contract_driver_ot_day_mon'])){
                    $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_mon = 0;
                }
                if(!isset($input_all['timesheet_contract_driver_ot_day_thu'])){
                    $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_thu = 0;
                }
                if(!isset($input_all['timesheet_contract_driver_ot_day_wed'])){
                    $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_wed = 0;
                }
                if(!isset($input_all['timesheet_contract_driver_ot_date_thu'])){
                    $TimesheetContractDriverOt->timesheet_contract_driver_ot_date_thu = 0;
                }
                if(!isset($input_all['timesheet_contract_driver_ot_day_fri'])){
                    $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_fri = 0;
                }
                if(!isset($input_all['timesheet_contract_driver_ot_day_sat'])){
                    $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_sat = 0;
                }
                if(!isset($input_all['timesheet_contract_driver_ot_day_sun'])){
                    $TimesheetContractDriverOt->timesheet_contract_driver_ot_day_sun = 0;
                }
                if(!isset($input_all['timesheet_contract_driver_ot_status'])){
                    $TimesheetContractDriverOt->timesheet_contract_driver_ot_status = 0;
                }
                $TimesheetContractDriverOt->timesheet_contract_driver_ot_lv = $PriceStructureOT->price_structure_ot_lv;
                $TimesheetContractDriverOt->timesheet_contract_driver_ot_name = $PriceStructureOT->price_structure_ot_name;
                $TimesheetContractDriverOt->timesheet_contract_driver_ot_date_start = date('Y-m-d').' '.$TimesheetContractDriverOt->timesheet_contract_driver_ot_date_start;
                $TimesheetContractDriverOt->timesheet_contract_driver_ot_date_end = date('Y-m-d').' '.$TimesheetContractDriverOt->timesheet_contract_driver_ot_date_end;
                $TimesheetContractDriverOt->save();
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
            if(isset($failedRules['timesheet_contract_driver_ot_temp_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "OT Type is required";
            }
            if(isset($failedRules['timesheet_contract_driver_ot_date_start']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Start time OT is required";
            }
            if(isset($failedRules['timesheet_contract_driver_ot_date_end']['required'])) {
                $return['status'] = 2;
                $return['title'] = "End time OT is required";
            }
        }
        $return['title'] = 'Insert';
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
        $content = TimesheetContractDriverOt::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get TimesheetContractDriverOt';
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
      $result = TimesheetContractDriverOt::select();
      $driver_working_id = $request->input('driver_working_id');
      if($driver_working_id){
          $result->where('driver_working_id', $driver_working_id);
      }
      return Datatables::of($result)
        ->editColumn('timesheet_contract_driver_ot_date_start' , function($res){
            return $res->timesheet_contract_driver_ot_date_start ? date('H:i', strtotime($res->timesheet_contract_driver_ot_date_start)) : '';
        })
        ->editColumn('timesheet_contract_driver_ot_date_end' , function($res){
            return $res->timesheet_contract_driver_ot_date_end ? date('H:i', strtotime($res->timesheet_contract_driver_ot_date_end)) : '';
        })
        ->addColumn('days' , function($res){
            $days = '';
            if($res->timesheet_contract_driver_ot_day_mon == 1){
                $days.= '<span class="badge badge-pill text-white font-medium label-rouded" id="show_status_job_app_name" style="background-color: #FFEB3B;">Mon</span> ';
            }
            if($res->timesheet_contract_driver_ot_day_thu == 1){
                $days.= '<span class="badge badge-pill text-white font-medium label-rouded" id="show_status_job_app_name" style="background-color: #d8349e;">Tue</span> ';
            }
            if($res->timesheet_contract_driver_ot_day_wed == 1){
                $days.= '<span class="badge badge-pill text-white font-medium label-rouded" id="show_status_job_app_name" style="background-color: #4CAF50;">Wed</span> ';
            }
            if($res->timesheet_contract_driver_ot_date_thu == 1){
                $days.= '<span class="badge badge-pill text-white font-medium label-rouded" id="show_status_job_app_name" style="background-color: #FF9800;">Thu</span> ';
            }
            if($res->timesheet_contract_driver_ot_day_fri == 1){
                $days.= '<span class="badge badge-pill text-white font-medium label-rouded" id="show_status_job_app_name" style="background-color: #03A9F4;">Fri</span> ';
            }
            if($res->timesheet_contract_driver_ot_day_sat == 1){
                $days.= '<span class="badge badge-pill text-white font-medium label-rouded" id="show_status_job_app_name" style="background-color: #9C27B0;">Sat</span> ';
            }
            if($res->timesheet_contract_driver_ot_day_sun == 1){
                $days.= '<span class="badge badge-pill text-white font-medium label-rouded" id="show_status_job_app_name" style="background-color: #F44336;">Sun</span> ';
            }
            return $days;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('CustomerContract' , '1');
            $insert = Helper::CheckPermissionMenu('CustomerContract' , '2');
            $update = Helper::CheckPermissionMenu('CustomerContract' , '3');
            $delete = Helper::CheckPermissionMenu('CustomerContract' , '4');
            if($res->timesheet_contract_driver_ot_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-ot-structure" '.$checked.' data-id="'.$res->timesheet_contract_driver_ot_id.'" data-style="ios" data-on="On" data-off="Off">';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['days', 'action'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $TimesheetContractDriverOt = TimesheetContractDriverOt::find($id);
            $TimesheetContractDriverOt->timesheet_contract_driver_ot_status = $request->input('status');
            $TimesheetContractDriverOt->save();
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
}
