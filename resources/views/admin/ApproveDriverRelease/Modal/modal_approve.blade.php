<div class="modal-header">
    <h4 class="modal-title">Approve driver</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
</div>
<form id="approveDriver" action="#" class="needs-validation" novalidate>
    @csrf
    <input type="hidden" name="customer_contract_id" id="customer_contract_id" value="{{$content->customer_contract_id}}">
    <div class="card">
        @php
            $dateapprove = $content->customer_contract_date_approve ? date('Y-m-d', strtotime($content->customer_contract_date_approve)) : '';
            $datestart = $content->customer_contract_date_start ? date('Y-m-d', strtotime($content->customer_contract_date_start)) : '';
            $dateend = $content->customer_contract_date_end ? date('Y-m-d', strtotime($content->customer_contract_date_end)) : '';

            $dateapp = ($dateapprove<date('Y-m-d')) ? date('Y-m-d') : $dateapprove ;
        @endphp
        <div class="form-body">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="customer_contract_date_driver_approve">Date of approval for employees starting work</label>
                        <input type="date" class="form-control" id="add_customer_contract_date_driver_approve" name="customer_contract_date_driver_approve" min="<?php echo date('Y-m-d'); ?>" placeholder="" value="{{$dateapp}}">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">วันที่เริ่มสัญญา</label>
                            <input type="date" id="customer_contract_date_start" name="customer_contract_date_start" class="form-control search_table" placeholder="" value="{{$datestart}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">วันสิ้นสุดสัญญา</label>
                            <input type="date" id="customer_contract_date_end" name="customer_contract_date_end" class="form-control search_table" placeholder="" value="{{$dateend}}" readonly>
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

<script>
    $('#approveDriver').submit(function(event){
        event.preventDefault();
        var param = $('#approveDriver').serializeArray();
        $.post(url_gb+'/admin/ApproveDriverRelease',{param},function(data){
            swal('Approve Success','ดำเนินการ Approve เรียบร้อย','success');
            $('#ApproveModal').modal('hide')
            ApproveDriverReleaseTable.api().ajax.reload();
        });
    });
</script>
