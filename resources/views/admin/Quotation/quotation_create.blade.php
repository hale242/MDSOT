@extends('layouts.layout')@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="FormAdd" class="needs-validation" novalidate>
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="admin_id">Sales</label>
                                    <input type="text" class="form-control" value="{{$admin->first_name.' '.$admin->last_name}}" readonly />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quotation_status">Status</label>
                                    <select class="form-control custom-select select2" id="add_quotation_status" disabled>
                                        <option value="">----Select----</option>
                                        @foreach($Status as $key=>$val)
                                            <option value="{{$key}}" {{$key == 1 ? 'selected' : ''}}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-5 mb-3">
                                    <label for="quotation_date_doc">Creation date</label>
                                    <input type="date" class="form-control start_date" id="add_quotation_date_doc" name="quotation_date_doc" onchange="calculate_date(1,1)" required />
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="quotation_due_date_count">Number of due date</label>
                                    <input type="number" class="form-control date_amount" id="add_quotation_due_date_count" name="quotation_due_date_count" onchange="calculate_date(1,2)" required/>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="quotation_due_date">Due date</label>
                                    <input type="date" class="form-control end_date" id="add_quotation_due_date" name="quotation_due_date" onchange="calculate_date(1,3)" required/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="run_code_id">Quotation run number</label>
                                    <select class="form-control custom-select select2" id="add_run_code_id" name="run_code_id" required>
                                        <option value="">----Select----</option>
                                        @foreach($RunCodes as $val)
                                            <option value="{{$val->run_code_id}}">{{$val->run_code_code}} ({{$val->run_code_details}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quotation_full_code">Quotation full code</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quotation_acc_code">Account Code</label>
                                    <input type="text" class="form-control" id="add_quotation_acc_code" name="quotation_acc_code" readonly />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quotation_book_acc">Book</label>
                                    <input type="text" class="form-control" id="add_quotation_book_acc" name="quotation_book_acc" readonly />
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_id">Company</label>
                                    <select class="form-control custom-select select2 select_company_id" id="add_company_id" name="company_id" required>
                                        <option value="">----Select----</option>
                                        @foreach($Companies as $val)
                                            <option value="{{$val->company_id}}">{{$val->company_name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="customer_id">Contact info</label>
                                    <select class="form-control custom-select select2 select_customer_id" id="add_customer_id" name="customer_id">
                                        <option value="">----Select----</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_title">Title</label>
                                    <input type="text" class="form-control" id="add_quotation_title" name="quotation_title" required />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_condition">Condition</label>
                                    <textarea id="add_quotation_condition" name="quotation_condition" rows="8" data-sample="1" data-sample-short> </textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quotation_delivery_schedule">Deliverry Schedule</label>
                                    <textarea id="add_quotation_delivery_schedule" name="quotation_delivery_schedule" rows="8" data-sample="1" data-sample-short> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-submit-quotation-price-list"><i class="ti-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('modal')
@endsection
@section('scripts')
<script>
    CKEDITOR.replace('add_quotation_condition', {
        height: 150
    });
    CKEDITOR.replace('add_quotation_delivery_schedule', {
        height: 150
    });

    $('body').on('submit', '#FormAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        if(CKEDITOR!==undefined){
            for ( instance in CKEDITOR.instances ){
                CKEDITOR.instances[instance].updateElement();
            }
        }
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/Quotation",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal({
                    title: res.title,
                    text: res.content,
                    icon: 'success'
                }).then(() => {
                    window.location = url_gb+'/admin/Quotation/'+res.quotation_id+'/edit';
                });
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change', '.select_company_id', function(data) {
        var id = $(this).val();
        var ele = $(this).closest('.card-body');
        ele.find('.select_customer_id').html('');
        if(id){
            $.ajax({
              method: "GET",
              url: url_gb+"/admin/GetCustomerByCompany/"+id,
            }).done(function(res) {
              var html= '<option value="">----Select----</option>';
              $.each(res, function(k, v) {
                html += '<option value="'+v.customer_id+'">'+v.customer_name+'</option>';
              });
              ele.find('.select_customer_id').append(html);
            }).fail(function(res) {
              swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
            });
        }
    });

    function calculate_date(action , changed){
        var ele = (action === 1) ? $('#FormAdd') : $('#FormEdit');
        var start_date = new Date(ele.find('.start_date').val());
        var end_date = new Date(ele.find('.end_date').val());
        var date_amount = ele.find('.date_amount').val();
        if(start_date != ''){
            if(changed == 1){ // start date change
                ele.find('.end_date').val(formatDate(start_date.addDays(parseInt(date_amount))));
            }else if(changed == 2 && date_amount != ''){ // date amount change
                ele.find('.end_date').val(formatDate(start_date.addDays(parseInt(date_amount))));
            }else if(changed == 3 && end_date != '' && end_date >= start_date){ // end date change
                var diffTime = Math.abs(end_date-start_date);
                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                ele.find('.date_amount').val(diffDays);
            }
        }
    }

    Date.prototype.addDays = function(days) { // add days function
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }

    function formatDate(date) { // change format date to y-m-d function
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }
</script>
@endsection
