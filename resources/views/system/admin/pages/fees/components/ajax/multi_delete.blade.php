<script>
    $('#multi_delete').on('change',function(){
        //this function to check all to delete this element
        if($(this).is(':checked'))
        {
            //if element has this class remove that and add new class add checked all
            $('.check_row').prop('checked',true);
            $('#delete_multi_icon').css('display','block');
        }
        else
        {
            $('.check_row').prop('checked',false);
            $('#delete_multi_icon').css('display','none');
        }
    });

    $('#delete_multi_icon').on('click',function(){
        //this code for multi delete
        let id = []; //let array to store all id to delete
        let route = $(this).data('route'); //get route from this element
        console.log(route);
        $('.check_row:checked').each(function(){
            //this function to pass all row checked to array
            id.push($(this).val());
            if(id.length > 0)
            {
                let n = new Noty({
                    theme: 'relax',
                    type: 'alert',
                    text: 'حذف الاشتراكات المحددة؟',
                    layout:"topLeft",
                    killer:true,
                    buttons: [
                        Noty.button('نعم','btn btn-danger mr-2', function () {
                            $.ajax({
                                method: "POST",
                                url: route,
                                data:{id:id},
                                success: function (data)
                                {
                                        $('#multi_delete').prop('checked',false);
                                        $('.check_row').prop('checked',false);
                                        $('#delete_multi_icon').css('display','none');
                                        $('#show_fees').DataTable().ajax.reload(null, false);
                                        n.close();
                                        @include('system.admin.layouts.include.message.messageDelete') //include message Delete success
                                }
                            });
                        }),
                        Noty.button('لا', 'btn btn-light', function () {
                            n.close();
                        }),
                    ],
                });
                n.show();
            }
        });
    });

    $(document).on('change','.check_row',function(){
        //this code to select single row to single delete
        if($(this).is(':checked'))
        {
            $('#delete_multi_icon').css('display','block');
        }
    });

</script>
