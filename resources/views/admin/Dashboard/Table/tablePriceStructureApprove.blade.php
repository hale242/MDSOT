<div class="material-card card">
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title">Price structure approve</h4>
            <a href="{{url('admin/PriceStructureApprove')}}" target="_blank" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata">See More</a>
            <div class="table-responsive">
                <table id="tablePriceStructureApprove" class="table table-bordered text-center" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">Action</th>
                            <th scope="col">No</th>
                            <th scope="col">Price structure name</th>
                            <th scope="col">Date start</th>
                            <th scope="col">Date send</th>
                            <th scope="col">Approve level</th>
                            <th scope="col">Price structure status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($Table_PriceStructureApproves)>0)
                        <?php $num = 0 ?>
                        @foreach($Table_PriceStructureApproves as $val)
                        <?php $num++ ?>
                        <tr>
                            <td>
                                <div class="bootstrap-table">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu float-left" x-placement="bottom-start" >
                                        <a class="dropdown-item btn-line-approve" href="javascript:void(0)" data-toggle="modal" data-target="#LineApproveModal" data-id="{{ $val->price_structure_id }}">Line approve</a>
                                        <a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#ViewModal" data-id="{{ $val->price_structure_id }}">View</a>
                                        <a class="dropdown-item btn-structure-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveAModal" data-id="{{ $val->price_structure_approve_id }}" data-type="A">Approve</a>
                                        <a class="dropdown-item btn-structure-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveRModal" data-id="{{ $val->price_structure_approve_id }}" data-type="R">Reject</a>
                                        <a class="dropdown-item btn-structure-approve" href="javascript:void(0)" data-toggle="modal" data-target="#ApproveNModal" data-id="{{ $val->price_structure_approve_id }}" data-type="N">Not approve</a>
                                    </div>
                                </div>
                            </td>
                            <th>{{ $num }}</th>
                            <td>{{ $val->price_structure_name }}</td>
                            <td>{{ date("d/m/Y", strtotime($val->price_structure_date_start)) }}</td>
                            <td>{{ date("d/m/Y", strtotime($val->price_structure_approve_date_send)) }}</td>
                            <td>{{ $val->price_structure_approve_lv }}</td>
                            <td>{{ $val->price_structure_approve_status==0 ? 'รอส่งอนุมัติ':
                                    ( $val->price_structure_approve_status==1 ? 'รออนุมัติ': 
                                    ( $val->price_structure_approve_status==2 ? 'อนุมัติ': 
                                    ( $val->price_structure_approve_status==98 ? 'ส่งกลับ': 
                                    ( $val->price_structure_approve_status==99 ? 'ไม่อนุมัติ': '-'
                                    
                                    ))))}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">ไม่พบข้อมูล</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>