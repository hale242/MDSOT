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
<label class="control-label" for="">Year</label>
<select class="select2 form-control custom-select" style="height: 36px;width: 100%;" id="" name="" data-placeholder="" tabindex="1">
<option value="0">----Select----</option>
<option value="">2010</option>
<option value="">2011</option>
<option value="">2012</option>
<option value="">2013</option>
<option value="">2014</option>
<option value="">2015</option>
<option value="">2016</option>
<option value="">2017</option>
<option value="">2018</option>
<option value="">2019</option>
<option value="">2020</option>
</select>
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
<h4 class="card-title">R#15 แจ้งรายชื่อพนักงานขับรถเข้าอบรม ประจำปี</h4>

</div>
<div class="table-responsive">
<table class="table table-bordered table-datatable-button mb-0 dataTables_wrapper no-footer">
<thead>
<tr class="text-center">
<th scope="col" rowspan="2">No.</th>
<th scope="col" rowspan="2">รหัส</th>
<th scope="col" rowspan="2">สาขา</th>
<th scope="col" rowspan="2">ชื่อ-นามสกุล</th>
<th scope="col" rowspan="2">หน่วยงาน</th>
<th scope="col" rowspan="2">โทรศัพท์</th>
<th scope="col" rowspan="2">วันเริ่มงาน</th>
<th scope="col" rowspan="2">วันลาออก</th>
<th scope="col" rowspan="2">อายุ</th>
<th scope="col" colspan="3">อายุงาน</th>
<th scope="col" rowspan="2">วันที่เข้าอบรมครั้งที่ 1</th>
<th scope="col" rowspan="2">วันที่เข้าอบรมครั้งที่ 2</th>
<th scope="col" rowspan="2">วันที่เข้าอบรมครั้งที่ 3</th>
<th scope="col" rowspan="2">หมายเหตุ</th>
</tr>
<tr>
<td>ปี</td>
<td>เดือน</td>
<td>วัน</td>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td>MDSLP383</td>
<td>กรุงเทพ</td>
<td></td>
<td>Vinythai PCL</td>
<td></td>
<td>06/07/2016</td>
<td></td>
<td>45</td>
<td>3</td>
<td>10</td>
<td>15</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<th scope="row">2</th>
<td>MDSRY019</td>
<td>ระยอง</td>
<td></td>
<td>Air Asia</td>
<td></td>
<td>27/10/2015</td>
<td></td>
<td>42</td>
<td>4</td>
<td>6</td>
<td>24</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<th scope="row">3</th>
<td>MDSLP412</td>
<td>ระยอง</td>
<td></td>
<td>Air Asia</td>
<td></td>
<td>01/11/2016</td>
<td></td>
<td>30</td>
<td>3</td>
<td>6</td>
<td>20</td>
<td></td>
<td></td>
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
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="5c73bf8508c8cc35aa543f76-text/javascript">

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
<script type="5c73bf8508c8cc35aa543f76-text/javascript">
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