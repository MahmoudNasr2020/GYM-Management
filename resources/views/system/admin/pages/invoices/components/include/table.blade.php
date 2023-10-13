<!--begin::Card-->
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">عرض الفواتير 
                <span class="d-block text-muted pt-2 font-size-sm">عرض جميع الفواتير الخاصة بالمشترك {{ $member->name }}</span></h3>
            </div>
            <div style="margin: auto 0;">
                <button class="btn btn-outline-primary"  data-toggle="modal" data-target="#add_invoice_modal">أضافة فاتورة</button>
            </div>
        </div>
        <div class="card-body" style="overflow:auto !important">
            <button class="btn btn-outline-danger ml-3" id="delete_multi_icon" style="display: none;float: left;" data-route="{{ route('admin.invoice.multi_delete') }}">حذف المحدد</button>
            <button class="btn btn-outline-info" id="btn_remainig" 
               data-member_id=" {{ $member_id }}" data-route="{{ route('admin.invoice.inquiry_remainig') }}" style="float: left;" >المديونية</button>
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="show_invoices">
                <thead class="datatable-head">
                    <th> # </th>
                    <th>نوع الاشتراك  </th>
                    <th> بداية الاشتراك </th>
                    <th> نهاية الاشتراك </th>
                    <th> المدفوع </th>
                    <th> المتبقي </th>
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