<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;

use App\CustomerContract;
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

class ApproveContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','ApproveContract')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if(Helper::CheckPermissionMenu('ApproveContract' , '1')){
            return view('admin.ApproveContract.approve_contract', $data);
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
        $data = $request->param;
        $action = $data[1]['value'];
        $cus_id = $data[2]['value'];
        $comment= $data[3]['value'];

        if($action=='approve'){
            $result = CustomerContract::where('customer_contract_id', $cus_id)
                                        ->update([
                                            'customer_contract_status' => 3,
                                            'customer_contract_date_approve' => $comment
                                        ]);
        }else if($action=='reject'){
            $result = CustomerContract::where('customer_contract_id', $cus_id)
                                        ->update([
                                            'customer_contract_status' => 1,
                                            'customer_contract_comment_cancel' => $comment
                                        ]);
        }

        if ($result) {
            return '1';
        } else {
            return '0';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['content'] = CustomerContract::find($id);
        return view('admin.ApproveContract.Modal.modal_productview', $data);
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
        //
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
            ,'quotation.quotation_unit'
            ,'company.company_name_th'
            ,'customer.customer_name'
            ,'admin_user.first_name'
            ,'admin_user.last_name'
            ,'customer_contract.customer_contract_full_code'
            ,'customer_contract.customer_contract_status'
            ,'customer_contract.customer_contract_id'
        )
        ->leftjoin('company', 'company.company_id', 'quotation.company_id')
        ->leftjoin('customer', 'customer.customer_id', 'quotation.customer_id')
        ->leftjoin('admin_user', 'admin_user.admin_id', 'quotation.admin_id')
        ->leftjoin('customer_contract', 'customer_contract.quotation_id', 'quotation.quotation_id')
        ->where('customer_contract.customer_contract_status',2)
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
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" name="preapprove" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->quotation_pre_approve_id . '" data-lv="' . $res->quotation_pre_approvec_lv . '" data-quotation_id="' . $res->quotation_id . '" >
                        <label class="custom-control-label" for="checkbox-item-' . $res->quotation_pre_approve_id . '"  style="cursor:pointer"></label>
                        </div>';
                return $str;
            })
            ->editColumn('quotation_price' , function($res){
                return number_format($res->quotation_price, 2);
            })
            ->editColumn('quotation_date_doc' , function($res){
                return $res->quotation_date_doc ? date('d/m/Y', strtotime($res->quotation_date_doc)) : '';
            })
            ->editColumn('quotation_due_date' , function($res){
                return $res->quotation_due_date ? date('d/m/Y', strtotime($res->quotation_due_date)) : '';
            })

            ->editColumn('customer_contract_status', function($res){
                $status = $res->customer_contract_status;
                if($status == 0){ $str = 'รอสร้างสัญญา';
                }else if($status == 1){ $str = 'รอข้อมูลพนักงานประจำสัญญา/รอสัมภาษณ์พนักงาน';
                }else if($status == 2){ $str = 'ส่งอนุมัติ/รออนุมัติ';
                }else if($status == 3){ $str = 'อนุมัติรอเริ่มงาน';
                }else if($status == 4){ $str = 'อนุมัติเริ่มงาน';
                }else if($status == 9){ $str = 'ยกเลิก'; }
                return $str;
            })
            ->addColumn('action' , function($res){
                $str = '<button type="button" class="btn btn-success btn-md btnViewContract" data-toggle="modal" data-target="#productviewModal" data-customer_contract_id="'.$res->customer_contract_id.'">View contract</button>
                        <button type="button" class="btn btn-info btn-md btnBViewDoc" data-toggle="modal" data-target="#AttachContractModal" data-quotation_id="'.$res->quotation_id.'">View documents</button>
                        <button type="button" class="btn btn-info btn-md btn-view-driver" data-id="'.$res->quotation_id.'">View Driver</button>
                        <button type="button" class="btn btn-success btn-md btnApprove" data-toggle="modal" data-target="#ApproveModal" data-customer_contract_id="'.$res->customer_contract_id.'">Confirm</button>
                        <button type="button" class="btn btn-warning btn-md btnReject" data-toggle="modal" data-target="#CancelModal" data-customer_contract_id="'.$res->customer_contract_id.'">Reject</button>';
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'customer_contract_status'])
            ->make(true);

            // <button type="button" class="btn btn-success btn-md btnViewDriver" data-toggle="modal" data-target="#ViewDriverGroupModal" data-quotation_id="'.$res->quotation_id.'">View driver</button>

    }
}
