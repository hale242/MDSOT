<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Validator;
use App\Helper;
use App\DriverBankAccount;
use App\MenuSystem;
use App\Driver;
use App\BankType;

class BookBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'BookBank')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Drivers'] = Driver::whereIn('driver_status', ['1', '2', '3'])->get();
        $data['BankTypes'] = BankType::where('driver_bank_type_status', 1)->get();
        $data['Page'] = 'D';


        if (Helper::CheckPermissionMenu('BookBank', '1')) {
            return view('admin.BookBank.book_bank', $data);
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
            'driver_bank_type_id' => 'required',
            'driver_bank_account_file_part' => 'required'
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverBankAccount = new DriverBankAccount;
                foreach ($input_all as $key => $val) {
                    $DriverBankAccount->{$key} = $val;
                }
                if (isset($DriverBankAccount->driver_bank_account_file_part) && $DriverBankAccount->driver_bank_account_file_part) {
                    $DriverBankAccount->driver_bank_account_file_part = 'uploads/' . $DriverBankAccount->driver_bank_account_file_part;
                    $DriverBankAccount->driver_bank_account_file_name = str_replace("uploads/BookBankFile/", "", $DriverBankAccount->driver_bank_account_file_part);
                }
                if (!isset($input_all['driver_bank_account_status'])) {
                    $DriverBankAccount->driver_contract_file_status = 0;
                }

                $DriverBankAccount->save();

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
            if (isset($failedRules['contact_info_name']['required'])) {
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
        $content = DriverBankAccount::with('Driver')
            ->leftjoin('driver_bank_type', 'driver_bank_type.driver_bank_type_id', 'driver_bank_account.driver_bank_type_id')
            ->find($id);
        $return['status'] = 1;
        $return['title'] = 'Get Pickup Equipment';
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
            'driver_id' => 'required',
            'driver_bank_type_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $DriverBankAccount = DriverBankAccount::find($id);
                foreach ($input_all as $key => $val) {
                    $DriverBankAccount->{$key} = $val;
                }
                if (isset($DriverBankAccount->driver_bank_account_file_part) && $DriverBankAccount->driver_bank_account_file_part) {
                    $DriverBankAccount->driver_bank_account_file_part = 'uploads/' . $DriverBankAccount->driver_bank_account_file_part;
                    $DriverBankAccount->driver_bank_account_file_name = str_replace("uploads/BookBankFile/", "", $DriverBankAccount->driver_bank_account_file_part);
                }
                if (!isset($input_all['driver_bank_account_status'])) {
                    $DriverBankAccount->driver_contract_file_status = 0;
                }

                $DriverBankAccount->save();

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
            if (isset($failedRules['contact_info_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name Prefix is required";
            }
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
    public function lists(Request  $request)
    {
        $result = DriverBankAccount::select(
            'driver_bank_account.driver_id',
            'driver_bank_account.driver_bank_account_name',
            'driver_bank_account.driver_bank_account_code',
            'driver_bank_account.driver_bank_account_id',
            'driver_bank_account.driver_bank_type_id',
            'driver_bank_account.driver_bank_account_branch',
            'driver_bank_account.driver_bank_account_details',
            'driver_bank_account.driver_bank_account_status',
            'driver_bank_account.driver_bank_account_file_name',
            'driver_bank_account.driver_bank_account_file_part',
            'driver_bank_type.driver_bank_type_name'
        )
            ->leftjoin('driver_bank_type', 'driver_bank_type.driver_bank_type_id', 'driver_bank_account.driver_bank_type_id')
            ->with('Driver');

        $driver_id = $request->input('driver_id');
        $driver_bank_type_id = $request->input('driver_bank_type_id');
        $driver_bank_account_code = $request->input('driver_bank_account_code');
        $driver_bank_account_name = $request->input('driver_bank_account_name');
        $driver_bank_account_branch = $request->input('driver_bank_account_branch');

        $page = $request->input('page');

        if ($driver_id) {
            $result->where('driver_id', $driver_id);
        }
        if ($driver_bank_type_id) {
            $result->where('driver_bank_account.driver_bank_type_id', $driver_bank_type_id);
        }
        if ($driver_bank_account_code) {
            $result->where('driver_bank_account_code', 'like', '%' . $driver_bank_account_code . '%');
        }
        if ($driver_bank_account_name) {
            $result->where('driver_bank_account_name', 'like', '%' . $driver_bank_account_name . '%');
        }
        if ($driver_bank_account_branch) {
            $result->where('driver_bank_account_branch', 'like', '%' . $driver_bank_account_branch . '%');
        }


        return Datatables::of($result)
            ->addColumn('file', function ($res) {
                $file = '';
                if ($res->driver_bank_account_file_part) {
                    $file = '<a href="' . url($res->driver_bank_account_file_part) . '" target="_blank">' . $res->driver_bank_account_file_name . '</a>';
                }
                return $file;
            })
            ->addColumn('driver_name', function ($res) {
                return $res->driver->driver_name_th . ' ' . $res->driver->driver_lastname_th;
            })
            ->addColumn('action', function ($res) use ($page) {
                $view = Helper::CheckPermissionMenu('BookBank', '1');
                $insert = Helper::CheckPermissionMenu('BookBank', '2');
                $update = Helper::CheckPermissionMenu('BookBank', '3');
                $delete = Helper::CheckPermissionMenu('BookBank', '4');

                if ($res->driver_bank_account_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $str = '';
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-account-file" ' . $checked . ' data-id="' . $res->driver_bank_account_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->driver_bank_account_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->driver_bank_account_id . '">Edit</button>';

                // $str .= ' ' . $btnStatus;
                // if ($view && $page) {
                //     $str .= ' ' . $btnView;
                // }
                // if ($update && $page) {
                //     $str .= ' ' . $btnEdit;
                // }

                // return $str;

                if ($page) {
                    $str = '<div class="bootstrap-table">';
                    $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                    $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                    $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                    if ($view) {
                        $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->driver_bank_account_id . '">View</a>';
                    }
                    if ($update) {
                        $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->driver_bank_account_id . '">Edit</a>';
                    }
                    $str .= '</div>';
                    $str .= '</div>';
                }
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'file', 'action', 'driver_name'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['driver_bank_account_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            DriverBankAccount::where('driver_bank_account_id', $id)->update($input_all);
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
