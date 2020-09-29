<script>
    $('body').on('click', '.btn-view', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        $('#show_education_driver').html('');
        $('#show_work_history').html('');

        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/JobRegister/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var education_item = '';
            var education_status = '';
            var work_history_item = '';
            var father_name = '';
            var mother_name = '';
            var spouse_name = '';

            if(data.driver_image){
                $('.form-show-image').find('.show-driver-image').attr('src', data.driver_image);
            }else{
                $('.form-show-image').find('.show-driver-image').attr('src', '');
            }
            $('#view_driver_id').val(id);
            $('#show_full_name').text(data.name_prefix.name_prefix_name + ' ' + data.driver_name_th + ' ' + data.driver_lastname_th + ' / ' + data.name_prefix.name_prefix_name_en + ' ' + data.driver_name_en + ' ' + data.driver_lastname_en);
            $('#show_date_of_birth').text(data.driver_date_of_birth);
            $('#show_driver_age').text(data.driver_age + ' ปี');
            $('#show_driver_address_th').text(data.driver_address + ' ' + data.districts.districts_name + ' ' + data.districts.amphures.amphures_name + ' ' + data.districts.provinces.provinces_name + ' ' + data.districts.zipcode.zipcodes_name);
            $('#show_driver_address_en').text(data.driver_address_en + ' ' + data.districts.districts_name_en + ', ' + data.districts.amphures.amphures_name_en + ', ' + data.districts.provinces.provinces_name_en + ', ' + data.districts.zipcode.zipcodes_name);
            $('#show_driver_mobile_phone').text(data.driver_mobile_phone);
            $('#show_driver_id_card_no').text(data.driver_id_card_no);

            $.each(data.education_driver, function(k, v) {
                if (v.education_driver_status == '1') {
                    education_status = 'ประถมศึกษา';
                } else if (v.education_driver_status == '2') {
                    education_status = 'มัธยมศึกษา';
                } else if (v.education_driver_status == '3') {
                    education_status = 'อาชีวศึกษา';
                } else if (v.education_driver_status == '4') {
                    education_status = 'ปริญญาตรี';
                } else if (v.education_driver_status == '5') {
                    education_status = 'ปริญญาโท';
                } else if (v.education_driver_status == '6') {
                    education_status = 'อื่นๆ';
                }
                education_item += ':&nbsp&nbsp' + education_status + ' / ' + v.education_driver_name_instirute + '</br>';
            });

            $('#show_education_driver').append(education_item);

            if (data.driver_father_name && data.driver_father_lastname && data.driver_father_name_en && data.driver_father_lastname_en) {
                father_name = data.driver_father_name + ' ' + data.driver_father_lastname + ' / ' + data.driver_father_name_en + ' ' + data.driver_father_lastname_en;
            } else {
                father_name = '-';
            }
            $('#show_driver_father_name').text(father_name);
            if (data.driver_mother_name && data.driver_mother_lastname && data.driver_mother_name_en && data.driver_mother_lastname_en) {
                mother_name = data.driver_mother_name + ' ' + data.driver_mother_lastname + ' / ' + data.driver_mother_name_en + ' ' + data.driver_mother_lastname_en;
            } else {
                mother_name = '-';
            }
            $('#show_driver_mother_name').text(mother_name);
            $('#show_driver_father_name').text(father_name);
            $('#show_driver_status_family_name').text(data.driver_status_family_name);
            if (data.driver_spouse_name && data.driver_spouse_lastname && data.driver_spouse_name_en && data.driver_spouse_lastname_en) {
                spouse_name = data.driver_spouse_name + ' ' + data.driver_spouse_lastname + ' / ' + data.driver_spouse_name_en + ' ' + data.driver_spouse_lastname_en;
            } else {
                spouse_name = '-';
            }
            $('#show_driver_status_spouse_name').text(spouse_name);
            $('#show_recruitment_position').text(data.recruitment_position.recruitment_position_name);
            if (data.driver_children) {
                children = data.driver_children;
            } else {
                children = '-';
            }

            $.each(data.work_history, function(k, v) {
                work_history_item += ':&nbsp&nbsp' + v.work_history_company + ' / ' + v.work_history_from + ' - ' + v.work_history_to + '</br>';
            });
            $('#show_work_history').append(work_history_item);
            $('#show_driver_children').text(children + ' คน');
            $('#print_contract').attr("href", "JobRegister/PrintDriverProfileContract/"+id);

            $('#ModalViewDriverProfile').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>