<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverResignFile;

class DriverResignFileController extends Controller
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
            'driver_resign_file_file_name' => 'required',
            'driver_resign_file_file_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverResignFile = new DriverResignFile;
                foreach ($input_all as $key => $val) {
                    $DriverResignFile->{$key} = $val;
                }
                if (!isset($input_all['driver_resign_file_status'])) {
                    $DriverResignFile->driver_resign_file_status = 0;
                }
                if (isset($DriverResignFile->driver_resign_file_file_name) && $DriverResignFile->driver_resign_file_file_name) {
                    $DriverResignFile->driver_resign_file_file_part = 'uploads/' . $DriverResignFile->driver_resign_file_file_name;
                    $DriverResignFile->driver_resign_file_file_name = str_replace("DriverResignFile/", "", $DriverResignFile->driver_resign_file_file_name);
                }
                $DriverResignFile->save();
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
            if(isset($failedRules['driver_resign_file_file_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name is required";
            }
            if(isset($failedRules['driver_resign_file_file_name']['required'])) {
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
        $content = DriverResignFile::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get DriverResignFile';
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
        $result = DriverResignFile::select();
        $driver_resign_id = $request->input('driver_resign_id');
        if($driver_resign_id){
            $result->where('driver_resign_id', $driver_resign_id);
        }
        return Datatables::of($result)
            ->editColumn('driver_resign_file_file_name', function ($res) {
                $file = '';
                if ($res->driver_resign_file_file_name) {
                    $file = '<a href="' . url($res->driver_resign_file_file_part) . '" target="_blank">' . $res->driver_resign_file_file_name . '</a>';
                }
                return $file;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('DriverResign', '1');
                $insert = Helper::CheckPermissionMenu('DriverResign', '2');
                $update = Helper::CheckPermissionMenu('DriverResign', '3');
                $delete = Helper::CheckPermissionMenu('DriverResign', '4');
                if ($res->driver_resign_file_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-driver-file" ' . $checked . ' data-id="' . $res->driver_resign_file_id . '" data-style="ios" data-on="On" data-off="Off">';
                $str = '';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'driver_resign_file_file_name'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $DriverResignFile = DriverResignFile::find($id);
            $DriverResignFile->driver_resign_file_status = $request->input('status');
            $DriverResignFile->save();
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
