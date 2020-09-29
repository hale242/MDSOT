<script>
    $('body').on('click', '.btn-health', function(){
        var id = $(this).data('id');
        $('#add_h_driver_interview_id').val(id);
        $('#ModalHealth').modal('show');
        DriverHealthRecordDatatable();
    });

    var driver_health_record_no = 0;
    function DriverHealthRecordDatatable(){
        var tableDriverHealthRecord = $('#tableDriverHealthRecord').dataTable({
            "ajax": {
                "url": url_gb+"/admin/DriverHealthRecord/Lists",
                "type":"POST", "data": function ( d ) {
                    d.driver_interview_id = $('#add_h_driver_interview_id').val()
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "driver_health_record_name"},
                {"data" : "driver_health_record_details"},
                {"data" : "driver_health_type_name" , "name":"driver_health_type.driver_health_type_name"},
                {"data" : "driver_health_record_file"},
                {"data" : "driver_health_record_date_doc"},
                {"data" : "status" , "class":"text-center" , "searchable": false, "sortable": false,},
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
        if(driver_health_record_no > 0){
            tableDriverHealthRecord.api().ajax.reload();
        }
        driver_health_record_no++;
    }

    $('body').on('submit', '#FormDriverHealth', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverHealthRecord",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                $('#add_driver_health_record_file').val('').change();
                $('#add_h_driver_interview_id').val(res.driver_interview_id);
                DriverHealthRecordDatatable();
                tableInterview.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.upload-health-file',function(){
        var ele = $(this);
        if(ele.val()){
            var index = ele.data('index');
            var formData = new FormData();
            formData.append('file', ele[0].files[0]);
            $.ajax({
                 url : url_gb+'/admin/UploadFile/DriverHealthRecord',
                 type : 'POST',
                 data : formData,
                 processData: false,  // tell jQuery not to process the data
                 contentType: false,  // tell jQuery not to set contentType
                 success : function(res){
                     ele.closest('.form-upload').find('.upload-health-file').append('<input type="hidden" name="driver_health_record_file" value="'+res.path+'">');
                     setTimeout(function(){

                     },100);
                 }
            });
        }
    });
</script>
