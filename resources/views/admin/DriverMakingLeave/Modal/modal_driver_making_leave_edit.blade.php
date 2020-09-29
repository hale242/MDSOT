<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Update</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
         </div>
         <form id="FormEdit" class="needs-validation" novalidate>
            <input type="hidden" id="edit_id">
            <div class="card">
               <div class="form-body">
                  <div class="card-body">
                     <div class="form-row">
                        <div class="col-md-6 mb-3">
                           <label for="driver_id">Driver</label>
                           <select class="form-control custom-select  select2" id="edit_driver_id" name="driver_id" required>
                               <option value="">----Select----</option>
                               @foreach($Drivers as $val)
                                   <option value="{{$val->driver_id}}">{{$val->driver_name_th.' '.$val->driver_lastname_th}}</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="driver_leave_line_branch_id">Branch name</label>
                           <select class="form-control custom-select  select2" id="edit_driver_leave_line_branch_id" name="driver_leave_line_branch_id" required>
                               <option value="">----Select----</option>
                               @foreach($DriverLeaveLineBranchs as $val)
                                   <option value="{{ $val->driver_leave_line_branch_id }}">{{ $val->driver_leave_line_branch_name }}</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="leave_type_id">Leave type</label>
                           <select class="form-control custom-select  select2" id="edit_leave_type_id" name="leave_type_id" required>
                               <option value="">----Select----</option>
                               @foreach($LeaveTypes as $cval)
                                   <option value="{{ $cval->leave_type_id }}">{{ $cval->leave_type_name }}</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="driver_making_leave_type">Type</label>
                           <select class="form-control custom-select select2 making_leave_type" id="edit_driver_making_leave_type" name="driver_making_leave_type" required>
                              <option value="">----Select----</option>
                              <option value="1">ลาเต็มวัน</option>
                              <option value="2">ลาครึ่งวันเช้า</option>
                              <option value="3">ลาครึ่งวันบ่าย</option>
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="driver_making_leave_start_date">Start leave date</label>
                           <input type="date" class="form-control making_leave_start_date" id="edit_driver_making_leave_start_date" name="driver_making_leave_start_date" readonly required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="driver_making_leave_end_date">End leave date</label>
                           <input type="date" class="form-control making_leave_end_date" id="edit_driver_making_leave_end_date" name="driver_making_leave_end_date" readonly required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="driver_making_leave_count_date">Number of leave days</label>
                           <input type="text" class="form-control making_leave_count_date" id="edit_driver_making_leave_count_date" name="driver_making_leave_count_date"  readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                             <label for="driver_making_leave_name">Leave name</label>
                             <input type="text" class="form-control" id="edit_driver_making_leave_name" name="driver_making_leave_name" required>
                        </div>
                        <div class="col-md-12 mb-3">
                           <label for="driver_making_leave_details">Details</label>
                           <textarea class="form-control" id="edit_driver_making_leave_details" name="driver_making_leave_details" rows="5"></textarea>
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
