<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\PriceStructureHasStaffExpense;

class PriceStructureHasStaffExpenseController extends Controller
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
        $check = PriceStructureHasStaffExpense::where('price_structure_id', $input_all['price_structure_id'])
          ->where('staff_expenses_id', $input_all['staff_expenses_id'])
          ->count();
        if($check > 0){
            $return['status'] = 0;
            $return['title'] = 'Insert';
            $return['content'] = 'This staff cost is already in use.';
            return $return;
        }
        $validator = Validator::make($request->all(), [
            'staff_expenses_id' => 'required',
            'price_structure_has_staff_expenses_price_status' => 'required',
            'price_structure_has_staff_expenses_price' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PriceStructureHasStaffExpense = new PriceStructureHasStaffExpense;
                foreach($input_all as $key=>$val){
                    $PriceStructureHasStaffExpense->{$key} = $val;
                }
                if(!isset($input_all['price_structure_has_staff_expenses_status'])){
                    $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_status = 0;
                }
                if($PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price){
                    $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price = str_replace(',', '', $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price);
                }
                if($PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_sale){
                    $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_sale = str_replace(',', '', $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_sale);
                }
                if($PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_limit){
                    $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_limit = str_replace(',', '', $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_limit);
                }
                $PriceStructureHasStaffExpense->save();
                \DB::commit();
                $return['price_structure_id'] = $PriceStructureHasStaffExpense->price_structure_id;
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
            if(isset($failedRules['staff_expenses_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Staff cost is required";
            }
            if(isset($failedRules['price_structure_has_staff_expenses_price_status']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price Status is required";
            }
            if(isset($failedRules['price_structure_has_staff_expenses_price']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price is required";
            }
            if(isset($failedRules['price_structure_has_staff_expenses_price_sale']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price sale is required";
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
        $content = PriceStructureHasStaffExpense::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get PriceStructureHasStaffExpense';
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
        $check = PriceStructureHasStaffExpense::where('price_structure_id', $input_all['price_structure_id'])
          ->where('staff_expenses_id', $input_all['staff_expenses_id'])
          ->whereNotIn('price_structure_has_staff_expenses_id', [$id])
          ->count();
        if($check > 0){
            $return['status'] = 0;
            $return['title'] = 'Update';
            $return['content'] = 'This staff cost is already in use.';
            return $return;
        }
        $validator = Validator::make($request->all(), [
            'staff_expenses_id' => 'required',
            'price_structure_has_staff_expenses_price_status' => 'required',
            'price_structure_has_staff_expenses_price' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PriceStructureHasStaffExpense = PriceStructureHasStaffExpense::find($id);
                foreach($input_all as $key=>$val){
                    $PriceStructureHasStaffExpense->{$key} = $val;
                }
                if(!isset($input_all['price_structure_has_staff_expenses_status'])){
                    $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_status = 0;
                }
                if($PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price){
                    $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price = str_replace(',', '', $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price);
                }
                if($PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_sale){
                    $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_sale = str_replace(',', '', $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_sale);
                }
                if($PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_limit){
                    $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_limit = str_replace(',', '', $PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_limit);
                }
                $PriceStructureHasStaffExpense->save();
                \DB::commit();
                $return['price_structure_id'] = $PriceStructureHasStaffExpense->price_structure_id;
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
            if(isset($failedRules['staff_expenses_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Staff cost is required";
            }
            if(isset($failedRules['price_structure_has_staff_expenses_price_status']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price Status is required";
            }
            if(isset($failedRules['price_structure_has_staff_expenses_price']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price is required";
            }
            if(isset($failedRules['price_structure_has_staff_expenses_price_sale']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price sale is required";
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
      $result = PriceStructureHasStaffExpense::select(
          'price_structure_has_staff_expenses.*',
          'staff_expenses.staff_expenses_name'
      )
      ->leftjoin('staff_expenses', 'staff_expenses.staff_expenses_id', 'price_structure_has_staff_expenses.staff_expenses_id');
      $price_structure_id = $request->input('price_structure_id');
      if($price_structure_id){
          $result->where('price_structure_id', $price_structure_id);
      }
      return Datatables::of($result)
        ->addColumn('price_structure_has_staff_expenses_price' , function($res){
            return number_format($res->price_structure_has_staff_expenses_price, 2);
        })
        ->addColumn('price_structure_has_staff_expenses_price_sale' , function($res){
            return number_format($res->price_structure_has_staff_expenses_price_sale, 2);
        })
        ->addColumn('price_structure_has_staff_expenses_price_limit' , function($res){
            return number_format($res->price_structure_has_staff_expenses_price_limit, 2);
        })
        ->addColumn('price_structure_has_staff_expenses_price_status' , function($res){
            return $res->price_structure_has_staff_expenses_price_status || $res->price_structure_has_staff_expenses_price_status == '0' ? $res->Status[$res->price_structure_has_staff_expenses_price_status] : '';
        })
        ->addColumn('price_structure_has_staff_expenses_type' , function($res){
            return $res->price_structure_has_staff_expenses_type || $res->price_structure_has_staff_expenses_type == '0' ? $res->ExpenseType[$res->price_structure_has_staff_expenses_type] : '';
        })
        ->addColumn('price_structure_has_staff_expenses_type_cost' , function($res){
            return $res->price_structure_has_staff_expenses_type_cost || $res->price_structure_has_staff_expenses_type_cost == '0' ? $res->Cost[$res->price_structure_has_staff_expenses_type_cost] : '';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('PriceStructure' , '1');
            $insert = Helper::CheckPermissionMenu('PriceStructure' , '2');
            $update = Helper::CheckPermissionMenu('PriceStructure' , '3');
            $delete = Helper::CheckPermissionMenu('PriceStructure' , '4');
            if($res->price_structure_has_staff_expenses_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-staff-cost" '.$checked.' data-id="'.$res->price_structure_has_staff_expenses_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit-staff-cost" data-id="'.$res->price_structure_has_staff_expenses_id.'">Edit</button>';
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
            $input_all['price_structure_has_staff_expenses_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            PriceStructureHasStaffExpense::where('price_structure_has_staff_expenses_id', $id)->update($input_all);
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
