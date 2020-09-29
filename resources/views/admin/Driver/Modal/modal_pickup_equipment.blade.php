<div class="modal fade" id="ModalEquipment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Equipment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                        <form id="FormEquipment" class="needs-validation" novalidate>
                            @php
                            $admin = Auth::guard('admin')->user();
                            @endphp
                            <input type="hidden" id="add_driver_equipment_id" name="driver_id">
                            <input type="hidden" id="add_admin_id" name="admin_id" value="{{ $admin->admin_id }}">
                            <div class="form-row">
                                <div class="col-md-5 mb-3">
                                    <label for="working_equipment_id">Equipment</label>
                                    <select class="form-control custom-select select2" id="add_working_equipment_id" name="working_equipment_id">
                                        <option value="">Select</option>
                                        @foreach($WorkingEquipments as $WorkingEquipment)
                                        <option value="{{ $WorkingEquipment->working_equipment_id }}">{{ $WorkingEquipment->working_equipment_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="pickup_equipment_count">Amount</label>
                                    <input type="number" class="form-control" id="add_pickup_equipment_count" name="pickup_equipment_count">
                                </div>

                                <div class="col-md-5 mb-3">
                                    <label for="pickup_equipment_date_approve">Date pick up</label>
                                    <input type="date" class="form-control" id="add_pickup_equipment_date_approve" name="pickup_equipment_date_approve">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="run_code_reftype">Size</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="S" id="pickup_equipment_site_1" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_1">S</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="M" id="pickup_equipment_site_2" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_2">M</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="L" id="pickup_equipment_site_3" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_3">L</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="XL" id="pickup_equipment_site_4" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_4">XL</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="2 XL" id="pickup_equipment_site_5" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_5">2 XL</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="3 XL" id="pickup_equipment_site_6" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_6">3 XL</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="4 XL" id="pickup_equipment_site_7" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_7">4 XL</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="5 XL" id="pickup_equipment_site_8" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_8">5 XL</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="6 XL" id="pickup_equipment_site_9" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_9">6 XL</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="7 X" id="pickup_equipment_site_10" name="pickup_equipment_site">
                                            <label class="custom-control-label" for="pickup_equipment_site_10">7 XL</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="ไม่มีขนาด" id="pickup_equipment_site_11" name="pickup_equipment_site" checked>
                                            <label class="custom-control-label" for="pickup_equipment_site_11">ไม่มีขนาด</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="pickup_equipment_site_in">Site In</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="28" id="add_pickup_equipment_site_in_28" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_28">28</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="30" id="add_pickup_equipment_site_in_30" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_30">30</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="32" id="add_pickup_equipment_site_in_32" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_32">32</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="34" id="add_pickup_equipment_site_in_34" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_34">34</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="36" id="add_pickup_equipment_site_in_36" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_36">36</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="38" id="add_pickup_equipment_site_in_38" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_38">38</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="40" id="add_pickup_equipment_site_in_40" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_40">40</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="42" id="add_pickup_equipment_site_in_42" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_42">42</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="46" id="add_pickup_equipment_site_in_46" name="pickup_equipment_site_in">
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_46">46</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="ไม่มีขนาด" id="add_pickup_equipment_site_in_48" name="pickup_equipment_site_in" checked>
                                            <label class="custom-control-label" for="add_pickup_equipment_site_in_48">ไม่มีขนาด</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="pickup_equipment_comment">Comment</label>
                                    <textarea class="form-control" id="add_pickup_equipment_comment" name="pickup_equipment_comment" rows="2"></textarea>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_pickup_equipment_status" name="pickup_equipment_status" checked value="1">
                                        <label class="custom-control-label" for="add_pickup_equipment_status">Active</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tableEquipment" class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Equipment</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Date pick up</th>
                                                <th scope="col">Comment</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3"></th>
                                                <th colspan="4"></th>
                                            </tr>
                                        </tfoot>
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