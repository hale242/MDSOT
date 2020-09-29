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
use App\InterviewPercenPass;
use App\RunCode;
use App\DriverResign;

class JobRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'JobRegister')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['RecruitmentPositions'] = RecruitmentPosition::where('recruitment_position_status', 1)->get();
        $data['Genders'] = Gender::where('gender_status', 1)->get();
        $data['NamePrefixs'] = NamePrefix::where('name_prefix_status', 1)->get();
        $data['Provinces'] = Provinces::where('provinces_status', 1)->get();
        $data['JobQuestions'] = JobQuestion::where('job_question_status', 1)->orderBy('job_question_z_index')->get();
        $data['LanguageTypes'] = LanguageType::where('language_type_status', 1)->get();
        $data['TypeDocumentDrivers'] = TypeDocumentDriver::where('type_doc_driver_status', 1)->get();
        $data['TypeJobNews'] = TypeJobNew::where('type_job_new_status', 1)->get();
        $data['RunCodes'] = RunCode::where('run_code_status', 1)->where('run_code_type', 1)->get(); //(1) แบบประเมินผลการสัมภาษณ์ (Interview Evaluation) F#6
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
        if (Helper::CheckPermissionMenu('JobRegister', '1')) {
            return view('admin.JobRegister.job_register', $data);
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
        // return $request->all();
        $driver = $request->input('driver');
        $brethrens = $request->input('brethren');
        $driver_emergency_contacts = $request->input('driver_emergency_contacts');
        $driver_files = $request->input('driver_file');
        $driver_languages = $request->input('driver_language');
        $driver_references = $request->input('driver_reference');
        $education_drivers = $request->input('education_driver');
        $job_answers = $request->input('job_answer');
        $training_records = $request->input('training_record');
        $work_histories = $request->input('work_history');
        $validator = Validator::make($request->all(), []);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($driver) {
                    if (isset($driver['recruitment_position_id']) && $driver['recruitment_position_id'] && isset($driver['name_prefix_id']) && $driver['name_prefix_id'] && isset($driver['type_job_new_id']) && $driver['type_job_new_id'] && isset($driver['gender_id']) && $driver['gender_id'] && isset($driver['districts_id']) && $driver['districts_id']) {
                        $InterviewPercenPass = InterviewPercenPass::where('interview_percen_pass_status', 1)->first();
                        $Driver = new Driver;
                        foreach ($driver as $key => $val) {
                            $Driver->{$key} = $val;
                        }
                        if ($Driver->driver_expected_salary) {
                            $Driver->driver_expected_salary = str_replace(',', '', $Driver->driver_expected_salary);
                        }
                        if (isset($Driver->driver_image) && $Driver->driver_image) {
                            $Driver->driver_image = str_replace("JobRegister/", "", $Driver->driver_image);
                        }
                        $Driver->driver_status_job_app = 0; // ยังไม่ส่งสัมภาษงาน
                        $Driver->save();
                        if ($brethrens) {
                            foreach ($brethrens as $brethren) {
                                $Brethren = new Brethren;
                                foreach ($brethren as $key => $val) {
                                    $Brethren->{$key} = $val;
                                }
                                $Brethren->driver_id = $Driver->driver_id;
                                $Brethren->save();
                            }
                        }
                        if ($driver_emergency_contacts) {
                            foreach ($driver_emergency_contacts as $driver_emergency_contact) {
                                $DriverEmergencyContact = new DriverEmergencyContact;
                                foreach ($driver_emergency_contact as $key => $val) {
                                    $DriverEmergencyContact->{$key} = $val;
                                }
                                $DriverEmergencyContact->driver_id = $Driver->driver_id;
                                $DriverEmergencyContact->save();
                            }
                        }
                        if ($driver_languages) {
                            foreach ($driver_languages as $driver_language) {
                                if (isset($driver_language['language_type_id']) && $driver_language['language_type_id']) {
                                    $DriverLanguage = new DriverLanguage;
                                    foreach ($driver_language as $key => $val) {
                                        $DriverLanguage->{$key} = $val;
                                    }
                                    $DriverLanguage->driver_id = $Driver->driver_id;
                                    $DriverLanguage->save();
                                }
                            }
                        }
                        if ($driver_references) {
                            foreach ($driver_references as $driver_reference) {
                                $DriverReference = new DriverReference;
                                foreach ($driver_reference as $key => $val) {
                                    $DriverReference->{$key} = $val;
                                }
                                $DriverReference->driver_id = $Driver->driver_id;
                                $DriverReference->save();
                            }
                        }
                        if ($education_drivers) {
                            foreach ($education_drivers as $education_driver) {
                                if (isset($education_driver['education_driver_date_fr']) && $education_driver['education_driver_date_fr']  && isset($education_driver['education_driver_date_to'])  && isset($education_driver['education_driver_name_instirute'])  && $education_driver['education_driver_name_instirute']) {
                                    $EducationDriver = new EducationDriver;
                                    foreach ($education_driver as $key => $val) {
                                        $EducationDriver->{$key} = $val;
                                    }
                                    $EducationDriver->driver_id = $Driver->driver_id;
                                    $EducationDriver->save();
                                }
                            }
                        }
                        if ($job_answers) {
                            foreach ($job_answers as $job_answer) {
                                if (isset($job_answer['job_question_id']) && $job_answer['job_question_id'] && isset($job_answer['job_answer_answer'])) {
                                    $JobAnswer = new JobAnswer;
                                    foreach ($job_answer as $key => $val) {
                                        $JobAnswer->{$key} = $val;
                                    }
                                    $JobAnswer->driver_id = $Driver->driver_id;
                                    $JobAnswer->save();
                                }
                            }
                        }
                        if ($training_records) {
                            foreach ($training_records as $training_record) {
                                $TrainingRecord = new TrainingRecord;
                                foreach ($training_record as $key => $val) {
                                    $TrainingRecord->{$key} = $val;
                                }
                                $TrainingRecord->driver_id = $Driver->driver_id;
                                $TrainingRecord->save();
                            }
                        }
                        if ($work_histories) {
                            foreach ($work_histories as $work_history) {
                                $WorkHistory = new WorkHistory;
                                foreach ($work_history as $key => $val) {
                                    $WorkHistory->{$key} = $val;
                                }
                                $WorkHistory->driver_id = $Driver->driver_id;
                                if ($WorkHistory->work_history_bonus_start) {
                                    $WorkHistory->work_history_bonus_start = str_replace(',', '', $WorkHistory->work_history_bonus_start);
                                }
                                if ($WorkHistory->work_history_commission_start) {
                                    $WorkHistory->work_history_commission_start = str_replace(',', '', $WorkHistory->work_history_commission_start);
                                }
                                if ($WorkHistory->work_history_gasoline_start) {
                                    $WorkHistory->work_history_gasoline_start = str_replace(',', '', $WorkHistory->work_history_gasoline_start);
                                }
                                if ($WorkHistory->work_history_incentive_start) {
                                    $WorkHistory->work_history_incentive_start = str_replace(',', '', $WorkHistory->work_history_incentive_start);
                                }
                                if ($WorkHistory->work_history_mobile_start) {
                                    $WorkHistory->work_history_mobile_start = str_replace(',', '', $WorkHistory->work_history_mobile_start);
                                }
                                if ($WorkHistory->work_history_other_start) {
                                    $WorkHistory->work_history_other_start = str_replace(',', '', $WorkHistory->work_history_other_start);
                                }
                                if ($WorkHistory->work_history_salary_end) {
                                    $WorkHistory->work_history_salary_end = str_replace(',', '', $WorkHistory->work_history_salary_end);
                                }
                                if ($WorkHistory->work_history_salary_start) {
                                    $WorkHistory->work_history_salary_start = str_replace(',', '', $WorkHistory->work_history_salary_start);
                                }
                                $WorkHistory->save();
                            }
                        }
                        if ($driver_files) {
                            foreach ($driver_files as $aa => $driver_file) {
                                if (isset($driver_file['type_doc_driver_id']) && $driver_file['type_doc_driver_id']) {
                                    $DriverFile = new DriverFile;
                                    foreach ($driver_file as $key => $val) {
                                        $DriverFile->{$key} = $val;
                                    }
                                    $DriverFile->driver_id = $Driver->driver_id;
                                    $DriverFile->driver_file_status = isset($DriverFile->driver_file_name) ? 1 : 0;
                                    if (isset($DriverFile->driver_file_name) && $DriverFile->driver_file_name) {
                                        $DriverFile->driver_file_part = 'uploads/' . $DriverFile->driver_file_name;
                                        $DriverFile->driver_file_name = str_replace("DriverFile/", "", $DriverFile->driver_file_name);
                                    }
                                    $DriverFile->save();
                                }
                            }
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
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['department_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Department Name is required";
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

        $content = Driver::with([
            'Districts.Provinces', 'Districts.Amphures', 'Districts.Zipcode', 'Brethren', 'DriverEmergencyContact', 'DriverFile.TypeDocumentDriver', 'DriverLanguage.LanguageType', 'DriverReference', 'EducationDriver', 'JobAnswer.JobQuestion', 'TrainingRecord', 'WorkHistory', 'RecruitmentPosition', 'Gender', 'NamePrefix','RegisteredDistricts.Provinces','RegisteredDistricts.Amphures','RegisteredDistricts.Zipcode', 'DriverInterview'
        ])->find($id);

        // return $content;

        // Image
        if ($content->driver_image) {
            if (File::exists('uploads/JobRegister/' . $content->driver_image)) {
                $content->driver_image = asset('uploads/JobRegister/' . $content->driver_image);
            } else {
                $content->driver_image = asset('uploads/images/no-image.jpg');
            }
        } else {
            $content->driver_image = asset('uploads/images/no-image.jpg');
        }

        // Status
        if ($content->driver_status_family) {
            $content->driver_status_family_name = $content->statusFamily[$content->driver_status_family];
        }
        if ($content->driver_father_status) {
            $content->driver_father_status_name = $content->statusLiving[$content->driver_father_status];
        }
        if ($content->driver_mother_status) {
            $content->driver_mother_status_name = $content->statusLiving[$content->driver_mother_status];
        }
        if ($content->driver_military_status) {
            $content->driver_military_status_name = $content->statusDriverMilitary[$content->driver_military_status];
        }
        if ($content->driver_vehicles) {
            $content->driver_vehicles_name = $content->statusDriverVehicle[$content->driver_vehicles];
        }

        // Format date
        $content['driver_interview_date'] = $content->driver_interview_date ? date("Y-m-d", strtotime($content->driver_interview_date)) : '';
        $content['format_driver_interview_date'] = $content->driver_interview_date ? date("d/m/Y", strtotime($content->driver_interview_date)) : '';
        $content['format_driver_date_in_com'] = $content->driver_date_in_com ? date("d/m/Y", strtotime($content->driver_date_in_com)) : '';
        $content['format_driver_id_card_date_end'] = $content->driver_id_card_date_end ? date("d/m/Y", strtotime($content->driver_id_card_date_end)) : '';
        $content['format_driver_date_of_birth'] = $content->driver_date_of_birth ? date("d/m/Y", strtotime($content->driver_date_of_birth)) : '';
        $content['format_driver_availlale_date'] = $content->driver_availlale_date ? date("d/m/Y", strtotime($content->driver_availlale_date)) : '';
        $content['format_driver_driver_license_date'] = $content->driver_driver_license_date ? date("d/m/Y", strtotime($content->driver_driver_license_date)) : '';

        $amphures = '';
        $districts = '';
        $registere_amphures = '';
        $registere_districts = '';
        if ($content->Districts) {
            $amphures = Amphures::where('provinces_id', $content->Districts->provinces_id)->get();
            $districts = Districts::where('amphures_id', $content->Districts->amphures_id)->get();
        }
        if ($content->RegisteredDistricts) {
            $registere_amphures = Amphures::where('provinces_id', $content->RegisteredDistricts->provinces_id)->get();
            $registere_districts = Districts::where('amphures_id', $content->RegisteredDistricts->amphures_id)->get();
        }
        $content['interview_status'] = $content->DriverInterview && $content->DriverInterview->driver_interview_status ? $content->DriverInterview->statusInterview[$content->DriverInterview->driver_interview_status] : 'ไม่ระบุ';

        $statusJobAppdriver_status_job_app = '';
        if (isset($content->statusJobApp[$content->driver_status_job_app])) {
            $statusJobAppdriver_status_job_app = $content->statusJobApp[$content->driver_status_job_app];
        }
        // $content['driver_status_job_app_name'] = $content->driver_status_job_app ? $content->statusJobApp[$content->driver_status_job_app] : '';
        $content['driver_status_job_app_name'] = $content->driver_status_job_app ? $statusJobAppdriver_status_job_app : '';

        $return['status'] = 1;
        $return['title'] = 'Get JobRegister';
        $return['content'] = $content;
        $return['amphures'] = $amphures;
        $return['districts'] = $districts;
        $return['registere_amphures'] = $registere_amphures;
        $return['registere_districts'] = $registere_districts;
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
        // return $request->all();
        $driver = $request->input('driver');
        $brethrens = $request->input('brethren');
        $driver_emergency_contacts = $request->input('driver_emergency_contacts');
        $driver_files = $request->input('driver_file');
        $driver_languages = $request->input('driver_language');
        $driver_references = $request->input('driver_reference');
        $education_drivers = $request->input('education_driver');
        $job_answers = $request->input('job_answer');
        $training_records = $request->input('training_record');
        $work_histories = $request->input('work_history');
        $validator = Validator::make($request->all(), []);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($driver) {
                    if (isset($driver['recruitment_position_id']) && $driver['recruitment_position_id'] && isset($driver['name_prefix_id']) && $driver['name_prefix_id'] && isset($driver['type_job_new_id']) && $driver['type_job_new_id'] && isset($driver['gender_id']) && $driver['gender_id'] && isset($driver['districts_id']) && $driver['districts_id']) {
                        $Driver = Driver::find($id);
                        foreach ($driver as $key => $val) {
                            $Driver->{$key} = $val;
                        }
                        if ($Driver->driver_expected_salary) {
                            $Driver->driver_expected_salary = str_replace(',', '', $Driver->driver_expected_salary);
                        }
                        if (isset($Driver->driver_image) && $Driver->driver_image) {
                            $Driver->driver_image = str_replace("JobRegister/", "", $Driver->driver_image);
                        }
                        $Driver->save();
                        if ($brethrens) {
                            foreach ($brethrens as $brethren) {
                                if (isset($brethren['brethren_id'])) {
                                    $Brethren = Brethren::find($brethren['brethren_id']);
                                } else {
                                    $Brethren = new Brethren;
                                }
                                foreach ($brethren as $key => $val) {
                                    $Brethren->{$key} = $val;
                                }
                                $Brethren->driver_id = $Driver->driver_id;
                                $Brethren->save();
                            }
                        }
                        if ($driver_emergency_contacts) {
                            foreach ($driver_emergency_contacts as $driver_emergency_contact) {
                                if (isset($driver_emergency_contact['driver_emergency_contacts_id'])) {
                                    $DriverEmergencyContact = DriverEmergencyContact::find($driver_emergency_contact['driver_emergency_contacts_id']);
                                } else {
                                    $DriverEmergencyContact = new DriverEmergencyContact;
                                }
                                foreach ($driver_emergency_contact as $key => $val) {
                                    $DriverEmergencyContact->{$key} = $val;
                                }
                                $DriverEmergencyContact->driver_id = $Driver->driver_id;
                                $DriverEmergencyContact->save();
                            }
                        }
                        if ($driver_languages) {
                            foreach ($driver_languages as $driver_language) {
                                if (isset($driver_language['language_type_id']) && $driver_language['language_type_id']) {
                                    if (isset($driver_language['driver_language_id'])) {
                                        $DriverLanguage = DriverLanguage::find($driver_language['driver_language_id']);
                                    } else {
                                        $DriverLanguage = new DriverLanguage;
                                    }
                                    foreach ($driver_language as $key => $val) {
                                        $DriverLanguage->{$key} = $val;
                                    }
                                    $DriverLanguage->driver_id = $Driver->driver_id;
                                    $DriverLanguage->save();
                                } else {
                                    $return['status'] = 0;
                                    $return['content'] = 'Unsuccess';
                                }
                            }
                        }
                        if ($driver_references) {
                            foreach ($driver_references as $driver_reference) {
                                if (isset($driver_reference['driver_reference_id'])) {
                                    $DriverReference = DriverReference::find($driver_reference['driver_reference_id']);
                                } else {
                                    $DriverReference = new DriverReference;
                                }
                                foreach ($driver_reference as $key => $val) {
                                    $DriverReference->{$key} = $val;
                                }
                                $DriverReference->driver_id = $Driver->driver_id;
                                $DriverReference->save();
                            }
                        }
                        if ($education_drivers) {
                            foreach ($education_drivers as $education_driver) {
                                if (isset($education_driver['education_driver_date_fr']) && $education_driver['education_driver_date_fr']  && isset($education_driver['education_driver_date_to'])  && isset($education_driver['education_driver_name_instirute'])  && $education_driver['education_driver_name_instirute']) {
                                    if (isset($education_driver['education_driver_id'])) {
                                        $EducationDriver = EducationDriver::find($education_driver['education_driver_id']);
                                    } else {
                                        $EducationDriver = new EducationDriver;
                                    }
                                    foreach ($education_driver as $key => $val) {
                                        $EducationDriver->{$key} = $val;
                                    }
                                    $EducationDriver->driver_id = $Driver->driver_id;
                                    $EducationDriver->save();
                                } else {
                                    $return['status'] = 0;
                                    $return['content'] = 'Unsuccess';
                                }
                            }
                        }
                        if ($job_answers) {
                            foreach ($job_answers as $job_answer) {
                                if (isset($job_answer['job_question_id']) && $job_answer['job_question_id'] && isset($job_answer['job_answer_answer'])) {
                                    if (isset($job_answer['job_answer_id'])) {
                                        $JobAnswer = JobAnswer::find($job_answer['job_answer_id']);
                                    } else {
                                        $JobAnswer = new JobAnswer;
                                    }
                                    foreach ($job_answer as $key => $val) {
                                        $JobAnswer->{$key} = $val;
                                    }
                                    $JobAnswer->driver_id = $Driver->driver_id;
                                    $JobAnswer->save();
                                } else {
                                    $return['status'] = 0;
                                    $return['content'] = 'Unsuccess';
                                }
                            }
                        }
                        if ($training_records) {
                            foreach ($training_records as $training_record) {
                                if (isset($training_record['training_record_id'])) {
                                    $TrainingRecord = TrainingRecord::find($training_record['training_record_id']);
                                } else {
                                    $TrainingRecord = new TrainingRecord;
                                }
                                foreach ($training_record as $key => $val) {
                                    $TrainingRecord->{$key} = $val;
                                }
                                $TrainingRecord->driver_id = $Driver->driver_id;
                                $TrainingRecord->save();
                            }
                        }
                        if ($work_histories) {
                            foreach ($work_histories as $work_history) {
                                if (isset($work_history['work_history_id'])) {
                                    $WorkHistory = WorkHistory::find($work_history['work_history_id']);
                                } else {
                                    $WorkHistory = new WorkHistory;
                                }
                                foreach ($work_history as $key => $val) {
                                    $WorkHistory->{$key} = $val;
                                }
                                $WorkHistory->driver_id = $Driver->driver_id;
                                if ($WorkHistory->work_history_bonus_start) {
                                    $WorkHistory->work_history_bonus_start = str_replace(',', '', $WorkHistory->work_history_bonus_start);
                                }
                                if ($WorkHistory->work_history_commission_start) {
                                    $WorkHistory->work_history_commission_start = str_replace(',', '', $WorkHistory->work_history_commission_start);
                                }
                                if ($WorkHistory->work_history_gasoline_start) {
                                    $WorkHistory->work_history_gasoline_start = str_replace(',', '', $WorkHistory->work_history_gasoline_start);
                                }
                                if ($WorkHistory->work_history_incentive_start) {
                                    $WorkHistory->work_history_incentive_start = str_replace(',', '', $WorkHistory->work_history_incentive_start);
                                }
                                if ($WorkHistory->work_history_mobile_start) {
                                    $WorkHistory->work_history_mobile_start = str_replace(',', '', $WorkHistory->work_history_mobile_start);
                                }
                                if ($WorkHistory->work_history_other_start) {
                                    $WorkHistory->work_history_other_start = str_replace(',', '', $WorkHistory->work_history_other_start);
                                }
                                if ($WorkHistory->work_history_salary_end) {
                                    $WorkHistory->work_history_salary_end = str_replace(',', '', $WorkHistory->work_history_salary_end);
                                }
                                if ($WorkHistory->work_history_salary_start) {
                                    $WorkHistory->work_history_salary_start = str_replace(',', '', $WorkHistory->work_history_salary_start);
                                }
                                $WorkHistory->save();
                            }
                        }
                    } else {
                        $return['status'] = 0;
                        $return['content'] = 'Unsuccess';
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
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['department_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Department Name is required";
            }
        }
        $return['title'] = 'Insert';
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
            ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id');

        // Start search
        $driver_name = $request->input('driver_name');
        $driver_lastname = $request->input('driver_lastname');
        $driver_id_card_no = $request->input('driver_id_card_no');
        $driver_age = $request->input('driver_age');
        $driver_status_job_app = $request->input('driver_status_job_app');
        $driver_interview_date_start = $request->input('driver_interview_date_start');
        $driver_interview_date_end = $request->input('driver_interview_date_end');
        $recruitment_position_id = $request->input('recruitment_position_id');
        $driver_mobile_phone = $request->input('driver_mobile_phone');
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
        if ($recruitment_position_id) {
            $result->where('driver.recruitment_position_id', $recruitment_position_id);
        }
        if ($driver_mobile_phone) {
            $result->where('driver.driver_mobile_phone', 'like', '%' . $driver_mobile_phone . '%');
        }
        // End search
        return Datatables::of($result)
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
                $str = '';
                if (isset($res->statusJobAppColor[$res->driver_status_job_app]) && isset($res->statusJobApp[$res->driver_status_job_app])) {
                    $str = '<span class="badge badge-pill text-white font-medium label-rouded" style="background-color: ' . $res->statusJobAppColor[$res->driver_status_job_app] . '">' . $res->statusJobApp[$res->driver_status_job_app] . '</span>';
                }
                return $str;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('JobRegister', '1');
                $insert = Helper::CheckPermissionMenu('JobRegister', '2');
                $update = Helper::CheckPermissionMenu('JobRegister', '3');
                $delete = Helper::CheckPermissionMenu('JobRegister', '4');

                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_id.'">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->driver_id.'">Edit</button>';
                // $btnFileDocument = '<button type="button" class="btn btn-success btn-md btn-file-document text-white" data-id="'.$res->driver_id.'">File Document</button>';
                // $btnInterviewDate = '<button type="button" class="btn btn-primary btn-md btn-interview-date text-white" data-id="'.$res->driver_id.'">Interview Date</button>';
                // $btnPrintPdf = '<a href="'.url('admin/JobRegister/PrintDriverProfile/'.$res->driver_id).'" class="btn btn-warning btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Print</a>';
                // $btnGuarantee = '<button type="button" class="btn btn-info btn-md btn-guarantee text-white" data-id="'.$res->driver_id.'" data-name="'.$res->driver_name_th.' '.$res->driver_lastname_th.'">Guarantee</button>';
                // $str = '';
                // $str.=' '.$btnFileDocument;
                // $str.=' '.$btnInterviewDate;
                // if($view){
                //     $str.=' '.$btnView;
                // }
                // $str.=' '.$btnPrintPdf;
                // if($update){
                //     $str.=' '.$btnEdit;
                // }
                // $str.=' '.$btnGuarantee;
                // return $str;

                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-file-document" href="javascript:void(0)" data-toggle="modal" data-target="#FileDocumentModal" data-id="' . $res->driver_id . '">File Document</a>';
                $str .= '<a class="dropdown-item btn-interview-date" href="javascript:void(0)" data-toggle="modal" data-target="#InterviewDateModal" data-id="' . $res->driver_id . '">Interview Date</a>';
                $str .= '<a class="dropdown-item " href="' . url('admin/JobRegister/PrintDriverProfile/' . $res->driver_id) . '"  data-id="' . $res->driver_id . '" target="_blank">Print</a>';
                $str .= '<a class="dropdown-item " href="' . url('admin/JobRegister/PrintDriverProfileFull/' . $res->driver_id) . '"  data-id="' . $res->driver_id . '" target="_blank">Print Full</a>';

                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_id . '">View</a>';
                }
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->driver_id . '">Edit</a>';
                }
                $str .= '<a class="dropdown-item btn-guarantee" href="javascript:void(0)" data-toggle="modal" data-target="#GuaranteeModal" data-id="' . $res->driver_id . '" data-name="' . $res->driver_name_th . ' ' . $res->driver_lastname_th . '">Guarantee</a>';
                $str .= '</div>';
                $str .= '</div>';

                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function SetInterviewDate(Request $request, $id)
    {
        $input_all = $request->all();
        \DB::beginTransaction();
        try {
            $Driver = Driver::find($id);
            $Driver->driver_interview_date = $input_all['driver_interview_date'];
            $Driver->save();

            $InterviewPercenPass = InterviewPercenPass::where('interview_percen_pass_status', 1)->first();
            $RunCode = RunCode::find($input_all['run_code_id']);
            $driver_interview_run_code =  Helper::RunDocNo($RunCode->run_code_id, true);
            $driver_interview_run_number = explode('-', $driver_interview_run_code);
            $driver_interview_run_number = isset($driver_interview_run_number[1]) ? $driver_interview_run_number[1] : '';

            $DriverInterview = new DriverInterview;
            $DriverInterview->driver_id = $Driver->driver_id;
            $DriverInterview->driver_interview_status = 0;
            $DriverInterview->driver_interview_personality_results = 0;
            $DriverInterview->interview_percen_pass_id = $InterviewPercenPass->interview_percen_pass_id;
            $DriverInterview->driver_interview_run_code = $driver_interview_run_code;
            $DriverInterview->driver_interview_run_code_text = $RunCode->run_code_code;
            $DriverInterview->driver_interview_run_number = $driver_interview_run_number;
            $DriverInterview->driver_interview_run_type = $RunCode->run_code_type_run;
            $DriverInterview->driver_interview_run_year = date('Y');
            $DriverInterview->driver_interview_run_month = $RunCode->run_code_type_run == 1 ? date('m') : null;
            $DriverInterview->save();
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update';
        return $return;
    }

    public function PrintDriverProfile($id)
    {
        $data['Driver'] = Driver::with([
            'Districts.Geography', 'Districts.Provinces', 'Districts.Amphures', 'Districts.Zipcode', 'EducationDriverLast', 'WorkHistory', 'RecruitmentPosition', 'DriverLanguage.LanguageType'
        ])->find($id);
        $pdf = PDF::loadView('admin.JobRegister.print_driver_profile', $data);
        return $pdf->stream('print_driver_profile.pdf');
    }

    public function PrintDriverProfileFull($id)
    {
        $data['Driver'] = Driver::with([
            'Districts.Geography', 'Districts.Provinces', 'Districts.Amphures', 'Districts.Zipcode', 'NamePrefix', 'EducationDriver', 'EducationDriverLast', 'WorkHistory', 'TrainingRecord', 'JobAnswer.JobQuestion', 'RecruitmentPosition', 'DriverReference', 'DriverEmergencyContact', 'DriverLanguage.LanguageType'
        ])->find($id);
        $pdf = PDF::loadView('admin.JobRegister.print_driver_profile_full', $data);
        return $pdf->stream('print_driver_profile_full.pdf');
    }
    public function PrintDriverProfileContract($id)
    {
        $data['Driver'] = Driver::with([
            'Districts.Geography', 'Districts.Provinces', 'Districts.Amphures', 'Districts.Zipcode', 'NamePrefix', 'EducationDriver', 'EducationDriverLast', 'WorkHistory', 'TrainingRecord', 'JobAnswer.JobQuestion', 'RecruitmentPosition', 'DriverReference', 'DriverEmergencyContact', 'DriverLanguage.LanguageType'
        ])->find($id);
        $pdf = PDF::loadView('admin.CustomerContract.print_driver_profile_contract', $data);
        return $pdf->stream('print_driver_profile_contract.pdf');
    }

    public function CheckDriverIDCard($id)
    {
        $Driver = Driver::with('DriverResign.ResignType')->where('driver_id_card_no', $id)->get();
        if (count($Driver) > 0) {
            foreach($Driver as $val){
                $count_resign = '';
                if($val->DriverResign){
                    $count_resign = $val->DriverResign;
                    $resign_type = $val->DriverResign->ResignType->resign_type_name;
                }
            }
            if ($count_resign) {
                $return['status'] = 'R';
                $return['resign_type'] = $resign_type;
            } else {
                $return['status'] = 'N';
            }
        } else {
            $return['status'] = 'Y';
        }
       return $return;
    }
}
