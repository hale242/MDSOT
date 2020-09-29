<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\AdminUser;
use App\NamePrefix;
use App\Department;
use App\GroupLevel;
use App\Position;
use App\Gender;
use App\HeadDocument;
use App\DepartmentAdminUser;
use App\AdminGroup;
use App\PermissionAction;
use Storage;
use File;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'AdminUser')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['PermisstionMenus'] = MenuSystem::whereNull('menu_system_main_menu')->with('SubMenu')->orderBy('menu_system_z_index')->get();
        $data['NamePrefixs'] = NamePrefix::where('name_prefix_status', 1)->get();
        $data['Departments'] = Department::where('department_status', 1)->get();
        $data['GroupLevels'] = GroupLevel::where('admin_user_group_status', 1)->get();
        $data['Positions'] = Position::where('position_status', 1)->get();
        $data['Genders'] = Gender::where('gender_status', 1)->get();
        $data['HeadDocuments'] = HeadDocument::where('head_documents_status', 1)->get();
        if (Helper::CheckPermissionMenu('AdminUser', '1')) {
            return view('admin.AdminUser.admin_user', $data);
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
        if (isset($input_all['department_id'])) {
            $department_id = $input_all['department_id'];
            unset($input_all['department_id']);
        }
        if (isset($input_all['admin_user_group_id'])) {
            $admin_user_group_id = $input_all['admin_user_group_id'];
            unset($input_all['admin_user_group_id']);
        }
        $validator = Validator::make($request->all(), [
            'gender_id' => 'required',
            'name_prefix_id' => 'required',
            'position_id' => 'required',
            'username' => 'required|unique:admin_user,username',
            'password' => 'required',
            'admin_user_employee_code' => 'unique:admin_user,admin_user_employee_code',
            'admin_user_code_sale' => 'unique:admin_user,admin_user_code_sale',
            'email' => 'unique:admin_user,email',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $AdminUser = new AdminUser;
                foreach ($input_all as $key => $val) {
                    $AdminUser->{$key} = $val;
                }
                if (!isset($input_all['status'])) {
                    $AdminUser->status = 0;
                }
                if (isset($input_all['image'])) {
                    $AdminUser->image = str_replace("AdminUser/", "", $AdminUser->image);
                }
                if (isset($input_all['image_signature'])) {
                    $AdminUser->image_signature = str_replace("AdminUserSignature/", "", $AdminUser->image_signature);
                }
                $AdminUser->password = \Hash::make($AdminUser->password);
                $AdminUser->save();
                if (isset($department_id) && $department_id) {
                    foreach ($department_id as $id) {
                        $DepartmentAdminUser = new DepartmentAdminUser;
                        $DepartmentAdminUser->admin_id = $AdminUser->admin_id;
                        $DepartmentAdminUser->department_id = $id;
                        $DepartmentAdminUser->save();
                    }
                }
                if (isset($admin_user_group_id) && $admin_user_group_id) {
                    foreach ($admin_user_group_id as $id) {
                        $AdminGroup = new AdminGroup;
                        $AdminGroup->admin_id = $AdminUser->admin_id;
                        $AdminGroup->admin_user_group_id = $id;
                        $AdminGroup->save();
                    }
                }
                \DB::commit();
                $return['status'] = 1;
                $return['title'] = 'Insert';
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['title'] = 'Insert';
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['gender_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Gender is required";
            }
            if (isset($failedRules['name_prefix_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name prefix is required";
            }
            if (isset($failedRules['position_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Position is required";
            }
            if (isset($failedRules['username']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Username is required";
            }
            if (isset($failedRules['password']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Password is required";
            }
            if (isset($failedRules['username']['Unique'])) {
                $return['status'] = 2;
                $return['title'] = "This username is already in use.";
            }
            if (isset($failedRules['admin_user_employee_code']['Unique'])) {
                $return['status'] = 2;
                $return['title'] = "This employee code is already in use.";
            }
            if (isset($failedRules['admin_user_code_sale']['Unique'])) {
                $return['status'] = 2;
                $return['title'] = "This sale code is already in use.";
            }
            if (isset($failedRules['email']['Unique'])) {
                $return['status'] = 2;
                $return['title'] = "This email is already in use.";
            }
        }
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
        $content = AdminUser::with('AdminGroup.GroupLevel', 'DepartmentAdminUser.Department', 'Gender', 'NamePrefix', 'PermissionAction', 'Position')->find($id);
        if ($content->image) {
            if (File::exists('uploads/AdminUser/' . $content->image)) {
                $content->image = asset('uploads/AdminUser/' . $content->image);
            } 
            else {
                $content->image = asset('uploads/images/no-image.jpg');
            }
        } else {
            $content->image = asset('uploads/images/no-image.jpg');
        }
        if ($content->image_signature) {
            if (File::exists('uploads/AdminUserSignature/' . $content->image_signature)) {
                $content->image_signature = asset('uploads/AdminUserSignature/' . $content->image_signature);
            } 
            else {
                $content->image_signature = asset('uploads/images/no-image.jpg');
            }
        } else {
            $content->image_signature = asset('uploads/images/no-image.jpg');
        }
        $return['status'] = 1;
        $return['title'] = 'Get AdminUser';
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
        if (isset($input_all['department_id'])) {
            $department_id = $input_all['department_id'];
            unset($input_all['department_id']);
        }
        if (isset($input_all['admin_user_group_id'])) {
            $admin_user_group_id = $input_all['admin_user_group_id'];
            unset($input_all['admin_user_group_id']);
        }
        $check_employee_code = AdminUser::where('admin_user_employee_code', $input_all['admin_user_employee_code'])->whereNotIn('admin_id', [$id])->first();
        if ($check_employee_code) {
            $return['status'] = 0;
            $return['title'] = 'Update';
            $return['content'] = 'This employee code is already in use.';
            return $return;
        }
        $check_sale_code = AdminUser::where('admin_user_code_sale', $input_all['admin_user_code_sale'])->whereNotIn('admin_id', [$id])->first();
        if ($check_sale_code) {
            $return['status'] = 0;
            $return['title'] = 'Update';
            $return['content'] = 'This sale code is already in use.';
            return $return;
        }
        $check_email = AdminUser::where('email', $input_all['email'])->whereNotIn('admin_id', [$id])->first();
        if ($check_email) {
            $return['status'] = 0;
            $return['title'] = 'Update';
            $return['content'] = 'This email is already in use.';
            return $return;
        }
        $validator = Validator::make($request->all(), [
            'gender_id' => 'required',
            'name_prefix_id' => 'required',
            'position_id' => 'required',
            'username' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $AdminUser = AdminUser::find($id);
                foreach ($input_all as $key => $val) {
                    $AdminUser->{$key} = $val;
                }
                if (!isset($input_all['status'])) {
                    $AdminUser->status = 0;
                }
                $image = '';
                if (isset($input_all['image'])) {
                    Storage::disk("uploads")->delete("AdminUser/" . $AdminUser->image);
                    $image = str_replace("AdminUser/", "", $input_all['image']);
                }
                if (isset($input_all['image_signature'])) {
                    Storage::disk("uploads")->delete("AdminUserSignature/" . $AdminUser->image_signature);
                    $image_signature = str_replace("AdminUserSignature/", "", $input_all['image_signature']);
                }
                $AdminUser->image = $image;
                $AdminUser->image_signature = $image_signature;
                $AdminUser->save();
                if (isset($department_id) && $department_id) {
                    DepartmentAdminUser::whereNotIn('department_id', $department_id)->where('admin_id', $id)->delete();
                    foreach ($department_id as $key => $val) {
                        $DepartmentAdminUser = DepartmentAdminUser::where('department_id', $val)->where('admin_id', $id)->first();
                        if (!$DepartmentAdminUser) {
                            $DepartmentAdminUser = new DepartmentAdminUser;
                        }
                        $DepartmentAdminUser->admin_id = $AdminUser->admin_id;
                        $DepartmentAdminUser->department_id = $val;
                        $DepartmentAdminUser->save();
                    }
                } else {
                    DepartmentAdminUser::where('admin_id', $id)->delete();
                }
                if (isset($admin_user_group_id) && $admin_user_group_id) {
                    AdminGroup::whereNotIn('admin_user_group_id', $admin_user_group_id)->where('admin_id', $id)->delete();
                    foreach ($admin_user_group_id as $key => $val) {
                        $AdminGroup = AdminGroup::where('admin_user_group_id', $val)->where('admin_id', $id)->first();
                        if (!$AdminGroup) {
                            $AdminGroup = new AdminGroup;
                        }
                        $AdminGroup->admin_id = $AdminUser->admin_id;
                        $AdminGroup->admin_user_group_id = $val;
                        $AdminGroup->save();
                    }
                } else {
                    AdminGroup::where('admin_id', $id)->delete();
                }
                \DB::commit();
                $return['status'] = 1;
                $return['title'] = 'Update';
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['title'] = 'Update';
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['gender_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Gender is required";
            }
            if (isset($failedRules['name_prefix_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name prefix is required";
            }
            if (isset($failedRules['position_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Position is required";
            }
            if (isset($failedRules['username']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Username is required";
            }
        }
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

    public function lists(Request $request)
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
            ->with('AdminGroup.GroupLevel', 'DepartmentAdminUser.Department');
        $username = $request->input('username');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $gender_id = $request->input('gender_id');
        $admin_user_group_id = $request->input('admin_user_group_id');
        $department_id = $request->input('department_id');
        $position_id = $request->input('position_id');
        if ($username) {
            $result->where('admin_user.username', 'like', '%' . $username . '%');
        }
        if ($first_name) {
            $result->where('admin_user.first_name', 'like', '%' . $first_name . '%');
        }
        if ($last_name) {
            $result->where('admin_user.last_name', 'like', '%' . $last_name . '%');
        }
        if ($email) {
            $result->where('admin_user.email', 'like', '%' . $email . '%');
        }
        if ($gender_id && $gender_id != 'all') {
            $result->where('admin_user.gender_id', $gender_id);
        }
        if ($admin_user_group_id) {
            $result->whereIn('admin_group.admin_user_group_id', $admin_user_group_id);
        }
        if ($department_id) {
            $result->whereIn('department_admin_user.department_id', $department_id);
        }
        if ($position_id) {
            $result->whereIn('admin_user.position_id', $position_id);
        }
        $result->groupBy('admin_user.admin_id');
        return Datatables::of($result)
            ->addColumn('date_on', function ($res) {
                return date("d/m/Y", strtotime($res->created_at));
            })
            ->addColumn('last_login', function ($res) {
                $str = '';
                if ($res->last_login) {
                    $str = date("d/m/Y", strtotime($res->last_login));
                }
                return $str;
            })
            ->addColumn('admin_name', function ($res) {
                return $res->first_name . ' ' . $res->last_name;
            })
            ->addColumn('group_lavel', function ($res) {
                $html = '';
                foreach ($res->AdminGroup as $val) {
                    if ($val->GroupLevel) {
                        $color = '#ccc';
                        if ($val->GroupLevel->admin_user_group_color_code) {
                            $color = $val->GroupLevel->admin_user_group_color_code;
                        }
                        $html .= '<span class="badge badge-pill text-white" style="background-color: ' . $color . '">' . $val->GroupLevel->admin_user_group_name . '</span><br>';
                    }
                }
                return $html;
            })
            ->addColumn('department', function ($res) {
                $html = '';
                foreach ($res->DepartmentAdminUser as $val) {
                    if ($val->Department) {
                        $html .= '<span class="badge badge-pill text-white" style="background-color: #ccc">' . $val->Department->department_name . '</span><br>';
                    }
                }
                return $html;
            })
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->admin_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->admin_id . '"></label>
                    </div>';
                return $str;
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
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->admin_id . '" data-style="ios" data-on="On" data-off="Off">';
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-permission" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->admin_id . '">Permission</a>';
                $str .= '<a class="dropdown-item btn-reset-password" href="javascript:void(0)" data-toggle="modal" data-target="#ResetPasswordModal" data-id="' . $res->admin_id . '">Reset Password</a>';

                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->admin_id . '">View</a>';
                }
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

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            AdminUser::where('admin_id', $id)->update($input_all);
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

    public function SetPremission(Request $request, $id)
    {
        $input_all = $request->all();
        if (isset($input_all['menu'])) {
            $menus = $input_all['menu'];
            unset($input_all['menu']);
        }
        \DB::beginTransaction();
        try {
            if (isset($menus) && $menus) {
                PermissionAction::where('admin_id', $id)->update(['permission_action_status' => 0]);
                foreach ($menus as $menu_id => $menu) {
                    foreach ($menu as $val) {
                        $check = PermissionAction::where('admin_id', $id)->where('menu_system_id', $menu_id)->where('permission_action_code_action', $val)->first();
                        if ($check) {
                            PermissionAction::where('admin_id', $id)->where('menu_system_id', $menu_id)->where('permission_action_code_action', $val)->update(['permission_action_status' => 1]);
                        } else {
                            $PermissionAction = new PermissionAction;
                            $PermissionAction->admin_id = $id;
                            $PermissionAction->menu_system_id = $menu_id;
                            $PermissionAction->permission_action_code_action = $val;
                            $PermissionAction->permission_action_status = 1;
                            $PermissionAction->save();
                        }
                    }
                }
            } else {
                PermissionAction::where('admin_id', $id)->update(['permission_action_status' => 0]);
            }
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update Permission';
        return $return;
    }

    public function ResetPassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $AdminUser = AdminUser::find($id);
                $AdminUser->password = \Hash::make($request->input('password'));
                $AdminUser->save();
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
            if (isset($failedRules['password']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Gender is required";
            }
        }
        $return['title'] = 'Reset Password';
        return $return;
    }
}
