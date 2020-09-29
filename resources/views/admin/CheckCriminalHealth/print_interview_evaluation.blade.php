<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แบบประเมินผลการสัมภาษณ์</title>
    <style>
        @page {
            /* margin-top: 15px;
            margin-left: 15px;
            margin-right: 15px;
            margin-bottom: 15px; */
        }

        body {
            font-family: 'thsarabun';
            font-size: 18px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        th {
            line-height: 1.3;
        }

        td {
            line-height: 1.3;
        }

        .rotate {
            white-space: nowrap;
            -webkit-transform: rotate(-90deg);
            -webkit-transform-origin: 10px;
            -moz-transform: rotate(-90deg);
            -moz-transform-origin: 10px;
            -ms-transform: rotate(-90deg);
            -ms-transform-origin: 10px;
            -o-transform: rotate(-90deg);
            -o-transform-origin: 10px;
            transform: rotate(-90deg);
            transform-origin: 10px;
        }

        .head {
            background-color: #bcbcbc;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <th>
                <h3>{{$HeadDocument->head_documents_name_th}}</h3>
            </th>
        </tr>
        <tr>
            <th>
                <h4>แบบประเมินผลการสัมภาษณ์ (Interview Evaluation)</h4>
            </th>
        </tr>
        <tr>
            <th>
                ชื่อ-นามสกุล : ........{{$DriverInterview->Driver ? $DriverInterview->Driver->driver_name_th.' '.$DriverInterview->Driver->driver_lastname_th : ''}}........
                วันที่ : {{$DriverInterview->Driver ? date("d/m/Y", strtotime($DriverInterview->Driver->driver_interview_date)) : '...................................'}}
            </th>
        </tr>
    </table>

    <table width="100%" border="1" cellspacing="0">
        <thead>
            <tr>
                <th rowspan="4">ลำดับ </th>
                <th rowspan="4">หัวข้อการประเมิน (Evaluation Items)</th>
                <th colspan="9">ผลการประเมิน</th>
                <th rowspan="4">หมายเหตุ</th>
            </tr>
            <tr>
                <th colspan="4">Recruit MDS.</th>
                <th colspan="4">Operation MDS.</th>
                <th rowspan="3">ยอดรวม</th>
            </tr>
            <tr>
                <th width="50px">ดีมาก</th>
                <th width="50px">ดี</th>
                <th width="50px">พอใช้</th>
                <th width="50px">ปรับปรุง</th>
                <th width="50px">ดีมาก</th>
                <th width="50px">ดี</th>
                <th width="50px">พอใช้</th>
                <th width="50px">ปรับปรุง</th>
            </tr>
            <tr>
                <th width="50px">10-9</th>
                <th width="50px">8-7</th>
                <th width="50px">6-5</th>
                <th width="50px">4-0</th>
                <th width="50px">10-9</th>
                <th width="50px">8-7</th>
                <th width="50px">6-5</th>
                <th width="50px">4-0</th>
            </tr>
        </thead>
        <tbody>
            @foreach($DriverInterview->DriverPersonalityTest as $key_1=>$val)
            <tr>
                <td class="text-center">{{($key_1+1)}}</td>
                <td>{{$val->DriverPersonality ? $val->DriverPersonality->driver_personality_name_th : ''}}</td>
                <!-- <td class="text-center">{{$val->driver_personality_test_point_recrult}}</td>
                    <td class="text-center">{{$val->driver_personality_test_point_operation}}</td> -->
                <td class="text-center">{{ $val->driver_personality_test_point_recrult >= 9 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_personality_test_point_recrult <= 8 && $val->driver_personality_test_point_recrult >= 7 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_personality_test_point_recrult <= 6 && $val->driver_personality_test_point_recrult >= 5 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_personality_test_point_recrult <= 4 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_personality_test_point_operation >= 9 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_personality_test_point_operation <= 8 && $val->driver_personality_test_point_operation >= 7 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_personality_test_point_operation <= 6 && $val->driver_personality_test_point_operation >= 5 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_personality_test_point_operation <= 4 ? '/' : '' }}</td>

                <td class="text-center">{{$val->driver_personality_test_sum}}</td>
                <td>{{$val->driver_personality_test_comment}}</td>
            </tr>
            @endforeach
            @foreach($DriverInterview->DriverTestTextTest as $key_2=>$val)
            <tr>
                <td class="text-center">{{($key_1+1) + ($key_2+1)}}</td>
                <!-- @if($key_2 == 0)
                    <td rowspan="2">test</td>
                    @endif -->
                <td>{{$val->DriverTestText ? $val->DriverTestText->driver_test_text_name_th : ''}}</td>
                <!-- <td class="text-center">{{$val->driver_test_text_test_point_recrult}}</td>
                    <td class="text-center">{{$val->driver_test_text_test_point_operation}}</td> -->
                <td class="text-center">{{ $val->driver_test_text_test_point_recrult >= 9 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_text_test_point_recrult <= 8 && $val->driver_test_text_test_point_recrult >= 7 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_text_test_point_recrult <= 6 && $val->driver_test_text_test_point_recrult >= 5 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_text_test_point_recrult <= 4 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_text_test_point_operation >= 9 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_text_test_point_operation <= 8 && $val->driver_test_text_test_point_operation >= 7 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_text_test_point_operation <= 6 && $val->driver_test_text_test_point_operation >= 5 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_text_test_point_operation <= 4 ? '/' : '' }}</td>

                <td class="text-center">{{$val->driver_test_text_test_sum}}</td>
                <td>{{$val->driver_test_text_test_comment}}</td>
            </tr>
            @endforeach
            @foreach($DriverInterview->DriverTestDriverTest as $key_3=>$val)
            <tr>
                <td class="text-center">{{($key_1+1) + ($key_2+1) + ($key_3+1)}}</td>
                <td>{{$val->DriverTestDriver ? $val->DriverTestDriver->driver_test_driver_name_th : ''}}</td>
                <!-- <td class="text-center">{{$val->driver_test_driver_test_point_recrult}}</td>
                    <td class="text-center">{{$val->driver_test_driver_test_point_operation}}</td> -->
                <td class="text-center">{{ $val->driver_test_driver_test_point_recrult >= 9 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_driver_test_point_recrult <= 8 && $val->driver_test_driver_test_point_recrult >= 7 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_driver_test_point_recrult <= 6 && $val->driver_test_driver_test_point_recrult >= 5 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_driver_test_point_recrult <= 4 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_driver_test_point_operation >= 9 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_driver_test_point_operation <= 8 && $val->driver_test_driver_test_point_operation >= 7 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_driver_test_point_operation <= 6 && $val->driver_test_driver_test_point_operation >= 5 ? '/' : '' }}</td>
                <td class="text-center">{{ $val->driver_test_driver_test_point_operation <= 4 ? '/' : '' }}</td>

                <td class="text-center">{{$val->driver_test_driver_test_sum}}</td>
                <td>{{$val->driver_test_driver_test_comment}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            @php
            $sum_recrult = 0;
            $sum_operation = 0;
            $sum_all = 0;
            $sum_max = 0;
            $percent = 0;

            if($DriverInterview->DriverPersonalityTest){
            $sum_recrult += $DriverInterview->DriverPersonalityTest->sum('driver_personality_test_point_recrult');
            }
            if($DriverInterview->DriverTestTextTest){
            $sum_recrult += $DriverInterview->DriverTestTextTest->sum('driver_test_text_test_point_recrult');
            }
            if($DriverInterview->DriverTestDriverTest){
            $sum_recrult += $DriverInterview->DriverTestDriverTest->sum('driver_test_driver_test_point_recrult');
            }

            if($DriverInterview->DriverPersonalityTest){
            $sum_operation += $DriverInterview->DriverPersonalityTest->sum('driver_personality_test_point_operation');
            }
            if($DriverInterview->DriverTestTextTest){
            $sum_operation += $DriverInterview->DriverTestTextTest->sum('driver_test_text_test_point_operation');
            }
            if($DriverInterview->DriverTestDriverTest){
            $sum_operation += $DriverInterview->DriverTestDriverTest->sum('driver_test_driver_test_point_operation');
            }

            if($DriverInterview->DriverPersonalityTest){
            $sum_all += $DriverInterview->DriverPersonalityTest->sum('driver_personality_test_sum');
            }
            if($DriverInterview->DriverTestTextTest){
            $sum_all += $DriverInterview->DriverTestTextTest->sum('driver_test_text_test_sum');
            }
            if($DriverInterview->DriverTestDriverTest){
            $sum_all += $DriverInterview->DriverTestDriverTest->sum('driver_test_driver_test_sum');
            }

            if($DriverInterview->DriverPersonalityTest){
            $sum_max += $DriverInterview->DriverPersonalityTest->sum('driver_personality_test_max');
            }
            if($DriverInterview->DriverTestTextTest){
            $sum_max += $DriverInterview->DriverTestTextTest->sum('driver_test_text_test_max');
            }
            if($DriverInterview->DriverTestDriverTest){
            $sum_max += $DriverInterview->DriverTestDriverTest->sum('driver_test_driver_test_max');
            }

            $percent = ($sum_all * 100) / $sum_max;
            @endphp
            <tr>
                <th colspan="2">ยอดรวม</th>
                <th colspan="4" class="text-center">{{$sum_recrult}}</th>
                <th colspan="4" class="text-center">{{$sum_operation}}</th>
                <th class="text-center">{{$sum_all}}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <br>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <th colspan="4" class="text-center">ผลสัมภาษณ์และความคิดเห็น คะแนนรวม ...<b>{{$sum_all}}</b>... คิดเป็น ...{{number_format($percent, 2)}}... % (เกณฑ์ผ่านการสัมภาษณ์ที่ 60 %)</th>
        </tr>
        <tr>
            <th colspan="2" class="text-center head">Recruit MDS.</th>
            <th colspan="2" class="text-center head">Operation MDS.</th>
        </tr>
        <tr>
            <td><input type="checkbox"> ผ่าน (Pass)</td>
            <td><input type="checkbox"> ไม่ผ่าน (Uppass) (60%)</td>
            <td><input type="checkbox"> ผ่าน (Pass)</td>
            <td><input type="checkbox"> ไม่ผ่าน (Uppass) (60%)</td>
        </tr>
        <tr>
            <td colspan="2" width="100%">
                <b><u>สาเหตุที่รับกรณีที่ไม่ผ่านเกณฑ์</u></b><br>
                <input type="checkbox"> ไม่มีประสบการณ์ แต่รู้เส้นทางดี<br>
                <input type="checkbox"> มีประสบการณ์ขับรถยนต์ส่วนกลางเท่านั้น<br>
                <input type="checkbox"> มีประสบการณ์ขับรถยนต์น้อย แต่สามารถพัฒนาได้<br>
                <input type="checkbox"> _________________________________________
            </td>
            <td colspan="2" width="100%">
                <b><u>สาเหตุที่รับกรณีที่ไม่ผ่านเกณฑ์</u></b><br>
                <input type="checkbox"> ไม่มีประสบการณ์ แต่รู้เส้นทางดี<br>
                <input type="checkbox"> มีประสบการณ์ขับรถยนต์ส่วนกลางเท่านั้น<br>
                <input type="checkbox"> มีประสบการณ์ขับรถยนต์น้อย แต่สามารถพัฒนาได้<br>
                <input type="checkbox"> _________________________________________
            </td>
        </tr>
        <tr>
            <td colspan="2"><u><b>ข้อคิดเห็น / ข้อเสนอแนะ</b></u></td>
            <td colspan="2"><u><b>ข้อคิดเห็น / ข้อเสนอแนะ</b></u></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center">Senior Recruitment Officer<br>วันที่ : ___________________</th>
            <th colspan="2" class="text-center">Oparetion Manager<br>วันที่ : ___________________</th>
        </tr>
    </table>
</body>

</html>