<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\SaleArea;
use App\AdminUser;
use App\SaleManager;
use App\SaleTeamSubHasAdminUser;

class ManagerListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    public function lists(Request $request)
    {
        $result = SaleTeamSubHasAdminUser::select()
            ->join('sale_team_main', 'sale_team_main.sale_team_main_id', 'sale_team_sub_has_admin_user.sale_team_main_id')
            ->join('admin_user', 'admin_user.admin_id', 'sale_team_sub_has_admin_user.admin_id')
            // ->join('sale_team_sub', 'sale_team_sub.sale_team_sub_id', 'sale_team_sub_has_admin_user.sale_team_sub_id')
            ->where('sale_team_sub_has_admin_user.sale_team_sub_has_admin_user_status', 2)
            ->where('sale_team_sub_has_admin_user.sale_team_sub_id', '!=', null)
            ->with('SaleArea.SaleTeamSubHasAdminUser.AdminUser');

        $team_id = $request->input('team_id');
        $team_sub_id = $request->input('team_id');

        if ($team_id) {
            $result->where('sale_team_sub_has_admin_user.sale_team_main_id', $team_id);
        }
        return Datatables::of($result)
            ->addIndexColumn()
            ->addColumn('manager', function ($res) {
                $manager = $res->first_name . ' ' . $res->last_name;
                return $manager;
            })
            ->addColumn('area', function ($res) {
                $area = '';
                foreach ($res->SaleArea  as $val) {
                    $area .= $val->sale_team_sub_name;
                }
                return $area;
            })
            ->addColumn('sale', function ($res) {
                $sale = '';
                foreach ($res->SaleArea  as $val) {
                    foreach ($val->SaleTeamSubHasAdminUser  as $val2) {
                        if ($val2->sale_team_sub_has_admin_user_status == 1 || $val2->sale_team_sub_has_admin_user_status == 0) {

                            foreach ($val2->AdminUser  as $val3) {
                                $sale .= substr($val3->first_name, 0, 1) . '.' . $val3->last_name . '<br>';
                            }
                        }
                    }
                }
                return $sale;
            })
            ->addColumn('action', function ($res) {
                foreach ($res->SaleArea as $val) {
                    if ($val->sale_team_sub_status == 1) {
                        $checked = 'checked';
                    } else {
                        $checked = '';
                    }
                }
                $btnAction = '<input type="checkbox" class="toggle change-status change-area-status" ' . $checked . ' data-id="' . $res->sale_team_sub_id . '" data-style="ios" data-on="On" data-off="Off"><br>';
                $btnAction .= '<button type="button" class="btn btn-info btn-md btn-sale-user-action" data-id="' . $res->sale_team_sub_id . '">Sale User</button>';
                $btnAction .= '<button type="button" class="btn btn-success btn-md btn-sale-add-action" data-id="' . $res->sale_team_sub_id . '">Sale Add</button>';

                return $btnAction;
            })
            ->rawColumns(['checkbox', 'action', 'manager', 'area', 'sale'])
            ->make(true);
        // return $team_id;
    }
}
