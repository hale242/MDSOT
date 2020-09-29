<script>
    $('body').on('click', '.btn-view-company', function(data) {
        var id = $(this).data('id');
        var btn = $(this);
        loadingButton(btn);
        $.ajax({
            method: "GET",
            url: url_gb + "/admin/CollectorGroup/" + id,
            data: {
                id: id
            }
        }).done(function(res) {
            resetButton(btn);
            var data = res.content;
            $('#add_collertor_group_id2').val(data.collertor_group_id).change();
            $('#add_collertor_group_name2').val(data.collertor_group_name);
            $('#ModalViewCompany').modal('show');
            TableCollectorCompanyDatatable();
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    var collectorcompany_user_on = 0;

    function TableCollectorCompanyDatatable() {
        var tableCollectorCompany = $('#tableCollectorCompany').dataTable({
            "ajax": {
                "url": url_gb + "/admin/CollectorCompany/Lists",
                "type":"POST", "data": function( d ) {
                    d.page = "{{isset($Page) ? $Page : ''}}";
                    d.collertor_group_id = $('#add_collertor_group_id2').val();
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
                    "data": "DT_RowIndex",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "company_name_th",
                    "class": "text-center",
                },
                {
                    "data": "approve_name",
                    "class": "text-center",
                    "searchable": false,
                    "sortable": false,
                },
                {
                    "data": "collertor_company_details",
                    "class": "text-center",
                },
                {
                    "data": "action",
                    "name": "action",
                    "searchable": false,
                    "sortable": false,
                    "class": "text-center"
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
        if (collectorcompany_user_on > 0) {
            tableCollectorCompany.api().ajax.reload();
        }
        collectorcompany_user_on++;
    }
    $('body').on('submit', '#FormAddCompany', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb + "/admin/CollectorCompany",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                // form[0].reset();
                form.find('.select2').val('').change();
                form.find('textarea').val('');

                TableCollectorCompanyDatatable()                
                // $('#ModalViewCompany').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
    
    $('body').on('change','.change-status-collector-company',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/CollectorCompany/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // TableCollectorCompanyDatatable()                
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>