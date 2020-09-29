@extends('layouts.layout2')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Training date</label>
                            <input type="date" id="search_course_content_date" name="course_content_date" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="recruitment_position_id">Topic of training</label>
                        <select class="form-control custom-select" id="search_course_content_name" name="course_content_name">
                            <option value="0">----Select----</option>
                            <option value="">การขับรถอย่างปลอดภัย</option>
                            <option value="">พัฒนาพนักงานขับรถมืออาชีพ</option>
                            <option value="">พัฒนาทักษะการขับรถอย่างปลอดภัย</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Content list</label>
                            <select class="form-control custom-select" id="search_course_content_list_name" name="course_content_list_name">
                                <option value="0">----Select----</option>
                                <option value="">สาเหตุของการเกิดอุบัติเหตุและแนวทางการป้องกัน</option>
                                <option value="">เทคนิคการขับรถอย่างปลอดภัย</option>
                                <option value="">เทคนิคการสังเกตและการคาดการณ์</option>
                                <option value="">กฎหมายจราจรเพื่อการขับรถอย่างปลอดภัย</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Start time</label>
                        <input type="time" id="search_time" name="time" class="form-control search_table" placeholder="">
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">End time</label>
                        <input type="time" id="search_time" name="time" class="form-control search_table" placeholder="">
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
                    <h4 class="card-title">Monthly driver training report</h4>

                </div>
                <div class="table-responsive">
                    <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                            <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                        </a>
                    </div>
                    <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">No</th>
                                <th scope="col">เวลา</th>
                                <th scope="col">ชื่อ-สกุล</th>
                                <th scope="col">หน่วยงาน</th>
                                <th scope="col">ลายเซ็น</th>
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
                                <td>08:30 น. - 11:30 น.</td>
                                <td>สมชาย มุ่งมั่น</td>
                                <td>ทดแทนระยอง</td>
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
                                <td></td>
                                <td>อนุวัฒน์ จันทกาล</td>
                                <td>ทดแทนระยอง</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">3</th>
                                <td></td>
                                <td>ผดุง ด้วงคำ</td>
                                <td>ทดแทนระยอง</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation4" required>
                                        <label class="custom-control-label" for="customControlValidation4"></label>
                                    </div>
                                </td>
                                <th scope="row">4</th>
                                <td></td>
                                <td>อัศนัย ภูมิวิศัย</td>
                                <td>ทดแทนลาดพร้าว</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation5" required>
                                        <label class="custom-control-label" for="customControlValidation5"></label>
                                    </div>
                                </td>
                                <th scope="row">5</th>
                                <td></td>
                                <td>ทวีศักดิ์ พูนสมบัติ</td>
                                <td>ทดแทนลาดพร้าว</td>
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