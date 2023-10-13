<!--begin::Card-->
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">الاعضاء المديونين 
                <span class="d-block text-muted pt-2 font-size-sm">عرض جميع الاعضاء المديونين</span></h3>
            </div>
        </div>
        <div class="card-body" style="overflow:auto !important">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="show_members">
                <thead class="datatable-head">
                    <th> # </th>
                    <th> الاسم </th>
                    <th> رقم التلفون </th>
                    <th> اجمالي المديونية </th>
                    <th> الاعدادت </th>
                    <th> 
                        <a href="#" id="send_message" title="send message"><i class="fas fa-envelope" style="cursor:pointer"></i></a>
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