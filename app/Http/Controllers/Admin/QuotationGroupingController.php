<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\QuotationGrouping;
use App\QuotationGroupingDriver;

class QuotationGroupingController extends Controller
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
            'quotation_grouping_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $QuotationGrouping = new QuotationGrouping;
                foreach($input_all as $key=>$val){
                    $QuotationGrouping->{$key} = $val;
                }
                if(!isset($input_all['quotation_grouping_status'])){
                    $QuotationGrouping->quotation_grouping_status = 0;
                }
                $QuotationGrouping->save();
                \DB::commit();
                $return['quotation_id'] = $QuotationGrouping->quotation_id;
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
            if(isset($failedRules['quotation_grouping_name']['required'])) {
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
        $content = QuotationGrouping::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get QuotationGrouping';
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
      $result = QuotationGrouping::select();
      $quotation_id = $request->input('quotation_id');
      if($quotation_id){
          $result->where('quotation_id', $quotation_id);
      }
      return Datatables::of($result)
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('Quotation' , '1');
            $insert = Helper::CheckPermissionMenu('Quotation' , '2');
            $update = Helper::CheckPermissionMenu('Quotation' , '3');
            $delete = Helper::CheckPermissionMenu('Quotation' , '4');
            if($res->quotation_grouping_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-grouping-status" '.$checked.' data-id="'.$res->quotation_grouping_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnGroupingDriver = '<button type="button" class="btn btn-success btn-md btn-grouping-driver" data-id="'.$res->quotation_grouping_id.'" data-quotation-id="'.$res->quotation_id.'">Add Driver</button>';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            $str.=' '.$btnGroupingDriver;
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
            $input_all['quotation_grouping_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            QuotationGrouping::where('quotation_grouping_id', $id)->update($input_all);
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

    public function QuotationGroupingDriverInsert(Request $request)
    {
        $input_all = $request->all();
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $quotation_grouping_driver_id = [];
                foreach($input_all['quotation_grouping_driver'] as $val){
                    if(isset($val['price_structure_id']) && $val['price_structure_id']){
                        $QuotationGroupingDriver = QuotationGroupingDriver::where([
                            'quotation_grouping_id' => $input_all['quotation_grouping_id'],
                            'quotation_id' => $input_all['quotation_id'],
                            'price_structure_id' => $val['price_structure_id'],
                        ])->first();
                        if(!$QuotationGroupingDriver){
                            $QuotationGroupingDriver = new QuotationGroupingDriver;
                        }
                        $QuotationGroupingDriver->quotation_grouping_id = $input_all['quotation_grouping_id'];
                        $QuotationGroupingDriver->quotation_id = $input_all['quotation_id'];
                        $QuotationGroupingDriver->price_structure_id = $val['price_structure_id'];
                        $QuotationGroupingDriver->quotation_grouping_driver_num = $val['quotation_grouping_driver_num'];
                        $QuotationGroupingDriver->save();
                        $quotation_grouping_driver_id[] = $QuotationGroupingDriver->quotation_grouping_driver_id;
                    }
                }
                QuotationGroupingDriver::where([
                    'quotation_grouping_id' => $input_all['quotation_grouping_id'],
                    'quotation_id' => $input_all['quotation_id'],
                ])
                ->whereNotIn('quotation_grouping_driver_id', $quotation_grouping_driver_id)
                ->delete();

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
            if(isset($failedRules['quotation_grouping_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name Prefix is required";
            }
        }
        $return['title'] = 'Insert';
        return $return;
    }
}
