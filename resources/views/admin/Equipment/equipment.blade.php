@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <button id="swapSearch" type="button" class="btn btn-outline-secondary m-t-10 mb-0 mr-1 float-right newdata showSerach showSearch" data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample">
                    <span class="ti-angle-down"></span>
                </button>
                <div class="collapse" id="collapseExample">
                    <form id="FormSearch">
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Equipment</label>
                                    <select class="form-control custom-select select2" id="search_working_equipment_id" name="working_equipment_id" required>
                                        <option value="0">----Select----</option>
                                        @foreach($WorkingEquipments as $WorkingEquipment)
                                        <option value="{{ $WorkingEquipment->working_equipment_id }}">{{ $WorkingEquipment->working_equipment_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Driver</label>
                                    <select class="form-control custom-select select2" id="search_driver_id">
                                        <option value="0">----Select----</option>
                                        @foreach($Drivers as $Driver)
                                        <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="search_withdrawal_date">Withdrawal start date</label>
                                    <input type="date" class="form-control" id="search_withdrawal_start_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="search_withdrawal_date">Withdrawal End date</label>
                                    <input type="date" class="form-control" id="search_withdrawal_end_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="search_equipment_date_approve">Approval start date</label>
                                    <input type="date" class="form-control" id="search_equipment_date_start_approve">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="search_equipment_date_approve">Approval end date</label>
                                    <input type="date" class="form-control" id="search_equipment_date_end_approve">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="search_pickup_equipment_comment">Comment</label>
                                    <input type="text" class="form-control" id="search_pickup_equipment_comment">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                        <button type="button" class="btn btn-secondary clear-search btn-clear-search">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
                    @if(App\Helper::CheckPermissionMenu('Equipment' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableEquipment" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Action</th>
                                <th scope="col">No</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Equipment</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Withdrawal date</th>
                                <th scope="col">Approver</th>
                                <th scope="col">Date Approved</th>
                                <th scope="col">Size</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
<div class="modal fade" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                        <form id="FormAdd" class="needs-validation" novalidate="">
                            @php
                            $admin = Auth::guard('admin')->user();
                            @endphp
                            <input type="hidden" id="add_admin_id" name="admin_id" value="{{ $admin->admin_id }}">
                            <div class="form-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="add_driver_id">Driver</label>
                                        <select class="form-control custom-select select2" id="add_driver_id" name="driver_id">
                                            <option value="0">----Select----</option>
                                            @foreach($Drivers as $Driver)
                                            <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="add_working_equipment_id">Equipment</label>
                                        <select class="form-control custom-select select2" id="add_working_equipment_id" name="working_equipment_id" required>
                                            <option value="0">----Select----</option>
                                            @foreach($WorkingEquipments as $WorkingEquipment)
                                            <option value="{{ $WorkingEquipment->working_equipment_id }}">{{ $WorkingEquipment->working_equipment_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pickup_equipment_site">Size</label> <br>
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
                                    <div class="col-md-6 mb-3">
                                        <label for="pickup_equipment_site_in">Site In</label> <br>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="28" id="pickup_equipment_site_in_28" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_28">28</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="30" id="pickup_equipment_site_in_30" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_30">30</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="32" id="pickup_equipment_site_in_32" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_32">32</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="34" id="pickup_equipment_site_in_34" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_34">34</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="36" id="pickup_equipment_site_in_36" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_36">36</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="38" id="pickup_equipment_site_in_38" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_38">38</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="40" id="pickup_equipment_site_in_40" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_40">40</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="42" id="pickup_equipment_site_in_42" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_42">42</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="46" id="pickup_equipment_site_in_46" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="pickup_equipment_site_in_46">46</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="ไม่มีขนาด" id="pickup_equipment_site_in_48" name="pickup_equipment_site_in" checked>
                                                <label class="custom-control-label" for="pickup_equipment_site_in_48">ไม่มีขนาด</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="add_pickup_equipment_count">Amount</label>
                                        <input type="number" class="form-control" id="add_pickup_equipment_count" name="pickup_equipment_count" min="1" placeholder="" value="" required="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="add_pickup_equipment_date_approve">Date Approved</label>
                                        <input type="date" class="form-control" id="pickup_equipment_date_approve" name="pickup_equipment_date_approve" placeholder="" value="">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="add_pickup_equipment_comment">Comment</label>
                                        <textarea class="form-control" id="add_pickup_equipment_comment" name="pickup_equipment_comment" rows="2" style="margin-top: 0px; margin-bottom: 0px; height: 119px;"></textarea>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="Check-Box">Status</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="add_pickup_equipment_status" name="pickup_equipment_status" checked value="1">
                                            <label class="custom-control-label" for="add_pickup_equipment_status">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="card">
                <div class="form-body">
                    <div class="card-body">
                        <form id="FormEdit" class="needs-validation" novalidate>
                            <input type="hidden" id="edit_id" name="pickup_equipment_id">
                            @php
                            $admin = Auth::guard('admin')->user();
                            @endphp
                            <input type="hidden" id="edit_admin_id" name="admin_id" value="{{ $admin->admin_id }}">
                            <div class="form-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_driver_id">Driver</label>
                                        <select class="form-control custom-select select2" id="edit_driver_id" name="driver_id">
                                            <option value="0">----Select----</option>
                                            @foreach($Drivers as $Driver)
                                            <option value="{{ $Driver->driver_id }}">{{ $Driver->driver_name_th }} {{ $Driver->driver_lastname_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_working_equipment_id">Equipment</label>
                                        <select class="form-control custom-select select2" id="edit_working_equipment_id" name="working_equipment_id" required>
                                            <option value="0">----Select----</option>
                                            @foreach($WorkingEquipments as $WorkingEquipment)
                                            <option value="{{ $WorkingEquipment->working_equipment_id }}">{{ $WorkingEquipment->working_equipment_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pickup_equipment_site">Size</label> <br>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="S" id="edit_pickup_equipment_site_1" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_1">S</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="M" id="edit_pickup_equipment_site_2" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_2">M</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="L" id="edit_pickup_equipment_site_3" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_3">L</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="XL" id="edit_pickup_equipment_site_4" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_4">XL</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="2 XL" id="edit_pickup_equipment_site_5" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_5">2 XL</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="3 XL" id="edit_pickup_equipment_site_6" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_6">3 XL</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="4 XL" id="edit_pickup_equipment_site_7" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_7">4 XL</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="5 XL" id="edit_pickup_equipment_site_8" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_8">5 XL</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="6 XL" id="edit_pickup_equipment_site_9" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_9">6 XL</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="7 X" id="edit_pickup_equipment_site_10" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_10">7 XL</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="ไม่มีขนาด" id="edit_pickup_equipment_site_11" name="pickup_equipment_site">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_11">ไม่มีขนาด</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pickup_equipment_site_in">Site In</label> <br>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="28" id="edit_pickup_equipment_site_in_28" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_28">28</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="30" id="edit_pickup_equipment_site_in_30" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_30">30</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="32" id="edit_pickup_equipment_site_in_32" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_32">32</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="34" id="edit_pickup_equipment_site_in_34" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_34">34</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="36" id="edit_pickup_equipment_site_in_36" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_36">36</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="38" id="edit_pickup_equipment_site_in_38" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_38">38</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="40" id="edit_pickup_equipment_site_in_40" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_40">40</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="42" id="edit_pickup_equipment_site_in_42" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_42">42</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="46" id="edit_pickup_equipment_site_in_46" name="pickup_equipment_site_in">
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_46">46</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" value="ไม่มีขนาด" id="edit_pickup_equipment_site_in_48" name="pickup_equipment_site_in" checked>
                                                <label class="custom-control-label" for="edit_pickup_equipment_site_in_48">ไม่มีขนาด</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_pickup_equipment_count">Amount</label>
                                        <input type="number" class="form-control" id="edit_pickup_equipment_count" name="pickup_equipment_count" min="1" placeholder="" value="" required="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="edit_pickup_equipment_date_approve">Date Approved</label>
                                        <input type="date" class="form-control" id="edit_pickup_equipment_date_approv" name="pickup_equipment_date_approve" placeholder="" value="">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="edit_pickup_equipment_comment">Comment</label>
                                        <textarea class="form-control" id="edit_pickup_equipment_comment" name="pickup_equipment_comment" rows="2" style="margin-top: 0px; margin-bottom: 0px; height: 119px;"></textarea>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="Check-Box">Status</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="edit_pickup_equipment_status" name="pickup_equipment_status" checked value="1">
                                            <label class="custom-control-label" for="edit_pickup_equipment_status">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <input type="hidden" id="driver_equipment_id" name="driver_id">
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <label for="example-text-input" class="col-form-label">Driver : </label>
                                    <label for="example-text-input" id="show_driver_name" class="col-form-label"></label>
                                </tr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tableEquipmentView" class="table table-bordered" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Equipment</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Withdrawal date</th>
                                                        <th scope="col">Approver</th>
                                                        <th scope="col">Date Approved</th>
                                                        <th scope="col">Comment</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3"></th>
                                                        <th colspan="5"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var tableEquipment = $('#tableEquipment').dataTable({
        "ajax": {
            "url": url_gb + "/admin/Equipment/Lists",
            "type": "POST",
            "data": function(d) {
                d.page = "{{isset($Page) ? $Page : ''}}";
                d.working_equipment_id = $('#search_working_equipment_id').val();
                d.driver_id = $('#search_driver_id').val();
                d.withdrawal_start_date = $('#search_withdrawal_start_date').val();
                d.withdrawal_end_date = $('#search_withdrawal_end_date').val();
                d.equipment_date_start_approve = $('#search_equipment_date_start_approve').val();
                d.equipment_date_end_approve = $('#search_equipment_date_end_approve').val();
                d.pickup_equipment_comment = $('#search_pickup_equipment_comment').val();
                // etc
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {
                "data": "action",
                "name": "action",
                "searchable": false,
                "sortable": false,
                "class": "text-center"
            },{
                "data": "DT_RowIndex",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "driver_name",
                "class": "text-center",
                "searchable": false,
                "sortable": false,
            },
            {
                "data": "working_equipment_name"
            },
            {
                "data": "pickup_equipment_count"
            },
            {
                "data": "withdrawal_date",
                "class": "text-center"
            },
            {
                "data": "admin_name",
                "class": "text-center"
            },
            {
                "data": "date",
                "class": "text-center"
            },
            {
                "data": "pickup_equipment_site",
                "searchable": false,
                "sortable": false
            },
            

        ],
        "select": true,
        "dom": 'Bfrtip',
        "lengthMenu": [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "columnDefs": [{
            className: 'noVis',
            visible: false
        }],
        "buttons": [
            'pageLength',
            'colvis',
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        processing: true,
        serverSide: true,
    });

    $('body').on('click', '.btn-search', function() {
        tableEquipment.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function() {
        $('#search_working_equipment_id').val('').change();
        $('#search_driver_id').val('').change();
        $('#search_withdrawal_start_date').val('');
        $('#search_withdrawal_end_date').val('');
        $('#search_equipment_date_start_approve').val('');
        $('#search_equipment_date_end_approve').val('');
        $('#search_pickup_equipment_comment').val('');
        tableEquipment.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#add_equipment_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-edit', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/Equipment/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';

            $('#edit_driver_id').val(data.driver_id).change();
            $('#edit_working_equipment_id').val(data.working_equipment_id).change();;
            $('#edit_pickup_equipment_count').val(data.pickup_equipment_count);
            $('#edit_pickup_equipment_comment').val(data.pickup_equipment_comment);
            $('#edit_pickup_equipment_date_approv').val(data.format_pickup_equipment_date_approve);
            if (data.pickup_equipment_status == 1) {
                $('#edit_pickup_equipment_status').prop('checked', true);
            } else {
                $('#edit_pickup_equipment_status').prop('checked', false);
            }

            if (data.pickup_equipment_site == "S") {
                $('#edit_pickup_equipment_site_1').prop('checked', true);
            } else if (data.pickup_equipment_site == "M") {
                $('#edit_pickup_equipment_site_2').prop('checked', true);
            } else if (data.pickup_equipment_site == "L") {
                $('#edit_pickup_equipment_site_3').prop('checked', true);
            } else if (data.pickup_equipment_site == "XL") {
                $('#edit_pickup_equipment_site_4').prop('checked', true);
            } else if (data.pickup_equipment_site == "2 XL") {
                $('#edit_pickup_equipment_site_5').prop('checked', true);
            } else if (data.pickup_equipment_site == "3 XL") {
                $('#edit_pickup_equipment_site_6').prop('checked', true);
            } else if (data.pickup_equipment_site == "4 XL") {
                $('#edit_pickup_equipment_site_7').prop('checked', true);
            } else if (data.pickup_equipment_site == "5 XL") {
                $('#edit_pickup_equipment_site_8').prop('checked', true);
            } else if (data.pickup_equipment_site == "6 XL") {
                $('#edit_pickup_equipment_site_9').prop('checked', true);
            } else if (data.pickup_equipment_site == "7 XL") {
                $('#edit_pickup_equipment_site_10').prop('checked', true);
            } else if (data.pickup_equipment_site == "ไม่มีขนาด") {
                $('#edit_pickup_equipment_site_11').prop('checked', true);
            }
            if (data.pickup_equipment_site_in == "28") {
                $('#edit_pickup_equipment_site_in_28').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "30") {
                $('#edit_pickup_equipment_site_in_30').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "32") {
                $('#edit_pickup_equipment_site_in_32').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "34") {
                $('#edit_pickup_equipment_site_in_34').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "36") {
                $('#edit_pickup_equipment_site_in_36').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "38") {
                $('#edit_pickup_equipment_site_in_38').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "40") {
                $('#edit_pickup_equipment_site_in_40').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "42") {
                $('#edit_pickup_equipment_site_in_42').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "46") {
                $('#edit_pickup_equipment_site_in_46').prop('checked', true);
            } else if (data.pickup_equipment_site_in == "ไม่มีขนาด") {
                $('#edit_pickup_equipment_site_in_48').prop('checked', true);
            }
            $('#ModalEdit').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#driver_equipment_id').val(id);
        $('#ModalView').modal('show');
        EquipmenViewtDatatable();
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/Equipment/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $('#show_driver_name').text(data.driver.driver_name_th + ' ' + data.driver.driver_lastname_th);

        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    var pickup_equipment_view = 0;

    function EquipmenViewtDatatable() {
        var tableEquipmentView = $('#tableEquipmentView').dataTable({
            "ajax": {
                "url": url_gb + "/admin/Equipment/Lists",
                "type": "POST",
                "data": function(d) {
                    d.driver_id = $('#driver_equipment_id').val()
                }
            },
            "drawCallback": function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [{
                    "data": "DT_RowIndex",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false
                },
                {
                    "data": "working_equipment_name"
                },
                {
                    "data": "pickup_equipment_site"
                },
                {
                    "data": "pickup_equipment_count"
                },
                {
                    "data": "withdrawal_date"
                },
                {
                    "data": "admin_name"
                },
                {
                    "data": "date"
                },
                {
                    "data": "pickup_equipment_comment"
                },

            ],
            "select": true,
            "dom": 'Bfrtip',
            "lengthMenu": [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "columnDefs": [{
                className: 'noVis',
                visible: false
            }],
            "buttons": [
                'pageLength',
                'colvis',
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                var SumAount = api
                    .column(3)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(0).footer()).html();
                $(api.column(1).footer()).html();
                $(api.column(2).footer()).html('Total');
                $(api.column(3).footer()).html(SumAount);

            },
            processing: true,
            serverSide: true,
        });
        if (pickup_equipment_view > 0) {
            tableEquipmentView.api().ajax.reload();
        }
        pickup_equipment_view++;

    }

    $('body').on('change', '.change-status', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Equipment/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableEquipment.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Equipment",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableEquipment.api().ajax.reload();
                $('#ModalAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "PUT",
            url: url_gb + "/admin/Equipment/" + id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableEquipment.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
@endsection