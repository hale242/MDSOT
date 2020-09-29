<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\DriverFile;
use App\Driver;
use App\TypeDocumentDriver;

class DriverFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'DriverFile')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['TypeDocumentDrivers'] = TypeDocumentDriver::where('type_doc_driver_status', '1')->get();
        $data['Drivers'] = Driver::where('driver_status', ['1', '2', '3'])->get();

        $data['Page'] = 'D';

        if (Helper::CheckPermissionMenu('DriverFile', '1')) {
            return view('admin.DriverFile.driver_file', $data);
        } else {
            return redirect('admin/');
        }
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
            'driver_id' => 'required',
            'type_doc_driver_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverFile = new DriverFile;
                foreach ($input_all as $key => $val) {
                    $DriverFile->{$key} = $val;
                }
                if (!isset($input_all['driver_file_status'])) {
                    $DriverFile->driver_file_status = 0;
                }
                if (isset($DriverFile->driver_file_name) && $DriverFile->driver_file_name) {
                    $DriverFile->driver_file_part = 'uploads/' . $DriverFile->driver_file_name;
                    $DriverFile->driver_file_name = str_replace("DriverFile/", "", $DriverFile->driver_file_name);
                }
                $DriverFile->save();
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
        $content = DriverFile::with(['TypeDocumentDriver'])->find($id);
        $content['format_driver_file_date'] = $content->driver_file_date ? date("Y-m-d", strtotime($content->driver_file_date)) : '';

        $return['status'] = 1;
        $return['title'] = 'Get DriverFile';
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
            'type_doc_driver_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverFile = DriverFile::find($id);
                foreach ($input_all as $key => $val) {
                    $DriverFile->{$key} = $val;
                }
                if (!isset($input_all['driver_file_status'])) {
                    $DriverFile->driver_file_status = 0;
                }
                if (isset($DriverFile->driver_file_name) && $DriverFile->driver_file_name) {
                    $DriverFile->driver_file_part = 'uploads/' . $DriverFile->driver_file_name;
                    $DriverFile->driver_file_name = str_replace("DriverFile/", "", $DriverFile->driver_file_name);
                }
                $DriverFile->save();
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
        $result = DriverFile::select(
            'driver_file.*',
            'type_doc_driver.type_doc_driver_name',
            'driver.driver_name_th',
            'driver.driver_lastname_th'
        )
        ->leftjoin('type_doc_driver', 'type_doc_driver.type_doc_driver_id', 'driver_file.type_doc_driver_id')
        ->leftjoin('driver', 'driver.driver_id', 'driver_file.driver_id')
        ->whereIn('driver.driver_status',['1','2','3']);

        $page = $request->input('page');
        $driver_id = $request->input('driver_id');
        $type_doc_driver_id = $request->input('type_doc_driver_id');
        $driver_file_date = $request->input('driver_file_date');
        $driver_file_end = $request->input('driver_file_end');

        // if ($page) {
        //     $result->whereNotNull('driver_file_name');
        // }
        if ($driver_id) {
            $result->where('driver_file.driver_id', $driver_id);
        }
        if ($type_doc_driver_id) {
            $result->where('driver_file.type_doc_driver_id', $type_doc_driver_id);
        }

        if($driver_file_date && $driver_file_end){
            $result->whereBetween('driver_file.driver_file_date', [$driver_file_date, $driver_file_end]);
        }elseif($driver_file_date && !$driver_file_end){
            $result->where('driver_file.driver_file_date', '>=', $driver_file_date);
        }elseif(!$driver_file_date && $driver_file_end){
            $result->where('driver_file.driver_file_date', '<=', $driver_file_end);
        }


        return Datatables::of($result)
            ->editColumn('driver_file_date', function ($res) {
                return $res->driver_file_date ? date("d/m/Y", strtotime($res->driver_file_date)) : '';
            })
            ->editColumn('driver_file_name', function ($res) {
                $file = '';
                if ($res->driver_file_part) {
                    $file = '<a href="' . url($res->driver_file_part) . '" target="_blank">' . $res->driver_file_name . '</a>';
                }
                return $file;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('DriverFile', '1');
                $insert = Helper::CheckPermissionMenu('DriverFile', '2');
                $update = Helper::CheckPermissionMenu('DriverFile', '3');
                $delete = Helper::CheckPermissionMenu('DriverFile', '4');
                $checked = '';
                $disabled = '';
                if ($res->driver_file_status == 1) {
                    $checked = 'checked';
                }
                if (!$res->driver_file_name) {
                    $disabled = 'disabled';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-driver-file" ' . $checked . ' ' . $disabled . ' data-id="' . $res->driver_file_id . '" data-style="ios" data-on="On" data-off="Off">';
                $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit-driver-file" data-id="' . $res->driver_file_id . '">Edit</button>';
                $str = '';
                if ($view) {
                    $str .= ' ' . $btnStatus;
                }
                if ($update && !$res->driver_file_name) {
                    $str .= ' ' . $btnEdit;
                }
                return $str;
            })
            ->addColumn('driver_name', function ($res) {
                return $res->driver_name_th . ' ' . $res->driver_lastname_th;
            })
            ->addColumn('action2', function ($res) {
                $view = Helper::CheckPermissionMenu('DriverFile', '1');
                $insert = Helper::CheckPermissionMenu('DriverFile', '2');
                $update = Helper::CheckPermissionMenu('DriverFile', '3');
                $delete = Helper::CheckPermissionMenu('DriverFile', '4');
                if ($res->driver_file_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-driver-file" ' . $checked . ' data-id="' . $res->driver_file_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->driver_file_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->driver_file_id . '">Edit</button>';
                // $str = '';
                // if ($update) {
                //     $str .= ' ' . $btnStatus;
                // }
                // if ($view) {
                //     $str .= ' ' . $btnView;
                // }
                // if ($update) {
                //     $str .= ' ' . $btnEdit;
                // }
                // return $str;
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_file_id . '">View</a>';
                }
                if ($update) {
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->driver_file_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'action2', 'driver_file_name', 'driver_name'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $DriverFile = DriverFile::find($id);
            $DriverFile->driver_file_status = $request->input('status');
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
