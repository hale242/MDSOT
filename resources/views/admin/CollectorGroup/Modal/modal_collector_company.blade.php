<div class="modal fade" id="ModalViewCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="FormAddCompany" class="needs-validation" novalidate>
                <!-- <input type="hidden" id="add_driver_id" name="driver_id"> -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            @php
                            $admin = Auth::guard('admin')->user();
                            @endphp
                            <label for="add_manager_admin_id">Admin approving</label>
                            <input type="text" class="form-control" value="{{ $admin->first_name }} {{ $admin->last_name }}" readonly>
                            <input type="hidden" id="add_manager_admin_id" name="admin_id" value="{{ $admin->admin_id }}">
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="add_collertor_group_id">Group Name</label>
                            <input type="text" class="form-control" id="add_collertor_group_name2" readonly>
                            <input type="hidden" id="add_collertor_group_id2" name="collertor_group_id">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="company_id">Company Name</label>
                            <select class="form-control custom-select select2" id="add_company_id" name="company_id" required>
                                <option value="">----Select----</option>
                                @if($Companies)
                                @foreach($Companies as $Company)
                                <option value="{{$Company->company_id}}">{{$Company->company_name_th}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="add_collertor_company_details">Details</label>
                            <textarea cols="80" class="form-control" id="add_collertor_company_details" name="collertor_company_details" rows="2"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="Check-Box">Status</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="add_collertor_company_status" name="collertor_company_status" checked value="1">
                                <label class="custom-control-label" for="add_collertor_company_status">Active</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 px-0">
                        <table id="tableCollectorCompany" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Admin approving</th>
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