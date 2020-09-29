<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\TypeDocumentDriver;

class TypeDocumentDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'TypeDocumentDriver')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if (Helper::CheckPermissionMenu('TypeDocumentDriver', '1')) {
            return view('admin.TypeDocumentDriver.type_doc_driver', $data);
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
            'type_doc_driver_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $TypeDocumentDriver = new TypeDocumentDriver;
                foreach ($input_all as $key => $val) {
                    $TypeDocumentDriver->{$key} = $val;
                }
                if (!isset($input_all['type_doc_driver_status'])) {
                    $TypeDocumentDriver->type_doc_driver_status = 0;
                }
                $TypeDocumentDriver->save();
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
            if (isset($failedRules['type_doc_driver_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Type Document Driver is required";
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
        $content = TypeDocumentDriver::where('type_doc_driver_id', $id)->first();
        $return['status'] = 1;
        $return['title'] = 'Get TypeDocumentDriver';
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
            'type_doc_driver_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $TypeDocumentDriver = TypeDocumentDriver::find($id);
                foreach ($input_all as $key => $val) {
                    $TypeDocumentDriver->{$key} = $val;
                }
                if (!isset($input_all['type_doc_driver_status'])) {
                    $TypeDocumentDriver->type_doc_driver_status = 0;
                }
                $TypeDocumentDriver->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Sucess';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['type_doc_driver_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Type Document Driver is required";
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

    public function lists(Request  $request)
    {
        $result = TypeDocumentDriver::latest()->get();
        //   $result = TypeDocumentDriver::select();
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->type_doc_driver_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->type_doc_driver_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('TypeDocumentDriver', '1');
                $insert = Helper::CheckPermissionMenu('TypeDocumentDriver', '2');
                $update = Helper::CheckPermissionMenu('TypeDocumentDriver', '3');
                $delete = Helper::CheckPermissionMenu('TypeDocumentDriver', '4');
                if ($res->type_doc_driver_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->type_doc_driver_id . '" data-style="ios" data-on="On" data-off="Off">';
               $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->type_doc_driver_id . '">View</a>';
                }
                if ($update) {
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->type_doc_driver_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
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
            $input_all['type_doc_driver_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            TypeDocumentDriver::where('type_doc_driver_id', $id)->update($input_all);
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
