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
                    <h4 class="card-title">Monthly job interview report</h4>

                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                            <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                        </a>
                    </div>
                    <table class="table table-bordered table-hover table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" rowspan="2"></th>
                                <th scope="col" rowspan="2">No</th>
                                <th scope="col" rowspan="2">วันที่มาเขียนใบสมัคร</th>
                                <th scope="col" rowspan="2">ชื่อ-นามสกุล</th>
                                <th scope="col" rowspan="2">โทรศัพท์</th>
                                <th scope="col" rowspan="2">อายุ</th>
                                <th scope="col" rowspan="2">ที่อยู่</th>
                                <th scope="col" rowspan="2">นัดวันที่เริ่มงาน</th>
                                <th scope="col" colspan="5">แหล่งที่มา</th>
                                <th scope="col" colspan="4">นัดสัมภาษณ์งาน</th>
                                <th scope="col" colspan="7">นัดเริ่มงาน</th>
                                <th scope="col" colspan="3">ส่งตรวจประวัติฯ</th>
                                <th scope="col" rowspan="2">หมายเหตุ</th>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <td>Youtube</td>
                                <td>เข้ามาสมัครเอง</td>
                                <td>Job</td>
                                <td>เพื่อนแนะนำ</td>
                                <td>ไม่สนใจ</td>
                                <td>พบประวัติ</td>
                                <td>ไม่ผ่าน</td>
                                <td>ผ่าน/รอเริ่ม</td>
                                <td>ไม่สนใจ</td>
                                <td>ไม่มีประสบการณ์</td>
                                <td>ไม่รับเข้าทำงาน</td>
                                <td>พบประวัติ</td>
                                <td>เริ่มงานใหม่</td>
                                <td>รอนัดสัมภาษณ์</td>
                                <td>รอตรวจประวัติ</td>
                                <td>รายละเอียด (พบประวัติ)</td>
                                <td>ผ่าน</td>
                                <td>ไม่ผ่าน</td>
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
                                <td>02/03/2020</td>
                                <td>สมชาย มุ่งมั่น</td>
                                <td>082-265-9885</td>
                                <td>35</td>
                                <td>สมุทรปราการ</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>-</td>
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
                                <td>02/03/2020</td>
                                <td>อนุวัฒน์ จันทกาล</td>
                                <td>098-864-5513</td>
                                <td>31</td>
                                <td>มีนบุรี</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td>-</td>
                                <td></td>
                                <td></td>
                                <td>รอผลตรวจประวัติ</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">3</th>
                                <td>02/03/2020</td>
                                <td>ผดุง ด้วงคำ</td>
                                <td>089-564-8854</td>
                                <td>30</td>
                                <td>แคราย</td>
                                <td>09/03/2020</td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td>พบ</td>
                                <td>1</td>
                                <td></td>
                                <td>เริ่มงานเรียบร้อยแล้ว</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                        <label class="custom-control-label" for="customControlValidation4"></label>
                                    </div>
                                </td>
                                <th scope="row">4</th>
                                <td>02/03/2020</td>
                                <td>อัศนัย ภูมิวิศัย</td>
                                <td>084-941-2422</td>
                                <td>43</td>
                                <td>พระโขนง</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td>-</td>
                                <td></td>
                                <td></td>
                                <td>รอผลตรวจประวัติฯ</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                        <label class="custom-control-label" for="customControlValidation5"></label>
                                    </div>
                                </td>
                                <th scope="row">5</th>
                                <td>02/03/2020</td>
                                <td>ภูวดล พัชรวิบูลย์</td>
                                <td>084-941-2422</td>
                                <td>43</td>
                                <td>บางบัวทอง</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>-</td>
                                <td></td>
                                <td></td>
                                <td>จำหน่ายยาเสพติด ปี 2540</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation6" required>
                                        <label class="custom-control-label" for="customControlValidation6"></label>
                                    </div>
                                </td>
                                <th scope="row">6</th>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td>39</td>
                                <td>ประชาอุทิศ</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td>-</td>
                                <td></td>
                                <td></td>
                                <td>รอตรวจประวัติฯ</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation7" required>
                                        <label class="custom-control-label" for="customControlValidation7"></label>
                                    </div>
                                </td>
                                <th scope="row">7</th>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td>43</td>
                                <td>นนทบุรี</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td>พบ</td>
                                <td></td>
                                <td>1</td>
                                <td>พยายามฆ่า พ.ส. 2554</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation8" required>
                                        <label class="custom-control-label" for="customControlValidation8"></label>
                                    </div>
                                </td>
                                <th scope="row">8</th>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td>24</td>
                                <td>หลักสี่</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>-</td>
                                <td></td>
                                <td></td>
                                <td>อายุ 24 ปี (ไม่รับเข้าทำงาน)</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation9" required>
                                        <label class="custom-control-label" for="customControlValidation9"></label>
                                    </div>
                                </td>
                                <th scope="row">9</th>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td>46</td>
                                <td>บางพลี</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>-</td>
                                <td></td>
                                <td></td>
                                <td>เขียนหนังสือไม่ได้</td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation10" required>
                                        <label class="custom-control-label" for="customControlValidation10"></label>
                                    </div>
                                </td>
                                <th scope="row">10</th>
                                <td>02/03/2020</td>
                                <td></td>
                                <td></td>
                                <td>36</td>
                                <td>สวนหลวง</td>
                                <td>17/02/2020</td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td>ไม่พบ</td>
                                <td></td>
                                <td></td>
                                <td>เริ่มงานเรียบร้อยแล้ว</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="font-bold">
                                <td colspan="8" class="text-center">ยอดรวม</td>
                                <td>6</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>4</td>
                                <td>0</td>
                                <td>1</td>
                                <td>2</td>
                                <td>7</td>
                                <td>1</td>
                                <td>0</td>
                                <td>3</td>
                                <td>0</td>
                                <td>2</td>
                                <td>4</td>
                                <td>0</td>
                                <td>3</td>
                                <td>1</td>
                                <td>1</td>
                                <td></td>
                            </tr>
                            <tr class="font-bold">
                                <td colspan="8" class="text-center"></td>
                                <td colspan="5" class="text-center">10</td>
                                <td colspan="4" class="text-center">10</td>
                                <td colspan="7" class="text-center">10</td>
                                <td colspan="3" class="text-center">5</td>
                                <td></td>
                            </tr>
                        </tfoot>
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