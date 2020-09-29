<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\HolidayCalendar;
use App\HolidayType;
class HolidayCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','HolidayCalendar')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $HolidayCalendars = HolidayCalendar::whereNotNull('holiday_calendar_date')->get();
          $holiday = [];
          foreach($HolidayCalendars as $key=>$val){
              $holiday[$key]['id'] = $val->holiday_calendar_id;
              $holiday[$key]['title'] = $val->holiday_calendar_name;
              $holiday[$key]['start'] = date("Y-m-d", strtotime($val->holiday_calendar_date));
              $holiday[$key]['status'] = $val->holiday_calendar_status;
          }
          $data['holiday_calendars'] = $holiday;
          $data['holiday_year'] = $request->has('year') ? $request->input('year') : date('Y');
          $data['holiday_date'] = $request->has('year') ? $request->input('year').'-01-01' : date('Y-m-d');
          if(Helper::CheckPermissionMenu('HolidayCalendar' , '1')){
              return view('admin.HolidayCalendar.holiday_calendar', $data);
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
        $year = $request->input('year');
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if($year){
                    $HolidayCalendar = HolidayCalendar::where('holiday_calendar_year', $year)->get();
                    if(count($HolidayCalendar) <= 0){
                        $HolidayTypes = HolidayType::where('holiday_type_status', 1)->get();
                        foreach($HolidayTypes as $val){
                            $HolidayCalendar = new HolidayCalendar;
                            $HolidayCalendar->holiday_type_id = $val->holiday_type_id;
                            $HolidayCalendar->holiday_calendar_year = $year;
                            $HolidayCalendar->holiday_calendar_name = $val->holiday_type_name;
                            $HolidayCalendar->holiday_calendar_details = $val->holiday_type_details;
                            $HolidayCalendar->holiday_calendar_status = 1;
                            if($val->holiday_type_date){
                                $HolidayCalendar->holiday_calendar_date = $year.'-'.date("m-d", strtotime($val->holiday_type_date));
                            }
                            $HolidayCalendar->save();
                        }
                        $return['content'] = 'Success Yes';
                    }else{
                        $return['content'] = 'Success No';
                    }
                }else{
                    $HolidayCalendar = new HolidayCalendar;
                    foreach($input_all as $key=>$val){
                        $HolidayCalendar->{$key} = $val;
                    }
                    if(!isset($input_all['holiday_calendar_status'])) {
                        $HolidayCalendar->holiday_calendar_status = 0;
                    }
                    if($HolidayCalendar->holiday_calendar_date){
                        $HolidayCalendar->holiday_calendar_date = $HolidayCalendar->holiday_calendar_year.'-'.date("m-d", strtotime($HolidayCalendar->holiday_calendar_date));
                    }
                    $HolidayCalendar->save();
                    $return['content'] = 'Success';
                }
                \DB::commit();
                $return['status'] = 1;
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if(isset($failedRules['holiday_calendar_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Holiday Type is required";
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
        $content = HolidayCalendar::find($id);
        $content['holiday_calendar_date'] = $content->holiday_calendar_date ? date("Y-m-d", strtotime($content->holiday_calendar_date)) : '';
        $content['format_holiday_calendar_date'] = $content->holiday_calendar_date ? date("d/m/Y", strtotime($content->holiday_calendar_date)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get HolidayCalendar';
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
            'holiday_calendar_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $HolidayCalendar = HolidayCalendar::find($id);
                foreach($input_all as $key=>$val){
                    $HolidayCalendar->{$key} = $val;
                }
                if(!isset($input_all['holiday_calendar_status'])) {
                    $HolidayCalendar->holiday_calendar_status = 0;
                }
                $HolidayCalendar->save();
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
            if(isset($failedRules['holiday_calendar_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Holiday Type is required";
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
      $result = HolidayCalendar::select();
      $year = $request->input('year');
      if($year){
          $result->where('holiday_calendar_year', $year);
      }
      return Datatables::of($result)
        ->editColumn('holiday_calendar_date' , function($res){
            $str = '';
            if($res->holiday_calendar_date){
                $str = $res->holiday_calendar_date ? date("d/m/Y", strtotime($res->holiday_calendar_date)) : '';
            }
            return $str;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('HolidayCalendar' , '1');
            $insert = Helper::CheckPermissionMenu('HolidayCalendar' , '2');
            $update = Helper::CheckPermissionMenu('HolidayCalendar' , '3');
            $delete = Helper::CheckPermissionMenu('HolidayCalendar' , '4');
            if($res->holiday_calendar_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->holiday_calendar_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->holiday_calendar_id.'">Edit</button>';
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
            $HolidayCalendar = HolidayCalendar::find($id);
            $HolidayCalendar->holiday_calendar_status = $request->input('status');
            $HolidayCalendar->save();
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
