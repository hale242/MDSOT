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
use App\Brethren;
use App\DriverEmergencyContact;
use App\DriverLanguage;
use App\DriverReference;
use App\EducationDriver;
use App\JobAnswer;
use App\TrainingRecord;
use App\WorkHistory;
use App\DriverFile;
use App\Amphures;
use App\Districts;
use App\DriverInterview;

class ApplicantsAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'ApplicantsAppointment')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['RecruitmentPositions'] = RecruitmentPosition::where('recruitment_position_status', 1)->get();
        $data['Genders'] = Gender::where('gender_status', 1)->get();
        $data['NamePrefixs'] = NamePrefix::where('name_prefix_status', 1)->get();
        $data['Provinces'] = Provinces::where('provinces_status', 1)->get();
        $data['JobQuestions'] = JobQuestion::where('job_question_status', 1)->orderBy('job_question_z_index')->get();
        $data['LanguageTypes'] = LanguageType::where('language_type_status', 1)->get();
        $data['TypeDocumentDrivers'] = TypeDocumentDriver::where('type_doc_driver_status', 1)->get();
        $data['TypeJobNews'] = TypeJobNew::where('type_job_new_status', 1)->get();
        $data['StatusJobApps'] = [
            0 => 'รอเรียกสัมภาษณ์งาน',
            1 => 'ผ่านสัมภาษณ์งานรอบแรก',
            2 => 'ผ่านการทดสอบข้อสอบ (เตรียมทดสอบขับรถ)',
            3 => 'ตกการทดสอบข้อสอบ (ให้ทดสอบขับรถ) (เตรียมทดสอบขับรถ)',
            4 => 'ผ่านการทดสอบขับรถ',
            90 => 'ตกการทดสอบรอบแรก',
            91 => 'ตกการทดสอบข้อสอบ (กลับบ้าน)',
            92 => 'ตกการทดสอบขับรถ',
            98 => 'ให้กลับมาทดสอบใหม่ได้',
            99 => 'ห้ามกลับมาสมัครใหม่'
        ];
        if (Helper::CheckPermissionMenu('ApplicantsAppointment', '1')) {
            return view('admin.ApplicantsAppointment.applicants_appointment', $data);
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
        $result = Driver::select(
            'driver.driver_id',
            'driver.driver_name_th',
            'driver.driver_name_en',
            'driver.driver_lastname_th',
            'driver.driver_lastname_en',
            'driver.driver_id_card_no',
            'driver.driver_age',
            'driver.driver_status_job_app',
            'driver.driver_interview_date',
            'driver.driver_availlale_date',
            'driver.driver_mobile_phone',
            'recruitment_position.recruitment_position_name',
            'districts.districts_name',
            'amphures.amphures_name',
            'provinces.provinces_name'
        )
            ->leftjoin('recruitment_position', 'recruitment_position.recruitment_position_id', 'driver.recruitment_position_id')
            ->leftjoin('districts', 'districts.districts_id', 'driver.districts_id')
            ->leftjoin('amphures', 'amphures.amphures_id', 'districts.amphures_id')
            ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')
            ->where('driver.driver_status', 1);

        // Start search
        $driver_name = $request->input('driver_name');
        $driver_lastname = $request->input('driver_lastname');
        $driver_id_card_no = $request->input('driver_id_card_no');
        $driver_age = $request->input('driver_age');
        $driver_status_job_app = $request->input('driver_status_job_app');
        $driver_interview_date_start = $request->input('driver_interview_date_start');
        $driver_interview_date_end = $request->input('driver_interview_date_end');
        if ($driver_name) {
            $result->where('driver.driver_name_th', 'like', '%' . $driver_name . '%');
            $result->orWhere('driver.driver_name_en', 'like', '%' . $driver_name . '%');
        }
        if ($driver_lastname) {
            $result->where('driver.driver_lastname_th', 'like', '%' . $driver_lastname . '%');
            $result->orWhere('driver.driver_lastname_en', 'like', '%' . $driver_lastname . '%');
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
        if ($driver_status_job_app || $driver_status_job_app == 0 && $driver_status_job_app != '') {
            $result->where('driver.driver_status_job_app', $driver_status_job_app);
        }
        if ($driver_interview_date_start && $driver_interview_date_end) {
            $result->whereBetween('driver.driver_interview_date', [$driver_interview_date_start . ' 00:00:00', $driver_interview_date_end . ' 23:59:59']);
        } elseif ($driver_interview_date_start && !$driver_interview_date_end) {
            $result->where('driver.driver_interview_date', '>=', $driver_interview_date_start . '00:00:00');
        } elseif (!$driver_interview_date_start && $driver_interview_date_end) {
            $result->where('driver.driver_interview_date', '<=', $driver_interview_date_end . ' 23:59:59');
        }
        // End search

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
            ->editColumn('driver_interview_date', function ($res) {
                return $res->driver_interview_date ? date("d/m/Y", strtotime($res->driver_interview_date)) : '';
            })
            ->addColumn('status', function ($res) {
                $str = '<span class="badge badge-pill text-white font-medium label-rouded" style="background-color: ' . $res->statusJobAppColor[$res->driver_status_job_app] . '">' . $res->statusJobApp[$res->driver_status_job_app] . '</span>';
                return $str;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('JobRegister', '1');
                $insert = Helper::CheckPermissionMenu('JobRegister', '2');
                $update = Helper::CheckPermissionMenu('JobRegister', '3');
                $delete = Helper::CheckPermissionMenu('JobRegister', '4');
                if ($res->department_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_id.'">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->driver_id.'">Edit</button>';
                // $btnFileDocument = '<button type="button" class="btn btn-success btn-md btn-file-document text-white" data-id="'.$res->driver_id.'">File Document</button>';
                // $btnPrintPdf = '<a href="'.url('admin/JobRegister/PrintDriverProfile/'.$res->driver_id).'" class="btn btn-warning btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Print</a>';
                // $str = '';
                // $str.=' '.$btnFileDocument;
                // if($view){
                //     $str.=' '.$btnView;
                // }
                // $str.=' '.$btnPrintPdf;
                // if($update){
                //     $str.=' '.$btnEdit;
                // }
                // return $str;
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-file-document" href="javascript:void(0)" data-toggle="modal" data-target="#FileDocumentModal" data-id="' . $res->driver_id . '">File Document</a>';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_id . '">View</a>';
                }
                $str .= '<a class="dropdown-item" href="'.url('admin/JobRegister/PrintDriverProfile/'.$res->driver_id).'" class="btn btn-warning btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Print</a>';
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->driver_id . '">Edit</a>';
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
