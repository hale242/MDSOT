<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\PeopleGuarantee;
use App\Driver;
use App\TypeDocumentDriver;

class PeopleGuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'PeopleGuarantee')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Drivers'] = Driver::whereIn('driver_status', ['1', '2', '3'])->get();
        $data['TypeDocumentDrivers'] = TypeDocumentDriver::where('type_doc_driver_status', 1)->get();

        $data['Page'] = 'D';


        if (Helper::CheckPermissionMenu('PeopleGuarantee', '1')) {
            return view('admin.PeopleGuarantee.people_guarantee', $data);
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
            'people_guarantee_name' => 'required',
            'people_guarantee_phone' => 'required',
            'people_guarantee_relationship' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $PeopleGuarantee = new PeopleGuarantee;
                foreach ($input_all as $key => $val) {
                    $PeopleGuarantee->{$key} = $val;
                }
                if (!isset($input_all['people_guarantee_status'])) {
                    $PeopleGuarantee->people_guarantee_status = 0;
                }
                $PeopleGuarantee->save();
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
        $content = PeopleGuarantee::select(
            'people_guarantee.*',
            'driver.driver_name_th',
            'driver.driver_lastname_th'
        )
            ->leftjoin('driver', 'driver.driver_id', 'people_guarantee.driver_id')
            ->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get PeopleGuarantee';
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
        $result = PeopleGuarantee::select(
            'people_guarantee.*',
            'driver.driver_name_th',
            'driver.driver_lastname_th'
        )
            ->leftjoin('driver', 'driver.driver_id', 'people_guarantee.driver_id');
        $driver_id = $request->input('driver_id');
        $people_guarantee_name = $request->input('people_guarantee_name');
        $people_guarantee_phone = $request->input('people_guarantee_phone');
        $people_guarantee_email = $request->input('people_guarantee_email');
        $people_guarantee_relationship = $request->input('people_guarantee_relationship');
        $page = $request->input('page');

        if ($driver_id) {
            $result->where('people_guarantee.driver_id', $driver_id);
        }
        if ($people_guarantee_name) {
            $result->where('people_guarantee.people_guarantee_name', 'like', '%' . $people_guarantee_name . '%');
        }
        if ($people_guarantee_phone) {
            $result->where('people_guarantee.people_guarantee_phone', 'like', '%' . $people_guarantee_phone . '%');
        }
        if ($people_guarantee_email) {
            $result->where('people_guarantee.people_guarantee_email', 'like', '%' . $people_guarantee_email . '%');
        }
        if ($people_guarantee_relationship) {
            $result->where('people_guarantee.people_guarantee_relationship', 'like', '%' . $people_guarantee_relationship . '%');
        }
        return Datatables::of($result)
            ->addColumn('driver_name', function ($res) {
                return $res->driver_name_th . ' ' . $res->driver_lastname_th;
            })
            ->addColumn('action', function ($res) use ($page) {
                $view = Helper::CheckPermissionMenu('JobRegister', '1');
                $insert = Helper::CheckPermissionMenu('JobRegister', '2');
                $update = Helper::CheckPermissionMenu('JobRegister', '3');
                $delete = Helper::CheckPermissionMenu('JobRegister', '4');
                if ($res->people_guarantee_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $str = '';
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-guarantee" ' . $checked . ' data-id="' . $res->people_guarantee_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $btnAddFile = '<button type="button" class="btn btn-warning btn-md btn-add-file" data-id="' . $res->people_guarantee_id . '" data-driver-name="' . $res->driver_name_th . ' ' . $res->driver_lastname_th . '" data-name="' . $res->people_guarantee_name . '">Add file</button>';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->people_guarantee_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->people_guarantee_id . '">Edit</button>';
                // $str .= ' ' . $btnStatus;
                // if ($view && $page) {
                //     $str .= ' ' . $btnView;
                // }
                // if ($update && $page) {
                //     $str .= ' ' . $btnEdit;
                // }
                // $str .= ' ' . $btnAddFile;
                // return $str;
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-add-file" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->people_guarantee_id . '" data-driver-name="' . $res->driver_name_th . ' ' . $res->driver_lastname_th . '" data-name="' . $res->people_guarantee_name . '">Add file</a>';
                if ($view && $page) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->people_guarantee_id . '">View</a>';
                }
                if ($update && $page) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->people_guarantee_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
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
            $PeopleGuarantee = PeopleGuarantee::find($id);
            $PeopleGuarantee->people_guarantee_status = $request->input('status');
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
