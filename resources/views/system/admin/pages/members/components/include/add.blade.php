<!--begin::Modal-->
<div class="modal fade" id="add_member_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="add_member_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة عضو</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form id="add_member">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم العضو
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="ادخل الاسم" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم التلفون
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" placeholder="ادخل رقم التلفون" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الوزن الابتدائي
                                    </label>
                                    <input type="text" name="f_weight" class="form-control" placeholder="ادخل الوزن الابتدائي" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>العمر
                                    </label>
                                    <input type="text" name="age" class="form-control" placeholder="ادخل عمر العضو" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نوع الاشتراك
                                    </label>
                                    <input type="text" name="type" class="form-control" placeholder="ادخل نوع اشتراك العضو" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاريخ الالتحاق
                                        <span class="text-danger">*</span></label>
                                        <input type="text" id="date_joining" class="form-control" name="date_joining"
                                        placeholder="تاريخ الالتحاق" data-toggle="datepicker" data-value="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الصورة</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image" id="photo">
                                        <label class="custom-file-label selected" id="label_photo" for="customFile">صورة العضو</label>
                                    </div>
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