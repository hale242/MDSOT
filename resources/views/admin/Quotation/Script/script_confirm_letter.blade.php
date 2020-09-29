<script>
    $('body').on('click', '.btn-confirm-letter', function(data){
        var quotation_id = $(this).data('id');
        $('#confirm_quotation_quotation_id').val(quotation_id);
        $('#add_confirm_quotation_file_part').prop('required', true);
        $('#ModalConfirmLetter').modal('show');
        ConfirmQuotationDatatable();
    });

    $('body').on('click','.btn-clear-form-confirm-letter',function(data){
        $('#confirm_quotation_id').val('');
        $('#add_confirm_quotation_address').val('');
        $('#add_confirm_quotation_car').val('');
        $('#add_confirm_quotation_nationality').val('');
        $('#add_confirm_quotation_other').val('');
        $('#add_confirm_quotation_date_sign	').val('');
        $('#add_confirm_quotation_file').val('');
        $('#add_confirm_quotation_file_part').val('').change();
    });

    $('body').on('click','.btn-edit-confirm-quotation',function(data){
        var id = $(this).data('id');
        var btn = $(this);
        $('#edit_id').val(id);
        loadingButton(btn);
        $.ajax({
          method: "GET",
          url: url_gb+"/admin/ConfirmQuotation/"+id,
          data: {
              id: id
          }
        }).done(function(res) {
          resetButton(btn);
          var data = res.content;
          $("#confirm_quotation_id").val(data.confirm_quotation_id);
          $("#add_confirm_quotation_address").val(data.confirm_quotation_address);
          $("#add_confirm_quotation_car").val(data.confirm_quotation_car);
          $("#add_confirm_quotation_nationality").val(data.confirm_quotation_nationality);
          $("#add_confirm_quotation_other").val(data.confirm_quotation_other);
          $("#add_confirm_quotation_date_sign	").val(data.confirm_quotation_date_sign);
          $("#add_confirm_quotation_file").val(data.confirm_quotation_file);
          if(data.confirm_quotation_status == 1){
              $('#add_confirm_quotation_status').prop('checked', true);
          }else{
              $('#add_confirm_quotation_status').prop('checked', false);
          }
          $('#add_confirm_quotation_file_part').prop('required', false);
        }).fail(function(res) {
          resetButton(form.find('button[type=submit]'));
          swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    var confirm_quotation_no = 0;
    function ConfirmQuotationDatatable(){
        var tableConfirmQuotation = $('#tableConfirmQuotation').dataTable({
            "ajax": {
                "url": url_gb+"/admin/ConfirmQuotation/Lists",
                "type":"POST", "data": function ( d ) {
                    d.quotation_id = $('#confirm_quotation_quotation_id').val();
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false},
                {"data" : "confirm_quotation_address"},
                {"data" : "confirm_quotation_car"},
                {"data" : "confirm_quotation_nationality"},
                {"data" : "confirm_quotation_other"},
                {"data" : "confirm_quotation_date_sign" , "class":"text-center" , "searchable": false},
                {"data" : "confirm_quotation_file"},
                {"data" : "confirm_quotation_file_part", "searchable": false, "sortable": false},
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
        if(confirm_quotation_no > 0){
            tableConfirmQuotation.api().ajax.reload();
        }else{
            confirm_quotation_no++;
        }
    }

    $('body').on('submit', '#FormConfirmLetter', function(e) {
        e.preventDefault();
        var form = $(this);
        var id = $('#confirm_quotation_id').val();
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: id ? "PUT" : "POST",
            url: id ? url_gb + "/admin/ConfirmQuotation/"+id : url_gb + "/admin/ConfirmQuotation",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#confirm_quotation_file_part').val('').change();
                $('#confirm_quotation_quotation_id').val(res.quotation_id);
                ConfirmQuotationDatatable();
                tableQuotation.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-confirm-quotatin-status',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/ConfirmQuotation/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                tableQuotation.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.upload-file-confirm-quotation',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        if(ele[0].files[0]){
            $.ajax({
                url : url_gb+'/admin/UploadFile/ConfirmQuotation',
                type : 'POST',
                data : formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success : function(res){
                  ele.closest('.form-upload').find('.upload-file-confirm-quotation').append('<input type="hidden" name="confirm_quotation_file_part" value="'+res.path+'">');
                  setTimeout(function(){

                  },100);
                }
            });
        }
    });
</script>
