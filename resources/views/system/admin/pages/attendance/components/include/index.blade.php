<div class="row match-height">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header" style="padding: 22px 30px 0 0 !important;">
                <h4 class="card-title">تسجيل حضور الاعضاء</h4>
                <a class="heading-elements-toggle">
                    <i class='bx bx-dots-vertical font-medium-3'></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="collapse">
                                <i class="bx bx-chevron-down"></i>
                            </a>
                        </li>
                        <li>
                            <a data-action="expand">
                                <i class="bx bx-fullscreen" ></i>
                            </a>
                        </li>
                        <li>
                            <a data-action="reload">
                                <i class="bx bx-revision"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form mt-2" id="search_attendence_form">
                        <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group position-relative has-icon-left mt-2">
                                    <label style="top:-30px;left:-6px;color:#727E8C;opacity:1;">تاريخ الحضور</label>
                                    <input type="text" id="attendance_date" class="form-control" name="attendance_date"
                                        placeholder="تاريخ الحضور" data-toggle="datepicker" data-value="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 search_space">
                                <div class="form-group">
                                    <div class="col p-0">
                                    <button class="btn btn-primary mt-6" type="submit" id="submit_button_search">
                                        <i class="fa fa-search"></i>
                                        بحث
                                    </button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
<div class="loader" style="display: none">
</div>
@include('system.admin.pages.attendance.components.include.table')
