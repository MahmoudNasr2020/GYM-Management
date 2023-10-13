<!--begin::Modal-->
<div class="modal fade" id="edit_fee_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="edit_fee_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل اشتراك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form id="edit_fee" data-route="{{ route('admin.fees.index') }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>الاسم
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name_edit" class="form-control" placeholder="ادخل الاسم" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>قيمة الاشتراك
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="amount" id="amount_edit" class="form-control" placeholder="ادخل رقم التلفون" />
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submit_button_edit" class="btn btn-primary mr-2">حفظ</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    </div>
                    <input type="hidden" id="id" name="id">
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->