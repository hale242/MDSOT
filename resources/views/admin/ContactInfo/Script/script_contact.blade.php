<script>
    $('body').on('click', '.btn-contact', function(){
        var id = $(this).data('id');
        $('#contact_customer_id').val(id);
        $('#ModalContact').modal('show');
        ContactDatatable();
    });

    var contact_no = 0;
    function ContactDatatable(){
        var tableContact = $('#tableContact').dataTable({
            "ajax": {
                "url": url_gb+"/admin/Contact/Lists",
                "type":"POST", "data": function ( d ) {
                    d.customer_id = $('#contact_customer_id').val();
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {
                    "data" : "action" ,
                    "name" : "action",
                    "searchable": false,
                    "sortable": false,
                    "class" : "text-center"
                },
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "contact_info_title" , "class":"text-center"},
                {"data" : "contact_info_details"},
                {"data" : "contact_info_customer_name"},
                {"data" : "contact_info_phone"},
                {"data" : "contact_info_email"},
                {"data" : "contact_info_line"},
                {"data" : "contact_info_address"},
               

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
        if(contact_no > 0){
            tableContact.api().ajax.reload();
        }
        contact_no++;
    }

    $('body').on('click', '.btn-contact-add', function(){
        var id = $('#contact_customer_id').val();
        $('#add_contact_customer_id').val(id);
        $('#ModalContactAdd').modal('show');
    });

    $('body').on('submit', '#FormContactAdd', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/Contact",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_contact_info_provice_id').val('').change();
                ContactDatatable();
                $('#ModalContactAdd').modal('hide');
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    $('body').on('change','.change-status-contact',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/Contact/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {
                // swal(res.title, res.content, 'success');
                // tableNamePrefix.api().ajax.reload();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });
</script>
