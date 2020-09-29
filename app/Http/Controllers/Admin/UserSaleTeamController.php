<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\SaleTeamSubHasAdminUser;

class UserSaleTeamController extends Controller
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
    public function Lists(Request $request)
    {
        $result = SaleTeamSubHasAdminUser::select()
            // ->where('sale_team_sub_has_admin_user_status','<=',1)
            ->whereIn('sale_team_sub_has_admin_user_status',array(0, 1))
            ->with('SaleArea.SaleManager');

        $admin_id = $request->input('admin_id');

        if ($admin_id) {
            $result->where('admin_id', $admin_id);
        }

        return Datatables::of($result)
            ->addIndexColumn()
            ->addColumn('team', function ($res) {
                $team = '';
                foreach ($res->SaleArea as $val) {
                    foreach ($val->SaleManager as $val2) {
                        $team = $val2->sale_team_main_name;
                    }
                }

                return $team;
            })
            ->addColumn('manager', function ($res) {
                $manager = '';
                foreach ($res->SaleArea as $val) {
                    foreach ($val->SaleManager as $val2) {
                        foreach ($val2->SaleTeamSubHasAdminUser as $val3) {
                            if ($val->sale_team_sub_id == $val3->sale_team_sub_id) {
                            foreach ($val3->AdminUser as $val4) {
                                $manager = $val4->first_name.' '.$val4->last_name;
                            }
                        }
                        }
                    }
                }

                return $manager;
            })
 
            ->addColumn('area', function ($res) {
                $area = '';
                foreach ($res->SaleArea as $val) {
                    $area = $val->sale_team_sub_name;
                }

                return $area;
            })
            ->addColumn('action', function ($res) {
                if ($res->sale_team_sub_has_admin_user_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-sale" ' . $checked . ' data-id="' . $res->sale_team_sub_has_admin_user_id . '" data-style="ios" data-on="On" data-off="Off">';
                $str = '';
                $str .= ' ' . $btnStatus;
                
                return $str;
            })
            ->rawColumns(['team', 'area', 'manager','action'])
            ->make(true);
        // return $team_id;
    }
}
