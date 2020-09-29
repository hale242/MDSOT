<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use PDF;
use File;
use Storage;
use App\MenuSystem;
use App\Helper;
use App\Driver;
use App\DriverInterview;
use App\CriminalType;
use App\HealthType;
use App\HeadDocument;
use App\RecruitmentPosition;

class CheckCriminalHealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'CheckCriminalHealth')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['DriverCriminalTypes'] = CriminalType::where('driver_criminal_type_status', 1)->get();
        $data['DriverHealthTypes'] = HealthType::where('driver_health_type_status', 1)->get();
        $data['RecruitmentPositions'] = RecruitmentPosition::where('recruitment_position_status', 1)->get();
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
        if (Helper::CheckPermissionMenu('CheckCriminalHealth', '1')) {
            return view('admin.CheckCriminalHealth.check_criminal_health', $data);
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
        $content = DriverInterview::find($id);
        $driver_interview_criminal_date = '';
        if (isset($content->driver_interview_criminal_date)) {
            $driver_interview_criminal_date = $content->driver_interview_criminal_date;
        }
        $driver_interview_date_waiting = '';
        if (isset($content->driver_interview_date_waiting)) {
            $driver_interview_date_waiting = $content->driver_interview_date_waiting;
        }
        $content['driver_interview_criminal_date'] = $driver_interview_criminal_date ? date("Y-m-d\TH:i:s", strtotime($driver_interview_criminal_date)) : '';
        $content['driver_interview_date_waiting'] = $driver_interview_date_waiting ? date("Y-m-d\TH:i:s", strtotime($driver_interview_date_waiting)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get Interview';
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
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Interview')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['DriverInterview'] = DriverInterview::with('Driver', 'DriverPersonalityTest', 'DriverTestDriverTest', 'DriverTestTextTest')->find($id);
        $data['DriverPersonalities'] = DriverPersonality::where('driver_personality_status', 1)->get();
        $data['DriverTestTexts'] = DriverTestText::where('driver_test_text_status', 1)->get();
        $data['DriverTestDrivers'] = DriverTestDriver::where('driver_test_driver_status', 1)->get();
        if (Helper::CheckPermissionMenu('Interview', '1')) {
            return view('admin.Interview.interview_edit', $data);
        } else {
            return redirect('admin/');
        }
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
        $step_no = $request->input('step_no');
        $consider = $request->input('consider');
        $driver_personality_tests = $request->input('driver_personality_test');
        $driver_test_texts = $request->input('driver_test_text');
        $driver_test_drivers = $request->input('driver_test_driver');
        $validator = Validator::make($request->all(), []);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($step_no == 1) {
                    if ($driver_personality_tests) {
                        foreach ($driver_personality_tests as $data) {
                            if (isset($data['driver_personality_id'])) {
                                $check_data = DriverPersonalityTest::where('driver_interview_id', $id)->where('driver_personality_id', $data['driver_personality_id'])->first();
                                if ($check_data) {
                                    $DriverPersonalityTest = DriverPersonalityTest::find($check_data->driver_personality_test_id);
                                    foreach ($data as $key => $val) {
                                        $DriverPersonalityTest->{$key} = $val;
                                    }
                                    if (isset($data['driver_personality_test_file_name'])) {
                                        Storage::disk("uploads")->delete("Interview/" . $DriverPersonalityTest->driver_personality_test_file_name);
                                        $file_name = str_replace("Interview/", "", $data['driver_personality_test_file_name']);
                                        $DriverPersonalityTest->driver_personality_test_file_part = 'uploads/' . $data['driver_personality_test_file_name'];
                                        $DriverPersonalityTest->driver_personality_test_file_name = $file_name;
                                    }
                                    $DriverPersonalityTest->driver_interview_id = $id;
                                    $DriverPersonalityTest->save();
                                } else {
                                    $NewDriverPersonalityTest = new DriverPersonalityTest;
                                    foreach ($data as $key => $val) {
                                        $NewDriverPersonalityTest->{$key} = $val;
                                    }
                                    if (isset($data['driver_personality_test_file_name'])) {
                                        $NewDriverPersonalityTest->driver_personality_test_file_part = 'uploads/' . $data['driver_personality_test_file_name'];
                                        $NewDriverPersonalityTest->driver_personality_test_file_name = str_replace("Interview/", "", $data['driver_personality_test_file_name']);
                                    }
                                    $NewDriverPersonalityTest->driver_interview_id = $id;
                                    $NewDriverPersonalityTest->save();
                                }
                            }
                        }
                        $DriverInterview = DriverInterview::find($id);
                        if ($driver_personality_tests['score'] >= ($driver_personality_tests['full_score']) / 2) {
                            $DriverInterview->driver_interview_personality_results = 1;
                            $title = 'Past';
                        } else {
                            $DriverInterview->driver_interview_personality_results = 9;
                            $title = 'Fail';
                        }
                        $DriverInterview->save();
                    }
                } elseif ($step_no == 2) {
                    foreach ($driver_test_texts as $data) {
                        if (isset($data['driver_test_text_id'])) {
                            $check_data = DriverTestTextTest::where('driver_interview_id', $id)->where('driver_test_text_id', $data['driver_test_text_id'])->first();
                            if ($check_data) {
                                $DriverTestTextTest = DriverTestTextTest::find($check_data->driver_test_text_test_id);
                                foreach ($data as $key => $val) {
                                    $DriverTestTextTest->{$key} = $val;
                                }
                                if (isset($data['driver_test_text_test_file_name'])) {
                                    Storage::disk("uploads")->delete("Interview/" . $DriverTestTextTest->driver_test_text_test_file_name);
                                    $file_name = str_replace("Interview/", "", $data['driver_test_text_test_file_name']);
                                    $DriverTestTextTest->driver_test_text_test_file_part = 'uploads/' . $data['driver_test_text_test_file_name'];
                                    $DriverTestTextTest->driver_test_text_test_file_name = $file_name;
                                }
                                $DriverTestTextTest->driver_interview_id = $id;
                                $DriverTestTextTest->save();
                            } else {
                                $NewDriverTestTextTest = new DriverTestTextTest;
                                foreach ($data as $key => $val) {
                                    $NewDriverTestTextTest->{$key} = $val;
                                }
                                if (isset($data['driver_test_text_test_file_name'])) {
                                    $NewDriverTestTextTest->driver_test_text_test_file_part = 'uploads/' . $data['driver_test_text_test_file_name'];
                                    $NewDriverTestTextTest->driver_test_text_test_file_name = str_replace("Interview/", "", $data['driver_test_text_test_file_name']);
                                }
                                $NewDriverTestTextTest->driver_interview_id = $id;
                                $NewDriverTestTextTest->save();
                            }
                        }
                    }
                    $DriverInterview = DriverInterview::find($id);
                    if ($consider == 'true') {
                        $DriverInterview->driver_interview_test_results = 2;
                        $title = 'Conditional pass';
                    } else {
                        if ($driver_test_texts['score'] >= ($driver_test_texts['full_score'] / 2)) {
                            $DriverInterview->driver_interview_test_results = 1;
                            $title = 'Past';
                        } else {
                            $DriverInterview->driver_interview_test_results = 9;
                            $title = 'Fail';
                        }
                    }
                    $DriverInterview->save();
                } else {
                    foreach ($driver_test_drivers as $data) {
                        if (isset($data['driver_test_driver_id'])) {
                            $check_data = DriverTestDriverTest::where('driver_interview_id', $id)->where('driver_test_driver_id', $data['driver_test_driver_id'])->first();
                            if ($check_data) {
                                $DriverTestDriverTest = DriverTestDriverTest::find($check_data->driver_test_driver_id);
                                foreach ($data as $key => $val) {
                                    $DriverTestDriverTest->{$key} = $val;
                                }
                                if (isset($data['driver_test_driver_test_file_name'])) {
                                    Storage::disk("uploads")->delete("Interview/" . $DriverTestDriverTest->driver_test_driver_test_file_name);
                                    $file_name = str_replace("Interview/", "", $data['driver_test_driver_test_file_name']);
                                    $DriverTestDriverTest->driver_test_driver_test_file_part = 'uploads/' . $data['driver_test_driver_test_file_name'];
                                    $DriverTestDriverTest->driver_test_driver_test_file_name = $file_name;
                                }
                                $DriverTestDriverTest->driver_interview_id = $id;
                                $DriverTestDriverTest->save();
                            } else {
                                $NewDriverTestDriverTest = new DriverTestDriverTest;
                                foreach ($data as $key => $val) {
                                    $NewDriverTestDriverTest->{$key} = $val;
                                }
                                if (isset($data['driver_test_driver_test_file_name'])) {
                                    $NewDriverTestDriverTest->driver_test_driver_test_file_part = 'uploads/' . $data['driver_test_driver_test_file_name'];
                                    $NewDriverTestDriverTest->driver_test_driver_test_file_name = str_replace("Interview/", "", $data['driver_test_driver_test_file_name']);
                                }
                                $NewDriverTestDriverTest->driver_interview_id = $id;
                                $NewDriverTestDriverTest->save();
                            }
                        }
                    }
                    $DriverInterview = DriverInterview::find($id);
                    if ($driver_test_texts['score'] >= ($driver_test_texts['full_score'] / 2)) {
                        $DriverInterview->driver_interview_test_results = 1;
                        $title = 'Past';
                    } else {
                        $DriverInterview->driver_interview_test_results = 9;
                        $title = 'Fail';
                    }
                    $DriverInterview->save();
                }
                \DB::commit();
                $return['step_no'] = $step_no;
                $return['DriverInterview'] = DriverInterview::with('Driver', 'DriverPersonalityTest', 'DriverTestDriverTest', 'DriverTestTextTest')->find($id);;
                $return['status'] = 1;
                $return['title'] = $title;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['title'] = 'Insert';
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['title'] = 'Insert';
            $return['content'] = 'Unsuccess';
        }
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
            'recruitment_position.recruitment_position_name',
            'districts.districts_name',
            'amphures.amphures_name',
            'provinces.provinces_name',
            'driver_interview.driver_interview_id',
            'driver_interview.driver_interview_criminal_date'
        )
            ->leftjoin('driver_interview', 'driver_interview.driver_id', 'driver.driver_id')
            ->leftjoin('recruitment_position', 'recruitment_position.recruitment_position_id', 'driver.recruitment_position_id')
            ->leftjoin('districts', 'districts.districts_id', 'driver.districts_id')
            ->leftjoin('amphures', 'amphures.amphures_id', 'districts.amphures_id')
            ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')
            ->where('driver.driver_status_job_app', 4) //4 = ผ่านการทดสอบขับรถ
            ->whereNull('driver_interview.driver_interview_criminal_status')
            ->with([
                'DriverInterview.DriverCriminalRecordPass', 'DriverInterview.DriverPersonalityTest', 'DriverInterview.DriverTestDriverTest', 'DriverInterview.DriverTestTextTest'
            ]);

        // Start search
        $driver_name = $request->input('driver_name');
        $driver_lastname = $request->input('driver_lastname');
        $driver_status_job_app = $request->input('driver_status_job_app');
        $driver_interview_date = $request->input('driver_interview_date');
        $driver_interview_criminal_date = $request->input('driver_interview_criminal_date');
        $recruitment_position_id = $request->input('recruitment_position_id');
        if ($driver_name) {
            $result->where('driver.driver_name_th', 'like', '%' . $driver_name . '%');
            $result->orWhere('driver.driver_name_en', 'like', '%' . $driver_name . '%');
        }
        if ($driver_lastname) {
            $result->where('driver.driver_lastname_th', 'like', '%' . $driver_lastname . '%');
            $result->orWhere('driver.driver_lastname_en', 'like', '%' . $driver_lastname . '%');
        }
        if ($driver_status_job_app || $driver_status_job_app == 0 && $driver_status_job_app != '') {
            $result->where('driver.driver_status_job_app', $driver_status_job_app);
        }
        if ($driver_interview_date) {
            $result->whereBetween('driver.driver_interview_date', [$driver_interview_date . ' 00:00:00', $driver_interview_date . ' 23:59:59']);
        }
        if ($driver_interview_criminal_date) {
            $result->whereBetween('driver_interview.driver_interview_criminal_date', [$driver_interview_criminal_date . ' 00:00:00', $driver_interview_criminal_date . ' 23:59:59']);
        }
        if ($recruitment_position_id) {
            $result->where('driver.recruitment_position_id', $recruitment_position_id);
        }
        // End search
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->driver_interview_id . '" data-id="' . $res->driver_interview_id . '">
                          <label class="custom-control-label" for="checkbox-item-' . $res->driver_interview_id . '"></label>
                      </div>';
                return $str;
            })
            ->addColumn('name_th', function ($res) {
                return $res->driver_name_th . ' ' . $res->driver_lastname_th;
            })
            ->addColumn('score', function ($res) {
                $sum_personality = 0;
                $sum_test = 0;
                $sum_driver = 0;
                if ($res->DriverInterview && $res->DriverInterview->DriverPersonalityTest) {
                    $sum_personality += $res->DriverInterview->DriverPersonalityTest->sum('driver_personality_test_sum');
                }
                if ($res->DriverInterview && $res->DriverInterview->DriverTestTextTest) {
                    $sum_test += $res->DriverInterview->DriverTestTextTest->sum('driver_test_text_test_sum');
                }
                if ($res->DriverInterview && $res->DriverInterview->DriverTestDriverTest) {
                    $sum_driver += $res->DriverInterview->DriverTestDriverTest->sum('driver_test_driver_test_sum');
                }
                return ($sum_personality + $sum_test + $sum_driver);
            })
            ->editColumn('driver_interview_criminal_date', function ($res) {
                return $res->driver_interview_criminal_date ? date("d/m/Y", strtotime($res->driver_interview_criminal_date)) : '';
            })
            ->editColumn('driver_interview_date', function ($res) {
                return $res->driver_interview_date ? date("d/m/Y", strtotime($res->driver_interview_date)) : '';
            })
            ->addColumn('status', function ($res) {
                $str = '<span class="badge badge-pill text-white font-medium label-rouded" style="background-color: ' . $res->statusJobAppColor[$res->driver_status_job_app] . '">' . $res->statusJobApp[$res->driver_status_job_app] . '</span>';
                return $str;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('Interview', '1');
                $insert = Helper::CheckPermissionMenu('Interview', '2');
                $update = Helper::CheckPermissionMenu('Interview', '3');
                $delete = Helper::CheckPermissionMenu('Interview', '4');
                $checked = '';
                $check_approve = '';
                if ($res->department_status == 1) {
                    $checked = 'checked';
                }
                if (!$res->DriverInterview || !$res->DriverInterview->DriverCriminalRecordPass) {
                    // $check_approve = 'disabled';
                }
                // $btnCriminalRecord = '<button type="button" class="btn btn-primary btn-md btn-criminal-record" data-id="'.$res->driver_interview_id.'">Criminal record</button>';
                // $btnHealth = '<button type="button" class="btn btn-warning btn-md text-white btn-health" data-id="'.$res->driver_interview_id.'">Health</button>';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_id.'">View</button>';
                // $btnPrintEvaluationPdf = '<a href="'.url('admin/CheckCriminalHealth/PrintInterviewEvaluation/'.$res->driver_interview_id).'" class="btn btn-primary btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Interview</a>';
                // $btnPrintPdf = '<a href="'.url('admin/JobRegister/PrintDriverProfile/'.$res->driver_id).'" class="btn btn-warning btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Print</a>';
                $btnApprove = '<button type="button" class="btn btn-success confirm-approve btn-approve" data-id="' . $res->driver_interview_id . '" ' . $check_approve . '>Approve</button>';
                $btnNotApprove = '<button type="button" class="btn btn-danger confirm-not-approve btn-not-approve" data-id="' . $res->driver_interview_id . '">Not Approve</button>';
                // $str = '';
                // $str.=' '.$btnCriminalRecord;
                // $str.=' '.$btnHealth;
                // if($view){
                //     $str.=' '.$btnView;
                // }
                // $str.=' '.$btnPrintEvaluationPdf;
                // $str.=' '.$btnPrintPdf;
                // $str.=' '.$btnApprove;
                // $str.=' '.$btnNotApprove;
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-criminal-record" href="javascript:void(0)" data-toggle="modal" data-target="#CriminalRecordModal" data-id="' . $res->driver_interview_id . '">Criminal record</a>';
                $str .= '<a class="dropdown-item btn-health" href="javascript:void(0)" data-toggle="modal" data-target="#HealthModal" data-id="' . $res->driver_interview_id . '">Health</a>';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_id . '">View</a>';
                }
                $str .= '<a class="dropdown-item" href="' . url('admin/CheckCriminalHealth/PrintInterviewEvaluation/' . $res->driver_interview_id) . '" class="btn btn-primary btn-md text-white" data-id="' . $res->driver_id . '" target="_blank">Interview</a>';
                $str .= '<a class="dropdown-item" href="' . url('admin/JobRegister/PrintDriverProfile/' . $res->driver_id) . '" class="btn btn-warning btn-md text-white" data-id="' . $res->driver_id . '" target="_blank">Print</a>';
                $str .= '</div>';
                $str .= '</div>';
                $str .= ' ' . $btnApprove;
                $str .= ' ' . $btnNotApprove;
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'status'])
            ->make(true);
    }

    public function ChangeApprove(Request $request)
    {
        $id = $request->input('id');
        $approve = $request->input('approve');
        \DB::beginTransaction();
        try {
            if ($id) {
                if (is_array($id)) {
                    if ($approve == 'true') {
                        // Approve
                        DriverInterview::whereIn('driver_interview_id', $id)->update([
                            'driver_interview_criminal_status' => 1, 'driver_interview_criminal_date' => date('Y-m-d'), 'updated_at' => date('Y-m-d H:i:s')
                        ]);
                    } else {
                        // Not Approve
                        foreach ($id as $val) {
                            $DriverInterview = DriverInterview::find($val);
                            $DriverInterview->driver_interview_criminal_status = 9; // ไม่ผ่าน
                            $DriverInterview->driver_interview_status  = 9; // จบการสัมภาษณ์
                            $DriverInterview->save();

                            $Driver = Driver::find($DriverInterview->driver_id);
                            $Driver->driver_status_job_app = 99; // ห้ามกลับมาสมัครใหม่
                            $Driver->save();
                        }
                    }
                } else {
                    $DriverInterview = DriverInterview::find($id);
                    if ($approve == 'true') {
                        // Approve
                        $DriverInterview->driver_interview_criminal_status = 1;
                        $DriverInterview->driver_interview_criminal_date = date('Y-m-d');
                    } else {
                        // Not Approve
                        $DriverInterview->driver_interview_criminal_status = 9; // ไม่ผ่าน
                        $DriverInterview->driver_interview_status  = 9; // จบการสัมภาษณ์

                        $Driver = Driver::find($DriverInterview->driver_id);
                        $Driver->driver_status_job_app = 99; // ห้ามกลับมาสมัครใหม่
                        $Driver->save();
                    }
                    $DriverInterview->save();
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
        $return['title'] = 'Update';
        return $return;
    }

    public function PrintInterviewEvaluation($id)
    {
        $data['HeadDocument'] = HeadDocument::where('head_documents_head_office', 1)->first();
        $data['DriverInterview'] = DriverInterview::with([
            'Driver', 'DriverPersonalityTest.DriverPersonality', 'DriverTestDriverTest.DriverTestDriver', 'DriverTestTextTest.DriverTestText'
        ])->find($id);
        $pdf = PDF::loadView('admin.CheckCriminalHealth.print_interview_evaluation', $data);
        return $pdf->stream('print_interview_evaluation.pdf');
    }
}
