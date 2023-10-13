<!--begin::Modal-->
<div class="modal fade" id="show_remaining" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="add_invoice_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  المديونية الخاصة ب {{ $member->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form id="remaining_form">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>المديونية الخاصة ب {{ $member->name }}
                                        <span class="text-danger">*</span>
                                    </label>
                                   <input type="text" class="form-control" id="remaining_count" readonly value="">
                                   <input type="hidden"  name="member_id" value="{{ $member_id }}">
                                </div>
                            </div>

                        </div>
                    </div>
                    <input type="hidden" id="member_id" name="member_id" value="{{ $member_id }}">
                    <div class="card-footer">
                        <button type="submit" id="submit_button_remainig" class="btn btn-info mr-2">تصفير</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->