<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Member;
use App\Company;
use App\Provinces;
use App\Amphures;
use App\Districts;
use App\TypeDocument;
use App\SaleArea;
use App\ContactInfo;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Member')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Company'] = Company::where('company_status', '1')->get();
        $data['Provinces'] = Provinces::where('provinces_status', '1')->get();
        $data['TypeDocument'] = TypeDocument::where('type_doc_customer_status', '1')->get();
        $data['SaleArea'] = SaleArea::where('sale_team_sub_status', '1')->get();
        $data['ContactInfoes'] = ContactInfo::where('customer_status', '1')->get();

        if (Helper::CheckPermissionMenu('Member', '1')) {
            return view('admin.Member.member', $data);
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
            'member_name_th' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Member = new Member;
                foreach ($input_all as $key => $val) {
                    $Member->{$key} = $val;
                }
                if (!isset($input_all['member_status'])) {
                    $Member->member_status = 0;
                }
                $Member->save();
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
            if (isset($failedRules['member_name_th']['required'])) {
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
        $content = Member::with('Districts', 'Company')->find($id);

        $amphures = '';
        $districts = '';

        if ($content->Districts) {
            $amphures = Amphures::where('provinces_id', $content->Districts->provinces_id)->get();
            $districts = Districts::where('amphures_id', $content->Districts->amphures_id)->get();
        }


        $return['status'] = 1;
        $return['title'] = 'Get Member';
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
            'member_name_th' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Member = Member::find($id);
                foreach ($input_all as $key => $val) {
                    $Member->{$key} = $val;
                }
                if (!isset($input_all['member_status'])) {
                    $Member->member_status = 0;
                }
                $Member->save();
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
            if (isset($failedRules['member_name_th']['required'])) {
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
        $result = Member::select(
            'company.company_name_th',
            'member.member_id',
            'member.company_id',
            'member.member_name_th',
            'member.member_phone',
            'member.member_email',
            'member.member_details',
            'member.member_tax_id',
            'member.member_status',
            'sale_team_sub.sale_team_sub_name',
            'sale_team_main.sale_team_main_name'
        )
            ->leftjoin('company', 'company.company_id', 'member.company_id')
            ->leftjoin('sale_team_sub', 'sale_team_sub.sale_team_sub_id', 'company.sale_team_sub_id')
            ->leftjoin('sale_team_main', 'sale_team_main.sale_team_main_id', 'sale_team_sub.sale_team_main_id');
            
        $sale_team_sub_id = $request->input('sale_team_sub_id');
        $company_id = $request->input('company_id');
        $member_name_th = $request->input('member_name_th');
        $member_phone = $request->input('member_phone');
        $member_email = $request->input('member_email');
        $page = $request->input('page');

        if ($company_id) {
            $result->where('company.company_id', $company_id);
        };
        if ($member_name_th) {
            $result->where('member_name_th', 'like', '%' . $member_name_th . '%');
        };
        if ($member_phone) {
            $result->where('member_phone', 'like', '%' . $member_phone . '%');
        };
        if ($member_email) {
            $result->where('member_email', 'like', '%' . $member_email . '%');
        };
        if ($sale_team_sub_id) {
            $result->where('company.sale_team_sub_id',$sale_team_sub_id);
        };
    
        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->member_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->member_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('driver', function ($res) {
                $driver = 'null';
                return $driver;
            })
            ->addColumn('address', function ($res) {
                $address = $res->member_address_no . ' ' . $res->member_address_building . ' ' . $res->member_address_road . ' ' . $res->member_address_alley;
                return $address;
            })

            ->addColumn('action', function ($res) use ($page) {
                $view = Helper::CheckPermissionMenu('Member', '1');
                $insert = Helper::CheckPermissionMenu('Member', '2');
                $update = Helper::CheckPermissionMenu('Member', '3');
                $delete = Helper::CheckPermissionMenu('Member', '4');
                if ($res->member_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status-member" ' . $checked . ' data-id="' . $res->member_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $btnFile = '<button type="button" class="btn btn-success btn-md btn-file-member" data-id="' . $res->member_id . '" data-company-id="' . $res->company_id . '">File Document</button>';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->member_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->member_id . '">Edit</button>';
                // $str = '';
                // if ($update) {
                //     $str .= ' ' . $btnStatus;
                // }
                // if ($btnFile) {
                //     $str .= ' ' . $btnFile;
                // }
                // if ($view && !$page) {
                //     $str .= ' ' . $btnView;
                // }
                // if ($update && !$page) {
                //     $str .= ' ' . $btnEdit;
                // }
                // return $str;
                $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                $str .= '<a class="dropdown-item btn-file-member" href="javascript:void(0)" data-toggle="modal" data-target="#FileModal" data-id="' . $res->member_id . '" data-company-id="' . $res->company_id . '">File Document</a>';
                
                if ($view && !$page) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->member_id . '">View</a>';
                }
                if ($update && !$page) {
                    $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->member_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'address', 'driver', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['member_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            Member::where('member_id', $id)->update($input_all);
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
