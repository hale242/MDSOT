<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\ContactInfo;
use App\Company;
use App\Provinces;
use App\Amphures;
use App\Districts;
use App\Member;
use App\TypeDocument;
use App\SaleArea;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'ContactInfo')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Company'] = Company::where('company_status', '1')->get();
        $data['Provinces'] = Provinces::where('provinces_status', '1')->get();
        $data['TypeDocument'] = TypeDocument::where('type_doc_customer_status', '1')->get();
        $data['SaleArea'] = SaleArea::where('sale_team_sub_status', '1')->get();
        $data['ContactInfoes'] = ContactInfo::where('customer_status', '1')->get();

        if (Helper::CheckPermissionMenu('ContactInfo', '1')) {
            return view('admin.ContactInfo.contact_info', $data);
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
            'customer_name' => 'required',
            'company_id' => 'required',
            'districts_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $ContactInfo = new ContactInfo;
                foreach ($input_all as $key => $val) {
                    $ContactInfo->{$key} = $val;
                }
                if (!isset($input_all['customer_status'])) {
                    $ContactInfo->customer_status = 0;
                }
                $ContactInfo->save();
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
            if (isset($failedRules['customer_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Contact Info is required";
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
        $content = ContactInfo::with('Districts', 'Company')->find($id);

        $amphures = '';
        $districts = '';

        if ($content->Districts) {
            $amphures = Amphures::where('provinces_id', $content->Districts->provinces_id)->get();
            $districts = Districts::where('amphures_id', $content->Districts->amphures_id)->get();
        }


        $return['status'] = 1;
        $return['title'] = 'Get ContactInfo';
        $return['content'] = $content;
        $return['amphures'] = $amphures;
        $return['districts'] = $districts;
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
            'customer_name' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $ContactInfo = ContactInfo::find($id);
                foreach ($input_all as $key => $val) {
                    $ContactInfo->{$key} = $val;
                }
                if (!isset($input_all['customer_status'])) {
                    $ContactInfo->customer_status = 0;
                }
                $ContactInfo->save();
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
            if (isset($failedRules['customer_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Contact Info is required";
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
        $result = ContactInfo::select(
            'company.company_id',
            'company.sale_team_sub_id',
            'company.company_name_th',
            'customer.customer_id',
            'customer.customer_phone',
            'customer.customer_name',
            'customer.customer_tel',
            'customer.customer_line',
            'customer.customer_fax',
            'customer.customer_email',
            'customer.customer_status',
            'sale_team_sub.sale_team_sub_name',
            'sale_team_main.sale_team_main_name'
        )
            ->leftjoin('company', 'company.company_id', 'customer.company_id')
            ->leftjoin('sale_team_sub', 'sale_team_sub.sale_team_sub_id', 'company.sale_team_sub_id')
            ->leftjoin('sale_team_main', 'sale_team_main.sale_team_main_id', 'sale_team_sub.sale_team_main_id');            // ->with('Company');


        $customer_id = $request->input('customer_id');
        $customer_code = $request->input('customer_code');
        $sale_team_sub_id = $request->input('sale_team_sub_id');
        $customer_name = $request->input('customer_name');
        $customer_phone = $request->input('customer_phone');
        $customer_tel = $request->input('customer_tel');
        $customer_email = $request->input('customer_email');
        $company_id = $request->input('company_id');
        $page = $request->input('page');

        if ($customer_code) {
            $result->where('customer_code', 'like', '%' . $customer_code . '%');
        };
        if ($customer_name) {
            $result->where('customer_name', 'like', '%' . $customer_name . '%');
        };
        if ($customer_phone) {
            $result->where('customer_phone', 'like', '%' . $customer_phone . '%');
        };
        if ($customer_tel) {
            $result->where('customer_tel', 'like', '%' . $customer_tel . '%');
        };
        if ($customer_email) {
            $result->where('customer_email', 'like', '%' . $customer_email . '%');
        };
        if ($company_id) {
            $result->where('customer.company_id', $company_id);
        };
        if ($customer_id) {
            $result->where('customer.customer_id', $customer_id);
        };
        if ($sale_team_sub_id) {
            $result->where('company.sale_team_sub_id', $sale_team_sub_id);
        };

        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->customer_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->customer_id . '"></label>
                    </div>';
                return $str;
            })

            ->addColumn('address', function ($res) {
                $address = $res->customer_address_no . ' ' . $res->customer_address_building . ' ' . $res->customer_address_road . ' ' . $res->customer_address_alley;
                return $address;
            })
            ->addColumn('billing_status', function ($res) {
                $billing_status = 'null';
                return $billing_status;
            })
            ->addColumn('action', function ($res) use ($page) {
                $view = Helper::CheckPermissionMenu('ContactInfo', '1');
                $insert = Helper::CheckPermissionMenu('ContactInfo', '2');
                $update = Helper::CheckPermissionMenu('ContactInfo', '3');
                $delete = Helper::CheckPermissionMenu('ContactInfo', '4');
                if ($res->customer_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $str = '';
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-contact-info" ' . $checked . ' data-id="' . $res->customer_id . '" data-style="ios" data-on="On" data-off="Off">';
                if (!$page) {
                    $str = '<div class="bootstrap-table">';
                    $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                    $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                    $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                    $str .= '<a class="dropdown-item btn-file" href="javascript:void(0)" data-toggle="modal" data-target="#FileModal" data-id="' . $res->customer_id . '" data-company-id="' . $res->company_id . '">File</a>';
                    $str .= '<a class="dropdown-item btn-contact" href="javascript:void(0)" data-toggle="modal" data-target="#ContactModal" data-id="' . $res->customer_id . '">Contact</a>';
                    if ($view && !$page) {
                        $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->customer_id . '">View</a>';
                    }
                    if ($update && !$page) {
                        $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->customer_id . '">Edit</a>';
                    }
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'address', 'billing_status', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['customer_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            ContactInfo::where('customer_id', $id)->update($input_all);
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
    public function GetContactInfo($id)
    {
        $result = ContactInfo::select()->whereNotIn('company_id', [$id])->get();
        return $result;
    }
}
