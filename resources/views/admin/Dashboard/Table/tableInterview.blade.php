<div class="material-card card">
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title">Interview</h4>
            <a href="{{url('admin/Interview')}}" target="_blank" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata">See More</a>
            <div class="table-responsive">
                <table id="tableInterview" class="table table-bordered text-center" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">Actions</th>
                            <th scope="col">No</th>
                            <th scope="col">วันที่สัมภาษณ์</th>
                            <th scope="col">ชื่อ - นามสกุล</th>
                            <th scope="col">Firstame - Lastname</th>
                            <th scope="col">เลขบัตรประชาชน</th>
                            <th scope="col">ตำแหน่งงาน</th>
                            <th scope="col">รายได้รวมที่ต้องการ</th>
                            <th scope="col">วันที่เริ่มงานได้</th>
                            <th scope="col">แขวง/ตำบล</th>
                            <th scope="col">เขต/อำเภอ</th>
                            <th scope="col">จังหวัด</th>
                            <th scope="col">อายุ</th>
                            <th scope="col">โทรศัพท์มือถือ</th>
                            <th scope="col">สถานะสัมภาษณ์</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($Table_Interview)>0)
                        <?php $num = 0 ?>
                        @foreach($Table_Interview as $val)
                        <?php $num++ ?>
                        <tr>
                            <td>
                                <div class="bootstrap-table">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu float-left" x-placement="bottom-start" >
                                        <a class="dropdown-item" href="{{ url('admin/Interview/'.$val->driver_interview_id.'/edit') }}" data-id="{{$val->driver_interview_id}}">Evaluation</a>
                                        <a class="dropdown-item btn-criminal-date" href="javascript:void(0)" data-toggle="modal" data-target="#DateModal" data-id="{{$val->driver_interview_id}}">Date of criminal / health</a>
                                    </div>
                                </div>
                            </td>
                            <th>{{ $num }}</th>
                            <td>{{ date("d/m/Y", strtotime($val->driver_availlale_date)) }}</td>
                            <td>{{ $val->driver_name_th.' '.$val->driver_lastname_th }}</td>
                            <td>{{ $val->driver_name_en.' '.$val->driver_lastname_en }}</td>
                            <td>{{ $val->driver_id_card_no }}</td>
                            <td>{{ $val->recruitment_position_name }}</td>
                            <td>{{ number_format($val->driver_expected_salary,2) }}</td>
                            <td>{{ date("d/m/Y", strtotime($val->driver_interview_date)) }}</td>
                            <td>{{ $val->districts_name }}</td>
                            <td>{{ $val->amphures_name }}</td>
                            <td>{{ $val->provinces_name }}</td>
                            <td>{{ $val->driver_age }}</td>
                            <td>{{ $val->driver_mobile_phone }}</td>
                            <td><span class="badge badge-pill text-white font-medium label-rouded" style="background-color:{{ $val->statusJobAppColor[$val->driver_status_job_app] }}">{{ $val->statusJobApp[$val->driver_status_job_app] }}</span>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="15">ไม่พบข้อมูล</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>