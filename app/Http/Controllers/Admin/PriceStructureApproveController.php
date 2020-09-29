<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;
use App\Helper;
use App\MenuSystem;
use App\PriceStructureApprove;
use App\ItemCode;
use App\PriceStructureOT ;
use App\PriceStructure ;

class PriceStructureApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenus'] = MenuSystem::where('menu_system_part','PriceStructureApprove')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['ItemCodes'] = ItemCode::where('item_code_status', 1)->get();
          $data['PriceStructureOT'] = PriceStructureOT::where('price_structure_ot_status', 1)->get();
          if(Helper::CheckPermissionMenu('PriceStructureApprove' , '1')){
              return view('admin.PriceStructureApprove.price_structure_approve', $data);
          }else{
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $type = $input_all['type'];
        unset($input_all['type']);
        $validator = Validator::make($request->all(), [

        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $admin = Auth::guard('admin')->user();
                $PriceStructureApprove = PriceStructureApprove::find($id);
                $PriceStructure = PriceStructure::find($PriceStructureApprove->price_structure_id);
                foreach ($input_all as $key => $val) {
                    $PriceStructureApprove->{$key} = $val;
                }
                if($type == 'A'){
                    $PriceStructureApprove->price_structure_approve_status = 2; //อนุมัติ
                    $PriceStructureApprove->price_structure_approve_date_approve = date('Y-m-d H:i:s');
                    $CheckPriceStructureApprove = PriceStructureApprove::where('price_structure_approve_status', 0)->where('price_structure_id', $PriceStructureApprove->price_structure_id)->whereNotIn('price_structure_approve_id', [$PriceStructureApprove->price_structure_approve_id])->orderBy('price_structure_approve_lv', 'asc')->first();
                    if($CheckPriceStructureApprove){
                        $CheckPriceStructureApprove->price_structure_approve_date_send = date('Y-m-d H:i:s');
                        $CheckPriceStructureApprove->price_structure_approve_status = 1;
                        $CheckPriceStructureApprove->save();
                    }else{
                        $PriceStructure->price_structure_approve_status = 2; //อนุมัติ
                    }
                }elseif($type == 'R'){
                    $PriceStructureApprove->price_structure_approve_status = 3;//ส่งกลับแก้ไข
                    $PriceStructure->price_structure_approve_status = 3;//ส่งกลับแก้ไข
                }elseif($type == 'N'){
                    $PriceStructureApprove->price_structure_approve_status = 9;//ไม่อนุมัติ
                    $PriceStructure->price_structure_approve_status = 9;//ไม่อนุมัติ
                }
                $PriceStructureApprove->admin_id = $admin->admin_id;
                $PriceStructureApprove->save();
                $PriceStructure->save();
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
            if (isset($failedRules['provinces_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Provinces is required";
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
        $admin = Auth::guard('admin')->user();
        $result = PriceStructureApprove::select(
            'price_structure_approve.*',
            'price_structure.item_code_id',
            'price_structure.price_structure_name',
            'price_structure.price_structure_profit_percen',
            'price_structure.price_structure_sale_price',
            'price_structure.price_structure_profit_price',
            'price_structure.price_structure_date_start',
            'item_code.item_code_name',
            'admin_applicant.first_name as admin_applicant_firstname',
            'admin_applicant.last_name as admin_applicant_lastname',
            'admin_approve.first_name as admin_approve_firstname',
            'admin_approve.last_name as admin_approve_lastname'
        )
        ->leftjoin('price_structure', 'price_structure.price_structure_id', 'price_structure_approve.price_structure_id')
        ->leftjoin('item_code', 'item_code.item_code_id', 'price_structure.item_code_id')
        ->leftjoin('admin_user as admin_applicant', 'admin_applicant.admin_id', 'price_structure.admin_id')
        ->leftjoin('admin_user as admin_approve', 'admin_approve.admin_id', 'price_structure.price_structure_approve_admin_id')
        ->leftjoin('price_structure_line_approve', 'price_structure_line_approve.price_structure_line_approve_lv', 'price_structure_approve.price_structure_approve_lv')
        ->with('PriceStructure')
        ->where('price_structure_approve.price_structure_approve_status', 1)
        ->where('price_structure_line_approve.position_id', $admin->position_id);
        $item_code_id = $request->input('item_code_id');
        $price_structure_name = $request->input('price_structure_name');
        $price_structure_approve_lv = $request->input('price_structure_approve_lv');
        $price_structure_approve_date_send_start = $request->input('price_structure_approve_date_send_start');
        $price_structure_approve_date_send_end = $request->input('price_structure_approve_date_send_end');
        if($item_code_id){
            $result->where('price_structure.item_code_id', $item_code_id);
        };
        if($price_structure_name){
            $result->where('price_structure.price_structure_name', 'like', '%'.$price_structure_name.'%');
        };
        if($price_structure_approve_lv){
            $result->where('price_structure_approve.price_structure_approve_lv', $price_structure_approve_lv);
        };
        if($price_structure_approve_date_send_start && $price_structure_approve_date_send_end){
            $result->whereBetween('price_structure_approve.price_structure_approve_date_send', [$price_structure_approve_date_send_start.' 00:00:00', $price_structure_approve_date_send_end.' 23:59:59']);
        }elseif($price_structure_approve_date_send_start && !$price_structure_approve_date_send_end){
            $result->where('price_structure_approve.price_structure_approve_date_send', '>=', $price_structure_approve_date_send_start.' 23:59:59');
        }elseif(!$price_structure_approve_date_send_start && $price_structure_approve_date_send_end){
            $result->where('price_structure_approve.price_structure_approve_date_send', '<=', $price_structure_approve_date_send_end.' 23:59:59');
        }
        return Datatables::of($result)
        ->addColumn('checkbox', function ($res) {
            $str = '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-table" id="checkbox-item-'.$res->price_structure_approve_id.'" data-id="'.$res->price_structure_approve_id.'">
                    <label class="custom-control-label" for="checkbox-item-'.$res->price_structure_approve_id.'"></label>
                </div>';
            return $str;
        })
        ->editColumn('price_structure_sale_price' , function($res){
            return number_format($res->price_structure_sale_price, 2);
        })
        ->editColumn('price_structure_profit_price' , function($res){
            return number_format($res->price_structure_profit_price, 2);
        })
        ->editColumn('price_structure_date_start' , function($res){
            return $res->price_structure_date_start ? date('d/m/Y', strtotime($res->price_structure_date_start)) : '';
        })
        ->editColumn('price_structure_approve_date_send' , function($res){
            return $res->price_structure_approve_date_send ? date('d/m/Y', strtotime($res->price_structure_approve_date_send)) : '';
        })
        ->editColumn('price_structure_approve_status' , function($res){
            $str = ($res->price_structure_approve_status  || $res->price_structure_approve_status == '0') ? $res->Status[$res->price_structure_approve_status] : '';
            return $str;
        })
        ->addColumn('admin_name_applicant' , function($res){
          return $res->admin_applicant_firstname.' '.$res->admin_applicant_lastname;
        })
        ->addColumn('admin_name_approve' , function($res){
            return $res->admin_approve_firstname.' '.$res->admin_approve_lastname;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('PriceStructureApprove' , '1');
            $insert = Helper::CheckPermissionMenu('PriceStructureApprove' , '2');
            $update = Helper::CheckPermissionMenu('PriceStructureApprove' , '3');
            $delete = Helper::CheckPermissionMenu('PriceStructureApprove' , '4');
            // $btnView = '<button type="button" class="btn btn-info btn-md btn-view" data-id="'.$res->price_structure_id.'">View</button>';
            // $btnLineApprove = '<button type="button" class="btn btn-success btn-md btn-line-approve" data-id="'.$res->price_structure_id.'">Line approve</button>';
            // $btnApprove = '<button type="button" class="btn btn-success btn-md btn-structure-approve" data-id="'.$res->price_structure_approve_id.'" data-type="A">Approve</button>';
            // $btnReject = '<button type="button" class="btn btn-warning btn-md btn-structure-approve" data-id="'.$res->price_structure_approve_id.'" data-type="R">Reject</button>';
            // $btnNotApprove = '<button type="button" class="btn btn-danger btn-md btn-structure-approve" data-id="'.$res->price_structure_approve_id.'" data-type="N">Not approve</button>';
            // $str = '';
            // $str.=' '.$btnLineApprove;
            // if($view){
            //     $str.=' '.$btnView;
            // }
            // $str.=' '.$btnApprove;
            // $str.=' '.$btnReject;
            // $str.=' '.$btnNotApprove;
            // return $str;
            $str = '<div class="bootstrap-table">';
            $str .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">';
            $str .= '<i class="fas fa-ellipsis-h"></i></button>';
            $str .= '<div class="dropdown-menu float-left" x-placement="bottom-start" >';
            $str .= '<a class="dropdown-item btn-line-approve" href="javascript:void(0)" data-toggle="modal" data-target="#LineApproveModal" data-id="' . $res->price_structure_id . '">Line approve</a>';
            if ($view) {
                $str .= '<a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $res->price_structure_id . '">View</a>';
            }
            $str .= '<a class="dropdown-item btn-structure-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveAModal" data-id="' . $res->price_structure_approve_id . '" data-type="A">Approve</a>';
            $str .= '<a class="dropdown-item btn-structure-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveRModal" data-id="' . $res->price_structure_approve_id . '" data-type="R">Reject</a>';
            $str .= '<a class="dropdown-item btn-structure-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveNModal" data-id="' . $res->price_structure_approve_id . '" data-type="N">Not approve</a>';
            $str .= '</div>';
            $str .= '</div>';
          
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox', 'action', 'price_structure_approve_status'])
        ->make(true);
    }

    public function ChangeApprove(Request $request)
    {
      $ids = $request->input('id');
      $type = $request->input('type');
      \DB::beginTransaction();
      try {
          $admin = Auth::guard('admin')->user();
          foreach($ids as $id){
              $PriceStructureApprove = PriceStructureApprove::find($id);
              $PriceStructure = PriceStructure::find($PriceStructureApprove->price_structure_id);
              if($type == 'A'){
                  $PriceStructureApprove->price_structure_approve_status = 2; //อนุมัติ
                  $PriceStructureApprove->price_structure_approve_date_approve = date('Y-m-d H:i:s');
                  $CheckPriceStructureApprove = PriceStructureApprove::where('price_structure_approve_status', 0)->where('price_structure_id', $PriceStructureApprove->price_structure_id)->whereNotIn('price_structure_approve_id', [$PriceStructureApprove->price_structure_approve_id])->orderBy('price_structure_approve_lv', 'asc')->first();
                  if($CheckPriceStructureApprove){
                      $CheckPriceStructureApprove->price_structure_approve_date_send = date('Y-m-d H:i:s');
                      $CheckPriceStructureApprove->price_structure_approve_status = 1;
                      $CheckPriceStructureApprove->save();
                  }else{
                      $PriceStructure->price_structure_approve_status = 2; //อนุมัติ
                  }
              }elseif($type == 'R'){
                  $PriceStructureApprove->price_structure_approve_status = 3;//ส่งกลับแก้ไข
                  $PriceStructure->price_structure_approve_status = 3;//ส่งกลับแก้ไข
              }elseif($type == 'N'){
                  $PriceStructureApprove->price_structure_approve_status = 9;//ไม่อนุมัติ
                  $PriceStructure->price_structure_approve_status = 9;//ไม่อนุมัติ
              }
              $PriceStructureApprove->admin_id = $admin->admin_id;
              $PriceStructureApprove->save();
              $PriceStructure->save();
          }
          \DB::commit();
          $return['status'] = 1;
          $return['content'] = 'Success';
      } catch (Exception $e) {
          \DB::rollBack();
          $return['status'] = 0;
          $return['content'] = 'Unsuccess';
      }
      $return['title'] = 'Update';
      return $return;
    }
}
