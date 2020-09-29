<script>
    $('body').on('click','.btn-line-approve',function(data){
        var id = $(this).data('id');
        var branch_name = $(this).data('branch-name');
        $('#driver_leave_line_branch_id').val(id);
        $('#driver_leave_line_branch_name').val(branch_name);
        $('#ModalLineApprove').modal('show');
        DriverLeaveLineApproveDatatable();
    });

    $('body').on('submit', '#FormLineApprove', function(e) {
        e.preventDefault();
        var form = $(this);
        loadingButton(form.find('button[type=submit]'));
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverLeaveLineApprove",
            data: form.serialize()
        }).done(function(res) {
            resetButton(form.find('button[type=submit]'));
            if (res.status == 1) {
                swal(res.title, res.content, 'success');
                form[0].reset();
                $('#add_position_id').val('').change();
                DriverLeaveLineApproveDatatable();
            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            resetButton(form.find('button[type=submit]'));
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

    var line_approve_no = 0;
    function DriverLeaveLineApproveDatatable(){
        var tableDriverLeaveLineApprove = $('#tableDriverLeaveLineApprove').dataTable({
            "ajax": {
                "url": url_gb+"/admin/DriverLeaveLineApprove/Lists",
                "type":"POST", "data": function ( d ) {
                    d.driver_leave_line_branch_id = $('#driver_leave_line_branch_id').val();
                }
            },
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
                $(".change-status").bootstrapToggle();
            },
            "retrieve": true,
            "columns": [
                {"data" : "DT_RowIndex" , "class":"text-center" , "searchable": false, "sortable": false,},
                {"data" : "position_name" , "name":"position.position_name"},
                {"data" : "driver_leave_line_approve_name"},
                {"data" : "driver_leave_line_approve_lv"},
                {"data" : "driver_leave_line_approve_details"},
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
        if(line_approve_no > 0){
            tableDriverLeaveLineApprove.api().ajax.reload();
        }else{
            line_approve_no++;
        }
    }

    $('body').on('change','.change-status-line-approve',function(data){
        var id = $(this).data('id');
        var status = $(this).is(':checked');
        $.ajax({
            method: "POST",
            url: url_gb+"/admin/DriverLeaveLineApprove/ChangeStatus/"+id,
            data: {
                id: id,
                status: status ? 1 : 0,
            }
        }).done(function(res) {
            if (res.status == 1) {

            } else {
                swal(res.title, res.content, 'error');
            }
        }).fail(function(res) {
            swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
        });
    });

</script>
