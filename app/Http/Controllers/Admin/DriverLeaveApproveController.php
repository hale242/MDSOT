<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
use App\Helper;
use App\MenuSystem;
use App\DriverMakingLeave;
use App\Driver;
use App\LeaveType;
use App\DriverLeaveLineBranch;
use App\DriverLeaveLineApprove;
use App\DriverLeaveApprove;
use App\DriverLeave;

class DriverLeaveApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','DriverLeaveApprove')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['Drivers'] = Driver::where('driver_status', 1)->get();
          $data['LeaveTypes'] = LeaveType::where('leave_type_status', 1)->get();
          $data['DriverLeaveLineBranchs'] = DriverLeaveLineBranch::where('driver_leave_line_branch_status', 1)->get();
          if(Helper::CheckPermissionMenu('DriverLeaveApprove' , '1')){
              return view('admin.DriverLeaveApprove.driver_leave_approve', $data);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = DriverLeaveApprove::select(
            'driver_leave_approve.*'
            ,'driver_making_leave.driver_making_leave_start_date'
            ,'driver_making_leave.driver_making_leave_end_date'
            ,'driver_making_leave.driver_making_leave_count_date'
            ,'driver_making_leave.driver_making_leave_type'
            ,'driver.driver_name_th'
            ,'driver.driver_lastname_th'
        )
        ->leftjoin('driver_making_leave', 'driver_making_leave.driver_making_leave_id', 'driver_leave_approve.driver_making_leave_id')
        ->leftjoin('driver', 'driver.driver_id', 'driver_making_leave.driver_id')
        ->find($id);
        $content['driver_making_leave_start_date']  = $content->driver_making_leave_start_date ? date('Y-m-d', strtotime($content->driver_making_leave_start_date)) : '';
        $content['driver_making_leave_end_date']  = $content->driver_making_leave_end_date ? date('Y-m-d', strtotime($content->driver_making_leave_end_date)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get DriverLeaveApprove';
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
        $approve_type = $input_all['approve_type'];
        $driver_leave_approve_details = $input_all['driver_leave_approve_details'];
        unset($input_all['approve_type']);
        unset($input_all['driver_leave_approve_details']);
        $validator = Validator::make($request->all(), [
            'driver_making_leave_type' => 'required',
            'driver_making_leave_start_date' => 'required',
            'driver_making_leave_end_date' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                $DriverLeaveApprove = DriverLeaveApprove::find($id);
                $DriverMakingLeave = DriverMakingLeave::find($DriverLeaveApprove->driver_making_leave_id);
                foreach($input_all as $key=>$val){
                    $DriverMakingLeave->{$key} = $val;
                }
                if($approve_type == 'A'){
                    $DriverLeaveApprove->driver_leave_approve_status = 2; //อนุมัติการลา
                    $ChackDriverLeaveApprove = DriverLeaveApprove::where('driver_leave_approve_status', 0)->where('driver_making_leave_id', $DriverLeaveApprove->driver_making_leave_id)->whereNotIn('driver_leave_approve_id', [$DriverLeaveApprove->driver_leave_approve_id])->orderBy('driver_leave_approve_lv', 'asc')->first();
                    if(!$ChackDriverLeaveApprove){
                        $DriverMakingLeave->driver_making_leave_status = 1; //อนุมัติการลา
                        $year = $DriverMakingLeave->driver_making_leave_start_date ? date('Y', strtotime($DriverMakingLeave->driver_making_leave_start_date)) : '';
                        if($year){
                            DriverLeave::where('driver_id', $DriverMakingLeave->driver_id)->where('leave_type_id', $DriverMakingLeave->leave_type_id)->where('driver_leave_year', $year)->decrement('driver_leave_date_total', $DriverMakingLeave->driver_making_leave_count_date);
                        }
                    }else{
                        $ChackDriverLeaveApprove->driver_leave_approve_date_sent_approve = date('Y-m-d H:i:s');
                        $ChackDriverLeaveApprove->driver_leave_approve_status = 1;
                        $ChackDriverLeaveApprove->save();
                    }
                }elseif($approve_type == 'R'){
                    $DriverLeaveApprove->driver_leave_approve_status = 3; //แก้ไขใบลา
                    $DriverMakingLeave->driver_making_leave_status = 2; //แก้ไขใบลา
                }elseif($approve_type == 'F'){
                    $DriverLeaveApprove->driver_leave_approve_status = 9; //ไม่อนุมัติ
                    $DriverMakingLeave->driver_making_leave_status = 9; //ไม่อนุมัติ
                }
                $DriverLeaveApprove->driver_leave_approve_details = $driver_leave_approve_details;
                $DriverLeaveApprove->admin_id = $admin->admin_id;
                $DriverLeaveApprove->save();
                $DriverMakingLeave->save();
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
            if(isset($failedRules['driver_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Driver is required";
            }
            if(isset($failedRules['driver_leave_line_branch_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Branch name is required";
            }
            if(isset($failedRules['leave_type_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Leave type is required";
            }
            if(isset($failedRules['driver_making_leave_type']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Type is required";
            }
            if(isset($failedRules['driver_making_leave_start_date']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Start leave date is required";
            }
            if(isset($failedRules['driver_making_leave_end_date']['required'])) {
                $return['status'] = 2;
                $return['title'] = "End leave date is required";
            }
            if(isset($failedRules['driver_making_leave_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Leave name is required";
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

    public function lists(Request $request)
    {
        $admin = Auth::guard('admin')->user();
      $result = DriverLeaveApprove::select(
          'driver_leave_approve.*'
          ,'driver_making_leave.driver_id'
          ,'driver_making_leave.leave_type_id'
          ,'driver_making_leave.driver_leave_line_branch_id'
          ,'driver_making_leave.driver_making_leave_name'
          ,'driver_making_leave.driver_making_leave_start_date'
          ,'driver_making_leave.driver_making_leave_end_date'
          ,'driver_making_leave.driver_making_leave_count_date'
          ,'driver_making_leave.driver_making_leave_date_approve'
          ,'driver_making_leave.driver_making_leave_type'
          ,'driver_making_leave.driver_making_leave_status'
          ,'driver.driver_name_th'
          ,'driver.driver_lastname_th'
          ,'leave_type.leave_type_name'
          ,'driver_leave_line_branch.driver_leave_line_branch_name'
        )
        ->leftjoin('driver_making_leave', 'driver_making_leave.driver_making_leave_id', 'driver_leave_approve.driver_making_leave_id')
        ->leftjoin('driver', 'driver.driver_id', 'driver_making_leave.driver_id')
        ->leftjoin('leave_type', 'leave_type.leave_type_id', 'driver_making_leave.leave_type_id')
        ->leftjoin('driver_leave_line_branch', 'driver_leave_line_branch.driver_leave_line_branch_id', 'driver_making_leave.driver_leave_line_branch_id')
        ->leftjoin('driver_leave_line_approve', function($join){
            $join->on('driver_leave_line_approve.driver_leave_line_approve_lv', '=', 'driver_leave_approve.driver_leave_approve_lv');
            $join->on('driver_leave_line_approve.driver_leave_line_branch_id', 'driver_leave_approve.driver_leave_line_branch_id');
        })
        ->where('position_id', $admin->position_id)
        ->where('driver_leave_approve.driver_leave_approve_status', 1);

        $driver_id = $request->input('driver_id');
        $leave_type_id = $request->input('leave_type_id');
        $driver_leave_line_branch_id = $request->input('driver_leave_line_branch_id');
        $driver_making_leave_name = $request->input('driver_making_leave_name');
        $driver_making_leave_start_date = $request->input('driver_making_leave_start_date');
        $driver_making_leave_end_date = $request->input('driver_making_leave_end_date');
        $driver_making_leave_count_date = $request->input('driver_making_leave_count_date');
        $driver_leave_approve_date_sent_approve = $request->input('driver_leave_approve_date_sent_approve');
        $driver_making_leave_type = $request->input('driver_making_leave_type');
        $driver_making_leave_status = $request->input('driver_making_leave_status');
        if($driver_id){
            $result->where('driver_making_leave.driver_id', $driver_id);
        }
        if($leave_type_id){
            $result->where('driver_making_leave.leave_type_id', $leave_type_id);
        }
        if($driver_leave_line_branch_id){
            $result->where('driver_making_leave.driver_leave_line_branch_id', $driver_leave_line_branch_id);
        }
        if($driver_making_leave_name){
            $result->where('driver_making_leave.driver_making_leave_name', 'like', '%'.$driver_making_leave_name.'%');
        }
        if($driver_making_leave_start_date && $driver_making_leave_end_date){
            $result->whereBetween('driver_making_leave.driver_making_leave_start_date', [$driver_making_leave_start_date.' 00:00:00', $driver_making_leave_start_date.' 23:59:59']);
            $result->whereBetween('driver_making_leave.driver_making_leave_end_date', [$driver_making_leave_end_date.' 00:00:00', $driver_making_leave_end_date.' 23:59:59']);
        }elseif($driver_making_leave_start_date && !$driver_making_leave_end_date){
            $result->whereBetween('driver_making_leave.driver_making_leave_start_date', [$driver_making_leave_start_date.' 00:00:00', $driver_making_leave_start_date.' 23:59:59']);
        }elseif(!$driver_making_leave_start_date && $driver_making_leave_end_date){
            $result->whereBetween('driver_making_leave.driver_making_leave_end_date', [$driver_making_leave_end_date.' 00:00:00', $driver_making_leave_end_date.' 23:59:59']);
        }
        if($driver_making_leave_count_date){
            $result->where('driver_making_leave.driver_making_leave_count_date', $driver_making_leave_count_date);
        }
        if($driver_leave_approve_date_sent_approve){
            $result->whereBetween('driver_leave_approve.driver_leave_approve_date_sent_approve', [$driver_leave_approve_date_sent_approve.' 00:00:00', $driver_leave_approve_date_sent_approve.' 23:59:59']);
        }
        if($driver_making_leave_type){
            $result->where('driver_making_leave.driver_making_leave_type', $driver_making_leave_type);
        }
        if($driver_making_leave_status || $driver_making_leave_status == '0'){
            $result->where('driver_making_leave.driver_making_leave_status', $driver_making_leave_status);
        }
        return Datatables::of($result)
        ->addColumn('driver_name' , function($res){
            return $res->driver_name_th.' '.$res->driver_lastname_th;
        })
        ->addColumn('type_name' , function($res){
            return $res->driver_making_leave_type ? $res->Type[$res->driver_making_leave_type] : '';
        })
        ->addColumn('status_name' , function($res){
            return ($res->driver_leave_approve_status || $res->driver_leave_approve_status == '0') ? $res->Status[$res->driver_leave_approve_status] : '';
        })
        ->editColumn('driver_making_leave_start_date' , function($res){
            return $res->driver_making_leave_start_date ? date("d/m/Y", strtotime($res->driver_making_leave_start_date)) : '';
        })
        ->editColumn('driver_making_leave_end_date' , function($res){
            return $res->driver_making_leave_end_date ? date("d/m/Y", strtotime($res->driver_making_leave_end_date)) : '';
        })
        ->editColumn('driver_leave_approve_date_sent_approve' , function($res){
            return $res->driver_leave_approve_date_sent_approve ? date("d/m/Y", strtotime($res->driver_leave_approve_date_sent_approve)) : '';
        })
        ->addColumn('line_approve' , function($res){
            $str = '<button type="button" class="btn btn-success btn-md btn-line-approve" data-id="'.$res->driver_leave_approve_id.'">Deputy Managing Director - Operation</button>';
            return $str;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('DriverMakingLeave' , '1');
            $insert = Helper::CheckPermissionMenu('DriverMakingLeave' , '2');
            $update = Helper::CheckPermissionMenu('DriverMakingLeave' , '3');
            $delete = Helper::CheckPermissionMenu('DriverMakingLeave' , '4');
            $btnApprove = '<button type="button" class="btn btn-primary btn-md btn-approve" data-id="'.$res->driver_leave_approve_id.'">Approve</button>';
            $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_making_leave_id.'">View</button>';
            $str = '';
            if($view){
                $str.=' '.$btnView;
            }
            $str.=' '.$btnApprove;
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['line_approve', 'action'])
        ->make(true);
    }
}
