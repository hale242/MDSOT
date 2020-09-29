<div class="material-card card">
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title">Approve new driver</h4>
            <a href="{{url('admin/ApproveNewDriver')}}" target="_blank" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata">See More</a>
            <div class="table-responsive">
                <table id="tableApproveNewDriver" class="table table-bordered text-center" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">Action</th>
                            <th scope="col">No</th>
                            <th scope="col">name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Interview date</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($Table_ApproveNewDriver)>0)
                        <?php $num = 0 ?>
                        @foreach($Table_ApproveNewDriver as $val)
                        <?php $num++ ?>
                        <tr>
                            <td>
                                <div class="bootstrap-table">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu float-left" x-placement="bottom-start" >
                                        <a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="{{ $val->driver_id }}">View</a>
                                        <a class="dropdown-item" href="{{ url('admin/CheckCriminalHealth/PrintInterviewEvaluation/$val->driver_interview_id') }}" class="btn btn-primary btn-md text-white" data-id="{{ $val->driver_id }}" target="_blank">Interview</a>
                                        <a class="dropdown-item" href="{{ url('admin/JobRegister/PrintDriverProfile/$val->driver_id') }}" class="btn btn-primary btn-md text-white" data-id="{{ $val->driver_id }}" target="_blank">Print</a>
                                        <a class="dropdown-item btn-reject" href="javascript:void(0)" data-toggle="modal" data-target="#RejectModal" data-id="{{ $val->driver_interview_id }}">Reject</a>
                                        <a class="dropdown-item btn-not-approve" href="javascript:void(0)" data-toggle="modal" data-target="#NotApproveModal" data-id="{{ $val->driver_interview_id }}">Not Approve</a>
                                    </div>
                                </div>
                            </td>
                            <th>{{ $num }}</th>
                            <td>{{ $val->driver_name_th.' '.$val->driver_lastname_th }}</td>
                            <td>{{ $val->recruitment_position_name }}</td>
                            <td>{{ $val->driver_interview_date }}</td>
                            <td><span class="badge badge-pill text-white font-medium label-rouded" style="background-color:{{$val->statusJobAppColor[$val->driver_status_job_app]}}">{{$val->statusJobApp[$val->driver_status_job_app]}}</span></td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">ไม่พบข้อมูล</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>