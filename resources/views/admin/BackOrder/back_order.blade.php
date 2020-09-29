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
                            <label class="control-label">Confirmation code</label>
                            <input type="text" id="quotation_full_code" name="quotation_full_code" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Company</label>
                            <select name="company_id" id="company_id" class="select2 form-control custom-select search_table_select">
                                <option value="">----Select-----</option>
                                @foreach ($company as $company)
                                    <option value="{{$company->company_id}}">{{$company->company_name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Units</label>
                            <input type="number" id="back_order_unit" name="back_order_unit" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Sales</label>
                            <select class="form-control custom-select search_table_select" name="admin_id" id="admin_id" data-placeholder="" tabindex="1">
                                <option value="">----Select-----</option>
                                @foreach($adminuser as $admin)
                                    <option value="{{$admin->admin_id}}">{{$admin->first_name." ".$admin->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Province</label>
                            <select class="select2 form-control custom-select search_table_select" style="height: 36px;width: 100%;" name="province_name" id="search_province_name" data-placeholder="">
                                <option value="">----Select----</option>
                                @foreach($province as $provi)
                                    <option value="{{$provi->provinces_id}}">{{$provi->provinces_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Area</label>
                            <select class="select2 form-control custom-select search_table_select" style="height: 36px;width: 100%;" name="sale_team_sub_name" id="search_sale_team_sub_name" data-placeholder="">
                                <option value="">----Select----</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Position of driver</label>
                            <input type="text" class="form-control" id="position_id" name="position_id">
                            {{-- <select class="select2 form-control custom-select search_table_select" name="position_id" id="position_id" data-placeholder="" tabindex="1">
                                <option value="">----Select----</option>
                                @foreach($requirement as $itemx)
                                    <option value="{{$itemx->recruitment_position_name}}">{{$itemx->recruitment_position_name}}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-search"><i class="ti-search"></i> Search</button>
                <button type="reset" class="btn btn-secondary clear-search">Clear</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Backlog</h4>

                </div>
                <div class="table-responsive">
                    <table id="tableBackOrder" class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90px;">Actions</th>
                                <th scope="col">No</th>
                                <th scope="col">Type</th>
                                <th scope="col">Qoutation</th>
                                <th scope="col">Company</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Units</th>
                                <th scope="col">Sales</th>
                                <th scope="col">Area</th>
                                <th scope="col">Qualification Requirement</th>
                                <th scope="col">Driver's Salary & Revenue Pack</th>
                                <th scope="col">OT Estimates</th>
                                <th scope="col">Sales confirmed</th>
                                <th scope="col">OPT</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.BackOrder.Modal.modal_content')

<div class="modal fade" id="FixSpecModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content FixSpecModalShow"></div>
    </div>
</div>

<div class="modal fade" id="MatchingDriverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1051;">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content MatchingDriverModalShow"></div>
    </div>
</div>

<div class="modal fade" id="EditSpecModal" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1051;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content EditSpecModalShow"></div>
    </div>
</div>

<div class="modal fade" id="ViewSpecModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1051;">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content ViewSpecModalShow"></div>
    </div>
</div>

<div class="modal fade" id="WaitIntervieModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1051;">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content WaitIntervieModalShow"></div>
    </div>
</div>

<div class="modal fade" id="NotPassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1051;">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content NotPassModalShow"></div>
    </div>
</div>


@endsection


@section('scripts')
<script>
    var tableBackOrder = $('#tableBackOrder').dataTable({
            "ajax": {
            "type":"POST",
            "data" : function(d){
                d.quotation_full_code = $('#quotation_full_code').val();
                d.company_id = $('#company_id').val();
                d.back_order_unit = $('#back_order_unit').val();
                d.admin_id = $('#admin_id').val();
                d.province_id = $('#search_province_name').val();
                d.area_id = $('#search_sale_team_sub_name').val();
                d.position_id = $('#position_id').val();
                },
            "url": url_gb + "/admin/BackOrder/Lists"
            },
            "drawCallback": function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": false,
            "columns": [
                {"data" : "action" , "class":"text-center"},
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "type" , "class": "text-left" , "searchable": true, "sortable": true},
                {"data" : "quotation" , "class": "text-left" , "searchable": true, "sortable": true},
                {"data" : "company" , "class": "text-left"},
                {"data" : "customer" , "class": "text-left"},
                {"data" : "units" , "class": "text-left"},
                {"data" : "sales" , "class": "text-left"},
                {"data" : "area" , "class": "text-left"},
                {"data" : "requirement" , "class": "text-left" , "searchable": true, "sortable": true},
                {"data" : "driver" , "class": "text-left" , "searchable": true, "sortable": true},
                {"data" : "ot" , "class": "text-left"},
                {"data" : "sales_confirm" , "class": "text-left"},
                {"data" : "opt" , "class": "text-left"},
                {"data" : "status" , "class": "text-center"},
            ],
            "select": true,
            "dom": 'Bfrtip',
            "lengthMenu": [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "columnDefs": [{
                className: 'noVis',
                visible: false
            }],
            "order": [[ 0, "asc" ]],
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
            serverSide: true
    });

    $('body').on('click', '.btn-search', function(data) {
        tableBackOrder.api().ajax.reload();
    });

    $('body').on('click', '.clear-search', function(data) {
        $('#company_id').val(null).trigger('change');
        $('#search_sale_team_sub_name').val(null).trigger('change');
        $('#admin_id').val(null).trigger('change');
        $('#search_province_name').val(null).trigger('change');
        $('#position_id').val(null).trigger('change');

        tableBackOrder.api().ajax.reload();
    });

    $('#search_province_name').change(function(){
        var provid = $('#search_province_name').val();
        // console.log(provid);
        if(provid!=''){

            $.post(url_gb+'/admin/BackOrderSpec/Getarea',{id:provid, _token: $('meta[name="csrf-token"]').attr('content')}, function(data){
                $('#search_sale_team_sub_name').html('');
                $('#search_sale_team_sub_name').append('<option value="">----Select Area----</option>');
                $.each(data, function(index, item){
                    $('#search_sale_team_sub_name').append('<option value="'+item.districts_id+'">'+item.districts_name+'</option>');
                });
            });

        }else{

            $('#search_sale_team_sub_name').html('<option value="">----Select Area----</option>');

        }

    });

</script>

@include('admin.BackOrder.Script.script_backorder_action')

@endsection
