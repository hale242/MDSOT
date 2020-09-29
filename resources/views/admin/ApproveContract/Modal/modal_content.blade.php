<div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approve contract</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="frmApprove" action="#" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="action" value="approve">
                <input type="hidden" name="customer_contract_id" id="customer_contract_id_approve">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="customer_contract_date_approve">Contract approval date</label>
                                    <input type="date" class="form-control" id="add_customer_contract_date_approve" name="customer_contract_date_approve" placeholder="" value="">
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

<div class="modal fade" id="CancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reject</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="frmReject" action="#" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="action" value="reject">
                <input type="hidden" name="customer_contract_id" id="customer_contract_id_cancel">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="comment">Comment</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
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

<div class="modal fade" id="productviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content productviewModalShow"></div>
    </div>
</div>


<div class="modal fade" id="SaleOrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 mt-5 mb-2">
                        <font class="mt-5 font-bold head"> &nbsp;&nbsp;บริษัท มาสเตอร์ ไดรเวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด</font>
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;2222/9 ถนนลาดพร้าว แขวงพลับพลา <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;เขตวังทองฟหลาง กรุงเทพฯ 10310 <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;โทร 02-9318787 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; โทรสาร 02-9318686
                        </label>
                    </div>
                    <div class="col-md-2 mt-5 mb-2 text-center">
                        <h1 class="mt-3 font-bold"> ต้นฉบับ</h1> <br> 1
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 mt-5">
                        <label> ทะเบียนนิติบุคคลเลขที่ 0105550078073 </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>รหัสลูกค้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0231</label>
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-3 mt-2">
                                    <label>ลูกค้า</label> <br> Customer
                                </div>
                                <div class="col-md-9 mt-2">
                                    <label class="font-bold"> Thai Logistics Service Co.,Ltd. </label>
                                </div>
                                <div class="col-md-3 mt-2"></div>
                                <div class="col-md-9">
                                    <address class="">
                                        3656/65 Green Tower Bidg., Room Number Unit L, 20th Floor,
                                        Rama 4 Road, Klongton, Klongtoey, Bangkok 10110
                                    </address>
                                </div>
                                <div class="col-md-3 mt-2"></div>
                                <div class="col-md-9">
                                    <label class="mt-4">โทร 02-367-3400 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โทรสาร 02-367-3409</label>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label>ผู้ติดต่อ</label> <br> Contact
                                </div>
                                <div class="col-md-9 mt-2">
                                    <label Class="middle"> คุณสุรางคณา </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mt-3">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <font class="mt-5 font-bold head"> ใบสั่งขาย ( Sale Order) </font>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">เลขที่ใบสั่งขาย</label> <br> Sale Order No.
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> SODC17090002 </label>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">วันที่ออกใบสั่งขาย</label> <br> Date
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> 05/09/2560 </label>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">เงื่อนไขการชำระเงิน</label> <br> Term of Payment
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> 30 วัน </label>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">เลขที่สัญญา</label> <br> Contract No.
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> DA-LT-201700351 </label>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: 0px;">ใบเสนอราคา</label> <br> Quatation No.
                            </div>
                            <div class="col-md-7">
                                <label Class="middle"> 17120014 </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <td width="3%" style="text-align: center; vertical-align: middle;"> <label>ลำดับ</label> <br> <small>No.</small></td>
                                    <td width="11%" style="text-align: center; vertical-align: middle;"> <label>รหัสสินค้า</label> <br> <small>Code</small></td>
                                    <td width="46%" style="text-align: center; vertical-align: middle;"> <label>รายละเอียด</label> <br> <small>Description</small></td>
                                    <td width="10%" style="text-align: center; vertical-align: middle;"> <label>จำนวน</label> <br> <small>Quantity</small></td>
                                    <td width="10%" style="text-align: center; vertical-align: middle;"> <label>หน่วยละ</label> <br> <small>Unit</small></td>
                                    <td width="10%" style="text-align: center; vertical-align: middle;"> <label>ส่วนลด</label> <br> <small>Discount</small> </td>
                                    <td width="10%" style="text-align: center; vertical-align: middle;"> <label>จำนวน</label> <br> <small>Amount</small> </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><small> 1 </small></td>
                                    <td> <small> LTDC001-01 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (JAN) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 2 </small></td>
                                    <td> <small> LTDC001-02 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (FEB) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 3 </small></td>
                                    <td> <small> LTDC001-03 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (MAR) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 4 </small></td>
                                    <td> <small> LTDC001-04 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (APR) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 5 </small></td>
                                    <td> <small> LTDC001-05 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (MAY) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 6 </small></td>
                                    <td> <small> LTDC001-06 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (JUN) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 7 </small></td>
                                    <td> <small> LTDC001-07 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (JUL) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 8 </small></td>
                                    <td> <small> LTDC001-08 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (AUG) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 9 </small></td>
                                    <td> <small>LTDC001-09</small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (SEP) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 10 </small></td>
                                    <td> <small> LTDC001-10 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (OCT) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 11 </small></td>
                                    <td> <small> LTDC001-11 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (NOV) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><small> 12 </small></td>
                                    <td> <small> LTDC001-12 </small> </td>
                                    <td> <small>SERVICE CHARGE FOR DRIVER COST (DEC) 2018</small> </td>
                                    <td class="text-center"> <small>1 UNIT</small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                    <td class="text-right"> <small></small> </td>
                                    <td class="text-right"> <small>18,500.00</small> </td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" rowspan="4">
                                        <p>หมายเหตุ</p>
                                        <p>Start Date 01/01/2018 - 31/12/2018 เริ่มตรงเดือน</p>
                                        <p>Driver Mr.Katavut Lapchai</p>
                                    </td>
                                    <td colspan="2"> <label> รวมราคา/Amount</label></td>
                                    <td align="right"> <label>222,000.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><label>ส่วนลด/Discount</label></td>
                                    <td align="right"><label>0.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><label>มูลค่า/Sub Total</label></td>
                                    <td align="right"><label>222,000.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><label>ภาษีมูลค่าเพิ่ม/Vat 7 %</label></td>
                                    <td align="right"><label>15,540.00</label></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><label>(สองแสนสามหมื่นเจ็ดพันห้าร้อยสี่สิบบาทถ้วน)</label></td>
                                    <td colspan="2"><label>ยอดเงินสุทธิ/Net Total</label></td>
                                    <td align="right"><label>237,540‬.00</label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงื่อนไข</label> <br>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีบันทึกแนบท้ายสัญญา DA-LT-201700351 (1) ทำงานวันทร์-ศุกร์ 08.00 - 17.00 น.</label>
                    </div>
                </div>
                <br><br><br><br>
                <div class="row">
                    <div class="col-md-3" style="padding-right: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>ผู้จัดทำ</label>
                                </div>
                            </div>
                            <br><br><br><br>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>วันที่/Date______________</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-right: 5px; padding-left: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>ผู้ตรวจสอบ</label>
                                </div>
                            </div>
                            <br><br><br><br>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>วันที่/Date_______________</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-left: 5px;">
                        <div class="card border">
                            <div class="row p-3">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>บริษัท มาสเตอร์ ไดรฟ์เวอร์ แอนด์ เซอร์วิสเซส (ประเทศไทย) จำกัด</label>
                                </div>
                            </div>
                            <br><br><br><br>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mt-2 text-center">
                                    <label>ผู้มีอำนาจอนุมัติ/Authorizer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center mb-4">
                    <a href="sale_order/PrintSaleOrder" target="_blank" class="btn btn-info btn-md">
                        Print
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ViewDriverGroupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Driver</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col" class="text-center">Driver</th>
                                                    <th scope="col" class="text-center">Telephone Number</th>
                                                    <th scope="col" class="text-center">Position</th>
                                                    <th scope="col" class="text-center">Gender</th>
                                                    <th scope="col" class="text-center">Age</th>
                                                    <th scope="col" class="text-center">Area</th>
                                                    <th scope="col" class="text-center">Language ability</th>
                                                    <th scope="col" class="text-center">Experience</th>
                                                    <th scope="col" class="text-center">Smoking</th>
                                                    <th scope="col" class="text-center">Match</th>
                                                    <th scope="col" class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> สมชาย มุ่งมั่น </td>
                                                    <td>081-2345678 / 092-3456789</td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย </td>
                                                    <td class="text-center"> 40 </td>
                                                    <td>ถนนบางกรวย-ไทรน้อย / บางกรวย </td>
                                                    <td>ภาษาไทย, English</td>
                                                    <td>พนักงานขับรถส่วนกลาง, ผู้บริหารชาวต่างชาต</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 100%; height:20px;" role="progressbar">100%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 2 </td>
                                                    <td> อนุวัฒน์ จันทกาล </td>
                                                    <td>081-2345678 / 092-3456789</td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย</td>
                                                    <td class="text-center"> 35 </td>
                                                    <td> ถนนกาญจนาภิเษก / บางกรวย </td>
                                                    <td>ภาษาไทย, English</td>
                                                    <td>ผู้บริหารชาวต่างชาติ</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 75%; height:20px;" role="progressbar">75%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 3 </td>
                                                    <td> ผดุง ด้วงคำ </td>
                                                    <td>081-2345678 / 092-3456789</td>
                                                    <td> พนักงานขับรถส่วนกลาง </td>
                                                    <td class="text-center"> ชาย </td>
                                                    <td class="text-center"> 36 </td>
                                                    <td> ถนนเทพารักษ์ / บางพลี </td>
                                                    <td>ภาษาไทย</td>
                                                    <td>พนักงานขับรถส่วนกลาง</td>
                                                    <td>No</td>
                                                    <td class="text-center">
                                                        <div class="progress" style="height:20px;">
                                                            <div class="progress-bar bg-success" style="width: 75%; height:20px;" role="progressbar">75%</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-md" title="View driver" data-toggle="modal" data-target="#ViewDriverModal">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="hidden" class="form-control" id="back_order_id" name="back_order_id">
                        <input type="hidden" class="form-control" id="created_at" name="created_at">
                        <input type="hidden" class="form-control" id="updated_at" name="updated_at">
                        <input type="hidden" class="form-control" id="deleted_at" name="deleted_at">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ViewDriverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            สถานะ : รอนัดสัมภาษณ์, ไม่มาตามนัด/สละสิทธิ์, เริ่มงานใหม่ (ระบุวันที่)
                        </div>
                        <div class="col-md-6">
                            <div class="text-right mb-3">
                                ผลสัมภาษณ์ : <h6 class="badge badge-pill text-white font-medium badge-success label-rouded"> ผ่านสัมภาษณ์ </h6>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50%"> <label for="example-text-input" class="col-form-label">รูปภาพ</label> </td>
                                    <td>
                                        <img src="https://intervision.co/mock-up/assets/images/ExamplePicture.jpg" width='200' alt="Example Picture" />
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">รหัสพนักงาน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">รหัสพนักงาน</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ตำแหน่งงาน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">พนักงานขับรถส่วนกลาง</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันที่สมัคร</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">10/12/2562</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันที่เริ่มทำงาน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">01/01/2563</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">อายุการทำงาน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">0 ปี</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เพศ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ชาย</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">คำนำหน้าชื่อ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">นาย</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">สมชาย</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Name</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Somchai</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">นามสกุล</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">มั่งมั่น</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Surname</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Mungman</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อเล่น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">อ๊อด</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เลขบัตรประชาชน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">3-7642-00300-02-1</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันที่บัตรหมดอายุ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">11/12/2570</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ส่วนสูง</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">170</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">น้ำหนัก</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">72</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันเกิด</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">11/12/1976</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">อายุ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">43 ปี</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สัญชาติ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ไทย</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ศาสนา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">พุทธ</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สถานที่เกิด</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">กรุงเทพฯ</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">อีเมล</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="33405c5e505b525a6c5e0a0a73545e525a5f1d505c5e">[email&#160;protected]</a></label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ที่อยู่ปัจจุบัน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">791 เบอร์รี่อพาร์ทเม้น 15/2 ซอยพระราม 9 แขวงบางกะปิ เขตห้วยขวาง กรุงเทพฯ</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ที่อยู่ปัจจุบัน (ภาษาอังกฤษ)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">791 Berry Apartments 15/2 Soi Rama 9, Bang Kapi Subdistrit, Huai Khwang Distrit, Bangkok</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ที่อยู่ตามทะเบียนบ้าน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">84 ซอยพระราม 9 แขวงบางกะปิ เขตห้วยขวาง กรุงเทพฯ</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ที่อยู่ตามทะเบียนบ้าน (ภาษาอังกฤษ)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">84 Soi Rama 9, Bang Kapi Subdistrit, Huai Khwang Distrit, Bangkok</label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ข้อมูลครอบครัว</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50%"> <label for="example-text-input" class="col-form-label">สถานภาพครอบครัว</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">สมรสไม่จดทะเบียน</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">จำนวนบุตร</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">2</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อคู่สมรส</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">นางสาว มาลัยพร</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อคู่สมรส (ภาษาอังกฤษ)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Miss Maalaiphon</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">นามสกุลคู่สมรส</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ศิริกุล</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">นามสกุลคู่สมรส (ภาษาอังกฤษ)</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Sirikul</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ตำแหน่งงานของคู่สมรส</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">บัญชี</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">บริษัทที่ทำงานของคู่สมรส</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">บริษัท เสริมสงวนชัย จำกัด</label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ข้อมูลบิดา - มารดา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td align="center">ชื่อ <br> (ชื่อภาษาไทย) </td>
                                    <td align="center">นามสกุล <br> (นามสกุลภาษาไทย) </td>
                                    <td align="center">อายุ</td>
                                    <td align="center">สถานะ</td>
                                    <td align="center">อาชีพ</td>
                                    <td align="center">ตำแหน่งงาน</td>
                                    <td align="center">บริษัทที่ทำงาน</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">บิดา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">นาย สมหมาย</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> มุ่งมั่น </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 63 ปี </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> มีชีวิตอยู่ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ขายของชำ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">มารดา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> นางเอี่ยม </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> มุ่งมั่น </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 63 ปี </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> มีชีวิตอยู่ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ขายของชำ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ข้อมูลพี่น้อง</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>สถานะ</td>
                                    <td>อายุ</td>
                                    <td>อาชีพ</td>
                                    <td>บริษัท</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">1</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">อนุชิต</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">หอมชื่น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">น้อง</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Programmer</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Inter Vistion </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">2</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">มะลิ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">หอมชื่น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">น้อง</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">นักศึกษา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">-</label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ประวัติการศึกษา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg text-center">
                            <thead>
                                <tr>
                                    <td>ระดับการศึกษา</td>
                                    <td>ตั้งแต่ (From)</td>
                                    <td>ถึง (Since)</td>
                                    <td>ชื่อสถาบันการศึกษา</td>
                                    <td>วิชาเอก / วิชาโท</td>
                                    <td>เกรดเฉลี่ย</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ประถมศึกษา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2520 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2526 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> โรงเรียนนันทวันศึกษา </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 3.10 </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">มัธยมศึกษา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2526 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2529 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> โรงเรียนนันทวันศึกษา </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> - </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 3.26 </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">อาชีวศึกษา</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2529 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2532 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> เทคโนโลยีรัตนพงษ์ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ช่างยนต์ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 3.00 </label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ประวัติการทำงาน</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>จำนวนปี</td>
                                    <td>ตั้งแต่</td>
                                    <td>ถึง</td>
                                    <td colspan="4">บริษัทปัจจุบัน</td>
                                    <td colspan="3">ตำแหน่ง</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">10</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">2536</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">2546</label> </td>
                                    <td colspan="4"> <label for="example-text-input" class="col-form-label"> </label> บริษัท เล่งหงยานยนต์ จำกัด </td>
                                    <td colspan="3"> <label for="example-text-input" class="col-form-label"> </label> ช่างซ่อมบำรุง </td>
                                </tr>
                                <tr>
                                    <td rowspan="2"> <label for="example-text-input" class="col-form-label">เงินเดือน</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">เริ่มต้น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 6,000 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ค่าคอมมิชชั่น </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ค่าโทรศัพท์ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ค่าน้ำมัน </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> โบนัส </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> เบี้ยขยัน </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> อื่น ๆ </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สุดท้าย</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 12,000 </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">หน้าที่และความรับผิดชอบโดยละเอียด</label> </td>
                                    <td colspan="8"> รับผิดชอบงานซ่อมรถยนต์ </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สาเหตุที่ออก</label> </td>
                                    <td colspan="8"> บริษัทปิดตัว </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ชื่อผู้บังคับบัญชา</label> </td>
                                    <td colspan="8"> นายหมง แซ่อึง </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>จำนวนปี</td>
                                    <td>ตั้งแต่</td>
                                    <td>ถึง</td>
                                    <td colspan="4">บริษัทปัจจุบัน</td>
                                    <td colspan="3">ตำแหน่ง</td>
                                </tr>
                            </thead>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">15</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">2547</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">2562</label> </td>
                                <td colspan="4"> <label for="example-text-input" class="col-form-label"> </label> บริษัท ชัยการช่าง จำกัด </td>
                                <td colspan="3"> <label for="example-text-input" class="col-form-label"> </label> หัวหน้าช่าง </td>
                            </tr>
                            <tr>
                                <td rowspan="2"> <label for="example-text-input" class="col-form-label">เงินเดือน</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">เริ่มต้น</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">10,000</label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> ค่าคอมมิชชั่น </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> ค่าโทรศัพท์ </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> ค่าน้ำมัน </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> โบนัส </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> เบี้ยขยัน </label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> อื่น ๆ </label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">สุดท้าย</label> </td>
                                <td> <label for="example-text-input" class="col-form-label"> 15,000 </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                                <td> <label for="example-text-input" class="col-form-label">- </label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">หน้าที่และความรับผิดชอบโดยละเอียด</label> </td>
                                <td colspan="8"> ดูแลช่างซ่อมรถ และตรวจงานซ่อมรถ </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">สาเหตุที่ออก</label> </td>
                                <td colspan="8"> ไม่ก้าวหน้า </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">ชื่อผู้บังคับบัญชา</label> </td>
                                <td colspan="8"> นายชัย ขันติรัต </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ประวัติการฝึกอบรม</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ปี</td>
                                    <td>หลักสูตร</td>
                                    <td>สถาบันฝึกอบรม</td>
                                    <td>ระยะเวลา</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">2550</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> หลักสูตรการพ่นซ่อมสีรถยนต์ระบบโซลเว้นท์ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> สถาบันพัฒนาทรพยากรมนุษย์และองค์กร </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 2 วัน </label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">2560</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> พัฒนาพนักงานขับรถมืออาชีพ </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> สถาบันพัฒนาทรพยากรมนุษย์และองค์กร </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> 3 วัน </label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">ความสามารถทางภาษา</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ภาษา</td>
                                    <td>การพูด</td>
                                    <td>การอ่าน</td>
                                    <td>การเขียน</td>
                                    <td>ผลทดสอบด้านภาษา (ถ้ามี)</td>
                                    <td>คะแนน</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">English</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ดี</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ดี</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ดี</label> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">Japanese</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ดี </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ดี </label> </td>
                                    <td> <label for="example-text-input" class="col-form-label"> ดี </label> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">ข้อมูลอื่น ๆ</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50%"> <label for="example-text-input" class="col-form-label">รายได้รวมที่ต้องการ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">15,000</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันที่เริ่มงานได้</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">01/01/2563</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">สถานภาพทางทหาร</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">ผ่านการเกณฑ์ทหารแล้ว</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เหตุผลที่ได้รับการยกเว้น</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">-</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ยานพาหนะ</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">มี</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เลขที่ใบขับขี่รถยนต์</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">49005678</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันหมดอายุ ใบขับขี่รถยนต์</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">01/01/2565</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">เลขที่ใบขับขี่รถจักรยานยนต์</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">53001909</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">วันหมดอายุ ใบขับขี่รถจักรยานยนต์</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">01/01/2565</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ท่านเคยป่วยหนักในรอบปีที่ผ่านมาหรือไม่</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">No</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ท่านเคยถูกจับต้องคดีอาญาหรือไม่</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">No</label> </td>
                                </tr>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ท่านเคยถูกเลิกจ้างหรือไม่</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">No</label> </td>
                                </tr>
                                <tr>
                                    <td width="50%"> <label for="example-text-input" class="col-form-label">ตำแหน่งที่ท่านสมัครต้องมีบุคคลค้ำประกัน ท่ายสามารถหาบุคคลค้ำประกันได้หรือไม่</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">Yes</label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">บุคคลอ้างอิง</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>ความสัมพันธ์</td>
                                    <td>บริษัท</td>
                                    <td>อาชีพ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td> นาย ชัย </td>
                                    <td> ขันติรัต </td>
                                    <td> เจ้านายเก่า </td>
                                    <td> บริษัท ชัยการช่าง จำกัด </td>
                                    <td> ธุรกิจส่วนตัว </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>ความสัมพันธ์</td>
                                    <td>ที่อยู่</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> นางสาว มาลัยพร </td>
                                    <td> ศิริกุล </td>
                                    <td> ภรรยา </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td> นายอนุชิต </td>
                                    <td> หอมชื่น </td>
                                    <td> น้องชาย </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2"></h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td> <label for="example-text-input" class="col-form-label">ทราบข่าวการสมัครงานจาก</label> </td>
                                    <td> <label for="example-text-input" class="col-form-label">เพื่อนแนะนำ</label> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="box-title mt-2">เอกสารอื่น ๆ</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ประเภท</td>
                                    <td>File</td>
                                    <td>รายละเอียด</td>
                                    <td>วันที่</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> สำเนาบัตรประชาชน </td>
                                    <td> <a href="javascript:void(0)"> <i class="mdi mdi-download"></i> Download</a> </td>
                                    <td> </td>
                                    <td> 01/01/2563 </td>
                                </tr>
                                <tr>
                                    <td> สำเนาใบขับขี่รถยนต์ </td>
                                    <td> <a href="javascript:void(0)"> <i class="mdi mdi-download"></i> Download</a> </td>
                                    <td> </td>
                                    <td> 01/01/2563 </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">ประวัติอาชญากรรม</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>วันนัดตรวจ</td>
                                    <td>ผลตรวจ</td>
                                    <td>ประเภท</td>
                                    <td>File</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td>20/04/2563</td>
                                    <td> พบ </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">ผลตรวจสุขภาพ</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>สรุปผลการตรวจ</td>
                                    <td>ความเห็นแพทย์อาชีวเวชศาสตร์</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">ข้อมูลรับชุดฟอร์มเริ่มงานใหม่/ครบปี</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>วันที่รับ</td>
                                    <td>จำนวนที่รับ</td>
                                    <td>ราคา</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> 03/04/2563 </td>
                                    <td> 1 </td>
                                    <td> 500.00 </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">ยอดรวม</td>
                                    <td>500.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3 class="box-title mt-5">การลาออก</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>ประเภทการลาออก</td>
                                    <td>เลขที่เอกสาร</td>
                                    <td>วันที่ทำงานวันสุดท้าย</td>
                                    <td>วันที่มีผลบังคับใช้</td>
                                    <td>เหตุผลการลาออก</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> ลาออกถูกต้อง </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td> 2 </td>
                                    <td> ลาออกไม่ถูกต้อง </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AttachContractModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View document</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">No</th>
                                                    <th scope="col" class="text-center">File name</th>
                                                    <th scope="col" class="text-center">Detail</th>
                                                    <th scope="col" class="text-center">.doc File</th>
                                                    <th scope="col" class="text-center">Date .doc file</th>
                                                    <th scope="col" class="text-center">.pdf File</th>
                                                    <th scope="col" class="text-center">Date .doc file</th>
                                                    <th scope="col" class="text-center">วันที่ของเอกสาร (วันที่เซ็น)</th>
                                                    <th scope="col" class="text-center">วันที่นำเข้าไฟล์</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"> 1 </td>
                                                    <td>เอกสารสัญญา 1</td>
                                                    <td>-</td>
                                                    <td><a href="javascript:void(0);">File.doc</a></td>
                                                    <td>18/04/2020</td>
                                                    <td><a href="javascript:void(0);">File.pdf</a></td>
                                                    <td>18/04/2020</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="">
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


