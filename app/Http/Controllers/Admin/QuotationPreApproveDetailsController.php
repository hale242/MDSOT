<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\QuotationPreApproveDetails;

class QuotationPreApproveDetailsController extends Controller
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
            'quotation_pre_approve_details_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $QuotationPreApproveDetails = new QuotationPreApproveDetails;
                foreach($input_all as $key=>$val){
                    $QuotationPreApproveDetails->{$key} = $val;
                }
                if(!isset($input_all['quotation_pre_approve_details_status'])){
                    $QuotationPreApproveDetails->quotation_pre_approve_details_status = 0;
                }
                $QuotationPreApproveDetails->save();
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
            if(isset($failedRules['quotation_pre_approve_details_name']['required'])) {
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
        $content = QuotationPreApproveDetails::find($id);
        $content->quotation_pre_approve_details_date_send = $content->quotation_pre_approve_details_date_send ? date('Y-m-d', strtotime($content->quotation_pre_approve_details_date_send)) : '';
        $content->quotation_pre_approve_details_payment_date = $content->quotation_pre_approve_details_payment_date ? date('Y-m-d', strtotime($content->quotation_pre_approve_details_payment_date)) : '';
        $content->quotation_pre_approve_details_invoice_date = $content->quotation_pre_approve_details_invoice_date ? date('Y-m-d', strtotime($content->quotation_pre_approve_details_invoice_date)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get QuotationPreApproveDetails';
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
            'quotation_pre_approve_details_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $QuotationPreApproveDetails = QuotationPreApproveDetails::find($id);
                foreach($input_all as $key=>$val){
                    $QuotationPreApproveDetails->{$key} = $val;
                }
                $QuotationPreApproveDetails->save();
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
            if(isset($failedRules['quotation_pre_approve_details_name']['required'])) {
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
}
