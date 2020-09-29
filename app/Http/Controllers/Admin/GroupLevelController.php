<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\GroupLevel;

class GroupLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'GroupLevel')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if (Helper::CheckPermissionMenu('GroupLevel', '1')) {
            return view('admin.GroupLevel.group_level', $data);
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
            'admin_user_group_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $GroupLevel = new GroupLevel;
                foreach ($input_all as $key => $val) {
                    $GroupLevel->{$key} = $val;
                }
                if (!isset($input_all['admin_user_group_status'])) {
                    $GroupLevel->admin_user_group_status = 0;
                }
                $GroupLevel->save();
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
            if (isset($failedRules['admin_user_group_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "GroupLevel Name is required";
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
        $content = GroupLevel::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get GroupLevel';
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
            'admin_user_group_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $GroupLevel = GroupLevel::find($id);
                foreach ($input_all as $key => $val) {
                    $GroupLevel->{$key} = $val;
                }
                if (!isset($input_all['admin_user_group_status'])) {
                    $GroupLevel->admin_user_group_status = 0;
                }
                $GroupLevel->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Sucess';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['admin_user_group_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "GroupLevel Name is required";
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
        $result = GroupLevel::select();
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->admin_user_group_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->admin_user_group_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('code_color', function ($res) {
                $coloe = '#ccc';
                if ($res->admin_user_group_color_code) {
                    $coloe = $res->admin_user_group_color_code;
                }
                return '<span class="badge badge-pillr text-white" style="background-color: ' . $coloe . '">Example</span>';
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('Department', '1');
                $insert = Helper::CheckPermissionMenu('Department', '2');
                $update = Helper::CheckPermissionMenu('Department', '3');
                $delete = Helper::CheckPermissionMenu('Department', '4');
                if ($res->admin_user_group_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->admin_user_group_id . '" data-style="ios" data-on="On" data-off="Off">';

                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->admin_user_group_id . '">View</a>';
                }
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->admin_user_group_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'code_color'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['admin_user_group_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            GroupLevel::where('admin_user_group_id', $id)->update($input_all);
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
