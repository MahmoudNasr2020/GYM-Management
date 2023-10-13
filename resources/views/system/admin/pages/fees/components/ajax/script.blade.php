@include('system.admin.pages.fees.components.ajax.add')
@include('system.admin.pages.fees.components.ajax.edit')
@include('system.admin.pages.fees.components.ajax.update')
@include('system.admin.pages.fees.components.ajax.delete')
@include('system.admin.pages.fees.components.ajax.multi_delete')

<script>
    
    $('#reload_table').on('click',function (){
        $('#session_table').DataTable().ajax.reload(null, false);  //to reloade dataTables

    });
    
    var table = $('#show_fees').DataTable({
        processing: true,
        serverSide: true,
        dataType: "json",
        //"sAjaxDataProp": "",
        dataSrc: '',
        dom: 'Blfrtip',
        "bDestroy": true, //to destroy data in datatables when make request
        ajax: "{{ route('admin.getfees') }}",
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
            {data: 'amount', name: 'amount'},
            {data: 'action',name: 'action',orderable: true,searchable: true},
            {data: 'multi_delete',name: 'multi_delete',orderable: false,searchable: false},
        ]
    });

</script>
