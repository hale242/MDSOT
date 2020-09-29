<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\HeadDocuments;

class HeadDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'HeadDocuments')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        if (Helper::CheckPermissionMenu('HeadDocuments', '1')) {
            return view('admin.HeadDocuments.head_documents', $data);
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
            'head_documents_name_th' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $HeadDocuments = new HeadDocuments;
                foreach ($input_all as $key => $val) {
                    $HeadDocuments->{$key} = $val;
                }
                if (!isset($input_all['head_documents_head_office'])) {
                    $HeadDocuments->head_documents_head_office = 0;
                }
                if (!isset($input_all['head_documents_status'])) {
                    $HeadDocuments->head_documents_status = 0;
                }
                $HeadDocuments->save();
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
            if (isset($failedRules['head_documents_name_th']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Head Documents is required";
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
        $content = HeadDocuments::where('head_documents_id', $id)->first();
        $return['status'] = 1;
        $return['title'] = 'Get HeadDocuments';
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
            'head_documents_name_th' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $HeadDocuments = HeadDocuments::find($id);
                foreach ($input_all as $key => $val) {
                    $HeadDocuments->{$key} = $val;
                }
                if (!isset($input_all['head_documents_head_office'])) {
                    $HeadDocuments->head_documents_head_office = 0;
                }
                if (!isset($input_all['head_documents_status'])) {
                    $HeadDocuments->head_documents_status = 0;
                }
                $HeadDocuments->save();
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
            if (isset($failedRules['head_documents_name_th']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Bank Type is required";
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

        $head_documents_head_office = $request->input('head_documents_head_office');
        $head_documents_email = $request->input('head_documents_email');
        $head_documents_tel = $request->input('head_documents_tel');
        $head_documents_fax = $request->input('head_documents_fax');
        $head_documents_tax_id = $request->input('head_documents_tax_id');
        $head_documents_company_code = $request->input('head_documents_company_code');
        $head_documents_status = $request->input('head_documents_status');

        $result = HeadDocuments::select();
        if($head_documents_head_office){
            $result->where("head_documents_head_office", $head_documents_head_office);
        }
        else if($head_documents_head_office == '0'){
            $result->where("head_documents_head_office", '0');
        }
        if($head_documents_email){
            $result->where("head_documents_email", "like", "%{$head_documents_email}%");
        }
        if($head_documents_tel){
            $result->where("head_documents_tel", "like", "%{$head_documents_tel}%");
        }
        if($head_documents_fax){
            $result->where("head_documents_fax", "like", "%{$head_documents_fax}%");
        }
        if($head_documents_tax_id){
            $result->where("head_documents_tax_id", "like", "%{$head_documents_tax_id}%");
        }
        if($head_documents_company_code){
            $result->where("head_documents_company_code", "like", "%{$head_documents_company_code}%");
        }
        if($head_documents_status){
            $result->where("head_documents_status",$head_documents_status);
        }
        else if($head_documents_status == '0'){
            $result->where("head_documents_status", '0');
        }
        $result->groupBy('head_documents_id');
        return Datatables::of($result)

            ->addColumn('head_documents_head_office', function ($res) {
                $type = '';

                if ($res->head_documents_head_office == 1) {
                    $type = 'Head office';
                } else {
                    $type = 'สาขอย่อย ';
                }
                return $type;
            })
            ->addColumn('head_documents_reftype', function ($res) {
                $reftype = '';
                if ($res->head_documents_reftype == 'RI') {
                    $reftype = 'ใบเสร็จรับเงินรับ(ซื้อมาขายไป)';
                }
                if ($res->head_documents_reftype == 'RV') {
                    $reftype = 'ใบเสร็จรับเงิน(งานบริการ) หรืออื่นๆ';
                }

                return $reftype;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('HeadDocuments', '1');
                $insert = Helper::CheckPermissionMenu('HeadDocuments', '2');
                $update = Helper::CheckPermissionMenu('HeadDocuments', '3');
                $delete = Helper::CheckPermissionMenu('HeadDocuments', '4');

                if ($res->head_documents_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->head_documents_id . '" data-style="ios" data-on="On" data-off="Off">';
               $str = '<div class="bootstrap-table">';
                $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                if ($view) {
                    $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->head_documents_id . '">View</a>';
                }
                if ($update) {
                $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->head_documents_id . '">Edit</a>';
                }
                $str .= '</div>';
                $str .= '</div>';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['head_documents_head_office', 'head_documents_reftype', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['head_documents_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            HeadDocuments::where('head_documents_id', $id)->update($input_all);
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
