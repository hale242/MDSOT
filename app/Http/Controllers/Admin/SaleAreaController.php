<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\SaleArea;
use App\AdminUser;
use App\SaleManager;
use App\SaleTeamSubHasAdminUser;

class SaleAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'SaleArea')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['SaleManagers'] = SaleManager::where('sale_team_main_status', 1)->get();
        // $data['Sales'] = SaleTeamSubHasAdminUser::where('sale_team_sub_has_admin_user_status', 1)->where('sale_team_sub_id', '!=', null)->with('AdminUser')->get();

        if (Helper::CheckPermissionMenu('SaleArea', '1')) {
            return view('admin.SaleArea.sale_team_sub', $data);
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
        if (isset($input_all['manager'])) {
            $manager = $input_all['manager'];
            unset($input_all['manager']);
        }

        if (isset($input_all['admin_id'])) {
            $admin_id = $input_all['admin_id'];
            unset($input_all['admin_id']);
        }


        $validator = Validator::make($request->all(), [
            'sale_team_sub_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $SaleArea = new SaleArea;
                foreach ($input_all as $key => $val) {
                    $SaleArea->{$key} = $val;
                }
                if (!isset($input_all['sale_team_sub_status'])) {
                    $SaleArea->sale_team_sub_status = 0;
                }
                $SaleArea->save();
                $team_sub = $SaleArea->getKey();
                if (isset($manager) && $manager) {
                    foreach ($manager as $id) {
                        $SaleTeamSubHasAdminUser = new SaleTeamSubHasAdminUser;
                        $SaleTeamSubHasAdminUser->admin_id = $id;
                        $SaleTeamSubHasAdminUser->sale_team_sub_id = $team_sub;
                        $SaleTeamSubHasAdminUser->sale_team_main_id = $SaleArea->sale_team_main_id;
                        $SaleTeamSubHasAdminUser->sale_team_sub_has_admin_user_status = 2;
                        $SaleTeamSubHasAdminUser->save();
                    }
                }
                if (isset($admin_id) && $admin_id) {
                    foreach ($admin_id as $id) {
                        $SaleTeamSubHasAdminUser = new SaleTeamSubHasAdminUser;
                        $SaleTeamSubHasAdminUser->admin_id = $id;
                        $SaleTeamSubHasAdminUser->sale_team_sub_id = $team_sub;
                        // $SaleTeamSubHasAdminUser->sale_team_main_id = $SaleArea->sale_team_main_id;
                        $SaleTeamSubHasAdminUser->sale_team_main_id = null;
                        $SaleTeamSubHasAdminUser->sale_team_sub_has_admin_user_status = 1;
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
            if (isset($failedRules['sale_team_sub_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Sale Area is required";
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
        $content = SaleArea::with('SaleManager', 'SaleTeamSubHasAdminUser.AdminUser')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get SaleArea';
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
        if (isset($input_all['manager'])) {
            $manager = $input_all['manager'];
            unset($input_all['manager']);
        }

        $validator = Validator::make($request->all(), [
            'sale_team_sub_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $SaleArea = SaleArea::find($id);
                foreach ($input_all as $key => $val) {
                    $SaleArea->{$key} = $val;
                }
                if (!isset($input_all['sale_team_sub_status'])) {
                    $SaleArea->sale_team_sub_status = 0;
                }
                $SaleArea->save();
                if (isset($manager) && $manager) {
                    SaleTeamSubHasAdminUser::whereNotIn('admin_id', $manager)->where('sale_team_sub_id', $id)->where('sale_team_sub_id', '!=', null)->where('sale_team_sub_has_admin_user_status', '=', 2)->delete();
                    foreach ($manager as $key => $val) {
                        $SaleTeamSubHasAdminUser = SaleTeamSubHasAdminUser::where('admin_id', $val)->where('sale_team_sub_id', $id)->where('sale_team_sub_has_admin_user_status', 2)->first();
                        if (!$SaleTeamSubHasAdminUser) {
                            $SaleTeamSubHasAdminUser = new SaleTeamSubHasAdminUser;
                        }
                        $SaleTeamSubHasAdminUser->admin_id = $val;
                        $SaleTeamSubHasAdminUser->sale_team_main_id = $SaleArea->sale_team_main_id;
                        $SaleTeamSubHasAdminUser->sale_team_sub_id = $id;
                        $SaleTeamSubHasAdminUser->sale_team_sub_has_admin_user_status = 2;
                        $SaleTeamSubHasAdminUser->save();
                    }
                } else {
                    SaleTeamSubHasAdminUser::where('sale_team_sub_id', $id)->delete();
                }
                if (isset($admin_id) && $admin_id) {
                    SaleTeamSubHasAdminUser::whereNotIn('admin_id', $admin_id)->where('sale_team_sub_id', $id)->whereIn('sale_team_sub_has_admin_user_status', array(0, 1))->delete();
                    foreach ($admin_id as $key => $val) {
                        $SaleTeamSubHasAdminUser = SaleTeamSubHasAdminUser::where('admin_id', $val)->where('sale_team_sub_id', $id)->whereIn('sale_team_sub_has_admin_user_status', array(0, 1))->first();
                        if (!$SaleTeamSubHasAdminUser) {
                            $SaleTeamSubHasAdminUser = new SaleTeamSubHasAdminUser;
                        }
                        $SaleTeamSubHasAdminUser->admin_id = $val;
                        // $SaleTeamSubHasAdminUser->sale_team_main_id = $SaleArea->sale_team_main_id;
                        $SaleTeamSubHasAdminUser->sale_team_main_id = null;
                        $SaleTeamSubHasAdminUser->sale_team_sub_id = $id;
                        $SaleTeamSubHasAdminUser->sale_team_sub_has_admin_user_status = 1;
                        $SaleTeamSubHasAdminUser->save();
                    }
                } else {
                    SaleTeamSubHasAdminUser::where('sale_team_sub_id', $id)->delete();
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
            if (isset($failedRules['sale_team_sub_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Sale Area is required";
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
        $result = SaleArea::select(
            'sale_team_sub.*'
            ,'sale_team_main.sale_team_main_name'
        )
            ->leftjoin('sale_team_main', 'sale_team_main.sale_team_main_id', 'sale_team_sub.sale_team_main_id')
            ->leftjoin('sale_team_sub_has_admin_user', 'sale_team_sub_has_admin_user.sale_team_sub_id', 'sale_team_sub.sale_team_sub_id')
            ->with('SaleTeamSubHasAdminUser.AdminUser');

        $sale_team_main_name = $request->input('sale_team_main_name');
        $manager = $request->input('manager');
        $sale_team_sub_name = $request->input('sale_team_sub_name');
        $sale = $request->input('sale');

        if ($sale_team_main_name) {
            $result->where('sale_team_main.sale_team_main_name', 'like', '%' . $sale_team_main_name . '%');
        }
        if ($sale_team_sub_name) {
            $result->where('sale_team_sub.sale_team_sub_name', 'like', '%' . $sale_team_sub_name . '%');
        }
        if (isset($manager) && isset($sale)) {
            $manager_id = SaleTeamSubHasAdminUser::select('sale_team_sub_id')->where('sale_team_main_id','!=',null)->where('admin_id',$manager)->get();
            $result->where('sale_team_sub_has_admin_user.sale_team_main_id',null);
            $result->whereIn('sale_team_sub_has_admin_user.sale_team_sub_id',$manager_id);
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status', '1');
            $result->where('sale_team_sub_has_admin_user.admin_id', $sale);
        }
        
        else if ($manager) {
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status', '2');
            $result->where('sale_team_sub_has_admin_user.admin_id', $manager);
        } 
        else if ($sale) {
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status', '1');
            $result->where('sale_team_sub_has_admin_user.admin_id', $sale);
        }
        $result->groupBy('sale_team_sub.sale_team_sub_id');


        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->sale_team_sub_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->sale_team_sub_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('manager', function ($res) {
                $html = '';
                foreach ($res->SaleTeamSubHasAdminUser as $val) {
                    if ($val->sale_team_sub_has_admin_user_status == 2) {
                        foreach ($val->AdminUser  as $val2) {
                            $html .= '<span class="badge badge-pill text-white" style="background-color: #ccc">' . $val2->first_name . ' ' . $val2->last_name . '</span><br>';
                        }
                    }
                }
                return $html;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('SaleArea', '1');
                $insert = Helper::CheckPermissionMenu('SaleArea', '2');
                $update = Helper::CheckPermissionMenu('SaleArea', '3');
                $delete = Helper::CheckPermissionMenu('SaleArea', '4');
                if ($res->sale_team_sub_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->sale_team_sub_id . '" data-style="ios" data-on="On" data-off="Off">';
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-sale_user" href="javascript:void(0)" data-toggle="modal" data-target="#SaleUserModal" data-id="' . $res->sale_team_sub_id . '">Sale User</a>';
                $str .= '<a class="dropdown-item btn-add_user" href="javascript:void(0)" data-toggle="modal" data-target="#AddUserModal" data-id="' . $res->sale_team_sub_id . '">Add User</a>';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->sale_team_sub_id . '">View</a>';
                }
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->sale_team_sub_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'manager'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
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

    public function GetManager($id)
    {
        $result = SaleTeamSubHasAdminUser::where('sale_team_main_id', $id)->where('sale_team_sub_has_admin_user_status', 2)->where('sale_team_sub_id', null)->with('AdminUser')->get();
        return $result;
    }
    public function GetAddUser($id)
    {
        $result = SaleTeamSubHasAdminUser::where('sale_team_sub_id', $id)->whereIn('sale_team_sub_has_admin_user_status', array(0, 1))->get();
        $admin_id = [];
        foreach ($result as $val) {
            $admin_id[] = $val->admin_id;
        }
        $admin_id = array_unique($admin_id);

        $data = AdminUser::whereNotIn('admin_id', $admin_id)->where('status', '1')->get();
        return $data;
    }

    public function AddUser(Request  $request, $id)
    {
        $input_all = $request->all();
        if (isset($input_all['admin_id'])) {
            $admin_id = $input_all['admin_id'];
            unset($input_all['admin_id']);
        }

        $validator = Validator::make($request->all(), [
            'admin_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $SaleArea = SaleArea::find($id);
                foreach ($input_all as $key => $val) {
                    $SaleArea->{$key} = $val;
                }
                if (!isset($input_all['sale_team_sub_status'])) {
                    $SaleArea->sale_team_sub_status = 0;
                }

                if (isset($admin_id) && $admin_id) {
                    foreach ($admin_id as $val2) {
                        $SaleTeamSubHasAdminUser = new SaleTeamSubHasAdminUser;
                        $SaleTeamSubHasAdminUser->admin_id = $val2;
                        $SaleTeamSubHasAdminUser->sale_team_sub_id = $id;
                        // $SaleTeamSubHasAdminUser->sale_team_main_id = $SaleArea->sale_team_main_id;
                        $SaleTeamSubHasAdminUser->sale_team_main_id = null;
                        $SaleTeamSubHasAdminUser->sale_team_sub_has_admin_user_status = 1;
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
            if (isset($failedRules['sale_team_sub_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Sale Area is required";
            }
        }
        $return['title'] = 'Insert';
        return $return;
    }
}
