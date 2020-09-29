<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\TimesheetHolidayCalendar;

class TimesheetHolidayCalendarController extends Controller
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
            'timesheet_holiday_calendar_year' => 'required',
            'timesheet_holiday_calendar_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $TimesheetHolidayCalendar = new TimesheetHolidayCalendar;
                foreach($input_all as $key=>$val){
                    $TimesheetHolidayCalendar->{$key} = $val;
                }
                if(!isset($input_all['timesheet_holiday_calendar_status'])){
                    $TimesheetHolidayCalendar->timesheet_holiday_calendar_status = 0;
                }
                $TimesheetHolidayCalendar->save();
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
            if(isset($failedRules['timesheet_holiday_calendar_year']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Year is required";
            }
            if(isset($failedRules['timesheet_holiday_calendar_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณาระบุชื่อวันหยุด";
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
        $content = TimesheetHolidayCalendar::find($id);
        $content->timesheet_holiday_calendar_date = $content->timesheet_holiday_calendar_date ?  date('Y-m-d', strtotime($content->timesheet_holiday_calendar_date)) : '';
        $content->format_imesheet_holiday_calendar_date = $content->timesheet_holiday_calendar_date ?  date('d/m/Y', strtotime($content->timesheet_holiday_calendar_date)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get TimesheetHolidayCalendar';
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
        $validator = Validator::make($request->all(), [
            'timesheet_holiday_calendar_year' => 'required',
            'timesheet_holiday_calendar_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $TimesheetHolidayCalendar = TimesheetHolidayCalendar::find($id);
                foreach($input_all as $key=>$val){
                    $TimesheetHolidayCalendar->{$key} = $val;
                }
                if(!isset($input_all['timesheet_holiday_calendar_status'])){
                    $TimesheetHolidayCalendar->timesheet_holiday_calendar_status = 0;
                }
                $TimesheetHolidayCalendar->save();
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
            if(isset($failedRules['timesheet_holiday_calendar_year']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Year is required";
            }
            if(isset($failedRules['timesheet_holiday_calendar_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "กรุณาระบุชื่อวันหยุด";
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
      $result = TimesheetHolidayCalendar::select();
      $customer_contract_id = $request->input('customer_contract_id');
      if($customer_contract_id){
          $result->where('customer_contract_id', $customer_contract_id);
      }
      return Datatables::of($result)
        ->addColumn('timesheet_holiday_calendar_date' , function($res){
            return $res->timesheet_holiday_calendar_date ? date('d/m/Y', strtotime($res->timesheet_holiday_calendar_date)) : '';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('CustomerContract' , '1');
            $insert = Helper::CheckPermissionMenu('CustomerContract' , '2');
            $update = Helper::CheckPermissionMenu('CustomerContract' , '3');
            $delete = Helper::CheckPermissionMenu('CustomerContract' , '4');
            if($res->timesheet_holiday_calendar_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-holiday" '.$checked.' data-id="'.$res->timesheet_holiday_calendar_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit-holiday" data-id="'.$res->timesheet_holiday_calendar_id.'">Edit</button>';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            if($update){
                $str.=' '.$btnEdit;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox', 'action'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $TimesheetHolidayCalendar = TimesheetHolidayCalendar::find($id);
            $TimesheetHolidayCalendar->timesheet_holiday_calendar_status = $request->input('status');
            $TimesheetHolidayCalendar->save();
            \DB::commit();
            $return['count_annual_holiday'] = TimesheetHolidayCalendar::where('customer_contract_id', $TimesheetHolidayCalendar->customer_contract_id)->where('timesheet_holiday_calendar_status', 1)->count();
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
