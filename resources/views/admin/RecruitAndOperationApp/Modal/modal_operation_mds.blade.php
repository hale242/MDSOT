<div class="modal fade" id="ModalOperationMDS" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Recruit MDS.</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form id="FormOperationMDS" class="needs-validation" novalidate>
                <input type="hidden" id="add_operation_driver_interview_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>ผลสัมภาษณ์</h4>
                                        <div class="custom-control custom-radio mt-2">
                                            <input type="radio" id="add_driver_interview_operation_status_1" name="driver_interview_operation_status" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="add_driver_interview_operation_status_1">ผ่าน</label>
                                        </div>
                                        <div class="custom-control custom-radio mt-2">
                                            <input type="radio" id="add_driver_interview_operation_status_99" name="driver_interview_operation_status" class="custom-control-input" value="99">
                                            <label class="custom-control-label" for="add_driver_interview_operation_status_99">ไม่ผ่าน</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4>สาเหตุที่รับ กรณีไม่ผ่านเกณฑ์</h4>
                                            <div class="custom-control custom-radio mt-2">
                                                <input type="radio" id="add_driver_interview_operation_other_ch_1" name="driver_interview_operation_other_ch" class="custom-control-input" value="1">
                                                <label class="custom-control-label" for="add_driver_interview_operation_other_ch_1">ไม่มีประสบการณ์ แต่รู้เส้นทางดี</label>
                                            </div>
                                            <div class="custom-control custom-radio mt-2">
                                                <input type="radio" id="add_driver_interview_operation_other_ch_2" name="driver_interview_operation_other_ch" class="custom-control-input" value="2">
                                                <label class="custom-control-label" for="add_driver_interview_operation_other_ch_2">มีประสบการณ์ขับรถยนต์ส่วนกลางเท่านั้น</label>
                                            </div>
                                            <div class="custom-control custom-radio mt-2">
                                                <input type="radio" id="add_driver_interview_operation_other_ch_3" name="driver_interview_operation_other_ch" class="custom-control-input" value="3">
                                                <label class="custom-control-label" for="add_driver_interview_operation_other_ch_3">มีประสบการณ์ขับรถยนต์น้อย แต่สามารถพัฒนาได้</label>
                                            </div>
                                            <div class="custom-control custom-radio mt-2">
                                                <input type="radio" id="add_driver_interview_operation_other_ch_4" name="driver_interview_operation_other_ch" class="custom-control-input" value="4">
                                                <label class="custom-control-label" for="add_driver_interview_operation_other_ch_4">อื่น ๆ</label>
                                                <input type="text" id="add_driver_interview_operation_other" name="driver_interview_operation_other" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="add_driver_interview_operation_comment">ข้อคิดเห็น / ข้อเสนอแนะ</label>
                                        <textarea id="add_driver_interview_operation_comment" name="driver_interview_operation_comment" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="add_driver_interview_operation_date">วันที่ประเมิน</label>
                                        <input type="date" id="add_driver_interview_operation_date" name="driver_interview_operation_date" class="form-control" value="{{date('Y-m-d')}}" required>
                                    </div>
                                </div>
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
