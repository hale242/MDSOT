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
use App\AdminUser;
use App\QuotationPreApproveDetails;
use App\QuotationLineApprove;
use App\QuotationPreApprove;
use App\ContactInfo;
use App\QuotationPriceList;
use App\QuotationPriceListOt;
use App\PriceStructureOT;

use App\SaleOrder;
use App\SaleOrderList;

use App\InvoiceOrder;
use App\InvoiceOrderList;

class ApproveDriverReleaseController extends Controller
{

    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','ApproveDriverRelease')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if(Helper::CheckPermissionMenu('ApproveDriverRelease' , '1')){
            return view('admin.ApproveDriverRelease.approve_driver_release', $data);
        }else{
            return redirect('admin/');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->param;
        $cus_id = $data[1]['value'];
        $approvedate = $data[2]['value'];
        $datestart = $data[3]['value'];
        $dateend = $data[4]['value'];

        $contract = CustomerContract::find($cus_id);
        $quotation = Quotation::with([
            'AdminUser',
            'Company',
            'Company.Districts',
            'Company.ContactInfo',
            'Customer'
        ])->find($contract->quotation_id);


        $monthloop = $contract->customer_contract_month; //จำนวนรอบสัญญา
        $saleorder_invoice = substr($quotation->company->company_bill_date,8,9); //วันกำหนดวางบิล
        $saleorder_invoice_start = substr($contract->customer_contract_date_start,8,9); //วันกำหนดวางบิล
        $saleorder_datestart    = $contract->customer_contract_date_start;
        $saleorder_dateend      = $contract->customer_contract_date_end;

        $quotation_pl = QuotationPriceList::where('quotation_id', $contract->quotation_id)
        ->whereNull('main_quotation_price_list_id')
        ->get();

        $total_amount = 0;
        foreach($quotation_pl as $pl){
            $total_amount += $pl->quotation_price_list_price;
        }

        /*===== Run code config =====*/
        $runcode_sale_order = 10;
        $runcode_sale_order_list = 12;
        $runcode_invoice_order = 13; //Service Charge
        $runcode_invoice_order_ot = 14; //Overtime
        /*===== Run code config =====*/


        $saleorder = new SaleOrder;
        $saleorder->quotation_id                = $contract->quotation_id;
        $saleorder->customer_contract_id        = $cus_id;
        $saleorder->company_id                  = $quotation->company_id;
        $saleorder->customer_id                 = $quotation->customer_id;
        $saleorder->admin_id                    = $quotation->admin_id;
        $saleorder->sale_order_details          = 'SERVICE CHARGE FOR DRIVER COST '.date('Y', strtotime($quotation->quotation_due_date));
        $saleorder->sale_order_number           = 1;
        $saleorder->sale_order_month            = $quotation->quotation_due_date;
        $saleorder->sale_order_sale_order_code  = Helper::RunDocNo($runcode_sale_order, true);;
        $saleorder->sale_order_term_payment     = $quotation->quotation_credit_term;
        $saleorder->sale_order_vat              = $quotation->quotation_vat;
        $saleorder->sale_order_net_total        = $total_amount;
        $saleorder->sale_order_amount           = $total_amount;
        $saleorder->sale_order_sub_total        = $total_amount;
        $saleorder->sale_order_date_invoice     = $saleorder_invoice;
        $saleorder->sale_order_date_start       = $saleorder_datestart;
        $saleorder->sale_order_date_end         = $saleorder_dateend;
        $saleorder->sale_order_status           = 0;
        $saleorder->save();

        $sale_order_id_last = SaleOrder::latest()->first();

        $sale_order_id = $sale_order_id_last->sale_order_id;
        $unit = $quotation->quotation_unit;

        /*==================================
            สร้าง Sale Order ตามรอบสํญญา
        ==================================*/
        // วันที่เริ่มต้น
        $date_order_start = $saleorder_datestart;
        $mYstart = date("Y-m", strtotime($date_order_start));

        // วันที่สิ้นสุด
        $date_order_last = $saleorder_dateend;

        // วันที่ตัดรอบบิล
        $billdate = $saleorder_invoice;
        $bdstart = date($mYstart."-".$billdate);
        $date_order_end_check = '';

        for($i=0;$i<$monthloop;$i++){

            if($date_order_start<$bdstart){ //วันที่เริ่ม น้อยกว่าวันที่วางบิล

                $date_order_end = date("Y-m-d", strtotime($bdstart." -1 day"));
                // echo $date_order_start." - ".$date_order_end."<br>";
                $this->insert_sale_order_list($sale_order_id, $saleorder_datestart, $unit, $total_amount, $date_order_start, $date_order_end, $i, $runcode_sale_order_list);
                $date_order_start = date("Y-m-d", strtotime($date_order_end." +1month"));

            }else{

                if($i==0){ //วันที่เริ่ม มากกว่าวันที่วางบิล

                    $date_order_end = date("Y-m-d", strtotime($bdstart." +1 month -1 day"));
                    $this->insert_sale_order_list($sale_order_id, $saleorder_datestart, $unit, $total_amount, $date_order_start, $date_order_end, $i, $runcode_sale_order_list);
                    // echo $date_order_start." - ".$date_order_end."<br>";

                }else{

                    $date_order_end = date("Y-m-d", strtotime($date_order_end." +1 day"));
                    $date_order_end_check = date("Y-m-d", strtotime($date_order_end." +1 month -1 day"));

                    if($date_order_end_check<$date_order_last){
                        if($date_order_end<$date_order_end_check){
                            // echo $date_order_end." - ".$date_order_end_check." x<br>";
                            $this->insert_sale_order_list($sale_order_id, $saleorder_datestart, $unit, $total_amount, $date_order_end, $date_order_end_check, $i, $runcode_sale_order_list);
                            $date_order_end = date("Y-m-d", strtotime($date_order_end." +1 month -1 day"));
                        }else{
                            $this->insert_sale_order_list($sale_order_id, $saleorder_datestart, $unit, $total_amount, $date_order_end, $date_order_end_check, $i, $runcode_sale_order_list);
                            // echo $date_order_end." - ".$date_order_end_check." x<br>";
                        }
                    }else{
                        $this->insert_sale_order_list($sale_order_id, $saleorder_datestart, $unit, $total_amount, $date_order_end, $date_order_last, $i, $runcode_sale_order_list);
                        // echo $date_order_end." - ".$date_order_last." f<br>";
                    }


                }

            }

        }
        /*==================================
            End สร้าง Sale Order ตามรอบสํญญา
        ==================================*/

        /*==================================
            ปรับสถานะ Customer Contract
        ==================================*/
        $result = CustomerContract::where('customer_contract_id', $cus_id)
        ->update([
            'customer_contract_status' => 4,
            'customer_contract_date_approve' => $approvedate,
            'customer_contract_date_start' => $datestart,
            'customer_contract_date_end' => $dateend
        ]);

        if ($result) {
            return '1';
        } else {
            return '0';
        }

    }

    ##=== สร้างรายการ Sale Order List ===##
    public function insert_sale_order_list($sale_order_id, $saleorder_datestart, $unit, $total_amount, $date_sale_order_start, $date_sale_order_end ,$i, $runcode_sale_order_list){

        $saleorderlist = new SaleOrderList;
        $saleorderlist->sale_order_id = $sale_order_id;
        $saleorderlist->sale_order_list_code            = Helper::RunDocNo($runcode_sale_order_list, true);
        $saleorderlist->sale_order_list_details         = 'SERVICE CHARGE FOR DRIVER COST ('.strtoupper(date("M", strtotime($saleorder_datestart." +".$i." Month"))).') '.date('Y', strtotime($saleorder_datestart." +".$i." Month"));
        $saleorderlist->sale_order_list_quantity        = $unit;
        $saleorderlist->sale_order_list_unit_price      = $total_amount;
        $saleorderlist->sale_order_list_discount        = 0;
        $saleorderlist->sale_order_list_amount          = $total_amount;
        $saleorderlist->sale_order_list_date_start      = $date_sale_order_start;
        $saleorderlist->sale_order_list_date_end        = $date_sale_order_end;
        $saleorderlist->sale_order_list_invoice_status  = 2;
        $saleorderlist->sale_order_list_bill_status     = 0;
        $saleorderlist->sale_order_list_status          = 0;
        $saleorderlist->save();

    }

    ##=== สร้างรายการ Invoice Order x2 ตามจำนวน Unit ===##
    public function insert_invoice_order(){

        $invoiceorder = new InvoiceOrder;
        $invoiceorder->admin_id                         = '';
        $invoiceorder->sale_order_list_id               = '';
        $invoiceorder->company_id                       = '';
        $invoiceorder->customer_id                      = '';
        $invoiceorder->customer_contract_id             = '';
        $invoiceorder->invoice_order_ole_invoice_id     = '';
        $invoiceorder->invoice_order_code               = '';
        $invoiceorder->invoice_order_date_invoice       = '';
        $invoiceorder->invoice_order_due_date           = '';
        $invoiceorder->invoice_order_term_payment       = '';
        $invoiceorder->invoice_order_remark             = '';
        $invoiceorder->invoice_order_condition          = '';
        $invoiceorder->invoice_order_amount             = '';
        $invoiceorder->invoice_order_discount           = '';
        $invoiceorder->invoice_order_subtotal           = '';
        $invoiceorder->invoice_order_net_total          = '';
        $invoiceorder->invoice_order_status             = '';
        $invoiceorder->save();

    }

    ##=== สร้างรายการ Invoice Order List ===##
    public function insert_invoice_order_list(){

        $invoicelist = new InvoiceOrderList;
        $invoicelist->invoice_order_id                   = '';
        $invoicelist->invoice_order_list_code            = '';
        $invoicelist->invoice_order_list_details         = '';
        $invoicelist->invoice_order_list_quantity        = '';
        $invoicelist->invoice_order_list_unit_price      = '';
        $invoicelist->invoice_order_list_discount        = '';
        $invoicelist->invoice_order_list_amount          = '';
        $invoicelist->invoice_order_list_date_start      = '';
        $invoicelist->invoice_order_list_date_end        = '';
        $invoicelist->invoice_order_list_status          = '';
        $invoicelist->save();
    }

    public function show($id)
    {
        $data['content'] = CustomerContract::find($id);
        return view('admin.ApproveDriverRelease.Modal.modal_approve', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

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
            ,'customer_contract.customer_contract_date_start'
            ,'customer_contract.customer_contract_date_end'
        )
        ->leftjoin('company', 'company.company_id', 'quotation.company_id')
        ->leftjoin('customer', 'customer.customer_id', 'quotation.customer_id')
        ->leftjoin('admin_user', 'admin_user.admin_id', 'quotation.admin_id')
        ->leftjoin('customer_contract', 'customer_contract.quotation_id', 'quotation.quotation_id')
        ->where('customer_contract.customer_contract_status',3)
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
            ->editColumn('customer_contract_date_start' , function($res){
                return $res->customer_contract_date_start ? date('d/m/Y', strtotime($res->customer_contract_date_start)) : '';
            })
            ->editColumn('customer_contract_date_end' , function($res){
                return $res->customer_contract_date_end ? date('d/m/Y', strtotime($res->customer_contract_date_end)) : '';
            })
            ->editColumn('quotation_unit' , function($res){
                $str = '<button type="button" class="btn btn-success btn-md btn-view-driver" data-toggle="modal" data-id="'.$res->quotation_id.'" data-customer_contract_id="'.$res->customer_contract_id.'">'.$res->quotation_unit.'</button>';
                return $str;
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

                $str = '<button type="button" class="btn btn-info btn-md btnApprove" data-toggle="modal" data-target="#ApproveModal" data-customer_contract_id="'.$res->customer_contract_id.'">Approve driver</button>';
                return $str;

            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'customer_contract_status', 'quotation_unit'])
            ->make(true);

            // <button type="button" class="btn btn-success btn-md btnViewDriver" data-toggle="modal" data-target="#ViewDriverGroupModal" data-quotation_id="'.$res->quotation_id.'">View driver</button>

    }
}
