<!--begin::Card-->
<div class="container">
    <div class="card  card-custom gutter-b" id="card_table" style="display: none;margin-top:50px">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">عرض الحضور 
                <span class="d-block text-muted pt-2 font-size-sm">عرض حضور وغياب جميع الاعضاء المشتركين بالصالة</span></h3>
            </div>
        </div>
        <div class="card-body" style="overflow:auto !important">
            <button class="btn btn-outline-success" id="save_attendance" style=";float: left;" 
            data-route="{{ route('admin.attendance.assign_attendence') }}">حفظ</button>

            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="show_attendance">
                <thead class="datatable-head">
                    <th> # </th>
                    <th> الاسم </th>
                    <th> الغياب </th>
                    <th> الملاحظة </th>
                </thead>
                <tbody>
                </tbody>
            </table>


            <!--end: Datatable-->
        </div>
    </div>
</div>
    <!--end::Card-->

   