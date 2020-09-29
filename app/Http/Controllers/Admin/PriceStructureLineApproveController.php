<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Position;
use App\PriceStructureLineApprove;

class PriceStructureLineApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'PriceStructureLineApprove')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Positions'] = Position::where('position_status', 1)->get();
        if (Helper::CheckPermissionMenu('PriceStructureLineApprove', '1')) {
            return view('admin.PriceStructureLineApprove.price_structure_line_approve', $data);
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
            'position_id' => 'required',
            'price_structure_line_approve_name' => 'required',
            'price_structure_line_approve_lv' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PriceStructureLineApprove = new PriceStructureLineApprove;
                foreach ($input_all as $key => $val) {
                    $PriceStructureLineApprove->{$key} = $val;
                }
                if (!isset($input_all['price_structure_line_approve_status'])) {
                    $PriceStructureLineApprove->price_structure_line_approve_status = 0;
                }
                $PriceStructureLineApprove->save();
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
            if (isset($failedRules['position_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Position is required";
            }
            if (isset($failedRules['price_structure_line_approve_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Approve name is required";
            }
            if (isset($failedRules['price_structure_line_approve_lv']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Approve level is required";
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
        $content = PriceStructureLineApprove::with('Position')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get PriceStructureLineApprove';
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
            'position_id' => 'required',
            'price_structure_line_approve_name' => 'required',
            'price_structure_line_approve_lv' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PriceStructureLineApprove = PriceStructureLineApprove::find($id);
                foreach ($input_all as $key => $val) {
                    $PriceStructureLineApprove->{$key} = $val;
                }
                if (!isset($input_all['price_structure_line_approve_status'])) {
                    $PriceStructureLineApprove->price_structure_line_approve_status = 0;
                }
                $PriceStructureLineApprove->save();
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
            if (isset($failedRules['position_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Position is required";
            }
            if (isset($failedRules['price_structure_line_approve_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Approve name is required";
            }
            if (isset($failedRules['price_structure_line_approve_lv']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Approve level is required";
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
        $result = PriceStructureLineApprove::select(
            'price_structure_line_approve.*',
            'position.position_name'
        )
            ->leftjoin('position', 'position.position_id', 'price_structure_line_approve.position_id');
        $position_id = $request->input('position_id');
        $price_structure_line_approve_name = $request->input('price_structure_line_approve_name');
        $price_structure_line_approve_lv = $request->input('price_structure_line_approve_lv');
        if ($position_id) {
            $result->where('price_structure_line_approve.position_id', $position_id);
        }
        if ($price_structure_line_approve_name) {
            $result->where('price_structure_line_approve_name', 'like', '%' . $price_structure_line_approve_name . '%');
        }
        if ($price_structure_line_approve_lv) {
            $result->where('price_structure_line_approve_lv', $price_structure_line_approve_lv);
        }
        return Datatables::of($result)
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('PriceStructureLineApprove', '1');
                $insert = Helper::CheckPermissionMenu('PriceStructureLineApprove', '2');
                $update = Helper::CheckPermissionMenu('PriceStructureLineApprove', '3');
                $delete = Helper::CheckPermissionMenu('PriceStructureLineApprove', '4');
                if ($res->price_structure_line_approve_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->price_structure_line_approve_id . '" data-style="ios" data-on="On" data-off="Off">';
                
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->price_structure_line_approve_id . '">View</a>';
                }
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->price_structure_line_approve_id . '">Edit</a>';
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
            $input_all['price_structure_line_approve_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            PriceStructureLineApprove::where('price_structure_line_approve_id', $id)->update($input_all);
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
