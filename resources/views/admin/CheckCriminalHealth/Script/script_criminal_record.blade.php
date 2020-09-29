<script>
    $('body').on('click', '.btn-criminal-record', function(){
        var id = $(this).data('id');
        $('#add_cr_driver_interview_id').val(id);
        $('#ModalCriminalRecord').modal('show');
        DriverCriminalRecordDatatable();
    });

    var driver_criminal_record_no = 0;
    function DriverCriminalRecordDatatable(){
        var tableDriverCriminalRecord = $('#tableDriverCriminalRecord').dataTable({
            "ajax": {
                "url": url_gb+"/admin/DriverCriminalRecord/Lists",
                "type":"POST", "data": function ( d ) {
                    d.driver_interview_id = $('#add_cr_driver_interview_id').val()
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "driver_criminal_record_name"},
                {"data" : "driver_criminal_record_details"},
                {"data" : "driver_criminal_type_name" , "name":"driver_criminal_type.driver_criminal_type_name"},
                {"data" : "driver_criminal_record_file"},
                {"data" : "driver_criminal_record_date_doc"},
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
        if(driver_criminal_record_no > 0){
            tableDriverCriminalRecord.api().ajax.reload();
        }
        driver_criminal_record_no++;
    }

    $('body').on('submit', '#FormDriverCriminalRecord', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverCriminalRecord",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                form.find('.select2').val('').change();
                $('#add_driver_criminal_record_file').val('').change();
                $('#add_cr_driver_interview_id').val(res.driver_interview_id);
                DriverCriminalRecordDatatable();
                tableInterview.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.upload-criminal-record-file',function(){
        var ele = $(this);
        if(ele.val()){
            var index = ele.data('index');
            var formData = new FormData();
            formData.append('file', ele[0].files[0]);
            $.ajax({
                 url : url_gb+'/admin/UploadFile/DriverCriminalRecord',
                 type : 'POST',
                 data : formData,
                 processData: false,  // tell jQuery not to process the data
                 contentType: false,  // tell jQuery not to set contentType
                 success : function(res){
                     ele.closest('.form-upload').find('.upload-criminal-record-file').append('<input type="hidden" name="driver_criminal_record_file" value="'+res.path+'">');
                     setTimeout(function(){

                     },100);
                 }
            });
        }
    });
</script>
