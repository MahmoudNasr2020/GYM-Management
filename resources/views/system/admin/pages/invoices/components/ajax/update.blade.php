<script>
    $('#edit_invoice').submit(function(e){
        e.preventDefault();
        let data = $(this).serializeArray(); //insert data from form in data variable
        let id = $('#id').val(); //to set id from id input in id variable
        let route = $(this).data('route'); //to save route of this element in variable route
        $.ajax({
            //this code to update session
            method:'POST',
            url:route,
            data:data,
            beforeSend:function(){
                $('#submit_button_edit').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                $('#show_invoices').DataTable().ajax.reload(null, false);
                $('#submit_button_edit').removeAttr('disabled'); //to remove button disabled
                //$('#subjectGroupTable').DataTable().ajax.reload(null, false); //reload datatables
                if(data.error==true && data.msg=='404')
                {
                    @include('system.admin.layouts.include.message.message404') //if element exists

                } 
                else if(data.error==true && data.msg=='200')
                {
                    @include('system.admin.layouts.include.message.messageManuallyError',['msg'=>'هذه الفاتورة موجودة بالفعل']) //include success message //include success message

                }
                if(data.error==false)
                {
                    //if process successful
                    $('#edit_invoice')[0].reset(); //to clear form after process
                    $('#edit_invoice_modal').modal('hide');
                    @include('system.admin.layouts.include.message.messageSuccess',['msg'=>'تم التعديل بنجاح']) //include success message
                }

            },
            error:function (reject){
                //if process unsuccessful
                $('#submit_button_edit').removeAttr('disabled'); //to remove button disabled
                $.each(reject.responseJSON.errors,function(key,val){
                    //this loop to print any error
                    @include('system.admin.layouts.include.message.messageError') //include error message
                });
            },
        });
    });
</script>
