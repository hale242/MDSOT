<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\PickupEquipment;
use App\WorkingEquipment;
use App\Driver;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Equipment')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['WorkingEquipments'] = WorkingEquipment::where('working_equipment_status', 1)->get();
        $data['Drivers'] = Driver::whereIn('driver_status', ['1', '2', '3'])->get();

        $data['Page'] = 'D';


        if (Helper::CheckPermissionMenu('Equipment', '1')) {
            return view('admin.Equipment.equipment', $data);
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
            'working_equipment_id' => 'required',
            'pickup_equipment_count' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PickupEquipment = new PickupEquipment;
                foreach ($input_all as $key => $val) {
                    $PickupEquipment->{$key} = $val;
                }
                if (!isset($input_all['pickup_equipment_status'])) {
                    $PickupEquipment->pickup_equipment_status = 0;
                }
                $PickupEquipment->save();
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
            if (isset($failedRules['pickup_equipment_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Working Equipment is required";
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
        $content = PickupEquipment::with('Driver')->find($id);
        $content['format_pickup_equipment_date_approve'] = $content->pickup_equipment_date_approve ? date("Y-m-d", strtotime($content->pickup_equipment_date_approve)) : '';

        $return['status'] = 1;
        $return['title'] = 'Get Pickup Equipment';
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
            'working_equipment_id' => 'required',
            'pickup_equipment_count' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PickupEquipment = PickupEquipment::find($id);
                foreach ($input_all as $key => $val) {
                    $PickupEquipment->{$key} = $val;
                }
                if (!isset($input_all['pickup_equipment_status'])) {
                    $PickupEquipment->pickup_equipment_status = 0;
                }
                $PickupEquipment->save();
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
            if (isset($failedRules['pickup_equipment_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Working Equipment is required";
            }
        }
        $return['title'] = 'Insert';
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
        $result = PickupEquipment::select(
            'pickup_equipment.pickup_equipment_id',
            'pickup_equipment.driver_id',
            'pickup_equipment.pickup_equipment_count',
            'pickup_equipment.pickup_equipment_date_approve',
            'pickup_equipment.pickup_equipment_comment',
            'pickup_equipment.pickup_equipment_status',
            'pickup_equipment.pickup_equipment_site',
            'pickup_equipment.created_at',
            'working_equipment.working_equipment_name',
            'admin_user.first_name',
            'admin_user.last_name'
        )
            ->leftjoin('working_equipment', 'working_equipment.working_equipment_id', 'pickup_equipment.working_equipment_id')
            ->leftjoin('admin_user', 'admin_user.admin_id', 'pickup_equipment.admin_id')
            ->with('Driver');

        $page = $request->input('page');
        $driver_id = $request->input('driver_id');
        $working_equipment_id = $request->input('working_equipment_id');
        $withdrawal_start_date = $request->input('withdrawal_start_date');
        $withdrawal_end_date = $request->input('withdrawal_end_date');
        $equipment_date_start_approve = $request->input('equipment_date_start_approve');
        $equipment_date_end_approve = $request->input('equipment_date_end_approve');
        $pickup_equipment_comment = $request->input('pickup_equipment_comment');


        if ($driver_id) {
            $result->where('pickup_equipment.driver_id', $driver_id);
        }

        if ($working_equipment_id) {
            $result->where('pickup_equipment.working_equipment_id', $working_equipment_id);
        }
        if ($withdrawal_start_date && $withdrawal_end_date) {
            $result->whereBetween('pickup_equipment.created_at', [$withdrawal_start_date . ' 00:00:00', $withdrawal_end_date . ' 23:59:59']);
        } elseif ($withdrawal_start_date && !$withdrawal_end_date) {
            $result->where('pickup_equipment.created_at', '>=', $withdrawal_start_date . '00:00:00');
        } elseif (!$withdrawal_start_date && $withdrawal_end_date) {
            $result->where('pickup_equipment.created_at', '<=', $withdrawal_end_date . ' 23:59:59');
        }
        if ($equipment_date_start_approve && $equipment_date_end_approve) {
            $result->whereBetween('pickup_equipment.created_at', [$equipment_date_start_approve . ' 00:00:00', $equipment_date_end_approve . ' 23:59:59']);
        } elseif ($equipment_date_start_approve && !$equipment_date_end_approve) {
            $result->where('pickup_equipment.created_at', '>=', $equipment_date_start_approve . '00:00:00');
        } elseif (!$equipment_date_start_approve && $equipment_date_end_approve) {
            $result->where('pickup_equipment.created_at', '<=', $equipment_date_end_approve . ' 23:59:59');
        }
        if ($pickup_equipment_comment) {
            $result->where('pickup_equipment.pickup_equipment_comment', 'like', '%' . $pickup_equipment_comment . '%');
        }
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->pickup_equipment_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->pickup_equipment_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('driver_name', function ($res) {
                return $res->driver->driver_name_th . ' ' . $res->driver->driver_lastname_th;
            })
            ->addColumn('admin_name', function ($res) {
                return $res->first_name . ' ' . $res->last_name;
            })
            ->addColumn('withdrawal_date', function ($res) {
                return $res->created_at ? date("d/m/Y", strtotime($res->created_at)) : '';
            })
            ->addColumn('date', function ($res) {
                return $res->pickup_equipment_date_approve ? date("d/m/Y", strtotime($res->pickup_equipment_date_approve)) : '';
            })
            ->addColumn('action', function ($res) use ($page) {
                $view = Helper::CheckPermissionMenu('Equipment', '1');
                $insert = Helper::CheckPermissionMenu('Equipment', '2');
                $update = Helper::CheckPermissionMenu('Equipment', '3');
                $delete = Helper::CheckPermissionMenu('Equipment', '4');
                if ($res->pickup_equipment_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $str = ' ';

                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->driver->driver_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->pickup_equipment_id . '">Edit</button>';
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-pickup-quipment" ' . $checked . ' data-id="' . $res->pickup_equipment_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $str .= ' ' . $btnStatus;

                // if ($view && $page) {
                //     $str .= ' ' . $btnView;
                // }
                // if ($update && $page) {
                //     $str .= ' ' . $btnEdit;
                // }
                // return $str;
                if ($page) {
                    $str = '<div class="bootstrap-table">';
                    $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                    $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                    $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                    if ($view) {
                        $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver->driver_id . '">View</a>';
                    }
                    if ($update) {
                        $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->pickup_equipment_id . '">Edit</a>';
                    }
                    $str .= '</div>';
                    $str .= '</div>';
                }

                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'driver_name', 'admin_name', 'action', 'date', 'withdrawal_date'])
            ->make(true);
    }
    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $PickupEquipment = PickupEquipment::find($id);
            $PickupEquipment->pickup_equipment_status = $request->input('status');
            $PickupEquipment->save();
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
