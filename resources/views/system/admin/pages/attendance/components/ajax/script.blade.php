@include('system.admin.pages.attendance.components.ajax.search_attendence')
@include('system.admin.pages.attendance.components.ajax.assign_attendence')

<script>

    $('#reload_table').on('click',function (){
        $('#teacher_attendance').DataTable().ajax.reload(null, false);  //to reloade dataTables

    });
    $('[data-toggle="datepicker"]').datepicker({
        language: 'ar-AE',
        autoPick:true,
    });

</script>
