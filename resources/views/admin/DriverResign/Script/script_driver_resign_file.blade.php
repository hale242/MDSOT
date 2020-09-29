<script>
    $('body').on('click','.btn-file',function(data){
        var id = $(this).data('id');
        $('#driver_resign_id').val(id);
        $('#ModalDriverResignFile').modal('show');
        DriverResignFileDatatable();
    });

    var driver_file_no = 0;
    function DriverResignFileDatatable(){
        var tableDriverResignFile = $('#tableDriverResignFile').dataTable({
            "ajax": {
                "url": url_gb+"/admin/DriverResignFile/Lists",
                "type":"POST", "data": function ( d ) {
                    d.driver_resign_id = $('#driver_resign_id').val()
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "driver_resign_file_name"},
                {"data" : "driver_resign_file_file_name"},
                {"data" : "driver_resign_file_details"},
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
            tableDriverResignFile.api().ajax.reload();
        }
        driver_file_no++;
    }

    $('body').on('submit', '#FormDriverResignFile', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverResignFile",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                DriverResignFileDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverResignFile/ChangeStatus/"+id,
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

    $('body').on('click', '.btn-cancel-file', function(){
        $('#add_driver_resign_file_name').val('');
        $('#add_driver_resign_file_file_name').val('');
        $('#add_driver_resign_file_details').val('');
        $('#add_driver_resign_file_status').val('');
    });

    $('body').on('change','.upload-file',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
             url : url_gb+'/admin/UploadFile/DriverResignFile',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(res){
                 ele.closest('.form-upload').find('.upload-file').append('<input type="hidden" name="driver_resign_file_file_name" value="'+res.path+'">');
                 setTimeout(function(){

                 },100);
             }
        });
    });
</script>
