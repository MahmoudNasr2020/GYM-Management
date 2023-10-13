<!--begin::Modal-->
<div class="modal fade" id="send_message_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="full-scrn" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ارسال رسالة<span id="span_message"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" style="padding: 0">
              <form id="send_message_form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" id="input__name_group">
                            <div class="form-group">
                                <label>اسم العضو
                                    <span class="text-danger">*</span></label>
                                <input type="text" id="input_name" readonly name="name" class="form-control" placeholder="ادخل الاسم" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>الرسالة
                                    <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="message" style="padding: 12px !important;" id="input_message" placeholder="ادخل الرسالة"></textarea>
                            </div>
                        </div>
                        <input type="hidden" id="member_id" name="member_id" value="">
                        <input type="hidden" id="form_type" name="form_type" value="">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" id="submit_button_send" class="btn btn-success mr-2">ارسال</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->