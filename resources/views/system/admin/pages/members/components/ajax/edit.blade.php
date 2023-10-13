<script>
    $(document).on('click','.edit_element',function(e){
       //this code to get data of element to update that
       e.preventDefault();
        let id = $(this).data('id'); //to save id of this element in variable id
        let route = $(this).data('route'); //to save route of this element in variable route
        $('#name_edit').val(''); //to clear name field
        $('#phone_edit').val(''); //to clear name field
        $('#f-weight_edit').val(''); //to clear name field
        $('#age_edit').val(''); //to clear name field
        $('#type_edit').val(''); //to clear name field
        $('#date_joining_edit').val(''); //to clear name field
        $('#id').val(''); //to clear name field
        $.ajax({
            method:'GET',
            url:route,
            success:function (data)
            {
                if(data.error===true)
                {
                    $('#show_members').DataTable().ajax.reload(null, false);  //to reloade dataTables
                    @include('system.admin.layouts.include.message.message404') //include message error if element doesn't exists
                }
                else
                {
                    $('#name_edit').val(data.data.name);//to set value of name in name input
                    $('#phone_edit').val(data.data.phone); //to clear name field
                    $('#f_weight_edit').val(data.data.f_weight); //to clear name field
                    $('#age_edit').val(data.data.age); //to clear name field
                    $('#type_edit').val(data.data.type); //to clear name field
                     $('#date_joining_edit').val(data.data.date_joining);
                    $('#id').val(data.data.id); //to set id in id field
                    $('#edit_member_modal').modal('show');
                }
            }

        });
    });
</script>
