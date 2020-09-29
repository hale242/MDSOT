<script>
    $('body').on('click', '.btn-attach-contract', function(){
        var id = $(this).data('id');
        var btn = $(this);
        $('#add_driver_id').val(id);
        $("#ModalAttachContract").modal('show');
        DriverContractFileDatatable();
    });

    var driver_contract_file_no = 0;
    function DriverContractFileDatatable(){
        var tableDriverContractFile = $('#tableDriverContractFile').dataTable({
            "ajax": {
                "url": url_gb+"/admin/DriverContractFile/Lists",
                "type":"POST", "data": function ( d ) {
                    d.driver_id = $('#add_driver_id').val()
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "driver_contract_file_name"},
                {"data" : "driver_contract_file_details"},
                {"data" : "driver_contract_file_filename"},
                {"data" : "driver_salary"},
                {"data" : "driver_contract_file_filedate" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "driver_contract_file_date_end" , "class":"text-center" , "searchable": false, "sortable": false,},
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
        if(driver_contract_file_no > 0){
            tableDriverContractFile.api().ajax.reload();
        }
        driver_contract_file_no++;
    }

    $('body').on('submit', '#FormAttachContract', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverContractFile",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                DriverContractFileDatatable();
                tableInterview.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-contract-file',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverContractFile/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                tableInterview.api().ajax.reload();
                // swal(res.title, res.content, 'success');
                // tableAdminUser.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.upload-file',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
             url : url_gb+'/admin/UploadFile/ContractFile',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(res){
                 ele.closest('.form-upload').find('.upload-file').append('<input type="hidden" name="driver_contract_file_filename" value="'+res.path+'">');
                 setTimeout(function(){

                 },100);
             }
        });
    });
</script>
