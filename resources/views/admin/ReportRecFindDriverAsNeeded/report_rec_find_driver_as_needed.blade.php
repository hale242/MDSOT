@extends('layouts.layout2')
@section('content')
<div class="page-content container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<h4 class="card-title">Search</h4>
<div class="row pt-3">
<div class="col-md-3">
<div class="form-group">
<label class="control-label">Start Date</label>
<input type="date" id="" name="" class="form-control search_table" placeholder="">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label class="control-label">End Date</label>
<input type="date" id="" name="" class="form-control search_table" placeholder="">
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success"><i class="ti-search"></i> Search</button>
<button type="button" class="btn btn-secondary clear-search">Clear</button>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="material-card card">
<div class="card">
<div class="card-body">
<h4 class="card-title"> R#17 สรุปการสรรหาพขร.ได้ตามกำหนดของลูกค้าตาม Back Order ประจำเดือน</h4>

</div>
<div class="table-responsive">
<table class="table table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
<thead>
<tr class="text-center">
<th scope="col" rowspan="2">No.</th>
<th scope="col" rowspan="2">Sales Status</th>
<th scope="col" rowspan="2">Person</th>
<th scope="col" rowspan="2">Sales</th>
<th scope="col" rowspan="2">Customer</th>
<th scope="col" rowspan="2">Customer</th>
<th scope="col" rowspan="2">House Location</th>
<th scope="col" rowspan="2">Services Fee</th>
<th scope="col" rowspan="2">ประมาณการ OT</th>
<th scope="col" rowspan="2">Qualification Requirement</th>
<th scope="col" rowspan="2">Driver's Salry & Revenue Pack</th>
<th scope="col" rowspan="2">Expect date of Delivery</th>
<th scope="col">Overdue</th>
<th scope="col">Time length</th>
<th scope="col" rowspan="2">Sales Comment </th>
<th scope="col" rowspan="2">Confirmed Date (Recruit)</th>
<th scope="col" rowspan="2">Status Operation</th>
<th scope="col" rowspan="2">Overdue (30 วัน)</th>
<th scope="col" rowspan="2">Overdue (45 วัน)</th>
<th scope="col" rowspan="2">Overdue (60 วัน)</th>
<th scope="col" rowspan="2">ลูกค้าแจ้งยกเลิก (สรรหาไม่ได้)</th>
<th scope="col" rowspan="2">Remark</th>
</tr>
<tr class="text-center">
<td>MM</td>
<td>DD</td>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td></td>
<td>BKK.</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<th scope="row">2</th>
<td>รอเริ่มงาน</td>
<td>1</td>
<td>Pannalluk</td>
<td>Takechiho Fire</td>
<td>New</td>
<td>นายพัก สุขุมวิท ออฟฟิศ Interlink Tower Bangna</td>
<td>15,500</td>
<td>4,000</td>
<td>ญี่ปุ่น</td>
<td>100000/1000/ภาษา1000</td>
<td>กำหนดใช้คนทันที</td>
<td>0</td>
<td>11</td>
<td>ทำงานวัน จ-ศ <br> เวลา 8.30-17.30 น.</td>
<td>8/5/2020</td>
<td>นัดสัมภาษณ์วันจันทร์ 18/05/2020 เวลา 13.30 พขร.สุขสันต์</td>
<td></td>
<td>1</td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<th scope="row">3</th>
<td>รอนัดสัมภาษณ์</td>
<td>1</td>
<td>Pannalluk</td>
<td>SKY ICT</td>
<td>New</td>
<td>สุขุมวิท</td>
<td>14,500</td>
<td>4,000</td>
<td>ไทย</td>
<td>10000/1000</td>
<td>กำหนดใช้คน 01/06/2020</td>
<td>0</td>
<td>4</td>
<td>ทำงานวัน จ-ศ <br> เวลา 9.00-16.00 น.</td>
<td>15/5/2020</td>
<td>ส่ง Resume พขร.ศุภชัย รอลูกค้านัดวันสัมภาษณ์</td>
<td></td>
<td>1</td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<th scope="row">4</th>
<td>รอสรรหา</td>
<td>1</td>
<td>Pannalluk</td>
<td>ฝาจีบ</td>
<td>Existing</td>
<td>ขับส่วนกลาง</td>
<td>15,500</td>
<td>4,000</td>
<td>นายต่างชาติ</td>
<td>10000/1000/ภาษา1000</td>
<td>กำหนดใช้คนทันที</td>
<td>0</td>
<td>19</td>
<td>ทำงานวัน จ-ศ <br> เวลา 8.10-17.10 น.</td>
<td>30/4/2020</td>
<td>สัมภาษณ์ พขร.สุขสันต์,พขร.ศุภชัย ไม่ผ่าน รอสรรหาใหม่</td>
<td>1</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<th scope="row">5</th>
<td></td>
<th>3</th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<th>1</th>
<th>2</th>
<th>0</th>
<th>0</th>
<td></td>
</tr>
<tr>
<th scope="row">6</th>
<td></td>
<td>Eastern Branch</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<th scope="row">7</th>
<td></td>
<td>1</td>
<td>wichuda</td>
<td></td>
<td>Existing</td>
<td>นายพัก ศรีราชา บริษัทอยู่ โรจนะ</td>
<td>18,265</td>
<td>การันตี OT 3000</td>
<td>-</td>
<td>10050/100</td>
<td>กำหนดใช้คน 28/03/2020</td>
<td>2</td>
<td>1</td>
<td>ทำงานวัน จ-ส เวลา 8.00.17.00 น. พขร.สื่อสารภาษาอังกฤษพอได้ เช่นบอกทางแจ้งการเดินทาง</td>
<td>24/04/2020</td>
<td>รอเริ่มงาน พขร.พรรณ</td>
<td>1</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<th scope="row">8</th>
<td></td>
<th>1</th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<th>1</th>
<th>0</th>
<th>0</th>
<th>0</th>
<td></td>
</tr>
</tbody>
</table>
</div>
</div>
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
<label for="Name">Name</label>
<input type="text" class="form-control" id="Name" name="Name" placeholder="" value="">
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
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">View</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
</div>
<div class="modal-body form-horizontal">
<div class="form-group mt-12 row">
<label for="example-text-input" class="col-md-2 col-form-label">Name</label>
<div class="col-md-4">
<label for="example-text-input" class="col-form-label">Name</label>
</div>
</div>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="45ec9bebdc0b10e0edf6c800-text/javascript">

	$(function () {
		"use strict";
		$("#main-wrapper").AdminSettings({
			Theme: false, // this can be true or false ( true means dark and false means light ),
			Layout: 'vertical',
			LogoBg: 'skin5', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
			NavbarBg: 'skin1', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
			SidebarType: 'mini-sidebar', // You can change it full / mini-sidebar / iconbar / overlay
			SidebarColor: 'skin5', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
			SidebarPosition: true, // it can be true / false ( true means Fixed and false means absolute )
			HeaderPosition: true, // it can be true / false ( true means Fixed and false means absolute )
			BoxedLayout: false, // it can be true / false ( true means Boxed and false means Fluid )
		});
	});

	$(document).ready(function(){

		$("#main-wrapper").addClass("hide-sidebar");

		$("#productviewModal").on("show.bs.modal", function (event) {
			var button = $(event.relatedTarget);
			var recipient = button.data("product_id");
			var modal = $(this);

		})

		$(".confirm-delete").on("click touch" , function (event) {
			var modal = $(this);
			var product_id = modal.data("product_id");
			Swal.fire({
				title: "Are you sure? ID: "+product_id,
				text: "You won t be able to revert this!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Yes, delete it!"
			}).then((result) => {
				if (result.value) {
					Swal.fire(
						"Deleted!",
						"Your file has been deleted.",
						"success"
					)
				}
			})
		});

	});

	</script>
