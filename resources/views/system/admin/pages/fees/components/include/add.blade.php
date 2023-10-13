<!--begin::Modal-->
<div class="modal fade" id="add_fee_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="add_member_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة اشتراك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form id="add_fee">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>الاسم
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="ادخل اسم الاشتراك" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>قيمة الاشتراك
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="amount" class="form-control" placeholder="ادخل قيمة الاشتراك" />
                                </div>
                            </div>
                        
                        </div>
                    </div>
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