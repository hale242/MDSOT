<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\BackOrderSpec;
use App\BackOrderInterview;
use App\Driver;
use App\Amphures;
use App\Districts;

class BackOrderSpecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function store(Request $request)
    {

        $back_spec_id   = $request->back_order_spec_id;
        $gender         = isset($request->gender_id) ? $request->gender_id : null;
        $language       = isset($request->driver_language_name) ? $request->driver_language_name : null;
        $family         = isset($request->driver_status_family) ? implode(',', $request->driver_status_family) : null;
        $experience     = isset($request->work_history_current_position) ? implode(',', $request->work_history_current_position) : null;
        $province       = isset($request->province) ? implode(',', $request->province) : null;
        $amphur         = isset($request->amphur) ? implode(',', $request->amphur) : null;
        $distric        = isset($request->distric) ? implode(',', $request->distric) : null;
        $position       = isset($request->recruitment_position_id) ? implode(',', $request->recruitment_position_id) : null;
        $date_st        = isset($request->driver_age_start) ? $request->driver_age_start : null;
        $date_en        = isset($request->driver_age_end) ? $request->driver_age_end : null;
        $smoke          = isset($request->driver_smoke) ? $request->driver_smoke : null;

        $result = BackOrderSpec::where('back_order_spec_id', $back_spec_id)
            ->update([
                'gender_id'                     => $gender,
                'driver_language_name'          => $language,
                'driver_status_family'          => $family,
                'work_history_current_position' => $experience,
                'province'                      => $province,
                'amphur'                        => $amphur,
                'districts'                     => $distric,
                'recruitment_position_id'       => $position,
                'driver_age_start'              => $date_st,
                'driver_age_end'                => $date_en,
                'driver_smoke'                  => $smoke
            ]);

        return 1;
        // return redirect('/admin/BackOrder');

    }

    public function show($id)
    {
        $content = BackOrderSpec::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get BackOrderSpec';
        $return['content'] = $content;
        return view('admin.BackOrder.Modal.modal_viewspec', $return);
    }

    public function edit($id)
    {
        $content = BackOrderSpec::find($id);
        $return['status'] = 1;
        $return['title'] = 'Get BackOrderSpec';
        $return['content'] = $content;
        return view('admin.BackOrder.Modal.modal_editspec', $return);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        //
    }

    public function lists(Request  $request)
    {
        $result = BackOrderSpec::select(
            'back_order_spec.*',
            'price_structure.price_structure_name',
            'gender.gender_name'
        )
            ->leftjoin('quotation_price_list', 'quotation_price_list.quotation_price_list_id', 'back_order_spec.quotation_price_list_id')
            ->leftjoin('price_structure', 'price_structure.price_structure_id', 'quotation_price_list.price_structure_id')
            ->leftjoin('gender', 'gender.gender_id', 'back_order_spec.gender_id')
            ->whereIn('back_order_spec.back_order_spec_status', [1, 2])
            ->with(
                'DriverWorking.Driver',
                'DriverWorking.Driver.Gender',
                'BackOrderInterviewPass.Driver',
                'DriverWorking.Driver.Districts.Provinces',
                'DriverWorking.Driver.Districts.Amphures',
                'DriverWorking.Driver.WorkHistory',
                'DriverWorking.Driver.DriverLanguage.LanguageType'

            );
        $quotation_id = $request->input('quotation_id');
        $sale_order_id = $request->input('sale_order_id');
        $sale_order_list_id = $request->input('sale_order_list_id');
        $page = $request->input('page');
        if ($quotation_id) {
            $result->where('back_order_spec.quotation_id', $quotation_id);
        }
        return Datatables::of($result)
            ->addColumn('name', function ($res) {
                $name = '';
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver) {
                    $name = $res->BackOrderInterviewPass->Driver->driver_name_th . ' ' . $res->BackOrderInterviewPass->Driver->driver_lastname_th;
                }
                return $name;
            })
            ->addColumn('driver_working_name', function ($res) {
                $name = '';
                if ($res->back_order_spec_status == 2 && $res->DriverWorking && $res->DriverWorking->Driver) {
                    $name = $res->DriverWorking->Driver->driver_name_th . ' ' . $res->DriverWorking->Driver->driver_lastname_th;
                }
                return $name;
            })
            ->addColumn('gender_name', function ($res) {
                $gender_name = '';
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver) {
                    $gender_name = $res->BackOrderInterviewPass->Driver->Gender->gender_name;
                }
                return $gender_name;
            })
            ->addColumn('area', function ($res) {
                return '';
            })
            ->addColumn('language_ability', function ($res) {
                $language_ability = array();
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver) {
                    foreach ($res->BackOrderInterviewPass->Driver->DriverLanguage  as $val) {
                        array_push($language_ability,$val->LanguageType->language_type_details);
                    }
                }
                $arr_language_ability = implode(", ",$language_ability);
                return $arr_language_ability ? $arr_language_ability : '-';
            })
            ->addColumn('experience', function ($res) {
                $experience = array();
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver) {
                    foreach ($res->BackOrderInterviewPass->Driver->WorkHistory  as $val) {
                        array_push($experience,$val->work_history_current_position);
                    }
                }
                $arr_experience = implode(", ",$experience);
                return $arr_experience ? $arr_experience : '-';
            })
            ->addColumn('smoking', function ($res) {
                $smoking = '';
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver) {
                    $smoking = $res->BackOrderInterviewPass->Driver->driver_smoke =='Y' ? 'Yes':'No';
                }
                return $smoking;
            })
            ->addColumn('match', function ($res) {
                return '<div class="progress-bar bg-success" style="width: 100%; height:20px;" role="progressbar">100%</div>';
            })
            ->addColumn('provinces_name', function ($res) {
                $provinces_name = '';
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver) {
                    $provinces_name = $res->BackOrderInterviewPass->Driver->Districts->Provinces->provinces_name;
                }
                return $provinces_name;
            })
            ->addColumn('amphures_name', function ($res) {
                $amphures_name = '';
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver) {
                    $amphures_name = $res->BackOrderInterviewPass->Driver->Districts->Amphures->amphures_name;
                }
                return $amphures_name;
            })
            ->addColumn('area', function ($res) {
                $area = '';
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver) {
                    $area = $res->BackOrderInterviewPass->Driver->Districts->districts_name;
                }
                return $area;
            })
            ->addColumn('age', function ($res) {
                return $res->back_order_spec_status == 2 && $res->BackOrderInterviewPass && $res->BackOrderInterviewPass->Driver ? $res->BackOrderInterviewPass->Driver->driver_age : '';
            })
            ->addColumn('action', function ($res) use ($page, $sale_order_id, $sale_order_list_id) {
                $view = Helper::CheckPermissionMenu('CustomerContract', '1');
                $insert = Helper::CheckPermissionMenu('CustomerContract', '2');
                $update = Helper::CheckPermissionMenu('CustomerContract', '3');
                $delete = Helper::CheckPermissionMenu('CustomerContract', '4');
                $driver_id = '';
                $back_order_interviwe_id = '';
                $disabled_view = '';
                $disabled_reject = '';
                if ($res->back_order_spec_status == 2 && $res->BackOrderInterviewPass) {
                    $driver_id = $res->BackOrderInterviewPass->driver_id;
                    $back_order_interviwe_id = $res->BackOrderInterviewPass->back_order_interviwe_id;
                } else {
                    $disabled_view = 'disabled';
                    $disabled_reject = 'disabled';
                }
                $btnReject = '<button type="button" class="btn btn-warning btn-md btn-reject" data-id="' . $back_order_interviwe_id . '" ' . $disabled_reject . ' title="Reject"><i class="fas fa-redo"></i></button>';
                $btnView = '<button type="button" class="btn btn-info btn-md btn-view" data-id="' . $driver_id . '" ' . $disabled_view . '><i class="icon-eye"></i></button>';
                $str = '';
                if ($page == 'clock_in_clock_out') {
                    if ($sale_order_id && $sale_order_list_id) {
                        $str .= '<a href="' . url('admin/Timesheet/TimeToWork/?sale_order_id='.$sale_order_id.'&sale_order_list_id='.$sale_order_list_id.'&back_order_spec_id=' . $res->back_order_spec_id) . '" class="btn btn-warning btn-md"><i class="far fa-calendar-alt"></i></a>';
                    }
                } else {
                    $str .= ' ' . $btnReject;
                    if ($view) {
                        $str .= ' ' . $btnView;
                    }
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['match','language_ability','action'])
            ->make(true);
    }

    public function Reject(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $BackOrderInterview = BackOrderInterview::find($id);
            $BackOrderInterview->back_order_interviwe_results = 99; //ไม่ผ่าน
            $BackOrderInterview->save();
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

    public function getamphur(Request $request)
    {
        $result = Amphures::whereIn('provinces_id', $request->id)->get();
        return $result;
    }
    public function getdistric(Request $request)
    {
        $result = Districts::whereIn('amphures_id', $request->id)->get();
        return $result;
    }

    public function getarea(Request $request)
    {
        $result = Districts::where('provinces_id', $request->id)->get();
        return $result;
    }
}
