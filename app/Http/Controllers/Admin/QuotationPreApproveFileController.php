<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\QuotationPreApproveFile;

class QuotationPreApproveFileController extends Controller
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
            'quotation_pre_approve_file_title' => 'required',
            'quotation_pre_approve_file_file_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $QuotationPreApproveFile = new QuotationPreApproveFile;
                foreach ($input_all as $key => $val) {
                    $QuotationPreApproveFile->{$key} = $val;
                }
                if (isset($QuotationPreApproveFile->quotation_pre_approve_file_file_name) && $QuotationPreApproveFile->quotation_pre_approve_file_file_name) {
                    $QuotationPreApproveFile->quotation_pre_approve_file_file_part = 'uploads/'.$QuotationPreApproveFile->quotation_pre_approve_file_file_name;
                    $QuotationPreApproveFile->quotation_pre_approve_file_file_name = str_replace("QuotationPreApproveFile/", "", $QuotationPreApproveFile->quotation_pre_approve_file_file_name);
                }
                $QuotationPreApproveFile->save();
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
            if(isset($failedRules['quotation_pre_approve_file_title']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name is required";
            }
            if(isset($failedRules['quotation_pre_approve_file_file_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "File is required";
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
        $content = QuotationPreApproveFile::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get QuotationPreApproveFile';
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
      $result = QuotationPreApproveFile::select();
      return Datatables::of($result)
        ->editColumn('quotation_pre_approve_file_file_name' , function($res){
            return '<a href="'.url($res->quotation_pre_approve_file_file_part).'" target="_blank">'.$res->quotation_pre_approve_file_file_name.'</a>';
        })
        ->addIndexColumn()
        ->rawColumns(['quotation_pre_approve_file_file_name'])
        ->make(true);
    }
}
