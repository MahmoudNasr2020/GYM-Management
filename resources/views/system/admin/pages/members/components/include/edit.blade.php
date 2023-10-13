<!--begin::Modal-->
<div class="modal fade" id="edit_member_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="add_member_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل عضو</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form id="edit_member" data-route="{{ route('admin.members.index') }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم العضو
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name_edit" class="form-control" placeholder="ادخل الاسم" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم التلفون
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone_edit" class="form-control" placeholder="ادخل رقم التلفون" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الوزن الابتدائي
                                    </label>
                                    <input type="text" name="f_weight"  id="f_weight_edit" class="form-control" placeholder="ادخل الوزن الابتدائي" />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>العمر
                                    </label>
                                    <input type="text" name="age" id="age_edit" class="form-control" placeholder="ادخل عمر العضو" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نوع الاشتراك
                                    </label>
                                    <input type="text" name="type" id="type_edit" class="form-control" placeholder="ادخل نوع اشتراك العضو" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاريخ الالتحاق
                                    </label>
                                        <input type="text" id="date_joining_edit" class="form-control" name="date_joining"
                                        placeholder="تاريخ الالتحاق" data-toggle="datepicker" data-value="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الصورة</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile_edit" name="image" id="photo_edit">
                                        <label class="custom-file-label selected" id="label_photo_edit" for="customFile">صورة العضو</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submit_button_edit" class="btn btn-success mr-2">تعديل</button>
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