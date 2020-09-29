<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverLeaveLineBranch;
use App\Position;

class DriverLeaveLineBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','DriverLeaveLineBranch')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['Positions'] = Position::where('position_status', 1)->get();
          if(Helper::CheckPermissionMenu('DriverLeaveLineBranch' , '1')){
              return view('admin.DriverLeaveLineBranch.driver_leave_line_branch', $data);
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
            'driver_leave_line_branch_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverLeaveLineBranch = new DriverLeaveLineBranch;
                foreach($input_all as $key=>$val){
                    $DriverLeaveLineBranch->{$key} = $val;
                }
                if(!isset($input_all['driver_leave_line_branch_status'])){
                    $DriverLeaveLineBranch->driver_leave_line_branch_status = 0;
                }
                $DriverLeaveLineBranch->save();
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
            if(isset($failedRules['driver_leave_line_branch_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name Prefix is required";
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
        $content = DriverLeaveLineBranch::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get DriverLeaveLineBranch';
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
            'driver_leave_line_branch_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverLeaveLineBranch = DriverLeaveLineBranch::find($id);
                foreach($input_all as $key=>$val){
                    $DriverLeaveLineBranch->{$key} = $val;
                }
                if(!isset($input_all['driver_leave_line_branch_status'])){
                    $DriverLeaveLineBranch->driver_leave_line_branch_status = 0;
                }
                $DriverLeaveLineBranch->save();
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
            if(isset($failedRules['driver_leave_line_branch_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name Prefix is required";
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
      $result = DriverLeaveLineBranch::select();
      $driver_leave_line_branch_name = $request->input('driver_leave_line_branch_name');
      $driver_leave_line_branch_detail = $request->input('driver_leave_line_branch_detail');
      if($driver_leave_line_branch_name){
          $result->where('driver_leave_line_branch_name', 'like', '%'.$driver_leave_line_branch_name.'%');
      };
      if($driver_leave_line_branch_detail){
          $result->where('driver_leave_line_branch_details', 'like', '%'.$driver_leave_line_branch_detail.'%');
      };
      return Datatables::of($result)
        ->addColumn('checkbox' , function($res){
            $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-'.$res->driver_leave_line_branch_id.'">
                        <label class="custom-control-label" for="checkbox-item-'.$res->driver_leave_line_branch_id.'"></label>
                    </div>';
            return $str;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('DriverLeaveLineBranch' , '1');
            $insert = Helper::CheckPermissionMenu('DriverLeaveLineBranch' , '2');
            $update = Helper::CheckPermissionMenu('DriverLeaveLineBranch' , '3');
            $delete = Helper::CheckPermissionMenu('DriverLeaveLineBranch' , '4');
            if($res->driver_leave_line_branch_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-branch" '.$checked.' data-id="'.$res->driver_leave_line_branch_id.'" data-style="ios" data-on="On" data-off="Off">';
            // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_leave_line_branch_id.'">View</button>';
            // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->driver_leave_line_branch_id.'">Edit</button>';
            // $btnLineApprove = '<button type="button" class="btn btn-primary btn-md btn-line-approve" data-id="'.$res->driver_leave_line_branch_id.'" data-branch-name="'.$res->driver_leave_line_branch_name.'">Line approve</button>';
            // $str = '';
            // if($update){
            //     $str.=' '.$btnStatus;
            // }
            // if($view){
            //     $str.=' '.$btnView;
            // }
            // if($update){
            //     $str.=' '.$btnEdit;
            // }
            // $str.=' '.$btnLineApprove;
            // return $str;
            $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            if ($view) {
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_leave_line_branch_id . '">View</a>';
            }
            if ($update) {
            $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->driver_leave_line_branch_id . '">Edit</a>';
            }
            $str .= '<a class="dropdown-item btn-line-approve" href="javascript:void(0)" data-toggle="modal" data-target="#LineApproveModal" data-id="'.$res->driver_leave_line_branch_id.'" data-branch-name="'.$res->driver_leave_line_branch_name.'">Line approve</a>';

            $str .= '</div>';
            $str .= '</div>';
            if ($update) {
                $str .= ' ' . $btnStatus;
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
            $input_all['driver_leave_line_branch_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            DriverLeaveLineBranch::where('driver_leave_line_branch_id', $id)->update($input_all);
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