</div>
<script type="45ec9bebdc0b10e0edf6c800-text/javascript">
    $(document).ready(function(){
        $('.table-autosort').DataTable({
			
			"pageLength": 10,
			"scrollX": true,
			"dom": 'Bfrtip',
			"columnDefs": [
				{
					// targets: 1,
					className: 'noVis',
					visible: false
				}
			],
			"buttons": [
				'colvis',
				{
					extend: 'copy',
					exportOptions: {
						columns: ':visible'
					},
				},
				{
					extend: 'csv',
					exportOptions: {
						columns: ':visible'
					},
					// messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
				},
				{
					extend: 'excel',
					exportOptions: {
						columns: ':visible'
					},
					// messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
				},
				{
					extend: 'print',
					exportOptions: {
						columns: ':visible'
					},
					// messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
				},
				// $.extend(true, {}, buttonCommon, {
						// extend: "print",
						// exportOptions: {
							// columns: ':visible'
						// },
						// messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
				// }),	
				{
					extend: 'pdf',
					exportOptions: {
						columns: ':visible'
					},
					// messageBottom: "FR-Q-PD-01-02/00 (Effective Date : 11 Mar 2019)",
				},
				
			],
		});
    });
	
	var buttonCommon = {
            exportOptions: {
                format: {
                    body: function (data, column, row, node) {
                        if (column == 6) {
                            // return $(data).find("option:selected").text()
							return data
                        } else return data
                    }
                }
            }
        };
	// $(document).ready(function() {
		// $('#example').DataTable( {
			// dom: 'Bfrtip',
			// buttons: [
					// 'copy', $.extend(true, {}, buttonCommon, {
						// extend: "csv"
					// }), $.extend(true, {}, buttonCommon, {
						// extend: "excel"
					// }), $.extend(true, {}, buttonCommon, {
						// extend: "pdf"
					// })
				// ]
		// } );
	// } );

</script>
@endsection