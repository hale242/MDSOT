<div class="row" id="ModalExpenses">
    @foreach($Quotation->QuotationPriceListMain as $key=>$val)
        <div class="modal fade modal-expenses" id="ModalExpenses{{$val->quotation_price_list_id}}" role="dialog" aria-labelledby="myModalLabel">\
           <input type="hidden" class="id_price_structure_item" value="{{$key}}">
           <div class="modal-dialog modal-xl" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h4 class="modal-title">Expenses</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                       </button>
                   </div>
                   <form class="FormEditQuotationPriceList">
                      <input type="hidden" class="main_quotation_price_list_id" name="main_quotation_price_list_id" value="{{$val->quotation_price_list_id}}">
                      <input type="hidden" class="quotation_id" name="quotation_id" value="{{$val->quotation_id}}">
                      <input type="hidden" class="price_structure_id" name="price_structure_id" value="{{$val->price_structure_id}}">
                       <div class="card">
                           <div class="form-body">
                               <div class="card-body">
                                   <div class="form-row">
                                       <div class="col-md-6">
                                           <div class="table-responsive">
                                               <table class="table table-bordered">
                                                   <thead>
                                                       <tr>
                                                           <th scope="col" width="20%">Staff cost</th>
                                                           <th scope="col" width="10%" align="center">Driver</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody id="expenses_staff_cost{{$key}}">
                                                       <tr>
                                                           <td>เงินเดือน</td>
                                                           <td><input type="text" class="form-control text-right price expenses_price" data-type="S" value="{{number_format($val->quotation_price_list_salary, 2)}}" readonly></td>
                                                       </tr>
                                                       @php
                                                           $sum_total = 0;
                                                           $StaffCost = App\QuotationPriceList::with('PriceStructureHasStaffExpense.StaffCost')->where('main_quotation_price_list_id', $val->quotation_price_list_id)->whereNotNull('staff_expenses_id')->get();
                                                       @endphp
                                                       @foreach($StaffCost as $key_e => $Expense)
                                                           @php
                                                               $readonly = '';
                                                               $min = 0;
                                                               if($Expense->PriceStructureHasStaffExpense && $Expense->PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_status == 0){ //แก้ไขไม่ได้
                                                                   $readonly = 'readonly';
                                                               }else if($Expense->PriceStructureHasStaffExpense && $Expense->PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_status == 2){ //แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่
                                                                   $min = $Expense->PriceStructureHasStaffExpense && $Expense->PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price;
                                                               }else if($Expense->PriceStructureHasStaffExpense && $Expense->PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_status == 3){ //แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด
                                                                   $min = $Expense->PriceStructureHasStaffExpense && $Expense->PriceStructureHasStaffExpense->price_structure_has_staff_expenses_price_limit;
                                                               }
                                                               $sum_total += $Expense->quotation_price_list_price;
                                                           @endphp
                                                           <tr>
                                                               <td>{{$Expense->PriceStructureHasStaffExpense && $Expense->PriceStructureHasStaffExpense->StaffCost ? $Expense->PriceStructureHasStaffExpense->StaffCost->staff_expenses_name : ''}}</td>
                                                               <td>
                                                                    <input type="hidden" class="form-control text-right" name="staff_cost[{{$key_e}}][quotation_price_list_id]" value="{{$Expense->quotation_price_list_id}}">
                                                                    <input type="text" class="form-control text-right price expenses_price" data-type="S" name="staff_cost[{{$key_e}}][quotation_price_list_price]" value="{{number_format($Expense->quotation_price_list_price, 2)}}" {{$readonly}} min="{{$min}}">
                                                                    <label class="min_expenses_price"></label>
                                                               </td>
                                                           </tr>
                                                       @endforeach
                                                   </tbody>
                                                   <tfoot>
                                                       <tr>
                                                           <td class="text-right">รวม</td>
                                                           <th id="sum_expenses_staff_cost{{$key}}" class="text-right">{{number_format($sum_total, 2)}}</th>
                                                       </tr>
                                                   </tfoot>
                                               </table>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="table-responsive">
                                               <table class="table table-bordered">
                                                   <thead>
                                                       <tr>
                                                           <th scope="col" width="20%">Other expenses</th>
                                                           <th scope="col" width="10%" align="center">Driver</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody id="expenses_other_expenses{{$key}}">
                                                       @php
                                                           $sum_total = 0;
                                                           $OtherExpenses = App\QuotationPriceList::with('OtherExpenseHasStaffExpense.OtherExpenses')->where('main_quotation_price_list_id', $val->quotation_price_list_id)->whereNotNull('other_expenses_id')->get();
                                                       @endphp
                                                       @foreach($OtherExpenses as $key_e => $Expense)
                                                           @php
                                                               $readonly = '';
                                                               $min = 0;
                                                               if($Expense->OtherExpenseHasStaffExpense && $Expense->OtherExpenseHasStaffExpense->other_expenses_has_staff_expenses_price_status == 0){ //แก้ไขไม่ได้
                                                                   $readonly = 'readonly';
                                                               }else if($Expense->OtherExpenseHasStaffExpense && $Expense->OtherExpenseHasStaffExpense->other_expenses_has_staff_expenses_price_status == 2){ //แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่
                                                                   $min = $Expense->OtherExpenseHasStaffExpense && $Expense->OtherExpenseHasStaffExpense->other_expenses_has_staff_expenses_price;
                                                               }else if($Expense->OtherExpenseHasStaffExpense && $Expense->OtherExpenseHasStaffExpense->other_expenses_has_staff_expenses_price_status == 3){ //แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด
                                                                   $min = $Expense->OtherExpenseHasStaffExpense && $Expense->OtherExpenseHasStaffExpense->other_expenses_has_staff_expenses_price_limit;
                                                               }
                                                               $sum_total += $Expense->quotation_price_list_price;
                                                           @endphp
                                                           <tr>
                                                               <td>{{$Expense->OtherExpenseHasStaffExpense && $Expense->OtherExpenseHasStaffExpense->OtherExpenses ? $Expense->OtherExpenseHasStaffExpense->OtherExpenses->other_expenses_name : ''}}</td>
                                                               <td>
                                                                    <input type="hidden" class="form-control text-right" name="other_expenses[{{$key_e}}][quotation_price_list_id]" value="{{$Expense->quotation_price_list_id}}">
                                                                    <input type="text" class="form-control text-right price expenses_price" data-type="O" name="other_expenses[{{$key_e}}][quotation_price_list_price]" value="{{number_format($Expense->quotation_price_list_price, 2)}}" {{$readonly}} min="{{$min}}">
                                                                    <label class="min_expenses_price"></label>
                                                               </td>
                                                           </tr>
                                                       @endforeach
                                                   </tbody>
                                                   <tfoot>
                                                       <tr>
                                                           <td class="text-right">รวม</td>
                                                           <th id="sum_expenses_other_expenses{{$key}}" class="text-right">{{number_format($sum_total, 2)}}</th>
                                                       </tr>
                                                   </tfoot>
                                               </table>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="table-responsive">
                                               <table class="table table-bordered">
                                                   <thead>
                                                       <tr>
                                                           <th scope="col" width="20%">Insurance Fee</th>
                                                           <th scope="col" width="10%" align="center">Driver</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody id="expenses_insurance_fee{{$key}}">
                                                       @php
                                                           $sum_total = 0;
                                                           $InsuranceFee = App\QuotationPriceList::with('InsuranceFeeHasStaffExpense.InsuranceFee')->where('main_quotation_price_list_id', $val->quotation_price_list_id)->whereNotNull('insurance_fee_id')->get();
                                                       @endphp
                                                       @foreach($InsuranceFee as $key_e => $Expense)
                                                           @php
                                                               $readonly = '';
                                                               $min = 0;
                                                               if($Expense->InsuranceFeeHasStaffExpense && $Expense->InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_status == 0){ //แก้ไขไม่ได้
                                                                   $readonly = 'readonly';
                                                               }else if($Expense->InsuranceFeeHasStaffExpense && $Expense->InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_status == 2){ //แก้ไขได้ แต่ต้องไม่ต่ำกว่าที่เป็นอยู่
                                                                   $min = $Expense->InsuranceFeeHasStaffExpense && $Expense->InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price;
                                                               }else if($Expense->InsuranceFeeHasStaffExpense && $Expense->InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_status == 3){ //แก้ไขได้ แต่ไม่ต่ำว่าจำนวนที่กำหนด
                                                                   $min = $Expense->InsuranceFeeHasStaffExpense && $Expense->InsuranceFeeHasStaffExpense->insurance_fee_has_staff_expenses_price_limit;
                                                               }
                                                               $sum_total += $Expense->quotation_price_list_price;
                                                           @endphp
                                                           <tr>
                                                               <td>{{$Expense->InsuranceFeeHasStaffExpense && $Expense->InsuranceFeeHasStaffExpense->InsuranceFee ? $Expense->InsuranceFeeHasStaffExpense->InsuranceFee->insurance_fee_name : ''}}</td>
                                                               <td>
                                                                    <input type="hidden" class="form-control text-right" name="insurance_fee[{{$key_e}}][quotation_price_list_id]" value="{{$Expense->quotation_price_list_id}}">
                                                                    <input type="text" class="form-control text-right price expenses_price" data-type="I" name="insurance_fee[{{$key_e}}][quotation_price_list_price]" value="{{number_format($Expense->quotation_price_list_price, 2)}}" {{$readonly}} min="{{$min}}">
                                                                    <label class="min_expenses_price"></label>
                                                               </td>
                                                           </tr>
                                                       @endforeach
                                                   </tbody>
                                                   <tfoot>
                                                       <tr>
                                                           <td>รวม</td>
                                                           <th id="sum_expenses_insurance_fee{{$key}}" class="text-right">{{number_format($sum_total, 2)}}</th>
                                                       </tr>
                                                   </tfoot>
                                               </table>
                                           </div>
                                       </div>
                                       <div class="col-md-6 mb-3">
                                           <div class="table-responsive">
                                               <table class="table table-bordered">
                                                   <thead>
                                                       <tr>
                                                           <th scope="col" width="60%" align="center" colspan="2">Expenses</th>
                                                           <th scope="col" width="40%" align="center">Driver</th>
                                                           <td>
                                                               <button type="button" class="btn btn-circle btn-success btn-add-expenses-item" data-item="{{$key}}" data-no="{{($key+1)}}"> <i class="fas fa-plus"></i> </button>
                                                           </td>
                                                       </tr>
                                                   </thead>
                                                   <tbody id="expenses_other_item{{$key}}">
                                                        @php
                                                            $sum_total = 0;
                                                            $ExpensesAll = App\QuotationPriceList::with('StaffCost', 'OtherExpenses', 'InsuranceFee')
                                                                ->where('main_quotation_price_list_id', $val->quotation_price_list_id)
                                                                ->whereNull('price_structure_has_staff_expenses_id')
                                                                ->whereNull('other_expenses_has_staff_expenses_id')
                                                                ->whereNull('insurance_fee_has_staff_expenses_id')
                                                                ->get();
                                                        @endphp
                                                        @foreach($ExpensesAll as $key_i=>$item)
                                                            @php
                                                                $sum_total += $item->quotation_price_list_price;
                                                            @endphp
                                                            <tr class="expenses_item{{$key}}" id="expenses_item{{$key_i}}">
                                                              	<td width="20%">
                                                              		<div class="custom-control custom-checkbox mb-3">
                                                              			<input type="checkbox" class="custom-control-input quotation_price_list_main_item" id="quotation_price_list_main_item_{{$key_i}}" name="expenses[{{$key_i}}][quotation_price_list_main_item]" value="1" data-item-expenses="{{$key_i}}" {{$item->quotation_price_list_main_item == 1 ? 'checked' : ''}}>
                                                              			<label class="custom-control-label" for="quotation_price_list_main_item_{{$key_i}}">Main Item</label>
                                                              		</div>
                                                              	</td>
                                                              	<td width="40%">
                                                              		<select class="form-control custom-select select2 select_expenses_other" name="expenses[{{$key_i}}][expenses_id]" data-item="{{$key}}" data-expenses-item="{{$key_i}}" required>
                                                                      <option value="">----Select----</option>
                                                                      @foreach($Expenses as $key_type=>$Expense)
                                                                          <option disabled>{{$Expense['name']}}</option>
                                                                          @foreach($Expense['expense'] as $val)
                                                                              @php
                                                                                  $type = '';
                                                                                  $expenses_id = '';
                                                                                  if($item->staff_expenses_id){
                                                                                      $type = 'S';
                                                                                      $expenses_id = $item->staff_expenses_id;
                                                                                  }elseif($item->other_expenses_id){
                                                                                      $type = 'O';
                                                                                      $expenses_id = $item->other_expenses_id;
                                                                                  }elseif($item->insurance_fee_id){
                                                                                      $type = 'I';
                                                                                      $expenses_id = $item->insurance_fee_id;
                                                                                  }

                                                                              @endphp
                                                                              <option value='{{$val['id']}}' data-name='{{$val['name']}}' data-type='{{$key_type}}' {{$expenses_id == $val['id'] && $key_type == $type ? 'selected' : ''}}>&nbsp;&nbsp;&nbsp;{{$val['name']}}</option>
                                                                          @endforeach
                                                                      @endforeach
                                                              		</select>
                                                              	</td>
                                                              	<td width="40%">
                                                              		<input type="text" class="form-control text-right price expenses_other_price" name="expenses[{{$key_i}}][quotation_price_list_price]" value="{{number_format($item->quotation_price_list_price, 2)}}">
                                                              		<input type="hidden" class="expenses_other_type" name="expenses[{{$key_i}}][type]">
                                                              	</td>
                                                              	<td>
                                                              		<button type="button" class="btn btn-circle btn-danger text-white btn-delete-expenses-item" data-item="{{$key}}" data-item-expenses="{{$key_i}}">
                                                              			<i class="fas fa-trash-alt"></i>
                                                              		</button>
                                                              	</td>
                                                            </tr>
                                                        @endforeach
                                                   </tbody>
                                                   <tfoot>
                                                       <tr>
                                                           <td align="right" colspan="2">Sum</td>
                                                           <td>
                                                               <input type="text" class="form-control text-right price" id="sum_expenses_other{{$key}}" value="{{number_format($sum_total, 2)}}" readonly>
                                                           </td>
                                                           <td></td>
                                                       </tr>
                                                   </tfoot>
                                               </table>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="form-footer">
                               @if($Quotation->quotation_status != 5)
                                  <button type="submit" class="btn btn-success" data-item="{{$key}}"><i class="ti-save"></i> Save</button>
                               @endif
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
        </div>
    @endforeach

</div>
