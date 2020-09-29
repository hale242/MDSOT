<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\AdminUser;
use App\SaleTeamSubHasAdminUser;
use App\Helper;
use App\MenuSystem;
use App\SaleManager;
use App\SaleArea;

class SaleManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'SaleManager')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['SaleTeamSubHasAdminUsers'] = SaleTeamSubHasAdminUser::get();

        if (Helper::CheckPermissionMenu('SaleManager', '1')) {
            return view('admin.SaleManager.sale_team_main', $data);
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
        if (isset($input_all['admin_id'])) {
            $admin_id = $input_all['admin_id'];
            unset($input_all['admin_id']);
        }
        $validator = Validator::make($request->all(), [
            'sale_team_main_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $SaleManager = new SaleManager;
                foreach ($input_all as $key => $val) {
                    $SaleManager->{$key} = $val;
                }
                if (!isset($input_all['sale_team_main_status'])) {
                    $SaleManager->sale_team_main_status = 0;
                }
                $SaleManager->save();
                if (isset($admin_id) && $admin_id) {
                    foreach ($admin_id as $id) {
                        $SaleTeamSubHasAdminUser = new SaleTeamSubHasAdminUser;
                        $SaleTeamSubHasAdminUser->admin_id = $id;
                        $SaleTeamSubHasAdminUser->sale_team_main_id = $SaleManager->sale_team_main_id;
                        // $SaleTeamSubHasAdminUser->sale_team_sub_id = null;
                        $SaleTeamSubHasAdminUser->sale_team_sub_has_admin_user_status = 2;
                        $SaleTeamSubHasAdminUser->save();
                    }
                }

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
            if (isset($failedRules['sale_team_main_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Sale Team is required";
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

        $content = SaleManager::with('SaleTeamSubHasAdminUser', 'SaleTeamSubHasAdminUser.AdminUser')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get SaleManager';
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
        if (isset($input_all['admin_id'])) {
            $admin_id = $input_all['admin_id'];
            unset($input_all['admin_id']);
        }

        $validator = Validator::make($request->all(), [
            'sale_team_main_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $SaleManager = SaleManager::find($id);
                foreach ($input_all as $key => $val) {
                    $SaleManager->{$key} = $val;
                }
                if (!isset($input_all['sale_team_main_status'])) {
                    $SaleManager->sale_team_main_status = 0;
                }
                $SaleManager->save();

                // return $id;
                if (isset($admin_id) && $admin_id) {
                    SaleTeamSubHasAdminUser::whereNotIn('admin_id', $admin_id)->where('sale_team_main_id', $id)->delete();
                    foreach ($admin_id as $key => $val) {
                        $SaleTeamSubHasAdminUser = SaleTeamSubHasAdminUser::where('admin_id', $val)->where('sale_team_main_id', $id)->first();
                        if (!$SaleTeamSubHasAdminUser) {
                            $SaleTeamSubHasAdminUser = new SaleTeamSubHasAdminUser;
                        }
                        $SaleTeamSubHasAdminUser->admin_id = $val;
                        $SaleTeamSubHasAdminUser->sale_team_main_id = $id;
                        $SaleTeamSubHasAdminUser->sale_team_sub_has_admin_user_status = 2;
                        $SaleTeamSubHasAdminUser->save();
                    }
                } else {
                    SaleTeamSubHasAdminUser::where('sale_team_main_id', $id)->delete();
                }
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
            if (isset($failedRules['sale_team_main_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Sale Team is required";
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
        $result = SaleManager::select(
            'sale_team_main.*'
        )
            ->with('SaleTeamSubHasAdminUser.AdminUser');
        $sale_team_main_name = $request->input('sale_team_main_name');
        $manager_name = $request->input('manager_name');
        $sale_name = $request->input('sale_name');

        if ($sale_team_main_name) {
            $result->where('sale_team_main_name', 'like', '%' . $sale_team_main_name . '%');
        }

        if ($manager_name) {
            $data_user = AdminUser::select('admin_id')->where('first_name', 'like', '%' . $manager_name . '%')->get();

            $admin_id = [];
            foreach ($data_user as $val) {
                $admin_id[] = $val->admin_id;
            }

            $admin_id = array_unique($admin_id);

            $result->leftjoin('sale_team_sub', 'sale_team_sub.sale_team_main_id', 'sale_team_main.sale_team_main_id');
            $result->leftjoin('sale_team_sub_has_admin_user', 'sale_team_sub_has_admin_user.sale_team_sub_id', 'sale_team_sub.sale_team_sub_id');
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status', '2');

            $result->whereIn('admin_id', $admin_id);
        }
        if ($sale_name) {
            $data_user = AdminUser::select('admin_id')->where('first_name', 'like', '%' . $sale_name . '%')->get();

            $admin_id = [];
            foreach ($data_user as $val) {
                $admin_id[] = $val->admin_id;
            }

            $admin_id = array_unique($admin_id);

            $result->leftjoin('sale_team_sub', 'sale_team_sub.sale_team_main_id', 'sale_team_main.sale_team_main_id');
            $result->leftjoin('sale_team_sub_has_admin_user', 'sale_team_sub_has_admin_user.sale_team_sub_id', 'sale_team_sub.sale_team_sub_id');
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status', '1');

            $result->where('admin_id', $admin_id);
        }
        // $sale = $request->input('sale');
        // if ($sale) {
        //     $sale->where('admin_id', 'like', '%' . $sale . '%');
        // }
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->sale_team_main_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->sale_team_main_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('manager', function ($res) {
                $html = '';
                foreach ($res->SaleTeamSubHasAdminUser as $val) {
                    if ($val->sale_team_sub_has_admin_user_status == 2 && $val->sale_team_sub_id == null) {
                        foreach ($val->AdminUser  as $val2) {
                            $html .= '<span class="badge badge-pill text-white" style="background-color: #ccc">' . $val2->first_name . ' ' . $val2->last_name . '</span><br>';
                        }
                    }
                }
                return $html;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('SaleManager', '1');
                $insert = Helper::CheckPermissionMenu('SaleManager', '2');
                $update = Helper::CheckPermissionMenu('SaleManager', '3');
                $delete = Helper::CheckPermissionMenu('SaleManager', '4');

                if ($res->sale_team_main_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->sale_team_main_id . '" data-style="ios" data-on="On" data-off="Off">';
             
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-sale-team" href="javascript:void(0)" data-toggle="modal" data-target="#SaleTeamModal" data-id="' . $res->sale_team_main_id . '">Sale team</a>';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->sale_team_main_id . '">View</a>';
                }
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->sale_team_main_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'manager', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['sale_team_main_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            SaleManager::where('sale_team_main_id', $id)->update($input_all);
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

    public function ChangeStatusSale(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['sale_team_sub_has_admin_user_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            SaleTeamSubHasAdminUser::where('sale_team_sub_has_admin_user_id', $id)->update($input_all);
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

    public function ChangeStatusArea(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['sale_team_sub_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            SaleArea::where('sale_team_sub_id', $id)->update($input_all);
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
        // return $id;
    }
}
