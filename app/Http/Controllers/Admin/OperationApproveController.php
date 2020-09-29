<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\InterviewOperationApprove;
use App\AdminUser;

class OperationApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','OperationApprove')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['AdminUsers'] = AdminUser::get();
          if(Helper::CheckPermissionMenu('OperationApprove' , '1')){
              return view('admin.OperationApprove.operation_approve', $data);
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

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $InterviewOperationApprove = new InterviewOperationApprove;
                foreach($input_all as $key=>$val){
                    $InterviewOperationApprove->{$key} = $val;
                }
                if(!isset($input_all['interview_operation_approve_status'])){
                    $InterviewOperationApprove->interview_operation_approve_status = 0;
                }
                $InterviewOperationApprove->save();
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
        $content = InterviewOperationApprove::with('AdminUser')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get InterviewOperationApprove';
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

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $InterviewOperationApprove = InterviewOperationApprove::find($id);
                foreach($input_all as $key=>$val){
                    $InterviewOperationApprove->{$key} = $val;
                }
                if(!isset($input_all['interview_operation_approve_status'])){
                    $InterviewOperationApprove->interview_operation_approve_status = 0;
                }
                $InterviewOperationApprove->save();
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
      $result = InterviewOperationApprove::select(
          'interview_operation_approve.*'
          ,'admin_user.first_name'
          ,'admin_user.last_name'
      )
      ->leftjoin('admin_user', 'admin_user.admin_id', 'interview_operation_approve.admin_id');
      $admin_id = $request->input('admin_id');
      $interview_operation_approve_lv = $request->input('interview_operation_approve_lv');
      $interview_operation_approve_date_next = $request->input('interview_operation_approve_date_next');
      if($admin_id){
          $result->where('interview_operation_approve.admin_id', $admin_id);
      };
      if($interview_operation_approve_lv){
          $result->where('interview_operation_approve.interview_operation_approve_lv', 'like', '%'.$interview_operation_approve_lv.'%');
      };
      if($interview_operation_approve_date_next){
          $result->where('interview_operation_approve.interview_operation_approve_date_next', 'like', '%'.$interview_operation_approve_date_next.'%');
      };
      return Datatables::of($result)
        ->addColumn('admin_name' , function($res){
            return $res->first_name.' '.$res->last_name;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('OperationApprove' , '1');
            $insert = Helper::CheckPermissionMenu('OperationApprove' , '2');
            $update = Helper::CheckPermissionMenu('OperationApprove' , '3');
            $delete = Helper::CheckPermissionMenu('OperationApprove' , '4');
            if($res->interview_operation_approve_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->interview_operation_approve_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->interview_operation_approve_id.'">View</button>';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->interview_operation_approve_id.'">Edit</button>';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            if($view){
                $str.=' '.$btnView;
            }
            if($update){
                $str.=' '.$btnEdit;
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
            $input_all['interview_operation_approve_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            InterviewOperationApprove::where('interview_operation_approve_id', $id)->update($input_all);
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
