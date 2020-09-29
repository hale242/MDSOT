<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverWorking;
use App\RecruitmentPosition;
use App\Gender;
use App\NamePrefix;
use App\Provinces;
use App\JobQuestion;
use App\LanguageType;
use App\TypeDocumentDriver;
use App\TypeJobNew;
use App\BankType;
use App\WorkingEquipment;
use App\Driver;

class ReplacementDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','ReplacementDriver')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['RecruitmentPositions'] = RecruitmentPosition::where('recruitment_position_status', 1)->get();
        $data['Genders'] = Gender::where('gender_status', 1)->get();
        $data['NamePrefixs'] = NamePrefix::where('name_prefix_status', 1)->get();
        $data['Provinces'] = Provinces::where('provinces_status', 1)->get();
        $data['JobQuestions'] = JobQuestion::where('job_question_status', 1)->orderBy('job_question_z_index')->get();
        $data['LanguageTypes'] = LanguageType::where('language_type_status', 1)->get();
        $data['TypeDocumentDrivers'] = TypeDocumentDriver::where('type_doc_driver_status', 1)->get();
        $data['TypeJobNews'] = TypeJobNew::where('type_job_new_status', 1)->get();
        $data['BankTypes'] = BankType::where('driver_bank_type_status', 1)->get();
        $data['WorkingEquipments'] = WorkingEquipment::where('working_equipment_status', 1)->get();
        $data['Drivers'] = Driver::get();
        if(Helper::CheckPermissionMenu('ReplacementDriver' , '1')){
            return view('admin.ReplacementDriver.replacement_driver', $data);
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
        //
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
        $result = DriverWorking::select(
            'driver_working.*',
            'driver_new.driver_id_card_no as driver_id_card_no_new',
            'driver_new.driver_age as driver_age_new',
            'driver_new.driver_id_card_no as driver_id_card_no_new',
            'driver_new.driver_code as driver_code_new',
            'driver_new.driver_name_th as driver_name_th_new',
            'driver_new.driver_lastname_th as driver_lastname_th_new',
            'driver_new.driver_name_en as driver_name_en_new',
            'driver_new.driver_lastname_en as driver_lastname_en_new',
            'driver_ole.driver_id_card_no as driver_id_card_no_ole',
            'driver_ole.driver_age as driver_age_ole',
            'driver_ole.driver_id_card_no as driver_id_card_no_ole',
            'driver_ole.driver_code as driver_code_ole',
            'driver_ole.driver_name_th as driver_name_th_ole',
            'driver_ole.driver_lastname_th as driver_lastname_th_ole',
            'driver_ole.driver_name_en as driver_name_en_ole',
            'driver_ole.driver_lastname_en as driver_lastname_en_ole',
            'recruitment_position_new.recruitment_position_name as recruitment_position_name_new',
            'recruitment_position_ole.recruitment_position_name as recruitment_position_name_ole',
            'customer_contract.customer_contract_full_code',
            'company.company_name_th'
        )
        ->leftjoin('driver as driver_new', 'driver_new.driver_id', 'driver_working.driver_id')
        ->leftjoin('driver as driver_ole', 'driver_ole.driver_id', 'driver_working.ole_driver_id')
        ->leftjoin('recruitment_position as recruitment_position_new', 'recruitment_position_new.recruitment_position_id', 'driver_new.recruitment_position_id')
        ->leftjoin('recruitment_position as recruitment_position_ole', 'recruitment_position_ole.recruitment_position_id', 'driver_ole.recruitment_position_id')
        ->leftjoin('customer_contract', 'customer_contract.customer_contract_id', 'driver_working.customer_contract_id')
        ->leftjoin('company', 'company.company_id', 'driver_working.new_company_id')
        ->where('driver_new.driver_status', 2);
        $driver_code = $request->input('driver_code');
        $driver_id = $request->input('driver_id');
        $driver_id_card_no = $request->input('driver_id_card_no');
        $driver_age = $request->input('driver_age');
        $driver_working_date_start = $request->input('driver_working_date_start');
        $driver_working_date_end = $request->input('driver_working_date_end');
        if($driver_code){
            $result->where('driver_new.driver_code', 'like', '%'.$driver_code.'%');
            $result->orWhere('driver_ole.driver_code', 'like', '%'.$driver_code.'%');
        }
        if($driver_id){
            $result->where('driver_new.driver_id', $driver_id);
            $result->orWhere('driver_ole.driver_id', $driver_id);
        }
        if($driver_id_card_no){
            $result->where('driver_new.driver_id_card_no', $driver_id_card_no);
            $result->orWhere('driver_ole.driver_id_card_no', $driver_id_card_no);
        }
        if($driver_age){
            $driver_age = explode("-", $driver_age);
            if (isset($driver_age[0]) && isset($driver_age[1])) {
                $result->whereBetween('driver_new.driver_age', [$driver_age[0], $driver_age[1]]);
                $result->orWhereBetween('driver_ole.driver_age', [$driver_age[0], $driver_age[1]]);
            }
        }
        if($driver_working_date_start && $driver_working_date_end){
            $result->whereBetween('driver_working_date_start', [$driver_working_date_start.' 00:00:00', $driver_working_date_end.' 23:59:59']);
        }elseif($driver_working_date_start && !$driver_working_date_end){
            $result->whereBetween('driver_working_date_start', [$driver_working_date_start.' 00:00:00', $driver_working_date_start.' 23:59:59']);
        }elseif(!$driver_working_date_start && $driver_working_date_end){
            $result->whereBetween('driver_working_date_start', [$driver_working_date_end.' 00:00:00', $driver_working_date_end.' 23:59:59']);
        }
        return Datatables::of($result)
            ->addColumn('driver_name_th_ole', function ($res) {
                return $res->driver_name_th_ole.' '.$res->driver_lastname_th_ole;
            })
            ->addColumn('driver_name_en_ole', function ($res) {
                return $res->driver_name_en_ole.' '.$res->driver_lastname_en_ole;
            })
            ->addColumn('driver_name_th_new', function ($res) {
                return $res->driver_name_th_new.' '.$res->driver_lastname_th_new;
            })
            ->addColumn('driver_name_en_new', function ($res) {
                return $res->driver_name_en_new.' '.$res->driver_lastname_en_new;
            })
            ->editColumn('driver_working_date_start', function ($res) {
                return $res->driver_working_date_start ? date('d/m/Y', strtotime($res->driver_working_date_start)) : '';
            })
            ->editColumn('driver_working_date_end', function ($res) {
                return $res->driver_working_date_end ? date('d/m/Y', strtotime($res->driver_working_date_end)) : '';
            })
            ->addColumn('count_date', function ($res) {
                $start = $res->driver_working_date_start ? date('Y-m-d', strtotime($res->driver_working_date_start)) : '';
                $end = $res->driver_working_date_end ? date('Y-m-d', strtotime($res->driver_working_date_end)) : '';
                $count_date = '';
                if($start && $end){
                    $start = strtotime($start);
                    $end = strtotime($end);
                    $count_date = $end - $start;
                    $count_date = round($count_date / (60 * 60 * 24));
                }
                return $count_date;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('ReplacementDriver', '1');
                $insert = Helper::CheckPermissionMenu('ReplacementDriver', '2');
                $update = Helper::CheckPermissionMenu('ReplacementDriver', '3');
                $delete = Helper::CheckPermissionMenu('ReplacementDriver', '4');
                if ($res->driver_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->driver_id . '">View</button>';
                $btnFileDocument = '<button type="button" class="btn btn-success btn-md btn-file-document text-white" data-id="' . $res->driver_id . '">File Document</button>';
                $btnBookBank = '<button type="button" class="btn btn-primary btn-md btn-book-bank text-white" data-id="' . $res->driver_id . '">Book Bank</button>';
                $btnEquipment = '<button type="button" class="btn btn-warning btn-md btn-equipment" data-id="' . $res->driver_id . '">Equipment</button>';
                $btnAttachContract = '<button type="button" class="btn btn-success btn-md btn-attach-contract" data-id="' . $res->driver_id . '">Attach a contract</button>';
                $btnPrintPdf = '<a href="' . url('admin/JobRegister/PrintDriverProfile/' . $res->driver_id) . '" class="btn btn-warning btn-md" data-id="' . $res->driver_id . '" target="_blank">Print</a>';
                $btnPrintPdfFull = '<a href="' . url('admin/JobRegister/PrintDriverProfileFull/' . $res->driver_id) . '" class="btn btn-warning btn-md" data-id="' . $res->driver_id . '" target="_blank">Print Full</a>';
                $btnGuarantee = '<button type="button" class="btn btn-info btn-md btn-guarantee text-white" data-id="' . $res->driver_id . '" data-name="' . $res->driver_name_th . ' ' . $res->driver_lastname_th . '">Guarantee</button>';
                $btnLeave = '<button type="button" class="btn btn-success btn-md btn-leave text-white" data-id="' . $res->driver_id . '" ">Leave</button>';
                $str = '';
                $str .= ' ' . $btnFileDocument;
                $str .= ' ' . $btnBookBank;
                $str .= ' ' . $btnEquipment;
                if($view){
                    $str .= ' ' . $btnView;
                }
                $str .= ' ' . $btnPrintPdf;
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
