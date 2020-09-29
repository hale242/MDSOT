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
    <div class="col-md-12">
        <div class="material-card card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Driver profile report</h4>

                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="action-tables">
                            <a href="javascript:void(0)" class="checkbox-checkall" data-checked="no">
                                <span class="badge badge-info mr-2"><i class="ti-check"></i></span> Select All
                            </a>
                        </div>
                        <table class="table table-datatable-button mb-0 dataTables_wrapper no-footer">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center"></th>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">ชื่อ</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Date of birth</th>
                                    <th scope="col" class="text-center">Age</th>
                                    <th scope="col" class="text-center">Address</th>
                                    <th scope="col" class="text-center">Phone No.</th>
                                    <th scope="col" class="text-center">ID Card</th>
                                    <th scope="col" class="text-center">Position</th>
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
                                    <th>1</th>
                                    <td>สมชาย มุ่งมั่น</td>
                                    <td>Somchai Mungman</td>
                                    <td>11/12/1976</td>
                                    <td>40</td>
                                    <td>791 เบอร์รี่อพาร์ทเม้น 15/2 ซอยพระราม 9 แขวงบางกะปิ เขตห้วยขวาง กรุงเทพฯ</td>
                                    <td>082-265-9885</td>
                                    <td>0123456789012</td>
                                    <td>พนักงานขับรถส่วนกลาง</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation25" required>
                                            <label class="custom-control-label" for="customControlValidation25"></label>
                                        </div>
                                    </td>
                                    <th>2</th>
                                    <td>อนุวัฒน์ จันทกาล</td>
                                    <td>Anuwat Juntakan</td>
                                    <td>03/06/1980</td>
                                    <td>35</td>
                                    <td>112/94 แขวง... เขต... กทม. 1000</td>
                                    <td>098-864-5513</td>
                                    <td>0125485969644</td>
                                    <td>บริหารชาวไทย</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation25" required>
                                            <label class="custom-control-label" for="customControlValidation25"></label>
                                        </div>
                                    </td>
                                    <th>3</th>
                                    <td>ผดุง ด้วงคำ</td>
                                    <td>Padung duangkam</td>
                                    <td>16/07/1979</td>
                                    <td>36</td>
                                    <td>19/2 แขวง... เขต... กทม. 10000</td>
                                    <td>089-564-8854</td>
                                    <td>22598748546865</td>
                                    <td>ผู้บริหารชาวต่างชาติ</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation25" required>
                                            <label class="custom-control-label" for="customControlValidation25"></label>
                                        </div>
                                    </td>
                                    <th scope="row">4</th>
                                    <td>อัศนัย ภูมิวิศัย</td>
                                    <td>Atsanai Poomwisai</td>
                                    <td>23/02/1976</td>
                                    <td>40</td>
                                    <td>91/281 แขวง... เขต.... กทม. 10000</td>
                                    <td>084-941-2422</td>
                                    <td>8856876865963</td>
                                    <td>ผู้บริหารชาวต่างชาติ</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox-table" id="customControlValidation25" required>
                                            <label class="custom-control-label" for="customControlValidation25"></label>
                                        </div>
                                    </td>
                                    <th scope="row">5</th>
                                    <td>ภูวดล พัชรวิบูลย์</td>
                                    <td>Poowadon patcharawiboon</td>
                                    <td>23/02/1976</td>
                                    <td>40</td>
                                    <td>91/281 แขวง... เขต.... กทม. 10000</td>
                                    <td>084-941-2422</td>
                                    <td>8856876865963</td>
                                    <td>ผู้บริหารชาวต่างชาติ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
@endsection