<script>
    $('body').on('click', '.btn-file', function(data){
        var quotation_id = $(this).data('quotation-id');
        $('#quotation_pre_approve_file_quotation_id').val(quotation_id);
        $('#ModalQuotationPreApproveFile').modal('show');
        QuotationPreApproveFileDatatable();
    });

    var quotation_pre_approve_file_no = 0;
    function QuotationPreApproveFileDatatable(){
        var tableQuotationPreApproveFile = $('#tableQuotationPreApproveFile').dataTable({
            "ajax": {
                "url": url_gb+"/admin/QuotationPreApproveFile/Lists",
                "type":"POST", "data": function ( d ) {

                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "quotation_pre_approve_file_title"},
                {"data" : "quotation_pre_approve_file_file_name", "searchable": false, "sortable": false},
                {"data" : "quotation_pre_approve_file_details"},
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
        if(quotation_pre_approve_file_no > 0){
            tableQuotationPreApproveFile.api().ajax.reload();
        }else{
            quotation_pre_approve_file_no++;
        }
    }

    $('body').on('submit', '#FormQuotationPreApproveFile', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/QuotationPreApproveFile",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_quotation_pre_approve_file_file_name').val('').change();
                QuotationPreApproveFileDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.upload-file-pre-approve',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        if(ele[0].files[0]){
            $.ajax({
                url : url_gb+'/admin/UploadFile/QuotationPreApproveFile',
                type : 'POST',
                data : formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success : function(res){
                  ele.closest('.form-upload').find('.upload-file-pre-approve').append('<input type="hidden" name="quotation_pre_approve_file_file_name" value="'+res.path+'">');
                  setTimeout(function(){

                  },100);
                }
            });
        }
    });
</script>
