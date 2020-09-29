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
<label class="control-label">Start date</label>
<input type="date" id="driver_date" name="date" class="form-control search_table" placeholder="">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label class="control-label">End date</label>
<input type="date" id="driver_date" name="driver_date" class="form-control search_table" placeholder="">
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
<h4 class="card-title">R#4 รายงานเปลี่ยนแปลงสภาพการจ้างงานพนักงานขับรถยนต์ (กรณีลาป่วย/ลากิจ ไม่ได้รับค่าจ้าง)</h4>

</div>
<div class="table-responsive">
<table class="table table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
<thead class="text-center">
<tr>
<th scope="col" rowspan="2">No</th>
<th scope="col" rowspan="2">ชื่อ-สกุล</th>
<th scope="col" rowspan="2">วันที่มีผลบังคับใช้</th>
<th scope="col" colspan="2">หน่วยงานเดิม</th>
<th scope="col" colspan="2">หน่วยงานใหม่</th>
<th scope="col" rowspan="2">สิทธิการลาหยุดงาน</th>
<th scope="col" rowspan="2">หมายเหตุ</th>
</tr>
<tr>
<td>บริษัท</td>
<td>เงินเดือน</td>
<td>บริษัท</td>
<td>เงินเดือน</td>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td>สมชาย มุ่งมั่น</td>
<td>02/01/2020</td>
<td>ทดแทนลาดพร้าว</td>
<td>10,000.00</td>
<td>ทดแทนลาดพร้าว</td>
<td>10,000.00</td>
<td>
<u>ลาป่วย</u> ได้รับค่าจ้าง <br>
<u>ลาป่วย</u> ไม่ได้รับค่าจ้าง
</td>
<td>
<u>ลาป่วย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 02/01/2020 จนถึง วันที่ 05/02/2020) <br>
<u>ลาป่วย</u> ไม่ได้รับค่าจ้าง (ตั้งแต่วันที่ 06/02/2020 จนถึง วันที่ 31/03/2020)
</td>
</tr>
<tr>
<th scope="row">2</th>
<td>อนุวัฒน์ จันทกาล</td>
<td>01/01/2020</td>
<td>ทดแทนลาดพร้าว</td>
<td>10,000.00</td>
<td>ทดแทนลาดพร้าว</td>
<td>10,000.00</td>
<td>
<u>ลาป่วย</u> ได้รับค่าจ้าง <br>
<u>ลาป่วย</u> ไม่ได้รับค่าจ้าง
</td>
<td>
<u>ลาป่วย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 01/01/2020 จนถึง วันที่ 04/02/2020) <br>
<u>ลาป่วย</u> ไม่ได้รับค่าจ้าง (ตั้งแต่วันที่ 05/02/2020 จนถึง วันที่ 31/03/2020)
</td>
</tr>
<tr>
<th scope="row">3</th>
<td>ผดุง ด้วงคำ</td>
<td>10/01/2020</td>
<td>บจก.อาคเนย์แคปปิตอล</td>
<td>10,000.00</td>
<td>ทดแทนลาดพร้าว</td>
<td>10,000.00</td>
<td>
<u>ลาป่วย</u> ได้รับค่าจ้าง <br>
<u>ลาป่วย</u> ไม่ได้รับค่าจ้าง <br>
<u>ลาป่วย</u> ได้รับค่าจ้าง (เขียนใบลาออก)
</td>
<td>
<u>ลาป่วย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 10/01/2020 จนถึง วันที่ 13/02/2020) <br>
<u>ลาป่วย</u> ไม่ได้รับค่าจ้าง (ตั้งแต่วันที่ 14/02/2020 จนถึง วันที่ 29/02/2020) <br>
<u>ชดเชย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 01/03/2020 จนถึง วันที่ 31/03/2020)
</td>
</tr>
<tr>
<th scope="row">4</th>
<td>อัศนัย ภูมิวิศัย</td>
<td>19/02/2020</td>
<td>Princess Beauty and Spa</td>
<td>10,000.00</td>
<td>ทดแทนลาดพร้าว</td>
<td>10,000.00</td>
<td>
<u>ลาป่วย</u> ได้รับค่าจ้าง <br>
<u>ลาป่วย</u> ไม่ได้รับค่าจ้าง
</td>
<td>
<u>ลาป่วย</u> ได้รับค่าจ้าง (ตั้งแต่วันที่ 19/02/2020 จนถึง วันที่ 26/03/2020) <br>
<u>ลาป่วย</u> ไม่ได้รับค่าจ้าง (ตั้งแต่วันที่ 27/03/2020 จนถึง วันที่ 31/03/2020)
</td>
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
</div>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="4894b493a600f129cf5bc65b-text/javascript">

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
<footer class="footer text-center">
All Rights Reserved by Ample admin. Designed and Developed by
<a href="https://wrappixel.com">WrapPixel</a>.
</footer> </div>
</div>
<script type="4894b493a600f129cf5bc65b-text/javascript">
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