<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Document;
use App\TypeDocument;
use App\Company;
use App\Member;
use App\ContactInfo;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Document')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['TypeDocument'] = TypeDocument::where('type_doc_customer_status', '1')->get();
        $data['Companies'] = Company::where('company_status', '1')->get();
        $data['Members'] = Member::where('member_status', '1')->get();
        $data['ContactInfoes'] = ContactInfo::where('customer_status', '1')->get();

        $data['Page'] = 'D';

        if (Helper::CheckPermissionMenu('Document', '1')) {
            return view('admin.Document.document_customer', $data);
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
            'type_doc_customer_id' => 'required'
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Document = new Document;
                foreach ($input_all as $key => $val) {
                    $Document->{$key} = $val;
                }
                if (!isset($input_all['document_customer_status'])) {
                    $Document->document_customer_status = 0;
                }
                // if(isset($Document->document_customer_part) && $Document->document_customer_part){
                //     $Document->document_customer_part = 'uploads/'.$Document->document_customer_part;
                //     $Document->document_customer_name = str_replace("uploads/Document/","",$Document->document_customer_part);
                // }
                $Document->save();
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
            if (isset($failedRules['type_doc_customer_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Document Contact is required";
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
        $content = Document::select(
            'document_customer.*',
            'company.company_name_th',
            'member.member_name_th',
            'customer.customer_name',
            'type_doc_customer.type_doc_customer_name'
        )
            ->leftjoin('company', 'company.company_id', 'document_customer.company_id')
            ->leftjoin('member', 'member.company_id', 'document_customer.company_id')
            ->leftjoin('customer', 'customer.company_id', 'document_customer.company_id')
            ->leftjoin('type_doc_customer', 'type_doc_customer.type_doc_customer_id', 'document_customer.type_doc_customer_id')
            ->find($id);

        $content['format_document_customer_date'] = $content->document_customer_date ? date("Y-m-d", strtotime($content->document_customer_date)) : '';

        $return['status'] = 1;
        $return['title'] = 'Get Document';
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
            'type_doc_customer_id' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Document = Document::find($id);
                foreach ($input_all as $key => $val) {
                    $Document->{$key} = $val;
                }
                if (!isset($input_all['document_customer_status'])) {
                    $Document->document_customer_status = 0;
                }

                if (isset($Document->document_customer_part) && $Document->document_customer_part) {
                    $Document->document_customer_part = 'uploads/' . $Document->document_customer_part;
                    $Document->document_customer_name = str_replace("uploads/Document/", "", $Document->document_customer_part);
                }
                $Document->save();
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
            if (isset($failedRules['type_doc_customer_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Document Contact is required";
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
        $result = Document::select(
            'document_customer.document_customer_id',
            'document_customer.company_id',
            'document_customer.member_id',
            'document_customer.customer_id',
            'document_customer.type_doc_customer_id',
            'document_customer.document_customer_name',
            'document_customer.document_customer_part',
            'document_customer.document_customer_status',
            'document_customer.document_customer_comment',
            'document_customer.document_customer_date',
            'company.company_name_th',
            'member.member_name_th',
            'customer.customer_name',
            'type_doc_customer.type_doc_customer_name'
        )
            ->leftjoin('company', 'company.company_id', 'document_customer.company_id')
            ->leftjoin('member', 'member.member_id', 'document_customer.member_id')
            ->leftjoin('customer', 'customer.customer_id', 'document_customer.customer_id')
            ->leftjoin('type_doc_customer', 'type_doc_customer.type_doc_customer_id', 'document_customer.type_doc_customer_id');

        $company_id = $request->input('company_id');
        $member_id = $request->input('member_id');
        $customer_id = $request->input('customer_id');
        $page = $request->input('page');

        $document_customer_date = $request->input('document_customer_date');
        $company_id_search = $request->input('company_id_search');
        $member_id_search = $request->input('member_id_search');
        $customer_id_search = $request->input('customer_id_search');

        if ($company_id) {
            $result->where('document_customer.company_id', $company_id);
        };
        if ($member_id) {
            $result->where('document_customer.member_id', $member_id);
        };
        if ($customer_id) {
            $result->where('document_customer.customer_id', $customer_id);
        };

        if ($document_customer_date) {
            $result->where('document_customer.document_customer_date', $document_customer_date);
        };
        if ($company_id_search) {
            $result->where('document_customer.company_id', $company_id_search);
        };
        if ($member_id_search) {
            $result->where('document_customer.member_id', $member_id_search);
        };
        if ($customer_id_search) {
            $result->where('document_customer.customer_id', $customer_id_search);
        };


        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-' . $res->document_customer_id . '">
                        <label class="custom-control-label" for="checkbox-item-' . $res->document_customer_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('file', function ($res) {
                $file = '';
                if ($res->document_customer_part) {
                    $file = '<a href="' . url($res->document_customer_part) . '" target="_blank">' . $res->document_customer_name . '</a>';
                }
                return $file;
            })
            ->addColumn('date', function ($res) {
                return $res->document_customer_date ? date("d/m/Y", strtotime($res->document_customer_date)) : '';
            })
            ->addColumn('action', function ($res) use ($page) {
                $view = Helper::CheckPermissionMenu('Document', '1');
                $insert = Helper::CheckPermissionMenu('Document', '2');
                $update = Helper::CheckPermissionMenu('Document', '3');
                $delete = Helper::CheckPermissionMenu('Document', '4');
                if ($res->document_customer_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status change-status-document-file" ' . $checked . ' data-id="' . $res->document_customer_id . '" data-style="ios" data-on="On" data-off="Off">';
                $str = '';
                if ($page) {
                    $str = '<div class="bootstrap-table">';
                    $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
                    $str .= '<i class="fas fa-ellipsis-h"></i></button>';
                    $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
                    if ($view) {
                        $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->document_customer_id . '">View</a>';
                    }
                    if ($update) {
                        $str .= '<a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#EditModal" data-id="' . $res->document_customer_id . '">Edit</a>';
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
            ->rawColumns(['checkbox', 'file', 'date', 'action'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['document_customer_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            Document::where('document_customer_id', $id)->update($input_all);
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
