@extends('layouts.layout2')
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Search</h4>
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Date</label>
                                <input type="date" id="" name="" class="form-control search_table" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="ti-search"></i> Search</button>
                    <button type="button" class="btn btn-secondary clear-search">Clear</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">รายงานสรุปค่าล่วงเวลาประจำเดือน</h4>

                    </div>
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                                <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                            </a>
                        </div>
                        <table class="table table-hover table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col"></th>
                                    <th scope="col">No</th>
                                    <th scope="col">รหัส</th>
                                    <th scope="col">ชื่อพนักงาน</th>
                                    <th scope="col">ค่าล่วงเวลา</th>
                                    <th scope="col">แท็กซี่/ค่าเดินทาง/ค่าแทนงาน</th>
                                    <th scope="col">เบี้ยเลี้ยง/ค่าเที่ยว/ค่ากะ</th>
                                    <th scope="col">ค่าค้างคืน</th>
                                    <th scope="col">เบี้ยขยัน</th>
                                    <th scope="col">อาหาร</th>
                                    <th scope="col">ล่วงเวลาตกค้าง</th>
                                    <th scope="col">หักหยุดงาน</th>
                                    <th scope="col">หักอื่น ๆ (คิดภาษี)</th>
                                    <th scope="col">หักอื่น ๆ (คิดภาษี)</th>
                                    <th scope="col">ค่ารักษาสี</th>
                                    <th scope="col">รายได้อื่น ๆ OT การันตี</th>
                                    <th scope="col">หักเบิกเงินเกิน</th>
                                    <th scope="col">หักเงินกู้</th>
                                    <th scope="col">หักโทรฯ</th>
                                    <th scope="col">Incentive Accident</th>
                                    <th scope="col">ค่าโทรฯ</th>
                                    <th scope="col">ที่พัก / พาหนะ</th>
                                    <th scope="col">ค่ากันดาร</th>
                                    <th scope="col">ครองชีพ</th>
                                    <th scope="col">ค่าภาษา ค่าชำนาญงาน</th>
                                    <th scope="col">ค่าพาหนะ</th>
                                    <th scope="col">ยอดรวม</th>
                                    <th scope="col">ยอดรายรับ</th>
                                    <th scope="col">ยอดหัก</th>
                                    <th scope="col">ยอดสุทธิ</th>
                                    <th scope="col">เก็บลูกค้า 1</th>
                                    <th scope="col">INV.</th>
                                    <th scope="col">ชื่อลูกค้า</th>
                                    <th scope="col">สัญญา</th>
                                    <th scope="col">ตัดรอบโอที</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation1" required>
                                            <label class="custom-control-label" for="customControlValidation1"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">1</td>
                                    <td>MDS16-004</td>
                                    <td>&nbsp;</td>
                                    <td>698.13</td>
                                    <td>100.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>4,000.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>&nbsp;</td>
                                    <td>5,798.13</td>
                                    <td>5,798.13</td>
                                    <td>-</td>
                                    <td>5,798.13</td>
                                    <td>2,962.66</td>
                                    <td>OT20020154</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900215</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                            <label class="custom-control-label" for="customControlValidation2"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">2</td>
                                    <td>MDSLP122</td>
                                    <td>&nbsp;</td>
                                    <td>7,562.52</td>
                                    <td>800.00</td>
                                    <td>1,400.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>333.33</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>&nbsp;</td>
                                    <td>9,929.19</td>
                                    <td>10,262.52</td>
                                    <td>333.33</td>
                                    <td>9,929.19</td>
                                    <td>14,324.03</td>
                                    <td>OT20010268</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900089</td>
                                    <td>25-24</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                            <label class="custom-control-label" for="customControlValidation3"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">3</td>
                                    <td>MCSSP486</td>
                                    <td>&nbsp;</td>
                                    <td>11,708.53</td>
                                    <td>1,200.00</td>
                                    <td>2,400.00</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,050.00</td>
                                    <td>&nbsp;</td>
                                    <td>17,358.53</td>
                                    <td>17,358.53</td>
                                    <td>-</td>
                                    <td>17,358.53</td>
                                    <td>21,477.72</td>
                                    <td>OT20020086</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900146,2</td>
                                    <td>25-24</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                            <label class="custom-control-label" for="customControlValidation4"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">4</td>
                                    <td>MDSSP698</td>
                                    <td>&nbsp;</td>
                                    <td>593.75</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,272.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,000.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,321.75</td>
                                    <td>2,593.75</td>
                                    <td>1,272.00</td>
                                    <td>1,321.75</td>
                                    <td>950.00</td>
                                    <td>OT20020118</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201800306</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                            <label class="custom-control-label" for="customControlValidation5"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">5</td>
                                    <td>MDSSP802</td>
                                    <td>&nbsp;</td>
                                    <td>343.75</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,000.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>2,343.75</td>
                                    <td>2,343.75</td>
                                    <td>-</td>
                                    <td>2,343.75</td>
                                    <td>550.00</td>
                                    <td>OT20020118</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201800306</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation6" required>
                                            <label class="custom-control-label" for="customControlValidation6"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">6</td>
                                    <td>MDSSP858</td>
                                    <td>&nbsp;</td>
                                    <td>312.50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,000.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>2,312.50</td>
                                    <td>2,312.50</td>
                                    <td>-</td>
                                    <td>2,312.50</td>
                                    <td>500.00</td>
                                    <td>OT20020118</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201800306</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation7" required>
                                            <label class="custom-control-label" for="customControlValidation7"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">7</td>
                                    <td>MDSSP926</td>
                                    <td>&nbsp;</td>
                                    <td>1,125.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,000.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>3,125.00</td>
                                    <td>3,125.00</td>
                                    <td>-</td>
                                    <td>3,125.00</td>
                                    <td>1,800.00</td>
                                    <td>OT20020118</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201800306</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation8" required>
                                            <label class="custom-control-label" for="customControlValidation8"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">8</td>
                                    <td>MDSSP839</td>
                                    <td>&nbsp;</td>
                                    <td>3,093.75</td>
                                    <td>400.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,00.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>5,493.75</td>
                                    <td>5,493.75</td>
                                    <td>-</td>
                                    <td>5,493.75</td>
                                    <td>5,253.00</td>
                                    <td>OT20020112</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900174</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation9" required>
                                            <label class="custom-control-label" for="customControlValidation9"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">9</td>
                                    <td>MDSSP873</td>
                                    <td>&nbsp;</td>
                                    <td>3,364.59</td>
                                    <td>200.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,000.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>5,564.59</td>
                                    <td>5,564.59</td>
                                    <td>-</td>
                                    <td>5,564.59</td>
                                    <td>5,360.50</td>
                                    <td>OT20020113</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900174</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation10" required>
                                            <label class="custom-control-label" for="customControlValidation10"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">10</td>
                                    <td>MDSLP108</td>
                                    <td>&nbsp;</td>
                                    <td>2,750.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>1,000.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>1,000.00</td>
                                    <td>-</td>
                                    <td>&nbsp;</td>
                                    <td>5,750.00</td>
                                    <td>5,750.00</td>
                                    <td>-</td>
                                    <td>5,750.00</td>
                                    <td>-</td>
                                    <td>0</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation11" required>
                                            <label class="custom-control-label" for="customControlValidation11"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">11</td>
                                    <td>MDSLP178</td>
                                    <td>&nbsp;</td>
                                    <td>3,000.02</td>
                                    <td>1,800.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>3,000.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>500.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>&nbsp;</td>
                                    <td>8,800.02</td>
                                    <td>8,800.02</td>
                                    <td>-</td>
                                    <td>8,800.02</td>
                                    <td>11,400.48</td>
                                    <td>OT20010278</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900049</td>
                                    <td>25-24</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation12" required>
                                            <label class="custom-control-label" for="customControlValidation12"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">12</td>
                                    <td>MDSSP733</td>
                                    <td>&nbsp;</td>
                                    <td>5,739.63</td>
                                    <td>3,300.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>3,00.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>500.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>13,039.63</td>
                                    <td>13,039.63</td>
                                    <td>-</td>
                                    <td>13,039.63</td>
                                    <td>17,623.06</td>
                                    <td>OT20010277</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900048</td>
                                    <td>25-24</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation13" required>
                                            <label class="custom-control-label" for="customControlValidation13"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">13</td>
                                    <td>MDSFU003</td>
                                    <td>&nbsp;</td>
                                    <td>13,769.92</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>-</td>
                                    <td>600.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>&nbsp;</td>
                                    <td>14,369.92</td>
                                    <td>14,369.92</td>
                                    <td>-</td>
                                    <td>14,369.92</td>
                                    <td>16,601.69</td>
                                    <td>OT20020117</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900172</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation14" required>
                                            <label class="custom-control-label" for="customControlValidation14"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">14</td>
                                    <td>MDSFU005</td>
                                    <td>&nbsp;</td>
                                    <td>13,353.96</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>-</td>
                                    <td>600.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>&nbsp;</td>
                                    <td>13,953.96</td>
                                    <td>13,953.96</td>
                                    <td>-</td>
                                    <td>13,953.96</td>
                                    <td>16,170.46</td>
                                    <td>OT20020118</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900172</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation15" required>
                                            <label class="custom-control-label" for="customControlValidation15"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">15</td>
                                    <td>MDSFU006</td>
                                    <td>&nbsp;</td>
                                    <td>10,947.80</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>-</td>
                                    <td>600.00</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>&nbsp;</td>
                                    <td>11,547.80</td>
                                    <td>11,547.80</td>
                                    <td>-</td>
                                    <td>11,547.80</td>
                                    <td>13,703.90</td>
                                    <td>OT20020119</td>
                                    <td>&nbsp;</td>
                                    <td>DA-LT-201900172</td>
                                    <td>1-30</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation16" required>
                                            <label class="custom-control-label" for="customControlValidation16"></label>
                                        </div>
                                    </td>
                                    <th scope="row" class="text-center">16</td>
                                    <td>รวม </td>
                                    <td>-</td>
                                    <td>78,363.85 </td>
                                    <td>7,800.00 </td>
                                    <td>3,800.00 </td>
                                    <td>-</td>
                                    <td>5,500.00</td>
                                    <td>1,800.00</td>
                                    <td>-</td>
                                    <td>333.33</td>
                                    <td>-</td>
                                    <td>1,272.00</td>
                                    <td>-</td>
                                    <td>8,300.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>6,000.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>6,100.00</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>120,708.52</td>
                                    <td>122,313.85</td>
                                    <td>1,605.33</td>
                                    <td>120,708.52</td>
                                    <td>128,677.50</td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
                </div>
                <form action="#" class="needs-validation" novalidate>
                    <div class="card">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="form-row">
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="productviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="form-group mt-12 row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection