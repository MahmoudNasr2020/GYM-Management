@include('system.admin.pages.invoices.components.ajax.add')
@include('system.admin.pages.invoices.components.ajax.edit')
@include('system.admin.pages.invoices.components.ajax.update')
@include('system.admin.pages.invoices.components.ajax.delete')
@include('system.admin.pages.invoices.components.ajax.multi_delete')
@include('system.admin.pages.invoices.components.ajax.enquiry_of_remaining')
@include('system.admin.pages.invoices.components.ajax.remaining')

<script>
    
    $('#reload_table').on('click',function (){
        $('#session_table').DataTable().ajax.reload(null, false);  //to reloade dataTables

    });
    
    var table = $('#show_invoices').DataTable({
        processing: true,
        serverSide: true,
        dataType: "json",
        //"sAjaxDataProp": "",
        dataSrc: '',
        dom: 'Blfrtip',
        "bDestroy": true, //to destroy data in datatables when make request
        ajax:{
            url: "{{ route('admin.invoice.getInvoices') }}",
            method:"GET",
            //dataSrc: '',
            data:{
                member_id:"{{ request()->route('id') }}"
             },

        },
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
            {data: 'fee', name: 'fee'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'paid_up', name: 'paid_up'},
            {data: 'remaining', name: 'remaining'},
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
