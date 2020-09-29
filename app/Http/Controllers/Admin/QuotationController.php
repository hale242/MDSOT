<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
use PDF;
use App\Helper;
use App\MenuSystem;
use App\Company;
use App\RunCode;
use App\PriceStructure;
use App\StaffCost;
use App\OtherExpenses;
use App\InsuranceFee;
use App\Quotation;
use App\QuotationPriceList;
use App\AdminUser;
use App\QuotationPreApproveDetails;
use App\QuotationLineApprove;
use App\QuotationPreApprove;
use App\ContactInfo;
use App\QuotationPriceListOt;
use App\PriceStructureOT;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Quotation')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Companies'] = Company::where('company_status', 1)->get();
        $data['admin'] = Auth::guard('admin')->user();
        $data['RunCodes'] = RunCode::where('run_code_status', 1)->where('run_code_type', 8)->get(); //(8) แบบฟอร์ม Quotation (ไทย - อังกฤษ) F#4
        $data['PriceStructures'] = PriceStructure::where('price_structure_status', 1)->where('price_structure_approve_status', 1)->get(); //price_structure_approve_status = 1 ส่งอนุมัติ
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['Status'] = [
            1=>'รอส่งให้ลูกค้า',
            2=>'ส่งให้ลูกค้าแล้ว รอตอบกลับ',
            3=>'ลูกค้าขอแก้เพิ่มเติม',
            4=>'ลูกค้าตอบกลับพร้อมเซ็นเอกสารแล้ว',
            5=>'ส่งอนุมัติ Pre-Approve',
            99=>'ลูกค้าไม่เอา(ยกเลิกใบเสนอราคา)',
            0=>'ยกเลิก'
        ];
        $StaffCost = StaffCost::where('staff_expenses_status', 1)->get();
        $OtherExpenses = OtherExpenses::where('other_expenses_status', 1)->get();
        $InsuranceFee = InsuranceFee::where('insurance_fee_status', 1)->get();
        $expenses = [];
        foreach($StaffCost as $key_1=>$val){
            $expenses['S']['name'] = "Staff cost";
            $expenses['S']['expense'][$key_1]['id'] = $val->staff_expenses_id;
            $expenses['S']['expense'][$key_1]['name'] = $val->staff_expenses_name;
        }
        foreach($OtherExpenses as $key_2=>$val){
            $key_2 = ($key_2+1)+$key_1;
            $expenses['O']['name'] = "Other expenses";
            $expenses['O']['expense'][$key_2]['id'] = $val->other_expenses_id;
            $expenses['O']['expense'][$key_2]['name'] = $val->other_expenses_name;
        }
        foreach($InsuranceFee as $key_3=>$val){
            $key_3 = ($key_3+1)+$key_2;
            $expenses['I']['name'] = "Insurance Fee";
            $expenses['I']['expense'][$key_3]['id'] = $val->insurance_fee_id;
            $expenses['I']['expense'][$key_3]['name'] = $val->insurance_fee_name;
        }
        $data['Expenses'] = $expenses;
        if(Helper::CheckPermissionMenu('Quotation' , '1')){
            return view('admin.Quotation.quotation', $data);
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
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Quotation')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Companies'] = Company::where('company_status', 1)->get();
        $data['admin'] = Auth::guard('admin')->user();
        $data['RunCodes'] = RunCode::where('run_code_status', 1)->where('run_code_type', 8)->get(); //(8) แบบฟอร์ม Quotation (ไทย - อังกฤษ) F#4
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['Status'] = [
            1=>'รอส่งให้ลูกค้า',
            2=>'ส่งให้ลูกค้าแล้ว รอตอบกลับ',
            3=>'ลูกค้าขอแก้เพิ่มเติม',
            4=>'ลูกค้าตอบกลับพร้อมเซ็นเอกสารแล้ว',
            5=>'ส่งอนุมัติ Pre-Approve',
            99=>'ลูกค้าไม่เอา(ยกเลิกใบเสนอราคา)',
            0=>'ยกเลิก'
        ];
        if(Helper::CheckPermissionMenu('Quotation' , '1')){
            return view('admin.Quotation.quotation_create', $data);
        }else{
            return redirect('admin/');
        }
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
        $run_code_id = $input_all['run_code_id'];
        $validator = Validator::make($request->all(), [
            'quotation_date_doc' => 'required',
            'quotation_due_date_count' => 'required',
            'quotation_due_date' => 'required',
            'run_code_id' => 'required',
            'company_id' => 'required',
            'quotation_title' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                unset($input_all['run_code_id']);
                $admin = Auth::guard('admin')->user();
                $RunCode = RunCode::find($run_code_id);
                $Company = Company::with('CreditTermActive')->find($input_all['company_id']);
                $Quotation = new Quotation;
                foreach($input_all as $key=>$val){
                    $Quotation->{$key} = $val;
                }
                $Quotation->admin_id = $admin->admin_id;
                $Quotation->quotation_status = 1;
                $Quotation->quotation_full_code = Helper::RunDocNo($run_code_id, true);
                $Quotation->quotation_run_code_details = $RunCode->run_code_details;
                $Quotation->quotation_credit_term = $Company->CreditTermActive ? $Company->CreditTermActive->credit_term_amount : 0;
                $Quotation->save();

                $QuotationPreApproveDetails = new QuotationPreApproveDetails;
                $QuotationPreApproveDetails->quotation_id = $Quotation->quotation_id;
                $QuotationPreApproveDetails->save();
                \DB::commit();
                $return['quotation_id'] = $Quotation->quotation_id;
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
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['quotation_date_doc']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Creation date is required";
            }
            if (isset($failedRules['quotation_due_date_count']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Number of due date is required";
            }
            if (isset($failedRules['quotation_due_date']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Due date is required";
            }
            if (isset($failedRules['ran_code_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Quotation run number is required";
            }
            if (isset($failedRules['company_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Company is required";
            }
            if (isset($failedRules['quotation_title']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Contact info is required";
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
        // $content = Quotation::find($id);
        $content['quotation'] = Quotation::with('Customer.Districts.Provinces','Company','Customer.Districts.Amphures', 'Customer.Districts.Zipcode', 'QuotationPriceListMain.QuotationPriceListOt')->find($id);
        $content['PriceStructureOT'] = PriceStructureOT::where('price_structure_ot_status', 1)->get();

        $return['status'] = 1;
        $return['title'] = 'Get Quotation';
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
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Quotation')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Companies'] = Company::where('company_status', 1)->get();
        $data['admin'] = Auth::guard('admin')->user();
        $data['RunCodes'] = RunCode::where('run_code_status', 1)->where('run_code_type', 8)->get(); //(8) แบบฟอร์ม Quotation (ไทย - อังกฤษ) F#4
        $data['PriceStructures'] = PriceStructure::where('price_structure_status', 1)->where('price_structure_approve_status', 1)->get(); //price_structure_approve_status = 1 ส่งอนุมัติ
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['Status'] = [
            1=>'รอส่งให้ลูกค้า',
            2=>'ส่งให้ลูกค้าแล้ว รอตอบกลับ',
            3=>'ลูกค้าขอแก้เพิ่มเติม',
            4=>'ลูกค้าตอบกลับพร้อมเซ็นเอกสารแล้ว',
            5=>'ส่งอนุมัติ Pre-Approve',
            99=>'ลูกค้าไม่เอา(ยกเลิกใบเสนอราคา)',
            0=>'ยกเลิก'
        ];
        $quotation = Quotation::with([
              'AdminUser',
              'QuotationPriceListMain.QuotationPriceListOt.PriceStructureOT',
              'QuotationPriceListMainItem.PriceStructureHasStaffExpense.StaffCost',
          ])->find($id);
        $data['Quotation'] = $quotation;
        $data['Customers'] = ContactInfo::where('company_id', $quotation->company_id)->get();
        $ExpensesMainItem = [];
        foreach($quotation->QuotationPriceListMain as $key_main=>$QuotationPriceListMain){
            $QuotationPriceListMainItem = QuotationPriceList::with('StaffCost', 'OtherExpenses', 'InsuranceFee')
                ->where('main_quotation_price_list_id', $QuotationPriceListMain->quotation_price_list_id)
                ->where('quotation_price_list_main_item', 1)
                ->get();
            foreach($QuotationPriceListMainItem as $key_sub=>$val){
                $name = '';
                if($val->staff_expenses_id || $val->other_expenses_id || $val->insurance_fee_id){
                    if($val->staff_expenses_id){
                      $name = $val->StaffCost ? $val->StaffCost->staff_expenses_name : '';
                    }elseif($val->other_expenses_id){
                      $name = $val->OtherExpenses ? $val->OtherExpenses->other_expenses_name : '';
                    }elseif($val->insurance_fee_id){
                      $name = $val->InsuranceFee ? $val->InsuranceFee->insurance_fee_name : '';
                    }
                    $ExpensesMainItem[$val->quotation_price_list_id][$key_sub]['no'] = ($key_main+1).'.'.($key_sub+1);
                    $ExpensesMainItem[$val->quotation_price_list_id][$key_sub]['name'] = $name;
                    $ExpensesMainItem[$val->quotation_price_list_id][$key_sub]['price'] = number_format($val->quotation_price_list_price, 2);
                }
            }
        }
        $data['ExpensesMainItem'] = $ExpensesMainItem;
        $staff_cost = StaffCost::where('staff_expenses_status', 1)->get();
        $other_expenses = OtherExpenses::where('other_expenses_status', 1)->get();
        $insurance_fee = InsuranceFee::where('insurance_fee_status', 1)->get();
        $expenses = [];
        foreach($staff_cost as $key_1=>$val){
            $expenses['S']['name'] = "Staff cost";
            $expenses['S']['expense'][$key_1]['id'] = $val->staff_expenses_id;
            $expenses['S']['expense'][$key_1]['name'] = $val->staff_expenses_name;
        }
        foreach($other_expenses as $key_2=>$val){
            $key_2 = ($key_2+1)+$key_1;
            $expenses['O']['name'] = "Other expenses";
            $expenses['O']['expense'][$key_2]['id'] = $val->other_expenses_id;
            $expenses['O']['expense'][$key_2]['name'] = $val->other_expenses_name;
        }
        foreach($insurance_fee as $key_3=>$val){
            $key_3 = ($key_3+1)+$key_2;
            $expenses['I']['name'] = "Insurance Fee";
            $expenses['I']['expense'][$key_3]['id'] = $val->insurance_fee_id;
            $expenses['I']['expense'][$key_3]['name'] = $val->insurance_fee_name;
        }
        $data['Expenses'] = $expenses;
        if(Helper::CheckPermissionMenu('Quotation' , '1')){
            return view('admin.Quotation.quotation_edit', $data);
        }else{
            return redirect('admin/');
        }
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
        if(isset($input_all['quotation_price_list'])){
            $quotation_price_list = $input_all['quotation_price_list'];
            unset($input_all['quotation_price_list']);
        }
        if(isset($quotation_price_list) && count($quotation_price_list) > 0){
            $validator = Validator::make($request->all(), [

            ]);
            if (!$validator->fails()) {
                \DB::beginTransaction();
                try {
                    $Company = Company::with('CreditTermActive')->find($input_all['company_id']);
                    $Quotation = Quotation::find($id);
                    foreach($input_all as $key=>$val){
                        $Quotation->{$key} = $val;
                    }
                    if($Quotation->quotation_vat){
                        $Quotation->quotation_vat = str_replace(',', '', $Quotation->quotation_vat);
                    }
                    if($Quotation->quotation_price){
                        $Quotation->quotation_price = str_replace(',', '', $Quotation->quotation_price);
                    }
                    if($Quotation->quotation_cost){
                        $Quotation->quotation_cost = str_replace(',', '', $Quotation->quotation_cost);
                    }
                    if($Quotation->quotation_margin){
                        $Quotation->quotation_margin = str_replace(',', '', $Quotation->quotation_margin);
                    }
                    $Quotation->quotation_credit_term = $Company->CreditTermActive ? $Company->CreditTermActive->credit_term_amount : 0;
                    $Quotation->save();
                    foreach($quotation_price_list as $val){
                        if(isset($val['quotation_price_list_ot'])){
                            $quotation_price_list_ot = $val['quotation_price_list_ot'];
                            unset($val['quotation_price_list_ot']);
                        }

                        $QuotationPriceList = QuotationPriceList::find($val['quotation_price_list_id']);
                        foreach($val as $key=>$data){
                            $QuotationPriceList->{$key} = $data;
                        }
                        if(isset($val['quotation_price_list_ot_status']) && $val['quotation_price_list_ot_status'] && $QuotationPriceList->quotation_price_list_guarantee_ot_price){
                            $QuotationPriceList->quotation_price_list_guarantee_ot_price = str_replace(',', '', $QuotationPriceList->quotation_price_list_guarantee_ot_price);
                        }
                        if($QuotationPriceList->quotation_price_list_cost){
                            $QuotationPriceList->quotation_price_list_cost = str_replace(',', '', $QuotationPriceList->quotation_price_list_cost);
                        }
                        if($QuotationPriceList->quotation_price_list_price){
                            $QuotationPriceList->quotation_price_list_price = str_replace(',', '', $QuotationPriceList->quotation_price_list_price);
                        }
                        if($QuotationPriceList->quotation_price_list_accomadation_sale){
                            $QuotationPriceList->quotation_price_list_accomadation_sale = str_replace(',', '', $QuotationPriceList->quotation_price_list_accomadation_sale);
                            $QuotationPriceList->quotation_price_list_accomadation = str_replace(',', '', $QuotationPriceList->quotation_price_list_accomadation_sale);
                        }
                        if($QuotationPriceList->quotation_price_list_taxi_price_sale){
                            $QuotationPriceList->quotation_price_list_taxi_price_sale = str_replace(',', '', $QuotationPriceList->quotation_price_list_taxi_price_sale);
                            $QuotationPriceList->quotation_price_list_taxi_price = str_replace(',', '', $QuotationPriceList->quotation_price_list_taxi_price_sale);
                        }
                        if($QuotationPriceList->quotation_price_list_travel_sale){
                            $QuotationPriceList->quotation_price_list_travel_sale = str_replace(',', '', $QuotationPriceList->quotation_price_list_travel_sale);
                            $QuotationPriceList->quotation_price_list_travel = str_replace(',', '', $QuotationPriceList->quotation_price_list_travel_sale);
                        }
                        if(!isset($val['quotation_price_list_service_charge_price_status'])){
                            $QuotationPriceList->quotation_price_list_service_charge_price_status = 0;
                        }
                        $QuotationPriceList->save();
                        if(isset($quotation_price_list_ot)){
                            if(isset($val['quotation_price_list_ot_status']) && $val['quotation_price_list_ot_status'] == 2){
                                foreach($quotation_price_list_ot as $val){
                                    $QuotationPriceListOt = QuotationPriceListOt::where('quotation_id', $id)->where('price_structure_ot_id', $val['price_structure_ot_id'])->where('quotation_price_list_id', $QuotationPriceList->quotation_price_list_id)->first();
                                    if(!$QuotationPriceListOt){
                                        $QuotationPriceListOt = new QuotationPriceListOt;
                                    }
                                    $QuotationPriceListOt->quotation_id = $id;
                                    $QuotationPriceListOt->price_structure_ot_id = $val['price_structure_ot_id'];
                                    $QuotationPriceListOt->quotation_price_list_id = $QuotationPriceList->quotation_price_list_id;
                                    if($val['quotation_price_list_ot_price']){
                                        $QuotationPriceListOt->quotation_price_list_ot_price = str_replace(',', '', $val['quotation_price_list_ot_price']);
                                    }
                                    $QuotationPriceListOt->save();
                                }
                            }else{
                                QuotationPriceListOt::where('quotation_price_list_id', $val['quotation_price_list_id'])->delete();
                            }
                        }else{
                            QuotationPriceListOt::where('quotation_price_list_id', $val['quotation_price_list_id'])->delete();
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
            }else{
                $failedRules = $validator->failed();
                $return['content'] = 'Unsuccess';
                if(isset($failedRules['name_prefix_name']['required'])) {
                    $return['status'] = 2;
                    $return['title'] = "Name Prefix is required";
                }
            }
        }else{
            $return['status'] = 0;
            $return['content'] = 'Data not found.';
        }
        $return['title'] = 'Insert';
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
        $result = Quotation::select(
            'quotation.quotation_id'
            ,'quotation.quotation_full_code'
            ,'quotation.quotation_title'
            ,'quotation.quotation_price'
            ,'quotation.quotation_date_doc'
            ,'quotation.quotation_due_date'
            ,'quotation.quotation_status'
            ,'company.company_name_th'
            ,'customer.customer_name'
            ,'admin_user.first_name'
            ,'admin_user.last_name'
        )
        ->leftjoin('company', 'company.company_id', 'quotation.company_id')
        ->leftjoin('customer', 'customer.customer_id', 'quotation.customer_id')
        ->leftjoin('admin_user', 'admin_user.admin_id', 'quotation.admin_id')
        ->with('QuotationPreApproveDetails', 'ConfirmQuotationOnline', 'QuotationPreApproveLast');
        $company_id = $request->input('company_id');
        $customer_id = $request->input('customer_id');
        $admin_id = $request->input('admin_id');
        $quotation_full_code = $request->input('quotation_full_code');
        $quotation_title = $request->input('quotation_title');
        $quotation_status = $request->input('quotation_status');
        $quotation_date_doc = $request->input('quotation_date_doc');
        $quotation_due_date = $request->input('quotation_due_date');
        if($company_id){
            $result->where('quotation.company_id', $company_id);
        }
        if($customer_id){
            $result->where('quotation.customer_id', $customer_id);
        }
        if($admin_id){
            $result->where('quotation.admin_id', $admin_id);
        }
        if($quotation_full_code){
            $result->where('quotation.quotation_full_code', 'like', '%'.$quotation_full_code.'%');
        }
        if($quotation_status){
            $result->where('quotation.quotation_status', $quotation_status);
        }
        if($quotation_date_doc){
            $result->whereBetween('quotation.quotation_date_doc', [$quotation_date_doc.' 00:00:00', $quotation_date_doc.' 23:59:59']);
        }
        if($quotation_due_date){
            $result->whereBetween('quotation.quotation_due_date', [$quotation_due_date.' 00:00:00', $quotation_due_date.' 23:59:59']);
        }
        return Datatables::of($result)
          ->editColumn('quotation_price' , function($res){
              return number_format($res->quotation_price, 2);
          })
          ->editColumn('quotation_date_doc' , function($res){
              return $res->quotation_date_doc ? date('d/m/Y', strtotime($res->quotation_date_doc)) : '';
          })
          ->editColumn('quotation_due_date' , function($res){
              return $res->quotation_due_date ? date('d/m/Y', strtotime($res->quotation_due_date)) : '';
          })
          ->addColumn('admin_name' , function($res){
            return $res->first_name.' '.$res->last_name;
          })
          ->addColumn('line_approve' , function($res){
              if($res->QuotationPreApproveLast && $res->QuotationPreApproveLast->quotation_pre_approve_status=='98'){
                  $color = 'warning';
              }else{
                  $color = 'success';
              }
              $level = $res->QuotationPreApproveLast ? $res->QuotationPreApproveLast->quotation_pre_approvec_lv : '';
              $str = '<button type="button" class="btn btn-md btn-'.$color.' LineApprove" data-toggle="modal" data-target="#LineApproveModal" data-quotation_id="'.$res->quotation_id.'">Pre Approve Level '.$level.'</button>';
              return $str;
          })
          ->addColumn('pre_approve' , function($res){
            $str = '';
            if(count($res->ConfirmQuotationOnline) > 0 && $res->quotation_status != 5 && $res->QuotationPreApproveDetails){
                $str = '<button type="button" class="btn btn-circle btn-warning text-white btn-send-pre-approve" data-id="'.$res->quotation_id.'" data-detail-id="'.$res->QuotationPreApproveDetails->quotation_pre_approve_details_id.'">
                            <i class="fas fa-paper-plane"></i>
                        </button>';
            }
            return $str;
          })
          ->editColumn('quotation_status' , function($res){
                $quotation_status_1 = '';
                $quotation_status_2 = '';
                $quotation_status_3 = '';
                $quotation_status_4 = '';
                $quotation_status_5 = '';
                $quotation_status_6 = '';
                $quotation_status_0 = '';
                $quotation_disabled = '';
                if($res->quotation_status == 1){
                    $quotation_status_1 = 'selected';
                }elseif($res->quotation_status == 2){
                    $quotation_status_2 = 'selected';
                }elseif($res->quotation_status == 3){
                    $quotation_status_3 = 'selected';
                }elseif($res->quotation_status == 4){
                    $quotation_status_4 = 'selected';
                }elseif($res->quotation_status == 5){
                    $quotation_status_5 = 'selected';
                    $quotation_disabled = 'disabled';
                }elseif($res->quotation_status == 6){
                    $quotation_status_6 = 'selected';
                }elseif($res->quotation_status == 0){
                    $quotation_status_0 = 'selected';
                }
                if($res->quotation_status == 5){
                  $str = '<select class="form-control custom-select change-status-select2 change-quotation-status" data-id="'.$res->quotation_id.'" '.$quotation_disabled.'>
                              <option value="5" '.$quotation_status_5.'>ส่งอนุมัติ Pre-Approve</option>
                          </select>';
                }else{
                  $str = '<select class="form-control custom-select change-status-select2 change-quotation-status" data-id="'.$res->quotation_id.'" '.$quotation_disabled.'>
                              <option value="">----Select----</option>
                              <option value="1" '.$quotation_status_1.'>รอส่งให้ลูกค้า</option>
                              <option value="2" '.$quotation_status_2.'>ส่งให้ลูกค้าแล้ว รอตอบกลับ</option>
                              <option value="3" '.$quotation_status_3.'>ลูกค้าขอแก้เพิ่มเติม</option>
                              <option value="4" '.$quotation_status_4.'>ลูกค้าตอบกลับพร้อมเซ็นเอกสารแล้ว</option>
                              <option value="6" '.$quotation_status_6.'>ลูกค้าไม่เอา(ยกเลิกใบเสนอราคา)</option>
                              <option value="0" '.$quotation_status_0.'>ยกเลิก</option>
                          </select>';
                }

              return $str;
          })
          ->addColumn('action' , function($res){
              $view = Helper::CheckPermissionMenu('Quotation' , '1');
              $insert = Helper::CheckPermissionMenu('Quotation' , '2');
              $update = Helper::CheckPermissionMenu('Quotation' , '3');
              $delete = Helper::CheckPermissionMenu('Quotation' , '4');
              $quotation_pre_approve_details_id = $res->QuotationPreApproveDetails ? $res->QuotationPreApproveDetails->quotation_pre_approve_details_id : '';
            //   $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->quotation_id.'">View</button>';
            //   $btnEdit = '<a href="'.url('admin/Quotation/'.$res->quotation_id.'/edit').'" class="btn btn-info btn-md">Edit</a>';
            //   $btnDetail = '<button type="button" class="btn btn-warning btn-md btn-detail" data-quotation-id="'.$res->quotation_id.'" data-id="'.$quotation_pre_approve_details_id.'">Detail</button>';
            //   $btnFile = '<button type="button" class="btn btn-success btn-md btn-file" data-quotation-id="'.$res->quotation_id.'">File</button>';
            //   $btnPrintQuotation = '<a href="'.url('admin/Quotation/PrintQuotatuon/'.$res->quotation_id).'" class="btn btn-primary btn-md" target="_blank">Print Quotation</a>';
            //   $btnConfirmLetter = '<button type="button" class="btn btn-info btn-md btn-confirm-letter" data-id="'.$res->quotation_id.'">Confirm Letter</button>';
            //   $btnPrintConfirmLetter = '<a href="'.url('admin/Quotation/PrintConfirmLeter/'.$res->quotation_id).'" class="btn btn-primary btn-md" target="_blank">Print Confirm Letter</a>';
            //   $btnGrouping = '<button type="button" class="btn btn-success btn-md btn-grouping" data-id="'.$res->quotation_id.'">Grouping</button>';
            //   $str = '';
            //   if($view){
            //       // $str.=' '.$btnView;
            //   }
            //   if($update){
            //       $str.=' '.$btnEdit;
            //   }
            //   $str.=' '.$btnDetail;
            //   $str.=' '.$btnFile;
            //   $str.=' '.$btnPrintQuotation;
            //   $str.=' '.$btnConfirmLetter;
            //   $str.=' '.$btnPrintConfirmLetter;
            //   $str.=' '.$btnGrouping;
            $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            if ($view) {
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-id="'.$res->quotation_id.'">View</a>';
            }
            if ($update) {
                $str .= '<a class="dropdown-item" href="'.url('admin/Quotation/'.$res->quotation_id.'/edit').'">Edit</a>';
            }
            // $str .= '<a class="dropdown-item btn-detail" href="javascript:void(0)" data-quotation-id="'.$res->quotation_id.'" data-id="'.$quotation_pre_approve_details_id.'">Detail</a>';
            $str .= '<a class="dropdown-item btn-file" href="javascript:void(0)" data-quotation-id="'.$res->quotation_id.'">File</a>';
            $str .= '<a class="dropdown-item" href="'.url('admin/Quotation/PrintQuotatuon/'.$res->quotation_id).'" target="_blank">Print Quotation</a>';
            $str .= '<a class="dropdown-item btn-confirm-letter" href="javascript:void(0)" data-id="'.$res->quotation_id.'">Confirm Letter</a>';
            $str .= '<a class="dropdown-item" href="'.url('admin/Quotation/PrintConfirmLeter/'.$res->quotation_id).'" class="btn btn-primary btn-md" target="_blank">Print Confirm Letter</a>';
            $str .= '<a class="dropdown-item btn-grouping" href="javascript:void(0)" data-id="'.$res->quotation_id.'">Grouping</a>';
            $str .= '</div>';
            $str .= '</div>';
              return $str;
          })
          ->addIndexColumn()
          ->rawColumns(['action', 'quotation_status', 'line_approve', 'pre_approve'])
          ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $Quotation = Quotation::find($id);
            $Quotation->quotation_status = $request->input('status');
            $Quotation->save();
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

    public function SendPreApprove(Request $request, $id)
    {
        $admin = Auth::guard('admin')->user();
        $quotation_pre_approve_details_id = $request->input('quotation_pre_approve_details_id');
        \DB::beginTransaction();
        try {
            $Quotation = Quotation::find($id);
            $Quotation->quotation_status = 5;
            $Quotation->save();

            $QuotationLineApprove = QuotationLineApprove::select('quotation_line_approve_lv')->groupBy('quotation_line_approve_lv')->get();
            foreach($QuotationLineApprove as $key=>$val){
                $QuotationPreApprove = new QuotationPreApprove;
                if($key == 0){
                    $QuotationPreApprove->quotation_pre_approve_date_send = date('Y-m-d H:i:s');
                }
                $QuotationPreApprove->admin_id = $admin->admin_id;
                $QuotationPreApprove->quotation_id = $Quotation->quotation_id;
                $QuotationPreApprove->quotation_pre_approve_details_id = $quotation_pre_approve_details_id;
                $QuotationPreApprove->quotation_pre_approvec_lv = $val->quotation_line_approve_lv;
                $QuotationPreApprove->save();
            }
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

    public function PrintQuotatuon($id)
    {
        $data['quotation'] = Quotation::with('Customer.Districts.Provinces', 'Customer.Districts.Amphures', 'Customer.Districts.Zipcode', 'QuotationPriceListMain.QuotationPriceListOt')->find($id);
        $data['PriceStructureOT'] = PriceStructureOT::where('price_structure_ot_status', 1)->get();
        $pdf = PDF::loadView('admin.Quotation.quotation_print', $data);
        return $pdf->stream('quotation_print.pdf');
    }


    public function PreApproveQuotationView($id){
        $data['quotation'] = Quotation::with('Customer.Districts.Provinces', 'Customer.Districts.Amphures', 'Customer.Districts.Zipcode', 'QuotationPriceListMain.QuotationPriceListOt')->find($id);
        $data['PriceStructureOT'] = PriceStructureOT::where('price_structure_ot_status', 1)->get();
        return view('admin.PreApprove.Modal.modal_viewquotation', $data);
    }

    public function PrintConfirmLeter($id)
    {
        $data['quotation'] = Quotation::with('Customer.Districts.Provinces', 'Customer.Districts.Amphures', 'Customer.Districts.Zipcode', 'QuotationPriceListMain.QuotationPriceListOt')->find($id);
        $data['PriceStructureOT'] = PriceStructureOT::where('price_structure_ot_status', 1)->get();
        $pdf = PDF::loadView('admin.Quotation.confirm_leter_print', $data);
        return $pdf->stream('confirm_leter_print.pdf');
    }
}
