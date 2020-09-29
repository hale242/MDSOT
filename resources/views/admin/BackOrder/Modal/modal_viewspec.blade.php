@php
    // GF::print_r($content);
    $gender = explode(',',$content->gender_id);
    $recruitment = explode(',',$content->recruitment_position_id);
    $langload = explode(',',$content->driver_language_name);
    $age_start = $content->driver_age_start;
    $age_end = $content->driver_age_end;
    $workhistory = explode(',',$content->work_history_current_position);
    $provinceload = explode(',',$content->province);
    $amphurload = explode(',',$content->amphur);
    $districtsload = explode(',',$content->districts);
    $family = explode(',',$content->driver_status_family);
    $smoke = $content->driver_smoke;
    $status = $content->back_order_spec_status;
@endphp

<div class="modal-header">
    <h4 class="modal-title">View spec</h4>
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
                            <table class="table">
                                <tr>
                                    <td width="30%">Gender</td>
                                    <td width="70%">
                                        @foreach($gender as $item)
                                            @if($item==1)
                                                ชาย
                                            @elseif($item==2)
                                                หญิง
                                            @else
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Language ability</td>
                                    <td>
                                        @php
                                            $language = App\LanguageType::whereIn('language_type_id',$langload )->orderBy('language_type_details')->get();

                                            $result = '';
                                            foreach($language as $lng){
                                                $result .= $lng->language_type_details.', ';
                                            }
                                        @endphp
                                        {{rtrim($result,', ')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Position</td>
                                    <td>
                                        @php
                                            $position = App\RecruitmentPosition::whereIn('recruitment_position_id',$recruitment )->get();
                                            $result = '';
                                            foreach($position as $item){
                                                $result .= $item->recruitment_position_name.', ';
                                            }
                                        @endphp
                                        {{rtrim($result,', ')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Experience</td>
                                    <td>{{$content->work_history_current_position}}</td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td>
                                        @php
                                            $districts = App\Districts::whereIn('districts_id',$districtsload )->get();
                                            $result = '';
                                            foreach($districts as $item){
                                                $result .= $item->districts_name.', ';
                                            }
                                        @endphp
                                        {{rtrim($result,', ')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>เขต/อำเภอ</td>
                                    <td>
                                        @php
                                            $amphur = App\Amphures::whereIn('amphures_id',$amphurload )->get();
                                            $result = '';
                                            foreach($amphur as $item){
                                                $result .= $item->amphures_name.', ';
                                            }
                                        @endphp
                                        {{rtrim($result,', ')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <td>{{$age_start.' - '.$age_end}}</td>
                                </tr>
                                <tr>
                                    <td>Smoking</td>
                                    <td>
                                        @if($smoke=='Y')
                                            Yes
                                        @elseif($smoke=='N')
                                            No
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if($status==1) เปิดการใช้งาน
                                        @elseif($status==0) ปิดการใช้งาน
                                        @elseif($status==2) ได้คนแล้ว
                                        @else ยกเลิก
                                        @endif
                                    </td>
                                </tr>
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
