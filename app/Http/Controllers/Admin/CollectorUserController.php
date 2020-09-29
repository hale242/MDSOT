<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\CollectorUser;
use App\AdminUser;
use App\CollectorGroup;

class CollectorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'CollectorUser')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['CollectorGroups'] = CollectorGroup::where('collertor_group_status', 1)->get();

        if (Helper::CheckPermissionMenu('CollectorUser', '1')) {
            return view('admin.CollectorUser.collertor_user', $data);
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
            'admin_id' => 'required',
            'collertor_group_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $CollectorUser = new CollectorUser;
                foreach ($input_all as $key => $val) {
                    $CollectorUser->{$key} = $val;
                }
                if (!isset($input_all['collertor_status'])) {
                    $CollectorUser->collertor_status = 0;
                }
                $CollectorUser->save();
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
            if (isset($failedRules['collertor_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Collector User is required";
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
        $content = CollectorUser::select(
            'collertor.collertor_id',
            'collertor.admin_id',
            'collertor.manager_admin_id',
            'collertor.collertor_group_id',
            'collertor.collertor_details',
            'collertor.collertor_date_in',
            'collertor.collertor_status',
            'collertor_group.collertor_group_name',
            'admin_user.first_name',
            'admin_user.last_name'
        )
            ->leftjoin('collertor_group', 'collertor_group.collertor_group_id', 'collertor.collertor_group_id')
            ->leftjoin('admin_user', 'admin_user.admin_id', 'collertor.manager_admin_id')
            ->with('AdminUser')
            ->find($id);

        $content['format_collertor_date_in'] = $content->collertor_date_in ? date("d/m/Y", strtotime($content->collertor_date_in)) : '';

        $return['status'] = 1;
        $return['title'] = 'Get CollectorUser';
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
            'admin_id' => 'required',
            'collertor_group_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $CollectorUser = CollectorUser::find($id);
                foreach ($input_all as $key => $val) {
                    $CollectorUser->{$key} = $val;
                }
                if (!isset($input_all['collertor_status'])) {
                    $CollectorUser->collertor_status = 0;
                }
                $CollectorUser->save();
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
            if (isset($failedRules['collertor_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Collector User is required";
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
        $result = CollectorUser::select(
            'collertor.collertor_id',
            'collertor.admin_id',
            'collertor.manager_admin_id',
            'collertor.collertor_group_id',
            'collertor.collertor_details',
            'collertor.collertor_date_in',
            'collertor.collertor_status',
            'collertor_group.collertor_group_name',
            'admin_user.first_name',
            'admin_user.last_name'

        )
            ->leftjoin('collertor_group', 'collertor_group.collertor_group_id', 'collertor.collertor_group_id')
            ->leftjoin('admin_user', 'admin_user.admin_id', 'collertor.manager_admin_id')
            ->with('AdminUser');

        $page = $request->input('page');
        $admin_id = $request->input('admin_id');
        $collertor_group_id = $request->input('collertor_group_id');

        if ($admin_id) {
            $result->where('collertor.admin_id', $admin_id);
        };
        if ($collertor_group_id) {
            $result->where('collertor.collertor_group_id', $collertor_group_id);
        };

        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->collertor_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->collertor_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('admin_name', function ($res) {
                return $str = $res->AdminUser->first_name . ' ' . $res->AdminUser->last_name;
            })
            ->addColumn('approve_name', function ($res) {
                return $str = $res->first_name . ' ' . $res->last_name;
            })
            ->editColumn('collertor_date_in', function ($res) {
                return $res->collertor_date_in ? date("d/m/Y", strtotime($res->collertor_date_in)) : '';
            })
            ->addColumn('action', function ($res) use ($page) {
                $view = Helper::CheckPermissionMenu('CollectorUser', '1');
                $insert = Helper::CheckPermissionMenu('CollectorUser', '2');
                $update = Helper::CheckPermissionMenu('CollectorUser', '3');
                $delete = Helper::CheckPermissionMenu('CollectorUser', '4');
                if ($res->collertor_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-collertor" ' . $checked . ' data-id="' . $res->collertor_id . '" data-style="ios" data-on="On" data-off="Off">';
                $str = '';
                if (!$page) {
                    $str = '<div class="bootstrap-table">';
                    $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                    $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                    $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                    if ($view) {
                        $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->collertor_id . '">View</a>';
                    }
                    if ($update) {
                        $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->collertor_id . '">Edit</a>';
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
            ->rawColumns(['checkbox', 'admin_name', 'collertor_date_in', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['collertor_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            CollectorUser::where('collertor_id', $id)->update($input_all);
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
