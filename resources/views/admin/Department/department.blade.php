@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Inverse Table</h4>
                    @if(App\Helper::CheckPermissionMenu('Department' , '2'))
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
                    <table id="tableDepartment" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Name Prefix</th>
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
                                    <label for="add_department_name">Name Department</label>
                                    <input type="text" class="form-control" id="add_department_name" name="department_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="add_department_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_department_details" name="department_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="add_department_status" name="department_status" value="1">
                                        <label class="custom-control-label" for="add_department_status">Action</label>
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
                                    <label for="edit_department_name">Name Department</label>
                                    <input type="text" class="form-control" id="edit_department_name" name="department_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="edit_department_details">Details</label>
                                    <textarea cols="80" class="form-control" id="edit_department_details" name="department_details" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Check-Box">Status</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_department_status" name="department_status" value="1">
                                        <label class="custom-control-label" for="edit_department_status">Action</label>
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
                                        <label for="example-text-input" class="col-form-label">Name Prefix</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_department_name" class="col-form-label">น.ส.</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Details</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_department_details" class="col-form-label">นางสาว</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">
                                        <label for="example-text-input" class="col-form-label">Status</label>
                                    </td>
                                    <td>
                                        <label for="example-text-input" id="show_department_status" class="col-form-label"></label>
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

