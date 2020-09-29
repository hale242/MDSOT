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
use App\Gender;


class SaleUserListsController extends Controller
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
            ->leftjoin('admin_user', 'admin_user.admin_id', 'sale_team_sub_has_admin_user.admin_id')
            ->leftjoin('gender', 'gender.gender_id', 'admin_user.gender_id')
            // ->where('sale_team_sub_has_admin_user_status', 1)
            ->whereIn('sale_team_sub_has_admin_user_status',array(0, 1))
            ->with('AdminUser', 'AdminUser.Gender');
        $team_id = $request->input('team_id');

        if ($team_id) {
            $result->where('sale_team_sub_id', $team_id);
        }
        return Datatables::of($result)
            ->addIndexColumn()
            ->addColumn('sale', function ($res) {
                if ($res->sale_team_sub_has_admin_user_status == 1) {
                    $Sale = 'Sale';
                } else {
                    $Sale = '';
                }
                // $Sale = ;
                return $Sale;
            })
            ->addColumn('action', function ($res) {
                if ($res->sale_team_sub_has_admin_user_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-sale-status" ' . $checked . ' data-id="' . $res->sale_team_sub_has_admin_user_id . '" data-style="ios" data-on="On" data-off="Off">';
                return $btnStatus;
            })
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
        // return $team_id;
    }
}
