<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\CustomerType;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'CustomerType')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if (Helper::CheckPermissionMenu('CustomerType', '1')) {
            return view('admin.CustomerType.customer_type', $data);
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
            'customer_type_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $CustomerType = new CustomerType;
                foreach ($input_all as $key => $val) {
                    $CustomerType->{$key} = $val;
                }
                if (!isset($input_all['customer_type_status'])) {
                    $CustomerType->customer_type_status = 0;
                }
                $CustomerType->save();
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
            if (isset($failedRules['customer_type_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Customer Type is required";
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
        $content = CustomerType::where('customer_type_id', $id)->first();
        $return['status'] = 1;
        $return['title'] = 'Get Customer Type';
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
            'customer_type_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $CustomerType = CustomerType::find($id);
                foreach ($input_all as $key => $val) {
                    $CustomerType->{$key} = $val;
                }
                if (!isset($input_all['customer_type_status'])) {
                    $CustomerType->customer_type_status = 0;
                }
                $CustomerType->save();
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
            if (isset($failedRules['customer_type_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Customer Type is required";
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
        $result = CustomerType::select();
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->customer_type_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->customer_type_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('type_customer_status', function ($res) {
                $status_customer = '';
                if ($res->customer_type_status_customer == 1) {
                    $status_customer = 'ลูกค้าทั่วไป';
                } 
                else if ($res->customer_type_status_customer == 2) {
                    $status_customer = 'ลูกค้า vip ต้องการให้ดูแลเป็นพิเศษ';
                } 
                else if ($res->customer_type_status_customer == 98) {
                    $status_customer = 'ลูกค้าควรเฝ้าระวัง';
                } 
                else if ($res->customer_type_status_customer == 99) {
                    $status_customer = 'ลูกค้า blacklist';
                } 
                return $status_customer;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('CustomerType', '1');
                $insert = Helper::CheckPermissionMenu('CustomerType', '2');
                $update = Helper::CheckPermissionMenu('CustomerType', '3');
                $delete = Helper::CheckPermissionMenu('CustomerType', '4');

                if ($res->customer_type_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->customer_type_id . '" data-style="ios" data-on="On" data-off="Off">';
               $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->customer_type_id . '">View</a>';
                }
                if ($update) {
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->customer_type_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox','type_customer_status','action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['customer_type_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            CustomerType::where('customer_type_id', $id)->update($input_all);
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
