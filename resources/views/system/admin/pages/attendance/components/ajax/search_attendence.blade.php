<script>
    $('#search_attendence_form').on('submit',function(e){
        e.preventDefault();
        let table = $('#show_attendance');
        let attendance_date = $('#attendance_date').val();
        $('#attendance_date').attr('data-value',attendance_date); //to set date in attributes data value
        $('.loader').css('display','block');
        $('#submit_button_search').attr('disabled','disabled');
        setTimeout(function(){
            $('.loader').css('display','none');
            $('#card_table').css('display','block');
            $('#submit_button_search').removeAttr('disabled');
            table.DataTable({
                processing: true,
                serverSide: true,
                dataType: "json",
                //"sAjaxDataProp": "",
                dataSrc: '',
                dom: 'Blfrtip',
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
                "bDestroy": true, //to destroy data in datatables when make request
               ajax:{
                   url: "{{ route('admin.attendance.search_attendence') }}",
                   method:"POST",
                   //dataSrc: '',
                   data:{
                    attendance_date:attendance_date,
                 },
               },
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data:'name', name:'name'},
                   {data:'attendance', name:'attendance',searchable:false,orderable:false},
                   {data:'note', name:'note',searchable:false,orderable:false},

               ]
           });
        },2000);

    });

</script>
