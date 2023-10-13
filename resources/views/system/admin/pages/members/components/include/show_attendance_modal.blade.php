<!--begin::Modal-->
<div class="modal fade" id="full-scrn" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="full-scrn" aria-hidden="true" style="direction: ltr !important;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة عضو</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" style="padding: 0">
              <div id="evoCalendar"></div>
              <input type="hidden" id="member_id" value="{{ $member->id }}">
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->