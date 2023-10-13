<script>
    $('#add_member').submit(function(e){
        e.preventDefault(); //prevent page reload
        let data = new FormData(this); //insert data from form in data variable
        $.ajax({
            //this code to store session
            method:'POST',
            url:"{{ route('admin.members.store') }}",
            cache:false,
            processData:false,
            contentType:false,
            data:data,
            beforeSend:function(){
                $('#submit_button').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                //if process successful
                if(data.error==false)
                {
                    $('#submit_button').removeAttr('disabled'); //to remove button disabled
                    $('#add_member')[0].reset(); //to clear form after process
                    $('#photo').val('');
                    $('#label_photo').text('');
                    $('#show_members').DataTable().ajax.reload(null, false);  //to reloade dataTables
                    $('#add_member_modal').modal('hide');
                    @include('system.admin.layouts.include.message.messageSuccess',['msg'=>'تم الحفظ بنجاح']) //include success message //include success message
                }

            },
            error:function (reject){
                //if process unsuccessful
                $('#submit_button').removeAttr('disabled'); //to remove button disabled
                $.each(reject.responseJSON.errors,function(key,val){
                    //this loop to print any error
                    @include('system.admin.layouts.include.message.messageError') //include error message
                });
            },
        });
    }
    );
</script>
