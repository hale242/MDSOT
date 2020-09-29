<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quotation</title>
    <style>
        @page{
            margin: 30px;
            /* margin-left: 20px;
            margin-right: 20px;
            margin-bottom: 20px; */
        }
        body{
            font-family: 'thsarabun';
            font-size: 16px;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        td {
            line-height: 20px;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td colspan="3"><img src="{{asset('uploads/images/logo.png')}}" width="35%" alt="homepage" class="dark-logo" /></td>
        </tr>
        <tr>
            <td colspan="3" class="text-center font-weight-bold">
                <b>
                    <h3><u>Quotation</u></h3>
                </b>
            </td>
        </tr>
        <tr>
            <td colspan="2">Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$quotation->quotation_date_doc ? date('d/m/Y', strtotime($quotation->quotation_date_doc)) : ''}}</td>
            <td class="text-center"><h3>{{$quotation->quotation_full_code}}</h3></td>
        </tr>
        <tr>
            <td colspan="2">{{$quotation->Customer ? $quotation->Customer->customer_name : ''}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><b>Company Name &nbsp;&nbsp;&nbsp;: </b>&nbsp;&nbsp;&nbsp;&nbsp; {{$quotation->Company ? $quotation->Company->company_name_th : ''}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">
                {{$quotation->Customer ? $quotation->Customer->driver_address : ''}}
                {{$quotation->Customer && $quotation->Customer->Districts && $quotation->Customer->Districts->Amphures ? $quotation->Customer->Districts->Amphures->amphures_name : ''}}
                {{$quotation->Customer && $quotation->Customer->Districts && $quotation->Customer->Districts->Provinces ? $quotation->Customer->Districts->Provinces->provinces_name : ''}}
                {{$quotation->Customer && $quotation->Customer->Districts && $quotation->Customer->Districts->Zipcode ? $quotation->Customer->Districts->Zipcode->zipcodes_name : ''}}
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">{{$quotation->Customer ? $quotation->Customer->customer_email : ''}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">{{$quotation->Customer ? $quotation->Customer->customer_phone : ''}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">Subject : {{$quotation->quotation_title}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">Thank you for your kind interested in Master Driver & Services, We are pleased to propose our rental rate and for your confirmation as per the followings:</td>
        </tr>
      </table>

    <table width="100%" border="1" cellspacing="0" cellpadding="0">
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

    <table width="100%">
        <tr>
            <td colspan="2">The rental rate : Exclusive of Vat 7%</td>
        </tr>
        <tr>
            <td width="11%" valign="top"><u>Condition</u> :</td>
            <td>{!!$quotation->quotation_condition!!}</td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="18%"></td>
            <td></td>
        </tr>
        <tr>
            <td width="18%" valign="top">Deliverry Schedule :</td>
            <td>{!!$quotation->quotation_delivery_schedule!!}</td>
        </tr>
        <tr>
            <td width="18%"></td>
            <td></td>
        </tr>
    </table>


    <table width="100%">
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>
                <p>Our rental program includes Employee spare amd Staff change at the end of Rental Contract.</p>
                <b>Call Center Number is 0-2935-2333 (24 hours)</b>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>
                <p>Very truely yours,</p>
                <b> Master Driver & Services Co., Ltd. </b>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>
                (ชื่อเซลล์) <br />
                (ตำแหน่งเซลล์) <br />
                Mobile : (เบอร์โทรเซลล์)<br />
                E-mail : (e-mail เซลล์)
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">FM-MDS-LTR-005</td>
        </tr>
    </table>
</body>
</html>
