<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\AdminUser;
use App\SaleManager;
use App\SaleArea;
use App\SaleTeamSubHasAdminUser;

class SaleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'SaleUser')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['SaleManagers'] = SaleManager::where('sale_team_main_status', 1)->get();
        $data['SaleAreas'] = SaleArea::where('sale_team_sub_status', 1)->get();
        
        if (Helper::CheckPermissionMenu('SaleUser', '1')) {
            return view('admin.SaleUser.sale_user', $data);
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
            'sale_team_main_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                // foreach ($input_all as $key => $val) {
                //     $SaleArea->{$key} = $val;
                // }
                if (isset($admin_id) && $admin_id) {
                    foreach ($admin_id as $id) {
                        $SaleTeamSubHasAdminUser = new SaleTeamSubHasAdminUser;
                        $SaleTeamSubHasAdminUser->sale_team_main_id = null;
                        $SaleTeamSubHasAdminUser->sale_team_sub_id = $request->sale_team_sub_id;
                        $SaleTeamSubHasAdminUser->admin_id = $id;
                        // $SaleTeamSubHasAdminUser->sale_team_main_id = $SaleArea->sale_team_main_id;
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
        $result = AdminUser::select(
            'admin_user.*',
            'gender.gender_name',
            'position.position_name'
        )
            ->leftjoin('gender', 'gender.gender_id', 'admin_user.gender_id')
            ->leftjoin('admin_group', 'admin_group.admin_id', 'admin_user.admin_id')
            ->leftjoin('department_admin_user', 'department_admin_user.admin_id', 'admin_user.admin_id')
            ->leftjoin('position', 'position.position_id', 'admin_user.position_id')
            ->leftjoin('sale_team_sub_has_admin_user','sale_team_sub_has_admin_user.admin_id','admin_user.admin_id')
            ->with('AdminGroup.GroupLevel', 'DepartmentAdminUser.Department');

        $team = $request->input('team');
        $manager = $request->input('manager');
        $area = $request->input('area');
        $sale = $request->input('sale');


        if ($team) {
            $result->where('sale_team_sub_has_admin_user.sale_team_main_id',$team);
        }
        if ($area) {
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status',1);
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_id',$area);
        }
        if (isset($manager) && isset($sale)) {
            $manager_id = SaleTeamSubHasAdminUser::select('sale_team_sub_id')->where('sale_team_main_id','!=',null)->where('admin_id',$manager)->get();
            $result->where('sale_team_sub_has_admin_user.sale_team_main_id',null);
            $result->whereIn('sale_team_sub_has_admin_user.sale_team_sub_id',$manager_id);
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status', '1');
            $result->where('sale_team_sub_has_admin_user.admin_id', $sale);
        }
        else if ($sale) {
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status',1);
            $result->where('sale_team_sub_has_admin_user.admin_id',$sale);
        }
        else if ($manager) {
            $result->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status',2);
            $result->where('sale_team_sub_has_admin_user.admin_id',$manager);
        }
        $result->groupBy('admin_user.admin_id');

        return Datatables::of($result)

            ->addColumn('date_on', function ($res) {
                return date("d/m/Y", strtotime($res->created_at));
            })
            ->addColumn('last_login', function ($res) {
                return date("d/m/Y", strtotime($res->last_login));
            })
            ->addColumn('admin_name', function ($res) {
                return $res->first_name . ' ' . $res->last_name;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('AdminUser', '1');
                $insert = Helper::CheckPermissionMenu('AdminUser', '2');
                $update = Helper::CheckPermissionMenu('AdminUser', '3');
                $delete = Helper::CheckPermissionMenu('AdminUser', '4');
                if ($res->status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status " ' . $checked . ' data-id="' . $res->admin_id . '" data-style="ios" data-on="On" data-off="Off">';

                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-team-area" href="javascript:void(0)" data-toggle="modal" data-target="#SaleAreaModal" data-id="' . $res->admin_id . '">Team & Area</a>';
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->admin_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'group_lavel', 'department'])
            ->make(true);
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
    public function ChangeStatusAllSale(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['sale_team_sub_has_admin_user_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            SaleTeamSubHasAdminUser::where('admin_id', $id)
                ->where('sale_team_main_id', null)
                ->where('sale_team_sub_id', '!=', null)
                ->update($input_all);
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
    public function GetArea($id)
    {
        $result = SaleArea::where('sale_team_main_id', $id)->get();
        return $result;
    }
    public function GetUserNotSale($id)
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
}
