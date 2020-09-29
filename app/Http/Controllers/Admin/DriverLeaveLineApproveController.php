<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverLeaveLineApprove;

class DriverLeaveLineApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','DriverLeaveLineApprove')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          if (Helper::CheckPermissionMenu('DriverLeaveLineApprove', '1')) {
            return view('admin.DriverLeaveLineApprove.driver_bank_type', $data);
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
        $input_all = $request->all();
        $check = DriverLeaveLineApprove::where('position_id', $input_all['position_id'])->where('driver_leave_line_approve_lv', $input_all['driver_leave_line_approve_lv'])->count();
        if($check > 0){
            $return['status'] = 2;
            $return['content'] = "Position is already in use.";
        }else{
            $validator = Validator::make($request->all(), [
              'position_id' => 'required',
              'driver_leave_line_approve_name' => 'required',
              'driver_leave_line_approve_lv' => 'required',
            ]);
            if (!$validator->fails()) {
              \DB::beginTransaction();
              try {
                $DriverLeaveLineApprove = new DriverLeaveLineApprove;
                foreach($input_all as $key=>$val){
                  $DriverLeaveLineApprove->{$key} = $val;
                }
                if(!isset($input_all['driver_leave_line_approve_status'])){
                  $DriverLeaveLineApprove->driver_leave_line_approve_status = 0;
                }
                $DriverLeaveLineApprove->save();
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
              if(isset($failedRules['position_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Position is required";
              }
              if(isset($failedRules['driver_leave_line_approve_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Approve name is required";
              }
              if(isset($failedRules['driver_leave_line_approve_lv']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Approve level is required";
              }
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
        $content = DriverLeaveLineApprove::where('driver_leave_line_approve_id', $id)->first();
        $return['status'] = 1;
        $return['title'] = 'Get DriverLeaveLineApprove';
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
      $result = DriverLeaveLineApprove::select(
          'driver_leave_line_approve.*'
          ,'position.position_name'
      )
      ->leftjoin('position', 'position.position_id', 'driver_leave_line_approve.position_id');
      $driver_leave_line_branch_id = $request->input('driver_leave_line_branch_id');
      if($driver_leave_line_branch_id){
          $result->where('driver_leave_line_branch_id', $driver_leave_line_branch_id);
      }
      return Datatables::of($result)
        ->addColumn('checkbox' , function($res){
            $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-'.$res->driver_leave_line_approve_id.'">
                        <label class="custom-control-label" for="checkbox-item-'.$res->driver_leave_line_approve_id.'"></label>
                    </div>';
            return $str;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('DriverLeaveLineBranch', '1');
            $insert = Helper::CheckPermissionMenu('DriverLeaveLineBranch', '2');
            $update = Helper::CheckPermissionMenu('DriverLeaveLineBranch', '3');
            $delete = Helper::CheckPermissionMenu('DriverLeaveLineBranch', '4');
            if($res->driver_leave_line_approve_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-line-approve" '.$checked.' data-id="'.$res->driver_leave_line_approve_id.'" data-style="ios" data-on="On" data-off="Off">';
            $str = '';
            if ($update) {
                $str.=' '.$btnStatus;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox', 'action'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['driver_leave_line_approve_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            DriverLeaveLineApprove::where('driver_leave_line_approve_id', $id)->update($input_all);
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
