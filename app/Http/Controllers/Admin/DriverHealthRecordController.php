<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverHealthRecord;

class DriverHealthRecordController extends Controller
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
            'driver_health_type_id' => 'required',
            'driver_health_record_file' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverHealthRecord = new DriverHealthRecord;
                foreach($input_all as $key=>$val){
                    $DriverHealthRecord->{$key} = $val;
                }
                if(!isset($input_all['driver_health_record_status'])){
                    $DriverHealthRecord->driver_health_record_status = 0;
                }
                if(isset($DriverHealthRecord->driver_health_record_file) && $DriverHealthRecord->driver_health_record_file){
                    $DriverHealthRecord->driver_health_record_file_part = 'uploads/'.$DriverHealthRecord->driver_health_record_file;
                    $DriverHealthRecord->driver_health_record_file = str_replace("DriverHealthRecord/","",$DriverHealthRecord->driver_health_record_file);
                }
                $DriverHealthRecord->save();
                \DB::commit();
                $return['driver_interview_id'] = $input_all['driver_interview_id'];
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
        $content = DriverHealthRecord::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get DriverHealthRecord';
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
      $result = DriverHealthRecord::select(
          'driver_health_record.*'
          ,'driver_health_type.driver_health_type_name'
      )
      ->leftjoin('driver_health_type', 'driver_health_type.driver_health_type_id', 'driver_health_record.driver_health_type_id');
      $driver_interview_id = $request->input('driver_interview_id');
      if($driver_interview_id){
          $result->where('driver_interview_id', $driver_interview_id);
      }
      return Datatables::of($result)
        ->editColumn('driver_health_record_date_doc', function($res){
            return $res->driver_health_record_date_doc ? date("d/m/Y", strtotime($res->driver_health_record_date_doc)) : '';
        })
        ->editColumn('driver_health_record_file', function($res){
            $file = '';
            if($res->driver_health_record_file_part){
                $file = '<a href="'.url($res->driver_health_record_file_part).'" target="_blank">'.$res->driver_health_record_file.'</a>';
            }
            return $file;
        })
        ->editColumn('status', function($res){
            if($res->driver_health_record_status == 1){
                $str = 'Pass';
            }else{
                $str = 'Not pass';
            }
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['status', 'driver_health_record_file'])
        ->make(true);
    }
}
