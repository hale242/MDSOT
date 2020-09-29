<script>
    var people_guarantee_file_no = 0;
    function PeopleGuaranteeFileDatatable(){
        var tablePeopleGuaranteeFile = $('#tablePeopleGuaranteeFile').dataTable({
            "ajax": {
                "url": url_gb+"/admin/PeopleGuaranteeFile/Lists",
                "type":"POST", "data": function ( d ) {
                    d.people_guarantee_id = $('#add_people_guarantee_id').val()
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "people_guarantee_name" , "name":"people_guarantee.people_guarantee_name"},
                {"data" : "type_doc_driver_name" , "name":"type_doc_driver.type_doc_driver_name"},
                {"data" : "people_guarantee_file_name"},
                {"data" : "people_guarantee_file_date"},
                {"data" : "people_guarantee_file_details"},
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
        if(people_guarantee_file_no > 0){
            tablePeopleGuaranteeFile.api().ajax.reload();
        }
        people_guarantee_file_no++;
    }

    $('body').on('click','.btn-add-file',function(data){
        var id = $(this).data('id');
        var driver_name = $(this).data('driver-name');
        var name = $(this).data('name');
        $('#add_people_guarantee_id').val(id);
        $('#show_people_guarantee_file_driver_name').val(driver_name);
        $('#show_people_guarantee_name').val(name);
        $('#ModalPeopleGuaranteeFile').modal('show');
        PeopleGuaranteeFileDatatable();
    });

    $('body').on('submit', '#FormPeopleGuaranteeFile', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/PeopleGuaranteeFile",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                PeopleGuaranteeFileDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-guarantee-file',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/PeopleGuaranteeFile/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableAdminUser.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.upload-people-guarantee-file',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
             url : url_gb+'/admin/UploadFile/PeopleGuaranteeFile',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(res){
                 ele.closest('.form-upload').find('.upload-people-guarantee-file').append('<input type="hidden" name="people_guarantee_file_name" value="'+res.path+'">');
                 setTimeout(function(){

                 },100);
             }
        });
    });
</script>
