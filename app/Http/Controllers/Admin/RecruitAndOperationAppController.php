<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use PDF;
use File;
use Storage;
use Auth;
use App\MenuSystem;
use App\Helper;
use App\Driver;
use App\DriverInterview;
use App\CriminalType;
use App\HealthType;
use App\InterviewRecuritApprove;
use App\InterviewOperationApprove;
use App\RecruitmentPosition;

class RecruitAndOperationAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','RecruitAndOperationApp')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['DriverCriminalTypes'] = CriminalType::where('driver_criminal_type_status', 1)->get();
        $data['DriverHealthTypes'] = HealthType::where('driver_health_type_status', 1)->get();
        $data['RecruitmentPositions'] = RecruitmentPosition::where('recruitment_position_status', 1)->get();
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
        if(Helper::CheckPermissionMenu('RecruitAndOperationApp' , '1')){
            return view('admin.RecruitAndOperationApp.recruitand_operation_app', $data);
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
            ,'recruitment_position.recruitment_position_name'
            ,'districts.districts_name'
            ,'amphures.amphures_name'
            ,'provinces.provinces_name'
            ,'driver_interview.driver_interview_id'
            ,'driver_interview.driver_interview_criminal_date'
            ,'driver_interview.driver_interview_recrult_status'
        )
        ->leftjoin('driver_interview', 'driver_interview.driver_id', 'driver.driver_id')
        ->leftjoin('recruitment_position', 'recruitment_position.recruitment_position_id', 'driver.recruitment_position_id')
        ->leftjoin('districts', 'districts.districts_id', 'driver.districts_id')
        ->leftjoin('amphures', 'amphures.amphures_id', 'districts.amphures_id')
        ->leftjoin('provinces', 'provinces.provinces_id', 'districts.provinces_id')
        ->where('driver.driver_status_job_app', 4) //4 = ผ่านการทดสอบขับรถ
        ->where('driver_interview.driver_interview_criminal_status', 1)
        ->where(function($q){
            $q->whereNull('driver.driver_status');
            $q->orWhere('driver.driver_status', 0);
        })
        ->where(function($q){
            $q->where(function($sq){
                $sq->where(function($query){
                  $query->whereNull('driver_interview.driver_interview_recrult_status');
                  $query->whereNull('driver_interview.driver_interview_operation_status');
                });
                $sq->orWhere(function($query){
                  $query->where('driver_interview.driver_interview_recrult_status', 0);
                  $query->where('driver_interview.driver_interview_operation_status', 0);
                });
            });
            $q->orWhere(function($sq){
                $sq->where('driver_interview.driver_interview_recrult_status', 1);
                $sq->whereNull('driver_interview.driver_interview_operation_status');
            });
            $q->orWhere(function($sq){
                $sq->where('driver_interview.driver_interview_operation_status', 1);
                $sq->whereNull('driver_interview.driver_interview_recrult_status');
            });
            $q->orWhere(function($sq){
                $sq->where('driver_interview.driver_interview_recrult_status', 1);
                $sq->where('driver_interview.driver_interview_operation_status', 0);
            });
            $q->orWhere(function($sq){
                $sq->where('driver_interview.driver_interview_operation_status', 1);
                $sq->where('driver_interview.driver_interview_recrult_status', 0);
            });
        })
        ->with('DriverInterview.DriverCriminalRecordPass');
        // Start search
        $driver_name = $request->input('driver_name');
        $driver_lastname = $request->input('driver_lastname');
        $driver_status_job_app = $request->input('driver_status_job_app');
        $driver_interview_date = $request->input('driver_interview_date');
        $recruitment_position_id = $request->input('recruitment_position_id');
        if($driver_name){
            $result->where('driver.driver_name_th', 'like', '%'.$driver_name.'%');
            $result->orWhere('driver.driver_name_en', 'like', '%'.$driver_name.'%');
        }
        if($driver_lastname){
            $result->where('driver.driver_lastname_th', 'like', '%'.$driver_lastname.'%');
            $result->orWhere('driver.driver_lastname_en', 'like', '%'.$driver_lastname.'%');
        }
        if($driver_status_job_app || $driver_status_job_app == 0 && $driver_status_job_app != ''){
            $result->where('driver.driver_status_job_app', $driver_status_job_app);
        }
        if($driver_interview_date){
            $result->whereBetween('driver.driver_interview_date', [$driver_interview_date.' 00:00:00', $driver_interview_date.' 23:59:59']);
        }
        if($recruitment_position_id){
            $result->where('driver.recruitment_position_id', $recruitment_position_id);
        }
        // End search
        return Datatables::of($result)
          ->addColumn('checkbox' , function($res){
              $str = '<div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-'.$res->driver_interview_id.'" data-id="'.$res->driver_interview_id.'">
                          <label class="custom-control-label" for="checkbox-item-'.$res->driver_interview_id.'"></label>
                      </div>';
              return $str;
          })
          ->addColumn('name_th' , function($res){
              return $res->driver_name_th.' '.$res->driver_lastname_th;
          })
          ->addColumn('name_en' , function($res){
              return $res->driver_name_en.' '.$res->driver_lastname_en;
          })
          ->editColumn('driver_interview_criminal_date' , function($res){
              return $res->driver_interview_criminal_date ? date("d/m/Y", strtotime($res->driver_interview_criminal_date)) : '';
          })
          ->editColumn('driver_interview_date' , function($res){
              return $res->driver_interview_date ? date("d/m/Y", strtotime($res->driver_interview_date)) : '';
          })
          ->addColumn('status' , function($res){
              $str = '<span class="badge badge-pill text-white font-medium label-rouded" style="background-color: '.$res->statusJobAppColor[$res->driver_status_job_app].'">'.$res->statusJobApp[$res->driver_status_job_app].'</span>';
              return $str;
          })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('Interview' , '1');
            $insert = Helper::CheckPermissionMenu('Interview' , '2');
            $update = Helper::CheckPermissionMenu('Interview' , '3');
            $delete = Helper::CheckPermissionMenu('Interview' , '4');
            $checked = '';
            $check_approve = '';
            if($res->department_status == 1){
                $checked = 'checked';
            }
            if(!$res->DriverInterview || !$res->DriverInterview->DriverCriminalRecordPass){
                $check_approve = 'disabled';
            }

            // $btnReject = '';
            // $btnRecruitMDS = '';
            // $btnOperationMDS = '';
            // $btnTestAgain = '';
            // $btnKeepHistory = '';
            // $btnNotPassed = '';
            $admin_id = Auth::guard('admin')->user()->admin_id;
            $RecuritApprove = InterviewRecuritApprove::where('admin_id', $admin_id)->where('interview_recurit_approve_status', 1)->first();
            $OperationApprove = InterviewOperationApprove::where('admin_id', $admin_id)->where('interview_operation_approve_status', 1)->first();
            if($RecuritApprove || $OperationApprove){
                if($RecuritApprove){
                    $RecuritApproveFirst = InterviewRecuritApprove::whereNotIn('admin_id', [$RecuritApprove->admin_id])->where('interview_recurit_approve_status', 1)->where('interview_recurit_approve_lv', '<', $RecuritApprove->interview_recurit_approve_lv)->get();
                    if($RecuritApproveFirst){
                        $count_date_approve = $RecuritApproveFirst->sum('interview_recurit_approve_date_next');
                        if($res->driver_interview_date){
                            $driver_interview_date = date("Y-m-d", strtotime($res->driver_interview_date));
                            $date_approve = date('Y-m-d',strtotime($driver_interview_date."+".$count_date_approve." days"));
                            if($date_approve <= date('Y-m-d')){
                                // $btnRecruitMDS = '<button type="button" class="btn btn-xs btn-info btn-recruit-mds" data-id="'.$res->driver_interview_id.'">Recruit MDS</button>';
                                $btnRecruitMDS = '<a class="dropdown-item btn-recruit-mds" href="javascript:void(0)" data-toggle="modal" data-target="#RecruitMDSModal" data-id="' . $res->driver_interview_id . '">Recruit MDS</a>';
                            }
                        }
                    }else{
                        // $btnRecruitMDS = '<button type="button" class="btn btn-xs btn-info btn-recruit-mds" data-id="'.$res->driver_interview_id.'">Recruit MDS</button>';
                        $btnRecruitMDS = '<a class="dropdown-item btn-recruit-mds" href="javascript:void(0)" data-toggle="modal" data-target="#RecruitMDSModal" data-id="' . $res->driver_interview_id . '">Recruit MDS</a>';
                    }
                }
                if($OperationApprove){
                    $OperationApproveFirst = InterviewOperationApprove::whereNotIn('admin_id', [$OperationApprove->admin_id])->where('interview_operation_approve_status', 1)->where('interview_operation_approve_lv', '<', $OperationApprove->interview_operation_approve_lv)->get();
                    if($OperationApproveFirst){
                        $count_date_approve = $OperationApproveFirst->sum('interview_recurit_approve_date_next');
                        if($res->driver_interview_date){
                            $driver_interview_date = date("Y-m-d", strtotime($res->driver_interview_date));
                            $date_approve = date('Y-m-d',strtotime($driver_interview_date."+".$count_date_approve." days"));
                            if($date_approve <= date('Y-m-d')){
                                // $btnOperationMDS = '<button type="button" class="btn btn-xs btn-success btn-operation-mds" data-id="'.$res->driver_interview_id.'">Operation MDS</button>';
                                $btnOperationMDS = '<a class="dropdown-item btn-operation-mds" href="javascript:void(0)" data-toggle="modal" data-target="#OperationMDSModal" data-id="' . $res->driver_interview_id . '">Operation MDS</a>';

                            }
                        }
                    }else{
                        // $btnOperationMDS = '<button type="button" class="btn btn-xs btn-success btn-operation-mds" data-id="'.$res->driver_interview_id.'">Operation MDS</button>';
                        $btnOperationMDS = '<a class="dropdown-item btn-operation-mds" href="javascript:void(0)" data-toggle="modal" data-target="#OperationMDSModal" data-id="' . $res->driver_interview_id . '">Operation MDS</a>';
                    }
                }
                $btnReject = '<button type="button" class="btn btn-xs btn-warning text-white btn-reject" data-id="'.$res->driver_interview_id.'"> Reject </button>';
                $btnTestAgain = '<button type="button" class="btn btn-xs btn-info btn-test-again" data-id="'.$res->driver_interview_id.'">Test again</button>';
                $btnKeepHistory = '<button type="button" class="btn btn-xs btn-warning text-white btn-keep-history" data-id="'.$res->driver_interview_id.'">Keep history</button>';
                $btnNotPassed = '<button type="button" class="btn btn-xs btn-danger btn-not-passed" data-id="'.$res->driver_interview_id.'">Not passed</button>';
            }
            // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_id.'">View</button>';
            $btnPrintEvaluationPdf = '<a href="'.url('admin/CheckCriminalHealth/PrintInterviewEvaluation/'.$res->driver_interview_id).'" class="btn btn-primary btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Interview</a>';
            // $str = '';
            // if($view){
            //     $str.=' '.$btnView;
            // }
            // $str.=' '.$btnPrintEvaluationPdf;
            // $str.=' '.$btnReject;
            // $str.=' '.$btnRecruitMDS;
            // $str.=' '.$btnOperationMDS;
            // $str.=' '.$btnTestAgain;
            // $str.=' '.$btnKeepHistory;
            // $str.=' '.$btnNotPassed;
            // return $str;

           $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            
            if($view){
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_id . '">View</a>';
            }    
            $str .= '<a class="dropdown-item" href="'.url('admin/CheckCriminalHealth/PrintInterviewEvaluation/'.$res->driver_interview_id).'" data-id="'.$res->driver_id.'" target="_blank">Interview</a>';
            $str .= '<a class="dropdown-item btn-reject" href="javascript:void(0)" data-toggle="modal" data-target="#RejectModal" data-id="' . $res->driver_interview_id . '">Reject</a>';
            $str .=' '.$btnRecruitMDS;
            $str .=' '.$btnOperationMDS;
            $str .= '<a class="dropdown-item btn-test-again" href="javascript:void(0)" data-toggle="modal" data-target="#TestAgainModal" data-id="' . $res->driver_interview_id . '">Test again</a>';
            $str .= '<a class="dropdown-item btn-keep-history" href="javascript:void(0)" data-toggle="modal" data-target="#KeepHistoryModal" data-id="' . $res->driver_interview_id . '">Keep history</a>';
            $str .= '<a class="dropdown-item btn-not-passed" href="javascript:void(0)" data-toggle="modal" data-target="#NotPassedModal" data-id="' . $res->driver_interview_id . '">Not passed</a>';

            $str .= '</div>';
            $str .= '</div>';

            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox', 'action', 'status'])
        ->make(true);
    }

    public function SetComment(Request $request, $id)
    {
        $type = $request->input('type');
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverInterview = DriverInterview::find($id);
                if($type == 'R'){
                    // Reject
                    $DriverInterview->driver_interview_criminal_status  = null;
                    $DriverInterview->driver_interview_criminal_comment = $request->input('driver_interview_criminal_comment');
                }elseif($type == 'K'){
                    // Keep history
                    $Driver = Driver::find($DriverInterview->driver_id);
                    $Driver->driver_status_job_app  = 5; // เก็บประวัติไว้พิจารณา
                    $Driver->save();

                    $DriverInterview->driver_interview_comment = $request->input('driver_interview_comment');
                }elseif($type == 'N'){
                    // Not Passed
                    $Driver = Driver::find($DriverInterview->driver_id);
                    $Driver->driver_status_job_app  = 99; // ห้ามกลับมาสมัครใหม่
                    $Driver->save();

                    $DriverInterview->driver_interview_driver_results = 9; // ไม่ผ่านการสัมภาษณ์
                    $DriverInterview->driver_interview_comment = $request->input('driver_interview_comment');
                }elseif($type == 'T'){
                    // Test again
                    $interview_date_waiting = $request->input('driver_interview_date_waiting');
                    $Driver = Driver::find($DriverInterview->driver_id);
                    $format_date_waiting = date("Y-m-d", strtotime($interview_date_waiting));
                    $format_date_interview = date("Y-m-d", strtotime($Driver->driver_interview_date));
                    $count_date_comeback = (strtotime($format_date_waiting) - strtotime($format_date_interview));
                    $count_date_comeback = intval($count_date_comeback / (60 * 60 * 24));

                    $Driver->driver_status_job_app  = 98; // ให้กลับมาทดสอบใหม่ได้
                    $Driver->driver_count_date_comeback  = $count_date_comeback;
                    $Driver->driver_interview_date  = $interview_date_waiting;
                    $Driver->save();

                    $DriverInterview->driver_interview_date_waiting = $Driver->driver_interview_date;
                    $DriverInterview->driver_interview_status = 9;

                    $NewDriverInterview = new DriverInterview;
                    $NewDriverInterview->driver_id = $Driver->driver_id;
                    $NewDriverInterview->driver_interview_date_waiting = $interview_date_waiting;
                    $NewDriverInterview->driver_interview_status = 0;
                    $NewDriverInterview->driver_interview_personality_results = 0;
                    $NewDriverInterview->driver_interview_comment = $request->input('driver_interview_comment');
                    $NewDriverInterview->save();
                }
                $DriverInterview->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update';
        return $return;
    }

    public function SetInterviewMDS(Request $request, $id)
    {
        $input_all = $request->all();
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin_id = Auth::guard('admin')->user()->admin_id;
                $DriverInterview = DriverInterview::find($id);
                foreach($input_all as $key=>$val){
                    $DriverInterview->{$key} = $val;
                }
                $DriverInterview->driver_interview_recrult_admin_id = $admin_id;
                $DriverInterview->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update';
        return $return;
    }

    public function ChangeStatus(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');
        \DB::beginTransaction();
        try {
            if($id){
                if($type == 'R'){
                    // Reject
                    DriverInterview::whereIn('driver_interview_id', $id)->update(['driver_interview_criminal_status' => null]);
                }elseif($type == 'K'){
                    // Keep history
                    foreach($id as $val){
                        $DriverInterview = DriverInterview::find($val);
                        Driver::where('driver_id', $DriverInterview->driver_id)->update(['driver_status_job_app' => 5]); // เก็บประวัติไว้พิจารณา
                    }
                }elseif($type == 'N'){
                    // Not Passed
                    foreach($id as $val){
                        $DriverInterview = DriverInterview::find($val);
                        Driver::where('driver_id', $DriverInterview->driver_id)->update(['driver_status_job_app' => 99]); // ห้ามกลับมาสมัครใหม่
                    }
                    DriverInterview::whereIn('driver_interview_id', $id)->update(['driver_interview_driver_results' => 9]); // ไม่ผ่านการสัมภาษณ์
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
}
