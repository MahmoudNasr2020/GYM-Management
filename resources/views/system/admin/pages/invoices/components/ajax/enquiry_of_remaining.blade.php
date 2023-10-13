<script>
    $(document).on('click','#btn_remainig',function(e){
       //this code to get data of element to update that
       e.preventDefault();
        let member_id = $(this).data('member_id'); //to save id of this element in variable id
        let route = $(this).data('route'); //to save route of this element in variable route
        $('#remaining_count').val(''); //to clear remaining_count field
        $.ajax({
            method:'POST',
            url:route,
            data:{member_id:member_id},
            success:function (data)
            {
                if(data.error===true)
                {
                    $('#show_invoices').DataTable().ajax.reload(null, false);  //to reloade dataTables
                    @include('system.admin.layouts.include.message.message404') //include message error if element doesn't exists
                }
                else
                {
                    $('#remaining_count').val(data.data); //to clear name field
                    $('#show_remaining').modal('show');
                }
            }

        });
    });
</script>
