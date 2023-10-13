<!--begin::Modal-->
<div class="modal fade" id="edit_invoice_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="add_member_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل الفاتورة الخاصة بالعضو {{ $member->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form id="edit_invoice" data-route="{{ route('admin.invoice.update') }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نوع الاشتراك
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control"  name="fee" id="fee_edit">
                                        <option selected disabled value="0" class="fee_option">اختار نوع الاشتراك</option>
                                        @foreach ($fees as $fee)
                                            <option value="{{ $fee->id }}" class="fee_option">{{ $fee->name .' ('. $fee->amount .')' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>بداية الاشتراك
                                        <span class="text-danger">*</span></label>
                                        <input type="text" id="start_date_edit" class="form-control" name="start_date"
                                        placeholder="تاريخ بداية الاشتراك" data-toggle="datepicker" data-value="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نهاية الاشتراك
                                        <span class="text-danger">*</span></label>
                                        <input type="text" id="end_date_edit" class="form-control" name="end_date"
                                        placeholder="تاريخ نهاية الاشتراك" data-toggle="datepicker" data-value="" autocomplete="off">
                                </div>
                            </div>
                            
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المبلغ المدفوع
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="paid_up" id="paid_up_edit" class="form-control" placeholder="ادخل المبلغ المدفوع" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>حالة الاشتراك
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="status" id="status_edit">
                                        <option selected disabled value="0">اختار حالة الاشتراك</option>
                                            <option value="active" class="status_option">ساري</option>
                                            <option value="finished" class="status_option">منتهي</option>
                                            <option value="future" class="status_option">مقبل</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submit_button_edit" class="btn btn-success mr-2">تعديل</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    </div>
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="member_id_edit" name="member_id" value="{{ $member_id }}">
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->