<div class="material-card card">
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title">Equipment</h4>
            <a href="{{url('admin/Equipment')}}" target="_blank" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata">See More</a>
            <div class="table-responsive">
                <table id="tableEquipment" class="table table-bordered text-center" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">Actions</th>
                            <th scope="col">No</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Equipment</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Withdrawal date</th>
                            <th scope="col">Approver</th>
                            <th scope="col">Date Approved</th>
                            <th scope="col">Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($Table_PickupEquipment)>0)
                        <?php $num = 0;$sum = 0; ?>
                        @foreach($Table_PickupEquipment as $val)
                        <?php $num++ ?>
                        <tr>
                            <td>
                                <div class="bootstrap-table">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu float-left" x-placement="bottom-start" >
                                        <a class="dropdown-item btn-view" href="javascript:void(0)" data-toggle="modal" data-target="#LineView" data-id="{{ $val->pickup_equipment_id }}">View</a>
                                        <a class="dropdown-item btn-edit" href="javascript:void(0)" data-toggle="modal" data-target="#LineEdit" data-id="{{ $val->pickup_equipment_id }}">Edit</a>
                                    </div>
                                </div>
                            </td>
                            <th>{{ $num }}</th>
                            <td>{{ $val->driver->driver_name_th . ' ' . $val->driver->driver_lastname_th }}</td>
                            <td>{{ $val->working_equipment_name }}</td>
                            <td>{{ $val->pickup_equipment_count }}</td>
                            <td>{{ $val->created_at ? date("d/m/Y", strtotime($val->created_at)) : '-' }}</td>
                            <td>{{ $val->first_name . ' ' . $val->last_name }}</td>
                            <td>{{ $val->pickup_equipment_date_approve ? date("d/m/Y", strtotime($val->pickup_equipment_date_approve)) : '-' }}</td>
                            <td>{{ $val->pickup_equipment_site }}</td>
                        </tr>
                        <?php $sum += $val->pickup_equipment_count; ?>
                        @endforeach
                        <tr>
                            <th colspan="4">Total</th>
                            <th>{{ $sum }}</th>
                            <td colspan="4"></td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="7">ไม่พบข้อมูล</td>
                        </tr>
                        @endif
                </table>
            </div>
        </div>
    </div>
</div>