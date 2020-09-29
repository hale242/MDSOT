<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\LeaveType;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'LeaveType')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if (Helper::CheckPermissionMenu('LeaveType', '1')) {
            return view('admin.LeaveType.leave_type', $data);
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
        $validator = Validator::make($request->all(), [
            'leave_type_name' => 'required|unique:leave_type,leave_type_name',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $LeaveType = new LeaveType;
                foreach ($input_all as $key => $val) {
                    $LeaveType->{$key} = $val;
                }
                if (!isset($input_all['leave_type_status'])) {
                    $LeaveType->leave_type_status = 0;
                }
                $LeaveType->save();
                \DB::commit();
                $return['status'] = 1;
                $return['title'] = 'Insert';
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['title'] = 'Insert';
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['leave_type_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Leave Type is required";
            }
            if(isset($failedRules['leave_type_name']['Unique'])) {
                $return['status'] = 2;
                $return['title'] = "This type name is already in use.";
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
        $content = LeaveType::where('leave_type_id', $id)->first();
        $return['status'] = 1;
        $return['title'] = 'Get LeaveType';
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
        $check_leave_type_name = LeaveType::where('leave_type_name', $input_all['leave_type_name'])->whereNotIn('leave_type_id', [$id])->first();
        if($check_leave_type_name){
            $return['status'] = 0;
            $return['title'] = 'Unsuccess';
            $return['content'] = 'This type name is already in use.';
            return $return;
        }
        $validator = Validator::make($request->all(), [
            'leave_type_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $LeaveType = LeaveType::find($id);
                foreach ($input_all as $key => $val) {
                    $LeaveType->{$key} = $val;
                }
                if (!isset($input_all['leave_type_status'])) {
                    $LeaveType->leave_type_status = 0;
                }
                $LeaveType->save();
                \DB::commit();
                $return['title'] = 'Update';
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['title'] = 'Update';
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['leave_type_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Leave Type is required";
            }
        }
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
        $result = LeaveType::select();
        $leave_type_name = $request->input('leave_type_name');
        $leave_type_date_define = $request->input('leave_type_date_define');
        $leave_type_deduct_status = $request->input('leave_type_deduct_status');
        if($leave_type_name){
            $result->where("leave_type_name", "like", "%{$leave_type_name}%");
        }
        if($leave_type_date_define){
            $result->where("leave_type_date_define",$leave_type_date_define);
        }
        if($leave_type_deduct_status || $leave_type_deduct_status == '0'){
            $result->where("leave_type_deduct_status", $leave_type_deduct_status);
        }
        return Datatables::of($result)
            ->addColumn('leave_type_deduct_status', function ($res) {
                $leave_type = '';
                if($res->leave_type_deduct_status == 0){
                    $leave_type = 'No';
                }elseif($res->leave_type_deduct_status == 1){
                    $leave_type = 'Yes';
                }
                return $leave_type;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('LeaveType', '1');
                $insert = Helper::CheckPermissionMenu('LeaveType', '2');
                $update = Helper::CheckPermissionMenu('LeaveType', '3');
                $delete = Helper::CheckPermissionMenu('LeaveType', '4');

                if ($res->leave_type_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->leave_type_id . '" data-style="ios" data-on="On" data-off="Off">';
               $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->leave_type_id . '">View</a>';
                }
                if ($update) {
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->leave_type_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['leave_type_deduct_status', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['leave_type_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            LeaveType::where('leave_type_id', $id)->update($input_all);
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
