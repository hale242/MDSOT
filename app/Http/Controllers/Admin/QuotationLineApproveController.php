<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\QuotationLineApprove;
use App\Position;

class QuotationLineApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'QuotationLineApprove')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Positions'] = Position::where('position_status', 1)->get();


        if (Helper::CheckPermissionMenu('QuotationLineApprove', '1')) {
            return view('admin.QuotationLineApprove.quotation_line_approve', $data);
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
            'position_id' => 'required',
            'quotation_line_approve_name' => 'required',
        ]);

        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $QuotationLineApprove = QuotationLineApprove::where('position_id', $input_all['position_id'])
                    ->where('quotation_line_approve_lv', $input_all['quotation_line_approve_lv'])
                    ->first();

                if (isset($QuotationLineApprove)) {
                    $return['status'] = 2;
                    $return['content'] = 'Position  is duplicate and Approve level is duplicate';
                } else {

                    $QuotationLineApprove = new QuotationLineApprove;
                    foreach ($input_all as $key => $val) {
                        $QuotationLineApprove->{$key} = $val;
                    }
                    if (!isset($input_all['quotation_line_approve_status'])) {
                        $QuotationLineApprove->quotation_line_approve_status = 0;
                    }
                    $QuotationLineApprove->save();
                    \DB::commit();
                    $return['status'] = 1;
                    $return['content'] = 'Success';
                }
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['quotation_line_approve_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "QuotationLineApprove is required";
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
        $content = QuotationLineApprove::with('Position')->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get QuotationLineApprove';
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
            'position_id' => 'required',
            'quotation_line_approve_name' => 'required',
        ]);

        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                
                $QuotationLineApprove = QuotationLineApprove::where('position_id', $input_all['position_id'])
                    ->where('quotation_line_approve_lv', $input_all['quotation_line_approve_lv'])
                    ->first();

                if (isset($QuotationLineApprove)) {
                    $return['status'] = 2;
                    $return['content'] = 'Position  is duplicate and Approve level is duplicate';
                } else {

                    $QuotationLineApprove = QuotationLineApprove::find($id);
                    foreach ($input_all as $key => $val) {
                        $QuotationLineApprove->{$key} = $val;
                    }
                    if (!isset($input_all['quotation_line_approve_status'])) {
                        $QuotationLineApprove->quotation_line_approve_status = 0;
                    }
                    $QuotationLineApprove->save();
                    \DB::commit();
                    $return['status'] = 1;
                    $return['content'] = 'Success';

                }
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['quotation_line_approve_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Quotation Line Approve is required";
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
        $result = QuotationLineApprove::select()->with('Position');
        $position_id = $request->input('position_id');
        $quotation_line_approve_name = $request->input('quotation_line_approve_name');
        $quotation_line_approve_lv = $request->input('quotation_line_approve_lv');
        if ($position_id) {
            $result->where('position_id', $position_id);
        }
        if ($quotation_line_approve_name) {
            $result->where('quotation_line_approve_name', 'like', '%' . $quotation_line_approve_name . '%');
        }
        if ($quotation_line_approve_lv) {
            $result->where('quotation_line_approve_lv', $quotation_line_approve_lv);
        }
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->quotation_line_approve_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->quotation_line_approve_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('position_name', function ($res) {
                return $res->Position->position_name;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('QuotationLineApprove', '1');
                $insert = Helper::CheckPermissionMenu('QuotationLineApprove', '2');
                $update = Helper::CheckPermissionMenu('QuotationLineApprove', '3');
                $delete = Helper::CheckPermissionMenu('QuotationLineApprove', '4');
                if ($res->quotation_line_approve_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
               
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->quotation_line_approve_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->quotation_line_approve_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->quotation_line_approve_id . '">Edit</button>';
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
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-id="'.$res->quotation_line_approve_id.'">View</a>';
                }
                if ($update) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-id="'.$res->quotation_line_approve_id.'">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                $str .= $btnStatus;
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'position_name', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['quotation_line_approve_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            QuotationLineApprove::where('quotation_line_approve_id', $id)->update($input_all);
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
