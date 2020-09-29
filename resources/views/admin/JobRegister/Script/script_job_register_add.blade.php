<script>
    $('body').on('click', '.btn-add', function(data) {
        $('#ModalAdd').modal('show');
    });

    var id_count = 0;
    var id_count_work = 0;
    var id_training = 0;
    var id_driver_language = 0;
    var id_type_doc_driver = $('#add_type_doc_driver_fix').find('tr').length;
    var id_driver_reference = 0;
    var id_driver_emergency_contacts = 0;
    $("#add_productviewModal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var recipient = button.data("product_id");
        var modal = $(this);
    })

    $("#add_plus_driver_emergency_contacts").on("click", function(event) {
        text_table = '<tr id="add_driver_emergency_contacts_' + id_driver_emergency_contacts + '">';
        text_table += '	<td><input type="text" class="form-control" name="driver_emergency_contacts[' + id_driver_emergency_contacts + '][driver_emergency_contacts_name]" ></td>';
        text_table += '	<td><input type="text" class="form-control" name="driver_emergency_contacts[' + id_driver_emergency_contacts + '][driver_emergency_contacts_lastname]" ></td>';
        text_table += '	<td><input type="text" class="form-control" name="driver_emergency_contacts[' + id_driver_emergency_contacts + '][driver_emergency_contacts_relationship]" ></td>';
        text_table += '	<td><input type="text" class="form-control" name="driver_emergency_contacts[' + id_driver_emergency_contacts + '][driver_emergency_contacts_phone]" ></td>';
        text_table += '	<td><textarea cols="" class="form-control" name="driver_emergency_contacts[' + id_driver_emergency_contacts + '][driver_emergency_contacts_address]"  rows="1"></textarea></td>';
        text_table += '		<td>';
        text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_emergency_contact(\'' + id_driver_emergency_contacts + '\');" href="javascript:void(0)">';
        text_table += '				<i class="mdi mdi-minus"></i>';
        text_table += '			</a>';
        text_table += '		</td>';
        text_table += '	</tr>';
        id_driver_emergency_contacts++;
        $("#add_driver_emergency_contacts").append(text_table);
    });

    $("#add_plus_driver_reference").on("click", function(event) {
        text_table = '<tr id="add_driver_reference_' + id_driver_reference + '">';
        text_table += '		<td><input type="text" class="form-control" name="driver_reference[' + id_driver_reference + '][driver_reference_name]" ></td>';
        text_table += '		<td><input type="text" class="form-control" name="driver_reference[' + id_driver_reference + '][driver_reference_lastname]" ></td>';
        text_table += '		<td><input type="text" class="form-control" name="driver_reference[' + id_driver_reference + '][driver_reference_relationship]" ></td>';
        text_table += '		<td><input type="text" class="form-control" name="driver_reference[' + id_driver_reference + '][driver_reference_company]" ></td>';
        text_table += '		<td><input type="text" class="form-control" name="driver_reference[' + id_driver_reference + '][driver_reference_occupation]" ></td>';
        text_table += '		<td><input type="text" class="form-control" name="driver_reference[' + id_driver_reference + '][driver_reference_mobile]" ></td>';
        text_table += '		<td>';
        text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_reference(\'' + id_driver_reference + '\');" href="javascript:void(0)">';
        text_table += '				<i class="mdi mdi-minus"></i>';
        text_table += '			</a>';
        text_table += '		</td>';
        text_table += '	</tr>';
        id_driver_reference++;
        $("#add_driver_reference").append(text_table);
    });

    $("#add_plus_work_history").on("click", function(event) {
        var year = '';
        var select_years = '<option value="">เลือกปี</option>';
        for (year = 1970; year <= 3000; year++) {
            select_years += "<option value='" + year + "'>" + year + "</option>";
        }
        text_table = '<div id="add_work_history_' + id_count_work + '">';
        text_table += '<div class="text-right"> ';
        text_table += '<a class="btn btn-circle btn-danger text-white" onclick="delete_row_work_history(\'' + id_count_work + '\');" href="javascript:void(0)">';
        text_table += '										<i class="mdi mdi-minus"></i>';
        text_table += '									</a>';
        text_table += '</div> ';
        text_table += '	<table class="table">';
        text_table += '		<thead>';
        text_table += '			<tr>';
        text_table += '				<th scope="col">ตั้งแต่</th>';
        text_table += '				<th scope="col">ถึง</th>';
        text_table += '				<th scope="col" colspan="4">บริษัท</th>';
        text_table += '				<th scope="col" colspan="4">ตำแหน่ง</th>';
        text_table += '			</tr>';
        text_table += '		</thead>';
        text_table += '		<tbody>';
        text_table += '			<tr>';
        text_table += '			  <td>';
        text_table += '		       <select class="form-control custom-select select2" name="work_history[' + id_count_work + '][work_history_from]">';
        text_table += select_years
        text_table += '          </select>';
        text_table += '			  </td>';
        text_table += '			  <td>';
        text_table += '		       <select class="form-control custom-select select2" name="work_history[' + id_count_work + '][work_history_to]">';
        text_table += select_years
        text_table += '          </select>';
        text_table += '			  </td>';
        text_table += '				<td scope="col" colspan="4"><input type="text" class="form-control" name="work_history[' + id_count_work + '][work_history_company]" ></td>';
        text_table += '				<td scope="col" colspan="4"><input type="text" class="form-control" name="work_history[' + id_count_work + '][work_history_current_position]" ></td>';
        text_table += '			</tr>';
        text_table += '			<tr>';
        text_table += '				<td scope="col" rowspan="2">เงินเดือน</td>';
        text_table += '				<td scope="col">เริ่มต้น</td>';
        text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history[' + id_count_work + '][work_history_salary_start]" ></td>';
        text_table += '				<td scope="col">ค่าคอมมิชชั่น</td>';
        text_table += '				<td scope="col">ค่าโทรศัพท์</td>';
        text_table += '				<td scope="col">ค่าน้ำมัน</td>';
        text_table += '				<td scope="col">โบนัส</td>';
        text_table += '				<td scope="col">เบี้ยขยัน</td>';
        text_table += '				<td scope="col">อื่นๆ</td>';
        text_table += '			</tr>';
        text_table += '			<tr>';
        text_table += '				<td scope="col">สุดท้าย</td>';
        text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history[' + id_count_work + '][work_history_salary_end]" ></td>';
        text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history[' + id_count_work + '][work_history_commission_start]" ></td>';
        text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history[' + id_count_work + '][work_history_mobile_start]" ></td>';
        text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history[' + id_count_work + '][work_history_gasoline_start]" ></td>';
        text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history[' + id_count_work + '][work_history_bonus_start]" ></td>';
        text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history[' + id_count_work + '][work_history_incentive_start]" ></td>';
        text_table += '				<td scope="col"><input type="text" class="form-control price" name="work_history[' + id_count_work + '][work_history_other_start]" ></td>';
        text_table += '			</tr>';
        text_table += '			<tr>';
        text_table += '				<td colspan="9">';
        text_table += '					<label for="add_work_history_details">หน้าที่และความรับผิดชอบโดยละเอียด</label>';
        text_table += '					<textarea cols="80" class="form-control" name="work_history[' + id_count_work + '][work_history_details]"  rows="10"></textarea>';
        text_table += '				</td>';
        text_table += '			</tr>';
        text_table += '			<tr>';
        text_table += '				<td colspan="9">';
        text_table += '					<label for="add_work_history_reason_for_leaving">สาเหตุที่ออก</label>';
        text_table += '					<textarea cols="80" class="form-control" name="work_history[' + id_count_work + '][work_history_reason_for_leaving]"  rows="10"></textarea>';
        text_table += '				</td>';
        text_table += '			</tr>';
        text_table += '			<tr>';
        text_table += '				<td>ชื่อผู้บังคับบัญชา</td>';
        text_table += '				<td colspan="3"><input type="text" class="form-control" name="work_history[' + id_count_work + '][work_history_supervison_name]" ></td>';
        text_table += '				<td colspan="2">';
        text_table += '					<div class="custom-control custom-radio">';
        text_table += '						<input type="radio" class="custom-control-input" id="add_work_history_supervison_status_y_' + id_count_work + '" name="work_history[' + id_count_work + '][work_history_supervison_status]" value="1">';
        text_table += '						<label class="custom-control-label" for="add_work_history_supervison_status_y_' + id_count_work + '">ยินดีให้ติดต่อเพื่อสอบถามข้อมูลโทร</label>';
        text_table += '					</div>';
        text_table += '					<div class="custom-control custom-radio">';
        text_table += '						<input type="radio" class="custom-control-input" id="add_work_history_supervison_status_n_' + id_count_work + '" name="work_history[' + id_count_work + '][work_history_supervison_status]" value="0">';
        text_table += '						<label class="custom-control-label" for="add_work_history_supervison_status_n_' + id_count_work + '">ไม่ยินดีให้ติดต่อ</label>';
        text_table += '					</div>';
        text_table += '				</td>';
        text_table += '				<td colspan="3"><input type="text" class="form-control" name="work_history[' + id_count_work + '][work_history_supervison_phone]" ></td>';
        text_table += '			</tr>';
        text_table += '			<tr>';
        text_table += '			<td colspan="9">  </td>';
        text_table += '			</tr>';
        text_table += '		</tbody>';
        text_table += '	</table>';
        text_table += '	</div>';
        id_count_work++;
        $("#add_work_history").append(text_table);
        $('.select2').select2();
        $('.price').priceFormat({
            prefix: '',
            suffix: ''
        });
    });

    $("#add_plus_table_brethren").on("click", function(event) {
        text_table = '<tr id="add_table_brethren_' + id_count + '">';
        text_table += '		<td scope="row"><input type="number" class="form-control" id="add_brethren_z_index' + id_count + '" name="brethren[' + id_count + '][brethren_z_index]" ></td>';
        text_table += '		<td><input type="text" class="form-control" id="add_brethren_name' + id_count + '" name="brethren[' + id_count + '][brethren_name]" ></td>';
        text_table += '		<td><input type="text" class="form-control" id="add_brethren_lastname' + id_count + '" name="brethren[' + id_count + '][brethren_lastname]" ></td>';
        text_table += '		<td><input type="number" class="form-control" id="add_brethren_age" name="brethren[' + id_count + '][brethren_age]" ></td>';
        text_table += '		<td>';
        text_table += '			<div class="custom-control custom-radio">';
        text_table += '				<input type="radio" class="custom-control-input" id="add_brethren_realtionship_1_' + id_count + '" name="brethren[' + id_count + '][brethren_realtionship]" value="1">';
        text_table += '				<label class="custom-control-label" for="add_brethren_realtionship_1_' + id_count + '">พี่</label>';
        text_table += '			</div>';
        text_table += '			<div class="custom-control custom-radio">';
        text_table += '				<input type="radio" class="custom-control-input" id="add_brethren_realtionship2' + id_count + '" name="brethren[' + id_count + '][brethren_realtionship]" value="2">';
        text_table += '				<label class="custom-control-label" for="add_brethren_realtionship2' + id_count + '">น้อง</label>';
        text_table += '			</div>		';
        text_table += '		</td>';
        text_table += '		<td><input type="text" class="form-control" id="add_brethre_position' + id_count + '" name="brethren[' + id_count + '][brethren_position]" ></td>';
        text_table += '		<td><input type="text" class="form-control" id="add_brethren_company' + id_count + '" name="brethren[' + id_count + '][brethren_company]" ></td>';
        text_table += '		<td><input type="text" class="form-control" id="add_brethren_tel' + id_count + '" name="brethren[' + id_count + '][brethren_tel]" ></td>';
        text_table += '		<td>';
        text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_brethren(\'' + id_count + '\');" href="javascript:void(0)">';
        text_table += '				<i class="mdi mdi-minus"></i>';
        text_table += '			</a>';
        text_table += '			</td>';
        text_table += ' </tr>';
        id_count++;
        $("#add_table_brethren").append(text_table);
    });

    $("#add_plus_training_record").on("click", function(event) {
        var year = '';
        var select_years = '<option value="">เลือกปี</option>';
        for (year = 1970; year <= 3000; year++) {
            select_years += "<option value='" + year + "'>" + year + "</option>";
        }
        text_table = '	<tr id="add_training_record_' + id_training + '">							';
        text_table += '		<td se_cope="col">';
        text_table += '		<select class="form-control custom-select select2" name="training_record[' + id_training + '][training_record_year]">';
        text_table += select_years
        text_table += '   </select>';
        text_table += '		</td>';
        text_table += '		<td scope="col"><input type="text" class="form-control" name="training_record[' + id_training + '][training_record_course]" ></td>';
        text_table += '		<td scope="col"><input type="text" class="form-control" name="training_record[' + id_training + '][training_record_insitute]" ></td>';
        text_table += '		<td scope="col"><input type="text" class="form-control" name="training_record[' + id_training + '][training_record_duration]" ></td>';
        text_table += '		<td scope="col">';
        text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_training_record(\'' + id_training + '\');" href="javascript:void(0)">';
        text_table += '				<i class="mdi mdi-minus"></i>';
        text_table += '			</a>';
        text_table += '		</td>';
        text_table += '	</tr>';
        id_training++;
        $("#add_training_record").append(text_table);
        $('.select2').select2();
    });

    $("#add_plus_driver_language").on("click", function(event) {
        var select_languages = '<option value="">เลือกภาษา</option>';
        @foreach($LanguageTypes as $val)
        select_languages += "<option value='{{$val->language_type_id}}'>{{$val->language_type_name}}</option>";
        @endforeach
        text_table = '<tr id="add_driver_language_' + id_driver_language + '">';
        text_table += '	<td>';
        text_table += '	    <select class="form-control custom-select select2" name="driver_language[' + id_driver_language + '][language_type_id]">';
        text_table += select_languages;
        text_table += '		  </select>';
        text_table += '	</td>';
        text_table += '	<td>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_speaking_3_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_speaking]" class="custom-control-input" value="3">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_speaking_3_' + id_driver_language + '">ดีมาก</label>';
        text_table += '	</div>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_speaking_2_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_speaking]" class="custom-control-input" value="2">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_speaking_2_' + id_driver_language + '">ดี</label>';
        text_table += '	</div>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_speaking_1_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_speaking]" class="custom-control-input" value="1">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_speaking_1_' + id_driver_language + '">พอใช้</label>';
        text_table += '	</div>';
        text_table += ' </td>';
        text_table += '	<td>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_reading_3_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_reading]" class="custom-control-input" value="3">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_reading_3_' + id_driver_language + '">ดีมาก</label>';
        text_table += '	</div>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_reading_2_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_reading]" class="custom-control-input" value="2">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_reading_2_' + id_driver_language + '">ดี</label>';
        text_table += '	</div>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_reading_1_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_reading]" class="custom-control-input" value="1">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_reading_1_' + id_driver_language + '">พอใช้</label>';
        text_table += '	</div>';
        text_table += ' </td>';
        text_table += '	<td>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_writing_3_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_writing]" class="custom-control-input" value="3">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_writing_3_' + id_driver_language + '">ดีมาก</label>';
        text_table += '	</div>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_writing_2_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_writing]" class="custom-control-input" value="2">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_writing_2_' + id_driver_language + '">ดี</label>';
        text_table += '	</div>';
        text_table += '	<div class="custom-control custom-radio">';
        text_table += '	    <input type="radio" id="add_driver_language_writing_1_' + id_driver_language + '" name="driver_language[' + id_driver_language + '][driver_language_writing]" class="custom-control-input" value="1">';
        text_table += '	    <label class="custom-control-label" for="add_driver_language_writing_1_' + id_driver_language + '">พอใช้</label>';
        text_table += '	</div>';
        text_table += ' </td>';
        text_table += '	<td><input type="text" class="form-control" name="driver_language[' + id_driver_language + '][driver_language_test_result]"></td>';
        text_table += '	<td><input type="number" class="form-control" name="driver_language[' + id_driver_language + '][driver_language_score]"></td>';
        text_table += '	<td>';
        text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_language(\'' + id_driver_language + '\');" href="javascript:void(0)">';
        text_table += '				<i class="mdi mdi-minus"></i>';
        text_table += '			</a>';
        text_table += '	</td>';
        text_table += '</tr>';
        id_driver_language++;
        $("#add_driver_language").append(text_table);
        $('.select2').select2();
    });

    $("#add_plus_type_doc_driver").on("click", function(event) {
        var select_types = '<option value="">เลือกประเภท</option>';
        @foreach($TypeDocumentDrivers as $val)
        select_types += "<option value='{{$val->type_doc_driver_id}}'>{{$val->type_doc_driver_name}}</option>";
        @endforeach
        text_table = '	<tr id="add_type_doc_driver_' + id_type_doc_driver + '">							';
        text_table += '		<td se_cope="col">';
        text_table += '		<select class="form-control custom-select select2" name="driver_file[' + id_type_doc_driver + '][type_doc_driver_id]">';
        text_table += select_types;
        text_table += '		</select>';
        text_table += '		</td>';
        text_table += '		<td scope="col" class="form-upload"><input type="file" class="form-control upload-file" data-index="' + id_type_doc_driver + '" name="driver_file[' + id_type_doc_driver + '][driver_file_name]"></td>';
        text_table += '		<td scope="col"><textarea cols="" class="form-control" name="driver_file[' + id_type_doc_driver + '][driver_file_details]"  rows="2"></textarea></td>';
        text_table += '		<td scope="col"><input type="date" class="form-control" name="driver_file[' + id_type_doc_driver + '][driver_file_date]" ></td>';
        text_table += '		<td scope="col">';
        text_table += '			<a class="btn btn-circle btn-danger text-white" onclick="delete_row_file(\'' + id_type_doc_driver + '\');" href="javascript:void(0)">';
        text_table += '				<i class="mdi mdi-minus"></i>';
        text_table += '			</a>';
        text_table += '		</td>';
        text_table += '	</tr>';
        id_type_doc_driver++;
        $("#add_type_doc_driver").append(text_table);
        $('.select2').select2();
    });

    function delete_row_brethren(id_count_table) {
        $("#add_table_brethren_" + id_count_table).remove();
    }

    function delete_row_emergency_contact(id_driver_emergency_contacts) {
        $("#add_driver_emergency_contacts_" + id_driver_emergency_contacts).remove();
    }

    function delete_row_reference(id_driver_reference) {
        $("#add_driver_reference_" + id_driver_reference).remove();
    }

    function delete_row_work_history(id_count_work) {
        $("#add_work_history_" + id_count_work).remove();
    }

    function delete_row_training_record(id_training) {
        $("#add_training_record_" + id_training).remove();
    }

    function delete_row_language(id_driver_language) {
        $("#add_driver_language_" + id_driver_language).remove();
    }

    function delete_row_file(id_type_doc_driver) {
        $("#add_type_doc_driver_" + id_type_doc_driver).remove();
    }

    $('body').on('change', '.upload-image', function() {
        var ele = $(this);
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
            url: url_gb + '/admin/UploadFile/JobRegister',
            type: 'POST',
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(res) {
                ele.closest('.form-upload').find('.preview-img').attr('src', res.link_preview);
                ele.closest('.form-upload').find('.upload-image').append('<input type="hidden" name="driver[driver_image]" value="' + res.path + '">');
                setTimeout(function() {

                }, 100);
            }
        });
    });

    $('body').on('change', '.upload-file', function() {
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
            url: url_gb + '/admin/UploadFile/DriverFile',
            type: 'POST',
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(res) {
                ele.closest('.form-upload').find('.upload-file').append('<input type="hidden" name="driver_file[' + index + '][driver_file_name]" value="' + res.path + '">');
                setTimeout(function() {

                }, 100);
            }
        });
    });
    $(document).ready(function() {
        $("input[id=add_driver_id_card_no]").change(function() {
            chkDigitPid($(this).val(),'add');
        });
    });

    function chkDigitPid(p_iPID,action) {
        var total = 0;
        var iPID;
        var chk;
        var Validchk;
        iPID = p_iPID;
        Validchk = iPID.substr(12, 1);
        var j = 0;
        var pidcut;
        for (var n = 0; n < 12; n++) {
            pidcut = parseInt(iPID.substr(j, 1));
            total = (total + ((pidcut) * (13 - n)));
            j++;
        }

        chk = 11 - (total % 11);

        if (chk == 10) {
            chk = 0;
        } else if (chk == 11) {
            chk = 1;
        }
        if (chk == Validchk) {
            // alert("ระบุหมายเลขประจำตัวประชาชนถูกต้อง");
            $.ajax({
                    method: "POST",
                    url: url_gb + "/admin/JobRegister/CheckDriverIDCard/" + iPID,
                    data: {
                        iPID: iPID,
                    }
                }).done(function(res) {
                    if (res.status == 'N') {
                        text = 'กรุณากรอกเลขบัตรประชาชนใหม่ เนื่องจากมีเลขบัตรประชาชนนี้ในระบบเเล้ว';
                        alert(text);
                        $('#'+action+'_id_card_error').show();
                        $('#'+action+'_id_card_error').html('<i class="mdi mdi-close-circle" ></i>' + ' ' + text);
                        $('#'+action+'_id_card_success').hide();
                        $('#'+action+'_driver_id_card_no').val('');
                    }
                    if (res.status == 'R') {
                        text = 'กรุณากรอกเลขบัตรประชาชนใหม่ เนื่องจากมีเลขบัตรประชาชนนี้ในระบบเเล้ว **หมายเหตุ ' + res.resign_type;
                        alert(text);
                        $('#'+action+'_id_card_error').show();
                        $('#'+action+'_id_card_error').html('<i class="mdi mdi-close-circle" ></i>' + ' ' + text);
                        $('#'+action+'_id_card_success').hide();
                        $('#'+action+'_driver_id_card_no').val('');
                    }
                    if (res.status == 'Y') {
                        text = '<i class="mdi mdi-check-circle" ></i> สามารถใช้เลขบัตรประชาชนนี้ได้';
                        $('#'+action+'_id_card_success').show();
                        $('#'+action+'_id_card_success').html(text);
                        $('#'+action+'_id_card_error').hide();
                    }
                }).fail(function(res) {
                    swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                });
            return true;
        } else {
            text = 'ระบุหมายเลขประจำตัวประชาชนไม่ถูกต้อง';
            alert(text);
            $('#'+action+'_id_card_error').show();
            $('#'+action+'_id_card_error').html('<i class="mdi mdi-close-circle" ></i>' + ' ' + text);
            $('#'+action+'_id_card_success').hide();
            $('#'+action+'_driver_id_card_no').val('');

            return false;
        }

    }

    // function CheckDriverIDCard(field, maxChar) {
    //     var ref = $(field),
    //         val = ref.val();
    //     if (val.length == maxChar) {
    //         ref.val(function() {
               
    //             return val.substr(0, maxChar);
    //         });
    //     } else {
    //         alert('กรุงณากรอกเลขบัตรประชาชนให้ครบ 13 หลัก');
    //     }
    // }
</script>