
@extends('system.admin.layouts.app')
@section('style')
    <link href="{{ asset('system/admin/assets/css/member_show.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('system/admin/assets/plugins/evo-calendar/css/evo-calendar.css') }}" />

@stop

@section('header')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">لوحة التحكم</h5>
        <!--end::Page Title-->
        <!--begin::Actions-->
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <a href="{{ route('admin.members.index') }}"><span class="text-muted font-weight-bold mr-4">الاعضاء</span></a>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <a href="#"><span class="text-muted font-weight-bold mr-4">{{ $member->name }}</span></a>
        <!--end::Actions-->
    </div>
    <!--end::Info-->
@stop
@section('content')
    <section id="basic-vertical-layouts">
            <section id="page-account-settings">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- left menu section -->
                            <div class="col-md-4 mb-2 mb-md-0 pills-stacked">
                                <div class="card">
                                    <div class="card-body box box-primary">
                                        <div class="box-body box-profile">
                                            <img class="student-show-img profile-user-img img-responsive img-circle"
                                                src="{{ asset('system/images/Member/'.$member->image) }}"
                                                alt="User profile picture">
                                            <h3 class="profile-username text-center" style="margin-top: 10px;">{{ $member->name }}</h3>
                                            <p style="text-align: center;color: red;" id="text_disabled_student">
            
                                            </p>
            
                                            <ul class="list-group list-group-unbordered">
            
                                                <li class="list-group-item listnoback">
                                                    <b>رقم الموبايل</b> <a class="pull-right text-aqua">{{ $member->phone }}</a>
                                                </li>
            
                                                <li class="list-group-item listnoback">
                                                    <b>العمر</b> <a class="pull-right text-aqua">{{ $member->age != null ? $member->age : 'غير مسجل' }}</a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>الحالة</b> <a class="pull-right text-aqua">{{ $member->active == 'on' ? 'مفعل' : 'غير مفعل' }}</a>
                                                </li>
                                                <li class="list-group-item listnoback">
                                                    <b>الوزن الحالي</b> <a class="pull-right text-aqua">{{ $member->l_weight != null ? $member->l_weight : 'غير مسجل' }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- right content section -->
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body" style="border-top: 3px solid #a92c2d;">
                                        <ul class="nav nav-pills"
                                            style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;margin-bottom: 29px;padding-bottom: 10px;">
                                            <li class="nav-item"
                                                style="padding-top: 13px !important;padding-bottom: 0px !important;">
                                                <a class="nav-link active" id="base-pill31" data-toggle="pill" href="#list_view"
                                                    aria-expanded="true">
                                                    البيانات الشخصية
                                                </a>
                                            </li>
            
                                            <li class="nav-item"
                                                style="padding-top: 13px !important;padding-bottom: 0px !important;">
                                                <a class="nav-link" id="base-pill31" data-toggle="modal" data-target="#full-scrn"
                                                    aria-expanded="true">
                                                    الحضور
                                                </a>
                                            </li>            
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="list_view">
                                                <div class="tshadow mb25 bozero" style="border: 1px solid #e7ebf0;">
                                                    <h3 class="pagetitleh2" style="background: #f2f2f2;margin: 0;font-size: 16px;padding: 8px 14px;color: #000;
                                                    box-shadow: 0 0px 2px rgb(0 0 0 / 20%);
                                                    border-bottom: 1px solid #d7dfe3;">التفاصيل الشخصية</h3>
                                                    <div class="table-responsive around10 pt0"
                                                        style="padding: 0px;padding-top: 0 !important;">
                                                        <table class="table table-hover table-striped tmb0 table-student-show">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="col-md-4">الاسم</td>
                                                                    <td class="col-md-5">{{ $member->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-4">الوزن عند الالتحاق</td>
                                                                    <td class="col-md-5">{{ $member->f_weight != null ? $member->f_weight : 'غير مسجل' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>الوزن الحالي</td>
                                                                    <td>{{ $member->l_weight != null ? $member->l_weight : 'غير مسجل' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>رقم التلفون</td>
                                                                    <td>{{ $member->phone }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>العمر</td>
                                                                    <td>{{ $member->age }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>تاريخ الالتحاق</td>
                                                                    <td>{{ $member->date_joining != null ? $member->date_joining : 'غير مسجل' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>نوع الاشتراك</td>
                                                                    <td>{{ $member->type != null ? $member->type : 'غير مسجل' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>الحالة</td>
                                                                    <td>{{ $member->active == 'on' ? 'مفعل' : 'غير مفعل' }}</td>
                                                                </tr>          
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>
                </div>
            </section>
        
    </section>
    @include('system.admin.pages.members.components.include.show_attendance_modal')
@stop
@section('script')
    @include('system.admin.pages.members.components.extends.script')
    <script src="{{ asset('system/admin/assets/plugins/evo-calendar/js/evo-calendar.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('.event-list').hide();  
            $('.event-empty p').text(''); 
      });
        $('#evoCalendar').evoCalendar({
            titleFormat: 'MM yyyy',
            eventHeaderFormat: 'MM d, yyyy',
            language:'ar',
            format:'yyyy/mm/dd',
          });
    </script>
    @include('system.admin.pages.members.components.ajax.show_attendance')

@stop
