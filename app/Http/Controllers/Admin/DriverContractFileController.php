<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use PDF;
use File;
use Storage;
use Auth;
use App\MenuSystem;
use App\Helper;
use App\Driver;
use App\DriverContractFile;

class DriverContractFileController  extends Controller
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
            'driver_id' => 'required',
            'driver_contract_file_type' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverContractFile = new DriverContractFile;
                $Driver = Driver::find($input_all['driver_id']);
                foreach ($input_all as $key => $val) {
                    $DriverContractFile->{$key} = $val;
                }
                if (isset($DriverContractFile->driver_contract_file_filename) && $DriverContractFile->driver_contract_file_filename) {
                    $DriverContractFile->driver_contract_fil_filepart = 'uploads/' . $DriverContractFile->driver_contract_file_filename;
                    $DriverContractFile->driver_contract_file_filename = str_replace("ContractFile/", "", $DriverContractFile->driver_contract_file_filename);
                }
                if ($input_all['driver_contract_file_status'] == 1) {
                    $DriverContractFile->driver_contract_file_status = 1;
                    DriverContractFile::where('driver_id', $input_all['driver_id'])
                        ->where('driver_contract_file_status', 1)
                        ->update(['driver_contract_file_status' => 0]);
                } else{
                    $DriverContractFile->driver_contract_file_status = 0;
                }

                if ($input_all['driver_salary']) {
                    $DriverContractFile->driver_salary = str_replace(',', '', $input_all['driver_salary']);
                    $Driver->driver_salary = str_replace(',', '', $input_all['driver_salary']);
                }
                if ($DriverContractFile->driver_contract_file_type == 1) {
                    $DriverContractFile->driver_contract_file_name = 'พนักงานประจำ';
                } elseif ($DriverContractFile->driver_contract_file_type == 2) {
                    $DriverContractFile->driver_contract_file_name = 'พนักงานสัญญาจ้างรายปี';
                } elseif ($DriverContractFile->driver_contract_file_type == 3) {
                    $DriverContractFile->driver_contract_file_name = 'พนักงานสัญญาจ้างรายวัน';
                }
                $DriverContractFile->save();
                $Driver->save();

                $Driver = Driver::find($DriverContractFile->driver_id);
                $Driver->driver_status_contract = $DriverContractFile->driver_contract_file_type;
                $Driver->save();
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
        $content = DriverContractFile::find($id);

        $return['status'] = 1;
        $return['title'] = 'Get DriverContractFile';
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
        $result = DriverContractFile::select(
            'driver_contract_file.*'
        );
        $driver_id = $request->input('driver_id');
        if ($driver_id) {
            $result->where('driver_id', $driver_id);
        }
        return Datatables::of($result)
            ->editColumn('driver_contract_file_filename', function ($res) {
                $file = '';
                if ($res->driver_contract_fil_filepart) {
                    $file = '<a href="' . url($res->driver_contract_fil_filepart) . '" target="_blank">' . $res->driver_contract_file_filename . '</a>';
                }
                return $file;
            })
            ->editColumn('driver_salary', function ($res) {
                return number_format($res->driver_salary, 2);
            })
            ->editColumn('driver_contract_file_filedate', function ($res) {
                return $res->driver_contract_file_filedate ? date("d/m/Y", strtotime($res->driver_contract_file_filedate)) : '';
            })
            ->editColumn('driver_contract_file_date_end', function ($res) {
                return $res->driver_contract_file_date_end ? date("d/m/Y", strtotime($res->driver_contract_file_date_end)) : '';
            })

            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('SignContract', '1');
                $insert = Helper::CheckPermissionMenu('SignContract', '2');
                $update = Helper::CheckPermissionMenu('SignContract', '3');
                $delete = Helper::CheckPermissionMenu('SignContract', '4');
                $checked = '';
                // if($res->driver_contract_file_status == 1){
                //     $checked = 'checked';
                // }else{
                //     $checked = '';
                // }
                if ($res->driver_contract_file_status == 1) {
                    $checked = 'checked';
                    $disabled = 'disabled';
                } else {
                    $checked = '';
                    $disabled = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-contract-file" ' . $checked . ' data-id="' . $res->driver_contract_file_id . '" data-style="ios" data-on="On" data-off="Off" ' . $disabled . '>';
                $str = '';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['action','driver_salary','driver_contract_file_filename'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {

            $DriverFile = DriverContractFile::find($id);
            Driver::where('driver_id',$DriverFile->driver_id)
                ->update(['driver_salary' => $DriverFile->driver_salary]);

            DriverContractFile::where('driver_id', $DriverFile->driver_id)
                ->where('driver_contract_file_status', 1)
                ->update(['driver_contract_file_status' => 0]);

            $DriverFile->driver_contract_file_status = $request->input('status');

            $DriverFile->save();
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
