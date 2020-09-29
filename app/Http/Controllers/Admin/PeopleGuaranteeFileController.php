<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\PeopleGuaranteeFile;

class PeopleGuaranteeFileController extends Controller
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
            'type_doc_driver_id' => 'required',
            'people_guarantee_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PeopleGuaranteeFile = new PeopleGuaranteeFile;
                foreach($input_all as $key=>$val){
                    $PeopleGuaranteeFile->{$key} = $val;
                }
                if(!isset($input_all['people_guarantee_file_status'])){
                    $PeopleGuarantee->people_guarantee_file_status = 0;
                }
                if(isset($PeopleGuaranteeFile->people_guarantee_file_name) && $PeopleGuaranteeFile->people_guarantee_file_name){
                    $PeopleGuaranteeFile->people_guarantee_file_part = 'uploads/'.$PeopleGuaranteeFile->people_guarantee_file_name;
                    $PeopleGuaranteeFile->people_guarantee_file_name = str_replace("PeopleGuaranteeFile/","",$PeopleGuaranteeFile->people_guarantee_file_name);
                }
                $PeopleGuaranteeFile->save();
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
        $content = PeopleGuaranteeFile::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get PeopleGuaranteeFile';
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

    public function lists(Request $request)
    {
      $result = PeopleGuaranteeFile::select(
            'people_guarantee_file.*'
            ,'people_guarantee.people_guarantee_name'
            ,'type_doc_driver.type_doc_driver_name'
        )
        ->leftjoin('people_guarantee', 'people_guarantee.people_guarantee_id', 'people_guarantee_file.people_guarantee_id')
        ->leftjoin('type_doc_driver', 'type_doc_driver.type_doc_driver_id', 'people_guarantee_file.type_doc_driver_id');
      $people_guarantee_id = $request->input('people_guarantee_id');
      if($people_guarantee_id){
          $result->where('people_guarantee_file.people_guarantee_id', $people_guarantee_id);
      }
      return Datatables::of($result)
        ->editColumn('people_guarantee_file_date' , function($res){
            return $res->people_guarantee_file_date ? date("d/m/Y", strtotime($res->people_guarantee_file_date)) : '';
        })
        ->editColumn('people_guarantee_file_name' , function($res){
            return '<a href="'.url($res->people_guarantee_file_part).'" target="_blank">'.$res->people_guarantee_file_name.'</a>';
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('JobRegister' , '1');
            $insert = Helper::CheckPermissionMenu('JobRegister' , '2');
            $update = Helper::CheckPermissionMenu('JobRegister' , '3');
            $delete = Helper::CheckPermissionMenu('JobRegister' , '4');
            if($res->people_guarantee_file_status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status change-status-guarantee-file" '.$checked.' data-id="'.$res->people_guarantee_file_id.'" data-style="ios" data-on="On" data-off="Off">';
            $str = '';
            $str.=' '.$btnStatus;
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['action', 'people_guarantee_file_name'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $PeopleGuarantee = PeopleGuaranteeFile::find($id);
            $PeopleGuarantee->people_guarantee_file_status = $request->input('status');
            $PeopleGuarantee->save();
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
