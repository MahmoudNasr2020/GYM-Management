<script>
    $('#adminSettings_form').on('submit',function(e){
        e.preventDefault();
        var route = $(this).data('route'); //to get link from data attributes in form
        var direct_img = $('.img_admin').data('src'); // to get path of folder to img ,we will use it in update image
        $.ajax({
            method:'POST',
            url:route,
            data:new FormData(this),
            cache:false,
            processData:false,
            contentType:false,
            beforeSend:function(){
                $('#submit_button').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function(data){
                $('#submit_button').removeAttr('disabled'); //to remove button disabled
                $('#name_admin').text(data.adminData.name); //to set new value of name to p tag
                $('#name_admin_header').text(data.adminData.name); //to set new value of email to p tag
                $('#username_admin').text(data.adminData.username); //to set new value of email to p tag
                $('.img_admin').attr('src',direct_img +'/'+ data.adminData.image); //to set new img to p tag
                $('#password').val(''); //to empty input of password
                $('#password-confirm').val(''); //to empty input of password-confirm
                $('#label_photo').text('صورة العضو'); //to empty input file of image
                $('#image').val(''); //to empty input file of image
                @include('system.admin.layouts.include.message.messageSuccess',['msg'=>'تم الحفظ بنجاح']) //include success message //include success message
            },
            error:function(response){
                $('#submit_button').removeAttr('disabled'); //to remove button disabled
                $.each(response.responseJSON.errors,function(key,val){
                    @include('system.admin.layouts.include.message.messageError') //include error message
                });
            },
    
        });
    });
    
</script>
