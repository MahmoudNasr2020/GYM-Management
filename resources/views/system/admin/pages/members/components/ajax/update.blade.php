<script>
    $('#edit_member').submit(function(e){
        e.preventDefault();
        let data = new FormData(this); //insert data from form in data variable
        let id = $('#id').val(); //to set id from id input in id variable
        let route = $(this).data('route') +'/'+ id ; //to save route of this element in variable route
        data.append('_method','PUT');  //to set put http in form to send it
        $.ajax({
            //this code to update session
            method:'POST',
            url:route,
            cache:false,
            processData:false,
            contentType:false,
            data:data,
            beforeSend:function(){
                $('#submit_button_edit').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                $('#show_members').DataTable().ajax.reload(null, false);
                $('#submit_button_edit').removeAttr('disabled'); //to remove button disabled
                //$('#subjectGroupTable').DataTable().ajax.reload(null, false); //reload datatables
                if(data.error==true)
                {
                    @include('system.admin.layouts.include.message.message404') //if element exists

                }
                else
                {
                    //if process successful
                    $('#edit_member')[0].reset(); //to clear form after process
                    $('#edit_member_modal').modal('hide');
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
