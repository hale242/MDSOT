@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
                    @if(App\Helper::CheckPermissionMenu('TypeJobNew' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <!-- <div class="action-tables">
                        <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                            <span class="badge badge-light mr-2"><i class="ti-check"></i></span> Check All
                        </a>
                        <a href="javascript:void(0)">
                            <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Approve
                        </a>
                        <a href="javascript:void(0)">
                            <span class="badge badge-warning mr-2"><i class="ti-alert"></i></span> Waiting
                        </a>
                        <a href="javascript:void(0)">
                            <span class="badge badge-secondary mr-2"><i class="ti-back-right"></i></span> Reject
                        </a>
                        <a href="javascript:void(0)">
                            <span class="badge badge-danger mr-2"><i class="ti-trash"></i></span> Delete
                        </a>
                        <a href="javascript:void(0)">
                            <span class="badge badge-warning mr-2"><i class="ti-export"></i></span> Export
                        </a>
                    </div> -->
                    <table id="tableTypeJobNew" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Type Job New</th>
                                <th scope="col">Details</th>
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
    <div class="modal-dialog modal-md" role="document">
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
                                    <label for="type_job_new_name">Type Job New</label>
                                    <input type="text" class="form-control" id="add_type_job_new_name" name="type_job_new_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="type_job_new_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_type_job_new_details" name="type_job_new_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_type_job_new_status" name="type_job_new_status" value="1">
                                        <label class="custom-control-label" for="add_type_job_new_status">Action</label>
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
    <div class="modal-dialog modal-md" role="document">
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
                                    <label for="type_job_new_name">Type Job New</label>
                                    <input type="text" class="form-control" id="edit_type_job_new_name" name="type_job_new_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="type_job_new_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_type_job_new_details" name="type_job_new_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_type_job_new_status" name="type_job_new_status" value="1">
                                        <label class="custom-control-label" for="edit_type_job_new_status">Action</label>
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
    <div class="modal-dialog modal-md" role="document">
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
                                        <label for="example-text-input" class="col-form-label">Type Job New</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_type_job_new_name" class="col-form-label">น.ส.</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_type_job_new_details" class="col-form-label">นางสาว</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_type_job_new_status" class="col-form-label"></label>
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
    var tableTypeJobNew = $('#tableTypeJobNew').dataTable({
        "ajax": {
            "url": url_gb+"/admin/TypeJobNew/Lists",
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
            },            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
            {"data" : "type_job_new_name" , "class":"text-center"},
            {"data" : "type_job_new_details" , "class":"text-center" , "searchable": false, "sortable": false,},

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
        $('#ModalAdd').modal('show');
    });

    $('body').on('click','.btn-edit',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/TypeJobNew/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          $("#edit_type_job_new_name").val(data.type_job_new_name);
          $("#edit_type_job_new_details").val(data.type_job_new_details);
          if(data.type_job_new_status == 1){
              $('#edit_type_job_new_status').prop('checked', true);
          }else{
              $('#edit_type_job_new_status').prop('checked', false);
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
            url: url_gb+"/admin/TypeJobNew/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if(data.type_job_new_status == 1){
                status = "Active";
            }else{
                status = "No Active";
            }
            $('#show_type_job_new_name').text(data.type_job_new_name);
            $('#show_type_job_new_details').text(data.type_job_new_details);
            $('#show_type_job_new_status').text(status);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/TypeJobNew/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableTypeJobNew.api().ajax.reload();
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
            url: url_gb+"/admin/TypeJobNew",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableTypeJobNew.api().ajax.reload();
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
            url: url_gb+"/admin/TypeJobNew/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableTypeJobNew.api().ajax.reload();
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
