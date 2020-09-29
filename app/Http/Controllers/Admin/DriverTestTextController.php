<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverTestText;

class DriverTestTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','DriverTestText')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          if(Helper::CheckPermissionMenu('DriverTestText' , '1')){
              return view('admin.DriverTestText.driver_test_text', $data);
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
            'driver_test_text_name_th' => 'required',
            'driver_test_text_name_en' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverTestText = new DriverTestText;
                foreach($input_all as $key=>$val){
                    $DriverTestText->{$key} = $val;
                }
                if(!isset($input_all['driver_test_text_status_recrult'])){
                    $DriverTestText->driver_test_text_status_recrult = 0;
                }
                if(!isset($input_all['driver_test_text_status_operation'])){
                    $DriverTestText->driver_test_text_status_operation = 0;
                }
                if(!isset($input_all['driver_test_text_status'])){
                    $DriverTestText->driver_test_text_status = 0;
                }
                $DriverTestText->save();
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
            if(isset($failedRules['driver_test_text_name_th']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Question (TH) is required";
            }
            if(isset($failedRules['driver_test_text_name_th']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Question (EN) is required";
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
        $content = DriverTestText::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get DriverTestText';
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
            'driver_test_text_name_th' => 'required',
            'driver_test_text_name_en' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverTestText = DriverTestText::find($id);
                foreach($input_all as $key=>$val){
                    $DriverTestText->{$key} = $val;
                }
                if(!isset($input_all['driver_test_text_status_recrult'])){
                    $DriverTestText->driver_test_text_status_recrult = 0;
                }
                if(!isset($input_all['driver_test_text_status_operation'])){
                    $DriverTestText->driver_test_text_status_operation = 0;
                }
                if(!isset($input_all['driver_test_text_status'])){
                    $DriverTestText->driver_test_text_status = 0;
                }
                $DriverTestText->save();
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
            if(isset($failedRules['driver_test_text_name_th']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Question (TH) is required";
            }
            if(isset($failedRules['driver_test_text_name_th']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Question (EN) is required";
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
      $result = DriverTestText::select();
      return Datatables::of($result)
        ->addColumn('checkbox' , function($res){
            $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-'.$res->driver_test_text_id.'">
                        <label class="custom-control-label" for="checkbox-item-'.$res->driver_test_text_id.'"></label>
                    </div>';
            return $str;
        })
        ->addColumn('status_recrult' , function($res){
            if($res->driver_test_text_status_recrult == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            return '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->driver_test_text_id.'" data-type="R" data-style="ios" data-on="On" data-off="Off">';
        })
        ->addColumn('status_operation' , function($res){
            if($res->driver_test_text_status_operation == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            return '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->driver_test_text_id.'" data-type="P" data-style="ios" data-on="On" data-off="Off">';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('DriverTestText' , '1');
            $insert = Helper::CheckPermissionMenu('DriverTestText' , '2');
            $update = Helper::CheckPermissionMenu('DriverTestText' , '3');
            $delete = Helper::CheckPermissionMenu('DriverTestText' , '4');
            if($res->driver_test_text_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->driver_test_text_id.'" data-type="S" data-style="ios" data-on="On" data-off="Off">';
           $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            if ($view) {
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_test_text_id . '">View</a>';
            }
            if ($update) {
            $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->driver_test_text_id . '">Edit</a>';
            }
            $str .= '</div>';
            $str .= '</div>';
            if ($update) {
                $str .= ' ' . $btnStatus;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox', 'action', 'status_recrult', 'status_operation'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $type = $request->input('type');
        \DB::beginTransaction();
        try {
            if($type == 'R'){
                $input_all['driver_test_text_status_recrult'] = $status;
            }elseif($type == 'P'){
                $input_all['driver_test_text_status_operation'] = $status;
            }else{
                $input_all['driver_test_text_status'] = $status;
            }
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            DriverTestText::where('driver_test_text_id', $id)->update($input_all);
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
