@include('system.admin.pages.members_expired_already.components.ajax.send_message')

<script>
    
    $('#reload_table').on('click',function (){
        $('#session_table').DataTable().ajax.reload(null, false);  //to reloade dataTables

    });
    
    var table = $('#show_members').DataTable({
        processing: true,
        serverSide: true,
        dataType: "json",
        //"sAjaxDataProp": "",
        dataSrc: '',
        dom: 'Blfrtip',
        "bDestroy": true, //to destroy data in datatables when make request
        ajax: "{{ route('admin.expired_already_members.getExpiredMembersAlready') }}",
        buttons: [
                    {
                        extend: 'csv',
                    },
                    {
                        extend: 'pdf',
                    },
                    {
                        extend: 'print',
                    },
        ],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'finished_date', name: 'finished_date'},
            {data: 'action',name: 'action',orderable: true,searchable: true},
            {data: 'multi_send',name: 'multi_send',orderable: false,searchable: false},
        ]
    });

</script>
