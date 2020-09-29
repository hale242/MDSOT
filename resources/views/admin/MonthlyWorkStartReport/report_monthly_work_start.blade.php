@extends('layouts.layout2')
@section('content')
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
                    <h4 class="card-title">Monthly work start report</h4>

                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                            <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Check All
                        </a>
                    </div>
                    <table class="table table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" rowspan="2"></th>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" colspan="8">รายละเอียด พขร. - BKK</th>
                                <th scope="col" colspan="4">คุณสมบัติ</th>
                                <th scope="col" colspan="4">รายละเอียด ทดแทนงาน / นัดสัมภาษณ์ / เริ่มสัญญา</th>
                                <th scope="col" colspan="2">เริ่มสัญญาใหม่</th>
                                <th scope="col" rowspan="2">หมายเหตุ</th>
                            </tr>
                            <tr>
                                <td>วันที่ลง</td>
                                <td>เลขที่</td>
                                <td>พ.ศ.</td>
                                <td>ชื่อ-สกุล</td>
                                <td>วันที่เริ่มงาน</td>
                                <td>สาขา</td>
                                <td>เบอร์โทร</td>
                                <td>ที่อยู่</td>
                                <td>ประสบการณ์</td>
                                <td>อายุ</td>
                                <td>ภาษา</td>
                                <td>สูบบุหรี่</td>
                                <td>วันที่ทดแทน</td>
                                <td>บริษัทลูกค้า</td>
                                <td>แทน พขร. ประจำ</td>
                                <td>หมายเหตุ</td>
                                <td>วันที่เริ่มสัญญา</td>
                                <td>บริษัทลูกค้า</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation25" required>
                                        <label class="custom-control-label" for="customControlValidation25"></label>
                                    </div>
                                </td>
                                <th scope="row">1</th>
                                <td>ยกมา ก.พ. 63</td>
                                <td></td>
                                <td>2563</td>
                                <td>ชื่อ - สกุล</td>
                                <td>03/02/2563</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td></td>
                                <td></td>
                                <td>นายญี่ปุ่น</td>
                                <td>49</td>
                                <td>น้อย</td>
                                <td>ไม่สูบ</td>
                                <td>16/03/2563</td>
                                <td>บราเทอร์</td>
                                <td>พขร. ทฤษฎี</td>
                                <td>ส่งพขร.วันรุ่งไปลงประจำแทนพขร.กฤษฎี เนื่องจากลูกค้าขอเปลี่ยนตัว (พัชได้รับใบโอนย้าย นายวันรุ่งไปประจำ บจ.Brother แล้ว)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2"></label>
                                    </div>
                                </td>
                                <th scope="row">2</th>
                                <td>ยกมา ก.พ. 63</td>
                                <td></td>
                                <td>2563</td>
                                <td>ชื่อ - สุกล</td>
                                <td>01/02/2563</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td></td>
                                <td></td>
                                <td>นายญี่ปุ่น/ส่วนกลาง</td>
                                <td>42</td>
                                <td>น้อย</td>
                                <td>สูบ</td>
                                <td>02/03/2563</td>
                                <td></td>
                                <td></td>
                                <td>ขึ้นสัญญาใหม่ Thai Nippon (พัชทำใบโอนย้าย นายเดชา ไปประจำ Thai Nippon แล้ว)</td>
                                <td>02/03/2563</td>
                                <td>Thai Nippon</td>
                                <td>รอเริ่มงาน Thai Nippon</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">3</th>
                                <td>ยกมา ก.พ. 63</td>
                                <td></td>
                                <td>2563</td>
                                <td></td>
                                <td>12/02/2563</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td></td>
                                <td></td>
                                <td>นายไทย/ส่วนกลาง</td>
                                <td>48</td>
                                <td>น้อย</td>
                                <td>สูบ</td>
                                <td>02/03/2563</td>
                                <td>โรงแรมราชา</td>
                                <td>ขึ้นสัญญาใหม่</td>
                                <td>(พัชทำใบโอนย้าย นายสุทธิชัย ไปประจำ บจ.โรงแรมราชา แล้ว)</td>
                                <td>02/03/2563</td>
                                <td>โรงแรมราชา</td>
                                <td>เริ่มงานโรงแรมราชา 02/03/2020</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                        <label class="custom-control-label" for="customControlValidation4"></label>
                                    </div>
                                </td>
                                <th scope="row">4</th>
                                <td>ยกมา ก.พ. 63</td>
                                <td></td>
                                <td>2563</td>
                                <td></td>
                                <td>17/03/2563</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td></td>
                                <td></td>
                                <td>ส่วนกลาง(รอลงทางด่วนพระราม7)</td>
                                <td>37</td>
                                <td>น้อย</td>
                                <td>สูบ</td>
                                <td>02/03/2563</td>
                                <td>ศิรินิมิตร</td>
                                <td>พขร. กิตติพงษ์</td>
                                <td>ลค.เปลี่ยนตัว (พัชได้รับใบโอนย้าย นายเมฆา ไปประจำ บจ.ศิรินิมิตร แล้ว)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                        <label class="custom-control-label" for="customControlValidation5"></label>
                                    </div>
                                </td>
                                <th scope="row" class="text-center">5</th>
                                <td>ยกมา</td>
                                <td></td>
                                <td>2563</td>
                                <td></td>
                                <td>25/02/2563</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td></td>
                                <td></td>
                                <td>นายญี่ปุ่น/ส่วนกลาง</td>
                                <td>35</td>
                                <td>น้อย</td>
                                <td>ไม่สูบ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>ลงประจำsunsuisa แทนมงคล (พัชทำใบโอนย้าย นายชาคริต ไปประจำ บจ.sunsuisa แล้ว)</td>
                                <td></td>
                                <td></td>
                                <td></td>
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
@endsection