<div class="modal fade" id="ModalPermission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Permission</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
          </div>
          <form id="FormPremission">
              <input type="hidden" id="department_id">
              <div class="card">
                  <div class="form-body">
                      <div class="card-body">
                          <div class="form-row">
                              <div class="col-lg-3 col-xl-3">
                                  <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                                      @foreach($GroupLevels as $key=>$val)
                                          <a class="nav-link change-group-lavel {{$key == 0 ? 'active' : ''}}" data-toggle="pill" href="#v-pills-manager-{{$val->admin_user_group_id}}" data-id="{{$val->admin_user_group_id}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$val->admin_user_group_name}}</a>
                                      @endforeach
                                  </div>
                              </div>
                              <div class="col-lg-9 col-xl-9">
                                  <div class="tab-content p-4">
                                      @foreach($GroupLevels as $key=>$val)
                                          <input type="hidden" name="group_level[{{$val->admin_user_group_id}}]">
                                          <div class="tab-pane fade {{$key == 0 ? 'show active' : ''}}" id="v-pills-manager-{{$val->admin_user_group_id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">.
                                              <table class="table mb-0 dataTables_wrapper no-footer">
                                                  <thead>
                                                      <tr>
                                                          <th scope="col">Menu</th>
                                                          <th scope="col">All</th>
                                                          <th scope="col">View</th>
                                                          <th scope="col">Add</th>
                                                          <th scope="col">Edit</th>
                                                          <th scope="col">Delete</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      @foreach($PermisstionMenus as $main_val)
                                                          <tr>
                                                              <td>{{$main_val->menu_system_name}}</td>
                                                              <td>
                                                                  <div class="custom-control custom-checkbox">
                                                                      <input type="checkbox" class="custom-control-input checkbox-table check-all" data-id="{{$main_val->menu_system_id}}" id="main_all_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}">
                                                                      <label class="custom-control-label" for="main_all_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}"></label>
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="custom-control custom-checkbox">
                                                                      <input type="checkbox" class="custom-control-input checkbox-table check-item" name="group_level[{{$val->admin_user_group_id}}][{{$main_val->menu_system_id}}][view]" id="menu_view_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}" value="1">
                                                                      <label class="custom-control-label" for="menu_view_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}"></label>
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="custom-control custom-checkbox">
                                                                      <input type="checkbox" class="custom-control-input checkbox-table check-item" name="group_level[{{$val->admin_user_group_id}}][{{$main_val->menu_system_id}}][add]" id="menu_add_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}" value="2">
                                                                      <label class="custom-control-label" for="menu_add_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}"></label>
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="custom-control custom-checkbox">
                                                                      <input type="checkbox" class="custom-control-input checkbox-table check-item" name="group_level[{{$val->admin_user_group_id}}][{{$main_val->menu_system_id}}][edit]" id="menu_edit_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}" value="3">
                                                                      <label class="custom-control-label" for="menu_edit_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}"></label>
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="custom-control custom-checkbox">
                                                                      <input type="checkbox" class="custom-control-input checkbox-table check-item" name="group_level[{{$val->admin_user_group_id}}][{{$main_val->menu_system_id}}][delete]" id="menu_delete_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}" value="4">
                                                                      <label class="custom-control-label" for="menu_delete_{{$val->admin_user_group_id}}_{{$main_val->menu_system_id}}"></label>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          @foreach($main_val->SubMenu as $sub_val)
                                                              <tr>
                                                                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="mdi mdi-checkbox-blank-circle" style="font-size: 8px;"></i> {{$sub_val->menu_system_name}}</td>
                                                                  <td>
                                                                      <div class="custom-control custom-checkbox">
                                                                          <input type="checkbox" class="custom-control-input checkbox-table check-all" id="sub_all_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}">
                                                                          <label class="custom-control-label" for="sub_all_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}"></label>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <div class="custom-control custom-checkbox">
                                                                          <input type="checkbox" class="custom-control-input checkbox-table check-item" name="group_level[{{$val->admin_user_group_id}}][{{$sub_val->menu_system_id}}][view]" id="menu_view_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}" value="1">
                                                                          <label class="custom-control-label" for="menu_view_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}"></label>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <div class="custom-control custom-checkbox">
                                                                          <input type="checkbox" class="custom-control-input checkbox-table check-item" name="group_level[{{$val->admin_user_group_id}}][{{$sub_val->menu_system_id}}][add]" id="menu_add_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}" value="2">
                                                                          <label class="custom-control-label" for="menu_add_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}"></label>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <div class="custom-control custom-checkbox">
                                                                          <input type="checkbox" class="custom-control-input checkbox-table check-item" name="group_level[{{$val->admin_user_group_id}}][{{$sub_val->menu_system_id}}][edit]" id="menu_edit_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}" value="3">
                                                                          <label class="custom-control-label" for="menu_edit_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}"></label>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <div class="custom-control custom-checkbox">
                                                                          <input type="checkbox" class="custom-control-input checkbox-table check-item" name="group_level[{{$val->admin_user_group_id}}][{{$sub_val->menu_system_id}}][delete]" id="menu_delete_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}" value="4">
                                                                          <label class="custom-control-label" for="menu_delete_{{$val->admin_user_group_id}}_{{$sub_val->menu_system_id}}"></label>
                                                                      </div>
                                                                  </td>
                                                              </tr>
                                                          @endforeach
                                                      @endforeach
                                                  </tbody>
                                              </table>
                                          </div>
                                      @endforeach
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
@endsection
@section('scripts')
<script>
    var tableDepartment = $('#tableDepartment').dataTable({
        "ajax": {
            "url": url_gb+"/admin/Department/Lists",
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
            {"data" : "department_name" , "class":"text-center"},
            {"data" : "department_details" , "class":"text-center" , "searchable": false, "sortable": false,},
            
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
          url: url_gb+"/admin/Department/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          $("#edit_department_name").val(data.department_name);
          $("#edit_department_details").val(data.department_details);
          if(data.department_status == 1){
              $('#edit_department_status').prop('checked', true);
          }else{
              $('#edit_department_status').prop('checked', false);
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
            url: url_gb+"/admin/Department/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            if(data.department_status == 1){
                status = "Active";
            }else{
                status = "No Active";
            }
            $('#show_department_name').text(data.department_name);
            $('#show_department_details').text(data.department_details);
            $('#show_department_status').text(status);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click','.btn-permission',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#department_id').val(id);
        $('.check-all').prop('checked', false)
        $('.check-item').prop('checked', false)
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/Department/"+id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var permission = res.content ? res.content.permission_action_by_group : '';
            $.each(permission, function(k,v){
                if(v.permission_action_by_group_code_action == 1){
                    if(v.permission_action_by_group_status == 1){
                        $('#menu_view_'+v.admin_user_group_id+'_'+v.menu_system_id).prop('checked', true);
                    }else{
                        $('#menu_view_'+v.admin_user_group_id+'_'+v.menu_system_id).prop('checked', false);
                    }
                }else if(v.permission_action_by_group_code_action == 2){
                    if(v.permission_action_by_group_status == 1){
                        $('#menu_add_'+v.admin_user_group_id+'_'+v.menu_system_id).prop('checked', true);
                    }else{
                        $('#menu_add_'+v.admin_user_group_id+'_'+v.menu_system_id).prop('checked', false);
                    }
                }else if(v.permission_action_by_group_code_action == 3){
                    if(v.permission_action_by_group_status == 1){
                        $('#menu_edit_'+v.admin_user_group_id+'_'+v.menu_system_id).prop('checked', true);
                    }else{
                        $('#menu_edit_'+v.admin_user_group_id+'_'+v.menu_system_id).prop('checked', false);
                    }
                }else if(v.permission_action_by_group_code_action == 4){
                    if(v.permission_action_by_group_status == 1){
                        $('#menu_delete_'+v.admin_user_group_id+'_'+v.menu_system_id).prop('checked', true);
                    }else{
                        $('#menu_delete_'+v.admin_user_group_id+'_'+v.menu_system_id).prop('checked', false);
                    }
                }
            });
            $('#ModalPermission').modal('show');
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
            url: url_gb+"/admin/Department/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableDepartment.api().ajax.reload();
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
            url: url_gb+"/admin/Department",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableDepartment.api().ajax.reload();
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
            url: url_gb+"/admin/Department/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                tableDepartment.api().ajax.reload();
                $('#ModalEdit').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormPremission', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#department_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/Department/SetPremission/"+id,
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                tableDepartment.api().ajax.reload();
                swal(res.title, res.content, 'success');
                $('#ModalPermission').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.check-all', function(){
        var id = $(this).val();
        var ele = $(this).closest('tr').find('.check-item');
        if($(this).is(':checked')){
            ele.prop('checked', true);
        }else{
            ele.prop('checked', false);
        }
    });
</script>
@endsection
