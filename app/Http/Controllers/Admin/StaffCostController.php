<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\StaffCost;
use App\ItemCode;

class StaffCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'StaffCost')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['ItemCodes'] = ItemCode::where('item_code_status', 1)->get();
        if (Helper::CheckPermissionMenu('StaffCost', '1')) {
            return view('admin.StaffCost.staff_expenses', $data);
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
            'staff_expenses_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $StaffCost = new StaffCost;
                foreach ($input_all as $key => $val) {
                    $StaffCost->{$key} = $val;
                }
                if (!isset($input_all['staff_expenses_status'])) {
                    $StaffCost->staff_expenses_status = 0;
                }
                $StaffCost->save();
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
            if (isset($failedRules['staff_expenses_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Staff Cost is required";
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
        $content = StaffCost::with('ItemCode')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get StaffCost';
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
            'staff_expenses_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $StaffCost = StaffCost::find($id);
                foreach ($input_all as $key => $val) {
                    $StaffCost->{$key} = $val;
                }
                if (!isset($input_all['staff_expenses_status'])) {
                    $StaffCost->staff_expenses_status = 0;
                }
                $StaffCost->save();
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
            if (isset($failedRules['staff_expenses_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Staff Cost is required";
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
        $result = StaffCost::select(
            'staff_expenses.*',
            'item_code.item_code_name'
        )
        ->leftjoin('item_code', 'item_code.item_code_id', 'staff_expenses.item_code_id');
        return Datatables::of($result)
        ->addColumn('action', function ($res) {
            $view = Helper::CheckPermissionMenu('StaffCost', '1');
            $insert = Helper::CheckPermissionMenu('StaffCost', '2');
            $update = Helper::CheckPermissionMenu('StaffCost', '3');
            $delete = Helper::CheckPermissionMenu('StaffCost', '4');

            if ($res->staff_expenses_status == 1) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->staff_expenses_id . '" data-style="ios" data-on="On" data-off="Off">';
           $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->staff_expenses_id . '">View</a>';
                }
                if ($update) {
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->staff_expenses_id . '">Edit</a>';
                }
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
            $input_all['staff_expenses_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            StaffCost::where('staff_expenses_id', $id)->update($input_all);
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
