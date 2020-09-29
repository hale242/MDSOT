<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
use App\Helper;
use App\MenuSystem;
use App\PriceStructure;
use App\ItemCode;
use App\PriceStructureOT;
use App\PriceStructureOtHasPriceStructure;
use App\StaffCost;
use App\OtherExpenses;
use App\InsuranceFee;
use App\PriceStructureLineApprove;
use App\PriceStructureApprove;
use App\PriceStructureHasStaffExpense;
use App\OtherExpenseHasStaffExpense;
use App\InsuranceFeeHasStaffExpense;

class PriceStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','PriceStructure')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['ItemCodes'] = ItemCode::where('item_code_status', 1)->get();
          $data['PriceStructureOT'] = PriceStructureOT::where('price_structure_ot_status', 1)->get();
          $data['StaffCosts'] = StaffCost::where('staff_expenses_status', 1)->get();
          $data['StaffCosts'] = StaffCost::where('staff_expenses_status', 1)->get();
          $data['OtherExpenses'] = OtherExpenses::where('other_expenses_status', 1)->get();
          $data['InsuranceFee'] = InsuranceFee::where('insurance_fee_status', 1)->get();
          $data['types'] = [  0=>'คิดตามจำนวนตายตัว',
                              1=>'คิดตาม % ของเงินเดือน',
                              2=>'คิดตาม % ของเงินเดือนแต่มีค่าสูงสุด',
                              3=>'คิดตาม % ของเงินเดือนแต่มีค่าขั้นต่ำ',
                              4=>'คิดตาม % ของจำนวนที่กำหนด',
                              5=>'คิด % จากราคาขายทั้งหมด',
                              6=>'คิด % จากราคาต้นทุนทั้งหมด'
                           ];
          if(Helper::CheckPermissionMenu('PriceStructure' , '1')){
              return view('admin.PriceStructure.price_structure', $data);
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
        $price_structure_has = $input_all['price_structure_has'];
        unset($input_all['price_structure_has']);
        $validator = Validator::make($request->all(), [
            'price_structure_name' => 'required',
            'price_structure_date_start' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                $PriceStructure = new PriceStructure;
                foreach($input_all as $key=>$val){
                    $PriceStructure->{$key} = $val;
                }
                if($PriceStructure->price_structure_salary){
                    $PriceStructure->price_structure_salary = str_replace(',', '', $PriceStructure->price_structure_salary);
                }
                if($PriceStructure->price_structure_sale_price){
                    $PriceStructure->price_structure_sale_price = str_replace(',', '', $PriceStructure->price_structure_sale_price);
                }
                if($PriceStructure->price_structure_sum){
                    $PriceStructure->price_structure_sum = str_replace(',', '', $PriceStructure->price_structure_sum);
                }
                if($PriceStructure->price_structure_profit_price){
                    $PriceStructure->price_structure_profit_price = str_replace(',', '', $PriceStructure->price_structure_profit_price);
                }
                if($PriceStructure->price_structure_taxi_price){
                    $PriceStructure->price_structure_taxi_price = str_replace(',', '', $PriceStructure->price_structure_taxi_price);
                }
                if($PriceStructure->price_structure_taxi_price_sale){
                    $PriceStructure->price_structure_taxi_price_sale = str_replace(',', '', $PriceStructure->price_structure_taxi_price_sale);
                }
                if($PriceStructure->price_structure_travel){
                    $PriceStructure->price_structure_travel = str_replace(',', '', $PriceStructure->price_structure_travel);
                }
                if($PriceStructure->price_structure_travel_sale){
                    $PriceStructure->price_structure_travel_sale = str_replace(',', '', $PriceStructure->price_structure_travel_sale);
                }
                if($PriceStructure->price_structure_accomadation){
                    $PriceStructure->price_structure_accomadation = str_replace(',', '', $PriceStructure->price_structure_accomadation);
                }
                if($PriceStructure->price_structure_accomadation_sale){
                    $PriceStructure->price_structure_accomadation_sale = str_replace(',', '', $PriceStructure->price_structure_accomadation_sale);
                }
                $PriceStructure->admin_id = $admin->admin_id;
                $PriceStructure->price_structure_approve_status = 0;
                $PriceStructure->price_structure_status = 1;
                $PriceStructure->save();

                if($price_structure_has){
                    foreach($price_structure_has as $price_structure){
                        if(isset($price_structure['status'])){
                            unset($price_structure['status']);
                            if(!isset($price_structure['price_structure_ot_has_price_structure_status_ot'])){
                                $price_structure['price_structure_ot_has_price_structure_status_ot'] = 0;
                            }
                            $PriceStructureOtHasPriceStructure = new PriceStructureOtHasPriceStructure;
                            foreach($price_structure as $key=>$val){
                                $PriceStructureOtHasPriceStructure->{$key} = $val;
                            }
                            if($PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price){
                                $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price = str_replace(',', '', $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price);
                            }
                            if($PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price_sale){
                                $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price_sale = str_replace(',', '', $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price_sale);
                            }
                            $PriceStructureOtHasPriceStructure->price_structure_id = $PriceStructure->price_structure_id;
                            $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_status = 1;
                            $PriceStructureOtHasPriceStructure->save();
                        }
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
            if(isset($failedRules['price_structure_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price structure name is required";
            }
            if(isset($failedRules['price_structure_date_start']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Date start name is required";
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
        $content = PriceStructure::with('ItemCode', 'PriceStructureOtHasPriceStructure', 'PriceStructureHasStaffExpense.StaffCost', 'OtherExpenseHasStaffExpense.OtherExpenses', 'InsuranceFeeHasStaffExpense.InsuranceFee', 'PriceStructureApprove')->find($id);
        $content->price_structure_date_start = $content->price_structure_date_start ? date('Y-m-d', strtotime($content->price_structure_date_start)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get PriceStructure';
        $return['content'] = $content;
        $return['PriceStructureOT'] = PriceStructureOT::get();
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
        $price_structure_has = $input_all['price_structure_has'];
        unset($input_all['price_structure_has']);
        $validator = Validator::make($request->all(), [
            'price_structure_name' => 'required',
            'price_structure_date_start' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PriceStructure = PriceStructure::find($id);
                foreach($input_all as $key=>$val){
                    $PriceStructure->{$key} = $val;
                }
                if($PriceStructure->price_structure_salary){
                    $PriceStructure->price_structure_salary = str_replace(',', '', $PriceStructure->price_structure_salary);
                }
                if($PriceStructure->price_structure_sale_price){
                    $PriceStructure->price_structure_sale_price = str_replace(',', '', $PriceStructure->price_structure_sale_price);
                }
                if($PriceStructure->price_structure_sum){
                    $PriceStructure->price_structure_sum = str_replace(',', '', $PriceStructure->price_structure_sum);
                }
                if($PriceStructure->price_structure_profit_price){
                    $PriceStructure->price_structure_profit_price = str_replace(',', '', $PriceStructure->price_structure_profit_price);
                }
                if($PriceStructure->price_structure_taxi_price){
                    $PriceStructure->price_structure_taxi_price = str_replace(',', '', $PriceStructure->price_structure_taxi_price);
                }
                if($PriceStructure->price_structure_taxi_price_sale){
                    $PriceStructure->price_structure_taxi_price_sale = str_replace(',', '', $PriceStructure->price_structure_taxi_price_sale);
                }
                if($PriceStructure->price_structure_travel){
                    $PriceStructure->price_structure_travel = str_replace(',', '', $PriceStructure->price_structure_travel);
                }
                if($PriceStructure->price_structure_travel_sale){
                    $PriceStructure->price_structure_travel_sale = str_replace(',', '', $PriceStructure->price_structure_travel_sale);
                }
                if($PriceStructure->price_structure_accomadation){
                    $PriceStructure->price_structure_accomadation = str_replace(',', '', $PriceStructure->price_structure_accomadation);
                }
                if($PriceStructure->price_structure_accomadation_sale){
                    $PriceStructure->price_structure_accomadation_sale = str_replace(',', '', $PriceStructure->price_structure_accomadation_sale);
                }
                $PriceStructure->price_structure_approve_status = 0;
                $PriceStructure->price_structure_status = 1;
                $PriceStructure->save();

                if($price_structure_has){
                    foreach($price_structure_has as $price_structure){
                        if(isset($price_structure['status'])){
                            unset($price_structure['status']);
                            if(!isset($price_structure['price_structure_ot_has_price_structure_status_ot'])){
                                $price_structure['price_structure_ot_has_price_structure_status_ot'] = 0;
                            }
                            $PriceStructureOtHasPriceStructure = PriceStructureOtHasPriceStructure::where('price_structure_id', $id)->where('price_structure_ot_id', $price_structure['price_structure_ot_id'])->first();
                            if(!$PriceStructureOtHasPriceStructure){
                                $PriceStructureOtHasPriceStructure = new PriceStructureOtHasPriceStructure;
                            }
                            foreach($price_structure as $key=>$val){
                                $PriceStructureOtHasPriceStructure->{$key} = $val;
                            }
                            if($PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price){
                                $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price = str_replace(',', '', $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price);
                            }
                            if($PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price_sale){
                                $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price_sale = str_replace(',', '', $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_price_sale);
                            }
                            $PriceStructureOtHasPriceStructure->price_structure_id = $PriceStructure->price_structure_id;
                            $PriceStructureOtHasPriceStructure->price_structure_ot_has_price_structure_status = 1;
                            $PriceStructureOtHasPriceStructure->save();
                        }else{
                            PriceStructureOtHasPriceStructure::where('price_structure_id', $id)->where('price_structure_ot_id', $price_structure['price_structure_ot_id'])->delete();
                        }
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
            if(isset($failedRules['price_structure_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Price structure name is required";
            }
            if(isset($failedRules['price_structure_date_start']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Date start name is required";
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
      $result = PriceStructure::select(
          'price_structure.*',
          'item_code.item_code_name',
          'admin_applicant.first_name as admin_applicant_firstname',
          'admin_applicant.last_name as admin_applicant_lastname',
          'admin_approve.first_name as admin_approve_firstname',
          'admin_approve.last_name as admin_approve_lastname'
      )
      ->leftjoin('item_code', 'item_code.item_code_id', 'price_structure.item_code_id')
      ->leftjoin('admin_user as admin_applicant', 'admin_applicant.admin_id', 'price_structure.admin_id')
      ->leftjoin('admin_user as admin_approve', 'admin_approve.admin_id', 'price_structure.price_structure_approve_admin_id');
      $item_code_id = $request->input('item_code_id');
      $price_structure_name = $request->input('price_structure_name');
      if($item_code_id){
          $result->where('price_structure.item_code_id', $item_code_id);
      };
      if($price_structure_name){
          $result->where('price_structure.price_structure_name', 'like', '%'.$price_structure_name.'%');
      };
      return Datatables::of($result)
        ->editColumn('price_structure_sale_price' , function($res){
            return number_format($res->price_structure_sale_price, 2);
        })
        ->editColumn('price_structure_profit_price' , function($res){
            return number_format($res->price_structure_profit_price, 2);
        })
        ->editColumn('price_structure_date_start' , function($res){
            return $res->price_structure_date_start ? date('d/m/Y', strtotime($res->price_structure_date_start)) : '';
        })
        ->editColumn('price_structure_approve_status' , function($res){
            $str = ($res->price_structure_approve_status || $res->price_structure_approve_status == '0') ? $res->ApproveStatus[$res->price_structure_approve_status] : '';
            if($res->price_structure_approve_status == '0' || $res->price_structure_approve_status == 3){
                $str .= '<br><button type="button" class="btn btn-circle btn-warning text-white btn-approve" data-id="'.$res->price_structure_id.'" title="Send to approve"><i class="fas fa-paper-plane"></i></button>';
            }
            return $str;
        })
        ->addColumn('admin_name_applicant' , function($res){
          return $res->admin_applicant_firstname.' '.$res->admin_applicant_lastname;
        })
        ->addColumn('admin_name_approve' , function($res){
            return $res->admin_approve_firstname.' '.$res->admin_approve_lastname;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('PriceStructure' , '1');
            $insert = Helper::CheckPermissionMenu('PriceStructure' , '2');
            $update = Helper::CheckPermissionMenu('PriceStructure' , '3');
            $delete = Helper::CheckPermissionMenu('PriceStructure' , '4');
            $btnLineApprove = '';

            // $disabled = 'disabled';
            // if($res->price_structure_approve_status == '0' || $res->price_structure_approve_status == 3){
            //     $disabled = '';
            // }
            // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->price_structure_id.'">View</button>';
            // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->price_structure_id.'" '.$disabled.'>Edit</button>';
            // $btnStaffCost = '<button type="button" class="btn btn-primary btn-md btn-staff-cost" data-id="'.$res->price_structure_id.'" '.$disabled.'>Staff cost</button>';
            // $btnOtherExpenses = '<button type="button" class="btn btn-info btn-md btn-other-expenses" data-id="'.$res->price_structure_id.'" '.$disabled.'>Other expenses</button>';
            // $btnInsuranceFee = '<button type="button" class="btn btn-warning btn-md btn-insurance-fee" data-id="'.$res->price_structure_id.'" '.$disabled.'>Insurance Fee</button>';
            // if($res->price_structure_approve_status){
            //     $btnLineApprove = '<button type="button" class="btn btn-success btn-md btn-line-approve" data-id="'.$res->price_structure_id.'">Line approve</button>';
            // }

            // $str = '';
            // if($view){
            //     $str.=' '.$btnView;
            // }
            // if($update){
            //     $str.=' '.$btnEdit;
            // }
            // $str.=' '.$btnLineApprove;
            // $str.=' '.$btnStaffCost;
            // $str.=' '.$btnOtherExpenses;
            // $str.=' '.$btnInsuranceFee;
            // return $str;
            $disabled = 'style="pointer-events: none;color:gray"';
            if($res->price_structure_approve_status == '0' || $res->price_structure_approve_status == 3){
                $disabled = '';
            }
            $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            if ($view) {
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->price_structure_id . '">View</a>';
            }
            if($update){
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->price_structure_id . '" '.$disabled.'>Edit</a>';
            }
            if($res->price_structure_approve_status){
                $str .= '<a class="dropdown-item btn-line-approve" href="javascript:void(0)" data-toggle="modal" data-target="#LineApproveModal" data-id="' . $res->price_structure_id . '">Line approve</a>';
            }
            $str .= '<a class="dropdown-item btn-staff-cost" href="javascript:void(0)" data-toggle="modal" data-target="#StaffCostModal" data-id="' . $res->price_structure_id . '" '.$disabled.'>Staff cost</a>';
            $str .= '<a class="dropdown-item btn-other-expenses" href="javascript:void(0)" data-toggle="modal" data-target="#OtherModal" data-id="' . $res->price_structure_id . '" '.$disabled.'>Other expenses</a>';
            $str .= '<a class="dropdown-item btn-md btn-insurance-fee" href="javascript:void(0)" data-toggle="modal" data-target="#InsuranceFeeCostModal" data-id="' . $res->price_structure_id . '" '.$disabled.'>Insurance Fee</a>';
            
            $str .= '</div>';
            $str .= '</div>';
          
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['action', 'price_structure_approve_status'])
        ->make(true);
    }

    public function SendApprove(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $admin = Auth::guard('admin')->user();
            $sum_staff_cost_price = PriceStructureHasStaffExpense::where('price_structure_id', $id)->where('price_structure_has_staff_expenses_type', 1)->sum('price_structure_has_staff_expenses_price');
            $sum_other_expenses_price = OtherExpenseHasStaffExpense::where('price_structure_id', $id)->sum('other_expenses_has_staff_expenses_price');
            $sum_insurance_fee_price = InsuranceFeeHasStaffExpense::where('price_structure_id', $id)->sum('insurance_fee_has_staff_expenses_price');
            $sum_price = ($sum_staff_cost_price + $sum_other_expenses_price + $sum_insurance_fee_price);

            $PriceStructure = PriceStructure::find($id);
            $PriceStructure->price_structure_approve_admin_id = $admin->admin_id;
            $PriceStructure->price_structure_approve_status = 1;
            $PriceStructure->price_structure_sum = $PriceStructure->price_structure_salary + $sum_price;
            $PriceStructure->price_structure_profit_price = $PriceStructure->price_structure_sale_price - $sum_price;
            $PriceStructure->price_structure_profit_percen = ($PriceStructure->price_structure_profit_price * 100) / $PriceStructure->price_structure_sale_price;
            $PriceStructure->save();

            $CheckPriceStructureApprove = PriceStructureApprove::where('price_structure_id', $id)->orderBy('price_structure_approve_lv', 'asc')->get();
            if(count($CheckPriceStructureApprove) > 0){
                foreach($CheckPriceStructureApprove as $key=>$val){
                    $PriceStructureApprove = PriceStructureApprove::find($val->price_structure_approve_id);
                    if($key == 0){
                        $PriceStructureApprove->price_structure_approve_status = 1;
                        $PriceStructureApprove->price_structure_approve_date_send = date('Y-m-d H:i:s');
                        $PriceStructureApprove->price_structure_approve_date_approve = null;
                        $PriceStructureApprove->price_structure_approve_comment = null;
                        $PriceStructureApprove->admin_id = null;
                    }else{
                        $PriceStructureApprove->price_structure_approve_status = 0;
                        $PriceStructureApprove->price_structure_approve_date_send = null;
                        $PriceStructureApprove->price_structure_approve_date_approve = null;
                        $PriceStructureApprove->price_structure_approve_comment = null;
                        $PriceStructureApprove->admin_id = null;
                    }
                    $PriceStructureApprove->save();
                }
            }else{
                $PriceStructureLineApprove = PriceStructureLineApprove::select('price_structure_line_approve_lv')->where('price_structure_line_approve_status', 1)->groupBy('price_structure_line_approve_lv')->orderBy('price_structure_line_approve_lv', 'asc')->get();
                foreach($PriceStructureLineApprove as $key=>$val){
                    $PriceStructureApprove = new PriceStructureApprove;
                    $PriceStructureApprove->price_structure_id = $id;
                    $PriceStructureApprove->price_structure_approve_lv = $val->price_structure_line_approve_lv;
                    if($key == 0){
                        $PriceStructureApprove->price_structure_approve_date_send = date('Y-m-d H:i:s');
                        $PriceStructureApprove->price_structure_approve_status = 1;
                    }else{
                        $PriceStructureApprove->price_structure_approve_status = 0;
                    }
                    $PriceStructureApprove->save();
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
        $return['title'] = 'Update Status';
        return $return;
    }
}
