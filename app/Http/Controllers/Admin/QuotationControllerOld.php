<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
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
        // dd($data['Expenses']);
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
                $Quotation = new Quotation;
                foreach ($input_all as $key => $val) {
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
                $Quotation->admin_id = $admin->admin_id;
                $Quotation->quotation_status = 1;
                $Quotation->quotation_full_code = Helper::RunDocNo($run_code_id, true);
                $Quotation->quotation_run_code_details = $RunCode->run_code_details;
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
        $content = Quotation::with('AdminUser')->find($id);
        $content->quotation_date_doc = $content->quotation_date_doc ? date('Y-m-d', strtotime($content->quotation_date_doc)) : '';
        $content->quotation_due_date = $content->quotation_due_date ? date('Y-m-d', strtotime($content->quotation_due_date)) : '';
        $return['ContactInfo'] = ContactInfo::where('company_id', $content->company_id)->get();;
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
        unset($input_all['run_code_id']);
        $validator = Validator::make($request->all(), [
            'quotation_date_doc' => 'required',
            'quotation_due_date_count' => 'required',
            'quotation_due_date' => 'required',
            'company_id' => 'required',
            'quotation_title' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                $Quotation = Quotation::find($id);
                foreach ($input_all as $key => $val) {
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
                $Quotation->admin_id = $admin->admin_id;
                $Quotation->save();
                \DB::commit();
                $return['quotation_id'] = $id;
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
                }elseif($res->quotation_status == 6){
                    $quotation_status_6 = 'selected';
                }elseif($res->quotation_status == 0){
                    $quotation_status_0 = 'selected';
                }
                $str = '<select class="form-control custom-select change-status-select2 change-quotation-status" data-id="'.$res->quotation_id.'">
                            <option value="">----Select----</option>
                            <option value="1" '.$quotation_status_1.'>รอส่งให้ลูกค้า</option>
                            <option value="2" '.$quotation_status_2.'>ส่งให้ลูกค้าแล้ว รอตอบกลับ</option>
                            <option value="3" '.$quotation_status_3.'>ลูกค้าขอแก้เพิ่มเติม</option>
                            <option value="4" '.$quotation_status_4.'>ลูกค้าตอบกลับพร้อมเซ็นเอกสารแล้ว</option>
                            <option value="5" '.$quotation_status_5.'>ส่งอนุมัติ Pre-Approve</option>
                            <option value="6" '.$quotation_status_6.'>ลูกค้าไม่เอา(ยกเลิกใบเสนอราคา)</option>
                            <option value="0" '.$quotation_status_0.'>ยกเลิก</option>
                        </select>';
              return $str;
          })
          ->addColumn('action' , function($res){
              $view = Helper::CheckPermissionMenu('Quotation' , '1');
              $insert = Helper::CheckPermissionMenu('Quotation' , '2');
              $update = Helper::CheckPermissionMenu('Quotation' , '3');
              $delete = Helper::CheckPermissionMenu('Quotation' , '4');
              $quotation_pre_approve_details_id = $res->QuotationPreApproveDetails ? $res->QuotationPreApproveDetails->quotation_pre_approve_details_id : '';
              $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->quotation_id.'">View</button>';
              $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->quotation_id.'">Edit</button>';
              $btnDetail = '<button type="button" class="btn btn-warning btn-md btn-detail" data-quotation-id="'.$res->quotation_id.'" data-id="'.$quotation_pre_approve_details_id.'">Detail</button>';
              $btnFile = '<button type="button" class="btn btn-success btn-md btn-file" data-quotation-id="'.$res->quotation_id.'">File</button>';
              $btnPrintQuotation = '<a href="#" class="btn btn-primary btn-md btn-print-quotation">Print Quotation</a>';
              $btnConfirmLetter = '<button type="button" class="btn btn-info btn-md btn-confirm-letter" data-id="'.$res->quotation_id.'">Confirm Letter</button>';
              $btnPrintConfirmLetter = '<a href="#" class="btn btn-primary btn-md btn-print_timesheet-confirm-letter">Print Confirm Letter</a>';
              $btnGrouping = '<button type="button" class="btn btn-success btn-md btn-grouping" data-id="'.$res->quotation_id.'">Grouping</button>';
              $btnOTSetting = '<a href="#" class="btn btn-info btn-md btn-print_timesheet-confirm-letter">OT Setting</a>';
              $str = '';
              if($view){
                  // $str.=' '.$btnView;
              }
              if($update){
                  $str.=' '.$btnEdit;
              }
              $str.=' '.$btnDetail;
              $str.=' '.$btnFile;
              // $str.=' '.$btnPrintQuotation;
              $str.=' '.$btnConfirmLetter;
              // $str.=' '.$btnPrintConfirmLetter;
              $str.=' '.$btnGrouping;
              // $str.=' '.$btnOTSetting;
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
            $Quotation->quotation_status = $request->input('status');;
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

    public function print_view()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Quotation')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        return view('admin.Quotation.print_view_quotation',$data);
    }
    public function print_view_confirm_letter()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Quotation')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        return view('admin.Quotation.print_view_confirm_letter',$data);
    }
    public function timesheet_contract_ot()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Quotation')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        return view('admin.Quotation.timesheet_contract_ot',$data);
    }
}
