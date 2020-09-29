<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\AccountCode;

class AccountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','AccountCode')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          if(Helper::CheckPermissionMenu('AccountCode' , '1')){
              return view('admin.AccountCode.account_code', $data);
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
            'account_code_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $AccountCode = new AccountCode;
                foreach($input_all as $key=>$val){
                    $AccountCode->{$key} = $val;
                }
                if(!isset($input_all['account_code_status'])){
                    $AccountCode->account_code_status = 0;
                }
                $AccountCode->save();
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
            if(isset($failedRules['account_code_name']['required'])) {
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
        $content = AccountCode::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get AccountCode';
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
            'account_code_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $AccountCode = AccountCode::find($id);
                foreach($input_all as $key=>$val){
                    $AccountCode->{$key} = $val;
                }
                if(!isset($input_all['account_code_status'])){
                    $AccountCode->account_code_status = 0;
                }
                $AccountCode->save();
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
            if(isset($failedRules['account_code_name']['required'])) {
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
      $result = AccountCode::select();
      $account_code_name = $request->input('account_code_name');
      $account_code_book = $request->input('account_code_book');
      if($account_code_name){
          $result->where('account_code_name', 'like', '%'.$account_code_name.'%');
      };
      if($account_code_book){
          $result->where('account_code_book', 'like', '%'.$account_code_book.'%');
      };
      return Datatables::of($result)
        ->addColumn('checkbox' , function($res){
            $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-'.$res->account_code_id.'">
                        <label class="custom-control-label" for="checkbox-item-'.$res->account_code_id.'"></label>
                    </div>';
            return $str;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('AccountCode' , '1');
            $insert = Helper::CheckPermissionMenu('AccountCode' , '2');
            $update = Helper::CheckPermissionMenu('AccountCode' , '3');
            $delete = Helper::CheckPermissionMenu('AccountCode' , '4');
            if($res->account_code_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->account_code_id.'" data-style="ios" data-on="On" data-off="Off">';
            $str = '<div class="btn-group">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            if ($view) {
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->account_code_id . '">View</a>';
            }
            if ($update) {
            $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->account_code_id . '">Edit</a>';
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
            $input_all['account_code_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            AccountCode::where('account_code_id', $id)->update($input_all);
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
