<script>
    $('#save_attendance').on('click',function(){
        let data = [];
        let route = "{{ route('admin.attendance.assign_attendence') }}";
        let attendance_date =  $('#attendance_date').attr('data-value');
        $('.radio_attendance:checked').each(function(){
            let member_id = $(this).data('member_id');
            let attendance = $(this).data('attendance');
            let note = $(this).parents('tr').find('.member_note').val();
            data.push({member_id:member_id,attendance:attendance,note:note});
        });
       $.ajax({
            //this code to update session
            method:'POST',
            url:route,
            data:{data:data,attendance_date:attendance_date},
            beforeSend:function(){
                $('#save_attendance').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){

                $('#save_attendance').removeAttr('disabled'); //to remove button disabled
                @include('system.admin.layouts.include.message.messageSuccess',['msg'=>'تم الحفظ بنجاح']) //include success message //include success message


            },
            error:function (reject){
                //if process unsuccessful
                $('#save_attendance').removeAttr('disabled'); //to remove button disabled
                $.each(reject.responseJSON.errors,function(key,val){
                    //this loop to print any error
                    @include('system.admin.layouts.include.message.messageError') //include error message
                });
            },

        });
    });
</script>
