<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Company;
use App\CustomerType;
use App\SaleArea;
use App\Provinces;
use App\CreditTerm;
use App\CreditTermAmount;
use App\TypeDocument;
use App\ContactInfo;
use App\Member;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Company')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['CustomerType'] = CustomerType::where('customer_type_status', '1')->get();
        $data['SaleArea'] = SaleArea::where('sale_team_sub_status', '1')->get();
        $data['Provinces'] = Provinces::where('provinces_status', 1)->get();
        $data['TypeDocument'] = TypeDocument::where('type_doc_customer_status', '1')->get();
        $data['ContactInfoes'] = ContactInfo::where('customer_status', '1')->get();
        $data['Members'] = Member::where('member_status', '1')->get();

        if (Helper::CheckPermissionMenu('Company', '1')) {
            return view('admin.Company.company', $data);
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
        $company = $request->input('company');
        $credit_term = $request->input('credit_term');
        $credit_term_amount = $request->input('credit_term_amount');
        $validator = Validator::make($request->all(), [
            // 'company_name_th' => 'required',
        ]);

        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($company) {
                    $Company = new Company;
                    foreach ($company as $key => $val) {
                        $Company->{$key} = $val;
                    }
                    if (!isset($company['company_status'])) {
                        $Company->company_status = 0;
                    }
                    if (!isset($company['company_branch_status'])) {
                        $Company->company_branch_status = 'N';
                    }
                    $Company->admin_id = Null;
                    $Company->save();
                }
                // $Company_id = $Company->getKey();
                if ($credit_term) {
                    $CreditTerm = new CreditTerm;
                    foreach ($credit_term as $key => $val) {
                        $CreditTerm->{$key} = $val;
                    }
                    $CreditTerm->company_id = $Company->company_id;
                    $CreditTerm->credit_term_status = 1;
                    $CreditTerm->save();
                }
                if ($credit_term_amount) {
                    $CreditTermAmount = new CreditTermAmount;
                    
                    foreach ($credit_term_amount as $key => $val) {
                        $CreditTermAmount->{$key} = $val;
                    }
                    $CreditTermAmount->company_id = $Company->company_id;
                    $CreditTermAmount->credit_term_amount_status = 1;
                    if($CreditTermAmount->credit_term_amount_price){
                        $CreditTermAmount->credit_term_amount_price = str_replace(',', '', $CreditTermAmount->credit_term_amount_price);
                    }
                    $CreditTermAmount->save();
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
            if (isset($failedRules['company_name_th']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Company is required";
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
        $content = Company::with('Districts', 'Districts_En')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get Company';
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
        $company = $request->input('company');
        $credit_term = $request->input('credit_term');
        $credit_term_amount = $request->input('credit_term_amount');
        $validator = Validator::make($request->all(), [
            // 'company_name_th' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($company) {
                    $Company = Company::find($id);
                    foreach ($company as $key => $val) {
                        $Company->{$key} = $val;
                    }
                    if (!isset($company['company_status'])) {
                        $Company->company_status = 0;
                    }
                    if (!isset($company['company_branch_status'])) {
                        $Company->company_branch_status = 'N';
                    }
                    $Company->admin_id = Null;
                    $Company->save();
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
            if (isset($failedRules['company_name_th']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Company is required";
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
        $result = Company::select(
            'company.company_id',
            'company.company_code',
            'company.company_name_th',
            'company.company_name_en',
            'company.company_email',
            'company.company_tax_id',
            'company.company_tel',
            'company.company_phone',
            'company.company_address_no_th',
            'company.company_address_building_th',
            'company.company_address_road_th',
            'company.company_address_alley_th',
            'company.company_status',
            'sale_team_main.sale_team_main_name'
        )
            ->leftjoin('customer', 'customer.company_id', 'company.company_id')
            ->leftjoin('sale_team_sub', 'sale_team_sub.sale_team_sub_id', 'company.sale_team_sub_id')
            ->leftjoin('sale_team_main', 'sale_team_main.sale_team_main_id', 'sale_team_sub.sale_team_main_id')
            ->with('ContactInfo');

        $company_code = $request->input('company_code');
        $company_name_th = $request->input('company_name_th');
        $company_name_en = $request->input('company_name_en');
        $sale_team_sub_id = $request->input('sale_team_sub_id');
        $customer_name = $request->input('customer_name');

        if ($company_code) {
            $result->where('company_code', $company_code);
        }
        if ($company_name_th) {
            $result->where('company_name_th', 'like', '%' . $company_name_th . '%');
        }
        if ($company_name_en) {
            $result->where('company_name_en', 'like', '%' . $company_name_en . '%');
        }
        if ($sale_team_sub_id) {
            $result->where('company.sale_team_sub_id', $sale_team_sub_id);
        }
        if ($customer_name) {
            $result->where('customer.customer_name', 'like', '%' . $customer_name . '%');
        }
        $result->groupBy('company.company_id');

        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->company_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->company_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('contact_info', function ($res) {
                $contact_info = '';
                foreach ($res->ContactInfo as $val) {
                    if ($val->customer_name) {
                        $contact_info .= $val->customer_name.'<br>';
                    }
                }
                return $contact_info;
            })
            ->addColumn('address', function ($res) {
                $address = $res->company_address_no_th . ' ' . $res->company_address_building_th . ' ' . $res->company_address_road_th . ' ' . $res->company_address_alley_th;
                return $address;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('Company', '1');
                $insert = Helper::CheckPermissionMenu('Company', '2');
                $update = Helper::CheckPermissionMenu('Company', '3');
                $delete = Helper::CheckPermissionMenu('Company', '4');

                if ($res->company_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-company" ' . $checked . ' data-id="' . $res->company_id . '" data-style="ios" data-on="On" data-off="Off">';

                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-file" href="javascript:void(0)" data-toggle="modal" data-target="#FileDocumentModal" data-id="' . $res->company_id . '">File Document</a>';
                $str .= '<a class="dropdown-item btn-contact-info" href="javascript:void(0)" data-toggle="modal" data-target="#ContactInfoModal" data-id="' . $res->company_id . '">Contact info</a>';
                $str .= '<a class="dropdown-item btn-Credit" href="javascript:void(0)" data-toggle="modal" data-target="#CreditTermModal" data-id="' . $res->company_id . '">Credit Term</a>';
                $str .= '<a class="dropdown-item btn-member" href="javascript:void(0)" data-toggle="modal" data-target="#MembermModal" data-id="' . $res->company_id . '">Member</a>';

                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->company_id . '">View</a>';
                }
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->company_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'contact_info', 'address', 'sale', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['company_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            Company::where('company_id', $id)->update($input_all);
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
