@extends('layouts.layout2')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search</h4>
                <div class="row pt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Topic of training</label>
                            <input type="text" id="course_content_name" name="course_content_name" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Company name</label>
                            <input type="text" id="course_content_company_name" name="course_content_company_name" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input type="date" id="course_content_date" name="course_content_date" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Time start</label>
                            <input type="time" id="course_content_time_start" name="course_content_time_start" class="form-control search_table" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Time end</label>
                            <input type="time" id="course_content_time_end" name="course_content_time_end" class="form-control search_table" placeholder="">
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
                    <h4 class="card-title">Course content</h4>
                    <button type="button" class="btn btn-primary btn-rounded m-t-10 mb-2 float-right newdata" data-toggle="modal" data-target="#productModal" data-product_id="0">Add New</button>
                </div>
                <div class="table-responsive">
                    <div class="action-tables">
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
                    </div>
                    <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">No</th>
                                <th scope="col">Topic of training</th>
                                <th scope="col">Details</th>
                                <th scope="col">Address</th>
                                <th scope="col">Company name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time start</th>
                                <th scope="col">Time end</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation25" required>
                                        <label class="custom-control-label" for="customControlValidation25"></label>
                                    </div>
                                </td>
                                <th scope="row">1</th>
                                <td>Topic of training</td>
                                <td>Details</td>
                                <td>Address</td>
                                <td>Company name</td>
                                <td>Date</td>
                                <td>Time start</td>
                                <td>Time end</td>
                                <td>Status</td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#productviewModal" data-product_id="0">
                                        View
                                    </button>
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#productModal" data-product_id="0">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#ContentListModal" data-product_id="0">
                                        Content list
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2"></label>
                                    </div>
                                </td>
                                <th scope="row">2</th>
                                <td>Topic of training</td>
                                <td>Details</td>
                                <td>Address</td>
                                <td>Company name</td>
                                <td>Date</td>
                                <td>Time start</td>
                                <td>Time end</td>
                                <td>Status</td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#productviewModal" data-product_id="0">
                                        View
                                    </button>
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#productModal" data-product_id="0">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3"></label>
                                    </div>
                                </td>
                                <th scope="row">3</th>
                                <td>Topic of training</td>
                                <td>Details</td>
                                <td>Address</td>
                                <td>Company name</td>
                                <td>Date</td>
                                <td>Time start</td>
                                <td>Time end</td>
                                <td>Status</td>
                                <td>
                                    <input type="checkbox" class="toggle" checked data-toggle="toggle" data-style="ios" data-on="On" data-off="Off">
                                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#productviewModal" data-product_id="0">
                                        View
                                    </button>
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#productModal" data-product_id="0">
                                        Edit
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
<div class="modal fade" id="ContentListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Content list</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <form action="#" class="needs-validation" novalidate>
                <div class="card">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_name">Lecturer name</label>
                                    <input type="text" class="form-control" id="add_course_content_list_name" name="course_content_list_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_course_content_list_details" name="course_content_list_details" rows="5"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_time_start">Time start</label>
                                    <input type="time" class="form-control" id="add_course_content_list_time_start" name="course_content_list_time_start" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_time_end">Time end</label>
                                    <input type="time" class="form-control" id="add_course_content_list_time_end" name="course_content_list_time_end" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_time_end">Order of training</label>
                                    <input type="number" min="1" class="form-control" id="add_course_content_list_z_index" name="course_content_list_z_index" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="checkbox">Status</label>
                                    <div class="custom-control custom-checkbox checkbox-inline">
                                        <input type="checkbox" class="custom-control-input" id="add_course_content_list_status" name="course_content_list_status" checked>
                                        <label class="custom-control-label" for="add_course_content_list_status">Active</label>
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
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
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
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_name">Topic of training</label>
                                    <input type="text" class="form-control" id="add_course_content_name" name="course_content_name" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_details">Details</label>
                                    <textarea cols="80" class="form-control" id="add_course_content_details" name="course_content_details" rows="5"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_address">Address</label>
                                    <textarea cols="80" class="form-control" id="add_course_content_address" name="course_content_address" required rows="5"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_company_name">Company name</label>
                                    <input type="text" class="form-control" id="add_course_content_company_name" name="course_content_company_name" placeholder="" value="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_date">Date</label>
                                    <input type="date" class="form-control" id="add_course_content_date" name="course_content_date" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_time_start">Time start</label>
                                    <input type="time" class="form-control" id="add_course_content_time_start" name="course_content_time_start" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="course_content_time_end">Time end</label>
                                    <input type="time" class="form-control" id="add_course_content_time_end" name="course_content_time_end" placeholder="" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="radio">Status</label> <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio radio-inline">
                                            <input type="radio" class="custom-control-input" id="add_course_content_status1" name="course_content_status">
                                            <label class="custom-control-label" for="add_course_content_status1">Start training</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio radio-inline">
                                            <input type="radio" class="custom-control-input" id="add_course_content_status2" name="course_content_status">
                                            <label class="custom-control-label" for="add_course_content_status2">Finished training</label>
                                        </div>
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
<div class="modal fade" id="productviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelview">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close"></i></span></button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="35%"> <label for="example-text-input" class="col-form-label">Topic of training</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">พัฒนาพนักงานขับรถมืออาชีพ (Professional Driver Development Course)</label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">Details</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">พนักงานขับรถผู้บริหารที่มีคุณภาพถือเป็นทรัพยากรที่มีคุณค่า จำเป็นที่จะต้องได้รับการฝึกอบรมให้มีความรู้และทักษะที่จำเป็นอย่างต่อเนื่อง เพื่อให้มั่นใจได้ว่าพนักงานจะสามารถปฏิบัติงานได้อย่างมีประสิทธิภาพ เพราะความผิดพลาดของพนักงานอาจหมายถึงความมั่นคงของหน่วยงานหรือองค์กร</label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">Address</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">Address</label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">Company name</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">สถาบันพัฒนาทรัพยากรมนุษย์และองค์กร</label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">Date</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">01/06/2563</label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">Time start</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">09:00 น.</label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">Time end</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">16:00 น.</label> </td>
                            </tr>
                            <tr>
                                <td> <label for="example-text-input" class="col-form-label">Status</label> </td>
                                <td> <label for="example-text-input" class="col-form-label">Active</label> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection