<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\AdminUser;
use App\CollectorGroup;
use App\Company;

class CollectorGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','CollectorGroup')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['AdminUsers'] = AdminUser::where('status', 1)->get();
          $data['CollectorGroups'] = CollectorGroup::where('collertor_group_status', 1)->get();
          $data['Companies'] = Company::where('company_status', 1)->get();

          $data['Page'] = 'D';

          if(Helper::CheckPermissionMenu('CollectorGroup' , '1')){
              return view('admin.CollectorGroup.collertor_group', $data);
          }else{
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
            'collertor_group_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $CollectorGroup = new CollectorGroup;
                foreach($input_all as $key=>$val){
                    $CollectorGroup->{$key} = $val;
                }
                if(!isset($input_all['collertor_group_status'])){
                    $CollectorGroup->collertor_group_status = 0;
                }
                $CollectorGroup->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if(isset($failedRules['collertor_group_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name Prefix is required";
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
        $content = CollectorGroup::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get CollectorGroup';
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
            'collertor_group_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $CollectorGroup = CollectorGroup::find($id);
                foreach($input_all as $key=>$val){
                    $CollectorGroup->{$key} = $val;
                }
                if(!isset($input_all['collertor_group_status'])){
                    $CollectorGroup->collertor_group_status = 0;
                }
                $CollectorGroup->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if(isset($failedRules['collertor_group_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name Prefix is required";
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
      $result = CollectorGroup::select();
      $collertor_group_name = $request->input('collertor_group_name');
      $collertor_group_detail = $request->input('collertor_group_detail');
      if($collertor_group_name){
          $result->where('collertor_group_name', 'like', '%'.$collertor_group_name.'%');
      };
      if($collertor_group_detail){
          $result->where('collertor_group_details', 'like', '%'.$collertor_group_detail.'%');
      };
      return Datatables::of($result)
        ->addColumn('checkbox' , function($res){
            $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-'.$res->collertor_group_id.'">
                        <label class="custom-control-label" for="checkbox-item-'.$res->collertor_group_id.'"></label>
                    </div>';
            return $str;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('CollectorGroup' , '1');
            $insert = Helper::CheckPermissionMenu('CollectorGroup' , '2');
            $update = Helper::CheckPermissionMenu('CollectorGroup' , '3');
            $delete = Helper::CheckPermissionMenu('CollectorGroup' , '4');
            if($res->collertor_group_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-group" '.$checked.' data-id="'.$res->collertor_group_id.'" data-style="ios" data-on="On" data-off="Off">';
            $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            $str .= '<a class="dropdown-item btn-view-user" href="javascript:void(0)" data-toggle="modal" data-target="#ViewUserModal" data-id="' . $res->collertor_group_id . '">View User</a>';
            $str .= '<a class="dropdown-item btn-view-company" href="javascript:void(0)" data-toggle="modal" data-target="#ViewCompanyModal" data-id="' . $res->collertor_group_id . '">View Company</a>';
            if ($update) {
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->collertor_group_id . '">Edit</a>';
            }
            $str .= '</div>';
            $str .= '</div>';
            if ($update) {
                $str .= ' ' . $btnStatus;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox', 'action'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['collertor_group_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            CollectorGroup::where('collertor_group_id', $id)->update($input_all);
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
