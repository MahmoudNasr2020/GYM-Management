@include('system.admin.pages.members.components.ajax.add')
@include('system.admin.pages.members.components.ajax.edit')
@include('system.admin.pages.members.components.ajax.update')
@include('system.admin.pages.members.components.ajax.delete')
@include('system.admin.pages.members.components.ajax.multi_delete')
@include('system.admin.pages.members.components.ajax.status_member')

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
        ajax: "{{ route('admin.getMembers') }}",
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
            {data: 'type', name: 'type'},
            {data: 'date_joining', name: 'date_joining'},
            {data: 'age', name: 'age'},
            {data: 'status', name: 'status'},
            {data: 'action',name: 'action',orderable: true,searchable: true},
            {data: 'multi_delete',name: 'multi_delete',orderable: false,searchable: false},
        ]
    });

     $('[data-toggle="datepicker"]').datepicker({
        language: 'ar-AE',
        autoPick:true,
        zIndex:99999999,
    });

</script>
