<script>
    $('body').on('click','.btn-attach-contract',function(data){
        var id = $(this).data('id');
        $('#customer_contract_file_customer_contract_id').val(id);
        $('#ModalAttachContract').modal('show');
        CustomerContractFileDtatatable();
    });

    var customer_contract_file_no = 0;
    function CustomerContractFileDtatatable(){
        var tableCustomerContractFile = $('#tableCustomerContractFile').dataTable({
            "ajax": {
                "url": url_gb+"/admin/CustomerContractFile/Lists",
                "type":"POST", "data": function ( d ) {

                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "customer_contract_file_type", "searchable": false, "sortable": false},
                {"data" : "customer_contract_file_date_file_all", "class":"text-center" ,"sortable": false},
                {"data" : "customer_contract_file_details"},
                {"data" : "customer_contract_file_file_doc", "searchable": false, "sortable": false},
                {"data" : "customer_contract_file_file_doc_date", "class":"text-center" ,"sortable": false},
                {"data" : "customer_contract_file_file_pdf", "searchable": false, "sortable": false},
                {"data" : "customer_contract_file_file_pdf_date", "class":"text-center" ,"sortable": false},
                {"data" : "customer_contract_file_date_contract_start", "class":"text-center" ,"sortable": false},
                {"data" : "customer_contract_file_date_contract_end", "class":"text-center" ,"sortable": false},
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
        if(customer_contract_file_no > 0){
            tableCustomerContractFile.api().ajax.reload();
        }else{
            customer_contract_file_no++;
        }
    }

    $('body').on('submit', '#FormAttachContract', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#cancel_customer_contract_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/CustomerContractFile",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_customer_contract_file_file_doc').val('').change();
                $('#add_customer_contract_file_file_pdf').val('').change();
                $('#customer_contract_file_customer_contract_id').val(res.customer_contract_id);
                CustomerContractFileDtatatable();
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
            url: url_gb+"/admin/CustomerContractFile/ChangeStatus/"+id,
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

    $('body').on('change','.upload-file-document',function(){
        var ele = $(this);
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        if(ele[0].files[0]){
            $.ajax({
                   url : url_gb+'/admin/UploadFile/CustomerContractFile',
                   type : 'POST',
                   data : formData,
                   processData: false,  // tell jQuery not to process the data
                   contentType: false,  // tell jQuery not to set contentType
                   success : function(res){
                       ele.closest('.form-upload').find('.preview-img').attr('src', res.link_preview);
                       ele.closest('.form-upload').find('.upload-file-document').append('<input type="hidden" name="customer_contract_file_file_doc" value="'+res.path+'">');
                       setTimeout(function(){

                       },100);
                   }
            });
        }
    });

    $('body').on('change','.upload-file-pdf',function(){
        var ele = $(this);
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        if(ele[0].files[0]){
            $.ajax({
                   url : url_gb+'/admin/UploadFile/CustomerContractFile',
                   type : 'POST',
                   data : formData,
                   processData: false,  // tell jQuery not to process the data
                   contentType: false,  // tell jQuery not to set contentType
                   success : function(res){
                       ele.closest('.form-upload').find('.preview-img').attr('src', res.link_preview);
                       ele.closest('.form-upload').find('.upload-file-pdf').append('<input type="hidden" name="customer_contract_file_file_pdf" value="'+res.path+'">');
                       setTimeout(function(){

                       },100);
                   }
            });
        }
    });
</script>
