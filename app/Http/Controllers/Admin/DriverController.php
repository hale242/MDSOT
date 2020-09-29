<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use PDF;
use File;
use App\MenuSystem;
use App\Driver;
use App\Helper;
use App\NamePrefix;
use App\RecruitmentPosition;
use App\Gender;
use App\Provinces;
use App\JobQuestion;
use App\LanguageType;
use App\TypeDocumentDriver;
use App\TypeJobNew;
use App\BankType;
use App\WorkingEquipment;
use App\DriverContractFile;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Driver')->with('MainMenu')->first();
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

        if (Helper::CheckPermissionMenu('Driver', '1')) {
            return view('admin.Driver.driver', $data);
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
        $result = Driver::select(
            'driver.driver_id',
            'driver.driver_code',
            'driver.driver_name_th',
            'driver.driver_name_en',
            'driver.driver_lastname_th',
            'driver.driver_lastname_en',
            'driver.driver_id_card_no',
            'driver.driver_expected_salary',
            'driver.driver_age',
            'driver.driver_status_job_app',
            'driver.driver_availlale_date',
            'driver.driver_phone',
            'driver.driver_status_contract',
            'driver.driver_status',
            'driver_contract_file.driver_contract_file_date_end',
            'recruitment_position.recruitment_position_name',
            'districts.districts_name',
            'amphures.amphures_name',
            'provinces.provinces_name'
        )
            ->leftjoin('driver_contract_file', 'driver_contract_file.driver_id', 'driver.driver_id')
            ->leftjoin('recruitment_position', 'recruitment_position.recruitment_position_id', 'driver.recruitment_position_id')
            ->leftjoin('districts', 'districts.districts_id', 'driver.districts_id')
            ->leftjoin('amphures', 'amphures.amphures_id', 'districts.amphures_id')
            ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')
            // ->leftjoin('driver_language', 'driver_language.driver_id', 'driver.driver_id')

            // ->with('DriverLanguage')
            ->where('driver_contract_file.driver_contract_file_status', '1')
            ->whereIn('driver_status', ['1', '2', '3', '99']);

        $page_contract = $request->input('page_contract');
        $page_standbydriver = $request->input('page_standbydriver');
        $page_product_category = $request->input('page_product_category');

        $driver_id = $request->input('driver_id');
        $gender_id = $request->input('gender_id');
        $driver_name = $request->input('driver_name');
        $driver_lastname = $request->input('driver_lastname');
        $driver_id_card_no = $request->input('driver_id_card_no');
        $driver_age = $request->input('driver_age');
        $driver_status = $request->input('driver_status');
        $driver_availlale_date = $request->input('driver_availlale_date');
        $driver_availlale_end = $request->input('driver_availlale_end');
        $recruitment_position_id = $request->input('recruitment_position_id');
        $driver_language = $request->input('driver_language');

        if ($driver_name) {
            $result->where('driver.driver_name_th', 'like', '%' . $driver_name . '%');
            $result->orWhere('driver.driver_name_en', 'like', '%' . $driver_name . '%');
            $result->where('driver_contract_file.driver_contract_file_status', '1');
        }
        if ($driver_lastname) {
            $result->where('driver.driver_lastname_th', 'like', '%' . $driver_lastname . '%');
            $result->orWhere('driver.driver_lastname_en', 'like', '%' . $driver_lastname . '%');
            $result->where('driver_contract_file.driver_contract_file_status', '1');
        }
        if ($driver_id) {
            $result->where('driver.driver_id', $driver_id);
        }
        if ($gender_id) {
            $result->where('driver.gender_id', $gender_id);
        }
        if ($driver_language) {
            $result->where('driver_language.language_type_id', $driver_language);
        }
        if ($driver_id_card_no) {
            $result->where('driver.driver_id_card_no', 'like', '%' . $driver_id_card_no . '%');
        }
        if ($driver_age) {
            $driver_age = explode("-", $driver_age);
            if (isset($driver_age[0]) && isset($driver_age[1])) {
                $result->whereBetween('driver.driver_age', [$driver_age[0], $driver_age[1]]);
            }
        }
        if ($recruitment_position_id) {
            $result->where('driver.recruitment_position_id',$recruitment_position_id);
        }
        if ($driver_status) {
            $result->where('driver.driver_status', $driver_status);
        }
        if ($driver_availlale_date && $driver_availlale_end) {
            $result->whereBetween('driver.driver_availlale_date', [$driver_availlale_date, $driver_availlale_end]);
        } elseif ($driver_availlale_date && !$driver_availlale_end) {
            $result->where('driver.driver_availlale_date', '>=', $driver_availlale_date);
        } elseif (!$driver_availlale_date && $driver_availlale_end) {
            $result->where('driver.driver_availlale_date', '<=', $driver_availlale_end);
        }

        if ($page_standbydriver) {
            $result->whereIn('driver_status', [1, 2, 3]);
        }

        // $result->groupBy('driver.driver_contract_file_date_end');

        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->driver_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->driver_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('name_th', function ($res) {
                return $res->driver_name_th . ' ' . $res->driver_lastname_th;
            })
            ->addColumn('name_en', function ($res) {
                return $res->driver_name_en . ' ' . $res->driver_lastname_en;
            })
            ->editColumn('driver_expected_salary', function ($res) {
                return number_format($res->driver_expected_salary, 2);
            })
            ->editColumn('driver_availlale_date', function ($res) {
                return $res->driver_availlale_date ? date("d/m/Y", strtotime($res->driver_availlale_date)) : '';
            })
            ->editColumn('driver_contract_file_date_end', function ($res) {
                return $res->driver_contract_file_date_end ? date("d/m/Y", strtotime($res->driver_contract_file_date_end)) : '';
            })
            ->addColumn('status', function ($res) {
                $str = '';
                if ($res->driver_status == 0) {
                    $str = '<span class="badge badge-pill text-white font-medium badge-danger label-rouded">ยังไม่ได้เป็นพนักงาน</span>';
                }
                if ($res->driver_status == 1) {
                    $str = '<span class="badge badge-pill text-white font-medium badge-warning label-rouded">standby</span>';
                }
                if ($res->driver_status == 2) {
                    $str = '<span class="badge badge-pill text-white font-medium badge-info label-rouded">Standby ไปทดแทน</span>';
                }
                if ($res->driver_status == 3) {
                    $str = '<span class="badge badge-pill text-white font-medium badge-success label-rouded">พนักงานสัญญาจ้าง</span>';
                }
                if ($res->driver_status == 99) {
                    $str = '<span class="badge badge-pill text-white font-medium badge-secondary label-rouded">ออก</span>';
                }
                return $str;
            })
            ->addColumn('action', function ($res) use ($page_contract, $page_product_category) {
                $view = Helper::CheckPermissionMenu('Driver', '1');
                $insert = Helper::CheckPermissionMenu('Driver', '2');
                $update = Helper::CheckPermissionMenu('Driver', '3');
                $delete = Helper::CheckPermissionMenu('Driver', '4');
                if ($res->driver_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->driver_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->driver_id . '">Edit</button>';
                // $btnFileDocument = '<button type="button" class="btn btn-success btn-md btn-file-document text-white" data-id="' . $res->driver_id . '">File Document</button>';
                // $btnBookBank = '<button type="button" class="btn btn-primary btn-md btn-book-bank text-white" data-id="' . $res->driver_id . '">Book Bank</button>';
                // $btnEquipment = '<button type="button" class="btn btn-warning btn-md btn-equipment" data-id="' . $res->driver_id . '">Equipment</button>';
                // $btnAttachContract = '<button type="button" class="btn btn-success btn-md btn-attach-contract" data-id="' . $res->driver_id . '">Attach a contract</button>';
                // $btnPrintPdf = '<a href="' . url('admin/JobRegister/PrintDriverProfile/' . $res->driver_id) . '" class="btn btn-warning btn-md" data-id="' . $res->driver_id . '" target="_blank">Print</a>';
                // $btnPrintPdfFull = '<a href="' . url('admin/JobRegister/PrintDriverProfileFull/' . $res->driver_id) . '" class="btn btn-warning btn-md" data-id="' . $res->driver_id . '" target="_blank">Print Full</a>';
                // $btnGuarantee = '<button type="button" class="btn btn-info btn-md btn-guarantee text-white" data-id="' . $res->driver_id . '" data-name="' . $res->driver_name_th . ' ' . $res->driver_lastname_th . '">Guarantee</button>';
                // $btnLeave = '<button type="button" class="btn btn-success btn-md btn-leave text-white" data-id="' . $res->driver_id . '" ">Leave</button>';
                // $btnChangeStatus = '<button type="button" class="btn btn-danger btn-md btn-change-status text-white" data-id="' . $res->driver_id . '" ">Change Status</button>';
                // $str = '';

                // if (!$page_product_category) {
                //     $str .= ' ' . $btnFileDocument;
                //     $str .= ' ' . $btnBookBank;
                //     $str .= ' ' . $btnEquipment;
                // }
                // if ($view) {
                //     $str .= ' ' . $btnView;
                // }
                // $str .= ' ' . $btnPrintPdf;
                // $str .= ' ' . $btnPrintPdfFull;
                // if ($update && !$page_product_category) {
                //     $str .= ' ' . $btnEdit;
                // }
                // if (!$page_contract && !$page_product_category) {
                //     $str .= ' ' . $btnAttachContract;
                //     $str .= ' ' . $btnGuarantee;
                //     $str .= ' ' . $btnLeave;
                //     $str .= ' ' . $btnChangeStatus;
                // }

                // return $str;

                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if (!$page_product_category) {
                    $str .= '<a class="dropdown-item btn-file-document" href="javascript:void(0)" data-toggle="modal" data-target="#FileDocumentModal" data-id="' . $res->driver_id . '">File Document</a>';
                    $str .= '<a class="dropdown-item btn-book-bank" href="javascript:void(0)" data-toggle="modal" data-target="#BookBankModal" data-id="' . $res->driver_id . '">Book Bank</a>';
                    $str .= '<a class="dropdown-item btn-equipment" href="javascript:void(0)" data-toggle="modal" data-target="#EquipmentModal" data-id="' . $res->driver_id . '">Equipment</a>';
                }
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_id . '">View</a>';
                }
                $str .= '<a class="dropdown-item" href="' . url('admin/JobRegister/PrintDriverProfile/' . $res->driver_id) . '" class="btn btn-warning btn-md" data-id="' . $res->driver_id . '" target="_blank">Print</a>';
                $str .= '<a class="dropdown-item" href="' . url('admin/JobRegister/PrintDriverProfileFull/' . $res->driver_id) . '" class="btn btn-warning btn-md" data-id="' . $res->driver_id . '" target="_blank">Print Full</a>';
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->driver_id . '">Edit</a>';
                }
                if (!$page_contract && !$page_product_category) {
                    $str .= '<a class="dropdown-item btn-attach-contract" href="javascript:void(0)" data-toggle="modal" data-target="#AttachContractModal" data-id="' . $res->driver_id . '">Attach a contract</a>';
                    $str .= '<a class="dropdown-item btn-md btn-guarantee" href="javascript:void(0)" data-toggle="modal" data-target="#GuaranteeModal" data-id="' . $res->driver_id . '" data-name="' . $res->driver_name_th . ' ' . $res->driver_lastname_th . '">Guarantee</a>';
                    $str .= '<a class="dropdown-item btn-leave" href="javascript:void(0)" data-toggle="modal" data-target="#LeaveModal" data-id="' . $res->driver_id . '">Leave</a>';
                    $str .= '<a class="dropdown-item btn-change-status" href="javascript:void(0)" data-toggle="modal" data-target="#ChangeStatusModal" data-id="' . $res->driver_id . '">Change Status</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                

                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'status'])
            ->make(true);
    }
}
