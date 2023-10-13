<!--begin::Modal-->
<div class="modal fade" id="add_invoice_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="add_invoice_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  اضافة فاتورة علي المشترك {{ $member->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form id="add_invoice">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نوع الاشتراك
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="exampleSelect1" name="fee" id="fee">
                                        <option selected disabled value="0">اختار نوع الاشتراك</option>
                                        @foreach ($fees as $fee)
                                            <option value="{{ $fee->id }}">{{ $fee->name .' ('. $fee->amount .')' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>بداية الاشتراك
                                        <span class="text-danger">*</span></label>
                                        <input type="text" id="start_date" class="form-control" name="start_date"
                                        placeholder="تاريخ بداية الاشتراك" data-toggle="datepicker" data-value="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نهاية الاشتراك
                                        <span class="text-danger">*</span></label>
                                        <input type="text" id="end_date" class="form-control" name="end_date"
                                        placeholder="تاريخ نهاية الاشتراك" data-toggle="datepicker" data-value="" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المبلغ المدفوع
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="paid_up" id="paid_up" class="form-control" placeholder="ادخل المبلغ المدفوع" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>حالة الاشتراك
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="status" id="status">
                                        <option selected disabled value="0">اختار حالة الاشتراك</option>
                                            <option value="active">ساري</option>
                                            <option value="finished">منتهي</option>
                                            <option value="future">مقبل</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <input type="hidden" id="member_id" name="member_id" value="{{ $member_id }}">
                    <div class="card-footer">
                        <button type="submit" id="submit_button" class="btn btn-primary mr-2">حفظ</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->