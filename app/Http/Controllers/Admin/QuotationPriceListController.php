<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
use App\Helper;
use App\MenuSystem;
use App\Quotation;
use App\QuotationPriceList;
use App\QuotationPriceListOt;
use App\PriceStructure;

class QuotationPriceListController extends Controller
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = QuotationPriceList::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get QuotationPriceList';
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
            QuotationPriceListOt::where('quotation_price_list_id', $id)->delete();
            QuotationPriceList::where('main_quotation_price_list_id', $id)->delete();
            QuotationPriceList::where('quotation_price_list_id', $id)->delete();
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'สำเร็จ';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
        }
        $return['title'] = 'ลบข้อมูล';
        return $return;
    }

    public function QuotationPriceListInsert(Request $request)
    {
        $input_all = $request->all();
        if(isset($input_all['quotation_price_list_id'])){
            $quotation_price_list_id = $input_all['quotation_price_list_id'];
            unset($input_all['quotation_price_list_id']);
        }
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                $PriceStructure = PriceStructure::with('PriceStructureHasStaffExpense', 'OtherExpenseHasStaffExpense', 'InsuranceFeeHasStaffExpense', 'PriceStructureOtHasPriceStructure')->find($input_all['price_structure_id']);
                if(isset($quotation_price_list_id) && $quotation_price_list_id){
                    $QuotationPriceList = QuotationPriceList::find($quotation_price_list_id);
                }else{
                    $QuotationPriceList = new QuotationPriceList;
                }
                foreach ($input_all as $key => $val) {
                    $QuotationPriceList->{$key} = $val;
                }
                $QuotationPriceList->admin_id = $admin->admin_id;
                $QuotationPriceList->quotation_price_list_name = $PriceStructure->price_structure_name;
                $QuotationPriceList->quotation_price_list_details = $PriceStructure->price_structure_details;
                $QuotationPriceList->quotation_price_list_unit = 1;
                $QuotationPriceList->quotation_price_list_cost = $PriceStructure->price_structure_sum;
                $QuotationPriceList->quotation_price_list_price = $PriceStructure->price_structure_sale_price;
                $QuotationPriceList->quotation_price_list_salary = $PriceStructure->price_structure_salary;
                $QuotationPriceList->quotation_price_list_taxi_price = $PriceStructure->price_structure_taxi_price_sale;
                $QuotationPriceList->quotation_price_list_taxi_price_sale = $PriceStructure->price_structure_taxi_price_sale;
                $QuotationPriceList->quotation_price_list_travel = $PriceStructure->price_structure_travel_sale;
                $QuotationPriceList->quotation_price_list_travel_sale = $PriceStructure->price_structure_travel_sale;
                $QuotationPriceList->quotation_price_list_accomadation = $PriceStructure->price_structure_accomadation_sale;
                $QuotationPriceList->quotation_price_list_accomadation_sale = $PriceStructure->price_structure_accomadation_sale;
                $QuotationPriceList->quotation_price_list_main_item = 0;
                $QuotationPriceList->quotation_price_list_ot_status = 0;
                $QuotationPriceList->quotation_price_list_status = 0;
                $QuotationPriceList->save();
                $quotation_price_list = QuotationPriceList::with(
                                                                'PriceStructure.ItemCode'
                                                                ,'PriceStructure.PriceStructureOtHasPriceStructure'
                                                                ,'PriceStructure.PriceStructureHasStaffExpense.StaffCost'
                                                                ,'PriceStructure.OtherExpenseHasStaffExpense.OtherExpenses'
                                                                ,'PriceStructure.InsuranceFeeHasStaffExpense.InsuranceFee'
                                                                ,'PriceStructure.PriceStructureApprove'
                                                             )->find($QuotationPriceList->quotation_price_list_id);
                QuotationPriceList::where('main_quotation_price_list_id', $quotation_price_list->quotation_price_list_id)->delete();
                foreach($PriceStructure->PriceStructureHasStaffExpense as $val){
                    $QuotationPriceList = new QuotationPriceList;
                    foreach ($input_all as $key => $data) {
                        $QuotationPriceList->{$key} = $data;
                    }
                    $QuotationPriceList->main_quotation_price_list_id = $quotation_price_list->quotation_price_list_id;
                    $QuotationPriceList->price_structure_has_staff_expenses_id = $val->price_structure_has_staff_expenses_id;
                    $QuotationPriceList->staff_expenses_id = $val->staff_expenses_id;
                    $QuotationPriceList->admin_id = $admin->admin_id;
                    $QuotationPriceList->quotation_price_list_name = $PriceStructure->price_structure_name;
                    $QuotationPriceList->quotation_price_list_details = $PriceStructure->price_structure_details;
                    $QuotationPriceList->quotation_price_list_price = $val->price_structure_has_staff_expenses_price;
                    $QuotationPriceList->save();
                }
                foreach($PriceStructure->OtherExpenseHasStaffExpense as $val){
                    $QuotationPriceList = new QuotationPriceList;
                    foreach ($input_all as $key => $data) {
                        $QuotationPriceList->{$key} = $data;
                    }
                    $QuotationPriceList->main_quotation_price_list_id = $quotation_price_list->quotation_price_list_id;
                    $QuotationPriceList->other_expenses_has_staff_expenses_id = $val->other_expenses_has_staff_expenses_id;
                    $QuotationPriceList->other_expenses_id = $val->other_expenses_id;
                    $QuotationPriceList->admin_id = $admin->admin_id;
                    $QuotationPriceList->quotation_price_list_name = $PriceStructure->price_structure_name;
                    $QuotationPriceList->quotation_price_list_details = $PriceStructure->price_structure_details;
                    $QuotationPriceList->quotation_price_list_price = $val->other_expenses_has_staff_expenses_price;
                    $QuotationPriceList->save();
                }
                foreach($PriceStructure->InsuranceFeeHasStaffExpense as $val){
                    $QuotationPriceList = new QuotationPriceList;
                    foreach ($input_all as $key => $data) {
                        $QuotationPriceList->{$key} = $data;
                    }
                    $QuotationPriceList->main_quotation_price_list_id = $quotation_price_list->quotation_price_list_id;
                    $QuotationPriceList->insurance_fee_has_staff_expenses_id = $val->insurance_fee_has_staff_expenses_id;
                    $QuotationPriceList->insurance_fee_id = $val->insurance_fee_id;
                    $QuotationPriceList->admin_id = $admin->admin_id;
                    $QuotationPriceList->quotation_price_list_name = $PriceStructure->price_structure_name;
                    $QuotationPriceList->quotation_price_list_details = $PriceStructure->price_structure_details;
                    $QuotationPriceList->quotation_price_list_price = $val->insurance_fee_has_staff_expenses_price;
                    $QuotationPriceList->save();
                }
                \DB::commit();
                $expense_staff_cost = QuotationPriceList::with('PriceStructureHasStaffExpense.StaffCost')
                                                             ->whereNotNull('staff_expenses_id')
                                                             ->where('main_quotation_price_list_id', $quotation_price_list->quotation_price_list_id)
                                                             ->get();
                $expense_other_expenses = QuotationPriceList::with('OtherExpenseHasStaffExpense.OtherExpenses')
                                                             ->whereNotNull('other_expenses_id')
                                                             ->where('main_quotation_price_list_id', $quotation_price_list->quotation_price_list_id)
                                                             ->get();
                $expense_insurance_fee = QuotationPriceList::with('InsuranceFeeHasStaffExpense.InsuranceFee')
                                                             ->whereNotNull('insurance_fee_id')
                                                             ->where('main_quotation_price_list_id', $quotation_price_list->quotation_price_list_id)
                                                             ->get();
                $return['quotation_id'] = $quotation_price_list->quotation_id;
                $return['quotation_price_list'] = $quotation_price_list;
                $return['expense_staff_cost'] = $expense_staff_cost;
                $return['expense_other_expenses'] = $expense_other_expenses;
                $return['expense_insurance_fee'] = $expense_insurance_fee;
                $return['price_structure_ot_has_price_structure'] = $PriceStructure->PriceStructureOtHasPriceStructure;
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
        }
        $return['title'] = 'Insert';
        return $return;
    }

    public function QuotationPriceListUpdate(Request $request)
    {
        $input_all = $request->all();
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                if(isset($input_all['staff_cost'])){
                    foreach($input_all['staff_cost'] as $val){
                      $QuotationPriceList = QuotationPriceList::find($val['quotation_price_list_id']);
                      $QuotationPriceList->quotation_price_list_price = str_replace(',', '', $val['quotation_price_list_price']);
                      $QuotationPriceList->save();
                    }
                }
                if(isset($input_all['other_expenses'])){
                    foreach($input_all['other_expenses'] as $val){
                      $QuotationPriceList = QuotationPriceList::find($val['quotation_price_list_id']);
                      $QuotationPriceList->quotation_price_list_price = str_replace(',', '', $val['quotation_price_list_price']);
                      $QuotationPriceList->save();
                    }
                }
                if(isset($input_all['insurance_fee'])){
                    foreach($input_all['insurance_fee'] as $val){
                      $QuotationPriceList = QuotationPriceList::find($val['quotation_price_list_id']);
                      $QuotationPriceList->quotation_price_list_price = str_replace(',', '', $val['quotation_price_list_price']);
                      $QuotationPriceList->save();
                    }
                }

                QuotationPriceList::where([
                    'quotation_id' => $input_all['quotation_id'],
                    'price_structure_id' => $input_all['price_structure_id'],
                    'main_quotation_price_list_id' => $input_all['main_quotation_price_list_id']
                ])
                ->whereNull('price_structure_has_staff_expenses_id')
                ->whereNull('other_expenses_has_staff_expenses_id')
                ->whereNull('insurance_fee_has_staff_expenses_id')
                ->delete();
                if(isset($input_all['expenses'])){
                    $PriceStructure = PriceStructure::find($input_all['price_structure_id']);
                    foreach($input_all['expenses'] as $val){
                        $QuotationPriceList = new QuotationPriceList;
                        if($val['type'] == 'S'){
                            $QuotationPriceList->staff_expenses_id = $val['expenses_id'];
                        }elseif($val['type'] == 'O'){
                            $QuotationPriceList->other_expenses_id = $val['expenses_id'];
                        }elseif($val['type'] == 'I'){
                            $QuotationPriceList->insurance_fee_id = $val['expenses_id'];
                        }
                        $QuotationPriceList->quotation_price_list_price = str_replace(',', '', $val['quotation_price_list_price']);
                        if(!isset($val['quotation_price_list_main_item'])){
                            $QuotationPriceList->quotation_price_list_main_item = 0;
                        }else{
                            $QuotationPriceList->quotation_price_list_main_item = 1;
                        }
                        $QuotationPriceList->main_quotation_price_list_id = $input_all['main_quotation_price_list_id'];
                        $QuotationPriceList->price_structure_id = $PriceStructure->price_structure_id;
                        $QuotationPriceList->quotation_price_list_name = $PriceStructure->price_structure_name;
                        $QuotationPriceList->quotation_id = $input_all['quotation_id'];
                        $QuotationPriceList->admin_id = $admin->admin_id;
                        $QuotationPriceList->save();
                    }
                }
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
        }
        $return['title'] = 'Insert';
        return $return;
    }
}
