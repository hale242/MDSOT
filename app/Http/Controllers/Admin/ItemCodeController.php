<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\ItemCode;
use App\AccountCode;

class ItemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','ItemCode')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['AccountCodes'] = AccountCode::where('account_code_status', 1)->get();
          if(Helper::CheckPermissionMenu('ItemCode' , '1')){
              return view('admin.ItemCode.item_code', $data);
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
            'item_code_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $ItemCode = new ItemCode;
                foreach($input_all as $key=>$val){
                    $ItemCode->{$key} = $val;
                }
                if(!isset($input_all['item_code_status'])){
                    $ItemCode->item_code_status = 0;
                }
                if(!isset($input_all['item_code_revenue_status'])){
                    $ItemCode->item_code_revenue_status = 0;
                }
                if(!isset($input_all['item_code_pay_status'])){
                    $ItemCode->item_code_pay_status = 0;
                }
                if(!isset($input_all['revenue_account_code_id'])){
                    $ItemCode->revenue_account_code_id = null;
                }
                if(!isset($input_all['pay_account_code_id'])){
                    $ItemCode->pay_account_code_id = null;
                }
                $ItemCode->save();
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
            if(isset($failedRules['item_code_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Item code name is required";
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
        $content = ItemCode::with('AccountCodeRevenue', 'AccountCodePay')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get ItemCode';
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
            'item_code_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $ItemCode = ItemCode::find($id);
                foreach($input_all as $key=>$val){
                    $ItemCode->{$key} = $val;
                }
                if(!isset($input_all['item_code_status'])){
                    $ItemCode->item_code_status = 0;
                }
                if(!isset($input_all['item_code_revenue_status'])){
                    $ItemCode->item_code_revenue_status = 0;
                }
                if(!isset($input_all['item_code_pay_status'])){
                    $ItemCode->item_code_pay_status = 0;
                }
                if(!isset($input_all['revenue_account_code_id'])){
                    $ItemCode->revenue_account_code_id = null;
                }
                if(!isset($input_all['pay_account_code_id'])){
                    $ItemCode->pay_account_code_id = null;
                }
                $ItemCode->save();
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
            if(isset($failedRules['item_code_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Item code name is required";
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
      $result = ItemCode::select(
          'item_code.*',
          'account_code_revenue.account_code_name as revenue_account_code_name',
          'account_code_pay.account_code_name as pay_account_code_name'
      )
      ->leftjoin('account_code as account_code_revenue', 'account_code_revenue.account_code_id', 'item_code.revenue_account_code_id')
      ->leftjoin('account_code as account_code_pay', 'account_code_pay.account_code_id', 'item_code.pay_account_code_id');
      $item_code_name = $request->input('item_code_name');
      if($item_code_name){
          $result->where('item_code_name', 'like', '%'.$item_code_name.'%');
      };
      return Datatables::of($result)
        ->editColumn('item_code_revenue_status' , function($res){
            return $res->item_code_revenue_status == 1 ? 'Active' : 'No Active';
        })
        ->editColumn('item_code_pay_status' , function($res){
            return $res->item_code_pay_status == 1 ? 'Active' : 'No Active';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('ItemCode' , '1');
            $insert = Helper::CheckPermissionMenu('ItemCode' , '2');
            $update = Helper::CheckPermissionMenu('ItemCode' , '3');
            $delete = Helper::CheckPermissionMenu('ItemCode' , '4');
            if($res->item_code_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->item_code_id.'" data-style="ios" data-on="On" data-off="Off">';
           $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            if ($view) {
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->item_code_id . '">View</a>';
            }
            if ($update) {
            $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->item_code_id . '">Edit</a>';
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
            $input_all['item_code_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            ItemCode::where('item_code_id', $id)->update($input_all);
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
