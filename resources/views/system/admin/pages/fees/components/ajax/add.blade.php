<script>
    $('#add_fee').submit(function(e){
        e.preventDefault(); //prevent page reload
        let data = $(this).serialize(); //insert data from form in data variable
        $.ajax({
            //this code to store session
            method:'POST',
            url:"{{ route('admin.fees.store') }}",
            data:data,
            beforeSend:function(){
                $('#submit_button').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                //if process successful
                if(data.error==false)
                {
                    $('#submit_button').removeAttr('disabled'); //to remove button disabled
                    $('#add_fee')[0].reset(); //to clear form after process
                    $('#show_fees').DataTable().ajax.reload(null, false);  //to reloade dataTables
                    $('#add_fee_modal').modal('hide');
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
