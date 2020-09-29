<div class="material-card card">
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title">Time stamp</h4>
            <a href="{{url('admin/Timesheet')}}" target="_blank" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata">See More</a>
            <div class="table-responsive">
                <table id="tableTimesheet" class="table table-bordered text-center" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">Action</th>
                            <th scope="col">No</th>
                            <th scope="col">Contract full code</th>
                            <th scope="col">Quotation full code</th>
                            <th scope="col">Code (INV schedule No.)</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">งวดที่ / เดือน</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($Table_Timesheet)>0)
                        <?php $num = 0 ?>
                        @foreach($Table_Timesheet as $val)
                        <?php $num++ ?>
                        <tr>
                            <td>
                                <div class="bootstrap-table">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu float-left" x-placement="bottom-start" >
                                        <a class="dropdown-item btn-cloc-kin-clock-out" data-id="{{ $val->customer_contract_id }}" data-quotation-id="{{ $val->quotation_id }}" data-sale-order-id="'.$sale_order_id.'"> Clock in / Clock out</a>
                                    </div>
                                </div>
                            </td>
                            <th>{{ $num }}</th>
                            <td>{{ $val->customer_contract_full_code }}</td>
                            <td>{{ $val->quotation_full_code }}</td>
                            <td>{{ $val->SaleOrder->sale_order_sale_order_code }}</td>
                            <td>{{ $val->company_name_th }}</td>
                            <td>{{ $val->sale_order_number }}</td>
                            <td>{{ $val->SaleOrder && $val->SaleOrder->sale_order_date_start ? date('d/m/Y', strtotime($val->SaleOrder->sale_order_date_start)) : '' }}</td>
                            <td>{{ $val->SaleOrder && $val->SaleOrder->sale_order_date_end ? date('d/m/Y', strtotime($val->SaleOrder->sale_order_date_end)) : '' }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9">ไม่พบข้อมูล</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>