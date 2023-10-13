<script>
    $('#remaining_form').submit(function(e){
        e.preventDefault(); //prevent page reload
        let data = $(this).serialize(); //insert data from form in data variable
        $.ajax({
            //this code to store session
            method:'POST',
            url:"{{ route('admin.invoice.remaining') }}",
            data:data,
            beforeSend:function(){
                $('#submit_button_remainig').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                //if process successful
                if(data.error==false)
                {
                    $('#submit_button_remainig').removeAttr('disabled'); //to remove button disabled
                    $('#show_invoices').DataTable().ajax.reload(null, false);  //to reloade dataTables
                    $('#show_remaining').modal('hide');
                    @include('system.admin.layouts.include.message.messageSuccess',['msg'=>'تم الحفظ بنجاح']) //include success message //include success message
                }

            },
            error:function (reject){
                //if process unsuccessful
                $('#submit_button_remainig').removeAttr('disabled'); //to remove button disabled
                $.each(reject.responseJSON.errors,function(key,val){
                    //this loop to print any error
                    @include('system.admin.layouts.include.message.messageError') //include error message
                });
            },
        });
    }
    );
</script>
