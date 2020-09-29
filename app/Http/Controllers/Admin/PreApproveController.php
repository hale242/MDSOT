<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Quotation;
use App\QuotationPreApprove;
use App\QuotationPriceList;
use App\QuotationPriceListOt;
use App\GF;
use App\AdminUser;
use App\Company;
use App\CustomerContract;
use App\StaffCost;
use App\BackOrder;
use App\BackOrderSpec;
use Auth;


class PreApproveController extends Controller
{
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'PreApprove')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['QuotationPreApprove'] = QuotationPreApprove::with('Quotation.Company', 'Quotation.AdminUser')
            ->join('quotation', 'quotation.quotation_id', 'quotation_pre_approve.quotation_id')
            ->where('quotation_pre_approve.quotation_pre_approve_status', 0)->get();
        $data['AdminUsers'] = AdminUser::where('status', 1)->get();
        $data['Companies'] = Company::where('company_status', 1)->get();

        if (Helper::CheckPermissionMenu('PreApprove', '1')) {
            return view('admin.PreApprove.quotation_pre_approve', $data);
        } else {
            return redirect('admin/');
        }
    }

    public function quotation_detail(Request $request)
    {
        $data['data'] = Quotation::with([
            'AdminUser',
            'Company',
            'Company.Districts',
            'Company.ContactInfo',
            'Customer',
            'QuotationPreApproveDetails',
            'QuotationPriceListMain',
            'QuotationPriceList',
            'QuotationPriceList.PriceStructure',
            'QuotationPriceList.StaffCost',
            'QuotationPriceList.PriceStructureHasStaffExpense',
            'QuotationPriceList.OtherExpenses',
            'QuotationPriceList.OtherExpenseHasStaffExpense',
            'QuotationPriceList.InsuranceFee',
            'QuotationPriceList.InsuranceFeeHasStaffExpense',
            'QuotationPriceList.QuotationPriceListOt',
            'QuotationPriceListOt.PriceStructureOT'
        ])->find($request->id);

        return view('admin.PreApprove.Modal.modal_viewapprove', $data);
    }

    public function getcost(Request $request)
    {

        $type = $request->typecost;

        if ($type == 'staff') {
            $result = QuotationPriceList::where('main_quotation_price_list_id', $request->qmid)
                ->where('quotation_id', $request->qid)
                ->where('staff_expenses_id', $request->id)
                ->get();
        }
        if ($type == 'insurance') {
            $result = QuotationPriceList::where('main_quotation_price_list_id', $request->qmid)
                ->where('quotation_id', $request->qid)
                ->where('insurance_fee_id', $request->id)
                ->get();
        }
        if ($type == 'other') {
            $result = QuotationPriceList::where('main_quotation_price_list_id', $request->qmid)
                ->where('quotation_id', $request->qid)
                ->where('other_expenses_id', $request->id)
                ->get();
        }
        if ($type == 'overtime') {
            $result = QuotationPriceListOt::where('quotation_price_list_id', $request->qmid)
                ->where('quotation_id', $request->qid)
                ->where('price_structure_ot_id', $request->id)
                ->get();
        }

        return $result;
    }

    public function getOt(Request $request)
    {
        $result = QuotationPriceListOt::where('quotation_id', $request)->get();
        return $result;
    }

    public function show(Request $request, $id)
    {
        $result = QuotationPreApprove::with('AdminUser.Position')->where('quotation_id', $request->id)->get();
        return $result;
    }

    public function updateall(Request $request)
    {
        $id = $request->admin_id;
        $qid = explode(',', $request->qid);
        $lv = explode(',', $request->lv);
        $status = $request->action;
        $counter = sizeof($qid);
        $datenow = date('Y-m-d H:i:s');
        $i = 0;

        // GF::print_r($lv);
        // return $qid[0];

        if ($status == 1) {
            for ($i = 0; $i < $counter; $i++) {
                // This Level
                $result_this = QuotationPreApprove::where('quotation_id', $qid[$i])
                    ->where('quotation_pre_approvec_lv', $lv[$i])
                    ->update([
                        'admin_id'                              => $id,
                        'quotation_pre_approve_comment'         => 'approve all',
                        'quotation_pre_approve_date_approve'    => $datenow,
                        'quotation_pre_approve_status'          => $status
                    ]);

                // Next Level
                $result = QuotationPreApprove::where('quotation_id', $qid[$i])
                    ->where('quotation_pre_approvec_lv', $lv[$i] + 1)
                    ->update([
                        'quotation_pre_approve_date_send'    => $datenow,
                    ]);


                // Last Step
                if (!$result) {

                    $company = Quotation::select('company_id')->where('quotation_id', $qid[$i])->first();

                    $CustomerContract = new CustomerContract;
                    $CustomerContract->customer_contract_comment_cancel = '';
                    $CustomerContract->company_id = $company->company_id;
                    $CustomerContract->quotation_id = $qid[$i];
                    $CustomerContract->save();

                    $Quotation = Quotation::find($qid[$i]);
                    $Quotation->quotation_pre_approve_status = 1;
                    $Quotation->save();

                    // Back Order Insert
                    $result_back = QuotationPriceList::where('quotation_id', $qid[$i])
                        ->whereNull('main_quotation_price_list_id')
                        ->get();
                    foreach ($result_back as $back_order) {
                        $backlog_create = new Backorder;
                        $backlog_create->back_order_unit = $back_order->quotation_price_list_unit;
                        $backlog_create->quotation_price_list_id = $back_order->quotation_price_list_id;
                        $backlog_create->quotation_id = $back_order->quotation_id;
                        $backlog_create->save();
                    }

                    // Back Order Spec Insert
                    $result_spec = Backorder::where('quotation_id', $qid[$i])->get();
                    foreach ($result_spec as $back_order_spec) {
                        for ($backsp = 0; $backsp < $back_order_spec->back_order_unit; $backsp++) {
                            $back_order_spec_create = new BackOrderSpec;
                            $back_order_spec_create->back_order_id = $back_order_spec->back_order_id;
                            $back_order_spec_create->quotation_price_list_id = $back_order_spec->quotation_price_list_id;
                            $back_order_spec_create->quotation_id = $qid[$i];
                            $back_order_spec_create->save();
                        }
                    }
                }

                if ($result_this) {
                    return '1';
                } else {
                    return '0';
                }
            }
        } else if ($status == 98) {
            for ($i = 0; $i < $counter; $i++) {
                // This Level
                $result_this = QuotationPreApprove::where('quotation_id', $qid[$i])
                    ->where('quotation_pre_approvec_lv', $lv[$i])
                    ->update([
                        'admin_id'                          => null,
                        'quotation_pre_approve_date_send'   => null,
                        'quotation_pre_approve_status'      => 0
                    ]);
                // Prev Level
                $result =  QuotationPreApprove::where('quotation_id', $qid[$i])
                    ->where('quotation_pre_approvec_lv', $lv[$i] - 1)
                    ->update([
                        'admin_id'                              => $id,
                        'quotation_pre_approve_comment'         => 'reject all',
                        'quotation_pre_approve_date_approve'    => null,
                        'quotation_pre_approve_status'          => $status
                    ]);
            }

            if ($result_this) {
                return '1';
            } else {
                return '0';
            }
        } else if ($status == 99) {
            for ($i = 0; $i < $counter; $i++) {
                // This Level
                $result_this = QuotationPreApprove::where('quotation_id', $qid[$i])
                    ->where('quotation_pre_approvec_lv', $lv[$i])
                    ->update([
                        'quotation_pre_approve_comment'         => 'not approve all',
                        'quotation_pre_approve_status'          => $status
                    ]);
            }
            if ($result_this) {
                return '1';
            } else {
                return '0';
            }
        }
    }

    public function update(Request $request)
    {

        $id = $request->admin_id;
        $status = $request->quotation_pre_approve_status;
        $quotation = $request->quotation_pre_approve_id;
        $level = $request->quotation_pre_approve_lv;
        $comment = $request->quotation_pre_approve_comment;
        $datenow = date('Y-m-d H:i:s');

        if ($status == 1) {
            // This Level
            $result_this = QuotationPreApprove::where('quotation_id', $quotation)
                ->where('quotation_pre_approvec_lv', $level)
                ->update([
                    'admin_id'                              => $id,
                    'quotation_pre_approve_comment'         => $comment,
                    'quotation_pre_approve_date_approve'    => $datenow,
                    'quotation_pre_approve_status'          => $status
                ]);
            // Next Level
            $result = QuotationPreApprove::where('quotation_id', $quotation)
                ->where('quotation_pre_approvec_lv', $level + 1)
                ->update([
                    'quotation_pre_approve_date_send'    => $datenow,
                ]);

            // Last Step
            if (!$result) {

                $company = Quotation::select('company_id')->where('quotation_id', $quotation)->first();

                $CustomerContract = new CustomerContract;
                $CustomerContract->customer_contract_comment_cancel = '';
                $CustomerContract->company_id = $company->company_id;
                $CustomerContract->quotation_id = $quotation;
                $CustomerContract->save();

                $Quotation = Quotation::find($quotation);
                $Quotation->quotation_pre_approve_status = 1;
                $Quotation->save();

                // Back Order Insert
                $result = QuotationPriceList::where('quotation_id', $quotation)
                    ->whereNull('main_quotation_price_list_id')
                    ->get();
                foreach ($result as $back_order) {
                    $backlog_create = new Backorder;
                    $backlog_create->back_order_unit = $back_order->quotation_price_list_unit;
                    $backlog_create->quotation_price_list_id = $back_order->quotation_price_list_id;
                    $backlog_create->quotation_id = $back_order->quotation_id;
                    $backlog_create->save();
                }

                // Back Order Spec Insert
                $result_spec = Backorder::where('quotation_id', $quotation)->get();
                foreach ($result_spec as $back_order_spec) {
                    for ($backsp = 0; $backsp < $back_order_spec->back_order_unit; $backsp++) {
                        $back_order_spec_create = new BackOrderSpec;
                        $back_order_spec_create->back_order_id = $back_order_spec->back_order_id;
                        $back_order_spec_create->quotation_price_list_id = $back_order_spec->quotation_price_list_id;
                        $back_order_spec_create->quotation_id = $quotation;
                        $back_order_spec_create->save();
                    }
                }
            }

            if ($result_this) {
                return '1';
            } else {
                return '0';
            }
        } else if ($status == 98) {
            // This Level
            $result_this = QuotationPreApprove::where('quotation_id', $quotation)
                ->where('quotation_pre_approvec_lv', $level)
                ->update([
                    'admin_id'                          => null,
                    'quotation_pre_approve_date_send'   => null,
                    'quotation_pre_approve_status'      => 0
                ]);
            // Prev Level
            $result =  QuotationPreApprove::where('quotation_id', $quotation)
                ->where('quotation_pre_approvec_lv', $level - 1)
                ->update([
                    'admin_id'                              => $id,
                    'quotation_pre_approve_comment'         => $comment,
                    'quotation_pre_approve_date_approve'    => null,
                    'quotation_pre_approve_status'          => $status
                ]);

            if ($result_this) {
                return '1';
            } else {
                return '0';
            }
        } else if ($status == 99) {
            // This Level
            $result_this = QuotationPreApprove::where('quotation_id', $quotation)
                ->where('quotation_pre_approvec_lv', $level)
                ->update([
                    'quotation_pre_approve_comment'         => $comment,
                    'quotation_pre_approve_status'          => $status
                ]);
            if ($result_this) {
                return '1';
            } else {
                return '0';
            }
        }
    }

    public function lists(Request  $request)
    {
        $admin = Auth::guard('admin')->user();
        $result = QuotationPreApprove::with('Quotation.Company', 'AdminUser', 'Quotation.AdminUser')
            ->join('quotation', 'quotation_pre_approve.quotation_id', 'quotation.quotation_id')
            ->join('quotation_line_approve', 'quotation_line_approve.quotation_line_approve_lv', 'quotation_pre_approve.quotation_pre_approvec_lv')
            ->whereNotNull('quotation_pre_approve_date_send')
            ->where('quotation_line_approve.position_id', $admin->position_id)
            ->WhereIn('quotation_pre_approve.quotation_pre_approve_status', [0, 98]);
        // ->get();

        $adminid = $request->admin_id;
        $quotation_full_code = $request->quotation_full_code;
        $company_name_th = $request->company_name_th;
        $quotation_pre_approve_date_send = $request->quotation_pre_approve_date_send;
        $quotation_pre_approve_date_approve = $request->quotation_pre_approve_date_approve;

        if ($adminid) {
            $result->where('quotation.admin_id', $adminid);
        }

        if ($quotation_full_code) {
            $result->where('quotation.quotation_full_code', 'like', '%' . $quotation_full_code . '%');
        }

        if ($company_name_th) {
            $result->where('quotation.company_id', $company_name_th);
        }

        if ($quotation_pre_approve_date_send) {
            $result->whereBetween('quotation_pre_approve.quotation_pre_approve_date_send', [$quotation_pre_approve_date_send . ' 00:00:00', $quotation_pre_approve_date_send . ' 23:59:59']);
        }

        if ($quotation_pre_approve_date_approve) {
            $result->whereBetween('quotation_pre_approve.quotation_pre_approve_date_approve', [$quotation_pre_approve_date_approve . ' 00:00:00', $quotation_pre_approve_date_approve . ' 23:59:59']);
        }

        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" name="preapprove" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->quotation_pre_approve_id . '" data-lv="' . $res->quotation_pre_approvec_lv . '" data-quotation_id="' . $res->quotation_id . '" >
                        <label class="custom-control-label" for="checkbox-item-' . $res->quotation_pre_approve_id . '"  style="cursor:pointer"></label>
                        </div>';
                return $str;
            })
            ->addColumn('quotation_full_code', function ($res) {
                return $res->Quotation->quotation_full_code;
            })
            ->addColumn('company_name_th', function ($res) {
                return $res->Quotation->Company->company_name_th;
            })
            ->addColumn('quotation_run_code_details', function ($res) {
                return $res->Quotation->quotation_run_code_details;
            })
            ->addColumn('quotation_title', function ($res) {
                return $res->Quotation->quotation_title;
            })
            ->addColumn('quotation_price', function ($res) {
                return number_format($res->Quotation->quotation_price, 2);
            })
            ->addColumn('sale', function ($res) {
                if ($res->Quotation->AdminUser) {
                    return $res->Quotation->AdminUser->first_name . " " . $res->Quotation->AdminUser->last_name;
                } else {
                    return "";
                }
            })
            ->addColumn('btnApproveLV', function ($res) {

                if ($res->quotation_pre_approve_status == '98') {
                    $color = 'warning';
                } else {
                    $color = 'success';
                }

                $btnApproveLV = '<button type="button" class="btn btn-md btn-' . $color . ' LineApprove" data-toggle="modal" data-target="#LineApproveModal" data-pre_approve_id="' . $res->quotation_pre_approve_id . '" data-quotation_id="' . $res->Quotation->quotation_id . '" data-quotation_pre_approvec_lv="' . $res->quotation_pre_approvec_lv . '" >Pre Approve Level ' . $res->quotation_pre_approvec_lv . '</button>';
                return $btnApproveLV;
            })
            ->addColumn('action', function ($res) {
                $btnViewApprove = '<button type="button" class="btn btn-primary btn-md btn-view-approve" data-toggle="modal" data-target="#viewapproveModal" data-quotation_id="' . $res->quotation_id . '">View Pre-Approval</button>';
                $btnPrintApprove = '<a href="' . url('admin/PreApprove/print_pre_approve') . '/' . $res->quotation_id . '" target="_blank" class="btn btn-warning btn-md">Print Pre-Approval</a>';
                $btnViewQuotation = '<button type="button" class="btn btn-info btn-md btn-view-quotation" data-toggle="modal" data-target="#ViewQuotationModal" data-quotation_id="' . $res->quotation_id . '">View Quotation</button>';
                $btnConfirmLetter = '<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ConfirmLetterModal" data-pre_approve_id="' . $res->quotation_pre_approve_id . '">View Confirm Letter</button>';
                $btnApprove = '<button type="button" class="btn btn-success btn-md btn-pre-approve" data-toggle="modal" data-target="#ActionModal" data-quotation_id="' . $res->quotation_id . '" data-pre_approve_lv="' . $res->quotation_pre_approvec_lv . '">Approve</button>';
                $btnReject = '<button type="button" class="btn btn-warning btn-md btn-pre-reject" data-toggle="modal" data-target="#ActionModal" data-quotation_id="' . $res->quotation_id . '" data-pre_approve_lv="' . $res->quotation_pre_approvec_lv . '">Reject</button>';
                $btnNotApprove = '<button type="button" class="btn btn-danger btn-md btn-pre-notapprove" data-toggle="modal" data-target="#ActionModal" data-quotation_id="' . $res->quotation_id . '" data-pre_approve_lv="' . $res->quotation_pre_approvec_lv . '">Not approve</button>';

                return $btnViewApprove . $btnPrintApprove . $btnViewQuotation . $btnConfirmLetter . $btnApprove . $btnReject . $btnNotApprove;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'quotation_full_code', 'company_name_th', 'quotation_run_code_details', 'quotation_title', 'quotation_price', 'sale', 'btnApproveLV', 'action'])
            ->make(true);
    }

    public function print_pre_approve(Request $request, $id)
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'PreApprove')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();

        $data['data'] = Quotation::with([
            'AdminUser',
            'Company',
            'Customer',
            'QuotationPreApproveDetails',
            'QuotationPriceListMain',
            'QuotationPriceList',
            'QuotationPriceList.PriceStructure',
            'QuotationPriceList.StaffCost',
            'QuotationPriceList.PriceStructureHasStaffExpense',
            'QuotationPriceList.OtherExpenses',
            'QuotationPriceList.OtherExpenseHasStaffExpense',
            'QuotationPriceList.InsuranceFee',
            'QuotationPriceList.InsuranceFeeHasStaffExpense',
            'QuotationPriceList.QuotationPriceListOt',
            'QuotationPriceListOt.PriceStructureOT'
        ])->find($request->id);


        return view('admin.PreApprove.print_pre_approve', $data);
    }
}
