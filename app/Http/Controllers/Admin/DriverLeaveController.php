<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverLeave;
use App\LeaveType;
use App\Driver;

class DriverLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'DriverLeave')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Drivers'] = Driver::whereIn('driver_status', [1,2,3])->get();
        $data['LeaveTypes'] = LeaveType::where('leave_type_status', 1)->get();

        if (Helper::CheckPermissionMenu('DriverLeave', '1')) {
            return view('admin.DriverLeave.driver_leave', $data);
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
        $check_data = DriverLeave::where(['driver_leave_year' => $input_all['driver_leave_year'], 'leave_type_id' => $input_all['leave_type_id'], 'driver_id' => $input_all['driver_id']])->first();
        if($check_data){
            $return['status'] = 0;
            $return['title'] = 'Unsuccess';
            $return['content'] = 'This leave rights is already in use.';
            return $return;
        }
        $validator = Validator::make($request->all(), [
            'leave_type_id' => 'required',
            'driver_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverLeave = new DriverLeave;
                foreach ($input_all as $key => $val) {
                    $DriverLeave->{$key} = $val;
                }
                if (!isset($input_all['driver_leave_status'])) {
                    $DriverLeave->driver_leave_status = 0;
                }
                $DriverLeave->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['driver_leave_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Driver Leave is required";
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
        $content = DriverLeave::with('Driver','LeaveType')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get DriverLeave';
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
        $check_data = DriverLeave::where(['driver_leave_year' => $input_all['driver_leave_year'], 'leave_type_id' => $input_all['leave_type_id'], 'driver_id' => $input_all['driver_id']])->whereNotIn('leave_type_id', $id)->first();
        if($check_data){
            $return['status'] = 0;
            $return['title'] = 'Unsuccess';
            $return['content'] = 'This leave rights is already in use.';
            return $return;
        }
        $validator = Validator::make($request->all(), [
            'leave_type_id' => 'required',
            'driver_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverLeave = DriverLeave::find($id);
                foreach ($input_all as $key => $val) {
                    $DriverLeave->{$key} = $val;
                }
                if (!isset($input_all['driver_leave_status'])) {
                    $DriverLeave->driver_leave_status = 0;
                }
                $DriverLeave->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['driver_leave_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Driver Leave is required";
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
        $result = DriverLeave::select()->with('Driver','LeaveType');

        $driver_id = $request->input('driver_id');
        $leave_type_id = $request->input('leave_type_id');
        $driver_leave_year = $request->input('driver_leave_year');
        $driver_leave_date_define = $request->input('driver_leave_date_define');
        $driver_leave_date_total = $request->input('driver_leave_date_total');

        if ($driver_id) {
            $result->where('driver_id',$driver_id);
        };
        if ($leave_type_id) {
            $result->where('leave_type_id',$leave_type_id);
        };
        if ($driver_leave_year) {
            $result->where('driver_leave_year',$driver_leave_year);
        };
        if ($driver_leave_date_define) {
            $result->where('driver_leave_date_define',$driver_leave_date_define);
        };
        if ($driver_leave_date_total) {
            $result->where('driver_leave_date_total',$driver_leave_date_total);
        };
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->driver_leave_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->driver_leave_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('leave_type_name', function ($res) {
                $str = $res->LeaveType->leave_type_name;
                return $str;
            })
            ->addColumn('driver_name', function ($res) {
                $str = $res->Driver->driver_name_th.' '.$res->Driver->driver_lastname_th;
                return $str;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('DriverLeave', '1');
                $insert = Helper::CheckPermissionMenu('DriverLeave', '2');
                $update = Helper::CheckPermissionMenu('DriverLeave', '3');
                $delete = Helper::CheckPermissionMenu('DriverLeave', '4');
                if ($res->driver_leave_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->driver_leave_id . '" data-style="ios" data-on="On" data-off="Off">';
                $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->driver_leave_id . '">View</button>';
                $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->driver_leave_id . '">Edit</button>';
                $str = '';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                if ($view) {
                    $str .= ' ' . $btnView;
                }
                if ($update) {
                    $str .= ' ' . $btnEdit;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox','leave_type_name','driver_name','action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['driver_leave_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            DriverLeave::where('driver_leave_id', $id)->update($input_all);
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

    public function GetNumberLeave(Request $request, $id)
    {
        $date_now = date('Y-m-d');
        $leave_type_id = $request->input('leave_type_id');

        $LeaveType = LeaveType::find($leave_type_id);
        $Driver = Driver::select('driver_id', 'driver_availlale_date')->find($id);

        $count_month = 0;
        if($Driver->driver_availlale_date){
            $count_month = (int)abs((strtotime($date_now) - strtotime($Driver->driver_availlale_date))/(60*60*24*30));
        }

        if($count_month >= $LeaveType->leave_type_working_time){
            $number_leave = $LeaveType->leave_type_date_define_per_working;
        }else{
            $number_leave = $LeaveType->leave_type_date_define;
        }
        return $number_leave;
    }
}
