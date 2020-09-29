<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\HolidayType;

class HolidayTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','HolidayType')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          if(Helper::CheckPermissionMenu('HolidayType' , '1')){
              return view('admin.HolidayType.holiday_type', $data);
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
            'holiday_type_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $HolidayType = new HolidayType;
                foreach($input_all as $key=>$val){
                    $HolidayType->{$key} = $val;
                }
                if (!isset($input_all['holiday_type_status'])) {
                    $HealthType->holiday_type_status = 0;
                }
                $HolidayType->save();
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
            if(isset($failedRules['holiday_type_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Holiday Type is required";
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
        $content = HolidayType::find($id);
        $content['holiday_type_date'] = $content->holiday_type_date ? date("Y-m-d", strtotime($content->holiday_type_date)) : '';
        $content['format_holiday_type_date'] = $content->holiday_type_date ? date("d/m/Y", strtotime($content->holiday_type_date)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get HolidayType';
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
            'holiday_type_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $HolidayType = HolidayType::find($id);
                foreach($input_all as $key=>$val){
                    $HolidayType->{$key} = $val;
                }
                if (!isset($input_all['holiday_type_status'])) {
                    $HealthType->holiday_type_status = 0;
                }
                $HolidayType->save();
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
            if(isset($failedRules['holiday_type_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Holiday Type is required";
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
      $result = HolidayType::select();
      $holiday_type_name = $request->input('holiday_type_name');
      $holiday_type_detail = $request->input('holiday_type_detail');
      if($holiday_type_name){
          $result->where('holiday_type_name', 'like', '%'.$holiday_type_name.'%');
      };
      if($holiday_type_detail){
          $result->where('holiday_type_details', 'like', '%'.$holiday_type_detail.'%');
      };
      return Datatables::of($result)
        ->editColumn('holiday_type_date' , function($res){
            $str = '';
            if($res->holiday_type_date){
                $str = $res->holiday_type_date ? date("d/m/Y", strtotime($res->holiday_type_date)) : '';
            }
            return $str;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('HolidayType' , '1');
            $insert = Helper::CheckPermissionMenu('HolidayType' , '2');
            $update = Helper::CheckPermissionMenu('HolidayType' , '3');
            $delete = Helper::CheckPermissionMenu('HolidayType' , '4');
            if($res->holiday_type_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->holiday_type_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="'.$res->holiday_type_id.'">View</button>';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="'.$res->holiday_type_id.'">Edit</button>';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            if($view){
                $str.=' '.$btnView;
            }
            if($update){
                $str.=' '.$btnEdit;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox', 'action'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $HolidayType = HolidayType::find($id);
            $HolidayType->holiday_type_status = $request->input('status');
            $HolidayType->save();
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
