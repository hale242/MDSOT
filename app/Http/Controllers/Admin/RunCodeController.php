<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\RunCode;

class RunCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'RunCode')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if (Helper::CheckPermissionMenu('RunCode', '1')) {
            return view('admin.RunCode.run_code', $data);
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
        $input_all = $request->all();
        $validator = Validator::make($request->all(), [
            'run_code_code' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $RunCode = new RunCode;
                foreach ($input_all as $key => $val) {
                    $RunCode->{$key} = $val;
                }
                if (!isset($input_all['run_code_status'])) {
                    $RunCode->run_code_status = 0;
                }
                $RunCode->save();
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
            if (isset($failedRules['run_code_code']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Run Code is required";
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
        $content = RunCode::where('run_code_id', $id)->first();
        $return['status'] = 1;
        $return['title'] = 'Get RunCode';
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
        $input_all = $request->all();
        $validator = Validator::make($request->all(), [
            'run_code_code' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $RunCode = RunCode::find($id);
                foreach ($input_all as $key => $val) {
                    $RunCode->{$key} = $val;
                }
                if (!isset($input_all['run_code_status'])) {
                    $RunCode->run_code_status = 0;
                }
                $RunCode->save();
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
            if (isset($failedRules['run_code_code']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Bank Type is required";
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

        $run_code_code = $request->input('run_code_code');
        $run_code_type = $request->input('run_code_type');
        $run_code_book_acc = $request->input('run_code_book_acc');
        $run_code_acc_code = $request->input('run_code_acc_code');
        $run_code_reftype = $request->input('run_code_reftype');
        $run_code_paytype = $request->input('run_code_paytype');

        $result = RunCode::select();
        if ($run_code_code) {
            $result->where('run_code_code', 'LIKE', "%{$run_code_code}%");
        }
        if ($run_code_type) {
            $result->where('run_code_type',$run_code_type);
        }
        if ($run_code_book_acc) {
            $result->where('run_code_book_acc', 'LIKE', "%{$run_code_book_acc}%");
        }
        if ($run_code_acc_code) {
            $result->where('run_code_acc_code', 'LIKE', "%{$run_code_acc_code}%");
        }
        if ($run_code_reftype) {
            $result->where('run_code_reftype', 'LIKE', "%{$run_code_reftype}%");
        }
        if ($run_code_paytype) {
            $result->where('run_code_paytype', 'LIKE', "%{$run_code_paytype}%");
        }

        return Datatables::of($result)
            ->addColumn('run_code_type', function ($res) {
                $type = '';
                if ($res->run_code_type == '1') {
                    $type = '(1) แบบประเมินผลการสัมภาษณ์ (Interview Evaluation) F#6';
                }
                else if ($res->run_code_type == '2') {
                    $type = '(2) รายชื่อพนักงานขับรถเริ่มงานใหม่เข้าอบรม ประจำวัน F#7 (เอกสารอบรม) ประจำวัน';
                }
                else if ($res->run_code_type == '3') {
                    $type = '(3) ประวัติพนักงานขับรถยนต์ (Driver Profile) F#8';
                }
                else if ($res->run_code_type == '4') {
                    $type = '(4) แบบประเมินการขับรถของผู้สมัครพนักงานขับรถยนต์ F#3';
                }
                else if ($res->run_code_type == '5') {
                    $type = '(5) ใบลงเวลาทดแทน (Timesheet) F#4';
                }
                else if ($res->run_code_type == '6') {
                    $type = '(6) สัญญาจ้างบริการพนักงานขับรถยนต์ (ไทย - อังกฤษ) F#1';
                }
                else if ($res->run_code_type == '7') {
                    $type = '(7) แบบฟอร์ม Confirmation Letter (ไทย - อังกฤษ) F#2';
                }
                else if ($res->run_code_type == '8') {
                    $type = '(8) แบบฟอร์ม Quotation (ไทย - อังกฤษ) F#4';
                }
                else if ($res->run_code_type == '9') {
                    $type = '(9) แบบฟอร์มบริหารทรัพย์สิน F#5';
                }
                else if ($res->run_code_type == '10') {
                    $type = '(10) ชุดขอออกสัญญา F#6';
                }
                else if ($res->run_code_type == '11') {
                    $type = '(11) ตัวอย่าง Pre-Approve F#8';
                }
                else if ($res->run_code_type == '12') {
                    $type = '(12) ใบแจ้งบริการ F#11';
                }
                else if ($res->run_code_type == '13') {
                    $type = '(13) Letter Out F#12';
                }
                else if ($res->run_code_type == '14') {
                    $type = '(14) Invoice C#1 (Service)';
                }
                else if ($res->run_code_type == '15') {
                    $type = '(15) Invoice C#1 (Overtime+Other)';
                }
                else if ($res->run_code_type == '16') {
                    $type = '(16) Tax Invoice/Receipt C#2';
                }
                else if ($res->run_code_type == '17') {
                    $type = '(17) ใบวางบิล C#3';
                }
                else if ($res->run_code_type == '18') {
                    $type = '(18) ใบลดหนี้ (ไม่ใช่ใบกำกับภาษี) C#4 (Service)';
                }
                return $type;
            })
            ->addColumn('run_code_reftype', function ($res) {
                $reftype = '';
                if ($res->run_code_reftype == 'RI') {
                    $reftype = 'ใบเสร็จรับเงินรับ(ซื้อมาขายไป)';
                }
                if ($res->run_code_reftype == 'RV') {
                    $reftype = 'ใบเสร็จรับเงิน(งานบริการ) หรืออื่นๆ';
                }

                return $reftype;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('RunCode', '1');
                $insert = Helper::CheckPermissionMenu('RunCode', '2');
                $update = Helper::CheckPermissionMenu('RunCode', '3');
                $delete = Helper::CheckPermissionMenu('RunCode', '4');

                if ($res->run_code_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->run_code_id . '" data-style="ios" data-on="On" data-off="Off">';
               $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->run_code_id . '">View</a>';
                }
                if ($update) {
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->run_code_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['run_code_type', 'run_code_reftype', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['run_code_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            RunCode::where('run_code_id', $id)->update($input_all);
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
