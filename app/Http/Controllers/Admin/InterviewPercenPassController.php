<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\InterviewPercenPass;

class InterviewPercenPassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'InterviewPercenPass')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if (Helper::CheckPermissionMenu('InterviewPercenPass', '1')) {
            return view('admin.InterviewPercenPass.interview_percen_pass', $data);
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
            'interview_percen_pass_percen' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $InterviewPercenPass = new InterviewPercenPass;
                foreach ($input_all as $key => $val) {
                    $InterviewPercenPass->{$key} = $val;
                }
                if (!isset($input_all['interview_percen_pass_status'])) {
                    $InterviewPercenPass->interview_percen_pass_status = 0;
                } else {
                    InterviewPercenPass::where('interview_percen_pass_status', 1)
                        ->update(['interview_percen_pass_status' => 0]);
                }
                $InterviewPercenPass->save();
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
            if (isset($failedRules['interview_percen_pass_percen']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name Prefix is required";
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
        $content = InterviewPercenPass::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get InterviewPercenPass';
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
            'interview_percen_pass_percen' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {

                $InterviewPercenPass = InterviewPercenPass::find($id);

                foreach ($input_all as $key => $val) {
                    $InterviewPercenPass->{$key} = $val;
                }

                if (!isset($input_all['interview_percen_pass_status'])) {
                    if ($InterviewPercenPass->interview_percen_pass_status == 1) {
                        $InterviewPercenPass->interview_percen_pass_status = 1;
                    } else {
                        $InterviewPercenPass->interview_percen_pass_status = 0;
                    }
                } else {
                    InterviewPercenPass::where('interview_percen_pass_status', 1)
                        ->update(['interview_percen_pass_status' => 0]);
                }
                $InterviewPercenPass->save();
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
            if (isset($failedRules['interview_percen_pass_percen']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name Prefix is required";
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
        $result = InterviewPercenPass::select();
        $interview_percen_pass_percen = $request->input('interview_percen_pass_percen');
        $interview_percen_pass_detail = $request->input('interview_percen_pass_detail');
        if ($interview_percen_pass_percen) {
            $result->where('interview_percen_pass_percen', 'like', '%' . $interview_percen_pass_percen . '%');
        };
        if ($interview_percen_pass_detail) {
            $result->where('interview_percen_pass_details', 'like', '%' . $interview_percen_pass_detail . '%');
        };
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->interview_percen_pass_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->interview_percen_pass_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('interview_percen_pass_percen', function ($res) {
                $str = $res->interview_percen_pass_percen . ' ' . '%';
                return $str;
            })

            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('InterviewPercenPass', '1');
                $insert = Helper::CheckPermissionMenu('InterviewPercenPass', '2');
                $update = Helper::CheckPermissionMenu('InterviewPercenPass', '3');
                $delete = Helper::CheckPermissionMenu('InterviewPercenPass', '4');
                if ($res->interview_percen_pass_status == 1) {
                    $checked = 'checked';
                    $disabled = 'disabled';
                } else {
                    $checked = '';
                    $disabled = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' ' . $disabled . ' data-id="' . $res->interview_percen_pass_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->interview_percen_pass_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->interview_percen_pass_id . '">Edit</button>';
                // $str = '';
                // if ($update) {
                //     $str .= ' ' . $btnStatus;
                // }
                // if ($view) {
                //     $str .= ' ' . $btnView;
                // }
                // if ($update) {
                //     $str .= ' ' . $btnEdit;
                // }
                // return $str;
               $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->interview_percen_pass_id . '">View</a>';
                }
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->interview_percen_pass_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'interview_percen_pass_percen', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['interview_percen_pass_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            InterviewPercenPass::where('interview_percen_pass_status', 1)
                ->update(['interview_percen_pass_status' => 0]);

            InterviewPercenPass::where('interview_percen_pass_id', $id)->update($input_all);
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
