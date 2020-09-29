<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="row mb-5 mt-3">
                    <div class="col-md-3 text-center">
                        <h4 class="font-medium">Sale Price</h4>
                        <span id="show_price_structure_sale_price"></span>
                    </div>
                    <div class="col-md-3 text-center">
                        <h4 class="font-medium">Cost Price</h4>
                        <span id="show_price_structure_sum"></span>
                    </div>
                    <div class="col-md-3 text-center">
                        <h4 class="font-medium">Margin (Baht)</h4>
                        <span id="show_price_structure_profit_price"></span>
                    </div>
                    <div class="col-md-3 text-center">
                        <h4 class="font-medium">Margin (Percen)</h4>
                        <span id="show_price_structure_profit_percen"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td scope="col" width="5%">No</td>
                                        <td scope="col" width="20%">Staff cost</td>
                                        <td scope="col" width="10%">Driver</td>
                                        <!-- <td scope="col" width="10%">Price sale</td> -->
                                        <td scope="col" width="20%">Price Status</td>
                                        <td scope="col" width="10%">Price limit</td>
                                        <td scope="col" width="20%" class="text-center">Comment</td>
                                        <td scope="col" width="5%" class="text-center">Status</td>
                                    </tr>
                                </thead>
                                <tbody id="show_staff_cost_item">

                                </tbody>
                                <tfoot id="show_staff_cost_footer">

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td scope="col" width="5%">No</td>
                                        <td scope="col" width="20%">Other expenses</td>
                                        <td scope="col" width="10%">Driver</td>
                                        <!-- <td scope="col" width="10%">Price sale</td> -->
                                        <td scope="col" width="20%">Price Status</td>
                                        <td scope="col" width="10%">Price limit</td>
                                        <td scope="col" width="20%" class="text-center">Comment</td>
                                        <td scope="col" width="5%" class="text-center">Status</td>
                                    </tr>
                                </thead>
                                <tbody id="show_other_expenses_item">

                                </tbody>
                                <tfoot id="show_other_expenses_footer">

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td scope="col" width="5%">No</td>
                                        <td scope="col" width="20%">Insurance Fee</td>
                                        <td scope="col" width="10%">Driver</td>
                                        <td scope="col" width="20%">Price Status</td>
                                        <td scope="col" width="10%">Price limit</td>
                                        <td scope="col" width="20%" class="text-center">Comment</td>
                                        <td scope="col" width="5%" class="text-center">Status</td>
                                    </tr>
                                </thead>
                                <tbody id="show_insurance_fee_item">

                                </tbody>
                                <tfoot id="show_insurance_fee_footer">

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td scope="col" align="center"></td>
                                        @foreach($PriceStructureOT as $key=>$val)
                                            <td scope="col" align="center">{{$val->price_structure_ot_name}}</td>
                                        @endforeach
                                        <td scope="col" align="center" rowspan="2">Taxi Price</td>
                                        <td scope="col" align="center" rowspan="2">Travel allowances</td>
                                        <td scope="col" align="center" rowspan="2">Accomadation</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=1; $i<=2; $i++)
                                    <tr>
                                        <td>{{$i == 1 ? 'Driver' : 'Customer'}}</td>
                                        @foreach($PriceStructureOT as $key=>$val)
                                            @if($i == 1)
                                                <td id="show_ot_price_{{$val->price_structure_ot_id}}_{{$i}}" align="right"></td>
                                            @else
                                                <td id="show_ot_price_sale_{{$val->price_structure_ot_id}}_{{$i}}" align="right"></td>
                                            @endif
                                        @endforeach
                                        @if($i == 1)
                                            <td id="show_price_structure_taxi_price_{{$i}}" align="right"></td>
                                            <td id="show_price_structure_travel_{{$i}}" align="right"></td>
                                            <td id="show_price_structure_accomadation_{{$i}}" align="right"></td>
                                        @else
                                            <td id="show_price_structure_taxi_price_sale_{{$i}}" align="right"></td>
                                            <td id="show_price_structure_travel_sale_{{$i}}" align="right"></td>
                                            <td id="show_price_structure_accomadation_sale_{{$i}}" align="right"></td>
                                        @endif
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
