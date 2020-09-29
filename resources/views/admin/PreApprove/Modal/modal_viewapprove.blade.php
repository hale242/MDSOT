<div class="preloader" style="display: none;">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div class="modal-header">
    <h4 class="modal-title">Pre-Approval <small id="quoid"></small></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                class="mdi mdi-close"></i></span></button>
</div>
<div class="modal-body form-horizontal">
    <div class="form-group mt-12 row">

        <div class="col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <i class="mdi mdi-checkbox-marked-outline"></i> <span
                                id="cus-run-code">{{$data->quotation_run_code_details}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-right mb-3">
                    {{-- <img src="https://intervision.co/mock-up/assets/images/mdsot/Ex_logo.jpg" height="80" alt="Logo" /> --}}
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th> Customer :</th>
                        <td><span id="cus-company">{{$data->company->company_name_th}}</span></td>
                        <td> Contact : <span id="cus-contract">{{$data['customer']['customer_name']}}</span> </td>
                        <td> Tel : <span id="cus-tel">{{$data['customer']['customer_phone']}}</span></td>
                    </tr>
                    <tr>
                        <th> รายละเอียดงาน :</th>
                        <td colspan="2"> <span id="qou-title">{{$data['quotation_title']}}</span></td>
                        <td> รหัสลูกค้า : <span id="cus-code">{{$data['customer']['customer_code']}}</span> </td>
                        <th>วันที่ / Date </th>
                        <td> <span id="quo-date">{{substr($data['quotation_date_doc'],0,10)}}</span></td>
                    </tr>
                    <tr>
                        <th> Credit Term :</th>
                        <td colspan="3"> <span id="cus-credit">{{$data['quotation_credit_term']}}</span> วัน</td>
                        <th>เลขที่สัญญา </th>
                        <td>MDS-ST-20200011</td>
                    </tr>
                    <tr>
                        <th> Invoice Date :</th>
                        <td colspan="3"> <span id="inv-date">{{$data['company']['company_bill_date']}}</span></td>
                        <th>เลขที่ Pre-Approve </th>
                        <td>
                            <span
                                id="pre-approve-no">{{$data['QuotationPreApproveDetails']['quotation_pre_approve_details_pre_approve_code']}}</span>

                        </td>
                    </tr>
                    <tr>
                        <th> Payment Date :</th>
                        <td colspan="3"><span id="inv-pay-date">{{$data['company']['company_pay_date']}}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            @php
            // GF::print_r($data['QuotationPriceListMain']);
            // GF::print_r($data['QuotationPriceList']);
            // GF::print_r($data['QuotationPriceListOt']);

            $CustomerCostId = array();
            $CustomerCost = array();

            $InsuranceFeeCostId = array();
            $InsuranceFeeCost = array();

            $OtherCostId = array();
            $OtherCost = array();

            $StructureOtId = array();
            $StructureOt = array();

            foreach ($data['QuotationPriceList'] as $QuotationPriceList) {
                if($QuotationPriceList['StaffCost']!=null || $QuotationPriceList['StaffCost']!=''){
                    array_push($CustomerCost, $QuotationPriceList['StaffCost']['staff_expenses_name']);
                    array_push($CustomerCostId, $QuotationPriceList['StaffCost']['staff_expenses_id']);
                }
                if($QuotationPriceList['InsuranceFee']!=null || $QuotationPriceList['InsuranceFee']!=''){
                    array_push($InsuranceFeeCost, $QuotationPriceList['InsuranceFee']['insurance_fee_name']);
                    array_push($InsuranceFeeCostId, $QuotationPriceList['InsuranceFee']['insurance_fee_id']);
                }
                if($QuotationPriceList['OtherExpenses']!=null || $QuotationPriceList['OtherExpenses']!=''){
                    array_push($OtherCostId, $QuotationPriceList['OtherExpenses']['other_expenses_id']);
                    array_push($OtherCost, $QuotationPriceList['OtherExpenses']['other_expenses_name']);
                }
            }

            foreach($data['QuotationPriceListOt'] as $QuotationPriceListOt){
                array_push($StructureOtId, $QuotationPriceListOt['PriceStructureOT']['price_structure_ot_id']);
                array_push($StructureOt, $QuotationPriceListOt['PriceStructureOT']['price_structure_ot_name']);
            }

            $CustomerCostId = array_unique($CustomerCostId);
            $CustomerCost = array_unique($CustomerCost);
            $CustomerCost_length = sizeof($CustomerCost);

            $InsuranceFeeCostId = array_unique($InsuranceFeeCostId);
            $InsuranceFeeCost = array_unique($InsuranceFeeCost);
            $InsuranceFeeCost_length = sizeof($InsuranceFeeCost);

            $OtherCostId = array_unique($OtherCostId);
            $OtherCost = array_unique($OtherCost);
            $OtherCost_length = sizeof($OtherCost);

            $StructureOtId = array_unique($StructureOtId);
            sort($StructureOtId);
            $StructureOt = array_unique($StructureOt);
            sort($StructureOt);
            $StructureOt_length = sizeof($StructureOt);

            // GF::print_r($StructureOtId);
            // GF::print_r($StructureOt);

            $Total_length = 13 + $CustomerCost_length + $OtherCost_length + $InsuranceFeeCost_length +
            $StructureOt_length;

            @endphp
            <div class="table-responsive">
                <table id="table-price" class="table table-sm table-bordered" style="font-size: 10px;">
                    <thead>
                        <tr>
                            @for($i=1;$i<$Total_length;$i++)
                                <th class="text-center">{{$i}}</th>
                            @endfor
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th colspan="{{$CustomerCost_length+1}}" class="text-center bg-secondary">ต้นทุนพนักงาน</th>
                            <th colspan="{{$InsuranceFeeCost_length}}" class="text-center bg-warning">ประกัน</th>
                            <th colspan="{{$OtherCost_length}}" class="text-center bg-success">ต้นทุนบริษัท</th>
                            <th colspan="4" class="text-center bg-info">Cost / Margin</th>
                            <th colspan="{{$StructureOt_length + 5}}" class="text-center bg-gradient-purple">รายได้อื่น ๆ</th>
                        </tr>
                        <tr>
                            <th class="text-center">พนักงานขับรถ</th>
                            <th class="text-center">จำนวน (คน)</th>
                            <th class="text-center">เงินเดือน</th>
                            @foreach ($CustomerCost as $CustomerCost_Val)
                            <th class="text-center">{{$CustomerCost_Val}}</th>
                            @endforeach
                            @foreach ($InsuranceFeeCost as $InsuranceFeeCost_Val)
                            <th class="text-center">{{$InsuranceFeeCost_Val}}</th>
                            @endforeach
                            @foreach ($OtherCost as $OtherCost_Val)
                            <th class="text-center">{{$OtherCost_Val}}</th>
                            @endforeach
                            <th class="text-center">Total Costs</th>
                            <th class="text-center">Services Rate (Excludes Vat 7%)</th>
                            <th class="text-center">Margin per Person / per day</th>
                            <th class="text-center">Total Margin</th>

                            <th class="text-center">Taxi 06.01 & After 21.59</th>
                            <th class="text-center">ค่าต่างจังหวัด</th>
                            <th class="text-center">ค่าที่พัก</th>

                            @foreach ($StructureOt as $StructureOt_Val)
                            <th class="text-center">{{$StructureOt_Val}}</th>
                            @endforeach

                            <th class="text-center">OT Guarantee / เหมาจ่าย</th>
                            <th class="text-center">Service charge</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_all = 0;
                        $total_service = 0;
                        @endphp
                        @foreach($data['QuotationPriceListMain'] as $QuotationPriceListMain)
                        <tr>
                            <td>{{$QuotationPriceListMain['quotation_price_list_name']}}</td>
                            <td class="text-center">{{$QuotationPriceListMain['quotation_price_list_unit']}}</td>
                            <td class="text-center">
                                {{number_format($QuotationPriceListMain->quotation_price_list_salary,2)}}</td>

                            {{-- StaffCost Data --}}
                            @foreach ($CustomerCostId as $CustomerCostId_Val)
                                @php
                                    $QuotationPriceList = App\QuotationPriceList::where('main_quotation_price_list_id', $QuotationPriceListMain->quotation_price_list_id)
                                                        ->where('quotation_id', $QuotationPriceListMain->quotation_id)
                                                        ->where('staff_expenses_id', $CustomerCostId_Val)
                                                        ->first();
                                @endphp
                                <td class="text-center">{{$QuotationPriceList ? number_format($QuotationPriceList->quotation_price_list_price,2) : '-'}}&nbsp;</td>
                            @endforeach

                            {{-- Insurance Fee Cost Data --}}
                            @foreach ($InsuranceFeeCostId as $InsuranceFeeCostId_Val)
                                @php
                                    $QuotationPriceList = App\QuotationPriceList::where('main_quotation_price_list_id', $QuotationPriceListMain->quotation_price_list_id)
                                                        ->where('quotation_id', $QuotationPriceListMain->quotation_id)
                                                        ->where('insurance_fee_id', $InsuranceFeeCostId_Val)
                                                        ->first();
                                @endphp
                                <td class="text-center">{{$QuotationPriceList ? number_format($QuotationPriceList->quotation_price_list_price,2) : '-'}}&nbsp;</td>
                            @endforeach

                            {{-- Other Cost Data --}}
                            @foreach ($OtherCostId as $OtherCostId_Val)
                                @php
                                    $QuotationPriceList = App\QuotationPriceList::where('main_quotation_price_list_id', $QuotationPriceListMain->quotation_price_list_id)
                                                        ->where('quotation_id', $QuotationPriceListMain->quotation_id)
                                                        ->where('other_expenses_id', $OtherCostId_Val)
                                                        ->first();
                                @endphp
                                <td class="text-center">{{$QuotationPriceList ? number_format($QuotationPriceList->quotation_price_list_price,2) : '-'}}&nbsp;</td>
                            @endforeach

                            <td>
                                @php $total = 0; @endphp
                                    @foreach ($data['QuotationPriceList'] as $QuotationPriceList)
                                    @php
                                        if($QuotationPriceListMain->quotation_price_list_id == $QuotationPriceList->main_quotation_price_list_id){
                                            if($QuotationPriceList->quotation_price_list_salary!=null){
                                                $total += $QuotationPriceList->quotation_price_list_salary;
                                            }else{
                                                $total += $QuotationPriceList->quotation_price_list_price;
                                            }
                                        }
                                    @endphp
                                    @endforeach

                                @php
                                    $total_all += $QuotationPriceListMain->quotation_price_list_salary+$total;
                                @endphp
                                <b>{{number_format($QuotationPriceListMain->quotation_price_list_salary+$total,2)}}</b>
                            </td>
                            <td class="text-right"><b>{{number_format($QuotationPriceListMain->quotation_price_list_price,2)}}</b></td>
                            <td class="text-right"><b>{{number_format($QuotationPriceListMain->quotation_price_list_price-($QuotationPriceListMain->quotation_price_list_salary+$total),2)}}</b></td>
                            <td class="text-right">
                                <b>{{number_format($QuotationPriceListMain->quotation_price_list_unit * ($QuotationPriceListMain->quotation_price_list_price-($QuotationPriceListMain->quotation_price_list_salary+$total)),2)}}</b>
                                @php $total_service += $QuotationPriceListMain->quotation_price_list_price; @endphp
                            </td>

                            <td class="text-center">
                                {{number_format($QuotationPriceListMain->quotation_price_list_taxi_price_sale,2)}}
                            </td>
                            <td class="text-center">
                                {{number_format($QuotationPriceListMain->quotation_price_list_travel_sale,2)}}</td>
                            <td class="text-center">
                                {{number_format($QuotationPriceListMain->quotation_price_list_accomadation_sale,2)}}
                            </td>

                            {{-- OverTime Cost Data --}}
                            @php $ic = 0; @endphp
                            @foreach ($StructureOtId as $StructureOt_Val)
                            @php
                                $QuotationPriceList = App\QuotationPriceListOt::where('quotation_price_list_id', $QuotationPriceListMain->quotation_price_list_id)
                                                ->where('quotation_id', $QuotationPriceListMain->quotation_id)
                                                ->where('price_structure_ot_id', $StructureOtId["$ic"])
                                                ->first();
                            @endphp
                            <td class="text-center">{{$QuotationPriceList ? number_format($QuotationPriceList->quotation_price_list_ot_price,2) : '-'}}&nbsp;</td>


                            @php $ic++; @endphp
                            @endforeach

                            {{-- OT Guarantee --}}
                            <td class="text-center">
                                @if($QuotationPriceListMain->quotation_price_list_ot_status==1)
                                    {{number_format($QuotationPriceListMain->quotation_price_list_guarantee_ot_price,2)}}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">{{$QuotationPriceListMain->quotation_price_list_service_charge_price_percent}} %</td>

                        </td>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="{{3 + $CustomerCost_length + $OtherCost_length + $InsuranceFeeCost_length}}" class="text-right"><b>ราคารวม</b></td>
                            <td class="text-right"><b>{{number_format($total_all,2)}}</b></td>
                            <td class="text-right"><b>{{number_format($total_service,2)}}</b></td>
                            <td class="text-right">-</td>
                            <td class="text-right"><b>{{number_format($total_service-$total_all,2)}}</b></td>
                            <td colspan="{{5 + $StructureOt_length}}"><b>คิดเป็น {{number_format((($total_service-$total_all)/$total_service)*100,2)}} %</b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

        <br>
        <div class="col-md-12">
            <p> <b>Remark :</b> </p>
        </div>
        <div class="col-md-12">
            {!!$data['quotation_condition']!!}
        </div>
        <br>

        <div class="col-md-12">
            <div class="table-responsive">
                <script>
                    $(document).ready(function(){
                        var quotation_id = '{{$data["quotation_id"]}}';
                        $.get(url_gb+'/admin/PreApprove/LineApprove',{id:quotation_id}, function(data){
                            // console.log(data);
                            $.each(data , function(index, value){
                                if(value.quotation_pre_approvec_lv == 1){
                                    $('#lv1').text(value.admin_user.first_name + ' ' + value.admin_user.last_name);
                                }
                                $('#app_'+index).text(value.admin_user.position.position_name);
                            });
                        });
                    });
                </script>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Corporate Consultant : <span id="lv1"></span></td>
                            <td colspan="1" rowspan="2">
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                            <td colspan="1" rowspan="2">
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                            <td colspan="1" rowspan="2">
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1" rowspan="2" class="text-center">
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <span id="app_0"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><span id="app_1"></span></td>
                            <td class="text-center"><span id="app_2"></span></td>
                            <td class="text-center"><span id="app_3"></span></td>
                        </tr>
                        <tr>
                            <td style="width:25%">Date :</td>
                            <td style="width:25%">Date :</td>
                            <td style="width:25%">Date :</td>
                            <td style="width:25%">Date :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                            <td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                            <td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-center"><span id="app_4"></span></td>
                            <td class="text-center"><span id="app_5"></span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Date :</td>
                            <td>Date :</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <br>
            <div class="col-md-12">
                <p> <b>ความคิดเห็นเพิ่มเติม :</b> </p>
                {!!$data['quotation_delivery_schedule']!!}
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <a href="{{ url('admin/PreApprove/print_pre_approve') }}/{{$QuotationPriceListMain['quotation_id']}}" target="_blank" class="btn btn-warning btn-md">Print</a>
            </div>
        </div>
    </div>

</div>
