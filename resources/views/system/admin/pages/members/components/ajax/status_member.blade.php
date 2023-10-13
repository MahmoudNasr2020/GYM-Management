<script>
    
$(document).on("change",".custom-switch-input", function () {
    var id = $(this).data('id'); // gets task ID of clicked checkbox
    var status = $(this).is(":checked") ? 1:0; // gets if checkbox is checked or not if checked will return 1 else return 0
    var route = $(this).data("route"); // get route from data-route in this element
    $.ajax({
        method: "POST",
        url: route,
        data: {
            id: id,
            status:status,
        },
        success: function (data)
        {
            if (data.error === false)
            {
                @include('system.admin.layouts.include.message.messageSuccess',['msg'=>'تم تعديل الحالة بنجاح']) //include success message //include success message
            }
            else {
                @include('system.admin.layouts.include.message.message404') //include message error if element doesn't exists
            }
        }
    });

});

</script>