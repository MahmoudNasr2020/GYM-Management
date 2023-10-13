<script>
    $('#send_message').on('click',function(e){
        e.preventDefault();
        $('#input__name_group').css('display','none'); //to clear name field
        $('#input_name').val(''); //to clear name field
        $('#input_message').val(''); //to clear name field
        $('#member_id').val(''); //to clear name field
        $('#form_type').val(''); //to clear name field
        $('#form_type').val('all_members'); //to clear name field
        $('#span_message').text(' الي كل الاعضاء '); //to clear name field
        $('#send_message_modal').modal('show');
        
    });
    
    $(document).on('click','.send_message',function(e){
        e.preventDefault();
        $('#input__name_group').css('display','block'); //to clear name field
        $('#input_name').val($(this).data('member_name')); //to clear name field
        $('#input_message').val(''); //to clear name field
        $('#member_id').val($(this).data('member_id')); //to clear name 
        $('#form_type').val(''); //to clear name field
        $('#form_type').val('single_member'); //to clear name field
        $('#span_message').text(' الي '+ $(this).data('member_name') ); //to clear name field
        $('#send_message_modal').modal('show');
        
    });

    $('#send_message_form').on('submit',function(e){
        e.preventDefault();
        var data = $(this).serializeArray();
        if($('#form_type').val() == 'all_members')
        {
            var id = [];
            $('.send_message').each(function(){
                //this function to pass all row checked to array
                id.push($(this).data('member_id'));
                
            });
            data.push({name:'id',value:id});  //to set put http in form to send it

            $.ajax({
                //this code to update session
                method:'POST',
                url:"{{ route('admin.indebted_members.send_message')}}",
                data:data,
                beforeSend:function(){
                    $('#submit_button_send').attr('disabled','disabled'); //to set button disabled even process success or reject
                },
                success:function (data){
                    $('#show_members').DataTable().ajax.reload(null, false);
                    $('#submit_button_send').removeAttr('disabled'); //to remove button disabled
                    $('#send_message_modal').modal('hide');
                    if(data.error==true)
                    {
                        @include('system.admin.layouts.include.message.messageManuallyError',['msg'=>'هذا العضو غير موجود']) //include success message
    
                    }
                    else
                    {
                        //if process successful
                        $('#send_message_form')[0].reset(); //to clear form after process
                        @include('system.admin.layouts.include.message.messageSuccess',['msg'=>'تم ارسال الرسالة بنجاح']) //include success message
                    }
    
                },
                error:function (reject){
                    //if process unsuccessful
                    $('#submit_button_send').removeAttr('disabled'); //to remove button disabled
                    $.each(reject.responseJSON.errors,function(key,val){
                        //this loop to print any error
                        @include('system.admin.layouts.include.message.messageError') //include error message
                    });
                },
            }); 
        }
        else if($('#form_type').val() == 'single_member')
        {
            $.ajax({
                //this code to update session
                method:'POST',
                url:"{{ route('admin.indebted_members.send_message')}}",
                data:data,
                beforeSend:function(){
                    $('#submit_button_send').attr('disabled','disabled'); //to set button disabled even process success or reject
                },
                success:function (data){
                    $('#show_members').DataTable().ajax.reload(null, false);
                    $('#submit_button_send').removeAttr('disabled'); //to remove button disabled
                    $('#send_message_modal').modal('hide');
                    if(data.error==true)
                    {
                        @include('system.admin.layouts.include.message.messageManuallyError',['msg'=>'هذا العضو غير موجود']) //include success message
    
                    }
                    else
                    {
                        //if process successful
                        $('#send_message_form')[0].reset(); //to clear form after process
                        @include('system.admin.layouts.include.message.messageSuccess',['msg'=>'تم ارسال الرسالة بنجاح']) //include success message
                    }
    
                },
                error:function (reject){
                    //if process unsuccessful
                    $('#submit_button_send').removeAttr('disabled'); //to remove button disabled
                    $.each(reject.responseJSON.errors,function(key,val){
                        //this loop to print any error
                        @include('system.admin.layouts.include.message.messageError') //include error message
                    });
                },
            }); 
        }
    });
</script>