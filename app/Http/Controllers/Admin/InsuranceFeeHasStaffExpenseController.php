<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\InsuranceFeeHasStaffExpense;

class InsuranceFeeHasStaffExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $check = InsuranceFeeHasStaffExpense::where('price_structure_id', $input_all['price_structure_id'])
          ->where('insurance_fee_id', $input_all['insurance_fee_id'])
          ->count();
        if($check > 0){
            $return['status'] = 0;
            $return['title'] = 'Insert';
            $return['content'] = 'This insurance fee is already in use.';
            return $return;
        }
        $validator = Validator::make($request->all(), [
            'insurance_fee_id' => 'required',
            'insurance_fee_has_staff_expenses_price_status' => 'required',
            'insurance_fee_has_staff_expenses_salary_type' => 'required',
            'insurance_fee_has_staff_expenses_calculate_cost_status' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $InsuranceFeeHasStaffExpense = new InsuranceFeeHasStaffExpense;
                foreach($input_all as $key=>$val){
                    $InsuranceFeeHasStaffExpense->{$key} = $val;
                }
                if(!isset($input_all['insurance_fee_has_staff_expenses_status'])){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_status = 0;
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price);
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_limit){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_limit = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_limit);
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_df){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_df = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_df);
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_max){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_max = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_max);
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_min){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_min = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_min);
                }
                $InsuranceFeeHasStaffExpense->save();
                \DB::commit();
                $return['price_structure_id'] = $InsuranceFeeHasStaffExpense->price_structure_id;
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
            if(isset($failedRules['insurance_fee_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Insurance Fee is required";
            }
            if(isset($failedRules['insurance_fee_has_staff_expenses_price_status']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price Status is required";
            }
            if(isset($failedRules['insurance_fee_has_staff_expenses_salary_type']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Calculate Type is required";
            }
            if(isset($failedRules['insurance_fee_has_staff_expenses_calculate_cost_status']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Cost Status is required";
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
        $content = InsuranceFeeHasStaffExpense::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get InsuranceFeeHasStaffExpense';
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
        $check = InsuranceFeeHasStaffExpense::where('price_structure_id', $input_all['price_structure_id'])
          ->where('insurance_fee_id', $input_all['insurance_fee_id'])
          ->whereNotIn('insurance_fee_has_staff_expenses_id', [$id])
          ->count();
        if($check > 0){
            $return['status'] = 0;
            $return['title'] = 'Update';
            $return['content'] = 'This insurance fee is already in use.';
            return $return;
        }
        $validator = Validator::make($request->all(), [
            'insurance_fee_id' => 'required',
            'insurance_fee_has_staff_expenses_price_status' => 'required',
            'insurance_fee_has_staff_expenses_salary_type' => 'required',
            'insurance_fee_has_staff_expenses_calculate_cost_status' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $InsuranceFeeHasStaffExpense = InsuranceFeeHasStaffExpense::find($id);
                foreach($input_all as $key=>$val){
                    $InsuranceFeeHasStaffExpense->{$key} = $val;
                }
                if(!isset($input_all['insurance_fee_has_staff_expenses_status'])){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_status = 0;
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price);
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_limit){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_limit = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_limit);
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_df){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_df = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_df);
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_max){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_max = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_max);
                }
                if($InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_min){
                    $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_min = str_replace(',', '', $InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_salary_min);
                }
                $InsuranceFeeHasStaffExpense->save();
                \DB::commit();
                $return['price_structure_id'] = $InsuranceFeeHasStaffExpense->price_structure_id;
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
            if(isset($failedRules['insurance_fee_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Insurance Fee is required";
            }
            if(isset($failedRules['insurance_fee_has_staff_expenses_price_status']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price Status is required";
            }
            if(isset($failedRules['insurance_fee_has_staff_expenses_salary_type']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Calculate Type is required";
            }
            if(isset($failedRules['insurance_fee_has_staff_expenses_calculate_cost_status']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Cost Status is required";
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
      $result = InsuranceFeeHasStaffExpense::select(
          'insurance_fee_has_staff_expenses.*',
          'insurance_fee.insurance_fee_name'
      )
      ->leftjoin('insurance_fee', 'insurance_fee.insurance_fee_id', 'insurance_fee_has_staff_expenses.insurance_fee_id');
      $price_structure_id = $request->input('price_structure_id');
      if($price_structure_id){
          $result->where('price_structure_id', $price_structure_id);
      }
      return Datatables::of($result)
        ->addColumn('insurance_fee_has_staff_expenses_price' , function($res){
            return number_format($res->insurance_fee_has_staff_expenses_price, 2);
        })
        ->addColumn('insurance_fee_has_staff_expenses_price_limit' , function($res){
            return number_format($res->insurance_fee_has_staff_expenses_price_limit, 2);
        })
        ->addColumn('insurance_fee_has_staff_expenses_salary_max' , function($res){
            return number_format($res->insurance_fee_has_staff_expenses_salary_max, 2);
        })
        ->addColumn('insurance_fee_has_staff_expenses_salary_min' , function($res){
            return number_format($res->insurance_fee_has_staff_expenses_salary_min, 2);
        })
        ->addColumn('insurance_fee_has_staff_expenses_salary_df' , function($res){
            return number_format($res->insurance_fee_has_staff_expenses_salary_df, 2);
        })
        ->addColumn('insurance_fee_has_staff_expenses_price_status' , function($res){
            return $res->insurance_fee_has_staff_expenses_price_status || $res->insurance_fee_has_staff_expenses_price_status == '0' ? $res->Status[$res->insurance_fee_has_staff_expenses_price_status] : '';
        })
        ->addColumn('insurance_fee_has_staff_expenses_calculate_cost_status' , function($res){
            return $res->insurance_fee_has_staff_expenses_calculate_cost_status || $res->insurance_fee_has_staff_expenses_calculate_cost_status == '0' ? $res->Status[$res->insurance_fee_has_staff_expenses_calculate_cost_status] : '';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('PriceStructure' , '1');
            $insert = Helper::CheckPermissionMenu('PriceStructure' , '2');
            $update = Helper::CheckPermissionMenu('PriceStructure' , '3');
            $delete = Helper::CheckPermissionMenu('PriceStructure' , '4');
            if($res->insurance_fee_has_staff_expenses_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-insurance-fee" '.$checked.' data-id="'.$res->insurance_fee_has_staff_expenses_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit-insurance-fee" data-id="'.$res->insurance_fee_has_staff_expenses_id.'">Edit</button>';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
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
            $input_all['insurance_fee_has_staff_expenses_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            InsuranceFeeHasStaffExpense::where('insurance_fee_has_staff_expenses_id', $id)->update($input_all);
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
