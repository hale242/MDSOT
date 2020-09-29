<div class="material-card card">
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title">Driver leave approve</h4>
            <a href="{{url('admin/DriverLeaveApprove')}}" target="_blank" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata">See More</a>
            <div class="table-responsive">
                <table id="tableDriverLeaveApprove" class="table table-bordered text-center" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">Actions</th>
                            <th scope="col">No</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Driver Lastname</th>
                            <th scope="col">Leave type</th>
                            <th scope="col">Type</th>
                            <th scope="col">Branch name</th>
                            <th scope="col">Leave name</th>
                            <th scope="col">Start leave date</th>
                            <th scope="col">End leave date</th>
                            <th scope="col">Number of leave days</th>
                            <th scope="col">Days of leave applicant</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    @if(count($Table_DriverLeaveApprove)>0)
                    <?php $num = 0 ?>
                    @foreach($Table_DriverLeaveApprove as $val)
                    <?php $num++ ?>
                    <tr>
                        <td>
                            <div class="bootstrap-table">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-menu float-left" x-placement="bottom-start" >
                                    <a class="dropdown-item btn-line-approve" href="javascript:void(0)" data-toggle="modal" data-target="#LineApproveModal" data-id="' . $val->driver_leave_approve_id . '">Deputy Managing Director - Operation</a>
                                    <a class="dropdown-item btn-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveAModal" data-id="' . $val->driver_leave_approve_id . '" data-type="A">Approve</a>
                                    <a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="' . $val->driver_leave_approve_id . '">View</a>
                                </div>
                            </div>
                        </td>
                        <th>{{ $num }}</th>
                        <td>{{ $val->driver_name }}</td>
                        <td>{{ $val->driver_lastname_th }}</td>
                        <td>{{ $val->leave_type_name }}</td>
                        <td>{{ $val->driver_leave_line_branch_name }}</td>
                        <td>{{ $val->driver_making_leave_name }}</td>
                        <td>{{ $val->driver_making_leave_start_date }}</td>
                        <td>{{ $val->driver_making_leave_end_date }}</td>
                        <td>{{ $val->driver_making_leave_count_date }}</td>
                        <td>{{ $val->driver_leave_approve_date_sent_approve }}</td>
                        <td>{{ $val->status_name }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="13">ไม่พบข้อมูล</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>