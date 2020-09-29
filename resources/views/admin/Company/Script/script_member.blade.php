<script>
    $('body').on('click', '.btn-member', function() {
        var id = $(this).data('id');
        $('#member_company_id').val(id);
        $('#ModelMember').modal('show');
        MemberDatatable();
    });

    var member_no = 0;
    function MemberDatatable(){
        var tableMember = $('#tableMember').dataTable({
            "ajax": {
                "url": url_gb + "/admin/Member/Lists",
                "type":"POST", "data": function( d ) {
                    d.company_id = $('#member_company_id').val();
                    d.page = 'C';
                }
            },
            "drawCallback": function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status-member").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                // {"data" : "checkbox" , "class":"text-center" , "searchable": false, "sortable": false,},
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
                    "data": "company_name_th",
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
                    "data": "member_details",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "member_email",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "member_phone",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "member_tax_id",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "address",
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
        if(member_no > 0){
            tableMember.api().ajax.reload();
        }
        member_no++;
    }

    $('body').on('change', '.change-status-member', function(data) {
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/Member/ChangeStatus/" + id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // ContactInfoDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('click', '.btn-file-member', function() {
        var id = $(this).data('id');
        var company_id = $(this).data('company-id');
        $('#member_document_member_id').val(id);
        $('#member_document_company_id').val(company_id);
        $('#ModalMemberFileDocument').modal('show');

        $('.btn-add-file-document-member').data('id',id);
        $('.btn-add-file-document-member').data('company-id',company_id);

        MemberFileDocumentDatatable();
    });

    var file_no = 0;
    function MemberFileDocumentDatatable(){
        var tableMemberFileDocument = $('#tableMemberFileDocument').dataTable({
            "ajax": {
                "url": url_gb + "/admin/Document/Lists",
                "type":"POST", "data": function( d ) {
                    d.company_id = $('#member_document_company_id').val();
                    d.member_id = $('#member_document_member_id').val();

                    // etc
                }
            },
            "drawCallback": function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                // {"data" : "checkbox" , "class":"text-center" , "searchable": false, "sortable": false,},
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
                    "class": "text-center"
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
                    "data": "type_doc_customer_name",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
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
            tableMemberFileDocument.api().ajax.reload();
        }
        file_no++;
    }


    $('body').on('click', '.btn-add-file-document-member', function(data) {
        var id = $(this).data('id');
        var company_id = $(this).data('company-id');
        $('#add_file_member_id').val(id);
        $('#add_file_company_id').val(company_id);
        $('#ModalFileDocumentAdd').modal('show');
    });
</script>
