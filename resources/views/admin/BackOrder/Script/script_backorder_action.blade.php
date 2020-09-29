<script>

    $(document).on('click','.btn-fix', function(){
        var btn = $(this);
        loadingButton(btn);
        $('.FixSpecModalShow').html(loadingani);

        var back_order_id = $(this).data('back_order_id');
        $.get(url_gb+'/admin/BackOrder/'+back_order_id, function(data){
            $('.FixSpecModalShow').html(data);
            resetButton(btn);
        });
    });

    $(document).on('click','.MatchingDriverModal', function(){
        var btn = $(this);
        loadingButton(btn);
        $('.MatchingDriverModalShow').html(loadingani);

        var back_order_id = $(this).data('back_order_id');
        var order_spec_id = $(this).data('back_order_spec_id');
        var company_id = $(this).data('company_id');
        var gender_id = $(this).data('gender_id');
        var driver_religion = $(this).data('driver_religion');
        var driver_language = $(this).data('driver_language');
        var driver_requirement = $(this).data('driver_requirement');
        var driver_age_start = $(this).data('driver_age_start');
        var driver_age_end = $(this).data('driver_age_end');
        var driver_smoke = $(this).data('driver_smoke');
        var work_history = $(this).data('work_history');
        var province_id = $(this).data('province_id');
        var amphur_id = $(this).data('amphur_id');
        var districts_id = $(this).data('districts_id');
        var driver_status_family = $(this).data('driver_status_family');

        $.post(url_gb+'/admin/BackOrder', {back_order_id:back_order_id,order_spec_id:order_spec_id,company_id:company_id,gender_id:gender_id,driver_religion:driver_religion,districts_id:districts_id,driver_age_start:driver_age_start,driver_age_end:driver_age_end,driver_status_family:driver_status_family,driver_language:driver_language,driver_requirement:driver_requirement,driver_smoke:driver_smoke,work_history:work_history,province_id:province_id,amphur_id:amphur_id}, function(data){
            $('.MatchingDriverModalShow').html(data);
            resetButton(btn);
        });
    });

    $(document).on('click','.WaitIntervieModal', function(){
        var btn = $(this);
        loadingButton(btn);
        $('.WaitIntervieModalShow').html(loadingani);

        var back_order_id = $(this).data('back_order_id');
        var order_spec_id = $(this).data('back_order_spec_id');
        var company_id = $(this).data('company_id');
        var gender_id = $(this).data('gender_id');
        var driver_religion = $(this).data('driver_religion');
        var driver_language = $(this).data('driver_language');
        var driver_requirement = $(this).data('driver_requirement');
        var driver_age_start = $(this).data('driver_age_start');
        var driver_age_end = $(this).data('driver_age_end');
        var driver_smoke = $(this).data('driver_smoke');
        var work_history = $(this).data('work_history');
        var province_id = $(this).data('province_id');
        var amphur_id = $(this).data('amphur_id');
        var districts_id = $(this).data('districts_id');
        var driver_status_family = $(this).data('driver_status_family');

        $.post(url_gb+'/admin/BackOrder/BackOrderInterview/View/'+order_spec_id, {gender_id:gender_id,company_id:company_id,driver_religion:driver_religion,districts_id:districts_id,driver_age_start:driver_age_start,driver_age_end:driver_age_end,driver_status_family:driver_status_family,driver_language:driver_language,driver_requirement:driver_requirement,driver_smoke:driver_smoke,work_history:work_history,province_id:province_id,amphur_id:amphur_id,back_order_id:back_order_id}, function(data){
            $('.WaitIntervieModalShow').html(data);
            resetButton(btn);
        });
    });

    $(document).on('click','.NotPassModal', function(){
        var btn = $(this);
        loadingButton(btn);
        $('.NotPassModalShow').html(loadingani);

        var back_order_id = $(this).data('back_order_id');
        var order_spec_id = $(this).data('back_order_spec_id');
        var company_id = $(this).data('company_id');
        var gender_id = $(this).data('gender_id');
        var driver_religion = $(this).data('driver_religion');
        var driver_language = $(this).data('driver_language');
        var driver_requirement = $(this).data('driver_requirement');
        var driver_age_start = $(this).data('driver_age_start');
        var driver_age_end = $(this).data('driver_age_end');
        var driver_smoke = $(this).data('driver_smoke');
        var work_history = $(this).data('work_history');
        var province_id = $(this).data('province_id');
        var amphur_id = $(this).data('amphur_id');
        var districts_id = $(this).data('districts_id');
        var driver_status_family = $(this).data('driver_status_family');

        $.post(url_gb+'/admin/BackOrder/BackOrderInterview/NotpassView/'+order_spec_id, {gender_id:gender_id,company_id:company_id,driver_religion:driver_religion,districts_id:districts_id,driver_age_start:driver_age_start,driver_age_end:driver_age_end,driver_status_family:driver_status_family,driver_language:driver_language,driver_requirement:driver_requirement,driver_smoke:driver_smoke,work_history:work_history,province_id:province_id,amphur_id:amphur_id,back_order_id:back_order_id}, function(data){
            $('.NotPassModalShow').html(data);
            resetButton(btn);
        });
    });

    $(document).on('click','.EditSpecModal', function(){
        var btn = $(this);
        loadingButton(btn);
        $('.EditSpecModalShow').html(loadingani);

        var fixspec_id = $(this).data('fixspec_id');
        $.get(url_gb+'/admin/BackOrderSpec/'+fixspec_id+'/edit', function(data){
            $('.EditSpecModalShow').html(data);
            resetButton(btn);
        });
    });

    $(document).on('click','.ViewSpecModal', function(){
        var btn = $(this);
        loadingButton(btn);
        $('.ViewSpecModalShow').html(loadingani);
        var fixspec_id = $(this).data('fixspec_id');
        $.get(url_gb+'/admin/BackOrderSpec/'+fixspec_id, function(data){
            $('.ViewSpecModalShow').html(data);
            resetButton(btn);
        });
    });

    $(document).on('click','.SchedInterviewModal', function(){
        var btn = $(this);
        loadingButton(btn);
        document.getElementById("formSched").reset();

        var driver_id = $(this).data('driver_id');
        var back_order_id = $(this).data('back_order_id');
        var order_spec_id = $(this).data('order_spec_id');
        var company_id = $(this).data('company_id');
        $('#driver_id').val(driver_id);
        $('#back_order_id').val(back_order_id);
        $('#order_spec_id').val(order_spec_id);
        $('#company_id_data').val(company_id);

        $('#gender_id').val($(this).data('gender_id'));
        $('#language').val($(this).data('driver_language'));
        $('#position').val($(this).data('driver_requirement'));
        $('#age_start').val($(this).data('driver_age_start'));
        $('#age_end').val($(this).data('driver_age_end'));
        $('#smoke').val($(this).data('driver_smoke'));
        $('#history').val($(this).data('work_history'));
        $('#province').val($(this).data('province_id'));
        $('#amphur').val($(this).data('amphur_id'));
        $('#district').val($(this).data('districts_id'));
        $('#status_family').val($(this).data('driver_status_family'));
        $('#updateinter').val($(this).data('updateinterview'));
        resetButton(btn);
    });

    $(document).on('click','.InterviewResultsModal', function(){
        var btn = $(this);
        loadingButton(btn);
        document.getElementById("formInterview").reset();

        var back_order_interviwe_id = $(this).data('back_order_interviwe_id');
        $('#back_order_interviwe_id').val(back_order_interviwe_id);
        $('#back_order_id_2').val($(this).data('back_order_id'));
        $('#order_spec_id_2').val($(this).data('order_spec_id'));
        $('#gender_id_2').val($(this).data('gender_id'));
        $('#language_2').val($(this).data('driver_language'));
        $('#position_2').val($(this).data('driver_requirement'));
        $('#age_start_2').val($(this).data('driver_age_start'));
        $('#age_end_2').val($(this).data('driver_age_end'));
        $('#smoke_2').val($(this).data('driver_smoke'));
        $('#history_2').val($(this).data('work_history'));
        $('#province_2').val($(this).data('province_id'));
        $('#amphur_2').val($(this).data('amphur_id'));
        $('#district_2').val($(this).data('districts_id'));
        $('#status_family_2').val($(this).data('driver_status_family'));
        resetButton(btn);
    });

    $(document).on('click', '.btn-view', function(data) {
        var id = $(this).data('back_order_id');
        var btn = $(this);

        $('#show_contact').html('');

        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/BackOrder/getViewDetail/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            var status = '';
            var quotation_price_list_guarantee_ot_price = '';
            var customer_type = '';
            var contact_item = '';
            var service_charge = '';

            if (data.back_order_status == 1) {
                status = "Active";
            } else {
                status = "No Active";
            }
            if(data.quotation_price_list_ot_status == 1){
                quotation_price_list_guarantee_ot_price = res.format_ot_price;
            }else{
                quotation_price_list_guarantee_ot_price = '-';
            }

            if(data.quotation.company.customer_type_id == 1){
                customer_type = 'ลูกค้าใหม่';
            }else if(data.quotation.company.customer_type_id == 2){
                customer_type = 'ลูกแนะนำ';
            }
            $.each(data.quotation.customer.contact, function(k, v) {
                if(v.contact_info_status == 1){
                    contact_item += v.contact_info_customer_name+'</br>'+v.contact_info_phone+'</br>'+v.contact_info_email+'</br></br>';
                }
                else{
                    contact_item ='-';
                }
            });
            if(data.quotation_price_list_service_charge_price_percent){
                service_charge = data.quotation_price_list_service_charge_price_percent + ' %';
            }else{
                service_charge = '-';
            }
            $('#show_contact').append(contact_item);
            $('#show_sale_area').text(data.quotation.company.sale_area.sale_team_sub_name);
            $('#show_customer_type_id').text(customer_type);
            $('#show_company_name_th').text(data.quotation.company.company_name_th);
            $('#show_customer_name').text(data.quotation.customer.customer_name);
            $('#show_back_order_unit').text(data.back_order_unit);
            $('#show_quotation_price_list_name').text(data.quotation_price_list_name);
            $('#show_quotation_price_list_salary').text(res.format_salary);
            $('#show_quotation_price_list_guarantee_ot_price').text(quotation_price_list_guarantee_ot_price);
            $('#show_sale').text(data.quotation.admin_user.first_name+' '+data.quotation.admin_user.last_name);
            $('#show_area').text(data.quotation.customer.districts.amphures.amphures_name);
            $('#show_sales_comment').text(res.sales_comment);
            $('#show_sale_confirmed').text(res.sales_confirmed);
            $('#show_quotation_price_list_service_charge_price_percent').text(service_charge);
            $('#show_back_order_end_date').text(res.format_back_order_end_date);
            $('#show_Count_MM').text(res.format_Count_MM+' เดือน');
            $('#show_Count_DD').text(res.format_Count_DD+' วัน');
            $('#show_confirmation_recruit').text(res.format_confirmation_recruit);

            $('#show_back_order_status').text(status);

            $('#ViewDetailModal').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-view-profile', function(data) {
        var driver_id = $(this).data('driver_id');
        var btn = $(this);
        $('#show_education_driver').html('');
        $('#show_work_history').html('');

        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/JobRegister/" + driver_id,
            data: ''
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
            $('#view_driver_id').val(driver_id);
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
            $('#print_contract').attr("href", "JobRegister/PrintDriverProfileContract/"+driver_id);

            $('#ModalViewDriverProfile').modal('show');
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('#formSched').submit(function(event){
        event.preventDefault();
        var param = $('#formSched').serializeArray();
        $.post(url_gb+'/admin/BackOrder/BackOrderInterview/Create',{param},function(data){
            swal('Add Schedule an interview Success','ดำเนินการนัดวันสัมภาษณ์ เรียบร้อย','success');
            $('#SchedInterviewModal').modal('hide');

            $('.MatchingDriverModalShow').html(loadingani);
            $('.NotPassModalShow').html(loadingani);
            $('.FixSpecModalShow').html(loadingani);

            var back_order_id = $('#back_order_id').val();
            var order_spec_id = $('#order_spec_id').val();
            var company_id = $('#company_id_data').val();
            var gender_id = $('#gender_id').val();
            var driver_religion = '';
            var driver_language = $('#language').val();
            var driver_requirement = $('#position').val();
            var driver_age_start = $('#age_start').val();
            var driver_age_end = $('#age_end').val();
            var driver_smoke = $('#smoke').val();
            var work_history = $('#history').val();
            var province_id = $('#province').val();
            var amphur_id = $('#amphur').val();
            var districts_id = $('#district').val();
            var driver_status_family = $('#status_family').val();


            if($('#updateinter').val()==''){
                $.post(url_gb+'/admin/BackOrder', {back_order_id:back_order_id,order_spec_id:order_spec_id,company_id:company_id,gender_id:gender_id,driver_religion:driver_religion,districts_id:districts_id,driver_age_start:driver_age_start,driver_age_end:driver_age_end,driver_status_family:driver_status_family,driver_language:driver_language,driver_requirement:driver_requirement,driver_smoke:driver_smoke,work_history:work_history,province_id:province_id,amphur_id:amphur_id}, function(data){
                    $('.MatchingDriverModalShow').html(data);
                });
            }else{
                $.post(url_gb+'/admin/BackOrder/BackOrderInterview/NotpassView/'+order_spec_id, {gender_id:gender_id,company_id:company_id,driver_religion:driver_religion,districts_id:districts_id,driver_age_start:driver_age_start,driver_age_end:driver_age_end,driver_status_family:driver_status_family,driver_language:driver_language,driver_requirement:driver_requirement,driver_smoke:driver_smoke,work_history:work_history,province_id:province_id,amphur_id:amphur_id,back_order_id:back_order_id}, function(data){
                    $('.NotPassModalShow').html(data);
                });
            }

            $.get(url_gb+'/admin/BackOrder/'+back_order_id, function(data){
                $('.FixSpecModalShow').html(data);
            });

        });
    });

    $('#formInterview').submit(function(event){
        event.preventDefault();
        var param = $('#formInterview').serializeArray();

        $.post(url_gb+'/admin/BackOrder/BackOrderInterview/Update',{param},function(data){
            swal('Add Schedule an interview Success','ดำเนินการนัดวันสัมภาษณ์ เรียบร้อย','success');
            $('#InterviewResultsModal').modal('hide');
            $('.WaitIntervieModalShow').html(loadingani);
            $('.FixSpecModalShow').html(loadingani);

            var back_order_id = $('#back_order_id_2').val();
            var order_spec_id = $('#order_spec_id_2').val();
            var company_id = $('#company_id_data_2').val();
            var gender_id = $('#gender_id_2').val();
            var driver_religion = '';
            var driver_language = $('#language_2').val();
            var driver_requirement = $('#position_2').val();
            var driver_age_start = $('#age_start_2').val();
            var driver_age_end = $('#age_end_2').val();
            var driver_smoke = $('#smoke_2').val();
            var work_history = $('#history_2').val();
            var province_id = $('#province_2').val();
            var amphur_id = $('#amphur_2').val();
            var districts_id = $('#district_2').val();
            var driver_status_family = $('#status_family_2').val();

            $.post(url_gb+'/admin/BackOrder/BackOrderInterview/View/'+order_spec_id, {gender_id:gender_id,company_id:company_id,driver_religion:driver_religion,districts_id:districts_id,driver_age_start:driver_age_start,driver_age_end:driver_age_end,driver_status_family:driver_status_family,driver_language:driver_language,driver_requirement:driver_requirement,driver_smoke:driver_smoke,work_history:work_history,province_id:province_id,amphur_id:amphur_id,back_order_id:back_order_id}, function(data){
                $('.WaitIntervieModalShow').html(data);
            });

            $.get(url_gb+'/admin/BackOrder/'+back_order_id, function(data){
                $('.FixSpecModalShow').html(data);
            });

        });
    });

</script>
