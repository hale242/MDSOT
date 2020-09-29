<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
use App\Helper;
use App\MenuSystem;
use App\CustomerContractFile;

class CustomerContractFileController extends Controller
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
            'customer_contract_file_type' => 'required',
            'customer_contract_file_file_doc' => 'required',
            'customer_contract_file_file_pdf' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                $CustomerContractFile = new CustomerContractFile;
                foreach($input_all as $key=>$val){
                    $CustomerContractFile->{$key} = $val;
                }
                if(!isset($input_all['customer_contract_file_status'])){
                    $CustomerContractFile->customer_contract_file_status = 0;
                }
                if($CustomerContractFile->customer_contract_file_file_doc){
                     $CustomerContractFile->customer_contract_file_file_doc_part = $CustomerContractFile->customer_contract_file_file_doc;
                     $CustomerContractFile->customer_contract_file_file_doc = str_replace("CustomerContractFile/","",$CustomerContractFile->customer_contract_file_file_doc);
                }
                if($CustomerContractFile->customer_contract_file_file_pdf){
                     $CustomerContractFile->customer_contract_file_file_pdf_part = $CustomerContractFile->customer_contract_file_file_pdf;
                     $CustomerContractFile->customer_contract_file_file_pdf = str_replace("CustomerContractFile/","",$CustomerContractFile->customer_contract_file_file_pdf);
                }
                $CustomerContractFile->admin_id = $admin->admin_id;
                $CustomerContractFile->save();
                \DB::commit();
                $return['customer_contract_id'] = $CustomerContractFile->customer_contract_id;
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
            if(isset($failedRules['customer_contract_file_type']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Type is required";
            }
            if(isset($failedRules['customer_contract_file_file_doc']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Upload file document Prefix is required";
            }
            if(isset($failedRules['customer_contract_file_file_pdf']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Upload file pdf is required";
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
        $content = CustomerContractFile::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get CustomerContractFile';
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
      $result = CustomerContractFile::select();
      return Datatables::of($result)
        ->addColumn('customer_contract_file_type' , function($res){
            return $res->customer_contract_file_type ? $res->Type[$res->customer_contract_file_type] : '';
        })
        ->addColumn('customer_contract_file_date_file_all' , function($res){
            return $res->customer_contract_file_date_file_all ? date('d/m/Y', strtotime($res->customer_contract_file_date_file_all)) : '';
        })
        ->addColumn('customer_contract_file_file_doc_date' , function($res){
            return $res->customer_contract_file_file_doc_date ? date('d/m/Y', strtotime($res->customer_contract_file_file_doc_date)) : '';
        })
        ->addColumn('customer_contract_file_file_pdf_date' , function($res){
            return $res->customer_contract_file_file_pdf_date ? date('d/m/Y', strtotime($res->customer_contract_file_file_pdf_date)) : '';
        })
        ->addColumn('customer_contract_file_date_contract_start' , function($res){
            return $res->customer_contract_file_date_contract_start ? date('d/m/Y', strtotime($res->customer_contract_file_date_contract_start)) : '';
        })
        ->addColumn('customer_contract_file_date_contract_end' , function($res){
            return $res->customer_contract_file_date_contract_end ? date('d/m/Y', strtotime($res->customer_contract_file_date_contract_end)) : '';
        })
        ->addColumn('customer_contract_file_file_doc' , function($res){
            $file = '';
            if ($res->customer_contract_file_file_doc) {
                $file = '<a href="' . url('uploads/'.$res->customer_contract_file_file_doc_part) . '" target="_blank">' . $res->customer_contract_file_file_doc . '</a>';
            }
            return $file;
        })
        ->addColumn('customer_contract_file_file_pdf' , function($res){
            $file = '';
            if ($res->customer_contract_file_file_pdf) {
                $file = '<a href="' . url('uploads/'.$res->customer_contract_file_file_pdf_part) . '" target="_blank">' . $res->customer_contract_file_file_pdf . '</a>';
            }
            return $file;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('CustomerContract' , '1');
            $insert = Helper::CheckPermissionMenu('CustomerContract' , '2');
            $update = Helper::CheckPermissionMenu('CustomerContract' , '3');
            $delete = Helper::CheckPermissionMenu('CustomerContract' , '4');
            if($res->customer_contract_file_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->customer_contract_file_id . '" data-style="ios" data-on="On" data-off="Off">';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['customer_contract_file_file_doc', 'customer_contract_file_file_pdf', 'action'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $CustomerContractFile = CustomerContractFile::find($id);
            $CustomerContractFile->customer_contract_file_status = $request->input('status');
            $CustomerContractFile->save();
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
