<script>
    var file_no = 0;
    function FileDocumentDatatable(){
        var tableFileDocument = $('#tableFileDocument').dataTable({
            "ajax": {
                "url": url_gb + "/admin/Document/Lists",
                "type":"POST", "data": function( d ) {
                    d.company_id_search = $('#company_id_search').val();
                    d.member_id_search = $('#member_id_search').val();
                    d.customer_id_search = $('#customer_id_search').val();
                    d.document_customer_date = $('#document_customer_date_search').val();


                    d.company_id = $('#company_id').val();
                    d.member_id = $('#member_id').val();
                    d.customer_id = $('#customer_id').val();
                    d.page = "{{isset($Page) ? $Page : ''}}";

                    // etc
                }
            },
            "drawCallback": function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {
                    "data": "action",
                    "name": "action",
                    "searchable": false,
                    "sortable": false,
                    "class": "text-center"
                },                
                {
                    "data": "DT_RowIndex",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "file",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "customer_name",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "member_name_th",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "company_name_th",
                    "class": "text-center"
                },
                {
                    "data": "type_doc_customer_name",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "document_customer_comment",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "date",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
               

            ],
            "select": true,
            "dom": 'Bfrtip',
            "lengthMenu": [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "columnDefs": [{
                className: 'noVis',
                visible: false
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
        if(file_no > 0){
            tableFileDocument.api().ajax.reload();
        }
        file_no++;
    }

    $('body').on('change', '.change-status-document-file', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Document/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // FileDocumentDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('submit', '#FormFileDocumentAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Document",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_type_doc_customer_name').val('').change();
                FileDocumentDatatable();
                $('#ModalFileDocumentAdd').modal('hide');
                MemberFileDocumentDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.upload-document-file',function(){
        var ele = $(this);
        var index = ele.data('index');
        var formData = new FormData();
        formData.append('file', ele[0].files[0]);
        $.ajax({
             url : url_gb+'/admin/UploadFile/Document',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(res){
                 ele.closest('.form-upload').find('.upload-document-file').append('<input type="hidden" name="document_customer_part" value="'+res.path+'">');
                 setTimeout(function(){

                 },100);
             }
        });
    });
</script>
