<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
use App\Helper;
use App\MenuSystem;
use App\DriverResign;
use App\Driver;
use App\ResignType;

class DriverResignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'DriverResign')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Drivers'] = Driver::where('driver_status', ['1','2','3'])->get();
        $data['ResignTypes'] = ResignType::where('resign_type_status', 1)->get();
        if (Helper::CheckPermissionMenu('DriverResign', '1')) {
            return view('admin.DriverResign.driver_resign', $data);
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
            'resign_type_id' => 'required',
            'driver_resign_doc_code' => 'required',
            'driver_resign_date_start' => 'required',
            'driver_resign_date_last' => 'required',
            'driver_resign_date_resign' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                $DriverResign = new DriverResign;
                foreach ($input_all as $key => $val) {
                    $DriverResign->{$key} = $val;
                }
                $DriverResign->driver_resign_status = 1; //อนุมัติลาออก/
                $DriverResign->admin_id = $admin->admin_id;
                $DriverResign->save();
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
            if (isset($failedRules['driver_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Driver is required";
            }
            if (isset($failedRules['resign_type_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Resign type is required";
            }
            if (isset($failedRules['driver_resign_doc_code']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Document code is required";
            }
            if (isset($failedRules['driver_resign_date_start']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Starting date is required";
            }
            if (isset($failedRules['driver_resign_date_last']['required'])) {
                $return['status'] = 2;
                $return['title'] = "End date is required";
            }
            if (isset($failedRules['driver_resign_date_resign']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Date of resigning is required";
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
        $content = DriverResign::with(['Driver', 'ResignType'])->find($id);
        $content['format_driver_resign_date_resign'] = $content->driver_resign_date_resign ? date("d/m/Y", strtotime($content->driver_resign_date_resign)) : '';
        $content['format_driver_resign_date_start'] = $content->driver_resign_date_start ? date("d/m/Y", strtotime($content->driver_resign_date_start)) : '';
        $content['format_driver_resign_date_last'] = $content->driver_resign_date_last ? date("d/m/Y", strtotime($content->driver_resign_date_last)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get DriverResign';
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
                $DriverResign = DriverResign::find($id);
                foreach ($input_all as $key => $val) {
                    $DriverResign->{$key} = $val;
                }
                if (!isset($input_all['driver_resign_status'])) {
                    $DriverResign->driver_resign_status = 0;
                }
                if (isset($DriverResign->driver_resign_name) && $DriverResign->driver_resign_name) {
                    $DriverResign->driver_resign_part = 'uploads/' . $DriverResign->driver_resign_name;
                    $DriverResign->driver_resign_name = str_replace("DriverResign/", "", $DriverResign->driver_resign_name);
                }
                $DriverResign->save();
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
        $result = DriverResign::select(
            'driver_resign.*'
            ,'driver.driver_code'
            ,'driver.driver_name_th'
            ,'driver.driver_lastname_th'
            ,'resign_type.resign_type_name'
            ,'admin_user.first_name'
            ,'admin_user.last_name'
        )
        ->leftjoin('driver', 'driver.driver_id', 'driver_resign.driver_id')
        ->leftjoin('resign_type', 'resign_type.resign_type_id', 'driver_resign.resign_type_id')
        ->leftjoin('admin_user', 'admin_user.admin_id', 'driver_resign.admin_id');

        $driver_id = $request->input('driver_id');
        $resign_type_id = $request->input('resign_type_id');
        $driver_resign_doc_code = $request->input('driver_resign_doc_code');
        $driver_resign_date_start = $request->input('driver_resign_date_start');
        $driver_resign_date_last = $request->input('driver_resign_date_last');
        $driver_resign_date_resign = $request->input('driver_resign_date_resign');

        if($driver_id){
            $result->where('driver_resign.driver_id', $driver_id);
        }
        if($resign_type_id){
            $result->where('driver_resign.resign_type_id', $resign_type_id);
        }
        if($driver_resign_doc_code){
            $result->where('driver_resign.driver_resign_doc_code', 'like', '%'.$driver_resign_doc_code.'%');
        }
        if($driver_resign_date_start && $driver_resign_date_last){
            $result->whereBetween('driver_resign.driver_resign_date_start', [$driver_resign_date_start.' 00:00:00', $driver_resign_date_start.' 23:59:59']);
            $result->whereBetween('driver_resign.driver_resign_date_last', [$driver_resign_date_last.' 00:00:00', $driver_resign_date_last.' 23:59:59']);
        }elseif($driver_resign_date_start && !$driver_resign_date_last){
            $result->whereBetween('driver_resign.driver_resign_date_start', [$driver_resign_date_start.' 00:00:00', $driver_resign_date_start.' 23:59:59']);
        }elseif(!$driver_resign_date_start && $driver_resign_date_last){
            $result->whereBetween('driver_resign.driver_resign_date_last', [$driver_resign_date_last.' 00:00:00', $driver_resign_date_last.' 23:59:59']);
        }
        if($driver_resign_date_resign){
            $result->whereBetween('driver_resign.driver_resign_date_resign', [$driver_resign_date_resign.' 00:00:00', $driver_resign_date_resign.' 23:59:59']);
        }
        return Datatables::of($result)
            ->editColumn('driver_resign_date_start', function ($res) {
                return $res->driver_resign_date_start ? date("d/m/Y", strtotime($res->driver_resign_date_start)) : '';
            })
            ->editColumn('driver_resign_date_last', function ($res) {
                return $res->driver_resign_date_last ? date("d/m/Y", strtotime($res->driver_resign_date_last)) : '';
            })
            ->editColumn('driver_resign_date_resign', function ($res) {
                return $res->driver_resign_date_resign ? date("d/m/Y", strtotime($res->driver_resign_date_resign)) : '';
            })
            ->addColumn('driver_name', function ($res) {
                return $res->driver_name_th . ' ' . $res->driver_lastname_th;
            })
            ->addColumn('admin_name', function ($res) {
                return $res->first_name . ' ' . $res->last_name;
            })
            ->addColumn('status', function ($res) {
                return ($res->driver_resign_status || $res->driver_resign_status == '0') ? $res->Status[$res->driver_resign_status] : '';
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('DriverResign', '1');
                $insert = Helper::CheckPermissionMenu('DriverResign', '2');
                $update = Helper::CheckPermissionMenu('DriverResign', '3');
                $delete = Helper::CheckPermissionMenu('DriverResign', '4');
                if ($res->driver_resign_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->driver_resign_id . '">View</button>';
                // $btnFile = '<button type="button" class="btn btn-primary btn-md btn-file" data-id="' . $res->driver_resign_id . '">File</button>';
                // $str = '';
                // $str .= ' ' . $btnFile;
                // if ($view) {
                //     $str .= ' ' . $btnView;
                // }
                // return $str;
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_resign_id . '">View</a>';
                }
                $str .= '<a class="dropdown-item btn-file" href="javascript:void(0)" data-toggle="modal" data-target="#FileModal" data-id="' . $res->driver_resign_id . '">File</a>';
               
                $str .= '</div>';
                $str .= '</div>';

                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $DriverResign = DriverResign::find($id);
            $DriverResign->driver_resign_status = $request->input('status');
            $DriverResign->save();
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
