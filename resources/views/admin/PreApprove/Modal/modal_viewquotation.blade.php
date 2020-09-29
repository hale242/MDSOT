<div class="modal-header">
    <h4 class="modal-title">View Quotation</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
</div>

<div class="modal-body form-horizontal">
    <div class="form-group mt-12 row">
        <div class="col-md-12">
            <img src="https://intervision.co/mock-up/assets/images/mdsot/logo MASTER-02.png" height="80" alt="Logo" />
        </div>

        <div class="col-md-12">
            {{-- {{GF::print_r($quotation)}}
            {{GF::print_r($PriceStructureOT)}} --}}
        </div>

        <div class="col-md-12 text-center mt-4 mb-2">
            <p style="font-size:16px"> <u> <b> Quotation </b> </u> </p>
        </div>
        <div class="col-md-8 mb-3">
            <p> Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$quotation->quotation_date_doc ? date('d/m/Y', strtotime($quotation->quotation_date_doc)) : ''}}</p>
        </div>
        <div class="col-md-4">
            <p style="font-size:14px" class="font-weight-bold"> {{$quotation->quotation_full_code}} </p>
        </div>
        <div class="col-md-12 mb-3">
            <p>{{$quotation->Customer ? $quotation->Customer->customer_name : ''}}</p>
        </div>
        <div class="col-md-12">
            <p> <b>Company Name &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</b><b>{{$quotation->Company ? $quotation->Company->company_name_th : ''}}</b></p>
        </div>
        <div class="col-md-12">
            <p>
                {{$quotation->Customer ? $quotation->Customer->driver_address : ''}}
                {{$quotation->Customer && $quotation->Customer->Districts && $quotation->Customer->Districts->Amphures ? $quotation->Customer->Districts->Amphures->amphures_name : ''}}
                {{$quotation->Customer && $quotation->Customer->Districts && $quotation->Customer->Districts->Provinces ? $quotation->Customer->Districts->Provinces->provinces_name : ''}}
                {{$quotation->Customer && $quotation->Customer->Districts && $quotation->Customer->Districts->Zipcode ? $quotation->Customer->Districts->Zipcode->zipcodes_name : ''}}
            </p>
        </div>
        <div class="col-md-12">
            <p>{{$quotation->Customer ? $quotation->Customer->customer_email : ''}}</p>
        </div>
        <div class="col-md-12">
            <p>{{$quotation->Customer ? $quotation->Customer->customer_phone : ''}}</p>
        </div>
        <br>
        <div class="col-md-12">
            <p>Subject : {{$quotation->quotation_title}}</p>
        </div>
        <br><br>
        <div class="col-md-12">
            <p>Thank you for your kind interested in Master Driver & Services, We are pleased to propose our rental rate and for your confirmation as per the followings: </p>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th style="text-align: center; vertical-align: middle;"><b> Quantity</b></th>
                        <th width="25%" style="text-align: center; vertical-align: middle;"><b>Driver Price Rate/Person </b></th>
                        @foreach($PriceStructureOT as $val)
                            <th width="10%" style="text-align: center; vertical-align: middle;"><b>{{$val->price_structure_ot_name}}</b></th>
                        @endforeach
                        <th width="11%" style="text-align: center; vertical-align: middle;">
                            <p style="font-size: 50% !important;">
                                <b>
                                    Taxi Price <br />
                                    Before 6.01 am.<br />
                                    & After 21.59 <br />
                                    pm./Time
                                </b>
                            </p>
                        </th>
                        <th width="10%" style="text-align: center; vertical-align: middle;">
                            <p style="font-size: 50% !important;"><b>Travel allowances provincial / Day </b></p>
                        </th>
                        <th width="10%" style="text-align: center; vertical-align: middle;">
                            <p style="font-size: 50% !important;">
                                <b>
                                    Allowances <br />
                                    provincial <br />
                                    (Accomadat<br />
                                    ion)/Day
                                </b>
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotation->QuotationPriceListMain as $item)
                        <tr>
                            <td class="text-center" width="10%">{{$item->quotation_price_list_unit}}</td>
                            <td class="text-right" width="15%">{{number_format($item->quotation_price_list_price, 2)}}&nbsp;</td>
                            @foreach($PriceStructureOT as $val)
                                @php
                                    $QuotationPriceListOt = App\QuotationPriceListOt::where('quotation_id', $item->quotation_id)->where('quotation_price_list_id', $item->quotation_price_list_id)->where('price_structure_ot_id', $val->price_structure_ot_id)->first();
                                @endphp
                                <td class="text-right">{{$QuotationPriceListOt ? number_format($QuotationPriceListOt->quotation_price_list_ot_price,2) : ''}}&nbsp;</td>
                            @endforeach
                            <td class="text-right">{{number_format($item->quotation_price_list_taxi_price_sale, 2)}}&nbsp;</td>
                            <td class="text-right">{{number_format($item->quotation_price_list_travel_sale, 2)}}&nbsp;</td>
                            <td class="text-right">{{number_format($item->quotation_price_list_accomadation_sale, 2)}}&nbsp;</td>
                        </tr>
                    @endforeach
                    @for($i=count($quotation->QuotationPriceListMain); $i<=12; $i++)
                        <tr>
                            <td>&nbsp;</td>
                            <td></td>
                            @foreach($PriceStructureOT as $val)
                                <td></td>
                            @endforeach
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <br>
        <div class="col-md-12">
            <p> The rental rate : Exclusive of Vat 7% </p>
        </div>
        <div class="col-md-12">
            <p> Condition : _________________________________</p>
        </div>
        <div class="col-md-12">
            <p>{!!$quotation->quotation_condition!!}</p>
        </div>
        <br>
        <div class="col-md-12">
            <p> Deliverry Schedule : {!!$quotation->quotation_delivery_schedule!!}</p>
        </div>
        <br>
        <div class="col-md-12">
            <p> Our rental program includes Employee spare amd Staff change at the end of Rental Contract. <br>
                <b> Call Center Number is 0-2935-2333 (24 hours) </b> </p>
        </div>
        <br><br>
        <div class="col-md-12">
            <p> Very truely yours, <br>
                <b> Master Driver & Services Co., Ltd. </b> </p>
        </div>
        <br><br><br>
        <div class="col-md-12"> Sunisaa Janpirom <br>
            Corporate Consultant <br>
            Mobile : 091 - 2345678<br>
            E-mail : <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6310160d0a10020223170610170e020a0f4d000c0e">[email&#160;protected]</a>
        </div>
        <div class="col-md-12 text-right">
            <br>
            <p>FM-MDS-LTR-005</p>
        </div>
        <div class="col-md-12 text-center mt-2">
            <a href="{{ url('admin/Quotation/print_view') }}" target="_blank" type="button" class="btn btn-warning btn-md" data-product_id="1">
                Print
            </a>
        </div>
    </div>
</div>

