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
use App\DriverPersonality;
use App\DriverPersonalityTest;
use App\DriverTestDriver;
use App\DriverTestDriverTest;
use App\DriverTestText;
use App\DriverTestTextTest;
use App\InterviewPercenPass;
use App\RunCode;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Interview')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['InterviewPercenPass'] = InterviewPercenPass::where('interview_percen_pass_status', 1)->first();

        $data['StatusJobApps'] =[
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
        if(Helper::CheckPermissionMenu('Interview' , '1')){
            return view('admin.Interview.interview', $data);
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

        $content['driver_interview_criminal_date'] = $content->driver_interview_criminal_date ? date("Y-m-d\TH:i:s", strtotime($content->driver_interview_criminal_date)) : '';
        $content['driver_interview_date_waiting'] = $content->driver_interview_date_waiting ? date("Y-m-d\TH:i:s", strtotime($content->driver_interview_date_waiting)) : '';
        $content['driver_interview_recrult_date'] = $content->driver_interview_recrult_date ? date("Y-m-d", strtotime($content->driver_interview_recrult_date)) : '';
        $content['driver_interview_operation_date'] = $content->driver_interview_operation_date ? date("Y-m-d", strtotime($content->driver_interview_operation_date)) : '';
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
        $data['MainMenus'] = MenuSystem::where('menu_system_part','Interview')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['DriverInterview'] = DriverInterview::with('Driver', 'DriverPersonalityTest', 'DriverTestDriverTest', 'DriverTestTextTest')->find($id);
        $data['DriverPersonalities'] = DriverPersonality::where('driver_personality_status', 1)->get();
        $data['DriverTestTexts'] = DriverTestText::where('driver_test_text_status', 1)->get();
        $data['DriverTestDrivers'] = DriverTestDriver::where('driver_test_driver_status', 1)->get();
        $data['InterviewPercenPass'] = InterviewPercenPass::where('interview_percen_pass_status', 1)->first();
        $data['RunCodes'] = RunCode::where('run_code_status', 1)->where('run_code_type', 4)->get(); //(4) แบบประเมินการขับรถของผู้สมัครพนักงานขับรถยนต์ F#3

        if(Helper::CheckPermissionMenu('Interview' , '1')){
            return view('admin.Interview.interview_edit', $data);
        }else{
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
        $step_no = $request->input('step_no');
        $consider = $request->input('consider');
        $driver_personality_tests = $request->input('driver_personality_test');
        $driver_test_texts = $request->input('driver_test_text');
        $run_code_id = $request->input('run_code_id');

        $driver_test_drivers = $request->input('driver_test_driver');
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $InterviewPercenPass = InterviewPercenPass::where('interview_percen_pass_status', 1)->first();
                $DriverInterview = DriverInterview::find($id);
                if($step_no == 1){
                    if($driver_personality_tests){
                        foreach($driver_personality_tests as $data){
                            if(isset($data['driver_personality_id'])){
                                $check_data = DriverPersonalityTest::where('driver_interview_id', $id)->where('driver_personality_id', $data['driver_personality_id'])->first();
                                if($check_data){
                                    $DriverPersonalityTest = DriverPersonalityTest::find($check_data->driver_personality_test_id);
                                    foreach($data as $key => $val) {
                                        $DriverPersonalityTest->{$key} = $val;
                                    }
                                    if(isset($data['driver_personality_test_file_name'])){
                                         Storage::disk("uploads")->delete("Interview/".$DriverPersonalityTest->driver_personality_test_file_name);
                                         $file_name = str_replace("Interview/","",$data['driver_personality_test_file_name']);
                                         $DriverPersonalityTest->driver_personality_test_file_part = 'uploads/'.$data['driver_personality_test_file_name'];
                                         $DriverPersonalityTest->driver_personality_test_file_name = $file_name;
                                    }
                                    $DriverPersonalityTest->driver_interview_id = $id;
                                    $DriverPersonalityTest->save();
                                }else{
                                    $NewDriverPersonalityTest = new DriverPersonalityTest;
                                    foreach($data as $key => $val) {
                                        $NewDriverPersonalityTest->{$key} = $val;
                                    }
                                    if(isset($data['driver_personality_test_file_name'])){
                                         $NewDriverPersonalityTest->driver_personality_test_file_part = 'uploads/'.$data['driver_personality_test_file_name'];
                                         $NewDriverPersonalityTest->driver_personality_test_file_name = str_replace("Interview/","",$data['driver_personality_test_file_name']);
                                    }
                                    $NewDriverPersonalityTest->driver_interview_id = $id;
                                    $NewDriverPersonalityTest->save();
                                }
                            }
                        }
                        $passing_score = ($driver_personality_tests['full_score'] * $InterviewPercenPass->interview_percen_pass_percen) / 100;
                        if($driver_personality_tests['score'] >= $passing_score){
                            $DriverInterview->driver_interview_personality_results = 1;
                            $title = 'Past';
                        }else{
                            $DriverInterview->driver_interview_personality_results = 9;
                            $title = 'Fail';
                        }
                    }
                }elseif($step_no == 2){
                    foreach($driver_test_texts as $data){
                        if(isset($data['driver_test_text_id'])){
                            $check_data = DriverTestTextTest::where('driver_interview_id', $id)->where('driver_test_text_id', $data['driver_test_text_id'])->first();
                            if($check_data){
                                $DriverTestTextTest = DriverTestTextTest::find($check_data->driver_test_text_test_id);
                                foreach($data as $key => $val) {
                                    $DriverTestTextTest->{$key} = $val;
                                }
                                if(isset($data['driver_test_text_test_file_name'])){
                                     Storage::disk("uploads")->delete("Interview/".$DriverTestTextTest->driver_test_text_test_file_name);
                                     $file_name = str_replace("Interview/","",$data['driver_test_text_test_file_name']);
                                     $DriverTestTextTest->driver_test_text_test_file_part = 'uploads/'.$data['driver_test_text_test_file_name'];
                                     $DriverTestTextTest->driver_test_text_test_file_name = $file_name;
                                }
                                $DriverTestTextTest->driver_interview_id = $id;
                                $DriverTestTextTest->save();
                            }else{
                                $NewDriverTestTextTest = new DriverTestTextTest;
                                foreach($data as $key => $val) {
                                    $NewDriverTestTextTest->{$key} = $val;
                                }
                                if(isset($data['driver_test_text_test_file_name'])){
                                     $NewDriverTestTextTest->driver_test_text_test_file_part = 'uploads/'.$data['driver_test_text_test_file_name'];
                                     $NewDriverTestTextTest->driver_test_text_test_file_name = str_replace("Interview/","",$data['driver_test_text_test_file_name']);
                                }
                                $NewDriverTestTextTest->driver_interview_id = $id;
                                $NewDriverTestTextTest->save();
                            }
                        }
                    }
                    if($consider == 'true'){
                        $DriverInterview->driver_interview_test_results = 2;
                        $title = 'Conditional pass';
                    }else{
                        $passing_score = ($driver_test_texts['full_score'] * $InterviewPercenPass->interview_percen_pass_percen) / 100;
                        if($driver_test_texts['score'] >= $passing_score){
                            $DriverInterview->driver_interview_test_results = 1;
                            $title = 'Past';
                        }else{
                            $DriverInterview->driver_interview_test_results = 9;
                            $title = 'Fail';
                        }
                    }
                }elseif($step_no == 3){
                    if($run_code_id){
                        $RunCode = RunCode::find($run_code_id);
                        $driver_interview_run_code_driver_test = Helper::RunDocNo($run_code_id, false);
                        $driver_interview_run_number_driver_test = explode('-', $driver_interview_run_code_driver_test);
                        $driver_interview_run_number_driver_test = isset($driver_interview_run_number_driver_test[1]) ? $driver_interview_run_number_driver_test[1] : '';

                        $DriverInterview->driver_interview_run_code_text_driver_test = $driver_interview_run_code_driver_test;
                        $DriverInterview->driver_interview_run_number_driver_test = $driver_interview_run_number_driver_test;
                        $DriverInterview->driver_interview_run_type_driver_test = $RunCode->run_code_type_run;
                        $DriverInterview->driver_interview_run_year_driver_test = date('Y');
                        $DriverInterview->driver_interview_run_month_driver_test = $RunCode->run_code_type_run == 1 ? date('m') : null;
                    }
                    foreach($driver_test_drivers as $data){
                        if(isset($data['driver_test_driver_id'])){
                            $check_data = DriverTestDriverTest::where('driver_interview_id', $id)->where('driver_test_driver_id', $data['driver_test_driver_id'])->first();
                            if($check_data){
                                $DriverTestDriverTest = DriverTestDriverTest::find($check_data->driver_test_driver_test_id);
                                foreach($data as $key => $val) {
                                    $DriverTestDriverTest->{$key} = $val;
                                }
                                if(isset($data['driver_test_driver_test_file_name'])){
                                     Storage::disk("uploads")->delete("Interview/".$DriverTestDriverTest->driver_test_driver_test_file_name);
                                     $file_name = str_replace("Interview/","",$data['driver_test_driver_test_file_name']);
                                     $DriverTestDriverTest->driver_test_driver_test_file_part = 'uploads/'.$data['driver_test_driver_test_file_name'];
                                     $DriverTestDriverTest->driver_test_driver_test_file_name = $file_name;
                                }
                                $DriverTestDriverTest->driver_interview_id = $id;
                                $DriverTestDriverTest->save();
                            }else{
                                $NewDriverTestDriverTest = new DriverTestDriverTest;
                                foreach($data as $key => $val) {
                                    $NewDriverTestDriverTest->{$key} = $val;
                                }
                                if(isset($data['driver_test_driver_test_file_name'])){
                                     $NewDriverTestDriverTest->driver_test_driver_test_file_part = 'uploads/'.$data['driver_test_driver_test_file_name'];
                                     $NewDriverTestDriverTest->driver_test_driver_test_file_name = str_replace("Interview/","",$data['driver_test_driver_test_file_name']);
                                }
                                $NewDriverTestDriverTest->driver_interview_id = $id;
                                $NewDriverTestDriverTest->save();
                            }
                        }
                    }
                    $passing_score = ($driver_test_drivers['full_score'] * $InterviewPercenPass->interview_percen_pass_percen) / 100;
                    if($driver_test_drivers['score'] >= $passing_score){
                        $DriverInterview->driver_interview_test_results = 1;
                        $title = 'Past';
                    }else{
                        $DriverInterview->driver_interview_test_results = 9;
                        $title = 'Fail';
                    }
                    $Driver = Driver::find($DriverInterview->driver_id);
                    $Driver->driver_status_job_app = 4;
                    $Driver->save();
                }

                $DriverInterview->save();
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
        }else{
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
            'driver.driver_id'
            ,'driver.driver_name_th'
            ,'driver.driver_name_en'
            ,'driver.driver_lastname_th'
            ,'driver.driver_lastname_en'
            ,'driver.driver_id_card_no'
            ,'driver.driver_age'
            ,'driver.driver_status_job_app'
            ,'driver.driver_interview_date'
            ,'driver.driver_availlale_date'
            ,'driver.driver_mobile_phone'
            ,'recruitment_position.recruitment_position_name'
            ,'districts.districts_name'
            ,'amphures.amphures_name'
            ,'provinces.provinces_name'
            ,'driver_interview.driver_interview_id'
            ,'driver_interview.driver_interview_run_code'
        )
        ->leftjoin('driver_interview', 'driver_interview.driver_id', 'driver.driver_id')
        ->leftjoin('recruitment_position', 'recruitment_position.recruitment_position_id', 'driver.recruitment_position_id')
        ->leftjoin('districts', 'districts.districts_id', 'driver.districts_id')
        ->leftjoin('amphures', 'amphures.amphures_id', 'districts.amphures_id')
        ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')
        ->whereNotNull('driver.driver_interview_date')
        ->whereNotIn('driver.driver_status_job_app', [4, 5])
        ->where(function($q){
            $q->whereNotIn('driver_interview.driver_interview_personality_results', [9]);
            $q->orWhereNotIn('driver_interview.driver_interview_test_results', [9]);
            $q->orWhereNotIn('driver_interview.driver_interview_driver_results', [9]);
        });

        // Start search
        $driver_interview_run_code = $request->input('driver_interview_run_code');
        $driver_name = $request->input('driver_name');
        $driver_lastname = $request->input('driver_lastname');
        $driver_id_card_no = $request->input('driver_id_card_no');
        $driver_age = $request->input('driver_age');
        $driver_status_job_app = $request->input('driver_status_job_app');
        $driver_interview_date_start = $request->input('driver_interview_date_start');
        $driver_interview_date_end = $request->input('driver_interview_date_end');
        if($driver_interview_run_code){
            $result->where('driver_interview.driver_interview_run_code', $driver_interview_run_code);
        }
        if($driver_name){
            $result->where('driver.driver_name_th', 'like', '%'.$driver_name.'%');
            $result->orWhere('driver.driver_name_en', 'like', '%'.$driver_name.'%');
        }
        if($driver_lastname){
            $result->where('driver.driver_lastname_th', 'like', '%'.$driver_lastname.'%');
            $result->orWhere('driver.driver_lastname_en', 'like', '%'.$driver_lastname.'%');
        }
        if($driver_id_card_no){
            $result->where('driver.driver_id_card_no', 'like', '%'.$driver_id_card_no.'%');
        }
        if($driver_age){
            $driver_age = explode("-",$driver_age);
            if(isset($driver_age[0]) && isset($driver_age[1])){
                $result->whereBetween('driver_age', [$driver_age[0], $driver_age[1]]);
            }
        }
        if($driver_status_job_app || $driver_status_job_app == 0 && $driver_status_job_app != ''){
            $result->where('driver.driver_status_job_app', $driver_status_job_app);
        }
        if($driver_interview_date_start && $driver_interview_date_end){
            $result->whereBetween('driver.driver_interview_date', [$driver_interview_date_start.' 00:00:00', $driver_interview_date_end.' 23:59:59']);
        }elseif($driver_interview_date_start && !$driver_interview_date_end){
            $result->where('driver.driver_interview_date', '>=', $driver_interview_date_start. '00:00:00');
        }elseif(!$driver_interview_date_start && $driver_interview_date_end){
            $result->where('driver.driver_interview_date', '<=', $driver_interview_date_end.' 23:59:59');
        }
        // End search
        return Datatables::of($result)
          ->addColumn('checkbox' , function($res){
              $str = '<div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-'.$res->driver_id.'">
                          <label class="custom-control-label" for="checkbox-item-'.$res->driver_id.'"></label>
                      </div>';
              return $str;
          })
          ->addColumn('name_th' , function($res){
              return $res->driver_name_th.' '.$res->driver_lastname_th;
          })
          ->addColumn('name_en' , function($res){
              return $res->driver_name_en.' '.$res->driver_lastname_en;
          })
          ->editColumn('driver_expected_salary' , function($res){
              return number_format($res->driver_expected_salary,2);
          })
          ->editColumn('driver_availlale_date' , function($res){
              return $res->driver_availlale_date ? date("d/m/Y", strtotime($res->driver_availlale_date)) : '';
          })
          ->editColumn('driver_interview_date' , function($res){
              return $res->driver_interview_date ? date("d/m/Y", strtotime($res->driver_interview_date)) : '';
          })
          ->addColumn('status' , function($res){
              $str = '';
              if(isset($res->statusJobAppColor[$res->driver_status_job_app])){
                  $str = '<span class="badge badge-pill text-white font-medium label-rouded" style="background-color: '.$res->statusJobAppColor[$res->driver_status_job_app].'">'.$res->statusJobApp[$res->driver_status_job_app].'</span>';
              }
              return $str;
          })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('Interview' , '1');
            $insert = Helper::CheckPermissionMenu('Interview' , '2');
            $update = Helper::CheckPermissionMenu('Interview' , '3');
            $delete = Helper::CheckPermissionMenu('Interview' , '4');
            if($res->department_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            // $btnEvaluation = '<a href="'.url('admin/Interview/'.$res->driver_interview_id.'/edit').'" class="btn btn-warning btn-md text-white" data-id="'.$res->driver_interview_id.'">Evaluation</a>';
            // $btnDate = '<button type="button" class="btn btn-primary btn-md btn-criminal-date" data-id="'.$res->driver_interview_id.'">Date of criminal / health</button>';
            // $str = '';
            // $str.=' '.$btnEvaluation;
            // $str.=' '.$btnDate;

           $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';

            $str .= '<a class="dropdown-item" href="'.url('admin/Interview/'.$res->driver_interview_id.'/edit').'" data-id="' . $res->driver_interview_id . '">Evaluation</a>';
            $str .= '<a class="dropdown-item btn-criminal-date" href="javascript:void(0)" data-toggle="modal" data-target="#DateModal" data-id="' . $res->driver_interview_id . '">Date of criminal / health</a>';

            $str .= '</div>';
            $str .= '</div>';

            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['action', 'status'])
        ->make(true);
    }

    public function SetCriminalDate(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $Driver = DriverInterview::find($id);
            $Driver->driver_interview_criminal_date = $request->input('driver_interview_criminal_date');
            $Driver->save();
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

    public function SetSendBack(Request $request, $id)
    {
        $interview_date_waiting = $request->input('driver_interview_date_waiting');
        \DB::beginTransaction();
        try {
            $DriverInterview = DriverInterview::find($id);
            $Driver = Driver::find($DriverInterview->driver_id);
            $format_date_waiting = date("Y-m-d", strtotime($interview_date_waiting));
            $format_date_interview = date("Y-m-d", strtotime($Driver->driver_interview_date));
            $count_date_comeback = (strtotime($format_date_waiting) - strtotime($format_date_interview));
            $count_date_comeback = intval($count_date_comeback / (60 * 60 * 24));

            $Driver->driver_status_job_app  = 98; //ให้กลับมาทดสอบใหม่ได้
            $Driver->driver_count_date_comeback  = $count_date_comeback;
            $Driver->driver_interview_date  = $interview_date_waiting;
            $Driver->save();

            $DriverInterview->driver_interview_date_waiting = $Driver->driver_interview_date;
            $DriverInterview->driver_interview_personality_results  = 9; //ไม่ผ่านการสัมภาษณ์
            $DriverInterview->save();

            $NewDriverInterview = new DriverInterview;
            $NewDriverInterview->driver_id = $Driver->driver_id;
            $NewDriverInterview->driver_interview_status = 0;
            $NewDriverInterview->driver_interview_personality_results = 0;
            $NewDriverInterview->save();
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Send Back';
        return $return;
    }

    public function SetFail(Request $request, $id)
    {
        $step_no = $request->input('step_no');
        \DB::beginTransaction();
        try {
            $DriverInterview = DriverInterview::find($id);
            $Driver = Driver::find($DriverInterview->driver_id);
            if($step_no == 1){ // step 1
                $Driver->driver_status_job_app  = 99; //ห้ามกลับมาสมัครใหม่
                $Driver->save();

                $DriverInterview->driver_interview_personality_results  = 9; //ไม่ผ่านการสัมภาษณ์
                $DriverInterview->save();
            }elseif($step_no == 2){ // step 2
                $Driver->driver_status_job_app  = 99; //ห้ามกลับมาสมัครใหม่
                $Driver->save();

                $DriverInterview->driver_interview_test_results  = 9; //ไม่ผ่านการสัมภาษณ์
                $DriverInterview->save();
            }else{
                // step 3
                $Driver->driver_status_job_app  = 99; //ห้ามกลับมาสมัครใหม่
                $Driver->save();

                $DriverInterview->driver_interview_driver_results  = 9; //ไม่ผ่านการสัมภาษณ์
                $DriverInterview->save();
            }
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Fail';
        return $return;
    }
}
