<script>
    $(document).on('click', '.delete_element', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let route = $(this).data('route');
        let n = new Noty({
            theme: 'relax',
            type: 'alert',
            text: 'حذف هذا العضو؟ ',
            layout:"topLeft",
            killer:true,
            buttons: [
                Noty.button('نعم','btn btn-danger mr-2', function () {
                    $.ajax({
                        method: "POST",
                        url: route,
                        data:{_method:'DELETE'},
                        success: function (data)
                        {
                            if (data.error === false)
                            {
                                $('#show_members').DataTable().ajax.reload(null, false);
                                n.close();
                                @include('system.admin.layouts.include.message.messageDelete') //include message Delete success
                            }
                            else {
                                $('#show_members').DataTable().ajax.reload(null, false);
                                n.close();
                                @include('system.admin.layouts.include.message.message404') //include message error if element doesn't exists
                            }
                        }
                    });
                }),
                Noty.button('لا', 'btn btn-light', function () {
                    n.close();
                }),
            ],
        });
        n.show();
    });

</script>
