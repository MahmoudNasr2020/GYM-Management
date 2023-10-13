<!--begin::Card-->
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">عرض الاعضاء 
                <span class="d-block text-muted pt-2 font-size-sm">عرض جميع الاعضاء المشتركين بالصالة</span></h3>
            </div>
            <div style="margin: auto 0;">
                <button class="btn btn-outline-primary"  data-toggle="modal" data-target="#add_member_modal">أضافة عضو</button>
            </div>
        </div>
        <div class="card-body" style="overflow:auto !important">
            <button class="btn btn-outline-danger" id="delete_multi_icon" style="display: none;float: left;" data-route="{{ route('admin.members.multi_delete') }}">حذف المحدد</button>

            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="show_members">
                <thead class="datatable-head">
                    <th> # </th>
                    <th> الاسم </th>
                    <th> رقم الموبايل </th>
                    <th> نوع الاشتراك </th>
                    <th>تاريخ الالتحاق </th>
                    <th> العمر </th>
                    <th> الحالة </th>
                    <th> الاعدادت </th>
                    <th>
                        <label class="checkbox checkbox-outline checkbox-success">
                            <input type="checkbox" id="multi_delete" name="Checkboxes15">
                            <span></span>
                        </label>
                    </th>
                </thead>
                <tbody>
                </tbody>
            </table>


            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

</div>