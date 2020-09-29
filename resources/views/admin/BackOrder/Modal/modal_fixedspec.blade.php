<div class="modal-header">
    <h4 class="modal-title">Fix spec</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
</div>
<div class="modal-body form-horizontal">
    <div class="form-group mt-12 row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="quotation_full_code">Confirmation code</label>
                    @php
                        $QuoCode = App\Quotation::select('quotation_full_code')->find($BackOrder->quotation_id);
                        // GF::print_r($QuoCode->Status[0]);
                    @endphp

                    <input type="text" class="form-control" id="quotation_full_code" name="quotation_full_code" placeholder="" value="{{$QuoCode->quotation_full_code}}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="back_order_unit">Units</label>
                    <input type="text" class="form-control" id="back_order_unit" name="back_order_unit" placeholder="" value="{{$BackOrder->back_order_unit}}" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Position driver</th>
                            <th scope="col" class="text-center">Matching driver</th>
                            <th scope="col" class="text-center">Driver wait for interview</th>
                            <th scope="col" class="text-center">Interviewee not pass</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Driver</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php GF::print_r($BackOrder->Quotation->customer_id) @endphp --}}
                        @foreach($BackOrder->BackOrderSpec as $item)
                            {{-- @php GF::print_r($item) @endphp --}}
                            <tr>
                                <td>{{$BackOrder->quotation_price_list_name}}</td>
                                <td class="text-center">
                                    @php

                                        $check_interview = array();
                                        $interview = App\BackOrderInterview::where('back_order_spec_id',$item->back_order_spec_id)->get();
                                        if(count($interview)>0){
                                            foreach($interview as $item){
                                                $check_interview[] = $item['driver_id'];
                                            }
                                        }

                                        $BackOrderList = App\BackOrderSpec::where('back_order_spec_id', $item->back_order_spec_id)->first();
                                        // GF::print_r($BackOrderList);
                                        if($BackOrderList->gender_id!=""||
                                           $BackOrderList->driver_religion!=""||
                                           $BackOrderList->driver_language_name!=""||
                                           $BackOrderList->recruitment_position_id!=""||
                                           $BackOrderList->driver_age_start!=""||
                                           $BackOrderList->driver_age_end!=""||
                                           $BackOrderList->driver_smoke!=''||
                                           $BackOrderList->work_history_current_position!=""||
                                           $BackOrderList->province!=""||
                                           $BackOrderList->amphur!=""||
                                           $BackOrderList->districts!=""||
                                           $BackOrderList->driver_status_family!=""
                                        ){
                                            // $BackOrderList->driver_smoke
                                            $CountMatchDriver = App\Driver::where('driver_status',1)
                                                                            ->where(function($q) use($BackOrderList){
                                                                                $q->whereNotNull('created_at');

                                                                                if($BackOrderList->driver_religion!=''){
                                                                                    $q->orwhere('driver_religion','like','%'.$BackOrderList->driver_religion.'%');
                                                                                }
                                                                                if($BackOrderList->driver_status_family!=''){
                                                                                    $q->orWhereIn('driver_status_family', explode(',', $BackOrderList->driver_status_family));
                                                                                }
                                                                                if($BackOrderList->province!=''){
                                                                                    $q->orWhereIn('provinces_id', explode(',', $BackOrderList->province));
                                                                                }
                                                                                if($BackOrderList->amphur!=''){
                                                                                    $q->orWhereIn('amphures_id', explode(',', $BackOrderList->amphur));
                                                                                }
                                                                            })
                                                                            ->get();

                                            if(count($interview)>0){
                                                $CountMatchDriver = $CountMatchDriver->whereNotIn('driver_id', $check_interview);
                                            }

                                            if($BackOrderList->gender_id!=''){
                                                $CountMatchDriver = $CountMatchDriver->whereIn('gender_id', explode(',',$BackOrderList->gender_id));
                                            }

                                            if($BackOrderList->driver_smoke!=''){
                                                $CountMatchDriver = $CountMatchDriver->where('driver_smoke',$BackOrderList->driver_smoke);
                                            }

                                            if($BackOrderList->districts!=''){
                                                $CountMatchDriver = $CountMatchDriver->where('districts_id',$BackOrderList->districts);
                                            }

                                            if($BackOrderList->driver_age_start!=''||$BackOrderList->driver_age_end!=''){
                                                $CountMatchDriver = $CountMatchDriver->WhereBetween('driver_age',[$BackOrderList->driver_age_start,$BackOrderList->driver_age_end]);
                                            }


                                        }else{
                                            $CountMatchDriver = App\Driver::where('driver_status',1)->get();
                                            if(count($interview)>0){
                                                $CountMatchDriver = $CountMatchDriver->whereNotIn('driver_id', $check_interview);
                                            }
                                        }
                                    @endphp
                                    <button type="button" class="btn btn-success btn-md MatchingDriverModal" data-toggle="modal" data-target="#MatchingDriverModal"
                                        data-gender_id="{{$BackOrderList->gender_id}}"
                                        data-driver_religion="{{$BackOrderList->driver_religion}}"
                                        data-driver_language="{{$BackOrderList->driver_language_name}}"
                                        data-driver_requirement="{{$BackOrderList->recruitment_position_id}}"
                                        data-driver_age_start="{{$BackOrderList->driver_age_start}}"
                                        data-driver_age_end="{{$BackOrderList->driver_age_end}}"
                                        data-driver_smoke="{{$BackOrderList->driver_smoke}}"
                                        data-work_history="{{$BackOrderList->work_history_current_position}}"
                                        data-province_id="{{$BackOrderList->province}}"
                                        data-amphur_id="{{$BackOrderList->amphur}}"
                                        data-districts_id="{{$BackOrderList->districts}}"
                                        data-driver_status_family="{{$BackOrderList->driver_status_family}}"
                                        data-back_order_spec_id="{{$item->back_order_spec_id}}"
                                        data-back_order_id="{{$item->back_order_id}}"
                                        data-company_id="{{$BackOrder->Quotation->company_id}}"
                                    >
                                        <b>{{sizeof($CountMatchDriver)}}</b>
                                    </button>
                                </td>
                                <td class="text-center">
                                    @php
                                        $CountInterview = App\BackOrderInterview::where('back_order_spec_id', $item->back_order_spec_id)->where('back_order_interviwe_results',0)->get();
                                    @endphp
                                    <button type="button" class="btn btn-info btn-md WaitIntervieModal" data-toggle="modal" data-target="#WaitIntervieModal"
                                        data-gender_id="{{$BackOrderList->gender_id}}"
                                        data-driver_religion="{{$BackOrderList->driver_religion}}"
                                        data-driver_language="{{$BackOrderList->driver_language_name}}"
                                        data-driver_requirement="{{$BackOrderList->recruitment_position_id}}"
                                        data-driver_age_start="{{$BackOrderList->driver_age_start}}"
                                        data-driver_age_end="{{$BackOrderList->driver_age_end}}"
                                        data-driver_smoke="{{$BackOrderList->driver_smoke}}"
                                        data-work_history="{{$BackOrderList->work_history_current_position}}"
                                        data-province_id="{{$BackOrderList->province}}"
                                        data-amphur_id="{{$BackOrderList->amphur}}"
                                        data-districts_id="{{$BackOrderList->districts}}"
                                        data-driver_status_family="{{$BackOrderList->driver_status_family}}"
                                        data-back_order_spec_id="{{$item->back_order_spec_id}}"
                                        data-back_order_id="{{$item->back_order_id}}"
                                        data-company_id="{{$BackOrder->Quotation->company_id}}"
                                    >
                                        <b>{{sizeof($CountInterview)}}</b>
                                    </button>
                                </td>
                                <td class="text-center">
                                    @php
                                        $CountNotpass = App\BackOrderInterview::where('back_order_spec_id', $item->back_order_spec_id)->where('back_order_interviwe_results',99)->get();
                                    @endphp
                                    <button type="button" class="btn btn-warning btn-md NotPassModal" data-toggle="modal" data-target="#NotPassModal"
                                        data-gender_id="{{$BackOrderList->gender_id}}"
                                        data-driver_religion="{{$BackOrderList->driver_religion}}"
                                        data-driver_language="{{$BackOrderList->driver_language_name}}"
                                        data-driver_requirement="{{$BackOrderList->recruitment_position_id}}"
                                        data-driver_age_start="{{$BackOrderList->driver_age_start}}"
                                        data-driver_age_end="{{$BackOrderList->driver_age_end}}"
                                        data-driver_smoke="{{$BackOrderList->driver_smoke}}"
                                        data-work_history="{{$BackOrderList->work_history_current_position}}"
                                        data-province_id="{{$BackOrderList->province}}"
                                        data-amphur_id="{{$BackOrderList->amphur}}"
                                        data-districts_id="{{$BackOrderList->districts}}"
                                        data-driver_status_family="{{$BackOrderList->driver_status_family}}"
                                        data-back_order_spec_id="{{$item->back_order_spec_id}}"
                                        data-back_order_id="{{$item->back_order_id}}"
                                        data-company_id="{{$BackOrder->Quotation->company_id}}"
                                    >
                                        <b>{{sizeof($CountNotpass)}}</b>
                                    </button>
                                </td>
                                <td class="text-center">
                                    @php
                                        $CountPass = App\BackOrderInterview::where('back_order_spec_id', $item->back_order_spec_id)->where('back_order_interviwe_results',1)->get();
                                    @endphp
                                    @if(sizeof($CountPass)>0)
                                        <span class="badge badge-pill text-white font-medium badge-info label-rouded">ได้คนแล้ว</span>
                                    @elseif(sizeof($CountInterview)>0)
                                        <span class="badge badge-pill text-white font-medium badge-success label-rouded">กำลังสัมภาษณ์</span>
                                    @else
                                        <span class="badge badge-pill text-white font-medium badge-warning label-rouded">กำลังหาคน</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(sizeof($CountPass)>0)
                                        @php
                                            $DriverChoose = App\Driver::where('driver_id',$CountPass[0]->driver_id)->first();
                                        @endphp
                                        <a href="javescript;" data-toggle="modal" class="btn-view-profile" data-driver_id="{{$DriverChoose->driver_id}}">{!!'<i class="icon-eye"></i> '.$DriverChoose->driver_name_th." ".$DriverChoose->driver_lastname_th!!} </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-md ViewSpecModal" data-toggle="modal" data-target="#ViewSpecModal" data-fixspec_id="{{$item->back_order_spec_id}}">
                                        <i class="icon-eye"></i>
                                    </button>
                                    @if(sizeof($CountPass)==0)
                                        <button type="button" class="btn btn-warning btn-md EditSpecModal" data-toggle="modal" data-target="#EditSpecModal" data-fixspec_id="{{$item->back_order_spec_id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
