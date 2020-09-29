@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Question</h4>
                    @if(App\Helper::CheckPermissionMenu('DriverTestText' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableDriverTestText" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Question (TH)</th>
                                <th scope="col">Question (EN)</th>
                                <th scope="col">Max Point</th>
                                <th scope="col">Status Recrult</th>
                                <th scope="col">Status Rperation</th>
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
            <form id="FormAdd" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="driver_test_text_name_th">Question (TH)</label>
                                    <input type="text" class="form-control" id="add_driver_test_text_name_th" name="driver_test_text_name_th" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_test_text_name_en">Question (EN)</label>
                                    <input type="text" class="form-control" id="add_driver_test_text_name_en" name="driver_test_text_name_en" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_test_text_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_driver_test_text_details" name="driver_test_text_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="add_driver_test_text_max_point">Max Point</label>
                                    <input type="number" class="form-control" id="add_driver_test_text_max_point" name="driver_test_text_max_point">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status Recrult</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_driver_test_text_status_recrult" name="driver_test_text_status_recrult" value="1" checked>
                                        <label class="custom-control-label" for="add_driver_test_text_status_recrult">Action</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status Operation</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_driver_test_text_status_operation" name="driver_test_text_status_operation" value="1" checked>
                                        <label class="custom-control-label" for="add_driver_test_text_status_operation">Action</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_driver_test_text_status" name="driver_test_text_status" value="1" checked>
                                        <label class="custom-control-label" for="add_driver_test_text_status">Action</label>
                                    </div>
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

<div class="modal fade" id="ModalEdit" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form id="FormEdit" class="needs-validation" novalidate>
                <input type="hidden" id="edit_id">
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="edit_driver_test_text_name_th">Question (TH)</label>
                                    <input type="text" class="form-control" id="edit_driver_test_text_name_th" name="driver_test_text_name_th" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_driver_test_text_name_en">Question (EN)</label>
                                    <input type="text" class="form-control" id="edit_driver_test_text_name_en" name="driver_test_text_name_en" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="driver_test_text_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_driver_test_text_details" name="driver_test_text_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_driver_test_text_max_point">Max Point</label>
                                    <input type="number" class="form-control" id="edit_driver_test_text_max_point" name="driver_test_text_max_point">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status Recrult</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_driver_test_text_status_recrult" name="driver_test_text_status_recrult" value="1">
                                        <label class="custom-control-label" for="edit_driver_test_text_status_recrult">Action</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status Operation</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_driver_test_text_status_operation" name="driver_test_text_status_operation" value="1">
                                        <label class="custom-control-label" for="edit_driver_test_text_status_operation">Action</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_driver_test_text_status" name="driver_test_text_status" value="1">
                                        <label class="custom-control-label" for="edit_driver_test_text_status">Action</label>
                                    </div>
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

<div class="modal fade" id="ModalView" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Question (TH)</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_test_text_name_th" class="col-form-label">น.ส.</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Question (EN)</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_test_text_name_en" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_test_text_details" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Max Point</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_test_text_max_point" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status Recrult</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_test_text_status_recrult" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status Operation</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_test_text_status_operation" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_driver_test_text_status" class="col-form-label"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
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
    var tableDriverTestText = $('#tableDriverTestText').dataTable({
        "ajax": {
            "url": url_gb+"/admin/DriverTestText/Lists",
            "type":"POST", "data": function ( d ) {
                // d.custom = $('#myInput').val();
                // etc
            }
        },
        "drawCallback": function( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {
                "data" : "action" ,
                "name" : "action",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "driver_test_text_name_th"},
            {"data" : "driver_test_text_name_en"},
            {"data" : "driver_test_text_max_point" , "class":"text-center" , "searchable": false, "sortable": false,},
            {
                "data" : "status_recrult" ,
                "name" : "status_recrult",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },
            {
                "data" : "status_operation" ,
                "name" : "status_operation",
                "searchable": false,
                "sortable": false,
                "class" : "text-center"
            },
           
        ],
        "select": true,
	      "dom": 'Bfrtip',
		     "lengthMenu": [
				       [10, 25, 50, -1],
               ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        "columnDefs": [{
            className: 'noVis', visible: false
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

    $('body').on('click','.btn-add',function(data){
        $('#add_driver_test_text_status').prop('checked', true);
        $('#ModalAdd').modal('show');
    });

    $('body').on('click','.btn-edit',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/DriverTestText/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          $("#edit_driver_test_text_name_th").val(data.driver_test_text_name_th);
          $("#edit_driver_test_text_name_en").val(data.driver_test_text_name_en);
          $("#edit_driver_test_text_details").val(data.driver_test_text_details);
          $("#edit_driver_test_text_max_point").val(data.driver_test_text_max_point);
          if(data.driver_test_text_status_recrult == 1){
              $('#edit_driver_test_text_status_recrult').prop('checked', true);
          }else{
              $('#edit_driver_test_text_status_recrult').prop('checked', false);
          }
          if(data.driver_test_text_status_operation == 1){
              $('#edit_driver_test_text_status_operation').prop('checked', true);
          }else{
              $('#edit_driver_test_text_status_operation').prop('checked', false);
          }
          if(data.driver_test_text_status == 1){
              $('#edit_driver_test_text_status').prop('checked', true);
          }else{
              $('#edit_driver_test_text_status').prop('checked', false);
          }
          $('#ModalEdit').modal('show');
        }).fail(function(res) {
          resetButton(form.find('button[type=submit]'));
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click','.btn-view',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/DriverTestText/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            var status_recrult = '';
            var status_operation = '';
            if(data.driver_test_text_status_recrult == 1){
                status_recrult = "Active";
            }else{
                status_recrult = "No Active";
            }
            if(data.driver_test_text_status_operation == 1){
                status_operation = "Active";
            }else{
                status_operation = "No Active";
            }
            if(data.driver_test_text_status == 1){
                status = "Active";
            }else{
                status = "No Active";
            }
            $('#show_driver_test_text_name_th').text(data.driver_test_text_name_th);
            $('#show_driver_test_text_name_en').text(data.driver_test_text_name_en);
            $('#show_driver_test_text_details').text(data.driver_test_text_details);
            $('#show_driver_test_text_max_point').text(data.driver_test_text_max_point);
            $('#show_driver_test_text_status_recrult').text(status_recrult);
            $('#show_driver_test_text_status_operation').text(status_operation);
            $('#show_driver_test_text_status').text(status);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status',function(data){
        var id = $(this).data('id');
        var type = $(this).data('type');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverTestText/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
                type: type,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableDriverTestText.api().ajax.reload();
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
            url: url_gb+"/admin/DriverTestText",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableDriverTestText.api().ajax.reload();
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
            url: url_gb+"/admin/DriverTestText/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableDriverTestText.api().ajax.reload();
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
