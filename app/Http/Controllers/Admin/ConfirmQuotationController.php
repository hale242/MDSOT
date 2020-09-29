<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Storage;
use App\Helper;
use App\MenuSystem;
use App\ConfirmQuotation;

class ConfirmQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'confirm_quotation_car' => 'required',
            'confirm_quotation_nationality' => 'required',
            'confirm_quotation_other' => 'required',
            'confirm_quotation_file_part' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $ConfirmQuotation = new ConfirmQuotation;
                foreach($input_all as $key=>$val){
                    $ConfirmQuotation->{$key} = $val;
                }
                if(isset($input_all['confirm_quotation_file_part'])){
                     $ConfirmQuotation->confirm_quotation_file_part = 'uploads/'.$ConfirmQuotation->confirm_quotation_file_part;
                }
                if(!isset($input_all['confirm_quotation_status'])){
                    $ConfirmQuotation->confirm_quotation_status = 0;
                }
                $ConfirmQuotation->confirm_quotation_date_file = date('Y-m-d H:i:s');
                $ConfirmQuotation->save();
                \DB::commit();
                $return['quotation_id'] = $ConfirmQuotation->quotation_id;
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
            if(isset($failedRules['confirm_quotation_name']['required'])) {
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
        $content = ConfirmQuotation::find($id);
        $content->confirm_quotation_date_sign = $content->confirm_quotation_date_sign ? date('Y-m-d', strtotime($content->confirm_quotation_date_sign)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get ConfirmQuotation';
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
            'confirm_quotation_car' => 'required',
            'confirm_quotation_nationality' => 'required',
            'confirm_quotation_other' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $ConfirmQuotation = ConfirmQuotation::find($id);
                if(isset($input_all['confirm_quotation_file_part'])){
                    $file = str_replace("uploads/","",$ConfirmQuotation->confirm_quotation_file_part);
                    Storage::disk("uploads")->delete($file);
                    $input_all['confirm_quotation_file_part'] = 'uploads/'.$input_all['confirm_quotation_file_part'];
                }
                foreach($input_all as $key=>$val){
                    $ConfirmQuotation->{$key} = $val;
                }
                if(!isset($input_all['confirm_quotation_status'])){
                    $ConfirmQuotation->confirm_quotation_status = 0;
                }
                $ConfirmQuotation->confirm_quotation_date_file = date('Y-m-d H:i:s');
                $ConfirmQuotation->save();
                \DB::commit();
                $return['quotation_id'] = $ConfirmQuotation->quotation_id;
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
            if(isset($failedRules['confirm_quotation_name']['required'])) {
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
      $result = ConfirmQuotation::select();
      $quotation_id = $request->input('quotation_id');
      if($quotation_id){
          $result->where('quotation_id', $quotation_id);
      }
      return Datatables::of($result)
        ->editColumn('confirm_quotation_file_part' , function($res){
            $file_name = str_replace("uploads/ConfirmQuotation/","",$res->confirm_quotation_file_part);
            return '<a href="'.url($res->confirm_quotation_file_part).'" target="_blank">'.$file_name.'</a>';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('Quotation' , '1');
            $insert = Helper::CheckPermissionMenu('Quotation' , '2');
            $update = Helper::CheckPermissionMenu('Quotation' , '3');
            $delete = Helper::CheckPermissionMenu('Quotation' , '4');
            if($res->confirm_quotation_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-confirm-quotatin-status" '.$checked.' data-id="'.$res->confirm_quotation_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit-confirm-quotation" data-id="'.$res->confirm_quotation_id.'">Edit</button>';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            if($update){
                $str.=' '.$btnEdit;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['confirm_quotation_file_part', 'action'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $ConfirmQuotation = ConfirmQuotation::find($id);
            $ConfirmQuotation->confirm_quotation_status = $request->input('status');
            $ConfirmQuotation->save();
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
