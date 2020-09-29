<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver Profile</title>
    <style>
        @page{
            /* margin-top: 15px;
            margin-left: 15px;
            margin-right: 15px;
            margin-bottom: 15px; */
        }
        body{
            font-family: 'thsarabun';
            font-size: 18px;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="row" align="center">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table" width="100%">
                    <tbody>
                        <tr>
                            <td class="text-center" colspan="2"><img src="{{asset('uploads/images/logo.png')}}" height="50" alt="Logo" /></td>
                        </tr>
                        <tr>
                            <td class="text-center"><h3> ประวัติพนักงานขับรถยนต์ / Driver Profile </h3></td>
                            <td class="text-right"><img src="{{asset($Driver->viewImage())}}" width="100"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table" width="700" cellpadding="10">
                <!-- border="1" cellspacing="0" -->
                <tbody>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">ชื่อ-สกุล / Name</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_name_th.' '.$Driver->driver_lastname_th}} / {{$Driver->driver_name_en.' '.$Driver->driver_lastname_en}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">วันเดือนปีเกิด / Birth day</label></td>
                        <td width="10">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_date_of_birth ? date("d/m/Y", strtotime($Driver->driver_date_of_birth)) : ''}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">อายุ / Age</label></td>
                        <td width="10">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_age}} ปี</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">ที่อยู่ / Post Address</label></td>
                        <td width="1">:</td>
                        <td colspan="3">
                            <label for="example-text-input" class="col-form-label">
                                {{$Driver->driver_address}}
                                {{$Driver->Districts && $Driver->Districts->Amphures ? $Driver->Districts->Amphures->amphures_name : ''}}
                                {{$Driver->Districts && $Driver->Districts->Provinces ? $Driver->Districts->Provinces->provinces_name : ''}}
                                {{$Driver->Districts && $Driver->Districts->Zipcode ? $Driver->Districts->Zipcode->zipcodes_name : ''}}
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="230"></td>
                        <td width="1"></td>
                        <td colspan="3">
                            <label for="example-text-input" class="col-form-label">
                                {{$Driver->driver_address_en}}
                                {{$Driver->Districts && $Driver->Districts->Amphures ? $Driver->Districts->Amphures->amphures_name_en : ''}}
                                {{$Driver->Districts && $Driver->Districts->Provinces ? $Driver->Districts->Provinces->provinces_name_en : ''}}
                                {{$Driver->Districts && $Driver->Districts->Zipcode ? $Driver->Districts->Zipcode->zipcodes_name : ''}}
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">เบอร์โทรศัพท์ / Phone No.</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_mobile_phone}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">เลขที่บัตรประชาชน / ID Card</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_id_card_no}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">การศึกษา / Education</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->EducationDriverLast ? $Driver->EducationDriverLast->statusEducationDriver[$Driver->EducationDriverLast->education_driver_status] : ''}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">ชื่อ-สกุล บิดา / Father naem</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_father_name.' '.$Driver->driver_father_lastname}} / {{$Driver->driver_father_name_en.' '.$Driver->driver_father_lastname_en}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">ชื่อ-สกุล มารดา / Mother name</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_mother_name.' '.$Driver->driver_mother_lastname}} / {{$Driver->driver_mother_name_en.' '.$Driver->driver_mother_lastname_en}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">สถานภาพ / Material status</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_status_family ? $Driver->statusFamily[$Driver->driver_status_family] : ''}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">คู่สมรส ชื่อ-สกุล / Spouse name</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_spouse_name.' '.$Driver->driver_spouse_lastname}} / {{$Driver->driver_spouse_name_en.' '.$Driver->driver_spouse_lastname_en}}</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">จำนวนบุตร / Children</label></td>
                        <td width="1">:</td>
                        <td colspan="3"><label for="example-text-input" class="col-form-label">{{$Driver->driver_children}} คน</label></td>
                    </tr>
                    <tr>
                        <td width="230"><label for="example-text-input" class="col-form-label">ประสบการณ์เดิม / Last Experience</label></td>
                        <td width="1">:</td>
                        <td><label for="example-text-input" class="col-form-label">{{isset($Driver->WorkHistory[0]) ? $Driver->WorkHistory[0]->work_history_company : ''}}</label></td>
                        <td colspan="2"><label for="example-text-input" class="col-form-label">จำนวน {{isset($Driver->WorkHistory[0]) ? ($Driver->WorkHistory[0]->work_history_to - $Driver->WorkHistory[0]->work_history_from) : ''}} ปี</label></td>
                    </tr>
                    @foreach($Driver->WorkHistory as $key=>$val)
                        @if($key != 0)
                            <tr>
                                <td width="230">  </td>
                                <td width="1">:</td>
                                <td><label for="example-text-input" class="col-form-label">{{$val->work_history_company}}</label></td>
                                <td colspan="3">  <label for="example-text-input" class="col-form-label">จำนวน {{($val->work_history_to - $val->work_history_from)}} ปี</label></td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td><label for="example-text-input" class="col-form-label">ตำแหน่ง / Position</label></td>
                        <td width="1">:</td>
                        <td colspan="3">  <label for="example-text-input" class="col-form-label">{{$Driver->RecruitmentPosition ? $Driver->RecruitmentPosition->recruitment_position_name : ''}}</label></td>
                    </tr>
                    @foreach($Driver->DriverLanguage as $val)
                        <tr>
                            <td><label for="example-text-input" class="col-form-label">ทักษะด้านภาษา / Language Skills ({{$val->LanguageType ? $val->LanguageType->language_type_name : ''}})</label></td>
                            <td width="1">:</td>
                            <td><label for="example-text-input" class="col-form-label">การพูด ({{$val->statusLanguageSkill[$val->driver_language_speaking]}})</label></td>
                            <td><label for="example-text-input" class="col-form-label">การอ่าน ({{$val->statusLanguageSkill[$val->driver_language_reading]}})</label></td>
                            <td><label for="example-text-input" class="col-form-label">การเขียน ({{$val->statusLanguageSkill[$val->driver_language_writing]}})</label></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
