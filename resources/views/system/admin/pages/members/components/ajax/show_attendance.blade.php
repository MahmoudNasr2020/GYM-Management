<script>
    $(document).on('click','.day',function(){
        var date = $(this).data('date-val');
        var member_id = $('#member_id').val();
        $.ajax({
            method:"POST",
            url:"{{ route('admin.attendance.show_attendence') }}",
            data:{
                date:date,
                member_id:member_id
                },
            success:function(data)
            {
                $('.event-list').show();  
                $('.event-plus').remove();  
                $('.event-empty p').text('');
                $('.event-empty p').css({
                    'font-size':'18px',
                });

                if(data.attendance == 'present'){
                    $('.event-empty p').text('😍الحضور : '+'حاضر');
                }

                  else if(data.attendance == 'absent')
                  {
                    $('.event-empty p').text('😡الحضور : '+'غايب');
                  } 

                if(!data)
                {
                    $('.event-empty p').text('🤷غير مسجل');
                }
                if(data.note != null)
                {
                    $('.event-list').after('<div class="event-list event-plus" style="margin-top: 20px;"><div class="event-empty"><p> الملاحظة : '+data.note+'</p></div></div>');  
                }
                                        
            }
        });

    });
</script>