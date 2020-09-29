<div class="modal fade" id="ModalLineApprove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Driver leave line approve</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
         </div>
         <div class="card">
            <div class="form-body">
                <div class="card-body">
                    <form id="FormLineApprove" class="needs-validation" novalidate>
                       <input type="hidden" id="driver_leave_line_branch_id" name="driver_leave_line_branch_id">
                       <div class="form-row">
                          <div class="col-md-6 mb-3">
                             <label for="driver_leave_line_branch_id">Leave line branch</label>
                             <input type="text" class="form-control" id="driver_leave_line_branch_name" readonly>
                          </div>
                          <div class="col-md-6 mb-3">
                             <label for="position_id">Position</label>
                             <select class="form-control custom-select select2" id="add_position_id" name="position_id" required>
                                <option value="">----Select----</option>
                                @foreach($Positions as $val)
                                    <option value="{{$val->position_id}}">{{$val->position_name}}</option>
                                @endforeach
                             </select>
                          </div>
                          <div class="col-md-6 mb-3">
                             <label for="driver_leave_line_approve_name">Approve name</label>
                             <input type="text" class="form-control" id="add_driver_leave_line_approve_name" name="driver_leave_line_approve_name" required>
                          </div>
                          <div class="col-md-6 mb-3">
                             <label for="driver_leave_line_approve_lv">Approve level</label>
                             <input type="number" class="form-control" id="add_driver_leave_line_approve_lv" name="driver_leave_line_approve_lv" min="1" max="99" placeholder="1 - 99" required>
                          </div>
                          <div class="col-md-6 mb-3">
                             <label for="driver_leave_line_approve_details">Details</label>
                             <textarea class="form-control" id="add_driver_leave_line_approve_details" name="driver_leave_line_approve_details" rows="3"></textarea>
                          </div>
                          <div class="col-md-3 mb-3">
                             <label for="Check-Box">Status</label>
                             <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="add_driver_leave_line_approve_status" name="driver_leave_line_approve_status" value="1" checked>
                                <label class="custom-control-label" for="driver_leave_line_approve_status">Active</label>
                             </div>
                          </div>
                          <div class="col-md-12 mb-3">
                             <div class="text-right mt-3">
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                             </div>
                          </div>
                       </div>
                   </form>
                   <hr>
                   <div class="form-row">
                      <div class="col-md-12 mb-3">
                         <div class="table-responsive">
                            <table id="tableDriverLeaveLineApprove" class="table" width="100%">
                               <thead>
                                  <tr class="text-center">
                                     <th scope="col">No.</th>
                                     <th scope="col">Position</th>
                                     <th scope="col">Approve name</th>
                                     <th scope="col">Approve level</th>
                                     <th scope="col">Details</th>
                                     <th scope="col">Actions</th>
                                  </tr>
                               </thead>
                            </table>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
