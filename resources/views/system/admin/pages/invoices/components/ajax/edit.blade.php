<script>
    $(document).on('click','.edit_element',function(e){
       //this code to get data of element to update that
       e.preventDefault();
        let id = $(this).data('id'); //to save id of this element in variable id
        let route = $(this).data('route'); //to save route of this element in variable route
        $('#fee_edit .fee_option').removeAttr('selected'); //to clear name field
        $('#status_edit .status_option').removeAttr('selected'); //to clear name field
        $('#start_date_edit').val(''); //to clear name field
        $('#end_date_edit').val(''); //to clear name field
        $('#paid_up_edit').val(''); //to clear name field
        $('#id').val(''); //to clear name field
        $.ajax({
            method:'POST',
            url:route,
            success:function (data)
            {
                if(data.error===true)
                {
                    $('#show_invoices').DataTable().ajax.reload(null, false);  //to reloade dataTables
                    @include('system.admin.layouts.include.message.message404') //include message error if element doesn't exists
                }
                else
                {
                    $('#fee_edit .fee_option[value='+data.data.fee_id+']').attr('selected','selected');
                    $('#status_edit .status_option[value='+data.data.status+']').attr('selected','selected');
                    $('#start_date_edit').val(data.data.start_date); //to clear name field
                    $('#end_date_edit').val(data.data.end_date); //to clear name field
                    $('#paid_up_edit').val(data.data.paid_up); //to clear name field
                    $('#id').val(data.data.id); //to set id in id field
                    $('#edit_invoice_modal').modal('show');
                }
            }

        });
    });
</script>
