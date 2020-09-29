@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_ole_company_id">ชื่อหน่วยงานเดิม</label>
                            <select class="form-control custom-select select2"  id="search_ole_company_id">
                                <option value="">----Select----</option>
                                @foreach($Companies as $val)
                                    <option value="{{$val->company_id}}">{{$val->company_name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_new_company_id">ชื่อหน่วยงานใหม่</label>
                            <select class="form-control custom-select select2"  id="search_new_company_id">
                                <option value="">----Select----</option>
                                @foreach($Companies as $val)
                                    <option value="{{$val->company_id}}">{{$val->company_name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_ole_driver_id">ชื่อ - สกุล พนักงานขับรถ (เดิม)</label>
                            <select class="form-control custom-select select2"  id="search_ole_driver_id">
                                <option value="">----Select----</option>
                                @foreach($Drivers as $val)
                                    <option value="{{$val->driver_id}}">{{$val->driver_name_th.' '.$val->driver_lastname_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_driver_id">ชื่อ</label>
                            <select class="form-control custom-select select2"  id="search_driver_id">
                                <option value="">----Select----</option>
                                @foreach($Drivers as $val)
                                    <option value="{{$val->driver_id}}">{{$val->driver_name_th.' '.$val->driver_lastname_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_driver_working_salary">เงินเดือน ตั้งแต่</label>
                            <input type="text" id="search_driver_working_salary_start" class="form-control price">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="search_driver_working_salary_to">ถึง</label>
                            <input type="text" id="search_driver_working_salary_end" class="form-control price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                <button type="button" class="btn btn-secondary clear-search btn-clear-search">Clear</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$MainMenus->menu_system_name}}</h4>
                    @if(App\Helper::CheckPermissionMenu('DriverWorking' , '2'))
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata btn-add">Add New</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="tableDriverWorking" class="table mb-0 no-footer table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="text-center">No</th>
                                <th scope="col" rowspan="2" class="text-center">ชื่อ</th>
                                <th scope="col" rowspan="2" class="text-center">Status</th>
                                <th scope="col" colspan="4" class="text-center">หน่วยงานเดิม</th>
                                <th scope="col" colspan="4" class="text-center">หน่วยงานใหม่</th>
                                <th scope="col" rowspan="2" class="text-center">Actions</th>
                            </tr>
                            <tr>
                                <th align="center">บริษัท</th>
                                <th align="center">เงินเดือน</th>
                                <th align="center">เลขที่สัญญาฝ่ายขาย</th>
                                <th align="center">วันที่โอนย้ายลงประจำ</th>
                                <th align="center">บริษัท</th>
                                <th align="center">เงินเดือน</th>
                                <th align="center">เลขที่สัญญาฝ่ายขาย</th>
                                <th align="center">วันที่โอนย้ายลงประจำ</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="card">
                <form id="FormAdd" class="needs-validation" novalidate>
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label for="driver_working_change_status">Status</label> <br />
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="driver_working_change_status1" name="driver_working_change_status" value="1" required>
                                            <label class="custom-control-label" for="driver_working_change_status1">Standby</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="driver_working_change_status2" name="driver_working_change_status" value="2" required>
                                            <label class="custom-control-label" for="driver_working_change_status2">Substitute</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="driver_working_change_status3" name="driver_working_change_status" value="3" required>
                                            <label class="custom-control-label" for="driver_working_change_status3">In Contract</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label for="add_driver_id">Driver</label>
                                    <select class="form-control custom-select select2" id="add_driver_id" name="driver_id" required>
                                        <option value="">----Select----</option>
                                    </select>
                                </div>
                            </div>
                            <hr />
                            <div id="DriverStandby" class="hidden">
                                <div class="form-group row">
                                    <div class="col-md-12 mb-3">
                                        <label for="driver_working_date_start">Days ready to work</label>
                                        <input type="date" class="form-control" name="standby[driver_working_date_start]">
                                    </div>
                                </div>
                            </div>
                            <div id="DriverSubstitute" class="hidden form-input">
                                <div class="form-group row">
                                    <div class="col-md-12 mb-3">
                                        <label for="customer_contract_full_code">Contract ID</label>
                                        <select class="form-control custom-select select2 select_customer_contract"  name="substitute[customer_contract_id]">
                                            <option value="">----Select----</option>
                                            @foreach($CustomerContracts as $val)
                                                <option value="{{$val->customer_contract_id}}">{{$val->customer_contract_full_code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="driver_id">Driver to be substituted</label>
                                        <select class="form-control custom-select select2 select_ole_driver"  name="substitute[driver_working_id]">
                                            <option value="">----Select----</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="driver_working_date_start">Date form</label>
                                        <input type="date" class="form-control" name="substitute[driver_working_date_start]">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="driver_working_date_end">To</label>
                                        <input type="date" class="form-control" name="substitute[driver_working_date_end]">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="driver_working_comment">Comment</label>
                                        <textarea class="form-control" id="add_driver_working_comment" name="substitute[driver_working_comment]" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="DriverContract" class="hidden form-input">
                                <div class="form-group row">
                                    <div class="col-md-12 mb-3">
                                        <label for="customer_contract_full_code">Contract ID</label>
                                        <select class="form-control custom-select select2 select_customer_contract"  name="in_contract[customer_contract_id]">
                                            <option value="">----Select----</option>
                                            @foreach($CustomerContracts as $val)
                                                <option value="{{$val->customer_contract_id}}">{{$val->customer_contract_full_code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="driver_working_change_status">Select position driver from Backlog</label> <br />
                                        <select class="form-control custom-select select2 select_ole_driver"  name="in_contract[driver_working_id]">
                                            <option value="">----Select----</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3"><br>
                                        <label for="driver_working_date_start">Date form</label>
                                        <input type="date" class="form-control" name="in_contract[driver_working_date_start]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group mt-12 row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="250">ชื่อ</td>
                                    <td id="show_driver_name"></td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="4">หน่วยงานเดิม</td>
                                    <td>บริษัท : <span id="show_ole_company_name"></span></td>
                                </tr>
                                <tr>
                                    <td>เงินเดือน : <span id="show_driver_working_ole_salary"></span></td>
                                </tr>
                                <tr>
                                    <td>เลขที่สัญญาฝ่ายขาย : <span id="show_ole_customer_contract_full_code"></span></td>
                                </tr>
                                <tr>
                                    <td>วันที่โอนย้ายลงประจำ : <span id="show_ole_date"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="4">หน่วยงานใหม่</td>
                                    <td>บริษัท :  <span id="show_new_company_name"></span></td>
                                </tr>
                                <tr>
                                    <td>เงินเดือน :  <span id="show_driver_working_new_salary"></span></td>
                                </tr>
                                <tr>
                                    <td>เลขที่สัญญาฝ่ายขาย :  <span id="show_new_customer_contract_full_code"></span></td>
                                </tr>
                                <tr>
                                    <td>วันที่โอนย้ายลงประจำ :  <span id="show_new_date"></span></td>
                                </tr>
                                <tr>
                                    <td>หมายเหตุ</td>
                                    <td id="show_driver_working_comment"></td>
                                </tr>
                            </table>
                            <table class="table table-bordered" id="show_staff_cost">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    var tableDriverWorking = $('#tableDriverWorking').dataTable({
        "ajax": {
            "url": url_gb + "/admin/DriverWorking/Lists",
            "type": "POST",
            "data": function(d) {
                d.ole_company_id = $('#search_ole_company_id').val();
                d.new_company_id = $('#search_new_company_id').val();
                d.ole_driver_id = $('#search_ole_driver_id').val();
                d.driver_id = $('#search_driver_id').val();
                d.driver_working_salary_start = $('#search_driver_working_salary_start').val();
                d.driver_working_salary_end = $('#search_driver_working_salary_end').val();
            }
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $(".change-status").bootstrapToggle();
        },
        "retrieve": true,
        "columns": [
            {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
            {"data" : "driver_name", "name":"driver.driver_name_th"},
            {"data" : "driver_working_change_status", "searchable": false, "sortable": false},
            {"data" : "company_name_th_ole", "name":"company_ole.company_name_th"},
            {"data" : "driver_working_ole_salary", "class":"text-right", "sortable": false},
            {"data" : "customer_contract_full_code_ole","name":"customer_contract_ole.customer_contract_full_code"},
            {"data" : "date_ole", "class":"text-center" , "searchable": false, "sortable": false},
            {"data" : "company_name_th_new", "name":"company_new.company_name_th"},
            {"data" : "driver_working_salary", "class":"text-right", "sortable": false},
            {"data" : "customer_contract_full_code_new", "name":"customer_contract_new.customer_contract_full_code"},
            {"data" : "date_new", "class":"text-center" , "searchable": false, "sortable": false},
            {
                "data" : "action" ,
                "name" : "action",
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

    $('body').on('click', '.btn-search', function(data) {
        tableDriverWorking.api().ajax.reload();
    });

    $('body').on('click', '.btn-clear-search', function(data) {
        $('#search_ole_company_id').val('').change();
        $('#search_new_company_id').val('').change();
        $('#search_ole_driver_id').val('').change();
        $('#search_driver_id').val('').change();
        $('#search_driver_working_salary_start').val('');
        $('#search_driver_working_salary_end').val('');
        tableDriverWorking.api().ajax.reload();
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-add', function(data) {
        $('#ModalAdd').modal('show');
    });

    $('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#show_staff_cost').html('');
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/DriverWorking/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var driver_name = data.driver ? data.driver.driver_name_th+' '+data.driver.driver_lastname_th : '';
            var ole_company_name = data.company_ole ? data.company_ole.company_name_th : '';
            var new_company_name = data.company_new ? data.company_new.company_name_th : '';
            var ole_salary = data.driver_working_ole_salary ? data.driver_working_ole_salary : 0;
            var new_salary = data.driver_working_salary ? data.driver_working_salary : 0;
            var ole_customer_contract_full_code = data.customer_contract_ole ? data.customer_contract_ole.customer_contract_full_code : '';
            var new_customer_contract_full_code = data.customer_contract_new ? data.customer_contract_new.customer_contract_full_code : '';
            var taxi_price = data.quotation_price_list ? data.quotation_price_list.quotation_price_list_taxi_price_sale : 0;
            var taxi_travel_allowances = data.quotation_price_list ? data.quotation_price_list.quotation_price_list_travel_sale : 0;
            var accomadation = data.quotation_price_list ? data.quotation_price_list.quotation_price_list_accomadation_sale : 0;
            $('#show_driver_name').text(driver_name);
            $('#show_ole_company_name').text(ole_company_name);
            $('#show_driver_working_ole_salary').text(addNumformat(ole_salary.toFixed(2)));
            $('#show_ole_customer_contract_full_code').text(ole_customer_contract_full_code);
            $('#show_ole_date').text(data.format_driver_working_date_start);
            $('#show_new_company_name').text(new_company_name);
            $('#show_driver_working_new_salary').text(addNumformat(new_salary.toFixed(2)));
            $('#show_new_customer_contract_full_code').text(new_customer_contract_full_code);
            $('#show_new_date').text(data.format_created_at);
            $('#show_driver_working_comment').text(data.driver_working_comment);

            var html = '<tr>\
                            <td>Taxi Price</td>\
                            <td>'+addNumformat(taxi_price.toFixed(2))+'</td>\
                        </tr>\
                        <tr>\
                            <td>Taxi Travel allowances</td>\
                            <td>'+addNumformat(taxi_travel_allowances.toFixed(2))+'</td>\
                        </tr>\
                        <tr>\
                            <td>Accomadation</td>\
                            <td>'+addNumformat(accomadation.toFixed(2))+'</td>\
                        </tr>';
            $.each(data.quotation_price_list.quotation_price_list_staff_expense, function(k,v){
                var name = v.staff_cost ? v.staff_cost.staff_expenses_name : '';
                var price = v.quotation_price_list_price ? v.quotation_price_list_price : 0;
                html += '<tr>\
                            <td>'+name+'</td>\
                            <td>'+addNumformat(price.toFixed(2))+'</td>\
                        </tr>';
            });
            $('#show_staff_cost').append(html);
            $('#ModalView').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', 'input[type=radio][name=driver_working_change_status]', function(data) {
        var status = $(this).val();
        $('#add_driver_id').html('');
        var html = '<option value="">----Select----</option>';
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/GetDriverWorkingByStatus/" + status,
        }).done(function(res) {
            $.each(res, function(k, v) {
              html += '<option value="'+v.driver_id+'">'+v.driver_name_th+' '+v.driver_lastname_th+'</option>';
            });
            $('#add_driver_id').append(html);
            if(status == 1){
                $('#DriverStandby').removeClass('hidden');
                $('#DriverSubstitute').addClass('hidden');
                $('#DriverContract').addClass('hidden');
            }else if(status == 2){
                $('#DriverStandby').addClass('hidden');
                $('#DriverSubstitute').removeClass('hidden');
                $('#DriverContract').addClass('hidden');
            }else if(status == 3){
                $('#DriverStandby').addClass('hidden');
                $('#DriverSubstitute').addClass('hidden');
                $('#DriverContract').removeClass('hidden');
            }
        }).fail(function(res) {
          resetButton(form.find('button[type=submit]'));
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.select_customer_contract', function(data) {
        var id = $(this).val();
        var ele = $(this).closest('.form-input');
        ele.find('.select_ole_driver').html('');
        var html = '<option value="">----Select----</option>';
        if(id){
            $.ajax({
              method: "GET",
              url: url_gb + "/admin/GetDriverWorkingByCustomerContract/" + id,
              data: {
                id: id
              }
            }).done(function(res) {
              $.each(res, function(k, v) {
                var name = v.driver ? v.driver.driver_name_th+' '+v.driver.driver_lastname_th : '';
                html += '<option value="'+v.driver_working_id+'">'+name+'</option>';
              });
              ele.find('.select_ole_driver').append(html);
            }).fail(function(res) {
              resetButton(form.find('button[type=submit]'));
              swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
            });
        }
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/DriverWorking",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_driver_id').val('').change();
                $('.select_customer_contract').val('').change();
                $('.select_ole_driver').val('').change();
                tableDriverWorking.api().ajax.reload();
                $('#ModalAdd').modal('hide');
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
