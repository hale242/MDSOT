<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Contact;

class ContactController extends Controller
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
            'customer_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Contact = new Contact;
                foreach($input_all as $key=>$val){
                    $Contact->{$key} = $val;
                }
                if(!isset($input_all['contact_info_status'])){
                    $Contact->contact_info_status = 0;
                }
                $Contact->save();
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
            if(isset($failedRules['contact_info_name']['required'])) {
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
        $content = Contact::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get Contact';
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
      $result = Contact::select();
      $customer_id = $request->input('customer_id');
      if($customer_id){
          $result->where('customer_id', $customer_id);
      };
      return Datatables::of($result)
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('ContactInfo' , '1');
            $insert = Helper::CheckPermissionMenu('ContactInfo' , '2');
            $update = Helper::CheckPermissionMenu('ContactInfo' , '3');
            $delete = Helper::CheckPermissionMenu('ContactInfo' , '4');
            if($res->contact_info_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-contact" '.$checked.' data-id="'.$res->contact_info_id.'" data-style="ios" data-on="On" data-off="Off">';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox', 'action'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $Contact = Contact::find($id);
            $Contact->contact_info_status = $request->input('status');
            $Contact->save();
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
