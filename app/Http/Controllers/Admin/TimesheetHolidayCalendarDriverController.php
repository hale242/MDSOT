<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\TimesheetHolidayCalendarDriver;

class TimesheetHolidayCalendarDriverController extends Controller
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
            'timesheet_holiday_calendar_driver_year' => 'required',
            'timesheet_holiday_calendar_driver_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $TimesheetHolidayCalendarDriver = new TimesheetHolidayCalendarDriver;
                foreach($input_all as $key=>$val){
                    $TimesheetHolidayCalendarDriver->{$key} = $val;
                }
                if(!isset($input_all['timesheet_holiday_calendar_driver_status'])){
                    $TimesheetHolidayCalendarDriver->timesheet_holiday_calendar_driver_status = 0;
                }
                $TimesheetHolidayCalendarDriver->save();
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
            if(isset($failedRules['timesheet_holiday_calendar_driver_year']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Year is required";
            }
            if(isset($failedRules['timesheet_holiday_calendar_driver_name']['required'])) {
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
        $content = TimesheetHolidayCalendarDriver::find($id);
        $content->timesheet_holiday_calendar_driver_date = $content->timesheet_holiday_calendar_driver_date ?  date('Y-m-d', strtotime($content->timesheet_holiday_calendar_driver_date)) : '';
        $content->format_imesheet_holiday_calendar_date = $content->timesheet_holiday_calendar_driver_date ?  date('d/m/Y', strtotime($content->timesheet_holiday_calendar_driver_date)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get TimesheetHolidayCalendarDriver';
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
            'timesheet_holiday_calendar_driver_year' => 'required',
            'timesheet_holiday_calendar_driver_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $TimesheetHolidayCalendarDriver = TimesheetHolidayCalendarDriver::find($id);
                foreach($input_all as $key=>$val){
                    $TimesheetHolidayCalendarDriver->{$key} = $val;
                }
                if(!isset($input_all['timesheet_holiday_calendar_driver_status'])){
                    $TimesheetHolidayCalendarDriver->timesheet_holiday_calendar_driver_status = 0;
                }
                $TimesheetHolidayCalendarDriver->save();
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
            if(isset($failedRules['timesheet_holiday_calendar_driver_year']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Year is required";
            }
            if(isset($failedRules['timesheet_holiday_calendar_driver_name']['required'])) {
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
      $result = TimesheetHolidayCalendarDriver::select();
      $driver_working_id = $request->input('driver_working_id');
      if($driver_working_id){
          $result->where('driver_working_id', $driver_working_id);
      }
      return Datatables::of($result)
        ->addColumn('timesheet_holiday_calendar_driver_date' , function($res){
            return $res->timesheet_holiday_calendar_driver_date ? date('d/m/Y', strtotime($res->timesheet_holiday_calendar_driver_date)) : '';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('CustomerContract' , '1');
            $insert = Helper::CheckPermissionMenu('CustomerContract' , '2');
            $update = Helper::CheckPermissionMenu('CustomerContract' , '3');
            $delete = Helper::CheckPermissionMenu('CustomerContract' , '4');
            if($res->timesheet_holiday_calendar_driver_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-holiday" '.$checked.' data-id="'.$res->timesheet_holiday_calendar_driver_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit-holiday" data-id="'.$res->timesheet_holiday_calendar_driver_id.'">Edit</button>';
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
            $TimesheetHolidayCalendarDriver = TimesheetHolidayCalendarDriver::find($id);
            $TimesheetHolidayCalendarDriver->timesheet_holiday_calendar_driver_status = $request->input('status');
            $TimesheetHolidayCalendarDriver->save();
            \DB::commit();
            $return['count_annual_holiday'] = TimesheetHolidayCalendarDriver::where('driver_working_id', $TimesheetHolidayCalendarDriver->driver_working_id)->where('timesheet_holiday_calendar_driver_status', 1)->count();
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
