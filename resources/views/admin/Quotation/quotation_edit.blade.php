@extends('layouts.layout')@section('content')

<div class="row" id="CardQuotation">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="FormEdit" class="needs-validation" novalidate>
                    <input type="hidden" id="edit_id" value="{{$Quotation->quotation_id}}">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="admin_id">Sales</label>
                                    <input type="text" class="form-control" value="{{$Quotation->AdminUser ? $Quotation->AdminUser->first_name.' '.$Quotation->AdminUser->last_name : ''}}" readonly />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quotation_status">Status</label>
                                    <select class="form-control custom-select select2" id="edit_quotation_status" disabled>
                                        <option value="">----Select----</option>
                                        @foreach($Status as $key=>$val)
                                            <option value="{{$key}}" {{$key == $Quotation->quotation_status ? 'selected' : ''}}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-5 mb-3">
                                    <label for="quotation_date_doc">Creation date</label>
                                    <input type="date" class="form-control start_date" id="edit_quotation_date_doc" name="quotation_date_doc" value="{{$Quotation->quotation_date_doc ? date('Y-m-d', strtotime($Quotation->quotation_date_doc)) : ''}}" onchange="calculate_date(2,1)" required />
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="quotation_due_date_count">Number of due date</label>
                                    <input type="number" class="form-control date_amount" id="edit_quotation_due_date_count" name="quotation_due_date_count" value="{{$Quotation->quotation_due_date_count}}" onchange="calculate_date(2,2)" required/>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="quotation_due_date">Due date</label>
                                    <input type="date" class="form-control end_date" id="edit_quotation_due_date" name="quotation_due_date" value="{{$Quotation->quotation_due_date ? date('Y-m-d', strtotime($Quotation->quotation_due_date)) : ''}}" onchange="calculate_date(2,3)" required/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quotation_full_code">Quotation full code</label>
                                    <input type="text" class="form-control" value="{{$Quotation->quotation_full_code}}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quotation_acc_code">Account Code</label>
                                    <input type="text" class="form-control" id="edit_quotation_acc_code" name="quotation_acc_code" value="{{$Quotation->quotation_acc_code}}" readonly />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quotation_book_acc">Book</label>
                                    <input type="text" class="form-control" id="edit_quotation_book_acc" name="quotation_book_acc" value="{{$Quotation->quotation_book_acc}}"readonly />
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_id">Company</label>
                                    <select class="form-control custom-select select2 select_company_id" id="edit_company_id" name="company_id" required>
                                        <option value="">----Select----</option>
                                        @foreach($Companies as $val)
                                            <option value="{{$val->company_id}}" {{$val->company_id == $Quotation->company_id ? 'selected' : ''}}>{{$val->company_name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_id">Contact info</label>
                                    <select class="form-control custom-select select2 select_customer_id" id="edit_customer_id" name="customer_id">
                                        <option value="">----Select----</option>
                                        @foreach($Customers as $val)
                                            <option value="{{$val->customer_id}}" {{$val->customer_id == $Quotation->customer_id ? 'selected' : ''}}>{{$val->customer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_title">Title</label>
                                    <input type="text" class="form-control" id="edit_quotation_title" name="quotation_title" value="{{$Quotation->quotation_title}}" required />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_condition">Condition</label>
                                    <textarea id="edit_quotation_condition" name="quotation_condition" rows="8" data-sample="1" data-sample-short>{!!$Quotation->quotation_condition!!}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_delivery_schedule">Deliverry Schedule</label>
                                    <textarea id="edit_quotation_delivery_schedule" name="quotation_delivery_schedule" rows="8" data-sample="1" data-sample-short>{!!$Quotation->quotation_delivery_schedule!!}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                @if($Quotation->quotation_status != 5)
                                                    <th>
                                                        <button type="button" class="btn btn-circle btn-success btn-add-price-structure-item"> <i class="fas fa-plus"></i> </button>
                                                    </th>
                                                @endif
                                                <th>No.</th>
                                                <th>Price structure</th>
                                                <th>Quantity</th>
                                                <th>Services Rate / Person</th>
                                                <th>OT</th>
                                                <th>OT Setting</th>
                                                <th>Taxi Price</th>
                                                <th>Travel allowances</th>
                                                <th>Accomadation</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_price_structure_item">
                                            @foreach($Quotation->QuotationPriceListMain as $key=>$val)
                                                <tr class="price_structure_item" id="price_structure_item{{$key}}">
                                                    <input type="hidden" class="quotation_price_list_id" name="quotation_price_list[{{$key}}][quotation_price_list_id]" value="{{$val->quotation_price_list_id}}">
                                                    @if($Quotation->quotation_status != 5)
                                                    		<td>
                                                      			<button type="button" class="btn btn-circle btn-danger text-white btn-delete-price-structure-item" data-item="{{$key}}">
                                                      				<i class="fas fa-trash-alt"></i>
                                                      			</button>
                                                    		</td>
                                                    @endif
                                                		<td class="price_structure_item_no" data-no="{{$key+1}}">{{($key + 1)}}</td>
                                                		<td class="text-center">
                                                				<select class="form-control custom-select select2 select_price_structure" name="quotation_price_list[{{$key}}][price_structure_id]" data-item="{{$key}}" data-no="{{$key}}" {{$Quotation->quotation_status != 5 ? '' : 'disabled'}}>
                                                            @foreach($PriceStructures as $price)
                                                                <option value="{{$price->price_structure_id}}" {{$price->price_structure_id == $val->price_structure_id ? 'selected' : ''}}>{{$price->price_structure_name}}</option>
                                                            @endforeach
                                                				</select>
                                                		    <div class="btn_price_structure">
                                                            <button type="button" class="btn btn-warning mt-3 btn-pr" data-toggle="modal" data-target="#ModalExpenses{{$val->quotation_price_list_id}}">
                                                                 Price structure
                                                             </button>
                                                		    </div>
                                                		</td>
                                                		<td>
                                                     		<input type="number" class="form-control text-center quotation_price_list_unit" name="quotation_price_list[{{$key}}][quotation_price_list_unit]" min="1" value="{{$val->quotation_price_list_unit}}" required>
                                                     		<input type="hidden" class="form-control text-center price_structure_sum" value="{{$val->quotation_price_list_cost}}">
                                                		</td>
                                                		<td>
                                                			   <input type="text" class="form-control text-right quotation_price_list_price price" name="quotation_price_list[{{$key}}][quotation_price_list_price]" value="{{number_format($val->quotation_price_list_price, 2)}}" required>
                                                		     <label class="min_quotation_price_list_price"></label>
                                                		</td>
                                                		<td>
                                                		     <div class="quotation_price_list_ot_price">
                                                              @foreach($val->QuotationPriceListOt as $k=>$ot)
                                                                 {{$ot->PriceStructureOt ? $ot->PriceStructureOt->price_structure_ot_name : ''}}
                                                                 <input type="text" class="form-control price text-right" name="quotation_price_list[{{$key}}][quotation_price_list_ot][{{$k}}][quotation_price_list_ot_price]" value="{{number_format($ot->quotation_price_list_ot_price, 2)}}" required>
                                                                 <input type="hidden" class="form-control text-right" name="quotation_price_list[{{$key}}][quotation_price_list_ot][{{$k}}][price_structure_ot_id]" value="{{$ot->price_structure_ot_id}}" required>
                                                             @endforeach
                                                         </div>
                                                		</td>
                                                		<td>
                                                       <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input quotation_price_list_ot_status" id="quotation_price_list_ot_status_1{{$key}}" name="quotation_price_list[{{$key}}][quotation_price_list_ot_status]" value="1" {{$val->quotation_price_list_ot_status == 1 ? 'checked' : ''}}>
                                                            <label class="custom-control-label" for="quotation_price_list_ot_status_1{{$key}}">OT เหมาจ่าย</label>
                                                       </div>
                                                       <div class="custom-control custom-radio custom-control-inline mt-2">
                                                            <input type="radio" class="custom-control-input quotation_price_list_ot_status" id="quotation_price_list_ot_status_2{{$key}}" name="quotation_price_list[{{$key}}][quotation_price_list_ot_status]" value="2" {{$val->quotation_price_list_ot_status == 2 ? 'checked' : ''}}>
                                                            <label class="custom-control-label" for="quotation_price_list_ot_status_2{{$key}}">OT guarantee</label>
                                                       </div>
                                                       <div class="quotation_price_list_guarantee_ot_price" style="display: {{$val->quotation_price_list_ot_status ? 'block' : 'none'}};">
                                                             <label for="quotation_price_list_guarantee_ot_price ">Please enter amount.</label>
                                                             <input type="text" class="form-control price quotation_price_list_guarantee_ot_price" name="quotation_price_list[{{$key}}][quotation_price_list_guarantee_ot_price]" value="{{number_format($val->quotation_price_list_guarantee_ot_price, 2)}}">
                                                        </div>
                                                       <br>
                                                       <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input quotation_price_list_service_charge_status" id="quotation_price_list_service_charge_status{{$key}}" name="quotation_price_list[{{$key}}][quotation_price_list_service_charge_price_status]" value="1" {{$val->quotation_price_list_service_charge_price_status == 1 ? 'checked' : ''}}>
                                                            <label class="custom-control-label" for="quotation_price_list_service_charge_status{{$key}}">Service charge</label>
                                                       </div>
                                                       <div class="quotation_price_list_service_charge_percent" style="display: {{$val->quotation_price_list_service_charge_price_status == 1 ? 'block' : 'none'}};">
                                                             <label for="quotation_price_list_service_charge_percent ">Please enter %</label>
                                                             <input type="number" class="form-control" name="quotation_price_list[{{$key}}][quotation_price_list_service_charge_price_percent]" max="100" value="{{$val->quotation_price_list_service_charge_price_percent}}">
                                                        </div>
                                                		</td>
                                                		<td>
                                                			   <input type="text" class="form-control text-right price quotation_price_list_taxi_price" name="quotation_price_list[{{$key}}][quotation_price_list_taxi_price_sale]" value="{{number_format($val->quotation_price_list_taxi_price_sale, 2)}}" required>
                                                		</td>
                                                		<td>
                                                			   <input type="text" class="form-control text-right price quotation_price_list_travel" name="quotation_price_list[{{$key}}][quotation_price_list_travel_sale]" value="{{number_format($val->quotation_price_list_travel_sale, 2)}}" required>
                                                		</td>
                                                		<td>
                                                			   <input type="text" class="form-control text-right price quotation_price_list_accomadation" name="quotation_price_list[{{$key}}][quotation_price_list_accomadation_sale]" value="{{number_format($val->quotation_price_list_accomadation_sale, 2)}}" required>
                                                		</td>
                                              	</tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Price structure</th>
                                                <th>Driver</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_expenses_item">
                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach($ExpensesMainItem as $key_main=>$main_item)
                                                @foreach($main_item as $val)
                                                    @php
                                                        $num = explode(".", $val['no']);
                                                    @endphp
                                                    <tr class="expenses_item{{$num[0]}}" id="expenses_item{{$num[0]}}_{{$no++}}">
                                                        <td class="expenses_item_no">{{$val['no']}}</td>
                                                        <td class="expenses_item_name">{{$val['name']}}</td>
                                                        <td class="expenses_item_price text-right">{{$val['price']}}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-6">
                                                    <div class="card bg-info">
                                                        <div class="card-body text-center">
                                                            <div class="text-white">
                                                                <h3>Cost</h3>
                                                                <input type="text" class="form-control text-center price" id="edit_quotation_cost" name="quotation_cost" value="{{number_format($Quotation->quotation_cost, 2)}}" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6">
                                                    <div class="card bg-cyan">
                                                        <div class="card-body text-center">
                                                            <div class="text-white">
                                                                <h3>Margin</h3>
                                                                <input type="text" class="form-control text-center price" id="edit_quotation_margin" name="quotation_margin" value="{{number_format($Quotation->quotation_margin, 2)}}" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-6">
                                                    <div class="card bg-success">
                                                        <div class="card-body text-center">
                                                            <div class="text-white">
                                                                <h3>Vat</h3>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <input type="checkbox" id="edit_quotation_vat" value="1" {{$Quotation->quotation_vat && $Quotation->quotation_vat > 0 ? 'checked' : ''}}>
                                                                            <input type="hidden" id="edit_quotation_vat_baht" name="quotation_vat">
                                                                        </div>
                                                                    </div>
                                                                    <input type="number" class="form-control" style="text-align: center;" value="7" aria-label="Text input with checkbox" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-6">
                                                    <div class="card bg-success">
                                                        <div class="card-body text-center">
                                                            <div class="text-white">
                                                                <h3>Total</h3>
                                                                <input type="text" class="form-control text-center price" id="edit_quotation_price" name="quotation_price" value="{{number_format($Quotation->quotation_price, 2)}}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row text-center">
                            <div class="col-md-12">
                                @if($Quotation->quotation_status != 5)
                                    <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                @endif
                                <a href="{{url('admin/Quotation')}}" class="btn btn-danger"> Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
@include('admin.Quotation.Modal.modal_expenses')
@endsection
@section('scripts')
<script>
    CKEDITOR.replace('edit_quotation_condition', {
        height: 150
    });
    CKEDITOR.replace('edit_quotation_delivery_schedule', {
        height: 150
    });

    var id_price_structure_item = $('#body_price_structure_item').find('.price_structure_item').length;
    var select_price_structures = '<option value="">----Select----</option>';
    @foreach($PriceStructures as $val)
        select_price_structures += "<option value='{{$val->price_structure_id}}'>{{$val->price_structure_name}}</option>";
    @endforeach
    $('body').on('click', '.btn-add-price-structure-item', function(data) {
        var no = $('#body_price_structure_item').find('.price_structure_item').length;
        no = (no+1);
        text_table = '<tr class="price_structure_item" id="price_structure_item'+id_price_structure_item+'">';
        text_table += '		<td>';
        text_table += '		  <input type="hidden" class="quotation_price_list_id" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_id]">'
        text_table += '			<button type="button" class="btn btn-circle btn-danger text-white btn-delete-price-structure-item" data-item="'+id_price_structure_item+'">';
        text_table += '				<i class="fas fa-trash-alt"></i>';
        text_table += '			</button>';
        text_table += '		</td>';
        text_table += '		<td class="price_structure_no">'+no+'</td>';
        text_table += '		<td class="text-center">';
        text_table += '				<select class="form-control custom-select price-structure-select2 select_price_structure" name="quotation_price_list['+id_price_structure_item+'][price_structure_id]" data-item="'+id_price_structure_item+'" data-no="'+no+'">';
        text_table +=             select_price_structures
        text_table += '				</select>';
        text_table += '		    <div class="btn_price_structure">';
        text_table += '		    </div>';
        text_table += '		</td>';
        text_table += '		<td>';
        text_table += '   		<input type="number" class="form-control text-center quotation_price_list_unit" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_unit]" min="1" value="1" required>';
        text_table += '   		<input type="hidden" class="form-control text-center price_structure_sum" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_cost]">';
        text_table += '		</td>';
        text_table += '		<td>';
        text_table += '			   <input type="text" class="form-control text-right quotation_price_list_price price" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_price]" required>';
        text_table += '		     <label class="min_quotation_price_list_price"></label>';
        text_table += '		</td>';
        text_table += '		<td class="quotation_price_list_ot_price">';
        text_table += '		</td>';
        text_table += '		<td>';
        text_table += '       <div class="custom-control custom-radio custom-control-inline">';
        text_table += '            <input type="radio" class="custom-control-input quotation_price_list_ot_status" id="quotation_price_list_ot_status_1'+id_price_structure_item+'" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_ot_status]" value="1">';
        text_table += '            <label class="custom-control-label" for="quotation_price_list_ot_status_1'+id_price_structure_item+'">OT เหมาจ่าย</label>';
        text_table += '       </div>';
        text_table += '       <div class="custom-control custom-radio custom-control-inline mt-2">';
        text_table += '            <input type="radio" class="custom-control-input quotation_price_list_ot_status" id="quotation_price_list_ot_status_2'+id_price_structure_item+'" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_ot_status]" value="2">';
        text_table += '            <label class="custom-control-label" for="quotation_price_list_ot_status_2'+id_price_structure_item+'">OT guarantee</label>';
        text_table += '       </div>';
        text_table += '       <div class="quotation_price_list_guarantee_ot_price" style="display: none;">';
        text_table += '             <label for="quotation_price_list_guarantee_ot_price ">Please enter amount.</label>';
        text_table += '             <input type="text" class="form-control price quotation_price_list_guarantee_ot_price" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_guarantee_ot_price]">';
        text_table += '        </div>';
        text_table += '       <br>';
        text_table += '       <div class="custom-control custom-checkbox custom-control-inline">';
        text_table += '            <input type="checkbox" class="custom-control-input quotation_price_list_service_charge_status" id="quotation_price_list_service_charge_status'+id_price_structure_item+'" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_service_charge_price_status]" value="1">';
        text_table += '            <label class="custom-control-label" for="quotation_price_list_service_charge_status'+id_price_structure_item+'">Service charge</label>';
        text_table += '       </div>';
        text_table += '       <div class="quotation_price_list_service_charge_percent" style="display: none;">';
        text_table += '             <label for="quotation_price_list_service_charge_percent ">Please enter %</label>';
        text_table += '             <input type="number" class="form-control" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_service_charge_price_percent]" max="100">';
        text_table += '        </div>';
        text_table += '		</td>';
        text_table += '		<td>';
        text_table += '			<input type="text" class="form-control text-right price quotation_price_list_taxi_price" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_taxi_price_sale]" required>';
        text_table += '		</td>';
        text_table += '		<td>';
        text_table += '			<input type="text" class="form-control text-right price quotation_price_list_travel" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_travel_sale]" required>';
        text_table += '		</td>';
        text_table += '		<td>';
        text_table += '			<input type="text" class="form-control text-right price quotation_price_list_accomadation" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_accomadation_sale]" required>';
        text_table += '		</td>';
        text_table += '	</tr>';
        id_price_structure_item++;
        $("#body_price_structure_item").append(text_table);
        $('.price-structure-select2').select2();
        $('.price').priceFormat({
            prefix: '',
            suffix: ''
        });
    });

    $('body').on('change','.select_price_structure',function(data){
        var id = $(this).val();
        var ele = $(this).closest('tr');
        var id_price_structure_item = $(this).data('item');
        var no = $(this).data('no');
        var quotation_id = $('#edit_id').val();
        var quotation_price_list_id = ele.find('.quotation_price_list_id').val();
        ele.find('.quotation_price_list_ot_price').html('');
        ele.find('.btn_price_structure').html('');
        $.ajax({
          method: "POST",
          url: url_gb+"/admin/QuotationPriceList/QuotationPriceListInsert",
          data: {
              price_structure_id: id,
              quotation_id: quotation_id,
              quotation_price_list_id: quotation_price_list_id,
          }
        }).done(function(res) {
            var data = res.quotation_price_list;
            var price_structure = data.price_structure;
            var html_ot = '';
            var html_btn = '';
            var quotation_price_list_salary = data.quotation_price_list_salary ? data.quotation_price_list_salary : 0;
            var quotation_price_list_price = data.quotation_price_list_price ? data.quotation_price_list_price : 0;
            var price_structure_sum = price_structure.price_structure_sum ? price_structure.price_structure_sum : 0;
            var quotation_price_list_taxi_price = data.quotation_price_list_taxi_price ? data.quotation_price_list_taxi_price : 0;
            var quotation_price_list_travel = data.quotation_price_list_travel ? data.quotation_price_list_travel : 0;
            var quotation_price_list_accomadation = data.quotation_price_list_accomadation ? data.quotation_price_list_accomadation : 0;
            ele.find('.quotation_price_list_id').val(data.quotation_price_list_id);
            ele.find('.btn_price_structure').show();
            ele.find('.quotation_price_list_price').val(addNumformat(quotation_price_list_price.toFixed(2)));
            ele.find('.quotation_price_list_price').prop('min', price_structure_sum);
            ele.find('.price_structure_sum').val(price_structure_sum);
            ele.find('.quotation_price_list_taxi_price').val(addNumformat(quotation_price_list_taxi_price.toFixed(2)));
            ele.find('.quotation_price_list_travel').val(addNumformat(quotation_price_list_travel.toFixed(2)));
            ele.find('.quotation_price_list_accomadation').val(addNumformat(quotation_price_list_accomadation.toFixed(2)));
            var min = parseFloat(ele.find('.quotation_price_list_price').attr('min'));
            var price = deleteNumformat(ele.find('.quotation_price_list_price').val());
            if(parseFloat(price) < min){
                ele.find('.quotation_price_list_price').css('border-color', 'red');
                ele.find('.min_quotation_price_list_price').text('min '+addNumformat(min.toFixed(2)));
                ele.find('.min_quotation_price_list_price').addClass('text-danger');
            }else{
                ele.find('.quotation_price_list_price').css('border-color', '');
                ele.find('.min_quotation_price_list_price').text('');
            }
            var html_ot = '';
            $.each(res.price_structure_ot_has_price_structure, function(k,v){
                var price_sale = v.price_structure_ot_has_price_structure_price_sale ? v.price_structure_ot_has_price_structure_price_sale : 0;
                html_ot += v.price_structure_ot_has_price_structure_name+' <input type="text" class="form-control price text-right" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_ot]['+k+'][quotation_price_list_ot_price]" value="'+addNumformat(price_sale.toFixed(2))+'" required>\
                <input type="hidden" class="form-control text-right" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_ot]['+k+'][price_structure_ot_id]" value="'+v.price_structure_ot_id+'" required>';
            });
            ele.find('.quotation_price_list_ot_price').append(html_ot);
            html_btn ='<button type="button" class="btn btn-warning mt-3 btn-pr" data-toggle="modal" data-target="#ModalExpenses'+id_price_structure_item+'">\
                           Price structure\
                       </button>';
            html_modal = '<div class="modal fade modal-expenses" id="ModalExpenses'+id_price_structure_item+'" role="dialog" aria-labelledby="myModalLabel">\
                             <input type="hidden" class="id_price_structure_item" value="'+id_price_structure_item+'">\
                             <div class="modal-dialog modal-xl" role="document">\
                                 <div class="modal-content">\
                                     <div class="modal-header">\
                                         <h4 class="modal-title">Expenses</h4>\
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
                                             <span aria-hidden="true"><i class="mdi mdi-close"></i></span>\
                                         </button>\
                                     </div>\
                                     <form class="FormEditQuotationPriceList">\
                                        <input type="hidden" class="main_quotation_price_list_id" name="main_quotation_price_list_id" value="'+data.quotation_price_list_id+'">\
                                        <input type="hidden" class="quotation_id" name="quotation_id" value="'+data.quotation_id+'">\
                                        <input type="hidden" class="price_structure_id" name="price_structure_id" value="'+data.price_structure_id+'">\
                                         <div class="card">\
                                             <div class="form-body">\
                                                 <div class="card-body">\
                                                     <div class="form-row">\
                                                         <div class="col-md-6">\
                                                             <div class="table-responsive">\
                                                                 <table class="table table-bordered">\
                                                                     <thead>\
                                                                         <tr>\
                                                                             <th scope="col" width="20%">Staff cost</th>\
                                                                             <th scope="col" width="10%" align="center">Driver</th>\
                                                                         </tr>\
                                                                     </thead>\
                                                                     <tbody id="expenses_staff_cost'+id_price_structure_item+'">\
                                                                     </tbody>\
                                                                     <tfoot>\
                                                                         <tr>\
                                                                             <td class="text-right">รวม</td>\
                                                                             <th id="sum_expenses_staff_cost'+id_price_structure_item+'" class="text-right">0.00</th>\
                                                                         </tr>\
                                                                     </tfoot>\
                                                                 </table>\
                                                             </div>\
                                                         </div>\
                                                         <div class="col-md-6">\
                                                             <div class="table-responsive">\
                                                                 <table class="table table-bordered">\
                                                                     <thead>\
                                                                         <tr>\
                                                                             <th scope="col" width="20%">Other expenses</th>\
                                                                             <th scope="col" width="10%" align="center">Driver</th>\
                                                                         </tr>\
                                                                     </thead>\
                                                                     <tbody id="expenses_other_expenses'+id_price_structure_item+'">\
                                                                     </tbody>\
                                                                     <tfoot>\
                                                                         <tr>\
                                                                             <td class="text-right">รวม</td>\
                                                                             <th id="sum_expenses_other_expenses'+id_price_structure_item+'" class="text-right">0.00</th>\
                                                                         </tr>\
                                                                     </tfoot>\
                                                                 </table>\
                                                             </div>\
                                                         </div>\
                                                         <div class="col-md-6">\
                                                             <div class="table-responsive">\
                                                                 <table class="table table-bordered">\
                                                                     <thead>\
                                                                         <tr>\
                                                                             <th scope="col" width="20%">Insurance Fee</th>\
                                                                             <th scope="col" width="10%" align="center">Driver</th>\
                                                                         </tr>\
                                                                     </thead>\
                                                                     <tbody id="expenses_insurance_fee'+id_price_structure_item+'">\
                                                                     </tbody>\
                                                                     <tfoot>\
                                                                         <tr>\
                                                                             <td>รวม</td>\
                                                                             <th id="sum_expenses_insurance_fee'+id_price_structure_item+'" class="text-right">0.00</th>\
                                                                         </tr>\
                                                                     </tfoot>\
                                                                 </table>\
                                                             </div>\
                                                         </div>\
                                                         <div class="col-md-6 mb-3">\
                                                             <div class="table-responsive">\
                                                                 <table class="table table-bordered">\
                                                                     <thead>\
                                                                         <tr>\
                                                                             <th scope="col" width="60%" align="center" colspan="2">Expenses</th>\
                                                                             <th scope="col" width="40%" align="center">Driver</th>\
                                                                             <td>\
                                                                                 <button type="button" class="btn btn-circle btn-success btn-add-expenses-item" data-item="'+id_price_structure_item+'" data-no="'+no+'"> <i class="fas fa-plus"></i> </button>\
                                                                             </td>\
                                                                         </tr>\
                                                                     </thead>\
                                                                     <tbody id="expenses_other_item'+id_price_structure_item+'">\
                                                                     </tbody>\
                                                                     <tfoot>\
                                                                         <tr>\
                                                                             <td align="right" colspan="2">Sum</td>\
                                                                             <td>\
                                                                                 <input type="text" class="form-control text-right price" id="sum_expenses_other'+id_price_structure_item+'" value="0.00" readonly>\
                                                                             </td>\
                                                                             <td></td>\
                                                                         </tr>\
                                                                     </tfoot>\
                                                                 </table>\
                                                             </div>\
                                                         </div>\
                                                     </div>\
                                                 </div>\
                                             </div>\
                                             <div class="form-footer">\
                                                 <button type="submit" class="btn btn-success" data-item="'+id_price_structure_item+'"><i class="ti-save"></i> Save</button>\
                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>\
                                             </div>\
                                         </div>\
                                     </form>\
                                 </div>\
                             </div>\
                         </div>';
            ele.find('.btn_price_structure').append(html_btn);
            $('#ModalExpenses').append(html_modal);
            $('#expenses_other_expenses'+id_price_structure_item).html('');
            $('#expenses_staff_cost'+id_price_structure_item).html('');
            $('#expenses_insurance_fee'+id_price_structure_item).html('');
            $('#expenses_other_item'+id_price_structure_item).html('');
            var sum_price_staff_expense = 0;
            var sum_price_other_expense = 0;
            var sum_price_insurance_fee = 0;
            var html_staff_expense = '<tr>\
                                        <td>เงินเดือน</td>\
                                        <td>\
                                             <input type="text" class="form-control text-right price expenses_price" data-type="S" value="'+addNumformat(quotation_price_list_salary.toFixed(2))+'" readonly>\
                                        </td>\
                                    </tr>';
            var html_other_expense = '';
            var html_insurance_fee = '';
            sum_price_staff_expense = quotation_price_list_salary;

            $.each(res.expense_staff_cost, function(k,v){
                var has_staff_cost = v.price_structure_has_staff_expense;
                var name = has_staff_cost.staff_cost ? has_staff_cost.staff_cost.staff_expenses_name : '';
                var price = v.quotation_price_list_price ? v.quotation_price_list_price : 0;
                sum_price_staff_expense = parseFloat(sum_price_staff_expense) + parseFloat(price);
                var readonly = '';
                var min = 0;
                if(has_staff_cost.price_structure_has_staff_expenses_price_status == 0){ //แก้ไขไม่ได้
                    readonly = 'readonly';
                }else if(has_staff_cost.price_structure_has_staff_expenses_price_status == 2){ //แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่
                    min = has_staff_cost.price_structure_has_staff_expenses_price;
                }else if(has_staff_cost.price_structure_has_staff_expenses_price_status == 3){ //แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด
                    min = has_staff_cost.price_structure_has_staff_expenses_price_limit;
                }
                html_staff_expense += '<tr>\
                                            <td>'+name+'</td>\
                                            <td>\
                                                 <input type="hidden" class="form-control text-right" name="staff_cost['+k+'][quotation_price_list_id]" value="'+v.quotation_price_list_id+'">\
                                                 <input type="text" class="form-control text-right price expenses_price" data-type="S" name="staff_cost['+k+'][quotation_price_list_price]" value="'+addNumformat(price.toFixed(2))+'" '+readonly+' min="'+min+'">\
                                                 <label class="min_expenses_price"></label>\
                                            </td>\
                                        </tr>';
            });
            $('#expenses_staff_cost'+id_price_structure_item).append(html_staff_expense);
            $('#sum_expenses_staff_cost'+id_price_structure_item).text(addNumformat(sum_price_staff_expense.toFixed(2)));

            $.each(res.expense_other_expenses, function(k,v){
                var has_other_expenses = v.other_expense_has_staff_expense;
                var name = has_other_expenses.other_expenses ? has_other_expenses.other_expenses.other_expenses_name : '';
                var price = v.quotation_price_list_price ? v.quotation_price_list_price : 0;
                sum_price_other_expense = parseFloat(sum_price_other_expense) + parseFloat(price);
                var readonly = '';
                var min = 0;
                if(has_other_expenses.other_expenses_has_staff_expenses_price_status == 0){ //แก้ไขไม่ได้
                    readonly = 'readonly';
                }else if(has_other_expenses.other_expenses_has_staff_expenses_price_status == 2){ //แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่
                    min = has_other_expenses.other_expenses_has_staff_expenses_price;
                }else if(has_other_expenses.other_expenses_has_staff_expenses_price_status == 3){ //ก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด
                    min = has_other_expenses.other_expenses_has_staff_expenses_price_limit;
                }
                html_other_expense += '<tr>\
                                            <td>'+name+'</td>\
                                            <td>\
                                                 <input type="hidden" class="form-control text-right" name="other_expenses['+k+'][quotation_price_list_id]" value="'+v.quotation_price_list_id+'">\
                                                 <input type="text" class="form-control text-right price expenses_price" data-type="O" name="other_expenses['+k+'][quotation_price_list_price]" value="'+addNumformat(price.toFixed(2))+'" '+readonly+' min="'+min+'">\
                                                 <label class="min_expenses_price"></label>\
                                            </td>\
                                        </tr>';
            });
            $('#expenses_other_expenses'+id_price_structure_item).append(html_other_expense);
            $('#sum_expenses_other_expenses'+id_price_structure_item).text(addNumformat(sum_price_other_expense.toFixed(2)));

            $.each(res.expense_insurance_fee, function(k,v){
                var has_insurance_fee = v.insurance_fee_has_staff_expense;
                var name = has_insurance_fee.insurance_fee ? has_insurance_fee.insurance_fee.insurance_fee_name : '';
                var price = v.quotation_price_list_price ? v.quotation_price_list_price : 0;
                sum_price_insurance_fee = parseFloat(sum_price_insurance_fee) + parseFloat(price);
                var readonly = '';
                var min = 0;
                if(has_insurance_fee.insurance_fee_has_staff_expenses_price_status == 0){ //แก้ไขไม่ได้
                    readonly = 'readonly';
                }else if(has_insurance_fee.insurance_fee_has_staff_expenses_price_status == 2){ //แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่
                    min = has_insurance_fee.insurance_fee_has_staff_expenses_price;
                }else if(has_insurance_fee.insurance_fee_has_staff_expenses_price_status == 3){ //ก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด
                    min = has_insurance_fee.insurance_fee_has_staff_expenses_price_limit;
                }
                html_insurance_fee += '<tr>\
                                            <td>'+name+'</td>\
                                            <td>\
                                                 <input type="hidden" class="form-control text-right" name="insurance_fee['+k+'][quotation_price_list_id]" value="'+v.quotation_price_list_id+'">\
                                                 <input type="text" class="form-control text-right price expenses_price" data-type="I" name="insurance_fee['+k+'][quotation_price_list_price]" value="'+addNumformat(price.toFixed(2))+'" '+readonly+' min="'+min+'">\
                                                 <label class="min_expenses_price"></label>\
                                            </td>\
                                        </tr>';
            });
            $('#expenses_insurance_fee'+id_price_structure_item).append(html_insurance_fee);
            $('#sum_expenses_insurance_fee'+id_price_structure_item).text(addNumformat(sum_price_insurance_fee.toFixed(2)));
            Calculate();
        }).fail(function(res) {
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click','.btn-delete-price-structure-item',function(data){
        var btn = $(this);
        var id_price_structure_item = $(this).data('item');
        var main_no = $(this).closest('tr').find('.price_structure_item_no').data('no');
        var id = $(this).closest('tr').find('.quotation_price_list_id').val();
        if(id){
          loadingButton(btn);
          $.ajax({
              method: "DELETE",
              url: url_gb+"/admin/QuotationPriceList/"+id,
              data: {
                  id: id
              }
          }).done(function(res) {
              resetButton(btn);
              if(res.status==1){
                  $('#body_expenses_item').find('.expenses_item'+main_no).remove();
                  $('#ModalExpenses'+id_price_structure_item).remove();
                  btn.closest('tr').remove();
                  $.each($('#body_price_structure_item').find('tr'), function(k,v){
                      $(this).find('.price_structure_no').text((k+1));
                  });
                  Calculate();
              }else{
                  swal("ระบบมีปัญหา","กรุณาติดต่อผู้ดูแล","error");
              }
          }).fail(function(res) {
              resetButton(form.find('button[type=submit]'));
              swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
          });
        }else{
            $(this).closest('tr').remove();
            $('#body_expenses_item').find('.expenses_item'+main_no).remove();
        }
    });

    $('body').on('change','.quotation_price_list_ot_status',function(data){
        var ele = $(this).closest('tr');
        var type = $(this).val();
        var id = ele.find('.select_price_structure option:selected').val();
        var id_price_structure_item = ele.find('.btn-delete-price-structure-item').data('item');
        ele.find('.quotation_price_list_ot_price').html('');
        ele.find('.quotation_price_list_guarantee_ot_price').show();
        if(type == 2){
            $.ajax({
              method: "GET",
              url: url_gb+"/admin/PriceStructure/"+id,
              data: {
                  id: id
              }
            }).done(function(res) {
                var data = res.content;
                var html_ot = '';
                $.each(data.price_structure_ot_has_price_structure, function(k,v){
                    var price_sale = v.price_structure_ot_has_price_structure_price_sale ? v.price_structure_ot_has_price_structure_price_sale : 0;
                    html_ot += v.price_structure_ot_has_price_structure_name+' <input type="text" class="form-control price text-right" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_ot]['+k+'][quotation_price_list_ot_price]" value="'+addNumformat(price_sale.toFixed(2))+'" required>\
                    <input type="hidden" class="form-control text-right" name="quotation_price_list['+id_price_structure_item+'][quotation_price_list_ot]['+k+'][price_structure_ot_id]" value="'+v.price_structure_ot_id+'" required>';
                });
                ele.find('.quotation_price_list_ot_price').append(html_ot);

                Calculate();
            }).fail(function(res) {
                swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
            });
        }
    });

    $('body').on('change','.quotation_price_list_service_charge_status',function(data){
        var ele = $(this).closest('tr');
        if($('.quotation_price_list_service_charge_status').is(':checked')){
            ele.find('.quotation_price_list_service_charge_percent').show();
        }else{
            ele.find('.quotation_price_list_service_charge_percent').hide();
        }
    });

    $('body').on('submit', '#FormEdit', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#edit_id').val();
        loadingButton(form.find('button[type=submit]'));
        if(CKEDITOR!==undefined){
            for ( instance in CKEDITOR.instances ){
                CKEDITOR.instances[instance].updateElement();
            }
        }
        $.ajax({
            method: "PUT",
            url: url_gb+"/admin/Quotation/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal({
                    title: res.title,
                    text: res.content,
                    icon: 'success'
                }).then(() => {
                    window.location = url_gb+'/admin/Quotation';
                });
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '.FormEditQuotationPriceList', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/QuotationPriceList/QuotationPriceListUpdate",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if(res.status == 1){
                $('.modal-expenses').modal('hide');
                swal(res.title, res.content, 'success');
            }else{
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    function calculate_date(action , changed){
        var ele = (action === 1) ? $('#FormAdd') : $('#FormEdit');
        var start_date = new Date(ele.find('.start_date').val());
        var end_date = new Date(ele.find('.end_date').val());
        var date_amount = ele.find('.date_amount').val();
        if(start_date != ''){
            if(changed == 1){ // start date change
                ele.find('.end_date').val(formatDate(start_date.addDays(parseInt(date_amount))));
            }else if(changed == 2 && date_amount != ''){ // date amount change
                ele.find('.end_date').val(formatDate(start_date.addDays(parseInt(date_amount))));
            }else if(changed == 3 && end_date != '' && end_date >= start_date){ // end date change
                var diffTime = Math.abs(end_date-start_date);
                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                ele.find('.date_amount').val(diffDays);
            }
        }
    }

    Date.prototype.addDays = function(days) { // add days function
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }

    function formatDate(date) { // change format date to y-m-d function
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }
</script>
@include('admin.Quotation.Script.script_calculate')
@include('admin.Quotation.Script.script_expenses')
@endsection
