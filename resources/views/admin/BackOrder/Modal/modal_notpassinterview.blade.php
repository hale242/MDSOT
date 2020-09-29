@php
// GF::print_r($content);
@endphp
<div class="modal-header">
    <h4 class="modal-title">Interview not pass</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                class="mdi mdi-close"></i></span></button>
</div>
<form action="#" class="needs-validation" novalidate>
    <div class="card">
        <div class="form-body">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-left">Driver</th>
                                        <th scope="col" class="text-center">Telephone Number</th>
                                        <th scope="col" class="text-left">Position</th>
                                        <th scope="col" class="text-center">Gender</th>
                                        <th scope="col" class="text-center">Age</th>
                                        <th scope="col" class="text-center">Area</th>
                                        <th scope="col" class="text-center">เขต/อำเภอ</th>
                                        <th scope="col" class="text-center">Language ability</th>
                                        <th scope="col" class="text-center">Experience</th>
                                        <th scope="col" class="text-center">Smoking</th>
                                        <th scope="col" class="text-center">Match</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $totalfilter = 0;
                                    if($filters[0]['gender']!=''){ $totalfilter = $totalfilter + 1; }
                                    if($filters[0]['language']!=''){ $totalfilter = $totalfilter + 1; }
                                    if($filters[0]['position']!=''){ $totalfilter = $totalfilter + 1; }
                                    if($filters[0]['age_start']!=''||$filters[0]['age_end']!=''){ $totalfilter =
                                    $totalfilter + 1; }
                                    if($filters[0]['smoke']!=''){ $totalfilter = $totalfilter + 1; }
                                    if($filters[0]['history']!=''){ $totalfilter = $totalfilter + 1; }
                                    if($filters[0]['province']!=''){ $totalfilter = $totalfilter + 1; }
                                    if($filters[0]['amphur']!=''){ $totalfilter = $totalfilter + 1; }
                                    if($filters[0]['district']!=''){ $totalfilter = $totalfilter + 1; }
                                    if($filters[0]['status_family']!=''){ $totalfilter = $totalfilter + 1; }

                                    if($filters[0]['gender']==''&&$filters[0]['language']==''&&$filters[0]['position']==''&&$filters[0]['age_start']==''&&$filters[0]['age_end']==''&&$filters[0]['smoke']==''&&$filters[0]['history']==''&&$filters[0]['province']==''&&$filters[0]['amphur']==''&&$filters[0]['district']==''&&$filters[0]['status_family']==''){
                                    $totalfilter = 1;
                                    }
                                    // echo $totalfilter;
                                    // GF::print_r($filters);
                                    // echo count($drivermatch);
                                    // GF::print_r($back_order_interviwe_id[1]);
                                    @endphp
                                    @php $i=1; $xx=0; @endphp
                                    @if(count($drivermatch)>0)
                                    @foreach ($drivermatch as $item)
                                    @php
                                    $level = 0;

                                    $gender = explode(',',$filters[0]['gender']);
                                    foreach ($gender as $value){
                                    if($value == $item->gender_id){ $level+=1; }
                                    }
                                    //if($filters[0]['religion'] == $item->driver_religion){ $level+=1; }
                                    if($filters[0]['status_family'] == $item->driver_status_family){ $level+=1; }
                                    if($filters[0]['district'] == $item->districts_id){ $level+=1; }

                                    if(in_array($item->RecruitmentPosition->recruitment_position_id,
                                    explode(',',$filters[0]['position']))){
                                    $level+=1;
                                    }

                                    for($x=$filters[0]['age_start'];$x<$filters[0]['age_end'];$x++){ if($x==$item->
                                        driver_age){ $level+=1; }
                                        }

                                        $result = '';
                                        foreach($item->DriverLanguage as $lng){
                                        $result .= $lng->LanguageType->language_type_details.', ';
                                        if(in_array($lng->LanguageType->language_type_id,
                                        explode(',',$filters[0]['language']))){
                                        $level+=1;
                                        }
                                        }

                                        $result2 = '';
                                        foreach($item->WorkHistory as $whtr){
                                        $result2 .= $whtr->work_history_current_position.', ';
                                        if(in_array($whtr->work_history_current_position, explode(',',
                                        $filters[0]['history']))){
                                        $level+=1;
                                        }
                                        }

                                        if(in_array($item->Districts->districts_id, explode(',',
                                        $filters[0]['district']))){ $level+=1; }
                                        if(in_array($item->Districts->Amphures->amphures_id, explode(',',
                                        $filters[0]['amphur']))){ $level+=1; }
                                        if(in_array($item->Districts->Provinces->provinces_id, explode(',',
                                        $filters[0]['province']))){ $level+=1; }

                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="text-left">
                                                {{$item->driver_name_th.' '.$item->driver_lastname_th}}</td>
                                            <td class="text-center">{{$item->driver_phone}}</td>
                                            <td>{{$item->RecruitmentPosition->recruitment_position_name}}</td>
                                            <td class="text-center">{{$item->Gender->gender_name}}</td>
                                            <td class="text-center">{{$item->driver_age}}</td>
                                            <td class="text-center">{{$item->Districts->districts_name}}</td>
                                            <td class="text-center">{{$item->Districts->Amphures->amphures_name}}</td>
                                            <td class="text-center">{{rtrim($result,', ')}}</td>
                                            <td class="text-center">{{rtrim($result2,', ')}}</td>
                                            <td class="text-center">@php if($item->driver_smoke=='Y'){ echo 'Yes';
                                                }elseif($item->driver_smoke=='N'){ echo 'No'; }else{ echo '-'; } @endphp
                                            </td>

                                            <td class="text-center">
                                                @php
                                                // echo $level;
                                                $levelx = ($level/$totalfilter)*100;
                                                @endphp
                                                <div class="progress" style="height:20px;">
                                                    <div class="progress-bar bg-success text-dark font-12"
                                                        style="width: <?php echo $levelx; ?>%; height:20px;"
                                                        role="progressbar"> <?php echo number_format($levelx,2); ?>%
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{-- <button type="button" class="btn btn-info btn-md btn-view-profile" title="View driver" data-driver_id="{{$item->driver_id}}"
                                                data-toggle="modal">
                                                <i class="icon-eye"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-success btn-md InterviewResultsModal"
                                                    title="Write interview results" data-toggle="modal"
                                                    data-target="#InterviewResultsModal"
                                                    data-back_order_interviwe_id="{{$back_order_interviwe_id[$xx]}}">
                                                    <i class="fas fa-bullhorn"></i>
                                                </button> --}}

                                                <button type="button" class="btn btn-primary btn-md SchedInterviewModal" title="Schedule an interview" data-toggle="modal" data-target="#SchedInterviewModal"
                                                    data-driver_id="{{$item->driver_id}}"
                                                    data-back_order_id="{{$filters[0]['back_order_id']}}"
                                                    data-order_spec_id="{{$filters[0]['order_spec_id']}}"
                                                    data-company_id="{{$filters[0]['company_id']}}"

                                                    data-gender_id="{{$filters[0]['gender']}}"
                                                    data-driver_religion=""
                                                    data-driver_language="{{$filters[0]['language']}}"
                                                    data-driver_requirement="{{$filters[0]['position']}}"
                                                    data-driver_age_start="{{$filters[0]['age_start']}}"
                                                    data-driver_age_end="{{$filters[0]['age_end']}}"
                                                    data-driver_smoke="{{$filters[0]['smoke']}}"
                                                    data-work_history="{{$filters[0]['history']}}"
                                                    data-province_id="{{$filters[0]['province']}}"
                                                    data-amphur_id="{{$filters[0]['amphur']}}"
                                                    data-districts_id="{{$filters[0]['district']}}"
                                                    data-driver_status_family="{{$filters[0]['status_family']}}"
                                                    data-updateinterview="updateinter"
                                                >

                                                    <i class="far fa-clock"></i>
                                                </button>
                                                <button type="button" class="btn btn-info btn-md btn-view-profile"
                                                    title="View driver" data-driver_id="{{$item->driver_id}}"
                                                    data-toggle="modal">
                                                    <i class="icon-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php $i++; $xx++; @endphp
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="13" class="text-center">ไม่มีข้อมูล</td>
                                        </tr>
                                        @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
            <input type="hidden" class="form-control" id="created_at" name="created_at">
            <input type="hidden" class="form-control" id="updated_at" name="updated_at">
            <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
        </div>
    </div>
</form>
