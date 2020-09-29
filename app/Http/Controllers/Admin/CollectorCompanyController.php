<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\CollectorCompany;
use App\AdminUser;
use App\CollectorGroup;
use App\Company;

class CollectorCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'CollectorCompany')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['CollectorGroups'] = CollectorGroup::where('collertor_group_status', 1)->get();
        $data['Companies'] = Company::where('company_status', 1)->get();

        if (Helper::CheckPermissionMenu('CollectorCompany', '1')) {
            return view('admin.CollectorCompany.collector_company', $data);
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
            'company_id' => 'required',
            'collertor_group_id' => 'required',

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $CollectorCompany = new CollectorCompany;
                foreach ($input_all as $key => $val) {
                    $CollectorCompany->{$key} = $val;
                }
                if (!isset($input_all['collertor_company_status'])) {
                    $CollectorCompany->collertor_company_status = 0;
                }
                $CollectorCompany->save();
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
            if (isset($failedRules['company_id']['required'])) {
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
        $content = CollectorCompany::select(
            'collertor_company.collertor_company_id',
            'collertor_company.admin_id',
            'collertor_company.company_id',
            'collertor_company.collertor_group_id',
            'collertor_company.collertor_company_details',
            'collertor_company.collertor_company_status',
            'company.company_name_th',
            'collertor_group.collertor_group_name'
        )
            ->leftjoin('company', 'company.company_id', 'collertor_company.company_id')
            ->leftjoin('collertor_group', 'collertor_group.collertor_group_id', 'collertor_company.collertor_group_id')
            ->with('AdminUser')
            ->find($id);

        $return['status'] = 1;
        $return['title'] = 'Get Collector Company';
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
            'company_id' => 'required',
            'collertor_group_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $CollectorCompany = CollectorCompany::find($id);
                foreach ($input_all as $key => $val) {
                    $CollectorCompany->{$key} = $val;
                }
                if (!isset($input_all['collertor_company_status'])) {
                    $CollectorCompany->collertor_company_status = 0;
                }
                $CollectorCompany->save();
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
            if (isset($failedRules['company_id']['required'])) {
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

    public function Lists(Request  $request)
    {
        $result = CollectorCompany::select(
            'collertor_company.collertor_company_id',
            'collertor_company.admin_id',
            'collertor_company.company_id',
            'collertor_company.collertor_group_id',
            'collertor_company.collertor_company_details',
            'collertor_company.collertor_company_status',
            'collertor_group.collertor_group_name',
            'company.company_name_th'
        )
            ->leftjoin('company', 'company.company_id', 'collertor_company.company_id')
            ->leftjoin('collertor_group', 'collertor_group.collertor_group_id', 'collertor_company.collertor_group_id')
            ->with('AdminUser');

        $page = $request->input('page');

        $collertor_group_id = $request->input('collertor_group_id');
        $company_id = $request->input('company_id');
        $admin_id = $request->input('admin_id');
        if ($collertor_group_id) {
            $result->where('collertor_company.collertor_group_id', $collertor_group_id);
        };
        if ($company_id) {
            $result->where('collertor_company.company_id', $company_id);
        };
        if ($admin_id) {
            $result->where('collertor_company.admin_id', $admin_id);
        };

        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->collertor_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->collertor_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('approve_name', function ($res) {
                $str = '';
                $str = $res->AdminUser->first_name . ' ' . $res->AdminUser->last_name;
                return $str;
            })

            ->addColumn('action', function ($res) use ($page) {
                $view = Helper::CheckPermissionMenu('CollectorCompany', '1');
                $insert = Helper::CheckPermissionMenu('CollectorCompany', '2');
                $update = Helper::CheckPermissionMenu('CollectorCompany', '3');
                $delete = Helper::CheckPermissionMenu('CollectorCompany', '4');
                if ($res->collertor_company_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $str = '';
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-collector-company" ' . $checked . ' data-id="' . $res->collertor_company_id . '" data-style="ios" data-on="On" data-off="Off">';
                if (!$page) {
                    $str = '<div class="bootstrap-table">';
                    $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                    $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                    $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                    if ($view) {
                        $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->collertor_company_id . '">View</a>';
                    }
                    if ($update) {
                        $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->collertor_company_id . '">Edit</a>';
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
            ->rawColumns(['checkbox', 'approve_name', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['collertor_company_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            CollectorCompany::where('collertor_company_id', $id)->update($input_all);
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
