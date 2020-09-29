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
use App\InterviewManagingApprove;
use App\LeaveType;
use App\DriverLeave;
use App\RecruitmentPosition;

class ApproveNewDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part','ApproveNewDriver')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
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
        if(Helper::CheckPermissionMenu('ApproveNewDriver' , '1')){
            return view('admin.ApproveNewDriver.approve_new_driver', $data);
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
        ->whereNull('driver.driver_status')
        ->where('driver_interview.driver_interview_recrult_status', 1)
        ->where('driver_interview.driver_interview_operation_status', 1)
        ->with('DriverInterview.DriverCriminalRecordPass');

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
          ->addColumn('interview' , function($res){
              return '';
          })
          ->addColumn('score' , function($res){
              return '';
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
            $btnApprove = '';
            $admin_id = Auth::guard('admin')->user()->admin_id;
            $ManagingApprove = InterviewManagingApprove::where('admin_id', $admin_id)->first();
            if($ManagingApprove){
                $ManagingApproveFirst = InterviewManagingApprove::whereNotIn('admin_id', [$ManagingApprove->admin_id])->where('interview_managing_approve_status', 1)->where('interview_managing_approve_lv', '<', $ManagingApprove->interview_managing_approve_lv)->get();
                if($ManagingApproveFirst){
                    $count_date_approve = $ManagingApproveFirst->sum('interview_managing_approve_date_next');
                    if($res->driver_interview_date){
                        $driver_interview_date = date("Y-m-d", strtotime($res->driver_interview_date));
                        $date_approve = date('Y-m-d',strtotime($driver_interview_date."+".$count_date_approve." days"));
                        if($date_approve <= date('Y-m-d')){
                            // $btnApprove = '<button type="button" class="btn btn-xs btn-success btn-approve" data-id="'.$res->driver_interview_id.'">Approve</button>';
                            $btnApprove = '<a class="dropdown-item btn-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveModal" data-id="' . $res->driver_interview_id . '">Approve</a>';

                        }
                    }
                }else{
                    // $btnApprove = '<button type="button" class="btn btn-xs btn-success btn-approve" data-id="'.$res->driver_interview_id.'">Approve</button>';
                    $btnApprove = '<a class="dropdown-item btn-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveModal" data-id="' . $res->driver_interview_id . '">Approve</a>';
                }
            }
            // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->driver_id.'">View</button>';
            // $btnPrintEvaluationPdf = '<a href="'.url('admin/CheckCriminalHealth/PrintInterviewEvaluation/'.$res->driver_interview_id).'" class="btn btn-primary btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Interview</a>';
            // $btnPrintPdf = '<a href="'.url('admin/JobRegister/PrintDriverProfile/'.$res->driver_id).'" class="btn btn-warning btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Print</a>';
            // $btnReject = '<button type="button" class="btn btn-xs btn-warning text-white btn-reject" data-id="'.$res->driver_interview_id.'"> Reject </button>';
            // $btnNotApprove = '<button type="button" class="btn btn-xs btn-danger btn-not-approve" data-id="'.$res->driver_interview_id.'">Not Approve</button>';
            // $str = '';
            // if($view){
            //     $str.=' '.$btnView;
            // }
            // $str.=' '.$btnPrintEvaluationPdf;
            // $str.=' '.$btnPrintPdf;
            // $str.=' '.$btnApprove;
            // $str.=' '.$btnReject;
            // $str.=' '.$btnNotApprove;
            // return $str;

           $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            
            if($view){
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_id . '">View</a>';
            }    
            $str .= '<a class="dropdown-item" href="'.url('admin/CheckCriminalHealth/PrintInterviewEvaluation/'.$res->driver_interview_id).'" class="btn btn-primary btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Interview</a>';
            $str .= '<a class="dropdown-item" href="'.url('admin/JobRegister/PrintDriverProfile/'.$res->driver_id).'" class="btn btn-primary btn-md text-white" data-id="'.$res->driver_id.'" target="_blank">Print</a>';
            $str .=' '.$btnApprove;
            $str .= '<a class="dropdown-item btn-reject" href="javascript:void(0)" data-toggle="modal" data-target="#RejectModal" data-id="' . $res->driver_interview_id . '">Reject</a>';
            $str .= '<a class="dropdown-item btn-not-approve" href="javascript:void(0)" data-toggle="modal" data-target="#NotApproveModal" data-id="' . $res->driver_interview_id . '">Not Approve</a>';


            $str .= '</div>';
            $str .= '</div>';

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
                    $DriverInterview->driver_interview_comment = $request->input('driver_interview_comment');
                    $DriverInterview->driver_interview_recrult_status = 0;
                    $DriverInterview->driver_interview_operation_status = 0;
                }elseif($type == 'A'){
                    // Approve
                    $Driver = Driver::find($DriverInterview->driver_id);
                    $Driver->driver_status = 1;
                    $Driver->save();

                    //insert การลาประจำปี
                    $LeaveTypes = LeaveType::where('leave_type_status', 1)->get();
                    foreach($LeaveTypes as $val){
                        $DriverLeave = new DriverLeave;
                        $DriverLeave->driver_id = $Driver->driver_id;
                        $DriverLeave->leave_type_id = $val->leave_type_id;
                        $DriverLeave->driver_leave_year = date('Y');
                        $DriverLeave->driver_leave_date_define = $val->leave_type_date_define;
                        $DriverLeave->driver_leave_date_total = $val->leave_type_date_define;
                        $DriverLeave->driver_leave_details = $val->leave_type_details;
                        $DriverLeave->driver_leave_status = 1;
                        $DriverLeave->save();
                    }
                    $DriverInterview->driver_interview_comment = $request->input('driver_interview_comment');
                }elseif($type == 'N'){
                    // Not approve
                    $Driver = Driver::find($DriverInterview->driver_id);
                    $Driver->driver_status_job_app  = 99; //ห้ามกลับมาสมัครใหม่
                    $Driver->save();

                    $DriverInterview->driver_interview_status  = 9;
                    $DriverInterview->driver_interview_comment = $request->input('driver_interview_comment');
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

    public function ChangeStatus(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');
        \DB::beginTransaction();
        try {
            if($id){
                if($type == 'A'){
                    // Approve
                    foreach($id as $val){
                        $DriverInterview = DriverInterview::find($val);
                        Driver::where('driver_id', $DriverInterview->driver_id)->update(['driver_status' => 1]);
                    }
                }elseif($type == 'R'){
                    // Reject
                    DriverInterview::whereIn('driver_interview_id', $id)->update([
                        'driver_interview_recrult_status' => 0,
                        'driver_interview_operation_status' => 0
                    ]);
                }elseif($type == 'N'){
                    // Not Approve
                    foreach($id as $val){
                        $DriverInterview = DriverInterview::find($val);
                        Driver::where('driver_id', $DriverInterview->driver_id)->update(['driver_status_job_app' => 99]); // ห้ามกลับมาสมัครใหม่
                    }
                    DriverInterview::whereIn('driver_interview_id', $id)->update(['driver_interview_status' => 9]); // ไม่ผ่านการสัมภาษณ์
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
