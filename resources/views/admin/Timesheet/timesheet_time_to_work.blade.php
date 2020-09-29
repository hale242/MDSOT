@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card card mb-1">
                <div class="card-body">
                    <h4 class="card-title">Timesheet</h4>
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <p>ตารางคำนวณค่าล่วงเวลา เรียกเก็บ "{{$SaleOrder->Company ? $SaleOrder->Company->company_name_th : ''}}"</p>
                                <br />
                                <label>
                                    ทำงาน
                                    {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_mon == 1 ? 'จันทร์' : ''}}
                                    {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_tue == 1 ? 'อังคาร' : ''}}
                                    {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_wed == 1 ? 'พุธ' : ''}}
                                    {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_thu == 1 ? 'พฤหัสบดี' : ''}}
                                    {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_fri == 1 ? 'ศุกร์' : ''}}
                                    {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_sat == 1 ? 'เสาร์' : ''}}
                                    {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_sun == 1 ? 'อาทิตย์' : ''}}
                                    เวลาเริ่มงาน {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_time_start ? date('H:s:i', strtotime($SaleOrder->CustomerContract->customer_contract_time_start)) : ''}} เวลาเลิกงาน {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_time_end ? date('H:s:i', strtotime($SaleOrder->CustomerContract->customer_contract_time_end)) : ''}}</label> <br />
                                <label>สัญญาเริ่ม {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_date_start ? date('d/m/Y', strtotime($SaleOrder->CustomerContract->customer_contract_date_start)) : ''}} สิ้นสุด {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_date_end ? date('d/m/Y', strtotime($SaleOrder->CustomerContract->customer_contract_date_end)) : ''}}</label> <br />
                                <!-- <label>หมายเหตุ ต่างจังหวัด ยกเว้น : ระยอง ชลบุรี</label> -->
                            </div>
                            <div class="col-md-4 mb-3">
                                <label> Contract No. {{$SaleOrder->CustomerContract ? $SaleOrder->CustomerContract->customer_contract_full_code : ''}} </label> <br />
                                <label> Quotation No. {{$SaleOrder->Quotation ? $SaleOrder->Quotation->quotation_full_code : ''}} </label> <br />
                                <label> ประจำเดือน <font size="4">งวดที่ {{$SaleOrder->sale_order_number}} : {{$SaleOrder->sale_order_month ? date('m/Y', strtotime($SaleOrder->sale_order_month)) : ''}} </font></label>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="text-right">
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    THB,Bath
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col" rowspan="2" style="width: 150px !important;">วันที่</th>
                                                <th scope="col" rowspan="2">วัน</th>
                                                <th scope="col" rowspan="2">เข้างาน</th>
                                                <th scope="col" rowspan="2">ออกงาน</th>
                                                @foreach($QuotationPriceListOt as $val)
                                                    <th scope="col" colspan="3">{{$val->PriceStructureOT ? $val->PriceStructureOT->price_structure_ot_name : ''}}</th>
                                                @endforeach
                                                <th scope="col" rowspan="2">OT เหมาจ่าย</th>
                                                <th scope="col" rowspan="2">Taxi</th>
                                                <th scope="col" rowspan="2">ตจว.</th>
                                                <th scope="col" rowspan="2">ค้างคืน</th>
                                                <th scope="col" rowspan="2">ค่าใช้จ่ายอื่น ๆ</th>
                                                <th scope="col" rowspan="2">คนทดแทน</th>
                                            </tr>
                                            <tr class="text-center">
                                                @foreach($QuotationPriceListOt as $ot)
                                                    <td>ก่อน</td>
                                                    <td>หลัง</td>
                                                    <td>รวม</td>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody id="list_working_days">
                                            @php
                                                $count_working_all = 0;
                                            @endphp
                                            @foreach($DriverWorkings as $key_main=>$DriverWorking)
                                                @if(isset($DriverWorking['timesheet']) && count($DriverWorking['timesheet']) > 0)
                                                    @php
                                                        $num = 10;
                                                        $num += (count($QuotationPriceListOt) * 3);
                                                        $count_working_all += count($DriverWorking['timesheet']);
                                                    @endphp
                                                    <tr class="table-info font-bold main_working_day" data-driver-working-id="{{$DriverWorking['driver_working_id']}}">
                                                        <td colspan="{{$num}}">
                                                            {{$DriverWorking['price_structure_name']}}
                                                             {{$DriverWorking['driver_name']}}
                                                             รหัส {{$DriverWorking['driver_code']}}
                                                         </td>
                                                    </tr>
                                                    @foreach($DriverWorking['timesheet'] as $key=>$val)
                                                        <tr class="{{$val['timesheet_contract_driver_status'] == 0 ? 'table-danger' : ''}} sub_working_day sub_working_day{{$DriverWorking['driver_working_id']}}">
                                                            <td>{{$val['timesheet_contract_driver_date']}}</td>
                                                            <td>
                                                                {{$val['timesheet_contract_driver_date_text']}}
                                                                <input type="hidden" class="date_text" value="{{$val['timesheet_contract_driver_date_text']}}">
                                                                <input type="hidden" class="customer_contract_id" value="{{$DriverWorking['customer_contract_id']}}">
                                                                <input type="hidden" class="driver_working_id" value="{{$DriverWorking['driver_working_id']}}">
                                                                <input type="hidden" class="timesheet_contract_driver_id" value="{{$val['timesheet_contract_driver_id']}}">
                                                            </td>
                                                            <td>
                                                                <input type="date" class="form-control" value="{{$val['timesheet_contract_driver_def_date_start']}}">
                                                                <input type="time" tabindex="{{$key_main.($key+1)}}" class="form-control time_start" id="add_timesheet_contract_time_start" name="timesheet_contract_time_start" value="{{$val['timesheet_contract_driver_def_time_start']}}" />
                                                            </td>
                                                            <td>
                                                                <input type="date" class="form-control" value="{{$val['timesheet_contract_driver_def_date_end']}}">
                                                                <input type="time" tabindex="{{$key_main.($key+2)}}" class="form-control time_end" id="add_timesheet_contract_time_start" name="timesheet_contract_time_start" value="{{$val['timesheet_contract_driver_def_time_end']}}" />
                                                            </td>
                                                            @foreach($val['ot'] as $ot)
                                                                @php
                                                                    $hour_total = 0;
                                                                    $hour_before = 0;
                                                                    $hour_after = 0;
                                                                    foreach($ot['hour'] as $hour){
                                                                        if($hour['price_structure_ot_id'] == $ot['price_structure_ot_id']){
                                                                            foreach($hour['status'] as $key_status=>$status){

                                                                                if($key_status == 'B'){
                                                                                    foreach($status as $data){
                                                                                        $hour_before += floatval($data['hour']);
                                                                                    }
                                                                                }elseif($key_status == 'A'){
                                                                                    foreach($status as $data){
                                                                                        $hour_after += floatval($data['hour']);
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    $hour_total = $hour_before + $hour_after;
                                                                @endphp
                                                                <td>
                                                                    <input type="hidden" class="price_structure_ot_id" value="{{$ot['price_structure_ot_id']}}">
                                                                    <input type="number" min="1" class="form-control before_ot before_ot{{$val['timesheet_contract_driver_id']}} before_ot{{$ot['price_structure_ot_id']}}" id="before_ot{{$ot['price_structure_ot_id']}}_{{$val['timesheet_contract_driver_id']}}" value="{{number_format($hour_before, 2)}}" style="width: 70px;" />
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="1" class="form-control after_ot after_ot{{$val['timesheet_contract_driver_id']}} after_ot{{$ot['price_structure_ot_id']}}" id="after_ot{{$ot['price_structure_ot_id']}}_{{$val['timesheet_contract_driver_id']}}" value="{{number_format($hour_after, 2)}}" style="width: 70px;" />
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="1" class="form-control total_ot total_ot{{$val['timesheet_contract_driver_id']}} total_ot{{$ot['price_structure_ot_id']}}" id="total_ot{{$ot['price_structure_ot_id']}}_{{$val['timesheet_contract_driver_id']}}" value="{{number_format($hour_total, 2)}}" style="width: 70px;" readonly />
                                                                </td>
                                                            @endforeach
                                                            <td>
                                                                <input type="number" min="1" class="form-control guarantee_ot_unit guarantee_ot_unit{{$DriverWorking['driver_working_id']}}" value="1" style="width: 70px;" />
                                                            </td>
                                                            <td>
                                                                <input type="number" min="1" class="form-control taxi_unit taxi_unit{{$DriverWorking['driver_working_id']}}" value="1" style="width: 70px;" />
                                                            </td>
                                                            <td>
                                                                <input type="number" min="1" class="form-control travel_allowance_unit travel_allowance_unit{{$DriverWorking['driver_working_id']}}" value="1" style="width: 70px;" />
                                                            </td>
                                                            <td>
                                                                <input type="number" min="1" class="form-control accomadation_unit accomadation_unit{{$DriverWorking['driver_working_id']}}" value="1" style="width: 70px;" />
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-success btn-md btn-other-expenses" data-id="{{$val['timesheet_contract_driver_id']}}" data-quotation-price-list-id="{{$DriverWorking['quotation_price_list_id']}}">Add</button>
                                                            </td>
                                                            <td>
                                                                {{isset($val['substitute']) ? $val['substitute'] : ''}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @if(count($QuotationPriceListOt) > 0)
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    @foreach($QuotationPriceListOt as $val)
                                                        <th class="text-center" scope="col" colspan="2">รวม {{$val->PriceStructureOT ? $val->PriceStructureOT->price_structure_ot_name : ''}}</th>
                                                        <th class="text-right text-success" id="sum_hour_ot{{$val->price_structure_ot_id}}">0</th>
                                                    @endforeach
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <div class="form row">
                                    <div class="col-md-6 mb-3">
                                        <p>ตารางคำนวณค่าล่วงเวลา เรียกเก็บ "{{$SaleOrder->Company ? $SaleOrder->Company->company_name_th : ''}}"</p>
                                        <br />
                                        <label>
                                            ทำงาน
                                            {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_mon == 1 ? 'จันทร์' : ''}}
                                            {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_tue == 1 ? 'อังคาร' : ''}}
                                            {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_wed == 1 ? 'พุธ' : ''}}
                                            {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_thu == 1 ? 'พฤหัสบดี' : ''}}
                                            {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_fri == 1 ? 'ศุกร์' : ''}}
                                            {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_sat == 1 ? 'เสาร์' : ''}}
                                            {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_day_sun == 1 ? 'อาทิตย์' : ''}}
                                            เวลาเริ่มงาน {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_time_start ? date('H:s:i', strtotime($SaleOrder->CustomerContract->customer_contract_time_start)) : ''}} เวลาเลิกงาน {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_time_end ? date('H:s:i', strtotime($SaleOrder->CustomerContract->customer_contract_time_end)) : ''}}</label> <br />
                                        <label>สัญญาเริ่ม {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_date_start ? date('d/m/Y', strtotime($SaleOrder->CustomerContract->customer_contract_date_start)) : ''}} สิ้นสุด {{$SaleOrder->CustomerContract && $SaleOrder->CustomerContract->customer_contract_date_end ? date('d/m/Y', strtotime($SaleOrder->CustomerContract->customer_contract_date_end)) : ''}}</label> <br />
                                        <!-- <label>หมายเหตุ ต่างจังหวัด ยกเว้น : ระยอง ชลบุรี</label> -->
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label> Contract No. {{$SaleOrder->CustomerContract ? $SaleOrder->CustomerContract->customer_contract_full_code : ''}} </label> <br />
                                        <label> Quotation No. {{$SaleOrder->Quotation ? $SaleOrder->Quotation->quotation_full_code : ''}} </label> <br />
                                        <label> ประจำเดือน <font size="4">งวดที่ {{$SaleOrder->sale_order_number}} : {{$SaleOrder->sale_order_month ? date('m/Y', strtotime($SaleOrder->sale_order_month)) : ''}} </font></label>
                                    </div>
                                    <div class="col-md-2 mb-3"></div>
                                </div>
                                @foreach($DriverWorkings as $DriverWorking)
                                    <div class="form row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Summary Overtime ตารางเก็บเงิน: {{$DriverWorking['driver_name']}}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <table>
                                                        @if(count($QuotationPriceListOt) > 0)
                                                            @foreach($QuotationPriceListOt as $val)
                                                                @php
                                                                    $price_hour = $val->quotation_price_list_ot_price;
                                                                    $price_minute = ($val->quotation_price_list_ot_price / 60);
                                                                @endphp
                                                                <tr height="30">
                                                                    <td width="100">{{$val->PriceStructureOT ? $val->PriceStructureOT->price_structure_ot_name : ''}}</td>
                                                                    <td width="100">Hr : <span id="sum_hour_ot_driver{{$DriverWorking['driver_working_id']}}_{{$val->price_structure_ot_id}}">0.00</span></td>
                                                                    <td width="100">
                                                                        Hr @ {{number_format($price_hour, 2)}}
                                                                        <input type="hidden" id="price_ot_driver{{$DriverWorking['driver_working_id']}}_{{$val->price_structure_ot_id}}" value="{{$price_hour}}">
                                                                    </td>
                                                                    <td>= &nbsp;</td>
                                                                    <td>
                                                                        <input type="text" class="form-control sum_price_ot_driver{{$DriverWorking['driver_working_id']}}" id="sum_price_ot_driver{{$DriverWorking['driver_working_id']}}_{{$val->price_structure_ot_id}}" value="0.00" style="width: 100px;" readonly />
                                                                    </td>
                                                                </tr>
                                                                <tr height="30">
                                                                    <td></td>
                                                                    <td>Mi : <span id="sum_minute_ot_driver{{$DriverWorking['driver_working_id']}}_{{$val->price_structure_ot_id}}">0.00</span></td>
                                                                    <td colspan="3">Mi @ {{$price_minute}}</td>
                                                                </tr>
                                                            @endforeach
                                                            <tr height="30">
                                                                <td>รวมเป็นเงิน</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="text" class="form-control sum_total_ot_driver{{$DriverWorking['driver_working_id']}}" value="0.00" style="width: 100px;" readonly />
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table>
                                                        <tr height="30">
                                                            <td width="150">สรุปยอดเก็บเงินลูกค้า</td>
                                                            <td width="30"></td>
                                                            <td>
                                                              <input type="text" class="form-control text-right" id="sum_net_total_driver{{$DriverWorking['driver_working_id']}}" value="0.00" style="width: 100px;" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr height="30">
                                                            <td>เงินเดือน</td>
                                                            <td></td>
                                                            <td>
                                                                @php
                                                                    $salary = 0;
                                                                    $salary = $DriverWorking['quotation_price_list_salary'] / $count_working_all;
                                                                    $count_working = isset($DriverWorking['timesheet']) ? count($DriverWorking['timesheet']) : 0;
                                                                    $salary = $salary * $count_working;
                                                                @endphp
                                                                <!-- <input type="text" class="salary{{$DriverWorking['driver_working_id']}}" value="{{$salary}}"> -->
                                                                <input type="text" class="form-control text-right sum_total_driver{{$DriverWorking['driver_working_id']}}" value="{{number_format($salary, 2)}}" style="width: 100px;" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>ค่าล่วงเวลา</td>
                                                            <td></td>
                                                            <td>
                                                                <input type="text" class="form-control text-right sum_total_ot_driver{{$DriverWorking['driver_working_id']}} sum_total_driver{{$DriverWorking['driver_working_id']}}" value="0.00" style="width: 100px;" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr height="30">
                                                            <td>
                                                                <input type="hidden" class="taxi_price_sale{{$DriverWorking['driver_working_id']}}" value="{{$DriverWorking['quotation_price_list_taxi_price_sale']}}">
                                                                Taxi @ <span class="text_taxi_price_sale{{$DriverWorking['driver_working_id']}}">0.00</span>
                                                            </td>
                                                            <td class="text-right sum_taxi_unit{{$DriverWorking['driver_working_id']}}">0 </td>
                                                            <td>
                                                                <input type="text" class="form-control text-right sum_taxi_price{{$DriverWorking['driver_working_id']}}" value="0.00" style="width: 100px;" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr height="30">
                                                            <td>
                                                                <input type="hidden" class="travel_sale{{$DriverWorking['driver_working_id']}}" value="{{$DriverWorking['quotation_price_list_travel_sale']}}">
                                                                ตจว. @ <span class="text_travel_sale{{$DriverWorking['driver_working_id']}}">0.00</span>
                                                            </td>
                                                            <td class="text-right sum_travel_allowance_unit{{$DriverWorking['driver_working_id']}}">0 </td>
                                                            <td>
                                                                <input type="text" class="form-control text-right sum_travel_allowance_price{{$DriverWorking['driver_working_id']}}" value="0.00" style="width: 100px;" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr height="30">
                                                            <td>
                                                                <input type="hidden" class="accomadation_sale{{$DriverWorking['driver_working_id']}}" value="{{$DriverWorking['quotation_price_list_accomadation_sale']}}">
                                                                ค้างคืน @ <span class="text_accomadation_sale{{$DriverWorking['driver_working_id']}}">0.00</span>
                                                            </td>
                                                            <td class="text-right sum_accomadation_unit{{$DriverWorking['driver_working_id']}}">0 </td>
                                                            <td>
                                                                <input type="text" class="form-control text-right sum_accomadation_sale_price{{$DriverWorking['driver_working_id']}}" value="0.00" style="width: 100px;" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr height="30">
                                                            @php
                                                                $guarantee_ot_price = 0;
                                                                $guarantee_ot_price = $DriverWorking['quotation_price_list_guarantee_ot_price'] / $count_working_all;
                                                            @endphp
                                                            <td>
                                                                <input type="hidden" class="guarantee_ot{{$DriverWorking['driver_working_id']}}" value="{{$guarantee_ot_price}}">
                                                                OT เหมาจ่าย @ <span class="text_guarantee_ot{{$DriverWorking['driver_working_id']}}">0.00</span>
                                                            </td>
                                                            <td class="text-right sum_guarantee_ot_unit{{$DriverWorking['driver_working_id']}}">0 </td>
                                                            <td>
                                                                <input type="text" class="form-control text-right sum_guarantee_ot_price{{$DriverWorking['driver_working_id']}}" value="0.00" style="width: 100px;" readonly />
                                                            </td>
                                                        </tr>
                                                        <tr height="30">
                                                            <td>รวมเป็นเงิน</td>
                                                            <td></td>
                                                            <td>
                                                                <input type="text" class="form-control text-right sum_total{{$DriverWorking['driver_working_id']}} sum_total_driver{{$DriverWorking['driver_working_id']}}" value="0.00" style="width: 100px;" readonly />
                                                            </td>
                                                        </tr>
                                                        @foreach($QuotationPriceListStaffExpense as $val)
                                                            @php
                                                                $timesheet_contract_driver_id = [];
                                                                foreach($DriverWorkings as $DriverWorking){
                                                                    if(isset($DriverWorking['timesheet'])){
                                                                        foreach($DriverWorking['timesheet'] as $timesheet){
                                                                            $timesheet_contract_driver_id[] = $timesheet['timesheet_contract_driver_id'];
                                                                        }
                                                                    }
                                                                }
                                                                $count_unit = \App\TimesheetContractDriverAddOn::whereIn('timesheet_contract_driver_id', $timesheet_contract_driver_id)->where('staff_expenses_id', $val->staff_expenses_id)->where('price_structure_has_staff_expenses_id', $val->price_structure_has_staff_expenses_id)->sum('timesheet_contract_driver_add_on_unit');
                                                                $sum_price = \App\TimesheetContractDriverAddOn::whereIn('timesheet_contract_driver_id', $timesheet_contract_driver_id)->where('staff_expenses_id', $val->staff_expenses_id)->where('price_structure_has_staff_expenses_id', $val->price_structure_has_staff_expenses_id)->where('timesheet_contract_driver_add_on_unit', '>', 0)->sum('timesheet_contract_driver_add_on_price');
                                                            @endphp
                                                            <tr height="30" class="staff_expenses">
                                                                <td>
                                                                    {{$val->StaffCost ? $val->StaffCost->staff_expenses_name : ''}} @ <span id="text_staff_expenses_price{{$val->price_structure_has_staff_expenses_id}}">{{number_format($val->quotation_price_list_price, 2)}}</span>
                                                                    <input type="hidden" class="staff_expenses_price" id="staff_expenses_price{{$val->price_structure_has_staff_expenses_id}}" value="{{$val->quotation_price_list_price}}">
                                                                </td>
                                                                <td class="text-right">
                                                                    <span id="text_staff_expenses_unit{{$val->price_structure_has_staff_expenses_id}}">{{number_format($count_unit)}}</span>
                                                                    <input type="hidden" class="staff_expenses_unit" id="staff_expenses_unit{{$val->price_structure_has_staff_expenses_id}}" value="{{$count_unit}}">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control text-right staff_expenses_total sum_total_driver{{$DriverWorking['driver_working_id']}}" id="staff_expenses_total{{$val->price_structure_has_staff_expenses_id}}" value="{{number_format($sum_price, 2)}}" style="width: 100px;" readonly />
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ViewTimesheetModal" data-product_id="0">
                                        View
                                    </button>
                                    <a href="timesheet_contract/print_timesheet" target="_blank" class="btn btn-warning btn-md">Print Driver</a>
                                    <a href="timesheet_contract/print_timesheet_customer" target="_blank" class="btn btn-warning btn-md">Print Customer</a>
                                    <button type="button" class="btn btn-primary btn-md confirm-delete" data-product_id="1">
                                        Sent to Operation
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
@include('admin.Timesheet.Modal.modal_other_expenses')
@endsection
@section('scripts')
@include('admin.Timesheet.script.script_other_expenses')
@include('admin.Timesheet.script.script_calculate')
@endsection
