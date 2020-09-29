<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver Profile</title>
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

        table {
            border-collapse: collapse;
        }

        .border-table td,
        th {
            border-collapse: collapse;
            border: 1px solid #dddddd;
        }

        .under-line {
            border-bottom: 1px solid #000;
            padding: 0px 7px;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .head {
            background-color: #bcbcbc;
        }

        .table-responsive {
            padding-bottom: 15;
        }
    </style>
</head>

<body>
    <div class="row" align="center">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table" width="100%">
                    <tbody>
                        <!-- <tr>
                            <td class="text-center" colspan="2"><img src="{{asset('uploads/images/logo.png')}}" height="50" alt="Logo" /></td>
                        </tr> -->
                        <tr>
                            <td class="text-center" colspan="2">
                                <h1>ใบสมัครงาน</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2">
                                <h2>Application for Employment</h2>
                            </td>
                        <tr>
                        <tr>
                            <td class="text-center" colspan="2">
                                <h6>กรุณากรอกข้อมูลให้ครบถ้วนและแนบหลักฐานการสมัครงานของท่าน เพื่อประโยชน์ในการพิจารณาคัดเลือกตําแหน่งงานที่เหมาะสมสําหรับท่าน</h6>
                            </td>
                        <tr>
                        <tr>
                            <td class="text-center" colspan="2">
                                <h6>Please fill-in application and attach your documents for an employment application to this form. We will consider you for a suitable position.</h6>
                            </td>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table" width="700">
                <!-- border="1" cellspacing="0" -->
                <tbody>
                    <tr>
                        <td width="150"><b>ตําแหน่งงานที่ท่านสมัคร</b></td>
                        <td colspan="3" class="under-line">{{$Driver->RecruitmentPosition ? $Driver->RecruitmentPosition->recruitment_position_name : ''}}</td>
                        <td width="80"><b>วันที่</b></td>
                        <td colspan="3" class="under-line">{{$Driver->RecruitmentPosition ? $Driver->driver_date_in_com : ''}}</td>
                    </tr>
                    <tr>
                        <td width="150">Required Position</td>
                        <td colspan="3"></td>
                        <td width="80">Date</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table" width="700">
                <!-- border="1" cellspacing="0" -->
                <tbody>
                    <tr>
                        <td class="head" colspan="5">
                            <h4>รายละเอียดส่วนตัวของท่าน (Personal Information)</h4>
                        </td>
                        <td rowspan="6"><img src="{{asset($Driver->viewImage())}}" style="height: 165px;width:150px;"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>คํานําหน้าชื่อ</b></td>
                        <td width="120">(Thai)</td>
                        <td width="100"><input type="checkbox" {{ $Driver->gender->gender_id == 1 ? 'checked="checked"' : '' }}> นาย (Mr)</td>
                        <td width="100"><input type="checkbox" {{ $Driver->gender->gender_id == 2 ? 'checked="checked"' : '' }}> นางสาว (Miss)</td>
                        <td width="100"><input type="checkbox" {{ $Driver->gender->gender_id == 3 ? 'checked="checked"' : '' }}> นาง (Mrs)</td>
                    </tr>
                    <tr>
                        <td width="100"><b>ชื่อ</b></td>
                        <td width="120">ไทย (Title)</td>
                        <td width="100">ชื่อ</td>
                        <td colspan="2" class="under-line">{{$Driver->driver_name_th ? $Driver->driver_name_th : '-' }}</td>
                    </tr>
                    <tr>
                        <td width="100">Name</td>
                        <td width="120">อังกฤษ (English)</td>
                        <td width="100">Name</td>
                        <td colspan="2" class="under-line">{{$Driver->driver_name_en ? $Driver->driver_name_en : '-' }}</td>
                    </tr>
                    <tr>
                        <td width="100"><b>นามสกุล</b></td>
                        <td width="120">ไทย (Thai)</td>
                        <td width="100">นามสกุล</td>
                        <td colspan="2" class="under-line">{{$Driver->driver_lastname_th ? $Driver->driver_lastname_th : '-' }}</td>
                    </tr>
                    <tr>
                        <td width="100">Surname</td>
                        <td width="120">อังกฤษ (English)</td>
                        <td width="100">Surname</td>
                        <td colspan="2" class="under-line">{{$Driver->driver_lastname_en ? $Driver->driver_lastname_en : '-' }}</td>
                    </tr>
                    <tr>
                        <td width="100"><b>เลขที่บัตรประชาชน</b></td>
                        <td colspan="3" class="under-line">{{$Driver->driver_id_card_no ? $Driver->driver_id_card_no : '-' }}</td>
                        <td width="100" colspan="1"><b>ส่วนสูง (ซม)</b></td>
                        <td class="under-line">{{$Driver->driver_height ? $Driver->driver_height : '-' }}</td>
                    </tr>
                    <tr>
                        <td width="100">ID Card No.</td>
                        <td colspan="3"></td>
                        <td width="100">Height (cm)</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>เพศ</b></td>
                        <td class="under-line">{{$Driver->gender_id == 1 ? 'ชาย' : 'หญิง'}} </td>
                        <td width="100"><b>อายุ</b></td>
                        <td class="under-line">{{$Driver->driver_age ? $Driver->driver_age : '-'}}</td>
                        <td width="100" colspan="1"><b>นํ้าหนัก (กก)</b></td>
                        <td class="under-line">{{$Driver->driver_weight ? $Driver->driver_weight : '-'}}</td>
                    </tr>
                    <tr>
                        <td width="100">Gender</td>
                        <td></td>
                        <td width="100">Age</td>
                        <td></td>
                        <td width="100" colspan="1">Weight (kg)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="100"><b>วันเดือนปีเกิด</b></td>
                        <td class="under-line">{{$Driver->driver_date_of_birth ? $Driver->driver_date_of_birth : '-'}} </td>
                        <td width="100"><b>สัญชาติ</b></td>
                        <td class="under-line">{{$Driver->driver_nationality ? $Driver->driver_nationality : '-'}}</td>
                        <td width="100" colspan="1"><b>ศาสนา</b></td>
                        <td class="under-line">{{$Driver->driver_religion ? $Driver->driver_religion : '-'}}</td>
                    </tr>
                    <tr>
                        <td width="100">Date of Birth</td>
                        <td></td>
                        <td width="100">Nationality</td>
                        <td></td>
                        <td width="100" colspan="1">Religion</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="100"><b>สถานที่เกิด</b></td>
                        <td class="under-line">{{$Driver->driver_place_of_birth ? $Driver->driver_place_of_birth : '-'}} </td>
                        <td width="100"><b>อีเมล์</b></td>
                        <td colspan="3" class="under-line">{{$Driver->driver_email ? $Driver->driver_email : '-'}}</td>
                    </tr>
                    <tr>
                        <td width="100">Place of Birth</td>
                        <td></td>
                        <td width="100">E-mail Address</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>ที่อยู่ปัจจุบัน</b></td>
                        <td colspan="5" class="under-line">{{$Driver->driver_address ? $Driver->driver_address : '-'}}</td>
                    </tr>
                    <tr>
                        <td width="100">Present Address</td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>ตําบล/แขวง</b></td>
                        <td colspan="2" class="under-line">{{$Driver->districts->districts_name ? $Driver->districts->districts_name : '-'}} </td>
                        <td width="100"><b>อําเภอ/เขต</b></td>
                        <td colspan="2" class="under-line">{{$Driver->districts->amphures->amphures_name ? $Driver->districts->amphures->amphures_name : '-'}}</td>
                    </tr>
                    <tr>
                        <td width="100">Tambon</td>
                        <td colspan="2"></td>
                        <td width="100">Amphur</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>จังหวัด</b></td>
                        <td colspan="2" class="under-line">{{$Driver->districts->provinces->provinces_name ? $Driver->districts->provinces->provinces_name : '-' }}</td>
                        <td width="100"><b>รหัสไปรษณีย์</b></td>
                        <td colspan="2" class="under-line">{{$Driver->districts->zipcode->zipcodes_name ? $Driver->districts->zipcode->zipcodes_name : '-' }}</td>
                    </tr>
                    <tr>
                        <td width="100">Province</td>
                        <td colspan="2"></td>
                        <td width="100">Postcode</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>โทรศัพท์ที่บ้าน</b></td>
                        <td colspan="2" class="under-line">{{$Driver->driver_phone_2 ? $Driver->driver_phone_2 : '-'}} </td>
                        <td width="100"><b>โทรศัพท์มือถือ</b></td>
                        <td colspan="2" class="under-line">{{$Driver->driver_phone ? $Driver->driver_phone : '-'}}</td>
                    </tr>
                    <tr>
                        <td width="100">Residence Phone</td>
                        <td colspan="2"></td>
                        <td width="100">Mobile Phone</td>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table " width="700" cellpadding="3">
                <!-- border="1" cellspacing="0" -->
                <tbody>
                    <tr class="head">
                        <td colspan="6">
                            <h4>รายละเอียดส่วนตัวของท่าน (Personal Information)</h4>
                        </td>
                    </tr>
                    <tr>
                        <td width="100"><b>ที่อยู่ตามทะเบียนบ้าน</b></td>
                        <td colspan="5" class="under-line">{{$Driver->driver_registered_address ? $Driver->driver_registered_address : '-'}} </td>
                    </tr>
                    <tr>
                        <td width="100">Registered Address</td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>ตําบล/แขวง</b></td>
                        <td width="250" class="under-line">{{$Driver->districts->provinces->provinces_name ? $Driver->districts->provinces->provinces_name : '-' }}</td>
                        <td width="100"><b>อําเภอ/เขต</b></td>
                        <td width="200" class="under-line" colspan="2">{{$Driver->districts->zipcode->zipcodes_name ? $Driver->districts->zipcode->zipcodes_name : '-' }}</td>
                    </tr>
                    <tr>
                        <td width="100">Tambon</td>
                        <td width="200"></td>
                        <td width="100">Amphur</td>
                        <td width="200" colspan="2"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>จังหวัด</b></td>
                        <td width="200" class="under-line">{{$Driver->driver_phone_2 ? $Driver->driver_phone_2 : '-'}} </td>
                        <td width="100"><b>รหัสไปรษณีย์</b></td>
                        <td width="200" class="under-line" colspan="2">{{$Driver->driver_phone ? $Driver->driver_phone : '-'}}</td>
                    </tr>
                    <tr>
                        <td width="100">Province</td>
                        <td width="200"> </td>
                        <td width="100">Postcode</td>
                        <td width="200" colspan="2"></td>
                    </tr>
                    <tr>
                        <td width="100"><b>สถานภาพครอบครัว</b></td>
                        <td width="200" class="under-line">
                            {{$Driver->driver_status_family == '1' ? 'โสด' : ($Driver->driver_status_family == '2' ? 'สมรสจดทะเบียน' : ($Driver->driver_status_family == '3' ? 'สมรสไม่จดทะเบียน' : ($Driver->driver_status_family == '4' ? 'หย่า' : ($Driver->driver_status_family == '5' ? 'หม้าย' : '-')))) }}
                        </td>
                        <td width="100"><b>จํานวนบุตร</b></td>
                        <td width="200" class="under-line" colspan="2">{{$Driver->driver_children ? $Driver->driver_children : '-'}}</td>
                    </tr>
                    <tr>
                        <td width="100">Status</td>
                        <td width="200"></td>
                        <td width="100">Children</td>
                        <td width="200" colspan="2"></td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tr>
                    <td><b>ชื่อ – นามสกุล (สามี/ภรรยา)</b></td>
                    <td width="1">ชื่อ</td>
                    <td width="200" class="under-line">{{$Driver->driver_spouse_name ? $Driver->driver_spouse_name : '-'}}</td>
                    <td width="1">นามสกุล</td>
                    <td width="200" class="under-line">{{$Driver->driver_spouse_lastname ? $Driver->driver_spouse_lastname : '-'}}</td>
                </tr>
                <tr>
                    <td>Name – Surname</td>
                    <td width="1">Name</td>
                    <td width="200"></td>
                    <td width="1">Surname</td>
                    <td width="200"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="100"><b>ตําแหน่ง</b></td>
                    <td width="200" class="under-line">{{$Driver->driver_spouse_position ? $Driver->driver_spouse_position : '-'}} </td>
                    <td width="100"><b>บริษัท</b></td>
                    <td width="250" class="under-line" colspan="2">{{$Driver->driver_spouse_company ? $Driver->driver_spouse_company : '-'}}</td>
                </tr>
                <tr>
                    <td width="100">Position</td>
                    <td width="200"></td>
                    <td width="100">Company</td>
                    <td width="250" colspan="2"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="table-responsive">
        <table>
            <tr>
                <td colspan="7"><b>ข้อมูลบิดา-มารดา (Parents)</b> **กรุณาระบุสถานะมีชีวิตอยู่ หรือถึงแก่กรรม</td>
            </tr>
        </table>
        <table class="table border-table" width="700">
            <thead>
                <tr class="head">
                    <td></td>
                    <td align="center">
                        <b>ชื่อ</b> <br />
                        Name
                    </td>
                    <td align="center">
                        <b>นามสกุล</b> <br />
                        Surname
                    </td>
                    <td align="center">
                        <b>อายุ</b> <br />
                        Age
                    </td>
                    <td align="center">
                        <b>สถานะ**</b>
                        <br />
                        Status
                    </td>
                    <td align="center">
                        <b>ตำแหน่ง</b>
                        <br />
                        Positon
                    </td>
                    <td align="center">
                        <b>บริษัท</b>
                        <br />
                        Company
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center">บิดา (Father)</td>
                    <td align="center">{{$Driver->driver_father_name ? $Driver->driver_father_name : '-'}}</td>
                    <td align="center">{{$Driver->driver_father_lastname ? $Driver->driver_father_lastname : '-'}}</td>
                    <td align="center">{{$Driver->driver_father_age ? $Driver->driver_father_age : '-'}}</td>
                    <td align="center">{{$Driver->driver_father_status ? $Driver->driver_father_status : '-'}}</td>
                    <td align="center">{{$Driver->driver_father_position ? $Driver->driver_father_position : '-'}}</td>
                    <td align="center">{{$Driver->driver_father_company ? $Driver->driver_father_company : '-'}}</td>
                </tr>
                <tr>
                    <td align="center">มารดา (Mother)</td>
                    <td align="center">{{$Driver->driver_mother_name ? $Driver->driver_mother_name : '-'}}</td>
                    <td align="center">{{$Driver->driver_mother_lastname ? $Driver->driver_mother_lastname : '-'}}</td>
                    <td align="center">{{$Driver->driver_mother_age ? $Driver->driver_mother_age : '-'}}</td>
                    <td align="center">{{$Driver->driver_mother_status ? $Driver->driver_mother_status : '-'}}</td>
                    <td align="center">{{$Driver->driver_mother_position ? $Driver->driver_mother_position : '-'}}</td>
                    <td align="center">{{$Driver->driver_mother_company ? $Driver->driver_mother_company : '-'}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table>
            <tr>
                <td colspan="6"><b>ข้อมูลพี่น้อง (Brother/Sister) </b> **จํานวนพี่น้อง (รวมทั้งตัวท่านเอง) {{count($Driver->brethren) + 1}} คน</td>
            </tr>
        </table>
        <table class="table border-table" width="700">
            <thead>
                <tr class="head">
                    <td></td>
                    <td align="center">
                        <b>ชื่อ</b>
                        <br />
                        Name
                    </td>
                    <td align="center">
                        <b>นามสกุล</b>
                        <br />
                        Surname
                    </td>
                    <td align="center">
                        <b>อายุ</b>
                        <br />
                        Age
                    </td>
                    <td align="center">
                        <b>สัมพันธ์</b>
                        <br />
                        Relationship
                    </td>
                    <td align="center">
                        <b>อาชีพ</b>
                        <br />
                        Occupation
                    </td>
                    <td align="center">
                        <b>บริษัท</b>
                        <br />
                        Company
                    </td>
                </tr>
            </thead>
            <tbody>
                @if(count($Driver->brethren)>0)
                @foreach($Driver->brethren as $val)
                <tr>
                    <td align="center">ลําดับที่ {{$val->brethren_z_index}} (No.{{$val->brethren_z_index}})</td>
                    <td align="center">{{$val->brethren_name ? $val->brethren_name : '-'}}</td>
                    <td align="center">{{$val->brethren_lastname ? $val->brethren_lastname	 : '-'}}</td>
                    <td align="center">{{$val->brethren_age ? $val->brethren_age : '-'}}</td>
                    <td align="center">{{$val->brethren_realtionship == '1' ? 'พี่' : ($val->brethren_realtionship == '2' ? 'น้อง' : ($val->brethren_realtionship == '3' ? 'ลูกพี่ลูกน้อง' : '-' ))}}</td>
                    <td align="center">{{$val->brethren_position ? $val->brethren_position : '-'}}</td>
                    <td align="center">{{$val->brethren_company ? $val->brethren_company : '-'}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td align="center" colspan="7">ไม่พบข้อมูล</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table border-table" width="700">
            <thead>
                <tr>
                    <td class="head" colspan="6">
                        <h4>ประวัติการศึกษา (Education Background)</h4>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">กรุณาระบุประวัติการศึกษาของท่าน โดยเริ่มจากระดับการศึกษาจากอดีตจนถึงปัจจุบัน Please give us details of your educational background</td>
                </tr>
            </tbody>
            <thead>
                <tr class="head ">
                    <td align="center" rowspan="2"><b>ระดับการศึกษา</b>
                        <br />
                        Educational Degree
                    </td>
                    <td align="center" colspan="2"><b>ระยะเวลาการศึกษา</b>
                        <br>
                        Dates of Attendance
                    </td>
                    <td align="center" rowspan="2"><b>ชื่อสถาบันการศึกษา</b>
                        <br>
                        Name of Institute
                    </td>
                    <td align="center" rowspan="2"><b>วิชาเอก / วิชาโท</b>
                        <br>
                        Major / Minor
                    </td>
                    <td align="center" rowspan="2"><b>เกรดเฉลี่ย</b>
                        <br>
                        Grade Point Average
                    </td>
                </tr>
                <tr class="head">
                    <td align="center">ตั้งแต่ (Fr)</td>
                    <td align="center">ถึง (To)</td>
                </tr>
            </thead>
            <tbody>
                @if(count($Driver->EducationDriver) > 0)
                @foreach($Driver->EducationDriver as $val )
                <tr>
                    <td align="center">{{ $val->education_driver_status == '1' ? 'ประถมศึกษา (Primary)' : 
                        ($val->education_driver_status == '2' ? 'มัธยมศึกษา (Secondary)' :
                        ($val->education_driver_status == '3' ? 'อาชีวศึกษา (Vocational)' :
                        ($val->education_driver_status == '4' ? 'ปริญญาตรี (Bachelor)' :
                        ($val->education_driver_status == '5' ? 'ปริญญาโท (Master)' :
                        ($val->education_driver_status == '6' ? 'อืนๆ (Other)' : '-'
                        )))))}}
                    </td>
                    <td align="center"><label for="example-text-input" class="col-form-label">{{ $val->education_driver_date_fr }} </td>
                    <td align="center"><label for="example-text-input" class="col-form-label">{{ $val->education_driver_date_to }} </td>
                    <td align="center"><label for="example-text-input" class="col-form-label">{{ $val->education_driver_name_instirute }} </td>
                    <td align="center"><label for="example-text-input" class="col-form-label">{{ $val->education_driver_major }} </td>
                    <td align="center"><label for="example-text-input" class="col-form-label">{{ $val->education_driver_gpa }} </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td align="center" colspan="6">ไม่พบข้อมูล</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table" width="700" cellpadding="2">
                <tbody>
                    <tr>
                        <td width="200" colspan="1"><b>ตําแหน่งงานที่ท่านสมัคร</b></td>
                        <td colspan="3" class="under-line">{{$Driver->RecruitmentPosition->recruitment_position_name ? $Driver->RecruitmentPosition->recruitment_position_name : ''}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Required Position</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="200" colspan="1"><b>เงินเดือนที่ต้องการ (โปรดระบุ)</b></td>
                        <td width="200" class="under-line">{{$Driver->driver_expected_salary ? number_format($Driver->driver_expected_salary) : ''}}</td>
                        <td width="100"><b>วันที่เริ่มงานได้</b></td>
                        <td width="200" class="under-line">{{$Driver->driver_interview_date ? date("Y-m-d", strtotime($Driver->driver_interview_date)) : ''}}</td>
                    </tr>
                    <tr>
                        <td width="200" colspan="1">Expected Salary</td>
                        <td width="200"></td>
                        <td width="100">Availlale Date</td>
                        <td width="200"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @foreach($Driver->WorkHistory as $val )
    <div class="table-responsive">
        <table class="table border-table" width="700">
            <tbody>
                <tr>
                    <td class="head" colspan="10"><b>ประวัติการทํางาน (Employment Record)</b></td>
                </tr>
                <tr>
                    <td colspan="10">กรุณาระบุประวัติการทํางานของท่าน โดยเริ่มจากประสบการณ์ทํางานในปัจจุบันหรือล่าสุด<br>Please describe your previous employment, beginning with your most recent experience.</td>
                </tr>
                <tr>
                </tr>
            </tbody>
            <tbody>
                <tr class="head">
                    <td align="center" width="100">
                        <b>ตั้งแต่ </b>
                        <br />
                        From ( Month/Yr)
                    </td>
                    <td align="center" width="100">
                        <b>ถึง</b>
                        <br />
                        To ( Month/Yr)
                    </td>
                    <td align="center" colspan="4">
                        <b>บริษัท</b>
                        <br />
                        Company
                    </td>
                    <td align="center" colspan="4">
                        <b>ตําแหน่ง</b>
                        <br />
                        Current Position
                    </td>
                </tr>
                <tr>
                    <td align="center">{{ $val->work_history_from ? $val->work_history_from : '-' }}</td>
                    <td align="center">{{ $val->work_history_to ? $val->work_history_to : '-' }} </td>
                    <td align="center" colspan="4">{{ $val->work_history_company ? $val->work_history_company : '-' }} </td>
                    <td align="center" colspan="4">{{ $val->work_history_current_position ? $val->work_history_current_position : '-' }} </td>
                </tr>
                <tr>
                    <td align="center" rowspan="2"><b>เงินเดือน</b><br>Salary</td>
                    <td align="center">เริ่มต้น</td>
                    <td align="center">{{ $val->work_history_salary_start ? number_format($val->work_history_salary_start) : '-' }} </td>
                    <td align="center">ค่าคอมมิชชัน<br>Commission</td>
                    <td align="center">ค่าโทรศัพท์<br>Mobile</td>
                    <td align="center">ค่านํ้ามัน<br>Gasoline</td>
                    <td align="center">โบนัส<br>Bonus</td>
                    <td align="center">เบี้ยขยัน<br>Incentive</td>
                    <td align="center" colspan="2">อื่นๆ<br>Other</td>
                </tr>
                <tr>
                    <td align="center">สุดท้าย</td>
                    <td align="center">{{ $val->work_history_salary_end ? number_format($val->work_history_salary_end) : '-' }}</td>
                    <td align="center">{{ $val->work_history_commission_start ? number_format($val->work_history_commission_start) : '-' }}</td>
                    <td align="center">{{ $val->work_history_mobile_start ? number_format($val->work_history_mobile_start) : '-' }}</td>
                    <td align="center">{{ $val->work_history_gasoline_start ? number_format($val->work_history_gasoline_start) : '-' }}</td>
                    <td align="center">{{ $val->work_history_bonus_start ? number_format($val->work_history_bonus_start) : '-' }} </td>
                    <td align="center">{{ $val->work_history_incentive_start ? number_format($val->work_history_incentive_start) : '-' }}</td>
                    <td align="center" colspan="2">{{ $val->work_history_other_start ? number_format($val->work_history_other_start) : '-' }}</td>
                </tr>
                <tr>
                    <td colspan="10"><b>หน้าที่และความรับผิดชอบโดยละเอียด Details of Responsibilities</b></td>
                </tr>
                <tr>
                    <td colspan="10">
                        <p>{{ $val->work_history_other_start ? $val->work_history_details : '-' }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="1"><b>สาเหตุที่ออก</b><br>Reason for Leaving</td>
                    <td colspan="9" class="under-line">{{ $val->work_history_reason_for_leaving ? $val->work_history_reason_for_leaving : '-' }}</td>
                </tr>
                <tr>
                    <td colspan="1" rowspan="3"><b>ชื่อผู้บังคับบัญชา</b><br>Supervisor's name</td>
                    <td colspan="3" rowspan="3" class="under-line">{{ $val->work_history_supervison_name ? $val->work_history_supervison_name : '-' }}</td>
                    <td><input type="checkbox" {{ $val->work_history_supervison_status == 1 ? 'checked="checked"' : '' }}> <b>ยินดีให้ติดต่อ โทร</b></td>
                    <td colspan="5" class="under-line">{{ $val->work_history_supervison_phone ? $val->work_history_supervison_phone : '-' }}</td>
                </tr>
                <tr>
                    <td colspan="6"><input type="checkbox" {{ $val->work_history_supervison_status == 0 ? 'checked="checked"' : '' }}> <b>ไม่ยินดีให้ติดต่อ</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
    <table class="table border-table" width="700">
        <tr>
            <td class="head"><b>ประวัติการฝึกอบรม (Training Record)</b></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
        </tr>
    </table>
    <div class="table-responsive">
        <table class="table border-table" width="700">
            <thead>
                <tr class="head">
                    <td align="center"><b>ปี</b>
                        <br />
                        Year
                    </td>
                    <td align="center"><b>หลักสูตร</b>
                        <br>
                        Course/Subject
                    </td>
                    <td align="center"><b>สถาบันฝึกอบรม</b>
                        <br>
                        Insitute
                    </td>
                    <td align="center"><b>ระยะเวลา</b>
                        <br>
                        Duration
                    </td>
                </tr>
            </thead>
            <tbody>
                @if(count($Driver->TrainingRecord) > 0)
                @foreach($Driver->TrainingRecord as $val )
                <tr>
                    <td align="center">{{ $val->training_record_year ? $val->training_record_year : '-' }}</td>
                    <td align="center">{{ $val->training_record_course ? $val->training_record_course : '-' }}</td>
                    <td align="center">{{ $val->training_record_insitute ? $val->training_record_insitute : '-' }}</td>
                    <td align="center">{{ $val->training_record_duration ? $val->training_record_duration : '-' }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td align="center" colspan="4">ไม่พบข้อมูล</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <table class="table" width="700">
        <tr>
            <td class="head"><b>ความสามารถทางภาษา (Language) <u>ยกเว้นภาษาไทย</u></b> *กรุณาระบุความสามารถ ดีมาก ดี พอใช้</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
        </tr>
    </table>
    <div class="table-responsive">
        <table class="table border-table" width="700">
            <thead>
                <tr class="head">
                    <td align="center"><b>ภาษา</b>
                        <br />
                        Language
                    </td>
                    <td align="center"><b>การพูด*</b>
                        <br>
                        Speaking
                    </td>
                    <td align="center"><b>การอ่าน*</b>
                        <br>
                        Reading
                    </td>
                    <td align="center"><b>การเขียน*</b>
                        <br>
                        Writing
                    </td>
                    <td align="center" width="300"><b>ผลทดสอบด้านภาษา(ถ้ามี)</b>
                        <br>
                        Language Test Result (any)
                    </td>
                    <td align="center"><b>คะแนน</b>
                        <br>
                        Score
                    </td>
                </tr>
            </thead>
            <tbody>
                @if(count($Driver->DriverLanguage) > 0)
                @foreach($Driver->DriverLanguage as $val )
                <tr>
                    <td align="center">{{ $val->LanguageType->language_type_name  == 'EN' ? 'อังกฤษ (English)' : ($val->LanguageType->language_type_name == 'CH' ? 'จีน (China)' : '-') }}</td>
                    <td align="center">{{ $val->driver_language_speaking  == '3' ? 'ดีมาก' : ($val->driver_language_speaking == '2' ? 'ดี' : ($val->driver_language_speaking == '1' ? 'พอใช้' : false)) }}</td>
                    <td align="center">{{ $val->driver_language_reading  == '3' ? 'ดีมาก' : ($val->driver_language_reading == '2' ? 'ดี' : ($val->driver_language_reading == '1' ? 'พอใช้' : false)) }}</td>
                    <td align="center">{{ $val->driver_language_writing  == '3' ? 'ดีมาก' : ($val->driver_language_writing == '2' ? 'ดี' : ($val->driver_language_writing == '1' ? 'พอใช้' : false)) }}</td>
                    <td align="center">{{ $val->driver_language_test_result ? $val->driver_language_test_result : '-' }}</td>
                    <td align="center">{{ $val->driver_language_score ? number_format($val->driver_language_score) : '-' }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td align="center" colspan="6">ไม่พบข้อมูล</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table" width="700">
                <tbody>
                    <tr>
                        <td width="150"><b>สถานภาพทางทหาร</b></td>
                        <td class="under-line">{{$Driver->driver_military_status == '1' ? 'รอเกณฑ์ทหาร' : ($Driver->driver_military_status == '2' ? 'ผ่านการเกณฑ์ทหารแล้ว' : 
                            ($Driver->driver_military_status == '3' ? 'ได้รับการยกเว้นโดยการเรียน ร.ด.' : ($Driver->driver_military_status == '4' ? 'ได้รับการยกเว้น' : '-'
                            )))}}</td>
                        <td width="150"><b>เหตุผลที่ได้รับการยกเว้น</b></td>
                        <td class="under-line">{{$Driver->driver_military_reason ? $Driver->driver_military_reason : ''}}</td>
                    </tr>
                    <tr>
                        <td width="150">Military Status</td>
                        <td></td>
                        <td width="150">Reason</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="150"><b>ท่านมียานพาหนะหรือไม่ (ถ้ามีโปรดระบุ)</b></td>
                        <td class="under-line" colspan="3">{{$Driver->driver_vehicles == '0' ?  'ไม่มี' : ($Driver->driver_vehicles == '1' ? 'มี' : '-')}}</td>
                    </tr>
                    <tr>
                        <td width="150">Do you have own vehicles? </td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td width="150"><b>กรณีมีรถยนต์ใบขับขี่เลขที</b></td>
                        <td class="under-line">{{$Driver->driver_driver_license_no ? $Driver->driver_driver_license_no : ''}}</td>
                        <td width="150"><b>วันหมดอายุ</b></td>
                        <td class="under-line">{{$Driver->driver_driver_license_date ? date("Y-m-d", strtotime($Driver->driver_driver_license_date)) : ''}}</td>
                    </tr>
                    <tr>
                        <td width="150">Driver’s License No.</td>
                        <td></td>
                        <td width="150">Expire Date</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table" width="700" cellpadding="10">
                <tbody>
                    @foreach($Driver->JobAnswer as $val)
                    <tr>
                        <td width="400" rowspan="2"><b>{{$val->JobQuestion->job_question_details_th ? $val->JobQuestion->job_question_details_th : ''}}</b><br>{{$val->JobQuestion->job_question_details_en ? $val->JobQuestion->job_question_details_en : ''}}</td>
                        <td><input type="checkbox" {{ $val->job_answer_answer == 1 ? 'checked="checked"' : '' }}> เคย (Yes) ระบุ {{$val->job_answer_note ? $val->job_answer_note : ''}}</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" {{ $val->job_answer_answer == 0 ? 'checked="checked"' : '' }}> ไม่เคย (No)</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <table class="table" width="700">
        <tr>
            <td><b>กรุณาระบุบุคคลอ้างอิง 2 ท่านที่ไม่ใช่ญาติพี่น้องของท่านหรือไม่ใช่พนักงานที่ทํางานในบริษัท</b></td>
        </tr>
        <tr>
            <td>2 persons from whom references about you may be made (excluding your relatives or our company)</td>
        </tr>
    </table>
    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table border-table" width="700">
                <thead>
                    <tr class="head">
                        <td width='50'>
                        </td>
                        <td align="center"><b>ชื่อ</b>
                            <br>
                            Name
                        </td>
                        <td align="center"><b>นามสกุล</b>
                            <br>
                            Surname
                        </td>
                        <td align="center"><b>ความสัมพันธ์</b>
                            <br>
                            Relationship
                        </td>
                    </tr>
                </thead>
                <tbody>
                    {{ $count = 1 }}
                    @if(count($Driver->DriverReference) > 0)
                    @foreach($Driver->DriverReference as $val)
                    <tr>
                        <td align="center">{{ $count }}</td>
                        <td align="center">{{ $val->driver_reference_name }}</td>
                        <td align="center">{{ $val->driver_reference_lastname }}</td>
                        <td align="center">{{ $val->driver_reference_relationship }}</td>
                    </tr>
                    <tr>
                        <td align="center"><b>บริษัท</b><br>Company</td>
                        <td class="under-line">{{ $val->driver_reference_company }}</td>
                        <td align="center"><b>อาชีพ</b><br>Occupation</td>
                        <td class="under-line">{{ $val->driver_reference_occupation }}</td>
                    </tr>
                    <tr>
                        <td align="center"><b>โทรศัพท์</b><br>Mobile</td>
                        <td class="under-line" colspan="3">{{ $val->driver_reference_mobile }}</td>
                    </tr>
                    {{ $count++ }}
                    @endforeach
                    @else
                    <tr>
                        <td align="center" colspan="4">ไม่พบข้อมูล</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <table class="table" width="700">
        <tr>
            <td><b>กรุณาระบุบุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน (Person to be contacted in case of emergency)</b></td>
        </tr>
    </table>
    <div class="row" align="center">
        <div class="table-responsive">
            @if(count($Driver->DriverEmergencyContact) > 0)
            @foreach($Driver->DriverEmergencyContact as $val)
            <table class="table border-table" width="700" cellpadding="10">
                <thead>
                    <tr class="head">
                        <td align="center"><b>ชื่อ</b>
                            <br>
                            Name
                        </td>
                        <td align="center"><b>นามสกุล</b>
                            <br>
                            Surname
                        </td>
                        <td align="center"><b>ความสัมพันธ์</b>
                            <br>
                            Relationship
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">{{ $val->driver_emergency_contacts_name }}</td>
                        <td align="center">{{ $val->driver_emergency_contacts_lastname }}</td>
                        <td align="center">{{ $val->driver_emergency_contacts_relationship }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table border-table" width="700">
                <tr>
                    <td width=100><b>ที่อยู่</b><br>Address</td>
                    <td class="under-line">{{ $val->driver_emergency_contacts_address }}</td>
                </tr>
                <tr>
                    <td width=100><b>โทรศัพท์</b><br>Mobile</td>
                    <td class="under-line">{{ $val->driver_emergency_contacts_phone }}</td>
                </tr>
            </table>
            @endforeach
            @else
            <table class="table border-table" width="700" cellpadding="10">
                <thead>
                    <tr class="head">
                        <td align="center"><b>ชื่อ</b>
                            <br>
                            Name
                        </td>
                        <td align="center"><b>นามสกุล</b>
                            <br>
                            Surname
                        </td>
                        <td align="center"><b>ความสัมพันธ์</b>
                            <br>
                            Relationship
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center" colspan="3">ไม่พบข้อมูล</td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </div>
    <div class="row" align="center">
        <div class="table-responsive">
            <table class="table" width="700">
                <tbody>
                    <tr>
                        <td width=150><b>ท่านทราบข่าวการสมัครงานจาก</b></td>
                        <td class="under-line">{{ $Driver->driver_job_new ? $Driver->driver_job_new : '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center" style="font-size: 15px;">
        ข้าพเจ้าขอรับรองว่าข้อความที่ได้ระบุในใบสมัครนี้เป็ นความจริงทุกประการ หากเป็นเท็จหรือบิดเบือนไปจากความจริงแล้วให้ถือเป็นเหตุเลิกจ้างข้าพเจ้าทันที โดยไม่เรียกร้องค่าชดเชยใดๆ ทั้งสิ้น และข้าพเจ้ายินยอมที่จะปฏิบัติตามกฎระเบียบและข้อบังคับต่างๆ ของบริษัทฯ ทุกประการ
    </div>
    <div class="text-center" style="font-size: 15px;padding-bottom: 15">
        I certify that the above details are true and I promise to work with honesty and follow the Company's rules and regulations in all aspects. Any mispresentation and/or incorrect answers to
        any questiond may be considered as grounds for immediate discharge from employment of this group of company without any severence pay </div>
    <div class="row" align="center">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table" width="100%">
                    <tbody>
                        <tr class="text-right">
                            <td width=300></td>
                            <td>
                                <h3>ลงชื่อผู้สมัคร</h3>
                            </td>
                            <td width=250 class="under-line"></td>
                        </tr>
                        <tr class="text-right">
                            <td width=300></td>
                            <td>Applicant's Signature</td>
                            <td width=250></td>
                        </tr>
                        <tr class="text-right">
                            <td width=300></td>
                            <td><b>วันที่</b></td>
                            <td width=250 class="under-line"></td>
                        </tr>
                        <tr class="text-right">
                            <td width=300></td>
                            <td>Date</td>
                            <td width=250></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>