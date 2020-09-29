<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverMakingLeave;
use App\Driver;
use App\LeaveType;
use App\DriverLeaveLineBranch;
use App\DriverLeaveLineApprove;
use App\DriverLeaveApprove;

class DriverMakingLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','DriverMakingLeave')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['Drivers'] = Driver::where('driver_status', 1)->get();
          $data['LeaveTypes'] = LeaveType::where('leave_type_status', 1)->get();
          $data['DriverLeaveLineBranchs'] = DriverLeaveLineBranch::where('driver_leave_line_branch_status', 1)->get();
          if(Helper::CheckPermissionMenu('DriverMakingLeave' , '1')){
              return view('admin.DriverMakingLeave.driver_making_leave', $data);
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
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required',
            'driver_leave_line_branch_id' => 'required',
            'leave_type_id' => 'required',
            'driver_making_leave_type' => 'required',
            'driver_making_leave_start_date' => 'required',
            'driver_making_leave_end_date' => 'required',
            'driver_making_leave_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $chack_approve = DriverLeaveLineApprove::select('driver_leave_line_approve_lv', 'driver_leave_line_branch_id')
                    ->where('driver_leave_line_branch_id', $input_all['driver_leave_line_branch_id'])
                    ->where('driver_leave_line_approve_status', 1)
                    ->groupBy('driver_leave_line_approve_lv', 'driver_leave_line_branch_id')
                    ->orderBy('driver_leave_line_approve_lv')
                    ->get();
                if(count($chack_approve) > 0){
                    $DriverMakingLeave = new DriverMakingLeave;
                    foreach($input_all as $key=>$val){
                        $DriverMakingLeave->{$key} = $val;
                    }
                    $DriverMakingLeave->driver_making_leave_status = 0;
                    $DriverMakingLeave->save();
                    foreach($chack_approve as $key=>$val){
                        $DriverLeaveApprove = new DriverLeaveApprove;
                        $DriverLeaveApprove->driver_leave_line_branch_id = $val->driver_leave_line_branch_id;
                        $DriverLeaveApprove->driver_making_leave_id = $DriverMakingLeave->driver_making_leave_id;
                        $DriverLeaveApprove->driver_leave_approve_lv = $val->driver_leave_line_approve_lv;
                        if($key == 0){
                            $DriverLeaveApprove->driver_leave_approve_status = 1;
                            $DriverLeaveApprove->driver_leave_approve_date_sent_approve = date('Y-m-d H:i:s');
                        }else{
                            $DriverLeaveApprove->driver_leave_approve_status = 0;
                        }
                        $DriverLeaveApprove->save();
                    }
                    \DB::commit();
                    $return['status'] = 1;
                    $return['content'] = 'Success';
                }else{
                    $return['status'] = 0;
                    $return['content'] = 'ไม่พบสาขาที่สามารถอนุมัติได้';
                }
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
        $content = DriverMakingLeave::with('Driver', 'DriverLeaveLineBranch', 'LeaveType', 'DriverLeaveApprove.DriverLeaveLineApprove.Position', 'DriverLeaveApprove.AdminUser')->find($id);
        $content['driver_making_leave_type_name']  = $content->driver_making_leave_type ? $content->Type[$content->driver_making_leave_type] : '';
        $content['driver_making_leave_status_name']  = ($content->driver_making_leave_status || $content->driver_making_leave_status == 0) ? $content->Status[$content->driver_making_leave_status] : '';
        $content['driver_making_leave_start_date']  = $content->driver_making_leave_start_date ? date('Y-m-d', strtotime($content->driver_making_leave_start_date)) : '';
        $content['driver_making_leave_end_date']  = $content->driver_making_leave_end_date ? date('Y-m-d', strtotime($content->driver_making_leave_end_date)) : '';
        $content['format_driver_making_leave_start_date']  = $content->driver_making_leave_start_date ? date('d/m/Y', strtotime($content->driver_making_leave_start_date)) : '';
        $content['format_driver_making_leave_end_date']  = $content->driver_making_leave_end_date ? date('d/m/Y', strtotime($content->driver_making_leave_end_date)) : '';
        $content['format_making_leave_date_approve']  = $content->making_leave_date_approve ? date('d/m/Y', strtotime($content->making_leave_date_approve)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get DriverMakingLeave';
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
            'driver_id' => 'required',
            'driver_leave_line_branch_id' => 'required',
            'leave_type_id' => 'required',
            'driver_making_leave_type' => 'required',
            'driver_making_leave_start_date' => 'required',
            'driver_making_leave_end_date' => 'required',
            'driver_making_leave_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverMakingLeave = DriverMakingLeave::find($id);
                foreach($input_all as $key=>$val){
                    $DriverMakingLeave->{$key} = $val;
                }
                $DriverMakingLeave->driver_making_leave_status = 0;
                $DriverMakingLeave->save();

                $DriverLeaveApproves = DriverLeaveApprove::where('driver_making_leave_id', $DriverMakingLeave->driver_making_leave_id)->orderBy('driver_leave_approve_lv', 'asc')->get();
                foreach($DriverLeaveApproves as $key=>$val){
                    $DriverLeaveApprove = DriverLeaveApprove::find($val->driver_leave_approve_id);
                    if($key == 0){
                        $DriverLeaveApprove->driver_leave_approve_status = 1;
                        $DriverLeaveApprove->driver_leave_approve_date_sent_approve = date('Y-m-d H:i:s');
                        $DriverLeaveApprove->driver_leave_approve_details = null;
                        $DriverLeaveApprove->admin_id = null;
                    }else{
                        $DriverLeaveApprove->driver_leave_approve_status = 0;
                        $DriverLeaveApprove->driver_leave_approve_date_sent_approve = null;                        
                        $DriverLeaveApprove->driver_leave_approve_details = null;
                        $DriverLeaveApprove->admin_id = null;
                    }
                    $DriverLeaveApprove->save();
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
      $result = DriverMakingLeave::select(
          'driver_making_leave.*'
          ,'driver.driver_name_th'
          ,'driver.driver_lastname_th'
          ,'leave_type.leave_type_name'
          ,'driver_leave_line_branch.driver_leave_line_branch_name'
      )
      ->leftjoin('driver', 'driver.driver_id', 'driver_making_leave.driver_id')
      ->leftjoin('leave_type', 'leave_type.leave_type_id', 'driver_making_leave.leave_type_id')
      ->leftjoin('driver_leave_line_branch', 'driver_leave_line_branch.driver_leave_line_branch_id', 'driver_making_leave.driver_leave_line_branch_id');

      $driver_id = $request->input('driver_id');
      $leave_type_id = $request->input('leave_type_id');
      $driver_leave_line_branch_id = $request->input('driver_leave_line_branch_id');
      $driver_making_leave_name = $request->input('driver_making_leave_name');
      $driver_making_leave_start_date = $request->input('driver_making_leave_start_date');
      $driver_making_leave_end_date = $request->input('driver_making_leave_end_date');
      $driver_making_leave_count_date = $request->input('driver_making_leave_count_date');
      $driver_making_leave_date_approve = $request->input('driver_making_leave_date_approve');
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
      if($driver_making_leave_date_approve){
          $result->where('driver_making_leave.driver_making_leave_date_approve', $driver_making_leave_date_approve);
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
            return ($res->driver_making_leave_status || $res->driver_making_leave_status == 0) ? $res->Status[$res->driver_making_leave_status] : '';
        })
        ->editColumn('driver_making_leave_start_date' , function($res){
            return $res->driver_making_leave_start_date ? date("d/m/Y", strtotime($res->driver_making_leave_start_date)) : '';
        })
        ->editColumn('driver_making_leave_end_date' , function($res){
            return $res->driver_making_leave_end_date ? date("d/m/Y", strtotime($res->driver_making_leave_end_date)) : '';
        })
        ->editColumn('driver_making_leave_date_approve' , function($res){
            return $res->driver_making_leave_date_approve ? date("d/m/Y", strtotime($res->driver_making_leave_date_approve)) : '';
        })
        ->addColumn('line_approve' , function($res){
            $str = '<button type="button" class="btn btn-success btn-md btn-line-approve" data-id="'.$res->driver_making_leave_id.'">Deputy Managing Director - Operation</button>';
            return $str;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('DriverMakingLeave' , '1');
            $insert = Helper::CheckPermissionMenu('DriverMakingLeave' , '2');
            $update = Helper::CheckPermissionMenu('DriverMakingLeave' , '3');
            $delete = Helper::CheckPermissionMenu('DriverMakingLeave' , '4');
            $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_making_leave_id.'">View</button>';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->driver_making_leave_id.'">Edit</button>';
            // $str = '';
            // if($view){
            //     $str.=' '.$btnView;
            // }
            // if($update && $res->driver_making_leave_status == 2){
            //     $str.=' '.$btnEdit;
            // }
            // return $str;
            $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            if ($view) {
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_making_leave_id . '">View</a>';
            }
            if ($update) {
            $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->driver_making_leave_id . '">Edit</a>';
            }
            $str .= '</div>';
            $str .= '</div>';
        
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['line_approve', 'action'])
        ->make(true);
    }
}
