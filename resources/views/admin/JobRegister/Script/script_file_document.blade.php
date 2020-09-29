<script>
    $('body').on('click','.btn-file-document',function(data){
        var id = $(this).data('id');
        $('#add_driver_file_driver_id').val(id);
        $('#ModalFileDocument').modal('show');
        DriverFileDatatable();
    });

    var driver_file_no = 0;
    function DriverFileDatatable(){
        var tableDriverFile = $('#tableDriverFile').dataTable({
            "ajax": {
                "url": url_gb+"/admin/DriverFile/Lists",
                "type":"POST", "data": function ( d ) {
                    d.driver_id = $('#add_driver_file_driver_id').val()
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "type_doc_driver_name" , "name":"type_doc_driver.type_doc_driver_name"},
                {"data" : "driver_file_name"},
                {"data" : "driver_file_details"},
                {"data" : "driver_file_date" , "class":"text-center" , "searchable": false, "sortable": false,},
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
        if(driver_file_no > 0){
            tableDriverFile.api().ajax.reload();
        }
        driver_file_no++;
    }

    $('body').on('submit', '#FormDriverFile', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#driver_file_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: id ? 'PUT' : "POST",
            url: id ? url_gb+"/admin/DriverFile/"+id : url_gb+"/admin/DriverFile",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                $('#add_type_doc_driver_id').prop('disabled', false);
                DriverFileDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click','.btn-edit-driver-file',function(data){
        var id = $(this).data('id');
        $('#driver_file_id').val(id);
        $.ajax({
            method: "GET",
            url: url_gb+"/admin/DriverFile/"+id,
        }).done(function(res) {
            var data = res.content;
            $('#add_type_doc_driver_id').val(data.type_doc_driver_id).change();
            $('#add_type_doc_driver_id').prop('disabled', true);
            $('#add_driver_file_date').val(data.format_driver_file_date);
            $('#add_driver_file_name').val(data.driver_file_name);
            $('#add_driver_file_details').val(data.driver_file_details);
            if(data.driver_file_status == 1){
                $('#add_driver_file_status').prop('checked', true);
            }else{
                $('#add_driver_file_status').prop('checked', false);
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-driver-file',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverFile/ChangeStatus/"+id,
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

    $('body').on('click', '.btn-cancel-deriver-file', function(){
        $('#driver_file_id').val('');
        $('#add_type_doc_driver_id').val('').change();
        $('#add_type_doc_driver_id').prop('disabled', false);
        $('#add_driver_file_date').val('');
        $('#add_driver_file_name').val('');
        $('#add_driver_file_details').val('');
        $('#add_driver_file_status').prop('checked', true);
    });

    $('body').on('change','.upload-driver-file',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
             url : url_gb+'/admin/UploadFile/DriverFile',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(res){
                 ele.closest('.form-upload').find('.upload-driver-file').append('<input type="hidden" name="driver_file_name" value="'+res.path+'">');
                 setTimeout(function(){

                 },100);
             }
        });
    });
</script>
