<?php

namespace App\Http\Controllers\Admin;

use App\BackOrder;
use App\Driver;
use App\Helper;
use App\Http\Controllers\Controller;
use App\MenuSystem;
use App\QuotationPreApprove;
use App\BackOrderInterview;
use App\BackOrderSpec;
use App\RecruitmentPosition;
use App\Company;
use App\AdminUser;
use App\GF;
use App\Provinces;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class BackOrderController extends Controller
{

    public function index() {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'BackOrder')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['province'] = Provinces::get();
        $data['requirement'] = RecruitmentPosition::where('recruitment_position_status',1)->get();
        $data['adminuser'] = AdminUser::get();
        $data['company'] = Company::get();

        if (Helper::CheckPermissionMenu('BackOrder', '1')) {
            return view('admin.BackOrder.back_order', $data);
        } else {
            return redirect('admin/');
        }
    }

    public function create() {
    }

    public function store(Request $request){
        $order_spec_id = $request->order_spec_id;
        $back_order_id = $request->back_order_id;
        $check_interview = array();
        $interview = BackOrderInterview::where('back_order_spec_id',$order_spec_id)->get();
        if(count($interview)>0){
            foreach($interview as $item){
                $check_interview[] = $item['driver_id'];
            }
        }

        if ($request->gender_id != null ||
            $request->driver_religion != null ||
            $request->driver_language != null ||
            $request->driver_requirement != null ||
            $request->driver_age_start != null ||
            $request->driver_age_end != null ||
            $request->driver_smoke != null ||
            $request->work_history != null ||
            $request->province_id != null ||
            $request->amphur_id != null ||
            $request->districts_id != null ||
            $request->driver_status_family != null
        ) {

            $data['drivermatch'] = Driver::with('Gender', 'RecruitmentPosition', 'Districts.Amphures', 'Districts.Provinces', 'DriverLanguage', 'DriverLanguage.LanguageType', 'WorkHistory')
                ->where('driver_status', 1)
                ->where(function ($q) use ($request) {
                    $q->whereNotNull('created_at');
                    if ($request->driver_religion != null) {
                        $q->orwhere('driver_religion', 'like', '%' . $request->driver_religion . '%');
                    }
                    if ($request->driver_status_family != null) {
                        $q->orWhereIn('driver_status_family', explode(',', $request->driver_status_family));
                    }
                    if ($request->province_id != null) {
                        $q->orWhereIn('provinces_id', explode(',', $request->province_id));
                    }
                    if ($request->amphur_id != null) {
                        $q->orWhereIn('amphures_id', explode(',', $request->amphur_id));
                    }
                })
                ->get();

            if(count($interview)>0){
                $data['drivermatch'] = $data['drivermatch']->whereNotIn('driver_id', $check_interview);
            }

            if ($request->gender_id != null) {
                $data['drivermatch'] = $data['drivermatch']->whereIn('gender_id', explode(',', $request->gender_id));
            }

            if ($request->driver_smoke != null) {
                $data['drivermatch'] = $data['drivermatch']->where('driver_smoke', $request->driver_smoke)->dd();
            }

            if ($request->districts_id != null) {
                $data['drivermatch'] = $data['drivermatch']->where('districts_id', $request->districts_id);
            }

            if ($request->driver_age_start != null || $request->driver_age_end != null) {
                $data['drivermatch'] = $data['drivermatch']->WhereBetween('driver_age', [$request->driver_age_start, $request->driver_age_end]);
            }

            $data['filters'] = array([
                'gender' => $request->gender_id,
                'religion' => $request->driver_religion,
                'language' => $request->driver_language,
                'position' => $request->driver_requirement,
                'age_start' => $request->driver_age_start,
                'age_end' => $request->driver_age_end,
                'smoke' => $request->driver_smoke,
                'history' => $request->work_history,
                'province' => $request->province_id,
                'amphur' => $request->amphur_id,
                'district' => $request->districts_id,
                'status_family' => $request->driver_status_family,
                'back_order_id' => $back_order_id,
                'order_spec_id' => $request->order_spec_id,
                'company_id' => $request->company_id
            ]);

        } else {
            $data['drivermatch'] = Driver::with('Gender', 'RecruitmentPosition', 'Districts.Amphures', 'Districts.Provinces', 'DriverLanguage', 'DriverLanguage.LanguageType', 'WorkHistory')->where('driver_status', 1)->get();
            if(count($interview)>0){
                $data['drivermatch'] = $data['drivermatch']->whereNotIn('driver_id', $check_interview);
            }
            $data['filters'] = array([
                'gender' => '',
                'religion' => '',
                'language' => '',
                'position' => '',
                'age_start' => '',
                'age_end' => '',
                'smoke' => '',
                'history' => '',
                'province' => '',
                'amphur' => '',
                'district' => '',
                'status_family' => '',
                'back_order_id' => $back_order_id,
                'order_spec_id' => $request->order_spec_id,
                'company_id' => $request->company_id
            ]);
        }
        return view('admin.BackOrder.Modal.modal_matching', $data);
    }

    public function ViewInterview(Request $request, $id){


        $driver_interview_check = BackOrderInterview::where('back_order_spec_id',$id)
                                                ->where('back_order_interviwe_results',1)
                                                ->get();
        $data['cou'] = isset($driver_interview_check) ? count($driver_interview_check) : 0;

        $driver_interview = BackOrderInterview::where('back_order_spec_id',$id)
                                                ->where('back_order_interviwe_results',0)
                                                ->get();

        if(count($driver_interview)>0){
            $driverlist = array();
            foreach($driver_interview as $item){
                $driverlist[] = $item->driver_id;
                $data['back_order_interviwe_id'][] = $item->back_order_interviwe_id;
            }

                if ($request->gender_id != null ||
                    $request->driver_religion != null ||
                    $request->driver_language != null ||
                    $request->driver_requirement != null ||
                    $request->driver_age_start != null ||
                    $request->driver_age_end != null ||
                    $request->driver_smoke != null ||
                    $request->work_history != null ||
                    $request->province_id != null ||
                    $request->amphur_id != null ||
                    $request->districts_id != null ||
                    $request->driver_status_family != null
                ) {

                    $data['drivermatch'] = Driver::with('Gender', 'RecruitmentPosition', 'Districts.Amphures', 'Districts.Provinces', 'DriverLanguage', 'DriverLanguage.LanguageType', 'WorkHistory')
                        ->whereIn('driver_id',$driverlist)
                        ->where('driver_status', 1)
                        ->where(function ($q) use ($request) {
                            $q->whereNotNull('created_at');
                            if ($request->driver_religion != null) {
                                $q->orwhere('driver_religion', 'like', '%' . $request->driver_religion . '%');
                            }
                            if ($request->driver_status_family != null) {
                                $q->orWhereIn('driver_status_family', explode(',', $request->driver_status_family));
                            }
                            if ($request->province_id != null) {
                                $q->orWhereIn('provinces_id', explode(',', $request->province_id));
                            }
                            if ($request->amphur_id != null) {
                                $q->orWhereIn('amphures_id', explode(',', $request->amphur_id));
                            }
                        })
                        ->get();

                    if ($request->gender_id != null) {
                        $data['drivermatch'] = $data['drivermatch']->whereIn('gender_id', explode(',', $request->gender_id));
                    }

                    if ($request->driver_smoke != null) {
                        $data['drivermatch'] = $data['drivermatch']->where('driver_smoke', $request->driver_smoke);
                    }

                    if ($request->districts_id != null) {
                        $data['drivermatch'] = $data['drivermatch']->where('districts_id', $request->districts_id);
                    }

                    if ($request->driver_age_start != null || $request->driver_age_end != null) {
                        $data['drivermatch'] = $data['drivermatch']->WhereBetween('driver_age', [$request->driver_age_start, $request->driver_age_end]);
                    }

                    $data['filters'] = array([
                        'gender' => $request->gender_id,
                        'religion' => $request->driver_religion,
                        'language' => $request->driver_language,
                        'position' => $request->driver_requirement,
                        'age_start' => $request->driver_age_start,
                        'age_end' => $request->driver_age_end,
                        'smoke' => $request->driver_smoke,
                        'history' => $request->work_history,
                        'province' => $request->province_id,
                        'amphur' => $request->amphur_id,
                        'district' => $request->districts_id,
                        'status_family' => $request->driver_status_family,
                        'back_order_id' => $request->back_order_id,
                        'order_spec_id' => $id,
                        'company_id' => $request->company_id
                    ]);

                }else{
                    $data['drivermatch'] = Driver::with('Gender', 'RecruitmentPosition', 'Districts.Amphures', 'Districts.Provinces', 'DriverLanguage', 'DriverLanguage.LanguageType', 'WorkHistory')
                        ->whereIn('driver_id',$driverlist)
                        ->where('driver_status', 1)
                        ->get();
                    $data['filters'] = array([
                        'gender' => '',
                        'religion' => '',
                        'language' => '',
                        'position' => '',
                        'age_start' => '',
                        'age_end' => '',
                        'smoke' => '',
                        'history' => '',
                        'province' => '',
                        'amphur' => '',
                        'district' => '',
                        'status_family' => '',
                        'back_order_id' => $request->back_order_id,
                        'order_spec_id' => $id,
                        'company_id' => $request->company_id
                    ]);
                }
        }else{

            $data['drivermatch'] = array();
            $data['filters'] = array([
                'gender' => '',
                'religion' => '',
                'language' => '',
                'position' => '',
                'age_start' => '',
                'age_end' => '',
                'smoke' => '',
                'history' => '',
                'province' => '',
                'amphur' => '',
                'district' => '',
                'status_family' => '',
                'back_order_id' => $request->back_order_id,
                'order_spec_id' => $id,
                'company_id' => $request->company_id
            ]);
        }

        return view('admin.BackOrder.Modal.modal_waitinterview', $data);
    }

    public function ViewNotpassInterview(Request $request, $id){

        $driver_interview = BackOrderInterview::where('back_order_spec_id',$id)
                                                ->where('back_order_interviwe_results',99)
                                                ->get();

        if(count($driver_interview)>0){
            $driverlist = array();
            foreach($driver_interview as $item){
                $driverlist[] = $item->driver_id;
                $data['back_order_interviwe_id'][] = $item->back_order_interviwe_id;
            }

                if ($request->gender_id != null ||
                    $request->driver_religion != null ||
                    $request->driver_language != null ||
                    $request->driver_requirement != null ||
                    $request->driver_age_start != null ||
                    $request->driver_age_end != null ||
                    $request->driver_smoke != null ||
                    $request->work_history != null ||
                    $request->province_id != null ||
                    $request->amphur_id != null ||
                    $request->districts_id != null ||
                    $request->driver_status_family != null
                ) {

                    $data['drivermatch'] = Driver::with('Gender', 'RecruitmentPosition', 'Districts.Amphures', 'Districts.Provinces', 'DriverLanguage', 'DriverLanguage.LanguageType', 'WorkHistory')
                        ->whereIn('driver_id',$driverlist)
                        ->where('driver_status', 1)
                        ->where(function ($q) use ($request) {
                            $q->whereNotNull('created_at');
                            if ($request->driver_religion != null) {
                                $q->orwhere('driver_religion', 'like', '%' . $request->driver_religion . '%');
                            }
                            if ($request->driver_status_family != null) {
                                $q->orWhereIn('driver_status_family', explode(',', $request->driver_status_family));
                            }
                            if ($request->province_id != null) {
                                $q->orWhereIn('provinces_id', explode(',', $request->province_id));
                            }
                            if ($request->amphur_id != null) {
                                $q->orWhereIn('amphures_id', explode(',', $request->amphur_id));
                            }
                        })
                        ->get();

                    if ($request->gender_id != null) {
                        $data['drivermatch'] = $data['drivermatch']->whereIn('gender_id', explode(',', $request->gender_id));
                    }

                    if ($request->driver_smoke != null) {
                        $data['drivermatch'] = $data['drivermatch']->where('driver_smoke', $request->driver_smoke);
                    }

                    if ($request->districts_id != null) {
                        $data['drivermatch'] = $data['drivermatch']->where('districts_id', $request->districts_id);
                    }

                    if ($request->driver_age_start != null || $request->driver_age_end != null) {
                        $data['drivermatch'] = $data['drivermatch']->WhereBetween('driver_age', [$request->driver_age_start, $request->driver_age_end]);
                    }

                    $data['filters'] = array([
                        'gender' => $request->gender_id,
                        'religion' => $request->driver_religion,
                        'language' => $request->driver_language,
                        'position' => $request->driver_requirement,
                        'age_start' => $request->driver_age_start,
                        'age_end' => $request->driver_age_end,
                        'smoke' => $request->driver_smoke,
                        'history' => $request->work_history,
                        'province' => $request->province_id,
                        'amphur' => $request->amphur_id,
                        'district' => $request->districts_id,
                        'status_family' => $request->driver_status_family,
                        'back_order_id' => $request->back_order_id,
                        'order_spec_id' => $id,
                        'company_id' => $request->company_id
                    ]);

                }else{
                    $data['drivermatch'] = Driver::with('Gender', 'RecruitmentPosition', 'Districts.Amphures', 'Districts.Provinces', 'DriverLanguage', 'DriverLanguage.LanguageType', 'WorkHistory')
                        ->whereIn('driver_id',$driverlist)
                        ->where('driver_status', 1)
                        ->get();
                    $data['filters'] = array([
                        'gender' => '',
                        'religion' => '',
                        'language' => '',
                        'position' => '',
                        'age_start' => '',
                        'age_end' => '',
                        'smoke' => '',
                        'history' => '',
                        'province' => '',
                        'amphur' => '',
                        'district' => '',
                        'status_family' => '',
                        'back_order_id' => $request->back_order_id,
                        'order_spec_id' => $id,
                        'company_id' => $request->company_id
                    ]);
                }
        }else{

            $data['drivermatch'] = array();
            $data['filters'] = array([
                'gender' => '',
                'religion' => '',
                'language' => '',
                'position' => '',
                'age_start' => '',
                'age_end' => '',
                'smoke' => '',
                'history' => '',
                'province' => '',
                'amphur' => '',
                'district' => '',
                'status_family' => '',
                'back_order_id' => $request->back_order_id,
                'order_spec_id' => $id
            ]);
        }

        return view('admin.BackOrder.Modal.modal_notpassinterview', $data);
    }

    public function CreateInterview(Request $request){
        // return $request;
        $date_interview = $request->param[1]['value']." ".$request->param[2]['value'];
        if($request->param[19]['value']=='updateinter'){
            $result = BackOrderInterview::where('back_order_id', $request->param[5]['value'])
            ->where('driver_id', $request->param[3]['value'])
            ->where('back_order_spec_id', $request->param[6]['value'])
            ->update([
                'back_order_interviwe_results' => 0,
                'back_order_interviwe_comment' => 'นัดสัมภาษณ์ใหม่อีกครั้ง',
                'back_order_interviwe_date_assign' => $date_interview,
                'back_order_interviwe_date_interview' => null
            ]);
        }else{
            $backorder_interview = new BackOrderInterview;
            $backorder_interview->company_id = $request->param[7]['value'];
            $backorder_interview->back_order_id = $request->param[5]['value'];
            $backorder_interview->back_order_spec_id = $request->param[6]['value'];
            $backorder_interview->driver_id = $request->param[3]['value'];
            $backorder_interview->back_order_interviwe_results = 0;
            $backorder_interview->back_order_interviwe_date_assign = $date_interview;
            $backorder_interview->back_order_interviwe_status = 1;
            $backorder_interview->save();
        }
        return 1;
        // return redirect('admin/BackOrder');
    }

    public function UpdateInterview(Request $request){
        $result = BackOrderInterview::where('back_order_interviwe_id', $request->param[3]['value'])
                ->update([
                    'back_order_interviwe_results' => $request->param[1]['value'],
                    'back_order_interviwe_comment' => $request->param[2]['value'],
                    'back_order_interviwe_date_interview' => date('Y-m-d H:i:s')
                ]);

        return 1;
        // return redirect('admin/BackOrder');

    }

    public function show($id)
    {
        $data['BackOrder'] = BackOrder::select(
            'back_order.*',
            'quotation_price_list.quotation_price_list_name'
        )
            ->leftjoin('quotation_price_list', 'quotation_price_list.quotation_price_list_id', 'back_order.quotation_price_list_id')
            ->with(['BackOrderSpec','Quotation'])
            ->find($id);

        return view('admin.BackOrder.Modal.modal_fixedspec', $data);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function lists(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $stopar = array();
        $checkorder = BackOrder::select('back_order_id', 'back_order_unit')->get();
        foreach($checkorder as $chk){
            $interview = BackOrderInterview::where('back_order_id', $chk->back_order_id)
                                            ->where('back_order_interviwe_results', 1)
                                            ->get();
            if($chk->back_order_unit == count($interview)){
                array_push($stopar, $chk->back_order_id);
            }
        }


        $result = BackOrder::select(
            'back_order.*',
            'quotation_price_list.quotation_price_list_name',
            'quotation_price_list.quotation_price_list_salary',
            'quotation_price_list.quotation_price_list_ot_status',
            'quotation_price_list.quotation_price_list_guarantee_ot_price',
            'customer_contract.customer_contract_full_code'
        )
        ->leftjoin('quotation_price_list', 'quotation_price_list.quotation_price_list_id', 'back_order.quotation_price_list_id')
        ->leftjoin('customer_contract', 'customer_contract.quotation_id', 'back_order.quotation_id')
        ->leftjoin('quotation', 'quotation.quotation_id', 'back_order.quotation_id')
        ->leftjoin('company', 'quotation.company_id', 'company.company_id')
        ->leftjoin('districts', 'districts.districts_id', 'company.districts_id')
        ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')

        ->whereNotIn('back_order.back_order_id',$stopar)
        ->with('Quotation', 'Quotation.Company', 'Quotation.Customer', 'Quotation.AdminUser', 'Quotation.Company.Districts');

        if($request->quotation_full_code != ''){
            $result->where('quotation.quotation_full_code', $request->quotation_full_code);
        }

        if($request->company_id != ''){
            $result->where('quotation.company_id', $request->company_id);
        }

        if($request->back_order_unit != ''){
            $result->where('back_order_unit', $request->back_order_unit);
        }

        if($request->admin_id != ''){
            $result->where('quotation.admin_id', $request->admin_id);
        }

        if($request->province_id != ''){
            $result->where('provinces.provinces_id', $request->province_id);
        }
        if($request->area_id != ''){
            $result->where('districts.districts_id', $request->area_id);
        }
        if($request->position_id != ''){
            $result->where('quotation_price_list_name', 'like', '%'.$request->position_id.'%');
        }

        return Datatables::of($result)
            ->addColumn('no', function ($res) {
                return '';
            })
            ->addColumn('type', function ($res) {
                return $res->Quotation->quotation_run_code_details;
            })
            ->addColumn('quotation', function ($res) {
                return $res->Quotation->quotation_full_code;
            })
            ->addColumn('company', function ($res) {
                return $res->Quotation->Company->company_name_th;
            })
            ->addColumn('customer', function ($res) {
                return $res->Quotation->Customer->customer_name;
            })
            ->addColumn('units', function ($res) {
                return $res->back_order_unit;
            })
            ->addColumn('sales', function ($res) {
                return $res->Quotation->AdminUser->first_name . " " . $res->Quotation->AdminUser->last_name;
            })
            ->addColumn('area', function ($res) {
                return $res->Quotation->Company->Districts->districts_name."<br>".$res->Quotation->Company->Districts->Amphures->amphures_name."<br>".$res->Quotation->Company->Districts->Provinces->provinces_name;
            })
            ->addColumn('requirement', function ($res) {
                return $res->quotation_price_list_name;
            })
            ->addColumn('driver', function ($res) {
                return number_format($res->quotation_price_list_salary, 2);
            })
            ->addColumn('ot', function ($res) {
                if ($res->quotation_price_list_ot_status == 1) {
                    return number_format($res->quotation_price_list_guarantee_ot_price, 2);
                } else {
                    return '-';
                }
            })
            ->addColumn('sales_confirm', function ($res) {
                $appdate = QuotationPreApprove::where('quotation_id', $res->quotation_id)->where('quotation_pre_approve_status', 1)->orderBy('quotation_pre_approvec_lv', 'desc')->first();
                return date("d/m/Y", strtotime($appdate->quotation_pre_approve_date_approve));
            })
            ->addColumn('opt', function ($res) {
                return '';
            })
            ->addColumn('status', function ($res) {
                if ($res->back_order_status == 1) {
                    $status = '<div class="badge badge-pill text-white font-medium badge-success label-rouded">Active</div>';
                } else {
                    $status = '<div class="badge badge-pill text-white font-medium badge-danger label-rouded">Disabled</div>';
                }
                return $status;
            })
            ->addColumn('action', function ($res) {
                // $btnview = '<button type="button" class="btn btn-success btn-md btn-view" data-toggle="modal" data-back_order_id="' . $res->back_order_id . '">View</button>';
                // $btnfix = '<button type="button" class="btn btn-info btn-md btn-fix" data-toggle="modal" data-target="#FixSpecModal" data-back_order_id="' . $res->back_order_id . '" data-customer_id="'.$res->Quotation->Customer->customer_id.'">Fix Spec</button>';
                // $btncancel = '<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#CancelModal"data-back_order_id="' . $res->back_order_id . '">Cancel</button>';
                
                // return $btnview . $btnfix . $btncancel;
                $view = Helper::CheckPermissionMenu('Quotation' , '1');
                $insert = Helper::CheckPermissionMenu('Quotation' , '2');
                $update = Helper::CheckPermissionMenu('Quotation' , '3');
                $delete = Helper::CheckPermissionMenu('Quotation' , '4');
                
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if($view){
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-back_order_id="' . $res->back_order_id . '">View</a>';
                }
                $str .= '<a class="dropdown-item btn-fix" href="javascript:void(0)" data-toggle="modal" data-target="#FixSpecModal" data-back_order_id="' . $res->back_order_id . '" data-customer_id="'.$res->Quotation->Customer->customer_id.'">Fix Spec</a>';
                $str .= '<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#CancelModal"data-back_order_id="' . $res->back_order_id . '">Cancel</a>';
                $str .= '</div>';
                $str .= '</div>';
            return $str;

            })

            ->addIndexColumn()
            ->rawColumns(['status', 'action', 'quotation', 'area'])
            ->make(true);
    }

    public function getViewDetail($id)
    {
        $content = BackOrder::select(
                'back_order.*',
                'quotation_price_list.quotation_price_list_name',
                'quotation_price_list.quotation_price_list_salary',
                'quotation_price_list.quotation_price_list_ot_status',
                'quotation_price_list.quotation_price_list_guarantee_ot_price',
                'quotation_price_list.quotation_price_list_service_charge_price_percent',
                'customer_contract.customer_contract_full_code'
            )
                ->leftjoin('quotation_price_list', 'quotation_price_list.quotation_price_list_id', 'back_order.quotation_price_list_id')
                ->leftjoin('customer_contract', 'customer_contract.quotation_id', 'back_order.quotation_id')
                ->with('Quotation', 'Quotation.Company', 'Quotation.Customer', 'Quotation.AdminUser', 'Quotation.Customer.Districts.Amphures', 'Quotation.Customer.Contact','Quotation.Company.SaleArea')
                ->find($id);

        // return view('admin.BackOrder.Modal.modal_fixedspec', $data);
        $return['format_ot_price'] = number_format($content->quotation_price_list_guarantee_ot_price,2);
        $return['format_salary'] = number_format($content->quotation_price_list_salary,2);
        $return['format_back_order_end_date'] = date("d/m/Y", strtotime($content->back_order_end_date));
        $return['format_confirmation_recruit'] = date("d/m/Y", strtotime($content->created_at));


        $date_create = strtotime($content->created_at);
        $date_now = strtotime(date("Y/m/d"));
        $year1 = date('Y', $date_create);
        $year2 = date('Y', $date_now);
        $month1 = date('m', $date_create);
        $month2 = date('m', $date_now);
        $datediff = $date_now - $date_create;

        $return['format_Count_MM'] = (($year2 - $year1) * 12) + ($month2 - $month1);
        $return['format_Count_DD'] = round($datediff / (60 * 60 * 24));

        $appdate = QuotationPreApprove::where('quotation_id', $content->Quotation->quotation_id)->where('quotation_pre_approve_status', 1)->orderBy('quotation_pre_approvec_lv', 'desc')->first();
        $return['sales_confirmed'] =  date("d/m/Y", strtotime($appdate->quotation_pre_approve_date_approve));
        $return['sales_comment'] = $appdate->quotation_pre_approve_comment;

        $return['status'] = 1;
        $return['title'] = 'Get BackOrder';
        $return['content'] = $content;
        return $return;
    }
}
