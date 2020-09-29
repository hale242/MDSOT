<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quotation</title>
    <style>
        @page {
            margin: 30px;
            /* margin-left: 20px;
            margin-right: 20px;
            margin-bottom: 20px; */
        }

        body {
            font-family: 'thsarabun';
            font-size: 20px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        td {
            line-height: 20px;
        }
    </style>
</head>

<body>
    <div class="row" align="center">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table" width="700">
                    <tbody>
                        <tr>
                            <td width="230" align="center" colspan="2"> <img src="{{asset('uploads/images/logo.png')}}" height="80" alt="Logo" /> </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <h3> ประวัติพนักงานขับรถยนต์ / Driver Profile </h3>
                            </td>
                            <td align="right" width="100"> <img src="{{asset($Driver->viewImage())}}" width="120" height="180" alt="Logo" /> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table" width="700" cellpadding="5">

                <tbody>
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">ชื่อ-สกุล / Name - Surname</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{ $Driver->gender_id == 1 ? 'นาย' : ($Driver->gender_id == 2 ? 'นางสาว' : ($Driver->gender_id == 3 ? 'นาง' : '-')) }} {{ $Driver->driver_name_th.' '.$Driver->driver_lastname_th }}
                                / {{ $Driver->gender_id == 1 ? 'Mr.' : ($Driver->gender_id == 2 ? 'Miss.' : ($Driver->gender_id == 3 ? 'Mrs.' : '-')) }} {{ $Driver->driver_name_en.' '.$Driver->driver_lastname_en }}
                            </label> </th>
                    </tr>
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">วันเดือนปีเกิด / Date of birth</label> </td>
                        <td width="10">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{$Driver->driver_date_of_birth ? $Driver->driver_date_of_birth : '-'}}</label> </th>
                    </tr>
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">อายุ / Age</label> </td>
                        <td width="10">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{$Driver->driver_age ? $Driver->driver_age : '-'}} ปี</label> </th>
                    </tr>
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">ที่อยู่ / Address</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{ $Driver->driver_address.' '.$Driver->districts->districts_name.' '.$Driver->districts->amphures->amphures_name.' '.$Driver->districts->provinces->provinces_name.' '.$Driver->districts->zipcode->zipcodes_name}}
                            </label> </th>
                    </tr>
                    <tr>
                        <td width="230"> </td>
                        <td width="1"></td>
                        <th colspan="2" class="text-left">{{ $Driver->driver_address_en.', '.$Driver->districts->districts_name_en.', '.$Driver->districts->amphures->amphures_name_en.', '.$Driver->districts->provinces->provinces_name_en.', '.$Driver->districts->zipcode->zipcodes_name}}</label> </th>
                    </tr>
                    @if(App\Helper::CheckOparetion())
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">เบอร์โทรศัพท์ / Phone No.</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{$Driver->driver_phone ? $Driver->driver_phone : '-'}}</label> </th>
                    </tr>
                    @endif
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">เลขที่บัตรประชาชน / ID Card</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{$Driver->driver_id_card_no ? $Driver->driver_id_card_no : '-' }}</label> </th>
                    </tr>
                    {{ $count = 1 }}
                    @if(count($Driver->EducationDriver)>0)
                    @foreach($Driver->EducationDriver as $val)
                    <tr>
                        @if($count == 1)
                        <td width="230"> <label for="example-text-input" class="col-form-label">การศึกษา / Education</label> </td>
                        @else
                        <td width="230"> <label for="example-text-input" class="col-form-label"></label> </td>
                        @endif
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label"></label>
                            {{ $val->education_driver_status== '1' ? 'ประถมศึกษา (Primary)' :
                           ($val->education_driver_status== '2' ? 'มัธยมศึกษา (Secondary)' :
                           ($val->education_driver_status== '3' ? 'อาชีวศึกษา (Vocational)' :
                           ($val->education_driver_status== '4' ? 'ปริญญาตรี (Bachelor)' :
                           ($val->education_driver_status== '5' ? 'ปริญญาโท (Master)' :
                           ($val->education_driver_status== '6' ? 'อื่นๆ' : '-'
                           ))))) }} /
                            {{ $val->education_driver_name_instirute }}</th>
                    </tr>
                    {{ $count++ }}
                    @endforeach
                    @else
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">การศึกษา / Education</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label"></label> - </th>
                    </tr>
                    @endif
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">ชื่อ-สกุล บิดา / Father name</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{$Driver->driver_father_name.' '.$Driver->driver_father_lastname.' / '.$Driver->driver_father_name_en.' '.$Driver->driver_father_lastname_en }}</label> </th>
                    </tr>
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">ชื่อ-สกุล มารดา / Mother name</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{$Driver->driver_mother_name.' '.$Driver->driver_mother_lastname.' / '.$Driver->driver_mother_name_en.' '.$Driver->driver_mother_lastname_en }}</label> </th>
                    </tr>
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">สถานภาพ / Marital status</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{ $Driver->driver_status_family == 1 ? 'โสด' : 
                            ($Driver->driver_status_family == 2 ? 'สมรสจดทะเบียน' : 
                            ($Driver->driver_status_family == 3 ? 'สมรสไม่จดทะเบียน' : 
                            ($Driver->driver_status_family == 4 ? 'หย่า' : 
                            ($Driver->driver_status_family == 5 ? 'หม้าย' : 
                            '-'))))}}</label> </th>
                    </tr>
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">คู่สมรส ชื่อ-สกุล / Spouse name</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{ $Driver->driver_spouse_name.' '.$Driver->driver_spouse_lastname.' / '.$Driver->driver_spouse_name_en.' '.$Driver->driver_spouse_lastname_en }}</label> </th>
                    </tr>
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">จำนวนบุตร / No. of your children</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{ $Driver->driver_children ? $Driver->driver_children : '-'}} คน</label> </th>
                    </tr>
                    {{ $count_1 = 1 }}
                    @if(count($Driver->WorkHistory)>0)
                    @foreach($Driver->WorkHistory as $val)
                    <tr>
                        @if($count_1 == 1)
                        <td width="230"> <label for="example-text-input" class="col-form-label">ประสบการณ์เดิม / Last Experience</label> </td>
                        @else
                        <td width="230"> <label for="example-text-input" class="col-form-label"></label> </td>
                        @endif
                        <td width="1">:</td>
                        <th class="text-left"> <label for="example-text-input" class="col-form-label"></label>{{ $val->work_history_company }}</th>
                        <th colspan="2"> <label for="example-text-input" class="col-form-label"></label>{{ $val->work_history_to.'-'.$val->work_history_from }}</th>

                    </tr>
                    {{ $count_1++ }}
                    @endforeach
                    @else
                    <tr>
                        <td width="230"> <label for="example-text-input" class="col-form-label">ประสบการณ์เดิม / Last Experience</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label"></label> - </th>
                    </tr>
                    @endif
                    <tr>
                        <td> <label for="example-text-input" class="col-form-label">ตำแหน่ง / Position</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label">{{ $Driver->RecruitmentPosition->recruitment_position_name ? $Driver->RecruitmentPosition->recruitment_position_name : '-' }}</label> </th>
                    </tr>
                    <!-- <tr>
                        <td> <label for="example-text-input" class="col-form-label">ทักษะด้านภาษา / Language Skills</label> </td>
                        <td width="1">:</td>
                        <th colspan="2" class="text-left"> <label for="example-text-input" class="col-form-label"> พอใช้ (Fair)</label> </th>
                    </tr> -->
                    <tr>
                        <td align="center" colspan="5" style="background-color: black; color: white;">222/9 ซอยลาดพร้าว 112 ถนนลาดพร้าว แขวงพลับพลา เขตวังทองหลาง กรุงเทพมหานคร 10310</td>
                    </tr>
                    <tr>
                        <td align="right" colspan="5">FM-MDS-RCT-007</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>