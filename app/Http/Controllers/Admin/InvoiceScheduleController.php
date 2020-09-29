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
use App\SaleOrder;
use App\SaleOrderList;
use App\GF;

class InvoiceScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'InvoiceSchedule')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if (Helper::CheckPermissionMenu('InvoiceSchedule', '1')) {
            return view('admin.InvoiceSchedule.sale_order', $data);
        } else {
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function lists(Request  $request)
    {
        $result = Quotation::select(
            'quotation.quotation_id',
            'quotation.quotation_full_code',
            'quotation.quotation_title',
            'quotation.quotation_price',
            'quotation.quotation_date_doc',
            'quotation.quotation_due_date',
            'quotation.quotation_status',
            'quotation.quotation_unit',
            'company.company_name_th',
            'company.company_code',
            'customer.customer_name',
            'admin_user.first_name',
            'admin_user.last_name',
            'customer_contract.customer_contract_full_code',
            'customer_contract.customer_contract_status',
            'customer_contract.customer_contract_id',
            'customer_contract.customer_contract_date_start',
            'customer_contract.customer_contract_date_end',
            'sale_order.sale_order_id',
            'sale_order.sale_order_sale_order_code',
            'sale_order.sale_order_status',
            'sale_order.sale_order_bill_status'
            // 'quotation_price_list.quotation_price_list_id',
            // 'quotation_price_list.quotation_price_list_ot_status'
        )
        ->leftjoin('company', 'company.company_id', 'quotation.company_id')
        ->leftjoin('customer', 'customer.customer_id', 'quotation.customer_id')
        ->leftjoin('admin_user', 'admin_user.admin_id', 'quotation.admin_id')
        ->leftjoin('customer_contract', 'customer_contract.quotation_id', 'quotation.quotation_id')
        ->leftjoin('sale_order', 'sale_order.quotation_id', 'quotation.quotation_id')
        // ->leftjoin('quotation_price_list', 'quotation_price_list.quotation_id', 'quotation.quotation_id')
        ->where('customer_contract.customer_contract_status', 4)
        // ->whereNull('quotation_price_list.main_quotation_price_list_id')
        ->with('QuotationPreApproveDetails', 'ConfirmQuotationOnline', 'QuotationPreApproveLast');

        return DataTables::of($result)

            ->addColumn('customer_contract_date_start', function ($res) {
                return $res->customer_contract_date_start ? date('d/m/Y', strtotime($res->customer_contract_date_start)) : '';
            })
            ->addColumn('customer_contract_date_end', function ($res) {
                return $res->customer_contract_date_end ? date('d/m/Y', strtotime($res->customer_contract_date_end)) : '';
            })
            ->addColumn('quotation_date_doc', function ($res) {
                return $res->quotation_date_doc ? date('d/m/Y', strtotime($res->quotation_date_doc)) : '';
            })

            ->addColumn('quotation_price_list_ot_status', function ($res) {
                // return $res->quotation_price_list_ot_status;
                // return $res->quotation_price_list_id;
                return '';
            })

            ->addColumn('admin_name', function ($res) {
                $str = $res->first_name." ".$res->last_name;
                return $str;
            })

            ->addColumn('status', function ($res) {
                $sele = $res->sale_order_bill_status;
                $sel1 = ($sele==1) ? 'selected' : '';
                $sel2 = ($sele==2) ? 'selected' : '';
                $sel3 = ($sele==3) ? 'selected' : '';
                $str = '<select class="form-control custom-select search_table_select SliBtnCreateInvoiceAll" id="bill_status_main" name="bill_status_main" data-placeholder="" tabindex="1" data-sale_order_id="'.$res->sale_order_id.'">
                            <option value="0">Select</option>
                            <option value="1" '.$sel1.'>วางบิลภายในเดือน</option>
                            <option value="2" '.$sel2.'>วางบิลหลังให้บริการ</option>
                            <option value="3" '.$sel3.'>วางบิลก่อนให้บริการ</option>
                        </select>';
                return $str;
            })
            ->addColumn('action', function ($res) {
                $str = '<button type="button" class="btn btn-success btn-md ViewSchedule" data-toggle="modal" data-target="#ViewScheduleModal" data-quotation_id="'.$res->quotation_id.'">View</button>';
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function lists_sale_order(Request $request)
    {
        $result = SaleOrder::select(
            'sale_order_list.sale_order_list_id',
            'sale_order.quotation_id',
            'sale_order_list.sale_order_list_code',
            'sale_order_list.sale_order_list_details',
            'sale_order_list.sale_order_list_unit_price',
            'sale_order_list.sale_order_list_discount',
            'sale_order_list.sale_order_list_amount',
            'sale_order_list.sale_order_list_date_start',
            'sale_order_list.sale_order_list_date_end',
            'sale_order_list.sale_order_list_bill_status',
            'customer_contract.customer_contract_price'
        )
        ->leftjoin('customer_contract', 'customer_contract.quotation_id', 'sale_order.quotation_id')
        ->leftjoin('sale_order_list', 'sale_order_list.sale_order_id', 'sale_order.sale_order_id')
        ->where('sale_order.quotation_id', $request->quotation_id)
        ->get();

        // GF::print_r($result);

        return DataTables::of($result)

            ->addColumn('sale_order_amount', function ($res){
                return number_format($res->sale_order_list_unit_price,2);
            })
            ->addColumn('sale_order_discount', function ($res){
                return number_format($res->sale_order_list_discount,2);
            })
            ->addColumn('sale_order_sub_total', function ($res){
                return number_format($res->sale_order_list_amount,2);
            })

            ->addColumn('customer_contract_price', function ($res){
                return number_format($res->customer_contract_price,2);
            })

            ->addColumn('sale_order_date_start', function ($res) {
                return $res->sale_order_list_date_start ? date('d/m/Y', strtotime($res->sale_order_list_date_start)) : '';
            })
            ->addColumn('sale_order_date_end', function ($res) {
                return $res->sale_order_list_date_end ? date('d/m/Y', strtotime($res->sale_order_list_date_end)) : '';
            })

            ->addColumn('bill_status', function ($res) {
                $sele = $res->sale_order_list_bill_status;
                $sel1 = ($sele==1) ? 'selected' : '';
                $sel2 = ($sele==2) ? 'selected' : '';
                $sel3 = ($sele==3) ? 'selected' : '';
                $str = '<select class="form-control custom-select search_table_select SliBtnCreateInvoice" id="create_invoice_status" name="create_invoice_status" data-placeholder="" tabindex="1" data-sale_order_id="'.$res->sale_order_list_id.'">
                            <option value="0">Select</option>
                            <option value="1" '.$sel1.'>วางบิลภายในเดือน</option>
                            <option value="2" '.$sel2.'>วางบิลหลังให้บริการ</option>
                            <option value="3" '.$sel3.'>วางบิลก่อนให้บริการ</option>
                        </select>';
                return $str;
            })

            ->addColumn('status', function ($res){
                $status = $res->sale_order_list_status;
                $str = ($status==1) ? 'Open' : 'Close';
                return $str;
            })

            ->addColumn('action', function ($res) {
                $str = '<button type="button" class="btn btn-success btn-md ViewInvoiceOrder" data-toggle="modal" data-target="#ViewInvoiceOrderModal" data-sale_order_id="'.$res->sale_order_id.'">View</button>';
                return $str;
            })

            ->addIndexColumn()
            ->rawColumns(['bill_status', 'action'])
            ->make(true);
    }

    public function update_bill_sale_order(Request $request)
    {
        $result = SaleOrderList::where('sale_order_list_id', $request->id)
                    ->update([
                        'sale_order_list_bill_status' => $request->val
                    ]);

        return $result;
    }

    public function update_bill_sale_order_all(Request $request)
    {
        $result1 = SaleOrder::where('sale_order_id', $request->id)
                    ->update([
                        'sale_order_bill_status' => $request->val
                    ]);

        $result = SaleOrderList::where('sale_order_id', $request->id)
                    ->update([
                        'sale_order_list_bill_status' => $request->val
                    ]);

        return $result;
    }
}
